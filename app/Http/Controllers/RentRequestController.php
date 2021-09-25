<?php

namespace App\Http\Controllers;

use App\Models\RentRequest;
use App\PropertyModel\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class RentRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $validator = \Validator::make($request->all(), [
            'property_id' => 'required',
            'step' => 'required',
            'type_status' => 'required',
            'duration' => 'required',
            'total_amount' => 'required',
        ]);

        $message ='';
        if ($validator->fails()){
            $message = 'Validation failed';
        }else{
            $property = Property::findOrFail($request->property_id);
            $rentRequest = RentRequest::create([
                        'property_id' => $property->id,
                        'duration' => $request->duration,
                        'calender' => 'month',
                        'amount' => $request->total_amount,
                    ]);

            $rentRequest->userRequests()->create([
                'user_id' => Auth::user()->id,
                'reason' => 'rent booking request'
            ]);

            Session::forget('bookingItems');
            Session::forget('step');

            $message = 'success';
        }

        return $message;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserRequest  $userRequest
     * @return \Illuminate\Http\Response
     */
    public function show(RentRequest $userRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserRequest  $userRequest
     * @return \Illuminate\Http\Response
     */
    public function edit(RentRequest $userRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserRequest  $userRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RentRequest $userRequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserRequest  $userRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(RentRequest $userRequest)
    {
        //
    }
}
