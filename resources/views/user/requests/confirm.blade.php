@extends('layouts.site')

@section('style')

@endsection
@section('content')
<div class="pxp-content pull-content-down">
    <div class="container">
        <h2>Booking Request</h2>  
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
                                if ($booking->property->type_status == 'rent') {
                                    $from = \Carbon\Carbon::createFromFormat('Y-m-d', $booking->check_in);
                                    $to = \Carbon\Carbon::createFromFormat('Y-m-d', $booking->check_out);
                                    $dateDiff = $to->diffInMonths($from);
                                    $duration = '';
                                    if($dateDiff >= 12){
                                        $y = $dateDiff/12;
                                        $m = $dateDiff%12;
                                        $year = ($y==1)? $y." year":$y." years";
                                        $month = ($m==1)? $m." month":$m." months";
                                        $duration = $year.(($m==0)? '':$month);
                                    }else{
                                        $duration = $dateDiff." months";
                                    }
                                }
                                elseif ($booking->property->type_status == 'short_stay') {
                                    $from=date_create($booking->check_in);
                                    $to=date_create($booking->check_out);
                                    $diff=date_diff($from,$to);
                                    $dateDiff = $diff->format("%a");
                                    $duration = ($dateDiff <= 1)? $dateDiff.' day':$dateDiff.' days';
                                }
                            @endphp
                            <span class="font-weight-500 ml-1">
                                {{ $booking->property->propertyPrice->currency }}&nbsp;{{ number_format(($booking->property->propertyPrice->property_price*$dateDiff),2) }} 
                                for {{ $duration  }}
                            </span>
                        </div>  
                    </div>
                    @if(!Auth::user()->is_id_verified)
                    <div class="row mb-5">
                        <div class="col-sm-4">
                            <div class="text-center mt-2">
                                <img src="{{ asset('assets/images/card-sample.png') }}" alt="ID Card Front" class="front_card" width="200" height="170" style="border-radius:2%" />
                            </div>
                            <div class="text-center mt-3">
                                <p class="font-13"><span class="text-primary">Status:</span> {{ empty(Auth::user()->profile->id_type)? 'No card type selected':'Oshelter is checking ID card...' }}</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <h6 class="font-weight-bold">CARD SAMPLE</h6>
                            <p>ID card type: <span class="text-primary">National ID</span></p>
                            <p>ID card type: <span class="text-primary">GHA-0123456789-0</span></p>
                            <p class="mt-3">
                                Seeing this information means you haven't updated your government approved card info. 
                                <a target="_blank" href="{{ route('account.info') }}">Update your government approved card info here</a>
                            </p>
                        </div>
                    </div><!-- end row --> 
                    @else
                    <h5 class="text-primary ml-2">{{ $booking->property->title }}</h5>
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
                            @if ($booking->property->type_status == 'short_stay')
                            <hr>
                            <span class="font-weight-500">Infant</span>
                            <span class="font-weight-500 text-primary float-right">{{ $booking->infant }}</span>
                            @endif
                        </div>
                        @if ($booking->isPendingAttribute())
                        <div class="card-body text-center" id="actionBtn">
                            <button class="btn btn-success mr-2 btnConfirm" data-url="{{ route('requests.comfirm', $booking->id) }}"><i class="fa fa-check"></i> Confirm</button>
                            <button class="btn btn-danger ml-2 btnCancel" data-url="{{ route('requests.cancel', $booking->id) }}"><i class="fa fa-times"></i> Cancel</button>
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
                    @endif
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
                    console.log("Something went wrong with request");
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
                    console.log("Something went wrong with request");
                }
            });
        });
        
        return false;
    });
</script>
@endsection