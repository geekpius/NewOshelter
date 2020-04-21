<?php

namespace App\PropertyModel;

use App\PropertyModel\Property;
use App\PropertyModel\HostelBlockRoom;
use Illuminate\Database\Eloquent\Model;
use App\PropertyModel\HostelRoomAmenity;
use App\PropertyModel\PropertyHostelPrice;

class PropertyHostelBlock extends Model
{
    protected $table = 'property_hostel_blocks';
    protected $primaryKey = 'id';

    protected $fillable = [
        'property_id', 'block_name',
    ];

    public function property(){
        return $this->belongsTo(Property::class, 'property_id');
    }
    
    public function propertyHostelPrice(){
        return $this->hasOne(PropertyHostelPrice::class);
    }

    public function hostelBlockRooms(){
        return $this->hasMany(HostelBlockRoom::class);
    }


    public function setBlockNameAttribute($value){
        $this->attributes['block_name'] = strtolower($value);
    }

    public function getBlockNameAttribute($value){
        return ucwords($value);
    }
    


}
