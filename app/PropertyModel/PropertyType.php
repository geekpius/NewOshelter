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

    public function getPropertyCount()
    {
        return Property::whereType(strtolower(str_replace(' ','_',$this->name)))->wherePublish(true)->whereIs_active(true)->whereDone_step(true)
        ->whereDoesntHave('userVisits')->orWhereHas('userVisits', function($query){
            $query->whereIn('status', [0,2]);
        })->count();
    }

}
