<?php

namespace App\PropertyModel;

use App\PropertyModel\Property;
use Illuminate\Database\Eloquent\Model;

class PropertyCategory extends Model
{
    protected $table = 'property_categories';
    protected $primaryKey = 'id';

    protected $fillable = [
        'property_id', 'category',
    ];


    public function property(){
        return $this->belongsTo(Property::class, 'property_id');
    }

}
