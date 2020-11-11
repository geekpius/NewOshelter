<?php

namespace App\UserModel;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\UserModel\UserVisit;
use App\UserModel\UserExtensionRequest;

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
        'user_id', 'visit_id', 'owner_id', 'extension_date', 'is_confirm', 'is_paid',
    ];


    /************* Relationships ****************/
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function visit(){
        return $this->belongsTo(UserVisit::class, 'visit_id');
    }

    public function owner(){
        return $this->belongsTo(User::class, 'owner_id');
    }


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

    /************* Checking paid ****************/
    public function isPaidAttribute() : bool
    {
        return $this->is_paid == UserExtensionRequest::PAID;
    }

    public function isUnpaidAttribute() : bool
    {
        return $this->is_paid == UserExtensionRequest::UNPAID;
    }


    

}
