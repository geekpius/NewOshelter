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
    public function getPaymentDuration()
    {
        if ($this->payment_duration==6){
            return "6 months advance payment";
        }
        elseif ($this->payment_duration==12){
            return "1 year advance payment";
        }
        elseif ($this->payment_duration==24){
            return "2 years advance payment";
        }
    }

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
        if ($this->maximum_stay==30){
            return "1 month maximum stay";
        }
        elseif ($this->maximum_stay==37){
            return "1 month, 1 week maximum stay";
        }
        elseif ($this->maximum_stay==44){
            return "1 month, 2 weeks maximum stay";
        }
        elseif ($this->maximum_stay==51){
            return "1 month, 3 weeks maximum stay";
        }
        elseif ($this->maximum_stay==60){
            return "2 months maximum stay";
        }
        elseif ($this->maximum_stay==67){
            return "2 months, 1 week maximum stay";
        }
        elseif ($this->maximum_stay==74){
            return "2 months, 2 weeks maximum stay";
        }
        elseif ($this->maximum_stay==81){
            return "2 months, 3 weeks maximum stay";
        }
        elseif ($this->maximum_stay==90){
            return "3 months maximum stay";
        }
    }
    
}
