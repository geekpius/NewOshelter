<?php

namespace App\PropertyModel;

use Illuminate\Database\Eloquent\Model;
use App\PropertyModel\Property;
use App\User;

class ReportProperty extends Model
{
    protected $table = 'report_properties';
    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id', 'property_id', 'complain', 
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function property(){
        return $this->belongsTo(Property::class, 'property_id');
    }

    

}
