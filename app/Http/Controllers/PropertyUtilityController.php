<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PropertyModel\Property;
use App\PropertyModel\PropertyImage;
use App\PropertyModel\PropertyUtility;

class PropertyUtilityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Property $property)
    {
        $data['page_title'] = 'Manage rented property('.strtolower($property->title).') utilities';
        $data['property'] = $property;
        $data['images'] = PropertyImage::whereProperty_id($property->id)->skip(1)->take(4)->get(['caption', 'image']);
        return view('admin.properties.property-utilities', $data);
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
     * @param  \App\PropertyModel\PropertyUtility  $propertyUtility
     * @return \Illuminate\Http\Response
     */
    public function show(PropertyUtility $propertyUtility)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PropertyModel\PropertyUtility  $propertyUtility
     * @return \Illuminate\Http\Response
     */
    public function edit(PropertyUtility $propertyUtility)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PropertyModel\PropertyUtility  $propertyUtility
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PropertyUtility $propertyUtility)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PropertyModel\PropertyUtility  $propertyUtility
     * @return \Illuminate\Http\Response
     */
    public function destroy(PropertyUtility $propertyUtility)
    {
        //
    }
}
