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
                        <li class="breadcrumb-item active">Extension Date Requests</li>
                    </ol>
                </div>
                <h4 class="page-title">Extension Date Requests</h4>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
    <!-- end page title end breadcrumb -->
   
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mt-lg-12 mb-3">Extension Date Requests</h4> 
                    
                    <br>

                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <p class="font-14">
                                    <img src="{{ asset('assets/images/users/'.$extension->user->image) }}" alt="{{ $extension->user->name }}" class="thumb-sm rounded-circle mr-1" />
                                    This booking request is from {{ $extension->user->name }}.
                                </p>
                                @php
                                    if ($extension->visit->property->type_status == 'rent') {
                                        $from = \Carbon\Carbon::createFromFormat('Y-m-d', $extension->visit->check_out);
                                        $to = \Carbon\Carbon::createFromFormat('Y-m-d', $extension->extension_date);
                                        $dateDiff = $to->diffInMonths($from);
                                    }
                                    $years = '';
                                    if($dateDiff >= 12){
                                        $y = $dateDiff/12;
                                        $m = $dateDiff%12;
                                        $year = ($y==1)? $y." year":$y." years";
                                        $month = ($m==1)? $m." month":$m." months";
                                        $years = $year.(($m==0)? '':$month);
                                    }else{
                                        $years = $dateDiff." months";
                                    }
                                @endphp
                                <span class="font-weight-500 ml-1">
                                    {{ $extension->visit->property->propertyPrice->currency }}&nbsp;{{ number_format(($extension->visit->property->propertyPrice->property_price*$dateDiff),2) }} 
                                    for {{ $years }}
                                </span>
                            </div>    
                        </div>

                        <h5 class="text-primary">{{ $extension->visit->property->title }}</h5>
                        <div class="card">
                            <div class="card-body">
                                <span class="font-weight-500">Check In</span>
                                <span class="font-weight-500 text-primary float-right">{{ \Carbon\Carbon::parse($extension->visit->check_in)->format('d-M-Y') }}</span>
                                <hr>
                                <span class="font-weight-500">Check Out</span>
                                <span class="font-weight-500 text-primary float-right">{{ \Carbon\Carbon::parse($extension->visit->check_out)->format('d-M-Y') }}</span>
                                <hr>
                                <span class="font-weight-500">Extended Date</span>
                                <span class="font-weight-500 text-danger float-right">{{ \Carbon\Carbon::parse($extension->extension_date)->format('d-M-Y') }}</span>
                                <hr>
                                <span class="text-primary">Guests</span>
                                <hr>
                                <span class="font-weight-500">Adult</span>
                                <span class="font-weight-500 text-primary float-right">{{ $extension->visit->adult }}</span>
                                <hr>
                                <span class="font-weight-500">Children</span>
                                <span class="font-weight-500 text-primary float-right">{{ $extension->visit->children }}</span>
                                <hr>
                                <span class="font-weight-500">Infant</span>
                                <span class="font-weight-500 text-primary float-right">{{ $extension->visit->infant }}</span>
                            </div>
                            @if ($extension->isPendingAttribute())
                            <div class="card-body text-center" id="actionBtn">
                                <button class="btn btn-success mr-2 btnConfirm" data-href="{{ route('requests.extension.confirm', $extension->id) }}"><i class="fa fa-check"></i> Confirm</button>
                                <button class="btn btn-danger ml-2 btnCancel" data-href="{{ route('requests.extension.cancel', $extension->id) }}"><i class="fa fa-times"></i> Cancel</button>
                            </div>
                            @elseif($extension->isConfirmAttribute())
                            <span class="text-primary"><i class="fa fa-spin fa-spinner"></i> WAITING FOR PAYMENT...</span>
                            @elseif($extension->isRejectAttribute())
                            <span class="text-danger">BOOKING REQUEST WAS CANCELLED BY OWNER</span>
                            @endif
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
    
    $(".btnConfirm").on("click", function(e){
        e.preventDefault();
        $this = $(this);
        swal({
            title: "Confirm",
            text: "You are about to confirm this request",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-primary btn-sm",
            cancelButtonClass: "btn-danger btn-sm",
            confirmButtonText: "Confirm",
            closeOnConfirm: true
            },
        function(){
            $this.html('<i class="fa fa-spinner fa-spin"></i> CONFIRMING REQUEST...').attr('disabled', true);
            $.ajax({
                url: $this.data('href'),
                type: "GET",
                success: function(resp){
                    if(resp=='success'){
                        $("#actionBtn").hide();
                    }else{
                        swal("Warning", resp, "warning");
                        $this.html('<i class="fa fa-check"></i> CONFIRM').attr('disabled', false);
                    }
                },
                error: function(resp){
                    alert("Something went wrong with request");
                }
            });
        });
        
        return false;
    });

    $(".btnCancel").on("click", function(e){
        e.preventDefault();
        $this = $(this);
        swal({
            title: "Confirm",
            text: "You are about to cancel this request",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-primary btn-sm",
            cancelButtonClass: "btn-danger btn-sm",
            confirmButtonText: "Confirm",
            closeOnConfirm: true
            },
        function(){
            $this.html('<i class="fa fa-spinner fa-spin"></i> CANCELLING REQUEST...').attr('disabled', true);
            $.ajax({
                url: $this.data('href'),
                type: "GET",
                success: function(resp){
                    if(resp=='success'){
                        $("#actionBtn").hide();
                    }else{
                        swal("Warning", resp, "warning");
                        $this.html('<i class="fa fa-times"></i> CANCEL').attr('disabled', false);
                    }
                },
                error: function(resp){
                    alert("Something went wrong with request");
                }
            });
        });
        
        return false;
    });
</script>
@endsection