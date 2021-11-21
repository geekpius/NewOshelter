<?php

namespace App\Http\Controllers;

use App\Events\SendSMSEvent;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\PropertyModel\Property;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\PropertyModel\PropertyHostelPrice;
use App\PropertyModel\HostelBlockRoom;
use App\PropertyModel\HostelBlockRoomNumber;

use App\Mail\EmailSender;
use Illuminate\Support\Facades\Mail;
use App\Http\Traits\SMSTrait;

class BookingController extends Controller
{
    use SMSTrait;

    public function __construct()
    {
        $this->middleware('verify-user')->except(['book']);
        $this->middleware('auth')->except(['book']);
    }

    //get hostel room number base on room type
    public function getBlockNames(Request $request)
    {
        $rooms = HostelBlockRoom::where('gender', $request->gender)->where('block_room_type', $request->room_type)->with('propertyHostelBlock')->get();

        return response()->json($rooms);
    }

    public function getRoomTypeNumber(Request $request)
    {
        $room = HostelBlockRoom::where('property_hostel_block_id', $request->block)->where('gender', $request->gender)->where('block_room_type', $request->room_type)->first();
        $roomNumbers = HostelBlockRoomNumber::whereHostel_block_room_id($room->id)->whereFull(false)->get(['id','room_no']);

        return response()->json([
            'rooms' => $roomNumbers,
            'price' => $room->propertyHostelPrice->property_price,
            'currency' => $room->propertyHostelPrice->currency,
            'duration' => $room->propertyHostelPrice->payment_duration
        ]);
    }


    //booking entry route
    public function index(Property $property, string $filter_id)
    {
        if(Session::has('bookingItems')){
            $bookingItems = Session::get("bookingItems");
            if($bookingItems['property'] == $property->id){
                if($property->isHostelPropertyType()){
                    if($property->isActive() && $property->isPublish() && $property->isPropertyApproved() && $property->user_id != Auth::user()->id){
                        $data['page_title'] = 'Booking '.$property->title;
                        $data['property'] = $property;
                        return view('user.bookings.index', $data);
                    }

                    return view('errors.404');

                }else{

                    if($property->isActive() && $property->isPublish() && $property->isPropertyApproved() && $property->user_id != Auth::user()->id && !$property->isPropertyTaken())
                    {
                        $data['page_title'] = 'Booking '.$property->title;
                        $data['property'] = $property;
                        return view('user.bookings.index', $data);
                    }

                    return view('errors.404');
                }
            }

            return view('errors.404');
        }

        return redirect()->route('single.property', $property->id);
    }



    private function booking(Request $request): RedirectResponse
    {
        $bookingItems = collect([
            "property"=>$request->property_id,
        ]);
        Session::put('bookingItems', $bookingItems);
        $token = Str::random(32);
        $step = 1;
        if($request->type == 'sale' || $request->type == 'auction'){
            $step = 2;
        }

        Session::put('step', $step);

        return redirect()->route('property.bookings.index', ['property'=>$request->property_id, 'filter_id'=>$token]);
    }



    // book a reservation
    public function book(Request $request)
    {
        if(auth()->check()){
            return $this->booking($request);
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

        (string) $message = '';
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

                        event(new SendSMSEvent($phoneNumber, $smsMessage));
                        $message = 'success';
                    }else{
                        $user->phone=$phone;
                        $user->sms_verification_token = $user->generateSmsVerificationCode();
                        $user->update();

                        $phoneNumber = $request->phone_prefix.$request->phone_number;
                        $smsMessage = "Your Oshelter verification code is: ".$user->sms_verification_token.". Don't share this code with anyone not even our employees.";

                        event(new SendSMSEvent($phoneNumber, $smsMessage));
                        $message = 'success';
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


    public function exitBookingMode(Property $property)
    {
        if(Session::has('bookingItems')){
            Session::forget('bookingItems');
            Session::forget('step');
        }

        return redirect()->route('single.property', $property->id);
    }








}
