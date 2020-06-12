<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserModel\UserSavedProperty;
use Illuminate\Support\Facades\Auth;

class UserSavedPropertyController extends Controller
{
    public function __construct()
    {
        $this->middleware('verify-user');
        $this->middleware('auth');
    }

    public function wishList()
    {
        $data['page_title'] = 'Saved properties for wishlist';
        $data['lists'] = UserSavedProperty::whereUser_id(Auth::user()->id)->get(); 
        return view('app.wishlist', $data);
    }

    public function removeWishList(UserSavedProperty $userSavedProperty)
    {
        $userSavedProperty->delete();
        return redirect()->back();
    }

    //save property
    public function store(Request $request) : string
    {
        $validator = \Validator::make($request->all(), [
            'property_id' => 'required|string',
        ]);

        if ($validator->fails()){
            $message = 'fail';
        }
        else{
            if(auth()->check()){
                $wish_list = UserSavedProperty::whereUser_id(Auth::user()->id)->whereProperty_id($request->property_id);
                if($wish_list->count()>0){
                    $wish_list->delete();
                    $message='exist';
                }else{
                    $save = new UserSavedProperty;
                    $save->user_id = Auth::user()->id;
                    $save->property_id = $request->property_id;
                    $save->save();
                    $message='success';
                }
            }
            else{
                $message= 'auth';
            }
        }
        return $message;
    }

   
}
