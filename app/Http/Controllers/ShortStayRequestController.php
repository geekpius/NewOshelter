<?php

namespace App\Http\Controllers;

use App\Models\ShortStayRequest;
use App\Models\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ShortStayRequestController extends Controller
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
    public function store(Request $request): string
    {
        $validator = \Validator::make($request->all(), [
            'property_id' => 'required',
            'step' => 'required',
            'check_in' => 'required',
            'check_out' => 'required',
            'total_amount' => 'required',
            'currency' => 'required',
            'adult' => 'required',
            'children' => 'required',
        ]);


        if ($validator->fails()){
            return 'Validation failed';
        }else{
            $rq = new UserRequest;
            if($rq->pendingUserRequests()->where('user_id', Auth::user()->id)->exists())
            {
                return 'You have a pending booking request';
            }
            $shortStayRequest = ShortStayRequest::create([
                'property_id' => $request->property_id,
                'check_in' => date("Y-m-d",strtotime($request->check_in)),
                'check_out' => date("Y-m-d",strtotime($request->check_out)),
                'amount' => $request->total_amount,
                'currency' => $request->currency,
                'adult' => $request->adult,
                'children' => $request->children,
            ]);

            $shortStayRequest->userRequests()->create([
                'user_id' => Auth::user()->id,
                'reason' => 'short stay booking request'
            ]);

            Session::forget('bookingItems');
            Session::forget('step');

            return 'success';
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ShortStayRequest  $shortStayRequest
     * @return \Illuminate\Http\Response
     */
    public function show(ShortStayRequest $shortStayRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ShortStayRequest  $shortStayRequest
     * @return \Illuminate\Http\Response
     */
    public function edit(ShortStayRequest $shortStayRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ShortStayRequest  $shortStayRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ShortStayRequest $shortStayRequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ShortStayRequest  $shortStayRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(ShortStayRequest $shortStayRequest)
    {
        //
    }
}
