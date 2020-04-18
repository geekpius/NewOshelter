@extends('layouts.site')

@section('content')

<div class="pxp-content">
    <div class="pxp-contact pxp-content-wrapper">
        <div class="pxp-contact-hero mt-4 mt-md-5">
            <div class="pxp-contact-hero-fig pxp-cover" style="background-image: url({{ asset('assets/light/images/contact-bg.jpg') }}); background-position: 50% 50%;"></div>

            <div class="pxp-contact-hero-offices-container">
                <div class="container">
                    <div class="pxp-contact-hero-offices">
                        <div class="row">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-8">
                                <div class="mt-md-4">
                                    <h2 class="pxp-section-h2 text-center mb-5">Need Help?</h2>
                                    <div class="text-center">
                                        <div><h4><strong class="text-primary">Booking And Travellers</strong></h4></div>
                                        <img src="" alt="booking" class="">
                                    </div>

                                    <div class="mt-5">
                                        <h6 class="text-danger">
                                            <strong>
                                            <i class="fa fa-square font-12"></i>
                                            What should I do if someone ask me to pay outside OShelter's website?
                                            </strong>
                                        </h6>
                                        <p class="font-12">
                                            Answer
                                        </p>
                                    </div>
                                    <div class="mt-5">
                                        <h6 class="text-danger">
                                            <strong>
                                            <i class="fa fa-square font-12"></i>
                                            What if I need to cancel because of an emergency or unavoidable circumstance?
                                            </strong>
                                        </h6>
                                        <p class="font-12">
                                            Answer
                                        </p>
                                    </div>
                                    <div class="mt-5">
                                        <h6 class="text-danger">
                                            <strong>
                                            <i class="fa fa-square font-12"></i>
                                            How do I contact a host before booking a reservation?
                                            </strong>
                                        </h6>
                                        <p class="font-12">
                                            Answer
                                        </p>
                                    </div>
                                    <div class="mt-5">
                                        <h6 class="text-danger">
                                            <strong>
                                            <i class="fa fa-square font-12"></i>
                                            How do I book a place on Airbnb?
                                            </strong>
                                        </h6>
                                        <p class="font-12">
                                            Answer
                                        </p>
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
</div>


<div class="container mt-200"></div>

@endsection

@section('scripts')
<script src="{{ asset('assets/light/js/jquery.sticky.js') }}"></script>
@endsection