@extends('layouts.site')

@section('style') 
@endsection
@section('content')
<div class="pxp-content pull-content-down">
    <div class="container">
        <h2>Extension Payment Request</h2>  
        <p>
            <strong>{{ Auth::user()->name }},</strong> payments 
        </p>
        <div class="pt-4">
            <div class="row">
                <div class="col-sm-8">
                    <div class="card">
                        <div class="card-body">
                            <p class="font-14">
                                @php $image = empty($extension->user->image)? 'user.svg': 'users/'.$extension->user->image; @endphp
                                <img src="{{ asset('assets/images/'.$image) }}" alt="{{ $extension->owner->name }}" class="thumb-sm rounded-circle mr-1" />
                                This {{ $extension->visit->property->type }} belongs to {{ current(explode(' ',$extension->owner->name))}}. Other people like it.
                            </p>
                            @php
                                if ($extension->visit->property->type_status == 'rent') {
                                    $from = \Carbon\Carbon::createFromFormat('Y-m-d', $extension->visit->check_out);
                                    $to = \Carbon\Carbon::createFromFormat('Y-m-d', $extension->extension_date);
                                    $dateDiff = $to->diffInMonths($from);

                                    $duration = '';
                                    if($dateDiff >= 12){
                                        $y = $dateDiff/12;
                                        $m = $dateDiff%12;
                                        $year = ($y==1)? $y." year":$y." years";
                                        $month = ($m==1)? $m." month":$m." months";
                                        $duration = $year.(($m==0)? '':$month);
                                    }else{
                                        $duration = $dateDiff." months";
                                    }
                                }elseif ($extension->visit->property->type_status == 'short_stay') {
                                    $from=date_create($extension->visit->check_out);
                                    $to=date_create($extension->extension_date);
                                    $diff=date_diff($from,$to);
                                    $dateDiff = $diff->format("%a");
                                    $duration = ($dateDiff <= 1)? $dateDiff.' day':$dateDiff.' days';
                                }

                                $currency = $extension->visit->property->propertyPrice->currency;
                                $price = $extension->visit->property->propertyPrice->property_price;
                                $totalPrice = ($extension->visit->property->propertyPrice->property_price* $dateDiff);
                                $fee = empty($charge->charge)? 0:$charge->charge;
                                $serviceFee = ($extension->visit->property->propertyPrice->property_price* $dateDiff)*($fee/100);
                                $discount = empty($charge->discount)? 0:$charge->discount;
                                $discountFee = ($extension->visit->property->propertyPrice->property_price* $dateDiff)*($discount/100);
                                $totalFee = ($totalPrice+$serviceFee)-$discountFee;
                            @endphp
                        </div>    
                    </div>
                    <h5>Payment Summary</h5>
                    <div class="card">
                        <div class="card-body">
                            <span class="font-weight-500">{{ $duration }} x {{ $currency }}{{ number_format($price,2) }}</span>
                            <span class="font-weight-500 text-primary float-right">{{ $currency }}{{ number_format($totalPrice,2) }}</span>
                            <hr>
                            <span class="font-weight-500">SERVICE CHARGE</span>
                            <span class="font-weight-500 text-primary float-right">{{ $currency }}{{ number_format($serviceFee,2) }}</span>
                            @if ($discountFee != 0)
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
                                <form class="mt-4" id="formMobile" method="POST" action="{{ route('requests.extension.payment.mobile', $extension->id) }}">
                                    @csrf
                                    <input type="hidden" name="type" value="extension" readonly>
                                    <input type="hidden" name="currency" value="{{ $currency }}" readonly>
                                    <input type="hidden" name="amount" value="{{ $totalPrice }}" readonly>
                                    <input type="hidden" name="service_fee" value="{{ $serviceFee }}" readonly>
                                    <input type="hidden" name="discount_fee" value="{{ $discountFee }}" readonly>
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
            </div>
        </div>
    </div>    
</div>
@endsection

@section('scripts')   
<script src="{{ asset('assets/pages/booking/payment.js') }}"></script>   
@endsection