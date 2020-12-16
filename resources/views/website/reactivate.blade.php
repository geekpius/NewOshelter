@extends('layouts.site')

@section('content')

<div class="pxp-content">
    <div class="pxp-contact pxp-content-wrapper">
        <div class="pxp-contact-hero mt-4 mt-md-5">
            <div class="pxp-contact-hero-fig pxp-cover" style="background-image: url({{ asset('assets/light/images/contact-bg.jpg') }}); background-position: 50% 50%;"></div>

            <div class="pxp-contact-hero-offices-container">
                <div class="container">
                    <div class="pxp-contact-hero-offices">
                        <h2 class="pxp-section-h2 text-center">Re-activate Your Account</h2>
                        <div class="row">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-6">
                                <div class="mt-3 mt-md-4" align="center">
                                    <p class="text-primary">Let put everything back to normal. </p>
                                    <div id="msgHolder"></div>

                                    <form class="mt-4" id="formReactivate">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group validate">
                                                    <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email">
                                                    <span class="small text-danger mySpan"></span>
                                                </div>
                                            </div>

                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <button class="btn btn-primary btn-block btnReactivate">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <br><br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="container mt-200"></div>

@endsection

@section('scripts')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
        }
    })
    
    
    $("#formReactivate").on("submit", function(e){
        e.preventDefault();
        e.stopPropagation();
        var valid = true;
        $('#formReactivate input').each(function() {
            var $this = $(this);
            
            if(!$this.val()) {
                valid = false;
                $this.parents('.validate').find('.mySpan').text('The '+$this.attr('name').replace(/[\_]+/g, ' ')+' field is required');
            }
        });
        if(valid) {
            $('.btnReactivate').html('<i class="fa fa-spinner fa-spin"></i> Submitting...').attr('disabled', true);
            var data = $("#formReactivate").serialize();
            $.ajax({
                url: "{{ route('account.reactivate.submit') }}",
                type: "POST",
                data: data,
                success: function(resp){
                    if(resp=='success'){
                        $("#msgHolder").hide().show().html('<div class="alert alert-success border-0" role="alert">'+
                                '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                                '<span aria-hidden="true">x</span></button><strong>Success!</strong> Reactivation message sent to your email address.</div>');
                    }
                    else{
                        $("#msgHolder").hide().show().html('<div class="alert alert-danger border-0" role="alert">'+
                                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                                            '<span aria-hidden="true">x</span></button><strong>Opps!</strong> '+resp+'</div>');
                    }
                    $("#formReactivate")[0].reset();
                    $('.btnReactivate').html('Submit').attr('disabled', false);
                },
                error: function(resp){
                    alert("Something went wrong.");
                    $('.btnReactivate').html('Submit').attr('disabled', false);
                }
            });
        }
        return false;
    });
    
    $("#formReactivate input").on('input', function(){
        if($(this).val()!=''){
            $(this).parents('.validate').find('.mySpan').text('');
        }else{ $(this).parents('.validate').find('.mySpan').text('The '+$(this).attr('name').replace(/[\_]+/g, ' ')+' field is required'); }
    });
    
</script>
@endsection