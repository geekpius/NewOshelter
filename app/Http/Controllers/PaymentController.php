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

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('verify-user');
        $this->middleware('auth');
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

    public function mobilePaymentHostel(Request $request, HostelBooking $booking) :string
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

    public function mobilePaymentExtension(Request $request, UserExtensionRequest $userExtensionRequest) :string
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
            $orderId = $userExtensionRequest->generateOrderID();
            $payId = $userExtensionRequest->generatePaymentID();
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
                $trans->extension_id = $userExtensionRequest->id;
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
        $data['transaction'] = Transaction::whereTransaction_id($transactionId)->whereUser_id($user->id)->whereStatus(0)->orderBy('id', 'Desc')->first();
        return view('user.requests.payment_response', $data);
    }

}
