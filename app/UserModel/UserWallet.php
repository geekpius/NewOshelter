<?php

namespace App\UserModel;

use App\User;
use Illuminate\Database\Eloquent\Model;
use App\PaymentModel\Withdraw;
use App\PaymentModel\Transaction;

class UserWallet extends Model
{
    
    protected $table = 'user_wallets';
    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id', 
        'transaction_id',
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
        switch ($this->is_cash_out) {
            case 0:
                return "Pending";
                break;
            case 1:
                return "Cash In";
                break;
            case 2:
                return "Pending Approval";
                break; 
            case 3:
                return "Cash Out";
                break;    
            case 4:
                return "Cancelled";
                break; 
            default:
                return "Unknown State";
                break;
        }
    }

    public function getCssStyle(): string
    {
        switch ($this->is_cash_out) {
            case 0:
                return "text-primary";
                break;
            case 1:
                return "text-primary";
                break;
            case 2:
                return "text-purple";
                break; 
            case 3:
                return "text-success";
                break;    
            case 4:
                return "text-danger";
                break; 
            default:
                return "";
                break;
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

    public function withdraw(){
        return $this->hasOne(Withdraw::class);
    }

    public function transaction(){
        return $this->belongsTo(Transaction::class, 'transaction_id');
    }



}
