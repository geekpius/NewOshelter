<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;
use App\PropertyModel\Property;
use App\PropertyModel\PropertyList;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('verify-admin');
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['page_title'] = 'Dashboard';
        return view('host.dashboard', $data);
    }

    public function guest()
    {
        $data['page_title'] = 'Guest Statistics';
        return view('host.guest-statistics', $data);
    }

    public function property()
    {
        $data['page_title'] = 'Property Statistics';
        return view('host.property-statistics', $data);
    }

    public function payment()
    {
        $data['page_title'] = 'Payment Statistics';
        return view('host.payment-statistics', $data);
    }

    public function saved()
    {
        $data['page_title'] = 'Properties Saved';
        $data['lists'] = PropertyList::whereAdmin_id(Auth::user()->id)->get(); 
        return view('host.saved', $data);
    }

    public function removeSaved(PropertyList $propertyList)
    {
        $propertyList->delete();
        return redirect()->back();
    }


    


}
