@extends('layouts.site')

@section('style')
<link rel="stylesheet" href="{{ asset('assets/light/css/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/light/css/owl.theme.default.min.css') }}">
@endsection
@section('content')

<div class="pxp-content">
    <div class="pxp-contact-hero own-property-bottom">
        <div class="pxp-contact-hero-fig pxp-cover text-center" style="background-image: url({{ asset('assets/light/images/contact-bg.jpg') }}); background-position: 50% 50%;">
            <a href="{{ route('property.start') }}" class="own-property-get-started btn btn-tomato">Get started</a>
        </div>

        <div class="own-property-detail">
            <div class="container">
                <div class="pxp-contact-hero-offices">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="">
                                <h4><strong>Why own a property on OShelter?</strong></h4>
                                <p>Answer</p>
                            </div>

                            <div class=" mt-5">
                                <h4 class="text-center"><strong>How to become an owner</strong></h4>
                                <div class="row">
                                    <div class="col-sm-4">
                                        Answer
                                    </div>
                                    <div class="col-sm-4">
                                        Answer
                                    </div>
                                    <div class="col-sm-4">
                                        Answer
                                    </div>
                                </div>
                            </div>

                            <div class="mt-5">
                                <h4 class="text-center"><strong>OShelter Payments</strong></h4>
                                <div class="row">
                                    <div class="col-sm-4">
                                        Owners Prices
                                    </div>
                                    <div class="col-sm-4">
                                        OShelter Charges
                                    </div>
                                    <div class="col-sm-4">
                                        Get Paid
                                    </div>
                                </div>
                            </div>

                            <div class="mt-5">

                                <div class="pxp-testim-1 pxp-cover pt-5 pb-5" style="background-image: url({{ asset('assets/light/images/testim-1-fig.jpg') }});">
                                    <div class="pxp-testim-1-intro ml-3">
                                        <h4 class="pxp-section-h2 text-center">Owners Testimonials</h4>
                                    </div>
                                    <div class="pxp-testim-1-container mt-4 mt-md-5 mt-lg-0">
                                        <div class="owl-carousel pxp-testim-1-stage">
                                            <div>
                                                <div class="pxp-testim-1-item">
                                                    <div class="pxp-testim-1-item-avatar pxp-cover" style="background-image: url({{ asset('assets/light/images/customer-1.jpg') }})"></div>
                                                    <div class="pxp-testim-1-item-name">Derek Cotner</div>
                                                    <div class="pxp-testim-1-item-location">Houston, TX</div>
                                                    <div class="pxp-testim-1-item-message">While OShelter functions like a traditional broker, the company's promise is using technology to reduce the time and friction of  buying and selling house or apartment.</div>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="pxp-testim-1-item">
                                                    <div class="pxp-testim-1-item-avatar pxp-cover" style="background-image: url({{ asset('assets/light/images/customer-2.jpg') }})"></div>
                                                    <div class="pxp-testim-1-item-name">Rebecca Eason</div>
                                                    <div class="pxp-testim-1-item-location">Washington, MD</div>
                                                    <div class="pxp-testim-1-item-message">And it???s no wonder OShelter has shaken things up: As anyone who???s ever tried to rent or buy property in Washington knows, the experience is loaded with pain points.</div>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="pxp-testim-1-item">
                                                    <div class="pxp-testim-1-item-avatar pxp-cover" style="background-image: url({{ asset('assets/light/images/customer-3.jpg') }})"></div>
                                                    <div class="pxp-testim-1-item-name">Kenneth Spiers</div>
                                                    <div class="pxp-testim-1-item-location">Cleveland, OH</div>
                                                    <div class="pxp-testim-1-item-message">While OShelter functions like a traditional broker, the company's promise is using technology to reduce the time and friction of  buying and selling house or apartment.</div>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="pxp-testim-1-item">
                                                    <div class="pxp-testim-1-item-avatar pxp-cover" style="background-image: url({{ asset('assets/light/images/customer-4.jpg') }})"></div>
                                                    <div class="pxp-testim-1-item-name">Susanne Weil</div>
                                                    <div class="pxp-testim-1-item-location">Cambridge, MA</div>
                                                    <div class="pxp-testim-1-item-message">And it???s no wonder OShelter has shaken things up: As anyone who???s ever tried to rent or buy property in Cambridge knows, the experience is loaded with pain points.</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="mt-5">
                                <h4 class="text-center"><strong>FAQs</strong></h4>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h6 class="text-danger">
                                            <strong>
                                            <i class="fa fa-square font-12"></i>
                                            Who can be an OShelter host?
                                            </strong>
                                        </h6>
                                        <p class="font-12">
                                            Answer
                                        </p>
                                        <hr>
                                        <h6 class="text-danger">
                                            <strong>
                                            <i class="fa fa-square font-12"></i>
                                            What is required of guests before booking?
                                            </strong>
                                        </h6>
                                        <p class="font-12">
                                            Answer
                                        </p>
                                        <hr>
                                        <h6 class="text-danger">
                                            <strong>
                                            <i class="fa fa-square font-12"></i>
                                            How much does it cost to list my space?
                                            </strong>
                                        </h6>
                                        <p class="font-12">
                                            Answer
                                        </p>
                                        <hr>
                                    </div>
                                    <div class="col-sm-6">
                                        <h6 class="text-danger">
                                            <strong>
                                            <i class="fa fa-square font-12"></i>
                                            What protection do I have against property damage?
                                            </strong>
                                        </h6>
                                        <p class="font-12">
                                            Answer
                                        </p>
                                        <hr>
                                        <h6 class="text-danger">
                                            <strong>
                                            <i class="fa fa-square font-12"></i>
                                            How should I choose my listing???s price?
                                            </strong>
                                        </h6>
                                        <p class="font-12">
                                            Answer
                                        </p>
                                        <hr>
                                        <h6 class="text-danger">
                                            <strong>
                                            <i class="fa fa-square font-12"></i>
                                            How can OShelter help me with setting prices?
                                            </strong>
                                        </h6>
                                        <p class="font-12">
                                            Answer
                                        </p>
                                        <hr>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br><br>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="container mt-200"></div>

@endsection

@section('scripts')
<script src="{{ asset('assets/light/js/owl.carousel.min.js') }}"></script>
@endsection