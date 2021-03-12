<?php

namespace App\UserModel;

use App\User;
use App\BookModel\HostelBooking;
use App\PropertyModel\HostelBlockRoom;
use App\PropertyModel\HostelBlockRoomNumber;
use App\PropertyModel\Property;
use App\UserModel\UserHostelVisit;

use Illuminate\Database\Eloquent\Model;

class UserHostelVisit extends Model
{
    protected $table = 'user_hostel_visits';
    protected $primaryKey = 'id';

    CONST IN = 1;
    CONST OUT = 0;
    CONST CANCELLED = 2;

    protected $fillable = [
        'user_id', 
        'property_id', 
        'hostel_booking_id', 
        'hostel_block_room_id', 
        'hostel_block_room_number_id', 
        'check_in', 
        'check_out', 
        'is_in',
    ];

    /********* METHODS ATTRIBUTES *********/
    public function isInAttribute() : bool
    {
        return $this->is_in == UserHostelVisit::IN;
    }

    public function isOutAttribute() : bool
    {
        return $this->is_in == UserHostelVisit::OUT;
    }

    public function isCancelledAttribute() : bool
    {
        return $this->is_in == UserHostelVisit::CANCELLED;
    }


    /************* RELATIONSHIPS *****************/
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function property(){
        return $this->belongsTo(Property::class, 'property_id');
    }

    public function hostelBooking(){
        return $this->belongsTo(HostelBooking::class, 'hostel_booking_id');
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
