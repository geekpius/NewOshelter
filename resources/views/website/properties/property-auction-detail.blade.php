@extends('layouts.site')

@section('style')
<link rel="stylesheet" href="{{ asset('assets/light/css/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/light/css/owl.theme.default.min.css') }}">
@endsection

@section('content')

<div class="pxp-content">

    <div class="pxp-single-property-top pxp-content-wrapper mt-5">
        <div class="container">
            <div class="row">
                <div class="col-sm-7">
                    <div class="pxp-sp-top-btns">
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

    <div class="container mt-4">
        <div class="row">
            <div class="col-sm-12">
                <!-- Title and Location -->
                <div class="img-right mr-lg-5 mr-sm-5 text-center">
                    <img src="{{ (empty($property->user->image))? asset('assets/images/user.svg'):asset('assets/images/users/'.$property->user->image) }}" alt="{{ current(explode(' ',$property->user->name)) }}" class="thumb-md rounded-circle" />
                    <p>{{ current(explode(' ',$property->user->name)) }}</p>
                </div>
                <h2 class="pxp-sp-top-title">{{ $property->title }}</h2>
                <p class="pxp-sp-top-address pxp-text-light hidden" data-latitude="{{ $property->propertyLocation->latitude }}" data-longitude="{{ $property->propertyLocation->longitude }}"> <i class="fa fa-map-marker text-success"></i> </p>
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
                    <p><i class="fa fa-home text-success"></i> <b>{{ ucfirst(strtolower($property->propertyContain->furnish)) }} &nbsp;{{ ucwords(str_replace('_',' ',$property->type)) }}</b></p>
                    @else
                    <p>
                        <i class="fa fa-home text-success"></i>
                        <b>{{ ucfirst(strtolower($property->propertyContain->furnish)) }} &nbsp;{{ ucwords(str_replace('_',' ',$property->type)) }} in {{ strtolower($property->base) }}</b></p>
                    @endif

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
                </div>

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
                        Exact location is provided after booking for auctioning event is confirmed
                    </p>
                </div>
            </div>

            {{-- Booking form --}}
            <div class="col-lg-4">
                <div class="pxp-single-property-section pxp-sp-agent-section mt-4 mt-md-5 mt-lg-0">
                    <div class="card card-bordered-pink">
                        <div class="card-body" style="padding-left:10px !important; padding-right:10px !important;">
                            <h6 class="text-center text-primary">Book for the action event</h6>
                            <span><strong>Date:</strong> {{ $property->propertyAuctionSchedule->auctionDate()?? 'Not Set' }}</span>
                            <br>
                            <span><strong>Time:</strong> {{ $property->propertyAuctionSchedule->auctionTime()?? 'Not Set' }}</span>
                            <form class="form-horizontal form-material mb-0" id="formEvent" method="POST" action="{{ route('property.bookings.submit') }}">
                                @csrf
                                <input type="hidden" name="property_id" readonly value="{{ $property->id }}">
                                <input type="hidden" name="type" readonly value="auction">

                                <div class="row">
                                    <div class="col-sm-12 text-center">
                                        <div class="form-group">
                                            <button class="btn btn-primary btn-sm btn-block pl-5 pr-5 mt-3 btnEvent" {{$property->propertyAuctionSchedule->auctionDate()?? 'disabled'}}><i class="fas fa-pen"></i> Book Event</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div><!--end card-body-->
                    </div><!--end card-->

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
                    <div class="pxp-prop-card-1-fig pxp-cover" style="background-image: url({{ asset('assets/images/properties/default.png') }});"></div>
                    <span class="text-white on-top-tag on-top font-12">Auction</span>
                </a>
                <div class="mt-2">
                    @if (count($property->propertyReviews))
                    <div><i class="fa fa-star text-warning"></i> <b>{{ number_format($sumReviews/6,2) }}</b></div>
                    @else
                    <div class="text-muted font-13">No review yet</div>
                    @endif
                    <div class="">{{ $property->getPropertyType() }}
                    <small> {{ $property->getBedRooms() }}</small>
                    </div>
                    <div class="">{{ $property->title }}</div>

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
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
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

@endsection

@section('scripts')
<script src="{{ asset('assets/light/js/jquery.sticky.js') }}"></script>
<script src="{{ asset('assets/light/js/infobox.js') }}"></script>
<script src="{{ asset('assets/pages/website/single-map.js') }}"></script>
<script src="{{ asset('assets/light/js/owl.carousel.min.js') }}"></script>
<script>
    $(".btn_review_all").on("click", function(){
        $("#reviewModal").modal('show');
        return false;
    });

    $("#formEvent").on('submit', function(e){
        e.stopPropagation();
        var valid = true;
        if(valid){
            $(".btnEvent").html('<i class="fa fa-spin fa-spinner"></i> Booking event...').attr('disabled', true);
            return true;
        }
        return false;
    });

</script>
@endsection
