@extends('layouts.site')

@section('style')

@endsection
@section('content')
<div class="pxp-content pull-content-down">
    <div class="container">
        <h2>List Property</h2>
        <p>
            <strong>{{ Auth::user()->name }},</strong> listings  > <small><a href="{{ route('property') }}">Checkout your listings</a></small>
        </p>
        <div class="pt-4">
            <div class="row">
                @if(!Auth::user()->is_id_verified)
                    <div class="col-sm-8">
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
                    </div>
                @else
                    <div class="col-sm-8">
                    <h5>What kind of property are you listing?</h5>
                    <form class="mt-4" id="formPropertyType" method="POST" action="{{ route('property.store') }}">
                        @csrf
                        <input type="hidden" name="step" value="0" readonly>
                        <div class="form-group validate">
                            <label for="">Choose your base property</label>
                            <select name="base_property" class="form-control" id="base_property">
                                <option value="">--Select--</option>
                                <option value="house">House</option>
                                <option value="storey_building">Storey Building</option>
                            </select>
                            <span class="text-danger small mySpan" role="alert"></span>
                        </div>
                        <div class="form-group validate">
                            <label for="">Now choose your property type</label>
                            <select name="property_type" class="form-control" id="property_type">
                                <option value="">--Select--</option>
                                @foreach ($property_types as $type)
                                <option value="{{ strtolower(str_replace(' ','_',$type->name))  }}">{{ $type->name }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger small mySpan" role="alert"></span>
                        </div>
                        <div class="form-group validate">
                            <label for="">Property Title</label>
                            <input type="text" name="property_title" class="form-control" placeholder="eg: Ahodwo Homes, Royal Lodge Apartments, Airpot Residential Apartments">
                            <span class="text-danger small mySpan" role="alert"></span>
                        </div>
                        <div class="form-group validate">
                            <label for="">What do you want to do with your property?</label>
                            <select name="property_type_status" class="form-control" id="property_type_status">
                                <option value="">--Select--</option>
                                <option value="rent">I want to rent out</option>
                                <option value="short_stay">For short stay</option>
                                <option value="sale">I want to sell</option>
                                <option value="auction">I want to auction</option>
                            </select>
                            <span class="text-danger small mySpan" role="alert"></span>
                        </div>

                        <div id="myGuests" style="display: none">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group validate">
                                        <label for="">Expected Guests</label>
                                        <input type="text" name="guest" id="guest" class="form-control" readonly placeholder="eg: Guests expecting">
                                        <span class="text-danger small mySpan" role="alert"></span>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">How many adult(12 years and above)</label>
                                        <select name="adult" id="adult" class="form-control">
                                            <option value="1">1 Adult</option>
                                            <option value="2">2 Adults</option>
                                            <option value="3">3 Adults</option>
                                            <option value="4">4 Adults</option>
                                            <option value="5">5 Adults</option>
                                            <option value="6">6 Adults</option>
                                            <option value="7">7 Adults</option>
                                            <option value="8">8 Adults</option>
                                            <option value="9">9 Adults</option>
                                            <option value="10">10 Adults</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">How many children(above 2 years)</label>
                                        <select name="children" id="children" class="form-control">
                                            <option value="0">No Children</option>
                                            <option value="1">1 Child</option>
                                            <option value="2">2 Children</option>
                                            <option value="3">3 Children</option>
                                            <option value="4">4 Children</option>
                                            <option value="5">5 Children</option>
                                            <option value="6">6 Children</option>
                                            <option value="7">7 Children</option>
                                            <option value="8">8 Children</option>
                                            <option value="9">9 Children</option>
                                            <option value="10">10 Children</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mt-3">
                            <button type="submit" class="btn btnMove btn-primary">
                                <i class="fa fa-arrow-right"></i>
                                Lets build a property portfolio
                            </button>
                        </div>
                    </form>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('assets/pages/property/property.js') }}"></script>
@endsection
