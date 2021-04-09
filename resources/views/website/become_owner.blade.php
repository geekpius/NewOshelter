@extends('layouts.site')

@section('style')
<link rel="stylesheet" href="{{ asset('assets/light/css/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/light/css/owl.theme.default.min.css') }}">
@endsection

@section('content')

<div class="pxp-content pull-content-down">
    <div class="container">
        <h2>Becoming An Owner</h2>  
        <p>
           Your new chapter for becoming an owner 
        </p>
        <div id="" class="pt-4">
            <div class="row">
                <div class="col-sm-12">
                    <p>
                        <img src="{{ asset('assets/images/svg/owner.png') }}" alt="Owner_logo" width="400" height="200" style="margin-right:15px; float: left;">
                        Property owners undergo a validation process when signing onto our platform. This process collects and reviews their background 
                        information which confirms their identity, address/residence, profession, work place, next of kin, among others. We also perform 
                        background checks on every property posted to our platform by property owners/managers. We’ll ask for, check, and validate all 
                        legal documentation that confirms their ownership, trust, or management of any property listed by them. We have taken these 
                        measures to limit the activities of unscrupulous entities in the real estate industry and to prevent them from invading our system. 
                    </p>

                    <p>
                        After we have reviewed and confirmed a property owner/manager’s account, they can then use our platform to advertise their 
                        properties and manage their tenants from their dashboard. Property owners/managers can receive payment into their bank accounts 
                        from potential tenants through the Oshelter payment platform. Oshelter will send auto SMS and email notifications to landlords 
                        and tenants to update them on new policies, or upcoming events such as expiring leases, etc. Owners/managers could use the 
                        Oshelter platform as the main medium of communication between them and their tenants and can schedule SMS or email alerts to 
                        them. The portal can also be used by landlords to share legal documentation (e.g. tenancy agreements, amendments, rights, 
                        rent control documents, etc.) with tenants.
                    </p>
                </div>
                <div class="col-sm-12">
                    <br><br>
                    <div class="pxp-owner-hero-fig pxp-cover" style="background-image: url({{ asset('assets/light/images/contact-bg.jpg') }}); background-position: 50% 50%;"></div>
                    <div class="bg-text">
                        <h2><strong>Start your ownership journey</strong></h2>
                        <p>Let's get your listing set up together</p>
                        <a href="{{ route('property.add') }}" class="btn btn-primary btn-lg">Get Started</a>
                    </div>
                </div>
            </div>
        </div>
    </div>   
</div>
@endsection

@section('scripts')
<script src="{{ asset('assets/light/js/owl.carousel.min.js') }}"></script>
@endsection