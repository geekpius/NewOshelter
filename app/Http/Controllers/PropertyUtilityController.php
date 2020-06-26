<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PropertyModel\Property;
use App\PropertyModel\PropertyImage;
use App\PropertyModel\PropertyUtility;

class PropertyUtilityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Property $property)
    {
        $data['page_title'] = 'Manage rented property('.strtolower($property->title).') utilities';
        $data['property'] = $property;
        $data['images'] = PropertyImage::whereProperty_id($property->id)->skip(1)->take(4)->get(['caption', 'image']);
        return view('admin.properties.property-utilities', $data);
    }


    public function show(Property $property)
    {
        $data['property'] = $property;
        $data['utilities'] = $property->propertyUtilities;
        return view('admin.properties.show-utilities', $data)->render();
    }

    public function store(Request $request): string
    {
        $validator = \Validator::make($request->all(), [
            'bill' => 'required|string',
            'amount' => 'required|numeric',
            'currency' => 'required|string',
        ]);
        
        (string) $message= '';
        if ($validator->fails()){
            $message = 'Wrong input fields.';
        }else{
            if(PropertyUtility::whereProperty_id($request->property_id)->whereName($request->bill)->exists()){
                $message = 'Utility already added';
            }else{
                $util = new PropertyUtility;
                $util->property_id = $request->property_id;
                $util->name = $request->bill;
                $util->amount = $request->amount;
                $util->currency = $request->currency;
                $util->save();
                $message = 'success';
            }
        }

        return $message;
    }

    public function switch(Request $request): string
    {
        (string) $message= '';
        $util = PropertyUtility::findOrFail($request->property_id);
        (bool) $switch = ($request->switch=='on')? PropertyUtility::ON : PropertyUtility::OFF;
        $util->status = $switch;
        $update = $util->update();
        if($update){
            $message = 'success';
        }else{
            $message = 'something went wrong';
        }

        return $message;
    }

    public function update(Request $request): string
    {
        $validator = \Validator::make($request->all(), [
            'utility_id' => 'required|string',
            'amount' => 'required|numeric',
        ]);
        
        (string) $message= '';
        if ($validator->fails()){
            $message = 'Wrong input fields.';
        }else{
            $util = PropertyUtility::findOrFail($request->utility_id);
            $util->amount = $request->amount;
            if($util->isDirty()){
                $util->update();
                $message = 'success';
            }else{
                $message = 'Change amount value.';
            }
        }

        return $message;
    }

    public function remove(PropertyUtility $propertyUtility): string
    {
        $propertyUtility->delete();
        return 'success';
    }











    
}
