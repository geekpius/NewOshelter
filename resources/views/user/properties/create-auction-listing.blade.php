@extends('layouts.site')

@section('style')
<!--Form Wizard-->
<link href="{{ asset('assets/wizard/ace.css') }}" rel="stylesheet">
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
<div class="pxp-content pull-content-down">
    <div class="container">
        <h2>New Listing</h2>  
        <p>
            <strong>{{ Auth::user()->name }},</strong> listings
        </p>
        <div class="pt-4">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        @if (!Session::get("edit"))
                        <div class="">
                            <a href="javascript:void(0);" onclick="window.location='{{ route('property.add') }}'" class="text-primary text-decoration-none ml-3 mt-1 font-13">
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
                            <div class="progress float-right mt-1 listing-progress" style="height: 10px; width:50%">
                                <div class="progress-bar progress-bar-striped progress-bar-animated small" role="progressbar" style="width: {{$progress}}%;">
                                    {{$progress}}%                         
                                </div>
                            </div>
                        </div>
                        @else                                
                        <a href="javascript:void(0);" onclick="event.preventDefault(); document.getElementById('formExitUpdateMode').submit();" class="text-danger text-decoration-none ml-3 mt-1 font-13">
                            <i class="fa fa-sign-out"></i> Exit Update Mode
                        </a>

                        <form id="formExitUpdateMode" action="{{ route('property.save.exit') }}" method="POST" style="display: none;">
                            @csrf
                            <input type="hidden" name="property_id" value="{{ $property->id }}">
                        </form>
                        @endif
                        <div class="card-body">
                            
                            @php
                                $proTypeStatus = 'auctioning';
                                $sinTypeStatus = 'auction';
                                $guest = 'bidder';
                            @endphp
        
                            <div id="registrationWizard">
                                <div class="steps-container" data-name="{{ $property->title }}">
                                    <ul class="steps">
                                        <li data-step="1">
                                            <span class="step">1</span>
                                            <span class="title text-primary"><small>Overview</small></span>
                                        </li>
    
                                        <li data-step="2">
                                            <span class="step">2</span>
                                            <span class="title text-primary"><small>Amenities</small></span>
                                        </li>

                                        <li data-step="3">
                                            <span class="step">3</span>
                                            <span class="title text-primary"><small>Location/Landmark</small></span>
                                        </li>
    
                                        <li data-step="4">
                                            <span class="step">4</span>
                                            <span class="title text-primary"><small>Descriptions</small></span>
                                        </li>
    
                                        <li data-step="5">
                                            <span class="step">5</span>
                                            <span class="title text-primary"><small>Schedule</small></span>
                                        </li>
                                        <li data-step="6">
                                            <span class="step">6</span>
                                            <span class="title text-primary"><small>{{ ucfirst($guest."'s") }} Guide</small></span>
                                        </li>
                                        <li data-step="7">
                                            <span class="step">7</span>
                                            <span class="title text-primary"><small>Ready to Publish</small></span>
                                        </li>
                                    </ul>
                                </div>  
                                           
                                <div class="step-content pos-rel">  
                                    <div class="step-pane active" data-step="1">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h4>Info about bedroom, kitchen, baths and toilet</h4>
                                                <form class="mt-4" id="formContainAmenities" method="POST" action="{{ route("property.store.auction") }}">
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
                                                    @if ($property->type_status=='rent' || $property->type_status=='auction')
                                                    <input type="hidden" value="0" name="beds" readonly>
                                                    @else
                                                    <div class="form-group mb-0 validate">
                                                        <label class="mb-2">Beds per room</label>
                                                        <input id="beds" type="number" value="0" min="0" name="beds" onkeypress="return isNumber(event)" class="form-control">
                                                        <span class="text-danger small mySpan" role="alert"></span>
                                                    </div>
                                                    @endif
    
                                                    <div class="form-group mt-4 validate">
                                                        <label for="">Furnished?</label>
                                                        <select name="furnish" class="form-control" id="furnish">
                                                            <option value="">--Select--</option>
                                                            <option value="fully_furnished">Fully Furnished</option>
                                                            <option value="partially_furnished">Partially Furnished</option>
                                                            <option value="not_furnished">Not Furnished</option>
                                                        </select>
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
                                                        <input id="baths" type="number" value="0" min="0" name="baths" onkeypress="return isNumber(event)" class="form-control">
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
                                                        <input id="toilet" type="number" value="0" min="0" name="toilet" onkeypress="return isNumber(event)" class="form-control">
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
                                        </div><!-- end row --> 
                                    </div><!-- end step one -->
    
                                    <div class="step-pane" data-step="2">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <form class="mt-4" id="formAmenities" method="POST" action="{{ route('property.store.auction') }}">
                                                    <h4 class="mb-3">Amenities you offer to your {{ $guest.'s' }}</h4>
                                                    @csrf
                                                    <input type="hidden" name="step" value="2" readonly>
                                                    <input type="hidden" name="property_id" value="{{ $property->id }}" readonly>
                                                    @include('includes.amenities')
                                                    @if ($property->type_status != $sinTypeStatus)
                                                    <h4 class="mt-4">If there are shared amenities offered to your {{ $guest.'s' }} in your property, let them know.</h4>
                                                    @include('includes.shared-amenities')
                                                    @endif
                                                </form>
                                            </div>
                                        </div><!-- end row --> 
                                    </div><!-- end step two -->                              
        
                                    <div class="step-pane" data-step="3">
                                        <div class="row">
                                            <div class="col-lg-5">
                                                <h4>Provide your property location</h4>
                                                <form class="mt-4" id="formLocationLandmark" method="POST" action="{{ route('property.store.auction') }}">
                                                    @csrf
                                                    <input type="hidden" name="step" value="3" readonly>
                                                    <input type="hidden" name="property_id" value="{{ $property->id }}" readonly>
                                                    {{-- <div class="form-group validate">
                                                        <label for="">Digital Address</label>
                                                        <input type="text" name="digital_address" class="form-control" placeholder="eg: GL-050-6789">
                                                        <span class="text-danger small mySpan" role="alert"></span>
                                                    </div> --}}
                                                    <div class="form-group validate">
                                                        <label for="">Where is your property located?</label>
                                                        <input type="text" name="location" id="search_input" class="form-control" placeholder="eg: Joy Lane, Accra, Ghana">
                                                        <span class="text-danger small mySpan" role="alert"></span>
                                                        <input type="hidden" name="latitude" id="latitude_input" value="{{ empty($property->propertyLocation->latitude)? '':$property->propertyLocation->latitude }}" readonly>
                                                        <input type="hidden" name="longitude" id="longitude_input" value="{{ empty($property->propertyLocation->longitude)? '':$property->propertyLocation->longitude }}" readonly>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-lg-7">
                                                <div class="card mt-4">
                                                    <div class="card-body">        
                                                        <h4 class="mt-0 header-title">Pin your location to the right place</h4>     
                                                        <div id="gmaps-markers" class="gmaps"></div>
                                                    </div><!--end card-body-->
                                                </div><!--end card--> 
                                            </div>
                                        </div><!-- end row --> 
                                    </div><!-- end step four -->  
        
                                    <div class="step-pane" data-step="4">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h4>How does your property looks like?</h4>
                                                <form class="mt-4" id="formDescriptions" method="POST" action="{{ route('property.store.auction') }}">
                                                    @csrf
                                                    <input type="hidden" name="step" value="4" readonly>
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
                                                        <label for="description"><span class="text-primary">A description of your property</span></label>
                                                        <textarea class="form-control" name="description" rows="5" maxlength="1000" id="description" placeholder="Write descriptions about room decor, furniture, nearby things, how conducive the environment is. Just make it simple">{{ empty($property->propertyDescription->description)? ' ':$property->propertyDescription->description }}</textarea>
                                                        <small id="myDescriptionCharacters" class="form-text text-muted">1000 characters remaining</small>
                                                        <span class="text-danger small mySpan" role="alert"></span>
                                                    </div>
                                                    <p class="mt-5"><strong>Let's narrow down the complexity</strong> <i class="fa fa-arrow-down"></i></p>
                                                    <div class="form-group validate">
                                                        <label for="neighbourhood"><span class="text-primary">Neighbourhood description</span></label>
                                                        <textarea class="form-control" name="neighbourhood" rows="3" maxlength="250" id="neighbourhood" placeholder="Why is your neighbourhood is the best place? eg:parks,supermarket,etc">{{ empty($property->propertyDescription->neighbourhood)? '':$property->propertyDescription->neighbourhood }}</textarea>
                                                        <span class="text-danger small mySpan" role="alert"></span>
                                                    </div>
                                                    <div class="form-group validate">
                                                        <label for="directions"><span class="text-primary">Directions</span></label>
                                                        <textarea class="form-control" name="directions" rows="3" maxlength="250" id="directions" placeholder="Directions on how to reach the property">{{ empty($property->propertyDescription->direction)? '':$property->propertyDescription->direction }}</textarea>
                                                        <span class="text-danger small mySpan" role="alert"></span>
                                                    </div>
                                                </form>
                                            </div>
                                        </div><!-- end row --> 
                                    </div><!-- end step six --> 
                                    
                                    <div class="step-pane" data-step="5">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h4>Provide bidders with your bidding schedule</h4>
                                                
                                                <form class="mt-4" id="formSchedule" method="POST" action="{{ route('property.store.auction') }}">
                                                    @csrf
                                                    <input type="hidden" name="step" value="5" readonly>
                                                    <input type="hidden" name="property_id" value="{{ $property->id }}" readonly>
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="form-group validate">
                                                                <label for="">Auction venue</label>
                                                                <input type="text" name="auction_venue" class="form-control" placeholder="Enter venue of the auction event">
                                                                <span class="text-danger small mySpan" role="alert"></span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-sm-7">
                                                            <div class="form-group validate">
                                                                <label for="">Auction date</label>
                                                                <input type="date" name="auction_date" class="form-control" >
                                                                <span class="text-danger small mySpan" role="alert"></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-5">
                                                            <div class="form-group validate">
                                                                <label for="">Auction time</label>
                                                                <input type="time" name="auction_time" class="form-control" >
                                                                <span class="text-danger small mySpan" role="alert"></span>
                                                            </div>
                                                        </div>
                                                    </div>
    
                                                </form>
                                                
                                            </div>
                                            <div class="col-lg-6">
                                                <p class="mt-5"><i class="fa fa-square text-pink font-13"></i> Have a venue in mind.</p>
                                                <p class="mt-2"><i class="fa fa-square text-pink font-13"></i> Auctioning must be free and fair.</p>
                                                <p class="mt-2"><i class="fa fa-square text-pink font-13"></i> Let bidder do their job of bidding.</p>
                                            </div>
                                        </div><!-- end row --> 
                                    </div><!-- end step seven --> 
    
                                    <div class="step-pane" data-step="6">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <h4 class="mb-3">
                                                    This is how {{ $guest.'s' }} will interact through the {{ $proTypeStatus }} process.
                                                </h4>
                                                
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="card">
                                                            <div class="card-body">      
                                                                <div class="text-center">
                                                                    <i class="fa fa-user text-success fa-5x"></i>
                                                                    <hr>
                                                                    <p>
                                                                        <i class="fa fa-square text-pink" style="font-size:10px"></i> 
                                                                        Every {{ $guest }} on OShelter must be qualified to bid your property
                                                                    </p>
                                                                    <i class="fa fa-square text-pink" style="font-size:10px"></i>
                                                                    <p>
                                                                        Every qualified {{ $guest }} must confirm their personal & contact info before they can bid your property.
                                                                    </p>
                                                                </div>
                                                            </div><!--end card-body-->
                                                        </div>
                                                    </div>
    
                                                    <div class="col-lg-10 pt-4">
                                                        <h5><b>You are protected every step of the way.</b></h5>
                                                        <img src="{{ asset('assets/images/form-logo.png') }}" alt="Logo" width="40" height="40"  class="rounded-circle img-left mr-3" /> 
                                                        <p class="pt-2">We care for you and your property so we have you covered with every {{ $proTypeStatus }} 
                                                            situations. <a href="javascript:void(0)" class="text-primary">{{ ucfirst($guest) }} Guide Policy</a>.
                                                        </p>
                                                    </div>
                                                </div> 
                                                <form id="formTenantGuide" method="POST" action="{{ route('property.store.auction') }}" style="display:none">
                                                    @csrf
                                                    <input type="hidden" name="step" value="6" readonly>
                                                    <input type="hidden" name="property_id" value="{{ $property->id }}" readonly>
                                                </form>                                   
                                            </div>
                                            
                                        </div><!-- end row --> 
                                    </div><!-- end step eight -->   
    
                                    <div class="step-pane" data-step="7">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h4>All set and ready for publishing</h4>
                                                <div class="mt-4 mb-3">
                                                    <i class="fa fa-building fa-5x"></i>
                                                    <i class="fa fa-home fa-5x ml-4 mr-4"></i>
                                                    <i class="fa fa-bed fa-5x"></i>
                                                </div>
                                                <p><i class="fa fa-dot-circle font-13"></i> Potential {{ $guest.'s' }} are wating for you to publish this property.</p>
                                            
                                                <div class="mt-4 mb-3">
                                                    <i class="fa fa-key fa-5x"></i>
                                                </div>
                                                <p class="mb-3"><i class="fa fa-dot-circle font-13"></i> Make the keys ready for your {{ $guest.'s' }} on their arrival.</p>    
                                                
                                                <form id="formFinishListing" method="POST" action="{{ route('property.store.auction') }}" style="display:none">
                                                    @csrf
                                                    <input type="hidden" name="step" value="7" readonly>
                                                    <input type="hidden" name="property_id" value="{{ $property->id }}" readonly>
                                                </form> 
    
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="card mt-3 float-right">
                                                    <div class="card-body">        
                                                        <a href="{{ route('property.preview', $property->id) }}" class="text-primary text-decoration-none">
                                                            <i class="fa fa-eye text-primary"></i>
                                                            Preview Property
                                                        </a> 
                                                        <i class="fa fa-home text-success fa-4x"></i>
                                                    </div><!--end card-body-->
                                                </div>
                                            </div>
                                        </div><!-- end row --> 
                                    </div><!-- end step nine --> 
                                    
                                </div><!-- end step content -->   
                            </div> <!-- end wizard -->                
                            
                            <hr />
                            <div class="wizard-actions" style="text-align:center !important;">
                                <button class="btn btn-prev btn-primary text-light mb-2 mr-lg-5 mr-sm-1">
                                    <i class="ace-icon fa fa-arrow-left"></i>
                                    Go Previous
                                </button>
                                
                                <button class="btn btn-success text-light btn-next mb-2 ml-lg-5 mr-sm-1" data-last="{{ (Session::has('edit'))? 'Update to Publish':'Finish And Publish ' }}">
                                    {{ (Session::has('edit'))? 'Update to Next':'Next Step' }} 
                                    <i class="ace-icon fa fa-arrow-right icon-on-right"></i>
                                </button>
                            </div><!-- end buttons -->        
                        </div><!--end card-body-->
                    </div><!--end card-->
                </div><!--end col-->
            </div>
        </div>
    </div>    
</div>
@endsection

@section('scripts')
<script src="{{ asset('assets/wizard/ace.min.js') }}"></script>
<script src="{{ asset('assets/wizard/ace-elements.min.js') }}"></script>
<script src="{{ asset('assets/wizard/wizard.min.js') }}"></script>
<!--Wysiwig js-->
<script src="{{ asset('assets/plugins/tinymce/tinymce.min.js') }}"></script>
<!-- Gmaps file -->
<script src="{{ asset('assets/plugins/gmaps/gmaps.min.js') }}"></script>
<!-- demo codes -->
<script src="{{ asset('assets/pages/gmap.init.js') }}"></script>

<script>
    $('#registrationWizard')
    .ace_wizard({
        step: {{ $property->step }}
    })
    .on('actionclicked.fu.wizard' , function(e, info){
        if(info.direction == 'next'){
            if(info.step == 1) {
                var valid = true;
                if($("#formContainAmenities #beds").val()==""){
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
            else if(info.step == 2){
                $(".btn-next").html('<i class="fa fa-spin fa-spinner"></i> Stepping Next...').attr('disabled', true);
                document.getElementById("formAmenities").submit();
            }
            else if(info.step == 3){
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
            else if(info.step == 4){
                var valid = true;
                $('#formDescriptions input, #formDescriptions textarea, #formDescriptions select').each(function() {
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
            else if(info.step == 5){
                var valid = true;
                $('#formSchedule input:text').each(function() {
                    var $this = $(this);
                    
                    if(!$this.val()) {
                        valid = false;
                        $this.parents('.validate').find('.mySpan').text('The '+$this.attr('name').replace(/[\_]+/g, ' ')+' field is required');
                    }
                });
                if(valid){
                    $(".btn-next").html('<i class="fa fa-spin fa-spinner"></i> Stepping Next...').attr('disabled', true);
                    document.getElementById("formSchedule").submit();
                }
            }
            else if(info.step == 6){
                $(".btn-next").html('<i class="fa fa-spin fa-spinner"></i> Stepping Next...').attr('disabled', true);
                document.getElementById("formTenantGuide").submit();
            }
            else if(info.step == 7){
                $(".btn-next").html('<i class="fa fa-spin fa-spinner"></i> Finished, Publishing...').attr('disabled', true);
                document.getElementById("formFinishListing").submit();
            }
            return false;
        }else{
            // previous step
            $.ajax({
                url: "{{ route('property.back', $property->id) }}",
                type: "POST",
                data: { step: info.step, action: "prev" },
                success: function(resp){
                    console.log(resp);
                },
                error: function(resp){
                    alert("Something went wrong.");
                }
            });
        }
    })
    // .on('changed.fu.wizard', function() {
    // })
    .on('finished.fu.wizard', function(e) {
        /* swal({
            title: "Success",
            text: "Form Submitted Successful",
            icon: "success",
            button: "OK"
        }); */
    }).on('stepclicked.fu.wizard', function(e, info){
        // click to choose step
        $.ajax({
            url: "{{ route('property.back', $property->id) }}",
            type: "POST",
            data: { step: info.step, action: "step" },
            success: function(resp){
                console.log(resp);
            },
            error: function(resp){
                console.log("Something went wrong.");
            }
        });
        return true; //this will not prevent clicking and selecting steps
    });
    


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
    // var maxNumber = 1000;
    // var counter = $("#description").val().length;
    // maxNumber=maxNumber-counter;
    // $("#myDescriptionCharacters").text(maxNumber.toString()+" characters remaining");

    // $("#description").on("input", function(){
    //     var maxNumber = 1000;
    //     var $this = $(this);
    //     if($this.val()!=""){
    //         var counter = $this.val().length;
    //         maxNumber=maxNumber-counter;
    //         $("#myDescriptionCharacters").text(maxNumber.toString()+" characters remaining");
    //     }else{
    //         $("#myDescriptionCharacters").text(maxNumber.toString()+" characters remaining");
    //     }
    // });


    @if(!empty($property))
        @if($property->type!='hostel')
            $("#formContainAmenities #bedrooms").val("{{ empty($property->propertyContain->bedroom)? '':$property->propertyContain->bedroom }}");
            $("#formContainAmenities #beds").val("{{ empty($property->propertyContain->no_bed)? '0':$property->propertyContain->no_bed }}");
            $("#formContainAmenities #kitchen").val("{{ empty($property->propertyContain->kitchen)? '0':$property->propertyContain->kitchen }}");
            $("#formContainAmenities #baths").val("{{ empty($property->propertyContain->bathroom)? '0':$property->propertyContain->bathroom }}");
            $("#formContainAmenities #toilet").val("{{ empty($property->propertyContain->toilet)? '0':$property->propertyContain->toilet }}");
            $("#formContainAmenities #furnish").val("{{ empty($property->propertyContain->furnish)? '':strtolower(str_replace(' ','_',$property->propertyContain->furnish)) }}");
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

            $("#formSchedule input[name='auction_venue']").val("{{ empty($property->propertyAuctionSchedule->auction_venue)? '':$property->propertyAuctionSchedule->auction_venue }}");
            $("#formSchedule input[name='auction_date']").val("{{ empty($property->propertyAuctionSchedule->auction_date)? 'month':$property->propertyAuctionSchedule->auction_date }}");
            $("#formSchedule input[name='auction_time']").val("{{ empty($property->propertyAuctionSchedule->auction_time)? 'month':$property->propertyAuctionSchedule->auction_time }}");
          @endif
        // $("#formLocationLandmark input[name='digital_address']").val("{{ empty($property->propertyLocation->digital_address)? '':$property->propertyLocation->digital_address }}");
        $("#formLocationLandmark input[name='location']").val("{{ empty($property->propertyLocation->location)? '':$property->propertyLocation->location }}");
        $("#formDescriptions #gate").val("{{ empty($property->propertyDescription->gate)? '0':$property->propertyDescription->gate }}");
    @endif



    function isNumber(evt) {
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            return false;
        }
        return true;
    }


    $(document).ready(function () {
        if($("#formDescriptions textarea[name='description']").length > 0){
            tinymce.init({
                selector: "textarea#description",
                theme: "modern",
                height:200,
                plugins: [
                    "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                    "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                    "save table contextmenu directionality emoticons template paste textcolor"
                ],
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
                style_formats: [
                    {title: 'Bold text', inline: 'b'},
                    {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
                    {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
                    {title: 'Example 1', inline: 'span', classes: 'example1'},
                    {title: 'Example 2', inline: 'span', classes: 'example2'},
                    {title: 'Table styles'},
                    {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
                ]
            });
            
            
        }
    });
</script>
@endsection