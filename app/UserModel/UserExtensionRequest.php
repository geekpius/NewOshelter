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
        'user_id', 'visit_id', 'extension_date', 'status',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function visit(){
        return $this->belongsTo(UserVisit::class, 'visit_id');
    }


    

}
