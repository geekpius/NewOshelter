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
                            <div class="text-success"><i class="fa fa-check-circle fa-5x"></i></div>
                            <h5 class="text-success"> Payment successful</h5>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <span class="font-weight-500 font-16">Reference Number</span>
                                <span class="font-weight-500 font-16 float-right">Amount Paid</span>
                                <br>
                                <hr>
                                <span class="font-14">{{ $transaction->reference_id }}</span>
                                <span class="font-14 float-right">{{ $transaction->currency }} {{ number_format($transaction->payableAmount(),2) }}</span>
                            </div>
                        </div>
                        <p>Congratulation, you have successfully made payment for your booked property. Check your payment status <a href="{{ route('payments') }}">here</a></p>
                    </div><!--end card-body--> 
                </div>
            </div>
        </div>
    </div>    
</div>
@endsection

@section('scripts')

@endsection