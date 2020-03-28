<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;
use App\MessageModel\Message;
use App\PropertyModel\Property;
use App\PropertyModel\PropertyList;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('verify-admin');
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['page_title'] = 'Dashboard';
        return view('host.dashboard', $data);
    }

    public function guest()
    {
        $data['page_title'] = 'Guest statistics';
        return view('host.guest-statistics', $data);
    }

    public function property()
    {
        $data['page_title'] = 'Property statistics';
        return view('host.property-statistics', $data);
    }

    public function payment()
    {
        $data['page_title'] = 'Payment statistics';
        return view('host.payment-statistics', $data);
    }

    public function saved()
    {
        $data['page_title'] = 'Properties saved';
        $data['lists'] = PropertyList::whereAdmin_id(Auth::user()->id)->get(); 
        return view('host.saved', $data);
    }

    public function removeSaved(PropertyList $propertyList)
    {
        $propertyList->delete();
        return redirect()->back();
    }

    //notification message count
    public function messageCount()
    {
        return Message::whereAdmin_id(Auth::user()->id)->whereStatus(0)->count();
    }

    //notification messages
    public function messageNotification()
    {
        $data['notifications'] = Message::whereAdmin_id(Auth::user()->id)->whereStatus(0)->get();
        return view('host.message-notification', $data)->render();
    }

    //notification count
    public function notificationCount()
    {
        return Message::whereAdmin_id(Auth::user()->id)->whereStatus(0)->count();
    }

    //notification content
    public function notification()
    {
        $data['notifications'] = Message::whereAdmin_id(Auth::user()->id)->whereStatus(0)->get();
        return view('host.message-notification', $data)->render();
    }



    


}
