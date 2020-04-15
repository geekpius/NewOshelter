<?php

namespace App;

use Carbon\Carbon;
use App\UserModel\Vat;
use App\UserModel\UserLogin;
use App\UserModel\UserTicket;
use App\UserModel\UserWallet;
use App\UserModel\UserProfile;
use App\UserModel\UserActivity;
use App\PropertyModel\PropertyBid;
use App\PropertyModel\PropertyBuy;
use App\PropertyModel\PropertyRent;
use App\UserModel\UserNotification;
use App\UserModel\UserSavedProperty;
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
        'name', 'email', 'password', 'membership', 'phone', 'digital_address', 'role', 'login_time',
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

    public function userLogins(){
        return $this->hasMany(UserLogin::class);
    }

    public function userActivities(){
        return $this->hasMany(UserActivity::class);
    }

    public function vat(){
        return $this->hasOne(Vat::class);
    }

    public function userNotification(){
        return $this->hasOne(UserNotification::class);
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

    public function userWallet(){
        return $this->hasOne(UserWallet::class);
    }

    public function userTickets(){
        return $this->hasMany(UserTicket::class);
    }

    public function userSavedProperties(){
        return $this->hasMany(UserSavedProperty::class);
    }


}
