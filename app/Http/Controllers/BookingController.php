<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PropertyModel\Property;
use App\PropertyModel\PropertyHostelPrice;
use App\PropertyModel\HostelBlockRoomNumber;

class BookingController extends Controller
{
    public function __construct()
    {
        $this->middleware('verify-user')->except(['getRoomTypeNumber', 'checkRoomTypeAvailability']);
        $this->middleware('auth')->except(['getRoomTypeNumber', 'checkRoomTypeAvailability']);
    }


    //get hostel room number base on room type
    public function getRoomTypeNumber(Request $request)
    {
        $rooms = HostelBlockRoomNumber::whereHostel_block_room_id($request->room_type)->whereFull(false)->get(['id','room_no']);
        return response()->json($rooms);
    }

    //check hostel room number availability
    public function checkRoomTypeAvailability(Request $request)
    {
        $check = HostelBlockRoomNumber::whereHostel_block_room_id($request->room_type)->whereRoom_no($request->room_number)->whereFull(false)->first();
        if(empty($check)){
            return response()->json(array('data'=>'Not available. Room is full.', 'currency'=>'','price'=>'','calendar'=>'','advance'=>''));
        }
        else{
            $price = PropertyHostelPrice::whereHostel_block_room_id($request->room_type)->first();
            $left = $check->person_per_room - $check->occupant;
            $plural = ($left==1)? 'space':'spaces';
            $advance ='';
            if(empty($price->payment_duration)){
                $advance='';
            }
            else{
                if($price->payment_duration==1){
                    $advance='1 month advance payment';
                }
                elseif($price->payment_duration==12){
                    $advance='1 year advance payment';
                }else{
                    $advance= $price->payment_duration.' months advance payment';
                }
            }
            return response()->json(array('data'=>$left.' '.$plural.' available','currency'=>(empty($price->currency)? '':$price->currency),'price'=>(empty($price->property_price)? '':$price->property_price),'calendar'=>(empty($price->price_calendar)? '':$price->price_calendar),'advance'=>$advance));
        }
    }

 
    public function index(Property $property)
    {
        $data['page_title'] = 'Booking '.$property->title;
        $data['property'] = $property;
        return view('admin.bookings.index', $data);
    }

  
    public function book(Request $request)
    {
        $validatedData = $request->validate([
            'check_in'  => 'required',
            'check_out' => 'required',
            'adult'     => 'required',
            'children'  => 'required',
            'infant'    => 'required'
        ]);
        return redirect()->route('property.bookings.index', $request->property_id);
    }

}