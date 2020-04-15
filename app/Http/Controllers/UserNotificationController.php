<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserModel\UserNotification;
use Illuminate\Support\Facades\Auth;

class UserNotificationController extends Controller
{
    public function __construct()
    {
        $this->middleware('verify-user');
        $this->middleware('auth');
    }

    //check email or sms message
    public function checkMessage(Request $request)
    {
        $notify = UserNotification::whereUser_id(Auth::user()->id)->first();
        if($request->message=='email'){
            if($notify->message_email){
                $notify->message_email = false;
                $notify->update();
            }else{
                $notify->message_email = true;
                $notify->update();
            }
        }else{
            if($notify->message_sms){
                $notify->message_sms = false;
                $notify->update();
            }else{
                $notify->message_sms = true;
                $notify->update();
            }
        }
    }

    //check email or sms support
    public function checkSupport(Request $request)
    {
        $notify = UserNotification::whereUser_id(Auth::user()->id)->first();
        if($request->support=='email'){
            if($notify->support_email){
                $notify->support_email = false;
                $notify->update();
            }else{
                $notify->support_email = true;
                $notify->update();
            }
        }else{
            if($notify->support_sms){
                $notify->support_sms = false;
                $notify->update();
            }else{
                $notify->support_sms = true;
                $notify->update();
            }
        }
    }

    //check email or sms reminder
    public function checkReminder(Request $request)
    {
        $notify = UserNotification::whereUser_id(Auth::user()->id)->first();
        if($request->reminder=='email'){
            if($notify->reminder_email){
                $notify->reminder_email = false;
                $notify->update();
            }else{
                $notify->reminder_email = true;
                $notify->update();
            }
        }else{
            if($notify->reminder_sms){
                $notify->reminder_sms = false;
                $notify->update();
            }else{
                $notify->reminder_sms = true;
                $notify->update();
            }
        }
    }

    //check email or sms policy
    public function checkPolicy(Request $request)
    {
        $notify = UserNotification::whereUser_id(Auth::user()->id)->first();
        if($request->policy=='email'){
            if($notify->policy_email){
                $notify->policy_email = false;
                $notify->update();
            }else{
                $notify->policy_email = true;
                $notify->update();
            }
        }else{
            if($notify->policy_sms){
                $notify->policy_sms = false;
                $notify->update();
            }else{
                $notify->policy_sms = true;
                $notify->update();
            }
        }
    }

    //subscribe/unsubscribe emails
    public function checkToggleSubscribe(Request $request)
    {
        $notify = UserNotification::whereUser_id(Auth::user()->id)->first();
        if($notify->unsubscribe_email){
            $notify->unsubscribe_email = false;
            $notify->update();
        }else{
            $notify->unsubscribe_email = true;
            $notify->update();
        }
    }

  
    




}
