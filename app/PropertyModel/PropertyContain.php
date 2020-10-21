<?php

namespace App\PropertyModel;

use App\PropertyModel\Property;
use Illuminate\Database\Eloquent\Model;

class PropertyContain extends Model
{
    protected $table = 'property_contains';
    protected $primaryKey = 'id';

    protected $fillable = [
        'property_id', 'bedroom', 'no_bed', 'kitchen', 'bathroom', 'bath_private', 'toilet', 'toilet_private', 'furnish',
    ];


    public function property(){
        return $this->belongsTo(Property::class, 'property_id');
    }

    public function getFurnishAttribute($value)
    {
        return ucwords(str_replace('_',' ',$value));
    }


}
