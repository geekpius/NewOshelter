@extends('layouts.site')

@section('style')

@endsection
@section('content')
<div class="pxp-content pull-content-down">
    <div class="container">
        <h2 class="font-weight-bold">Welcom to Oshelter help center</h2>  
        <div class="pt-4">
            <div class="help-card-tiles">
                <div class="row">
                    <div class="col-12 mb-3">
                        <h4 class="font-weight-bold">How can we help you?</h4>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-4">
                        <a href="#" class="text-decoration-none">
                            <div class="card card-bordered-blue text-gray">
                                <div class="card-body text-center">
                                   <img class="" src="{{ asset('assets/images/svg/guest.svg') }}" alt="booking and visitors" width="170" height="170">
                                </div>
                                <hr>
                                <div class="text-center">
                                    <p class="font-16 font-weight-bold">Booking and visitors</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-4">
                        <a href="#" class="text-decoration-none">
                            <div class="card card-bordered-blue text-gray">
                                <div class="card-body text-center">
                                   <img class="" src="{{ asset('assets/images/svg/property-owner.svg') }}" alt="own a property" width="170" height="170">
                                </div>
                                <hr>
                                <div class="text-center">
                                    <p class="font-16 font-weight-bold">Owning a property</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <div class="help-card-tiles-responsive">
                <div class="row">
                    <div class="col-12 mb-3">
                        <h5 class="font-weight-bold">How can we help you?</h5>
                    </div>
    
                    <div class="col-sm-12">
                        <a href="#" class="text-decoration-none text-light-dark">
                            <p class="font-18"><i class="fa fa-briefcase mr-2"></i> Booking and visitors</p>
                        </a>
                    </div>
                    <div class="col-sm-12"><hr></div>
                    <div class="col-sm-12">
                        <a href="#" class="text-decoration-none text-light-dark">
                            <p class="font-18"><i class="fa fa-home mr-2"></i> Owning a property</p>
                        </a>
                    </div>
                </div>
            </div>

            <div class="mt-4">
                <h5 class="font-weight-800">Popular helps</h5>
                <div class="row mt-4">
                    @foreach ($general as $help)
                    <div class="col-12 col-md-3">
                        <a href="{{ route('help.read', ['help'=>$help->id, 'question'=>$help->question_slug]) }}">
                            <p class="font-weight-bold font-16">{{ $help->question }}</p>
                        </a>
                        <p>{!! $help->getAnswerLimit()  !!}</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>    
</div>
@endsection

@section('scripts')
@endsection