<?php

namespace App\Http\Controllers;

use App\UserModel\Amenity;
use App\UserModel\Category;
use Illuminate\Http\Request;
use App\PropertyModel\Property;
use App\PropertyModel\PropertyType;
use App\PropertyModel\PropertyImage;
use App\PropertyModel\PropertyCategory;
use App\PropertyModel\PropertyLocation;

class WebsiteController extends Controller
{
    
    //index page
    public function index()
    {
        $data['page_title'] = null;
        $data['categories'] = Category::all();
        $data['properties'] = Property::where('type', '!=', 'hostel')->wherePublish(true)->orderBy('id', 'DESC')->get();
        $data['locations'] = PropertyLocation::orderBy('location')->get(['location']);
        return view('welcome', $data);
    }

    //single category properties
    public function categoryProperty($category)
    {
        $data['page_title'] = 'Explore '.str_replace('-',' ',$category);
        $data['menu'] = 'pxp-no-bg';
        $data['categories'] = PropertyCategory::whereCategory($category)->get();
        $data['locations'] = PropertyLocation::orderBy('location')->get(['location']);
        $data['property_types'] = PropertyType::get(['name']);
        $data['amenities'] = Amenity::get(['name']);
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
        $data['menu'] = 'pxp-no-bg';
        $data['properties'] = Property::where('type', '!=', 'hostel')->wherePublish(true)->orderBy('id', 'DESC')->get();
        $data['locations'] = PropertyLocation::orderBy('location')->get(['location']);
        $data['property_types'] = PropertyType::get(['name']);
        $data['amenities'] = Amenity::get(['name']);
        return view('properties', $data);
    }

    //why choose us
    public function whyChooseUs($title)
    {
        $data['page_title'] = 'Why choose us. '.ucfirst(str_replace('-',' ',$title));
        $data['menu'] = 'pxp-no-bg';
        return view('choose-us', $data);
    }

    
    //contact page
    public function contact()
    {
        $data['page_title'] = 'Contact us';
        $data['menu'] = 'pxp-no-bg';
        return view('contact', $data);
    }

    
    



}
