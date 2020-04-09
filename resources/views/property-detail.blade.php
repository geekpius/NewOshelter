@extends('layouts.site')

@section('style')
<link rel="stylesheet" href="{{ asset('assets/light/css/photoswipe.css') }}">
<link rel="stylesheet" href="{{ asset('assets/light/css/default-skin/default-skin.css') }}">
@endsection

@section('content')

<div class="pxp-content">
    <div class="pxp-single-property-top pxp-content-wrapper mt-100">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-5">
                    <h2 class="pxp-sp-top-title">{{ $property->title }}</h2>
                    <p class="pxp-sp-top-address pxp-text-light">{{ $property->propertyLocation->location }} - {{ $property->propertyLocation->digital_address }}</p>
                </div>
                <div class="col-sm-12 col-md-7">
                    <div class="pxp-sp-top-btns mt-2 mt-md-0">
                        <a href="#" class="pxp-sp-top-btn"><span class="fa fa-heart"></span> Save</a>
                        <div class="dropdown">
                            <a class="pxp-sp-top-btn" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="fa fa-share-alt"></span> Share
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="#"><span class="fa fa-facebook"></span> Facebook</a>
                                <a class="dropdown-item" href="#"><span class="fa fa-twitter"></span> Twitter</a>
                                <a class="dropdown-item" href="#"><span class="fa fa-pinterest"></span> Pinterest</a>
                                <a class="dropdown-item" href="#"><span class="fa fa-linkedin"></span> LinkedIn</a>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix d-block d-xl-none"></div>
                    <div class="pxp-sp-top-feat mt-3 mt-md-0">
                        <div>5 <span>BD</span></div>
                        <div>4 <span>BA</span></div>
                        <div>3,945 <span>SF</span></div>
                    </div>
                    <div class="pxp-sp-top-price mt-3 mt-md-0">$5,198,000</div>
                </div>
            </div>
        </div>
    </div>

    <div class="pxp-single-property-gallery-container mt-4 mt-md-5">
        <div class="pxp-single-property-gallery" itemscope itemtype="http://schema.org/ImageGallery">
            <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject" class="pxp-sp-gallery-main-img">
                <a href="../../assets/light/images/ph-big.jpg" itemprop="contentUrl" data-size="1920x1280" class="pxp-cover" style="background-image: url(../../assets/light/images/ph-big.jpg);"></a>
                <figcaption itemprop="caption description">Image caption</figcaption>
            </figure>
            <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                <a href="../../assets/light/images/ph-big.jpg" itemprop="contentUrl" data-size="1920x1459" class="pxp-cover" style="background-image: url(../../assets/light/images/ph-gallery.jpg);"></a>
                <figcaption itemprop="caption description">Image caption</figcaption>
            </figure>
            <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                <a href="../../assets/light/images/ph-big.jpg" itemprop="contentUrl" data-size="1920x2560" class="pxp-cover" style="background-image: url(../../assets/light/images/ph-gallery.jpg);"></a>
                <figcaption itemprop="caption description">Image caption</figcaption>
            </figure>
            <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                <a href="../../assets/light/images/ph-big.jpg" itemprop="contentUrl" data-size="1920x1280" class="pxp-cover" style="background-image: url(../../assets/light/images/ph-gallery.jpg);"></a>
                <figcaption itemprop="caption description">Image caption</figcaption>
            </figure>
            <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                <a href="../../assets/light/images/ph-big.jpg" itemprop="contentUrl" data-size="1920x1280" class="pxp-cover" style="background-image: url(../../assets/light/images/ph-gallery.jpg);"></a>
                <figcaption itemprop="caption description">Image caption</figcaption>
            </figure>
        </div>
        <a href="#" class="pxp-sp-gallery-btn">View Photos</a>
        <div class="clearfix"></div>
    </div>

    <div class="container mt-100">
        <div class="row">
            <div class="col-lg-8">
                <div class="pxp-single-property-section">
                    <h3>Key Details</h3>
                    <div class="row mt-3 mt-md-4">
                        <div class="col-sm-6">
                            <div class="pxp-sp-key-details-item">
                                <div class="pxp-sp-kd-item-label text-uppercase">Status</div>
                                <div class="pxp-sp-kd-item-value">Coming Soon</div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="pxp-sp-key-details-item">
                                <div class="pxp-sp-kd-item-label text-uppercase">Property Type</div>
                                <div class="pxp-sp-kd-item-value">Apartment</div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="pxp-sp-key-details-item">
                                <div class="pxp-sp-kd-item-label text-uppercase">Year Built</div>
                                <div class="pxp-sp-kd-item-value">1980</div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="pxp-sp-key-details-item">
                                <div class="pxp-sp-kd-item-label text-uppercase">Stories</div>
                                <div class="pxp-sp-kd-item-value">23</div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="pxp-sp-key-details-item">
                                <div class="pxp-sp-kd-item-label text-uppercase">Room Count</div>
                                <div class="pxp-sp-kd-item-value">6</div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="pxp-sp-key-details-item">
                                <div class="pxp-sp-kd-item-label text-uppercase">Parking Spaces</div>
                                <div class="pxp-sp-kd-item-value">2</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pxp-single-property-section mt-4 mt-md-5">
                    <h3>Overview</h3>
                    <div class="mt-3 mt-md-4">
                        <p>Fully furnished. Elegantly appointed condominium unit situated on premier location. PS6. The wide entry hall leads to a large living room with dining area. This expansive 2 bedroom and 2 renovated marble bathroom apartment has great windows. Despite the interior views, the apartments Southern and Eastern exposures allow for lovely natural light to fill every room. The master suite is surrounded by handcrafted milkwork and features incredible walk-in closet and storage space. The second bedroom is<span class="pxp-dots">...</span><span class="pxp-dots-more"> a corner room with double windows. The kitchen has fabulous space, new appliances, and a laundry area. Other features include rich herringbone floors, crown moldings and coffered ceilings throughout the apartment. 1049 5th Avenue is a classic pre-war building located across from Central Park, the reservoir and The Metropolitan Museum. Elegant lobby and 24 hours doorman. This is a pet-friendly building. 
                        <br><br>
                        Conveniently located close to several trendy fitness centers like Equinox, New York Sports Clubs & Crunch. Fine restaurants around the area, as well as top-ranked schools. 2% Flip tax paid by buyer to the condominium. Building just put an assessment for 18 months of approximately $500 per month.</span></p>
                        <a href="#" class="pxp-sp-more text-uppercase"><span class="pxp-sp-more-1">Continue Reading <span class="fa fa-angle-down"></span></span><span class="pxp-sp-more-2">Show Less <span class="fa fa-angle-up"></span></span></a>
                    </div>
                </div>

                <div class="pxp-single-property-section mt-4 mt-md-5">
                    <h3>Amenities</h3>
                    <div class="row mt-3 mt-md-4">
                        <div class="col-sm-6 col-lg-4">
                            <div class="pxp-sp-amenities-item"><span class="fa fa-wifi"></span> Internet</div>
                        </div>
                        <div class="col-sm-6 col-lg-4">
                            <div class="pxp-sp-amenities-item"><span class="fa fa-car"></span> Garage</div>
                        </div>
                        <div class="col-sm-6 col-lg-4">
                            <div class="pxp-sp-amenities-item"><span class="fa fa-sun-o"></span> Air Conditioning</div>
                        </div>
                        <div class="col-sm-6 col-lg-4">
                            <div class="pxp-sp-amenities-item"><span class="fa fa-bullseye"></span> Dishwasher</div>
                        </div>
                        <div class="col-sm-6 col-lg-4">
                            <div class="pxp-sp-amenities-item"><span class="fa fa-recycle"></span> Disposal</div>
                        </div>
                        <div class="col-sm-6 col-lg-4">
                            <div class="pxp-sp-amenities-item"><span class="fa fa-clone"></span> Balcony</div>
                        </div>
                        <div class="col-sm-6 col-lg-4">
                            <div class="pxp-sp-amenities-item"><span class="fa fa-futbol-o"></span> Gym</div>
                        </div>
                        <div class="col-sm-6 col-lg-4">
                            <div class="pxp-sp-amenities-item"><span class="fa fa-smile-o"></span> Playroom</div>
                        </div>
                        <div class="col-sm-6 col-lg-4">
                            <div class="pxp-sp-amenities-item"><span class="fa fa-glass"></span> Bar</div>
                        </div>
                    </div>
                </div>

                <div class="pxp-single-property-section mt-4 mt-md-5">
                    <h3>Explore the Area</h3>
                    <div class="pxp-sp-pois-nav mt-3 mt-md-4">
                        <div class="pxp-sp-pois-nav-transportation text-uppercase">Transportation</div>
                        <div class="pxp-sp-pois-nav-restaurants text-uppercase">Restaurants</div>
                        <div class="pxp-sp-pois-nav-shopping text-uppercase">Shopping</div>
                        <div class="pxp-sp-pois-nav-cafes text-uppercase">Cafes & Bars</div>
                        <div class="pxp-sp-pois-nav-arts text-uppercase">Arts & Entertainment</div>
                        <div class="pxp-sp-pois-nav-fitness text-uppercase">Fitness</div>
                    </div>
                    <div id="pxp-sp-map" class="mt-3"></div>
                </div>

                <div class="pxp-single-property-section mt-4 mt-md-5">
                    <h3>Payment Calculator</h3>
                    <div class="pxp-calculator-view mt-3 mt-md-4">
                        <div class="row">
                            <div class="col-sm-12 col-lg-4 align-self-center">
                                <div class="pxp-calculator-chart-container">
                                    <canvas id="pxp-calculator-chart"></canvas>
                                    <div class="pxp-calculator-chart-result">
                                        <div class="pxp-calculator-chart-result-sum">$11,277</div>
                                        <div class="pxp-calculator-chart-result-label">per month</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-8 align-self-center mt-3 mt-lg-0">
                                <div class="pxp-calculator-data">
                                    <div class="row justify-content-between">
                                        <div class="col-8">
                                            <div class="pxp-calculator-data-label"><span class="fa fa-minus"></span>Principal and Interest</div>
                                        </div>
                                        <div class="col-4 text-right">
                                            <div class="pxp-calculator-data-sum" id="pxp-calculator-data-pi"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="pxp-calculator-data">
                                    <div class="row justify-content-between">
                                        <div class="col-8">
                                            <div class="pxp-calculator-data-label"><span class="fa fa-minus"></span>Property Taxes</div>
                                        </div>
                                        <div class="col-4 text-right">
                                            <div class="pxp-calculator-data-sum" id="pxp-calculator-data-pt"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="pxp-calculator-data">
                                    <div class="row justify-content-between">
                                        <div class="col-8">
                                            <div class="pxp-calculator-data-label"><span class="fa fa-minus"></span>HOA Dues</div>
                                        </div>
                                        <div class="col-4 text-right">
                                            <div class="pxp-calculator-data-sum" id="pxp-calculator-data-hd"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pxp-calculator-form mt-3 mt-md-4">
                        <input type="hidden" id="pxp-calculator-form-property-taxes" value="$1,068">
                        <input type="hidden" id="pxp-calculator-form-hoa-dues" value="$2,036">

                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label for="pxp-calculator-form-term">Term</label>
                                    <select class="custom-select" id="pxp-calculator-form-term">
                                        <option value="30">30 Years Fixed</option>
                                        <option value="20">20 Years Fixed</option>
                                        <option value="15">15 Years Fixed</option>
                                        <option value="10">10 Years Fixed</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label for="pxp-calculator-form-interest">Interest</label>
                                    <input type="text" class="form-control pxp-form-control-transform" id="pxp-calculator-form-interest" data-type="percent" value="4.45%">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label for="pxp-calculator-form-price">Home Price</label>
                                    <input type="text" class="form-control pxp-form-control-transform" id="pxp-calculator-form-price" data-type="currency" value="$5,198,000">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="row">
                                    <div class="col-7 col-sm-7 col-md-8">
                                        <div class="form-group">
                                            <label for="pxp-calculator-form-down-price">Down Payment</label>
                                            <input type="text" class="form-control pxp-form-control-transform" id="pxp-calculator-form-down-price" data-type="currency" value="$519,800">
                                        </div>
                                    </div>
                                    <div class="col-5 col-sm-5 col-md-4">
                                        <div class="form-group">
                                            <label for="pxp-calculator-form-down-percentage">&nbsp;</label>
                                            <input type="text" class="form-control pxp-form-control-transform" id="pxp-calculator-form-down-percentage" data-type="percent" value="10%">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pxp-single-property-section mt-4 mt-md-5">
                    <h3>Schools in Marina District</h3>
                    <ul class="nav nav-tabs pxp-nav-tabs mt-3 mt-md-4">
                        <li class="nav-item"><a class="nav-link active" href="#elementary" data-toggle="tab">Elementary</a></li>
                        <li class="nav-item"><a class="nav-link" href="#middle"  data-toggle="tab">Middle</a></li>
                        <li class="nav-item"><a class="nav-link" href="#high" data-toggle="tab">High</a></li>
                    </ul>
                    <div class="tab-content mt-3">
                        <div class="tab-pane active" id="elementary" role="tabpanel">
                            <table class="table table-responsive pxp-table">
                                <thead>
                                    <tr>
                                        <th scope="col">School</th>
                                        <th scope="col">Type</th>
                                        <th scope="col">Grades</th>
                                        <th scope="col">Rating</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Harvest Collegiate High School</td>
                                        <td>Public</td>
                                        <td>9-11</td>
                                        <td>5/5<span class="pxp-school-rating"><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span></span></td>
                                    </tr>
                                    <tr>
                                        <td>Harvest Collegiate High School</td>
                                        <td>Public</td>
                                        <td>9-11</td>
                                        <td>5/5<span class="pxp-school-rating"><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span></span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane" id="middle" role="tabpanel">
                            <table class="table table-responsive pxp-table">
                                <thead>
                                    <tr>
                                        <th scope="col">School</th>
                                        <th scope="col">Type</th>
                                        <th scope="col">Grades</th>
                                        <th scope="col">Rating</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Harvest Collegiate High School</td>
                                        <td>Public</td>
                                        <td>9-11</td>
                                        <td>5/5<span class="pxp-school-rating"><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span></span></td>
                                    </tr>
                                    <tr>
                                        <td>Harvest Collegiate High School</td>
                                        <td>Public</td>
                                        <td>9-11</td>
                                        <td>5/5<span class="pxp-school-rating"><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span></span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane" id="high" role="tabpanel">
                            <table class="table table-responsive pxp-table">
                                <thead>
                                    <tr>
                                        <th scope="col">School</th>
                                        <th scope="col">Type</th>
                                        <th scope="col">Grades</th>
                                        <th scope="col">Rating</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Harvest Collegiate High School</td>
                                        <td>Public</td>
                                        <td>9-11</td>
                                        <td>5/5<span class="pxp-school-rating"><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span></span></td>
                                    </tr>
                                    <tr>
                                        <td>Harvest Collegiate High School</td>
                                        <td>Public</td>
                                        <td>9-11</td>
                                        <td>5/5<span class="pxp-school-rating"><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span></span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="pxp-single-property-section pxp-sp-agent-section mt-4 mt-md-5 mt-lg-0">
                    <h3>Owned By</h3>
                    <div class="pxp-sp-agent mt-3 mt-md-4">
                        <a href="single-agent.html" class="pxp-sp-agent-fig pxp-cover rounded-lg" style="background-image: url(images/ph-agent.jpg); background-position: top center"></a>
                        <div class="pxp-sp-agent-info">
                            <div class="pxp-sp-agent-info-name"><a href="single-agent.html">Erika Tillman</a></div>
                            <div class="pxp-sp-agent-info-rating"><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span></div>
                            <div class="pxp-sp-agent-info-email"><a href="mailto:erika.tillman@resideo.com">erika.tillman@resideo.com</a></div>
                            <div class="pxp-sp-agent-info-phone"><span class="fa fa-phone"></span> (123) 456-7890</div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="pxp-sp-agent-btns mt-3 mt-md-4">
                            <a href="#pxp-contact-agent" class="pxp-sp-agent-btn-main" data-toggle="modal" data-target="#pxp-contact-agent"><span class="fa fa-envelope-o"></span> Contact Agent</a>
                            <a href="#pxp-contact-agent" class="pxp-sp-agent-btn" data-toggle="modal" data-target="#pxp-contact-agent"><span class="fa fa-calendar-check-o"></span> Request Tour</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
@endsection