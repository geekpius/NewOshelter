@extends('layouts.site')

@section('style')
{{-- date range --}}
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
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
                    @if(!Auth::user()->is_id_verified)
                    <div class="row mb-5">
                        <div class="col-sm-4">
                            <div class="text-center mt-2">
                                <img src="{{ asset('assets/images/card-sample.png') }}" alt="ID Card Front" class="front_card" width="200" height="170" style="border-radius:2%" />
                            </div>
                            <div class="text-center mt-3">
                                <p><span class="text-primary">Status:</span> {{ empty(Auth::user()->profile->id_type)? 'No card type selected':'Oshelter is checking ID card...' }}</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <h6 class="font-weight-bold">CARD SAMPLE</h6>
                            <p>ID card type: <span class="text-primary">National ID</span></p>
                            <p>ID card type: <span class="text-primary">GHA-0123456789-0</span></p>
                            <p class="mt-3">
                                Seeing this information means you haven't updated your government approved card info.
                            </p>
                            <button class="btn btn-primary btn-sm" onclick="window.location.href='{{ route('account.info') }}'">Update ID Card</button>
                        </div>
                    </div><!-- end row -->
                    @else
                        @if ($property->isHostelPropertyType())
                        <div class="row">
                            <div class="col-sm-5 col-lg-7">
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
                                            <h4 class="mt-2">Verify to boost OShelter early feedback</h4>
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
                                                    <p class="text-primary"><i class="fa fa-dot-circle font-10"></i> If Oshelter is taking too long(more than 24hours) to response, <a href="{{ route('contact') }}" target="_blank" class="text-danger">contact us</a> for support.</p>

                                                    @include('includes/booking/hostel-booking-form')

                                                    <div class="mt-4">
                                                        <a class="text-danger" href="{{ route('property.bookings.exit', $property->id) }}">Exit from booking</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-7 col-lg-5">
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
                                            @if (count($property->includeUtilities))
                                                <h6 class="text-primary">Inclusive Utilities</h6>
                                                <div class="row">
                                                    @foreach ($property->includeUtilities as $utility)
                                                        <div class="col-sm-4 font-13">{{ $utility->getName() }}</div>
                                                    @endforeach
                                                </div>
                                            @else
                                                <div class="font-13">No inclusive utilities</div>
                                            @endif
                                            </div>
                                            <div class="col-sm-12"><hr></div>
                                            <div class="col-sm-12">

                                                @if (count($property->propertyHostelBlockRooms))
                                                    <h6 class="text-primary">Block Names</h6>
                                                    <div class="row">
                                                        @foreach ($property->propertyHostelBlockRooms as $block)
                                                            <div class="col-sm-6 font-13">
                                                                <h6>{{ $block->propertyHostelBlock->block_name }}</h6>
                                                                <span>{{ $block->gender }} block</span><br>
                                                                <span>{{ $block->countNumberOfAvailableRooms() }} Available rooms</span><br>
                                                                <span>{{ $block->propertyHostelPrice->currency }} {{ number_format($block->propertyHostelPrice->property_price,2) }}/{{ $block->propertyHostelPrice->price_calendar }}</span>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                @else
                                                    <div class="font-13">No block name available</div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        @else

                        <div class="row">
                            <div class="col-sm-5 col-lg-7">
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

                                            @if(!$property->isSaleProperty() && !$property->isAuctionProperty())
                                                <a href="javascript:void(0);" class="text-primary moveBack text-decoration-none" data-step="2">&lt; Back</a>
                                            @endif
                                            <h4 class="mt-2">Verify to boost OShelter early feedback</h4>
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
                                                    <p class="text-primary"><i class="fa fa-dot-circle font-10"></i> If Oshelter is taking too long (more than 24hours) to response, <a href="{{ route('contact') }}" target="_blank" class="text-danger">contact us</a> for support.</p>

                                                    @if($property->isRentProperty())
                                                        @include('includes/booking/rent-booking-form')
                                                    @elseif($property->isShortStayProperty())
                                                        @include('includes/booking/short-stay-booking-form')
                                                    @elseif($property->isSaleProperty())
                                                        @include('includes/booking/sale-booking-form')
                                                    @elseif($property->isAuctionProperty())
                                                        @include('includes/booking/auction-booking-form')
                                                    @endif

                                                   <div class="mt-4">
                                                       <a class="text-danger" href="{{ route('property.bookings.exit', $property->id) }}">Exit from booking</a>
                                                   </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-7 col-lg-5">
                                <div class="card card-bordered-pink">
                                    <div class="card-body">
                                        @php
                                            if(!$property->isAuctionProperty()){
                                                $currency = $property->propertyPrice->currency;
                                                $price = $property->propertyPrice->property_price;
                                            }
                                        @endphp
                                        <div class="row">
                                            <div class="col-sm-4">
                                                @php $image = $property->propertyImages->first(); @endphp
                                                <img src="{{$property->isAuctionProperty() ? '/assets/images/properties/default.png' : asset('assets/images/properties/'.$image->image) }}" alt="{{ $property->isAuctionProperty() ? '' : $image->caption }}" class="img-thumbnail" width="200" height="200" />
                                            </div>
                                            <div class="col-sm-8">
                                                <h5>{{ $property->title }}</h5>
                                                @if(strtolower($property->type) == 'house' && strtolower($property->base) == 'house')
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
                                            @if ($property->isRentProperty())
                                                <div class="col-sm-12">
                                                @if (count($property->includeUtilities))
                                                    <h6 class="text-primary">Inclusive Utilities</h6>
                                                    <div class="row">
                                                        @foreach ($property->includeUtilities as $utility)
                                                            <div class="col-sm-4 font-13">{{ $utility->getName() }}</div>
                                                        @endforeach
                                                    </div>
                                                @else
                                                    <div class="font-13">No inclusive utilities</div>
                                                @endif
                                                </div>
                                                <div class="col-sm-12"><hr></div>

                                                <div class="col-sm-12">
                                                    <div class="font-14">
                                                        <span><strong>Price</strong></span>
                                                        <span class="float-right"><strong id="totalFeeResult">
                                                            {{ $currency }} {{ number_format($price,2) }}/</strong>{{ $property->propertyPrice->price_calendar }}</span>
                                                    </div>
                                                </div>
                                            @elseif($property->isShortStayProperty())
                                                <div class="col-sm-12">
                                                    <h6 class="text-primary">Inclusive Utilities</h6>
                                                    <div class="row">
                                                        <div class="col-sm-4 font-13">Water</div>
                                                        <div class="col-sm-4 font-13">Sanitation</div>
                                                        <div class="col-sm-4 font-13">Light</div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12"><hr></div>
                                                <div class="col-sm-12">
                                                    <div class="font-14">
                                                        <span><strong>Price</strong></span>
                                                        <span class="float-right"><strong id="totalFeeResult">
                                                            {{ $currency }} {{ number_format($price,2) }}/</strong>{{ $property->propertyPrice->price_calendar }}</span>
                                                    </div>
                                                </div>

                                            @elseif($property->isSaleProperty())
                                                <div class="col-sm-12">
                                                    <div class="font-14">
                                                        <span><strong>Price</strong></span>
                                                        <span class="float-right"><strong id="totalFeeResult">
                                                            {{ $currency }} {{ number_format($price,2) }}</strong></span>
                                                    </div>
                                                </div>

                                            @endif

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

@endsection

@section('scripts')
@if ($property->isHostelPropertyType())
<script src="{{ asset('assets/pages/booking/hostelbooking.js') }}"></script>
@else
<script src="{{ asset('assets/pages/booking/booking.js') }}"></script>
{{-- date range --}}
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
@endif
@endsection
