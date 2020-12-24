@extends('layouts.site')

@section('content')

<div class="pxp-content pull-content-down">
    <div class="">
        <div class="pxp-contact-hero mt-4 mt-md-5">
            <div class="pxp-contact-hero-fig pxp-cover" style="background-image: url({{ asset('assets/light/images/contact-bg.jpg') }}); background-position: 50% 50%;"></div>

            <div class="pxp-contact-hero-offices-container">
                <div class="container">
                    <div class="pxp-contact-hero-offices">
                        <h2 class="pxp-section-h2">Why Choose Us</h2>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="pxp-contact-hero-offices-title mt-3 mt-md-4">
                                    Title
                                </div>
                            </div>
                        </div>
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