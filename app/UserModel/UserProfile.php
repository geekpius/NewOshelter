<?php

namespace App\UserModel;

use App\User;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $table = 'user_profiles';
    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id', 'gender', 'dob', 'marital_status', 'city', 'occupation', 'emergency', 'id_front', 'id_number', 'id_type',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getIDType(){
        switch ($this->id_type) {
            case 'national':
                return 'National ID';
                break;
            case 'voter':
                return 'Voter\'s ID';
                break;
            case 'driver':
                return 'Driver\'s License';
                break;
            default:
                return 'No ID selected';
                break;
        }
    }

}
