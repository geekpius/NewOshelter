<?php

namespace App\UserModel;

use App\User;
use Illuminate\Database\Eloquent\Model;

class UserActivity extends Model
{
    protected $table = 'user_activities';
    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id', 'action', 
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }


}
