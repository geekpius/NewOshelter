<?php

namespace App\PropertyModel;

use Illuminate\Database\Eloquent\Model;
use App\PropertyModel\Property;

class PropertyVideo extends Model
{
    protected $table = 'property_videos';
    protected $primaryKey = 'id';

    protected $fillable = [
        'property_id', 'video_url',
    ];


    public function property(){
        return $this->belongsTo(Property::class, 'property_id');
    }

}
