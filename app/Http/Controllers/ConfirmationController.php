<?php

namespace App\Http\Controllers;

use App\UserModel\Confirmation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Carbon\Carbon;
use App\User;
use App\UserModel\UserWallet;
use App\Http\Traits\PermissionTrait;

class ConfirmationController extends Controller
{
    use PermissionTrait; 

    public function __construct()
    {
        $this->middleware('verify-user');
        $this->middleware('auth');
    }    
    
    public function index()
    {
        if(Auth::user()->account_type=='visitor'){
            $data['page_title'] = 'My confirmations';
            return view('user.bookings.visitorconfirmation', $data);
        }else{
            return view('errors.404');
        }
    }

    public function confirmStay(Request $request, User $user)
    {
        $validator = \Validator::make($request->all(), [
            'owner_id' => 'required',
            'visit_id' => 'required',
            'transaction_id' => 'required',
            'type' => 'required',
        ]);

        (string) $message = "";
        if(request()->ajax())
        {
            if ($validator->fails()){
               return 'Input required failed. Try again.';
            }else{
                if($this->isOwner($user->id)){
                    try{
                        DB::beginTransaction();
                        $confirmation = new Confirmation;
                        $confirmation->user_id = Auth::user()->id;
                        $confirmation->owner_id = $request->owner_id;
                        $confirmation->visit_id = $request->visit_id;
                        $confirmation->transaction_id = $request->transaction_id;
                        $confirmation->type = $request->type;
                        $confirmation->status = true;
                        $confirmation->save();
            
                        UserWallet::whereUser_id($confirmation->owner_id)->whereTransaction_id($confirmation->transaction_id)->update(['is_cash_out' => 1]);
                        DB::commit();
                        $message = "success";
                    }catch(\Exception $e){
                        DB::rollback();
                        $message = 'Could not save your request';
                    }
                }else{
                    $message = "You are unauthorized to perform this action.";
                }
            }
        }else{
            $message = 'Wrong server request';
        }

        return $message;        
    }

    public function cancelStay(Request $request, User $user)
    {
        (string) $message = "";
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
        return $message;
    }


}
