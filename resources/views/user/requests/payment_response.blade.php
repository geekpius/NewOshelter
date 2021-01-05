@extends('layouts.site')

@section('style')

@endsection
@section('content')
<div class="pxp-content pull-content-down">
    <div class="container">
        <h2>Payment</h2>  
        <p>
            <strong>{{ Auth::user()->name }},</strong> payments 
        </p>
        <div class="pt-4">
            <div class="row">
                <div class="col-sm-8">
                    <div class="card-body">                        
                        <div class="text-center">
                            <div class="text-primary"><i class="fa fa-spin fa-spinner fa-5x"></i></div>
                            <h5 class="text-primary"> Waiting for acceptance on your phone</h5>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <span class="font-weight-500 font-16">Payment Number</span>
                                <span class="font-weight-500 font-16 float-right">Amount Paid</span>
                                <br>
                                {{-- <hr> --}}
                                <span class="font-14">{{ $transaction->payment_id }}</span>
                                <span class="font-14 float-right">{{ $transaction->currency }} {{ number_format($transaction->payableAmount(),2) }}</span>
                            </div>
                        </div>
                        <hr>
                        <div class="card">
                            <div class="card-body">
                            <p class="font-14">
                                You will receive a prompt on your mobile number <span class="font-weight-500">{{ $transaction->phone }}</span> to enter your PIN to authorize your payment request of <span class="font-weight-500">{{ $transaction->currency }} {{ number_format($transaction->payableAmount(),2) }}</span> with the account number 
                                <span class="font-weight-500">{{ $transaction->payment_id }}</span>. Please note that mobile money service fees apply and will be added to your payment of <span class="font-weight-500">{{ $transaction->currency }} {{ number_format($transaction->payableAmount(),2) }}</span> before you authorise your payment.
                            </p>
                            <p class="text-danger mt-4 font-weight-bold">
                                <i class="fa fa-info-circle"></i> Make sure you have enough money in your wallet to cover {{ $transaction->currency }} {{ number_format(($transaction->payableAmount()),2) }} in your invoice.
                            </p>
                            <p class="text-danger mt-3 font-weight-bold">
                                <i class="fa fa-info-circle"></i> For MTN users, mobile bill prompt will only be sent if you have enough money in your wallet to cover {{ $transaction->currency }} {{ number_format(($transaction->payableAmount()),2) }} in your invoice
                            </p>
                            </div>
                        </div>
                    </div><!--end card-body--> 
                </div>
            </div>
        </div>
    </div>    
</div>
@endsection

@section('scripts')

@endsection