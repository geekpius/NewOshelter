@extends('layouts.site')

@section('style')

@endsection
@section('content')
<div class="pxp-content pull-content-down">
    <div class="container">
        <h2>Visits</h2>  
        <p>
            <strong>{{ Auth::user()->name }},</strong> visits 
        </p>
        <div class="pt-4">
            <div class="visit-options">
                <div class="row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-10">
                        <div class="row">
                            <div class="col-sm-6 col-md-6 col-lg-4">
                                <div class="card card-bordered-blue">
                                    <div class="card-body">
                                        <a href="{{ route('visits.upcoming') }}" class="text-decoration-none text-light-dark">
                                            <p class="font-18 font-weight-bold">Residence <small class="text-danger">({{ Auth::user()->userVisits->count() }})</small> ></p>
                                        </a>
                                        <p class="font-13 account-details">This include rent and short stay.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-4">
                                <div class="card card-bordered-blue">
                                    <div class="card-body">
                                        <a href="{{ route('visits.hostel.upcoming') }}" class="text-decoration-none text-light-dark">
                                            <p class="font-18 font-weight-bold">Hostel <small class="text-danger">({{ Auth::user()->userHostelVisits->count() }})</small>></p>
                                        </a>
                                        <p class="font-13 account-details">Hostel room numbers visited.</p>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="col-sm-6 col-md-6 col-lg-4">
                                <div class="card card-bordered-blue">
                                    <div class="card-body">
                                        <a href="#" class="text-decoration-none text-light-dark">
                                            <p class="font-18 font-weight-bold">Documents <small class="text-danger">({{ Auth::user()->userHostelVisits->count() }})</small>></p>
                                        </a>
                                        <p class="font-13 account-details">Owners agreement documents.</p>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                    <div class="col-sm-2"></div>
                </div>
            </div>

            <div class="visit-mobile-init-view">
                <div class="row">
                    <div class="col-sm-12">
                        <a href="{{ route('visits.upcoming') }}" class="text-decoration-none text-light-dark">
                            <p class="font-16 font-weight-bold"><i class="fa fa-home"></i> Residence</p>
                        </a>
                    </div>
                    <div class="col-sm-12"><hr></div>
                    <div class="col-sm-12">
                        <a href="{{ route('visits.hostel.upcoming') }}" class="text-decoration-none text-light-dark">
                            <p class="font-16 font-weight-bold"><i class="mdi mdi-school"></i> Hostel</p>
                        </a>
                    </div>
                    <div class="col-sm-12"><hr></div>
                    {{-- <div class="col-sm-12">
                        <a href="#" class="text-decoration-none text-light-dark">
                            <p class="font-16 font-weight-bold"><i class="fa fa-file"></i> Documents</p>
                        </a>
                    </div>
                    <div class="col-sm-12"><hr></div> --}}
                </div>
            </div>

        </div>
    </div>    
</div>
@endsection

@section('scripts')
@endsection