<?php

namespace App\Http\Controllers;

use App\User;
use App\PaymentModel\Transaction;
use App\BookModel\Booking;
use App\BookModel\HostelBooking;
use App\UserModel\UserExtensionRequest;
use App\UserModel\UserVisit;
use App\UserModel\UserWallet;
use App\UserModel\UserHostelVisit;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    public $channel;

    public function __construct()
    {
        $this->middleware('verify-user');
        $this->middleware('auth');
    }

    private function setPaymentChannel($channel): void
    {
        $this->channel = $channel;
    }   

    private function getPaymentChannel(): string
    {
        return $this->channel;
    }

    public function getVerificationStatus(string $reference): bool
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
            return false;
        } else {
            $results =  json_decode($response);
            $this->setPaymentChannel($results->data->channel);
            return $results->data->status == 'success';
        }
    }

    public function saveTransaction($typeId,$referenceId,$amount,$serviceFee,$discountFee,$currency,$type): string
    {
        (string) $message = "";
        try {
            DB::beginTransaction();
            $trans = new Transaction;
            $trans->user_id = Auth::user()->id;
            if($type == 'extension_request'){
                $trans->extension_id = $typeId;
            }else{
                $trans->booking_id = $typeId;
            }
            $trans->reference_id = $referenceId;
            $trans->amount = $amount;
            $trans->service_fee = $serviceFee;
            $trans->discount_fee = $discountFee;
            $trans->currency = $currency;
            $trans->property_type = $type;
            $trans->channel = $this->getPaymentChannel();
            $trans->save();

            if($type == 'hostel'){
                $book = HostelBooking::findOrFail($trans->booking_id);
                $book->status = 3;

                $stay = new UserHostelVisit;
                $stay->user_id = Auth::user()->id;
                $stay->property_id = $book->property_id;
                $stay->hostel_block_room_id = $book->hostelBlockRoomNumber->hostelBlockRoom->id;
                $stay->hostel_block_room_number_id = $book->hostel_block_room_number_id;
                $stay->check_in = $book->check_in;
                $stay->check_out = $book->check_out;
                $stay->save();
                $book->update();
            }
            elseif($type == 'extension_request'){
                $extend = UserExtensionRequest::findOrFail($trans->extension_id);
                $extend->is_confirm = 3;
                if($extend->type == 'hostel'){
                    $extend->hostelVisit()->update(['check_out'=> $extend->extension_date]);
                }else{
                    $extend->visit()->update(['check_out'=> $extend->extension_date]);
                }
                $extend->update();
            }else{
                $book = Booking::findOrFail($trans->booking_id);
                $book->status = 3;

                $stay = new UserVisit;
                $stay->user_id = Auth::user()->id;
                $stay->property_id = $book->property_id;
                $stay->check_in = $book->check_in;
                $stay->check_out = $book->check_out;
                $stay->adult = $book->adult;
                $stay->children = $book->children;
                $stay->infant = $book->infant;
                $stay->save();
                $book->update();
            }
            
            DB::commit();
            $message = "success";
        } catch (\Exception $e) {
            DB::rollback();
            $message = "catch";
            // dd($e->getMessage());
        }
        return $message;
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
                (bool) $verificationStatus = $this->getVerificationStatus($request->reference_id);
                if($verificationStatus){
                    (string) $saveResponse = $this->saveTransaction($request->booking_id, $request->reference_id, $request->amount, $request->service_fee, $request->discount_fee, $request->currency, $request->type);
                    $message = ($saveResponse == "success")? route('payment.success'):$saveResponse;
                }else{
                    $message = 'error';
                }
            } catch (\Exception $e) {
                $message = 'catch';
            }
        }
        return $message;
    }

    public function successTrasaction()
    {
        $data['page_title'] = 'Payment successful';
        $data['transaction'] = Auth::user()->transactions->sortByDesc('id')->first();
        if(empty($data['transaction'])){
            return view('errors.404', $data);
        }
        return view('user.requests.payment_response', $data);
    }

}
