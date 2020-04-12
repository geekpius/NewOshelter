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

    public function index()
    {
        $data['page_title'] = 'Properties saved';
        $data['lists'] = UserSavedProperty::whereUser_id(Auth::user()->id)->get(); 
        return view('app.saved', $data);
    }

    public function removeSaved(UserSavedProperty $userSavedProperty)
    {
        $userSavedProperty->delete();
        return redirect()->back();
    }

    //save property
    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'property_id' => 'required|string',
        ]);

        if ($validator->fails()){
            $message = 'fail';
        }
        else{
            if(auth()->check()){
                $save = new UserSavedProperty;
                $save->user_id = Auth::user()->id;
                $save->property_id = $request->property_id;
                $save->save();
                $message='success';
            }
            else{
                $message= 'auth';
            }
        }
        return $message;
    }

   
}
