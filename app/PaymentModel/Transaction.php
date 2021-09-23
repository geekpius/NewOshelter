<?php

namespace App\PaymentModel;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\PaymentModel\BookingTransaction;
use App\PaymentModel\ExtensionTransaction;
use App\UserModel\Confirmation;

class Transaction extends Model
{
    protected $table = 'transactions';
    protected $primaryKey = 'id';

    const PENDING = 'pending';
    const SUCCESS = 'success';
    const FAILED = 'failed';

    protected $fillable = [
        'user_id',
        'external_id',
        'amount',
        'reason',
        'status',
        'transactable_type',
        'transactable_id',
    ];


    /*********** METHODS RELATIONSHIP *************/
    public function transactable()
    {
        return $this->morphTo();
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }


//    public function bookingTransaction(){
//        return $this->hasOne(BookingTransaction::class);
//    }
//
//    public function extensionTransaction(){
//        return $this->hasOne(ExtensionTransaction::class);
//    }
//
//    public function confirmation(){
//        return $this->hasOne(Confirmation::class);
//    }


    /*********** METHODS ATTRIBUTES *************/
    public function payableAmount(): string
    {
        return number_format(($this->amount + $this->service_fee)-$this->discount_fee,2);
    }



}
