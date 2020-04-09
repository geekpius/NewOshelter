<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PropertyModel\Property;

class WebsiteController extends Controller
{
    
    //index page
    public function index()
    {
        $data['page_title'] = null;
        $data['properties'] = Property::where('type', '!=', 'hostel')->wherePublish(true)->orderBy('id', 'DESC')->get();
        return view('welcome', $data);
    }

    //single category properties
    public function categoryProperty()
    {
        $data['page_title'] = 'Contact us';
        return view('category', $data);
    }

    //single property details
    public function singleProperty(Property $property)
    {
        $data['page_title'] = 'View '.$property->title.' details';
        $data['property'] = $property;
        return view('property-detail', $data);
    }

    //all properties
    public function property()
    {
        $data['page_title'] = 'Browse all properties';
        $data['properties'] = Property::where('type', '!=', 'hostel')->wherePublish(true)->orderBy('id', 'DESC')->get();
        return view('properties', $data);
    }




    
    //contact page
    public function contact()
    {
        $data['page_title'] = 'Contact us';
        return view('contact', $data);
    }

    
    



}
