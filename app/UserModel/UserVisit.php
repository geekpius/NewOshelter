<?php

namespace App\UserModel;

use App\User;
use App\UserModel\UserVisit;
use App\PropertyModel\Property;
use App\UserModel\UserExtensionRequest;
use Illuminate\Database\Eloquent\Model;

class UserVisit extends Model
{
    protected $table = 'user_visits';
    protected $primaryKey = 'id';

    CONST IN = 1;
    CONST OUT = 0;

    protected $fillable = [
        'user_id', 'property_id', 'check_in', 'check_out', 'adult', 'children', 'infant', 'status',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function property(){
        return $this->belongsTo(Property::class, 'property_id');
    }
    
    public function userExtensionRequests(){
        return $this->hasMany(UserExtensionRequest::class);
    }

    /*********** METHODS ATTRIBUTES *************/
    public function isInAttribute() : bool
    {
        return $this->status == UserVisit::IN;
    }

    public function isOutAttribute() : bool
    {
        return $this->status == UserVisit::OUT;
    }

    public function getGuestAttribute()
    {
        return $this->adult+$this->children+$this->infant;
    }



}
