<?php

namespace App\UserModel;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    protected $table = 'currencies';
    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id', 'currency',
    ];


    public function getCurrencyName(): string
    {
        switch($this->currency){
            case "GHS":
                return "Ghana Cedis";
            case "USD":
                return "United States Dollar";
            default:
                return "Ghana Cedis";
        }
    }

    /************* RELATIONSHIPS **************/ 
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
