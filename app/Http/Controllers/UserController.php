<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MessageModel\Message;
use Illuminate\Support\Facades\Auth;
use App\PropertyModel\PropertyType;
use App\UserModel\UserExtensionRequest;
use App\BookModel\Booking;

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
        $data['count_properties'] = Auth::user()->properties->count();
        $data['count_wishlist'] = Auth::user()->userSavedProperties->count();
        $data['count_rent'] = Auth::user()->properties->where('type_status','rent')->count();
        $data['count_visited'] = Auth::user()->userVisits->count() + Auth::user()->userHostelVisits->count();
        $data['property_types'] = PropertyType::get(['name']);
        return view('admin.dashboard.index', $data);
    }

     

    //notification message count
    public function messageCount()
    {
        $countMessage = Message::whereUser_id(Auth::user()->id)->whereStatus(0)->count();
        $countBooking = Booking::whereOwner_id(Auth::user()->id)->whereStatus(1)->count();
        return $countMessage+$countBooking;
    }

    //notification messages
    public function messageNotification()
    {
        $data['notifications'] = Message::whereUser_id(Auth::user()->id)->whereStatus(0)->get();
        $data['bookings'] = Booking::whereOwner_id(Auth::user()->id)->whereStatus(1)->get();
        return view('admin.notifications.message-notification', $data)->render();
    }

    //notification count
    public function notificationCount()
    {
        return UserExtensionRequest::whereOwner_id(Auth::user()->id)->whereIs_confirm(0)->count();
    }

    //notification content
    public function notification()
    {
        $data['notifications'] = UserExtensionRequest::whereOwner_id(Auth::user()->id)->whereIs_confirm(0)->get();
        return view('admin.notifications.notification', $data)->render();
    }

    // requests
    public function requests()
    {
        $data['page_title'] = 'My requests';
        $data['bookings'] = Booking::whereUser_id(Auth::user()->id)->get();
        // $data['extensions'] = UserExtensionRequest::whereUser_id(Auth::user()->id)->whereIn('is_confirm', [1,2])->get();
        return view('admin.requests.index', $data)->render();
    }

    public function requestDetail(Booking $booking)
    {
        $data['page_title'] = 'Booking requests';
        $data['booking'] = $booking;
        return view('admin.requests.confirm', $data)->render();
    }

    public function requestConfirm(Booking $booking)
    {
        $message = '';
        if($booking->status == 1){
            $booking->status = 2;
            $booking->update();
            $message = 'success';
        }
        return $message;
    }

    public function requestCancel(Booking $booking)
    {
        $message = '';
        if($booking->status == 1){
            $booking->status = 0;
            $booking->update();
            $message = 'success';
        }
        return $message;
    }





    
}
