<?php

namespace App\PropertyModel;

use Illuminate\Database\Eloquent\Model;
use App\PropertyModel\HostelRoomAmenity;
use App\PropertyModel\PropertyHostelBlock;
use App\PropertyModel\PropertyHostelPrice;
use App\PropertyModel\HostelBlockRoomNumber;

class HostelBlockRoom extends Model
{
    protected $table = 'hostel_block_rooms';
    protected $primaryKey = 'id';

    protected $fillable = [
        'property_hostel_block_id', 'block_room_type', 'gender', 'block_no_room', 'start_room_no', 'bed_person', 'person_per_room', 'furnish', 'kitchen', 'bathroom', 'bath_private', 'toilet', 'toilet_private',
    ];

    public function propertyHostelBlock(){
        return $this->belongsTo(PropertyHostelBlock::class, 'property_hostel_block_id');
    }

    public function hostelBlockRoomNumbers(){
        return $this->hasMany(HostelBlockRoomNumber::class);
    }

    public function hostelRoomAmenities(){
        return $this->hasMany(HostelRoomAmenity::class);
    }

    public function propertyHostelPrice(){
        return $this->hasOne(PropertyHostelPrice::class);
    }

    public function getBlockRoomTypeAttribute($value)
    {
        return ucwords(str_replace('_',' ',$value));
    }

    public function getGenderAttribute($value)
    {
        return ucfirst($value);
    }




    
}
