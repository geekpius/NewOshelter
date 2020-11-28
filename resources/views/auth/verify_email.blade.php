@extends('layouts.auth')

@section('content')
<!-- Log In page -->
<div class="row vh-100 ">
    <div class="col-12 align-self-center">
        <div class="auth-page">
            <div class="card auth-card shadow-lg">
                <div class="card-body">
                    <div class="px-3">
                        <div class="auth-logo-box">
                            <a href="{{ route('index') }}" class="logo logo-admin"><img src="{{ asset('assets/images/form-logo.png') }}" height="55" alt="logo" class="auth-logo"></a>
                        </div><!--end auth-logo-box-->
                        
                        <div class="text-center auth-logo-text">
                            <h4 class="mt-0 mb-3 mt-5">Verify Your Email</h4>
                            <p class="text-muted mb-0">Enter your verification code from email address.</p>  
                        </div> <!--end auth-logo-text-->  

                        
                        @include('includes.alerts')
                        
                        <form class="form-horizontal auth-form my-4" id="formVerify" method="POST" action="{{ route('verify.email.submit') }}">
                            @csrf
                            <div class="form-group validate">
                                <div class="input-group mb-3">
                                    <span class="auth-form-icon">
                                        <i class="dripicons-code"></i> 
                                    </span>                                                                                                              
                                    <input type="text" class="form-control" name="verification_code" placeholder="Enter verification code" autofocus>
                                </div>  
                                <span class="text-danger small mySpan" role="alert">{{ $errors->has('verification_code') ? $errors->first('verification_code') : '' }}</span>                                  
                            </div><!--end form-group--> 


                            <div class="form-group mb-0 row">
                                <div class="col-12 mt-2">
                                    <button class="btn btn-gradient-primary btn-round btn-block waves-effect waves-light btn_verify_code" type="submit">Verify <i class="fas fa-check-circle ml-1"></i></button>
                                </div><!--end col--> 
                            </div> <!--end form-group-->                           
                        </form><!--end form-->
                    </div><!--end /div-->

                    <div class="m-3 text-center text-muted">
                        <p class="">
                            <a href="#" class="text-primary" onclick="event.preventDefault(); document.getElementById('resend-verify-code').submit();">Resend</a> 
                            if code is expired or you didn't receive it.
                        </p>
                        <form id="resend-verify-code" action="{{ route('verify.email.resend', Auth::user()->id) }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div><!--end card-body-->
            </div><!--end card-->
        </div><!--end auth-page-->
    </div><!--end col-->           
</div><!--end row-->
<!-- End Log In page -->
@endsection

@section('scripts')
<script src="{{ asset('assets/pages/auth.js') }}"></script>
@endsection