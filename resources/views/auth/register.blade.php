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
                            <h4 class="mt-0 mb-3 mt-5">Sign Up For Account</h4>
                            <p class="text-muted mb-0">Fill Your Information.</p>  
                        </div> <!--end auth-logo-text-->  

                        @include('includes.alerts')
                        
                        <form class="form-horizontal auth-form my-4" id="formSignup" method="POST" action="{{ url('register') }}">
                            @csrf
                            {{-- <div class="form-group validate">
                                <div class="input-group mb-3">
                                    <span class="auth-form-icon">
                                        <i class="fa fa-dollar-sign"></i> 
                                    </span>                                                                                                              
                                   <select name="type" id="type" class="form-control">
                                       <option value="normal">Normal Use</option>
                                       <option value="management">Management Use</option>
                                   </select>
                                </div>  
                                <span class="text-primary small mySpan" id="typeDescription" role="alert"></span>                                  
                            </div><!--end form-group-->  --}}

                            <div class="form-group validate">
                                <div class="input-group mb-3">
                                    <span class="auth-form-icon">
                                        <i class="dripicons-user"></i> 
                                    </span>                                                                                                              
                                    <input type="text" class="form-control" name="name" placeholder="Enter your name" autofocus>
                                </div>  
                                <span class="text-danger small mySpan" role="alert">{{ $errors->has('name') ? $errors->first('name') : '' }}</span>                                  
                            </div><!--end form-group--> 

                            <div class="form-group validate">
                                <div class="input-group mb-3">
                                    <span class="auth-form-icon">
                                        <i class="fa fa-envelope"></i> 
                                    </span>                                                                                                              
                                    <input type="email" class="form-control" name="email" placeholder="Enter your email address">
                                </div>  
                                <span class="text-danger small mySpan" role="alert">{{ $errors->has('email') ? $errors->first('email') : '' }}</span>                                  
                            </div><!--end form-group--> 

                            <div class="form-group validate">
                                <div class="input-group mb-3">
                                    <span class="auth-form-icon">
                                        <i class="fa fa-phone"></i> 
                                    </span>                                                                                                 
                                    <input type="number" class="form-control" name="phone" onkeypress="return isNumber(event);" placeholder="Enter your phone number">
                                </div>  
                                <span class="text-danger small mySpan" role="alert">{{ $errors->has('phone') ? $errors->first('phone') : '' }}</span>                                  
                            </div><!--end form-group--> 

                           
                            <div class="form-group validate">                                           
                                <div class="input-group mb-3"> 
                                    <span class="auth-form-icon">
                                        <i class="fa fa-eye-slash" id="showPassword" style="cursor: pointer"></i> 
                                    </span>                                                       
                                    <input type="password" class="form-control" name="password" id="password" onkeyup="validatePassword(this.value);" placeholder="Enter your password">
                                </div>    
                                <div class="text-center"><strong ><span id="msg"></span></strong>  </div>             
                                <span class="text-danger small mySpan" role="alert" id="msg">{{ $errors->has('password') ? $errors->first('password') : '' }}</span>                           
                            </div><!--end form-group--> 

                            <div class="form-group validate">                                            
                                <div class="checkbox checkbox-primary pl-3">
                                    <input id="agreement" type="checkbox" name="agreement">
                                    <label for="agreement">By checking this, you have agreed to the <a href="#" class="text-primary">terms and conditions</a> of this platform.</label>
                                </div>   
                                <span class="text-danger small mySpan" role="alert"></span>                                   
                            </div><!--end form-group--> 

                            <div class="form-group mb-0 row">
                                <div class="col-12 mt-2">
                                    <button class="btn btn-gradient-danger btn-round btn-block waves-effect waves-light btn_sign_up" type="submit">Sign Up <i class="fas fa-sign-in-alt ml-1"></i></button>
                                </div><!--end col--> 
                            </div> <!--end form-group-->                           
                        </form><!--end form-->
                    </div><!--end /div-->
                    
                    <div class="m-3 text-center text-muted">
                        <p class="">Already have an account ?  <a href="{{ route('login') }}" class="text-primary ml-2">Sign In</a></p>
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