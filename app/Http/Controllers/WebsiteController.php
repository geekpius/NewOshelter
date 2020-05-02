<?php

namespace App\Http\Controllers;

use DB;
use App\User;
use App\UserModel\Amenity;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\PropertyModel\Property;
use App\PropertyModel\PropertyType;
use App\PropertyModel\PropertyImage;
use App\UserModel\AccountReactivate;
use Illuminate\Support\Facades\Hash;
use App\PropertyModel\PropertyCategory;
use App\PropertyModel\PropertyLocation;

class WebsiteController extends Controller
{
    
    //index page
    public function index()
    {
        $data['page_title'] = null;
        $data['types'] = PropertyType::all();
        $data['properties'] = Property::wherePublish(true)->whereVacant(true)->orderBy('id', 'DESC')->get();
        $data['locations'] = PropertyLocation::orderBy('location')->get(['location']);
        return view('welcome', $data);
    }

    //property listing status
    public function propertyStatus($status)
    {
        $status = str_replace('-',' ',$status);
        $data['page_title'] = 'Narrow down '.$status.' filter complexity';
        $data['menu'] = 'pxp-no-bg';
        $data['properties'] = Property::whereType_status(str_replace(' ','_',$status))->whereDone_step(true)->get();
        $data['locations'] = PropertyLocation::orderBy('location')->get(['location']);
        $data['property_types'] = PropertyType::get(['name']);
        return view('property-status', $data);
    }

    //property listing types
    public function propertyType($type)
    {
        $type = str_replace('-',' ',$type);
        $data['page_title'] = 'Explore your curiosity on '.$type;
        $data['menu'] = 'pxp-no-bg';
        $data['properties'] = Property::whereType(str_replace(' ','_',$type))->whereDone_step(true)->get();
        $data['locations'] = PropertyLocation::orderBy('location')->get(['location']);
        $data['property_types'] = PropertyType::get(['name']);
        return view('property-types', $data);
    }

    //single property details
    public function singleProperty(Property $property)
    {
        if($property->done_step){
            $data['page_title'] = 'Detailing '.$property->title.' property for you. Have all the overviews of property to make decisions.';
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
        $data['page_title'] = 'Browse all properties of any kind';
        $data['menu'] = 'pxp-no-bg';
        $data['properties'] = Property::wherePublish(true)->whereVacant(true)->orderBy('id', 'DESC')->get();
        $data['locations'] = PropertyLocation::orderBy('location')->get(['location']);
        $data['property_types'] = PropertyType::get(['name']);
        return view('properties', $data);
    }

    //property search
    public function searchProperty(Request $request)
    {
        return redirect()->route('browse.property.search', ['status'=>Str::slug($request->status, '-'),'location'=>Str::slug($request->location, '-')]);
    }

    //property search results
    public function searchPropertyResult($status,$location)
    {
        $data['location'] = PropertyLocation::whereLocation_slug($location)->first(['location']);
        $data['status'] = str_replace('-','_',$status);
        $data['page_title'] = $data['location']->location;
        $data['menu'] = 'pxp-no-bg';
        $data['properties'] = Property::whereType_status($data['status'])->wherePublish(true)->whereVacant(true)->orderBy('id', 'DESC')->get();
        $data['locations'] = PropertyLocation::get(['location']);
        $data['property_types'] = PropertyType::get(['name']);
        return view('search-properties', $data);
    }

    //why choose us
    public function whyChooseUs($title)
    {
        $data['page_title'] = 'Why choose us. '.ucfirst(str_replace('-',' ',$title));
        $data['menu'] = 'pxp-no-bg';
        return view('choose-us', $data);
    }


    //view deactivated account 
    public function accountDeactivated()
    {
        $data['page_title'] = 'Account deactivated';
        $data['menu'] = 'pxp-no-bg';
        return view('deactivated', $data);
    }



    //own property
    public function ownProperty()
    {
        $data['page_title'] = 'Own a property of any kind for rent, sell and auction on OShelter';
        $data['menu'] = 'pxp-no-bg';
        return view('ownproperty', $data);
    }

    //host an event
    public function hostEvent()
    {
        $data['page_title'] = 'Host an event, make it know to the world on OShelter';
        $data['menu'] = 'pxp-no-bg';
        return view('hostevent', $data);
    }
    
    //owner help page
    public function ownerHelp()
    {
        $data['page_title'] = 'Property owner help';
        $data['menu'] = 'pxp-no-bg';
        return view('ownerhelp', $data);
    }

    //booking help page
    public function bookingHelp()
    {
        $data['page_title'] = 'Booking and travellers help';
        $data['menu'] = 'pxp-no-bg';
        return view('bookinghelp', $data);
    }

    //contact page
    public function contact()
    {
        $data['page_title'] = 'Contact us';
        $data['menu'] = 'pxp-no-bg';
        return view('contact', $data);
    }

    
    



}
