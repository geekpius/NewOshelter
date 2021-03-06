<?php

namespace App\Http\Controllers;

use App\User;
use App\PaymentModel\Transaction;
use App\Package;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Http\Traits\SMSTrait;

class PaymentController extends Controller
{
    use SMSTrait;

    private $channel;
    private $checkIn;
    private $checkOut;

    public function __construct()
    {
        $this->middleware('verify-user');
        $this->middleware('auth');
    }


    public function index()
    {
        $data['page_title'] = 'Subscription packages';
        $data['packages'] = Package::where('package_name', '!=', 'default')->get();
        return view('user.payments.index', $data);
    }


    public function show($externalId)
    {
        $package = Package::where('external_id', $externalId)->first();
        if(!$package) abort(404);

        $data['page_title'] = $package->package_name.' package selected';
        $data['package'] = $package;
        return view('user.payments.show', $data);
    }




    private function setPaymentChannel($channel): void
    {
        $this->channel = $channel;
    }

    private function getPaymentChannel(): string
    {
        return $this->channel;
    }

    private function setCheckIn($checkIn): void
    {
        $this->checkIn = $checkIn;
    }

    private function getCheckIn(): string
    {
        return $this->checkIn;
    }

    private function setCheckOut($checkOut): void
    {
        $this->checkOut = $checkOut;
    }

    private function getCheckOut(): string
    {
        return $this->checkOut;
    }

    public function isBookingAlreadyPaid(Request $request, Booking $booking): string
    {
        if($booking->status == Booking::DONE){
            return 'paid';
        }
        return 'not paid';
    }

    public function isHostelBookingAlreadyPaid(Request $request, HostelBooking $hostelBooking): string
    {
        if($hostelBooking->status == HostelBooking::DONE){
            return 'paid';
        }
        return 'not paid';
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
            "Authorization: Bearer sk_live_00327e2757a1b063f0abc65f97e60b3f0d6ce8cb",
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

    private function saveUserVisit(int $id): void
    {
        $book = Booking::findOrFail($id);
        $book->status = 3;

        $stay = new UserVisit;
        $stay->user_id = Auth::user()->id;
        $stay->property_id = $book->property_id;
        $stay->booking_id = $book->id;
        $stay->check_in = $book->check_in;
        $stay->check_out = $book->check_out;
        $stay->adult = $book->adult;
        $stay->children = $book->children;
        $stay->infant = $book->infant;
        $stay->save();
        $book->update();
        $this->setCheckIn(Carbon::createFromFormat('Y-m-d', $stay->check_in)->format('d-M-Y'));
    }

    private function saveUserHostelVisit(int $id): void
    {
        $book = HostelBooking::findOrFail($id);
        $book->status = 3;

        $stay = new UserHostelVisit;
        $stay->user_id = Auth::user()->id;
        $stay->property_id = $book->property_id;
        $stay->hostel_booking_id = $book->id;
        $stay->hostel_block_room_id = $book->hostelBlockRoomNumber->hostelBlockRoom->id;
        $stay->hostel_block_room_number_id = $book->hostel_block_room_number_id;
        $stay->check_in = $book->check_in;
        $stay->check_out = $book->check_out;
        $stay->save();
        $this->setCheckIn(Carbon::createFromFormat('Y-m-d', $stay->check_in)->format('d-M-Y'));
        //place visitor in hostel room
        $roomNumber = HostelBlockRoomNumber::findOrFail($stay->hostel_block_room_number_id);
        $roomNumber->occupant = $roomNumber->occupant+1;
        if($roomNumber->occupant == $roomNumber->person_per_room){
            $roomNumber->full = true;
        }
        $roomNumber->update();
        $book->update();
    }

    private function transaction(int $transId, int $bookingID, string $propertyType): void
    {
        $bookTrans = new BookingTransaction;
        $bookTrans->transaction_id = $transId;
        $bookTrans->booking_id = $bookingID;
        $bookTrans->property_type = $propertyType;
        $bookTrans->save();
    }

    private function saveBookingTransaction(int $ownerID, string $referenceId, float $amount, float $serviceFee, float $discountFee, string $currency, string $propertyType, int $bookingID): string
    {
        (string) $message = "";
        try {
            DB::beginTransaction();
            $trans = new Transaction;
            $trans->user_id = Auth::user()->id;
            $trans->owner_id = $ownerID;
            $trans->reference_id = $referenceId;
            $trans->amount = $amount;
            $trans->service_fee = $serviceFee;
            $trans->discount_fee = $discountFee;
            $trans->currency = $currency;
            $trans->property_type = $propertyType;
            $trans->channel = $this->getPaymentChannel();
            $trans->save();

            $this->transaction($trans->id, $bookingID, $propertyType);

            if($propertyType == 'hostel'){
                $this->saveUserHostelVisit($bookingID);
            }else{
                $this->saveUserVisit($bookingID);
            }

            $wallet = new UserWallet;
            $wallet->user_id = $ownerID;
            $wallet->transaction_id = $trans->id;
            $wallet->balance = $amount;
            $wallet->currency = $currency;
            $wallet->type = 'booking';
            $wallet->save();
            DB::commit();
            $message = "success";
        } catch (\Exception $e) {
            DB::rollback();
            $message = "catch";
        }
        return $message;
    }

    private function saveExtensionTransaction(int $ownerID, string $referenceId, float $amount, float $serviceFee, float $discountFee, string $currency, string $propertyType, int $bookingID): string
    {
        (string) $message = "";
        try {
            DB::beginTransaction();
            $trans = new Transaction;
            $trans->user_id = Auth::user()->id;
            $trans->owner_id = $ownerID;
            $trans->reference_id = $referenceId;
            $trans->amount = $amount;
            $trans->service_fee = $serviceFee;
            $trans->discount_fee = $discountFee;
            $trans->currency = $currency;
            $trans->property_type = $propertyType;
            $trans->channel = $this->getPaymentChannel();
            $trans->save();

            $extensionTrans = new ExtensionTransaction;
            $extensionTrans->transaction_id = $trans->id;
            $extensionTrans->extension_id = $bookingID;
            $extensionTrans->property_type = $propertyType;
            $extensionTrans->save();

            $extensionRequest = UserExtensionRequest::findOrFail($bookingID);
            $extensionRequest->is_confirm = 3;
            if($extensionRequest->type == 'hostel'){
                $extensionRequest->hostelVisit()->update(['check_out'=> $extensionRequest->extension_date]);
                $this->setCheckOut(Carbon::createFromFormat('Y-m-d', $extensionRequest->hostelVisit->check_out)->format('d-M-Y'));
            }else{
                $extensionRequest->visit()->update(['check_out'=> $extensionRequest->extension_date]);
                $this->setCheckOut(Carbon::createFromFormat('Y-m-d', $extensionRequest->visit->check_out)->format('d-M-Y'));
            }
            $extensionRequest->update();

            $wallet = new UserWallet;
            $wallet->user_id = $ownerID;
            $wallet->transaction_id = $trans->id;
            $wallet->balance = $amount;
            $wallet->currency = $currency;
            $wallet->type = 'extension';
            $wallet->save();
            DB::commit();
            $message = "success";
        } catch (\Exception $e) {
            DB::rollback();
            $message = "catch".$e->getMessage();
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
                    if($request->type == 'extension_request'){
                        (string) $saveResponse = $this->saveExtensionTransaction(intval($request->owner), $request->reference_id, floatval($request->amount), floatval($request->service_fee), floatval($request->discount_fee), $request->currency, $request->type, intval($request->booking_id));
                        if($saveResponse == "success"){
                            $totalAmount = number_format(floatval($request->amount) + (floatval($request->service_fee)-floatval($request->discount_fee)), 2);
                            $checkOut = $this->getCheckOut();
                            $paymentChannel = $this->getPaymentChannel();
                            $smsMessage = "Payment of $request->currency$totalAmount has been made for $request->type via $paymentChannel. Reference#: $request->reference_id. Your check out date is $checkOut";
                            $this->isSendSMS($smsMessage, Auth::user()->phone);
                            $message = route('payment.success');
                        }else{
                            $message = $saveResponse;
                        }
                    }else{
                        (string) $saveResponse = $this->saveBookingTransaction(intval($request->owner), $request->reference_id, floatval($request->amount), floatval($request->service_fee), floatval($request->discount_fee), $request->currency, $request->type, intval($request->booking_id));
                        if($saveResponse == "success"){
                            $totalAmount = number_format(floatval($request->amount) + (floatval($request->service_fee)-floatval($request->discount_fee)), 2);
                            $checkIn = $this->getCheckIn();
                            $paymentChannel = $this->getPaymentChannel();
                            $smsMessage = "Payment of $request->currency$totalAmount has been made for $request->type booking via $paymentChannel. Reference#: $request->reference_id. Your check in date is $checkIn";
                            $this->isSendSMS($smsMessage, Auth::user()->phone);
                            $message = route('payment.success');
                        }else{
                            $message = $saveResponse;
                        }
                    }
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
        $data['transaction'] = Auth::user()->userTransactions->sortByDesc('id')->first();
        if(empty($data['transaction'])){
            return view('errors.404', $data);
        }
        return view('user.requests.payment_response', $data);
    }

    public function payment()
    {
        $data['page_title'] = 'My payments';
        return view('user.payments.payments', $data);
    }


}
