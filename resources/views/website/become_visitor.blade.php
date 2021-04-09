@extends('layouts.site')

@section('style')
<link rel="stylesheet" href="{{ asset('assets/light/css/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/light/css/owl.theme.default.min.css') }}">
@endsection

@section('content')

<div class="pxp-content pull-content-down">
    <div class="container">
        <h2>Becoming A Visitor</h2>  
        <p>
           Your new chapter for becoming a visitor 
        </p>
        <div id="" class="pt-4">
            <div class="row">
                <div class="col-sm-12">
                    <p>
                        <img src="{{ asset('assets/images/svg/visitor.png') }}" alt="Visitor_logo" width="400" height="200" style="margin-right:15px; float: left;">
                        Anyone can browse our numerous properties on our Oshelter platform without signing up. However, prospective tenants are required 
                        to sign up to book for a property or buy one. Once a sign up is made, payment and management of the booked property is 
                        securely done at the account section where every data received will be reviewed. This measure is implemented to reduce and 
                        prevent fraudulent activities on our portal.
                    </p>
                </div>
                <div class="col-sm-12">
                    <br><br>
                    
                </div>
            </div>
        </div>
    </div>   
</div>
@endsection

@section('scripts')
<script src="{{ asset('assets/light/js/owl.carousel.min.js') }}"></script>
@endsection