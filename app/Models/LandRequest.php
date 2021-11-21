<?php

namespace App\Models;

use App\PropertyModel\Property;
use Illuminate\Database\Eloquent\Model;

class LandRequest extends Model
{
    protected $table = 'land_requests';
    protected $primaryKey = 'id';

    protected $fillable = [
        'property_id',
        'external_id',
        'plot',
        'currency',
        'amount',
    ];


    public function userRequests()
    {
        return $this->morphMany(UserRequest::class, 'requestable');
    }

    public function property(){
        return $this->belongsTo(Property::class, 'property_id');
    }
}
