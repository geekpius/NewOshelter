<?php

namespace App\Http\Controllers;

use DB;
use Image;
use App\User;
use Illuminate\Http\Request;
use App\UserModel\UserProfile;
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
        return view('guest.account', $data);
    }

    //update gender profiles
    public function updateGender(Request $request)
    {
        if(empty($request->value))
        {
            return 'error';
        }
        else{
            $profile = UserProfile::updateOrCreate(
                ['user_id'=>Auth::user()->id],
                ['gender'=>$request->value]
            );
            
            if($profile){
                return 'updated';
            }
            else{
                return 'error';
            }
        }
    }

    //update dob profiles
    public function updateDob(Request $request)
    {
        if(empty($request->value))
        {
            return 'error';
        }
        else{
            $profile = UserProfile::updateOrCreate(
                ['user_id'=>Auth::user()->id],
                ['dob'=>$request->value]
            );
            
            if($profile){
                return 'updated';
            }
            else{
                return 'error';
            }
        }
    }

    //update marital status profiles
    public function updateMaritalStatus(Request $request)
    {
        if(empty($request->value))
        {
            return 'error';
        }
        else{
            $profile = UserProfile::updateOrCreate(
                ['user_id'=>Auth::user()->id],
                ['marital_status'=>$request->value]
            );
            
            if($profile){
                return 'updated';
            }
            else{
                return 'error';
            }
        }
    }

    //update children profiles
    public function updateChildren(Request $request)
    {
        if(empty($request->value))
        {
            return 'error';
        }
        else{
            $profile = UserProfile::updateOrCreate(
                ['user_id'=>Auth::user()->id],
                ['children'=>$request->value]
            );
            
            if($profile){
                return 'updated';
            }
            else{
                return 'error';
            }
        }
    }

    ///update city profiles
    public function updateCity(Request $request)
    {
        if(empty($request->value))
        {
            return 'error';
        }
        else{
            $profile = UserProfile::updateOrCreate(
                ['user_id'=>Auth::user()->id],
                ['city'=>$request->value]
            );
            
            if($profile){
                return 'updated';
            }
            else{
                return 'error';
            }
        }
    }

    ///update occupation profiles
    public function updateOccupation(Request $request)
    {
        if(empty($request->value))
        {
            return 'error';
        }
        else{
            $profile = UserProfile::updateOrCreate(
                ['user_id'=>Auth::user()->id],
                ['occupation'=>$request->value]
            );
            
            if($profile){
                return 'updated';
            }
            else{
                return 'error';
            }
        }
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

    public function uploadProfilePhoto(Request $request)
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
                    $location = 'assets/images/tenants/' . $new_name;
                    Image::make($photo)->resize(150, 150)->save($location); 
                    //delete old photo
                    if(!empty($user->image)){
                        \File::delete("assets/images/tenants/".$user->image);
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


    
    
}
