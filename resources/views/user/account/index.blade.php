@extends('layouts.site')

@section('content')

<div class="pxp-content pull-content-down">
    <div class="container">
        <div class="row">
            <div class="col-9">
                <h2>User Account</h2>  
                <p>
                    <strong>{{ Auth::user()->name }},</strong> account owner 
                </p>
            </div>
            <div class="col-3">
                <img src="{{ (empty(Auth::user()->image))? asset('assets/images/user.svg'):asset('assets/images/users/'.Auth::user()->image) }}" alt="{{ Auth::user()->name }}" class="thumb-md rounded-circle mobile-profile-avatar" />
            </div>
        </div>
        <div id="account-group" class="pt-4 account-options">
            <div id="backContainer" class="mb-3" style="display: none">
                <a href="#" id="goBack" style="text-decoration: none">Back</a>
            </div>
            <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-4">
                    <div class="card card-bordered-blue">
                        <div class="card-body">
                            <i class="fa fa-user-circle text-primary account-icon"></i>
                            <a href="{{ route('account.info') }}" class="text-decoration-none text-light-dark">
                                <p class="font-18 font-weight-bold">Account Info ></p>
                            </a>
                            <p class="font-13 account-details">Provide account and personal details. This help us reach you.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4">
                    <div class="card card-bordered-blue">
                        <div class="card-body">
                            <i class="fa fa-lock text-primary account-icon"></i>
                            <a href="{{ route('account.changepwd') }}" class="text-decoration-none text-light-dark">
                                <p class="font-18 font-weight-bold">Change Password ></p>
                            </a>
                            <p class="font-13 account-details">Change your password if you feel there's unusual activities in your account.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4">
                    <div class="card card-bordered-blue">
                        <div class="card-body">
                            <i class="fa fa-sign-in text-primary account-icon"></i>
                            <a href="{{ route('account.logins') }}" class="text-decoration-none text-light-dark">
                                <p class="font-18 font-weight-bold">Logins & Security ></p>
                            </a>
                            <p class="font-13 account-details">We provide you with all your logins activities of your account.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4">
                    <div class="card card-bordered-blue">
                        <div class="card-body">
                            <i class="fa fa-money text-primary account-icon"></i>
                            <a href="{{ route('account.payments') }}" class="text-decoration-none text-light-dark">
                                <p class="font-18 font-weight-bold">Payments and Currency ></p>
                            </a>
                            <p class="font-13 account-details">Check out payments, payout and claim coupons, and gift cards.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4">
                    <div class="card card-bordered-blue">
                        <div class="card-body">
                            <i class="fa fa-send text-primary account-icon"></i>
                            <a href="{{ route('account.requests') }}" class="text-decoration-none text-light-dark">
                                <p class="font-18 font-weight-bold">Requests and Actions ></p>
                            </a>
                            <p class="font-13 account-details">Checkout your activities like bookings, cancellations, payments.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4">
                    <div class="card card-bordered-blue">
                        <div class="card-body">
                            <i class="fa fa-bell text-primary account-icon"></i>
                            <a href="{{ route('account.notifications') }}" class="text-decoration-none text-light-dark">
                                <p class="font-18 font-weight-bold">Notifications ></p>
                            </a>
                            <p class="font-13 account-details">Select notications of your choice and news subscriptions.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="account-mobile-init-view pt-4">
            <div class="row">
                <div class="col-sm-12">
                    <a href="#show=true" data-url="{{ route('account') }}" class="text-decoration-none text-light-dark" id="account">
                        <p class="font-16 font-weight-bold"><i class="fa fa-cog"></i> Account</p>
                    </a>
                </div>
                <div class="col-sm-12"><hr></div>
                <div class="col-sm-12">
                    <p class="text-muted font-12">Listing</p>
                    <a href="{{ route('property.add') }}" class="text-decoration-none text-light-dark">
                        <p class="font-16 font-weight-bold"><i class="fa fa-home"></i> List a property</p>
                    </a>
                </div>
                <div class="col-sm-12"><hr></div>
                <div class="col-sm-12">
                    <p class="text-muted font-12">Support</p>
                    <a href="{{ route('help') }}" class="text-decoration-none text-light-dark">
                        <p class="font-16 font-weight-bold"><i class="fa fa-question-circle"></i> Help</p>
                    </a>
                </div>
                <div class="col-sm-12"><hr></div>
                <div class="col-sm-12 text-center">
                    <a class="btn btn-danger btn-block" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i> Log out</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>    
</div>

@endsection

@section('scripts')
<script src="{{ asset('assets/pages/account/index.js') }}"></script>
@endsection