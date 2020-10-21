<?php

namespace App\PropertyModel;

use App\PropertyModel\Property;
use Illuminate\Database\Eloquent\Model;

class PropertyRule extends Model
{
    protected $table = 'property_rules';
    protected $primaryKey = 'id';

    protected $fillable = [
        'property_id', 'rule',
    ];


    public function property(){
        return $this->belongsTo(Property::class, 'property_id');
    }
}
