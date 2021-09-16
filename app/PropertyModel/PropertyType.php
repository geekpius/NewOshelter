<?php

namespace App\PropertyModel;

use App\PropertyModel\Property;
use App\UserModel\UserVisit;
use App\OrderModel\Order;
use Illuminate\Database\Eloquent\Model;

class PropertyType extends Model
{

    protected $table = 'property_types';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name', 'image',
    ];


    public function setNameAttribute($value)
    {
        return $this->attributes['name'] = strtolower($value);
    }


    public function getNameAttribute($value)
    {
        return ucwords(str_replace('_',' ',$value));
    }

    public function getPropertyCount()
    {
        return Property::whereType(strtolower(str_replace(' ','_',$this->name)))->wherePublish(true)
        ->whereIs_active(true)->whereDone_step(true)->where('type_status','!=','auction')
//        ->where(function($query){
//            $query->whereNotIn('id', function($query){
//                $query->select('property_id')->from(with(new UserVisit)->getTable());
//            })->orWhereIn('id', function($query){
//                $query->select('property_id')->from(with(new UserVisit)->getTable())->whereIn('status', [0,2]);
//            });
//        })
//            ->where(function($query){
//            $query->whereNotIn('id', function($query){
//                $query->select('property_id')->from(with(new Order)->getTable());
//            })->orWhereIn('id', function($query){
//                $query->select('property_id')->from(with(new Order)->getTable())->whereIn('status', [0,1]);
//            });
//        })
            ->count();
    }

}
