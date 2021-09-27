<?php

namespace App\Http\Controllers;

use App\Models\HostelRequest;
use App\Models\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HostelRequestController extends Controller
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
            'room' => 'required',
            'total_amount' => 'required',
        ]);


        if ($validator->fails()){
            return 'Validation failed';
        }else{
            $rq = new UserRequest;
            if($rq->pendingUserRequests()->where('user_id', Auth::user()->id)->exists())
            {
                return 'You have a pending booking request';
            }
            $rentRequest = HostelRequest::create([
                'property_id' => $request->property_id,
                'hostel_block_room_number_id' => $request->room,
                'total_amount' => $request->total_amount,
            ]);

            $rentRequest->userRequests()->create([
                'user_id' => Auth::user()->id,
                'reason' => 'hostel booking request'
            ]);

            Session::forget('bookingItems');
            Session::forget('step');

            return 'success';
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HostelRequest  $hostelRequest
     * @return \Illuminate\Http\Response
     */
    public function show(HostelRequest $hostelRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HostelRequest  $hostelRequest
     * @return \Illuminate\Http\Response
     */
    public function edit(HostelRequest $hostelRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HostelRequest  $hostelRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HostelRequest $hostelRequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HostelRequest  $hostelRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(HostelRequest $hostelRequest)
    {
        //
    }
}
