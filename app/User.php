<?php

namespace App;

use App\UserModel\UserProfile;
use App\PropertyModel\PropertyBid;
use App\PropertyModel\PropertyBuy;
use App\PropertyModel\PropertyRent;
use App\PropertyModel\PropertyReview;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
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
        return $this->hasOne(UserProfile::class);
    }



    public function propertyReviews(){
        return $this->hasMany(PropertyReview::class);
    }

    public function propertyRents(){
        return $this->hasMany(PropertyRent::class);
    }

    public function propertyBuys(){
        return $this->hasMany(PropertyBuy::class);
    }

    public function propertyBids(){
        return $this->hasMany(PropertyBid::class);
    }


}
