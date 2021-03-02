<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\UserModel\UserWallet;
use Illuminate\Support\Facades\Auth;
use DB;
use Carbon\Carbon;
use App\PaymentModel\Withdraw;
use App\PaymentModel\MobileWithdraw;
use App\PaymentModel\BankWithdraw;

class UserWalletController extends Controller
{
    public function __construct()
    {
        $this->middleware('verify-user');
        $this->middleware('auth');
    }


    /*
     * display wallet
     */
    public function index()
    {
        $data['page_title'] = 'My wallet';
        return view('user.payments.wallet', $data);
    }

    public function withdrawWithMobile(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'wallet_id' => 'required',
            'balance' => 'required',
            'currency' => 'required',
            'payment_mode' => 'required',
        ]);

        (string) $message = "";
        if ($validator->fails()){
           return 'Input required failed.';
        }
        else{
            if($request->payment_mode == 'mobile_money'){
                try{
                    DB::beginTransaction();
                    $withdraw = new Withdraw;
                    $withdraw->user_wallet_id = $request->wallet_id;
                    $withdraw->reference_id = "VBW".Carbon::parse(now())->format('dmYHis');
                    $withdraw->amount = $request->balance;
                    $withdraw->currency = $request->currency;
                    $withdraw->channel = $request->payment_mode;
                    $withdraw->save();

                    $mobile = new MobileWithdraw;
                    $mobile->withdraw_id = $withdraw->id;
                    $mobile->phone_number = $request->phone_number;
                    $mobile->network_type = $request->network_type;
                    $mobile->account_name = $request->momo_account_name;
                    $mobile->save();

                    UserWallet::findOrFail($request->wallet_id)->update(['is_cash_out' => 1]);
                    DB::commit();
                    $message = "success";
                }catch(\Exception $e){
                    DB::rollback();
                    $message = 'Could not save your request';
                }
            }
            elseif($request->payment_mode == 'bank'){
                try{
                    DB::beginTransaction();
                    $withdraw = new Withdraw;
                    $withdraw->user_wallet_id = $request->wallet_id;
                    $withdraw->reference_id = "VBW".Carbon::parse(now())->format('dmYHis');
                    $withdraw->amount = $request->balance;
                    $withdraw->currency = $request->currency;
                    $withdraw->channel = $request->payment_mode;
                    $withdraw->save();

                    $bank = new BankWithdraw;
                    $bank->withdraw_id = $withdraw->id;
                    $bank->bank_name = $request->bank_name;
                    $bank->account_number = $request->account_number;
                    $bank->account_name = $request->account_name;
                    $bank->save();

                    UserWallet::findOrFail($request->wallet_id)->update(['is_cash_out' => 1]);
                    DB::commit();
                    $message = "success";
                }catch(\Exception $e){
                    DB::rollback();
                    $message = 'Could not save your request';
                }
            }
        }
        return $message;
    }

    
}
