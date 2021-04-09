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
            'price' => ($this->type=='hostel')? '' : number_format($this->propertyPrice->property_price,2),
            'currency' => ($this->type=='hostel')? '' : $this->propertyPrice->currency,
            'calendar' => ($this->type=='hostel')? '' : ((empty($this->propertyPrice->price_calendar))? '':'/'.$this->propertyPrice->price_calendar),
            'rooms' => ($this->type=='hostel')? $this->propertyHostelBlockRooms()->sum('block_no_room').' Rooms' : '',
            'link' => route('single.property', $this->id),
        ];
    }
}
