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


    public function setGenderAttribute($gender): void
    {
        $this->attributes['gender'] = strtolower($gender);
    }

    public function getGenderAttribute($gender): string
    {
        return ucfirst($gender);
    }

    public function setCityAttribute($city): void
    {
        $this->attributes['city'] = strtolower($city);
    }

    public function getCityAttribute($city): string
    {
        return ucwords($city);
    }

    public function setOccupationAttribute($occupation): void
    {
        $this->attributes['occupation'] = strtolower($occupation);
    }

    public function getOccupationAttribute($occupation): string
    {
        return ucwords($occupation);
    }

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
