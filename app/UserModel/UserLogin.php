<?php

namespace App\UserModel;

use App\User;
use Illuminate\Database\Eloquent\Model;

class UserLogin extends Model
{
    protected $table = 'user_logins';
    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id', 'device', 'browser', 'location',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    
}
