@extends('layouts.site')

@section('style')

@endsection
@section('content')
<div class="pxp-content pull-content-down">
    <div class="container">
        <h2>Payment Request</h2>  
        <p>
            <strong>{{ Auth::user()->name }},</strong> payments 
        </p>
        <div class="pt-4">
            <div class="row">
                @if ($booking->property->type == 'hostel')
                <div class="col-sm-8">
                    <div class="card">
                        <div class="card-body">
                            <p class="font-14">
                                <img src="{{ asset('assets/images/users/'.$booking->owner->image) }}" alt="{{ $booking->owner->name }}" class="thumb-sm rounded-circle mr-1" />
                                This {{ $booking->property->type }} belongs to {{ current(explode(' ',$booking->owner->name))}}. Other people like it.
                            </p>
                            @php
                                $from = \Carbon\Carbon::createFromFormat('Y-m-d', $booking->check_in);
                                $to = \Carbon\Carbon::createFromFormat('Y-m-d', $booking->check_out);
                                $dateDiff = $to->diffInMonths($from);

                                $currency = $booking->hostelBlockRoomNumber->hostelBlockRoom->propertyHostelPrice->currency;
                                $price = $booking->hostelBlockRoomNumber->hostelBlockRoom->propertyHostelPrice->property_price;
                                $totalPrice = ($booking->hostelBlockRoomNumber->hostelBlockRoom->propertyHostelPrice->property_price* $dateDiff);
                                $fee = empty($charge->charge)? 0:$charge->charge;
                                $serviceFee = ($booking->hostelBlockRoomNumber->hostelBlockRoom->propertyHostelPrice->property_price* $dateDiff)*($fee/100);
                                $discount = empty($charge->discount)? 0:$charge->discount;
                                $discountFee = ($booking->hostelBlockRoomNumber->hostelBlockRoom->propertyHostelPrice->property_price* $dateDiff)*($discount/100);
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
                                <form class="mt-4" id="formMobile" method="POST" action="{{ route('requests.payment.mobile') }}">
                                    @csrf
                                    <input type="hidden" name="booking_id" value="{{ $booking->id }}" readonly>
                                    <input type="hidden" name="type" value="{{ $booking->property->type }}" readonly>
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
                @else
                <div class="col-sm-8">
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
                                    $duration = $dateDiff." ".str_plural("month",$dateDiff);
                                }
                                elseif ($booking->property->type_status == 'short_stay') {
                                    $from=date_create($booking->check_in);
                                    $to=date_create($booking->check_out);
                                    $diff=date_diff($from,$to);
                                    $dateDiff = $diff->format("%a");
                                    $duration = $dateDiff." ".str_plural("day",$dateDiff);
                                }
                                
                                $currency = $booking->property->propertyPrice->currency;
                                $price = $booking->property->propertyPrice->property_price;
                                $totalPrice = ($booking->property->propertyPrice->property_price* $dateDiff);
                                $fee = empty($charge->charge)? 0:$charge->charge;
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
                                <form class="mt-4" id="formMobile" method="POST" action="{{ route('requests.payment.mobile') }}">
                                    @csrf
                                    <input type="hidden" name="booking_id" value="{{ $booking->id }}" readonly>
                                    <input type="hidden" name="type" value="{{ $booking->property->type }}" readonly>
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
                @endif
            </div>
        </div>
    </div>    
</div>
@endsection

@section('scripts')
<script src="{{ asset('assets/pages/booking/payment.js') }}"></script> 
<script>
@if (session()->has('message'))
    swal("Warning", "{{ session('message') }}", "warning");
@endif
</script>
@endsection