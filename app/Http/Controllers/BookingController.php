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

use App\Mail\EmailSender;
use Illuminate\Support\Facades\Mail;
use App\Http\Traits\SMSTrait;

class BookingController extends Controller
{
    use SMSTrait; 
    
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
            return response()->json(array('data'=>'Not available. Room is full.', 'currency'=>'','price'=>'','calendar'=>'','isFull'=>'Yes', 'month'=>''));
        }
        else{
            $price = PropertyHostelPrice::whereHostel_block_room_id($room->id)->first();
            $left = $check->person_per_room - $check->occupant;
            $plural = ($left <= 1)? 'space available':'spaces available';
            return response()->json(array('data'=>$left.' '.$plural,'currency'=>(empty($price->currency)? '':$price->currency),'price'=>(empty($price->property_price)? '':$price->property_price),'calendar'=>(empty($price->price_calendar)? '':$price->price_calendar),'isFull'=>"No",'month'=>$price->payment_duration));
        }
    }

    //booking entry route
    public function index(Property $property,$checkin,$checkout,$guest,$filter_id)
    {
        if(Session::has('bookingItems')){
            $bookingItems = Session::get("bookingItems");
            if($bookingItems['property'] == $property->id){
                if($property->type == "hostel"){
                    if($property->is_active && $property->publish && $property->user_id != Auth::user()->id){
                        $data['page_title'] = 'Booking '.$property->title.' room';
                        $data['property'] = $property;
                        $data['my_room'] = HostelBlockRoom::whereProperty_hostel_block_id((int) $bookingItems['block_id'])
                        ->whereBlock_room_type($bookingItems['room_type'])->whereGender($bookingItems['gender'])->first();
                        $data['charge'] = ServiceCharge::whereProperty_type($property->type)->first();
            
                        $data['room_number'] = $data['my_room']->hostelBlockRoomNumbers->where('room_no',(int) $bookingItems['room_number'])->first();
                        
                        return view('user.bookings.index', $data);
                        
                    }else{
                        return view('errors.404');
                    }
                }else{
                    if($property->is_active && $property->publish && $property->user_id != Auth::user()->id && !$property->userVisits->where('status','!=',0)->count())
                    {
                        if($property->type_status == 'rent'){
                            $data['page_title'] = 'Booking '.$property->title;
                            $data['property'] = $property;
                            $data['charge'] = ServiceCharge::whereProperty_type($property->type)->first();
                            return view('user.bookings.index', $data);
                        }elseif($property->type_status == 'short_stay'){
                            $data['page_title'] = 'Booking '.$property->title;
                            $data['property'] = $property;
                            $data['charge'] = ServiceCharge::whereProperty_type($property->type)->first();
                            return view('user.bookings.index', $data);
                        }
                    }else{
                        return view('errors.404');
                    }                    
                }
            }else{
                return view('errors.404');
            }
        }else{
            return redirect()->route('single.property', $property->id);
        }
    } 
 
    // book a reservation
    public function book(Request $request)
    {
        if(auth()->check()){
            if($request->type == 'rent'){
                $this->validate($request, [
                    'duration' => 'required',
                    'adult'     => 'required|integer',
                    'children'  => 'required|integer',
                ]);    
                
                $checkIn = Carbon::now()->addDays(7)->toDateString();
                $checkOut = Carbon::now()->addDays(7)->addMonths((int) $request->duration)->toDateString();
                $bookingItems = collect([
                    "property"=>$request->property_id, 
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
            
            }
            elseif($request->type == 'short_stay'){
                $this->validate($request, [
                    'check_in' => 'required',
                    'check_out' => 'required',
                    'adult'     => 'required|integer',
                    'children'  => 'required|integer',
                    'infant'  => 'required|integer',
                ]);    
                
                $bookingItems = collect([
                    "property"=>$request->property_id, 
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
            elseif($request->type == 'hostel'){
                $this->validate($request, [
                    'duration' => 'required',
                    'block_name'     => 'required|string',
                    'gender'  => 'required|string',
                    'room_type'    => 'required|string',
                    'room_number'    => 'required|string',
                ]);  

                $checkIn = Carbon::now()->addDays(7)->toDateString();
                $checkOut = Carbon::now()->addDays(7)->addMonths((int) $request->duration)->toDateString();
                $bookingItems = collect([
                    "property"=>$request->property_id, 
                    "check_in"=>$checkIn,
                    "check_out"=>$checkOut,
                    "block_id"=>$request->block_name,
                    "gender"=>$request->gender,
                    "room_type"=>$request->room_type,
                    "room_number"=>$request->room_number,
                    "adult"=>1,
                    ]);
                Session::put('bookingItems', $bookingItems);
                Session::put('owner_message', '');
                $token = Str::random(32);
                (int) $step = 1;
                Session::put('step', $step);
                $guest = 1;
                
                return redirect()->route('property.bookings.index', ['property'=>$request->property_id, 'checkin'=>$checkIn, 'checkout'=>$checkOut, 'guest'=>$guest, 'filter_id'=>$token]);
            }
        }else{
            return redirect()->route('login');
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
            'phone_number' => 'required|string',
            'phone_prefix' => 'required|string',
        ]);

        (string)$message = '';
        if ($validator->fails()){
            $message = 'Missing request data';
        }else{
            $user = User::findOrFail(Auth::user()->id);
            (string) $phone = "0".$request->phone_number;
            if(User::where('id', '!=', Auth::user()->id)->wherePhone($phone)->exists()){
                $message = "Phone number is already taken by another user";
            }else{
                try {
                    if($user->phone==$phone){
                        $user->sms_verification_token = $user->generateSmsVerificationCode();
                        $user->update();
                        
                        $phoneNumber = $request->phone_prefix.$request->phone_number;
                        $smsMessage = "Your Oshelter verification code is: ".$user->sms_verification_token.". Don't share this code with anyone not even our employees.";
                        if($this->isSendSMS($smsMessage, $phoneNumber)){
                            $message='success';
                        }else{
                            $message = "Could not send verification code. Try again.";
                        }
                    }else{
                        $user->phone=$phone;
                        $user->sms_verification_token = $user->generateSmsVerificationCode();
                        $user->update();
        
                        $smsMessage = "Your Oshelter verification code is: ".$user->sms_verification_token.". Don't share this code with anyone not even our employees.";
                        if($this->isSendSMS($smsMessage, $phoneNumber)){
                            $message='success';
                        }else{
                            $message = "Could not send verification code. Try again.";
                        }
                    }
                } catch (\Exception $e) {
                    $message = 'Error occurred while sending sms';
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

    private function saveMessage(int $destination, string $msg, string $propertyDetail) : void
    {
        $message = new Message;
        $message->user_id = Auth::user()->id;
        $message->destination = $destination;
        $message->message = $msg.' <br>'.$propertyDetail;
        $message->save();
    }

    // confirm booking request
    public function bookingRequest(Request $request): string
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
            $message = 'Validation failed';
        }else{
            if($request->type == 'hostel'){
                if($request->book_status == 'rebook'){
                    $book = Auth::user()->userHostelBookings->where('property_id',$request->property_id)->where('hostel_block_room_number_id', $request->room_number_id)->where('room_number', $request->room_number)->where('status', 0)->sortByDesc('id')->first();
                    $book->check_in  = date("Y-m-d",strtotime($request->checkin));
                    $book->check_out  = date("Y-m-d",strtotime($request->checkout));
                    $book->room_number = $request->room_number;
                    $book->status  = 1;
                    $book->update();

                    if(Session::has('owner_message') && !empty(Session::get('owner_message'))){
                        (string) $msg = Session::get('owner_message');
                        (string) $detail = 'This is in regard to <a class="text-primary" target="_blank" href="'.route('single.property', $book->property->id).'">'.$book->property->title.'</a>';
                        $this->saveMessage(intval($book->property->user_id), $msg, $detail);
                    }
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

                    if(Session::has('owner_message') && !empty(Session::get('owner_message'))){
                        (string) $msg = Session::get('owner_message');
                        (string) $detail = 'This is in regard to <a class="text-primary" target="_blank" href="'.route('single.property', $book->property->id).'">'.$book->property->title.'</a>';
                        $this->saveMessage(intval($book->property->user_id), $msg, $detail);
                    }

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
                Session::forget('bookingItems');
                Session::forget('owner_message');
                Session::forget('step');
            }else{
                if($request->book_status == 'rebook'){
                    $book = Auth::user()->userBookings->where('property_id',$request->property_id)->where('status', 0)->sortByDesc('id')->first();
                    $book->check_in  = date("Y-m-d",strtotime($request->checkin));
                    $book->check_out  = date("Y-m-d",strtotime($request->checkout));
                    $book->adult  = $request->adult;
                    $book->children  = $request->child;
                    if($request->type_status == 'short_stay'){
                        $book->infant  = $request->infant;
                    }
                    $book->status  = 1;
                    $book->update();


                    if(Session::has('owner_message') && !empty(Session::get('owner_message'))){
                        (string) $msg = Session::get('owner_message');
                        (string) $detail = 'This is in regard to <a class="text-primary" target="_blank" href="'.route('single.property', $book->property->id).'">'.$book->property->title.'</a>';
                        $this->saveMessage(intval($book->property->user_id), $msg, $detail);
                    }

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
                    $book->owner_id = $request->owner;
                    $book->check_in = date("Y-m-d",strtotime($request->checkin));
                    $book->check_out = date("Y-m-d",strtotime($request->checkout));
                    $book->adult  = $request->adult;
                    $book->children  = $request->child;
                    if($request->type_status == 'short_stay'){
                        $book->infant  = $request->infant;
                    }
                    $book->save();

                    if(Session::has('owner_message') && !empty(Session::get('owner_message'))){
                        (string) $msg = Session::get('owner_message');
                        (string) $detail = 'This is in regard to <a class="text-primary" target="_blank" href="'.route('single.property', $book->property->id).'">'.$book->property->title.'</a>';
                        $this->saveMessage(intval($book->property->user_id), $msg, $detail);
                    }

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
                Session::forget('bookingItems');
                Session::forget('owner_message');
                Session::forget('step');
            }
        }

        return $message;        
    }


    public function exitBookingMode(Property $property)
    {      
        if(Session::has('bookingItems')){
            Session::forget('bookingItems');
            Session::forget('owner_message');
            Session::forget('step');
        }
       
        return redirect()->route('single.property', $property->id);
    }


    public function visitorBookingList()
    {      
        if(Auth::user()->account_type=='visitor'){
            $data['page_title'] = 'My bookings';
            return view('user.bookings.visitorbookings', $data);
        }else{
            return view('errors.404');
        }
    }



    



}
