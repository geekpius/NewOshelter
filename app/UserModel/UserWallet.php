<?php

namespace App\UserModel;

use App\User;
use Illuminate\Database\Eloquent\Model;

class UserWallet extends Model
{
    
    protected $table = 'user_wallets';
    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id', 'balance', 'currency', 'is_cash_out',
    ];


    /************* PROPERTIES **************/ 
    public function getBalanceAmount(): string
    {
        return $this->currency." ".$this->balance;
    }

    public function getStatus(): string
    {
        if($this->is_cash_out){
            return "Cashed Out";
        }else{
            return "Cashed In";
        }
    }

    /************* RELATIONSHIPS **************/ 
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }


}
