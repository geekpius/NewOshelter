<?php

namespace App\Http\Controllers;

use App\Models\SaleRequest;
use App\Models\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SaleRequestController extends Controller
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
            'payment_method' => 'required',
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
            $saleRequest = SaleRequest::create([
                'property_id' => $request->property_id,
                'method' => $request->payment_method,
                'amount' => $request->total_amount,
            ]);

            $saleRequest->userRequests()->create([
                'user_id' => Auth::user()->id,
                'reason' => 'sale booking request'
            ]);

            Session::forget('bookingItems');
            Session::forget('step');

            return 'success';
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SaleRequest  $saleRequest
     * @return \Illuminate\Http\Response
     */
    public function show(SaleRequest $saleRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SaleRequest  $saleRequest
     * @return \Illuminate\Http\Response
     */
    public function edit(SaleRequest $saleRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SaleRequest  $saleRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SaleRequest $saleRequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SaleRequest  $saleRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(SaleRequest $saleRequest)
    {
        //
    }
}
