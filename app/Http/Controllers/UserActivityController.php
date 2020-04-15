<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserModel\UserActivity;
use Illuminate\Support\Facades\Auth;

class UserActivityController extends Controller
{
    public function __construct()
    {
        $this->middleware('verify-user');
        $this->middleware('auth');
    }


    //view account
    public function index()
    {
        $data['page_title'] = 'My account activities';
        $data['activites'] = UserActivity::whereUser_id(Auth::user()->id)->get();
        return view('app.activities', $data);
    }

    

}
