@extends('layouts.site')

@section('content')

<div class="pxp-content pull-content-down">
    <div class="container">
        <h2>Subscription Packages</h2>
        <p>
            <strong>{{ Auth::user()->name }},</strong> account owner
        </p>
        <div id="" class="pt-4">
            <div class="row">
                <div class="col-sm-12">
                    
                <div class="container">
                    <div class="card-deck mb-3 text-center">
                       
                        @foreach($packages as $package)
                        <div class="card mb-4 box-shadow">
                            <div class="card-header">
                                <h4 class="my-0 font-weight-normal">{{ $package->package_name }}</h4>
                            </div>
                            <div class="card-body">
                                <h3 class="card-title pricing-card-title">
                                    @if(strtolower($package->package_name) == 'commission')
                                    {{ $package->package_price }}<small class="text-muted">%</small>
                                    @else
                                    GHS{{ number_format($package->package_price,2) }}<small class="text-muted">/ mo</small>
                                    @endif
                                </h3>
                                <ul class="list-unstyled mt-3 mb-4">
                                <li>{{ $package->package_description }}</li>
                                </ul>
                                <button type="button" class="btn btn-lg btn-block {{ (strtolower($package->package_name) == 'default')? 'btn-outline-primary':'btn-primary' }}" {{ (strtolower($package->package_name) == 'default')? 'disabled':'' }}>Subscribe</button>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script src="{{ asset('assets/pages/account/all-groups.js') }}"></script>
@endsection
