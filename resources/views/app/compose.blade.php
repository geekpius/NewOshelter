@extends('layouts.app')

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
                        <li class="breadcrumb-item active">Compose Message</li>
                    </ol>
                </div>
                <h4 class="page-title">Compose Message</h4>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
    <!-- end page title end breadcrumb -->
   
    <div class="card">
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <div class="card-body">
                    <div class="">
                        <img src="{{ (empty($host->image))? asset('assets/images/user.jpg'):asset('assets/images/users/'.$host->image) }}" alt="{{ current(explode(' ',$host->name)) }}" class="rounded-circle thumb-md" />
                        <p class="mt-lg-2">{{ $host->name }}</p>
                    </div>
                    <form id="formCompose">
                        <div class="row">
                            <div class="col-sm-12 pt-4">     
                                <input type="hidden" name="destination" value="{{ $host->id }}" readonly>                       
                                <div class="form-group validate">
                                    <label for="message"><span class="text-primary">Message</span></label>
                                    <textarea class="form-control" maxlength="500" name="message" rows="5" maxlength="500" id="message" placeholder="Write your message"></textarea>
                                    <small id="myMessageCharacters" class="form-text text-muted">500 characters remaining</small>
                                    <span class="text-danger small mySpan" role="alert"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 text-right">
                                <button type="submit" class="btn btn-gradient-primary px-5 py-2 btnSubmitCompose"><i class="fa fa-dot-circle"></i> Submit</button>
                            </div>
                        </div>
                    </form>
                </div><!--end card-body-->

            </div><!-- end Col -->
        </div><!-- End row -->
    </div>

</div><!-- container -->

@endsection

@section('scripts')
<script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
    }
})


$("#formCompose").on("submit", function(e){
    e.preventDefault();
    e.stopPropagation();
    var valid = true;
    $('#formCompose input, #formCompose select,  #formCompose textarea').each(function() {
        var $this = $(this);
        
        if(!$this.val()) {
            valid = false;
            $this.parents('.validate').find('.mySpan').text('The '+$this.attr('name').replace(/[\_]+/g, ' ')+' field is required');
        }
    });
    if(valid){
        $(".btnSubmitCompose").html('<i class="fa fa-spin fa-spinner"></i> Submitting...').attr('disabled', true);
        var data  = $("#formCompose").serialize();
        $.ajax({
            url: "{{route('messages.compose.submit')}}",
            type: "POST",
            data: data,
            success: function(resp){
                if(resp=='success'){
                    swal("Submitted", "Message submitted successful", "success");
                    $("#message").val('');
                }
                else{
                    alert("Something went wrong");
                }
                $(".btnSubmitCompose").html('<i class="fa fa-dot-circle"></i> Submit').attr('disabled', false);
            },
            error: function(resp){
                alert("Something went wrong with your request");
                $(".btnSubmitCompose").html('<i class="fa fa-dot-circle"></i> Submit').attr('disabled', false);
            }
        });
    }
    return false;
});


$("textarea").on('input', function(){
    if($(this).val()!=''){
        $(this).parents('.validate').find('.mySpan').text('');
    }else{ $(this).parents('.validate').find('.mySpan').text('The '+$(this).attr('name').replace(/[\_]+/g, ' ')+' field is required.'); }
});

//check remaining characters
var maxNumber = 500;
var counter = $("#message").val().length;
maxNumber=maxNumber-counter;
$("#myMessageCharacters").text(maxNumber.toString()+" characters remaining");

$("#message").on("input", function(){
    var maxNumber = 500;
    var $this = $(this);
    if($this.val()!=""){
        var counter = $this.val().length;
        maxNumber=maxNumber-counter;
        $("#myMessageCharacters").text(maxNumber.toString()+" characters remaining");
    }else{
        $("#myMessageCharacters").text(maxNumber.toString()+" characters remaining");
    }
});

</script>
@endsection