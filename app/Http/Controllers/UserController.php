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

    public function show($externalId)
    {
        $rejection = RejectReason::where('external_id', $externalId)->first();
        if(!$rejection) abort(404);
        $data['page_title'] = $rejection->rejectedReasonType(). ' reason';
        $data['rejection'] = $rejection;
        if($rejection->status == RejectReason::NOT_READ){
            $rejection->update([
                'status' => RejectReason::READ,
            ]);
        }
        return view('user.notifications.show-rejection', $data);
    }

}
