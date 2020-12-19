@extends('layouts.site')

@section('content')

<div class="pxp-content pull-content-down">
    <div class="container">
        <h2>Change Password</h2>  
        <p>
            <strong>{{ Auth::user()->name }},</strong> account owner 
        </p>
        <div id="" class="pt-4">
            @include('includes.gobackroute')
            <div class="row">
                <div class="col-sm-12 col-md-8">
                    <div class="card card-bordered-blue">
                        <div class="card-body">
                            <form class="form-horizontal form-material mb-0" id="formChangePassword" data-action="{{ route('password.change') }}">
                                @csrf
                                <div class="form-group validate">
                                    <input type="password" name="current_password" id="current_password" placeholder="Enter Current Password" class="form-control">
                                    <span class="text-danger small" role="alert"></span>                                  
                                </div>
                                <div class="form-group validate">
                                    <input type="password" name="password" placeholder="Enter New Password" class="form-control">
                                    <span class="text-danger small" role="alert"></span>                                  
                                </div>
                                <div class="form-group validate">
                                    <input type="password" name="password_confirmation" placeholder="Confirm New Password" class="form-control">
                                    <span class="text-danger small" role="alert"></span>                                  
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary px-4 mt-3 float-right btnChangePassword"><i class="mdi mdi-refresh fa-lg"></i> Change Password</button>
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
<script src="{{ asset('assets/pages/account/all-groups.js') }}"></script>
@endsection