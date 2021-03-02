<?php

namespace App\PaymentModel;

use Illuminate\Database\Eloquent\Model;
use App\UserModel\UserWallet;
use App\PaymentModel\MobileWithdraw;
use App\PaymentModel\BankWithdraw;

class Withdraw extends Model
{
    protected $table = 'withdraws';
    protected $primaryKey = 'id';

    protected $fillable = [
        'wallet_id',
        'reference_id', 
        'amount', 
        'currency', 
        'channel',
    ];


    /************* RELATIONSHIPS **************/ 
    public function wallet(){
        return $this->belongsTo(UserWallet::class, 'wallet_id');
    }

    public function mobileWithdraw(){
        return $this->hasOne(MobileWithdraw::class);
    }

    public function bankWithdraw(){
        return $this->hasOne(BankWithdraw::class);
    }

}
