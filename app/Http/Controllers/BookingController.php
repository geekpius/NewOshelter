<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\MessageModel\Message;
use App\PropertyModel\Property;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\PropertyModel\PropertyHostelPrice;
use App\PropertyModel\HostelBlockRoomNumber;

class BookingController extends Controller
{
    public function __construct()
    {
        $this->middleware('verify-user')->except(['getRoomTypeNumber', 'checkRoomTypeAvailability', 'book']);
        $this->middleware('auth')->except(['getRoomTypeNumber', 'checkRoomTypeAvailability', 'book']);
    }

    //get hostel room number base on room type
    public function getRoomTypeNumber(Request $request)
    {
        $rooms = HostelBlockRoomNumber::whereHostel_block_room_id($request->room_type)->whereFull(false)->get(['id','room_no']);
        return response()->json($rooms);
    }

    //check hostel room number availability
    public function checkRoomTypeAvailability(Request $request)
    {
        $check = HostelBlockRoomNumber::whereHostel_block_room_id($request->room_type)->whereRoom_no($request->room_number)->whereFull(false)->first();
        if(empty($check)){
            return response()->json(array('data'=>'Not available. Room is full.', 'currency'=>'','price'=>'','calendar'=>'','advance'=>''));
        }
        else{
            $price = PropertyHostelPrice::whereHostel_block_room_id($request->room_type)->first();
            $left = $check->person_per_room - $check->occupant;
            $plural = ($left==1)? 'space':'spaces';
            $advance ='';
            if(empty($price->payment_duration)){
                $advance='';
            }
            else{
                if($price->payment_duration==1){
                    $advance='1 month advance payment';
                }
                elseif($price->payment_duration==12){
                    $advance='1 year advance payment';
                }else{
                    $advance= $price->payment_duration.' months advance payment';
                }
            }
            return response()->json(array('data'=>$left.' '.$plural.' available','currency'=>(empty($price->currency)? '':$price->currency),'price'=>(empty($price->property_price)? '':$price->property_price),'calendar'=>(empty($price->price_calendar)? '':$price->price_calendar),'advance'=>$advance));
        }
    }
 
    public function index(Property $property,$checkin,$checkout,$adult,$children,$infant,$filter_id)
    {
        $data['page_title'] = 'Booking '.$property->title;
        $data['property'] = $property;
        $data['check_in'] = $checkin;
        $data['check_out'] = $checkout;
        $data['adult'] = $adult;
        $data['children'] = $children;
        $data['infant'] = $infant;
        return view('admin.bookings.index', $data);
    }     

    //move from review, verify and payment
    public function moveNext(Request $request) : string
    {
        (string) $message="";
        if($request->step==1){
            (int) $step = $request->step+1;
            Session::put('step', $step);
            $message="success";
        }elseif($request->step==2){
            (int) $step = $request->step+1;
            Session::put('step', $step);
            Session::put('owner_message', $request->owner_message);
            $message="success";
        }elseif($request->step==3){
            $message="success";
        }

        return $message;        
    }
  
    // book a reservation
    public function book(Request $request)
    {
        if(auth()->check()){
            $this->validate($request, [
                'check_in'  => 'required',
                'check_out' => 'required',
                'adult'     => 'required|integer',
                'children'  => 'required|integer',
                'infant'    => 'required|integer',
            ]);    
            $token = Str::random(32);
            (int) $step = 1;
            Session::put('step', $step);
            return redirect()->route('property.bookings.index', ['property'=>$request->property_id, 'checkin'=>$request->check_in, 'checkout'=>$request->check_out, 'adult'=>$request->adult, 'children'=>$request->children, 'infant'=>$request->infant, 'filter_id'=>$token]);
        }else{
            return redirect()->route('login');
        }

    }

    // send sms verification code if not verified
    public function sendSmsVerification(Request $request ) : string
    {
        $validator = \Validator::make($request->all(), [
            'phone_number' => 'required|numeric',
        ]);

        (string)$message = '';
        if ($validator->fails()){
            $message = 'fail';
        }else{
            $user = User::findOrFail(Auth::user()->id);
            $code = new User;
            if($user->phone==$request->phone_number){
                $user->sms_verification_token = $code->generateSmsVerificationCode();
                $user->update();

                //send sms verification code
                $message='success';
            }else{
                $user->phone=$request->phone_number;
                $user->sms_verification_token = $code->generateSmsVerificationCode();
                $user->update();

                //send sms verification code
                $message='success';
            }
        }

        return $message;

    }

    // verify code sent from the sms
    public function verify(Request $request) :string
    {
        $validator = \Validator::make($request->all(), [
            'verify_code' => 'required|numeric',
        ]);
        
        (string)$message ='';
        if ($validator->fails()){
            $message = 'fail';
        }else{
            $user = User::findOrFail(Auth::user()->id);
            if ($user->sms_verification_token==$request->verify_code) {
                $user->verify_sms = true;
                $user->verify_sms_time = Carbon::now();
                $user->update();
                $message = 'success';
            } else {
                $message = 'Invalid phone verification code.';
            }
        }

        return $message;        
    }

    



}
