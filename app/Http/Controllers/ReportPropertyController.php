<?php

namespace App\Http\Controllers;

use App\PropertyModel\ReportProperty;
use Illuminate\Http\Request;
use App\PropertyModel\Property;

class ReportPropertyController extends Controller
{
    public function __construct()
    {
        $this->middleware('verify-user');
        $this->middleware('auth');
    }


    //show all messages
    public function index(Property $property)
    {
        $data['page_title'] = 'Report '.$property->title;
        return view('admin.reports.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PropertyModel\ReportProperty  $reportProperty
     * @return \Illuminate\Http\Response
     */
    public function show(ReportProperty $reportProperty)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PropertyModel\ReportProperty  $reportProperty
     * @return \Illuminate\Http\Response
     */
    public function edit(ReportProperty $reportProperty)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PropertyModel\ReportProperty  $reportProperty
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ReportProperty $reportProperty)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PropertyModel\ReportProperty  $reportProperty
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReportProperty $reportProperty)
    {
        //
    }
}
