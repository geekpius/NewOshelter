<?php

namespace App\Http\Controllers;

use App\PropertyModel\PropertyBid;
use Illuminate\Http\Request;

class PropertyBidController extends Controller
{
    public function __construct()
    {
        $this->middleware('verify-user');
        $this->middleware('auth');
    }


    /*
     * properties bidden
     */
    public function index()
    {
        $data['page_title'] = 'Properties bidden';
        return view('guest.bidden-properties', $data);
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
     * @param  \App\PropertyModel\PropertyBid  $propertyBid
     * @return \Illuminate\Http\Response
     */
    public function show(PropertyBid $propertyBid)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PropertyModel\PropertyBid  $propertyBid
     * @return \Illuminate\Http\Response
     */
    public function edit(PropertyBid $propertyBid)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PropertyModel\PropertyBid  $propertyBid
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PropertyBid $propertyBid)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PropertyModel\PropertyBid  $propertyBid
     * @return \Illuminate\Http\Response
     */
    public function destroy(PropertyBid $propertyBid)
    {
        //
    }
}
