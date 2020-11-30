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
                        <li class="breadcrumb-item active">Booking Requests</li>
                    </ol>
                </div>
                <h4 class="page-title">Booking Requests</h4>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
    <!-- end page title end breadcrumb -->
   
    <div class="card">
        
        <div class="row">
          
            <div class="col-sm-12">

                <div class="card-body pt-12">

                    <h4 class="header-title mt-lg-12 mb-3">Booking Requests</h4> 
                    
                    <br>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="card-body">
                                        <p class="font-14">
                                            @php $image = empty($booking->user->image)? 'user.svg': 'users/'.$booking->user->image; @endphp
                                            <img src="{{ asset('assets/images/'.$image) }}" alt="{{ $booking->user->name }}" class="thumb-sm rounded-circle mr-1" />
                                            This booking request is from {{ current(explode(' ',$booking->user->name))}}.
                                        </p>
                                        @php
                                            if ($booking->property->type_status == 'rent') {
                                                $from = \Carbon\Carbon::createFromFormat('Y-m-d', $booking->check_in);
                                                $to = \Carbon\Carbon::createFromFormat('Y-m-d', $booking->check_out);
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
                                            {{ $booking->property->propertyPrice->currency }}&nbsp;{{ number_format(($booking->property->propertyPrice->property_price*$dateDiff),2) }} 
                                            for {{ $years }}
                                        </span>
                                    </div>       
                                </div> 
                                <div class="col-sm-4">
                                    <div class="text-center">ID CARD</div>
                                    <div class="flip-box" style="height: 80px !important; width: 130px !important">
                                        <div class="flip-box-inner">
                                            <div class="text-center mt-2 flip-box-front">
                                                <img src="{{ asset('assets/images/cards/'.$booking->user->profile->id_front) }}" alt="ID Card Front" class="front_card" style="width:130px; height:80px; border-radius:2%" />
                                            </div>
                                            <div class="flip-box-back">
                                                <img src="{{ asset('assets/images/cards/'.$booking->user->profile->id_back) }}" alt="ID Card Front" class="back_card" style="width:130px; height:80px; border-radius:2%" />
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <h5 class="text-primary">{{ $booking->property->title }}</h5>
                        <div class="card">
                            <div class="card-body">
                                <span class="font-weight-500">Check In</span>
                                <span class="font-weight-500 text-primary float-right">{{ \Carbon\Carbon::parse($booking->check_in)->format('d-M-Y') }}</span>
                                <hr>
                                <span class="font-weight-500">Check Out</span>
                                <span class="font-weight-500 text-primary float-right">{{ \Carbon\Carbon::parse($booking->check_out)->format('d-M-Y') }}</span>
                                <hr>
                                <span class="text-primary">Guests</span>
                                <hr>
                                <span class="font-weight-500">Adult</span>
                                <span class="font-weight-500 text-primary float-right">{{ $booking->adult }}</span>
                                <hr>
                                <span class="font-weight-500">Children</span>
                                <span class="font-weight-500 text-primary float-right">{{ $booking->children }}</span>
                                <hr>
                                <span class="font-weight-500">Infant</span>
                                <span class="font-weight-500 text-primary float-right">{{ $booking->infant }}</span>
                            </div>
                            @if ($booking->isPendingAttribute())
                            <div class="card-body text-center" id="actionBtn">
                                <button class="btn btn-success mr-2 btnConfirm" data-href="{{ route('requests.comfirm', $booking->id) }}"><i class="fa fa-check"></i> Confirm</button>
                                <button class="btn btn-danger ml-2 btnCancel" data-href="{{ route('requests.cancel', $booking->id) }}"><i class="fa fa-times"></i> Cancel</button>
                            </div>
                            @elseif($booking->isConfirmAttribute())
                            <span class="text-primary"><i class="fa fa-spin fa-spinner"></i> WAITING FOR PAYMENT...</span>
                            @elseif($booking->isRejectAttribute())
                            <span class="text-danger">BOOKING REQUEST WAS CANCELLED BY OWNER</span>
                            @endif
                        </div>
                    </div>


                </div><!--end card-body--> 
                
            </div><!--end col--> 
            <div class="col-sm-3"></div>                    
        </div><!-- End row -->
    </div>

</div><!-- container -->

@endsection

@section('scripts')
<script>
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