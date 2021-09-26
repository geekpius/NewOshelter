<?php

namespace App\PropertyModel;

use App\Models\AuctionRequest;
use App\Models\RentRequest;
use App\Models\SaleRequest;
use App\Models\ShortStayRequest;
use App\RejectReason;
use Illuminate\Database\Eloquent\Model;
use App\User;
use App\UserModel\UserSavedProperty;

class Property extends Model
{

    protected $table = 'properties';
    protected $primaryKey = 'id';

    const PUBLISH = true;
    const NOT_PUBLISH = false;
    const DONE_STEP = true;
    const NOT_DONE_STEP = false;
    CONST PENDING = 'pending';
    CONST APPROVED = 'approved';
    CONST REJECTED = 'rejected';
    CONST TAKEN = 'taken';

    protected $fillable = [
        'user_id', 'base', 'type', 'type_status', 'title', 'step',
        'adult', 'children', 'publish', 'done_step', 'step',
        'section', 'is_active', 'sector',
    ];

    public function isPublish() : bool
    {
        return $this->publish == self::PUBLISH;
    }

    /******************************  ATTRIBUTES ******************************/
    public function isActive() : bool
    {
        return $this->is_active == true;
    }

    public function isDoneStep() : bool
    {
        return $this->done_step == self::DONE_STEP;
    }

    public function getBaseAttribute($value)
    {
        return ucwords(str_replace('_',' ',$value));
    }

    public function getNumberOfGuest()
    {
        return $this->adult+$this->children;
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

    public function getPropertyType()
    {
        return ucwords(str_replace('_',' ',$this->type));;
    }

    public function getPropertyTypeStatus()
    {
        return ucwords(str_replace('_',' ',$this->type_status));;
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

    public function rejectReasons()
    {
        return $this->morphMany(RejectReason::class, 'rejectable');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function propertyContain(){
        return $this->hasOne(PropertyContain::class);
    }

    public function rentRequests()
    {
        return $this->hasMany(RentRequest::class);
    }

    public function shortStayRequests()
    {
        return $this->hasMany(ShortStayRequest::class);
    }

    public function saleRequests()
    {
        return $this->hasMany(SaleRequest::class);
    }

    public function auctionRequests()
    {
        return $this->hasMany(AuctionRequest::class);
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


    public function includeUtilities(){
        return $this->hasMany(IncludeUtility::class);
    }


    public function propertyVideo(){
        return $this->hasOne(PropertyVideo::class);
    }

    public function propertyAuctionSchedule(){
        return $this->hasOne(PropertyAuctionSchedule::class);
    }


    public function getAvailableRooms(): int
    {
        (int) $count= 0;
        foreach($this->propertyHostelBlockRooms as $block){
            $count += $block->hostelBlockRoomNumbers->where('full', false)->count();
        }
        return $count;
    }

    public function getFullRooms(): int
    {
        (int) $count= 0;
        foreach($this->propertyHostelBlockRooms as $block){
            $count += $block->hostelBlockRoomNumbers->where('full', true)->count();
        }
        return $count;
    }

    public function hostelRoomLeft(): int
    {
        return $this->getAvailableRooms() - $this->getFullRooms();
    }

    public function isVisitorIn(): bool
    {
        if($this->type=='hostel'){
            return true;
        }else{
            return $this->userVisits->where('status', 1)->count() == 0;
        }
    }

    public function getBedRooms(): string
    {
        return $this->propertyContain->bedroom.' '.str_plural('bedroom', $this->propertyContain->bedroom);
    }

    public function isSold(): bool
    {
        return $this->orders->where('status', 2)->count() == 0;
    }

    public function isAuctionProperty(): bool
    {
        return $this->type_status == 'auction';
    }

    public function isSaleProperty(): bool
    {
        return $this->type_status == 'sale';
    }

    public function isRentProperty(): bool
    {
        return $this->type_status == 'rent';
    }

    public function isShortStayProperty(): bool
    {
        return $this->type_status == 'short_stay';
    }

    public function isHostelPropertyType(): bool
    {
        return $this->type == 'hostel';
    }


    public function isPropertyTaken(): bool
    {
        return $this->status == self::TAKEN;
    }

    public function isPropertyPending(): bool
    {
        return $this->status == self::PENDING;
    }

    public function isPropertyApproved(): bool
    {
        return $this->status == self::APPROVED;
    }




}
