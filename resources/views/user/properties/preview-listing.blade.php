@extends('layouts.site')

@section('style')
<link rel="stylesheet" href="{{ asset('assets/light/css/photoswipe.css') }}">
<link rel="stylesheet" href="{{ asset('assets/light/css/default-skin/default-skin.css') }}">
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
</style>
@endsection

@section('content')

<div class="pxp-content pull-content-down">
    <div class="container">
        <h2>Preview Mode</h2>
        <p>
            <strong>{{ Auth::user()->name }},</strong> listings
        </p>
        @if (!$property->isDoneStep())
        <div class="text-center mt-3">
            <a href="javascript:void(0);" onclick="window.location='{{ route('property.create', $property->id) }}';" class="mr-4 text-pink text-decoration-none"><i class="fa fa-heart"></i> Save</a>
            <a href="javascript:void(0);" onclick="event.preventDefault(); document.getElementById('formFinishListing').submit();" class="ml-4 text-success text-decoration-none"><i class="fa fa-arrow-right"></i> Finish & Publish</a>
            <form id="formFinishListing" method="POST" action="{{ route('property.store') }}" style="display:none !important">
                @csrf
                <input type="hidden" name="step" value="9" readonly>
                <input type="hidden" name="property_id" value="{{ $property->id }}" readonly>
            </form>
            {{-- <a href="#shareModal" data-toggle="modal" data-backdrop="static" class="ml-2 text-pink"><i class="fa fa-share"></i> Share</a> --}}
        </div>
        @endif
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
            <div class="col-lg-12">
                {{-- Key details --}}
                <div class="pxp-single-property-section">
                    <h3>Key Details</h3>

                    <!-- Contained amenities -->
                    @if(strtolower($property->type) == 'house' && strtolower($property->base) == 'house')
                    <p><i class="fa fa-home text-success"></i> <b>@if(!$property->isHostelPropertyType()){{ ucfirst(strtolower($property->propertyContain->furnish)) }} &nbsp;@endif{{ ucwords(str_replace('_',' ',$property->type)) }}</b></p>
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
                                            {{ $block->propertyHostelBlock->block_name }}
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
                        @if ($property->isShortStayProperty())
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

                @if (!$property->isHostelPropertyType())
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
                            <i class="fa fa-square font-12"></i> You will get to know your room mate when renting is confirmed.
                        </p>
                        <div class="row">
                            @if (count($property->propertyHostelBlockRooms))
                                @foreach ($property->propertyHostelBlockRooms as $block)
                                <div class="col-md-6 col-lg-4">
                                    <div class="pro-order-box">
                                        <h4 class="header-title text-primary">
                                            <i class="fa fa-home text-success font-12"></i>
                                            {{  $block->propertyHostelBlock->block_name  }}
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
                            @else
                                <div class="col-sm-12 col-lg-6">
                                    <div class="pro-order-box">
                                        <i class="fa fa-user-circle text-primary"></i>
                                        <h4 class="header-title">Some Title</h4>
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
                        <img src="{{ (empty($property->user->image))? asset('assets/images/user.svg'):asset('assets/images/users/'.$property->user->image) }}" alt="{{ current(explode(' ',$property->user->name)) }}" class="thumb-md rounded-circle" />
                    </div>
                    <h4><b>Owned by {{ current(explode(' ',$property->user->name)) }}</b></h4>
                    <p>{{ empty($property->user->profile->city)? 'City':$property->user->profile->city }} - Joined {{ \Carbon\Carbon::parse($property->user->created_at)->format('F, Y') }}</p>

                    @if (count($property->propertyReviews))
                        <span class="mr-5"><i class="fa fa-star text-warning"></i> <b>Overall Reviews</b></span>
                    @endif
                    <span><i class="fa fa-check-circle {{ $property->user->verify_email? 'text-success':'text-danger' }}"></i> <b>{{ $property->user->verify_email? 'Verified':'Not Verified' }}</b></span>
                    <br>   <br>
                    <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-smile"></i> Show Interest</a>
                    

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
        </div>
    </div>

</div>

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
@endsection
