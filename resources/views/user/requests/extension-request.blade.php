@extends('layouts.site')

@section('style') 
@endsection
@section('content')
<div class="pxp-content pull-content-down">
    <div class="container">
        <h2>Extension Date Request</h2>  
        <p>
            <strong>{{ Auth::user()->name }},</strong> bookings 
        </p>
        <div class="pt-4">
            <div class="row">
                <div class="col-sm-8">

                    <div class="card">
                        <div class="card-body">
                            <p class="font-14">
                                @php $image = empty($extension->user->image)? 'user.svg': 'users/'.$extension->user->image; @endphp
                                <img src="{{ asset('assets/images/'.$image) }}" alt="{{ $extension->user->name }}" class="thumb-sm rounded-circle mr-1" />
                                This booking request is from {{ $extension->user->name }}.
                            </p>
                            @php
                                if ($extension->visit->property->type_status == 'rent') {
                                    $from = \Carbon\Carbon::createFromFormat('Y-m-d', $extension->visit->check_out);
                                    $to = \Carbon\Carbon::createFromFormat('Y-m-d', $extension->extension_date);
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
                                }elseif ($extension->visit->property->type_status == 'short_stay') {
                                    $from=date_create($extension->visit->check_out);
                                    $to=date_create($extension->extension_date);
                                    $diff=date_diff($from,$to);
                                    $dateDiff = $diff->format("%a");
                                    $duration = ($dateDiff <= 1)? $dateDiff.' day':$dateDiff.' days';
                                }
                            @endphp
                            <span class="font-weight-500 ml-1">
                                {{ $extension->visit->property->propertyPrice->currency }}&nbsp;{{ number_format(($extension->visit->property->propertyPrice->property_price*$dateDiff),2) }} 
                                for {{ $duration }}
                            </span>
                        </div>    
                    </div>

                    <h5 class="text-primary">{{ $extension->visit->property->title }}</h5>
                    <div class="card">
                        <div class="card-body">
                            <span class="font-weight-500">Checked In</span>
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
                            @if ($extension->visit->property->type_status == 'short_stay')
                            <hr>
                            <span class="font-weight-500">Infant</span>
                            <span class="font-weight-500 text-primary float-right">{{ $extension->visit->infant }}</span>
                            @endif
                        </div>
                        @if ($extension->isPendingAttribute())
                        <div class="card-body text-center" id="actionBtn">
                            <button class="btn btn-success mr-2 btnConfirm" data-href="{{ route('requests.extension.confirm', $extension->id) }}"><i class="fa fa-check"></i> Confirm</button>
                            <button class="btn btn-danger ml-2 btnCancel" data-href="{{ route('requests.extension.cancel', $extension->id) }}"><i class="fa fa-times"></i> Cancel</button>
                        </div>
                        @elseif($extension->isConfirmAttribute())
                        <div class="text-center">
                            <span class="text-primary"><i class="fa fa-spin fa-spinner"></i> WAITING FOR PAYMENT...</span>
                        </div>
                        @elseif($extension->isRejectAttribute())
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