<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BookingModel\Booking;
use App\PropertyModel\Property;
use Illuminate\Support\Facades\Auth;
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

 
    public function index(Property $property, $check_in, $check_out, $guest, $adult, $children, $infant)
    {
        $data['page_title'] = 'Booking '.$property->title;
        $data['property'] = $property;
        $data['guest'] = $guest;
        $data['check_in'] = $check_in;
        $data['check_out'] = $check_out;
        $data['adult'] = $adult;
        $data['children'] = $children;
        $data['infant'] = $infant;
        return view('admin.bookings.index', $data);
    } 
    
     public function book(Request $request)
     {
        $this->validate($request, [
            'check_in'  => 'required',
            'check_out' => 'required',
            'adult'     => 'required|integer',
            'children'  => 'required|integer',
            'infant'    => 'required|integer',
        ]);

        if(Booking::whereUser_id(Auth::user()->id)->whereProperty_id($request->property_id)->whereStatus(true)->exists())
        {
            $book = Booking::whereUser_id(Auth::user()->id)->whereProperty_id($request->property_id)->whereStatus(true)->first();
            $book->check_in= $request->check_in;
            $book->check_out= $request->check_out;
            $book->adult= $request->adult;
            $book->children= $request->children;
            $book->infant= $request->infant;
            $book->update();
        }else{
            $book = new Booking;
            $book->check_in= $request->check_in;
            $book->check_out= $request->check_out;
            $book->adult= $request->adult;
            $book->children= $request->children;
            $book->infant= $request->infant;
            $book->save();
        }

        return redirect()->route('property.bookings.index', $book->id);

    }


    public function sendSmsVerification(Request $request ) : string
    {
        $validator = \Validator::make($request->all(), [
            'phone_number' => 'required|numeric',
        ]);

        (string)$message = '';
        if ($validator->fails()){
            $message = 'fail';
        }else{
            $user = User::findOrFail(Auth::user()->id);
            if($user->phone==$request->phone_number){
                //send sms verification code
                $message='success';
            }else{
                $user->phone=$request->phone_number;
                $user->update();
                //send sms verification code
                $message='success';
            }
        }

    }
    

    public function verify(Request $request) :string
    {
        $validator = \Validator::make($request->all(), [
            'verify_code' => 'required|numeric',
        ]);
        (string)$message ='';
        if ($validator->fails()){
            $message = 'fail';
        }else{
            if (condition) {
                # code...
            } else {
                # code...
            }
        }

        return $message;        
    }



}
