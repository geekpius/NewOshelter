<?php

namespace App\PaymentModel;

use Illuminate\Database\Eloquent\Model;
use App\User;

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


    public function scopeSubscriptions()
    {
        return Transaction::where('transactable_type', 'App\Subscription');
    }


    public function scopePendingSubscriptions()
    {
        return Transaction::where('transactable_type', 'App\Subscription')->where('status', Transaction::PENDING);
    }

    public function pendingTransactions()
    {
        return Transaction::where('status', Transaction::PENDING);
    }

    public function isSubscription(): bool
    {
        return $this->transactable_type == 'App\Subscription';
    }




}
