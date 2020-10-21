<?php

namespace App\UserModel;

use App\UserModel\UserWallet;
use Illuminate\Database\Eloquent\Model;

class UserWalletTransaction extends Model
{
    protected $table = 'user_wallet_transactions';
    protected $primaryKey = 'id';

    protected $fillable = [
        'user_wallet_id', 'transaction_id', 'type', 'amount',
    ];

    public function userWallet(){
        return $this->belongsTo(UserWallet::class, 'user_wallet_id');
    }



}
