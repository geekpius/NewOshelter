@extends('layouts.site')

@section('content')

<div class="pxp-content pull-content-down">
    <div class="">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-7">
                    <h1 class="pxp-page-header">Contact Us</h1>
                    <p class="pxp-text-light">Say hello. Tell us how we can guide you.</p>
                </div>
            </div>
        </div>

        <div class="pxp-contact-hero mt-4 mt-md-5">
            <div class="pxp-contact-hero-fig pxp-cover" style="background-image: url({{ asset('assets/light/images/contact-bg.jpg') }}); background-position: 50% 50%;"></div>

            <div class="pxp-contact-hero-offices-container">
                <div class="container">
                    <div class="pxp-contact-hero-offices">
                        <h2 class="pxp-section-h2">Our Offices</h2>
                        <div class="row">
                            <div class="col-sm-12 col-md-4">
                                <div class="pxp-contact-hero-offices-title mt-3 mt-md-4">Accra, Ghana</div>
                                <div class="pxp-contact-hero-offices-info mt-2 mt-md-3">
                                    <p class="pxp-is-address">Joy Lane, Behind Ghana Int. Trade Fair<br>Tse-Addo-Accra, <a href="https://ghanapostgps.com/mapview.html#GL-050-6970" target="_blank">GL-050-6970</a></p>
                                    <p>
                                        <a href="#">(+233) 030-279-5111</a><br>
                                        <a href="#">info@oshelter.com</a>
                                    </p>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="pxp-contact-hero-offices-title mt-3 mt-md-4">New York</div>
                                <div class="pxp-contact-hero-offices-info mt-2 mt-md-3">
                                    <p class="pxp-is-address">90 Fifth Avenue, 3rd Floor<br>New York, NY 1980</p>
                                    <p>
                                        <a href="#">(123) 789-7390</a><br>
                                        <a href="#">office-ny@resideo.com</a>
                                    </p>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="pxp-contact-hero-offices-title mt-3 mt-md-4">San Francisco</div>
                                <div class="pxp-contact-hero-offices-info mt-2 mt-md-3">
                                    <p class="pxp-is-address">90 Fifth Avenue, 3rd Floor<br>San Francisco, CA 1980</p>
                                    <p>
                                        <a href="#">(123) 789-7390</a><br>
                                        <a href="#">office-sf@resideo.com</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mt-200">
            <div class="row">
                <div class="col-sm-12 col-lg-6">
                    <h2 class="pxp-section-h2">Send Us A Message</h2>
                    <div class="pxp-contact-form mt-3 mt-md-4">
                        <form id="formContact" data-url="{{ route('contact.submit') }}">
                            @csrf
                            <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group validate">
                                        <input type="text" name="name" class="form-control" id="pxp-contact-form-name" placeholder="Name">
                                        <span class="text-danger small mySpan" role="alert"></span>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group validate">
                                        <input type="email" name="email" class="form-control" id="pxp-contact-form-email" placeholder="Email">
                                        <span class="text-danger small mySpan" role="alert"></span>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group validate">
                                        <select class="custom-select" name="help_desk" id="pxp-contact-form-reg">
                                            <option value="">What is this regarding?</option>
                                            <option value="support">Support/Feedback</option>
                                            <option value="payments">Payments</option>
                                            <option value="listings">Listings</option>
                                            <option value="bookings">Bookings</option>
                                            <option value="abuse">Abuse</option>
                                            <option value="general">General questions</option>
                                        </select>
                                        <span class="text-danger small mySpan" role="alert"></span>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <input type="number" name="phone" class="form-control" placeholder="Phone (optional)" id="pxp-contact-form-phone">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group validate">
                                <textarea class="form-control" name="message" maxlength="500" id="pxp-contact-form-message" rows="6" placeholder="Message"></textarea>
                                <small id="myMessageCharacters" class="form-text text-muted">500 characters remaining</small>
                                <span class="text-danger small mySpan" role="alert"></span>
                            </div>
                            <button type="submit" class="pxp-contact-form-btn"><i class="fa fa-send"></i> Send Message</button>
                        </form>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-6">
                    <div class="row mt-4 mt-md-5 mt-lg-0">
                        <div class="col-6">
                            <h2 class="pxp-section-h2">Our Locations</h2>
                        </div>
                    </div>
                    <div id="pxp-contact-map" class="mt-3" data-image="{{ asset('assets/images/svg/home.png') }}"></div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@section('scripts')
<script src="{{ asset('assets/light/js/jquery.sticky.js') }}"></script>
<script src="{{ asset('assets/light/js/contact-map.js') }}"></script>
@endsection