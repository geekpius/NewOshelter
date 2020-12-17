@extends('layouts.site')

@section('styles')

@endsection
@section('content')
<div class="pxp-content pull-content-down">
    <div class="container">
        <h2>Visits</h2>  
        <p>
            <strong>{{ Auth::user()->name }},</strong> visits 
        </p>
        <div class="pt-4">
            <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-6 col-md-6 col-lg-4">
                            <div class="card card-bordered-blue">
                                <div class="card-body">
                                    <a href="#" class="text-decoration-none text-light-dark">
                                        <p class="font-18 font-weight-bold">Residence ></p>
                                    </a>
                                    <p class="font-13 account-details">This include rent and short stay.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-4">
                            <div class="card card-bordered-blue">
                                <div class="card-body">
                                    <a href="#" class="text-decoration-none text-light-dark">
                                        <p class="font-18 font-weight-bold">Hostel ></p>
                                    </a>
                                    <p class="font-13 account-details">Hostel room numbers visited.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-2"></div>
            </div>
        </div>
    </div>    
</div>
@endsection

@section('scripts')
@endsection