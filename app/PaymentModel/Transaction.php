<?php

namespace App\PaymentModel;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\BookModel\Booking;
use App\BookModel\HostelBooking;
use App\UserModel\UserExtensionRequest;

class Transaction extends Model
{
    protected $table = 'transactions';
    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id', 'booking_id', 'extension_id', 'reference_id', 'amount', 'service_fee', 'discount_fee', 
        'currency', 'property_type', 'channel',
    ];

     /*********** METHODS ATTRIBUTES *************/
    public function payableAmount() 
    {
        return ($this->amount + $this->service_fee)-$this->discount_fee;
    }


    /*********** METHODS RELATIONSHIP *************/
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function booking(){
        return $this->belongsTo(Booking::class, 'booking_id');
    }

    public function hostelBooking(){
        return $this->belongsTo(HostelBooking::class, 'booking_id');
    }

    public function userExtensionRequest(){
        return $this->belongsTo(UserExtensionRequest::class, 'extension_id');
    }

}
