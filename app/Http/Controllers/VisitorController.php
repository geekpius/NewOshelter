<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PropertyModel\Property;
use App\PropertyModel\PropertyImage;
use App\PropertyModel\PropertyType;
use App\PropertyModel\PropertyReview;
use App\UserModel\UserExtensionRequest;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\UserModel\UserVisit;
use App\PaymentModel\Transaction;
use DB;
use App\Mail\EmailSender;
use Illuminate\Support\Facades\Mail;


class VisitorController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('verify-user');
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['page_title'] = 'My visits';
        return view('user.visits.index', $data);
    }

    public function residenceUpcoming()
    {
        $data['page_title'] = 'My upcoming residence visits';
        return view('user.visits.upcoming', $data);
    }

    public function residencePast()
    {
        $data['page_title'] = 'My past residence visits';
        return view('user.visits.past', $data);
    }

    public function hostelUpcoming()
    {
        $data['page_title'] = 'My upcoming hostel visits';
        return view('user.visits.hostels.upcoming', $data);
    }

    public function hostelPast()
    {
        $data['page_title'] = 'My past hostel visits';
        return view('user.visits.hostels.past', $data);
    }



    /************ Extension Requests  **************/
    public function extensionRequests()
    {
        $data['page_title'] = 'Extension requestss';
        $data['extensions'] = UserExtensionRequest::whereUser_id(Auth::user()->id)->get();
        return view('admin.requests.date_extension', $data);
    }


    private function extractExtensionDateFromRequest(string $type, string $status, string $checkIn, string $extendDate)
    {
        if($type == 'hostel'){
            $checkin = \Carbon\Carbon::createFromFormat("m-d-Y", $checkIn);
            $extensionDate = $checkin->addMonths((int) $extendDate)->format('Y-m-d');
        }else{
            if($status == 'rent'){
                $checkin = \Carbon\Carbon::createFromFormat("m-d-Y", $checkIn);
                $extensionDate = $checkin->addMonths((int) $extendDate)->format('Y-m-d');
            }elseif($status == 'short_stay'){
                $extensionDate = Carbon::parse($extendDate)->format('Y-m-d');
            }
        }

        return $extensionDate;
    }

    public function extendStay(Request $request): string
    {
        $validator = \Validator::make($request->all(), [
            'extended_date' => 'required|string',
            'visit_id' => 'required|string',
            'owner' => 'required|string',
            'type' => 'required|string',
            'status' => 'required|string',
        ]);
        (string) $message= '';
        if ($validator->fails()){
            $message = 'Some inputs are missing.';
        }else{
            if(UserExtensionRequest::whereUser_id(Auth::user()->id)->whereType($request->type)->whereVisit_id($request->visit_id)->whereIn('is_confirm', [1,2])->exists()){
                $message = "Already have pending extension request with this property visit.";
            }
            else{
                $extension = new UserExtensionRequest;
                $extension->user_id = Auth::user()->id;
                $extension->visit_id = $request->visit_id;
                $extension->owner_id = $request->owner;
                $extensionDate = $this->extractExtensionDateFromRequest($request->type, $request->status, $request->checkin, $request->extended_date);
                $extension->extension_date = $extensionDate;
                $extension->type = $request->type;
                $extension->save();
                $message="success";
                //emailing
                if($extension->type == 'hostel'){
                    $data = array(
                        "property" => $extension->hostelVisit->property->title,
                        "link" => route('requests.extension.detail', $extension->id),
                        "name" => current(explode(' ',$extension->hostelVisit->property->user->name)),
                        "guest" => current(explode(' ',Auth::user()->name)),
                    );
                    Mail::to($extension->hostelVisit->property->user->email)->send(new EmailSender($data, 'Extension Request', 'emails.extension_request'));
                }
                else{
                    $data = array(
                        "property" => $extension->visit->property->title,
                        "link" => route('requests.extension.detail', $extension->id),
                        "name" => current(explode(' ',$extension->visit->property->user->name)),
                        "guest" => current(explode(' ',Auth::user()->name)),
                    );
                    Mail::to($extension->visit->property->user->email)->send(new EmailSender($data, 'Extension Request', 'emails.extension_request'));
                }
            
            }
        }
        return $message;
    }

    public function extensionDetail(UserExtensionRequest $userExtensionRequest)
    {
        if(Auth::user()->id == $userExtensionRequest->owner_id){
            $data['page_title'] = 'Extension date request from '.$userExtensionRequest->user->name;
            $data['extension'] = $userExtensionRequest;
            return view('user.requests.extension-request', $data);
        }else{
            return view('errors.404');
        }
    }

    public function confirmExtendStay(UserExtensionRequest $userExtensionRequest)
    {
        if(Auth::user()->id == $userExtensionRequest->owner_id){
            try {
                (string) $message = '';
                if($userExtensionRequest->is_confirm == 1){
                    $userExtensionRequest->is_confirm = 2;
                    $userExtensionRequest->update();
                    $message = 'success';
                    
                    $email = ($userExtensionRequest->type == 'hostel')? $userExtensionRequest->hostelVisit->user->email:$userExtensionRequest->visit->user->email;
                    $property = ($userExtensionRequest->type == 'hostel')? $userExtensionRequest->hostelVisit->property->title:$userExtensionRequest->visit->property->title;
                    $name = ($userExtensionRequest->type == 'hostel')? $userExtensionRequest->hostelVisit->user->name:$userExtensionRequest->visit->user->name;
                    
                    $data = array(
                        "title" => "EXTENSION CONFIRMATION",
                        "property" => $property,
                        "link" => route('requests.extension.payment', $userExtensionRequest->id),
                        "status" => "confirmed",
                        "name" => current(explode(' ',$name)),
                        "owner" => current(explode(' ',Auth::user()->name)),
                    );
                    Mail::to($email)->send(new EmailSender($data, 'Extension Response', 'emails.extension_response'));
                }
            } catch (\Exception $e) {
                $message = "Confirmation failed";
            }

            return $message;
        }else{
            return view('errors.404');
        }
    }

    public function cancelExtendStay(UserExtensionRequest $userExtensionRequest)
    {
        if(Auth::user()->id == $userExtensionRequest->owner_id){
            (string) $message = '';
            if($userExtensionRequest->is_confirm == 1){
                $userExtensionRequest->is_confirm = 0;
                $userExtensionRequest->update();
                $message = 'success';
            }
            return $message;
        }else{
            return view('errors.404');
        }
    }

    public function extensionPayment(UserExtensionRequest $userExtensionRequest)
    {
        if(Auth::user()->id == $userExtensionRequest->user->id){
            if($userExtensionRequest->is_confirm == 2){
                $data['page_title'] = 'Extension payment requests';
                $data['extension'] = $userExtensionRequest;
                return view('user.requests.extension_payment', $data);
            }else{
                return view('errors.404');
            }
        }else{
            return view('errors.404');
        }
    }
 
    public function rateProperty(UserVisit $visit)
    {
        if($visit->user_id == $visit->property->user_id){
            return view('errors.404');
        }else{
            $data['page_title'] = $visit->property->title.' Ratings';
            $data['visit'] = $visit;
            return view('user.visits.rate', $data);
        }
    }

    public function submitRating(Request $request, UserVisit $visit)
    {
        $validator = \Validator::make($request->all(), [
            'accuracy' => 'nullable|integer',
            'location' => 'nullable|integer',
            'security' => 'nullable|integer',
            'value' => 'nullable|integer',
            'communication' => 'nullable|integer',
            'cleanliness' => 'nullable|integer',
            'comment' => 'required|string',
        ]);
        (string) $message= '';
        if ($validator->fails()){
            $message = 'Some inputs are missing.';
        }else{
            try {
                DB::beginTransaction();
                $review = new PropertyReview;
                $review->property_id = $visit->property_id;
                $review->user_id = Auth::user()->id; 
                $review->owner_id = $visit->property->user_id; 
                $review->location_star = empty($request->location)? 0: $request->location;
                $review->security_star = empty($request->security)? 0: $request->security;
                $review->comm_star = empty($request->communication)? 0: $request->communication;
                $review->value_star = empty($request->value)? 0: $request->value;
                $review->accuracy_star = empty($request->accuracy)? 0: $request->accuracy;
                $review->tidy_star = empty($request->cleanliness)? 0: $request->cleanliness;
                $review->comment = $request->comment;
                $review->save();
                DB::commit();
                $message = "success";
            } catch (\Exception $e) {
                DB::rollback();
                $message = "error";
            }
        }
        return $message;
    }
    



}
