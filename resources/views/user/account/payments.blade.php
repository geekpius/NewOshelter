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
                                        <strong>Make all payments through OShelter</strong><br>
                                        Always pay and communicate through OShelter to ensure you're protected under our Terms of Service,
                                        Payments Terms of Service, cancellation, and other safeguards. <a href="javascript:void(0);" class="text-primary">Learn more</a>
                                    </p>
                                    <p>
                                        <strong>Payout</strong><br>
                                        When you receive a payment for a reservation, we call that payment to you a "payout." Our secure payment system
                                        supports several payment methods. <br>
                                        To get paid, you need to <a href="#">request for payout</a>. OShelter releases payouts about 24-48 hours after a visitor's scheduled
                                        check-in time. The time it takes for the funds to appear in your account depends on your payment method. <a href="javascript:void(0);" class="text-primary">Learn more</a>
                                    </p>
                                </div>

                                <div class="col-sm-6">
                                    <strong>Payment methods</strong><br>
                                    <p>OShelter do not store your payment details on our system. You only enter payment details when making a
                                        transaction. It is a way to make sure that your payment info is protected and only you knows. All our transactions
                                        are heavily encrypted which makes you save and secure. @if (Auth::user()->isOwner())
                                        <a href="{{ route('property.add') }}">Start planning your next visit</a>.
                                        @endif
                                    </p>
                                    {{-- <div>
                                        <span class="font-14 float-right"><a href="#" class="text-decoration-none btn-edit">Edit</a></span>
                                        <p class="font-weight-bold font-14">Choosen currency</p>
                                        <p class="font-14" id="choosenCurrency">{{ Auth::user()->userCurrency? Auth::user()->userCurrency->getCurrencyName():'Ghana Cedis' }}</p>
                                        <form id="formCurrency" style="display: none" data-url="{{ route('account.payments.currency') }}">
                                            <div class="form-group validate">
                                                <select name="currency" class="form-control" data-currency="{{ Auth::user()->userCurrency? Auth::user()->userCurrency->currency:'GHS' }}">
                                                    @foreach ($currencies as $currency)
                                                    <option value="{{ $currency->symbol }}">{{ $currency->currency }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <button class="btn btn-primary btn-sm px-4">Save</button>
                                            </div>
                                        </form>
                                    </div> --}}
                                    @if (Auth::user()->isOwner())
                                        <hr>
                                    <div>
                                        @if (!Auth::user()->userCurrency)
                                        <span class="font-14 float-right"><a href="#" class="text-decoration-none btn-edit">Edit</a></span>
                                        @endif
                                        <p class="font-weight-bold font-14">Choosen currency</p>
                                        <p class="font-14" id="choosenCurrency">{{ Auth::user()->userCurrency? Auth::user()->userCurrency->getCurrencyName():'Ghana Cedis' }}</p>
                                        <form id="formCurrency" data-url="{{ route('account.payments.currency') }}">
                                            <div class="form-group validate">
                                                <select name="currency" class="form-control" data-currency="{{ Auth::user()->userCurrency? Auth::user()->userCurrency->currency:'GHS' }}">
                                                    @foreach ($currencies as $currency)
                                                    <option value="{{ $currency->symbol }}">{{ $currency->currency }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <button class="btn btn-primary btn-sm px-4">Save</button>
                                            </div>
                                        </form>
                                    </div>
                                    @endif
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
