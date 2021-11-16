<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PropertyCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        if($this->isHostelPropertyType()){
            $price = '';
        }else{
            if($this->isLandPropertyType()){
                $price = number_format($this->propertyLandDetail->price,2);
            }else{
                $price = number_format($this->propertyPrice->property_price,2);
            }
        }

        if($this->isHostelPropertyType()){
            $currency = '';
        }else{
            if($this->isLandPropertyType()){
                $currency = $this->propertyLandDetail->currency;
            }else{
                $currency = $this->propertyPrice->currency;
            }
        }

        if($this->isHostelPropertyType()){
            $calendar = '';
        }else{
            if($this->isLandPropertyType()){
                $calendar = '';
            }else{
                $calendar = ((empty($this->propertyPrice->price_calendar))? '':'/'.$this->propertyPrice->price_calendar);
            }
        }


        return [
            'id' => $this->id,
            'title' => $this->title,
            'type' => 'For '.$this->getPropertyTypeStatus(),
            'photo' => asset('assets/images/properties/'.$this->propertyImages->first()->image),
            'position' => [
                'location'=> $this->propertyLocation->location,
                'lat'=> $this->propertyLocation->latitude,
                'lng'=> $this->propertyLocation->longitude
            ],
            'price' => $price,
            'currency' => $currency,
            'calendar' => $calendar,
            'rooms' => ($this->type=='hostel')? $this->propertyHostelBlockRooms()->sum('block_no_room').' Rooms' : '',
            'link' => route('single.property', $this->id),
        ];
    }
}
