<?php

namespace App\PaymentModel;

use Illuminate\Database\Eloquent\Model;
use App\PaymentModel\Transaction;
use App\BookModel\Booking;
use App\BookModel\HostelBooking;

class BookingTransaction extends Model
{
    protected $table = 'booking_transactions';
    protected $primaryKey = 'id';

    protected $fillable = [
        'transaction_id',
        'booking_id',
        'property_type', 
    ];


    /*********** METHODS RELATIONSHIP *************/
    public function transaction(){
        return $this->belongsTo(Transaction::class, 'transaction_id');
    }

    public function booking(){
        return $this->belongsTo(Booking::class, 'booking_id');
    }

    public function hostelBooking(){
        return $this->belongsTo(HostelBooking::class, 'booking_id');
    }


}
