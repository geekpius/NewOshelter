<?php

namespace App\UserModel;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\UserModel\UserVisit;

class UserExtensionRequest extends Model
{
    protected $table = 'user_extension_requests';
    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id', 'visit_id', 'owner_id', 'extension_date', 'is_confirm',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function visit(){
        return $this->belongsTo(UserVisit::class, 'visit_id');
    }

    public function getConfirmation(){
        if($this->is_confirm == 0){
            return 'Pending';
        }
        else if($this->is_confirm == 1){
            return 'Confirmed';
        }else if($this->is_confirm == 2){
            return 'Declined';
        }
    }

    public function getPaid(){
        if($this->is_paid){
            return 'Paid';
        }
        else{
            return 'Not Paid';
        }
    }


    

}
