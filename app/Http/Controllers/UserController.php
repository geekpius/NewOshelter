<?php

namespace App\Http\Controllers;

use App\RejectReason;
use Illuminate\Http\Request;
use App\MessageModel\Message;
use Illuminate\Support\Facades\Auth;
use App\PropertyModel\PropertyType;
use App\UserModel\UserExtensionRequest;
use App\BookModel\Booking;
use App\BookModel\HostelBooking;
use App\ServiceCharge;


use App\Mail\EmailSender;
use Illuminate\Support\Facades\Mail;

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



    //notification count
    public function notificationCount()
    {
        return Auth::user()->countRejectedReasons();
    }

    //notification content
    public function notification()
    {
        $data['rejectReasons'] = RejectReason::where('user_id', Auth::user()->id)->where('status', RejectReason::NOT_READ)->get();
        return view('user.notifications.notification', $data)->render();
    }


    // booking requests
    public function requestDetail(Booking $booking)
    {
       if(Auth::user()->id == $booking->owner_id){
        $data['page_title'] = 'Booking requests';
        $data['booking'] = $booking;
        return view('user.requests.confirm', $data);
       }else{
        return view('errors.404');
       }
    }

    public function requestConfirm(Booking $booking)
    {
        if(Auth::user()->id == $booking->owner_id){
            $message = '';
            if($booking->status == 1){
                $booking->status = 2;
                $booking->update();
                $message = 'success';
                $data = array(
                    "title" => "BOOKING CONFIRMATION",
                    "property" => $booking->property->title,
                    "link" => route('requests.payment', $booking->id),
                    "status" => "confirmed",
                    "name" => current(explode(' ',$booking->user->name)),
                    "owner" => current(explode(' ',Auth::user()->name)),
                );
                Mail::to($booking->user->email)->send(new EmailSender($data, 'Booking Response', 'emails.booking_response'));
            }
            else{
                $message = "You have already serviced this visitor's booking";
            }
            return $message;
        }else{
            return 'You are unauthorized to confirm. \nLooks like property does not belongs to you.';
        }
    }

    public function requestCancel(Booking $booking)
    {
        if(Auth::user()->id == $booking->owner_id){
            $message = '';
            if($booking->status == 1){
                $booking->status = 0;
                $booking->update();
                $message = 'success';
                $data = array(
                    "title" => "BOOKING CANCELLATION",
                    "property" => $booking->property->title,
                    "link" => "",
                    "status" => "cancelled",
                    "name" => current(explode(' ',$booking->user->name)),
                    "owner" => current(explode(' ',Auth::user()->name)),
                );
                Mail::to($booking->user->email)->send(new EmailSender($data, 'Booking Response', 'emails.booking_response'));
            }else{
                $message = "You have already serviced this visitor's booking";
            }
            return $message;
        }else{
            return 'You are unauthorized to cancel. \nLooks like property does not belongs to you.';
        }
    }

    public function requestPayment(Booking $booking)
    {
        if(Auth::user()->id == $booking->user_id){
            if($booking->status == 2){
                $data['page_title'] = 'Payment requests';
                $data['booking'] = $booking;
                $data['charge'] = ServiceCharge::whereProperty_type($booking->property->type_status)->first();
                return view('user.requests.payment', $data);
            }else{
                return view('errors.404');
            }
        }else{
            return view('errors.404');
        }
    }


    // hostel booking requests

    public function hostelRequestDetail(HostelBooking $hostelBooking)
    {
       if(Auth::user()->id == $hostelBooking->owner_id){
        $data['page_title'] = 'Hostel booking requests';
        $data['booking'] = $hostelBooking;
        return view('user.requests.hostel_confirm', $data);
       }else{
        return view('errors.404');
       }
    }

    public function hostelRequestConfirm(HostelBooking $hostelBooking)
    {
        if(Auth::user()->id == $hostelBooking->owner_id){
            $message = '';
            if($hostelBooking->status == 1){
                $hostelBooking->status = 2;
                $hostelBooking->update();
                $message = 'success';
                $data = array(
                    "title" => "BOOKING CONFIRMATION",
                    "property" => $hostelBooking->property->title,
                    "link" => route('requests.payment', $hostelBooking->id),
                    "status" => "confirmed",
                    "name" => current(explode(' ',$hostelBooking->user->name)),
                    "owner" => current(explode(' ',Auth::user()->name)),
                );
                Mail::to($hostelBooking->user->email)->send(new EmailSender($data, 'Booking Response', 'emails.booking_response'));
            }
            else{
                $message = "You have already serviced this visitor's booking";
            }
            return $message;
        }else{
            return 'You are unauthorized to confirm. \nLooks like property does not belongs to you.';
        }
    }

    public function hostelRequestCancel(HostelBooking $hostelBooking)
    {
        if(Auth::user()->id == $hostelBooking->owner_id){
            $message = '';
            if($hostelBooking->status == 1){
                $hostelBooking->status = 0;
                $hostelBooking->update();
                $message = 'success';
                $data = array(
                    "title" => "BOOKING CANCELLATION",
                    "property" => $hostelBooking->property->title,
                    "link" => "",
                    "status" => "cancelled",
                    "name" => current(explode(' ',$hostelBooking->user->name)),
                    "owner" => current(explode(' ',Auth::user()->name)),
                );
                Mail::to($hostelBooking->user->email)->send(new EmailSender($data, 'Booking Response', 'emails.booking_response'));
            }
            else{
                $message = "You have already serviced this visitor's booking";
            }
            return $message;
        }else{
            return 'You are unauthorized to confirm. \nLooks like property does not belongs to you.';
        }
    }

    public function hostelRequestPayment(HostelBooking $hostelBooking)
    {
        if(Auth::user()->id == $hostelBooking->user_id){
            if($hostelBooking->status == 2){
                $data['page_title'] = 'Payment requests';
                $data['booking'] = $hostelBooking;
                $data['charge'] = ServiceCharge::whereProperty_type($hostelBooking->property->type_status)->first();
                return view('user.requests.payment', $data);
            }else{
                return view('errors.404');
            }
        }else{
            return view('errors.404');
        }
    }


}
