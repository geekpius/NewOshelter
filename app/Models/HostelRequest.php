<?php

namespace App\Models;

use App\PropertyModel\HostelBlockRoomNumber;
use App\PropertyModel\Property;
use App\PropertyModel\PropertyHostelBlock;
use Illuminate\Database\Eloquent\Model;

class HostelRequest extends Model
{
    protected $table = 'hostel_requests';
    protected $primaryKey = 'id';

    protected $fillable = [
        'property_id',
        'external_id',
        'hostel_block_room_number_id',
        'total_amount',
    ];


    public function userRequests()
    {
        return $this->morphMany(UserRequest::class, 'requestable');
    }

    public function property(){
        return $this->belongsTo(Property::class, 'property_id');
    }

    public function hostelBlockRoomNumber(){
        return $this->belongsTo(HostelBlockRoomNumber::class, 'hostel_block_room_number_id');
    }
}
