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
use App\PropertyModel\PropertyVideo;
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
use App\PropertyModel\PropertyAuctionSchedule;
use App\UserModel\UserCurrency;
use App\Currency;
use Illuminate\Support\Facades\Session;

class PropertyController extends Controller
{
    public function __construct()
    {
        $this->middleware('verify-user')->except(['getRoomType']);
        $this->middleware('auth')->except(['getRoomType']);
    }


    //show all properties listed
    public function index(Request $request)
    {
        $data['page_title'] = 'All your properties';
        $data['property_types'] = PropertyType::whereIs_public(true)->get();
        $data['properties'] = Property::whereUser_id(Auth::user()->id)->whereIs_active(true)->whereDone_step(true)->orderBy('id', 'DESC')->paginate(15);

        if($request->search) {
            $data['properties'] = Property::whereUser_id(Auth::user()->id)->where('title','LIKE','%'.$request->search.'%')->wherePublish(true)->whereIs_active(true)->whereDone_step(true)->orderBy('id','DESC')->paginate(15);
        }
        if($request->filter) {
            $data['properties'] = Property::whereUser_id(Auth::user()->id)->where('type', $request->filter)->wherePublish(true)->whereIs_active(true)->whereDone_step(true)->orderBy('id','DESC')->paginate(15);
        }
        return view('user.properties.index', $data);
    }


    public function propertyBookings(Property $property)
    {
        $data['page_title'] = $property->title.' bookings';
        $data['property'] = $property;
        return view('user.properties.property_bookings', $data);
    }


    ///check if uncompleted found
    public function addNewListing()
    {
        if(Property::whereUser_id(Auth::user()->id)->whereIs_active(true)->whereDone_step(false)->count()>0){
            $data['page_title'] = 'Found something';
            $data['property']= Property::whereUser_id(Auth::user()->id)->whereIs_active(true)->whereDone_step(false)->get();
            return view('user.properties.duplicate-listing', $data);
        }else{
            $data['page_title'] = 'Add new listing';
            $data['property_types'] = PropertyType::whereIs_public(true)->get();
            return view('user.properties.add-listing', $data);
        }
    }

    /// start new listing
    public function startNew()
    {
        $data['page_title'] = 'Add new listing';
        $data['property_types'] = PropertyType::whereIs_public(true)->get();
        return view('user.properties.add-listing', $data);
    }

    ///create from the steps
    public function createNewListing(Property $property)
    {
        if(Auth::user()->id == $property->user_id){
            if(!$property->isDoneStep()){
                $data['page_title'] = 'Creating new listing';
                $data['property']= $property;
                if(!Auth::user()->userCurrency){
                    $data['currencies'] = Currency::all();
                }
                if($property->isAuctionProperty()){
                    return view('user.properties.create-auction-listing', $data);
                }
                return view('user.properties.create-listing', $data);
            }else{
                return view('errors.404');
            }
        }else{
            return view('errors.404');
        }
    }

    public function getChecks(Property $property)
    {
        return response()->json(
            [
                'countBlock' => $property->propertyHostelBlocks->count(),
            ]
        );
    }

    ///preview after listing
    public function previewCreatedListing(Property $property)
    {
        $data['page_title'] = 'Preview '.$property->title. ' listing';
        $data['property']= $property;
        $countImages = $property->propertyImages->count();
        $data['image'] = $property->propertyImages->sortBy('id')->first();
        $data['images'] = $property->propertyImages->slice(1)->take($countImages-1);
        if($property->isAuctionProperty()){
            return view('user.properties.preview-auction-listing', $data);
        }
        return view('user.properties.preview-listing', $data);
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
                $message = 'Something went wrong.';
            }
        }

        return $message;
    }

    ///show Hostel blocks
    public function showBlock(Property $property)
    {
        if(Auth::user()->id == $property->user_id){
            $data['blocks']=$property->propertyHostelBlocks;
            return view("user.properties.show-block", $data)->render();
        }else{
            return view("errors.404")->render();
        }
    }

    ///show delete blocks
    public function deleteBlock(PropertyHostelBlock $propertyHostelBlock)
    {
        if(Auth::user()->id == $propertyHostelBlock->property->user_id){
            $propertyHostelBlock->delete();
            return 'success';
        }else{
            return 'You are unauthorized to delete';
        }
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
        if(Auth::user()->id == $property->user_id){
            $data['blocks']=$property->propertyHostelBlocks;
            return view("user.properties.show-block-room", $data)->render();
        }else{
            return view("errors.404")->render();
        }
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
        if(Auth::user()->id == $property->user_id){
            $data['rooms']=$property->propertyHostelBlockRooms()->get();
            return view("user.properties.show-hostel-amenities", $data)->render();
        }else{
            return view("errors.404")->render();
        }
    }

    ///show delete block rooms amenities
    public function deleteBlockRoomAmenities(HostelRoomAmenity $hostelRoomAmenity)
    {
        $hostelRoomAmenity->delete();
        return 'success';
    }

    ///upload property photos
    public function uploadPropertyPhoto(Request $request, Property $property): string
    {
        try{
            (string) $message = "";
            DB::beginTransaction();
                $photos = $request->file('photos');
                if(count($photos)>20){
                    $message = 'exceed';
                }else{
                    if($property->propertyImages->count() > 40){
                        $message='exceed';
                    }else{
                        for($i = 0; $i < count($photos); $i++)
                        {
                            $photo = $photos[$i];
                            $name = sha1(date('YmdHis') . str_random(30));
                            $new_name = Auth::user()->id . $name . '.' . $photo->getClientOriginalExtension();
                            $location = 'assets/images/properties/' . $new_name;
                            (string) $waterMarkLocation = 'assets/images/watermark.png';
                            $photo = Image::make($photo)->resize(720, 480)->insert($waterMarkLocation, 'center')->save($location);
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
        return $message;
    }

    ///show property uploaded photos
    public function showPropertyPhoto(Property $property)
    {
        if(Auth::user()->id == $property->user->id){
            $countImages = $property->propertyImages->count();
            $data['images'] = $property->propertyImages->sortBy('id');
            return view('user.properties.show-property-photos', $data)->render();
        }else{
            return view('errors.404')->render();
        }
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
        if(Auth::user()->id == $propertyImage->property->user_id){
            \File::delete("assets/images/properties/".$propertyImage->image);
            $propertyImage->delete();
            return 'success';
        }else{
            return 'You are unauthorized to delete';
        }
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
        if(Auth::user()->id == $property->user->id){
            $data['rules'] = $property->propertyOwnRules;
            return view("user.properties.show-own-rule", $data)->render();
        }else{
            return view('errors.404')->render();
        }
    }

    ///delete own property rule
    public function deleteOwnRule(PropertyOwnRule $propertyOwnRule)
    {
        if(Auth::user()->id == $propertyOwnRule->property->user_id){
            $propertyOwnRule->delete();
            return 'success';
        }else{
            return 'You are unauthorized to delete';
        }
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
        if(Auth::user()->id == $property->user_id){
            $data['prices'] = $property->propertyHostelBlockRooms()->get();
            return view("user.properties.show-hostel-block-prices", $data)->render();
        }else{
            return view("errors.404")->render();
        }
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
        if($property->isDoneStep()){
            return redirect()->back();
        }
        else{
            if($property->isHostelPropertyType())
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
                            PropertySharedAmenity::updateOrCreate(
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
                    PropertyLocation::updateOrCreate(
                        ['property_id'=>$request->property_id], ['location'=>$request->location, 'location_slug'=>Str::slug($request->location, '-'), 'latitude'=>$request->latitude, 'longitude'=>$request->longitude]
                    );

                    $property->step = ($request->step+1);
                    $property->update();
                    return redirect()->back();
                }
                elseif($request->step==6){
                    if(!empty($request->video_url)){
                        $video = PropertyVideo::updateOrCreate(
                            ['property_id'=>$request->property_id], ['video_url'=>$request->video_url]
                        );
                    }else{
                        if(!empty($property->propertyVideo)){
                            $property->propertyVideo->delete();
                        }

                    }

                    // update step to move forward
                    $property->step = ($request->step+1);
                    $property->update();

                    return redirect()->back();
                }
                elseif($request->step==7){
                    PropertyDescription::updateOrCreate(
                        ['property_id'=>$request->property_id], ['gate'=>$request->gate, 'description'=>$request->description, 'neighbourhood'=>$request->neighbourhood,
                        'direction'=>$request->directions]
                    );
                    ///update step to move forward
                    $property->step = ($request->step+1);
                    $property->update();

                    return redirect()->back();
                }
                elseif($request->step==8){
                    ///update step to move forward
                    if(!empty($request->includes)){
                        foreach($request->includes as $include){
                            $utility = IncludeUtility::updateOrCreate(
                                ['property_id'=>$request->property_id,'name'=>$include]
                            );
                        }
                    }
                    $property->step = ($request->step+1);
                    $property->update();
                    return redirect()->back();
                }
                elseif($request->step==9){
                    ///final step to publish
                    $property->publish = true;
                    $property->done_step = true;
                    $property->update();

                    if(Session::get("edit")){
                        Session::forget("edit");
                    }
                    if($property->isPropertyPending()){
                        session()->flash('success','Wait for approval from Oshelter before your property can be visible to visitors. We want to make sure property is legit.');
                        return redirect()->route('property');
                    }
                    return redirect()->route('single.property', $property->id);
                }
            }
            else{
                // nexts for other properties
                if($request->step==1){
                    PropertyContain::updateOrCreate(
                        ['property_id'=>$request->property_id], ['bedroom'=>$request->bedrooms, 'no_bed'=>$request->beds, 'kitchen'=>$request->kitchen, 'bathroom'=>$request->baths, 'bath_private'=>$request->bath_private, 'toilet'=>$request->toilet, 'toilet_private'=>$request->toilet_private, 'furnish'=>$request->furnish]
                    );

                    $property->step = ($request->step+1);
                    $property->update();
                    return redirect()->back();
                }
                elseif($request->step==2){
                    if(!empty($request->amenities)){
                        if($property->propertyAmenities->count() > 0){
                            $property->propertyAmenities->each->delete();
                        }
                        foreach($request->amenities as $myAmenity){
                            PropertyAmenity::updateOrCreate(
                                ['property_id'=>$request->property_id, 'name'=>$myAmenity]
                            );
                        }
                    }else{
                        if($property->propertyAmenities->count() > 0){
                            $property->propertyAmenities->each->delete();
                        }
                    }

                    if(!empty($request->shared_amenities)){
                        foreach($request->shared_amenities as $amenity){
                            PropertySharedAmenity::updateOrCreate(
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
                    if(!$property->isSaleProperty()){
                        if(!empty($request->property_rules)){
                            foreach($request->property_rules as $rule){
                                PropertyRule::updateOrCreate(
                                    ['property_id'=>$request->property_id,'rule'=>$rule]
                                );
                            }
                        }
                    }
                    ///update step to move forward
                    $property->step = ($request->step+1);
                    $property->update();

                    return redirect()->back();
                }
                elseif($request->step==4){
                    PropertyLocation::updateOrCreate(
                        ['property_id'=>$request->property_id], ['location'=>$request->location, 'location_slug'=>Str::slug($request->location, '-'), 'latitude'=>$request->latitude, 'longitude'=>$request->longitude]
                    );
                    $property->step = ($request->step+1);
                    $property->update();
                    return redirect()->back();
                }
                elseif($request->step==5){
                    if(!empty($request->video_url)){
                        PropertyVideo::updateOrCreate(
                            ['property_id'=>$request->property_id], ['video_url'=>$request->video_url]
                        );
                    }else{
                        if(!empty($property->propertyVideo)){
                            $property->propertyVideo->delete();
                        }

                    }

                    // update step to move forward
                    $property->step = ($request->step+1);
                    $property->update();

                    return redirect()->back();
                }
                elseif($request->step==6){
                    PropertyDescription::updateOrCreate(
                        ['property_id'=>$request->property_id], ['gate'=>$request->gate, 'description'=>$request->description, 'neighbourhood'=>$request->neighbourhood,
                        'direction'=>$request->directions]
                    );
                    ///update step to move forward
                    $property->step = ($request->step+1);
                    $property->update();

                    return redirect()->back();
                }
                elseif($request->step==7){
                    if($property->isRentProperty()){
                        PropertyPrice::updateOrCreate(
                            ['property_id'=>$request->property_id],['payment_duration'=>$request->advance_duration, 'price_calendar'=>$request->price_calendar,
                            'property_price'=>$request->property_price, 'currency'=>$request->currency]
                        );

                        if(!empty($request->includes)){
                            foreach($request->includes as $include){
                                IncludeUtility::updateOrCreate(
                                    ['property_id'=>$request->property_id,'name'=>$include]
                                );
                            }
                        }
                    }
                    elseif($property->isShortStayProperty()){
                        PropertyPrice::updateOrCreate(
                            ['property_id'=>$request->property_id],['minimum_stay'=>$request->minimum_stay, 'maximum_stay'=>$request->maximum_stay, 'price_calendar'=>$request->price_calendar,
                            'property_price'=>$request->property_price, 'smart_price'=>$request->smart_price, 'currency'=>$request->currency]
                        );
                    }
                    elseif($property->isSaleProperty()){
                        PropertyPrice::updateOrCreate(
                            ['property_id'=>$request->property_id],['property_price'=>$request->property_price, 'currency'=>$request->currency]
                        );
                    }
                    else{
                        PropertyPrice::updateOrCreate(
                            ['property_id'=>$request->property_id],['property_price'=>$request->property_price, 'currency'=>$request->currency]
                        );
                    }

                    UserCurrency::firstOrCreate(
                        ['user_id'=>Auth::user()->id],
                        ['currency'=>$request->currency]
                    );
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
                }
                elseif($request->step==9){
                    ///final step to publish
                    $property->publish = true;
                    $property->done_step = true;
                    $property->update();

                    if(Session::get("edit")){
                        Session::forget("edit");
                    }

                    if($property->isPropertyPending()){
                        session()->flash('success','Wait for approval from Oshelter before your property can be visible to visitors. We want to make sure property is legit.');
                        return redirect()->route('property');
                    }
                    return redirect()->route('single.property', $property->id);
                }
            }
        }

    }


    public function storeAuction(Request $request)
    {
        $property = Property::findOrFail($request->property_id);
        if($property->done_step){
            return redirect()->back();
        }
        else{
            if($request->step==1){
                PropertyContain::updateOrCreate(
                    ['property_id'=>$request->property_id], ['bedroom'=>$request->bedrooms, 'no_bed'=>$request->beds, 'kitchen'=>$request->kitchen, 'bathroom'=>$request->baths, 'bath_private'=>$request->bath_private, 'toilet'=>$request->toilet, 'toilet_private'=>$request->toilet_private, 'furnish'=>$request->furnish]
                );

                $property->step = ($request->step+1);
                $property->update();
                return redirect()->back();
            }
            elseif($request->step==2){
                if(!empty($request->amenities)){
                    if($property->propertyAmenities->count() > 0){
                        $property->propertyAmenities->each->delete();
                    }
                    foreach($request->amenities as $myAmenity){
                        PropertyAmenity::updateOrCreate(
                            ['property_id'=>$request->property_id, 'name'=>$myAmenity]
                        );
                    }
                }else{
                    if($property->propertyAmenities->count() > 0){
                        $property->propertyAmenities->each->delete();
                    }
                }

                if(!empty($request->shared_amenities)){
                    foreach($request->shared_amenities as $amenity){
                       PropertySharedAmenity::updateOrCreate(
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
                PropertyLocation::updateOrCreate(
                    ['property_id'=>$request->property_id], ['location'=>$request->location, 'location_slug'=>Str::slug($request->location, '-'), 'latitude'=>$request->latitude, 'longitude'=>$request->longitude]
                );
                $property->step = ($request->step+1);
                $property->update();
                return redirect()->back();
            }
            elseif($request->step==4){
                PropertyDescription::updateOrCreate(
                    ['property_id'=>$request->property_id], ['gate'=>$request->gate, 'description'=>$request->description, 'neighbourhood'=>$request->neighbourhood,
                    'direction'=>$request->directions]
                );
                ///update step to move forward
                $property->step = ($request->step+1);
                $property->update();

                return redirect()->back();
            }
            elseif($request->step==5){

                PropertyAuctionSchedule::updateOrCreate(
                    ['property_id'=>$request->property_id],
                    [
                        'auction_venue'=>$request->auction_venue,
                        'auction_date'=>$request->auction_date,
                        'auction_time'=>$request->auction_time
                    ]
                );

                ///update step to move forward
                $property->step = ($request->step+1);
                $property->update();
                return redirect()->back();
            }
            elseif($request->step==6){
                ///how tenant will book
                $property->step = ($request->step+1);
                $property->update();
                return redirect()->back();
            }
            elseif($request->step==7){
                ///final step to publish
                $property->publish = true;
                $property->done_step = true;
                $property->update();

                if(Session::get("edit")){
                    Session::forget("edit");
                }

                if($property->isPropertyPending()){
                    session()->flash('success','Wait for approval from Oshelter before your property can be visible to visitors. We want to make sure property is legit.');
                    return redirect()->route('property');
                }
                return redirect()->route('single.property', $property->id);
            }
        }

    }

    public function previousStep(Request $request, Property $property)
    {
        if(Auth::user()->id == $property->user_id){
            if($request->action == 'prev'){
                $property->step = $request->step - 1;
                $property->update();
                return 'success';
            }else{
                $property->step = $request->step;
                $property->update();
                return 'success';
            }
        }else{
            return 'You are unauthorized to go previous';
        }
    }

    // save and exit
    public function saveAndExit(Request $request)
    {
        $property = Property::findOrFail($request->property_id);
        $property->step = 9;
        $property->done_step = true;
        $property->update();
        if(Session::get("edit")){
            Session::forget("edit");
        }
        return redirect()->route('single.property', $property->id);
    }


    //edit saved listing
    public function editListing(Property $property)
    {
        if(Auth::user()->id == $property->user_id){
            $data['page_title'] = 'Edit '.$property->title.' listing';
            $data['property'] = $property;
            $data['property_types'] = PropertyType::whereIs_public(true)->get();
            return view('user.properties.edit-listing', $data);
        }else{
            return view("errors.404");
        }
    }

    //update edited listing
    public function updateListing(Request $request, Property $property)
    {
        if(Auth::user()->id == $property->user_id){
            if(empty($request->base_property) || empty($request->property_type) || empty($request->property_title) || empty($request->property_type_status)){
                return redirect()->back();
            }else{
                $property->base = $request->base_property;
                $property->type = $request->property_type;
                $property->title = $request->property_title;
                $property->type_status = $request->property_type_status;
                $property->adult = $request->adult;
                $property->children = $request->children;
                $property->done_step = false;
                $property->update();

                if($property->publish){
                    Session::put("edit", true);
                }
                return redirect()->route('property.create', $property->id);
            }
        }else{
            return redirect()->back();
        }

    }

    ///toggle publish visibility
    public function togglePublishVisibility(Request $request, Property $property)
    {
        if(Auth::user()->id == $property->user_id){
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
        }else{
            return 'You are unauthorized to switch visibility';
        }
    }

    ///confirm delete
    public function confirmDelete(Property $property)
    {
        if(Auth::user()->id == $property->user_id){
            $data['page_title'] = 'Remove '.$property->title.' Listing';
            $data['property'] = $property;
            return view('user.properties.confirm-listing-delete', $data);
        }
        else{
            return view("errors.404");
        }
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


    // //manage property
    // public function manageProperty()
    // {
    //     $data['page_title'] = 'My properties';
    //     $data['properties'] = Property::whereUser_id(Auth::user()->id)->whereIs_active(true)->whereDone_step(true)->get();
    //     return view('admin.properties.manage-property', $data);
    // }

    // //manage property
    // public function managePropertyDetail(Property $property)
    // {
    //     $data['page_title'] = $property->title.' details';
    //     $data['property'] = $property;
    //     $countImages = PropertyImage::whereProperty_id($property->id)->count();
    //     $countImages = $property->propertyImages->count();
    //     $data['images'] = $property->propertyImages->slice(1)->take(($countImages==0)? 0:$countImages-1);
    //     return view('admin.properties.show-detail-property', $data);
    // }










}
