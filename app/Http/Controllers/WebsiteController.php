<?php

namespace App\Http\Controllers;

use DB;
use Route;
use App\User;
use App\ServiceCharge;
use App\Help;
use App\HelpType;
use App\UserModel\Amenity;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\PropertyModel\Property;
use App\PropertyModel\PropertyType;
use App\PropertyModel\PropertyImage;
use App\UserModel\AccountReactivate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use App\PropertyModel\PropertyCategory;
use App\PropertyModel\PropertyLocation;

use App\Http\Resources\PropertyCollection;

class WebsiteController extends Controller
{
    
    //index page
    public function index()
    {
        $data['page_title'] = null;
        $data['types'] = PropertyType::whereIs_public(true)->get();
        $data['properties'] = Property::wherePublish(true)->whereIs_active(true)->take(50)->orderBy('id', 'DESC')->get();
        return view('website.welcome', $data);
    }

    // payment call back 
    public function callback()
    {
        return view('website.callback');
    }

    //property listing status
    public function propertyStatus($status)
    {
        $status = str_replace('-',' ',$status);
        $data['page_title'] = 'Narrow down '.$status.' filter complexity';
        $data['menu'] = 'pxp-no-bg';
        $data['properties'] = Property::whereType_status(str_replace(' ','_',$status))->whereDone_step(true)->whereIs_active(true)->orderBy('id', 'DESC')->paginate(9);
        $data['property_types'] = PropertyType::get(['name']);
        return view('website.property-status', $data);
    }

    //property listing types
    public function propertyType($type)
    {
        $type = str_replace('-',' ',$type);
        $data['page_title'] = 'Explore your curiosity on '.$type;
        $data['menu'] = 'pxp-no-bg';
        $props = Property::whereType(str_replace(' ','_',$type))->whereDone_step(true)->whereIs_active(true)->orderBy('id', 'DESC');
        $data['property_types'] = PropertyType::get(['name']);
        $data['properties'] = $props->paginate(9);
        if(session()->has('properties'))
        {
            session()->forget('properties');
        }
        session(['properties' => $props->get()]);
        return view('website.property-types', $data);
    }

    // property type results to map
    public function mapPropertyType()
    {
        $properties = session('properties');
        return PropertyCollection::collection($properties);
    }

    //single property details
    public function singleProperty(Property $property)
    {
        if($property->done_step){
            $data['page_title'] = 'Detailing '.$property->title.' property for you. Have all the overviews of property to make decisions.';
            $data['menu'] = 'pxp-no-bg';
            $data['property'] = $property;
            $data['charge'] = ServiceCharge::whereProperty_type($property->type)->first();
            $countImages = $property->propertyImages->count();
            $data['image'] = $property->propertyImages->first();
            $data['images'] = $property->propertyImages->slice(1)->take($countImages-1);
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
        $data['properties'] = Property::wherePublish(true)->whereIs_active(true)->orderBy('id', 'DESC')->paginate(9);
        $data['property_types'] = PropertyType::get(['name']);
        return view('website.properties', $data);
    }

    // get all properties to the map
    public function mapProperty()
    {
        $properties = Property::wherePublish(true)->whereIs_active(true)->orderBy('id', 'DESC')->get();
        return PropertyCollection::collection($properties);
    }

    //property search
    public function searchProperty(Request $request)
    {
        if($request->get('query_param')=='simple'){
            $location = $request->get('location');
            $data['page_title'] = $location;
            $data['menu'] = 'pxp-no-bg';
            $props = Property::whereType_status($request->get('status'))->whereIs_active(true)->wherePublish(true)
                ->whereHas('propertyLocation', function($query) use($location){
                    $query->where('location', 'like', '%'.$location.'%');
            });
            $data['properties'] = $props->orderBy('id','desc')->paginate(9);
            $data['property_types'] = PropertyType::get(['name']);
            if(session()->has('properties'))
            {
                session()->forget('properties');
            }
            session(['properties' => $props->orderBy('id','desc')->get()]);

            return view('website.search-properties', $data);
        }
        else{
            $location = $request->get('location');
            $data['page_title'] = $location;
            $data['menu'] = 'pxp-no-bg';

            $props = Property::whereType_status($request->get('status'))->whereIs_active(true)->wherePublish(true);
            if(empty($request->get('type'))){
                $props->whereHas('propertyLocation', function($query) use($location){
                    $query->where('location', 'like', '%'.$location.'%');
                })->whereHas('propertyPrice', function($query) use($request){
                    $min = empty($request->get('min_price'))? 0:$request->get('min_price');
                    $max = empty($request->get('max_price'))? 0:$request->get('max_price');
                    if($min==0 && $max==0){
                        $query->where('property_price','>', 0);
                    }else{
                        $query->whereBetween('property_price', [$min, $max]);
                    }
                })->whereHas('propertyContain', function($query) use($request){
                    if(!empty($request->get('bedroom')) && !empty($request->get('furnish'))){
                        $query->whereBedroom($request->get('bedroom'))->whereFurnish($request->get('furnish'));
                    }elseif(!empty($request->get('bedroom')) || !empty($request->get('furnish'))){
                        $query->whereBedroom($request->get('bedroom'))->orWhere('furnish','=', $request->get('furnish'));
                    }
                });
            }else{
                $props->whereType($request->get('type'));
                $props->whereHas('propertyLocation', function($query) use($location){
                    $query->where('location', 'like', '%'.$location.'%');
                })->whereHas('propertyPrice', function($query) use($request){
                    $min = empty($request->get('min_price'))? 0:$request->get('min_price');
                    $max = empty($request->get('max_price'))? 0:$request->get('max_price');
                    if($min==0 && $max==0){
                        $query->where('property_price','>', 0);
                    }else{
                        $query->whereBetween('property_price', [$min, $max]);
                    }
                })->whereHas('propertyContain', function($query) use($request){
                    if(!empty($request->get('bedroom')) && !empty($request->get('furnish'))){
                        $query->whereBedroom($request->get('bedroom'))->whereFurnish($request->get('furnish'));
                    }elseif(!empty($request->get('bedroom')) || !empty($request->get('furnish'))){
                        $query->whereBedroom($request->get('bedroom'))->orWhere('furnish','=', $request->get('furnish'));
                    }
                });
            }

            $data['properties'] = $props->orderBy('id','desc')->paginate(9);
            if(session()->has('properties'))
            {
                session()->forget('properties');
            }
            session(['properties' => $props->orderBy('id','desc')->get()]);
            $data['property_types'] = PropertyType::get(['name']);
            return view('website.search-properties', $data);
        }
    }

    // property search results to map
    public function mapSearchProperty()
    {
        $properties = session('properties');
        return PropertyCollection::collection($properties);
    }



















    //why choose us
    public function whyChooseUs($title)
    {
        $data['page_title'] = 'Why choose us. '.ucfirst(str_replace('-',' ',$title));
        $data['menu'] = 'pxp-no-bg';
        return view('website.choose-us', $data);
    }


    //view deactivated account 
    public function accountDeactivated()
    {
        $data['page_title'] = 'Account deactivated';
        $data['menu'] = 'pxp-no-bg';
        return view('website.deactivated', $data);
    }

    public function email()
    {
        $data = array(
            "property" => "Single room self contain",
            "link" => route('requests.detail', 1),
            "name" => current(explode(' ','Fiifi Pius')),
            "guest" => current(explode(' ',"Pius Geek")),
        );
        return view('emails.booking_request')->with('data', $data);
    }



    //own property
    public function ownProperty()
    {
        $data['page_title'] = 'Own a property of any kind for rent, sell and auction on OShelter';
        $data['menu'] = 'pxp-no-bg';
        return view('website.ownproperty', $data);
    }

    //host an event
    public function hostEvent()
    {
        $data['page_title'] = 'Host an event, make it know to the world on OShelter';
        $data['menu'] = 'pxp-no-bg';
        return view('website.hostevent', $data);
    }
    
    //owner help page
    public function ownerHelp()
    {
        $data['page_title'] = 'Property owner help';
        $data['menu'] = 'pxp-no-bg';
        $data['types'] = HelpType::whereHelp_type('owner')->get();
        return view('website.ownerhelp', $data);
    }

    //booking help page
    public function bookingHelp()
    {
        $data['page_title'] = 'Booking and travellers help';
        $data['menu'] = 'pxp-no-bg';
        $data['types'] = HelpType::whereHelp_type('traveller')->get();
        return view('website.bookinghelp', $data);
    }

    //contact page
    public function contact()
    {
        $data['page_title'] = 'Contact us';
        $data['menu'] = 'pxp-no-bg';
        return view('website.contact', $data);
    }

    
    



}
