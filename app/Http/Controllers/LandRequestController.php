<?php

namespace App\Http\Controllers;

use App\Models\LandRequest;
use App\Models\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LandRequestController extends Controller
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
            'plots' => 'required',
            'total_amount' => 'required',
            'currency' => 'required',
            'price' => 'required',
        ]);


        if ($validator->fails()){
            return 'Validation failed';
        }else{
            $rq = new UserRequest;
            if($rq->pendingUserRequests()->where('user_id', Auth::user()->id)->exists())
            {
                return 'You have a pending booking request';
            }
            $landRequest = LandRequest::create([
                'property_id' => $request->property_id,
                'plot' => $request->plots,
                'amount' => $request->price,
                'currency' => $request->currency,
            ]);

            $landRequest->userRequests()->create([
                'user_id' => Auth::user()->id,
                'reason' => 'land booking request'
            ]);

            Session::forget('bookingItems');
            Session::forget('step');

            return 'success';
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
