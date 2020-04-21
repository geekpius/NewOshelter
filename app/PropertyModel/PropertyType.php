<?php

namespace App\PropertyModel;

use App\PropertyModel\Property;
use Illuminate\Database\Eloquent\Model;

class PropertyType extends Model
{
    
    protected $table = 'property_types';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name', 'image',
    ];



    public function getNameAttribute($value)
    {
        return ucwords(str_replace('_',' ',$value));
    }

    public function getPropertyCount($value)
    {
        return Property::whereType($value)->whereDone_step(true)->count();
    }

}
