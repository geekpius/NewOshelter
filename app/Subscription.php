<?php

namespace App;

use App\PaymentModel\Transaction;
use Illuminate\Database\Eloquent\Model;
use App\Package;
use Carbon\Carbon;

class Subscription extends Model
{
    protected $table = 'subscriptions';
    protected $primaryKey = 'id';

    const RECURRENT = 'recurrent';
    const COMMISSION = 'commission';

    protected $fillable = [
        'package_id',
        'start_date',
        'end_date',
        'status',
    ];

    public function transactions()
    {
        return $this->morphMany(Transaction::class, 'transactable');
    }

    public function package(){
        return $this->belongsTo(Package::class, 'package_id');
    }

    public function hasExpired(): bool
    {
        if($this->status != Subscription::COMMISSION){
            return $this->end_date < Carbon::today()->format('Y-m-d');
        }
        return false;
    }


}
