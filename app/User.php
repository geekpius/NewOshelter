<?php

namespace App;

use App\Models\UserRequest;
use Carbon\Carbon;
use App\UserModel\UserLogin;
use App\UserModel\UserCurrency;
use App\UserModel\UserProfile;
use App\PropertyModel\Property;
use App\UserModel\UserNotification;
use App\UserModel\UserSavedProperty;
use App\PropertyModel\PropertyReview;
use App\PaymentModel\Transaction;
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
        'name',
        'email',
        'password',
        'phone',
        'account_type',
        'email_verification_token',
        'email_verification_expired_at',
        'verify_email_time',
        'verify_email',
        'verify_sms',
        'login_time',
        'is_id_verified',
        'login_time',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'email_verification_token', 'sms_verification_token',
    ];


    /************** PROPERTIES **************/
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

    public function getAccountType()
    {
        return ucfirst($this->account_type);
    }


    /************** RELATIONSHIPS **************/
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function rejectReasons()
    {
        return $this->hasMany(RejectReason::class);
    }

    public function userRequests()
    {
        return $this->hasMany(UserRequest::class);
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

    public function userNotification(){
        return $this->hasOne(UserNotification::class);
    }

    public function propertyReviews(){
        return $this->hasMany(PropertyReview::class);
    }

    public function userSavedProperties(){
        return $this->hasMany(UserSavedProperty::class);
    }


    public function userCurrency(){
        return $this->hasOne(UserCurrency::class);
    }


    public function countMyProperties(): int
    {
        return $this->properties()->where('is_active', true)->where('publish', true)->where('done_step', true)->count();
    }


    public function countPendingProperties(): int
    {
        return $this->properties()->where('is_active', true)->where('publish', true)
            ->where('done_step', true)->where('status', Property::PENDING)->count();
    }


    public function countApprovedProperties(): int
    {
        return $this->properties()->where('is_active', true)->where('publish', true)
            ->where('done_step', true)->where('status', Property::APPROVED)->count();
    }

    public function countRejectedProperties(): int
    {
        return $this->properties()->where('is_active', true)->where('publish', true)
            ->where('done_step', true)->where('status', Property::REJECTED)->count();
    }


    public function countOverallRating(): int
    {
        return $this->propertyReviews()->count();
    }

    public function countRejectReasons(): int
    {
        return $this->rejectReasons()->count();
    }

    public function isVisitor(): bool
    {
        return $this->account_type=='visitor';
    }

    public function isOwner(): bool
    {
        return $this->account_type=='owner';
    }

    public function isUserDifferentDevice(string $device, string $browser): bool
    {
        return $this->userLogins->where('device', $device)->where('browser', $browser)-> count() < 1;
    }

    public function countBookingRequests(): int
    {
        return $this->userRequests->where('type', 'booking')->count();
    }

    public function countAllRequests(): int
    {
        return $this->userRequests->count();
    }

    public function countAllApprovedRequests(): int
    {
        return  $this->userRequests->where('status', UserRequest::APPROVED)->count();
    }

    public function countAllPendingRequests(): int
    {
        return  $this->userRequests->where('status', UserRequest::PENDING)->count();
    }


    public function countAllRejectedRequests(): int
    {
        return  $this->userRequests->where('status', UserRequest::REJECTED)->count();
    }



}
