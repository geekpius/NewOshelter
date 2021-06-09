<?php

namespace App\PropertyModel;

use Illuminate\Database\Eloquent\Model;
use App\PropertyModel\Property;

class PropertyAuctionSchedule extends Model
{
    protected $table = 'property_auction_schedules';
    protected $primaryKey = 'id';

    protected $fillable = [
        'property_id', 
        'auction_venue', 
        'auction_date', 
        'auction_time',
    ];


    public function property(){
        return $this->belongsTo(Property::class, 'property_id');
    }
}
