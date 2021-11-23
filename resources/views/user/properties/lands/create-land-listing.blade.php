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
                                    $progress=15;
                                }elseif($property->step==2){
                                    $progress=30;
                                }elseif($property->step==3){
                                    $progress=45;
                                }elseif($property->step==4){
                                    $progress=60;
                                }elseif($property->step==5){
                                    $progress=80;
                                }
                                elseif($property->step==6){
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
                                $proTypeStatus = 'buying';
                                $sinTypeStatus = 'sale';
                                $guest = 'buyer';
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
                                            <span class="title text-primary"><small>Location</small></span>
                                        </li>

                                        <li data-step="3">
                                            <span class="step">3</span>
                                            <span class="title text-primary"><small>Photos</small></span>
                                        </li>

                                        <li data-step="4">
                                            <span class="step">4</span>
                                            <span class="title text-primary"><small>Descriptions</small></span>
                                        </li>

                                        <li data-step="5">
                                            <span class="step">5</span>
                                            <span class="title text-primary"><small>Pricing</small></span>
                                        </li>
                                        <li data-step="6">
                                            <span class="step">6</span>
                                            <span class="title text-primary"><small>Ready to Publish</small></span>
                                        </li>
                                    </ul>
                                </div>

                                <div class="step-content pos-rel">
                                    <div class="step-pane active" data-step="1">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h4>Info about your land</h4>
                                                <form class="mt-4" id="formContainAmenities" method="POST" action="{{ route("property.store.land") }}">
                                                    @csrf
                                                    <input type="hidden" name="property_id" value="{{ $property->id }}" readonly>
                                                    <input type="hidden" name="step" value="1" readonly>
                                                    <div class="form-group mt-4 validate">
                                                       <div class="row">
                                                           <div class="col-lg-10">
                                                               <label for="">What is the whole area size?</label>
                                                               <input type="text" name="area_size" onkeypress="return isNumber(event)" placeholder="Enter area size eg: 400" class="form-control">
                                                               <span class="text-danger small mySpan" role="alert"></span>
                                                           </div>
                                                           <div class="col-lg-2">
                                                               <div style="padding-top: 10%" class="mt-4">m<sup>2</sup></div>
                                                           </div>
                                                       </div>
                                                    </div>

                                                    <div class="form-group mt-4 validate">
                                                        <label for="">Plot dimension?</label>
                                                        <input type="text" name="plot_size" placeholder="Enter plot dimension eg: 50ft x 100ft" class="form-control">
                                                        <span class="text-danger small mySpan" role="alert"></span>
                                                    </div>

                                                </form>
                                            </div>
                                        </div><!-- end row -->
                                    </div><!-- end step one -->

                                    <div class="step-pane" data-step="2">
                                        <div class="row">
                                            <div class="col-lg-5">
                                                <h4>Provide your property location</h4>
                                                <form class="mt-4" id="formLocationLandmark" method="POST" action="{{ route('property.store.land') }}">
                                                    @csrf
                                                    <input type="hidden" name="step" value="2" readonly>
                                                    <input type="hidden" name="property_id" value="{{ $property->id }}" readonly>
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
                                    </div><!-- end step two -->

                                    <div class="step-pane" data-step="3">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <h4>Lets take a tour on your property</h4>
                                                <p class="mb-4"><i class="fa fa-dot-circle" style="font-size:9px"></i> Property photo with captions will best help us with the tour.
                                                    <br>
                                                    <i class="fa fa-dot-circle" style="font-size:9px"></i> You can upload maximum of 10 photos at a time.</p>
                                                <div class="">
                                                    <h5><i class="fa fa-lightbulb fa-lg text-pink"></i> Tips for adding a great photos of your property</h5>
                                                    <p><i class="fa fa-dot-circle text-pink" style="font-size:9px"></i> Include all places of your property. eg: bedroom, kitchen, bathroom, etc.</p>
                                                    <p><i class="fa fa-dot-circle text-pink" style="font-size:9px"></i> Shoot photos in landscape mode in order to capture more spaces. Shoot from corners to add perspective.</p>
                                                    <p><i class="fa fa-dot-circle text-pink" style="font-size:9px"></i> Shoot photos in HD cameras to get more quality and professional photos for your properties.</p>
                                                    <p><i class="fa fa-dot-circle text-pink" style="font-size:9px"></i> Add property photos with size of 720x480 to best fit gallery. High photo quality will boost your property marketing.</p>
                                                </div>

                                                <form id="formPhotos" method="POST" action="{{ route('property.store') }}" class="mb-4 mt-5">
                                                    @csrf
                                                    <input type="hidden" name="step" value="3" readonly>
                                                    <input type="hidden" name="property_id" value="{{ $property->id }}" readonly>
                                                    <div class="form-group">
                                                        <label for=""><span class="text-primary">Enter a video embed link</span></label>
                                                        <input type="url" class="form-control" value="{{ $property->propertyVideo->video_url?? '' }}" name="video_url" pattern="https://.*" placeholder="eg: https://www.youtube.com/embed/VEN2H3wGOW4">
                                                        <span class="text-danger small mySpan" role="alert"></span>
                                                    </div>
                                                </form>

                                                <div id="propertyPhotoHolder" class="row" style="height:500px; border:dotted; border-radius:5px; overflow-y:scroll; overflow-x:hidden; background:url('{{ asset('assets/images/1.png') }}');background-position:center; background-repeat:no-repeat; background-size:cover;">

                                                </div>
                                                <button class="btn btn-primary mt-3" id="btnUpload" onclick="getFile();"><i class="fa fa-cloud-upload"></i> Add Photos
                                                    <div style='height: 0px;width:0px; overflow:hidden;'><input id="upfile" type="file" multiple name="photos[]" /></div>
                                                </button>
                                                <div class="mt-3">
                                                    <small><span id="uploadMsg" class="text-danger"></span></small>
                                                </div>
                                            </div>
                                        </div><!-- end row -->
                                    </div><!-- end step four -->

                                    <div class="step-pane" data-step="4">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h4>How does your property looks like?</h4>
                                                <form class="mt-4" id="formDescriptions" method="POST" action="{{ route('property.store.land') }}">
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

                                                </form>
                                            </div>
                                        </div><!-- end row -->
                                    </div><!-- end step six -->

                                    <div class="step-pane" data-step="5">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h4>Provide pricing for your buyers</h4>

                                                <form class="mt-4" id="formSchedule" method="POST" action="{{ route('property.store.land') }}" enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="hidden" name="step" value="5" readonly>
                                                    <input type="hidden" name="property_id" value="{{ $property->id }}" readonly>
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="form-group validate">
                                                                <label for="">Plot price</label>
                                                                <input type="tel" name="price" class="form-control" onkeypress="return isNumber(event)" placeholder="Enter the price of a plot">
                                                                <span class="text-danger small mySpan" role="alert"></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            @if (Auth::user()->userCurrency)
                                                                <div class="form-group">
                                                                    <label for="">Choosen currency</label>
                                                                    <p class="font-14">{{ Auth::user()->userCurrency->getCurrencyName() }}</p>
                                                                    <input type="hidden" name="currency" readonly value="{{ Auth::user()->userCurrency->currency }}">
                                                                </div>
                                                            @else
                                                                <div class="form-group validate">
                                                                    <label for="">Choosen currency</label>
                                                                    <select name="currency" class="form-control" id="currency">
                                                                        @foreach ($currencies as $currency)
                                                                            <option value="{{ $currency->symbol }}">{{ $currency->currency }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    <span class="text-danger small mySpan" role="alert"></span>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="row mt-2">
                                                        <div class="col-sm-12">
                                                            <div class="form-group validate">
                                                                <label for="">Is indenture inclusive?</label>
                                                                <div class="row mt-3">
                                                                    <div class="col-sm-4">
                                                                        <div class="custom-control custom-radio">
                                                                            <input type="radio" id="have_indenture" name="indenture" value="1" class="custom-control-input" @if(!empty($property)) @if(!empty($property->propertyLandDetail->have_indenture) && $property->propertyLandDetail->have_indenture) checked @endif  @endif>
                                                                            <label class="custom-control-label" for="have_indenture">Yes</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <div class="custom-control custom-radio">
                                                                            <input type="radio" id="no_indenture" name="indenture" value="0" class="custom-control-input" @if(!empty($property))  @if(!empty($property->propertyLandDetail->price)) @if(!$property->propertyLandDetail->have_indenture) checked @endif @endif  @endif>
                                                                            <label class="custom-control-label" for="no_indenture">No</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <span class="text-danger small mySpan IndentSapn" role="alert"></span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row mt-4">
                                                        <div class="col-sm-12">
                                                            <div class="form-group validate" id="indentureFile" style="display: none">
                                                                <label for="">Upload indenture image</label>
                                                                <input type="file" class="form-control" name="indenture_file" data-file="{{ empty($property->propertyLandDetail->indenture_file)? '' : $property->propertyLandDetail->indenture_file }}">
                                                                <span class="text-danger small mySpan" role="alert"></span>
                                                                @if(!empty($property->propertyLandDetail->indenture_file))
                                                                    <div class="alert alert-secondary border-0 mt-4" role="alert">
                                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                            <span aria-hidden="true">x</span>
                                                                        </button>
                                                                        You already have an indenture uploaded.
                                                                    </div>
                                                                @endif
                                                            </div>
                                                            <div class="form-group validate" id="indentureDisclaimer" style="display: none">
                                                                <h4 class="text-danger">Disclaimer!!!</h4>
                                                                <p>Kindly upload a picture of your property's indenture with this listing as that will boost your buyers trust and make your property sell in a short time.
                                                                    However, buyers who view your listing will be prompted by OShelter to be careful when dealing with properties without indenture.</p>
                                                            </div>

                                                            @include('includes/alerts')
                                                        </div>
                                                    </div>

                                                </form>

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
                                                                <div class="">
                                                                    <div class="text-center">
                                                                        <i class="fa fa-user text-success fa-5x"></i>
                                                                    </div>
                                                                    <hr>
                                                                    <p>
                                                                        <i class="fa fa-square text-pink" style="font-size:10px"></i>
                                                                        Every {{ $guest }} on OShelter must be qualified to buy your property
                                                                    </p>
                                                                    <p>
                                                                        <i class="fa fa-square text-pink" style="font-size:10px"></i>
                                                                        Every qualified {{ $guest }} must confirm their personal & contact info before they can buy your property.
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
                $('#formContainAmenities input').each(function() {
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
                document.getElementById("formPhotos").submit();
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
                $('#formSchedule input, #formSchedule select').each(function() {
                    var $this = $(this);

                    if(!$this.val()) {
                        valid = false;
                        $this.parents('.validate').find('.mySpan').text('The '+$this.attr('name').replace(/[\_]+/g, ' ')+' field is required');
                    }
                });

                @if(empty($property->propertyLandDetail->indenture_file))
                if($('#formSchedule #have_indenture').is(":checked")){
                    if(!$('#formSchedule input[name="indenture_file"]').val() || !$('#formSchedule input[name="price"]').val()){
                        valid = false;
                    }else{
                        valid = true;
                    }
                }else{
                    if($('#formSchedule input[name="price"]').val()){
                        valid = true;
                    }
                }
                @else
                if( $('#formSchedule input[name="indenture_file"]').data('file') !=''){
                    valid = true;
                }
                @endif


               if( $('#formSchedule input[name="indenture"]:checked').length == 0){
                   valid = false;
                   $('#formSchedule .IndentSapn').text('The indenture field is required');
               }

                if(valid){
                    $(".btn-next").html('<i class="fa fa-spin fa-spinner"></i> Stepping Next...').attr('disabled', true);
                    document.getElementById("formSchedule").submit();
                }
            }
            else if(info.step == 6){
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


    ///get photos
    function getFile(){
        document.getElementById("upfile").click();
    }

    ///uploading property images
    $("#upfile").on("change", function(){
        var $this = $(this);
        $("#uploadMsg").html('<i class="fa fa-spin fa-spinner"></i> Processing photos...');
        var form_data = new FormData();
        var totalfiles = document.getElementById('upfile').files.length;
        if(totalfiles>20){
            swal("Exceed", "You can not upload more than 30 photos.", "warning");
            document.getElementById("upfile").value = null;
            $("#uploadMsg").html('');
            return false;
        }
        else{
            var s=0; var e=0;
            for (var index = 0; index < totalfiles; index++) {
                var size = document.getElementById('upfile').files[index].size;
                var fileSize = Math.round((size / 1024));
                var selectedFile = document.getElementById('upfile').files[index].name;
                var ext = selectedFile.replace(/^.*\./, '');
                ext= ext.toLowerCase();
                if(fileSize>2048){
                    s+=1;
                }
                else if(ext!='jpg' && ext!='jpeg' && ext!='png'){
                    e+=1;
                }
                else{
                    form_data.append("photos[]", document.getElementById('upfile').files[index]);
                }
            }

            if(s>0){
                swal("File Size", s.toString()+" of your photos size is more than 2mb", "warning");
                document.getElementById("upfile").value = null;
                $("#uploadMsg").html('');
            }
            else if(e>0){
                swal("File Type", e.toString()+" unknown file types", "warning");
                document.getElementById("upfile").value = null;
                $("#uploadMsg").html('');
            }else{
                $("#uploadMsg").html('<i class="fa fa-spin fa-spinner"></i> Uploading...');
                $this.parents("#btnUpload").attr("disabled", true);
                $.ajax({
                    url: "{{ route('property.photos.submit', $property->id) }}",
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
                        $this.parents("#btnUpload").attr("disabled", false);
                    },
                    error: function(response){
                        console.log('Something went wrong with your request');
                        document.getElementById("upfile").value = null;
                        $("#uploadMsg").html('');
                        $this.parents("#btnUpload").attr("disabled", false);
                    }

                });
            }
        }
        return false;
    });

    //load all uploaded property photos
    $("#propertyPhotoHolder").load("{{ route('property.photos.show',$property->id) }}");


    function selectIndenture()
    {
        if($('#formSchedule #have_indenture').is(":checked")){
            $("#indentureFile").show('slow');
            $("#indentureDisclaimer").hide('slow');
        }

        if($('#formSchedule #no_indenture').is(":checked")){
            $("#indentureFile").hide('slow');
            $("#indentureDisclaimer").show('slow');
        }
    }

    selectIndenture();



    $('#formSchedule input:radio[name="indenture"]').change(function(){
        if($(this).is(":checked")){
            if($(this).val() == '1'){
                $("#indentureFile").show('slow');
                $("#indentureDisclaimer").hide('slow');
            }else{
                $("#indentureFile").hide('slow');
                $("#indentureDisclaimer").show('slow');
            }
        }
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




    @if(!empty($property))
        $("#formContainAmenities input[name='area_size']").val("{{ empty($property->propertyLandDetail->area_size)? '':$property->propertyLandDetail->area_size }}");
        $("#formContainAmenities  input[name='plot_size']").val("{{ empty($property->propertyLandDetail->area_size)? '':$property->propertyLandDetail->plot_size }}");

        $("#formSchedule input[name='price']").val("{{ empty($property->propertyLandDetail->price)? '':$property->propertyLandDetail->price }}");

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
