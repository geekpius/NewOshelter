<?php

namespace App\PropertyModel;

use App\PropertyModel\Property;
use Illuminate\Database\Eloquent\Model;

class PropertyDescription extends Model
{
    protected $table = 'property_descriptions';
    protected $primaryKey = 'id';

    protected $fillable = [
        'property_id', 'gate', 'description', 'neighbourhood', 'direction', 'size', 'unit',
    ];


    public function property(){
        return $this->belongsTo(Property::class, 'property_id');
    }
}
