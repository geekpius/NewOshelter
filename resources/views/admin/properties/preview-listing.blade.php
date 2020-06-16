@extends('admin.layouts.app')

@section('styles')
<link href="{{ asset('assets/plugins/filter/magnific-popup.css') }}" rel="stylesheet" type="text/css" />
<style>
    .big-property-image-size{
        width: 100%;
        height: 360px;
        border-radius: 0.5%;
    }
    .small-property-image-size{
        width: 100%;
        height: 165px;
        border-radius: 0.5%;
    }
    .img-thumbnail{
        padding: 0px !important;
    }
    .img-right{
        float: right;
        clear: left;
    }
    .img-left{
        float: left;
        clear: right;
    }
    .remove-on-every-screen{
        display: none;
    }

    @media (max-width: 450px){
        .big-property-image-size{
            width: 100%;
            height: 200px !important;
            border-radius: 0.5%;
        }
        .remove-on-small{
            display: none !important;
        }
    }

    @media (max-width: 880px){
        .big-property-image-size{
            width: 100%;
            height: 200px !important;
            border-radius: 0.5%;
        }
        .small-property-image-size{
            width: 100%;
            height: 90px !important;
            border-radius: 0.5%;
        }
    }
    @media (max-width: 1024px){
        .big-property-image-size{
            width: 100%;
            height: 260px;
            border-radius: 0.5%;
        }
        .small-property-image-size{
            width: 100%;
            height: 120px;
            border-radius: 0.5%;
        }
    }
    @media (min-width: 2560px){
        .big-property-image-size{
            width: 100%;
            height: 700px;
            border-radius: 0.5%;
        }
        .small-property-image-size{
            width: 100%;
            height: 330px;
            border-radius: 0.5%;
        }
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
                        <li class="breadcrumb-item active">Preview Mode</li>
                    </ol>
                </div>
                <h4 class="page-title">Preview Mode</h4>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
    <!-- end page title end breadcrumb -->
   
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="text-center">
                        <a href="javascript:void(0);" onclick="window.location='{{ route('property.create', $property->id) }}';" class="mr-2 text-pink"><i class="fa fa-heart"></i> Save</a>
                        <a href="#shareModal" data-toggle="modal" data-backdrop="static" class="ml-2 text-pink"><i class="fa fa-share"></i> Share</a>
                    </div>
                    <div class="row">
                        <div class="col-sm-1"></div>
                        <div class="col-sm-10"><hr>
                            <div class="row">
                                 <!-- Images -->
                                <div class="col-lg-7 col-md-6 col-sm-6 p-0 nf-item img-thumbnail">
                                    <div class="item-box">
                                        <a class="cbox-gallary1 mfp-image big-property-image-size" href="{{ asset('assets/images/properties/'.$image->image) }}" title="{{ $image->caption }}">
                                            <img class="item-container big-property-image-size" src="{{ asset('assets/images/properties/'.$image->image) }}" alt="property_photo1" />
                                            <div class="item-mask">
                                                <div class="item-caption">
                                                    <h5 class="text-white">{{ $image->caption }}</h5>
                                                </div>
                                            </div>
                                        </a>
                                    </div><!--end item-box-->
                                </div><!--end col-->

                                <div class="col-lg-5 col-sm-6 col-md-6">
                                    <div class="row pt-2">
                                        @php $i = 1; $j=0; @endphp
                                        @foreach ($images as $item)
                                        @php $i++; $j++; @endphp
                                        @if($j>4)
                                            <div class="col-lg-6 col-md-6 col-sm-6 p-0 nf-item img-thumbnail remove-on-every-screen">
                                                <div class="item-box">
                                                    <a class="cbox-gallary1 mfp-image small-property-image-size" href="{{ asset('assets/images/properties/'.$item->image) }}" title="{{ $item->caption }}">
                                                        <img class="item-container small-property-image-size" src="{{ asset('assets/images/properties/'.$item->image) }}" alt="property_photo{{$i}}" />
                                                        <div class="item-mask">
                                                            <div class="item-caption">
                                                                <h5 class="text-light">{{ $item->caption }}</h5>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div><!--end item-box-->
                                            </div><!--end col-->
                                        @else
                                            <div class="col-lg-6 col-md-6 col-sm-6 p-0 nf-item img-thumbnail remove-on-small">
                                                <div class="item-box">
                                                    <a class="cbox-gallary1 mfp-image small-property-image-size" href="{{ asset('assets/images/properties/'.$item->image) }}" title="{{ $item->caption }}">
                                                        <img class="item-container small-property-image-size" src="{{ asset('assets/images/properties/'.$item->image) }}" alt="property_photo{{$i}}" />
                                                        <div class="item-mask">
                                                            <div class="item-caption">
                                                                <h5 class="text-light">{{ $item->caption }}</h5>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div><!--end item-box-->
                                            </div><!--end col-->
                                        @endif
                                        @endforeach 
                                    </div>
                                </div>
                            </div>
                        </div>                      
                        <div class="col-sm-1"></div>

                        <div class="col-sm-1"></div>
                        <div class="col-sm-10"><hr></div>
                        <div class="col-sm-1"></div>

                        <div class="col-lg-2 col-sm-2"></div>
                        <div class="col-lg-8 col-sm-8">
                            <!-- Title and Location -->
                            <div class="img-right mr-lg-5 mr-sm-5 text-center">
                                <img src="{{ (empty($property->user->image))? asset('assets/images/user.jpg'):asset('assets/images/users/'.$property->user->image) }}" alt="{{ current(explode(' ',$property->user->name)) }}"  class="thumb-lg rounded-circle" /> 
                                <p>{{ current(explode(' ',$property->user->name)) }}</p>
                            </div>
                            <h3>
                                <b>{{ $property->title }}</b>
                                @if (!$property->done_step) 
                                (<a href="{{ route('property.edit', $property->id) }}" class="text-primary"><i class="fa fa-edit"></i> Edit Listing</a>)
                                @endif
                            </h3>
                            <p><i class="fa fa-map-marker-alt text-success"></i> {{  $property->propertyLocation->location  }} - {{ $property->propertyLocation->digital_address }} </p>
                            
                            <hr>
                            <!-- Contained amenities -->
                            <p><i class="fa fa-home text-success"></i> <b>{{  ucwords(str_replace('_',' ',$property->type))  }} in {{  strtolower($property->base)  }} </b> </p>   
                            @if ($property->type=='hostel')
                                @if (count($property->propertyHostelBlockRooms))
                                    <div style="position: relative;  height: 460px; overflow-y:scroll; overflow-x:hidden;">
                                        <div class="activity">
                                        @foreach ($property->propertyHostelBlockRooms as $block)
                                            <div class="parentDiv">
                                                <i class="mdi mdi-checkbox-marked-circle-outline icon-success"></i>
                                                <div class="time-item">
                                                    <div class="item-info">
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <h6 class="m-0">{{ $block->propertyHostelBlock->block_name }}</h6>
                                                        </div>
                                                        <p class="mt-3">
                                                            <span class="text-primary font-13">{{ $block->block_room_type }} ({{ $block->gender }})</span> with {{ $block->block_no_room }} rooms of {{ ($block->person_per_room==1)? $block->person_per_room.' person':$block->person_per_room.' persons' }} per room. 
                                                        </p>
                                                        <div>
                                                            <span class="badge badge-soft-primary">{{$block->bed_person}} {{ $block->bed_person==1? 'bed':'beds' }} per room </span>                                                  
                                                            @if($block->kitchen==0)
                                                            <span class="badge badge-soft-primary">No kitchen</span>                                                
                                                            @elseif($block->kitchen==1)
                                                            <span class="badge badge-soft-primary">Has a private kitchen</span> 
                                                            @else
                                                            <span class="badge badge-soft-primary">Has a shared kitchen</span> 
                                                            @endif        
                                                            <span class="badge badge-soft-primary">{{ $block->bathroom }} {{ ($block->bath_private)? 'private':'shared' }} {{ ($block->bathroom==1)? 'bathroom':'bathrooms' }}</span>                                          
                                                            <span class="badge badge-soft-primary">{{ $block->toilet }} {{ ($block->toilet_private)? 'private':'shared' }} {{ ($block->toilet==1)? 'toilet':'toilets' }}</span>                              
                                                        </div>
                                                        <div class="mt-3">
                                                            <h6><strong>Amenities</strong></h6>
                                                            @if(count($block->hostelRoomAmenities))
                                                                @foreach ($block->hostelRoomAmenities as $amenity)
                                                                <span class="mr-4 font-12"><span class="fa fa-check-square text-success"></span>  {{ $amenity->name }}</span> 
                                                                @endforeach   
                                                            @else
                                                                <p class="text-danger">No amenity reported</p>
                                                            @endif  
                                                        </div>    
                                                        <hr>                                                    
                                                    </div>
                                                </div> 
                                            </div>   
                                        @endforeach                                                                                                                                
                                        </div>
                                    </div>        
                                @endif  
                            @else
                                <span>{{ $property->propertyContain->bedroom }} {{ $property->propertyContain->bedroom==1? 'bedroom':'bedrooms' }} </span>
                                <span class="ml-3">{{ $property->propertyContain->no_bed }} {{ $property->propertyContain->no_bed==1? 'bed':'beds' }} per room</span>
                                @if ($property->propertyContain->kitchen==1)
                                <span class="ml-3">Private kitchen</span>
                                @elseif ($property->propertyContain->kitchen==2)
                                <span class="ml-3">Shared kitchen</span>
                                @else
                                <span class="ml-3">No kitchen</span>
                                @endif
                                <span class="ml-3">{{ $property->propertyContain->bathroom }} {{ $property->propertyContain->bath_private? "private":"shared" }} {{ $property->propertyContain->bathroom==1? 'bathroom':'bathrooms' }}</span>
                                <span class="ml-3">{{ $property->propertyContain->toilet }} {{ $property->propertyContain->toilet_private? "private":"shared" }} {{ $property->propertyContain->toilet==1? 'toilet':'toilets' }}</span>
                                
                            @endif 

                            <hr>
                            <p>
                                <b>Other notice</b><br>
                                @if ($property->propertyDescription->gate)
                                Property is located in a gated community.  
                                @else
                                Property is not located in a gated community.  
                                @endif
                            </p>
                            <hr>
                            @if ($property->type!='hostel')
                                <!-- Amenities -->
                                <h5><b>Amenities</b></h5>
                                @if (count($property->propertyAmenities))
                                    <div class="row">
                                        @foreach ($property->propertyAmenities as $amen)
                                        <div class="col-sm-6">
                                            <p><i class="fa fa-check-square text-success" style="font-size: 12px"></i> {{ $amen->name }}</p>
                                        </div>                                
                                        @endforeach
                                    </div>
                                @else
                                    <p><i class="fa fa-dot-circle" style="font-size: 9px"></i> No amenities reported on property.</p>
                                @endif
                                <hr>
                            @endif
                            <!-- Vacancies -->
                            <h5><b>Availability</b></h5>
                            @if ($property->type=='hostel')
                                <p><i class="fa fa-dot-circle" style="font-size: 9px"></i> You will get to know your room mate when booking is 
                                    confirmed. Click on vacant block room type to book.
                                </p>
                                @if (count($property->propertyHostelBlockRooms))
                                    @foreach ($property->propertyHostelBlockRooms as $block)
                                    <hr>
                                        <div class="parentDiv mb-3">
                                            <h6><i class="fa fa-home text-success font-12"></i> {{  $block->propertyHostelBlock->block_name  }} | <span class="font-12 text-primary">{{  $block->block_room_type  }} ({{ $block->gender }})</span> - <b>{{ $block->propertyHostelPrice->currency }} {{ number_format($block->propertyHostelPrice->property_price,2) }}</b>  <small><b>/{{ $block->propertyHostelPrice->price_calendar }}</b></small></h6>
                                            @foreach ($block->hostelBlockRoomNumbers as $item)  
                                                <span class="badge {{ ($item->full)? 'badge-danger':'badge-success' }} mb-1 mr-1">
                                                    <span>Room {{ $item->room_no }} {{ ($item->full)?'Not Available':'Available' }}</span><br><br>
                                                    <span>({{ ($item->person_per_room-$item->occupant)}} {{ ($item->person_per_room-$item->occupant)>1? 'spaces':'space' }})</span>
                                                </span>                                                                                      
                                            @endforeach
                                        </div> 
                                    @endforeach       
                                @endif  
                            @else
                                <div class="row">
                                    @if ($property->type_status=='rent')
                                        <div class="col-sm-12 col-lg-6">
                                            <div class="pro-order-box">
                                                <h4 class="header-title {{ $property->vacant? 'text-primary':'text-danger' }}">{{ $property->vacant? 'Available, ready for renting':'Rented, too late' }}</h4>
                                                <p class=""><i class="fa fa-check text-success" style="font-size:9px"></i>
                                                    @if ($property->propertyPrice->payment_duration==6)
                                                        <span>6 months advance payment</span>
                                                    @elseif ($property->propertyPrice->payment_duration==12)
                                                        <span>1 year advance payment</span>
                                                    @elseif ($property->propertyPrice->payment_duration==24)
                                                        <span>2 years advance payment</span>
                                                    @endif
                                                    <br>
                                                    <i class="fa fa-check text-success" style="font-size:9px"></i>
                                                    <span>
                                                        <b>{{ $property->propertyPrice->currency }} {{ number_format($property->propertyPrice->property_price,2) }}</b>
                                                        /{{ $property->propertyPrice->price_calendar }}
                                                    </span><br>
                                                    <i class="fa fa-check text-success" style="font-size:9px"></i>
                                                    <span>{{ $property->adult+$property->children+$property->infant }} Guests</span><br>
                                                    <i class="fa fa-check text-success" style="font-size:9px"></i>
                                                    <span>{{ $property->adult==1? $property->adult.' Adult':$property->adult.' Adults' }}</span> |
                                                    <span>
                                                    @if($property->children==0)
                                                    No Children
                                                    @elseif($property->children==1)
                                                    {{ $property->children.' Child' }}
                                                    @else
                                                    {{ $property->children.' Children' }}
                                                    @endif
                                                    </span> |
                                                    <span>
                                                        @if($property->infant==0)
                                                        No Infant
                                                        @elseif($property->infant==1)
                                                        {{ $property->infant.' Infant' }}
                                                        @else
                                                        {{ $property->infant.' Infants' }}
                                                        @endif
                                                    </span>
                                                </p>
                                            </div>
                                        </div>
                                    @elseif ($property->type_status=='short_stay')
                                        <div class="col-sm-12 col-lg-6">
                                            <div class="pro-order-box">
                                                <h4 class="header-title {{ $property->vacant? 'text-primary':'text-danger' }}">{{ $property->vacant? 'Available, ready for booking':'Booked, too late' }}</h4>
                                                <p class=""><i class="fa fa-check text-success" style="font-size:9px"></i>
                                                    <span>
                                                        @if ($property->propertyPrice->minimum_stay==3)
                                                            3 days minimum stay
                                                        @elseif ($property->propertyPrice->minimum_stay==4)
                                                            4 days minimum stay
                                                        @elseif ($property->propertyPrice->minimum_stay==5)
                                                            5 days minimum stay
                                                        @elseif ($property->propertyPrice->minimum_stay==6)
                                                            6 days minimum stay
                                                        @elseif ($property->propertyPrice->minimum_stay==7)
                                                            1 week minimum stay
                                                        @endif
                                                    </span><br>
                                                    <i class="fa fa-check text-success" style="font-size:9px"></i>
                                                    <span>
                                                        @if ($property->propertyPrice->maximum_stay==1)
                                                            1 month maximum stay
                                                        @elseif ($property->propertyPrice->maximum_stay==1.1)
                                                            1 month, 1 week maximum stay
                                                        @elseif ($property->propertyPrice->maximum_stay==1.2)
                                                            1 month, 2 weeks maximum stay
                                                        @elseif ($property->propertyPrice->maximum_stay==1.3)
                                                            1 month, 3 weeks maximum stay
                                                        @elseif ($property->propertyPrice->maximum_stay==2)
                                                            2 months maximum stay
                                                        @elseif ($property->propertyPrice->maximum_stay==2.1)
                                                            2 months, 1 week maximum stay
                                                        @elseif ($property->propertyPrice->maximum_stay==2.2)
                                                            2 months, 2 weeks maximum stay
                                                        @elseif ($property->propertyPrice->maximum_stay==2.3)
                                                            2 months, 3 weeks maximum stay
                                                        @elseif ($property->propertyPrice->maximum_stay==3)
                                                            3 months maximum stay
                                                        @endif
                                                    </span><br>
                                                    <i class="fa fa-check text-success" style="font-size:9px"></i>
                                                    <span>
                                                        <b>{{ $property->propertyPrice->currency }} {{ number_format($property->propertyPrice->property_price,2) }}</b>
                                                        /{{ $property->propertyPrice->price_calendar }}
                                                    </span><br>
                                                    <i class="fa fa-check text-success" style="font-size:9px"></i>
                                                    <span>{{ $property->adult+$property->children+$property->infant }} Guests</span><br>
                                                    <i class="fa fa-check text-success" style="font-size:9px"></i>
                                                    <span>{{ $property->adult==1? $property->adult.' Adult':$property->adult.' Adults' }}</span> |
                                                    <span>
                                                    @if($property->children==0)
                                                    No Children
                                                    @elseif($property->children==1)
                                                    {{ $property->children.' Child' }}
                                                    @else
                                                    {{ $property->children.' Children' }}
                                                    @endif
                                                    </span> |
                                                    <span>
                                                        @if($property->infant==0)
                                                        No Infant
                                                        @elseif($property->infant==1)
                                                        {{ $property->infant.' Infant' }}
                                                        @else
                                                        {{ $property->infant.' Infants' }}
                                                        @endif
                                                    </span>
                                                </p>
                                            </div>
                                        </div>
                                    @elseif ($property->type_status=='sell')
                                        <div class="col-sm-12 col-lg-6">
                                            <div class="pro-order-box">
                                                <i class="fa fa-user-circle text-primary"></i>
                                                <h4 class="header-title">{{ $property->vacant? 'Available for selling':'Sold, too late' }}</h4>
                                                <p class="">
                                                    <i class="fa fa-check text-success" style="font-size:9px"></i>
                                                    <span>
                                                        <b>{{ $property->propertyPrice->currency }} {{ number_format($property->propertyPrice->property_price,2) }}</b> 
                                                    </span>
                                                    <br>
                                                    <i class="fa {{ $property->propertyPrice->negotiable? 'fa-check text-success':'fa-times text-danger' }}" style="font-size:9px"></i>
                                                    <span>
                                                        <b>{{ $property->propertyPrice->negotiable? 'Negotiable':'Non Negotiable' }}
                                                    </span>
                                                </p>
                                            </div>
                                        </div>
                                    @else
                                        <div class="col-sm-12 col-lg-6">
                                            <div class="pro-order-box">
                                                <i class="fa fa-user-circle text-primary"></i>
                                                <h4 class="header-title">{{ $property->vacant? 'Available for auctioning':'Auctioned, highest bidder confirmed' }}</h4>
                                                <p class="">
                                                    <span>Bidding initial price</span>
                                                    <br>
                                                    <i class="fa fa-check text-success" style="font-size:9px"></i>
                                                    <span>
                                                        <b>{{ $property->propertyPrice->currency }} {{ number_format($property->propertyPrice->property_price,2) }}</b> 
                                                    </span>
                                                </p>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            @endif 

                            <hr>
                            <!-- Reviews -->
                            <h5><b>Reviews</b></h5>
                            @if (count($property->propertyReviews))
                                @php
                                    $accuracyStar = \App\PropertyModel\PropertyReview::whereProperty_id($property->id)->sum('accuracy_star')/$property->propertyReviews->count();
                                    $locationStar = \App\PropertyModel\PropertyReview::whereProperty_id($property->id)->sum('location_star')/$property->propertyReviews->count();
                                    $securityStar = \App\PropertyModel\PropertyReview::whereProperty_id($property->id)->sum('security_star')/$property->propertyReviews->count();
                                    $valueStar = \App\PropertyModel\PropertyReview::whereProperty_id($property->id)->sum('value_star')/$property->propertyReviews->count();
                                    $commStar = \App\PropertyModel\PropertyReview::whereProperty_id($property->id)->sum('comm_star')/$property->propertyReviews->count();
                                    $tidyStar = \App\PropertyModel\PropertyReview::whereProperty_id($property->id)->sum('tidy_star')/$property->propertyReviews->count();
                                    $sumReviews = $accuracyStar+$locationStar+$securityStar+$valueStar+$commStar+$tidyStar;
                                @endphp
                                <div>
                                    <span><i class="fa fa-star text-warning"></i> <b>{{ number_format($sumReviews/6,2) }}</b></span>
                                    <span class="ml-5"><i class="fa fa-eye text-primary"></i> <b>{{ $property->propertyReviews->count() }} Reviews</b></span>
                                    <hr>
                                    <table class="table table-responsive">
                                        <tr>
                                            <td class="no-border"><i class="fa fa-thumbs-up text-primary"></i> <b>Accuracy</b></td>
                                            <td class="no-border" width="200">
                                                {{-- <small class="float-right ml-2 pt-1 font-10">92%</small>
                                                <div class="progress mt-2" style="height:5px;">
                                                    <div class="progress-bar bg-secondary" role="progressbar" style="width: 92%;" aria-valuenow="92" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div> --}}

                                                <div class="progress" style="height: 3px;">
                                                    <div class="progress-bar bg-warning" role="progressbar" style="width: {{ round(($accuracyStar/5)*100,1) }}%;"></div>
                                                </div>
                                            </td>
                                            <td class="no-border" style="padding-left:0px !important">{{ number_format($accuracyStar,1) }}</td>
                                            <td class="no-border"><i class="fa fa-map-marked text-primary"></i> <b>Location</b></td>
                                            <td class="no-border" width="200">
                                                <div class="progress" style="height: 3px;">
                                                    <div class="progress-bar bg-warning" role="progressbar" style="width: {{ round(($locationStar/5)*100,1) }}%;"></div>
                                                </div>
                                            </td>
                                            <td class="no-border" style="padding-left:0px !important">{{ number_format($locationStar,1) }}</td>
                                        </tr>
                                        <tr>
                                            <td class="no-border"><i class="mdi mdi-security text-primary"></i> <b>Security</b></td>
                                            <td class="no-border">
                                                <div class="progress" style="height: 3px;">
                                                    <div class="progress-bar bg-warning" role="progressbar" style="width: {{ round(($securityStar/5)*100,1) }}%;"></div>
                                                </div>
                                            </td>
                                            <td class="no-border" style="padding-left:0px !important">{{ number_format($securityStar,1) }}</td>
                                            <td class="no-border"><i class="mdi mdi-currency-usd text-primary"></i> <b>Value</b></td>
                                            <td class="no-border">
                                                <div class="progress" style="height: 3px;">
                                                    <div class="progress-bar bg-warning" role="progressbar" style="width: {{ round(($valueStar/5)*100,1) }}%;"></div>
                                                </div>
                                            </td>
                                            <td class="no-border" style="padding-left:0px !important">{{ number_format($valueStar,1) }}</td>
                                        </tr>
                                        <tr>
                                            <td class="no-border"><i class="mdi mdi-comment text-primary"></i> <b>Communication</b></td>
                                            <td class="no-border">
                                                <div class="progress" style="height: 3px;">
                                                    <div class="progress-bar bg-warning" role="progressbar" style="width: {{ round(($commStar/5)*100,1) }}%;"></div>
                                                </div>
                                            </td>
                                            <td class="no-border" style="padding-left:0px !important">{{ number_format($commStar,1) }}</td>
                                            <td class="no-border"><i class="fa fa-dumpster text-primary"></i> <b>Cleanliness</b></td>
                                            <td class="no-border">
                                                <div class="progress" style="height: 3px;">
                                                    <div class="progress-bar bg-warning" role="progressbar" style="width: {{ round(($tidyStar/5)*100,1) }}%;"></div>
                                                </div>
                                            </td>
                                            <td class="no-border" style="padding-left:0px !important">{{ number_format($tidyStar,1) }}</td>
                                        </tr>
                                    </table>
                                    @foreach ($property->propertyReviews as $review)
                                    <img src="{{ (empty($review->user->image))? asset('assets/images/tenants/user-4.jpg'):asset('assets/images/tenants/'.$review->user->image) }}" alt="{{ current(explode(' ',$review->user->name)) }}" width="60" height="60"  class="rounded-circle img-left mr-3" /> 
                                    <p>
                                        <b>{{ current(explode(' ',$review->user->name)) }}</b><br>
                                        {{ \Carbon\Carbon::parse($review->created_at)->format('F, Y') }}
                                    </p>
                                    <br>
                                    <p>
                                        {{ $review->comment }}
                                    </p>
                                    <hr>
                                    @endforeach
                                </div>
                                <div class="small">
                                    <nav aria-label="Page navigation example">
                                        <ul class="pagination">
                                            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                        </ul><!--end pagination-->
                                    </nav>
                                </div>
                            @else
                                <p><i class="fa fa-dot-circle" style="font-size: 9px"></i> No reviews yet</p>
                                <p>Give the star {{ current(explode(' ',$property->user->name)) }}'s property deserve</p> <hr>
                            @endif
                            <!-- Refund policy -->
                            <div class="mt-5">
                                <img src="{{ asset('assets/images/logo-sm.png') }}" alt="Logo" class="thumb-xs rounded-circle img-left mr-3" /> 
                                <p>We never rest because we care. OShelter is here to protect both interest. All rent, sell and auction is covered 
                                    by OShelter's <a href="javascript:void(0)" class="text-primary">Refund Policy</a>.
                                </p>
                            </div>

                            <hr>
                            <!-- Contact -->
                            <div class="img-right mr-lg-5 mr-sm-5 text-center">
                                <img src="{{ (empty($property->user->image))? asset('assets/images/user.jpg'):asset('assets/images/users/'.$property->user->image) }}" alt="{{ $property->user->membership }}" class="thumb-lg rounded-circle" /> 
                            </div>
                            <h4><b>Owned by {{ current(explode(' ',$property->user->name)) }}</b></h4>                           
                            <p>{{ empty($property->user->profile->city)? '':$property->user->profile->city }} - Joined {{ \Carbon\Carbon::parse($property->user->created_at)->format('F, Y') }}</p>                           
                            
                            @if (count($property->propertyReviews))
                                <span class="mr-5"><i class="fa fa-star text-warning"></i> <b>Overall Reviews</b></span>
                            @endif
                            <span><i class="fa fa-check-circle {{ Auth::user()->verify_email? 'text-success':'text-danger' }}"></i> <b>{{ Auth::user()->verify_email? 'Verified':'Not Verified' }}</b></span>
                             <br>   <br> 
                            <button type="button" class="btn btn-primary btn-sm"><i class="fa fa-envelope"></i> Contact Owner</button>     
                            <hr>
                            <div>
                                <p><b>Communication always happens on OShelter's platform.</b> For the protection of your payments, never make  
                                payments outside OShelter's website and app.</p>    
                            </div>     

                            <hr>
                            <!-- The descriptions and directions -->
                            <h5><b>The neighbourhood and directions</b></h5>  
                            <p>
                                {{ $property->propertyDescription->description }}
                            </p> 
                            <p>
                                {{ $property->propertyDescription->neighbourhood }}
                            </p>    
                            <div class="card mt-4">
                                <div class="card-body">        
                                    <h6 class="mt-0">{{ current(explode(' ',$property->user->name)) }}'s property is located @ {{ $property->propertyLocation->location }}</h6>     
                                    <div id="gmaps-markers" class="gmaps"></div>
                                </div><!--end card-body-->
                            </div>                    
                            <p><i class="fa fa-dot-circle" style="font-size: 9px"></i>  
                                Directions are given out to guest after booking is confirmed.
                            </p>                           
                            <hr>     
                            <h5><b>Cancellation {{ $property->type_status=='rent'? 'and Eviction':'' }}</b></h5>  
                            <p>
                                <i class="fa fa-minus-circle" style="font-size: 9px"></i> 
                                Cancellation after 48 hours, you will get full refund minus service fee.
                            </p>       
                            <p>
                                 
                            </p>  
                            @if($property->type_status=='rent')   
                                <p>
                                    <i class="fa fa-minus-circle" style="font-size: 9px"></i> 
                                    Eviction notice will be sent to tenants 3 months before time. Tenants will wish to extend or evict.
                                </p>
                            @elseif($property->type_status=='short_stay')   
                                <p>
                                    <i class="fa fa-minus-circle" style="font-size: 9px"></i> 
                                    Eviction notice will be sent to guest 3 days and 1 day before time.
                                </p>
                            @endif         
      
                            @if ($property->type_status=='rent')
                                <hr>
                                <!-- Property rules -->
                                <h5><b>Property Rules</b></h5>
                                @if (count($property->propertyRules))
                                <div class="row">
                                    @foreach ($property->propertyRules as $rule)
                                    <div class="col-sm-6">
                                        <p><i class="fa fa-check-square text-success" style="font-size: 12px"></i> {{ $rule->rule }}</p>
                                    </div>                                
                                    @endforeach
                                </div>
                                @else
                                    <p>No rules reported on this property.</p>
                                @endif
                                    
                                @if (count($property->propertyOwnRules))                            
                                <h6><b>Other Rules</b></h6>
                                <div class="row">
                                    @foreach ($property->propertyOwnRules as $rule)
                                    <div class="col-sm-6">
                                        <p><i class="fa fa-check-square text-success" style="font-size: 12px"></i> {{ $rule->rule }}</p>
                                    </div>                                
                                    @endforeach
                                </div>
                                @endif
                            @endif
                            
                            <hr>
                        </div><!-- end col -->
                    </div>
                </div><!--end card-body-->
            </div><!--end card-->
        </div><!--end col-->
    </div> 

     <!-- share modal -->
     <div id="shareModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="shareModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="shareModalLabel">Share with</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body pl-5">
                    <p>
                        <a href="javascript:void(0);" class="text-primary"><i class="mdi mdi-facebook-box"></i> Facebook</a>
                    </p>
                    <p>
                        <a href="javascript:void(0);" class="text-primary"><i class="mdi mdi-twitter-box"></i> Twitter</a>
                    </p>
                    <p>
                        <a href="javascript:void(0);" class="text-primary"><i class="mdi mdi-facebook-messenger"></i> Messenger</a>
                    </p>
                    <p>
                        <a href="javascript:void(0);" class="text-success"><i class="mdi mdi-whatsapp"></i> WhatsApp</a>
                    </p>
                    <p>
                        <a href="javascript:void(0);" class="text-primary"><i class="mdi mdi-telegram"></i> Telegram</a>
                    </p>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->  

</div><!-- container -->

@endsection

@section('scripts')
<script src="{{ asset('assets/plugins/filter/jquery.magnific-popup.min.js') }}"></script>
<script>
$('.mfp-image').magnificPopup({
  type: 'image',
  closeOnContentClick: true,
  mainClass: 'mfp-fade',
  gallery: {
      enabled: true,
      navigateByImgClick: true,
      preload: [0, 1]
          // Will preload 0 - before current, and 1 after the current image 
  }
});

</script>
@endsection