@extends('layouts.site')

@section('content')

<div class="pxp-content">
    <div class="pxp-contact pxp-content-wrapper">
        <div class="pxp-contact-hero mt-4 mt-md-5">
            <div class="pxp-contact-hero-fig pxp-cover" style="background-image: url({{ asset('assets/light/images/contact-bg.jpg') }}); background-position: 50% 50%;"></div>

            <div class="pxp-contact-hero-offices-container">
                <div class="container">
                    <div class="pxp-contact-hero-offices">
                        <h2 class="pxp-section-h2 text-center">Your Account Is Deactivated</h2>
                        <div class="row">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-6">
                                <div class="mt-3 mt-md-4">
                                    <p>
                                        <i class="fa fa-dot-circle-o text-primary"></i>
                                        Your account will not be seen so does your listings and reservations. 
                                    </p>
                                    <p>
                                        <i class="fa fa-dot-circle-o text-primary"></i>
                                        You will not be able to access anything on OShelter with the deactivated account.
                                    </p>
                                    <p class="mt-5">
                                        Would you like to re-activate your account? <a href="#">Re-Activate Account</a>
                                    </p>
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