<?php

namespace App\PaymentModel;

use Illuminate\Database\Eloquent\Model;
use App\PaymentModel\Withdraw;

class BankWithdraw extends Model
{
    protected $table = 'bank_withdraws';
    protected $primaryKey = 'id';

    protected $fillable = [
        'withdraw_id',
        'bank_name', 
        'account_number', 
        'account_name', 
    ];

     /************* RELATIONSHIPS **************/ 
     public function withdraw(){
        return $this->belongsTo(Withdraw::class, 'withdraw_id');
    }

    /************* PROPERTIES **************/ 
    public function setAccountNameAttribute($value): void
    {
        $this->attributes['account_name'] = strtolower($value);
    }

    public function getAccountNameAttribute(): string
    {
        return ucwords($this->account_name);
    }


}
