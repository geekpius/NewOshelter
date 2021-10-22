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
                <div class="col-sm-6">

                    <div class="card">
                        <div class="card-body">
                            <p class="font-14 mb-2">
                                @php $image = empty(Auth::user()->image)? 'user.svg': 'users/'.Auth::user()->image; @endphp
                                <img src="{{ asset('assets/images/'.$image) }}" alt="{{ Auth::user()->name }}" class="thumb-sm rounded-circle mr-1" />
                                {{ current(explode(' ',Auth::user()->name))}} is subscribing to {{ $package->package_name }}
                            </p>

                            <div class="mt-5">
                                <h6 class="font-weight-bold">{{ $package->package_name }}</h6>
                               <p>
                                   @if(strtolower($package->package_name) == 'commission')
                                       {{ $package->package_price }}<small class="text-muted">%</small> of all properties
                                   @else
                                       GHS{{ number_format($package->package_price,2) }}<small class="text-muted">/ mo</small>
                                   @endif
                               </p>

                                <form id="formSubscribe">
                                    @csrf
                                    @if(strtolower($package->package_name) != 'commission')
                                        <div class="form-group">
                                            <select name="period" class="form-control">
                                                <option value="1">1 month</option>
                                                <option value="3">3 months</option>
                                                <option value="6">6 months</option>
                                                <option value="12">12 months</option>
                                            </select>
                                        </div>
                                    @endif
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-sm">Subscribe</button>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>

            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
$(".btnSubscribe").on('click', function(){
    window.location.href = $(this).data('href');
});
</script>

@endsection
