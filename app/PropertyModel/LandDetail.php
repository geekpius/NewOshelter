<?php

namespace App\PropertyModel;

use Illuminate\Database\Eloquent\Model;

class LandDetail extends Model
{
    protected $table = 'land_details';
    protected $primaryKey = 'id';

    protected $fillable = [
        'property_id', 'area_size', 'plot_size', 'price', 'currency', 'have_indenture', 'indenture_file',
    ];

    public function property(){
        return $this->belongsTo(Property::class, 'property_id');
    }

    public function setAreaSizeAttribute($value)
    {
        $this->attributes['area_size'] = strtolower($value);
    }

    public function setPlotSizeAttribute($value)
    {
        $this->attributes['plot_size'] = strtolower($value);
    }



}
