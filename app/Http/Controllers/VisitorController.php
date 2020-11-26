<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PropertyModel\Property;
use App\PropertyModel\PropertyImage;
use App\PropertyModel\PropertyType;
use App\PropertyModel\PropertyReview;
use App\PropertyModel\PropertyReviewStar;
use App\UserModel\UserExtensionRequest;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\ServiceCharge;
use App\PaymentModel\Transaction;
use DB;


class VisitorController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('verify-user');
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['page_title'] = 'My visits';
        return view('admin.visits.index', $data);
    }

    public function upcoming()
    {
        $data['page_title'] = 'My upcoming visits';
        return view('admin.visits.upcoming', $data);
    }

    public function past()
    {
        $data['page_title'] = 'My past visits';
        return view('admin.visits.past', $data);
    }

    public function hostelUpcoming()
    {
        $data['page_title'] = 'My hostel upcoming visits';
        return view('admin.visits.hostels.upcoming', $data);
    }

    public function hostelPast()
    {
        $data['page_title'] = 'My hostel past visits';
        return view('admin.visits.hostels.past', $data);
    }



    /************ Extension Requests  **************/
    public function extensionRequests()
    {
        $data['page_title'] = 'Extension requestss';
        $data['extensions'] = UserExtensionRequest::whereUser_id(Auth::user()->id)->get();
        return view('admin.requests.date_extension', $data);
    }

    public function extendStay(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'extended_date' => 'required|string',
            'visit_id' => 'required|string',
            'owner' => 'required|string',
        ]);
        (string) $message= '';
        if ($validator->fails()){
            $message = 'Some inputs are missing.';
        }else{
            if(UserExtensionRequest::whereUser_id(Auth::user()->id)->whereVisit_id($request->visit_id)->whereIn('is_confirm', [1,2])->exists()){
                $message = "Already have pending extension request with this property visit.";
            }
            else{
                $extension = new UserExtensionRequest;
                $extension->user_id = Auth::user()->id;
                $extension->visit_id = $request->visit_id;
                $extension->owner_id = $request->owner;
                $extension->extension_date = Carbon::parse($request->extended_date)->format('Y-m-d');
                $extension->save();
                $message="success";
            }
        }
        return $message;
    }

    public function extensionDetail(UserExtensionRequest $userExtensionRequest)
    {
        $data['page_title'] = 'Extension date request from '.$userExtensionRequest->user->name;
        $data['extension'] = $userExtensionRequest;
        return view('admin.requests.extension-request', $data);
    }

    public function confirmExtendStay(UserExtensionRequest $userExtensionRequest)
    {
        $message = '';
        if($userExtensionRequest->is_confirm == 1){
            $userExtensionRequest->is_confirm = 2;
            $userExtensionRequest->update();
            $message = 'success';
        }
        return $message;
    }

    public function cancelExtendStay(UserExtensionRequest $userExtensionRequest)
    {
        $message = '';
        if($userExtensionRequest->is_confirm == 1){
            $userExtensionRequest->is_confirm = 0;
            $userExtensionRequest->update();
            $message = 'success';
        }
        return $message;
    }

    public function extensionPayment(UserExtensionRequest $userExtensionRequest)
    {
        if($userExtensionRequest->is_confirm == 2){
            $data['page_title'] = 'Extension payment requests';
            $data['extension'] = $userExtensionRequest;
            $data['charge'] = ServiceCharge::whereProperty_type($userExtensionRequest->visit->property->type)->first();
            return view('admin.requests.extension_payment', $data);
        }else{
            return view('errors.404');
        }
    }

     // mobile payment
    public function mobilePayment(Request $request, UserExtensionRequest $userExtensionRequest) :string
    {
        $validator = \Validator::make($request->all(), [
            'mobile_operator' => 'required|string',
            'country_code' => 'required|string',
            'mobile_number' => 'required|numeric',
            'payable_amount' => 'required|numeric',
            'currency' => 'required|string',
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
            $orderId = $userExtensionRequest->generateOrderID();
            $payId = $userExtensionRequest->generatePaymentID();

            $url = 'https://app.slydepay.com.gh/api/merchant/invoice/create';
            $params = [
                "emailOrMobileNumber" => "vibtechbusiness@gmail.com",
                "merchantKey" => "1593792958329",
                "amount" => $request->payable_amount,
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
                $trans->amount = $request->payable_amount;
                $trans->currency = $request->currency;
                $trans->operator = $request->mobile_operator;
                $trans->phone = $phone_number;
                $trans->type = $request->type;
                $trans->save();
                return redirect()->route('payment.mobile.response', ['transactionId' => $orderId, 'user' => Auth::user()->id, 'operator' => strtolower($request->mobile_operator)]);
            }else{
                return $json->errorMessage;
            }
        }      
    }
 
    public function rateProperty(Property $property)
    {
        $data['page_title'] = $property->title.' Ratings';
        $data['property'] = $property;
        return view('admin.visits.rate', $data);
    }

    public function submitRating(Request $request, Property $property)
    {
        $validator = \Validator::make($request->all(), [
            'comment' => 'required|string',
        ]);
        (string) $message= '';
        if ($validator->fails()){
            $message = 'Some inputs are missing.';
        }else{
            try {
                DB::beginTransaction();
                $review = new PropertyReview;
                $review->property_id = $property->id;
                $review->user_id = Auth::user()->id;
                $review->comment = $request->comment;
                $review->save();

                if(!empty($request->stars)){
                    foreach($request->stars as $star){
                        $review_star = new PropertyReviewStar;
                        $review_star->property_id = $property->id;
                        $review_star->location_star = $star;
                        $review_star->comm_star = $star;
                        $review_star->value_star = $star;
                        $review_star->accuracy_star = $star;
                        $review_star->tidy_star = $star;
                        $review_star->save();
                    }
                }
                DB::commit();
                $message = "success";
            } catch (\Exception $e) {
                DB::rollback();
                $message = "error";
            }
        }
        return $message;
    }
    



}
