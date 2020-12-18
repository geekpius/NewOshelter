@extends('layouts.site')

@section('content')

<div class="pxp-content pull-content-down">
    <div class="container">
        <h2>User Account</h2>  
        <p>
            <strong>{{ Auth::user()->name }},</strong> account owner 
        </p>
        <div id="account-group" class="pt-4">
            <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-4">
                    <div class="card card-bordered-blue">
                        <div class="card-body">
                            <i class="fa fa-user-circle text-primary"></i>
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
                            <i class="fa fa-lock text-primary"></i>
                            <a href="#" class="text-decoration-none text-light-dark">
                                <p class="font-18 font-weight-bold">Change Password ></p>
                            </a>
                            <p class="font-13 account-details">Change your password if you feel there's unusual activities in your account.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4">
                    <div class="card card-bordered-blue">
                        <div class="card-body">
                            <i class="fa fa-sign-in text-primary"></i>
                            <a href="#" class="text-decoration-none text-light-dark">
                                <p class="font-18 font-weight-bold">Logins & Security ></p>
                            </a>
                            <p class="font-13 account-details">We provide you with all your logins activities of your account.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4">
                    <div class="card card-bordered-blue">
                        <div class="card-body">
                            <i class="fa fa-money text-primary"></i>
                            <a href="#" class="text-decoration-none text-light-dark">
                                <p class="font-18 font-weight-bold">Payments ></p>
                            </a>
                            <p class="font-13 account-details">Check out payments, payout and claim coupons, and gift cards.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4">
                    <div class="card card-bordered-blue">
                        <div class="card-body">
                            <i class="fa fa-bell text-primary"></i>
                            <a href="#" class="text-decoration-none text-light-dark">
                                <p class="font-18 font-weight-bold">Notifications ></p>
                            </a>
                            <p class="font-13 account-details">Select notications of your choice and news subscriptions.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</div>

@endsection

@section('scripts')

@endsection