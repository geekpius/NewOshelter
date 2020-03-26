@extends('layouts.host')

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
                <div class="">
                    <div class="btn-toolbar" role="toolbar">
                        <div class="btn-group">
                            <button type="button" onclick="window.location='{{route('host.messages')}}'" class="btn btn-gradient-secondary waves-light waves-effect"><i class="fas fa-inbox"></i></button>
                        </div>  
                        <div class="btn-group ml-1">
                            <button type="button" class="btn btn-gradient-secondary waves-light waves-effect"><i class="fas fa-trash"></i></button>
                        </div>                                      
                    </div><!-- end toolbar -->


                    <div class="card my-3">
                        <ul class="message-list">
                            <div class="inboxParent">
                                <li>                                           
                                    <div class="col-mail col-mail-1">
                                        <div class="checkbox-wrapper-mail">
                                            <input type="checkbox" id="chk19">
                                            <label for="chk19" class="toggle"></label>
                                        </div>
                                        <a href="javascript:void(0);" class="showReader">
                                            <p class="title">Peter, me (3)</p>
                                        </a>                                                     
                                    </div>
                                    <div class="col-mail col-mail-2">
                                        <a href="javascript:void(0);" class="subject showReader">Hello &nbsp;–&nbsp; <span class="teaser">Trip home from 🎉 Colombo has been arranged, then Jenna will come get me from Stockholm. :)</span>
                                        </a>
                                        <div class="date">Mar. 6</div>
                                    </div>                                           
                                </li>

                                <div class="card mt-3 myReader" style="display:none">
                                    <div class="card-body">
                                        <i class="fa fa-times float-right fa-lg exitReader" style="cursor: pointer"></i>
                                        <div class="media mb-4">
                                            <img class="d-flex mr-3 rounded-circle thumb-md" src="{{asset('assets/images/users/user-4.jpg')}}" alt="Generic placeholder image">
                                            <div class="media-body align-self-center">
                                                <h4 class="font-14 m-0">Humberto D. Champion</h4>
                                                <small class="text-muted">support@domain.com</small>
                                            </div>
                                        </div>
            
                                        <p>Dear Lorem Ipsum,</p>
                                        <p>Praesent dui ex, dapibus eget mauris ut, finibus vestibulum enim. Quisque arcu leo, facilisis in fringilla id, luctus in tortor. Nunc vestibulum est quis orci varius viverra. Curabitur dictum volutpat massa vulputate molestie. In at felis ac velit maximus
                                            convallis.</p>
                                        <p>Sed elementum turpis eu lorem interdum, 🏆sed porttitor eros commodo. Nam eu venenatis tortor, id lacinia diam. Sed aliquam in dui et porta. Sed bibendum orci non tincidunt ultrices. Vivamus fringilla, mi lacinia dapibus condimentum, ipsum urna lacinia
                                            lacus, vel tincidunt mi nibh sit amet lorem.</p>
                                        <p>Sincerly,</p>
                                        <hr/>
            
                                        <a href="javascript:void(0);" data-id="1" class="btn btn-gradient-primary waves-effect btnReply" data-animation="bounce">
                                            <i class="mdi mdi-reply"></i> Reply
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="inboxParent">
                                <li>                                            
                                    <div class="col-mail col-mail-1">
                                        <div class="checkbox-wrapper-mail">
                                            <input type="checkbox" id="chk18">
                                            <label for="chk18" class="toggle"></label>
                                        </div>
                                        <a href="javascript:void(0);" class="showReader">
                                            <p class="title">me, Susanna (11)</p>
                                        </a>
                                    </div>
                                    <div class="col-mail col-mail-2">
                                        <a href="javascript:void(0);" class="subject showReader">Train/Bus &nbsp;–&nbsp; <span class="teaser">Yes ok, great! I'm not stuck in Stockholm anymore, we're making progress.🏏</span>
                                        </a>
                                        <div class="date">Feb 19</div>
                                    </div>                                            
                                </li>

                                <div class="card mt-3 myReader" style="display:none">
                                    <div class="card-body">
                                        <i class="fa fa-times float-right fa-lg exitReader" style="cursor: pointer"></i>
                                        <div class="media mb-4">
                                            <img class="d-flex mr-3 rounded-circle thumb-md" src="{{asset('assets/images/users/user-4.jpg')}}" alt="Generic placeholder image">
                                            <div class="media-body align-self-center">
                                                <h4 class="font-14 m-0">Humberto D. Champion</h4>
                                                <small class="text-muted">support@domain.com</small>
                                            </div>
                                        </div>
            
                                        <p>Dear Lorem Ipsum,</p>
                                        <p>Praesent dui ex, dapibus eget mauris ut, finibus vestibulum enim. Quisque arcu leo, facilisis in fringilla id, luctus in tortor. Nunc vestibulum est quis orci varius viverra. Curabitur dictum volutpat massa vulputate molestie. In at felis ac velit maximus
                                            convallis.</p>
                                        <p>Sed elementum turpis eu lorem interdum, 🏆sed porttitor eros commodo. Nam eu venenatis tortor, id lacinia diam. Sed aliquam in dui et porta. Sed bibendum orci non tincidunt ultrices. Vivamus fringilla, mi lacinia dapibus condimentum, ipsum urna lacinia
                                            lacus, vel tincidunt mi nibh sit amet lorem.</p>
                                        <p>Sincerly,</p>
                                        <hr/>
            
                                        <a href="javascript:void(0);" data-id="2" class="btn btn-gradient-primary waves-effect btnReply" data-animation="bounce">
                                            <i class="mdi mdi-reply"></i> Reply
                                        </a>
                                    </div>
                                </div>
                            </div>
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
            url: "{{route('host.messages.reply')}}",
            type: "POST",
            data: data,
            success: function(resp){
                if(resp=='success'){
                    $('.exitReader').trigger();
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
</script>
@endsection