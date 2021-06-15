<?php

namespace App\EventModel;

use Illuminate\Database\Eloquent\Model;
use App\PropertyModel\Property;
use App\User;

class AuctionEvent extends Model
{
    protected $table = 'auction_events';
    protected $primaryKey = 'id';

    CONST PENDING = 1;
    CONST DONE = 2;
    CONST CANCEL = 0;


    protected $fillable = [
        'user_id', 
        'property_id', 
        'owner_id', 
        'status',
    ];


    /*********** METHODS ATTRIBUTES *************/
    public function isPendingAttribute() : bool
    {
        return $this->status == AuctionEvent::PENDING;
    }

    public function isDoneAttribute() : bool
    {
        return $this->status == AuctionEvent::DONE;
    }

    public function isCancelAttribute(): bool
    {
        return $this->status == AuctionEvent::CANCEL;
    }

    /*********** METHODS RELATIONSHIP *************/
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function owner(){
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function property(){
        return $this->belongsTo(Property::class, 'property_id');
    }


}
