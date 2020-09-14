<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PropertyModel\Property;
use App\PropertyModel\PropertyImage;
use App\PropertyModel\PropertyType;
use App\UserModel\UserExtensionRequest;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class VisitorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['page_title'] = 'My visits';
        $data['types'] = PropertyType::whereIs_public(true)->get();
        return view('admin.visits.index', $data);
    }

    public function all()
    {
        $data['page_title'] = 'All my visits';
        return view('admin.visits.all', $data);
    }

    public function upcoming()
    {
        $data['page_title'] = 'My upcoming visits';
        return view('admin.visits.upcoming', $data);
    }

    public function current()
    {
        $data['page_title'] = 'My current visits';
        return view('admin.visits.current', $data);
    }

    public function past()
    {
        $data['page_title'] = 'My past visits';
        return view('admin.visits.past', $data);
    }

    public function hostel()
    {
        $data['page_title'] = 'My hostel visits';
        return view('admin.visits.hostels.hostel', $data);
    }

    public function hostelUpcoming()
    {
        $data['page_title'] = 'My hostel upcoming visits';
        return view('admin.visits.hostels.upcoming', $data);
    }

    public function hostelCurrent()
    {
        $data['page_title'] = 'My hostel current visits';
        return view('admin.visits.hostels.current', $data);
    }

    public function hostelPast()
    {
        $data['page_title'] = 'My hostel past visits';
        return view('admin.visits.hostels.past', $data);
    }

    public function showVisitedProperty(Property $property)
    {
        $data['page_title'] =  'My visited property';
        $data['property'] = $property;
        $data['images'] = PropertyImage::whereProperty_id($property->id)->skip(1)->take(4)->get(['caption', 'image']);
        return view('admin.visits.visited-property', $data);
    }

    public function extendStay(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'extended_date' => 'required|string',
            'visit_id' => 'required|string',
            'owner' => 'required|string',
        ]);
        (string) $message= '';
        if ($validator->fails()){
            $message = 'Some inputs are missing.';
        }else{
            if(UserExtensionRequest::whereUser_id(Auth::user()->id)->whereVisit_id($request->visit_id)->whereIs_confirm(0)->exists()){
                $message = "Already have pending extension request with this property visit.";
            }
            else{
                $extension = new UserExtensionRequest;
                $extension->user_id = Auth::user()->id;
                $extension->visit_id = $request->visit_id;
                $extension->owner_id = $request->owner;
                $extension->extension_date = Carbon::parse($request->extended_date)->format('Y-m-d');
                $extension->save();
                $message="success";
            }
        }
        return $message;
    }

    public function extensionRequest(UserExtensionRequest $userExtensionRequest)
    {
        $data['page_title'] = 'Extension date request from '.$userExtensionRequest->user->name;
        $data['extension'] = $userExtensionRequest;
        return view('admin.visits.extension-request', $data);
    }

    public function approveExtendStay(Request $request, UserExtensionRequest $userExtensionRequest)
    {
        (string) $message= '';
        if($userExtensionRequest->is_confirm==0){
            $userExtensionRequest->is_confirm = 1;
            $userExtensionRequest->update();
            $message = 'success';
        }
        else if($userExtensionRequest->is_confirm==2){
            $message = 'Already declined';
        }
        else{
            $message = 'Already approved';
        }
        return $message;
    }

    public function declineExtendStay(Request $request, UserExtensionRequest $userExtensionRequest)
    {
        (string) $message= '';
        if($userExtensionRequest->is_confirm==0){
            $userExtensionRequest->is_confirm = 2;
            $userExtensionRequest->update();
            $message = 'success';
        }
        else if($userExtensionRequest->is_confirm==1){
            $message = 'Already approved';
        }
        else{
            $message = 'Already declined';
        }
        return $message;
    }



}
