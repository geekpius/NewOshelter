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
                            <a href="#" class="logo logo-admin"><img src="{{ asset('assets/images/logo-sm.png') }}" height="55" alt="logo" class="auth-logo"></a>
                        </div><!--end auth-logo-box-->
                        
                        <div class="text-center auth-logo-text">
                            <h4 class="mt-0 mb-3 mt-5">Let's Get Started Real Home</h4>
                            <p class="text-muted mb-0">Sign in to continue to Real Home.</p>  
                        </div> <!--end auth-logo-text-->  

                        
                        <form class="form-horizontal auth-form my-4" id="formSignIn" method="POST" action="{{ url('login') }}">
                            @csrf
                            <div class="form-group validate">
                                <div class="input-group mb-3">
                                    <span class="auth-form-icon">
                                        <i class="dripicons-user"></i> 
                                    </span>                                                                                                              
                                    <input type="text" class="form-control" name="username" placeholder="Enter Email or Membership ID" autofocus>
                                </div>  
                                <span class="text-danger small" role="alert">{{ $errors->has('username') ? $errors->first('username') : '' }}</span>                                  
                            </div><!--end form-group--> 

                            <div class="form-group validate">                                            
                                <div class="input-group mb-3"> 
                                    <span class="auth-form-icon">
                                        <i class="dripicons-lock"></i> 
                                    </span>                                                       
                                    <input type="password" class="form-control" name="password" placeholder="Enter Password">
                                </div>    
                                <span class="text-danger small" role="alert">{{ $errors->has('password') ? $errors->first('password') : '' }}</span>                           
                            </div><!--end form-group--> 

                            <div class="form-group row mt-4">
                                <div class="col-sm-6">
                                    <div class="custom-control custom-switch switch-success">
                                        <input type="checkbox" class="custom-control-input" id="customSwitchSuccess" name="remember" {{ old('remember') ? 'checked' : '' }} >
                                        <label class="custom-control-label text-muted" for="customSwitchSuccess">Remember me</label>
                                    </div>
                                </div><!--end col--> 
                                <div class="col-sm-6 text-right">
                                    <a href="#" class="text-muted font-13"><i class="dripicons-lock"></i> Forgot password?</a>                                    
                                </div><!--end col--> 
                            </div><!--end form-group--> 

                            <div class="form-group mb-0 row">
                                <div class="col-12 mt-2">
                                    <button class="btn btn-gradient-primary btn-round btn-block waves-effect waves-light btn_sign_in" type="submit">Sign In <i class="fas fa-sign-in-alt ml-1"></i></button>
                                </div><!--end col--> 
                            </div> <!--end form-group-->                           
                        </form><!--end form-->
                    </div><!--end /div-->
                    
                    <div class="m-3 text-center text-muted">
                        <p class="">Don't have an account ?  <a href="{{ route('register') }}" class="text-danger ml-2">Free Sign Up</a></p>
                    </div>
                </div><!--end card-body-->
            </div><!--end card-->
            {{-- <div class="account-social text-center mt-4">
                <h6 class="my-4">Or Login With</h6>
                <ul class="list-inline mb-4">
                    <li class="list-inline-item">
                        <a href="" class="">
                            <i class="fab fa-facebook-f facebook"></i>
                        </a>                                    
                    </li>
                    <li class="list-inline-item">
                        <a href="" class="">
                            <i class="fab fa-twitter twitter"></i>
                        </a>                                    
                    </li>
                    <li class="list-inline-item">
                        <a href="" class="">
                            <i class="fab fa-google google"></i>
                        </a>                                    
                    </li>
                </ul>
            </div> --}}<!--end account-social-->
        </div><!--end auth-page-->
    </div><!--end col-->           
</div><!--end row-->
<!-- End Log In page -->
@endsection

@section('scripts')
<script>
$("#formSignIn").on("submit", function(e){
    e.stopPropagation();
    var valid = true;
    $('#formSignIn input').each(function() {
        var $this = $(this);
        
        if(!$this.val()) {
            valid = false;
            $this.parents('.validate').find('span:last').text('The '+$this.attr('name').replace(/[\_]+/g, ' ')+' field is required');
        }
    });
    if(valid) {
        $('.btn_sign_in').html('<i class="fa fa-spinner fa-spin"></i> Signing In...').attr('disabled', true);
        return true;
    }
    return false;
});

$("#formSignIn input").on('input', function(){
    if($(this).val()!=''){
        $(this).parents('.validate').find('span:last').text('');
    }else{ $(this).parents('.validate').find('span:last').text('The '+$(this).attr('name').replace(/[\_]+/g, ' ')+' field is required'); }
});
</script>
@endsection