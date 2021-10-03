<?php

namespace App\Models;

use App\PropertyModel\Property;
use Illuminate\Database\Eloquent\Model;

class ShortStayRequest extends Model
{
    protected $table = 'short_stay_requests';
    protected $primaryKey = 'id';

    protected $fillable = [
        'property_id',
        'external_id',
        'check_in',
        'check_out',
        'amount',
        'currency',
        'adult',
        'children',
    ];


    public function userRequests()
    {
        return $this->morphMany(UserRequest::class, 'requestable');
    }

    public function property(){
        return $this->belongsTo(Property::class, 'property_id');
    }
}
