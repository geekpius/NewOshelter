<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PropertyModel\Property;
use App\User;
use App\EventModel\AuctionEvent;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

use App\Mail\EmailSender;
use Illuminate\Support\Facades\Mail;
use App\Http\Traits\SMSTrait;

class AuctionEventController extends Controller
{
    use SMSTrait; 

    public function __construct()
    {
        $this->middleware('verify-user');
        $this->middleware('auth');
    }

    public function index(Property $property, $filter_id)
    {
        if(Session::has('bookingItems')){
            $bookingItems = Session::get("bookingItems");
            if($bookingItems['property'] == $property->id){
                if($property->type_status == "auction"){
                    if($property->is_active && $property->publish && $property->user_id != Auth::user()->id)
                    {
                        $data['page_title'] = 'Booking event for '.$property->title;
                        $data['property'] = $property;
                        return view('user.auctions.index', $data);
                    }else{
                        return view('errors.404');
                    } 
                }else{
                    return view('errors.404');         
                }
            }else{
                return view('errors.404');
            }
        }else{
            return redirect()->route('single.property', $property->id);
        }
    } 

    public function book(Request $request)
    {
        if(auth()->check()){
            if($request->type == 'auction'){
                $this->validate($request, [
                    'property_id' => 'required',
                    'type' => 'required',
                ]);    
                
                $bookingItems = collect([
                    "property"=>$request->property_id, 
                ]);
                Session::put('bookingItems', $bookingItems);
                (string) $token = Str::random(32);
                (int) $step = 1;
                Session::put('step', $step);

                return redirect()->route('property.event.index', ['property'=>$request->property_id, 'filter_id'=>$token]);
            
            }
        }else{
            return redirect()->route('login');
        }
    }

    public function moveNext(Request $request) : string
    {
        (string) $message="";
        if($request->step==1){
            (int) $step = $request->step+1;
            Session::put('step', $step);
            $message="success";
        }elseif($request->step==2){
            $message="success";
        }

        return $message;        
    }
  
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

    public function bookRequest(Request $request): string
    {
        $validator = \Validator::make($request->all(), [
            'property_id' => 'required',
            'owner' => 'required',
        ]);
        
        (string)$message ='';
        if ($validator->fails()){
            $message = 'Validation failed';
        }else{
            try {
                $event = new AuctionEvent;
                $event->user_id = Auth::user()->id;
                $event->property_id  = $request->property_id;
                $event->owner_id = $request->owner;
                $event->status = AuctionEvent::PENDING;
                $event->save();

                $message = "success";
                //send a text to the onwer
                $buyer = $event->user->name;
                $property = $event->property->title;
                $smsMessage = "$buyer is interested in your property($property). Oshelter is handling this client on your behalf. We will alert you when invitation is initiated. Thank you.";
                $this->isSendSMS($smsMessage, $event->owner->phone);

                $smsMessage2 = "Your interest in $property is under review. Oshelter will contact you soon ASAP for the necessary process. Thank you.";
                $this->isSendSMS($smsMessage2, $event->user->phone);
                Session::forget('bookingItems');
                Session::forget('step');
            } catch (\Exception $e) {
                $message = "Event booking request failed";
            }
        }

        return $message;        
    }


    public function exitOrderMode(Property $property)
    {      
        if(Session::has('bookingItems')){
            Session::forget('bookingItems');
            Session::forget('step');
        }
       
        return redirect()->route('single.property', $property->id);
    }


    public function visitorOrderList()
    {      
        if(Auth::user()->account_type=='visitor'){
            $data['page_title'] = 'My orders';
            return view('user.orders.visitororders', $data);
        }else{
            return view('errors.404');
        }
    }








}
