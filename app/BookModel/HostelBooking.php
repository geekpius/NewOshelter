<?php

namespace App\BookModel;

use Illuminate\Database\Eloquent\Model;
use App\BookModel\HostelBooking;
use App\PropertyModel\Property;
use App\PropertyModel\HostelBlockRoomNumber;
use App\User;
use Illuminate\Support\Str;
use Carbon\Carbon;

class HostelBooking extends Model
{
    protected $table = 'hostel_bookings';
    protected $primaryKey = 'id';

    CONST PENDING = 1;
    CONST CONFIRM = 2;
    CONST DONE = 3;
    CONST REJECT = 0;


    protected $fillable = [
        'user_id', 'property_id', 'owner_id', 'hostel_block_room_number_id', 'room_number', 'check_in', 'check_out', 'status',
    ];



    /*********** METHODS ATTRIBUTES *************/
    public function isPendingAttribute() : bool
    {
        return $this->status == HostelBooking::PENDING;
    }

    public function isConfirmAttribute() : bool
    {
        return $this->status == HostelBooking::CONFIRM;
    }

    public function isDoneAttribute() : bool
    {
        return $this->status == HostelBooking::DONE;
    }

    public function isRejectAttribute() : bool
    {
        return $this->status == HostelBooking::REJECT;
    }

    public function isCheckoutAttribute() : bool
    {
        return $this->check_out < Carbon::today();
    }


    public function getGuestAttribute()
    {
        return $this->adult+$this->children+$this->infant;
    }

    public function generateOrderID() : string
    {
        return Str::random(16);
    }

    public function generatePaymentID(int $length=10) : string
    {
        (string) $characters = '0123456789';
        (int) $charactersLength = strlen($characters);
        (string) $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }


     /*********** METHODS RELATIONSHIP *************/
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function owner(){
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function property(){
        return $this->belongsTo(Property::class, 'property_id');
    }

    public function hostelBlockRoomNumber(){
        return $this->belongsTo(HostelBlockRoomNumber::class, 'hostel_block_room_number_id');
    }

}
