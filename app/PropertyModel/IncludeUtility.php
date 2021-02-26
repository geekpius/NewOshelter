<?php

namespace App\PropertyModel;

use Illuminate\Database\Eloquent\Model;
use App\PropertyModel\Property;

class IncludeUtility extends Model
{
    protected $table = 'include_utilities';
    protected $primaryKey = 'id';

    protected $fillable = [
        'property_id', 'name',
    ];

    public function property(){
        return $this->belongsTo(Property::class, 'property_id');
    }

    public function getName(): string
    {
        return ucfirst($this->name);
    }


}
