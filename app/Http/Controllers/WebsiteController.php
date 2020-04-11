<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PropertyModel\Property;
use App\PropertyModel\PropertyImage;
use App\PropertyModel\PropertyLocation;

class WebsiteController extends Controller
{
    
    //index page
    public function index()
    {
        $data['page_title'] = null;
        $data['properties'] = Property::where('type', '!=', 'hostel')->wherePublish(true)->orderBy('id', 'DESC')->get();
        $data['locations'] = PropertyLocation::orderBy('location')->get(['location']);
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
        if($property->done_step){
            $data['page_title'] = 'View '.$property->title.' details';
            $data['menu'] = 'pxp-no-bg';
            $data['property'] = $property;
            $countImages = PropertyImage::whereProperty_id($property->id)->count();
            $data['image'] = PropertyImage::whereProperty_id($property->id)->orderBy('id')->first();
            $data['images'] = PropertyImage::whereProperty_id($property->id)->skip(1)->take($countImages-1)->get();
            return view('property-detail', $data);
        }
        else{
            return view('errors.404');
        }
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
        $data['menu'] = 'pxp-no-bg';
        return view('contact', $data);
    }

    
    



}
