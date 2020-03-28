<?php

namespace App\UserModel;

use App\User;
use Illuminate\Database\Eloquent\Model;

class UserWallet extends Model
{
    
    protected $table = 'user_wallets';
    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id', 'balance', 'currency',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }



}
