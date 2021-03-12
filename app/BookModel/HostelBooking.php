<?php

namespace App\BookModel;

use Illuminate\Database\Eloquent\Model;
use App\BookModel\HostelBooking;
use App\PropertyModel\Property;
use App\PropertyModel\HostelBlockRoomNumber;
use App\User;
use App\UserModel\UserHostelVisit;
use App\PaymentModel\BookingTransaction;
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
        'user_id', 
        'property_id', 
        'owner_id', 
        'hostel_block_room_number_id', 
        'room_number', 
        'check_in', 
        'check_out', 
        'status',
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

    public function isCancelAttribute(): bool
    {
        return $this->userHostelVisit->is_in == 2;
    }

    public function isCheckoutAttribute() : bool
    {
        return $this->check_out < Carbon::today();
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

    public function bookingTransaction(){
        return $this->hasMany(BookingTransaction::class);
    }

    public function userHostelVisit(){
        return $this->hasOne(UserHostelVisit::class);
    }

}
