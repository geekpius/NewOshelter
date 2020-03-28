<?php

namespace App\Http\Controllers;

use App\PropertyModel\PropertyRent;
use Illuminate\Http\Request;

class PropertyRentController extends Controller
{
    public function __construct()
    {
        $this->middleware('verify-user');
        $this->middleware('auth');
    }


    /*
     * rented properties
     */
    public function index()
    {
        $data['page_title'] = 'Rented properties';
        return view('guest.rented-properties', $data);
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
     * @param  \App\PropertyModel\PropertyRent  $propertyRent
     * @return \Illuminate\Http\Response
     */
    public function show(PropertyRent $propertyRent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PropertyModel\PropertyRent  $propertyRent
     * @return \Illuminate\Http\Response
     */
    public function edit(PropertyRent $propertyRent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PropertyModel\PropertyRent  $propertyRent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PropertyRent $propertyRent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PropertyModel\PropertyRent  $propertyRent
     * @return \Illuminate\Http\Response
     */
    public function destroy(PropertyRent $propertyRent)
    {
        //
    }
}
