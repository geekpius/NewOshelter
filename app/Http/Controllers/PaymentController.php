<?php

namespace App\Http\Controllers;

use App\User;
use App\PaymentModel\Transaction;
use App\BookModel\Booking;
use App\BookModel\HostelBooking;
use App\UserModel\UserExtensionRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('verify-user');
        $this->middleware('auth');
    }

    public function getVerificationStatus(string $reference): string
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.paystack.co/transaction/verify/".rawurlencode($reference),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
            "Authorization: Bearer sk_test_ee00381ccce25247856e9620cd6a73b0ef7c6b22",
            "Cache-Control: no-cache",
            ),
        ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        
        if ($err) {
            return "error";
        } else {
            $results =  json_decode($response);
            return $results->data->status;
        }
    }


    public function verifyPayment(Request $request): string
    {
        $validator = \Validator::make($request->all(), [
            'reference_id' => 'required|string',
        ]);
            
        (string) $message = "";
        if ($validator->fails()){
            $message = 'fail';
        }else{
            try {
                $verificationStatus = $this->getVerificationStatus($request->reference_id);
                if($verificationStatus == 'success'){
                    // $message = route('')
                }else{

                }
            } catch (\Exception $e) {
                $message = 'Your payment could not be verified. Check your email if payment you have received payment notification.';
            }
        }
        return $message;
    }

    public function saveTransaction($typeId,$orderId,$payId,$amount,$serviceFee,$discountFee,$currency,$mobileOperator,$phoneNumber,$type)
    {
        $trans = new Transaction;
        $trans->user_id = Auth::user()->id;
        if($type == 'extension_request'){
            $trans->extension_id = $typeId;
        }else{
            $trans->booking_id = $typeId;
        }
        $trans->transaction_id = $orderId;
        $trans->payment_id = $payId;
        $trans->amount = $amount;
        $trans->service_fee = $serviceFee;
        $trans->discount_fee = $discountFee;
        $trans->currency = $currency;
        $trans->operator = $mobileOperator;
        $trans->phone = $phoneNumber;
        $trans->property_type = $type;
        $trans->type = "mobile";
        $trans->save();
    }
    
    // mobile payment
    public function mobilePayment(Request $request)
    {
        $this->validate($request, [
            'mobile_operator' => 'required|string',
            'country_code' => 'required|string',
            'mobile_number' => 'required|numeric',
            'amount' => 'required|numeric',
            'service_fee' => 'required|numeric',
            'discount_fee' => 'required|numeric',
            'currency' => 'required|string',
        ]);
                
        try {
            $invalidNumber = false;
            $country_code = substr($request->country_code, 1);
            if(substr($request->mobile_number, 0,1) == '0'){
                if(strlen($request->mobile_number) == 10){
                    $mobile_number = substr($request->mobile_number, 1);
                }else{
                    $invalidNumber = true;
                }
            }else{
                if(strlen($request->mobile_number) == 9){
                    $mobile_number = $request->mobile_number;
                }else{
                    $invalidNumber = true;
                }
            }
            if($invalidNumber){
                session()->flash('message', "Invalid phone number.");
            }else{
                $phoneNumber = $country_code.$mobile_number;
                $orderId = $this->generateOrderID();
                $payId = $this->generatePaymentID();
                $payable = ($request->amount+$request->service_fee)-$request->discount_fee;

                $sendPaymentRequest = $this->sendPaymentRequest($payable, $orderId, $request->mobile_operator,$phoneNumber);
                if($sendPaymentRequest){
                    $this->saveTransaction($request->booking_id,$orderId,$payId,$request->amount,$request->service_fee,$request->discount_fee,$request->currency,$request->mobile_operator,$phoneNumber,$request->type);
                    return redirect()->route('payment.mobile.response', ['transactionId' => $orderId, 'user' => Auth::user()->id, 'operator' => strtolower($request->mobile_operator)]);
                }else{
                    session()->flash('message', "Couldn't send payment request. Try again.");
                }
            }
        } catch (\Exception $e) {
            session()->flash('message', 'Something went wrong.');
        }    
        
        return redirect()->back();
    }

    public function mobileResponse($transactionId, User $user, $operator)
    {
        $data['page_title'] = 'Payment';
        $data['transaction'] = Transaction::whereTransaction_id($transactionId)->whereUser_id($user->id)->whereStatus(0)->orderBy('id', 'Desc')->first();
        return view('user.requests.payment_response', $data);
    }

}
