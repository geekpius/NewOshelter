@extends('layouts.site')

@section('content')

<div class="pxp-content pull-content-down">
    <div class="container">
        <h2>Requests</h2>
        <p>
            <strong>{{ Auth::user()->name }},</strong> account owner
        </p>
        <div id="" class="pt-4">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-bordered-grey">
                        <div class="card-body">
                            <div class="row">
                                @if (Auth::user()->account_type=='visitor')
                                <div class="col-6 col-sm-3 col-md-3 col-lg-3">
                                    <a href="#" class="text-decoration-none text-gray">
                                        <div class="card card-bordered-pink">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="text-center"><strong>{{ Auth::user()->countAllRequests() }}</strong> <br><small>Requests</small></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-6 col-sm-3 col-md-3 col-lg-3">
                                    <a href="#" class="text-decoration-none text-gray">
                                        <div class="card card-bordered-pink">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="text-center"><strong>{{ Auth::user()->countAllPendingRequests() }}</strong> <br><small>Pending Requests</small></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-6 col-sm-3 col-md-3 col-lg-3">
                                    <a href="#" class="text-decoration-none text-gray">
                                        <div class="card card-bordered-pink">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="text-center"><strong>{{ Auth::user()->countAllApprovedRequests() }}</strong> <br><small>Approved Requests</small></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
{{--                                <div class="col-6 col-sm-3 col-md-3 col-lg-2">--}}
{{--                                    <a href="{{ route('property.visitor.orders') }}" class="text-decoration-none text-gray">--}}
{{--                                        <div class="card card-bordered-pink">--}}
{{--                                            <div class="card-body">--}}
{{--                                                <div class="row">--}}
{{--                                                    <div class="col-12">--}}
{{--                                                        <div class="text-center"><strong>{{ Auth::user()->orders->count() }}</strong> <br><small>Orders</small></div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                                <div class="col-6 col-sm-3 col-md-3 col-lg-2">--}}
{{--                                    <a href="{{ route('property.visitor.events') }}" class="text-decoration-none text-gray">--}}
{{--                                        <div class="card card-bordered-pink">--}}
{{--                                            <div class="card-body">--}}
{{--                                                <div class="row">--}}
{{--                                                    <div class="col-12">--}}
{{--                                                        <div class="text-center"><strong>{{ Auth::user()->auctions->count() }}</strong> <br><small>Auction Events</small></div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                                <div class="col-6 col-sm-3 col-lg-2">--}}
{{--                                    <a href="{{ route('payments') }}" class="text-decoration-none text-gray">--}}
{{--                                        <div class="card card-bordered-pink">--}}
{{--                                            <div class="card-body">--}}
{{--                                                <div class="row">--}}
{{--                                                    <div class="col-12">--}}
{{--                                                        <div class="text-center"><strong>{{ Auth::user()->userTransactions->count() }}</strong> <br><small>Payments</small></div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                                <div class="col-6 col-sm-3 col-lg-2">--}}
{{--                                    <a href="{{ route('visits') }}" class="text-decoration-none text-gray">--}}
{{--                                        <div class="card card-bordered-pink">--}}
{{--                                            <div class="card-body">--}}
{{--                                                <div class="row">--}}
{{--                                                    <div class="col-12">--}}
{{--                                                        <div class="text-center"><strong>{{ Auth::user()->userVisits->count()+Auth::user()->userHostelVisits->count() }}</strong> <br><small>Visits</small></div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </a>--}}
{{--                                </div>--}}
                                <div class="col-6 col-sm-3 col-lg-3">
                                    <a href="{{ route('saved') }}" class="text-decoration-none text-gray">
                                        <div class="card card-bordered-pink">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="text-center"><strong>{{ Auth::user()->userSavedProperties->count() }}</strong> <br><small>Wishlists</small></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-6 col-sm-3 col-lg-3">
                                    <div class="card card-bordered-pink">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="text-center"><strong>{{ Auth::user()->countRejectReasons() }}</strong> <br><small>Rejected Reasons</small></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
{{--                                <div class="col-6 col-sm-3 col-lg-2">--}}
{{--                                    <a href="{{ route('property.visitor.confirmations') }}" class="text-decoration-none text-gray">--}}
{{--                                        <div class="card card-bordered-pink">--}}
{{--                                            <div class="card-body">--}}
{{--                                                <div class="row">--}}
{{--                                                    <div class="col-12">--}}
{{--                                                        <div class="text-center"><strong>{{ Auth::user()->userConfirmations->count() }}</strong> <br><small>Confirmations</small></div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </a>--}}
{{--                                </div>--}}
                                @endif

                                @if (Auth::user()->account_type=='owner')
{{--                                <div class="col-6 col-sm-3 col-lg-2">--}}
{{--                                    <a href="{{ route('payments') }}" class="text-decoration-none text-gray">--}}
{{--                                        <div class="card card-bordered-pink">--}}
{{--                                            <div class="card-body">--}}
{{--                                                <div class="row">--}}
{{--                                                    <div class="col-12">--}}
{{--                                                        <div class="text-center"><strong>{{ Auth::user()->ownerTransactions->count() }}</strong> <br><small>Payments</small></div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                                <div class="col-6 col-sm-3 col-lg-2">--}}
{{--                                    <a href="{{ route('wallet') }}" class="text-decoration-none text-gray">--}}
{{--                                        <div class="card card-bordered-pink">--}}
{{--                                            <div class="card-body">--}}
{{--                                                <div class="row">--}}
{{--                                                    <div class="col-12">--}}
{{--                                                    <div class="text-center"><i class="mdi mdi-wallet"></i> <br><small>Wallets</small></div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </a>--}}
{{--                                </div>--}}
                                <div class="col-6 col-sm-3 col-lg-3">
                                    <a href="{{ route('property') }}" class="text-decoration-none text-gray">
                                        <div class="card card-bordered-pink">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                    <div class="text-center"><strong>{{ Auth::user()->countMyProperties() }}</strong> <br><small>Properties</small></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-6 col-sm-3 col-lg-3">
                                    <a href="{{ route('property') }}" class="text-decoration-none text-gray">
                                        <div class="card card-bordered-pink">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="text-center"><strong>{{ Auth::user()->countApprovedProperties() }}</strong> <br><small>Approved Properties</small></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-6 col-sm-3 col-lg-3">
                                    <div class="card card-bordered-pink">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12">
                                                <div class="text-center"><strong>{{ Auth::user()->countOverallRating() }}</strong> <br><small>Ratings</small></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-sm-3 col-lg-3">
                                    <a href="{{ route('saved') }}" class="text-decoration-none text-gray">
                                        <div class="card card-bordered-pink">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="text-center"><strong>{{ Auth::user()->userSavedProperties->count() }}</strong> <br><small>Wishlists</small></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-6 col-sm-3 col-lg-3">
                                    <div class="card card-bordered-pink">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="text-center"><strong>{{ Auth::user()->countRejectReasons() }}</strong> <br><small>Rejected Reasons</small></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
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
