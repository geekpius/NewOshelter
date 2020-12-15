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
                            <h4 class="mt-0 mb-3 mt-5">Reset Password</h4>
                        </div> <!--end auth-logo-text-->  

                        
                        @include('includes.alerts')
                        
                        <form class="form-horizontal auth-form my-4" id="formSignIn" method="POST" action="{{ url('password/reset') }}">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">
                            <div class="form-group validate">
                                <div class="input-group mb-3">
                                    <span class="auth-form-icon">
                                        <i class="fa fa-envelope"></i> 
                                    </span>                                                                                                              
                                    <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" placeholder="Enter Email Address" autofocus>
                                </div>  
                                <span class="text-danger small mySpan" role="alert">{{ $errors->has('email') ? $errors->first('email') : '' }}</span>                                  
                            </div><!--end form-group--> 

                            <div class="form-group validate">                                            
                                <div class="input-group mb-3"> 
                                    <span class="auth-form-icon">
                                        <i class="dripicons-lock"></i> 
                                    </span>                                                       
                                    <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Enter Password">
                                </div>    
                                <span class="text-danger small mySpan" role="alert">{{ $errors->has('password') ? $errors->first('password') : '' }}</span>                           
                            </div><!--end form-group--> 

                            <div class="form-group validate">                                            
                                <div class="input-group mb-3"> 
                                    <span class="auth-form-icon">
                                        <i class="dripicons-lock"></i> 
                                    </span>                                                       
                                    <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password">
                                </div>                             
                            </div><!--end form-group--> 

                            <div class="form-group mb-0 row">
                                <div class="col-12 mt-2">
                                    <button class="btn btn-gradient-primary btn-round btn-block waves-effect waves-light btn_sign_in" type="submit">Reset Password </button>
                                </div><!--end col--> 
                            </div> <!--end form-group-->                           
                        </form><!--end form-->
                    </div><!--end /div-->
                    
                    
                </div><!--end card-body-->
            </div><!--end card-->
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
                $this.parents('.validate').find('.mySpan').text('The '+$this.attr('name').replace(/[\_]+/g, ' ')+' field is required');
            }
        });
        if(valid) {
            $('.btn_sign_in').html('<i class="fa fa-spinner fa-spin"></i> Reseting Password...').attr('disabled', true);
            return true;
        }
        return false;
    });

    $("#formSignIn input").on('input', function(){
        if($(this).val()!=''){
            $(this).parents('.validate').find('.mySpan').text('');
        }else{ $(this).parents('.validate').find('.mySpan').text('The '+$(this).attr('name').replace(/[\_]+/g, ' ')+' field is required'); }
    });
</script>
@endsection
