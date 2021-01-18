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
                    @if ($extension->type=='hostel')
                        <div class="card">
                            <div class="card-body">
                                <p class="font-14">
                                    @php $image = empty($extension->owner->image)? 'user.svg': 'users/'.$extension->owner->image; @endphp
                                    <img src="{{ asset('assets/images/'.$image) }}" alt="{{ $extension->owner->name }}" class="thumb-sm rounded-circle mr-1" />
                                    This {{ $extension->hostelVisit->property->type }} belongs to {{ current(explode(' ',$extension->owner->name))}}. Other people like it.
                                </p>
                                @php
                                    $from = \Carbon\Carbon::createFromFormat('Y-m-d', $extension->hostelVisit->check_out);
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
                                        $duration = $dateDiff." ".str_plural("month", $dateDiff);
                                    }
                                    

                                    $currency = $extension->hostelVisit->hostelBlockRoom->propertyHostelPrice->currency;
                                    $price = $extension->hostelVisit->hostelBlockRoom->propertyHostelPrice->property_price;
                                    $totalFee = ($extension->hostelVisit->hostelBlockRoom->propertyHostelPrice->property_price* $dateDiff);
                                @endphp
                            </div>    
                        </div>
                        <h5>Payment Summary</h5>
                        <div class="card">
                            <div class="card-body">
                                <span class="font-weight-500">{{ $duration }} x {{ $currency }} {{ number_format($price,2) }}</span>
                                <span class="font-weight-500 text-primary float-right">{{ $currency }}{{ number_format($totalFee,2) }}</span>
                                <hr>
                                <span class="font-weight-500">TOTAL PAYMENT</span>
                                <span id="totalPayment" class="font-weight-500 text-primary float-right">{{ $currency }}{{ number_format($totalFee,2) }}</span>
                            </div>
                        </div>
                        
                        <div class="col-sm-12 mt-2">
                            <form id="paymentForm" data-url="{{ route('payments.verify') }}">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                                <input type="hidden" name="booking_id" value="{{ $extension->id }}" readonly>
                                <input type="hidden" name="type" value="extension_request" readonly>
                                <input type="hidden" name="currency" id="userCurrency" value="{{ $currency }}" readonly>
                                <input type="hidden" name="amount" value="{{ $totalFee }}" readonly>
                                <input type="hidden" name="service_fee" value="0" readonly>
                                <input type="hidden" name="discount_fee" value="0" readonly>
                                <input type="hidden" id="email-address" value="{{ Auth::user()->email }}" required readonly />
                                <input type="hidden" id="totalFee" value="{{ $totalFee }}" required readonly />
                                <input type="hidden" id="referenceId" value="VTE{{ \Carbon\Carbon::parse(now())->format('dmYHis') }}" required readonly />

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
                    @else
                        <div class="card">
                            <div class="card-body">
                                <p class="font-14">
                                    @php $image = empty($extension->owner->image)? 'user.svg': 'users/'.$extension->owner->image; @endphp
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
                                            $duration = $dateDiff." ".str_plural("month", $dateDiff);
                                        }
                                    }elseif ($extension->visit->property->type_status == 'short_stay') {
                                        $from=date_create($extension->visit->check_out);
                                        $to=date_create($extension->extension_date);
                                        $diff=date_diff($from,$to);
                                        $dateDiff = $diff->format("%a");
                                        $duration = $dateDiff.' '.str_plural("day", $dateDiff);
                                    }

                                    $currency = $extension->visit->property->propertyPrice->currency;
                                    $price = $extension->visit->property->propertyPrice->property_price;
                                    $totalFee = ($extension->visit->property->propertyPrice->property_price* $dateDiff);
                                @endphp
                            </div>    
                        </div>
                        <h5>Payment Summary</h5>
                        <div class="card">
                            <div class="card-body">
                                <span class="font-weight-500">{{ $duration }} x {{ $currency }}{{ number_format($price,2) }}</span>
                                <span class="font-weight-500 text-primary float-right">{{ $currency }}{{ number_format($totalFee,2) }}</span>
                                <hr>
                                <span class="font-weight-500">TOTAL PAYMENT</span>
                                <span id="totalPayment" class="font-weight-500 text-primary float-right">{{ $currency }}{{ number_format($totalFee,2) }}</span>
                            </div>
                        </div>

                        <div class="col-sm-12 mt-2">
                            <form id="paymentForm" data-url="{{ route('payments.verify') }}">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                                <input type="hidden" name="booking_id" value="{{ $extension->id }}" readonly>
                                <input type="hidden" name="type" value="extension_request" readonly>
                                <input type="hidden" name="currency" id="userCurrency" value="{{ $currency }}" readonly>
                                <input type="hidden" name="amount" value="{{ $totalFee }}" readonly>
                                <input type="hidden" name="service_fee" value="0" readonly>
                                <input type="hidden" name="discount_fee" value="0" readonly>
                                <input type="hidden" id="email-address" value="{{ Auth::user()->email }}" required readonly />
                                <input type="hidden" id="totalFee" value="{{ $totalFee }}" required readonly />
                                <input type="hidden" id="referenceId" value="VTE{{ \Carbon\Carbon::parse(now())->format('dmYHis') }}" required readonly />

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
                    @endif
                </div>
            </div>
        </div>
    </div>    
</div>
@endsection

@section('scripts')   
<script src="https://js.paystack.co/v1/inline.js"></script> 
<script src="{{ asset('assets/pages/booking/payment.js') }}"></script>   
@endsection