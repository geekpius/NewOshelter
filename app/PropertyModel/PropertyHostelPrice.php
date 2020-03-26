<?php

namespace App\PropertyModel;

use Illuminate\Database\Eloquent\Model;
use App\PropertyModel\PropertyHostelBlock;

class PropertyHostelPrice extends Model
{
    protected $table = 'property_hostel_prices';
    protected $primaryKey = 'id';

    protected $fillable = [
        'property_id', 'property_hostel_block_id', 'payment_duration', 'price_calendar', 'property_price', 'currency',
    ];

    public function property(){
        return $this->belongsTo(PropertyHostelBlock::class, 'property_id');
    }

    public function propertyHostelBlock(){
        return $this->belongsTo(PropertyHostelBlock::class, 'property_hostel_block_id');
    }



}
