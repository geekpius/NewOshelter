@extends('layouts.site')

@section('style')
<link rel="stylesheet" href="{{ asset('assets/light/css/photoswipe.css') }}">
<link rel="stylesheet" href="{{ asset('assets/light/css/default-skin/default-skin.css') }}">
{{-- date range --}}
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
@endsection

@section('content')

<div class="pxp-content">
  
    <div class="pxp-single-property-top pxp-content-wrapper mt-4">
        <div class="container">
            <div class="row">
                <div class="col-sm-7">
                    <div class="pxp-sp-top-btns">
                        @auth
                        <a href="javascript:void(0);" data-id="{{ $property->id }}" class="text-pink text-decoration-none mr-5 btnHeart"><span class="fa fa-heart {{ (Auth::user()->userSavedProperties()->whereProperty_id($property->id)->count()>0)? 'text-pink':'text-primary' }}"></span> </a>
                        @else
                        <a href="javascript:void(0);" data-id="{{ $property->id }}" class="text-pink text-decoration-none mr-5 btnHeart"><span class="fa fa-heart text-primary"></span></a>
                        @endauth

                        <div class="dropdown">
                            <a class="text-primary text-decoration-none" href="avascript:void(0);" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="fa fa-share-alt"></span> Share
                            </a>
                            
                            @php
                                $actual_link = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                                $message = current(explode(' ',$property->user->name)).' has hosted an affordable '.$property->title. ' on Oshelter platform for '.str_replace('_', ' ',$property->type_status).'. Do check it out for your preferences and enjoy stay.'."\r\n";
                            @endphp
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="https://www.facebook.com/sharer.php?u={{ $actual_link }}&quote={{ urlencode($message) }}" target="_blank"><span class="fa fa-facebook text-primary"></span> Facebook</a>
                                <a class="dropdown-item" href="https://twitter.com/intent/tweet?text={{ urlencode($message) }}{{ $actual_link }}&hashtags=Oshelter,Vibtech" target="_blank"><span class="fa fa-twitter text-primary"></span> Twitter</a>
                                <a class="dropdown-item" href="https://wa.me/{{ '233'.substr($property->user->phone, 1) }}?text={{ urlencode($message) }}" target="_blank"><span class="fa fa-whatsapp text-success"></span> WhatsApp</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>

    <div class="pxp-single-property-gallery-container">
        <div class="pxp-single-property-gallery" itemscope itemtype="http://schema.org/ImageGallery">
            
            <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject" class="pxp-sp-gallery-main-img">
                <a href="{{ asset('assets/images/properties/'.$image->image) }}" title="{{ $image->caption }}" itemprop="contentUrl" data-size="1920x1280" class="pxp-cover" style="background-image: url({{ asset('assets/images/properties/'.$image->image) }});"></a>
                <figcaption itemprop="caption description">{{ $image->caption }}</figcaption>
            </figure>

            @php $i = 1; $j=0; @endphp
            @foreach ($images as $item)
            @php $i++; $j++; @endphp
            @if($j>4)
            <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject" class="remove-on-every-screen">
                <a href="{{ asset('assets/images/properties/'.$item->image) }}" title="{{ $item->caption }}" itemprop="contentUrl" data-size="1920x1459" class="pxp-cover" style="background-image: url({{ asset('assets/images/properties/'.$item->image) }});"></a>
                <figcaption itemprop="caption description">{{ $item->caption }}"</figcaption>
            </figure>
            @else
            <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                <a href="{{ asset('assets/images/properties/'.$item->image) }}" title="{{ $item->caption }}" itemprop="contentUrl" data-size="1920x1459" class="pxp-cover" style="background-image: url({{ asset('assets/images/properties/'.$item->image) }});"></a>
                <figcaption itemprop="caption description">{{ $item->caption }}"</figcaption>
            </figure>
            @endif
            @endforeach 
        </div>
        <a href="javascript:void(0);" class="pxp-sp-gallery-btn"><i class="fa fa-photo text-pink"></i> View all {{ count($images)+1 }} photos </a>
        <div class="clearfix"></div>
    </div>
    <hr>
    
    <div class="container mt-4">
        <div class="row">
            <div class="col-sm-12">
                <!-- Title and Location -->
                <div class="img-right mr-lg-5 mr-sm-5 text-center">
                    <img src="{{ (empty($property->user->image))? asset('assets/images/user.jpg'):asset('assets/images/users/'.$property->user->image) }}" alt="{{ $property->user->membership }}" class="thumb-lg rounded-circle" /> 
                    <p>{{ current(explode(' ',$property->user->name)) }}</p>
                </div>
                <h2 class="pxp-sp-top-title">{{ $property->title }}</h2>
                <p class="pxp-sp-top-address pxp-text-light"> <i class="fa fa-map-marker text-success"></i> {{ $property->propertyLocation->location }}</p>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <hr>       
                {{-- Key details          --}}
                <div class="pxp-single-property-section">
                    <h3>Key Details</h3>
                
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
                                                    <h6 class="m-0"><i class="fa fa-arrow-right font-14"></i> {{ $block->propertyHostelBlock->block_name }}</h6>
                                                </div>
                                                <p class="mt-2">
                                                <span class="text-primary">{{ ucfirst(strtolower($block->block_room_type)) }}</span> with {{ $block->block_no_room }} rooms for {{ $block->person_per_room }} person per room. 
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
                </div>

                {{-- Overview --}}
                <div class="pxp-single-property-section mt-4">
                    <h3>Overview</h3>
                    @if (count($property->propertyReviews))
                        @if ($property->type=='hostel')
                        @else
                        @endif
                    @endif
                    <div class="mt-3 mt-md-4">
                       @if ($property->type=='hostel')
                       <p>Fully furnished. Elegantly appointed condominium unit situated on premier location. PS6. The wide entry hall leads to a large living room with dining area. This expansive 2 bedroom and 2 renovated marble bathroom apartment has great windows. Despite the interior views, the apartments Southern and Eastern exposures allow for lovely natural light to fill every room. The master suite is surrounded by handcrafted milkwork and features incredible walk-in closet and storage space. The second bedroom is<span class="pxp-dots">...</span><span class="pxp-dots-more"> a corner room with double windows. The kitchen has fabulous space, new appliances, and a laundry area. Other features include rich herringbone floors, crown moldings and coffered ceilings throughout the apartment. 1049 5th Avenue is a classic pre-war building located across from Central Park, the reservoir and The Metropolitan Museum. Elegant lobby and 24 hours doorman. This is a pet-friendly building. 
                        <br><br>
                        Conveniently located close to several trendy fitness centers like Equinox, New York Sports Clubs & Crunch. Fine restaurants around the area, as well as top-ranked schools. 2% Flip tax paid by buyer to the condominium. Building just put an assessment for 18 months of approximately $500 per month.</span></p>
                        <a href="#" class="pxp-sp-more text-uppercase"><span class="pxp-sp-more-1">Continue Reading <span class="fa fa-angle-down"></span></span><span class="pxp-sp-more-2">Show Less <span class="fa fa-angle-up"></span></span></a>
                       @else
                        <p>{{ ucfirst(strtolower($property->propertyContain->furnish)) }}. Elegantly appointed condominium unit situated on premier location. PS6. The wide entry hall leads to a large living room with dining area. This expansive 2 bedroom and 2 renovated marble bathroom apartment has great windows. Despite the interior views, the apartments Southern and Eastern exposures allow for lovely natural light to fill every room. The master suite is surrounded by handcrafted milkwork and features incredible walk-in closet and storage space. The second bedroom is<span class="pxp-dots">...</span><span class="pxp-dots-more"> a corner room with double windows. The kitchen has fabulous space, new appliances, and a laundry area. Other features include rich herringbone floors, crown moldings and coffered ceilings throughout the apartment. 1049 5th Avenue is a classic pre-war building located across from Central Park, the reservoir and The Metropolitan Museum. Elegant lobby and 24 hours doorman. This is a pet-friendly building. 
                        <br><br>
                        Conveniently located close to several trendy fitness centers like Equinox, New York Sports Clubs & Crunch. Fine restaurants around the area, as well as top-ranked schools. 2% Flip tax paid by buyer to the condominium. Building just put an assessment for 18 months of approximately $500 per month.</span></p>
                        <a href="#" class="pxp-sp-more text-uppercase"><span class="pxp-sp-more-1">Continue Reading <span class="fa fa-angle-down"></span></span><span class="pxp-sp-more-2">Show Less <span class="fa fa-angle-up"></span></span></a> 
                       @endif
                    </div>

                    <p class="mt-4">
                        <b>Other notice</b><br>
                        @if ($property->propertyDescription->gate)
                        Property is located in a gated community.  
                        @else
                        Property is not located in a gated community.  
                        @endif
                    </p>
                </div>

                @if ($property->type!='hostel')
                    <hr>
                    <div class="pxp-single-property-section">
                        <h3>Amenities</h3>
                        <div class="row mt-3 mt-md-4">
                            <!-- Amenities -->
                            @if (count($property->propertyAmenities))
                                @foreach ($property->propertyAmenities as $amen)
                                <div class="col-sm-6 col-lg-4">
                                    <div class="pxp-sp-amenities-item"><i class="fa fa-check-square text-success"></i> {{ $amen->name }}</div>
                                </div>                 
                                @endforeach
                            @else
                                <p><i class="fa fa-square font-12"></i> No amenities reported on property.</p>
                            @endif
                        </div>
                    </div>
                @endif
                
                <hr>
                {{-- Availability --}}
                <div class="pxp-single-property-section">
                    <h3>Availability</h3>                    
                    <!-- Vacancies -->
                    @if ($property->type=='hostel')
                        <p><i class="fa fa-square font-12"></i> You will get to know your room mate when renting is 
                            confirmed. Click on vacant block room to book.
                        </p>
                        @if (count($property->propertyHostelBlockRooms))
                            @foreach ($property->propertyHostelBlockRooms as $block)
                                <div class="parentDiv mb-3">
                                    <h6><i class="fa fa-arrow-right font-14"></i> {{  $block->propertyHostelBlock->block_name  }}  | <span class="font-15 text-primary">{{  $block->block_room_type  }}</span> - <b> {{ $block->propertyHostelPrice->currency }} {{ number_format($block->propertyHostelPrice->property_price,2) }}</b>  <small><b>/{{ $block->propertyHostelPrice->price_calendar }}</b></small></h6>
                                    @foreach ($block->hostelBlockRoomNumbers as $item) 
                                        @if ($item->full)
                                        <span class="font-13 font-weight-500 text-danger">R{{ $item->room_no }}</span>
                                        <img src="{{ asset('assets/light/images/service-icon-1.svg') }}" alt="{{ $item->room_no }}" width="70" height="70" class="mr-4" />                                             
                                        @else
                                        <span class="font-13 font-weight-500 text-success">R{{ $item->room_no }}</span>
                                        <img src="{{ asset('assets/light/images/service-icon-1.svg') }}" alt="{{ $item->room_no }}" width="70" height="70" class="mr-4" /> 
                                        @endif
                                        {{-- <span class="badge {{ ($item->full)? 'badge-danger':'badge-success' }} mb-1 mr-1">
                                            <span>Room {{ $item->room_no }} {{ ($item->full)?'Not Available':'Available' }}</span><br><br>
                                            <span>({{ ($item->person_per_room-$item->occupant)}} {{ ($item->person_per_room-$item->occupant)>1? 'spaces':'space' }})</span>
                                        </span>                                                                                       --}}
                                    @endforeach
                                    <hr>
                                </div> 
                            @endforeach       
                        @endif  
                    @else
                        <div class="row">
                            @if ($property->type_status=='rent')
                                <div class="col-sm-12 col-lg-6">
                                    <div class="pro-order-box">
                                        <h6 class="header-title {{ $property->vacant? 'text-primary':'text-danger' }}">{{ $property->vacant? 'Available, ready for renting':'Rented, too late' }}</h6>
                                        <p class=""><i class="fa fa-check text-success font-12"></i>
                                            @if ($property->propertyPrice->payment_duration==6)
                                                <span>6 months advance payment</span>
                                            @elseif ($property->propertyPrice->payment_duration==12)
                                                <span>1 year advance payment</span>
                                            @elseif ($property->propertyPrice->payment_duration==24)
                                                <span>2 years advance payment</span>
                                            @endif
                                            <br>
                                            <i class="fa fa-check text-success font-12"></i>
                                            <span>
                                                <b>{{ $property->propertyPrice->currency }} {{ number_format($property->propertyPrice->property_price,2) }}</b>/<small>{{ $property->propertyPrice->price_calendar }}</small>
                                            </span><br>
                                            <i class="fa fa-check text-success font-12"></i>
                                            <span>{{ $property->adult+$property->children+$property->infant }} Guests</span><br>
                                            <i class="fa fa-check text-success font-12"></i>
                                            <span>{{ $property->adult==1? $property->adult.' Adult':$property->adult.' Adults' }}</span> |
                                            <span>
                                            @if($property->children==0)
                                            No Children
                                            @elseif($property->children==1)
                                            {{ $property->children.' Child' }}
                                            @else
                                            {{ $property->children.' Children' }}
                                            @endif
                                            </span> 
                                        </p>
                                    </div>
                                </div>
                            @elseif ($property->type_status=='short_stay')
                                <div class="col-sm-12 col-lg-6">
                                    <div class="pro-order-box">
                                        <h6 class="header-title {{ $property->vacant? 'text-primary':'text-danger' }}">{{ $property->vacant? 'Available, ready for renting':'Rented, too late' }}</h6>
                                        <p class=""><i class="fa fa-check text-success font-12"></i>
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
                                            </span>
                                            <br>
                                            <i class="fa fa-check text-success font-12"></i>
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
                                            <i class="fa fa-check text-success font-12"></i>
                                            <span>
                                                <b>{{ $property->propertyPrice->currency }} {{ number_format($property->propertyPrice->property_price,2) }}</b>/<small>{{ $property->propertyPrice->price_calendar }}</small>
                                            </span><br>
                                            <i class="fa fa-check text-success font-12"></i>
                                            <span>{{ $property->adult+$property->children+$property->infant }} Guests</span><br>
                                            <i class="fa fa-check text-success font-12"></i>
                                            <span>{{ $property->adult==1? $property->adult.' Adult':$property->adult.' Adults' }}</span> |
                                            <span>
                                            @if($property->children==0)
                                            No Children
                                            @elseif($property->children==1)
                                            {{ $property->children.' Child' }}
                                            @else
                                            {{ $property->children.' Children' }}
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
                        <hr>
                    @endif 
                </div>
                {{-- Reviews --}}
                <div class="pxp-single-property-section">
                    <h3>Reviews</h3>                    
                    <!-- Reviews -->
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
                    <div class="">
                        <img src="{{ asset('assets/images/logo-sm.png') }}" alt="Logo" class="thumb-xs rounded-circle img-left mr-3" /> 
                        <p>We never rest because we care. OShelter is here to protect both interest. All rent, sell and auction is covered 
                            by OShelter's <a href="javascript:void(0)" class="text-primary">Refund Policy</a>.
                        </p>
                    </div>
                </div>

                <hr>
                {{-- Contacts --}}
                <div class="pxp-single-property-section">
                    <!-- Contact -->
                    <div class="img-right mr-lg-5 mr-sm-5 text-center">
                        <img src="{{ (empty($property->user->image))? asset('assets/images/user.jpg'):asset('assets/images/users/'.$property->user->image) }}" alt="{{ $property->user->membership }}" class="thumb-lg rounded-circle" /> 
                    </div>
                    <h4><b>Owned by {{ current(explode(' ',$property->user->name)) }}</b></h4>                           
                    <p>{{ empty($property->user->profile->city)? '':$property->user->profile->city }} - Joined {{ \Carbon\Carbon::parse($property->user->created_at)->format('F, Y') }}</p>                           
                    
                    @if (count($property->propertyReviews))
                        <span class="mr-5"><i class="fa fa-star text-warning"></i> <b>Overall Reviews</b></span>
                    @endif
                    <span><i class="fa fa-check-circle {{ $property->user->verify_email? 'text-success':'text-danger' }}"></i> <b>{{ $property->user->verify_email? 'Verified':'Not Verified' }}</b></span>
                    <br>   <br> 
                    <a href="{{ route('messages.compose', $property->user->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-envelope"></i> Contact Owner</a>     
                    <hr>
                    <div>
                        <p><b>Communication always happens on OShelter's platform.</b> For the protection of your payments, never make  
                        payments outside OShelter's website and app.</p>    
                    </div>     

                </div>

                <hr>
                {{-- Maps --}}
                <div class="pxp-single-property-section">
                    <h3>Explore the Area</h3>
                    <!-- The descriptions and directions --> 
                    <div>
                        <p>{{ $property->propertyDescription->neighbourhood }}</p>   
                    </div> 
                    <p class="mt-0">{{ current(explode(' ',$property->user->name)) }}'s property is located @ {{ $property->propertyLocation->location }}</p>     
                            
                    <div id="pxp-sp-map" class="mt-3"></div>
                    
                    <p><i class="fa fa-dot-circle" style="font-size: 9px"></i>  Directions 
                        @if($property->type_status=='rent')
                        are given out to tenant after renting is confirmed.
                        @elseif($property->type_status=='sell')
                        are given out to buyer after buying is confirmed.
                        @else
                        are given out to highest bidder after auctioning is won.
                        @endif
                    </p>   
                </div>
                
                <hr>
                {{-- Cancellation --}}
                <div class="pxp-single-property-section">
                    <h3>Cancellation {{ $property->type_status=='rent'? 'and Eviction':'' }}</h3>
                    <p>
                        <i class="fa fa-minus-circle font-12"></i> 
                        Cancellation after 48 hours, you will get full refund minus service fee.
                    </p>       
                    @if($property->type_status=='rent')   
                        <p>
                            <i class="fa fa-minus-circle font-12"></i> 
                            Eviction notice will be sent to tenants 3 months before time. Tenants will wish to extend or evict.
                        </p>
                    @elseif($property->type_status=='short_stay')   
                        <p>
                            <i class="fa fa-minus-circle" style="font-size: 9px"></i> 
                            Eviction notice will be sent to guest 3 days and 1 day before time.
                        </p>
                    @endif                       
                </div>

                @if ($property->type_status=='rent')
                <hr>
                {{-- property rules --}}
                <div class="pxp-single-property-section">
                    <h3>Property Rules</h3>
                    <div class="row mt-3 mt-md-4">
                        <!-- Property Rules -->
                        @if (count($property->propertyRules))
                            @foreach ($property->propertyRules as $rule)
                            <div class="col-sm-6 col-lg-4">
                                <p><i class="fa fa-check-square text-success font-12"></i> {{ $rule->rule }}</p>
                            </div>                                
                            @endforeach
                        @else
                            <p><i class="fa fa-square font-12"></i> No rules reported on this property.</p>
                        @endif
                    </div>

                                               
                    @if (count($property->propertyOwnRules))
                    <h6><b>Other Rules</b></h6>
                    @endif
                    <div class="row">
                        @if (count($property->propertyOwnRules)) 
                            @foreach ($property->propertyOwnRules as $rule)
                            <div class="col-sm-6 col-lg-4">
                                <p><i class="fa fa-check-square text-success font-12"></i> {{ $rule->rule }}</p>
                            </div>                                
                            @endforeach
                        @endif
                    </div>
                </div>
                @endif
            </div>
            
            {{-- Booking form --}}
            <div class="col-lg-4">
                <div class="pxp-single-property-section pxp-sp-agent-section mt-4 mt-md-5 mt-lg-0">
                @if ($property->type=='hostel')
                    <div class="card card-bordered-pink">
                        <div class="card-body" style="padding-left:10px !important; padding-right:10px !important">
                            <div class="card-heading">
                                <h6 id="myHostelPriceHeading"><strong><span id="myHostelCurrency" class="font-20"></span> <span id="initialHostelAmount"></span><span id="hyphen" style="display: none">/</span><small id="myHostelPriceCal"></small></strong></h6>
                                <div id="myHostelSwitch"><img src="{{ asset('assets/images/gif/Bars-1s-200px.gif') }}" alt="load" width="30" height="30" title="Waiting for price"></div>
                                <span class="font-12"><i class="fa fa-star text-warning"></i> <b>0.1</b> (1 Review)</span>
                            </div>
                            <hr>
                            <span class="small text-primary">You're charged after booking is confirmed.</span>
                            <hr>
        
                            <form class="form-horizontal form-material mb-0" id="formBookHostel" method="POST" action="{{ route('property.bookings.hostel.submit') }}">
                                @csrf
                                <input type="hidden" name="property_id" readonly value="{{ $property->id }}">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <span id="hostelAvailabilityChecker" class="small text-success"></span>
                                    </div>
                                    <div class="col-sm-7">
                                        <div class="form-group input-group-sm validate">
                                            <select name="block_name" id="block_name" class="form-control">
                                                <option value="">-Block-</option>
                                                @foreach ($property->propertyHostelBlocks as $block)
                                                <option value="{{ $block->id }}">{{ $block->block_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-group input-group-sm validate">
                                            <select name="gender" id="gender" class="form-control" data-url="{{ route('property.get.roomtype') }}">
                                                <option value="">-Gender-</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-7">
                                        <div class="form-group input-group-sm validate">
                                            <select name="room_type" id="room_type" class="form-control" data-url="{{ route('property.get.roomnumber') }}">
                                                <option value="" class="after">-Room Type-</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-group input-group-sm validate">
                                            <select name="room_number" id="room_number" class="form-control" data-url="{{ route('property.check.roomtype') }}">
                                                <option value="" class="after">-Room Number-</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="input-group input-group-sm validate" id="dateRanger" data-date="{{ \Carbon\Carbon::parse(\Carbon\Carbon::tomorrow())->format('m-d-Y') }}">
                                            <input type="text" name="check_in" value="" class="form-control" placeholder="Check In" readonly />
                                            <div class="input-group-prepend">
                                                <span class="input-group-text fa fa-arrow-right small" id="inputGroup-sizing-sm"></span>
                                            </div>
                                            <input type="text" name="check_out" value="" class="form-control" placeholder="Check Out" readonly />
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-2" id="showCalculations">
                                    <div class="col-sm-12">
                                        <div>
                                            <span id="dateCalculator">Month Cal</span>
                                            <span class="pull-right" id="dateCalculatorResult">Total Month Fee</span>
                                        </div>
                                        {{-- <div>
                                            <span>Discount Cal</span>
                                            <span class="pull-right">Total Discount Fee</span>
                                        </div> --}}
                                        <div>
                                            <span>Service Fee</span>
                                            <span class="pull-right" id="serviceFeeResult">Total Service Fee</span>
                                        </div>
                                        <hr>
                                        <div>
                                            <span><strong>Total</strong></span>
                                            <span class="pull-right"><strong id="totalFeeResult">Total Fee</strong></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 text-center">
                                        <div class="form-group">
                                            <button class="btn btn-primary btn-sm btn-block pl-5 pr-5 mt-3 btnHostelBook"><i class="fa fa-check-circle"></i> Book this {{ $property->type }}</button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <hr>
                            <div class="">
                                <span class="small text-primary" id="myHostelAdvance"></span>
                                <span class="small text-primary" id="myHostelAdvanceMonth" style="display: none"></span>
                            </div>
                        </div><!--end card-body-->
                    </div><!--end card-->
                @else
                    <div class="card card-bordered-pink">
                        <div class="card-body" style="padding-left:10px !important; padding-right:10px !important;">
                            <div class="card-heading">
                                <h6>
                                    <strong>
                                        <span class="font-20" id="initialCurrency" data-currency="{{ $property->propertyPrice->currency }}">{{ $property->propertyPrice->currency }}</span> 
                                        <span id="initialAmount" data-amount="{{ $property->propertyPrice->property_price }}" data-duration="{{ $property->propertyPrice->payment_duration }}">{{ number_format($property->propertyPrice->property_price,2) }}</span>/<small>{{ $property->propertyPrice->price_calendar }}</small>
                                    </strong>
                                </h6>
                                <span class="font-12"><i class="fa fa-star text-warning"></i> <b>0.1</b> (1 Review)</span>
                            </div>
                            <hr>
                            <span class="small text-primary">You're charged after booking is confirmed.</span>
                            <hr>
                            {{-- for rent --}}
                            @if ($property->type_status=='rent')
                            <form class="form-horizontal form-material mb-0" id="formRentBooking" method="POST" action="{{ route('property.bookings.submit') }}">
                                @csrf
                                <input type="hidden" name="property_id" readonly value="{{ $property->id }}">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="input-group input-group-sm validate" id="dateRanger" data-date="{{ \Carbon\Carbon::parse(\Carbon\Carbon::tomorrow())->format('m-d-Y') }}">
                                            <input type="text" name="check_in" value="" class="form-control" placeholder="Check In" readonly />
                                            <div class="input-group-prepend">
                                                <span class="input-group-text fa fa-arrow-right small" id="inputGroup-sizing-sm"></span>
                                            </div>
                                            <input type="text" name="check_out" value="" class="form-control" placeholder="Check Out" readonly />
                                        </div>
                                    </div>
                                    <div class="col-sm-12 mt-3">
                                        <div class="form-group input-group-sm validate">
                                            <select name="adult" id="adult" class="form-control" data-number="{{ $property->adult }}">
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
                                    <div class="col-sm-6 mt-3">
                                        <div class="form-group input-group-sm validate">
                                            <select name="children" id="children" class="form-control" data-number="{{ $property->children }}">
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

                                    <div class="col-sm-6 mt-3">
                                        <div class="form-group input-group-sm validate">
                                            <select name="infant" id="infant" class="form-control">
                                                <option value="0">No Infant</option>
                                                <option value="1">1 Infant</option>
                                                <option value="2">2 Infants</option>
                                                <option value="3">3 Infants</option>
                                                <option value="4">4 Infants</option>
                                                <option value="5">5 Infants</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row" id="showCalculations">
                                    <div class="col-sm-12">
                                        <div>
                                            <span id="dateCalculator">Month Cal</span>
                                            <span class="pull-right" id="dateCalculatorResult">Total Month Fee</span>
                                        </div>
                                        {{-- <div>
                                            <span>Discount Cal</span>
                                            <span class="pull-right">Total Discount Fee</span>
                                        </div> --}}
                                        <div>
                                            <span>Service Fee</span>
                                            <span class="pull-right" id="serviceFeeResult">Total Service Fee</span>
                                        </div>
                                        <hr>
                                        <div>
                                            <span><strong>Total</strong></span>
                                            <span class="pull-right"><strong id="totalFeeResult">Total Fee</strong></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 text-center">
                                        <div class="form-group">
                                            <button class="btn btn-primary btn-sm btn-block pl-5 pr-5 mt-3 btnRentBook"><i class="fa fa-check-circle"></i> Book this {{ str_replace('_', ' ', $property->type) }}</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <hr>
                            <div class="">
                                <span class="small text-primary">
                                    @if ($property->propertyPrice->payment_duration==3)
                                        3 months advance payment
                                    @elseif ($property->propertyPrice->payment_duration==6)
                                        6 months advance payment
                                    @elseif ($property->propertyPrice->payment_duration==12)
                                        1 year advance payment
                                    @elseif ($property->propertyPrice->payment_duration==24)
                                        2 years advance payment
                                    @endif
                                </span>
                            </div>

                            @elseif ($property->type_status=='short_stay')
                            {{-- for short stay --}}
                            <form class="form-horizontal form-material mb-0" id="formStayBooking" method="POST" action="{{ route('property.bookings.submit') }}">
                                @csrf
                                <input type="hidden" name="property_id" readonly value="{{ $property->id }}">
                                <div class="row">
                                    <div class="col-sm-12" id="dateMaxMin" data-min="{{ $property->propertyPrice->minimum_stay }}" data-max="{{ $property->propertyPrice->maximum_stay }}">
                                        <div class="input-group input-group-sm validate" id="dateRanger" data-date="{{ \Carbon\Carbon::parse(\Carbon\Carbon::tomorrow())->format('m-d-Y') }}">
                                            <input type="text" name="check_in" value="" class="form-control" placeholder="Check In" readonly />
                                            <div class="input-group-prepend">
                                                <span class="input-group-text fa fa-arrow-right small" id="inputGroup-sizing-sm"></span>
                                            </div>
                                            <input type="text" name="check_out" value="" class="form-control" placeholder="Check Out" readonly />
                                        </div>
                                    </div>
                                    <div class="col-sm-12 mt-3">
                                        <div class="form-group input-group-sm validate">
                                            <select name="adult" id="adult" class="form-control" data-number="{{ $property->adult }}">
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
                                    <div class="col-sm-6 mt-3">
                                        <div class="form-group input-group-sm validate">
                                            <select name="children" id="children" class="form-control" data-number="{{ $property->children }}">
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

                                    <div class="col-sm-6 mt-3">
                                        <div class="form-group input-group-sm validate">
                                            <select name="infant" id="infant" class="form-control">
                                                <option value="0">No Infant</option>
                                                <option value="1">1 Infant</option>
                                                <option value="2">2 Infants</option>
                                                <option value="3">3 Infants</option>
                                                <option value="4">4 Infants</option>
                                                <option value="5">5 Infants</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row" id="showCalculations">
                                    <div class="col-sm-12">
                                        <div>
                                            <span id="dateCalculator">Month Cal</span>
                                            <span class="pull-right" id="dateCalculatorResult">Total Month Fee</span>
                                        </div>
                                        <div>
                                            <span>Service Fee</span>
                                            <span class="pull-right" id="serviceFeeResult">Total Service Fee</span>
                                        </div>
                                        <hr>
                                        <div>
                                            <span><strong>Total</strong></span>
                                            <span class="pull-right"><strong id="totalFeeResult">Total Fee</strong></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 text-center">
                                        <div class="form-group">
                                            <button class="btn btn-primary btn-sm btn-block pl-5 pr-5 mt-3 btnStayBook"><i class="fa fa-check-circle"></i> Book this {{ str_replace('_', ' ', $property->type) }}</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <hr>
                            <div class="">
                                <span class="small text-primary">
                                    @if ($property->propertyPrice->payment_duration==3)
                                        3 months advance payment
                                    @elseif ($property->propertyPrice->payment_duration==6)
                                        6 months advance payment
                                    @elseif ($property->propertyPrice->payment_duration==12)
                                        1 year advance payment
                                    @elseif ($property->propertyPrice->payment_duration==24)
                                        2 years advance payment
                                    @endif
                                </span>
                            </div>
                            @endif
                        </div><!--end card-body-->
                    </div><!--end card-->
                @endif

                <div class="text-center">
                    <a href="{{ route('report-listing', $property->id) }}" class="text-danger small"><i class="fa fa-flag"></i> Report this listing</a>
                </div>
                </div>
            </div>
        </div>
    </div>

    <hr>

</div>


@endsection

@section('scripts')
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_GOOGLE_MAPS_KEY_HERE&amp;libraries=geometry&amp;libraries=places"></script>
<script src="{{ asset('assets/light/js/photoswipe.min.js') }}"></script> 
<script src="{{ asset('assets/light/js/photoswipe-ui-default.min.js') }}"></script>
<script src="{{ asset('assets/light/js/jquery.sticky.js') }}"></script>
<script src="{{ asset('assets/light/js/gallery.js') }}"></script>
<script src="{{ asset('assets/light/js/infobox.js') }}"></script>
<script src="{{ asset('assets/light/js/single-map.js') }}"></script>
{{-- date range --}}
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
@if($property->type=='hostel')
<script type="text/javascript" src="{{ asset('assets/pages/website/hostel-property-detail.js') }}"></script>
@else
    @if ($property->type_status=='rent')
    <script type="text/javascript" src="{{ asset('assets/pages/website/rent-property-detail.js') }}"></script>
    @else
    <script type="text/javascript" src="{{ asset('assets/pages/website/short-stay-property-detail.js') }}"></script>
    @endif
@endif
@endsection