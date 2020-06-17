<?php

namespace App\BookingModel;

use App\User;
use App\BookingModel\Booking;
use App\PropertyModel\Property;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'bookings';
    const COMPLETE = true;
    const INCOMPLETE = false;

    protected $fillable = [
        'property_id', 'user_id', 'check_in', 'check_out', 'adult', 'children', 'infant', 'status',
    ];

    public function isCompleted()
    {
        return $this->status == Booking::COMPLETE;
    }

    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }



}
