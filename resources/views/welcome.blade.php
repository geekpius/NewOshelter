@extends('layouts.site')

@section('style')
<link rel="stylesheet" href="{{ asset('assets/light/css/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/light/css/owl.theme.default.min.css') }}">
@endsection

@section('content')

<div class="pxp-content">
    <div class="pxp-hero vh-100">
        <div class="pxp-hero-bg pxp-cover pxp-cover-bottom" style="background-image: url({{ asset('assets/light/images/hero-1.jpg') }});"></div>
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
                                    <option value="short_stay" selected>Short Stay</option>
                                    <option value="rent">Rent</option>
                                    {{-- <option value="sell">Sell</option>
                                    <option value="auction">Auction</option> --}}
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group autocomplete">
                                <input type="text" name="location" id="location" class="form-control pxp-is-address" placeholder="Enter location...">
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

    <div class="container-fluid pxp-props-carousel-right mt-100">
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
                {{-- <div>
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
                </div> --}}
            </div>
        </div>
    </div>

    <div class="container-fluid pxp-props-carousel-right mt-100">
        <h2 class="pxp-section-h2">Explore Your Curiosity</h2>
        <p class="pxp-text-light">Browse our comprehensive listing types</p>
        <div class="pxp-props-carousel-right-container mt-4 mt-md-5">
            <div class="owl-carousel pxp-props-carousel-right-stage">
                @foreach ($types as $type)
                <div>
                    <a href="{{ route('type.property', strtolower(str_replace(' ','-',$type->name))) }}" class="pxp-areas-1-item rounded-lg">
                        @php $image = empty($type->image)? 'area-1.jpg':'types/'.$type->image; @endphp
                        <div class="pxp-areas-1-item-fig pxp-cover" style="background-image: url({{ asset('assets/images/'.$image) }});"></div>
                        <div class="pxp-areas-1-item-details">
                            <div class="pxp-areas-1-item-details-area">{{ $type->name }}</div>
                        </div>
                        <div class="pxp-areas-1-item-counter"><span class="text-primary">
                        @php $propCount = $type->getPropertyCount(strtolower(str_replace(' ','_',$type->name))); @endphp  
                        {{ $propCount. ' Properties' }}
                        </span></div>
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
                        <div class="pxp-prop-card-1-fig pxp-cover" style="background-image: url({{ asset('assets/images/properties/'.$property->propertyImages->first()->image) }});"></div>
                        <span class="on-top-save on-top m-2 btnHeart" data-id="{{ $property->id }}">
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
                            <div class="pxp-prop-card-1-details-price">{{ $property->propertyHostelBlockRooms()->sum('block_no_room') }} Rooms</div>                                
                            @else
                            <div class="pxp-prop-card-1-details-price">{{ $property->propertyPrice->currency }}{{ number_format($property->propertyPrice->property_price,2) }}<small>/{{ $property->propertyPrice->price_calendar }}</small></div>                                
                            @endif
                            <span class="fa fa-tag text-white pull-right"> 
                                <strong>
                                @if ($property->vacant)
                                    @if ($property->type_status=='rent')
                                        Rent
                                    @elseif($property->type_status=='sell')
                                        Sell
                                    @elseif($property->type_status=='auction')
                                        Auction
                                    @else
                                        Short Stay
                                    @endif
                                @else
                                    @if ($property->type_status=='rent')
                                        Rented
                                    @elseif($property->type_status=='sell')
                                        Sold
                                    @elseif($property->type_status=='auction')
                                        Auctioned
                                    @else
                                        Booked
                                    @endif
                                @endif
                                </strong>
                            </span>
                            @if($property->type=='hostel')
                            <div class="pxp-prop-card-1-details-features text-uppercase"> <span>{{ $property->propertyLocation->location }} <i class="fa fa-map-marker"></i> <span>|</span> {{ $property->propertyDescription->size }} {{ $property->propertyDescription->unit }}</span></div>
                            @else
                            <div class="pxp-prop-card-1-details-features text-uppercase">{{ $property->propertyContain->bedroom }} BD <span>|</span> {{ $property->propertyContain->bathroom }} BA <span>|</span> {{ $property->propertyDescription->size }} {{ $property->propertyDescription->unit }}</div>
                            @endif
                        </div>
                        <div class="pxp-prop-card-1-details-cta text-uppercase">View Details</div>
                    </a>
                </div>
                @endforeach

            </div>

            <a href="{{ route('browse.property') }}" class="pxp-primary-cta text-uppercase mt-4 mt-md-5 pxp-animate">Browse All</a>
        </div>
    </div>

    
    <div class="pxp-services pxp-cover mt-100 pt-100 mb-200" style="background-image: url({{ asset('assets/light/images/services-h-fig.jpg') }});">
        <h2 class="text-center pxp-section-h2">Why Choose Us</h2>
        <p class="pxp-text-light text-center">We offer perfect real estate services</p>

        <div class="container">
            <div class="pxp-services-container rounded-lg mt-4 mt-md-5">
                <a href="{{ route('why.choose', Illuminate\Support\Str::slug('Find your future home', '-')) }}" class="pxp-services-item">
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
                <a href="{{ route('why.choose', Illuminate\Support\Str::slug('Bid buy or rent properties', '-')) }}" class="pxp-services-item">
                    <div class="pxp-services-item-fig">
                        <img src="{{ asset('assets/light/images/service-icon-3.svg') }}" alt="buy_sell_auction">
                    </div>
                    <div class="pxp-services-item-text text-center">
                        <div class="pxp-services-item-text-title">Auction, sell, book or rent properties</div>
                        <div class="pxp-services-item-text-sub">Millions of properties of different kinds <br>in your favourite cities</div>
                    </div>
                    <div class="pxp-services-item-cta text-uppercase text-center">Learn More</div>
                </a>
                <a href="{{ route('why.choose', Illuminate\Support\Str::slug('List your own property', '-')) }}" class="pxp-services-item">
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
                        <a href="{{ route('browse.property') }}" class="pxp-primary-cta text-uppercase mt-3 mt-md-5 pxp-animate">Search Now</a>
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
<script>

    function autocomplete(inp, arr) {
        var currentFocus;
        inp.addEventListener("input", function(e) {
            var a, b, i, val = this.value;
            /*close any already open lists of autocompleted values*/
            closeAllLists();
            if (!val) { return false;}
            currentFocus = -1;
            /*create a DIV element that will contain the items (values):*/
            a = document.createElement("DIV");
            a.setAttribute("id", this.id + "autocomplete-list");
            a.setAttribute("class", "autocomplete-items");
            /*append the DIV element as a child of the autocomplete container:*/
            this.parentNode.appendChild(a);
            /*for each item in the array...*/
            for (i = 0; i < arr.length; i++) {
                /*check if the item starts with the same letters as the text field value:*/
                if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
                /*create a DIV element for each matching element:*/
                b = document.createElement("DIV");
                /*make the matching letters bold:*/
                b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
                b.innerHTML += arr[i].substr(val.length);
                /*insert a input field that will hold the current array item's value:*/
                b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
                /*execute a function when someone clicks on the item value (DIV element):*/
                b.addEventListener("click", function(e) {
                    /*insert the value for the autocomplete text field:*/
                    inp.value = this.getElementsByTagName("input")[0].value;
                    /*close the list of autocompleted values,
                    (or any other open lists of autocompleted values:*/
                    closeAllLists();
                });
                a.appendChild(b);
                }
            }
        });
        /*execute a function presses a key on the keyboard:*/
        inp.addEventListener("keydown", function(e) {
            var x = document.getElementById(this.id + "autocomplete-list");
            if (x) x = x.getElementsByTagName("div");
            if (e.keyCode == 40) {
                /*If the arrow DOWN key is pressed,
                increase the currentFocus variable:*/
                currentFocus++;
                /*and and make the current item more visible:*/
                addActive(x);
            } else if (e.keyCode == 38) { //up
                /*If the arrow UP key is pressed,
                decrease the currentFocus variable:*/
                currentFocus--;
                /*and and make the current item more visible:*/
                addActive(x);
            } else if (e.keyCode == 13) {
                /*If the ENTER key is pressed, prevent the form from being submitted,*/
                e.preventDefault();
                if (currentFocus > -1) {
                /*and simulate a click on the "active" item:*/
                if (x) x[currentFocus].click();
                }
            }
        });
        function addActive(x) {
            /*a function to classify an item as "active":*/
            if (!x) return false;
            /*start by removing the "active" class on all items:*/
            removeActive(x);
            if (currentFocus >= x.length) currentFocus = 0;
            if (currentFocus < 0) currentFocus = (x.length - 1);
            /*add class "autocomplete-active":*/
            x[currentFocus].classList.add("autocomplete-active");
        }
        function removeActive(x) {
            /*a function to remove the "active" class from all autocomplete items:*/
            for (var i = 0; i < x.length; i++) {
            x[i].classList.remove("autocomplete-active");
            }
        }
        function closeAllLists(elmnt) {
            /*close all autocomplete lists in the document,
            except the one passed as an argument:*/
            var x = document.getElementsByClassName("autocomplete-items");
            for (var i = 0; i < x.length; i++) {
            if (elmnt != x[i] && elmnt != inp) {
                x[i].parentNode.removeChild(x[i]);
            }
            }
        }
        /*execute a function when someone clicks in the document:*/
        document.addEventListener("click", function (e) {
            closeAllLists(e.target);
        });
    }

    /*An array containing all the location of properties listed:*/
    var countries = [
        @foreach($locations as $location)
        "{{ $location->location }}",
        @endforeach
    ];

    /*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
    autocomplete(document.getElementById("location"), countries);

    $("#formSearch").on('submit', function(e){
        e.stopPropagation();
        var valid = true;
        $('#formSearch input').each(function() {
            var $this = $(this);
            
            if(!$this.val()) {
                valid = false;
            }
        });
        if(valid){
            return true;
        }
        return false;
    });

    $("#formSearch input, #formSearch select").on('keydown', function(e){
        e.stopPropagation();
        if(e.which==13){
            $("#formSearch").trigger("submit");
        }
    });
</script>
<script type="text/javascript" id="cookieinfo"
    src="//cookieinfoscript.com/js/cookieinfo.min.js"
    data-bg="#645862"
    data-fg="#FFFFFF"
    data-link="#F1D600"
    data-cookie="CookieInfoScript"
    data-text-align="left"
    data-close-text="Got it!">
</script>
@endsection