<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceCharge extends Model
{
    protected $table = 'service_charges';
    protected $primaryKey = 'id';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'property_type', 'charge', 'discount',
    ];

    public function getPropertyTypeAttribute($value)
    {
        return ucwords(str_replace('_',' ',$value));
    }



}
