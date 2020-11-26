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
        'property_id', 'user_id', 'comment',
    ];

    public function property(){
        return $this->belongsTo(Property::class, 'property_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }





}
