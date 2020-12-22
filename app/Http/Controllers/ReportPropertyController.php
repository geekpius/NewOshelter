<?php

namespace App\Http\Controllers;

use App\PropertyModel\ReportProperty;
use Illuminate\Http\Request;
use App\PropertyModel\Property;
use Illuminate\Support\Facades\Auth;

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
        $data['property'] = $property;
        return view('user.reports.index', $data);
    }

    
    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'subject' => 'required|string',
            'complain' => 'required|string',
        ]);
        if ($validator->fails()){
            $message = 'fail';
        }else{
            $report = new ReportProperty;
            $report->user_id = Auth::user()->id;
            $report->property_id = $request->property_id;
            $report->subject = $request->subject;
            $report->complain = $request->complain;
            $report->save();
            $message="success";
        }
        return $message;
    }

   
    


}
