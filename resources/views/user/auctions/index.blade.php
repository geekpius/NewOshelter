@extends('layouts.site')

@section('style')

@endsection
@section('content')
<div class="pxp-content pull-content-down">
    <div class="container">
        <h2>Auction Event</h2>  
        <p>
            <strong>{{ Auth::user()->name }},</strong> auction event 
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
                                <a target="_blank" href="{{ route('account.info') }}">Update your government approved card info here</a>
                            </p>
                        </div>
                    </div><!-- end row --> 
                    @else
                    <div class="row">
                        <div class="col-sm-5 col-lg-7">
                            <div id="verifyContact" style="display: {{ (Session::get('step')==1)? 'block':'none' }}">
                                <div class="row">
                                    <div class="col-sm-12">
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
                                                            <input type="tel" name="verify_code" id="verify_code" onkeypress="return isNumber(event);" class="form-control" placeholder="eg: xxxx" data-url="{{ route('property.event.verify') }}" />
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
                                        <button class="btn btn-primary pl-5 pr-5 btnVerify" data-url="{{ route('property.event.smsverification') }}" style="display: {{ (!Auth::user()->verify_sms)? 'block':'none' }}">{{ empty(Auth::user()->sms_verification_token)? 'Send Verification':'Resend Verification' }}</button>
                                        <button class="btn btn-primary pl-5 pr-5 btnContinue" data-step="1" data-url="{{ route('property.event.movenext') }}" style="display: {{ (!Auth::user()->verify_sms)? 'none':'block' }}"><i class="fa fa-arrow-right"></i> Continue</button>
                                    </div>
                                </div> 
                            </div>  
                            
                                                        
                            <div id="paymentDiv" style="display: {{ (Session::get('step')==2)? 'block':'none' }}">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <a href="javascript:void(0);" class="text-primary moveBack text-decoration-none" data-step="2">&lt; Back</a>
                                        <h4 class="mt-2">Make a request and wait for a invitation</h4>
                                    </div>  

                                    <div class="col-sm-12">
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
                                                <p class="text-primary"><i class="fa fa-dot-circle font-10"></i> Confirm your booking for the event.</p>
                                                <p class="text-primary"><i class="fa fa-dot-circle font-10"></i> Oshelter will review your request.</p>
                                                <p class="text-primary"><i class="fa fa-dot-circle font-10"></i> Oshelter will respond to your request with details ASAP.</p>
                                                <p class="text-primary"><i class="fa fa-dot-circle font-10"></i> If contacting you is taking too long (more than 24hours), <a href="{{ route('contact') }}" target="_blank" class="text-danger">contact us</a> for support.</p>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-12 mt-3 mb-5">
                                        @php $auction = $property->auctions->where('user_id', Auth::user()->id)->sortByDesc('id')->first(); @endphp
                                        @if (empty($auction))
                                        <form id="formConfirmBooking" action="{{ route('property.event.request') }}">
                                            @csrf
                                            <input type="hidden" name="property_id" value="{{ $property->id }}" readonly>
                                            <input type="hidden" name="owner" value="{{ $property->user_id }}" readonly>
                                            <button class="btn btn-primary pl-5 pr-5 confirmBook font-weight-600" data-step="2" data-href="{{ route('single.property', $property->id) }}">CONFIRM BOOKING REQUEST</button>
                                        </form>
                                        @else
                                        <span class="text-primary">
                                            <i class="fa fa-spin fa-spinner"></i> YOUR BOOKING REQUEST IS UNDER REVIEW...
                                        </span>
                                        <br>
                                        <div class="mt-3">
                                            <a href="{{ route('property.event.exit', $property->id) }}" class="text-danger"><i class="fa fa-arrow-circle-left"></i> Exit from order mode </a>
                                        </div>
                                        @endif
                                    </div>
                                </div> 
                            </div> 
                        </div>

                        <div class="col-sm-7 col-lg-5">
                            <div class="card card-bordered-pink">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <img src="{{ asset('assets/images/properties/default.png') }}" alt="image" class="img-thumbnail" width="200" height="200" />
                                        </div>
                                        <div class="col-sm-8">
                                            <h5>{{ $property->title }}</h5>
                                            @if(strtolower($property->type) == 'house' && strtolower($property->base) == 'house')
                                            <p class="font-13">{{ $property->getPropertyType() }}</p>
                                            @else
                                            <p class="font-13">{{ $property->getPropertyType() }} in {{ strtolower($property->base) }}</p>
                                            @endif
                                            <p class="font-13">
                                                <i class="fa fa-star text-warning"></i> <b>{{ number_format($sumReviews/6,2) }}</b>
                                                &nbsp;&nbsp;
                                                {{ $property->propertyReviews->count() }} {{ str_plural('Review', $property->propertyReviews->count()) }}
                                            </p>
                                        </div>
                                        <div class="col-sm-12"><hr></div>
                                        <div class="col-sm-12">
                                            <div class="font-14">
                                                <p>Oshelter will contact you with venue, date and time.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div><!-- end Col -->
            </div>
        </div>
    </div>    
</div> 

@endsection

@section('scripts')
<script src="{{ asset('assets/pages/auction/event.js') }}"></script>
@endsection