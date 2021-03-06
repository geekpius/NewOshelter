<?php

namespace App\Http\Controllers;

use DB;
use Image;
use App\User;
use Illuminate\Http\Request;
use App\UserModel\UserProfile;
use App\UserModel\UserCurrency;
use App\Currency;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('verify-user');
        $this->middleware('auth');
    }


    //view account
    public function index()
    {
        $data['page_title'] = 'My account';
        return view('user.account.index', $data);
    }

    public function accountInfo()
    {
        $data['page_title'] = current(explode(' ',Auth::user()->name)).' account info';
        return view('user.account.account_info', $data);
    }

    public function updateAccountInfo(Request $request): string
    {
        $validator = \Validator::make($request->all(), [
            'legal_name' => 'required|string',
            'gender' => 'required|string',
            'dob' => 'required|date',
            'marital_status' => 'required|string',
            'city' => 'required|string',
            'profession' => 'required|string',
            'emergency_contact' => 'required|string',
        ]);

        if ($validator->fails()){
            return 'fail';
        }else{
            $pro = User::FindorFail(Auth::user()->id);
            $pro->name= $request->legal_name;
            $pro->update();

            UserProfile::updateOrCreate(
                ['user_id'=>Auth::user()->id],
                [
                    'gender'=>$request->gender, 'dob'=>$request->dob, 'marital_status'=>$request->marital_status,
                    'city'=>$request->city, 'occupation'=>$request->profession, 'emergency'=>$request->emergency_contact
                ]
            );
            return "success";
        }
    }

    public function uploadProfilePhoto(Request $request): string
    {
        $validator = \Validator::make($request->all(), [
            'photo' => 'required|image|mimes:jpg,png,jpeg|max:1024',
        ]);
        if ($validator->fails()){
            $message = 'fail';
        }else{
            //upload image
            if($request->hasFile('photo')){
                try{
                    DB::beginTransaction();
                    $user = User::findorFail(Auth::user()->id);
                    $photo = $request->file('photo');
                    $name = sha1(date('YmdHis') . str_random(30));
                    $new_name = Auth::user()->id . $name . '.' . $photo->getClientOriginalExtension();
                    $location = 'assets/images/users/' . $new_name;
                    Image::make($photo)->resize(150, 150)->save($location);
                    //delete old photo
                    if(!empty($user->image)){
                        \File::delete("assets/images/users/".$user->image);
                    }
                    $user->image = $new_name;
                    $user->update();
                    DB::commit();
                    $message = $user->image;
                }catch(\Exception $e){
                    DB::rollback();
                    $message = 'error';
                }
            }
            else{
                $message = 'nophoto';
            }
        }

        return $message;

    }


    public function changePasswordView()
    {
        $data['page_title'] = 'Change password';
        return view('user.account.change_password', $data);
    }

    public function updatePassword(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'current_password' => 'required|string|min:6',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required|same:password',
        ]);

        if ($validator->fails()){
           return 'Wrong inputs(password mismatch). Try again.';
        }
        else{
            if(auth()->check()){
                if(Hash::check($request->current_password, Auth::user()->password))
                {
                    $user = User::findorFail(Auth::user()->id);
                    $user->password = Hash::make($request->password);
                    $user->update();
                    return 'success';
                }
                else
                {
                    return 'Incorrect current password.';
                }
            }
        }

    }

    public function loginsView()
    {
        $data['page_title'] = 'Logins and security';
        return view('user.account.login_details', $data);
    }

    public function paymentView()
    {
        $data['page_title'] = 'Payments';
        $data['currencies'] = Currency::all();
        return view('user.account.payments', $data);
    }

    public function changeCurrency(Request $request): string
    {
        $validator = \Validator::make($request->all(), [
            'currency' => 'required|string',
        ]);

        (string) $message = "";
        if ($validator->fails()){
            $message = 'fail';
        }else{
            $currency = UserCurrency::updateOrCreate(
                ['user_id'=>Auth::user()->id],
                ['currency'=>$request->currency]
            );
            $message = $currency->getCurrencyName();
        }

        return $message;
    }

    public function requestView()
    {
        $data['page_title'] = 'Requests and actions';
        return view('user.account.request', $data);
    }

    public function notificationView()
    {
        $data['page_title'] = 'Notifications';
        return view('user.account.notifications', $data);
    }

    public function uploadFrontCard(Request $request): string
    {
        $validator = \Validator::make($request->all(), [
            'front_file' => 'required|image|mimes:jpg,png,jpeg|max:1024',
        ]);

        (string) $message = "";
        if ($validator->fails()){
            $message = 'fail';
        }else{
            //upload image
            if($request->hasFile('front_file')){
                try{
                    DB::beginTransaction();
                    $user = UserProfile::whereUser_id(Auth::user()->id)->first();
                    $photo = $request->file('front_file');
                    $name = sha1(date('YmdHis') . str_random(30));
                    $new_name = Auth::user()->id . $name . '.' . $photo->getClientOriginalExtension();
                    $location = 'assets/images/cards/' . $new_name;
                    Image::make($photo)->resize(300, 200)->save($location);
                    //delete old photo
                    if(!empty($user)){
                        if(!empty($user->id_front)){
                            \File::delete("assets/images/cards/".$user->id_front);
                        }
                    }
                    $profile = UserProfile::updateOrCreate(
                        ['user_id'=>Auth::user()->id],
                        ['id_front'=>$new_name]
                    );

                    DB::commit();
                    $message = $profile->id_front;
                }catch(\Exception $e){
                    DB::rollback();
                    $message = 'error';
                }
            }
            else{
                $message = 'nophoto';
            }
        }

        return $message;

    }

    public function updateCardInfo(Request $request): string
    {
        $validator = \Validator::make($request->all(), [
            'id_type' => 'required',
            'id_number' => 'required',
        ]);

        (string) $message = "";

        if ($validator->fails()){
            $message = 'Input required failed.';
        }else{
            try{
                DB::beginTransaction();
                $profile = UserProfile::whereUser_id(Auth::user()->id)->first();
                $profile->id_number = $request->id_number;
                $profile->id_type = $request->id_type;
                $profile->update();
                DB::commit();
                $message = "success";
            }catch(\Exception $e){
                DB::rollback();
                $message = 'Could not update card info.';
            }
        }

        return $message;

    }





}
