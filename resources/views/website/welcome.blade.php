@extends('layouts.site')

@section('style')
<link rel="stylesheet" href="{{ asset('assets/light/css/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/light/css/owl.theme.default.min.css') }}">
@endsection

@section('content')

<div class="pxp-content">
    <div class="pxp-hero vh-100">
        <div class="pxp-hero-bg pxp-cover pxp-cover-bottom" style="background-image: url({{ asset('assets/light/images/bg.jpg') }});"></div>
        <div class="pxp-hero-opacity"></div>
        <div class="pxp-hero-caption">
            <div class="container">
                <h1 class="text-white text-capitalize">Find your future home</h1>

                <form class="pxp-hero-search mt-4" autocomplete="off" action="{{ route('browse.property.search') }}" method="GET" id="formSearch">
                    <input type="hidden" name="query_id" value="{{ str_random(32) }}" readonly>
                    <div class="row">
                        <div class="col-sm-12 col-md-3">
                            <div class="form-group">
                                <select class="custom-select" name="status" id="status">
                                    <option value="rent" selected>Rent</option>
                                    <option value="short_stay">Short Stay</option>
                                    <option value="sale">Sale</option>
                                    {{-- <option value="auction">Auction</option> --}}
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group autocomplete">
                                <input type="text" name="location" id="search_input" class="form-control pxp-is-address" placeholder="Search location...">
                                <span class="fa fa-map-marker"></span>
                            </div>
                        </div>
                        <input type="hidden" name="query_param" value="simple" readonly>
                        <div class="col-sm-12 col-md-3">
                            <div class="form-group">
                                <button class="btn btn-info form-control"><i class="fa fa-search"></i> Search</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- <div class="container-fluid pxp-props-carousel-right mt-100">
        <h2 class="pxp-section-h2">We've made it simple</h2>
        <p class="pxp-text-light">Narrow down your filtering complexity</p>
        <div class="pxp-props-carousel-right-container mt-4 mt-md-5">
            <div class="owl-carousel pxp-props-carousel-right-stage">
                <div>
                    <a href="{{ route('status.property', 'short-stay') }}" class="pxp-areas-1-item rounded-lg">
                        <div class="pxp-areas-1-item-fig pxp-cover" style="background-image: url({{ asset('https://cdn.pixabay.com/photo/2017/12/10/03/18/beautiful-3009151__340.jpg') }});"></div>
                        <div class="pxp-areas-1-item-details">
                            <div class="pxp-areas-1-item-details-area">Short Stay</div>
                        </div>
                        <div class="pxp-areas-1-item-counter"><span class="text-primary">
                        @php $propCount = App\PropertyModel\Property::whereType_status('short_stay')->whereDone_step(true)->count(); @endphp  
                        {{ $propCount. ' Properties' }}
                        </span></div>
                        <div class="pxp-areas-1-item-cta text-uppercase font-10">Explore</div>
                    </a>
                </div>
                <div>
                    <a href="{{ route('status.property', 'rent') }}" class="pxp-areas-1-item rounded-lg">
                        <div class="pxp-areas-1-item-fig pxp-cover" style="background-image: url({{ asset('https://cdn.pixabay.com/photo/2016/05/21/21/52/house-1407562__340.jpg') }});"></div>
                        <div class="pxp-areas-1-item-details">
                            <div class="pxp-areas-1-item-details-area">Rent</div>
                        </div>
                        <div class="pxp-areas-1-item-counter"><span class="text-primary">
                        @php $propCount = App\PropertyModel\Property::whereType_status('rent')->whereDone_step(true)->count(); @endphp  
                        {{ $propCount. ' Properties' }}
                        </span></div>
                        <div class="pxp-areas-1-item-cta text-uppercase font-10">Explore</div>
                    </a>
                </div>
                 <div>
                    <a href="{{ route('status.property', 'sell') }}" class="pxp-areas-1-item rounded-lg">
                        <div class="pxp-areas-1-item-fig pxp-cover" style="background-image: url({{ asset('assets/images/area-1.jpg') }});"></div>
                        <div class="pxp-areas-1-item-details">
                            <div class="pxp-areas-1-item-details-area">Sell</div>
                        </div>
                        <div class="pxp-areas-1-item-counter"><span class="text-primary">
                        @php $propCount = App\PropertyModel\Property::whereType_status('sell')->whereDone_step(true)->count(); @endphp  
                        {{ $propCount. ' Properties' }}
                        </span></div>
                        <div class="pxp-areas-1-item-cta text-uppercase font-10">Explore</div>
                    </a>
                </div>
                <div>
                    <a href="{{ route('status.property', 'auction') }}" class="pxp-areas-1-item rounded-lg">
                        <div class="pxp-areas-1-item-fig pxp-cover" style="background-image: url({{ asset('assets/images/area-1.jpg') }});"></div>
                        <div class="pxp-areas-1-item-details">
                            <div class="pxp-areas-1-item-details-area">Auction</div>
                        </div>
                        <div class="pxp-areas-1-item-counter"><span class="text-primary">
                        @php $propCount = App\PropertyModel\Property::whereType_status('auction')->whereDone_step(true)->count(); @endphp  
                        {{ $propCount. ' Properties' }}
                        </span></div>
                        <div class="pxp-areas-1-item-cta text-uppercase font-10">Explore</div>
                    </a>
                </div> 
            </div>
        </div>
    </div> --}}

    <div class="container-fluid pxp-props-carousel-right mt-5">
        <h2 class="pxp-section-h2">Browse Properties Faster</h2>
        <p class="pxp-text-light">Browse our listing categories</p>
        <div class="pxp-props-carousel-right-container mt-4 mt-md-5">
            <div class="owl-carousel pxp-props-carousel-right-stage">
                <div>
                    <a href="{{ route('status.property', 'rent') }}" class="pxp-prop-card-1-sm rounded-lg">
                        <div class="pxp-prop-card-1-fig pxp-cover" style="background-image: url({{ asset('assets/images/forrent.jpg') }});"></div>
                        <span class="text-white on-top-tag on-top font-12">{{ $count_rent }} <small>{{ str_plural('property', $count_rent) }}</small></span>
                    </a>
                    <div class="mt-2">
                        <div><p class="font-weight-bold">For Rent</p></div>
                    </div>
                </div>
                <div>
                    <a href="{{ route('status.property', 'short-stay') }}" class="pxp-prop-card-1-sm rounded-lg">
                        <div class="pxp-prop-card-1-fig pxp-cover" style="background-image: url({{ asset('assets/images/shortstay.jpg') }});"></div>
                        <span class="text-white on-top-tag on-top font-12">{{ $count_short_stay }} <small>{{ str_plural('property', $count_short_stay) }}</small></span>
                    </a>
                    <div class="mt-2">
                        <div><p class="font-weight-bold">Short Stay</p></div>
                    </div>
                </div>
                <div>
                    <a href="{{ route('status.property', 'sale') }}" class="pxp-prop-card-1-sm rounded-lg">
                        <div class="pxp-prop-card-1-fig pxp-cover" style="background-image: url({{ asset('assets/images/forsale.jpg') }});"></div>
                        <span class="text-white on-top-tag on-top font-12">{{ $count_sale }} <small>{{ str_plural('property', $count_sale) }}</small></span>
                    </a>
                    <div class="mt-2">
                        <div><p class="font-weight-bold">For Sale</p></div>
                    </div>
                </div>
                <div>
                    <a href="{{ route('status.property', 'auction') }}" class="pxp-prop-card-1-sm rounded-lg">
                        <div class="pxp-prop-card-1-fig pxp-cover" style="background-image: url({{ asset('assets/images/auction.jpg') }});"></div>
                        <span class="text-white on-top-tag on-top font-12">{{ $count_auction }} <small>{{ str_plural('property', $count_auction) }}</small></span>
                    </a>
                    <div class="mt-2">
                        <div><p class="font-weight-bold">For Auction</p></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid pxp-props-carousel-right mt-100">
        <h2 class="pxp-section-h2">Explore Our Neighborhoods</h2>
        <p class="pxp-text-light">Browse our comprehensive listing types</p>
        <div class="pxp-props-carousel-right-container mt-4 mt-md-5">
            <div class="owl-carousel pxp-props-carousel-right-stage">
                @foreach ($types as $type)
                @php $propCount = $type->getPropertyCount(); @endphp  
                <div>
                    <a href="{{ route('type.property', strtolower(str_replace(' ','-',$type->name))) }}" class="pxp-areas-1-item rounded-lg">
                        @php $image = empty($type->image)? 'area-1.jpg':'types/'.$type->image; @endphp
                        <div class="pxp-areas-1-item-fig pxp-cover" style="background-image: url({{ 'https://portal.oshelter.com/assets/images/'.$image }});"></div>
                        <div class="pxp-areas-1-item-details">
                            <div class="pxp-areas-1-item-details-area">
                                {{ str_plural($type->name) }}
                                <span class="font-10 text-muted total-properties">({{ $propCount }} {{ str_plural("Property",$propCount) }})</span>
                            </div>
                        </div>
                        <div class="pxp-areas-1-item-counter">
                            <span class="text-primary">
                            {{ $propCount }} {{ str_plural("Property",$propCount) }}
                            </span>
                        </div>
                        <div class="pxp-areas-1-item-cta text-uppercase font-10">Explore</div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="container-fluid pxp-props-carousel-right mt-100">
        <h2 class="pxp-section-h2">Featured Properties</h2>
        <p class="pxp-text-light">Browse our latest hot offers</p>
        <div class="pxp-props-carousel-right-container mt-4 mt-md-5">
            <div class="owl-carousel pxp-props-carousel-right-stage">
                @foreach ($properties as $property)
                <div>
                    <a href="{{ route('single.property', $property->id) }}" class="pxp-prop-card-1 rounded-lg">
                        <div class="pxp-prop-card-1-fig pxp-cover" style="background-image: url({{ empty($property->propertyImages->first()->image)? asset('assets/images/properties/default.png') :asset('assets/images/properties/'.$property->propertyImages->first()->image) }});"></div>
                        <span class="on-top-save on-top m-2 btnHeart" data-id="{{ $property->id }}" data-url="{{ route('saved.submit') }}">
                            @auth
                            <span class="fa fa-heart {{ (Auth::user()->userSavedProperties()->whereProperty_id($property->id)->count()>0)? 'text-pink':'text-primary' }} heart-hover"></span>
                            @else
                            <span class="fa fa-heart text-primary heart-hover"></span>
                            @endauth
                        </span>
                        <div class="pxp-prop-card-1-gradient pxp-animate"></div>
                        <div class="pxp-prop-card-1-details">
                            <div class="pxp-prop-card-1-details-title">{{ $property->title }}</div>
                            @if($property->type=='hostel')
                            <div class="pxp-prop-card-1-details-price">{{ $property->propertyHostelBlockRooms()->sum('block_no_room') }} {{ str_plural('Room', $property->propertyHostelBlockRooms()->sum('block_no_room')) }}</div>                                
                            @else
                            <div class="pxp-prop-card-1-details-price">{{ $property->propertyPrice->currency }}{{ number_format($property->propertyPrice->property_price,2) }}@if($property->type_status!='sale')<small>/{{ $property->propertyPrice->price_calendar }}</small>@endif</div>                                
                            @endif
                            <span class="fa fa-tag text-white pull-right"> 
                                <strong>
                                @if ($property->type_status=='rent')
                                    For Rent
                                @elseif($property->type_status=='sale')
                                    For Sale
                                @elseif($property->type_status=='auction')
                                    Auction
                                @else
                                    Short Stay
                                @endif
                                </strong>
                            </span>
                            @if($property->type=='hostel')
                            <div class="pxp-prop-card-1-details-features text-uppercase"> <span>{{ $property->propertyLocation->location }} <i class="fa fa-map-marker"></i> </span></div>
                            @else
                            <div class="pxp-prop-card-1-details-features text-uppercase">{{ $property->propertyContain->bedroom }} <i class="fa fa-home"></i> <span>|</span> {{ $property->propertyContain->bathroom }} <i class="fas fa-bath"></i> <span>|</span> {{ $property->propertyContain->toilet }} <i class="fas fa-toilet"></i> </div>
                            @endif
                        </div>
                        <div class="pxp-prop-card-1-details-cta text-uppercase">View Details</div>
                    </a>
                </div>
                @endforeach

            </div>

        </div>
    </div>

    
    <div class="pxp-services pxp-cover mt-100 pt-100 mb-200" style="background-image: url({{ asset('assets/light/images/services-h-fig.jpg') }});">
        <h2 class="text-center pxp-section-h2">Why Choose Us</h2>
        <p class="pxp-text-light text-center">We offer perfect real estate services</p>

        <div class="container">
            <div class="pxp-services-container rounded-lg mt-4 mt-md-5">
                <a href="#" class="pxp-services-item">
                    <div class="pxp-services-item-fig">
                        <img src="{{ asset('assets/light/images/service-icon-1.svg') }}" alt="property">
                    </div>
                    <div class="pxp-services-item-text text-center">
                        <div class="pxp-services-item-text-title">Find your future home</div>
                        <div class="pxp-services-item-text-sub">We help you find a new home by offering<br>a smart real estate experience</div>
                    </div>
                    <div class="pxp-services-item-cta text-uppercase text-center">Learn More</div>
                </a>
                {{-- <a href="agents.html" class="pxp-services-item">
                    <div class="pxp-services-item-fig">
                        <img src="{{ asset('assets/light/images/service-icon-2.svg') }}" alt="...">
                    </div>
                    <div class="pxp-services-item-text text-center">
                        <div class="pxp-services-item-text-title">Experienced agents</div>
                        <div class="pxp-services-item-text-sub">Find an agent who knows<br>your market best</div>
                    </div>
                    <div class="pxp-services-item-cta text-uppercase text-center">Learn More</div>
                </a> --}}
                <a href="#" class="pxp-services-item">
                    <div class="pxp-services-item-fig">
                        <img src="{{ asset('assets/light/images/service-icon-3.svg') }}" alt="buy_sell_auction">
                    </div>
                    <div class="pxp-services-item-text text-center">
                        <div class="pxp-services-item-text-title">Auction, sell, book or rent properties</div>
                        <div class="pxp-services-item-text-sub">Millions of properties of different kinds <br>in your favourite cities</div>
                    </div>
                    <div class="pxp-services-item-cta text-uppercase text-center">Learn More</div>
                </a>
                <a href="#" class="pxp-services-item">
                    <div class="pxp-services-item-fig">
                        <img src="{{ asset('assets/light/images/service-icon-4.svg') }}" alt="own">
                    </div>
                    <div class="pxp-services-item-text text-center">
                        <div class="pxp-services-item-text-title">List your own property</div>
                        <div class="pxp-services-item-text-sub">Sign up now and auction, sell, book or rent<br>your own properties and also manage rented properties.</div>
                    </div>
                    <div class="pxp-services-item-cta text-uppercase text-center">Learn More</div>
                </a>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    <div class="pxp-cta-1 pxp-cover mt-100 pt-300" style="background-image: url({{ asset('assets/light/images/cta-fig-1.jpg') }}); background-position: 50% 50%;">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <div class="pxp-cta-1-caption pxp-animate-in rounded-lg">
                        <h2 class="pxp-section-h2">Search Smarter, From Anywhere</h2>
                        <p class="pxp-text-light">Power your search with our OShelter real estate platform, for timely listings and a seamless experience.</p>
                        {{-- <a href="#" class="pxp-primary-cta text-uppercase mt-3 mt-md-5 pxp-animate">Search Now</a> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="container mt-100">
        <h2 class="pxp-section-h2">Our Featured Agents</h2>
        <p class="pxp-text-light">Meet the best real estate agents</p>

        <div class="row mt-4 mt-md-5">
            <div class="col-sm-12 col-md-6 col-lg-3">
                <a href="single-agent.html" class="pxp-agents-1-item">
                    <div class="pxp-agents-1-item-fig-container rounded-lg">
                        <div class="pxp-agents-1-item-fig pxp-cover" style="background-image: url(images/ph-agent.jpg); background-position: top center"></div>
                    </div>
                    <div class="pxp-agents-1-item-details rounded-lg">
                        <div class="pxp-agents-1-item-details-name">Scott Goodwin</div>
                        <div class="pxp-agents-1-item-details-email"><span class="fa fa-phone"></span> (123) 456-7890</div>
                        <div class="pxp-agents-1-item-details-spacer"></div>
                        <div class="pxp-agents-1-item-cta text-uppercase">More Details</div>
                    </div>
                    <div class="pxp-agents-1-item-rating"><span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span></span></div>
                </a>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-3">
                <a href="single-agent.html" class="pxp-agents-1-item">
                    <div class="pxp-agents-1-item-fig-container rounded-lg">
                        <div class="pxp-agents-1-item-fig pxp-cover" style="background-image: url(images/ph-agent.jpg); background-position: top center"></div>
                    </div>
                    <div class="pxp-agents-1-item-details rounded-lg">
                        <div class="pxp-agents-1-item-details-name">Alayna Becker</div>
                        <div class="pxp-agents-1-item-details-email"><span class="fa fa-phone"></span> (456) 123-7890</div>
                        <div class="pxp-agents-1-item-details-spacer"></div>
                        <div class="pxp-agents-1-item-cta text-uppercase">More Details</div>
                    </div>
                    <div class="pxp-agents-1-item-rating"><span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star-o"></span></span></div>
                </a>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-3">
                <a href="single-agent.html" class="pxp-agents-1-item">
                    <div class="pxp-agents-1-item-fig-container rounded-lg">
                        <div class="pxp-agents-1-item-fig pxp-cover" style="background-image: url(images/ph-agent.jpg); background-position: top center"></div>
                    </div>
                    <div class="pxp-agents-1-item-details rounded-lg">
                        <div class="pxp-agents-1-item-details-name">Melvin Blackwell</div>
                        <div class="pxp-agents-1-item-details-email"><span class="fa fa-phone"></span> (789) 123-4560</div>
                        <div class="pxp-agents-1-item-details-spacer"></div>
                        <div class="pxp-agents-1-item-cta text-uppercase">More Details</div>
                    </div>
                    <div class="pxp-agents-1-item-rating"><span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span></span></div>
                </a>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-3">
                <a href="single-agent.html" class="pxp-agents-1-item">
                    <div class="pxp-agents-1-item-fig-container rounded-lg">
                        <div class="pxp-agents-1-item-fig pxp-cover" style="background-image: url(images/ph-agent.jpg); background-position: top center"></div>
                    </div>
                    <div class="pxp-agents-1-item-details rounded-lg">
                        <div class="pxp-agents-1-item-details-name">Erika Tillman</div>
                        <div class="pxp-agents-1-item-details-email"><span class="fa fa-phone"></span> (890) 456-1237</div>
                        <div class="pxp-agents-1-item-details-spacer"></div>
                        <div class="pxp-agents-1-item-cta text-uppercase">More Details</div>
                    </div>
                    <div class="pxp-agents-1-item-rating"><span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star-o"></span></span></div>
                </a>
            </div>
        </div>

        <a href="agents.html" class="pxp-primary-cta text-uppercase mt-1 mt-md-4 pxp-animate">See All Agents</a>
    </div> --}}

    {{-- <div class="container mt-100">
        <h2 class="pxp-section-h2 text-center">Membership Plans</h2>
        <p class="pxp-text-light text-center">Choose the plan that suits you best</p>
        <div class="row mt-5">
            <div class="col-sm-12 col-md-6 col-lg-4">
                <a href="#" class="pxp-plans-1-item">
                    <div class="pxp-plans-1-item-fig">
                        <img src="images/plan-personal.svg" alt="...">
                    </div>
                    <div class="pxp-plans-1-item-title">Personal</div>
                    <ul class="pxp-plans-1-item-features list-unstyled">
                        <li>10 Listings</li>
                        <li>2 Featured Listings</li>
                    </ul>
                    <div class="pxp-plans-1-item-price">
                        <span class="pxp-plans-1-item-price-sum">Free</span>
                        <span class="pxp-plans-1-item-price-period"> / 1 month</span>
                    </div>
                    <div class="pxp-plans-1-item-cta text-uppercase">Choose Plan</div>
                </a>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <a href="#" class="pxp-plans-1-item pxp-is-popular">
                    <div class="pxp-plans-1-item-label">Most Popular</div>
                    <div class="pxp-plans-1-item-fig">
                        <img src="images/plan-professional.svg" alt="...">
                    </div>
                    <div class="pxp-plans-1-item-title">Professional</div>
                    <ul class="pxp-plans-1-item-features list-unstyled">
                        <li>10 Listings</li>
                        <li>2 Featured Listings</li>
                    </ul>
                    <div class="pxp-plans-1-item-price">
                        <span class="pxp-plans-1-item-price-currency">$</span>
                        <span class="pxp-plans-1-item-price-sum">49.99</span>
                        <span class="pxp-plans-1-item-price-period"> / 6 months</span>
                    </div>
                    <div class="pxp-plans-1-item-cta text-uppercase">Choose Plan</div>
                </a>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <a href="#" class="pxp-plans-1-item">
                    <div class="pxp-plans-1-item-fig">
                        <img src="images/plan-business.svg" alt="...">
                    </div>
                    <div class="pxp-plans-1-item-title">Business</div>
                    <ul class="pxp-plans-1-item-features list-unstyled">
                        <li>10 Listings</li>
                        <li>2 Featured Listings</li>
                    </ul>
                    <div class="pxp-plans-1-item-price">
                        <span class="pxp-plans-1-item-price-currency">$</span>
                        <span class="pxp-plans-1-item-price-sum">99.99</span>
                        <span class="pxp-plans-1-item-price-period"> / 1 year</span>
                    </div>
                    <div class="pxp-plans-1-item-cta text-uppercase">Choose Plan</div>
                </a>
            </div>
        </div>
    </div> --}}
</div>

@endsection

@section('scripts')
<script src="{{ asset('assets/light/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/pages/website/gmap.init.js') }}"></script>
@endsection