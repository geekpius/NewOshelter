@extends('layouts.site')

@section('style')
<link rel="stylesheet" href="{{ asset('assets/light/css/photoswipe.css') }}">
<link rel="stylesheet" href="{{ asset('assets/light/css/default-skin/default-skin.css') }}">
<link rel="stylesheet" href="{{ asset('assets/light/css/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/light/css/owl.theme.default.min.css') }}">
<style>
    .iframe-view {
        height: 649px;
        width: 930px;
    }
    @media (max-width: 2560px) {
        .iframe-view {
            height: 649px;
            width: 1330px;
        }
    }
    @media (max-width: 1440px) {
        .iframe-view {
            height: 649px;
            width: 730px;
        }
    }
    @media (max-width: 1024px) {
        .iframe-view {
            height: 649px;
            width: 530px;
        }
    }
    @media (max-width: 768px) {
        .iframe-view {
            height: 449px;
            width: 390px;
        }
    }
    @media (max-width: 425px) {
        .iframe-view {
            height: 349px;
            width: 430px;
        }
    }
    @media (max-width: 375px) {
        .iframe-view {
            height: 349px;
            width: 375px;
        }
    }
    @media (max-width: 320px) {
        .iframe-view {
            height: 349px;
            width: 330px;
        }
    }

    .disabled{
        pointer-events: none !important;
        cursor:not-allowed !important;
    }
</style>
@endsection

@section('content')

<div class="pxp-content">

    <div class="pxp-single-property-top pxp-content-wrapper mt-5">
        <div class="container">
            <div class="row">
                <div class="col-sm-7">
                    <div class="pxp-sp-top-btns">
                        @auth
                        <a href="javascript:void(0);" data-id="{{ $property->id }}" class="text-pink text-decoration-none mr-5 btnHeart" data-id="{{ $property->id }}" data-url="{{ route('saved.submit') }}"><span class="fa fa-heart {{ (Auth::user()->userSavedProperties()->whereProperty_id($property->id)->count()>0)? 'text-pink':'text-primary' }}"></span> </a>
                        @else
                        <a href="javascript:void(0);" data-id="{{ $property->id }}" class="text-pink text-decoration-none mr-5 btnHeart"><span class="fa fa-heart text-primary"></span></a>
                        @endauth

                        <div class="dropdown">
                            <a class="text-primary text-decoration-none" href="avascript:void(0);" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="fa fa-share-alt"></span> Share
                            </a>

                            @php
                                $actual_link = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                                // $propertyLink = "<a href='".route('single.property', $property->id)."' target='_blank'>$property->title</a>";
                                $propertyLink = route('single.property', $property->id);
                                $message = current(explode(' ',$property->user->name)).' has hosted an affordable '.$property->title.' on Oshelter platform for '.str_replace('_', ' ',$property->type_status).'. Do check it out for your preferences and enjoy stay.'."\r\n";
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

            @if (empty($property->propertyVideo))
                <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject" class="pxp-sp-gallery-main-img">
                    <a href="{{ asset('assets/images/properties/'.$image->image) }}" title="{{ $image->caption }}" itemprop="contentUrl" data-size="1020x659" class="pxp-cover" style="background-image: url({{ asset('assets/images/properties/'.$image->image) }});"></a>
                    <figcaption itemprop="caption description">{{ $image->caption }}</figcaption>
                </figure>
            @else
                <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject" class="pxp-sp-gallery-main-img">
                    <a href="{{ asset('assets/images/properties/'.$image->image) }}" itemprop="contentUrl" data-size="1020x659" class="pxp-cover">
                        <iframe class="iframe-view" src="{{ $property->propertyVideo->video_url }}" frameborder="0" allowfullscreen></iframe>
                    </a>
                </figure>
            @endif

            @php $i = 1; $j=0; @endphp
            @foreach ($images as $item)
            @php $i++; $j++; @endphp
            @if($j>4)
            <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject" class="remove-on-every-screen">
                <a href="{{ asset('assets/images/properties/'.$item->image) }}" title="{{ $item->caption }}" itemprop="contentUrl" data-size="1020x659" class="pxp-cover" style="background-image: url({{ asset('assets/images/properties/'.$item->image) }});"></a>
                <figcaption itemprop="caption description">{{ $item->caption }}"</figcaption>
            </figure>
            @else
            <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                <a href="{{ asset('assets/images/properties/'.$item->image) }}" title="{{ $item->caption }}" itemprop="contentUrl" data-size="1020x659" class="pxp-cover" style="background-image: url({{ asset('assets/images/properties/'.$item->image) }});"></a>
                <figcaption itemprop="caption description">{{ $item->caption }}"</figcaption>
            </figure>
            @endif
            @endforeach
        </div>
        <a href="javascript:void(0);" class="pxp-sp-gallery-btn"><i class="fa fa-photo text-pink"></i> View all {{ $i }} {{ str_plural('photo', $i) }} </a>
        <div class="clearfix"></div>
    </div>

    <hr>

    <div class="container mt-4">
        <div class="row">
            <div class="col-sm-12">
                <!-- Title and Location -->
                <div class="img-right mr-lg-5 mr-sm-5 text-center">
                    <img src="{{ (empty($property->user->image))? asset('assets/images/user.svg'):asset('assets/images/users/'.$property->user->image) }}" alt="{{ current(explode(' ',$property->user->name)) }}" class="thumb-md rounded-circle" />
                    <p>{{ current(explode(' ',$property->user->name)) }}</p>
                </div>
                <h2 class="pxp-sp-top-title">{{ $property->title }}</h2>
                <p class="pxp-sp-top-address pxp-text-light" data-latitude="{{ $property->propertyLocation->latitude }}" data-longitude="{{ $property->propertyLocation->longitude }}"> <i class="fa fa-map-marker text-success"></i> {{ $property->propertyLocation->location }}</p>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                {{-- Key details --}}
                <div class="pxp-single-property-section">
                    <h3>Key Details</h3>

                    <!-- Contained amenities -->
                    @if(strtolower($property->type) == 'house' && strtolower($property->base) == 'house')
                    <p><i class="fa fa-home text-success"></i> <b>@if($property->type !='hostel'){{ ucfirst(strtolower($property->propertyContain->furnish)) }} &nbsp;@endif{{ ucwords(str_replace('_',' ',$property->type)) }}</b></p>
                    @else
                    <p>
                        <i class="fa fa-home text-success"></i>
                        <b>@if(!$property->isHostelPropertyType()){{ ucfirst(strtolower($property->propertyContain->furnish)) }} &nbsp;@endif{{ ucwords(str_replace('_',' ',$property->type)) }} in {{ strtolower($property->base) }}</b></p>
                    @endif

                    @if ($property->isHostelPropertyType())
                        @if (count($property->propertyHostelBlockRooms))
                        <div class="row">
                            @foreach ($property->propertyHostelBlockRooms as $block)
                                <div class="col-md-6 mb-3">
                                    <div class="pro-order-box">
                                        <h4 class="header-title text-primary">
                                            <i class="fa fa-home text-success font-12"></i>
                                            {{ $block->propertyHostelBlock->block_name }} <span class="font-12 text-muted">({{ $block->gender }})</span>
                                        </h4>
                                        <div class="font-14">
                                            <span class="text-primary">{{ ucfirst(str_replace('_', ' ', $block->furnish)) }} {{ ucfirst(strtolower($block->block_room_type)) }}</span> with {{ $block->block_no_room }} rooms for {{ $block->person_per_room }} person per room.
                                            <br>
                                            <span class="badge badge-soft-primary">{{$block->bed_person}} <i class="fa fa-bed" title="Bed per room"></i> </span>
                                            @if($block->kitchen==0)
                                            <span class="badge badge-soft-primary">0  <img src="{{ asset('assets/images/kitchen.png') }}" alt="Kitchen" width="14" height="14" title="No Kitchen"></span>
                                            @elseif($block->kitchen==1)
                                            <span class="badge badge-soft-primary">Private <img src="{{ asset('assets/images/kitchen.png') }}" alt="Kitchen" width="14" height="14" title="Private Kitchen"></span>
                                            @else
                                            <span class="badge badge-soft-primary">Shared <img src="{{ asset('assets/images/kitchen.png') }}" alt="Kitchen" width="14" height="14" title="Shared Kitchen"></span>
                                            @endif
                                            <span class="badge badge-soft-primary">{{ $block->bathroom }} {{ ($block->bath_private)? 'private':'shared' }}  <i class="fas fa-bath"></i></span>
                                            <span class="badge badge-soft-primary">{{ $block->toilet }} {{ ($block->toilet_private)? 'private':'shared' }} <i class="fas fa-toilet"></i></span>
                                        </div>
                                        <div><hr></div>
                                        <div class="">
                                            <h6><strong>Amenities</strong></h6>
                                            @if(count($block->hostelRoomAmenities))
                                                @foreach ($block->hostelRoomAmenities as $amenity)
                                                <span class="mr-4 font-12"><span class="fa fa-check-square text-success"></span>  {{ $amenity->name }}</span>
                                                @endforeach
                                            @else
                                                <p class="text-danger">No amenity reported</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        @endif
                    @else
                        <span>{{ $property->propertyContain->bedroom }}&nbsp;<i class="fa fa-home" title="Bedroom"></i></span>
                        @if ($property->type_status=='short_stay')
                        <span class="ml-3">{{ $property->propertyContain->no_bed }} &nbsp;<i class="fa fa-bed" title="Bed per room"></i></span>
                        @endif
                        @if ($property->propertyContain->kitchen==1)
                        <span class="ml-3">Private <img src="{{ asset('assets/images/kitchen.png') }}" alt="Kitchen" width="14" height="14" title="Private Kitchen"></span>
                        @elseif ($property->propertyContain->kitchen==2)
                        <span class="ml-3">Shared <img src="{{ asset('assets/images/kitchen.png') }}" alt="Kitchen" width="14" height="14" title="Shared Kitchen"></span>
                        @else
                        <span class="ml-3">0  <img src="{{ asset('assets/images/kitchen.png') }}" alt="Kitchen" width="14" height="14" title="No Kitchen"></span>
                        @endif
                        <span class="ml-3">{{ $property->propertyContain->bathroom }} {{ $property->propertyContain->bath_private? "private":"shared" }}  <i class="fas fa-bath"></i></span>
                        <span class="ml-3">{{ $property->propertyContain->toilet }} {{ $property->propertyContain->toilet_private? "private":"shared" }}  <i class="fas fa-toilet"></i></span>
                    @endif
                </div>

                {{-- Overview --}}
                <div class="pxp-single-property-section mt-4">
                    <h3>Overview</h3>
                    <div class="mt-3 mt-md-4">
                        <p>
                            {!! $property->propertyDescription->description !!}
                        </p>
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

                <!-- Amenities -->
                @if (!$property->isHostelPropertyType())
                    <hr>
                    <div class="pxp-single-property-section">
                        <h3>Amenities</h3>
                        <div class="row mt-md-4">
                            @if (count($property->propertyAmenities))
                                @foreach ($property->propertyAmenities as $amen)
                                <div class="col-sm-6 col-lg-4 mb-2">
                                    <div class=""><i class="fa fa-check-square text-success"></i> {{ $amen->name }}</div>
                                </div>
                                @endforeach
                            @else
                                <p class="text-danger"><i class="fa fa-square font-12"></i> No amenities reported on property.</p>
                            @endif
                        </div>
                    </div>
                @endif

                <!-- Shared Amenities -->
                <hr>
                <div class="pxp-single-property-section">
                    <h3>Shared Amenities</h3>
                    <div class="row mt-md-4">
                        @if (count($property->propertySharedAmenities))
                            @foreach ($property->propertySharedAmenities as $amen)
                            <div class="col-sm-6 col-lg-4 mb-2">
                                <div class=""><i class="fa fa-check-square text-success"></i> {{ $amen->name }}</div>
                            </div>
                            @endforeach
                        @else
                            <p class="text-danger ml-3"><i class="fa fa-dot-circle font-12"></i> No shared amenities reported on property.</p>
                        @endif
                    </div>
                </div>

                <hr>
                {{-- Availability --}}
                <div class="pxp-single-property-section">
                    <h3>Availability</h3>
                    @if ($property->isHostelPropertyType())
                        <p>
                            <i class="fa fa-dot-circle font-12"></i> You will get to know your room mate when booking is confirmed.
                        </p>
                        <div class="row">
                            @if (count($property->propertyHostelBlockRooms))
                                @foreach ($property->propertyHostelBlockRooms as $block)
                                <div class="col-md-6 col-lg-4">
                                    <div class="pro-order-box">
                                        <h4 class="header-title text-primary">
                                            <i class="fa fa-home text-success font-12"></i>
                                            {{ $block->propertyHostelBlock->block_name }}
                                        </h4>
                                        <p class="">
                                            <i class="fa fa-check text-success" style="font-size:9px"></i>
                                            <span>{{  $block->block_room_type  }}</span>
                                            <br>
                                            <i class="fa fa-check text-success" style="font-size:9px"></i>
                                            <span>{{ $block->gender }}</span><br>
                                            <i class="fa fa-check text-success" style="font-size:9px"></i>
                                            <span class="font-weight-bold">{{ $block->propertyHostelPrice->currency }} {{ number_format($block->propertyHostelPrice->property_price,2) }}/{{ $block->propertyHostelPrice->price_calendar }}</span><br>
                                            <i class="fa fa-check text-success" style="font-size:9px"></i>
                                            @if ($block->hostelBlockRoomNumbers->where('full', false)->count()>0)
                                            <span class="font-weight-bold">{{ $block->hostelBlockRoomNumbers->where('full', false)->count() }} room(s) available </span>
                                            @else
                                            <span class="font-weight-bold">No room available on this block </span>
                                            @endif
                                        </p>
                                    </div>
                                </div>
                                @endforeach
                            @endif
                        </div>
                    @else
                        <div class="row">
                            @if ($property->isRentProperty())
                                <div class="col-sm-12 col-lg-6">
                                    <div class="pro-order-box">
                                        <h6 class="header-title {{ !$property->isPropertyTaken() ? 'text-primary':'text-danger' }}">{{ !$property->isPropertyTaken() ? 'Available, ready for renting':'Rented, too late' }}</h6>
                                        <p class=""><i class="fa fa-check text-success font-12"></i>
                                            <span>{{ $property->propertyPrice->getPaymentDuration() }}</span>
                                            <br>
                                            <i class="fa fa-check text-success font-12"></i>
                                            <span>
                                                <b>{{ $property->propertyPrice->currency }} {{ number_format($property->propertyPrice->property_price,2) }}</b>/<small>{{ $property->propertyPrice->price_calendar }}</small>
                                            </span>
                                            <br>
                                            <i class="fa fa-check text-success font-12"></i>
                                            <span>{{ $property->getNumberOfGuest() }} {{ str_plural('Visitor', $property->getNumberOfGuest()) }}</span><br>
                                            <i class="fa fa-check text-success font-12"></i>
                                            <span>{{ $property->adult }} {{ str_plural('Adult', $property->adult) }}</span> |
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
                            @elseif ($property->isShortStayProperty())
                                <div class="col-sm-12 col-lg-6">
                                    <div class="pro-order-box">
                                        <h6 class="header-title {{ !$property->isPropertyTaken() ? 'text-primary':'text-danger' }}">{{ !$property->isPropertyTaken() ? 'Available, ready for booking':'Booked, too late' }}</h6>
                                        <p class=""><i class="fa fa-check text-success font-12"></i>
                                            <span>{{ $property->propertyPrice->getMinimumStay() }}</span>
                                            <br>
                                            <i class="fa fa-check text-success font-12"></i>
                                            <span>{{ $property->propertyPrice->getMaximumStay() }}</span><br>
                                            <i class="fa fa-check text-success font-12"></i>
                                            <span>
                                                <b>{{ $property->propertyPrice->currency }} {{ number_format($property->propertyPrice->property_price,2) }}</b>/<small>{{ $property->propertyPrice->price_calendar }}</small>
                                            </span><br>
                                            <i class="fa fa-check text-success font-12"></i>
                                            <span>{{ $property->getNumberOfGuest() }} {{ str_plural('Visitor', $property->getNumberOfGuest()) }}</span><br>
                                            <i class="fa fa-check text-success font-12"></i>
                                            <span>{{ $property->adult }} {{ str_plural('Adult', $property->adult) }}</span> |
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
                            @elseif ($property->isSaleProperty())
                                <div class="col-sm-12 col-lg-6">
                                    <div class="pro-order-box">
                                        <h6 class="header-title text-primary">Available for sale</h6>
                                        <p class="">
                                            <i class="fa fa-check text-success font-12"></i>
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
                {{-- Reviews --}}
                <div class="pxp-single-property-section">
                    <h3>Reviews</h3>
                    <!-- Reviews -->
                    @php
                        $countReview = $property->propertyReviews->count();
                        $accuracyStar = (!$countReview)? 0: $property->sumAccuracyStar()/$countReview;
                        $locationStar = (!$countReview)? 0: $property->sumLocationStar()/$countReview;
                        $securityStar = (!$countReview)? 0: $property->sumSecurityStar()/$countReview;
                        $valueStar = (!$countReview)? 0: $property->sumValueStar()/$countReview;
                        $commStar = (!$countReview)? 0: $property->sumCommunicationStar()/$countReview;
                        $tidyStar = (!$countReview)? 0: $property->sumCleanStar()/$countReview;
                        $sumReviews = $accuracyStar+$locationStar+$securityStar+$valueStar+$commStar+$tidyStar;
                    @endphp
                    @if (count($property->propertyReviews))
                        <div class="row">
                            <span class="ml-3"><i class="fa fa-star text-warning"></i> <b>{{ number_format($sumReviews/6,2) }}</b></span>
                            <span class="ml-5"><i class="fa fa-eye text-primary"></i> <b>{{ $property->propertyReviews->count() }} {{ ($property->propertyReviews->count() <= 1)? 'Review':'Reviews' }}</b></span>
                            <hr>
                            <table class="table table-responsive">
                                <tr>
                                    <td class="no-border"><i class="fa fa-thumbs-up text-primary"></i> <b class="small">Accuracy</b></td>
                                    <td class="no-border" width="120" style="padding-top: 4%!important">
                                        <div class="progress" style="height: 3px;">
                                            <div class="progress-bar bg-warning" role="progressbar" style="width: {{ round(($accuracyStar/5)*100,1) }}%;"></div>
                                        </div>
                                    </td>
                                    <td class="no-border small" style="padding-left:0px !important">{{ number_format($accuracyStar/5,1) }}</td>

                                    <td class="no-border"><i class="fas fa-map-marked text-primary"></i> <b class="small">Location</b></td>
                                    <td class="no-border" width="120" style="padding-top: 4%!important">
                                        <div class="progress" style="height: 3px;">
                                            <div class="progress-bar bg-warning" role="progressbar" style="width: {{ round(($locationStar/5)*100,1) }}%;"></div>
                                        </div>
                                    </td>
                                    <td class="no-border small" style="padding-left:0px !important">{{ number_format($locationStar/5,1) }}</td>
                                </tr>
                                <tr>
                                    <td class="no-border"><i class="mdi mdi-security text-primary"></i> <b class="small">Security</b></td>
                                    <td class="no-border" style="padding-top: 4%!important">
                                        <div class="progress" style="height: 3px;">
                                            <div class="progress-bar bg-warning" role="progressbar" style="width: {{ round(($securityStar/5)*100,1) }}%;"></div>
                                        </div>
                                    </td>
                                    <td class="no-border small" style="padding-left:0px !important">{{ number_format($securityStar/5,1) }}</td>
                                    <td class="no-border"><i class="mdi mdi-currency-usd text-primary"></i> <b class="small">Value</b></td>
                                    <td class="no-border" style="padding-top: 4%!important">
                                        <div class="progress" style="height: 3px;">
                                            <div class="progress-bar bg-warning" role="progressbar" style="width: {{ round(($valueStar/5)*100,1) }}%;"></div>
                                        </div>
                                    </td>
                                    <td class="no-border small" style="padding-left:0px !important">{{ number_format($valueStar/5,1) }}</td>
                                </tr>
                                <tr>
                                    <td class="no-border"><i class="mdi mdi-comment text-primary"></i> <b class="small">Communication</b></td>
                                    <td class="no-border" style="padding-top: 4%!important">
                                        <div class="progress" style="height: 3px;">
                                            <div class="progress-bar bg-warning" role="progressbar" style="width: {{ round(($commStar/5)*100,1) }}%;"></div>
                                        </div>
                                    </td>
                                    <td class="no-border small" style="padding-left:0px !important">{{ number_format($commStar/5,1) }}</td>
                                    <td class="no-border"><i class="fas fa-dumpster text-primary"></i> <b class="small">Cleanliness</b></td>
                                    <td class="no-border" style="padding-top: 4%!important">
                                        <div class="progress" style="height: 3px;">
                                            <div class="progress-bar bg-warning" role="progressbar" style="width: {{ round(($tidyStar/5)*100,1) }}%;"></div>
                                        </div>
                                    </td>
                                    <td class="no-border small" style="padding-left:0px !important">{{ number_format($tidyStar/5,1) }}</td>
                                </tr>
                            </table>
                            @foreach ($property->propertyReviews->sortByDesc('created_at')->take(6) as $review)
                            <div class="col-sm-6">
                                <img src="{{ (empty($review->user->image))? asset('assets/images/user.svg'):asset('assets/images/users/'.$review->user->image) }}" alt="{{ current(explode(' ',$review->user->name)) }}" width="60" height="60"  class="rounded-circle thumb-md img-left mr-3" />
                                <p>
                                    <b>{{ current(explode(' ',$review->user->name)) }}</b><br>
                                    {{ \Carbon\Carbon::parse($review->created_at)->format('F, Y') }}
                                </p>
                                <p>
                                    {{ $review->comment }}
                                </p>
                            </div>
                            <div class="col-sm-12"><hr></div>
                            @endforeach
                        </div>
                       @if ($property->propertyReviews->count() > 6)
                       <div class="small mb-5">
                            <a href="#" class="btn btn-primary btn-sm btn_review_all">View all {{ $property->propertyReviews->count() }} {{ ($property->propertyReviews->count()<=1) ? 'review':'reviews' }}</a>
                        </div>
                       @endif
                    @else
                        <p><i class="fa fa-dot-circle" style="font-size: 9px"></i> No reviews yet</p>
                        <p>Give the star {{ current(explode(' ',$property->user->name)) }}'s property deserve</p> <hr>
                    @endif
                    <!-- Refund policy -->
                    <div class="">
                        <img src="{{ asset('assets/images/form-logo.png') }}" alt="Logo" class="thumb-xs rounded-circle img-left mr-3" />
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
                        <img src="{{ (empty($property->user->image))? asset('assets/images/user.svg'):asset('assets/images/users/'.$property->user->image) }}" alt="{{ current(explode(' ',$property->user->name)) }}" class="thumb-lg rounded-circle" />
                    </div>
                    <h4><b>Owned by {{ current(explode(' ',$property->user->name)) }}</b></h4>
                    <p>{{ empty($property->user->profile->city)? 'City':$property->user->profile->city }} - Joined {{ \Carbon\Carbon::parse($property->user->created_at)->format('F, Y') }}</p>

                    @if (count($property->propertyReviews))
                        <span class="mr-5"><i class="fa fa-star text-warning"></i> <b>Overall Reviews</b></span>
                    @endif
                    <span><i class="fa fa-check-circle {{ $property->user->verify_email? 'text-success':'text-danger' }}"></i> <b>{{ $property->user->verify_email? 'Verified':'Not Verified' }}</b></span>
                    <br>   <br>
                    <a href="#" data-id="{{ $property->id }}" class="btn btn-primary btn-sm btn_show_interest"><i class="fa fa-smile"></i> Show Interest</a>
{{--                    <hr>--}}
{{--                    <div>--}}
{{--                        <p><b>Communication always happens on OShelter's platform.</b> For the protection of your payments, never make--}}
{{--                        payments outside OShelter's website and app.</p>--}}
{{--                    </div>--}}

                </div>

                <hr>
                {{-- Maps --}}
                <div class="pxp-single-property-section">
                    <h3>Explore the Area</h3>
                    <div>
                        <p>{{ $property->propertyDescription->neighbourhood }}</p>
                    </div>
                    <!-- The descriptions and directions -->
                    <div class="pxp-sp-pois-nav mt-3 mt-md-4">
                        <div class="pxp-sp-pois-nav-transportation text-uppercase">Transportation</div>
                        <div class="pxp-sp-pois-nav-restaurants text-uppercase">Restaurants</div>
                        <div class="pxp-sp-pois-nav-shopping text-uppercase">Shopping</div>
                        <div class="pxp-sp-pois-nav-cafes text-uppercase">Cafes & Bars</div>
                        <div class="pxp-sp-pois-nav-arts text-uppercase">Arts & Entertainment</div>
                        <div class="pxp-sp-pois-nav-fitness text-uppercase">Fitness</div>
                    </div>

                    <div id="pxp-sp-map" class="mt-3" data-image="{{ asset('assets/images/svg/home.png') }}"></div>

                    <p><i class="fa fa-dot-circle" style="font-size: 9px"></i>
                        Exact location is provided after {{ $property->type_status=='sale'? 'buying':'booking' }} is confirmed
                    </p>
                </div>

                {{-- property rules --}}
                @if (!$property->isSaleProperty())
                <hr>
                <div class="pxp-single-property-section">
                    <h3>Property Rules</h3>
                    <div class="row mt-md-4">
                        <!-- Property Rules -->
                        @if (count($property->propertyRules))
                            @foreach ($property->propertyRules as $rule)
                            <div class="col-sm-6 col-lg-4">
                                <p><i class="fa fa-check-square text-success font-12"></i> {{ $rule->rule }}</p>
                            </div>
                            @endforeach
                        @else
                            <div class="col-sm-6 col-lg-4">
                                <p><i class="fa fa-square font-12"></i> No rules reported on this property.</p>
                            </div>
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
                @if ($property->isHostelPropertyType())
                    <div class="card card-bordered-pink">
                        <div class="card-body" style="padding-left:10px !important; padding-right:10px !important">
                            <div class="card-heading">
                                <h6 id="myHostelPriceHeading"><strong><span id="myHostelCurrency" class="font-20"></span> <span id="initialHostelAmount"></span><span id="hyphen" style="display: none">/</span><small id="myHostelPriceCal"></small></strong></h6>
                                <div id="myHostelSwitch"><img src="{{ asset('assets/images/gif/Bars-1s-200px.gif') }}" alt="load" width="30" height="30" title="Waiting for price"></div>
                                <span class="font-12"><i class="fa fa-star text-warning"></i> <b>{{ number_format($sumReviews/6,2) }}</b> ({{ $property->propertyReviews->count() }} {{ ($property->propertyReviews->count() <= 1)? 'Review':'Reviews' }})</span>
                            </div>
                            <hr>
                            <span class="small text-primary">You're charged after booking is confirmed.</span>
                            <hr>

                            <form class="form-horizontal form-material mb-0" id="formBooking" method="POST" action="{{ route('property.bookings.submit') }}">
                                @csrf
                                <input type="hidden" name="property_id" readonly value="{{ $property->id }}">
                                <input type="hidden" name="type" readonly value="hostel">

                                <div class="row">
                                    <div class="col-sm-12 text-center">
                                        <div class="form-group">
                                            <button class="btn btn-primary btn-sm btn-block pl-5 pr-5 mt-3 btnBook"><i class="fa fa-check-circle"></i> Book this {{ $property->type }}</button>
                                            <span class="btn btn-default disabled btn-sm btn-block btnHostelBooked pl-5 pr-5 mt-3" style="display: none"> This hostel room is full</span>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div><!--end card-body-->
                    </div><!--end card-->
                @else
                    <div class="card card-bordered-pink">
                        <div class="card-body" style="padding-left:10px !important; padding-right:10px !important;">
                            <div class="card-heading">
                                <h6>
                                    <strong>
                                        <span class="font-20" id="initialCurrency" data-currency="{{ $property->propertyPrice->currency }}">{{ $property->propertyPrice->currency }}</span>
                                        <span id="initialAmount" data-amount="{{ $property->propertyPrice->property_price }}" data-duration="{{ $property->propertyPrice->payment_duration }}">{{ number_format($property->propertyPrice->property_price,2) }}</span>@if($property->type_status!='sale')/<small>{{ $property->propertyPrice->price_calendar }}</small> @endif
                                    </strong>
                                </h6>
                                <span class="font-12"><i class="fa fa-star text-warning"></i> <b>{{ number_format($sumReviews/6,2) }}</b> ({{ $property->propertyReviews->count() }} {{ ($property->propertyReviews->count() <= 1)? 'Review':'Reviews' }})</span>
                            </div>
                            <hr>
                            <span class="small text-primary">You're charged after {{ $property->type_status=='sale'? 'buying':'booking' }} is confirmed.</span>
                            <hr>
                            {{-- for rent --}}
                            @if ($property->isRentProperty())
                            <form class="form-horizontal form-material mb-0" id="formBooking" method="POST" action="{{ route('property.bookings.submit') }}">
                                @csrf
                                <input type="hidden" name="property_id" readonly value="{{ $property->id }}">
                                <input type="hidden" name="type" readonly value="rent">
                                <div class="row">
                                    <div class="col-sm-12 text-center">
                                        <div class="form-group">
                                            @if ($property->isPropertyTaken())
                                            <span class="btn btn-default disabled btn-sm btn-block pl-5 pr-5 mt-3"><i class="fa fa-check"></i> {{ ucwords(str_replace('_', ' ', $property->type)) }} is booked</span>
                                            @else
                                            <button class="btn btn-primary btn-sm btn-block pl-5 pr-5 mt-3 btnBook"><i class="fa fa-check-circle"></i> Book this {{ str_replace('_', ' ', $property->type) }}</button>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </form>

                            @elseif ($property->isShortStayProperty())
                            {{-- for short stay --}}
                            <form class="form-horizontal form-material mb-0" id="formBooking" method="POST" action="{{ route('property.bookings.submit') }}">
                                @csrf
                                <input type="hidden" name="property_id" readonly value="{{ $property->id }}">
                                <input type="hidden" name="type" readonly value="short_stay">
                                <div class="row">
                                    <div class="col-sm-12 text-center">
                                        <div class="form-group">
                                            @if ($property->isPropertyTaken())
                                            <span class="btn btn-default disabled btn-sm btn-block pl-5 pr-5 mt-3"><i class="fa fa-check"></i> {{ ucwords(str_replace('_', ' ', $property->type)) }} is booked</span>
                                            @else
                                            <button class="btn btn-primary btn-sm btn-block pl-5 pr-5 mt-3 btnBook"><i class="fa fa-check-circle"></i> Book this {{ str_replace('_', ' ', $property->type) }}</button>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </form>

                            @elseif ($property->isSaleProperty())
                            <form class="form-horizontal form-material mb-0" id="formBooking" method="POST" action="{{ route('property.bookings.submit') }}">
                                @csrf
                                <input type="hidden" name="property_id" readonly value="{{ $property->id }}">
                                <input type="hidden" name="type" readonly value="sale">

                                <div class="row">
                                    <div class="col-sm-12 text-center">
                                        <div class="form-group">
                                            <button class="btn btn-primary btn-sm btn-block pl-5 pr-5 mt-3 btnBook"><i class="fa fa-check-circle"></i> Book this {{ str_replace('_', ' ', $property->type) }}</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
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

<div class="container-fluid pxp-props-carousel-right mt-5">
    <h2 class="pxp-section-h2">Similar Properties</h2>
    @if (count($properties))
    <div class="pxp-props-carousel-right-container mt-4 mt-md-5">
        <div class="owl-carousel pxp-props-carousel-right-stage">
            @foreach ($properties as $property)
            <div>
                <a href="{{ route('single.property', $property->id) }}" class="pxp-prop-card-1-sm rounded-lg">
                    <div class="pxp-prop-card-1-fig pxp-cover" style="background-image: url({{ empty($property->propertyImages->first()->image)? asset('assets/images/properties/default.png'):asset('assets/images/properties/'.$property->propertyImages->first()->image) }});"></div>
                    <span class="on-top-save on-top m-2 btnHeart" data-id="{{ $property->id }}" data-url="{{ route('saved.submit') }}">
                        @auth
                        <span class="fa fa-heart {{ (Auth::user()->userSavedProperties()->whereProperty_id($property->id)->count()>0)? 'text-pink':'text-primary' }} heart-hover"></span>
                        @else
                        <span class="fa fa-heart text-primary heart-hover"></span>
                        @endauth
                    </span>
                    <span class="text-white on-top-tag on-top font-12">
                        @if ($property->type_status=='rent')
                            For Rent
                        @elseif($property->type_status=='sale')
                            For Sale
                        @elseif($property->type_status=='auction')
                            Auction
                        @else
                            Short Stay
                        @endif
                    </span>
                </a>
                <div class="mt-2">
                    @if (count($property->propertyReviews))
                    <div><i class="fa fa-star text-warning"></i> <b>{{ number_format($sumReviews/6,2) }}</b></div>
                    @else
                    <div class="text-muted font-13">No review yet</div>
                    @endif
                    <div class="">{{ $property->getPropertyType() }}
                    @if ($property->type=='hostel')
                        <small> {{ $property->propertyHostelBlockRooms()->sum('block_no_room') }} {{ str_plural('bedroom', $property->propertyHostelBlockRooms()->sum('block_no_room')) }}</small>
                    @else
                        <small> {{ $property->getBedRooms() }}</small>
                    @endif
                    </div>
                    <div class="">{{ $property->title }}</div>
                    @if($property->type=='hostel')
                    <div><strong>{{ $property->propertyHostelBlockRooms()->sum('block_no_room') }}</strong> {{ str_plural('room', $property->propertyHostelBlockRooms()->sum('block_no_room')) }}</div>
                    @else
                    <div><strong>{{ $property->propertyPrice->currency }}{{ number_format($property->propertyPrice->property_price,2) }}</strong> @if($property->type_status!='sale') <small> / {{ $property->propertyPrice->price_calendar }}</small> @endif</div>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @else
    <p class="text-danger">No property available</p>
    @endif
</div>


<!-- id modal -->
<div id="reviewModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="reviewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">??</button>
            </div>
            <div class="modal-body">
                <div class="row pt-3">
                    <div class="col-sm-5">
                        @if (count($property->propertyReviews))
                        <h4 class="ml-3">
                            <i class="fa fa-star text-warning"></i> <b>{{ number_format($sumReviews/6,2) }}</b>
                            <span class="ml-5"><i class="fa fa-eye text-primary"></i> <b>{{ $property->propertyReviews->count() }} {{ ($property->propertyReviews->count() <= 1)? 'Review':'Reviews' }}</b></span>
                        </h4>
                        <table class="table table-responsive">
                            <tr>
                                <td class="no-border"><i class="fa fa-thumbs-up text-primary"></i> <b class="small">Accuracy</b></td>
                                <td class="no-border" width="120" style="padding-top: 8%!important">
                                    <div class="progress" style="height: 3px;">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: {{ round(($accuracyStar/5)*100,1) }}%;"></div>
                                    </div>
                                </td>
                                <td class="no-border small" style="padding-left:0px !important">{{ number_format($accuracyStar/5,1) }}</td>
                            </tr>
                            <tr>
                                <td class="no-border"><i class="fas fa-map-marked text-primary"></i> <b class="small">Location</b></td>
                                <td class="no-border" width="120" style="padding-top: 8%!important">
                                    <div class="progress" style="height: 3px;">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: {{ round(($locationStar/5)*100,1) }}%;"></div>
                                    </div>
                                </td>
                                <td class="no-border small" style="padding-left:0px !important">{{ number_format($locationStar/5,1) }}</td>
                            </tr>

                            <tr>
                                <td class="no-border"><i class="mdi mdi-security text-primary"></i> <b class="small">Security</b></td>
                                <td class="no-border" style="padding-top: 8%!important">
                                    <div class="progress" style="height: 3px;">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: {{ round(($securityStar/5)*100,1) }}%;"></div>
                                    </div>
                                </td>
                                <td class="no-border small" style="padding-left:0px !important">{{ number_format($securityStar/5,1) }}</td>
                            </tr>

                            <tr>
                                <td class="no-border"><i class="mdi mdi-currency-usd text-primary"></i> <b class="small">Value</b></td>
                                <td class="no-border" style="padding-top: 8%!important">
                                    <div class="progress" style="height: 3px;">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: {{ round(($valueStar/5)*100,1) }}%;"></div>
                                    </div>
                                </td>
                                <td class="no-border small" style="padding-left:0px !important">{{ number_format($valueStar/5,1) }}</td>
                            </tr>
                            <tr>
                                <td class="no-border"><i class="mdi mdi-comment text-primary"></i> <b class="small">Communication</b></td>
                                <td class="no-border" style="padding-top: 8%!important">
                                    <div class="progress" style="height: 3px;">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: {{ round(($commStar/5)*100,1) }}%;"></div>
                                    </div>
                                </td>
                                <td class="no-border small" style="padding-left:0px !important">{{ number_format($commStar/5,1) }}</td>
                            </tr>
                            <tr>
                                <td class="no-border"><i class="fas fa-dumpster text-primary"></i> <b class="small">Cleanliness</b></td>
                                <td class="no-border" style="padding-top: 8%!important">
                                    <div class="progress" style="height: 3px;">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: {{ round(($tidyStar/5)*100,1) }}%;"></div>
                                    </div>
                                </td>
                                <td class="no-border small" style="padding-left:0px !important">{{ number_format($tidyStar/5,1) }}</td>
                            </tr>
                        </table>
                        @endif
                    </div>
                    <div class="col-sm-7">
                        <div style="overflow-y:scroll; height:800px;">
                            @foreach ($property->propertyReviews->sortByDesc('created_at')->take(6) as $review)
                            <div class="mb-1">
                                <img src="{{ (empty($review->user->image))? asset('assets/images/user.svg'):asset('assets/images/users/'.$review->user->image) }}" alt="{{ current(explode(' ',$review->user->name)) }}" width="60" height="60"  class="rounded-circle thumb-md img-left mr-3" />
                                <p>
                                    <b>{{ $review->user->name }}</b><br>
                                    <span class="text-muted">{{ \Carbon\Carbon::parse($review->created_at)->format('F, Y') }}</span>
                                </p>
                                <p>
                                    {{ $review->comment }}
                                </p>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- id modal -->
<div id="showInterestModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="showInterestModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">??</button>
            </div>
            <div class="modal-body">
                <form action="{{ route('show.interest') }}" id="formShowInterest">
                    <input type="hidden" name="property_id" value="" readonly>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" placeholder="Enter your fullname">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <input type="tel" class="form-control" name="phone" maxlength="10" onkeypress="return isNumber(event);" placeholder="Enter your phone number">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <button class="btn btn-primary btn-block btnSubmitShowInterest">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="pswp__bg"></div>
    <div class="pswp__scroll-wrap">
        <div class="pswp__container">
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
        </div>
        <div class="pswp__ui pswp__ui--hidden">
            <div class="pswp__top-bar">
                <div class="pswp__counter"></div>
                <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
                <button class="pswp__button pswp__button--share" title="Share"></button>
                <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
                <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
                <div class="pswp__preloader">
                    <div class="pswp__preloader__icn">
                        <div class="pswp__preloader__cut">
                            <div class="pswp__preloader__donut"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                <div class="pswp__share-tooltip"></div>
            </div>
            <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button>
            <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>
            <div class="pswp__caption">
                <div class="pswp__caption__center"></div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script src="{{ asset('assets/light/js/photoswipe.min.js') }}"></script>
<script src="{{ asset('assets/light/js/photoswipe-ui-default.min.js') }}"></script>
<script src="{{ asset('assets/light/js/jquery.sticky.js') }}"></script>
<script src="{{ asset('assets/light/js/gallery.js') }}"></script>
<script src="{{ asset('assets/light/js/infobox.js') }}"></script>
<script src="{{ asset('assets/pages/website/single-map.js') }}"></script>
<script src="{{ asset('assets/light/js/owl.carousel.min.js') }}"></script>
<script>
    $("#formBooking").on('submit', function(e){
        e.stopPropagation();
        var $this = $(this);
        var valid = true;
        if(valid){
            $("#formBooking .btnBook").html('<i class="fa fa-spin fa-spinner"></i> Booking...').attr('disabled', true);
            return true;
        }
        return false;
    });

    $(".btn_review_all").on("click", function(){
        $("#reviewModal").modal('show');
        return false;
    });

    $(".btn_show_interest").on("click", function(){
        $('#formShowInterest input[name="property_id"]').val($(this).data('id'));
        $("#showInterestModal").modal('show');
        return false;
    });



    $("#formShowInterest").on("submit", function(e){
        e.preventDefault();
        e.stopPropagation();
        var $this = $(this);
        var valid = true;
        $('#formShowInterest input').each(function() {
            var $this = $(this);

            if(!$this.val()) {
                valid = false;
                $this.parents('.validate').find('.mySpan').text('The '+$this.attr('name').replace(/[\_]+/g, ' ')+' field is required');
            }
        });

        if(valid){
            let data = $this.serialize();
            $("#formShowInterest .btnSubmitShowInterest").html('<i class="fa fa-spinner fa-spin"></i> Submitting...').attr('disabled', true);
            $.ajax({
                url: $this.attr('action'),
                type: "POST",
                data: data,
                success: function(resp){
                    if(resp == 'success'){
                        swal({
                                title: "Submitted",
                                text: "Your interest in this property is submitted.",
                                type: "success",
                                confirmButtonClass: "btn-primary btn-sm",
                                confirmButtonText: "Okay",
                                closeOnConfirm: true
                            },
                            function(){
                                $("#showInterestModal").modal('hide');
                                $("#formShowInterest .btnSubmitShowInterest").text('Submit').attr('disabled', false);
                                $("#formShowInterest input").val('');
                            });
                    }else{
                        swal("Warning", resp, "warning");
                        $("#formShowInterest .btnSubmitShowInterest").text('Submit').attr('disabled', false);
                    }
                },
                error: function(resp){
                    console.log("Something went wrong with request");
                }
            });
        }
        return false;
    });


    function isNumber(evt) {
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            return false;
        }
        return true;
    }

</script>
@endsection
