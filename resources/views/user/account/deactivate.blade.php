@extends('layouts.site')

@section('content')

<div class="pxp-content pull-content-down">
    <div class="container">
        <h2>Deactivate Account</h2>  
        <p>
            <strong>{{ Auth::user()->name }},</strong> account owner 
        </p>
        <div id="" class="pt-4">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-bordered-blue">
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
                                    <form class="form-horizontal mb-0" id="formDeactivate">
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
                                            <button class="btn btn-primary px-4 mt-4 btnDeactivate">Deactivate</button>
                                        </div>
                                    </form>
                                </div>
        
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
<script>
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