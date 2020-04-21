<?php

namespace App\PropertyModel;

use App\User;
use App\PropertyModel\PropertyList;
use App\PropertyModel\PropertyRent;
use App\PropertyModel\PropertyRule;
use App\PropertyModel\PropertyImage;
use App\PropertyModel\PropertyPrice;
use App\UserModel\UserSavedProperty;
use App\PropertyModel\PropertyReview;
use App\PropertyModel\HostelBlockRoom;
use App\PropertyModel\PropertyAmenity;
use App\PropertyModel\PropertyContain;
use App\PropertyModel\PropertyOwnRule;
use App\PropertyModel\PropertyLocation;
use Illuminate\Database\Eloquent\Model;
use App\PropertyModel\PropertyDescription;
use App\PropertyModel\PropertyHostelBlock;
use App\PropertyModel\PropertyHostelPrice;

class Property extends Model
{
    protected $table = 'properties';
    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id', 'base', 'type', 'type_status', 'title', 'step', 'adult', 'children', 'infant',
    ];

    public function getBaseAttribute($value)
    {
        return ucwords(str_replace('_',' ',$value));
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function propertyContain(){
        return $this->hasOne(PropertyContain::class);
    }

    public function propertyHostelBlocks(){
        return $this->hasMany(PropertyHostelBlock::class);
    }

    public function propertyHostelBlockRooms()
    {
        return $this->hasManyThrough(HostelBlockRoom::class, PropertyHostelBlock::class);
    }

    public function propertyAmenities(){
        return $this->hasMany(PropertyAmenity::class);
    }

    public function propertyLocation(){
        return $this->hasOne(PropertyLocation::class);
    }

    public function propertyImages(){
        return $this->hasMany(PropertyImage::class);
    }

    public function propertyDescription(){
        return $this->hasOne(PropertyDescription::class);
    }

    public function propertyRules(){
        return $this->hasMany(PropertyRule::class);
    }

    public function propertyOwnRules(){
        return $this->hasMany(PropertyOwnRule::class);
    }

    public function propertyPrice(){
        return $this->hasOne(PropertyPrice::class);
    }

    public function propertyReviews(){
        return $this->hasMany(PropertyReview::class);
    }

    public function propertyRents(){
        return $this->hasMany(PropertyRent::class);
    }

    public function userSavedProperties(){
        return $this->hasMany(UserSavedProperty::class);
    }



}
