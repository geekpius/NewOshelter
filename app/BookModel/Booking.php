<?php

namespace App\BookModel;

use Illuminate\Database\Eloquent\Model;
use App\BookModel\Booking;
use App\PropertyModel\Property;
use App\User;
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
        'user_id', 'property_id', 'owner_id', 'check_in', 'check_out', 'adult', 'children', 'infant', 'status',
    ];

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

    public function isCheckoutAttribute() : bool
    {
        return $this->check_out < \Carbon\Carbon::today();
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


    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function owner(){
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function property(){
        return $this->belongsTo(Property::class, 'property_id');
    }


}
