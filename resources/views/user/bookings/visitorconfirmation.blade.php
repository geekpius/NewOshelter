@extends('layouts.site')

@section('style') 
<!-- DataTables -->
<link href="{{asset('assets/plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="pxp-content pull-content-down">
    <div class="container">
        <h2>My Stay Confirmations</h2>  
        <p>
            <strong>{{ Auth::user()->name }},</strong> account owner 
        </p>
        <div class="pt-4">
            <div class="row">
                <div class="col-sm-12 mb-3">
                    <a class="text-decoration-none" href="{{ route('account.requests') }}">&lt;Back</a>
                </div>
                <div class="col-sm-12">
                    <div class="card card-bordered-blue">
                        <div class="card-body">
                            <div class="table-responsive" id="residenceTable">
                                <table id="datatable" class="table table-striped small">
                                    <thead class="thead-light">
                                    <tr>                                        
                                        <th>Paid At</th>
                                        <th>Property</th>
                                        <th>Owner</th>
                                        <th>Check In</th>
                                        <th>Check Out</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                        @foreach (Auth::user()->userTransactions->where('property_type', '!=', 'extension_request') as $trans)
                                        <tr class="record">
                                            <td>{{ \Carbon\Carbon::parse($trans->created_at)->diffForHumans() }}</td>
                                            <td>
                                                @if ($trans->property_type == 'hostel')
                                                    {{ $trans->bookingTransaction->hostelBooking->property->title }}
                                                @else
                                                    {{ $trans->bookingTransaction->booking->property->title }}
                                                @endif
                                            </td>
                                            @php $image = (empty($trans->owner->image))? 'user.svg':'users/'.$trans->owner->image; @endphp
                                            <td><img src="{{ asset('assets/images/'.$image) }}" alt="{{ $trans->owner->name }}" class="thumb-sm rounded-circle mr-2">{{ $trans->owner->name }}</td>
                                            <td>
                                                @if ($trans->property_type == 'hostel')
                                                    {{ \Carbon\Carbon::parse($trans->bookingTransaction->hostelBooking->check_in)->format('d-M-Y') }}
                                                @else
                                                    {{ \Carbon\Carbon::parse($trans->bookingTransaction->booking->check_in)->format('d-M-Y') }}
                                                @endif
                                            </td>
                                            <td>
                                                @if ($trans->property_type == 'hostel')
                                                    {{ \Carbon\Carbon::parse($trans->bookingTransaction->hostelBooking->check_out)->format('d-M-Y') }}
                                                @else
                                                    {{ \Carbon\Carbon::parse($trans->bookingTransaction->booking->check_out)->format('d-M-Y') }}
                                                @endif
                                            </td>
                                            <td>
                                                @if ($trans->property_type == 'hostel')
                                                    {{-- @if ($trans->bookingTransaction->hostelBooking->check_in <= \Carbon\Carbon::today())
                                                        @if ($trans->confirmation)
                                                            @if ($trans->confirmation->status)
                                                            <span class="text-success"><i class="fa fa-check-circle"></i> Confirmed</span>
                                                            @else
                                                            <span class="text-danger"><i class="fa fa-times-circle"></i> Cancelled</span>
                                                            @endif
                                                        @else
                                                            <a href="{{ route('property.visitor.confirmations.yes', Auth::user()->id) }}" data-token="{{ csrf_token() }}" data-transaction="{{ $trans->id }}" data-owner="{{ $trans->bookingTransaction->hostelBooking->owner_id }}" data-visit="{{ $trans->bookingTransaction->hostelBooking->userHostelVisit->id }}" data-type="{{ $trans->property_type }}" class="btnConfirm mr-4 text-decoration-none text-success" title="Confirm your stay">
                                                                <i class="fas fa-check-circle font-16"></i>
                                                            </a>
                                                            <a href="{{ route('property.visitor.confirmations.no', Auth::user()->id) }}" data-token="{{ csrf_token() }}" data-transaction="{{ $trans->id }}" data-owner="{{ $trans->bookingTransaction->hostelBooking->owner_id }}" data-visit="{{ $trans->bookingTransaction->hostelBooking->userHostelVisit->id }}" data-type="{{ $trans->property_type }}" class="text-decoration-none btnReject text-danger" title="Cancel your stay">
                                                                <i class="fas fa-times-circle font-16"></i>
                                                            </a> 
                                                        @endif
                                                    @else
                                                        <span class="text-danger"><i class="fa fa-spin fa-spinner"></i> Not yet checked in</span>
                                                    @endif --}}
                                                    @if ($trans->confirmation)
                                                        @if ($trans->confirmation->status)
                                                        <span class="text-success"><i class="fa fa-check-circle"></i> Confirmed</span>
                                                        @else
                                                        <span class="text-danger"><i class="fa fa-times-circle"></i> Cancelled</span>
                                                        @endif
                                                    @else
                                                        <a href="{{ route('property.visitor.confirmations.yes', Auth::user()->id) }}" data-token="{{ csrf_token() }}" data-transaction="{{ $trans->id }}" data-owner="{{ $trans->bookingTransaction->hostelBooking->owner_id }}" data-visit="{{ $trans->bookingTransaction->hostelBooking->userHostelVisit->id }}" data-type="{{ $trans->property_type }}" class="btnConfirm mr-4 text-decoration-none text-success" title="Confirm your stay">
                                                            <i class="fas fa-check-circle font-16"></i>
                                                        </a>
                                                        <a href="{{ route('property.visitor.confirmations.no', Auth::user()->id) }}" data-token="{{ csrf_token() }}" data-transaction="{{ $trans->id }}" data-owner="{{ $trans->bookingTransaction->hostelBooking->owner_id }}" data-visit="{{ $trans->bookingTransaction->hostelBooking->userHostelVisit->id }}" data-type="{{ $trans->property_type }}" class="text-decoration-none btnReject text-danger" title="Cancel your stay">
                                                            <i class="fas fa-times-circle font-16"></i>
                                                        </a> 
                                                    @endif
                                                @else
                                                    {{-- @if ($trans->bookingTransaction->booking->check_in <= \Carbon\Carbon::today())
                                                        @if ($trans->confirmation)
                                                            @if ($trans->confirmation->status)
                                                            <span class="text-success"><i class="fa fa-check-circle"></i> Confirmed</span>
                                                            @else
                                                            <span class="text-danger"><i class="fa fa-times-circle"></i> Cancelled</span>
                                                            @endif
                                                        @else
                                                            <a href="{{ route('property.visitor.confirmations.yes', Auth::user()->id) }}" data-token="{{ csrf_token() }}" data-transaction="{{ $trans->id }}" data-owner="{{ $trans->bookingTransaction->booking->owner_id }}" data-visit="{{ $trans->bookingTransaction->booking->userVisit->id }}" data-type="{{ $trans->property_type }}" class="btnConfirm mr-4 text-decoration-none text-success" title="Confirm your stay">
                                                                <i class="fas fa-check-circle font-16"></i>
                                                            </a>
                                                            <a href="{{ route('property.visitor.confirmations.no', Auth::user()->id) }}" data-token="{{ csrf_token() }}" data-transaction="{{ $trans->id }}" data-owner="{{ $trans->bookingTransaction->booking->owner_id }}" data-visit="{{ $trans->bookingTransaction->booking->userVisit->id }}" data-type="{{ $trans->property_type }}" class="text-decoration-none btnReject text-danger" title="Cancel your stay">
                                                                <i class="fas fa-times-circle font-16"></i>
                                                            </a> 
                                                        @endif
                                                    @else
                                                        <span class="text-danger"><i class="fa fa-spin fa-spinner"></i> Not yet checked in</span>
                                                    @endif --}}
                                                    @if ($trans->confirmation)
                                                        @if ($trans->confirmation->status)
                                                        <span class="text-success"><i class="fa fa-check-circle"></i> Confirmed</span>
                                                        @else
                                                        <span class="text-danger"><i class="fa fa-times-circle"></i> Cancelled</span>
                                                        @endif
                                                    @else
                                                        <a href="{{ route('property.visitor.confirmations.yes', Auth::user()->id) }}" data-token="{{ csrf_token() }}" data-transaction="{{ $trans->id }}" data-owner="{{ $trans->bookingTransaction->booking->owner_id }}" data-visit="{{ $trans->bookingTransaction->booking->userVisit->id }}" data-type="{{ $trans->property_type }}" class="btnConfirm mr-4 text-decoration-none text-success" title="Confirm your stay">
                                                            <i class="fas fa-check-circle font-16"></i>
                                                        </a>
                                                        <a href="{{ route('property.visitor.confirmations.no', Auth::user()->id) }}" data-token="{{ csrf_token() }}" data-transaction="{{ $trans->id }}" data-owner="{{ $trans->bookingTransaction->booking->owner_id }}" data-visit="{{ $trans->bookingTransaction->booking->userVisit->id }}" data-type="{{ $trans->property_type }}" class="text-decoration-none btnReject text-danger" title="Cancel your stay">
                                                            <i class="fas fa-times-circle font-16"></i>
                                                        </a> 
                                                    @endif
                                                @endif
                                            </td>
                                        </tr><!--end tr-->   
                                        @endforeach                                                                                
                                    </tbody>
                                </table>  
                            </div> 
                            <div class="mt-2">
                                <p class="font-13">
                                    <span class="text-danger">Note:</span> You are oblige as visitor to either <i class="fas fa-check-circle text-success"></i> confirm your stay or 
                                    <i class="fas fa-times-circle text-danger"></i> cancel your stay. Confirming your stay means you have given the right for owner to cashout.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</div>

<!-- id modal -->
<div id="reasonModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="reasonModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title font-13 text-primary text-uppercase">Cancellation Reason</h6>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form action="#" id="frmReason">
                <div class="modal-body"> 
                    @csrf
                    <input type="hidden" readonly name="owner_id">
                    <input type="hidden" readonly name="visit_id">
                    <input type="hidden" readonly name="transaction_id">
                    <input type="hidden" readonly name="type">
                    <div class="form-group validate">
                        <label for="">Write your reason</label>
                        <textarea name="reason" rows="3" maxlength="100" class="form-control"></textarea>
                        <span class="text-danger small mySpan" role="alert"></span>
                    </div>  
                    <div class="form-group validate">
                        <button class="btn btn-sm btn-primary btnSubmit float-right">Submit</button>
                    </div> 
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal --> 

@endsection

@section('scripts')
<script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script>
$('#datatable').DataTable();

$("#datatable tbody").on("click", ".btnConfirm", function(){
    var $this = $(this);
    swal({
        title: "Confirm",
        text: "You are about to confirm your stay",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-primary btn-sm",
        cancelButtonClass: "btn-danger btn-sm",
        confirmButtonText: "Confirm",
        closeOnConfirm: true
        },
    function(){
        $this.addClass('disabled');
        $("#datatable tbody .btnReject").addClass('disabled');
        let data = {
            _token: $this.data('token'),
            owner_id: $this.data('owner'),
            visit_id: $this.data('visit'),
            transaction_id: $this.data('transaction'),
            type: $this.data('type'),
        }
        $.ajax({
            url: $this.attr('href'),
            type: "POST",
            data: data,
            success: function(resp){
                if(resp=='success'){
                    swal("Cofirmed", "You have confirmed your stay.\nOwner can have access to payment", "success");
                    $this.parents('.record').find('td').eq(5).html('<span class="text-success"><i class="fa fa-check-circle"></i> Confirmed</span>');
                }else{
                    swal("Warning", resp, "warning");
                    $this.removeClass('disabled');
                    $("#datatable tbody .btnReject").removeClass('disabled');
                }
            },
            error: function(resp){
                console.log("Something went wrong with request");
                $this.removeClass('disabled');
                $("#datatable tbody .btnReject").removeClass('disabled');
            }
        });
    });
    return false;
});

$("#datatable tbody").on("click", ".btnReject", function(){
    var $this = $(this);
    $('#frmReason input[name="owner_id"]').val($this.data('owner'));
    $('#frmReason input[name="visit_id"]').val($this.data('visit'));
    $('#frmReason input[name="transaction_id"]').val($this.data('transaction'));
    $('#frmReason input[name="type"]').val($this.data('type'));
    $('#frmReason').attr("action", $this.attr('href'));
    $('#reasonModal').modal('show');
    // swal({
    //     title: "Confirm",
    //     text: "You are about to cancel your stay",
    //     type: "warning",
    //     showCancelButton: true,
    //     confirmButtonClass: "btn-primary btn-sm",
    //     cancelButtonClass: "btn-danger btn-sm",
    //     confirmButtonText: "Confirm",
    //     closeOnConfirm: true
    //     },
    // function(){
    //     $this.addClass('disabled');
    //     $("#datatable tbody .btnConfirm").addClass('disabled');
    //     let data = {
    //         _token: $this.data('token'),
    //         owner_id: $this.data('owner'),
    //         visit_id: $this.data('visit'),
    //         transaction_id: $this.data('transaction'),
    //         type: $this.data('type'),
    //     }
    //     $.ajax({
    //         url: $this.attr('href'),
    //         type: "POST",
    //         data: data,
    //         success: function(resp){
    //             if(resp=='success'){
    //                 swal("Cancelled", "You have cancelled your stay.\nOwner do not have access to payment.\nService fee will be deducted.", "success");
    //                 $this.parents('.record').find('td').eq(5).html('<span class="text-danger"><i class="fa fa-times-circle"></i> Cancelled</span>');
    //             }else{
    //                 swal("Warning", resp, "warning");
    //                 $this.removeClass('disabled');
    //                 $("#datatable tbody .btnConfirm").removeClass('disabled');
    //             }
    //         },
    //         error: function(resp){
    //             $this.removeClass('disabled');
    //             $("#datatable tbody .btnConfirm").removeClass('disabled');
    //             console.log("Something went wrong with request");
    //         }
    //     });
    // });
    return false;
});

$("#frmReason").on("submit", function(e){
    e.preventDefault();
    e.stopPropagation();
    var $this = $(this);
    var valid = true;
    $('#frmReason textarea').each(function() {
        var $this = $(this);
        
        if(!$this.val()) {
            valid = false;
            $this.parents('.validate').find('span').text('The '+$this.attr('name').replace(/[\_]+/g, ' ')+' field is required');
        }
    });

    if(valid){
        let data = $this.serialize();
        $("#frmReason .btnSubmit").html('<i class="fa fa-spinner fa-spin"></i> Submitting...').attr('disabled', true);
        $.ajax({
            url: $this.attr('action'),
            type: "POST",
            data: data,
            success: function(resp){
                if(resp == 'success'){
                    swal({
                        title: "Cancelled",
                        text: "You have cancelled your stay.\nOwner do not have access to payment.\nService fee will be deducted.",
                        type: "success",
                        confirmButtonClass: "btn-primary btn-sm",
                        confirmButtonText: "Okay",
                        closeOnConfirm: true
                        },
                    function(){
                        window.location.reload();
                    });
                }else{
                    swal("Warning", resp, "warning");
                    $("#frmReason .btnSubmit").html('Submit').attr('disabled', false);
                }
            },
            error: function(resp){
                console.log("Something went wrong with request");
                $("#frmReason .btnSubmit").html('Submit').attr('disabled', false);
            }
        });
    }
    return false;
});
</script>
@endsection