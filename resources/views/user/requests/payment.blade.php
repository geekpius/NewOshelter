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
                <div class="col-sm-8">
                    
                </div>
            </div>
        </div>
    </div>    
</div>
@endsection

@section('scripts')

@endsection