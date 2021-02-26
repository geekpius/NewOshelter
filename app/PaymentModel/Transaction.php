<?php

namespace App\PaymentModel;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\PaymentModel\BookingTransaction;
use App\PaymentModel\ExtensionTransaction;

class Transaction extends Model
{
    protected $table = 'transactions';
    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'owner_id',
        'reference_id', 
        'amount', 
        'service_fee', 
        'discount_fee', 
        'currency', 
        'channel',
        'property_type',
    ];

     /*********** METHODS ATTRIBUTES *************/
    public function payableAmount(): string
    {
        return number_format(($this->amount + $this->service_fee)-$this->discount_fee,2);
    }


    /*********** METHODS RELATIONSHIP *************/
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function owner(){
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function bookingTransaction(){
        return $this->hasOne(BookingTransaction::class);
    }

    public function extensionTransaction(){
        return $this->hasOne(ExtensionTransaction::class);
    }


}
