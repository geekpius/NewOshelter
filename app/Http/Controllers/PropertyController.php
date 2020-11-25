<?php

namespace App\Http\Controllers;

use DB;
use Image;
use App\UserModel\Amenity;
use Illuminate\Support\Str;
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
use App\PropertyModel\HostelRoomAmenity;
use App\PropertyModel\PropertyDescription;
use App\PropertyModel\PropertyHostelBlock;
use App\PropertyModel\PropertyHostelPrice;
use App\PropertyModel\HostelBlockRoomNumber;
use App\PropertyModel\PropertySharedAmenity;
use App\PropertyModel\IncludeUtility;

class PropertyController extends Controller
{
    public function __construct()
    {
        $this->middleware('verify-user')->except(['getRoomType']);
        $this->middleware('auth')->except(['getRoomType']);
    }


    //show all properties listed
    public function index()
    {
        $data['page_title'] = 'List properties';
        $data['properties'] = Property::whereUser_id(Auth::user()->id)->whereIs_active(true)->whereDone_step(true)->get(); 
        return view('admin.properties.index', $data);
    }

    ///check if uncompleted found
    public function addNewListing()
    {
        if(Property::whereUser_id(Auth::user()->id)->whereIs_active(true)->whereDone_step(false)->count()>0){
            $data['page_title'] = 'Found something';
            $data['property']= Property::whereUser_id(Auth::user()->id)->whereIs_active(true)->whereDone_step(false)->get(); 
            return view('admin.properties.duplicate-listing', $data);
        }else{
            $data['page_title'] = 'Add new listing';
            $data['property_types'] = PropertyType::whereIs_public(true)->get();
            return view('admin.properties.add-listing', $data);
        }
    }

    /// start new listing
    public function startNew()
    {
        $data['page_title'] = 'Add new listing';
        $data['property_types'] = PropertyType::whereIs_public(true)->get();
        return view('admin.properties.add-listing', $data);
    }

    ///create from the steps
    public function createNewListing(Property $property)
    {
        if(!$property->done_step){
            $data['page_title'] = 'Creating new listing';
            $data['property']= $property; 
            return view('admin.properties.create-listing', $data);
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
        return view('admin.properties.preview-listing', $data);
    }

    ///add Hostel block
    public function addBlock(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'property_id' => 'required|string',
            'block_name' => 'required|string',
        ]);
        if ($validator->fails()){
            $message = 'Invalid inputs. Try again.';
        }else{
            try{
                DB::beginTransaction();
                if(PropertyHostelBlock::whereProperty_id($request->property_id)->whereBlock_name(strtolower($request->block_name))->exists()){
                    $message='Block name already exist.';
                }
                else{
                    $block = new PropertyHostelBlock;
                    $block->property_id = $request->property_id;
                    $block->block_name = $request->block_name;
                    $block->save();
                    $message="success";
                }
                DB::commit();
            }catch(\Exception $e){
                DB::rollback();
                $message = 'Something went wrong.'.$e->getMessage();
            }
        }

        return $message;
    }

    ///show Hostel blocks
    public function showBlock(Property $property)
    {
        $data['blocks']=$property->propertyHostelBlocks;
        return view("admin.properties.show-block", $data)->render();
    }

    ///show delete blocks
    public function deleteBlock(PropertyHostelBlock $propertyHostelBlock)
    {
        $propertyHostelBlock->delete();
        return 'success';
    }

    //create hostel block rooms
    public function addBlockRoom(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'hostel_block' => 'required|string',
            'block_room_type' => 'required|string',
            'room_gender' => 'required|string',
            'rooms_on_block' => 'required|numeric',
            'room_start' => 'required|numeric',
            'beds' => 'required|numeric',
            'person_per_room' => 'required|numeric',
            'kitchen' => 'required|string',
            'baths' => 'required|numeric',
            'bath_private' => 'required',
            'toilet' => 'required|numeric',
            'toilet_private' => 'required',
            'furnish' => 'required',
        ]);
        if ($validator->fails()){
            $message = 'fail';
        }else{
            try{
                DB::beginTransaction();
                if(HostelBlockRoom::whereProperty_hostel_block_id($request->hostel_block)->whereBlock_room_type($request->block_room_type)->whereGender($request->room_gender)->exists()){
                    $message = 'Block rooms for '.ucfirst($request->room_gender).' '.str_replace('_', ' ', $request->block_room_type).' already exist';
                }
                else{
                    $room = new HostelBlockRoom;
                    $room->property_hostel_block_id = $request->hostel_block;
                    $room->block_room_type = $request->block_room_type;
                    $room->gender = $request->room_gender;
                    $room->block_no_room = $request->rooms_on_block;
                    $room->start_room_no = $request->room_start;
                    $room->bed_person = $request->beds;
                    $room->person_per_room = $request->person_per_room;
                    $room->furnish = $request->furnish;
                    $room->kitchen = $request->kitchen;
                    $room->bathroom = $request->baths;
                    $room->bath_private = $request->bath_private;
                    $room->toilet = $request->toilet;
                    $room->toilet_private = $request->toilet_private;
                    $room->save();
                    //create rooom numbers
                    $endNumber = $request->room_start + $request->rooms_on_block;
                    for($i=$request->room_start; $i<$endNumber; $i++){
                        $number = new HostelBlockRoomNumber;
                        $number->hostel_block_room_id = $room->id;
                        $number->room_no = $i;
                        $number->person_per_room = $request->person_per_room;
                        $number->save();
                    }
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

    ///show Hostel blocks rooms
    public function showBlockRoom(Property $property)
    {
        $data['blocks']=$property->propertyHostelBlocks;
        return view("admin.properties.show-block-room", $data)->render();
    }

    ///show delete block rooms
    public function deleteBlockRoom(HostelBlockRoom $hostelBlockRoom)
    {
        $hostelBlockRoom->delete();
        return 'success';
    }

    //get room type base on block name
    public function getRoomType(Request $request)
    {
        $rooms = HostelBlockRoom::whereProperty_hostel_block_id($request->block_name)->whereGender($request->gender)->get(['id','block_room_type']);
        return response()->json($rooms);
    }

    //create hostel block rooms amenities
    public function addBlockRoomAmenities(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'hostel_block_name' => 'required|string',
            'room_type' => 'required|string',
        ]);
        if ($validator->fails()){
            $message = 'fail';
        }else{
            try{
                DB::beginTransaction();
                if(!empty($request->amenities)){
                    foreach($request->amenities as $myAmenity){
                        $amenity = HostelRoomAmenity::updateOrCreate(
                            ['hostel_block_room_id'=>$request->room_type, 'name'=>$myAmenity]
                        );
                    }
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

    ///show Hostel blocks rooms amenities
    public function showBlockRoomAmenities(Property $property)
    {
        $data['rooms']=$property->propertyHostelBlockRooms()->get();
        return view("admin.properties.show-hostel-amenities", $data)->render();
    }

    ///show delete block rooms amenities
    public function deleteBlockRoomAmenities(HostelRoomAmenity $hostelRoomAmenity)
    {
        $hostelRoomAmenity->delete();
        return 'success';
    }

    ///upload property photos
    public function uploadPropertyPhoto(Request $request, Property $property)
    {
        try{
            DB::beginTransaction();
                $photos = $request->file('photos');
                if(count($photos)>10){
                    $message = 'exceed';
                }else{
                    if($property->propertyImages->count() > 10){
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
                        $message="success";
                    }
                }
                
            DB::commit();
        }catch(\Exception $e){
            DB::rollback();
            $message = 'error';
        }

        /* if($message=='success'){
            return view('admin.properties.show-property-photos', $data)->render();
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
        return view('admin.properties.show-property-photos', $data)->render();        
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
        return view("admin.properties.show-own-rule", $data)->render();
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
            'block' => 'required|string',
            'block_room' => 'required|string',
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
                $price = PropertyHostelPrice::updateOrCreate(
                    ['hostel_block_room_id'=>$request->block_room],['payment_duration'=>$request->advance_duration, 'price_calendar'=>$request->price_calendar, 
                    'property_price'=>$request->property_price, 'currency'=>$request->currency]
                );
                $message="success";
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
        $data['prices'] = $property->propertyHostelBlockRooms()->get();
        return view("admin.properties.show-hostel-block-prices", $data)->render();
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
            if($request->property_type!='hostel'){
                $property->adult = $request->adult;
                $property->children = $request->children;
            }
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
            else if($request->step==2){
                $property->step = ($request->step+1);
                $property->update();
                return redirect()->back();
            }
            else if($request->step==3){
                if(!empty($request->shared_amenities)){
                    PropertySharedAmenity::whereProperty_id($request->property_id)->delete();
                    foreach($request->shared_amenities as $amenity){
                        $myAmenity = PropertySharedAmenity::updateOrCreate(
                            ['property_id'=>$request->property_id,'name'=>$amenity]
                        );
                    }
                }
                ///update step to move forward
                $property->step = ($request->step+1);
                $property->update();
                return redirect()->back();
            }
            elseif($request->step==4){
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
            elseif($request->step==5){
                $location = PropertyLocation::updateOrCreate(
                    ['property_id'=>$request->property_id], ['location'=>$request->location, 'location_slug'=>Str::slug($request->location, '-'), 'latitude'=>$request->latitude, 'longitude'=>$request->longitude]
                );
                
                $property->step = ($request->step+1);
                $property->update();
                return redirect()->back();
            }
            elseif($request->step==6){
                ///update step to move forward
                $property->step = ($request->step+1);
                $property->update();
    
                return redirect()->back();
            }
            elseif($request->step==7){
                $description = PropertyDescription::updateOrCreate(
                    ['property_id'=>$request->property_id], ['gate'=>$request->gate, 'description'=>$request->description, 'neighbourhood'=>$request->neighbourhood, 
                    'direction'=>$request->directions, 'size'=>$request->property_size, 'unit'=>$request->size_unit]
                );
                ///update step to move forward
                $property->step = ($request->step+1);
                $property->update();
    
                return redirect()->back();
            }
            elseif($request->step==8){
                ///update step to move forward
                $property->step = ($request->step+1);
                $property->update();
                return redirect()->back();
            } 
            elseif($request->step==9){
                ///final step to publish
                $property->publish = true;
                $property->done_step = true;
                $property->update();

                return redirect()->route('property');
            }
        }else{
            ///nexts for other properties
            if($request->step==1){
                $contain = PropertyContain::updateOrCreate(
                    ['property_id'=>$request->property_id], ['bedroom'=>$request->bedrooms, 'no_bed'=>$request->beds, 'kitchen'=>$request->kitchen, 'bathroom'=>$request->baths, 'bath_private'=>$request->bath_private, 'toilet'=>$request->toilet, 'toilet_private'=>$request->toilet_private, 'furnish'=>$request->furnish]
                );
                $property->step = ($request->step+1);
                $property->update();
                return redirect()->back();
            } 
            elseif($request->step==2){
                if(!empty($request->amenities)){
                    foreach($request->amenities as $myAmenity){
                        $amenity = PropertyAmenity::updateOrCreate(
                            ['property_id'=>$request->property_id, 'name'=>$myAmenity]
                        );
                    }
                }

                if(!empty($request->shared_amenities)){
                    foreach($request->shared_amenities as $amenity){
                        $myAmenity = PropertySharedAmenity::updateOrCreate(
                            ['property_id'=>$request->property_id,'name'=>$amenity]
                        );
                    }
                }

                ///update step to move forward
                $property->step = ($request->step+1);
                $property->update();
    
                return redirect()->back();
            }
            elseif($request->step==3){
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
            elseif($request->step==4){
                $location = PropertyLocation::updateOrCreate(
                    ['property_id'=>$request->property_id], ['location'=>$request->location, 'location_slug'=>Str::slug($request->location, '-'), 'latitude'=>$request->latitude, 'longitude'=>$request->longitude]
                );
                $property->step = ($request->step+1);
                $property->update();
                return redirect()->back();
            }
            elseif($request->step==5){
                ///update step to move forward
                $property->step = ($request->step+1);
                $property->update();
    
                return redirect()->back();
            }
            elseif($request->step==6){
                $description = PropertyDescription::updateOrCreate(
                    ['property_id'=>$request->property_id], ['gate'=>$request->gate, 'description'=>$request->description, 'neighbourhood'=>$request->neighbourhood, 
                    'direction'=>$request->directions, 'size'=>$request->property_size, 'unit'=>$request->size_unit]
                );
                ///update step to move forward
                $property->step = ($request->step+1);
                $property->update();
    
                return redirect()->back();
            }
            elseif($request->step==7){
                if($property->type_status=='rent'){
                    $price = PropertyPrice::updateOrCreate(
                        ['property_id'=>$request->property_id],['payment_duration'=>$request->advance_duration, 'price_calendar'=>$request->price_calendar, 
                        'property_price'=>$request->property_price, 'currency'=>$request->currency]
                    );

                    if(!empty($request->includes)){
                        foreach($request->includes as $include){
                            $utility = IncludeUtility::updateOrCreate(
                                ['property_id'=>$request->property_id,'name'=>$include]
                            );
                        }
                    }
                }
                elseif($property->type_status=='short_stay'){
                    $price = PropertyPrice::updateOrCreate(
                        ['property_id'=>$request->property_id],['minimum_stay'=>$request->minimum_stay, 'maximum_stay'=>$request->maximum_stay, 'price_calendar'=>$request->price_calendar, 
                        'property_price'=>$request->property_price, 'smart_price'=>$request->smart_price, 'currency'=>$request->currency]
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
            elseif($request->step==8){
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

    }

    
    ///edit saved listing
    public function editListing(Property $property)
    {
        $data['page_title'] = 'Edit '.$property->title.' listing';
        $data['property'] = $property;
        $data['property_types'] = PropertyType::whereIs_public(true)->get();
        return view('admin.properties.edit-listing', $data);
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
            $property->adult = $request->adult;
            $property->children = $request->children;
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
        return view('admin.properties.confirm-listing-delete', $data);
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
                $property->is_active = false;
                $property->update();
                return redirect()->route('property');
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
        $data['page_title'] = 'My properties';
        $data['properties'] = Property::whereUser_id(Auth::user()->id)->whereIs_active(true)->whereDone_step(true)->get();
        return view('admin.properties.manage-property', $data);
    }

    //manage property
    public function managePropertyDetail(Property $property)
    {
        $data['page_title'] = $property->title.' details';
        $data['property'] = $property;
        $countImages = PropertyImage::whereProperty_id($property->id)->count();
        $data['images'] = PropertyImage::whereProperty_id($property->id)->skip(1)->take(($countImages==0)? 0:$countImages-1)->get();
        return view('admin.properties.show-detail-property', $data);
    }
    

   







}
