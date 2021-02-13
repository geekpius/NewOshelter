@extends('layouts.site')

@section('style')

@endsection
@section('content')
<div class="pxp-content pull-content-down">
    <div class="container">
        <h2>Message Inbox</h2>  
        <p>
            <strong>{{ Auth::user()->name }},</strong> messages 
        </p>
        <div class="pt-4">
            <div class="row">
                <div class="col-sm-12">
                    <!-- Right Sidebar -->
                    <div class="">
                        <div class="btn-toolbar inbox-blue-background" style="background-color: #0171bb !important;" role="toolbar">
                            <div class="btn-group">
                                <button type="button" onclick="window.location='{{route('messages')}}'" class="btn btn-default text-white"><i class="fas fa-inbox"></i></button>
                            </div>  
                            <div class="btn-group ml-1">  
                                <button type="button" class="btn btn-default" id="chkParent1">
                                    <!-- <input type="checkbox" id="chkParent">
                                    <label for="chkParent" class="toggle"></label> -->
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="chkParent" />
                                        <label class="custom-control-label toggle" for="chkParent"></label>
                                    </div>
                                </button>
                            </div>  
                            <div class="btn-group ml-1">
                                <button type="button" class="btn btn-default text-white btnDeleteAll"><i class="fas fa-trash"></i></button>
                            </div>                                    
                        </div><!-- end toolbar -->
    
    
                        <div class="card my-3">
                            <div class="message-list">
                                @if (count($messages))
                                @foreach ($messages as $message)
                                <hr>
                                <div class="inboxParent mb-3">
                                    <div class="row">
                                        <div class="col-1 children-checkbox">
                                            <input type="checkbox" class="ml-2" id="chk{{ $message->id }}" value="{{ $message->id }}" style="width: 16px; height: 16px">
                                            <label for="chk{{ $message->id }}" class="toggle"></label>    
                                        </div>
                                        <div class="col-11 hand-cursor showReader {{ ($message->status==0)? ' font-weight-bolder':'' }}" data-url="{{ route('messages.read', $message->id) }}">
                                            <div class="row">
                                                <div class="col-3">{{ $message->limitName() }}</div>
                                                <div class="col-6">{{ $message->limitMessage() }}</div>  
                                                <div class="col-2 text-right">
                                                    <span class="mr-2">{{ \Carbon\Carbon::parse($message->created_at)->format("M-d") }}</span>
                                                </div>   
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-12 mt-2 myReader" style="display:none">
                                        <div class="card-body">
                                            <i class="fa fa-times float-right fa-lg exitReader" style="cursor: pointer"></i>
                                            <div class="media mb-4">
                                                <img class="d-flex mr-3 rounded-circle thumb-md" src="{{ empty($message->user->image)? asset('assets/images/user.svg'):asset('assets/images/users/'.$message->user->image) }}" alt="Generic placeholder image">
                                                <div class="media-body align-self-center">
                                                    <h4 class="font-14 m-0">{{ $message->user->name }}</h4>
                                                </div>
                                            </div>
                
                                            <p>{!! $message->message !!}</p>
                                            <a href="javascript:void(0);" data-id="{{ $message->user_id }}" class="btn btn-primary btnReply" data-animation="bounce">
                                                <i class="mdi mdi-reply"></i> Reply
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @else
                                    <div class="text-center m-5">
                                        <p class="text-danger">Nothing in inbox</p>
                                    </div>
                                @endif
                            </div>
                        </div> <!-- panel -->
    
    
                        <div class="row">
                            <div class="col-7 align-self-center">
                                @if(count($messages))
                                Showing 1 - {{ $messages->count() }} of {{ $messages->total() }}
                                @endif
                            </div><!-- end Col -->
                            <div class="col-5">
                                <div class="btn-group float-right">
                                   {{ $messages->links() }}
                                </div>
                            </div><!-- end Col -->
                        </div> <!--end row-->   
                    </div> <!-- end email-rightbar -->
                </div><!-- end Col -->
            </div>
        </div>
    </div>    
</div>

<div class="modal fade compose-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="exampleModalLabel">Reply Message</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formReply">
                    <input type="hidden" name="destination" id="message_id" readonly>
                    <div class="form-group mb-3 validate">
                        <textarea name="message" id="reply_message" cols="30" rows="5" class="form-control"></textarea>
                        <span class="small text-danger mySpan"></span>
                    </div><!--end form-group-->
                    <div class="btn-toolbar form-group mb-0">
                        <div class="pull-right">
                            <button type="submit" class="btn btn-primary btnSendReply">Send <i class="far fa-paper-plane ml-3"></i></button>                                                
                        </div>
                    </div><!--end form-group-->
                </form><!--end form-->
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endsection

@section('scripts')
<script>
$(".showReader").on("click", function(e){
    e.preventDefault();
    e.stopPropagation();
    var $this = $(this);
    $.ajax({
        url: $this.data('url'),
        type: "GET",
        success: function(resp){
            if(resp=='success'){
                $this.parents(".inboxParent").find('.myReader').show();
                $this.parents(".inboxParent").nextAll().hide();
                $this.parents(".inboxParent").prevAll().hide();
                $this.removeClass('font-weight-bolder');
                $(".children-checkbox").hide();
                $this.hide();
            }else if(resp == "permission")  {
                swal("Authorized", "You dont have permission to read this", "warning");
            }              
        },
        error: function(resp){
            console.log('Something went wrong with request');
        }
    });
    return false;
});

$(".exitReader").on("click", function(e){
    e.preventDefault();
    e.stopPropagation();
    var $this = $(this);
    $this.parents('.myReader').hide();
    $this.parents('.inboxParent').nextAll().show();
    $this.parents('.inboxParent').prevAll().show();
    $(".children-checkbox").show();
    $(".showReader").show();
    return false;
});

$(".btnReply").on("click", function(e){
    e.preventDefault();
    e.stopPropagation();
    var $this = $(this);
    $("#formReply #message_id").val($this.data('id'));
    $(".compose-modal").modal('show');
    return false;
});

$("#formReply").on("submit", function(e){
    e.preventDefault();
    e.stopPropagation();
    if($("#reply_message").val()==''){
        $("#reply_message").parents(".validate").find('.mySpan').text("The message field is required.");
        $("#reply_message").focus();
    }
    else{
        $(".btnSendReply").html('Sending... <i class="fa fa-spin fa-spinner ml-3"></i>').attr('disabled', true);
        var data  = $("#formReply").serialize();
        $.ajax({
            url: "{{route('messages.reply')}}",
            type: "POST",
            data: data,
            success: function(resp){
                if(resp=='success'){
                    $("#reply_message").val('');
                    $(".compose-modal").modal('hide');
                    $('.exitReader').trigger('click');
                }

                $(".btnSendReply").html('Send <i class="far fa-paper-plane ml-3"></i>').attr('disabled', false);
            },
            error: function(resp){
                alert("Something went wrong with your request");
                $(".btnSendReply").html('Send <i class="far fa-paper-plane ml-3"></i>').attr('disabled', false);
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

$(".btnDeleteAll").on("click", function(e){
    e.preventDefault();
    e.stopPropagation();
    var $this = $(this);
    var isChecked = 0;
    var ids = [];
    $('.message-list .inboxParent').find('input[type="checkbox"]').each(function() {
        if ($(this).prop("checked")){
            isChecked +=1;
            ids.push($(this).val());
        }
    });
    
    if(isChecked==0){
        return false;
    }
    else{
        var data = {ids:ids};
        $.ajax({
            url: "{{ route('messages.delete') }}",
            type: "POST",
            data: data,
            success: function(resp){
                if(resp=='success'){
                   window.location.reload();
                }                
            },
            error: function(resp){
                console.log('Something went wrong with request');
            }
        });
    }

    return false;
});


$('#chkParent').on("click", function() {
    var isChecked = $(this).prop("checked");
    $('.message-list .inboxParent').find('input[type="checkbox"]').prop('checked', isChecked);
});

$('.message-list .inboxParent').find('input[type="checkbox"]').on("click", function() {
    var isChecked = $(this).prop("checked");
    var isHeaderChecked = $("#chkParent").prop("checked");
    if (!isChecked && isHeaderChecked)
        $("#chkParent").prop('checked', isChecked);
    else {
        $('.message-list .inboxParent').find('input[type="checkbox"]').each(function() {
            if (!$(this).prop("checked"))
                isChecked = false;
        });
        $("#chkParent").prop('checked', isChecked);
    }
}); 
</script>
@endsection