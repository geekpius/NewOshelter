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
        $data['page_title'] = 'List tenants';
        $data['tenants'] = Property::whereUser_id(Auth::user()->id)->with(['userVisits' => function ($query) {
            $query->whereStatus(true)->orderBy('created_at','DESC');
        }])->get();
        return view('admin.tenants.index', $data);
    }

    public function showVisitedProperty(User $user)
    {
        $data['page_title'] =  $user->name.' rented properties';
        $data['visits'] = $user->userVisits->where('status',true);
        $data['user'] = $user;
        return view('admin.tenants.visited-properties', $data);
    }


}
