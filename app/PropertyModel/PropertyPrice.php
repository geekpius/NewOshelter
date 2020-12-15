<?php

namespace App\PropertyModel;

use App\PropertyModel\Property;
use Illuminate\Database\Eloquent\Model;

class PropertyPrice extends Model
{
    protected $table = 'property_prices';
    protected $primaryKey = 'id';

    protected $fillable = [
        'property_id', 'payment_duration', 'minimum_stay', 'maximum_stay', 'price_calendar', 'property_price', 'smart_price', 'currency', 'negotiable',
    ];

    /******************************  RELATIONSHIPS ******************************/
    public function property(){
        return $this->belongsTo(Property::class, 'property_id');
    }


    /******************************  ATTRIBUTES ******************************/
    public function getMinimumStay()
    {
        if ($this->minimum_stay==3){
            return "3 days minimum stay";
        }
        elseif ($this->minimum_stay==4){
            return "4 days minimum stay";
        }
        elseif ($this->minimum_stay==5){
            return "5 days minimum stay";
        }
        elseif ($this->minimum_stay==6){
            return "6 days minimum stay";
        }
        elseif ($this->minimum_stay==7){
            return "1 week minimum stay";
        }
    }

    public function getMaximumStay()
    {
        if ($this->maximum_stay==1){
            return "1 month maximum stay";
        }
        elseif ($this->maximum_stay==1.1){
            return "1 month, 1 week maximum stay";
        }
        elseif ($this->maximum_stay==1.2){
            return "1 month, 2 weeks maximum stay";
        }
        elseif ($this->maximum_stay==1.3){
            return "1 month, 3 weeks maximum stay";
        }
        elseif ($this->maximum_stay==2){
            return "2 months maximum stay";
        }
        elseif ($this->maximum_stay==2.1){
            return "2 months, 1 week maximum stay";
        }
        elseif ($this->maximum_stay==2.2){
            return "2 months, 2 weeks maximum stay";
        }
        elseif ($this->maximum_stay==2.3){
            return "2 months, 3 weeks maximum stay";
        }
        elseif ($this->maximum_stay==3){
            return "3 months maximum stay";
        }
    }
    
}
