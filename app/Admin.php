<?php

namespace App;

use Carbon\Carbon;
use App\AdminModel\AdminWallet;
use App\PropertyModel\Property;
use App\AdminModel\AdminProfile;
use App\PropertyModel\PropertyList;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'admins';
    protected $primaryKey = 'id';

    
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];



    public function setEmailAttribute($value)
    {
        $this->attributes['email'] = strtolower($value);
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = strtolower($value);
    }

    public function getNameAttribute($value)
    {
        return ucwords($value);
    }

    public function getLoginTimeAttribute($value)
    {
        return (empty($value))? 'None':Carbon::parse($value)->format('d-M-Y h:i a');
    }

    public function getAgeAttribute()
    {
        return (empty($this->profile->dob))? 'Age':Carbon::parse($this->profile->dob)->age;
    }

    public function profile(){
        return $this->hasOne(AdminProfile::class, 'admin_id');
    }

    public function properties(){
        return $this->hasMany(Property::class, 'admin_id');
    }

    public function propertyLists(){
        return $this->hasMany(PropertyList::class, 'admin_id');
    }

    public function adminWallet(){
        return $this->hasOne(AdminWallet::class);
    }




    
}
