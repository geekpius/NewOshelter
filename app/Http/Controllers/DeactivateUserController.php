<?php

namespace App\Http\Controllers;

use DB;
use App\User;
use Illuminate\Http\Request;
use App\UserModel\DeactivateUser;
use Illuminate\Support\Facades\Auth;

class DeactivateUserController extends Controller
{

    public function __construct()
    {
        $this->middleware('verify-user');
        $this->middleware('auth');
    }


    //view deactivate account 
    public function index()
    {
        $data['page_title'] = 'Deactivate account';
        return view('admin.accounts.deactivate', $data);
    }

    //submit for deactivation
    public function submitDeactivate(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'reason' => 'required|string',
        ]);

        if ($validator->fails()){
        $message= 'Wrong inputs. Try again.';
        }
        else{
            try{
                DB::beginTransaction();
                $user = User::findOrFail(Auth::user()->id);
                $user->active=0;
                $user->update();
                $deactivate = new DeactivateUser;
                $deactivate->user_id  = Auth::user()->id;
                $deactivate->reason = ($request->other_reason=='none')? $request->reason: $request->other_reason;
                $deactivate->save();
                DB::commit();
                $message = "success";
            }catch(\Exception $e){
                DB::rollback();
                $message = 'Something went wrong';
            }
            
        }
        return $message;
        
    }


     
}
