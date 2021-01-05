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

    public function generateOrderID() : string
    {
        return Str::random(16);
    }

    public function generatePaymentID(int $length=10) : string
    {
        (string) $characters = '0123456789';
        (int) $charactersLength = strlen($characters);
        (string) $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function sendPaymentRequest($payable, $orderId, $mobileOperator, $phoneNumber): bool
    {
        $url = 'https://app.slydepay.com.gh/api/merchant/invoice/create';
        $params = [
            "emailOrMobileNumber" => "vibtechbusiness@gmail.com",
            "merchantKey" => "1593792958329",
            "amount" => $payable,
            "description" => "Property payment",
            "orderCode" => $orderId,
            "sendInvoice" => true,
            "payOption" => $mobileOperator,
            "customerName" => Auth::user()->name,
            "customerMobileNumber" => $phoneNumber         
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
        return $json->success == 1;
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
