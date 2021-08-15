<?php

namespace App\PropertyModel;

use Illuminate\Database\Eloquent\Model;
use App\PropertyModel\Property;
use Carbon\Carbon;

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

    public function auctionDate()
    {
        return empty($this->auction_date) ? null : Carbon::parse($this->auction_date)->format('d-M-Y');
    }

    public function auctionTime()
    {
        return empty($this->auction_time) ? null : Carbon::parse($this->auction_time)->format('h:ia');
    }
}
