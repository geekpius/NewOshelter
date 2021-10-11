<?php

namespace App\Models;

use App\PropertyModel\Property;
use Illuminate\Database\Eloquent\Model;

class ShowInterest extends Model
{
    protected $table = 'show_interests';
    protected $primaryKey = 'id';

    const RESPONDED = 'responded';
    const NOT_RESPONDED = 'not responded';

    protected $fillable = [
        'external_id',
        'property_id',
        'name',
        'phone',
        'status',
    ];


    public function getNameAttribute(string $value): void
    {
        $this->attributes['name'] = strtolower($value);
    }


    public function property(){
        return $this->belongsTo(Property::class, 'property_id');
    }


}
