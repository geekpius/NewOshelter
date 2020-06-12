<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class GuestController extends Controller
{

    public function __construct()
    {
        $this->middleware('verify-user');
        $this->middleware('auth');
    }


    //show all tenants
    public function tenant()
    {
        $data['page_title'] = 'List tenants';
        return view('app.tenants', $data);
    }

    public function tenantRentedProperty(User $user)
    {
        $data['page_title'] =  $user->name.' Rented properties';
        $data['user'] = $user;
        return view('app.rented-properties', $data);
    }
    

    public function buyer()
    {
        $data['page_title'] = 'List buyers';
        return view('app.buyers', $data);
    }

    public function bidder()
    {
        $data['page_title'] = 'List bidders';
        return view('app.bidders', $data);
    }




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
