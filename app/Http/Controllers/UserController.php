<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('verify-user');
        $this->middleware('auth');
    }


    //home dashboard
    public function index()
    {
        $data['page_title'] = 'Dashboard';
        return view('guest.dashboard', $data);
    }

    public function property()
    {
        $data['page_title'] = 'Property Statistics';
        return view('guest.property-statistics', $data);
    }

    public function payment()
    {
        $data['page_title'] = 'Payment Statistics';
        return view('guest.payment-statistics', $data);
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
