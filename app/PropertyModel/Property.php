<?php

namespace App\PropertyModel;

use App\User;
use App\UserModel\UserVisit;
use App\UserModel\UserHostelVisit;
use App\BookingModel\Booking;
use App\PropertyModel\Property;
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
use App\PropertyModel\PropertyUtility;
use App\PropertyModel\PropertyLocation;
use Illuminate\Database\Eloquent\Model;
use App\PropertyModel\PropertyDescription;
use App\PropertyModel\PropertyHostelBlock;
use App\PropertyModel\PropertyHostelPrice;
use App\PropertyModel\PropertySharedAmenity;
use App\PropertyModel\IncludeUtility;
use Illuminate\Database\Eloquent\SoftDeletes;

class Property extends Model
{
    use SoftDeletes; 
    
    protected $table = 'properties';
    protected $primaryKey = 'id';
    protected $dates = ['deleted_at'];
    const PUBLISH = true;
    const NOT_PUBLISH = false;
    const DONE_STEP = true;
    const NOT_DONE_STEP = false;

    protected $fillable = [
        'user_id', 'base', 'type', 'type_status', 'title', 'step', 'adult', 'children', 'infant',
    ];

    public function isPublish() : bool
    {
        return $this->publish == Property::PUBLISH;
    }

    /******************************  ATTRIBUTES ******************************/
    public function isActive() : bool
    {
        return $this->is_active == true;
    }

    public function isDoneStep() : bool
    {
        return $this->done_step == Property::DONE_STEP;
    }

    public function getBaseAttribute($value)
    {
        return ucwords(str_replace('_',' ',$value));
    }

    public function isAmenityChecked($value)
    {
        return PropertyAmenity::whereProperty_id($this->id)->whereName($value)->exists();
    }

    public function isSharedAmenityChecked($value)
    {
        return PropertySharedAmenity::whereProperty_id($this->id)->whereName($value)->exists();
    }

    public function isRuleChecked($value)
    {
        return PropertyRule::whereProperty_id($this->id)->whereRule($value)->exists();
    }

    public function isIncludeUtilityChecked($value)
    {
        return IncludeUtility::whereProperty_id($this->id)->whereName($value)->exists();
    }



    /******************************  STARS ******************************/
    public function sumAccuracyStar()
    {
        return PropertyReview::whereProperty_id($this->id)->sum('accuracy_star');
    }

    public function sumSecurityStar()
    {
        return PropertyReview::whereProperty_id($this->id)->sum('security_star');
    }

    public function sumCommunicationStar()
    {
        return PropertyReview::whereProperty_id($this->id)->sum('comm_star');
    }

    public function sumLocationStar()
    {
        return PropertyReview::whereProperty_id($this->id)->sum('location_star');
    }

    public function sumValueStar()
    {
        return PropertyReview::whereProperty_id($this->id)->sum('value_star');
    }

    public function sumCleanStar()
    {
        return PropertyReview::whereProperty_id($this->id)->sum('tidy_star');
    }



    /******************************  RELATIONSHIP ******************************/
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

    public function propertySharedAmenities(){
        return $this->hasMany(PropertySharedAmenity::class);
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
    
    public function userVisits(){
        return $this->hasMany(UserVisit::class);
    }

    public function userHostelVisits(){
        return $this->hasMany(UserHostelVisit::class);
    }

    public function propertyUtilities(){
        return $this->hasMany(PropertyUtility::class);
    }

    public function includeUtilities(){
        return $this->hasMany(IncludeUtility::class);
    }



}
