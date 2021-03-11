<?php

namespace App\UserModel;

use Illuminate\Database\Eloquent\Model;
use App\UserModel\UserVisit;
use App\UserModel\UserHostelVisit;
use App\PaymentModel\Transaction;

class Confirmation extends Model
{
    protected $table = 'confirmations';
    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id', 'owner_id', 'visit_id', 'transaction_id', 'type', 'status',
    ];


    public function getStatus(): string
    {
        switch($this->status){
            case 1:
                return "Confirmed";
            case 2:
                return "Cancelled";
            default:
                return "Unknown";
        }
    }

    /************* RELATIONSHIPS **************/ 
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function owner(){
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function visit(){
        return $this->belongsTo(UserVisit::class, 'visit_id');
    }

    public function hostelVisit(){
        return $this->belongsTo(UserHostelVisit::class, 'visit_id');
    }

    public function transaction(){
        return $this->belongsTo(Transaction::class, 'transaction_id');
    }


}
