@extends('layouts.site')

@section('style')

@endsection
@section('content')
<div class="pxp-content pull-content-down">
    <div class="container">
        <h2>Hostel Booking Request</h2>  
        <p>
            <strong>{{ Auth::user()->name }},</strong> bookings 
        </p>
        <div class="pt-4">
            <div class="row">
                <div class="col-sm-8">
                    <div class="card">
                        <div class="card-body">
                            <p class="font-14">
                                @php $image = empty($booking->user->image)? 'user.svg': 'users/'.$booking->user->image; @endphp
                                <img src="{{ asset('assets/images/'.$image) }}" alt="{{ $booking->user->name }}" class="thumb-sm rounded-circle mr-1" />
                                This booking request is from {{ current(explode(' ',$booking->user->name))}}.
                            </p>
                            @php
                                $from = \Carbon\Carbon::createFromFormat('Y-m-d', $booking->check_in);
                                $to = \Carbon\Carbon::createFromFormat('Y-m-d', $booking->check_out);
                                $dateDiff = $to->diffInMonths($from);
                                $years = '';
                                if($dateDiff >= 12){
                                    $y = $dateDiff/12;
                                    $m = $dateDiff%12;
                                    $year = ($y==1)? $y." year":$y." years";
                                    $month = ($m<=1)? $m." month":$m." months";
                                    $years = $year.(($m==0)? '':$month);
                                }else{
                                    $years = $dateDiff." months";
                                }
                            @endphp
                            <span class="font-weight-500 ml-1">
                                {{ $booking->hostelBlockRoomNumber->hostelBlockRoom->propertyHostelPrice->currency }}&nbsp;{{ number_format(($booking->hostelBlockRoomNumber->hostelBlockRoom->propertyHostelPrice->property_price*$dateDiff),2) }} 
                                for {{ $years }}
                            </span>
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
                            <span class="font-weight-500">Block Name</span>
                            <span class="font-weight-500 text-primary float-right">{{ $booking->hostelBlockRoomNumber->hostelBlockRoom->propertyHostelBlock->block_name }}</span>
                            <hr>
                            <span class="font-weight-500">Room Type</span>
                            <span class="font-weight-500 text-primary float-right">{{ $booking->hostelBlockRoomNumber->hostelBlockRoom->block_room_type }}</span>
                            <hr>
                            <span class="font-weight-500">Room Number</span>
                            <span class="font-weight-500 text-primary float-right">{{ $booking->room_number }}</span>
                        </div>
                        @if ($booking->isPendingAttribute())
                        <div class="card-body text-center" id="actionBtn">
                            <button class="btn btn-success mr-2 btnConfirm" data-url="{{ route('requests.comfirm.hostel', $booking->id) }}"><i class="fa fa-check"></i> Confirm</button>
                            <button class="btn btn-danger ml-2 btnCancel" data-url="{{ route('requests.cancel.hostel', $booking->id) }}"><i class="fa fa-times"></i> Cancel</button>
                        </div>
                        @elseif($booking->isConfirmAttribute())
                        <div class="text-center">
                            <span class="text-primary"><i class="fa fa-spin fa-spinner"></i> WAITING FOR PAYMENT...</span>
                        </div>
                        @elseif($booking->isRejectAttribute())
                        <div class="text-center">
                            <span class="text-danger">BOOKING REQUEST WAS CANCELLED BY OWNER</span>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>    
</div>
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
                url: $this.data('url'),
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
                url: $this.data('url'),
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