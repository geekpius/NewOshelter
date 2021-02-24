<?php

namespace App\UserModel;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\UserModel\UserVisit;
use App\UserModel\UserHostelVisit;
use App\UserModel\UserExtensionRequest;
use App\PaymentModel\Transaction;
use Illuminate\Support\Str;
class UserExtensionRequest extends Model
{
    protected $table = 'user_extension_requests';
    protected $primaryKey = 'id';

    CONST PENDING = 1;
    CONST CONFIRM = 2;
    CONST DONE = 3;
    CONST REJECT = 0;

    CONST PAID = 1;
    CONST UNPAID = 0;

    protected $fillable = [
        'user_id', 'visit_id', 'owner_id', 'extension_date', 'is_confirm', 'type',
    ];


    /************* Relationships ****************/
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function visit(){
        return $this->belongsTo(UserVisit::class, 'visit_id');
    }

    public function hostelVisit(){
        return $this->belongsTo(UserHostelVisit::class, 'visit_id');
    }

    public function owner(){
        return $this->belongsTo(User::class, 'owner_id');
    }
    
    // public function transactions(){
    //     return $this->hasMany(Transaction::class);
    // }


    /************* Checking confirm ****************/
    public function isPendingAttribute() : bool
    {
        return $this->is_confirm == UserExtensionRequest::PENDING;
    }

    public function isConfirmAttribute() : bool
    {
        return $this->is_confirm == UserExtensionRequest::CONFIRM;
    }

    public function isDoneAttribute() : bool
    {
        return $this->is_confirm == UserExtensionRequest::DONE;
    }

    public function isRejectAttribute() : bool
    {
        return $this->is_confirm == UserExtensionRequest::REJECT;
    }

    public function generateOrderID() : string
    {
        return Str::random(16);
    }

    public function generatePaymentID(int $length=10) : string
    {
        (string) $characters = '0123456789';
        (int) $charactersLength = strlen($characters);
        (string) $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }



    

}
