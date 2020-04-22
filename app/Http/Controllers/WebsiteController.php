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
        $data['properties'] = Property::where('type', '!=', 'hostel')->wherePublish(true)->orderBy('id', 'DESC')->get();
        $data['locations'] = PropertyLocation::orderBy('location')->get(['location']);
        return view('welcome', $data);
    }

    //property listing types
    public function propertyType($type)
    {
        $data['page_title'] = 'Explore '.str_replace('-',' ',$type);
        $data['menu'] = 'pxp-no-bg';
        $data['properties'] = Property::whereType($type)->whereDone_step(true)->get();
        $data['locations'] = PropertyLocation::orderBy('location')->get(['location']);
        $data['property_types'] = PropertyType::get(['name']);
        $data['amenities'] = Amenity::get(['name']);
        return view('types', $data);
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


    //view deactivated account 
    public function accountDeactivated()
    {
        $data['page_title'] = 'Account deactivated';
        $data['menu'] = 'pxp-no-bg';
        return view('deactivated', $data);
    }

    //view reactivate account 
    public function reactivateAccount()
    {
        $data['page_title'] = 'Re-activate your OShelter account';
        $data['menu'] = 'pxp-no-bg';
        return view('reactivate', $data);
    }

    //send reactivate email
    public function sendReactivateEmail(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'email' => 'required|email',
        ]);
        if ($validator->fails()){
            $message = 'Invalid email. Try again.';
        }
        else{
            if(User::whereEmail($request->email)->whereActive(0)->exists()){
                $token = Hash::make(Str::random(72));
                $account = AccountReactivate::whereEmail($request->email)->first();
                if(empty($account)){
                    $acc = new AccountReactivate;
                    $acc->email = $request->email;
                    $acc->token = $token;
                    $acc->save();
                }
                else{
                    $update = DB::update('update account_reactivates set token = ? where email = ?', [$token, $request->email]);
                }

                //send email 
                $message='success';
            }else{
                $message="Email address not found.";
            }
        }

        return $message;
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
