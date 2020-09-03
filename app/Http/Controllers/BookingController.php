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
use App\PropertyModel\HostelBlockRoom;
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
        $room = HostelBlockRoom::whereProperty_hostel_block_id($request->block_id)->whereGender($request->gender)->whereBlock_room_type($request->room_type)->first();
        $roomNumbers = HostelBlockRoomNumber::whereHostel_block_room_id($room->id)->whereFull(false)->get(['id','room_no']);
        return response()->json($roomNumbers);
    }

    //check hostel room number availability
    public function checkRoomTypeAvailability(Request $request)
    {
        $room = HostelBlockRoom::whereProperty_hostel_block_id($request->block_id)->whereGender($request->gender)->whereBlock_room_type($request->room_type)->first();
        $check = HostelBlockRoomNumber::whereHostel_block_room_id($room->id)->whereRoom_no($request->room_number)->whereFull(false)->first();
        if(empty($check)){
            return response()->json(array('data'=>'Not available. Room is full.', 'currency'=>'','price'=>'','calendar'=>'','advance'=>'', 'month'=>''));
        }
        else{
            $price = PropertyHostelPrice::whereHostel_block_room_id($room->id)->first();
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
            return response()->json(array('data'=>$left.' '.$plural.' available','currency'=>(empty($price->currency)? '':$price->currency),'price'=>(empty($price->property_price)? '':$price->property_price),'calendar'=>(empty($price->price_calendar)? '':$price->price_calendar),'advance'=>$advance,'month'=>$price->payment_duration));
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
    
    public function hostelIndex(Property $property,$checkin,$checkout,$block_id,$gender,$room_type,$room_number,$filter_id)
    {
        $data['page_title'] = 'Booking '.$property->title;
        $data['property'] = $property;
        $data['check_in'] = $checkin;
        $data['check_out'] = $checkout;
        $data['block_id'] = $block_id;
        $data['gender'] = $gender;
        $data['room_type'] = $room_type;
        $data['room_number'] = $room_number;
        $data['my_room'] = HostelBlockRoom::whereProperty_hostel_block_id($block_id)->whereBlock_room_type($room_type)->whereGender($gender)->first();
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

            Session::put('owner_message', '');
            $token = Str::random(32);
            (int) $step = 1;
            Session::put('step', $step);
            return redirect()->route('property.bookings.index', ['property'=>$request->property_id, 'checkin'=>$request->check_in, 'checkout'=>$request->check_out, 'adult'=>$request->adult, 'children'=>$request->children, 'infant'=>$request->infant, 'filter_id'=>$token]);
        }else{
            return redirect()->route('login');
        }

    }

    //  book a reservation
    public function hostelBook(Request $request)
    {
        if(auth()->check()){
            $this->validate($request, [
                'check_in'  => 'required',
                'check_out' => 'required',
                'block_name'     => 'required|string',
                'gender'  => 'required|string',
                'room_type'    => 'required|string',
                'room_number'    => 'required|string',
            ]);    
            
            Session::put('owner_message', '');
            $token = Str::random(32);
            (int) $step = 1;
            Session::put('step', $step);
            return redirect()->route('property.bookings.hostel.index', ['property'=>$request->property_id, 'checkin'=>$request->check_in, 'checkout'=>$request->check_out, 'block_id'=>$request->block_name, 'gender'=>$request->gender, 'room_type'=>$request->room_type, 'room_number'=>$request->room_number, 'filter_id'=>$token]);
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

    // mobile payment
    public function mobilePayment(Request $request) :string
    {
        $validator = \Validator::make($request->all(), [
            'mobile_operator' => 'required|string',
            'country_code' => 'required|string',
            'mobile_number' => 'required|numeric',
            'amount' => 'required|numeric',
        ]);
        
        (string) $message = '';
        if ($validator->fails()){
            return 'fail';
            exit();
        }else{
            $country_code = substr($request->country_code, 1);
            if(substr($request->mobile_number, 0,1) == '0'){
                if(strlen($request->mobile_number)>10){
                    return 'Invalid phone number.';
                    exit();
                }elseif(strlen($request->mobile_number)<10){
                    return 'Invalid phone number.';
                    exit();
                }else{
                    $mobile_number = substr($request->mobile_number, 1);
                }
            }else{
                if(strlen($request->mobile_number)>9){
                    return 'Invalid phone number.';
                    exit();
                }elseif(strlen($request->mobile_number)<9){
                    return 'Invalid phone number.';
                    exit();
                }else{
                    $mobile_number = $request->mobile_number;
                }
            }

            $phone_number = $country_code.$mobile_number;
            $orderId = Carbon::now()->timestamp;

            $url = 'https://app.slydepay.com.gh/api/merchant/invoice/create';
            $params = [
                "emailOrMobileNumber" => "vibtechbusiness@gmail.com",
                "merchantKey" => "1593792958329",
                "amount" => $request->amount,
                "description" => "Property payment",
                "orderCode" => $orderId,
                "sendInvoice" => true,
                "payOption" => $request->mobile_operator,
                "customerName" => Auth::user()->name,
                "customerMobileNumber" => $phone_number         
            ];

            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS,  json_encode($params));
            curl_setopt($curl, CURLOPT_HTTPHEADER, [
                "Content-Type: application/json"
              ]);
            $response = curl_exec($curl);
            curl_close($curl);
            $json = json_decode($response);
            // $message = $response . PHP_EOL;
            // return  $json->success;
            // return $json->errorMessage;
            if($json->success == 1){
                return 'success';
            }else{
                return $json->errorMessage;
            }












        }      
    }

    



}
