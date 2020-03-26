<?php

namespace App\PropertyModel;

use App\PropertyModel\Property;
use Illuminate\Database\Eloquent\Model;

class PropertyLocation extends Model
{
    protected $table = 'property_locations';
    protected $primaryKey = 'id';

    protected $fillable = [
        'property_id', 'digital_address', 'location',
    ];


    public function property(){
        return $this->belongsTo(Property::class, 'property_id');
    }


    
}
