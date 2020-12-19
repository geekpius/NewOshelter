<?php

namespace App;

use App\User;
use Carbon\Carbon;
use App\UserModel\Vat;
use Illuminate\Support\Str;
use App\UserModel\UserLogin;
use App\UserModel\UserVisit;
use App\UserModel\UserHostelVisit;
use App\BookModel\Booking;
use App\BookModel\HostelBooking;
use App\UserModel\UserTicket;
use App\UserModel\UserWallet;
use App\UserModel\UserProfile;
use App\PropertyModel\Property;
use App\UserModel\UserActivity;
use App\PropertyModel\PropertyBid;
use App\PropertyModel\PropertyBuy;
use App\PropertyModel\PropertyRent;
use App\UserModel\UserNotification;
use App\UserModel\UserSavedProperty;
use App\PropertyModel\PropertyReview;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;

    protected $table = 'users';
    protected $dates = ['deleted_at'];

    const VERIFY_EMAIL = true;
    const UNVERIFY_EMAIL = false;
    const VERIFY_SMS = true;
    const UNVERIFY_SMS = false;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone', 'email_verification_token', 'verify_email_time', 
        'verify_email', 'verify_sms', 'login_time',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function isVerifyEmail() : bool
    {
        return $this->verify_email == User::VERIFY_EMAIL;
    }

    public function isVerifySms() : bool
    {
        return $this->verify_sms == User::VERIFY_SMS;
    }


    public function generateSmsVerificationCode(int $length=4) : string
    {
        (string) $characters = '0123456789';
        (int) $charactersLength = strlen($characters);
        (string) $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

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

    public function properties(){
        return $this->hasMany(Property::class);
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

    public function userVisits(){
        return $this->hasMany(UserVisit::class);
    }

    public function userHostelVisits(){
        return $this->hasMany(UserHostelVisit::class);
    }

    public function userBookings(){
        return $this->hasMany(Booking::class);
    }

    public function userHostelBookings(){
        return $this->hasMany(HostelBooking::class);
    }


}
