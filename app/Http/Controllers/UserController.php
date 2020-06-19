<?php

namespace App\Http\Controllers;

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
        $data['count_short_stay'] = Auth::user()->properties->where('type_status','short_stay')->count();
        $data['count_rent'] = Auth::user()->properties->where('type_status','rent')->count();
        $data['count_sell'] = Auth::user()->properties->where('type_status','sell')->count();
        $data['count_auction'] = Auth::user()->properties->where('type_status','auction')->count();
        return view('admin.dashboard.index', $data);
    }


    public function guest()
    {
        $data['page_title'] = 'Guest statistics';
        return view('admin.dashboard.guest-statistics', $data);
    }

    public function property()
    {
        $data['page_title'] = 'Property statistics';
        return view('admin.dashboard.property-statistics', $data);
    }

    public function payment()
    {
        $data['page_title'] = 'Payment statistics';
        return view('admin.dashboard.payment-statistics', $data);
    }

     

    //notification message count
    public function messageCount()
    {
        return Message::whereUser_id(Auth::user()->id)->whereStatus(0)->count();
    }

    //notification messages
    public function messageNotification()
    {
        $data['notifications'] = Message::whereUser_id(Auth::user()->id)->whereStatus(0)->get();
        return view('admin.notifications.message-notification', $data)->render();
    }

    //notification count
    public function notificationCount()
    {
        return Message::whereUser_id(Auth::user()->id)->whereStatus(0)->count();
    }

    //notification content
    public function notification()
    {
        $data['notifications'] = Message::whereUser_id(Auth::user()->id)->whereStatus(0)->get();
        return view('admin.notifications.message-notification', $data)->render();
    }



    
}
