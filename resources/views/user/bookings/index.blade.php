@extends('layouts.site')

@section('style')

@endsection
@section('content')
<div class="pxp-content pull-content-down">
    <div class="container">
        <h2>Booking</h2>  
        <p>
            <strong>{{ Auth::user()->name }},</strong> booking 
        </p>
        <div class="pt-4">
            <div class="row">
                <div class="col-sm-12">   
                    @php
                        $countReview = $property->propertyReviews->count();
                        $accuracyStar = (!$countReview)? 0: $property->sumAccuracyStar()/$countReview;
                        $locationStar = (!$countReview)? 0: $property->sumLocationStar()/$countReview;
                        $securityStar = (!$countReview)? 0: $property->sumSecurityStar()/$countReview;
                        $valueStar = (!$countReview)? 0: $property->sumValueStar()/$countReview;
                        $commStar = (!$countReview)? 0: $property->sumCommunicationStar()/$countReview;
                        $tidyStar = (!$countReview)? 0: $property->sumCleanStar()/$countReview;
                        $sumReviews = $accuracyStar+$locationStar+$securityStar+$valueStar+$commStar+$tidyStar;
                    @endphp
                    @if(empty(Auth::user()->profile->id_front) || empty(Auth::user()->profile->id_back))
                    <div class="row mb-5">
                        <div class="col-sm-4">
                            <div class="flip-box">
                                <div class="flip-box-inner">
                                    @php
                                        $cardFront = (empty(Auth::user()->profile->id_front))? '1.png':'cards/'.Auth::user()->profile->id_front;
                                        $cardBack = (empty(Auth::user()->profile->id_back))? '1.png':'cards/'.Auth::user()->profile->id_back;
                                    @endphp
                                    <div class="text-center mt-2 flip-box-front">
                                        <img src="{{ asset('assets/images/'.$cardFront) }}" alt="ID Card Front" class="front_card" style="width:300px; height:200px; border-radius:2%" />
                                    </div>
                                    <div class="flip-box-back">
                                        <img src="{{ asset('assets/images/'.$cardBack) }}" alt="ID Card Front" class="back_card" style="width:300px; height:200px; border-radius:2%" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-7"></div>
                        <div class="col-sm-6">
                           <div class="mt-5">
                                @if (empty(Auth::user()->profile->id_front) || empty(Auth::user()->profile->id_back))
                                <a href="javascript:void(0);" class="text-primary text-decoration-none btnAddNewID">Add New Government ID Approve</a>
                                @else
                                <i class="fa fa-check text-success"></i> ID is checked
                                @endif
                           </div>
                        </div>

                        <div class="col-sm-12 mt-4">
                            <button class="btn btn-primary pl-5 pr-5 btnNext"><i class="fa fa-arrow-right"></i> Next</button>
                        </div>
                    </div><!-- end row --> 
                    @else
                    @if ($property->type=='hostel')
                    <div class="row">
                        <div class="col-sm-7">
                            <div id="propertyReview" style="display: {{ (Session::get('step')==1)? 'block':'none' }}">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h4>Review {{ $property->type }} rules</h4>
                                    </div>

                                    <div class="col-sm-12 mt-2">
                                        <div class="card card-bordered-pink">
                                            <div class="card-body">
                                                <p class="font-14">
                                                    @php $image = (empty($property->user->image))? "user.svg":"users/".$property->user->image; @endphp
                                                    <img src="{{ asset('assets/images/'.$image) }}" alt="{{ $property->user->name }}" class="thumb-sm rounded-circle mr-1" />
                                                    This property belongs to {{ current(explode(' ',$property->user->name))}}. Other people like it.
                                                </p>
                                            </div>
                                        </div>
                                        @php
                                            $bookingItems = Session::get("bookingItems");
                                            $from = \Carbon\Carbon::parse($bookingItems['check_in']);
                                            $to = \Carbon\Carbon::parse($bookingItems['check_out']);
                                            $dateDiff = $to->diffInMonths($from);
                                        @endphp
                                        <div class="mt-3">
                                            <h4>{{ $dateDiff }}  {{ str_plural('Month', $dateDiff) }} <small>@if ($dateDiff==12) (1 Year) @endif</small></h4>
                                            <div class="row">
                                                <div class="col-sm-12 col-lg-4">
                                                    Check In
                                                    <div class="card card-purple">
                                                        <div class="card-body text-center text-white">
                                                            <strong class="font-16">{{ \Carbon\Carbon::parse($bookingItems['check_in'])->format('d-M-Y') }}</strong>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-lg-4 offset-lg-2">
                                                    Check Out
                                                    <div class="card card-purple">
                                                        <div class="card-body text-center text-white">
                                                            <strong class="font-16">{{ \Carbon\Carbon::parse($bookingItems['check_in'])->format('d-M-Y') }}</strong>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-3">
                                            @if (count($property->propertyOwnRules) || count($property->propertyRules))
                                            <h4>Take note of the rules</h4>
                                            @else
                                            <h6 class="text-danger"><i class="fa fa-arrow-right text-danger font-12"></i> &nbsp; No rules defined.</h6>
                                            @endif
                                            <div class="col-sm-12">
                                                @if (count($property->propertyOwnRules))
                                                    @foreach ($property->propertyOwnRules as $own_rule)
                                                    <p><i class="fa fa-square text-danger font-12"></i> &nbsp; {{ $own_rule->rule }}</p>
                                                    @endforeach
                                                    
                                                    @foreach ($property->propertyRules as $rule)
                                                    <p><i class="fa fa-square text-danger font-12"></i> &nbsp; {{ $rule->rule }}</p>
                                                    @endforeach
                                                @else
                                                    @foreach ($property->propertyRules as $rule)
                                                    <p><i class="fa fa-square text-danger font-12"></i> &nbsp; {{ $rule->rule }}</p>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 mt-3 mb-5">
                                        <button class="btn btn-primary pl-5 pr-5 btnContinue" data-step="1" data-url="{{ route('property.bookings.movenext') }}"><i class="fa fa-arrow-right"></i> Agree and continue</button>
                                    </div>
                                </div> 
                            </div>  

                            <div id="verifyContact" style="display: {{ (Session::get('step')==2)? 'block':'none' }}">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <a href="javascript:void(0);" class="text-primary moveBack text-decoration-none" data-step="2">&lt; Back</a>
                                        <h4 class="mt-2">Verify to boost owner and OShelter early feedback</h4>
                                    </div>  

                                    <div class="col-sm-12 mt-2">
                                        <div class="card card-bordered-pink">
                                            <div class="card-body">
                                                <p class="font-14">
                                                    @php $image = (empty($property->user->image))? "user.svg":"users/".$property->user->image; @endphp
                                                    <img src="{{ asset('assets/images/'.$image) }}" alt="{{ $property->user->name }}" class="thumb-sm rounded-circle mr-1" />
                                                    This property belongs to {{ current(explode(' ',$property->user->name))}}. Other people like it.
                                                </p>
                                            </div>
                                        </div>
                                        <div class="mt-3">
                                            <h4>Click with your property owner</h4>
                                            <p>Say hi to {{ current(explode(' ',$property->user->name))}} to kickstart before you arrive.</p>
                                            <div class="row">
                                                <div class="col-sm-8">
                                                    <div class="form-group validate">
                                                        <textarea name="owner_message" id="owner_message" cols="10" rows="4" class="form-control" placeholder="Hi {{ current(explode(' ',$property->user->name))}}, i'm excited to lodge in your property">{{ (empty(Session::get('owner_message')))? '':Session::get('owner_message') }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-3">
                                            <div id="phoneNumberCover" style="display: {{ (!Auth::user()->verify_sms)? 'block':'none' }}">
                                                <h4>Verify your phone number</h4>
                                                <p class="font-12 text-muted"><i class="fa fa-dot-circle"></i> You will receive verification code on your phone. Resend if taken too long.</p>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group validate phoneNumberField" style="display: {{ empty(Auth::user()->sms_verification_token)? 'block':'none' }}">
                                                            <label for="">Phone Number</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" id="phone_prefix">233</span>
                                                                </div>
                                                                <input type="tel" name="phone_number" id="phone_number" maxlength="9" oninput="removeZero('phone_number')" onkeypress="return isNumber(event);" title="Enter your valid phone number" class="form-control" value="{{ substr(Auth::user()->phone,1) }}" placeholder="eg: 542398441">
                                                            </div>
                                                            <span class="text-danger small mySpan" role="alert"></span>
                                                            <span class="text-danger small" id="phoneSpan" role="alert"></span>
                                                        </div>

                                                        <div class="form-group validate verifyCodeField" style="display: {{ empty(Auth::user()->sms_verification_token)? 'none':'block' }}">
                                                            <label for="">Enter verification code</label>
                                                            <input type="tel" name="verify_code" id="verify_code" onkeypress="return isNumber(event);" class="form-control" placeholder="eg: xxxx" data-url="{{ route('property.bookings.verify') }}" />
                                                            <span class="text-danger small mySpan" role="alert"></span>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>

                                            <div id="verifyNumberCover" style="display: {{ (!Auth::user()->verify_sms)? 'none':'block' }}">
                                                <h4>Phone number is verified</h4>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <p class="font-18"><i class="fa fa-check text-success"></i>  {{ Auth::user()->phone }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 mt-3 mb-5">
                                        <button class="btn btn-primary pl-5 pr-5 btnVerify" data-url="{{ route('property.bookings.smsverification') }}" style="display: {{ (!Auth::user()->verify_sms)? 'block':'none' }}">{{ empty(Auth::user()->sms_verification_token)? 'Send Verification':'Resend Verification' }}</button>
                                        <button class="btn btn-primary pl-5 pr-5 btnContinue" data-step="2" data-url="{{ route('property.bookings.movenext') }}" style="display: {{ (!Auth::user()->verify_sms)? 'none':'block' }}"><i class="fa fa-arrow-right"></i> Continue</button>
                                    </div>
                                </div> 
                            </div> 
                            
                            <div id="paymentDiv" style="display: {{ (Session::get('step')==3)? 'block':'none' }}">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <a href="javascript:void(0);" class="text-primary moveBack text-decoration-none" data-step="3">&lt; Back</a>
                                        <h4 class="mt-2">Confirm and make payment</h4>
                                    </div> 
                                    <div class="col-sm-12 mt-2">
                                        <div class="card card-bordered-pink">
                                            <div class="card-body">
                                                <p class="font-14">
                                                    @php $image = (empty($property->user->image))? "user.svg":"users/".$property->user->image; @endphp
                                                    <img src="{{ asset('assets/images/'.$image) }}" alt="{{ $property->user->name }}" class="thumb-sm rounded-circle mr-1" />
                                                    This property belongs to {{ current(explode(' ',$property->user->name))}}. Other people like it.
                                                </p>
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="col-sm-12">
                                        <h5>Request Summary</h5>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <p class="text-primary"><i class="fa fa-dot-circle font-10"></i> Your booking request will be sent to the owner.</p>
                                                <p class="text-primary"><i class="fa fa-dot-circle font-10"></i> As soon as owner confirms, you will be requested to make payment.</p>
                                                <p class="text-primary"><i class="fa fa-dot-circle font-10"></i> If owner is taking too long(more than 24hours) to response, <a href="{{ route('contact') }}" target="_blank" class="text-danger">contact us</a> for support.</p>
                                            </div>
                                        </div>
                                    </div>
                                    @php
                                        $currency = $my_room->propertyHostelPrice->currency;
                                        $price = $my_room->propertyHostelPrice->property_price;
                                        $totalPrice = ($price* $dateDiff);
                                        $fee = empty($charge->charge)? 0:$charge->charge;
                                        $serviceFee = ($price* $dateDiff)*($fee/100);
                                        $discount = empty($charge->discount)? 0:$charge->discount;
                                        $discountFee = ($price* $dateDiff)*($discount/100);
                                        $totalFee = ($totalPrice+$serviceFee)-$discountFee;
                                    @endphp
                                    <div class="col-sm-12 mt-3 mb-5">
                                        @php $booking = Auth::user()->userHostelBookings->where('property_id',$property->id)->where('hostel_block_room_number_id', $room_number->id)->where('room_number',$room_number->room_no)->sortByDesc('id')->first(); @endphp
                                        @if (empty($booking) || ($booking->isDoneAttribute() && $booking->isCheckoutAttribute()))
                                        <form id="formConfirmBooking" action="{{ route('property.bookings.request') }}">
                                            @csrf
                                            <input type="hidden" name="book_status" value="freshbook" readonly>
                                            <input type="hidden" name="property_id" value="{{ $property->id }}" readonly>
                                            <input type="hidden" name="type" value="{{ $property->type }}" readonly>
                                            <input type="hidden" name="type_status" value="rent" readonly>
                                            <input type="hidden" name="owner" value="{{ $property->user_id }}" readonly>
                                            <input type="hidden" name="room_number_id" value="{{ $room_number->id }}" readonly>
                                            <input type="hidden" name="room_number" value="{{ $room_number->room_no }}" readonly>
                                            <input type="hidden" name="checkin" value="{{ $bookingItems['check_in'] }}" readonly>
                                            <input type="hidden" name="checkout" value="{{ $bookingItems['check_out'] }}" readonly>
                                            <button class="btn btn-primary pl-5 pr-5 confirmBooking font-weight-600" data-step="3" data-href="{{ route('single.property', $property->id) }}">CONFIRM BOOKING REQUEST</button>
                                        </form>
                                        @else
                                            @if ($booking->isPendingAttribute())
                                                <span class="text-primary"><i class="fa fa-spin fa-spinner"></i> WAITING FOR CONFIRMATION...</span>
                                            @elseif ($booking->isConfirmAttribute())
                                                <span class="text-primary"><i class="fa fa-spin fa-spinner"></i> WAITING FOR PAYMENT...</span>
                                            @elseif ($booking->isRejectAttribute())
                                                <span class="text-danger">YOUR REQUEST WAS CANCELLED BY OWNER</span>
                                                <form id="formConfirmBooking" action="{{ route('property.bookings.request') }}" class="mt-2">
                                                    @csrf
                                                    <input type="hidden" name="book_status" value="rebook" readonly>
                                                    <input type="hidden" name="property_id" value="{{ $property->id }}" readonly>
                                                    <input type="hidden" name="type" value="{{ $property->type }}" readonly>
                                                    <input type="hidden" name="type_status" value="rent" readonly>
                                                    <input type="hidden" name="owner" value="{{ $property->user_id }}" readonly>
                                                    <input type="hidden" name="room_number_id" value="{{ $room_number->id }}" readonly>
                                                    <input type="hidden" name="room_number" value="{{ $room_number->room_no }}" readonly>
                                                    <input type="hidden" name="checkin" value="{{ $bookingItems['check_in'] }}" readonly>
                                                    <input type="hidden" name="checkout" value="{{ $bookingItems['check_out'] }}" readonly>
                                                    <button class="btn btn-primary pl-5 pr-5 confirmBooking font-weight-600" data-step="3" data-href="{{ route('single.property', $property->id) }}">RE-APPLY BOOKING REQUEST</button>
                                                </form>
                                            @elseif ($booking->isDoneAttribute() && !$booking->isCheckoutAttribute())
                                                <span class="text-success"><i class="fa fa-home"></i> YOU ARE CURRENTLY LIVING IN THE PROPERTY</span>
                                            @endif
                                        @endif
                                        
                                    </div>
                                </div> 
                            </div> 
                        </div>

                        <div class="col-sm-5">
                            <div class="card card-bordered-pink">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            @php $image = $property->propertyImages->first(); @endphp
                                            <img src="{{ asset('assets/images/properties/'.$image->image) }}" alt="{{ $image->caption }}" class="img-thumbnail" width="200" height="200" />
                                        </div>
                                        <div class="col-sm-8">
                                            <h5>{{ $property->title }}</h5>
                                            <p class="font-13">{{ ucfirst($property->type) }} in {{ strtolower($property->base) }}</p>
                                            <p class="font-13">
                                                <i class="fa fa-star text-warning"></i> <b>{{ number_format($sumReviews/6,2) }}</b>
                                                &nbsp;&nbsp;
                                                {{ $property->propertyReviews->count() }} {{ ($property->propertyReviews->count() <= 1)? 'Review':'Reviews' }}
                                            </p>
                                        </div>
                                        <div class="col-sm-12"><hr></div>
                                        <div class="col-sm-12">
                                            <p class="font-13"><i class="fa fa-institution"></i> &nbsp;&nbsp; Choosen Room Block: {{ $my_room->propertyHostelBlock->block_name }}</p>
                                        </div>
                                        <div class="col-sm-12">
                                            <p class="font-13"><i class="fa fa-building"></i> &nbsp;&nbsp; Choosen Room Type: {{ $my_room->block_room_type }}</p>
                                        </div>
                                        <div class="col-sm-12">
                                            <p class="font-13"><i class="fa fa-bed"></i> &nbsp;&nbsp; Choosen Room No: {{ $room_number->room_no }}</p>
                                        </div>
                                        <div class="col-sm-12"><hr></div>
                                        <div class="col-sm-12">
                                            <div>
                                                <p class="font-14">{{ $currency }} {{ number_format($price,2) }}/{{ $my_room->propertyHostelPrice->price_calendar }}</p>
                                            </div>
                                            <div class="font-14">
                                                <span id="dateCalculator">{{ $dateDiff." months" }} x {{ number_format($price,2) }}</span>
                                                <span class="float-right" id="dateCalculatorResult">{{ $currency }} {{ number_format($totalPrice,2) }}</span>
                                            </div>
                                            <div class="font-14">
                                                <span>Service Fee</span>
                                                <span class="float-right" id="serviceFeeResult">{{ $currency }} {{ number_format($serviceFee,2) }}</span>
                                            </div>
                                            @if ($discountFee != 0)
                                            <div class="font-14">
                                                <span>Discount Fee</span>
                                                <span class="float-right" id="serviceDiscountResult">{{ $currency }} {{ number_format($discountFee,2) }}</span>
                                            </div>
                                            @endif
                                            <hr>
                                            <div class="font-14">
                                                <span><strong>Total</strong></span>
                                                <span class="float-right"><strong id="totalFeeResult">
                                                    {{ $currency }} {{ number_format($totalFee,2) }}</strong></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-12"><hr></div>
                                        <div class="col-sm-12">
                                            <p class="font-14"><span class="text-danger"><strong>Note:</strong></span> Cancellation after 48 hours, you will get full refund minus service fee.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>                        
                    </div>
                    @else
                    <div class="row">
                        <div class="col-sm-7">
                            <div id="propertyReview" style="display: {{ (Session::get('step')==1)? 'block':'none' }}">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h4>Review {{ $property->type }} rules</h4>
                                    </div>
                                    <div class="col-sm-12 mt-2">
                                        <div class="card card-bordered-pink">
                                            <div class="card-body">
                                                <p class="font-14">
                                                    @php $image = (empty($property->user->image))? "user.svg":"users/".$property->user->image; @endphp
                                                    <img src="{{ asset('assets/images/'.$image) }}" alt="{{ $property->user->name }}" class="thumb-sm rounded-circle mr-1" />
                                                    This property belongs to {{ current(explode(' ',$property->user->name))}}. Other people like it.
                                                </p>
                                            </div>
                                        </div>
                                        @php
                                            $bookingItems = Session::get('bookingItems');
                                            if ($property->type_status=='rent') {
                                                $from = \Carbon\Carbon::parse($bookingItems['check_in']);
                                                $to = \Carbon\Carbon::parse($bookingItems['check_out']);
                                                $dateDiff = $to->diffInMonths($from);
                                            }elseif ($property->type_status=='short_stay'){
                                                $from=date_create($bookingItems['check_in']);
                                                $to=date_create($bookingItems['check_out']);
                                                $diff=date_diff($from,$to);
                                                $dateDiff = $diff->format("%a");
                                            }
                                        @endphp
                                        <div class="mt-3">
                                            @if ($property->type_status=='rent')
                                            <h4>{{ $dateDiff }}  {{ str_plural('Month', $dateDiff) }} <small>@if ($dateDiff==12) (1 Year) @elseif($dateDiff==24) (2 Years) @endif</small></h4>
                                            @else
                                            <h4>{{ $dateDiff }}  {{ str_plural('Day', $dateDiff) }}</h4>
                                            @endif
                                            <div class="row">
                                                <div class="col-sm-12 col-lg-4">
                                                    Check In
                                                    <div class="card card-purple">
                                                        <div class="card-body text-center text-white">
                                                            <strong class="font-16">{{ \Carbon\Carbon::parse($bookingItems['check_in'])->format('d-M-Y') }}</strong>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-lg-4 offset-lg-2">
                                                    Check Out
                                                    <div class="card card-purple">
                                                        <div class="card-body text-center text-white">
                                                            <strong class="font-16">{{ \Carbon\Carbon::parse($bookingItems['check_out'])->format('d-M-Y') }}</strong>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-3">
                                            @if (count($property->propertyOwnRules) || count($property->propertyRules))
                                            <h4>Take note of the rules</h4>
                                            @else
                                            <h6 class="text-danger"><i class="fa fa-arrow-right text-danger font-12"></i> &nbsp; No rules defined.</h6>
                                            @endif
                                            <div class="col-sm-12">
                                                @if (count($property->propertyOwnRules))
                                                    @foreach ($property->propertyOwnRules as $own_rule)
                                                    <p><i class="fa fa-square text-danger font-12"></i> &nbsp; {{ $own_rule->rule }}</p>
                                                    @endforeach
                                                    
                                                    @foreach ($property->propertyRules as $rule)
                                                    <p><i class="fa fa-square text-danger font-12"></i> &nbsp; {{ $rule->rule }}</p>
                                                    @endforeach
                                                @else
                                                    @foreach ($property->propertyRules as $rule)
                                                    <p><i class="fa fa-square text-danger font-12"></i> &nbsp; {{ $rule->rule }}</p>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 mt-3 mb-5">
                                        <button class="btn btn-primary pl-5 pr-5 btnContinue" data-step="1" data-url="{{ route('property.bookings.movenext') }}"><i class="fa fa-arrow-right"></i> Agree and continue</button>
                                    </div>
                                </div> 
                            </div>  

                            <div id="verifyContact" style="display: {{ (Session::get('step')==2)? 'block':'none' }}">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <a href="javascript:void(0);" class="text-primary moveBack text-decoration-none" data-step="2">&lt; Back</a>
                                        <h4 class="mt-2">Verify to boost owner and OShelter early feedback</h4>
                                    </div>  
                                    <div class="col-sm-12 mt-2">
                                        <div class="card card-bordered-pink">
                                            <div class="card-body">
                                                <p class="font-14">
                                                    @php $image = (empty($property->user->image))? "user.svg":"users/".$property->user->image; @endphp
                                                    <img src="{{ asset('assets/images/'.$image) }}" alt="{{ $property->user->name }}" class="thumb-sm rounded-circle mr-1" />
                                                    This property belongs to {{ current(explode(' ',$property->user->name))}}. Other people like it.
                                                </p>
                                            </div>
                                        </div>
                                        <div class="mt-3">
                                            <h4>Click with your property owner</h4>
                                            <p>Say hi to {{ current(explode(' ',$property->user->name))}} to kickstart before you arrive.</p>
                                            <div class="row">
                                                <div class="col-sm-8">
                                                    <div class="form-group">
                                                        <textarea name="owner_message" id="owner_message" cols="10" rows="4" class="form-control" placeholder="Hi {{ current(explode(' ',$property->user->name))}}, i'm excited to lodge in your property">{{ (empty(Session::get('owner_message')))? '':Session::get('owner_message') }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-3">
                                            <div id="phoneNumberCover" style="display: {{ (!Auth::user()->verify_sms)? 'block':'none' }}">
                                                <h4>Verify your phone number</h4>
                                                <p class="font-12 text-muted"><i class="fa fa-dot-circle"></i> You will receive verification code on your phone. Resend if taken too long.</p>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group validate phoneNumberField" style="display: {{ empty(Auth::user()->sms_verification_token)? 'block':'none' }}">
                                                            <label for="">Phone Number</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" id="phone_prefix">233</span>
                                                                </div>
                                                                <input type="tel" name="phone_number" id="phone_number" maxlength="9" oninput="removeZero('phone_number')" onkeypress="return isNumber(event);" title="Enter your valid phone number" class="form-control" value="{{ substr(Auth::user()->phone,1) }}" placeholder="eg: 542398441">
                                                            </div>
                                                            <span class="text-danger small mySpan" role="alert"></span>
                                                            <span class="text-danger small" id="phoneSpan" role="alert"></span>
                                                        </div>

                                                        <div class="form-group validate verifyCodeField" style="display: {{ empty(Auth::user()->sms_verification_token)? 'none':'block' }}">
                                                            <label for="">Enter verification code</label>
                                                            <input type="tel" name="verify_code" id="verify_code" onkeypress="return isNumber(event);" class="form-control" placeholder="eg: xxxx" data-url="{{ route('property.bookings.verify') }}" />
                                                            <span class="text-danger small mySpan" role="alert"></span>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>

                                            <div id="verifyNumberCover" style="display: {{ (!Auth::user()->verify_sms)? 'none':'block' }}">
                                                <h4>Phone number is verified</h4>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <p class="font-18"><i class="fa fa-check text-success"></i>  {{ Auth::user()->phone }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                
                                    <div class="col-sm-12 mt-3 mt-lg-4 mb-5 mb-lg-0">
                                        <button class="btn btn-primary pl-5 pr-5 btnVerify" data-url="{{ route('property.bookings.smsverification') }}" style="display: {{ (!Auth::user()->verify_sms)? 'block':'none' }}">{{ empty(Auth::user()->sms_verification_token)? 'Send Verification':'Resend Verification' }}</button>
                                        <button class="btn btn-primary pl-5 pr-5 btnContinue" data-step="2" data-url="{{ route('property.bookings.movenext') }}" style="display: {{ (!Auth::user()->verify_sms)? 'none':'block' }}"><i class="fa fa-arrow-right"></i> Continue</button>
                                    </div>
                                </div> 
                            </div> 
                            
                            <div id="paymentDiv" style="display: {{ (Session::get('step')==3)? 'block':'none' }}">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <a href="javascript:void(0);" class="text-primary moveBack text-decoration-none" data-step="3">&lt; Back</a>
                                        <h4 class="mt-2">Make a request and wait for confirmation</h4>
                                    </div>  

                                    <div class="col-sm-12 mt-2">
                                        <div class="card card-bordered-pink">
                                            <div class="card-body">
                                                <p class="font-14">
                                                    @php $image = (empty($property->user->image))? "user.svg":"users/".$property->user->image; @endphp
                                                    <img src="{{ asset('assets/images/'.$image) }}" alt="{{ $property->user->name }}" class="thumb-sm rounded-circle mr-1" />
                                                    This property belongs to {{ current(explode(' ',$property->user->name))}}. Other people like it.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-12">
                                        <h5>Request Summary</h5>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <p class="text-primary"><i class="fa fa-dot-circle font-10"></i> Your booking request will be sent to the owner.</p>
                                                <p class="text-primary"><i class="fa fa-dot-circle font-10"></i> As soon as owner confirms, you will be requested to make payment.</p>
                                                <p class="text-primary"><i class="fa fa-dot-circle font-10"></i> If owner is taking too long(more than 24hours) to response, <a href="{{ route('contact') }}" target="_blank" class="text-danger">contact us</a> for support.</p>
                                                
                                            </div>
                                        </div>
                                    </div>
                                                                        
                                    @php
                                        $currency = $property->propertyPrice->currency;
                                        $price = $property->propertyPrice->property_price;
                                        $totalPrice = ($property->propertyPrice->property_price* $dateDiff);
                                        $fee = empty($charge->charge)? 0:$charge->charge;
                                        $serviceFee = ($totalPrice)*($fee/100);
                                        $discount = empty($charge->discount)? 0:$charge->discount;
                                        $discountFee = ($totalPrice)*($discount/100);
                                        $totalFee = ($totalPrice+$serviceFee)-$discountFee;
                                    @endphp
                                    <div class="col-sm-12 mt-3 mb-5">
                                        @php $booking = Auth::user()->userBookings->where('property_id',$property->id)->sortByDesc('id')->first(); @endphp
                                        @if (empty($booking) || ($booking->isDoneAttribute() && $booking->isCheckoutAttribute()))
                                        <form id="formConfirmBooking" action="{{ route('property.bookings.request') }}">
                                            @csrf
                                            <input type="hidden" name="book_status" value="freshbook" readonly>
                                            <input type="hidden" name="property_id" value="{{ $property->id }}" readonly>
                                            <input type="hidden" name="type" value="{{ $property->type }}" readonly>
                                            <input type="hidden" name="type_status" value="{{ $property->type_status }}" readonly>
                                            <input type="hidden" name="owner" value="{{ $property->user_id }}" readonly>
                                            <input type="hidden" name="checkin" value="{{ $bookingItems['check_in'] }}" readonly>
                                            <input type="hidden" name="checkout" value="{{ $bookingItems['check_out'] }}" readonly>
                                            <input type="hidden" name="adult" value="{{ $bookingItems['adult'] }}" readonly>
                                            <input type="hidden" name="child" value="{{ $bookingItems['children'] }}" readonly>
                                            @if ($property->type_status === 'short_stay')
                                            <input type="hidden" name="infant" value="{{ $bookingItems['infant'] }}" readonly>
                                            @endif
                                            <button class="btn btn-primary pl-5 pr-5 confirmBooking font-weight-600" data-step="3" data-href="{{ route('single.property', $property->id) }}">CONFIRM BOOKING REQUEST</button>
                                        </form>
                                        @else
                                            @if ($booking->isPendingAttribute())
                                                <span class="text-primary"><i class="fa fa-spin fa-spinner"></i> WAITING FOR CONFIRMATION...</span>
                                            @elseif ($booking->isConfirmAttribute())
                                                <span class="text-primary"><i class="fa fa-spin fa-spinner"></i> WAITING FOR PAYMENT...</span>
                                            @elseif ($booking->isRejectAttribute())
                                                <span class="text-danger">YOUR REQUEST WAS CANCELLED BY OWNER</span>
                                                <form id="formConfirmBooking" action="{{ route('property.bookings.request') }}" class="mt-2">
                                                    @csrf
                                                    <input type="hidden" name="book_status" value="rebook" readonly>
                                                    <input type="hidden" name="property_id" value="{{ $property->id }}" readonly>
                                                    <input type="hidden" name="type" value="{{ $property->type }}" readonly>
                                                    <input type="hidden" name="type_status" value="{{ $property->type_status }}" readonly>
                                                    <input type="hidden" name="owner" value="{{ $property->user_id }}" readonly>
                                                    <input type="hidden" name="checkin" value="{{ $bookingItems['check_in'] }}" readonly>
                                                    <input type="hidden" name="checkout" value="{{ $bookingItems['check_out'] }}" readonly>
                                                    <input type="hidden" name="adult" value="{{ $bookingItems['adult'] }}" readonly>
                                                    <input type="hidden" name="child" value="{{ $bookingItems['children'] }}" readonly>
                                                    @if ($property->type_status === 'short_stay')
                                                    <input type="hidden" name="infant" value="{{ $bookingItems['infant'] }}" readonly>
                                                    @endif
                                                    <button class="btn btn-primary pl-5 pr-5 confirmBooking font-weight-600" data-step="3" data-href="{{ route('single.property', $property->id) }}">RE-APPLY BOOKING REQUEST</button>
                                                </form>
                                            @elseif ($booking->isDoneAttribute() && !$booking->isCheckoutAttribute())
                                                <span class="text-success"><i class="fa fa-home"></i> YOU ARE CURRENTLY LIVING IN THE PROPERTY</span>
                                            @endif
                                        @endif
                                        
                                    </div>
                                </div> 
                            </div> 
                        </div>

                        <div class="col-sm-5">
                            <div class="card card-bordered-pink">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            @php $image = $property->propertyImages->first(); @endphp
                                            <img src="{{ asset('assets/images/properties/'.$image->image) }}" alt="{{ $image->caption }}" class="img-thumbnail" width="200" height="200" />
                                        </div>
                                        <div class="col-sm-8">
                                            <h5>{{ $property->title }}</h5>
                                            @if(strtolower($property->type) === 'house' && strtolower($property->base) === 'house')
                                            <p class="font-13">{{ ucwords(str_replace('_',' ',$property->type)) }}</p>
                                            @else
                                            <p class="font-13">{{ ucwords(str_replace('_',' ',$property->type)) }} in {{ strtolower($property->base) }}</p>
                                            @endif
                                            <p class="font-13">
                                                <i class="fa fa-star text-warning"></i> <b>{{ number_format($sumReviews/6,2) }}</b>
                                                &nbsp;&nbsp;
                                                {{ $property->propertyReviews->count() }} {{ ($property->propertyReviews->count() <= 1)? 'Review':'Reviews' }}
                                            </p>
                                        </div>
                                        <div class="col-sm-12"><hr></div>
                                        @if ($property->type_status=='rent')
                                            <div class="col-sm-12">
                                                <h6><i class="fa fa-users"></i> &nbsp;&nbsp; {{ ($bookingItems['adult']+$bookingItems['children']) }} {{ str_plural('Visitor', ($bookingItems['adult']+$bookingItems['children'])) }}</h6>
                                            </div>
                                            <div class="col-sm-12"><hr></div>

                                            <div class="col-sm-12">
                                                <div>
                                                    <p class="font-14">{{ $currency }} {{ number_format($price,2) }}/{{ $property->propertyPrice->price_calendar }}</p>
                                                </div>
                                                <div class="font-14">
                                                    <span id="dateCalculator">{{ $dateDiff }} x {{ number_format($price,2) }}</span>
                                                    <span class="float-right" id="dateCalculatorResult">{{ $currency }} {{ number_format($totalPrice,2) }}</span>
                                                </div>
                                                <div class="font-14">
                                                    <span>Service Fee</span>
                                                    <span class="float-right" id="serviceFeeResult">{{ $currency }} {{ number_format($serviceFee,2) }}</span>
                                                </div>
                                                @if($discountFee != 0)
                                                <div class="font-14">
                                                    <span>Discount Fee</span>
                                                    <span class="float-right" id="serviceDiscountResult">{{ $currency }} {{ number_format($discountFee, 2) }}</span>
                                                </div>
                                                @endif
                                                <hr>
                                                <div class="font-14">
                                                    <span><strong>Total</strong></span>
                                                    <span class="float-right"><strong id="totalFeeResult">
                                                        {{ $currency }} {{ number_format($totalFee,2) }}</strong></span>
                                                </div>
                                            </div>
                                        @elseif($property->type_status == 'short_stay')
                                            <div class="col-sm-12">
                                                <h6><i class="fa fa-users"></i> &nbsp;&nbsp; {{ ($bookingItems['adult']+$bookingItems['children']+$bookingItems['infant']) }} {{ str_plural('Visitor', ($bookingItems['adult']+$bookingItems['children']+$bookingItems['infant'])) }}</h6>
                                            </div>
                                            <div class="col-sm-12"><hr></div>
                                            <div class="col-sm-12">
                                                <div>
                                                    <p class="font-14">{{ $currency }} {{ number_format($price,2) }}/{{ $property->propertyPrice->price_calendar }}</p>
                                                </div>
                                                <div class="font-14">
                                                    <span id="dateCalculator">{{ $dateDiff }} {{ str_plural('Day', $dateDiff) }} x {{ number_format($price,2) }}</span>
                                                    <span class="float-right" id="dateCalculatorResult">{{ $currency }} {{ number_format($totalPrice,2) }}</span>
                                                </div>
                                                <div class="font-14">
                                                    <span>Service Fee</span>
                                                    <span class="float-right" id="serviceFeeResult">{{ $currency }} {{ number_format($serviceFee, 2) }}</span>
                                                </div>
                                                @if($discountFee != 0)
                                                <div class="font-14">
                                                    <span>Discount Fee</span>
                                                    <span class="float-right" id="serviceDiscountResult">{{ $currency }} {{ number_format($discountFee, 2) }}</span>
                                                </div>
                                                @endif
                                                <hr>
                                                <div class="font-14">
                                                    <span><strong>Total</strong></span>
                                                    <span class="float-right"><strong id="totalFeeResult">
                                                        {{ $currency }} {{ number_format($totalFee, 2) }}</strong></span>
                                                </div>
                                            </div>
                                        @endif
                                        <div class="col-sm-12"><hr></div>
                                        <div class="col-sm-12">
                                            <p class="font-14"><span class="text-danger"><strong>Note:</strong></span> Cancellation after 48 hours, you will get full refund minus service fee.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>                        
                    </div>
                    @endif
                    @endif
                </div><!-- end Col -->
            </div>
        </div>
    </div>    
</div>

<!-- id modal -->
<div id="idModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="idModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="idModalLabel">Upload ID front and back</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div class="text-center" onclick="getFrontFile();" style="cursor:pointer">
                    {{-- <div><i class="fa fa-id-card text-primary" style="font-size:150px"></i></div> --}}
                    <div>
                        <img src="{{ asset('assets/images/iconmonstr-id-card-14.svg') }}" alt="Front" width="100" height="100">    
                    </div>
                    <div>
                        <a href="javascript:void(0);"> <span id="msgStatus">Click upload ID front</span>
                            <div style='height: 0px;width:0px; overflow:hidden;'><input id="front_file" type="file" name="front_file" data-url="{{ route('profile.front.card') }}" data-path="{{ asset('assets/images/cards') }}" /></div>
                        </a>
                    </div>
                </div>
                <div class="mt-4 text-center" onclick="getBackFile();" style="cursor:pointer">
                    <div>
                        <img src="{{ asset('assets/images/iconmonstr-credit-card-15.svg') }}" alt="Front" width="100" height="100">    
                    </div>
                    <div>
                        <a href="javascript:void(0);"> <span id="msgStatus2">Click to upload ID back</span>
                            <div style='height: 0px;width:0px; overflow:hidden;'><input id="back_file" type="file" name="back_file" data-url="{{ route('profile.back.card') }}" data-path="{{ asset('assets/images/cards') }}" /></div>
                        </a>
                    </div>
                </div>             
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->  

@endsection

@section('scripts')
@if ($property->type=='hostel')
<script src="{{ asset('assets/pages/booking/hostelbooking.js') }}"></script>
@else
<script src="{{ asset('assets/pages/booking/booking.js') }}"></script>   
@endif
@endsection