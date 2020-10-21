<?php

namespace App\UserModel;

use App\User;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $table = 'user_profiles';
    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id', 'gender', 'dob', 'marital_status', 'children', 'city', 'occupation', 'emergency', 'id_front', 'id_back',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

}
