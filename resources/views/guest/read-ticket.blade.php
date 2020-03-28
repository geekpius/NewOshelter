@extends('layouts.guest')

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
                        <li class="breadcrumb-item active">Read Ticket</li>
                    </ol>
                </div>
                <h4 class="page-title">Read Ticket</h4>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
    <!-- end page title end breadcrumb -->
   
    <div class="card">
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
                <div class="card-body">
                    <h4 class="header-title">{{ $ticket->subject }}</h4>
                    <p class="header-title text-muted"># {{ $ticket->id }} - {{ $ticket->help_desk }}</p>
                    <hr>
                    <div class="card mb-4 p-4">
                        <div class="row">
                            <div class="col-sm-4">
                                <img src="{{ (empty(Auth::user()->image))? asset('assets/images/tenants/user-4.jpg'):asset('assets/images/tenants/'.Auth::user()->image) }}" alt="{{ current(explode(' ',Auth::user()->name)) }}" class="rounded-circle thumb-lg m-2" /> 
                                <p class="m-2">{{ Auth::user()->name }}</p>
                            </div>
                            <div class="col-sm-8">
                                <p style="border-bottom: solid 1px" class="pl-1"><i class="fa fa-clock"></i> {{  \Carbon\Carbon::parse($ticket->created_at)->diffForHumans() }}</p>
                                <p>{{ $ticket->message }}</p>
                            </div>
                        </div>
                        <hr>

                        @foreach ($ticket->userTicketReplies as $reply)
                        @if ($reply->owner)
                        <div class="row">
                            <div class="col-sm-4">
                                <img src="{{ (empty(Auth::user()->image))? asset('assets/images/tenants/user-4.jpg'):asset('assets/images/tenants/'.Auth::user()->image) }}" alt="{{ current(explode(' ',Auth::user()->name)) }}" class="rounded-circle thumb-lg m-2" /> 
                                <p class="m-2">{{ Auth::user()->name }}</p>
                            </div>
                            <div class="col-sm-8">
                                <p style="border-bottom: solid 1px" class="pl-1"><i class="fa fa-clock"></i> {{  \Carbon\Carbon::parse($reply->created_at)->diffForHumans() }}</p>
                                <p>{{ $reply->message }}</p>
                            </div>
                        </div>
                        <hr>
                        @else
                        <div class="row">
                            <div class="col-sm-4">
                                <img src="{{ asset('assets/images/logo-sm.png') }}" alt="admin_logo" class="rounded-circle thumb-lg m-2" /> 
                                <p class="m-2 ml-3">Admin</p>
                            </div>
                            <div class="col-sm-8">
                                <p style="border-bottom: solid 1px" class="pl-1"><i class="fa fa-clock"></i> {{  \Carbon\Carbon::parse($reply->created_at)->diffForHumans() }}</p>
                                <p>{{ $reply->message }}</p>
                            </div>
                        </div>
                        <hr>
                        @endif
                        @endforeach
                        

                        @if (!$ticket->status)
                            <form id="formReply" class="mb-5">
                                <div class="row">
                                    <div class="col-sm-12 pt-4">    
                                        <input type="hidden" name="ticket_id" value="{{ $ticket->id }}" id="ticket_id" readonly>                        
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
                                        <button type="submit" class="btn btn-gradient-primary px-5 py-2 btnSubmitReply"><i class="fa fa-reply"></i> Reply</button>
                                    </div>
                                </div>
                            </form>
                        @else
                            <div class="alert alert-info border-0 mb-5" role="alert">
                                <strong>Closed!</strong> This ticket is closed and cannot be reopened.
                            </div>
                        @endif


                    </div>
                    
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


$("#formReply").on("submit", function(e){
    e.preventDefault();
    e.stopPropagation();
    var valid = true;
    $('#formReply textarea').each(function() {
        var $this = $(this);
        
        if(!$this.val()) {
            valid = false;
            $this.parents('.validate').find('.mySpan').text('The '+$this.attr('name').replace(/[\_]+/g, ' ')+' field is required');
        }
    });
    if(valid){
        $(".btnSubmitReply").html('<i class="fa fa-spin fa-spinner"></i> Replying...').attr('disabled', true);
        var data  = $("#formReply").serialize();
        $.ajax({
            url: "{{route('guest.ticket.reply')}}",
            type: "POST",
            data: data,
            success: function(resp){
                if(resp=='success'){
                    window.location.reload();
                }
                else{
                    alert("Something went wrong");
                }
                $(".btnSubmitReply").html('<i class="fa fa-reply"></i> Reply').attr('disabled', false);
            },
            error: function(resp){
                alert("Something went wrong with your request");
                $(".btnSubmitReply").html('<i class="fa fa-reply"></i> Reply').attr('disabled', false);
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