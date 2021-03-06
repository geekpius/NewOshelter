@extends('layouts.site')

@section('style')

@endsection
@section('content')
<div class="pxp-content pull-content-down">
    <div class="container">
        <h2>Edit Listing</h2>
        <p>
            <strong>{{ Auth::user()->name }},</strong> listings
        </p>
        <div class="pt-4">
            <div class="row">
                <div class="col-sm-8">
                    <h5>Want To Edit {{ $property->title }}?</h5>
                    <form class="mt-4" id="formPropertyType" method="POST" action="{{ route('property.update', $property->id) }}">
                        @csrf
                        <input type="hidden" name="step" value="0" readonly>
                        <div class="form-group validate">
                            <label for="">Choose your base property</label>
                            <select name="base_property" class="form-control" id="base_property">
                                <option value="house">House</option>
                                <option value="storey_building">Storey Building</option>
                                <option value="land">Land</option>
                            </select>
                            <span class="text-danger small mySpan" role="alert"></span>
                        </div>
                        <div class="form-group validate">
                            <label for="">Now choose your property type</label>
                            <select name="property_type" class="form-control" id="property_type">
                                @foreach ($property_types as $type)
                                <option class="{{ strtolower(str_replace(' ','_',$type->name))  }}" value="{{ strtolower(str_replace(' ','_',$type->name))  }}">{{ $type->name }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger small mySpan" role="alert"></span>
                        </div>
                        <div class="form-group validate">
                            <label for="">Property Title</label>
                            <input type="text" name="property_title" class="form-control" placeholder="eg: Ahodwo Homes, Royal Lodge Apartments, Airpot Residential Apartments">
                            <span class="text-danger small mySpan" role="alert"></span>
                        </div>
                        <div class="form-group validate">
                            <label for="">What do you want to do with your property?</label>
                            <select name="property_type_status" class="form-control" id="property_type_status">
                                <option value="rent">I want to rent out</option>
                                <option value="short_stay">For short stay</option>
                                <option value="sale">I want to sell</option>
                                <option value="auction">I want to auction</option>
                            </select>
                            <span class="text-danger small mySpan" role="alert"></span>
                        </div>

                        <div id="myGuests" style="display: none">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group validate">
                                        <label for="">Expected Guests</label>
                                        <input type="text" name="guest" id="guest" class="form-control" readonly placeholder="eg: Guests expecting">
                                        <span class="text-danger small mySpan" role="alert"></span>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">How many adult(12 years and above)</label>
                                        <select name="adult" id="adult" class="form-control">
                                            <option value="1">1 Adult</option>
                                            <option value="2">2 Adults</option>
                                            <option value="3">3 Adults</option>
                                            <option value="4">4 Adults</option>
                                            <option value="5">5 Adults</option>
                                            <option value="6">6 Adults</option>
                                            <option value="7">7 Adults</option>
                                            <option value="8">8 Adults</option>
                                            <option value="9">9 Adults</option>
                                            <option value="10">10 Adults</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">How many children(above 2 years)</label>
                                        <select name="children" id="children" class="form-control">
                                            <option value="0">No Children</option>
                                            <option value="1">1 Child</option>
                                            <option value="2">2 Children</option>
                                            <option value="3">3 Children</option>
                                            <option value="4">4 Children</option>
                                            <option value="5">5 Children</option>
                                            <option value="6">6 Children</option>
                                            <option value="7">7 Children</option>
                                            <option value="8">8 Children</option>
                                            <option value="9">9 Children</option>
                                            <option value="10">10 Children</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mt-3">
                            <button type="submit" class="btn btnMove btn-primary">
                                <i class="fa fa-arrow-right"></i>
                                Edit Your Listing Portfolio
                            </button>
                        </div>
                    </form>
                </div>
                <div class="col-sm-4">
                    <p class="mt-4 ml-5">
                        <i class="fa fa-square text-pink font-13"></i>
                        Make sure your new editting is accurate and follow the listing pattern.
                    </p>
                    <p class="mt-4 ml-5">
                        <i class="fa fa-square text-pink font-13"></i>
                        All neccessary information is provided in order to boost your listing.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
$('#base_property').val("{{ strtolower(str_replace(' ','_',$property->base)) }}");
$('#property_type').val("{{ $property->type }}");
$('#formPropertyType input[name="property_title"]').val("{{ $property->title }}");
$('#property_type_status').val("{{ $property->type_status }}");
@if($property->type!='hostel')
$('#adult').val("{{ $property->adult }}");
$('#children').val("{{ $property->children }}");
$('#infant').val("{{ $property->infant }}");
$("#property_type option:selected").siblings(".hostel").attr('disabled', 'disabled').addClass("text-danger");
@else
$("#property_type option:selected").siblings().attr('disabled', 'disabled').addClass("text-danger");
@endif

@if($property->isLandPropertyType())
$("#formPropertyType select[name='property_type']").val('land').attr('disabled', true);
$("#formPropertyType select[name='property_type_status']").val('sale').attr('disabled', true);
@endif
</script>
<script src="{{ asset('assets/pages/property/property-edit.js') }}"></script>
@endsection
