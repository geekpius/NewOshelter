<?php

namespace App\PropertyModel;

use App\Admin;
use App\PropertyModel\Property;
use Illuminate\Database\Eloquent\Model;

class PropertyList extends Model
{
    protected $table = 'property_lists';
    protected $primaryKey = 'id';

    protected $fillable = [
        'admin_id', 'property_id',
    ];

    public function admin(){
        return $this->belongsTo(Admin::class, 'admin_id');
    }

    public function property(){
        return $this->belongsTo(Property::class, 'property_id');
    }





}
