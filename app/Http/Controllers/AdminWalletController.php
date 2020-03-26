<?php

namespace App\Http\Controllers;

use App\AdminModel\AdminWallet;
use Illuminate\Http\Request;

class AdminWalletController extends Controller
{
    public function __construct()
    {
        $this->middleware('verify-admin');
        $this->middleware('auth:admin');
    }

    /**
     * display wallet
     */
    public function index()
    {
        $data['page_title'] = 'My Wallet';
        return view('host.wallet', $data);
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
     * @param  \App\AdminModel\AdminWallet  $adminWallet
     * @return \Illuminate\Http\Response
     */
    public function show(AdminWallet $adminWallet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AdminModel\AdminWallet  $adminWallet
     * @return \Illuminate\Http\Response
     */
    public function edit(AdminWallet $adminWallet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AdminModel\AdminWallet  $adminWallet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AdminWallet $adminWallet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AdminModel\AdminWallet  $adminWallet
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdminWallet $adminWallet)
    {
        //
    }
}
