@extends('layouts.site')

@section('content')

<div class="pxp-content pull-content-down">
    <div class="container">
        <h2>Logins & Security</h2>  
        <p>
            <strong>{{ Auth::user()->name }},</strong> account owner 
        </p>
        <div id="" class="pt-4">
            @include('includes.gobackroute')
            <div class="row">
                <div class="col-sm-12 col-md-8">
                    <div class="card card-bordered-blue">
                        <div class="card-body">
                            <h5 class="text-primary">Device History</h5>
                            @php $userLogs = Auth::user()->userLogins()->orderBy('id', 'DESC')->paginate(5); @endphp
                            @if (count($userLogs))
                                @foreach ($userLogs as $log)
                                    <div>
                                        <div class="float-left mr-3">
                                            <i class="fa fa-desktop fa-2x"></i>
                                        </div>
                                        <div class="">
                                            <p>{{ $log->device }} - {{ $log->browser }} <br>
                                                {{ (trim($log->location)==',')?'Unknown Location':$log->location }} - {{ \Carbon\Carbon::parse($log->created_at)->diffForHumans() }}
                                            </p>
                                        </div>
                                        <hr>
                                    </div>
                                @endforeach
                            @else
                            <div class="alert alert-danger" role="alert">
                                No available device history.
                            </div>
                            @endif
                            {{ $userLogs->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</div>

@endsection

@section('scripts')
<script src="{{ asset('assets/light/js/account/all-groups.js') }}"></script>
<script>
$("#formProfileUpdate select[name='gender']").val("{{ empty(Auth::user()->profile->gender)? '':Auth::user()->profile->gender }}");
$("#formProfileUpdate select[name='marital_status']").val("{{ empty(Auth::user()->profile->marital_status)? '':Auth::user()->profile->marital_status }}");
</script>
@endsection