<?php

namespace App\PropertyModel;

use App\User;
use App\PropertyModel\Property;
use Illuminate\Database\Eloquent\Model;

class PropertyReview extends Model
{
    protected $table = 'property_reviews';
    protected $primaryKey = 'id';

    protected $fillable = [
        'property_id', 'user_id', 'owner_id', 'location_star', 'security_star', 'comm_star', 'value_star', 'accuracy_star', 'tidy_star', 'comment',
    ];

    public function property(){
        return $this->belongsTo(Property::class, 'property_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function owner(){
        return $this->belongsTo(User::class, 'owner_id');
    }





}
