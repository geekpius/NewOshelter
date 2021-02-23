<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\UserModel\UserWallet;
use Illuminate\Support\Facades\Auth;

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
        return view('admin.wallet.index', $data);
    }

    
}
