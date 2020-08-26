<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PropertyModel\Property;
use App\PropertyModel\PropertyImage;

class VisitorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['page_title'] = 'My visits';
        return view('admin.visits.index', $data);
    }

    public function upcoming()
    {
        $data['page_title'] = 'My upcoming visits';
        return view('admin.visits.upcoming', $data);
    }

    public function current()
    {
        $data['page_title'] = 'My current visits';
        return view('admin.visits.current', $data);
    }

    public function past()
    {
        $data['page_title'] = 'My past visits';
        return view('admin.visits.past', $data);
    }

    public function showVisitedProperty(Property $property)
    {
        $data['page_title'] =  'My visited property';
        $data['property'] = $property;
        $data['images'] = PropertyImage::whereProperty_id($property->id)->skip(1)->take(4)->get(['caption', 'image']);
        return view('admin.visits.visited-property', $data);
    }



}
