<?php

namespace App\PropertyModel;

use App\PropertyModel\Property;
use App\PropertyModel\PropertyUtility;
use Illuminate\Database\Eloquent\Model;

class PropertyUtility extends Model
{
    protected $table = 'property_utilities';
    protected $primaryKey = 'id';

    const ON = TRUE;
    const OFF = FALSE;

    protected $fillable = [
        'property_id', 'name', 'amount', 'currency', 'status',
    ];


    public function isOn(): bool 
    {
        return $this->status == PropertyUtility::ON;
    }

    public function checkStatus(): string 
    {
        return ($this->status)? 'ON':'OFF';
    }

    public function property(){
        return $this->belongsTo(Property::class, 'property_id');
    }

}
