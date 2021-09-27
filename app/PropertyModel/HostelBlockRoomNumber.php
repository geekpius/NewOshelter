<?php

namespace App\PropertyModel;

use App\PropertyModel\HostelBlockRoom;
use App\UserModel\UserHostelVisit;
use Illuminate\Database\Eloquent\Model;

class HostelBlockRoomNumber extends Model
{
    protected $table = 'hostel_block_room_numbers';
    protected $primaryKey = 'id';

    protected $fillable = [
        'hostel_block_room_id',
        'room_no',
        'person_per_room',
        'occupant',
        'full',
    ];

    public function hostelBlockRoom(){
        return $this->belongsTo(HostelBlockRoom::class, 'hostel_block_room_id');
    }


}
