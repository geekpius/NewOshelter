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
                            <a href="{{ route('index') }}" class="logo logo-admin"><img src="{{ asset('assets/images/logo-sm.png') }}" height="55" alt="logo" class="auth-logo"></a>
                        </div><!--end auth-logo-box-->
                        
                        <div class="text-center auth-logo-text">
                            <h4 class="mt-0 mb-3 mt-5">Sign Up For Account</h4>
                            <p class="text-muted mb-0">Fill Your Information.</p>  
                        </div> <!--end auth-logo-text-->  

                        
                        <form class="form-horizontal auth-form my-4" id="formSignup" method="POST" action="{{ url('register') }}">
                            @csrf
                            <div class="form-group validate">
                                <div class="input-group mb-3">
                                    <span class="auth-form-icon">
                                        <i class="dripicons-user"></i> 
                                    </span>                                                                                                              
                                    <input type="text" class="form-control" name="name" placeholder="Enter your name" autofocus>
                                </div>  
                                <span class="text-danger small" role="alert">{{ $errors->has('name') ? $errors->first('name') : '' }}</span>                                  
                            </div><!--end form-group--> 

                            <div class="form-group validate">
                                <div class="input-group mb-3">
                                    <span class="auth-form-icon">
                                        <i class="fa fa-envelope"></i> 
                                    </span>                                                                                                              
                                    <input type="email" class="form-control" name="email" placeholder="Enter your email address">
                                </div>  
                                <span class="text-danger small" role="alert">{{ $errors->has('email') ? $errors->first('email') : '' }}</span>                                  
                            </div><!--end form-group--> 

                            <div class="form-group validate">
                                <div class="input-group mb-3">
                                    <span class="auth-form-icon">
                                        <i class="fa fa-phone"></i> 
                                    </span>                                                                                                 
                                    <input type="phone" class="form-control" name="phone" onkeypress="return isNumber(event);" maxlength="10" placeholder="Enter your phone number">
                                </div>  
                                <span class="text-danger small" role="alert">{{ $errors->has('phone') ? $errors->first('phone') : '' }}</span>                                  
                            </div><!--end form-group--> 

                            <div class="form-group validate">
                                <div class="input-group mb-3">
                                    <span class="auth-form-icon">
                                        <i class="fa fa-map-marker"></i> 
                                    </span>                                                                                                              
                                    <input type="phone" class="form-control" name="digital_address" id="digital_address" oninput="getUpperCase('digital_address')" placeholder="Enter your digital address">
                                </div>  
                                <span class="text-danger small" role="alert">{{ $errors->has('digital_address') ? $errors->first('digital_address') : '' }}</span>                                  
                            </div><!--end form-group--> 

                            <div class="form-group validate">                                           
                                <div class="input-group mb-3"> 
                                    <span class="auth-form-icon">
                                        <i class="dripicons-lock"></i> 
                                    </span>                                                       
                                    <input type="password" class="form-control" name="password" placeholder="Enter your password">
                                </div>    
                                <span class="text-danger small" role="alert">{{ $errors->has('password') ? $errors->first('password') : '' }}</span>                           
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
<script>
$("#formSignup").on("submit", function(e){
    e.stopPropagation();
    var valid = true;
    $('#formSignup input').each(function() {
        var $this = $(this);
        
        if(!$this.val()) {
            valid = false;
            $this.parents('.validate').find('span:last').text('The '+$this.attr('name').replace(/[\_]+/g, ' ')+' field is required');
        }
    });
    if(valid) {
        $('.btn_sign_up').html('<i class="fa fa-spinner fa-spin"></i> Signing Up...').attr('disabled', true);
        return true;
    }
    return false;
});


function getUpperCase(field){
    var set_field = document.getElementById(field).value;
    document.getElementById(field).value=set_field.toUpperCase();
}

function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}

$("#formSignup input").on('input', function(){
    if($(this).val()!=''){
        $(this).parents('.validate').find('span:last').text('');
    }else{ $(this).parents('.validate').find('span:last').text('The '+$(this).attr('name').replace(/[\_]+/g, ' ')+' field is required'); }
});
</script>
@endsection