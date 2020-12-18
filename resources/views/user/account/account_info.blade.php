@extends('layouts.site')

@section('content')

<div class="pxp-content pull-content-down">
    <div class="container">
        <h2>Account Info</h2>  
        <p>
            <strong>{{ Auth::user()->name }},</strong> account owner 
        </p>
        <div id="" class="pt-4">
            <div class="row">
                <div class="col-sm-6 col-md-4">
                    <div class="card card-bordered-blue">
                        <div class="card-body">
                            
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-8">
                    <div class="card card-bordered-blue">
                        <div class="card-body">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</div>

@endsection

@section('scripts')

@endsection