<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\PropertyModel\Property;
use Illuminate\Support\Facades\Auth;

class TenantController extends Controller
{

    public function __construct()
    {
        $this->middleware('verify-user');
        $this->middleware('auth');
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['page_title'] = 'List all tenants';
        $data['tenants'] = Property::whereUser_id(Auth::user()->id)->with(['userVisits' => function ($query) {
            $query->orderBy('created_at','DESC');
        }])->get();
        return view('admin.tenants.index', $data);
    }

    public function currentTenant()
    {
        $data['page_title'] = 'List current tenants';
        $data['tenants'] = Property::whereUser_id(Auth::user()->id)->with(['userVisits' => function ($query) {
            $query->whereStatus(1)->orderBy('created_at','DESC');
        }])->get();
        return view('admin.tenants.current-tenants', $data);
    }

    public function showVisitedProperty(User $user)
    {
        $data['page_title'] =  $user->name.' visited properties';
        $data['visits'] = $user->userVisits;
        $data['user'] = $user;
        return view('admin.tenants.visited-properties', $data);
    }


}
