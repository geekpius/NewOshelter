<?php

namespace App\PropertyModel;

use App\PropertyModel\Property;
use Illuminate\Database\Eloquent\Model;

class PropertyPrice extends Model
{
    protected $table = 'property_prices';
    protected $primaryKey = 'id';

    protected $fillable = [
        'property_id', 'payment_duration', 'minimum_stay', 'maximum_stay', 'price_calendar', 'property_price', 'currency', 'negotiable',
    ];

    public function property(){
        return $this->belongsTo(Property::class, 'property_id');
    }

    
}
