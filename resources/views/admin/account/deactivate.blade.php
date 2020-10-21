@extends('admin.layouts.app')

@section('styles')
@endsection
@section('content')

<div class="container-fluid">
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-right">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active">Deactivate Account</li>
                    </ol>
                </div>
                <h4 class="page-title">Deactivate Account</h4>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
    <!-- end page title end breadcrumb -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body  met-pro-bg">
                    <div class="met-profile">
                        <div class="row">
                            <div class="col-lg-8 align-self-center mb-3 mb-lg-0">
                                <div class="met-profile-main">
                                    <div class="met-profile-main-pic">
                                        <img src="{{ (empty(Auth::user()->image))? asset('assets/images/user.svg'):asset('assets/images/users/'.Auth::user()->image) }}" alt="{{ Auth::user()->name }}" width="130" height="130" class="rounded-circle img_preview">
                                        
                                    </div>
                                    <div class="met-profile_user-detail ml-3">
                                        <h5 class="met-user-name"><span id="myLegalName">{{ Auth::user()->name }}</span> <small>({{ Auth::user()->membership }})</small></h5>                                                        
                                        <p class="mb-0 met-user-name-post" id="myOccupation">{{ empty(Auth::user()->profile->occupation)? 'N/A':Auth::user()->profile->occupation }}</p>
                                    </div>
                                </div>                                                
                            </div><!--end col-->
                            <div class="col-lg-4">
                                <ul class="list-unstyled personal-detail">
                                    <li class=""><i class="dripicons-phone mr-2 text-info font-18"></i> <b> Phone </b> : {{ Auth::user()->phone }}</li>
                                    <li class="mt-2"><i class="dripicons-mail text-info font-18 mt-2 mr-2"></i> <b> Email </b> : {{ Auth::user()->email }}</li>
                                    <li class="mt-2"><i class="dripicons-location text-info font-18 mt-2 mr-2"></i> <b>Location</b> : <span id="myCity">{{ empty(Auth::user()->profile->city)? 'N/A':Auth::user()->profile->city }}</span></li>
                                    <li class="mt-2"><i class="fas fa-map-pin text-info font-18 mt-2 mr-2"></i> <b>Digital Address</b> : <span class="text-white">{{ Auth::user()->digital_address }}</span></li>
                                    <li class="mt-2"><i class="fa fa-clock text-info font-18 mt-2 mr-2"></i> <b>Login Time</b> : {{ Auth::user()->login_time }}</li>
                                </ul>
                            </div><!--end col-->
                        </div><!--end row-->
                    </div><!--end f_profile-->                                                                                
                </div><!--end card-body-->
            </div><!--end card-->
        </div><!--end col-->
    </div><!--end row-->
    
    
    <div class="row">
        <div class="col-sm-12 mx-auto">
            <div class="card">
                <div class="card-body">
                    <div class="row">

                        <div class="col-sm-4 pb-5 pl-3 pr-3">
                            <h5 class="text-primary mb-3">Account Deactivation</h5>
                            <div>
                                <p>
                                    Deactivating your account means you are no more on OShelter and your account will not be seen so does your listings, and reservations. 
                                    You will not be able to access anything on OShelter with the deactivated account.
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-1"></div>

                        <div class="col-sm-4">
                            <h5 class="text-primary">Why do you want to deactivate your account</h5>
                            <form class="form-horizontal form-material mb-0" id="formDeactivate">
                                @csrf
                                <div class="form-group validate">
                                    <select name="reason" id="reason" class="form-control">
                                        <option value="">Reasons</option>
                                        <option value="I have safety or privacy concerns">I have safety or privacy concerns</option>
                                        <option value="I can’t list anymore">I can’t list anymore</option>
                                        <option value="I can't comply with OShelter's Terms of Service">I can't comply with OShelter's Terms of Service</option>
                                        <option value="other">Other</option>
                                    </select>
                                    <span class="text-danger small mySpan" role="alert"></span>                                  
                                </div>
                                <div class="form-group validate otherReason" style="display:none">
                                    <input type="text" name="other_reason" id="other_reason" placeholder="Why are you leaving" class="form-control">
                                    <span class="text-danger small mySpan" role="alert"></span>                                  
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-gradient-primary btn-sm text-light px-4 mt-4 mb-5 btnDeactivate">Deactivate</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>                                            
            </div>
        </div> <!--end col-->                                          
    </div><!--end row-->

</div><!-- container -->


@endsection
@section('scripts')
<script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
    }
})

$("#formDeactivate").on("submit", function(e){
    e.preventDefault();
    e.stopPropagation();
    var valid = true;
    $('#formDeactivate input, #formDeactivate select').each(function() {
        var $this = $(this);
        
        if(!$this.val()) {
            valid = false;
            $this.parents('.validate').find('.mySpan').text('The '+$this.attr('name').replace(/[\_]+/g, ' ')+' field is required');
        }
    });
    if(valid) {
        $('.btnDeactivate').html('<i class="fa fa-spinner fa-spin"></i> Deactivating Account...').attr('disabled', true);
        var data = $("#formDeactivate").serialize();
        $.ajax({
            url: "{{ route('profile.deactivate.submit') }}",
            type: "POST",
            data: data,
            success: function(resp){
                if(resp=='success'){
                    window.location.reload();
                    // window.location.href="{{ route('account.deactivated') }}";
                }
                else{
                    swal({
                        title: "Opps",
                        text: resp,
                        type: "error",
                        confirmButtonClass: "btn-primary btn-sm",
                        confirmButtonText: "OKAY",
                        closeOnConfirm: true
                    });
                }
            },
            error: function(resp){
                alert("Something went wrong.");
                $('.btnDeactivate').html('Deactivate Account').attr('disabled', false);
            }
        });
    }
    return false;
});

$("#formDeactivate input").on('input', function(){
    if($(this).val()!=''){
        $(this).parents('.validate').find('.mySpan').text('');
    }else{ $(this).parents('.validate').find('.mySpan').text('The '+$(this).attr('name').replace(/[\_]+/g, ' ')+' field is required'); }
});

$("#formDeactivate select").on('change', function(){
    if($(this).val()!=''){
        $(this).parents('.validate').find('.mySpan').text('');
    }else{ $(this).parents('.validate').find('.mySpan').text('The '+$(this).attr('name').replace(/[\_]+/g, ' ')+' field is required'); }
});

$("#reason").on("change", function(e){
    e.preventDefault();
    e.stopPropagation();
    var $this = $(this);
    if($this.val()!=""){
        if($this.val()=='other'){
            $("#other_reason").val('');
            $(".otherReason").fadeIn('slow');
        }
        else{
            $("#other_reason").val('none');
            $(".otherReason").hide('slow');
        }
    }
    return false;
});
</script>
@endsection