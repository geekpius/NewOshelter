<?php

namespace App\PropertyModel;

use App\PropertyModel\Property;
use Illuminate\Database\Eloquent\Model;

class PropertyUtility extends Model
{
    protected $table = 'property_utilities';
    protected $primaryKey = 'id';

    protected $fillable = [
        'property_id', 'name',
    ];


    public function property(){
        return $this->belongsTo(Property::class, 'property_id');
    }

}
