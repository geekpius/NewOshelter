<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;
use App\AdminModel\AdminProfile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use DB;
use Image;

class AdminProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('verify-admin');
        $this->middleware('auth:admin');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['page_title'] = 'My account';
        $data['user'] = Admin::findorFail(Auth::user()->id);
        return view('host.account', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function updateDob(Request $request)
    {
        if(empty($request->value))
        {
            return 'error';
        }
        else{
            $profile = AdminProfile::updateOrCreate(
                ['admin_id'=>Auth::user()->id],
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

    public function updateCity(Request $request)
    {
        if(empty($request->value))
        {
            return 'error';
        }
        else{
            $profile = AdminProfile::updateOrCreate(
                ['admin_id'=>Auth::user()->id],
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

    public function updateOccupation(Request $request)
    {
        if(empty($request->value))
        {
            return 'error';
        }
        else{
            $profile = AdminProfile::updateOrCreate(
                ['admin_id'=>Auth::user()->id],
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

    public function updateBusiness(Request $request)
    {
        if(empty($request->value))
        {
            return 'error';
        }
        else{
            $profile = AdminProfile::updateOrCreate(
                ['admin_id'=>Auth::user()->id],
                ['business_name'=>$request->value]
            );
            
            if($profile){
                return 'updated';
            }
            else{
                return 'error';
            }
        }
    }

    public function updateDescription(Request $request)
    {
        if(empty($request->value))
        {
            return 'error';
        }
        else{
            $profile = AdminProfile::updateOrCreate(
                ['admin_id'=>Auth::user()->id],
                ['description'=>$request->value]
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
                    $user = Admin::findorFail(Auth::user()->id);
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
                    $user = Admin::findorFail(Auth::user()->id);
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




}
