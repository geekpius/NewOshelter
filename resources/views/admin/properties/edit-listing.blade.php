@extends('admin.layouts.app')

@section('styles')
<style>
.strike-through{
    text-decoration: line-through !important;
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
                        <li class="breadcrumb-item active">Edit Listing</li>
                    </ol>
                </div>
                <h4 class="page-title">Edit Listing</h4>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
    <!-- end page title end breadcrumb -->
   
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                   
                    <div class="row">
                        <div class="col-lg-1"></div>
                        <div class="col-lg-5">
                            <h4>Want To Edit {{ $property->title }}?</h4>
                            <form class="mt-4" id="formPropertyType" method="POST" action="{{ route('property.update', $property->id) }}">
                                @csrf
                                <input type="hidden" name="step" value="0" readonly>
                                <div class="form-group validate">
                                    <label for="">Choose your base property</label>
                                    <select name="base_property" class="form-control" id="base_property">
                                        <option value="house">House</option>
                                        <option value="apartment">Apartment</option>
                                        <option value="building">Building</option>
                                        <option value="storey_building">Storey Building</option>
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
                                    <input type="text" name="property_title" class="form-control" placeholder="eg: Single room self contain">
                                    <span class="text-danger small mySpan" role="alert"></span>
                                </div>
                                <div class="form-group validate">
                                    <label for="">What do you want to do with your property?</label>
                                    <select name="property_type_status" class="form-control" id="property_type_status">   
                                        <option value="rent">I want to rent out</option>     
                                        <option value="short_stay">For short stay</option>                                   
                                        <!-- <option value="sell">I want to sell</option>
                                        <option value="auction">I want to auction</option>-->
                                    </select>
                                    <span class="text-danger small mySpan" role="alert"></span>
                                </div>

                                <div id="myGuests">
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
                                    <button type="submit" class="btn btnMove btn-gradient-primary btn-sm">
                                        <i class="fa fa-arrow-right"></i> 
                                        Edit Your Listing Portfolio
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-6">
                            <p class="mt-4 ml-5">
                                <i class="fa fa-square text-pink" style="font-size:10px"></i>
                                Make sure your new editting is accurate and follow the listing pattern.
                            </p>
                            <p class="mt-4 ml-5">
                                <i class="fa fa-square text-pink" style="font-size:10px"></i>
                                All neccessary information is provided in order to boost your listing.
                            </p>
                        </div>
                    </div><!-- end row --> 


                </div><!--end card-body-->
            </div><!--end card-->
        </div><!--end col-->
    </div> 
        
</div><!-- container -->

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
</script>
<script src="{{ asset('assets/pages/property-edit.js') }}"></script>
@endsection