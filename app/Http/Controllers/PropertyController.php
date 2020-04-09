<?php

namespace App\Http\Controllers;

use DB;
use Image;
use App\UserModel\Amenity;
use Illuminate\Http\Request;
use App\PropertyModel\Property;
use App\PropertyModel\PropertyRule;
use App\PropertyModel\PropertyType;
use App\PropertyModel\PropertyImage;
use App\PropertyModel\PropertyPrice;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\PropertyModel\HostelBlockRoom;
use App\PropertyModel\PropertyAmenity;
use App\PropertyModel\PropertyContain;
use App\PropertyModel\PropertyOwnRule;
use App\PropertyModel\PropertyLocation;
use App\PropertyModel\PropertyDescription;
use App\PropertyModel\PropertyHostelBlock;
use App\PropertyModel\PropertyHostelPrice;

class PropertyController extends Controller
{
    public function __construct()
    {
        $this->middleware('verify-user');
        $this->middleware('auth');
    }


    //show all properties listed
    public function index()
    {
        $data['page_title'] = 'List properties';
        $data['properties'] = Property::whereUser_id(Auth::user()->id)->whereDone_step(true)->get(); 
        return view('app.properties', $data);
    }

    ///check if uncompleted found
    public function addNewListing()
    {
        $data['page_title'] = 'Found something';
        $data['property']= Property::whereUser_id(Auth::user()->id)->whereDone_step(false)->get(); 
        return view('app.duplicate-listing', $data);
    }

    /// start new listing
    public function startNew()
    {
        $data['page_title'] = 'Add new listing';
        $data['property_types'] = PropertyType::all();
        return view('app.add-listing', $data);
    }

    ///create from the steps
    public function createNewListing(Property $property)
    {
        if(!$property->done_step){
            $data['page_title'] = 'Creating new listing';
            $data['property']= $property; 
            $data['amenities'] = Amenity::all();
            return view('app.create-listing', $data);
        }else{
            return view('errors.404');
        }
    }

    ///preview after listing
    public function previewCreatedListing(Property $property)
    {
        $data['page_title'] = 'Preview '.$property->title. ' listing';
        $data['property']= $property; 
        $countImages = PropertyImage::whereProperty_id($property->id)->count();
        $data['image'] = PropertyImage::whereProperty_id($property->id)->orderBy('id')->first();
        $data['images'] = PropertyImage::whereProperty_id($property->id)->skip(1)->take($countImages-1)->get();
        return view('app.preview-listing', $data);
    }

    ///add Hostel block
    public function addBlock(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'property_id' => 'required|string',
            'block_name' => 'required|string',
            'block_room_type' => 'required|string',
            'rooms_on_block' => 'required|numeric',
            'beds' => 'required|numeric',
            'person_per_room' => 'required|numeric',
            'kitchen' => 'required|string',
            'baths' => 'required|numeric',
            'bath_private' => 'required',
            'toilet' => 'required|numeric',
            'toilet_private' => 'required',
        ]);
        if ($validator->fails()){
            $message = 'fail';
        }else{
            try{
                DB::beginTransaction();
                $block = new PropertyHostelBlock;
                $block->property_id = $request->property_id;
                $block->block_name = $request->block_name;
                $block->type = $request->block_room_type;
                $block->no_room = $request->rooms_on_block;
                $block->bed = $request->beds;
                $block->per_room = $request->person_per_room;
                $block->kitchen = $request->kitchen;
                $block->bathroom = $request->baths;
                $block->bath_private = $request->bath_private;
                $block->toilet = $request->toilet;
                $block->toilet_private = $request->toilet_private;
                $block->save();
                //create roooms
                for($i=1; $i<=$request->rooms_on_block; $i++){
                    $room = new HostelBlockRoom;
                    $room->property_hostel_block_id = $block->id;
                    $room->room = $i;
                    $room->no_person = $request->person_per_room;
                    $room->save();
                }
                DB::commit();
                $message="success";
            }catch(\Exception $e){
                DB::rollback();
                $message = 'Something went wrong';
            }
        }

        return $message;
    }

    ///show Hostel blocks
    public function showBlock(Property $property)
    {
        $data['blocks']=$property->propertyHostelBlocks;
        return view("app.show-block", $data)->render();
    }

    ///show delete blocks
    public function deleteBlock(PropertyHostelBlock $propertyHostelBlock)
    {
        $propertyHostelBlock->delete();
        return 'success';
    }

    ///upload property photos
    public function uploadPropertyPhoto(Request $request)
    {
        $property= Property::whereUser_id(Auth::user()->id)->orderBy('id','DESC')->first(); 
        try{
            DB::beginTransaction();
                $photos = $request->file('photos');
                if(count($photos)>10){
                    $message = 'exceed';
                }else{
                    if(PropertyImage::whereProperty_id($property->id)->count() > 10){
                        $message='exceed';
                    }else{
                        for($i = 0; $i < count($photos); $i++)
                        {
                            $photo = $photos[$i];
                            $name = sha1(date('YmdHis') . str_random(30));
                            $new_name = Auth::user()->id . $name . '.' . $photo->getClientOriginalExtension();
                            $location = 'assets/images/properties/' . $new_name;
                            $photo = Image::make($photo)->resize(720, 480)->save($location); 
                            //save temp image
                            $files = new PropertyImage;
                            $files->property_id = $property->id;
                            $files->image = $new_name;
                            $files->save();
                        }
                        //$data['images'] = PropertyImage::whereProperty_id($property->id)->get();
                        $message="success";
                    }
                }
                
            DB::commit();
        }catch(\Exception $e){
            DB::rollback();
            $message = 'error'.$e->getMessage();
        }

        /* if($message=='success'){
            return view('app.show-property-photos', $data)->render();
        }else{
            return $message;
        } */
        return $message;
    }

    ///show property uploaded photos
    public function showPropertyPhoto(Property $property)
    {
        $countImages = PropertyImage::whereProperty_id($property->id)->count();
        $data['image'] = PropertyImage::whereProperty_id($property->id)->orderBy('id')->first();
        $data['images'] = PropertyImage::whereProperty_id($property->id)->skip(1)->take(($countImages==0)? 0:$countImages-1)->get();
        return view('app.show-property-photos', $data)->render();        
    }

    ///update property caption
    public function propertyPhotoCaption(Request $request)
    {
        $image = PropertyImage::findOrFail($request->id);
        $image->caption = $request->name;          
        $image->update();
    }

    ////deleted property uploaded photo
    public function deletePropertyPhoto(PropertyImage $propertyImage)
    {
        \File::delete("assets/images/properties/".$propertyImage->image);
        $propertyImage->delete();
        return 'success'; 
    }

    ///add own property rule
    public function addOwnRule(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'property_id' => 'required|string',
            'add_rule' => 'required|string',
        ]);
        if ($validator->fails()){
            $message = 'fail';
        }else{
            try{
                DB::beginTransaction();
                $rule = new PropertyOwnRule;
                $rule->property_id = $request->property_id;
                $rule->rule = $request->add_rule;
                $rule->save();
                DB::commit();
                $message="success";
            }catch(\Exception $e){
                DB::rollback();
                $message = 'Something went wrong';
            }
        }

        return $message;
    }

    ///show own property rule
    public function showOwnRule(Property $property)
    {
        $data['rules'] = $property->propertyOwnRules;
        return view("app.show-own-rule", $data)->render();
    }

    ///delete own property rule
    public function deleteOwnRule(PropertyOwnRule $propertyOwnRule)
    {
        $propertyOwnRule->delete();
        return 'success'; 
    }

    ///add Hostel block prices
    public function addHostelBlockPrice(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'property_id' => 'required|string',
            'block' => 'required|string',
            'advance_duration' => 'required|string',
            'price_calendar' => 'required|string',
            'property_price' => 'required|string',
            'currency' => 'required|string',
        ]);
        if ($validator->fails()){
            $message = 'Wrong input fields.';
        }else{
            try{
                DB::beginTransaction();
                if(PropertyHostelPrice::whereProperty_hostel_block_id($request->block)->exists()){
                    $message = "Block price already added";
                }else{
                    $price = new PropertyHostelPrice;
                    $price->property_id = $request->property_id;
                    $price->property_hostel_block_id = $request->block;
                    $price->payment_duration = $request->advance_duration;
                    $price->price_calendar = $request->price_calendar;
                    $price->property_price = $request->property_price;
                    $price->currency = $request->currency;
                    $price->save();
                    $message="success";
                }
                DB::commit();
            }catch(\Exception $e){
                DB::rollback();
                $message = 'Something went wrong';
            }
        }

        return $message;
    }

    ///show Hostel block prices
    public function showHostelBlockPrice(Property $property)
    {
        $data['prices'] = $property->propertyHostelPrices;
        return view("app.show-hostel-block-prices", $data)->render();
    }

    ///delete Hostel block prices
    public function deleteHostelBlockPrice(PropertyHostelPrice $propertyHostelPrice)
    {
        $propertyHostelPrice->delete();
        return 'success'; 
    }


    //save and continue
    public function store(Request $request)
    {
        if($request->step==0){
            $property = new Property;
            $property->user_id = Auth::user()->id;
            $property->base = $request->base_property;
            $property->type = $request->property_type;
            $property->title = $request->property_title;
            $property->type_status = $request->property_type_status;
            $property->step = ($request->step+1);
            $property->save();
            return redirect()->route('property.create', $property->id);
        }

        $property = Property::findOrFail($request->property_id);
        if($property->type=='hostel')
        {
            //nexts for Hostel
            if($request->step==1){
                $property->step = ($request->step+1);
                $property->update();
                return redirect()->back();
            }
        }else{
            ///nexts for other properties
            if($request->step==1){
                $contain = PropertyContain::updateOrCreate(
                    ['property_id'=>$request->property_id], ['bedroom'=>$request->bedrooms, 'no_bed'=>$request->beds, 'kitchen'=>$request->kitchen, 'bathroom'=>$request->baths, 'bath_private'=>$request->bath_private, 'toilet'=>$request->toilet, 'toilet_private'=>$request->toilet_private]
                );
                $property->step = ($request->step+1);
                $property->update();
                return redirect()->back();
            } 
        }
        
        if($request->step==2){
            $location = PropertyLocation::updateOrCreate(
                ['property_id'=>$request->property_id], ['digital_address'=>$request->digital_address, 'location'=>$request->location]
            );
            $property->step = ($request->step+1);
            $property->update();
            return redirect()->back();
        }
        elseif($request->step==3){
            if(!empty($request->amenities)){
                foreach($request->amenities as $myAmenity){
                    $amenity = PropertyAmenity::updateOrCreate(
                        ['property_id'=>$request->property_id, 'name'=>$myAmenity]
                    );
                }
            }
            ///update step to move forward
            $property->step = ($request->step+1);
            $property->update();

            return redirect()->back();
        }
        elseif($request->step==4){
            ///update step to move forward
            $property->step = ($request->step+1);
            $property->update();

            return redirect()->back();
        }
        elseif($request->step==5){
            $description = PropertyDescription::updateOrCreate(
                ['property_id'=>$request->property_id], ['gate'=>$request->gate, 'description'=>$request->description, 'neighbourhood'=>$request->neighbourhood, 
                'direction'=>$request->directions, 'size'=>$request->property_size, 'unit'=>$request->size_unit]
            );
            ///update step to move forward
            $property->step = ($request->step+1);
            $property->update();

            return redirect()->back();
        }
        elseif($request->step==6){
            if(!empty($request->property_rules)){
                foreach($request->property_rules as $rule){
                    $rule = PropertyRule::updateOrCreate(
                        ['property_id'=>$request->property_id,'rule'=>$rule]
                    );
                }
            }
            ///update step to move forward
            $property->step = ($request->step+1);
            $property->update();

            return redirect()->back();
        }
        
        if($property->type=='hostel'){
            if($request->step==7){
                ///update step to move forward
                $property->step = ($request->step+1);
                $property->update();

                return redirect()->back();
            }
        }else{
            if($request->step==7){
                if($property->type_status=='rent'){
                    $price = PropertyPrice::updateOrCreate(
                        ['property_id'=>$request->property_id],['payment_duration'=>$request->advance_duration, 'price_calendar'=>$request->price_calendar, 
                        'property_price'=>$request->property_price, 'currency'=>$request->currency]
                    );
                }
                elseif($property->type_status=='sell'){
                    $price = PropertyPrice::updateOrCreate(
                        ['property_id'=>$request->property_id],['property_price'=>$request->property_price, 'currency'=>$request->currency, 'negotiable'=>$request->negotiable]
                    );
                }
                else{
                    $price = PropertyPrice::updateOrCreate(
                        ['property_id'=>$request->property_id],['property_price'=>$request->property_price, 'currency'=>$request->currency]
                    );
                }
                ///update step to move forward
                $property->step = ($request->step+1);
                $property->update();
                return redirect()->back();
            }            
        }

        if($request->step==8){
            ///how tenant will book
            $property->step = ($request->step+1);
            $property->update();
            return redirect()->back();
        }elseif($request->step==9){
            ///final step to publish
            $property->publish = true;
            $property->done_step = true;
            $property->update();

            return redirect()->route('property');
        }


    }

    
    ///edit saved listing
    public function editListing(Property $property)
    {
        $data['page_title'] = 'Edit '.$property->title.' listing';
        $data['property'] = $property;
        $data['property_types'] = PropertyType::all();
        return view('app.edit-listing', $data);
    }
    
    ///update edited listing
    public function updateListing(Request $request, Property $property)
    {
        if(empty($request->base_property) || empty($request->property_type) || empty($request->property_title) || empty($request->property_type_status)){
            return redirect()->back();
        }else{
            $property->base = $request->base_property;
            $property->type = $request->property_type;
            $property->title = $request->property_title;
            $property->type_status = $request->property_type_status;
            $property->step = 1;
            $property->done_step = false;
            $property->publish = false;
            $property->update();
            return redirect()->route('property.create', $property->id);
        }
    }

    ///toggle publish visibility
    public function togglePublishVisibility(Request $request, Property $property)
    {
        $message = '';
        if($property->publish){
            $property->publish = false;
            $property->update();
            $message="success";
        }
        else{
            $property->publish = true;
            $property->update();
            $message="success";
        }
        return $message;
    }
    

    ///confirm delete
    public function confirmDelete(Property $property)
    {
        $data['page_title'] = 'Delete '.$property->title.' Listing';
        $data['property'] = $property;
        return view('app.confirm-listing-delete', $data);
    }

    //delete listing
    public function deleteListing(Request $request, Property $property)
    {
        $this->validate($request, [
            'password' => 'required|string',
        ]);

        if(auth()->check()){
            if(Hash::check($request->password, Auth::user()->password)) 
            {
                if (count($property->propertyImages)){
                    foreach($property->propertyImages as $i){
                        \File::delete("assets/images/properties/".$i->image);
                    }
                }
                $property->delete();
            }
            else
            {
                return redirect()->back()->with("error","Incorrent password.");
            }
        }
    }


    //manage property
    public function manageProperty()
    {
        $data['page_title'] = 'Manage rented properties';
        return view('app.manage-property', $data);
    }
    






}
