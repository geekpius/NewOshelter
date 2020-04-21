<?php

namespace App\PropertyModel;

use App\PropertyModel\HostelBlockRoom;
use Illuminate\Database\Eloquent\Model;

class HostelRoomAmenity extends Model
{
    protected $table = 'hostel_room_amenities';
    protected $primaryKey = 'id';

    protected $fillable = [
        'hostel_block_room_id', 'name',
    ];

    public function hostelBlockRoom(){
        return $this->belongsTo(HostelBlockRoom::class, 'hostel_block_room_id');
    }




}
