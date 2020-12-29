@extends('layouts.site')

@section('style')

@endsection
@section('content')
<div class="pxp-content pull-content-down">
    <div class="container">
        <h2>Support Ticket</h2>  
        <p>
            <strong>{{ Auth::user()->name }},</strong> supports 
        </p>
        <div class="pt-4">
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="mb-5 header-title">Open New Ticket</h4>
                    <form id="formTicket">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group validate">
                                    <label for="">Help Desk</label>
                                    <select name="help_desk" class="form-control" id="help_desk">
                                        <option value="support">Support</option>
                                        <option value="payments">Payments</option>
                                        <option value="abuse">Abuse</option>
                                    </select>
                                    <span class="text-danger small mySpan" role="alert"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 pt-4">
                                <div class="form-group validate">
                                    <label>Subject</label>
                                    <input id="subject" type="text" name="subject" class="form-control">
                                    <span class="text-danger small mySpan" role="alert"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 pt-4">                            
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
                                <button type="submit" class="btn btn-primary px-5 py-2 btnSubmitTicket"><i class="fa fa-dot-circle"></i> Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>    
</div>
@endsection

@section('scripts')
<script>
    $("#formTicket").on("submit", function(e){
        e.preventDefault();
        e.stopPropagation();
        var valid = true;
        $('#formTicket input, #formTicket select,  #formTicket textarea').each(function() {
            var $this = $(this);
            
            if(!$this.val()) {
                valid = false;
                $this.parents('.validate').find('.mySpan').text('The '+$this.attr('name').replace(/[\_]+/g, ' ')+' field is required');
            }
        });
        if(valid){
            $(".btnSubmitTicket").html('<i class="fa fa-spin fa-spinner"></i> Submitting...').attr('disabled', true);
            var data  = $("#formTicket").serialize();
            $.ajax({
                url: "{{route('ticket.submit')}}",
                type: "POST",
                data: data,
                success: function(resp){
                    if(resp=='success'){
                        swal("Submitted", "Ticket submitted successful", "success");
                        $("#subject").val('');
                        $("#message").val('');
                    }
                    else{
                        alert("Something went wrong");
                    }
                    $(".btnSubmitTicket").html('<i class="fa fa-dot-circle"></i> Submit').attr('disabled', false);
                },
                error: function(resp){
                    alert("Something went wrong with your request");
                    $(".btnSubmitTicket").html('<i class="fa fa-dot-circle"></i> Submit').attr('disabled', false);
                }
            });
        }
        return false;
    });
    
    
    $("input, textarea").on('input', function(){
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