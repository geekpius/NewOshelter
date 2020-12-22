<?php

namespace App\PropertyModel;

use App\PropertyModel\HostelBlockRoom;
use Illuminate\Database\Eloquent\Model;

class PropertyHostelPrice extends Model
{
    protected $table = 'property_hostel_prices';
    protected $primaryKey = 'id';

    protected $fillable = [
        'hostel_block_room_id', 'payment_duration', 'price_calendar', 'property_price', 'currency',
    ];

    public function hostelBlockRoom(){
        return $this->belongsTo(HostelBlockRoom::class, 'hostel_block_room_id');
    }

    /******* ATTRIBUTES PROPERTIES *******/ 
    public function getPaymentDuration()
    {
        if ($this->payment_duration==1){
            return "1 month advance payment";
        }
        elseif ($this->payment_duration==12){
            return "1 year advance payment";
        }
        else{
            return $this->payment_duration." months advance payment";
        }
    }



}
