<?php

namespace App\PropertyModel;

use Illuminate\Database\Eloquent\Model;

class PropertyType extends Model
{
    


    public function getNameAttribute($value)
    {
        return ucwords(str_replace('_',' ',$value));
    }

}
