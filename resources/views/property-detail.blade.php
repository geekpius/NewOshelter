@extends('layouts.site')

@section('style')
<link rel="stylesheet" href="{{ asset('assets/light/css/photoswipe.css') }}">
<link rel="stylesheet" href="{{ asset('assets/light/css/default-skin/default-skin.css') }}">
@endsection

@section('content')

<div class="pxp-content">
  
    <div class="pxp-single-property-top pxp-content-wrapper mt-4">
        <div class="container">
            <div class="row">
                <div class="col-sm-7">
                    <div class="pxp-sp-top-btns">
                        <a href="javascript:void(0);" data-id="{{ $property->id }}" class="text-pink text-decoration-none mr-5 btnHeart"><span class="fa fa-heart"></span> Save</a>
                        <div class="dropdown">
                            <a class="text-primary text-decoration-none" href="avascript:void(0);" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="fa fa-share-alt"></span> Share
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="#"><span class="fa fa-facebook text-primary"></span> Facebook</a>
                                <a class="dropdown-item" href="#"><span class="fa fa-twitter text-primary"></span> Twitter</a>
                                <a class="dropdown-item" href="#"><span class="fa fa-whatsapp text-success"></span> WhatsApp</a>
                                <a class="dropdown-item" href="#"><span class="fa fa-linkedin text-primary"></span> LinkedIn</a>
                                <a class="dropdown-item" href="#"><span class="fa fa-instagram text-danger"></span> Instagram</a>
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
                <p class="pxp-sp-top-address pxp-text-light"> <i class="fa fa-map-marker text-success"></i> {{ $property->propertyLocation->location }} - <a href="https://ghanapostgps.com/mapview.html#{{ $property->propertyLocation->digital_address }}" target="_blank">{{ $property->propertyLocation->digital_address }}</a></p>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <hr>                
                <div class="pxp-single-property-section">
                    <h3>Key Details</h3>
                
                    <!-- Contained amenities -->
                    <p><i class="fa fa-home text-success"></i> <b>{{  ucwords(str_replace('_',' ',$property->type))  }} in {{  strtolower($property->base)  }} </b> </p>   
                    @if ($property->type=='hostel')
                        @if (count($property->propertyHostelBlocks))
                            <div style="position: relative;  height: 260px; overflow-y:scroll; overflow-x:hidden;">
                                <div class="activity">
                                @foreach ($property->propertyHostelBlocks as $block)
                                    <div class="parentDiv">
                                        <i class="mdi mdi-checkbox-marked-circle-outline icon-success"></i>
                                        <div class="time-item">
                                            <div class="item-info">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <h6 class="m-0">{{ $block->block_name }} Block</h6>
                                                </div>
                                                <p class="mt-3">
                                                    {{ ucfirst(strtolower($block->type)) }} with {{ $block->no_room }} rooms with {{ $block->per_room }} person per room. 

                                                </p>
                                                <div>
                                                    <span class="badge badge-soft-primary">{{$block->bed}} {{ $block->bed==1? 'bed':'beds' }} per room </span>                                                  
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
                
                <hr>
                <div class="pxp-single-property-section">
                    <h3>Availability</h3>                    
                    <!-- Vacancies -->
                    @if ($property->type=='hostel')
                        <p><i class="fa fa-square font-12"></i> You will get to know your room mate when renting is 
                            confirmed. Click on vacant block room to book.
                        </p>
                        @if (count($property->propertyHostelBlocks))
                            @foreach ($property->propertyHostelBlocks as $block)
                                <div class="parentDiv mb-3">
                                    <h6><i class="fa fa-square text-success" style="font-size:9px"></i> {{  $block->block_name  }} Block - <b>{{ $block->propertyHostelPrice->currency }} {{ number_format($block->propertyHostelPrice->property_price,2) }}</b>  <small><b>per {{ $block->propertyHostelPrice->price_calendar }}</b></small></h6>
                                    @foreach ($block->hostelBlockRooms as $item)  
                                        <span class="badge {{ ($item->full)? 'badge-danger':'badge-success' }} mb-1 mr-1">
                                            <span>Room {{ $item->room }} {{ ($item->full)?'Not Available':'Available' }}</span><br><br>
                                            <span>({{ ($item->no_person-$item->occupant)}} {{ ($item->no_person-$item->occupant)>1? 'spaces':'space' }})</span>
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
                                        <h6 class="header-title {{ $property->vacant? 'text-primary':'text-danger' }}">{{ $property->vacant? 'Available, ready for renting':'Rented, too late' }}</h6>
                                        <p class=""><i class="fa fa-check text-success font-12"></i>
                                            @if ($property->propertyPrice->payment_duration==3)
                                                <span>3 months advance payment</span>
                                            @elseif ($property->propertyPrice->payment_duration==6)
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
                </div>

                <hr>
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
                    <button type="button" class="btn btn-primary btn-sm"><i class="fa fa-envelope"></i> Contact Owner</button>     
                    <hr>
                    <div>
                        <p><b>Communication always happens on OShelter's platform.</b> For the protection of your payments, never make  
                        payments outside OShelter's website and app.</p>    
                    </div>     

                </div>

                <hr>
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
                <div class="pxp-single-property-section">
                    <h3>Cancellation {{ $property->type_status=='rent'? 'and Eviction':'' }}</h3>
                    <p>
                        <i class="fa fa-minus-circle font-12"></i> 
                        Cancellation is free up to 72 hours after 
                        @if($property->type_status=='rent')
                        renting is confirmed.
                        @elseif($property->type_status=='sell')
                        buying is confirmed.
                        @else
                        auctioning is won and confirmed.
                        @endif
                    </p>       
                    <p>
                        <i class="fa fa-minus-circle font-12"></i> 
                        Cancellation after 72 hours of
                        @if($property->type_status=='rent')
                        renting will attract pernalty of waiting for that property to be rented.
                        @elseif($property->type_status=='sell')
                        buying will attract pernalty of waiting for that property to be bought.
                        @else
                        auctioning will attract pernalty of waiting for that property to be auctioned.
                        @endif
                        
                    </p>  
                    @if($property->type_status=='rent')   
                        <p>
                            <i class="fa fa-minus-circle font-12"></i> 
                            Eviction notice will be sent to tenants 3 months before time. Tenants will wish to extend or evict.
                        </p>
                    @endif                      
                </div>

                @if ($property->type_status=='rent')
                <hr>
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
            
            <div class="col-lg-4">
                <div class="pxp-single-property-section pxp-sp-agent-section mt-4 mt-md-5 mt-lg-0">
                @if ($property->type=='hostel')
                    
                @else
                    <div class="card">
                        <div class="card-body" style="padding-left:10px !important; padding-right:10px !important">
                            <div class="card-heading">
                                <h6><strong>{{ $property->propertyPrice->currency }} <span id="initialAmount">{{ number_format($property->propertyPrice->property_price,2) }}</span>/<small>{{ $property->propertyPrice->price_calendar }}</small></strong></h6>
                                <span class="font-12"><i class="fa fa-star text-warning"></i> <b>0.1</b> (1 Review)</span>
                            </div>
                            <hr>
                            <span class="small text-primary">You're charged after booking is confirmed.</span>
                            <hr>
        
                            <form class="form-horizontal form-material mb-0" id="formChangePassword">
                                @csrf
                                <input type="hidden" name="property_id" readonly value="{{ $property->id }}">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <span id="dateCalculator" class="small text-danger"></span>
                                        <div class="input-group input-group-sm validate">
                                            <input type="date" name="check_in" value="{{ date('Y-m-d') }}" class="form-control">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text fa fa-arrow-right small" id="inputGroup-sizing-sm"></span>
                                            </div>
                                            <input type="date" name="check_out" value="{{ date('Y-m-d') }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 mt-3">
                                        <div class="form-group input-group-sm validate">
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
                                    <div class="col-sm-6 mt-3">
                                        <div class="form-group input-group-sm validate">
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

                                <div class="row">
                                    <div class="col-sm-12 text-center">
                                        <div class="form-group">
                                            <button class="btn btn-primary btn-sm btn-block pl-5 pr-5 mt-3 btnBook"><i class="fa fa-check-circle"></i> Book this {{ $property->type }}</button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <hr>
                            <div class="">
                                <span class="small text-primary">From 
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
                        </div><!--end card-body-->
                    </div><!--end card-->
                    <div class="text-center">
                        <a href="javascript:void(0);" class="text-danger small"><i class="fa fa-flag"></i> Report this listing</a>
                    </div>
                @endif
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
<script src="{{ asset('assets/light/js/Chart.min.js') }}"></script>
<script>
    $("input[name='check_in']").on("change", function(){
        var checkIn = $(this);
        var checkOut = $("input[name='check_out']");
        if(checkOut.val()){
            if(Date.parse(checkIn.val()) < new Date().getTime()){
                checkIn.val("{{ date('Y-m-d') }}");
                $('#dateCalculator').text('');
            }
            else if(Date.parse(checkIn.val()) >= Date.parse(checkOut.val())){
                $('#dateCalculator').text('');                
            }
            else{
                var checkInDate = new Date(checkIn.val()).getTime()
                var checkOutDate = new Date(checkOut.val()).getTime()
                var distance = checkOutDate - checkInDate;
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                $('#dateCalculator').text(days+' days');
            }
        }
    });

    $("input[name='check_out']").on("change", function(){
        var checkOut = $(this);
        var checkIn = $("input[name='check_in']");
        if(checkIn.val()){
            if(Date.parse(checkOut.val()) < new Date().getTime()){
                checkOut.val("{{ date('Y-m-d') }}");
                $('#dateCalculator').text('');
            }
            else if(Date.parse(checkOut.val()) <= Date.parse(checkIn.val())){
                $('#dateCalculator').text('');                
            }
            else{
                var checkOutDate = new Date(checkOut.val()).getTime()
                var checkInDate = new Date(checkIn.val()).getTime()
                var distance = checkOutDate - checkInDate;
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                $('#dateCalculator').text(days+' days');
            }
        }
    });
</script>
@endsection