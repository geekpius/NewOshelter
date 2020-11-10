<?php

namespace App\PaymentModel;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\BookModel\Booking;

class Transaction extends Model
{
    protected $table = 'transactions';
    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id', 'booking_id', 'transaction_id', 'payment_id', 'amount', 'status',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function booking(){
        return $this->belongsTo(Booking::class, 'booking_id');
    }

}
