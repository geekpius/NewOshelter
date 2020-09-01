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
                        <li class="breadcrumb-item active">Extension Date Request</li>
                    </ol>
                </div>
                <h4 class="page-title">Extension Date Request</h4>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
    <!-- end page title end breadcrumb -->
   
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-8 offset-sm-2">
                            <div class="card">
                                <div class="blog-card p-4">
                                    <div>
                                        <span class="font-weight-500">Tenant</span>
                                        <span class="font-weight-500 text-primary float-right">{{ $extension->user->name }}</span>
                                    </div>
                                    <div class="mt-5">
                                        <span class="font-weight-500">Property</span>
                                        <span class="font-weight-500 text-primary float-right">{{ $extension->visit->property->title }}</span>
                                    </div>
                                    <div class="mt-5">
                                        <span class="font-weight-500">Check In</span>
                                        <span class="font-weight-500 text-primary float-right">{{ \Carbon\Carbon::parse($extension->visit->check_in)->format('d-M-Y') }}</span>
                                    </div>
                                    <div class="mt-5">
                                        <span class="font-weight-500">Check Out</span>
                                        <span class="font-weight-500 text-primary float-right">{{ \Carbon\Carbon::parse($extension->visit->check_out)->format('d-M-Y') }}</span>
                                    </div>
                                    <div class="mt-5">
                                        <span class="font-weight-500">Extended Date</span>
                                        <span class="font-weight-500 text-pink float-right">{{ \Carbon\Carbon::parse($extension->extension_date)->format('d-M-Y') }}</span>
                                    </div>
                                    <div class="mt-5 text-center">
                                       @if ($extension->is_confirm == 0 )
                                       <button type="button" class="btn btn-gradient-success btnApprove" data-url="{{ route('visits.extension.request.approve', $extension->id) }}"><i class="fa fa-check-circle"></i> APPROVE</button>
                                       &nbsp;&nbsp;
                                       <button type="button" class="btn btn-gradient-danger btnDecline" data-url="{{ route('visits.extension.request.decline', $extension->id) }}"><i class="fa fa-times-circle"></i> DECLINE</button>
                                       @endif
                                    </div>
                                </div>
                            </div><!--end blog-card-->
                        </div>

                    </div>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

</div><!-- container -->

@endsection

@section('scripts')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
        }
    })

    $(".btnApprove").on("click", function(){
        var $this = $(this);
        if(confirm("Sure to approve this request?")){
            $.ajax({
                url: $this.data('url'),
                type: "POST",
                success: function(resp){
                    if(resp=='success'){
                        $this.hide();
                        $(".btnDecline").hide();
                    }else{
                        alert(resp);
                    }
                },
                error: function(resp){
                    console.log(resp);
                }
            });
        }
        return false;
    });

    $(".btnDecline").on("click", function(){
        var $this = $(this);
        if(confirm("Sure to decline this request?")){
            $.ajax({
                url: $this.data('url'),
                type: "POST",
                success: function(resp){
                    if(resp=='success'){
                        $this.hide();
                        $(".btnApprove").hide();
                    }else{
                        alert(resp);
                    }
                },
                error: function(resp){
                    console.log(resp);
                }
            });
        }
        return false;
    });
</script>
@endsection