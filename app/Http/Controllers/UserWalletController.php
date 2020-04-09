<?php

namespace App\Http\Controllers;

use App\UserModel\UserWallet;
use Illuminate\Http\Request;

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
        return view('app.wallet', $data);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UserModel\UserWallet  $userWallet
     * @return \Illuminate\Http\Response
     */
    public function show(UserWallet $userWallet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserModel\UserWallet  $userWallet
     * @return \Illuminate\Http\Response
     */
    public function edit(UserWallet $userWallet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserModel\UserWallet  $userWallet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserWallet $userWallet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserModel\UserWallet  $userWallet
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserWallet $userWallet)
    {
        //
    }
}
