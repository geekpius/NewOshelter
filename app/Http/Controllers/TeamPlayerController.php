<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class TeamPlayerController extends Controller
{
    public function __construct()
    {
        $this->middleware('verify-admin');
        $this->middleware('auth:admin');
    }


    //show all tenants
    public function tenant()
    {
        $data['page_title'] = 'List Tenants';
        return view('host.tenants', $data);
    }

    public function tenantProperty(User $user)
    {
        $data['page_title'] =  $user->name.' Rented Properties';
        $data['user'] = $user;
        return view('host.rented-properties', $data);
    }
    

    public function buyer()
    {
        $data['page_title'] = 'List Buyers';
        return view('host.buyers', $data);
    }

    public function bidder()
    {
        $data['page_title'] = 'List Bidders';
        return view('host.bidders', $data);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
