@extends('layouts.site')

@section('style')
<link rel="stylesheet" href="{{ asset('assets/light/css/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/light/css/owl.theme.default.min.css') }}">
@endsection

@section('content')

<div class="pxp-content pull-content-down">
    <div class="container">
        <h2>About Us</h2>  
        <p>
           Let's tell you about us
        </p>
        <div id="" class="pt-4">
            <div class="row">
                <div class="col-sm-12">
                    <p>
                        Oshelter is committed to employing avant technologies to give everyone the chance to live in a serene and comfortable place worth 
                        occupying. Our customers are our cherished priority; therefore, we have a team of highly meticulous, well-trained and friendly 
                        professionals who have a great understanding of the real estate industry in Ghana to always assist them.
                        We are uniquely positioned to offer the best services to both existing and prospective clients to match them with the right homes and 
                        properties which serve their taste and aspirations. With our impressive track record of success in marketing properties, Oshelter thrives 
                        on referrals and recommendations. Whether we are <strong><i>selling, letting or helping you rent,</i></strong> we resort to the widest and skillful marketing and 
                        negotiation options to get the very best price attained for our clients.
                        We have a full-service offering including auctioning, selling, booking or renting helping you find a room hassle-free, away from the 
                        gimmicks of dishonest agents and property owners. 
                        OShelter never misses an opportunity to give you, our clients, an insightful experience worth celebrating. 
                    </p>
                    <h5><strong>Mission</strong></h5>
                    <p>To leave our clients thoroughly satisfied and content.</p>
                    
                    <h5><strong>Vision</strong></h5>
                    <p>
                        To become one of the most reliable and leading real estate companies, providing world class services which meet the requests and taste 
                        of our clients.
                    </p>

                    <h5><strong>Cores Values</strong></h5>
                    <ol type="i">
                        <li><strong>Integrity</strong></li>
                        <p>Our work and dealings are based on trustworthiness and strong ethical principles</p>
                        <li><strong>Competence</strong></li>
                        <p>We offer reliable advice and guidance based on our many years of experience and research to enable our clients to make the right decisions that accrue to their profit</p>
                        <li><strong>Quality Customer service</strong></li>
                        <p>Keeping our clients fulfilled is our core motivation for existence and so we take advantage of opportunities to deliver outstanding services</p>
                        <li><strong>Team Work</strong></li>
                        <p>Every member of the team is committed to the good of our clients and our business model.</p>
                        <li><strong>Prompt delivery</strong></li>
                        <p>We don’t give excuses; we keep to the deadlines and deliver.</p>
                        <li><strong>Versatility</strong></li>
                        <p>We adapt to the varied needs and dreams of our clients and provide tailored options to cater to these individual prerequisites and aspirations.</p>
                    </ol>
                </div>
            </div>
        </div>
        <hr>
    </div>   
    
    <div class="container-fluid pxp-props-carousel-right mt-5">
        <h2 class="pxp-section-h2">Featured Properties</h2>
        <div class="pxp-props-carousel-right-container mt-4 mt-md-5">
            <div class="owl-carousel pxp-props-carousel-right-stage">
                @foreach ($properties as $property)
                <div>
                    <a href="{{ route('single.property', $property->id) }}" class="pxp-prop-card-1-sm rounded-lg">
                        <div class="pxp-prop-card-1-fig pxp-cover" style="background-image: url({{ asset('assets/images/properties/'.$property->propertyImages->first()->image) }});"></div>
                        <span class="on-top-save on-top m-2 btnHeart" data-id="{{ $property->id }}" data-url="{{ route('saved.submit') }}">
                            @auth
                            <span class="fa fa-heart {{ (Auth::user()->userSavedProperties()->whereProperty_id($property->id)->count()>0)? 'text-pink':'text-primary' }} heart-hover"></span>
                            @else
                            <span class="fa fa-heart text-primary heart-hover"></span>
                            @endauth
                        </span>
                        <span class="text-white on-top-tag on-top font-12"> 
                            @if ($property->type_status=='rent')
                                Rent
                            @elseif($property->type_status=='sell')
                                Sale
                            @elseif($property->type_status=='auction')
                                Auction
                            @else
                                Short Stay
                            @endif
                        </span>
                    </a>
                    <div class="mt-2">
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
                        <div><strong>{{ $property->propertyPrice->currency }}{{ number_format($property->propertyPrice->property_price,2) }}</strong><small> / {{ $property->propertyPrice->price_calendar }}</small></div>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('assets/light/js/owl.carousel.min.js') }}"></script>
@endsection