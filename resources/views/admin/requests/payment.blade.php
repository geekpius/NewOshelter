@extends('admin.layouts.app')

@section('styles') 

@endsection
@section('content')

<div class="container-fluid">
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-right">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active">Payment Requests</li>
                    </ol>
                </div>
                <h4 class="page-title">Payment Requests</h4>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
    <!-- end page title end breadcrumb -->
   
    <div class="card">
        
        <div class="row">
          
            <div class="col-sm-12">

                <div class="card-body pt-12">

                    <h4 class="header-title mt-lg-12 mb-3">Payment Requests</h4> 
                    
                    <br>
                    @if ($booking->property->type == 'hostel')
                    @else
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <p class="font-14">
                                        <img src="{{ asset('assets/images/users/'.$booking->owner->image) }}" alt="{{ $booking->owner->name }}" class="thumb-sm rounded-circle mr-1" />
                                        This {{ $booking->property->type }} belongs to {{ current(explode(' ',$booking->owner->name))}}. Other people like it.
                                    </p>
                                    @php
                                        if ($booking->property->type_status == 'rent') {
                                            $from = \Carbon\Carbon::createFromFormat('Y-m-d', $booking->check_in);
                                            $to = \Carbon\Carbon::createFromFormat('Y-m-d', $booking->check_out);
                                            $dateDiff = $to->diffInMonths($from);
                                        }
                                        $years = '';
                                        if($dateDiff >= 12){
                                            $y = $dateDiff/12;
                                            $m = $dateDiff%12;
                                            $year = ($y==1)? $y." year":$y." years";
                                            $month = ($m==1)? $m." month":$m." months";
                                            $years = $year.(($m==0)? '':$month);
                                        }else{
                                            $years = $dateDiff." months";
                                        }
                                        
                                        $currency = $booking->property->propertyPrice->currency;
                                        $price = $booking->property->propertyPrice->property_price;
                                        $totalPrice = ($booking->property->propertyPrice->property_price* $dateDiff);
                                        $fee = empty($charge->charge)? 1:$charge->charge;
                                        $serviceFee = ($booking->property->propertyPrice->property_price* $dateDiff)*($fee/100);
                                        $discount = empty($charge->discount)? 0:$charge->discount;
                                        $discountFee = ($booking->property->propertyPrice->property_price* $dateDiff)*($discount/100);
                                        $totalFee = ($totalPrice+$serviceFee)-$discountFee;
                                    @endphp
                                </div>    
                            </div>
                            <h5>Payment Summary</h5>
                            <div class="card">
                                <div class="card-body">
                                    <span class="font-weight-500">{{ $dateDiff.' months' }} x {{ $currency }}{{ number_format($price,2) }}</span>
                                    <span class="font-weight-500 text-primary float-right">{{ $currency }}{{ number_format($totalPrice,2) }}</span>
                                    <hr>
                                    <span class="font-weight-500">SERVICE CHARGE</span>
                                    <span class="font-weight-500 text-primary float-right">{{ $currency }}{{ number_format($serviceFee,2) }}</span>
                                    @if (!empty($charge->discount))
                                    <hr>
                                    <span class="font-weight-500">DISCOUNT CHARGE</span>
                                    <span class="font-weight-500 text-primary float-right">{{ $currency }}{{ number_format($discountFee,2) }}</span>
                                    @endif
                                    <hr>
                                    <span class="font-weight-500">TOTAL PAYMENT</span>
                                    <span id="totalPayment" class="font-weight-500 text-primary float-right">{{ $currency }}{{ number_format($totalFee,2) }}</span>
                                </div>
                            </div>

                            <h5>Choose Payment Methods</h5>
                            <div class="card">
                                <div class="card-body">
                                    {{-- visa --}}
                                    <div class="radio radio-success">
                                        <input type="radio" name="payment_method" id="visa" value="Mobile Money" />
                                        <label for="visa" class="font-weight-600 text-black">
                                            VISA
                                        </label>
                                    </div>
                                    <div id="visaExpand" style="display: none">
                                        <hr>
                                        <form class="mt-4" id="formVisa">
                                            @csrf
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group validate">
                                                        <input type="number" min="1" name="visa_number" placeholder="VISA Number(**************)" onkeypress="return isNumber(event)" class="form-control" />
                                                        <span class="text-danger small mySpan" role="alert"></span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group validate">
                                                        <input type="text" name="expire" id="expire" maxlength="5" onkeypress="return isMonthAndYear(event)" class="form-control" placeholder="mm/yy" />
                                                        <span class="text-danger small mySpan" role="alert"></span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group validate">
                                                        <input type="password" name="ccv" id="ccv" min="0" maxlength="3" class="form-control" placeholder="CCV(***)">
                                                        <span class="text-danger small mySpan" role="alert"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                    {{-- momo --}}
                                    <div class="radio radio-success mt-3">
                                        <input type="radio" name="payment_method" id="mobile_money" value="Mobile Money" />
                                        <label for="mobile_money" class="font-weight-600 text-black">
                                            Mobile Money
                                        </label>
                                    </div>
                                    <div id="momoExpand" style="display: none">
                                        <hr>
                                        <form class="mt-4" id="formMobile" method="POST" action="{{ route('requests.payment.mobile', $booking->id) }}">
                                            @csrf
                                            <input type="hidden" name="currency" value="{{ $currency }}" readonly>
                                            <input type="hidden" name="payable_amount" value="{{ $totalFee }}" readonly>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group validate">
                                                        <select name="mobile_operator" id="mobile_operator" class="form-control">
                                                            <option value="">Select your operator</option>
                                                            <option value="MTN_MONEY">MTN Mobile Money</option>
                                                            <option value="AIRTEL_MONEY">AirtelTigo Money</option>
                                                            <option value="VODAFONE_CASH_PROMPT">Vodafone Cash</option>
                                                        </select>
                                                        <span class="text-danger small mySpan" role="alert"></span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group validate">
                                                        <input type="text" name="country_code" id="country_code" value="+233" class="form-control" readonly placeholder="Code" />
                                                        <span class="text-danger small mySpan" role="alert"></span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-9">
                                                    <div class="form-group validate">
                                                        <input type="number" name="mobile_number" id="mobile_number" min="1" maxlength="9" class="form-control" placeholder="eg: 542398441">
                                                        <span class="text-danger small mySpan" role="alert"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12 mt-2">
                                <button class="btn btn-primary pl-5 pr-5 makePayment font-weight-600">
                                    PAY NOW {{ $currency }} {{ number_format(($totalFee),2) }}
                                </button>
                                <br>
                                <p class="text-danger mt-4 font-weight-bold">
                                    <i class="fa fa-info-circle"></i> Make sure you have enough money in your wallet to cover {{ $currency }} {{ number_format(($totalFee),2) }} in your invoice.
                                </p>
                                <p class="text-danger mt-3 font-weight-bold">
                                    <i class="fa fa-info-circle"></i> For MTN users, mobile bill prompt will only be sent if you have enough money in your wallet to cover {{ $currency }} {{ number_format(($totalFee),2) }} in your invoice
                                </p>
                            </div>


                        </div>
                    @endif
                </div><!--end card-body--> 
                
            </div><!--end col--> 
            <div class="col-sm-3"></div>                    
        </div><!-- End row -->
    </div>

</div><!-- container -->

@endsection

@section('scripts')
@if ($booking->property->type=='hostel')
@else
<script src="{{ asset('assets/pages/booking/payment.js') }}"></script>   
@endif
@endsection