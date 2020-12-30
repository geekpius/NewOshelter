<?php

namespace App\Http\Controllers;

use App\User;
use App\ServiceCharge;
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
use App\BookModel\Booking;
use App\BookModel\HostelBooking;
use App\PaymentModel\Transaction;

use App\Mail\EmailSender;
use Illuminate\Support\Facades\Mail;
use App\SMS\SMS;

class BookingController extends Controller
{
    public function __construct()
    {
        $this->middleware('verify-user')->except(['getRoomTypeNumber', 'checkRoomTypeAvailability']);
        $this->middleware('auth')->except(['getRoomTypeNumber', 'checkRoomTypeAvailability']);
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

    //booking entry route
    public function index(Property $property,$checkin,$checkout,$guest,$filter_id)
    {
        if($property->type == "hostel"){

        }else{
            if($property->type_status === 'rent'){
                if($property->is_active && $property->user_id != Auth::user()->id && !$property->userVisits->where('status','!=',0)->count()){
                    $data['page_title'] = 'Booking '.$property->title;
                    $data['property'] = $property;
                    $data['charge'] = ServiceCharge::whereProperty_type($property->type)->first();
                    return view('user.bookings.index', $data);
                }else{
                    return view('errors.404');
                }
            }elseif($property->type_status === 'short_stay'){
                if($property->is_active && $property->user_id != Auth::user()->id && !$property->userVisits->where('status','!=',0)->count()){
                    $data['page_title'] = 'Booking '.$property->title;
                    $data['property'] = $property;
                    $data['charge'] = ServiceCharge::whereProperty_type($property->type)->first();
                    return view('user.bookings.index', $data);
                }else{
                    return view('errors.404');
                }
            }
        }
    } 
 
    // book a reservation
    public function book(Request $request)
    {
        if(auth()->check()){
            if($request->type === 'rent'){
                $this->validate($request, [
                    'duration' => 'required',
                    'adult'     => 'required|integer',
                    'children'  => 'required|integer',
                ]);    
                
                $checkIn = Carbon::now()->addDays(7)->toDateString();
                $checkOut = Carbon::now()->addDays(7)->addMonths((int) $request->duration)->toDateString();
                $bookingItems = collect([
                    "duration"=>$request->duration, 
                    "check_in"=>$checkIn,
                    "check_out"=>$checkOut,
                    "adult"=>$request->adult,
                    "children"=>$request->children
                    ]);
                Session::put('bookingItems', $bookingItems);
                Session::put('owner_message', '');
                $token = Str::random(32);
                (int) $step = 1;
                Session::put('step', $step);
                $guest = (int) $request->adult + (int) $request->children;

                return redirect()->route('property.bookings.index', ['property'=>$request->property_id, 'checkin'=>$checkIn, 'checkout'=>$checkOut, 'guest'=>$guest, 'filter_id'=>$token]);
            
            }elseif($request->type === 'short_stay'){
                $this->validate($request, [
                    'check_in' => 'required',
                    'check_out' => 'required',
                    'adult'     => 'required|integer',
                    'children'  => 'required|integer',
                    'infant'  => 'required|integer',
                ]);    
                
                $bookingItems = collect([
                    "check_in"=>$request->check_in,
                    "check_out"=>$request->check_out,
                    "adult"=>$request->adult,
                    "children"=>$request->children,
                    "infant"=>$request->infant
                    ]);
                Session::put('bookingItems', $bookingItems);
                Session::put('owner_message', '');
                $token = Str::random(32);
                (int) $step = 1;
                Session::put('step', $step);
                $guest = (int) $request->adult + (int) $request->children + (int) $request->infant;

                return redirect()->route('property.bookings.index', ['property'=>$request->property_id, 'checkin'=>$request->check_in, 'checkout'=>$request->check_out, 'guest'=>$guest, 'filter_id'=>$token]);
            }
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

 
    
    public function hostelIndex(Property $property,$checkin,$checkout,$block_id,$gender,$room_type,$room_number,$filter_id)
    {
        if($property->is_active && $property->user_id != Auth::user()->id){
            $data['page_title'] = 'Booking '.$property->title;
            $data['property'] = $property;
            $data['check_in'] = $checkin;
            $data['check_out'] = $checkout;
            $data['block_id'] = $block_id;
            $data['gender'] = $gender;
            $data['room_type'] = $room_type;
            $data['my_room'] = HostelBlockRoom::whereProperty_hostel_block_id($block_id)->whereBlock_room_type($room_type)->whereGender($gender)->first();
            $data['charge'] = ServiceCharge::whereProperty_type($property->type)->first();

            $data['room_number'] = $data['my_room']->hostelBlockRoomNumbers->where('room_no', $room_number)->first();
            if(empty($data['room_number'])){
                return view('errors.404');
            }elseif($data['room_number']->full){
                return view('errors.404');
            }else{
                return view('admin.bookings.index', $data);
            }
        }else{
            return view('errors.404');
        }
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
            (string) $phone = "0".$request->phone_number;
            if(User::where('id', '!=', Auth::user()->id)->wherePhone($phone)->exists()){
                $message = "Phone number is already taken by another user";
            }else{
                if($user->phone==$phone){
                    $user->sms_verification_token = $user->generateSmsVerificationCode();
                    $user->update();
    
                    //send sms verification code
                    // $sms = new SMS("TEST", "0542398441", "Test message");
                    // $resp = $sms->send();
                    // dd($resp);
                    $message='success';
                }else{
                    $user->phone=$phone;
                    $user->sms_verification_token = $user->generateSmsVerificationCode();
                    $user->update();
    
                    //send sms verification code
                    $message='success';
                }
            }
        }

        return $message;

    }

    // verify code sent from the sms
    public function verifySmsNumber(Request $request) :string
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

    // confirm booking request
    public function bookingRequest(Request $request) :string
    {
        $validator = \Validator::make($request->all(), [
            'property_id' => 'required',
            'type' => 'required',
            'type_status' => 'required',
            'owner' => 'required',
            'checkin' => 'required',
            'checkout' => 'required',
        ]);
        
        (string)$message ='';
        if ($validator->fails()){
            $message = 'fail';
        }else{
            if($request->type == 'hostel'){
                if($request->book_status == 'rebook'){
                    $book = Auth::user()->userHostelBookings->where('property_id',$request->property_id)->where('hostel_block_room_number_id', $request->room_number_id)->where('room_number', $request->room_number)->where('status', 0)->sortByDesc('id')->first();
                    $book->check_in  = date("Y-m-d",strtotime($request->checkin));
                    $book->check_out  = date("Y-m-d",strtotime($request->checkout));
                    $book->room_number = $request->room_number;
                    $book->status  = 1;
                    $book->update();
                    $message = "success";
                    //emailing
                    $data = array(
                        "property" => $book->property->title,
                        "link" => route('requests.detail.hostel', $book->id),
                        "name" => current(explode(' ',$book->property->user->name)),
                        "guest" => current(explode(' ',Auth::user()->name)),
                    );
                    Mail::to($book->property->user->email)->send(new EmailSender($data, 'Booking Request', 'emails.booking_request'));
                }else{
                    $book = new HostelBooking;
                    $book->user_id = Auth::user()->id;
                    $book->property_id  = $request->property_id;
                    $book->owner_id  = $request->owner;
                    $book->hostel_block_room_number_id  = $request->room_number_id;
                    $book->room_number  = $request->room_number;
                    $book->check_in  = date("Y-m-d",strtotime($request->checkin));
                    $book->check_out  = date("Y-m-d",strtotime($request->checkout));
                    $book->save();
                    $message = "success";
                    //emailing
                    $data = array(
                        "property" => $book->property->title,
                        "link" => route('requests.detail.hostel', $book->id),
                        "name" => current(explode(' ',$book->property->user->name)),
                        "guest" => current(explode(' ',Auth::user()->name)),
                    );
                    Mail::to($book->property->user->email)->send(new EmailSender($data, 'Booking Request', 'emails.booking_request'));
                }
            }else{
                if($request->book_status == 'rebook'){
                    $book = Auth::user()->userBookings->where('property_id',$request->property_id)->where('status', 0)->sortByDesc('id')->first();
                    $book->check_in  = date("Y-m-d",strtotime($request->checkin));
                    $book->check_out  = date("Y-m-d",strtotime($request->checkout));
                    $book->adult  = $request->adult;
                    $book->children  = $request->child;
                    if($request->type_status === 'short_stay'){
                        $book->infant  = $request->infant;
                    }
                    $book->status  = 1;
                    $book->update();
                    $message = "success";
                    //emailing
                    $data = array(
                        "property" => $book->property->title,
                        "link" => route('requests.detail', $book->id),
                        "name" => current(explode(' ',$book->property->user->name)),
                        "guest" => current(explode(' ',Auth::user()->name)),
                    );
                    Mail::to($book->property->user->email)->send(new EmailSender($data, 'Booking Request', 'emails.booking_request'));
                }else{
                    $book = new Booking;
                    $book->user_id = Auth::user()->id;
                    $book->property_id  = $request->property_id;
                    $book->owner_id  = $request->owner;
                    $book->check_in  = date("Y-m-d",strtotime($request->checkin));
                    $book->check_out  = date("Y-m-d",strtotime($request->checkout));
                    $book->adult  = $request->adult;
                    $book->children  = $request->child;
                    if($request->type_status === 'short_stay'){
                        $book->infant  = $request->infant;
                    }
                    $book->save();
                    $message = "success";
                    //emailing
                    $data = array(
                        "property" => $book->property->title,
                        "link" => route('requests.detail', $book->id),
                        "name" => current(explode(' ',$book->property->user->name)),
                        "guest" => current(explode(' ',Auth::user()->name)),
                    );
                    Mail::to($book->property->user->email)->send(new EmailSender($data, 'Booking Request', 'emails.booking_request'));
                }
            }
        }

        return $message;        
    }

    // mobile payment
    public function mobilePayment(Request $request, Booking $booking) :string
    {
        $validator = \Validator::make($request->all(), [
            'mobile_operator' => 'required|string',
            'country_code' => 'required|string',
            'mobile_number' => 'required|numeric',
            'amount' => 'required|numeric',
            'service_fee' => 'required|numeric',
            'discount_fee' => 'required|numeric',
            'currency' => 'required|string',
        ]);
        
        (string) $message = '';
        if ($validator->fails()){
            return 'fail';
            exit();
        }else{
            $country_code = substr($request->country_code, 1);
            if(substr($request->mobile_number, 0,1) == '0'){
                if(strlen($request->mobile_number) == 10){
                    $mobile_number = substr($request->mobile_number, 1);
                }else{
                    return 'Invalid phone number.';
                    exit();
                }
            }else{
                if(strlen($request->mobile_number) == 9){
                    $mobile_number = $request->mobile_number;
                }else{
                    return 'Invalid phone number.';
                    exit();
                }
            }

            $phone_number = $country_code.$mobile_number;
            $orderId = $booking->generateOrderID();
            $payId = $booking->generatePaymentID();
            $payable = ($request->amount+$request->service_fee)-$request->discount_fee;

            $url = 'https://app.slydepay.com.gh/api/merchant/invoice/create';
            $params = [
                "emailOrMobileNumber" => "vibtechbusiness@gmail.com",
                "merchantKey" => "1593792958329",
                "amount" => $payable,
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
                $trans = new Transaction;
                $trans->user_id = Auth::user()->id;
                $trans->booking_id = $booking->id;
                $trans->transaction_id = $orderId;
                $trans->payment_id = $payId;
                $trans->amount = $request->amount;
                $trans->service_fee = $request->service_fee;
                $trans->discount_fee = $request->discount_fee;
                $trans->currency = $request->currency;
                $trans->operator = $request->mobile_operator;
                $trans->phone = $phone_number;
                $trans->property_type = $request->type;
                $trans->type = "mobile";
                $trans->save();
                return redirect()->route('payment.mobile.response', ['transactionId' => $orderId, 'user' => Auth::user()->id, 'operator' => strtolower($request->mobile_operator)]);
            }else{
                return $json->errorMessage;
            }
        }      
    }

    public function mobileResponse($transactionId, User $user, $operator)
    {
        $data['page_title'] = 'Payment';
        $data['transaction'] = Transaction::whereTransaction_id($transactionId)->whereUser_id($user->id)->whereStatus(false)->orderBy('id', 'Desc')->first();
        return view('user.requests.payment_response', $data);
    }


    



}
