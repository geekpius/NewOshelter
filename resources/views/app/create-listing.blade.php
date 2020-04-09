@extends('layouts.app')

@section('styles')
<!--Form Wizard-->
<link href="{{ asset('assets/wizard/ace.css') }}" rel="stylesheet">
<link href="{{ asset('assets/plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/plugins/animate/animate.css') }}" rel="stylesheet" />
<style>
    .property-image-width{
        width: 100%;
    }
    .remove-property-image{
        cursor: pointer;
    }
    .img-left{
        float: left;
        clear: right;
    }

</style>
@endsection
@section('content')

<div class="container-fluid">
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-right">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active">New Listing</li>
                    </ol>
                </div>
                <h4 class="page-title">New Listing</h4>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
    <!-- end page title end breadcrumb -->
   
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="">
                    <a href="javascript:void(0);" onclick="window.location='{{ route('property.add') }}'" class="text-primary ml-3 mt-1">
                        <i class="fa fa-heart"></i> Save and Exit
                    </a>
                    @php
                        $progress = 0;
                        if($property->step==1){
                            $progress=10;
                        }elseif($property->step==2){
                            $progress=22;
                        }elseif($property->step==3){
                            $progress=32;
                        }elseif($property->step==4){
                            $progress=37;
                        }elseif($property->step==5){
                            $progress=60;
                        }elseif($property->step==6){
                            $progress=75;
                        }elseif($property->step==7){
                            $progress=90;
                        }elseif($property->step==8){
                            $progress=95;
                        }elseif($property->step==9){
                            $progress=100;
                        }
                    @endphp
                    <div class="progress float-right mt-1" style="height: 12px; width:50%">
                        <div class="progress-bar  progress-bar-striped progress-bar-animated bg-primary" role="progressbar" style="width: {{$progress}}%;">
                            {{$progress}}%                         
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    
                    @php
                        $proTypeStatus = ''; $sinTypeStatus = ''; $guest = '';
                        if($property->type_status=='rent'){
                            $proTypeStatus = 'renting';
                            $sinTypeStatus = 'rent';
                            $guest = 'tenant';
                        }else if($property->type_status=='sell'){
                            $proTypeStatus = 'buying';
                            $sinTypeStatus = 'buy';
                            $guest = 'buyer';
                        }else{
                            $proTypeStatus = 'auctioning';
                            $sinTypeStatus = 'auction';
                            $guest = 'bidder';
                        }
                    @endphp

                    <div id="registrationWizard">
                        <div>
                            <ul class="steps">
                                @if($property->type=='hostel')
                                    <li data-step="1">
                                        <span class="step">1</span>
                                        <span class="title text-primary"><small>Blocks&Rooms</small></span>
                                    </li>
                                @else
                                    <li data-step="1">
                                        <span class="step">1</span>
                                        <span class="title text-primary"><small>Contain Amenities</small></span>
                                    </li>
                                @endif 
                                <li data-step="2">
                                    <span class="step">2</span>
                                    <span class="title text-primary"><small>Location/Landmark</small></span>
                                </li>

                                <li data-step="3">
                                    <span class="step">3</span>
                                    <span class="title text-primary"><small>Amenities</small></span>
                                </li>

                                <li data-step="4">
                                    <span class="step">4</span>
                                    <span class="title text-primary"><small>Photos</small></span>
                                </li>

                                <li data-step="5">
                                    <span class="step">5</span>
                                    <span class="title text-primary"><small>Descriptions</small></span>
                                </li>

                                <li data-step="6">
                                    <span class="step">6</span>
                                    <span class="title text-primary"><small>Property Rules</small></span>
                                </li>
                                <li data-step="7">
                                    <span class="step">7</span>
                                    <span class="title text-primary"><small>Schedule&Price</small></span>
                                </li>
                                <li data-step="8">
                                    <span class="step">8</span>
                                    <span class="title text-primary"><small>{{ ucfirst($guest."'s") }} Guide</small></span>
                                </li>
                                <li data-step="9">
                                    <span class="step">9</span>
                                    <span class="title text-primary"><small>Ready to Publish</small></span>
                                </li>

                            </ul>
                        </div>  
    
                        <div class="step-content pos-rel">  
                            @if($property->type=='hostel')
                                <div class="step-pane active" data-step="1">
                                    <div class="row">
                                        <div class="col-lg-1"></div>
                                        <div class="col-lg-5">
                                            <h4>Provide block names of your hostel to make arrangement of rooms look nice and appreciated</h4>
                                            <div style="position: relative;  height: 550px; overflow-y:scroll; overflow-x:hidden;">
                                                <form class="mt-4" id="formBlockRooms" method="POST" action="{{ route("property.store") }}">
                                                    @csrf
                                                    <input type="hidden" name="property_id" value="{{ $property->id }}" readonly>
                                                    <input type="hidden" name="step" value="1" readonly>
                                                    <div class="form-group mt-4 validate">
                                                        <label for="">Block name</label>
                                                        <input type="text" name="block_name" class="form-control" placeholder="eg: Opoku Ware">
                                                        <span class="text-danger small mySpan" role="alert"></span>
                                                    </div>
                                                    <div class="form-group mt-4 validate">
                                                        <label for="">Block Room Type</label>
                                                        <select name="block_room_type" class="form-control" id="block_room_type">
                                                            <option value="">--Select--</option>
                                                            <option value="single_room">Single Room</option>
                                                            <option value="chamber_and_hall">Chamber And Hall</option>
                                                            <option value="apartment">Apartment</option>
                                                        </select>
                                                        <span class="text-danger small mySpan" role="alert"></span>
                                                    </div>
                                                    <div class="form-group mb-4 validate">
                                                        <label class="mb-2">How many rooms on block?</label>
                                                        <div class="input-group bootstrap-touchspin bootstrap-touchspin-injected">
                                                            <input id="rooms_on_block" type="text" value="0" onkeypress="return isNumber(event)" name="rooms_on_block" class="form-control">
                                                        </div>
                                                        <span class="text-danger small mySpan" role="alert"></span>
                                                    </div>
                                                    <div class="form-group mb-4 validate">
                                                        <label class="mb-2">How many beds per room?</label>
                                                        <div class="input-group bootstrap-touchspin bootstrap-touchspin-injected">
                                                            <input id="beds" type="text" value="0" onkeypress="return isNumber(event)" name="beds" class="form-control">
                                                        </div>
                                                        <span class="text-danger small mySpan" role="alert"></span>
                                                    </div>
                                                    <div class="form-group validate">
                                                        <label class="mb-2">How many people per room?</label>
                                                        <div class="input-group bootstrap-touchspin bootstrap-touchspin-injected">
                                                            <input id="person_per_room" type="text" value="0" onkeypress="return isNumber(event)" name="person_per_room" class="form-control">
                                                        </div>
                                                        <span class="text-danger small mySpan" role="alert"></span>
                                                    </div>
                                                    <div class="form-group mt-4 validate">
                                                        <label for="">Have kitchen? What type?</label>
                                                        <select name="kitchen" class="form-control" id="kitchen">
                                                            <option value="">--Select--</option>
                                                            <option value="1">It's a private kitchen</option>
                                                            <option value="2">It's a shared kitchen</option>
                                                            <option value="0">No kitchen</option>
                                                        </select>
                                                        <span class="text-danger small mySpan" role="alert"></span>
                                                    </div>
                                                    <div class="form-group mb-4 validate">
                                                        <label class="mb-2">How many bathrooms?</label>
                                                        <div class="input-group bootstrap-touchspin bootstrap-touchspin-injected">
                                                            <input id="baths" type="text" value="0" onkeypress="return isNumber(event)" name="baths" class="form-control">
                                                        </div>
                                                        <span class="text-danger small mySpan" role="alert"></span>
                                                    </div>
                                                    <div class="form-group mt-4 validate">
                                                        <label for="">Is the bathroom private?</label>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" id="bath_private" name="bath_private" value="1" class="custom-control-input" @if(empty($property)) checked @else @if($property->bath_private) checked @endif  @endif>
                                                            <label class="custom-control-label" for="bath_private">Yes, it's private</label>
                                                        </div>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" id="bath_private1" name="bath_private" value="0" class="custom-control-input" @if(!empty($property))  @if(!$property->bath_private) checked @endif  @endif>
                                                            <label class="custom-control-label" for="bath_private1">No, it's shared</label>
                                                        </div>
                                                        <span class="text-danger small mySpan" role="alert"></span>
                                                    </div>
                                                    <div class="form-group mb-0 validate">
                                                        <label class="mb-2">How many toilet? </label>
                                                        <div class="input-group bootstrap-touchspin bootstrap-touchspin-injected">
                                                            <input id="toilet" type="text" value="0" onkeypress="return isNumber(event)" name="toilet" class="form-control">
                                                        </div>
                                                        <span class="text-danger small mySpan" role="alert"></span>
                                                    </div>
                                                    <div class="form-group mt-4 validate">
                                                        <label for="">Is the toilet private?</label>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" id="toilet_private" name="toilet_private" value="1" class="custom-control-input" @if(empty($property)) checked @else @if($property->toilet_private) checked @endif  @endif>
                                                            <label class="custom-control-label" for="toilet_private">Yes, it's private</label>
                                                        </div>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" id="toilet_private1" name="toilet_private" value="0" class="custom-control-input" @if(!empty($property))  @if(!$property->toilet_private) checked @endif  @endif>
                                                            <label class="custom-control-label" for="toilet_private1">No, it's shared</label>
                                                        </div>
                                                        <span class="text-danger small mySpan" role="alert"></span>
                                                    </div>
                                                </form>
                                                <button type="button" class="btn btnAddBlock btn-gradient-primary btn-sm mt-4"><i class="fa fa-plus-circle"></i> Add Block</button>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 pt-5">
                                            <div id="myErrorBlockMessage"></div>
                                            <div id="getMyBlockNames"></div>
                                        </div>
                                    </div><!-- end row --> 
                                </div><!-- end step one --> 
                            @else
                                <div class="step-pane active" data-step="1">
                                    <div class="row">
                                        <div class="col-lg-1"></div>
                                        <div class="col-lg-5">
                                            <h4>Info about bedroom, kitchen, baths and toilet</h4>
                                            <form class="mt-4" id="formContainAmenities" method="POST" action="{{ route("property.store") }}">
                                                @csrf
                                                <input type="hidden" name="property_id" value="{{ $property->id }}" readonly>
                                                <input type="hidden" name="step" value="1" readonly>
                                                <div class="form-group mt-4 validate">
                                                    <label for="">How many bedrooms?</label>
                                                    <select name="bedrooms" class="form-control" id="bedrooms">
                                                        <option value="">--Select--</option>
                                                        <option value="1">1 Bedroom</option>
                                                        @for ($i = 2; $i <= 50; $i++)
                                                        <option value="{{ $i }}">{{ $i }} Bedrooms</option>    
                                                        @endfor
                                                        <option value="50+">50+ Bedrooms</option>
                                                    </select>
                                                    <span class="text-danger small mySpan" role="alert"></span>
                                                </div>
                                                <div class="form-group mb-0 validate">
                                                    <label class="mb-2">Beds per room</label>
                                                    <div class="input-group bootstrap-touchspin bootstrap-touchspin-injected">
                                                        <input id="beds" type="text" value="0" name="beds" onkeypress="return isNumber(event)" class="form-control">
                                                    </div>
                                                    <span class="text-danger small mySpan" role="alert"></span>
                                                </div>
                                                <div class="form-group mt-4 validate">
                                                    <label for="">Have kitchen? What type?</label>
                                                    <select name="kitchen" class="form-control" id="kitchen">
                                                        <option value="">--Select--</option>
                                                        <option value="1">It's a private kitchen</option>
                                                        <option value="2">It's a shared kitchen</option>
                                                        <option value="0">No kitchen</option>
                                                    </select>
                                                    <span class="text-danger small mySpan" role="alert"></span>
                                                </div>
                                                <div class="form-group mb-3 validate">
                                                    <label class="mb-2">How many baths?</label>
                                                    <div class="input-group bootstrap-touchspin bootstrap-touchspin-injected">
                                                        <input id="baths" type="text" value="0" name="baths" onkeypress="return isNumber(event)" class="form-control">
                                                    </div>
                                                    <span class="text-danger small mySpan" role="alert"></span>
                                                </div>
                                                <div class="form-group mt-4 validate">
                                                    <label for="">Is the bathroom private?</label>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="bath_private" name="bath_private" value="1" class="custom-control-input" @if(empty($property)) checked @else @if($property->bath_private) checked @endif  @endif>
                                                        <label class="custom-control-label" for="bath_private">Yes, it's private</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="bath_private1" name="bath_private" value="0" class="custom-control-input" @if(!empty($property))  @if(!$property->bath_private) checked @endif  @endif>
                                                        <label class="custom-control-label" for="bath_private1">No, it's shared</label>
                                                    </div>
                                                    <span class="text-danger small mySpan" role="alert"></span>
                                                </div>
                                                <div class="form-group mb-0 validate">
                                                    <label class="mb-2">How many toilet? </label>
                                                    <div class="input-group bootstrap-touchspin bootstrap-touchspin-injected">
                                                        <input id="toilet" type="text" value="0" name="toilet" onkeypress="return isNumber(event)" class="form-control">
                                                    </div>
                                                    <span class="text-danger small mySpan" role="alert"></span>
                                                </div>
                                                <div class="form-group mt-4 validate">
                                                    <label for="">Is the toilet private?</label>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="toilet_private" name="toilet_private" value="1" class="custom-control-input" @if(empty($property)) checked @else @if($property->toilet_private) checked @endif  @endif>
                                                        <label class="custom-control-label" for="toilet_private">Yes, it's private</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="toilet_private1" name="toilet_private" value="0" class="custom-control-input" @if(!empty($property))  @if(!$property->toilet_private) checked @endif  @endif>
                                                        <label class="custom-control-label" for="toilet_private1">No, it's shared</label>
                                                    </div>
                                                    <span class="text-danger small mySpan" role="alert"></span>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-lg-6"></div>
                                    </div><!-- end row --> 
                                </div><!-- end step one -->
                            @endif
                                
                            <div class="step-pane" data-step="2">
                                <div class="row">
                                    <div class="col-lg-1"></div>
                                    <div class="col-lg-5">
                                        <h4>Provide your property location & landmark</h4>
                                        <form class="mt-4" id="formLocationLandmark" method="POST" action="{{ route('property.store') }}">
                                            @csrf
                                            <input type="hidden" name="step" value="2" readonly>
                                            <input type="hidden" name="property_id" value="{{ $property->id }}" readonly>
                                            <div class="form-group validate">
                                                <label for="">Digital Address</label>
                                                <input type="text" name="digital_address" class="form-control" placeholder="eg: GL-050-6789">
                                                <span class="text-danger small mySpan" role="alert"></span>
                                            </div>
                                            <div class="form-group validate">
                                                <label for="">Where is your property located?</label>
                                                <input type="text" name="location" class="form-control" placeholder="eg: Labadi, Joy Lane, Accra">
                                                <span class="text-danger small mySpan" role="alert"></span>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="card mt-4">
                                            <div class="card-body">        
                                                <h4 class="mt-0 header-title">Pin your location to the right place</h4>     
                                                <div id="gmaps-markers" class="gmaps"></div>
                                            </div><!--end card-body-->
                                        </div><!--end card--> 
                                    </div>
                                </div><!-- end row --> 
                            </div><!-- end step two -->  

                            <div class="step-pane" data-step="3">
                                <div class="row">
                                    <div class="col-lg-1"></div>
                                    <div class="col-lg-11">
                                        <form class="mt-4" id="formAmenities" method="POST" action="{{ route('property.store') }}">
                                            <h4 class="mb-3">Amenities you offer to your {{ $guest.'s' }}</h4>
                                            @csrf
                                            <input type="hidden" name="step" value="3" readonly>
                                            <input type="hidden" name="property_id" value="{{ $property->id }}" readonly>
                                            <div class="row">
                                                @php $i=0; @endphp
                                                @foreach ($amenities as $item)
                                                @php $i++; @endphp
                                                <div class="form-group col-sm-4">
                                                    <div class="checkbox checkbox-primary">
                                                        <input id="checkbox{{ $i }}" type="checkbox" value="{{ $item->name }}" name="amenities[]">
                                                        <label for="checkbox{{ $i }}">{{ $item->name }}</label>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </form>
                                    </div>
                                </div><!-- end row --> 
                            </div><!-- end step three -->                              

                            <div class="step-pane" data-step="4">
                                <div class="row">
                                    <div class="col-lg-1"></div>
                                    <div class="col-lg-6">
                                        <h4>Lets take a tour on your property</h4>
                                        <p class="mb-4"><i class="fa fa-dot-circle" style="font-size:9px"></i> Property photo with captions will best help us with the tour.</p>

                                        <div id="propertyPhotoHolder" class="row" style="height:450px; border:dotted; border-radius:5px; overflow-y:scroll; overflow-x:hidden; background:url('{{ asset('assets/images/1.png') }}');background-position:center; background-repeat:no-repeat; background-size:cover;">
                                            
                                        </div>
                                        <button class="btn btn-primary mt-3 btn-sm" onclick="getFile();"><i class="fa fa-cloud-upload-alt"></i> Add Photos
                                            <div style='height: 0px;width:0px; overflow:hidden;'><input id="upfile" type="file" multiple name="photos[]" /></div>
                                        </button>
                                        <div class="mt-3">
                                            <small><span id="uploadMsg" class="text-danger"></span></small>
                                        </div>

                                        <form id="formPhotos" class="hidden" method="POST" action="{{ route('property.store') }}">
                                            @csrf
                                            <input type="hidden" name="step" value="4" readonly>
                                            <input type="hidden" name="property_id" value="{{ $property->id }}" readonly>
                                        </form>
                                    </div>
                                    <div class="col-lg-1"></div>
                                    <div class="col-lg-4">
                                        <div class="mt-5 pt-4" style="width:70%">
                                            <i class="fa fa-lightbulb fa-lg text-pink"></i>
                                            <h5>Tips for adding a great photos of your property</h5>
                                            <p><i class="fa fa-dot-circle text-pink" style="font-size:9px"></i> Include all places of your property. eg: bedroom, kitchen, bathroom, etc.</p>
                                            <p><i class="fa fa-dot-circle text-pink" style="font-size:9px"></i> Shoot photos in landscape mode in order to capture more spaces. Shoot from corners to add perspective.</p>
                                            <p><i class="fa fa-dot-circle text-pink" style="font-size:9px"></i> Shoot photos in HD cameras to get more quality and professional photos for your properties.</p>
                                            <p><i class="fa fa-dot-circle text-pink" style="font-size:9px"></i> Add property photos with size of 720x480 to best fit gallery.</p>

                                        </div>
                                    </div>
                                </div><!-- end row --> 
                            </div><!-- end step four --> 

                            <div class="step-pane" data-step="5">
                                <div class="row">
                                    <div class="col-lg-1"></div>
                                    <div class="col-lg-5">
                                        <h4>How does your property looks like?</h4>
                                        <form class="mt-4" id="formDescriptions" method="POST" action="{{ route('property.store') }}">
                                            @csrf
                                            <input type="hidden" name="step" value="5" readonly>
                                            <input type="hidden" name="property_id" value="{{ $property->id }}" readonly>
                                            <div class="form-group validate">
                                                <label for="gate"><span class="text-primary">Is your property in a gated community?</span></label>
                                                <select name="gate" class="form-control" id="gate">
                                                    <option value="">--Select--</option>
                                                    <option value="1">Yes</option>
                                                    <option value="0">No</option>
                                                </select>
                                                <span class="text-danger small mySpan" role="alert"></span>
                                            </div>
                                            <div class="form-group validate">
                                                <label for="description"><span class="text-primary">A short description of your property</span></label>
                                                <textarea class="form-control" name="description" rows="5" maxlength="500" id="description" placeholder="Write descriptions about room decor, furniture, nearby things. Just make it simple">{{ empty($property->propertyDescription->description)? '':$property->propertyDescription->description }}</textarea>
                                                <small id="myDescriptionCharacters" class="form-text text-muted">500 characters remaining</small>
                                                <span class="text-danger small mySpan" role="alert"></span>
                                            </div>
                                            <p class="mt-5"><strong>Let's narrow down the complexity</strong> <i class="fa fa-arrow-down"></i></p>
                                            <div class="form-group validate">
                                                <label for="neighbourhood"><span class="text-primary">Neighbourhood description</span></label>
                                                <textarea class="form-control" name="neighbourhood" rows="3" maxlength="255" id="neighbourhood" placeholder="Why is your neighbourhood is the best place? eg:parks,supermarket,etc">{{ empty($property->propertyDescription->neighbourhood)? '':$property->propertyDescription->neighbourhood }}</textarea>
                                                <span class="text-danger small mySpan" role="alert"></span>
                                            </div>
                                            <div class="form-group validate">
                                                <label for="directions"><span class="text-primary">Directions</span></label>
                                                <textarea class="form-control" name="directions" rows="3" maxlength="255" id="directions" placeholder="Directions on how to reach the property">{{ empty($property->propertyDescription->direction)? '':$property->propertyDescription->direction }}</textarea>
                                                <span class="text-danger small mySpan" role="alert"></span>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-8">
                                                    <div class="form-group validate">
                                                        <label for="property_size"><span class="text-primary">Size</span></label>    
                                                        <input type="text" class="form-control" name="property_size" id="property_size" placeholder="Enter size" value="{{ empty($property->propertyDescription->size)? '':$property->propertyDescription->size }}" />
                                                        <span class="text-danger small mySpan" role="alert"></span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group validate">
                                                        <label for="size_unit"><span class="text-primary">Unit</span></label> 
                                                        <select name="size_unit" class="form-control" id="size_unit">
                                                            <option value="">Unit</option>
                                                            <option value="sf">SF</option>
                                                            <option value="m2">M2</option>
                                                        </select>   
                                                        <span class="text-danger small mySpan" role="alert"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div><!-- end row --> 
                            </div><!-- end step five --> 
                            
                            <div class="step-pane" data-step="6">
                                <div class="row">
                                    <div class="col-lg-1"></div>
                                    <div class="col-lg-5">
                                        <h4>Enforce property rules if any</h4>
                                        @if ($property->type_status=='rent')
                                        <p><i class="fa fa-dot-circle" style="font-size: 9px"></i> Tenants must agree to your rules before renting property</p>
                                        @endif
                                        <form class="mt-4" id="formPropertyRules" method="POST" action="{{ route('property.store') }}">
                                            @csrf
                                            <input type="hidden" name="step" value="6" readonly>
                                            <input type="hidden" name="property_id" value="{{ $property->id }}" readonly>
                                            @if ($property->type_status=='rent')
                                                <div class="row">
                                                    <div class="form-group col-sm-6">
                                                        <div class="checkbox checkbox-primary">
                                                            <input id="smoking" type="checkbox" value="No smoking" name="property_rules[]">
                                                            <label for="smoking">No smoking</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                        <div class="checkbox checkbox-primary">
                                                            <input id="weapon" type="checkbox" value="No deadly weapons" name="property_rules[]">
                                                            <label for="weapon">No deadly weapons</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                        <div class="checkbox checkbox-primary">
                                                            <input id="pool" type="checkbox" value="Dont urinate in pool" name="property_rules[]">
                                                            <label for="pool">Dont unrinate in pool</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                        <div class="checkbox checkbox-primary">
                                                            <input id="laundary" type="checkbox" value="No washing outside laundary" name="property_rules[]">
                                                            <label for="laundary">No washing outside laundary</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="mt-5 mb-5">
                                                            <h5 class="text-danger">If you are selling or auctioning, you don't need to set rules.</h5> 
                                                            <h5 class="text-danger">Property rules are for tenants only when renting out.</h5> 
                                                        </div>    
                                                    </div>
                                                </div>
                                            @endif
                                        </form>
                                        
                                    </div>
                                    <div class="col-lg-1"></div>
                                    <div class="col-lg-5">
                                        <h4>Would you like to add other rules?</h4>
                                        @if ($property->type_status=='rent')
                                        <form class="mt-4" id="formPropertyOtherRules">
                                            <input type="hidden" name="property_id" value="{{ $property->id }}" readonly>
                                            <div class="form-group validate">
                                                <label for="">Add your own rule</label>
                                                <div class="input-group">
                                                    <input type="text" name="add_rule" class="form-control" placeholder="eg: Don't drink alcohol infront of children">
                                                    <i class="input-group-append">
                                                        <button class="btn btn-gradient-primary btn-sm btnAddOwnRule" type="button"><i class="fa fa-plus-circle"></i> Add</button>
                                                    </i>
                                                </div>
                                                <span class="text-danger small mySpan" role="alert"></span>
                                            </div>
                                        </form>
                                        <div id="myDefineRules"></div>
                                        @endif
                                    </div>
                                </div><!-- end row --> 
                            </div><!-- end step six --> 

                            @if($property->type=='hostel')
                            <div class="step-pane" data-step="7">
                                <div class="row">
                                    <div class="col-lg-1"></div>
                                    <div class="col-lg-5">
                                        <h4>Provide tenants with your rent schedule</h4>
                                        <p><i class="fa fa-dot-circle" style="font-size: 9px"></i> Tenants must know advance payment and price calendar</p>
                                        <form class="mt-4" id="formRentSchedule">
                                            @csrf
                                            <input type="hidden" name="step" value="7" readonly>
                                            <input type="hidden" name="property_id" value="{{ $property->id }}" readonly>
                                            <div class="form-group validate">
                                                <label for="">Which block do you want to set prices?</label>
                                                <select name="block" class="form-control" id="block">
                                                    <option value="">--Select--</option>
                                                    @if (count($property->propertyHostelBlocks))
                                                    @foreach($property->propertyHostelBlocks as $block)
                                                    <option value="{{ $block->id }}">{{ $block->block_name }}</option>
                                                    @endforeach
                                                    @endif
                                                </select>
                                                <span class="text-danger small mySpan" role="alert"></span>
                                            </div>
                                            <div class="form-group validate">
                                                <label for="">Advance payment duration</label>
                                                <select name="advance_duration" class="form-control" id="advance_duration">
                                                    <option value="">--Select--</option>
                                                    <option value="3">3 months in advance</option>
                                                    <option value="6">6 months in advance</option>
                                                    <option value="12">1 year in advance</option>
                                                    <option value="24">2 years in advance</option>
                                                </select>
                                                <span class="text-danger small mySpan" role="alert"></span>
                                            </div>
                                            <div class="form-group validate">
                                                <label for="">How do you wish to set your price(Price Calendar)</label>
                                                <select name="price_calendar" class="form-control" id="price_calendar">
                                                    <option value="">--Select--</option>
                                                    <option value="night">Nightly</option>
                                                    <option value="month">Monthly</option>
                                                    <option value="year">Yearly</option>
                                                </select>
                                                <span class="text-danger small mySpan" role="alert"></span>
                                            </div>

                                            <p class="mt-5"><i class="fa fa-dot-circle" style="font-size: 9px"></i> <strong>Price your property</strong></p>
                                            <div class="form-group validate">
                                                <label for="">This will be your default rent price <span id="myPriceCal"></span></label>
                                                <input type="text" name="property_price" class="form-control" id="property_price" placeholder="Tip: 300.00">
                                                <span class="text-danger small mySpan" role="alert"></span>
                                            </div>

                                            <div class="form-group validate">
                                                <label for="">Currency</label>
                                                <select name="currency" class="form-control" id="currency">
                                                    <option value="GH¢">Ghana Cedis(¢)</option>
                                                </select>
                                                <span class="text-danger small mySpan" role="alert"></span>
                                            </div>

                                            <button class="btn btn-gradient-primary btn-sm btnHostelPrices"><i class="fa fa-plus-circle"></i> Add Price</button>
                                        </form>

                                        <form id="formHostelSchedule" method="POST" action="{{ route('property.store') }}" style="display: none !important">
                                            @csrf
                                            <input type="hidden" name="step" value="7" readonly>
                                            <input type="hidden" name="property_id" value="{{ $property->id }}" readonly>
                                        </form>
                                        
                                    </div>
                                    <div class="col-lg-1"></div>
                                    <div class="col-lg-5">
                                        <label class="mt-3"><i class="fa fa-calendar text-success"></i> Prices calendar will be shown here <i class="fa fa-arrow-down"></i></label>
                                        <div id="getMyBlockPrices" class="mt-3"></div>
                                    </div>
                                </div><!-- end row --> 
                            </div><!-- end step seven --> 
                            @else
                            <div class="step-pane" data-step="7">
                                <div class="row">
                                    <div class="col-lg-1"></div>
                                    <div class="col-lg-5">
                                        @if ($property->type_status=='rent')
                                            <h4>Provide tenants with your rent schedule</h4>
                                            <p><i class="fa fa-dot-circle" style="font-size: 9px"></i> Tenants must know advance payment and price calendar</p>
                                        @elseif ($property->type_status=='sell')
                                            <h4>Provide buyers with your buying schedule</h4>
                                            <p><i class="fa fa-dot-circle" style="font-size: 9px"></i> Buyers must know buying price</p>
                                        @else
                                            <h4>Provide bidders with your bidding schedule</h4>
                                            <p><i class="fa fa-dot-circle" style="font-size: 9px"></i> Bidders must know initial bidding price</p>
                                        @endif
                                        <form class="mt-4" id="formRentSchedule" method="POST" action="{{ route('property.store') }}">
                                            @csrf
                                            <input type="hidden" name="step" value="7" readonly>
                                            <input type="hidden" name="property_id" value="{{ $property->id }}" readonly>
                                            @if($property->type_status=='rent')
                                                <div class="form-group validate">
                                                    <label for="">Advance payment duration</label>
                                                    <select name="advance_duration" class="form-control" id="advance_duration">
                                                        <option value="">--Select--</option>
                                                        <option value="3">3 months in advance</option>
                                                        <option value="6">6 months in advance</option>
                                                        <option value="12">1 year in advance</option>
                                                        <option value="24">2 years in advance</option>
                                                    </select>
                                                    <span class="text-danger small mySpan" role="alert"></span>
                                                </div>
                                                <div class="form-group validate">
                                                    <label for="">How do you wish to set your price(Price Calendar)</label>
                                                    <select name="price_calendar" class="form-control" id="price_calendar">
                                                        <option value="">--Select--</option>
                                                        <option value="night">Nightly</option>
                                                        <option value="month">Monthly</option>
                                                        <option value="year">Yearly</option>
                                                    </select>
                                                    <span class="text-danger small mySpan" role="alert"></span>
                                                </div>

                                                <p class="mt-5"><i class="fa fa-dot-circle" style="font-size: 9px"></i> <strong>Price your property</strong></p>
                                                <div class="form-group validate">
                                                    <label for="">This will be your default rent price <span id="myPriceCal"></span></label>
                                                    <input type="text" name="property_price" class="form-control" id="property_price" placeholder="Tip: 300.00">
                                                    <span class="text-danger small mySpan" role="alert"></span>
                                                </div>
                                            @else
                                                <p class=""><i class="fa fa-dot-circle" style="font-size: 9px"></i> <strong>Price your property for {{ $property->type_status.'ing' }} </strong></p>
                                                <div class="form-group validate">
                                                    <label for="">This will be your {{ $property->type_status=='sell'? 'default':'initial' }} {{ $property->type_status }} price <span id="myPriceCal"></span></label>
                                                    @if($property->type_status=='sell')
                                                    @endif
                                                    <input type="text" name="property_price" class="form-control" id="property_price" placeholder="Tip: 300.00">
                                                    <span class="text-danger small mySpan" role="alert"></span>
                                                </div>
                                                @if ($property->type_status=='sell')
                                                <div class="form-group validate">
                                                    <div class="checkbox checkbox-primary">
                                                        <input id="negotiable" type="checkbox" value="1" name="negotiable">
                                                        <label for="negotiable">Negotiable</label>
                                                    </div>
                                                    <span class="text-danger small mySpan" role="alert"></span>
                                                </div>
                                                @endif                                            
                                            @endif

                                            <div class="form-group validate">
                                                <label for="">Currency</label>
                                                <select name="currency" class="form-control" id="currency">
                                                    <option value="GH¢">Ghana Cedis(¢)</option>
                                                </select>
                                                <span class="text-danger small mySpan" role="alert"></span>
                                            </div>

                                        </form>
                                        
                                    </div>
                                    <div class="col-lg-1"></div>
                                    <div class="col-lg-5">
                                        @if ($property->type_status=='rent')
                                            <p class="mt-5">You can set set-in price later when market is down.</p>
                                            <h5 class="mt-5"><i class="fa fa-square text-pink" style="font-size:10px"></i> Eviction notice will start from 3months before due date.</h5>
                                            <h5 class="mt-2"><i class="fa fa-square text-pink" style="font-size:10px"></i> Eviction notification will be sent to tenants every two weeks till due date.</h5>
                                            <h5 class="mt-2"><i class="fa fa-square text-pink" style="font-size:10px"></i> It's tenants choice to extend his/her stay or to evict.</h5>
                                        @elseif ($property->type_status=='sell')
                                            <p class="mt-5">You can set set-in price later when market is down.</p>
                                            <h5 class="mt-5"><i class="fa fa-square text-pink" style="font-size:10px"></i> Set price which has value for your property.</h5>
                                            <h5 class="mt-2"><i class="fa fa-square text-pink" style="font-size:10px"></i> Don't set your price too high or too low to scare buyers.</h5>
                                        @else
                                            <h5 class="mt-5"><i class="fa fa-square text-pink" style="font-size:10px"></i> Have a price range that values your property in mind.</h5>
                                            <h5 class="mt-2"><i class="fa fa-square text-pink" style="font-size:10px"></i> Use the minimum price as initial.</h5>
                                            <h5 class="mt-2"><i class="fa fa-square text-pink" style="font-size:10px"></i> Let bidder do their job of bidding.</h5>
                                            <h5 class="mt-2"><i class="fa fa-square text-pink" style="font-size:10px"></i> If you are satisfied with the highest bidding, you can close auctioning.</h5>
                                        @endif
                                    </div>
                                </div><!-- end row --> 
                            </div><!-- end step seven --> 
                            @endif

                            <div class="step-pane" data-step="8">
                                <div class="row">
                                    <div class="col-lg-1"></div>
                                    <div class="col-lg-10">
                                        <h4 class="mb-3">
                                            This is how {{ $guest.'s' }} will interact through the {{ $proTypeStatus }} process.
                                        </h4>
                                        
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="card">
                                                    <div class="card-body">      
                                                        <div class="text-center">
                                                            <i class="fa fa-user text-success fa-5x"></i>
                                                            <hr>
                                                            <p>
                                                                <i class="fa fa-square text-pink" style="font-size:10px"></i> 
                                                                Every {{ $guest }} on Real Home must be qualified to {{ $property->type_status=='auction'? 'bid':$sinTypeStatus }} you
                                                            </p>
                                                            <i class="fa fa-square text-pink" style="font-size:10px"></i>
                                                            <p>
                                                                Every qualified {{ $guest }} must confirm their contact info, provide payment info 
                                                                before they can {{ $property->type_status=='auction'? 'bid':$sinTypeStatus }} you.
                                                            </p>
                                                        </div>
                                                    </div><!--end card-body-->
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="card">
                                                    <div class="card-body">      
                                                        <div class="text-center">
                                                            <i class="fa fa-thumbs-up text-success fa-5x"></i>
                                                            <hr>
                                                            <p>
                                                                <i class="fa fa-square text-pink" style="font-size:10px"></i> 
                                                                You control who {{ $property->type_status=='auction'? 'bids':$sinTypeStatus.'s' }} you
                                                            </p>
                                                            <i class="fa fa-square text-pink" style="font-size:10px"></i>
                                                            <p>
                                                                Every {{ $guest }} who wants to {{ $property->type_status=='auction'? 'bid':$sinTypeStatus }} you should agree to the property 
                                                                info set by you before they go ahead.
                                                            </p>
                                                        </div><br>
                                                    </div><!--end card-body-->
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="card">
                                                    <div class="card-body">      
                                                        <div class="text-center">
                                                            <i class="fa fa-bell text-success fa-5x"></i>
                                                            <hr>
                                                            <p>
                                                                <i class="fa fa-square text-pink" style="font-size:10px"></i> 
                                                                You are always notified
                                                            </p>
                                                            <i class="fa fa-square text-pink" style="font-size:10px"></i>
                                                            <p>
                                                                Once {{ $guest }} {{ $property->type_status=='auction'? 'bid':$sinTypeStatus }} you, you will get confirmation notification 
                                                                instantly with {{$guest}} info.
                                                            </p>
                                                        </div><br>
                                                    </div><!--end card-body-->
                                                </div>
                                            </div>

                                            <div class="col-lg-8 pt-4">
                                                <h5><b>You are protected every step of the way.</b></h5>
                                                <img src="{{ asset('assets/images/logo-sm.png') }}" alt="Logo" width="30" height="30"  class="rounded-circle img-left mr-3" /> 
                                                <p>We never rest because we care. Real Home is here to protect both interest. All rent, sell and auction is covered 
                                                    by Real Home's <a href="javascript:void(0)" class="text-primary">Refund Policy</a>.
                                                </p>
                                                <p>We care for you and your property so we have you covered with every {{ $proTypeStatus }} 
                                                    situations. <a href="javascript:void(0)" class="text-primary">{{ ucfirst($guest) }} Guide Policy</a>.
                                                </p>
                                            </div>
                                        </div> 
                                        <form id="formTenantGuide" method="POST" action="{{ route('property.store') }}" style="display:none">
                                            @csrf
                                            <input type="hidden" name="step" value="8" readonly>
                                            <input type="hidden" name="property_id" value="{{ $property->id }}" readonly>
                                        </form>                                   
                                    </div>
                                    
                                </div><!-- end row --> 
                            </div><!-- end step eight --> 

                            <div class="step-pane" data-step="9">
                                <div class="row">
                                    <div class="col-lg-1"></div>
                                    <div class="col-lg-5">
                                        <h4>All set and ready for publishing</h4>
                                        <div class="mt-4 mb-3">
                                            <i class="fa fa-building fa-5x"></i>
                                            <i class="fa fa-home fa-5x ml-4 mr-4"></i>
                                            <i class="fa fa-bed fa-5x"></i>
                                        </div>
                                        <p><i class="fa fa-dot-circle" style="font-size: 9px"></i> Potential {{ $guest.'s' }} are wating for you to publish this property.</p>
                                    
                                        <div class="mt-4 mb-3">
                                            <i class="fa fa-address-card fa-5x"></i>
                                        </div>
                                        <p><i class="fa fa-dot-circle" style="font-size: 9px"></i> {{ $property->type_status=='auction'? 'Highest bidder':ucfirst($guest) }} will send a message of the date they will be moving in.</p>

                                        <div class="mt-4 mb-3">
                                            <i class="fa fa-key fa-5x"></i>
                                        </div>
                                        <p class="mb-3"><i class="fa fa-dot-circle" style="font-size: 9px"></i> Make the keys ready for your {{ $guest.'s' }} on their arrival.</p>    
                                        
                                        <form id="formFinishListing" method="POST" action="{{ route('property.store') }}" style="display:none">
                                            @csrf
                                            <input type="hidden" name="step" value="9" readonly>
                                            <input type="hidden" name="property_id" value="{{ $property->id }}" readonly>
                                        </form> 

                                    </div>
                                    <div class="col-lg-5">
                                        <h4>Terms and conditions, your local law and taxes.</h4>
                                        <div class="mt-4">
                                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.
                                                Nunc viverra imperdiet enim. Fusce est. Vivamus a tellus.</p>
                                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.
                                                Nunc viverra imperdiet enim. Fusce est. Vivamus a tellus.</p>
                                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.
                                                Nunc viverra imperdiet enim. Fusce est. Vivamus a tellus.</p>
                                        </div>
                                        <div class="card mt-3 float-right">
                                            <div class="card-body">        
                                                <a href="{{ route('property.preview', $property->id) }}" class="text-primary">
                                                    <i class="fa fa-eye text-primary"></i>
                                                    Preview Property
                                                </a> 
                                                <i class="fa fa-home text-success fa-4x"></i>
                                            </div><!--end card-body-->
                                        </div>
                                    </div>
                                </div><!-- end row --> 
                            </div><!-- end step nine --> 
                            
                            {{-- <div class="col-sm-4 offset-8">
                                <i>Listing Progress</i>
                                <div class="progress mb-4" style="height: 12px;">
                                    <div class="progress-bar  progress-bar-striped progress-bar-animated bg-primary" role="progressbar" style="width: 35%;" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100">35%</div>
                                </div>
                            </div> --}}

                        </div><!-- end step content -->   
                    </div> <!-- end wizard -->                
                    
                    <hr />
                    <div class="wizard-actions" style="text-align:center !important;">
                        <button class="btn btn-prev btn-gradient-primary btn-sm text-light mr-lg-5 mr-sm-1">
                            <i class="ace-icon fa fa-arrow-left"></i>
                            Go Previous
                        </button>
    
                        <button class="btn btn-gradient-success btn-sm text-light btn-next ml-lg-5 ml-sm-1" data-last="Finish And Publish ">
                            Next Step 
                            <i class="ace-icon fa fa-arrow-right icon-on-right"></i>
                        </button>
                    </div><!-- end buttons -->
                    

                </div><!--end card-body-->
            </div><!--end card-->
        </div><!--end col-->
    </div> 
        
</div><!-- container -->

@endsection

@section('scripts')
<script src="{{ asset('assets/wizard/ace.min.js') }}"></script>
<script src="{{ asset('assets/wizard/ace-elements.min.js') }}"></script>
<script src="{{ asset('assets/wizard/wizard.min.js') }}"></script>
<script src="{{ asset('assets/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js') }}"></script> 
<!-- google maps api -->
<script src="https://maps.google.com/maps/api/js?key=AIzaSyCtSAR45TFgZjOs4nBFFZnII-6mMHLfSYI"></script>
<!-- Gmaps file -->
<script src="{{ asset('assets/plugins/gmaps/gmaps.min.js') }}"></script>
<!-- demo codes -->
<script src="{{ asset('assets/pages/jquery.gmaps.init.js') }}"></script>

<script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
    }
})

$('#registrationWizard')
.ace_wizard({
    step: {{ $property->step }}
})
.on('actionclicked.fu.wizard' , function(e, info){
    if(info.direction == 'next'){
    @if($property->type=='hostel')
        if(info.step == 1) {
            $(".btn-next").html('<i class="fa fa-spin fa-spinner"></i> Stepping Next...').attr('disabled', true);
            document.getElementById("formBlockRooms").submit();
        }
    @else
        if(info.step == 1) {
            var valid = true;
            if($("#formContainAmenities #beds").val()=="0" || $("#formContainAmenities #beds").val()==""){
                valid = false;
                $("#formContainAmenities #beds").parents('.validate').find('.mySpan').text('The beds field is required');
            }
            if($("#formContainAmenities #baths").val()=="0" || $("#formContainAmenities #baths").val()==""){
                valid = false;
                $("#formContainAmenities #baths").parents('.validate').find('.mySpan').text('The baths field is required');
            }
            if($("#formContainAmenities #toilet").val()=="0" || $("#formContainAmenities #toilet").val()==""){
                valid = false;
                $("#formContainAmenities #toilet").parents('.validate').find('.mySpan').text('The toilet field is required');
            }
            $('#formContainAmenities select').each(function() {
                var $this = $(this);
                
                if(!$this.val()) {
                    valid = false;
                    $this.parents('.validate').find('.mySpan').text('The '+$this.attr('name').replace(/[\_]+/g, ' ')+' field is required');
                }
            });
            if(valid){
                $(".btn-next").html('<i class="fa fa-spin fa-spinner"></i> Stepping Next...').attr('disabled', true);
                document.getElementById("formContainAmenities").submit();
            }
        }
    @endif
    
        if(info.step == 2){
            var valid = true;
            $('#formLocationLandmark input').each(function() {
                var $this = $(this);
                
                if(!$this.val()) {
                    valid = false;
                    $this.parents('.validate').find('.mySpan').text('The '+$this.attr('name').replace(/[\_]+/g, ' ')+' field is required');
                }
            });
            if(valid){
                $(".btn-next").html('<i class="fa fa-spin fa-spinner"></i> Stepping Next...').attr('disabled', true);
                document.getElementById("formLocationLandmark").submit();
            }
        }
        else if(info.step == 3){
            $(".btn-next").html('<i class="fa fa-spin fa-spinner"></i> Stepping Next...').attr('disabled', true);
            document.getElementById("formAmenities").submit();
        }
        else if(info.step == 4){
            $(".btn-next").html('<i class="fa fa-spin fa-spinner"></i> Stepping Next...').attr('disabled', true);
            document.getElementById("formPhotos").submit();
        }
        else if(info.step == 5){
            var valid = true;
            $('#formDescriptions textarea, #formDescriptions select').each(function() {
                var $this = $(this);
                
                if(!$this.val()) {
                    valid = false;
                    $this.parents('.validate').find('.mySpan').text('The '+$this.attr('name').replace(/[\_]+/g, ' ')+' field is required');
                }
            });
            if(valid){
                $(".btn-next").html('<i class="fa fa-spin fa-spinner"></i> Stepping Next...').attr('disabled', true);
                document.getElementById("formDescriptions").submit();
            }
        }
        else if(info.step == 6){
            $(".btn-next").html('<i class="fa fa-spin fa-spinner"></i> Stepping Next...').attr('disabled', true);
            document.getElementById("formPropertyRules").submit();
        }
    @if($property->type=='hostel')
        if(info.step == 7){
            $(".btn-next").html('<i class="fa fa-spin fa-spinner"></i> Stepping Next...').attr('disabled', true);
            document.getElementById("formHostelSchedule").submit();
        }
    @else
        if(info.step == 7){
            var valid = true;
            $('#formRentSchedule input, #formRentSchedule select').each(function() {
                var $this = $(this);
                
                if(!$this.val()) {
                    valid = false;
                    $this.parents('.validate').find('.mySpan').text('The '+$this.attr('name').replace(/[\_]+/g, ' ')+' field is required');
                }
            });
            if(valid){
                $(".btn-next").html('<i class="fa fa-spin fa-spinner"></i> Stepping Next...').attr('disabled', true);
                document.getElementById("formRentSchedule").submit();
            }
        }
    @endif
        if(info.step == 8){
            $(".btn-next").html('<i class="fa fa-spin fa-spinner"></i> Stepping Next...').attr('disabled', true);
            document.getElementById("formTenantGuide").submit();
        }
        else if(info.step == 9){
            $(".btn-next").html('<i class="fa fa-spin fa-spinner"></i> Finished, Publishing...').attr('disabled', true);
            document.getElementById("formFinishListing").submit();
        }

        return false;
    }
})
//.on('changed.fu.wizard', function() {
//})
.on('finished.fu.wizard', function(e) {
    /* swal({
        title: "Success",
        text: "Form Submitted Successful",
        icon: "success",
        button: "OK"
    }); */
}).on('stepclicked.fu.wizard', function(e){
    return true; //this will not prevent clicking and selecting steps
});

@if($property->type=='hostel')
///add block rooms
$(".btnAddBlock").on("click", function(){
    var $this = $(this);
    var valid = true;
    if($("#formBlockRooms #rooms_on_block").val()=="0" || $("#formBlockRooms #rooms_on_block").val()==""){
        valid = false;
        $("#formBlockRooms #rooms_on_block").parents('.validate').find('.mySpan').text('The no. of rooms on blcok field is required');
    }
    if($("#formBlockRooms #person_per_room").val()=="0" || $("#formBlockRooms #person_per_room").val()==""){
        valid = false;
        $("#formBlockRooms #person_per_room").parents('.validate').find('.mySpan').text('The person per room field is required');
    }
    if($("#formBlockRooms #beds").val()=="0" || $("#formBlockRooms #beds").val()==""){
        valid = false;
        $("#formBlockRooms #beds").parents('.validate').find('.mySpan').text('The bed per person field is required');
    }
    if($("#formBlockRooms #baths").val()=="0" || $("#formBlockRooms #baths").val()==""){
        valid = false;
        $("#formBlockRooms #baths").parents('.validate').find('.mySpan').text('The bathroom field is required');
    }
    if($("#formBlockRooms #toilet").val()=="0" || $("#formBlockRooms #toilet").val()==""){
        valid = false;
        $("#formBlockRooms #toilet").parents('.validate').find('.mySpan').text('The bathroom field is required');
    }
    $('#formBlockRooms select').each(function() {
        var $this = $(this);
        
        if(!$this.val()) {
            valid = false;
            $this.parents('.validate').find('.mySpan').text('The '+$this.attr('name').replace(/[\_]+/g, ' ')+' field is required');
        }
    });
    if(valid){
        var data = $("#formBlockRooms").serialize();
        $this.html('<i class="fa fa-spin fa-spinner"></i> Adding Block...').attr('disabled', true);
        $.ajax({
            url: "{{ route('property.block.submit') }}",
            type: "POST",
            data: data,
            success: function(resp){
                showBlocks({{ $property->id }});
                $this.html('<i class="fa fa-plus-circle"></i> Add Block').attr('disabled', false);
                $("#formBlockRooms input[name='block_name']").val('');
                $("#formBlockRooms input[name='rooms_on_block']").val('0');
                $("#formBlockRooms input[name='person_per_room']").val('0');
                $("#formBlockRooms input[name='baths']").val('0');
                $("#formBlockRooms input[name='toilet']").val('0');
                $("#formBlockRooms input[name='beds']").val('0');
                $("#formBlockRooms select").val('');
            },
            error: function(resp){
                alert("Something went wrong with request");
                $this.html('<i class="fa fa-plus-circle"></i> Add Block').attr('disabled', false);
            }
        });
    }
    return false;
});

function showBlocks(id){
    $.ajax({
        url: "{{ url('/user/properties/block') }}/"+id+"/show",
        type: "GET",
        success: function(resp){
            $("#getMyBlockNames").html(resp);
        },
        error: function(resp){
            alert("Something went wrong with request");
        }
    });
}

showBlocks({{ $property->id }});
@endif


///get photos
function getFile(){
    document.getElementById("upfile").click();
}

///uploading
$("#upfile").on("change", function(){
    $("#uploadMsg").html('<i class="fa fa-spin fa-spinner"></i> Uploading...');
    var form_data = new FormData();
    var totalfiles = document.getElementById('upfile').files.length;
    if(totalfiles>30){
        swal("Exceed", "You can not upload more than 10 photos.", "warning");
        document.getElementById("upfile").value = null;
        $("#uploadMsg").html('');
        return false;
    }
    else{
        var s=0; var e=0;
        for (var index = 0; index < totalfiles; index++) {
            var size = document.getElementById('upfile').files[index].size;
            var selectedFile = document.getElementById('upfile').files[index].name;
            var ext = selectedFile.replace(/^.*\./, '');
            ext= ext.toLowerCase();
            if(size>1000141){
                s+=1;
            }
            else if(ext!='jpg' && ext!='jpeg' && ext!='png'){
                e+=1;
            }
            else{
                form_data.append("photos[]", document.getElementById('upfile').files[index]);
            }
        }

        $.ajax({
            url: "{{ route('property.photos.submit') }}", 
            type: 'POST',
            data: form_data,
            contentType: false,
            processData: false,
            success: function (response) {
                if(response=='exceed'){
                    swal("Exceed", "You can not upload more than 10 photos.", "warning");
                }
                else if(response=='error'){
                    swal("Error", "Something went wrong.", "error");
                }
                else{
                    $("#propertyPhotoHolder").load("{{ route('property.photos.show',$property->id) }}");
                }
                document.getElementById("upfile").value = null;
                $("#uploadMsg").html('');
            },
            error: function(response){
                alert('Something went wrong with your request');
                document.getElementById("upfile").value = null;
                $("#uploadMsg").html('');
            }
            
        });
        if(s>0){
            swal("File Size", s.toString()+" of your photos size is more than 1mb", "warning");
        }
        else if(e>0){
            swal("File Type", e.toString()+" unknown file types", "warning");
        }
    }
    return false;
});

//load all uploaded property photos
$("#propertyPhotoHolder").load("{{ route('property.photos.show',$property->id) }}");

///load all own rules
$("#myDefineRules").load("{{ route('property.rule.show', $property->id) }}");

///add own rule
$(".btnAddOwnRule").on("click", function(e){
    e.preventDefault();
    var $this = $(this);
    var valid = true;
    $('#formPropertyOtherRules input').each(function() {
        var $this = $(this);
        
        if(!$this.val()) {
            valid = false;
            $this.parents('.validate').find('.mySpan').text('The '+$this.attr('name').replace(/[\_]+/g, ' ')+' field is required');
        }
    });
    if(valid){
        var data = $("#formPropertyOtherRules").serialize();
        $this.html('<i class="fa fa-spin fa-spinner"></i> Adding...').attr('disabled', true);
        $.ajax({
            url: "{{ route('property.rule.submit') }}",
            type: "POST",
            data: data,
            success: function(resp){
                if(resp=='success'){
                    $this.html('<i class="fa fa-plus-circle"></i> Add').attr('disabled', false);
                    $("#formPropertyOtherRules input[name='add_rule']").val('');
                    $("#myDefineRules").load("{{ route('property.rule.show', $property->id) }}");
                }
            },
            error: function(resp){
                alert("Something went wrong with request");
                $this.html('<i class="fa fa-plus-circle"></i> Add').attr('disabled', false);
            }
        });
    }
    return false;
});

$("#formPropertyOtherRules input[name='add_rule']").on('keypress', function(e){
    if(e.which==13){
        $(".btnAddOwnRule").trigger("click");
        return false;
    }
});


@if($property->type=='hostel')
//add hostel prices
$("#formRentSchedule").on("submit", function(e){
    e.preventDefault();
    var $this = $(this);
    var valid = true;
    $('#formRentSchedule input, #formRentSchedule select').each(function() {
        var $this = $(this);
        
        if(!$this.val()) {
            valid = false;
            $this.parents('.validate').find('.mySpan').text('The '+$this.attr('name').replace(/[\_]+/g, ' ')+' field is required');
        }
    });
    if(valid){
        var data = $("#formRentSchedule").serialize();
        $(".btnHostelPrices").html('<i class="fa fa-spin fa-spinner"></i> Adding Price...').attr('disabled', true);
        $.ajax({
            url: "{{ route('property.blockprice.submit') }}",
            type: "POST",
            data: data,
            success: function(resp){
                if(resp=='success'){
                    $("#getMyBlockPrices").load("{{ route('property.blockprice.show', $property->id) }}");
                    $("#formRentSchedule #block").val('');
                    $("#formRentSchedule #advance_duration").val('');
                    $("#formRentSchedule #price_calendar").val('');
                    $("#formRentSchedule input[name='property_price']").val('');
                }
                else{
                    swal("Opps", resp, "error");
                    $("#formRentSchedule #block").val('');
                    $("#formRentSchedule #advance_duration").val('');
                    $("#formRentSchedule #price_calendar").val('');
                    $("#formRentSchedule input[name='property_price']").val('');
                }
                $(".btnHostelPrices").html('<i class="fa fa-plus-circle"></i> Add Price').attr('disabled', false);
            },
            error: function(resp){
                alert("Something went wrong with request");
                $(".btnHostelPrices").html('<i class="fa fa-plus-circle"></i> Add Price').attr('disabled', false);
            }
        });
    }
    return false;
});

///get added hostel bock prices
$("#getMyBlockPrices").load("{{ route('property.blockprice.show', $property->id) }}");
@endif

//remove error message if inputs are filled
$("input, textarea").on('input', function(){
    if($(this).val()!=''){
        $(this).parents('.validate').find('.mySpan').text('');
    }else{ $(this).parents('.validate').find('.mySpan').text('The '+$(this).attr('name').replace(/[\_]+/g, ' ')+' field is required'); }
});

$("select").on('change', function(){
    if($(this).val()!=''){
        $(this).parents('.validate').find('.mySpan').text('');
    }else{ 
        $(this).parents('.validate').find('.mySpan').text('The '+$(this).attr('name').replace(/[\_]+/g, ' ')+' field is required');
    }
});


//check remaining characters
var maxNumber = 500;
var counter = $("#description").val().length;
maxNumber=maxNumber-counter;
$("#myDescriptionCharacters").text(maxNumber.toString()+" characters remaining");

$("#description").on("input", function(){
    var maxNumber = 500;
    var $this = $(this);
    if($this.val()!=""){
        var counter = $this.val().length;
        maxNumber=maxNumber-counter;
        $("#myDescriptionCharacters").text(maxNumber.toString()+" characters remaining");
    }else{
        $("#myDescriptionCharacters").text(maxNumber.toString()+" characters remaining");
    }
});


$("input[name='beds']").TouchSpin({
    initval: 0,
    buttondown_class: 'btn btn-gradient-primary',
    buttonup_class: 'btn btn-gradient-primary'
});

$("input[name='baths']").TouchSpin({
    initval: 0,
    buttondown_class: 'btn btn-gradient-primary',
    buttonup_class: 'btn btn-gradient-primary'
});

$("input[name='toilet']").TouchSpin({
    initval: 0,
    buttondown_class: 'btn btn-gradient-primary',
    buttonup_class: 'btn btn-gradient-primary'
});

$("input[name='rooms_on_block']").TouchSpin({
    initval: 0,
    buttondown_class: 'btn btn-gradient-primary',
    buttonup_class: 'btn btn-gradient-primary'
});
$("input[name='person_per_room']").TouchSpin({
    initval: 0,
    buttondown_class: 'btn btn-gradient-primary',
    buttonup_class: 'btn btn-gradient-primary'
});

//attach price calendar to price label
$("#price_calendar").on("change", function(){
    if($(this).val()!=''){
        $("#myPriceCal").text("on price per "+$(this).val());
    }else{$("#myPriceCal").text('');}
});

@if(!empty($property))
    @if($property->type!='hostel')
        $("#formContainAmenities #bedrooms").val("{{ empty($property->propertyContain->bedroom)? '':$property->propertyContain->bedroom }}");
        $("#formContainAmenities #beds").val("{{ empty($property->propertyContain->no_bed)? '':$property->propertyContain->no_bed }}");
        $("#formContainAmenities #kitchen").val("{{ empty($property->propertyContain->kitchen)? '':$property->propertyContain->kitchen }}");
        $("#formContainAmenities #baths").val("{{ empty($property->propertyContain->bathroom)? '':$property->propertyContain->bathroom }}");
        $("#formContainAmenities #toilet").val("{{ empty($property->propertyContain->toilet)? '':$property->propertyContain->toilet }}");
        @if(!empty($property->propertyContain))
            @if($property->propertyContain->toilet_private)
                $("#formContainAmenities #toilet_private").prop("checked", true);
            @else
                $("#formContainAmenities #toilet_private1").prop("checked", true);
            @endif
            @if($property->propertyContain->bath_private)
                $("#formContainAmenities #bath_private").prop("checked", true);
            @else
                $("#formContainAmenities #bath_private1").prop("checked", true);
            @endif
        @endif

        @if($property->type_status=='rent')
            $("#formRentSchedule #advance_duration").val("{{ empty($property->propertyPrice->payment_duration)? '':$property->propertyPrice->payment_duration }}");
            $("#formRentSchedule #price_calendar").val("{{ empty($property->propertyPrice->price_calendar)? '':$property->propertyPrice->price_calendar }}");
        @elseif($property->type_status=='sell')
            @if(!empty($property->propertyPrice->negotiable))
                $("#formRentSchedule #negotiable").prop("checked", true);
            @endif
        @endif
        $("#formRentSchedule #property_price").val("{{ empty($property->propertyPrice->property_price)? '':$property->propertyPrice->property_price }}");
    @endif
    $("#formLocationLandmark input[name='digital_address']").val("{{ empty($property->propertyLocation->digital_address)? '':$property->propertyLocation->digital_address }}");
    $("#formLocationLandmark input[name='location']").val("{{ empty($property->propertyLocation->location)? '':$property->propertyLocation->location }}");
    $("#formDescriptions #gate").val("{{ empty($property->propertyDescription->gate)? '0':$property->propertyDescription->gate }}");
    $("#formDescriptions #size_unit").val("{{ empty($property->propertyDescription->unit)? '':$property->propertyDescription->unit }}");
@endif



function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}


$('#property_price').keypress(function(event) {
    if (((event.which != 46 || (event.which == 46 && $(this).val() == '')) ||
            $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
        event.preventDefault();
    }
}).on('paste', function(event) {
    event.preventDefault();
});
</script>
@endsection