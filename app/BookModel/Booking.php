<?php

namespace App\BookModel;

use Illuminate\Database\Eloquent\Model;
use App\BookModel\Booking;
use App\PropertyModel\Property;
use App\PaymentModel\BookingTransaction;
use App\User;
use App\UserModel\UserVisit;
use Illuminate\Support\Str;

class Booking extends Model
{
    protected $table = 'bookings';
    protected $primaryKey = 'id';

    CONST PENDING = 1;
    CONST CONFIRM = 2;
    CONST DONE = 3;
    CONST REJECT = 0;


    protected $fillable = [
        'user_id', 
        'property_id', 
        'owner_id', 
        'check_in', 
        'check_out', 
        'adult', 
        'children', 
        'infant', 
        'status',
    ];


    /*********** METHODS ATTRIBUTES *************/
    public function isPendingAttribute() : bool
    {
        return $this->status == Booking::PENDING;
    }

    public function isConfirmAttribute() : bool
    {
        return $this->status == Booking::CONFIRM;
    }

    public function isDoneAttribute() : bool
    {
        return $this->status == Booking::DONE;
    }

    public function isRejectAttribute() : bool
    {
        return $this->status == Booking::REJECT;
    }

    public function isCancelAttribute(): bool
    {
        return $this->userVisit->status == 2;
    }

    public function isCheckoutAttribute() : bool
    {
        return $this->check_out < \Carbon\Carbon::today();
    }


    public function getGuestAttribute()
    {
        return $this->adult+$this->children+$this->infant;
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

    public function bookingTransaction(){
        return $this->hasMany(BookingTransaction::class);
    }

    public function userVisit(){
        return $this->hasOne(UserVisit::class);
    }


}
