<?php

namespace App\UserModel;

use App\User;
use Illuminate\Database\Eloquent\Model;

class UserWallet extends Model
{
    
    protected $table = 'user_wallets';
    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id', 
        'balance', 
        'currency', 
        'type', 
        'is_cash_out',
    ];


    /************* PROPERTIES **************/ 
    public function getBalanceAmount(): string
    {
        return $this->currency." ".number_format($this->balance,2);
    }

    public function getStatus(): string
    {
        if($this->is_cash_out){
            return "Cashed Out";
        }else{
            return "Cashed In";
        }
    }

    public function getType(): string
    {
        return ucfirst($this->type);
    }

    /************* RELATIONSHIPS **************/ 
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }


}
