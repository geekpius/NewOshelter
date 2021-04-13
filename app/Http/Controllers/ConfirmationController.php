<?php

namespace App\Http\Controllers;

use App\UserModel\Confirmation;
use App\UserModel\CancelConfirmation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Carbon\Carbon;
use App\User;
use App\UserModel\UserWallet;
use App\UserModel\UserVisit;
use App\UserModel\UserHostelVisit;
use App\Http\Traits\PermissionTrait;
use App\Mail\EmailSender;
use Illuminate\Support\Facades\Mail;

class ConfirmationController extends Controller
{
    use PermissionTrait; 

    public function __construct()
    {
        $this->middleware('verify-user');
        $this->middleware('auth');
    }    
    
    public function index()
    {
        if(Auth::user()->account_type=='visitor'){
            $data['page_title'] = 'My confirmations';
            return view('user.bookings.visitorconfirmation', $data);
        }else{
            return view('errors.404');
        }
    }

    public function confirmStay(Request $request, User $user): string
    {
        $validator = \Validator::make($request->all(), [
            'owner_id' => 'required',
            'visit_id' => 'required',
            'transaction_id' => 'required',
            'type' => 'required',
        ]);

        (string) $message = "";
        if(request()->ajax())
        {
            if ($validator->fails()){
               return 'Input required failed. Try again.';
            }else{
                if($this->isOwner($user->id)){
                    try{
                        DB::beginTransaction();
                        $confirmation = new Confirmation;
                        $confirmation->user_id = Auth::user()->id;
                        $confirmation->owner_id = $request->owner_id;
                        $confirmation->visit_id = $request->visit_id;
                        $confirmation->transaction_id = $request->transaction_id;
                        $confirmation->type = $request->type;
                        $confirmation->status = true;
                        $confirmation->save();
                        
                        (string) $propertyTitle = ($confirmation->type=='hostel')? $confirmation->hostelVisit->property->title:$confirmation->visit->property->title;
                        UserWallet::whereUser_id($confirmation->owner_id)->whereTransaction_id($confirmation->transaction_id)->update(['is_cash_out' => 1]);
                        DB::commit();
                        //emailing
                        $data = array(
                            "type" => "confirm",
                            "title" => "STAY CONFIRMATION",
                            "property" => $propertyTitle,
                            "name" => current(explode(' ',$confirmation->owner->name)),
                            "visitor" => current(explode(' ',Auth::user()->name)),
                        );
                        Mail::to($confirmation->owner->email)->send(new EmailSender($data, 'Stay Confirmation', 'emails.stay_confirmation'));
                        $message = "success";
                    }catch(\Exception $e){
                        DB::rollback();
                        $message = 'Could not save your request';
                    }
                }else{
                    $message = "You are unauthorized to perform this action.";
                }
            }
        }else{
            $message = 'Wrong server request';
        }

        return $message;        
    }

    public function cancelStay(Request $request, User $user): string
    {
        $validator = \Validator::make($request->all(), [
            'owner_id' => 'required',
            'visit_id' => 'required',
            'transaction_id' => 'required',
            'type' => 'required',
            'reason' => 'required',
        ]);

        (string) $message = "";
        if(request()->ajax())
        {
            if ($validator->fails()){
               return 'Input required failed. Try again.';
            }else{
                if($this->isOwner($user->id)){
                    try{
                        DB::beginTransaction();
                        $confirmation = new Confirmation;
                        $confirmation->user_id = Auth::user()->id;
                        $confirmation->owner_id = $request->owner_id;
                        $confirmation->visit_id = $request->visit_id;
                        $confirmation->transaction_id = $request->transaction_id;
                        $confirmation->type = $request->type;
                        $confirmation->status = false;
                        $confirmation->save();

                        (string) $propertyTitle = "";
                        if($confirmation->type=='hostel'){
                            $hostelVisit = UserHostelVisit::findOrFail($confirmation->visit_id);
                            $hostelVisit->is_in = 2;
                            $hostelVisit->update();
                            $roomNumber = $hostelVisit->hostelBlockRoomNumber;
                            $roomNumber->occupant = $roomNumber->occupant-1;
                            $roomNumber->full = false;
                            $roomNumber->update();
                            $propertyTitle = $confirmation->hostelVisit->property->title;
                        }else{
                            UserVisit::findOrFail($confirmation->visit_id)->update(['status' => 2]);
                            $propertyTitle = $confirmation->visit->property->title;
                        }
                        UserWallet::whereUser_id($confirmation->owner_id)->whereTransaction_id($confirmation->transaction_id)->update(['is_cash_out' => 4]);
                        
                        $reason = new CancelConfirmation;
                        $reason->confirmation_id = $confirmation->id;
                        $reason->reason = $request->reason;
                        $reason->save();
                        DB::commit();
                         //emailing
                         $data = array(
                            "type" => "cancel",
                            "title" => "STAY CANCELLATION",
                            "property" => $propertyTitle,
                            "name" => current(explode(' ',$confirmation->owner->name)),
                            "visitor" => current(explode(' ',Auth::user()->name)),
                        );
                        Mail::to($confirmation->owner->email)->send(new EmailSender($data, 'Stay Cancellation', 'emails.stay_confirmation'));
                        $message = "success";
                    }catch(\Exception $e){
                        DB::rollback();
                        $message = 'Could not save your request';
                    }
                }else{
                    $message = "You are unauthorized to perform this action.";
                }
            }
        }else{
            $message = 'Wrong server request';
        }

        return $message;  
    }


}
