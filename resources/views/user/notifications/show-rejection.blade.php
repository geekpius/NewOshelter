@extends('layouts.site')

@section('style')

@endsection
@section('content')
<div class="pxp-content pull-content-down">
    <div class="container">
        <h2>Rejected Reason</h2>
        <p>
            <strong>{{ Auth::user()->name }},</strong> reasons
        </p>
        <div class="pt-4">
            <div class="row">
                <div class="col-sm-8">

                    <h5 class="text-primary ml-2">{{ $rejection->rejectedReasonType() }}</h5>
                    <div class="card">
                        <div class="card-body">
                            <span class="font-weight-500">External ID</span>
                            <span class="font-weight-500 text-primary float-right">{{ $rejection->external_id }}</span>
                            <hr>
                            <span class="font-weight-500">Type</span>
                            <span class="font-weight-500 text-primary float-right">{{ $rejection->rejectedReasonType() }}</span>
                            <hr>
                            <span class="font-weight-500">Type Detail</span>
                            <span class="font-weight-500 text-primary float-right">{{ ucfirst($rejection->rejectedReasonTypeDetail()) }}</span>
                            <hr>
                            <span class="font-weight-500">Reason</span>
                            <span class="font-weight-500 text-primary float-right">{{ ucfirst($rejection->reason) }}</span>
                            <hr>
                            @if($rejection->isPropertyRejection())
                                <a href="{{ route('property.edit', $rejection->rejectable->id) }}" class="btn btn-link btn-sm" style="background-color: #00A2E5 !important; color: #FFFFFF !important; text-underline: none !important;">Want to correct?</a>
                                <hr>
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
                    console.log("Something went wrong with request");
                }
            });
        });

        return false;
    });
</script>
@endsection
