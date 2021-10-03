<?php

namespace App\Http\Controllers;

use App\Models\AuctionRequest;
use App\Models\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuctionRequestController extends Controller
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
        ]);


        if ($validator->fails()){
            return 'Validation failed';
        }else{
            $rq = new UserRequest;
            if($rq->pendingUserRequests()->where('user_id', Auth::user()->id)->exists())
            {
                return 'You have a pending booking request';
            }
            $saleRequest = AuctionRequest::create([
                'property_id' => $request->property_id,
            ]);

            $saleRequest->userRequests()->create([
                'user_id' => Auth::user()->id,
                'reason' => 'auction booking request'
            ]);

            Session::forget('bookingItems');
            Session::forget('step');

            return 'success';
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AuctionRequest  $auctionRequest
     * @return \Illuminate\Http\Response
     */
    public function show(AuctionRequest $auctionRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AuctionRequest  $auctionRequest
     * @return \Illuminate\Http\Response
     */
    public function edit(AuctionRequest $auctionRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AuctionRequest  $auctionRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AuctionRequest $auctionRequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AuctionRequest  $auctionRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(AuctionRequest $auctionRequest)
    {
        //
    }
}
