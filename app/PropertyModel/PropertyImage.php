<?php

namespace App\PropertyModel;

use App\PropertyModel\Property;
use Illuminate\Database\Eloquent\Model;

class PropertyImage extends Model
{
    
    protected $table = 'property_images';
    protected $primaryKey = 'id';

    protected $fillable = [
        'property_id', 'caption', 'image',
    ];


    public function property(){
        return $this->belongsTo(Property::class, 'property_id');
    }



}
