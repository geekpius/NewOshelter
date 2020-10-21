<?php

namespace App\UserModel;

use App\User;
use App\PropertyModel\Property;
use App\PropertyModel\HostelBlockRoom;
use App\PropertyModel\HostelBlockRoomNumber;
use App\UserModel\UserExtensionRequest;

use Illuminate\Database\Eloquent\Model;

class UserHostelVisit extends Model
{
    protected $table = 'user_hostel_visits';
    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id', 'property_id', 'hostel_block_room_id', 'hostel_block_room_number_id', 'check_in', 'check_out', 'is_in',
    ];

    public function checkInOrOut() : string
    {
        return ($this->status)? 'IN':'OUT';
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function property(){
        return $this->belongsTo(Property::class, 'property_id');
    }

    public function hostelBlockRoom(){
        return $this->belongsTo(HostelBlockRoom::class, 'hostel_block_room_id');
    }

    public function hostelBlockRoomNumber(){
        return $this->belongsTo(HostelBlockRoomNumber::class, 'hostel_block_room_number_id');
    }
    
    public function userExtensionRequests(){
        return $this->hasMany(UserExtensionRequest::class);
    }




}
