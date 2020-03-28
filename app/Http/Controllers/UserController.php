<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;
use App\MessageModel\Message;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
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


    //home dashboard
    public function index()
    {
        $data['page_title'] = 'Dashboard';
        return view('guest.dashboard', $data);
    }

    public function property()
    {
        $data['page_title'] = 'Property statistics';
        return view('guest.property-statistics', $data);
    }

    public function payment()
    {
        $data['page_title'] = 'Payment statistics';
        return view('guest.payment-statistics', $data);
    }

    public function composeMessage(Admin $admin)
    {
        $data['page_title'] = 'Compose message to '.$admin->name;
        $data['host'] = $admin;
        return view('guest.compose', $data);
    }

    //send message
    public function sendMessage(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'admin_id' => 'required|string',
            'message' => 'required|string',
        ]);
        if ($validator->fails()){
            $message = 'fail';
        }else{
            $msg = new Message;
            $msg->user_id = Auth::user()->id;
            $msg->admin_id = $request->admin_id;
            $msg->message = $request->message;
            $msg->save();
            $message="success";
        }
        return $message;
    }

    //read messages
    public function readMessage()
    {
        $data['page_title'] = 'Read messages';
        return view('guest.messages', $data);
    }

    



    
}
