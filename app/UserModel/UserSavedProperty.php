<?php

namespace App\UserModel;

use App\User;
use App\PropertyModel\Property;
use Illuminate\Database\Eloquent\Model;

class UserSavedProperty extends Model
{
    protected $table = 'user_saved_properties';
    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id', 'property_id',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function property(){
        return $this->belongsTo(Property::class, 'property_id');
    }




}
