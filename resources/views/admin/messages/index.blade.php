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
                        <li class="breadcrumb-item active">Messages</li>
                    </ol>
                </div>
                <h4 class="page-title">Messages</h4>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
    <!-- end page title end breadcrumb -->
   
    <div class="card">
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-10">
                <!-- Right Sidebar -->
                <div class="pt-3">
                    <div class="btn-toolbar" role="toolbar">
                        <div class="btn-group">
                            <button type="button" onclick="window.location='{{route('messages')}}'" class="btn btn-gradient-secondary waves-light waves-effect"><i class="fas fa-inbox"></i></button>
                        </div>  
                        <div class="btn-group ml-1">  
                            <button type="button" class="btn btn-gradient-secondary waves-light waves-effect" id="chkParent1">
                                <input type="checkbox" id="chkParent">
                                <label for="chkParent" class="toggle"></label>
                            </button>
                        </div>  
                        <div class="btn-group ml-1">
                            <button type="button" class="btn btn-gradient-secondary waves-light waves-effect btnDeleteAll"><i class="fas fa-trash"></i></button>
                        </div>                                    
                    </div><!-- end toolbar -->


                    <div class="card my-3">
                        <ul class="message-list">
                        @if (count($messages))
                        @foreach ($messages as $message)
                            <div class="inboxParent">
                                <li>                                           
                                    <div class="col-mail col-mail-1">
                                        <div class="checkbox-wrapper-mail">
                                            <input type="checkbox" id="chk{{ $message->id }}" value="{{ $message->id }}">
                                            <label for="chk{{ $message->id }}" class="toggle"></label>
                                        </div>
                                        <a href="javascript:void(0);" class="showReader" data-href="{{ route('messages.read', $message->id) }}">
                                            <p class="title">{{ $message->user->name }}</p>
                                        </a>                                                     
                                    </div>
                                    <div class="col-mail col-mail-2">
                                        <a href="javascript:void(0);" class="subject showReader" data-href="{{ route('messages.read', $message->id) }}"><span>{{ $message->message }}</span></a>
                                        <div class="date">{{ \Carbon\Carbon::parse($message->created_at)->format("d-M-Y") }}</div><br>
                                    </div>                                           
                                </li>

                                <div class="card mt-3 myReader" style="display:none">
                                    <div class="card-body">
                                        <i class="fa fa-times float-right fa-lg exitReader" style="cursor: pointer"></i>
                                        <div class="media mb-4">
                                            <img class="d-flex mr-3 rounded-circle thumb-md" src="{{ empty($message->user->image)? asset('assets/images/user.jpg'):asset('assets/images/users/'.$message->user->image) }}" alt="Generic placeholder image">
                                            <div class="media-body align-self-center">
                                                <h4 class="font-14 m-0">{{ $message->user->name }}</h4>
                                                <small class="text-muted">{{ $message->user->membership }}</small>
                                            </div>
                                        </div>
            
                                        <p>Dear {{ current(explode(' ',$message->user->name)) }},</p>
                                        <p>{{ $message->message }}</p>
                                        <hr/>

                                        @foreach ($message->replies as $reply)
                                            @if ($reply->status)
                                                <p>{{ $reply->message }}</p>
                                                <small>{{ $message->user->name }}</small>
                                                <hr/>
                                            @else
                                                <div class="pl-5">
                                                    <p>{{ $reply->message }}</p>
                                                    <small>Me</small>
                                                </div>
                                                <hr/>
                                            @endif
                                        @endforeach
                                        <div class="pl-5 myReplies" style="display:none"></div>
                                        
                                        <a href="javascript:void(0);" data-id="{{ $message->id }}" class="btn btn-gradient-primary waves-effect btnReply" data-animation="bounce">
                                            <i class="mdi mdi-reply"></i> Reply
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        @else
                            <div class="text-center m-5">
                                <p class="text-danger">Empty</p>
                            </div>
                        @endif
                        </ul>
                    </div> <!-- panel -->


                    <div class="row mb-3">
                        <div class="col-7 align-self-center">
                            Showing 1 - 20 of 100
                        </div><!-- end Col -->
                        <div class="col-5">
                            <div class="btn-group float-right">
                                <button type="button" class="btn btn-sm btn-gradient-primary waves-effect mb-0"><i class="fa fa-chevron-left"></i></button>
                                <button type="button" class="btn btn-sm btn-gradient-primary waves-effect mb-0"><i class="fa fa-chevron-right"></i></button>
                            </div>
                        </div><!-- end Col -->
                    </div> <!--end row-->   
                </div> <!-- end email-rightbar -->
            </div><!-- end Col -->
        </div><!-- End row -->
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
                    <div class="card mb-0 p-3">
                        <form id="formReply">
                            <input type="hidden" name="message_id" id="message_id" readonly>
                            <div class="form-group mb-3 validate">
                                <textarea name="message" id="reply_message" cols="30" rows="5" class="form-control"></textarea>
                                <span class="small text-danger mySpan"></span>
                            </div><!--end form-group-->
                            <div class="btn-toolbar form-group mb-0">
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-gradient-primary waves-effect waves-light btnSendReply">Send <i class="far fa-paper-plane ml-3"></i></button>                                                
                                </div>
                            </div><!--end form-group-->
                        </form><!--end form-->
                    </div><!--end card-->
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    
</div><!-- container -->

@endsection

@section('scripts')
<script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
    }
})

$(".showReader").on("click", function(e){
    e.preventDefault();
    e.stopPropagation();
    var $this = $(this);
    $this.parents('.inboxParent').find('.myReader').show();
    $this.parents('.inboxParent').nextAll().hide();
    $this.parents('.inboxParent').prevAll().hide();
    $.ajax({
        url: $this.data('href'),
        type: "GET",
        success: function(resp){
            if(resp=='success'){
                //
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
                    $(".myReplies").show().html("<p>"+$("#reply_message").val()+"</p><small>Me</small><hr>");
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
    $('.message-list .checkbox-wrapper-mail').find('input[type="checkbox"]').each(function() {
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
    $('.message-list .checkbox-wrapper-mail').find('input[type="checkbox"]').prop('checked', isChecked);
});
$('.message-list .checkbox-wrapper-mail').find('input[type="checkbox"]').on("click", function() {
    var isChecked = $(this).prop("checked");
    var isHeaderChecked = $("#chkParent").prop("checked");
    if (!isChecked && isHeaderChecked)
        $("#chkParent").prop('checked', isChecked);
    else {
        $('.message-list .checkbox-wrapper-mail').find('input[type="checkbox"]').each(function() {
            if (!$(this).prop("checked"))
                isChecked = false;
        });
        $("#chkParent").prop('checked', isChecked);
    }
}); 

</script>
@endsection