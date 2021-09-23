<?php

namespace App;

use App\PaymentModel\Transaction;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $table = 'subscriptions';
    protected $primaryKey = 'id';

    const ONETIME = 'one time';
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

}
