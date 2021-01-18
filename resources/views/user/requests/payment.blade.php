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

                    <div class="col-sm-12 mt-2">
                        <form id="paymentForm" data-url="{{ route('payments.verify') }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                            <input type="hidden" name="booking_id" value="{{ $booking->id }}" readonly>
                            <input type="hidden" name="type" value="{{ $booking->property->type }}" readonly>
                            <input type="hidden" name="currency" id="userCurrency" value="{{ $currency }}" readonly>
                            <input type="hidden" name="amount" value="{{ $totalPrice }}" readonly>
                            <input type="hidden" name="service_fee" value="{{ $serviceFee }}" readonly>
                            <input type="hidden" name="discount_fee" value="{{ $discountFee }}" readonly>
                            <input type="hidden" id="email-address" value="{{ Auth::user()->email }}" required readonly />
                            <input type="hidden" id="totalFee" value="{{ $totalFee }}" required readonly />
                            <input type="hidden" id="referenceId" value="VTB{{ \Carbon\Carbon::parse(now())->format('dmYHis') }}" required readonly />
                            <div class="form-submit">
                              <button type="submit" onclick="payWithPaystack()" class="btn btn-primary pl-5 pr-5 font-weight-600" id="paymentButton">
                                  PAY NOW {{ $currency }} {{ number_format(($totalFee),2) }}
                              </button>
                            </div>
                        </form>
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

                    <div class="col-sm-12 mt-2">
                        <form id="paymentForm" data-url="{{ route('payments.verify') }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                            <input type="hidden" name="booking_id" value="{{ $booking->id }}" readonly>
                            <input type="hidden" name="type" value="{{ $booking->property->type }}" readonly>
                            <input type="hidden" name="currency" id="userCurrency" value="{{ $currency }}" readonly>
                            <input type="hidden" name="amount" value="{{ $totalPrice }}" readonly>
                            <input type="hidden" name="service_fee" value="{{ $serviceFee }}" readonly>
                            <input type="hidden" name="discount_fee" value="{{ $discountFee }}" readonly>
                            <input type="hidden" id="email-address" value="{{ Auth::user()->email }}" required readonly />
                            <input type="hidden" id="totalFee" value="{{ $totalFee }}" required readonly />
                            <input type="hidden" id="referenceId" value="VTB{{ \Carbon\Carbon::parse(now())->format('dmYHis') }}" required readonly />
                            <div class="form-submit">
                              <button type="submit" onclick="payWithPaystack()" class="btn btn-primary pl-5 pr-5 font-weight-600" id="paymentButton">
                                  PAY NOW {{ $currency }} {{ number_format(($totalFee),2) }}
                              </button>
                            </div>
                        </form>
                          
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
<script src="https://js.paystack.co/v1/inline.js"></script> 
<script src="{{ asset('assets/pages/booking/payment.js') }}"></script> 
@endsection