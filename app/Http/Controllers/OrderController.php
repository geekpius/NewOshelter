<?php

namespace App\Http\Controllers;

use App\OrderModel\Order;
use App\PropertyModel\Property;
use App\User;
use App\MessageModel\Message;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

use App\Mail\EmailSender;
use Illuminate\Support\Facades\Mail;
use App\Http\Traits\SMSTrait;

class OrderController extends Controller
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
                if($property->type_status == "sale"){
                    if($property->is_active && $property->publish && $property->user_id != Auth::user()->id)
                    {
                        $data['page_title'] = 'Placing order for '.$property->title;
                        $data['property'] = $property;
                        return view('user.orders.index', $data);
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

    public function order(Request $request)
    {
        if(auth()->check()){
            if($request->type == 'sale'){
                $this->validate($request, [
                    'property_id' => 'required',
                    'type' => 'required',
                    'charge'     => 'required|integer',
                ]);    
                
                $bookingItems = collect([
                    "property"=>$request->property_id, 
                ]);
                Session::put('bookingItems', $bookingItems);
                Session::put('owner_message', '');
                (string) $token = Str::random(32);
                (int) $step = 1;
                Session::put('step', $step);

                return redirect()->route('property.order.index', ['property'=>$request->property_id, 'filter_id'=>$token]);
            
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
            Session::put('owner_message', $request->owner_message);
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


    private function saveMessage(int $destination, string $msg, string $propertyDetail) : void
    {
        $message = new Message;
        $message->user_id = Auth::user()->id;
        $message->destination = $destination;
        $message->message = $msg.' <br>'.$propertyDetail;
        $message->save();
    }

    public function orderRequest(Request $request): string
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
                $order = new Order;
                $order->user_id = Auth::user()->id;
                $order->property_id  = $request->property_id;
                $order->owner_id = $request->owner;
                $order->status = Order::PENDING;
                $order->save();

                if(Session::has('owner_message') && !empty(Session::get('owner_message'))){
                    (string) $msg = Session::get('owner_message');
                    (string) $detail = 'This is in regard to <a class="text-primary" target="_blank" href="'.route('single.property', $order->property->id).'">'.$order->property->title.'</a>';
                    $this->saveMessage(intval($order->property->user_id), $msg, $detail);
                }

                $message = "success";
                //send a text to the onwer
                $buyer = $order->user->name;
                $property = $order->property->title;
                $smsMessage = "$buyer is interested in your property($property). Oshelter is handling this client on your behalf. We will alert you when transaction is initiated. Thank you.";
                $this->isSendSMS($smsMessage, $order->owner->phone);

                $smsMessage2 = "Your interest in $property is under review. Oshelter will contact you soon for the necessary process. Thank you.";
                $this->isSendSMS($smsMessage2, $order->user->phone);

                //emailing
                // $data = array(
                //     "property" => $book->property->title,
                //     "link" => route('requests.detail', $book->id),
                //     "name" => current(explode(' ',$book->property->user->name)),
                //     "guest" => current(explode(' ',Auth::user()->name)),
                // );
                // Mail::to($book->property->user->email)->send(new EmailSender($data, 'Booking Request', 'emails.booking_request'));
                Session::forget('bookingItems');
                Session::forget('owner_message');
                Session::forget('step');
            } catch (\Exception $e) {
                $message = "Order request failed";
            }
        }

        return $message;        
    }


    public function exitOrderMode(Property $property)
    {      
        if(Session::has('bookingItems')){
            Session::forget('bookingItems');
            Session::forget('owner_message');
            Session::forget('step');
        }
       
        return redirect()->route('single.property', $property->id);
    }






}
