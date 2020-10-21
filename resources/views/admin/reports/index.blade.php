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
                        <li class="breadcrumb-item active">Report Property</li>
                    </ol>
                </div>
                <h4 class="page-title">Report Property</h4>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
    <!-- end page title end breadcrumb -->
   
    <div class="card">
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <div class="card-body">
                    <h4 class="mb-5 header-title text-primary">{{ $property->title }} <small>- Owner ({{ $property->user->name }})</small></h4>
                    <form id="formReport">
                        <input type="hidden" value="{{ $property->id }}" name="property_id" readonly />
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group validate">
                                    <label for="">subject</label>
                                    <select name="subject" class="form-control" id="subject">
                                        <option value="fraud">Fraud</option>
                                        <option value="unconducive environment">Unconducive Environment</option>
                                        <option value="abuse">Abuse</option>
                                    </select>
                                    <span class="text-danger small mySpan" role="alert"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 pt-4">                            
                                <div class="form-group validate">
                                    <label for="complain"><span class="text-primary">Complain</span></label>
                                    <textarea class="form-control" maxlength="500" name="complain" rows="5" maxlength="500" id="complain" placeholder="Write your complain"></textarea>
                                    <small id="myMessageCharacters" class="form-text text-muted">500 characters remaining</small>
                                    <span class="text-danger small mySpan" role="alert"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 text-right">
                                <button type="submit" class="btn btn-gradient-primary px-5 py-2 btnSubmitReport"><i class="fa fa-dot-circle"></i> Submit</button>
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


$("#formReport").on("submit", function(e){
    e.preventDefault();
    e.stopPropagation();
    var valid = true;
    $('#formReport select,  #formReport textarea').each(function() {
        var $this = $(this);
        
        if(!$this.val()) {
            valid = false;
            $this.parents('.validate').find('.mySpan').text('The '+$this.attr('name').replace(/[\_]+/g, ' ')+' field is required');
        }
    });
    if(valid){
        $(".btnSubmitReport").html('<i class="fa fa-spin fa-spinner"></i> Submitting...').attr('disabled', true);
        var data  = $("#formReport").serialize();
        $.ajax({
            url: "{{route('report-listing.submit')}}",
            type: "POST",
            data: data,
            success: function(resp){
                if(resp=='success'){
                    swal({
                        title: "Submitted",
                        text: "Report submitted successful.",
                        type: "success",
                        cancelButtonClass: "btn-sm",
                        confirmButtonText: "Okay",
                        closeOnConfirm: true
                        },
                    function(){
                        $("#complain").val('');
                        window.location.href="{{ route('single.property', $property->id) }}";
                    });
                    
                    // swal("Submitted", "Report submitted successful", "success");
                    // $("#subject").val('');
                    // $("#complain").val('');
                }
                else{
                    alert("Something went wrong");
                }
                $(".btnSubmitReport").html('<i class="fa fa-dot-circle"></i> Submit').attr('disabled', false);
            },
            error: function(resp){
                alert("Something went wrong with your request");
                $(".btnSubmitReport").html('<i class="fa fa-dot-circle"></i> Submit').attr('disabled', false);
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

$("select").on('change', function(){
    if($(this).val()!=''){
        $(this).parents('.validate').find('.mySpan').text('');
    }else{ 
        $(this).parents('.validate').find('.mySpan').text('The '+$(this).attr('name').replace(/[\_]+/g, ' ')+' field is required');
    }
});

//check remaining characters
var maxNumber = 500;
var counter = $("#complain").val().length;
maxNumber=maxNumber-counter;
$("#myMessageCharacters").text(maxNumber.toString()+" characters remaining");

$("#complain").on("input", function(){
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