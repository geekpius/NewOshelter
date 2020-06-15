<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TenantsController extends Controller
{

    public function __construct()
    {
        $this->middleware('verify-user');
        $this->middleware('auth');
    }

    public function tenantRentedProperty(User $user)
    {
        $data['page_title'] =  $user->name.' Rented properties';
        $data['user'] = $user;
        return view('admin.rented-properties', $data);
    }
    

    public function buyer()
    {
        $data['page_title'] = 'List buyers';
        return view('admin.tenants.buyers', $data);
    }

    public function bidder()
    {
        $data['page_title'] = 'List bidders';
        return view('admin.tenants.bidders', $data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['page_title'] = 'List tenants';
        return view('admin.tenants.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data['page_title'] = 'List tenants';
        return view('admin.tenants.create', $data);
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
     
    
        return view('admin.tenants.edit');
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
