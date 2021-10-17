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



}
