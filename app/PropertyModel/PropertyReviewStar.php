<?php

namespace App\PropertyModel;

use Illuminate\Database\Eloquent\Model;
use App\PropertyModel\Property;

class PropertyReviewStar extends Model
{
    protected $table = 'property_review_stars';
    protected $primaryKey = 'id';

    protected $fillable = [
        'property_id', 'location_star', 'comm_star', 'value_star', 'accuracy_star', 'tidy_star',
    ];

    public function property(){
        return $this->belongsTo(Property::class, 'property_id');
    }


}
