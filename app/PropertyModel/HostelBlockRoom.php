<?php

namespace App\PropertyModel;

use Illuminate\Database\Eloquent\Model;
use App\PropertyModel\PropertyHostelBlock;

class HostelBlockRoom extends Model
{
    protected $table = 'hostel_block_rooms';
    protected $primaryKey = 'id';

    protected $fillable = [
        'property_hostel_block_id', 'room', 'type', 'no_person', 'occupant', 'full',
    ];

    public function propertyHostelBlock(){
        return $this->belongsTo(PropertyHostelBlock::class, 'property_hostel_block_id');
    }

}
