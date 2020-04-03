@extends('layouts.site')

@section('content')

<div class="pxp-content">
    <div class="pxp-hero vh-100">
        <div class="pxp-hero-bg pxp-cover pxp-cover-bottom" style="background-image: url(images/ph-big.jpg);"></div>
        <div class="pxp-hero-opacity"></div>
        <div class="pxp-hero-caption">
            <div class="container">
                <h1 class="text-white">Find your future home</h1>

                <form class="pxp-hero-search mt-4" action="properties.html">
                    <div class="row">
                        <div class="col-sm-12 col-md-4">
                            <div class="form-group">
                                <select class="custom-select">
                                    <option selected>Buy</option>
                                    <option value="1">Rent</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-8">
                            <div class="form-group">
                                <input type="text" class="form-control pxp-is-address" placeholder="Enter address...">
                                <span class="fa fa-search"></span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container-fluid pxp-props-carousel-right mt-100">
        <h2 class="pxp-section-h2">Featured Properties</h2>
        <p class="pxp-text-light">Browse our latest hot offers</p>
        <div class="pxp-props-carousel-right-container mt-4 mt-md-5">
            <div class="owl-carousel pxp-props-carousel-right-stage">
                <div>
                    <a href="single-property.html" class="pxp-prop-card-1 rounded-lg">
                        <div class="pxp-prop-card-1-fig pxp-cover" style="background-image: url(images/ph-gallery.jpg);"></div>
                        <div class="pxp-prop-card-1-gradient pxp-animate"></div>
                        <div class="pxp-prop-card-1-details">
                            <div class="pxp-prop-card-1-details-title">Chic Apartment in Downtown</div>
                            <div class="pxp-prop-card-1-details-price">$890,000</div>
                            <div class="pxp-prop-card-1-details-features text-uppercase">2 BD <span>|</span> 2 BA <span>|</span> 920 SF</div>
                        </div>
                        <div class="pxp-prop-card-1-details-cta text-uppercase">View Details</div>
                    </a>
                </div>

                <div>
                    <a href="single-property.html" class="pxp-prop-card-1 rounded-lg">
                        <div class="pxp-prop-card-1-fig pxp-cover" style="background-image: url(images/ph-gallery.jpg);"></div>
                        <div class="pxp-prop-card-1-gradient pxp-animate"></div>
                        <div class="pxp-prop-card-1-details">
                            <div class="pxp-prop-card-1-details-title">Colorful Little Apartment</div>
                            <div class="pxp-prop-card-1-details-price">$2,675</div>
                            <div class="pxp-prop-card-1-details-features text-uppercase">1 BD <span>|</span> 1 BA <span>|</span> 500 SF</div>
                        </div>
                        <div class="pxp-prop-card-1-details-cta text-uppercase">View Details</div>
                    </a>
                </div>

                <div>
                    <a href="single-property.html" class="pxp-prop-card-1 rounded-lg">
                        <div class="pxp-prop-card-1-fig pxp-cover" style="background-image: url(images/ph-gallery.jpg);"></div>
                        <div class="pxp-prop-card-1-gradient pxp-animate"></div>
                        <div class="pxp-prop-card-1-details">
                            <div class="pxp-prop-card-1-details-title">Cozy Two Bedroom Apartment</div>
                            <div class="pxp-prop-card-1-details-price">$960,000</div>
                            <div class="pxp-prop-card-1-details-features text-uppercase">2 BD <span>|</span> 2 BA <span>|</span> 870 SF</div>
                        </div>
                        <div class="pxp-prop-card-1-details-cta text-uppercase">View Details</div>
                    </a>
                </div>

                <div>
                    <a href="single-property.html" class="pxp-prop-card-1 rounded-lg">
                        <div class="pxp-prop-card-1-fig pxp-cover" style="background-image: url(images/ph-gallery.jpg);"></div>
                        <div class="pxp-prop-card-1-gradient pxp-animate"></div>
                        <div class="pxp-prop-card-1-details">
                            <div class="pxp-prop-card-1-details-title">Beautiful House in Marina</div>
                            <div class="pxp-prop-card-1-details-price">$5,198,000</div>
                            <div class="pxp-prop-card-1-details-features text-uppercase">5 BD <span>|</span> 4.5 BA <span>|</span> 3,945 SF</div>
                        </div>
                        <div class="pxp-prop-card-1-details-cta text-uppercase">View Details</div>
                    </a>
                </div>

                <div>
                    <a href="single-property.html" class="pxp-prop-card-1 rounded-lg">
                        <div class="pxp-prop-card-1-fig pxp-cover" style="background-image: url(images/ph-gallery.jpg);"></div>
                        <div class="pxp-prop-card-1-gradient pxp-animate"></div>
                        <div class="pxp-prop-card-1-details">
                            <div class="pxp-prop-card-1-details-title">Modern Residence</div>
                            <div class="pxp-prop-card-1-details-price">$7,995</div>
                            <div class="pxp-prop-card-1-details-features text-uppercase">4 BD <span>|</span> 1.5 BA <span>|</span> 2,240 SF</div>
                        </div>
                        <div class="pxp-prop-card-1-details-cta text-uppercase">View Details</div>
                    </a>
                </div>

                <div>
                    <a href="single-property.html" class="pxp-prop-card-1 rounded-lg">
                        <div class="pxp-prop-card-1-fig pxp-cover" style="background-image: url(images/ph-gallery.jpg);"></div>
                        <div class="pxp-prop-card-1-gradient pxp-animate"></div>
                        <div class="pxp-prop-card-1-details">
                            <div class="pxp-prop-card-1-details-title">Luxury Mansion</div>
                            <div class="pxp-prop-card-1-details-price">$5,430,000</div>
                            <div class="pxp-prop-card-1-details-features text-uppercase">4 BD <span>|</span> 5 BA <span>|</span> 5,200 SF</div>
                        </div>
                        <div class="pxp-prop-card-1-details-cta text-uppercase">View Details</div>
                    </a>
                </div>
            </div>

            <a href="properties.html" class="pxp-primary-cta text-uppercase mt-4 mt-md-5 pxp-animate">Browse All</a>
        </div>
    </div>

    <div class="pxp-services pxp-cover mt-100 pt-100 mb-200" style="background-image: url(images/ph-big.jpg);">
        <h2 class="text-center pxp-section-h2">Why Choose Us</h2>
        <p class="pxp-text-light text-center">We offer perfect real estate services</p>

        <div class="container">
            <div class="pxp-services-container rounded-lg mt-4 mt-md-5">
                <a href="properties.html" class="pxp-services-item">
                    <div class="pxp-services-item-fig">
                        <img src="images/service-icon-1.svg" alt="...">
                    </div>
                    <div class="pxp-services-item-text text-center">
                        <div class="pxp-services-item-text-title">Find your future home</div>
                        <div class="pxp-services-item-text-sub">We help you find a new home by offering<br>a smart real estate experience</div>
                    </div>
                    <div class="pxp-services-item-cta text-uppercase text-center">Learn More</div>
                </a>
                <a href="agents.html" class="pxp-services-item">
                    <div class="pxp-services-item-fig">
                        <img src="images/service-icon-2.svg" alt="...">
                    </div>
                    <div class="pxp-services-item-text text-center">
                        <div class="pxp-services-item-text-title">Experienced agents</div>
                        <div class="pxp-services-item-text-sub">Find an agent who knows<br>your market best</div>
                    </div>
                    <div class="pxp-services-item-cta text-uppercase text-center">Learn More</div>
                </a>
                <a href="properties.html" class="pxp-services-item">
                    <div class="pxp-services-item-fig">
                        <img src="images/service-icon-3.svg" alt="...">
                    </div>
                    <div class="pxp-services-item-text text-center">
                        <div class="pxp-services-item-text-title">Buy or rent homes</div>
                        <div class="pxp-services-item-text-sub">Millions of houses and apartments<br>in your favourite cities</div>
                    </div>
                    <div class="pxp-services-item-cta text-uppercase text-center">Learn More</div>
                </a>
                <a href="submit-property.html" class="pxp-services-item">
                    <div class="pxp-services-item-fig">
                        <img src="images/service-icon-4.svg" alt="...">
                    </div>
                    <div class="pxp-services-item-text text-center">
                        <div class="pxp-services-item-text-title">List your own property</div>
                        <div class="pxp-services-item-text-sub">Sign up now and sell or rent<br>your own properties</div>
                    </div>
                    <div class="pxp-services-item-cta text-uppercase text-center">Learn More</div>
                </a>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    <div class="container mt-100">
        <h2 class="pxp-section-h2">Explore Our Neighborhoods</h2>
        <p class="pxp-text-light">Browse our comprehensive neighborhood listings</p>

        <div class="row mt-4 mt-md-5">
            <div class="col-sm-12 col-md-6 col-lg-4">
                <a href="properties.html" class="pxp-areas-1-item rounded-lg">
                    <div class="pxp-areas-1-item-fig pxp-cover" style="background-image: url(images/ph-gallery.jpg);"></div>
                    <div class="pxp-areas-1-item-details">
                        <div class="pxp-areas-1-item-details-area">Bluemont</div>
                        <div class="pxp-areas-1-item-details-city">Arlington, VA</div>
                    </div>
                    <div class="pxp-areas-1-item-counter"><span>324 Properties</span></div>
                    <div class="pxp-areas-1-item-cta text-uppercase">Explore</div>
                </a>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <a href="properties.html" class="pxp-areas-1-item rounded-lg">
                    <div class="pxp-areas-1-item-fig pxp-cover" style="background-image: url(images/ph-gallery.jpg);"></div>
                    <div class="pxp-areas-1-item-details">
                        <div class="pxp-areas-1-item-details-area">Overlake</div>
                        <div class="pxp-areas-1-item-details-city">Redmond, WA</div>
                    </div>
                    <div class="pxp-areas-1-item-counter"><span>158 Properties</span></div>
                    <div class="pxp-areas-1-item-cta text-uppercase">Explore</div>
                </a>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <a href="properties.html" class="pxp-areas-1-item rounded-lg">
                    <div class="pxp-areas-1-item-fig pxp-cover" style="background-image: url(images/ph-gallery.jpg);"></div>
                    <div class="pxp-areas-1-item-details">
                        <div class="pxp-areas-1-item-details-area">College Terrace</div>
                        <div class="pxp-areas-1-item-details-city">Palo Alto, CA</div>
                    </div>
                    <div class="pxp-areas-1-item-counter"><span>129 Properties</span></div>
                    <div class="pxp-areas-1-item-cta text-uppercase">Explore</div>
                </a>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <a href="properties.html" class="pxp-areas-1-item rounded-lg">
                    <div class="pxp-areas-1-item-fig pxp-cover" style="background-image: url(images/ph-gallery.jpg);"></div>
                    <div class="pxp-areas-1-item-details">
                        <div class="pxp-areas-1-item-details-area">Inner Sunset</div>
                        <div class="pxp-areas-1-item-details-city">San Francisco, CA</div>
                    </div>
                    <div class="pxp-areas-1-item-counter"><span>129 Properties</span></div>
                    <div class="pxp-areas-1-item-cta text-uppercase">Explore</div>
                </a>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <a href="properties.html" class="pxp-areas-1-item rounded-lg">
                    <div class="pxp-areas-1-item-fig pxp-cover" style="background-image: url(images/ph-gallery.jpg);"></div>
                    <div class="pxp-areas-1-item-details">
                        <div class="pxp-areas-1-item-details-area">Upper West Side</div>
                        <div class="pxp-areas-1-item-details-city">New York City, NY</div>
                    </div>
                    <div class="pxp-areas-1-item-counter"><span>324 Properties</span></div>
                    <div class="pxp-areas-1-item-cta text-uppercase">Explore</div>
                </a>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <a href="properties.html" class="pxp-areas-1-item rounded-lg">
                    <div class="pxp-areas-1-item-fig pxp-cover" style="background-image: url(images/ph-gallery.jpg);"></div>
                    <div class="pxp-areas-1-item-details">
                        <div class="pxp-areas-1-item-details-area">Marina District</div>
                        <div class="pxp-areas-1-item-details-city">San Francisco, CA</div>
                    </div>
                    <div class="pxp-areas-1-item-counter"><span>158 Properties</span></div>
                    <div class="pxp-areas-1-item-cta text-uppercase">Explore</div>
                </a>
            </div>
        </div>

        <a href="properties.html" class="pxp-primary-cta text-uppercase mt-2 mt-md-4 pxp-animate">Explore Neighborhoods</a>
    </div>

    <div class="pxp-cta-1 pxp-cover mt-100 pt-300" style="background-image: url(images/ph-big.jpg); background-position: 50% 50%;">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <div class="pxp-cta-1-caption pxp-animate-in rounded-lg">
                        <h2 class="pxp-section-h2">Search Smarter, From Anywhere</h2>
                        <p class="pxp-text-light">Power your search with our Resideo real estate platform, for timely listings and a seamless experience.</p>
                        <a href="properties.html" class="pxp-primary-cta text-uppercase mt-3 mt-md-5 pxp-animate">Search Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-100">
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
    </div>

    <div class="container mt-100">
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
    </div>
</div>

@endsection

@section('scripts')

@endsection