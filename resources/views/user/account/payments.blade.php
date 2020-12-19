@extends('layouts.site')

@section('content')

<div class="pxp-content pull-content-down">
    <div class="container">
        <h2>Payments</h2>  
        <p>
            <strong>{{ Auth::user()->name }},</strong> account owner 
        </p>
        <div id="" class="pt-4">
            @include('includes.gobackroute')
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-bordered-blue">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <p>
                                        <strong class="text-primary">Make all payments through OShelter</strong><br>
                                        Always pay and communicate through OShelter to ensure you're protected under our Terms of Service, 
                                        Payments Terms of Service, cancellation, and other safeguards. <a href="javascript:void(0);" class="text-primary">Learn more</a>
                                    </p>
                                    <p>
                                        <strong class="text-primary">Payout</strong><br>
                                        When you receive a payment for a reservation, we call that payment to you a "payout." Our secure payment system 
                                        supports several payment methods. <br>
                                        To get paid, you need to set up a payment method OShelter releases payouts about 24 hours after a guest’s scheduled 
                                        check-in time. The time it takes for the funds to appear in your account depends on your payment method. <a href="javascript:void(0);" class="text-primary">Learn more</a>
                                    </p>
                                </div>
                                
                                <div class="col-sm-6">
                                    <h5 class="text-primary mb-3">Payments</h5>
                                    <div class="">
                                        <strong>Payment methods</strong><br>
                                        <p>OShelter do not store your payment details on our system. You only enter payment details when making a 
                                            transaction. It is a way of sure that your payment info is protected and only you knows. All our transactions 
                                            are heavily encrypted which makes you save and secure. Start planning your next trip.</p>

                                        {{-- <button class="btn btn-primary btn-sm text-light px-4" data-toggle="modal" data-target="#PaymentMethodModal"><i class="fa fa-plus-circle"></i> Payment Method</button> --}}
                                    </div>
                                    
                                    {{-- <div class="">
                                        <strong class="">Coupons</strong><br>
                                        <p>Add a coupon and save on your next trip.</p>
                                        <p>Your coupon <span class="ml-5">0</span></p>
                                        <form class="form-horizontal form-material mb-0" id="formCoupon" style="display: none">
                                            <div class="form-group validate">
                                                <input type="text" name="coupon_code" id="coupon_code" placeholder="Enter coupon code" class="form-control">
                                                <span class="text-danger small mySpan" role="alert"></span>                                  
                                            </div>
                                            <div class="form-group">
                                                <button class="btn btn-gradient-primary btn-sm text-light px-4 btnSaveCoupon">Redeem Coupon</button>
                                                <button type="button" class="btn btn-default btn-sm text-light px-4 ml-4 btnSaveCouponCancel text-dark">Cancel</button>
                                            </div>
                                        </form>
                                        <button class="btn btn-primary btn-sm text-light px-4 mb-5 btnAddCoupon"><i class="fa fa-plus-circle"></i> Add Coupon</button>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</div>

@endsection

@section('scripts')
<script src="{{ asset('assets/pages/account/all-groups.js') }}"></script>
@endsection