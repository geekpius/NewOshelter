<?php

namespace App\PropertyModel;

use App\PropertyModel\Property;
use Illuminate\Database\Eloquent\Model;

class PropertyAmenity extends Model
{
    protected $table = 'property_amenities';
    protected $primaryKey = 'id';

    protected $fillable = [
        'property_id', 'name',
    ];


    public function property(){
        return $this->belongsTo(Property::class, 'property_id');
    }


    
}
