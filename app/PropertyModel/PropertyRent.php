<?php

namespace App\PropertyModel;

use App\User;
use Illuminate\Database\Eloquent\Model;

class PropertyRent extends Model
{
    protected $table = 'property_rents';
    protected $primaryKey = 'id';

    protected $fillable = [
        'property_id', 'user_id', 'amount',
    ];


    public function property(){
        return $this->belongsTo(Property::class, 'property_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }



}
