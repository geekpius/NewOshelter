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
                                                    @if ($trans->bookingTransaction->hostelBooking->check_in <= \Carbon\Carbon::today())
                                                    <a href="#" class="btnConfirm mr-4 text-decoration-none text-success" title="Confirm your stay">
                                                        <i class="fas fa-check-circle font-16"></i>
                                                    </a>
                                                    <a href="#" class="text-decoration-none btnReject text-danger" title="Cancel your stay">
                                                        <i class="fas fa-times-circle font-16"></i>
                                                    </a>
                                                    @else
                                                        <span class="text-danger"><i class="fa fa-spin fa-spinner"></i> Not yet checked in</span>
                                                    @endif
                                                @else
                                                    @if ($trans->bookingTransaction->booking->check_in <= \Carbon\Carbon::today())
                                                        @if ($trans->confirmation)
                                                            @if ($trans->confirmation->status)
                                                            <span class="text-success"><i class="fa fa-check-circle"></i> Confirmed</span>
                                                            @else
                                                            <span class="text-danger"><i class="fa fa-times-circle"></i> Cancelled</span>
                                                            @endif
                                                        @else
                                                        <a href="{{ route('property.visitor.confirmations.yes', Auth::user()->id) }}" data-token="{{ csrf_token() }}" data-transaction="{{ $trans->id }}" data-owner="{{ $trans->bookingTransaction->booking->owner_id }}" data-visit="{{ $trans->bookingTransaction->booking->property->userVisits->where('user_id', Auth::user()->id)->where('status', true)->first()->id }}" data-type="{{ $trans->property_type }}" class="btnConfirm mr-4 text-decoration-none text-success" title="Confirm your stay">
                                                            <i class="fas fa-check-circle font-16"></i>
                                                        </a>
                                                        <a href="{{ route('property.visitor.confirmations.no', Auth::user()->id) }}" data-token="{{ csrf_token() }}" data-transaction="{{ $trans->id }}" data-owner="{{ $trans->bookingTransaction->booking->owner_id }}" data-visit="{{ $trans->bookingTransaction->booking->property->userVisits->where('user_id', Auth::user()->id)->where('status', true)->first()->id }}" data-type="{{ $trans->property_type }}" class="text-decoration-none btnReject text-danger" title="Cancel your stay">
                                                            <i class="fas fa-times-circle font-16"></i>
                                                        </a> 
                                                    @endif
                                                    @else
                                                        <span class="text-danger"><i class="fa fa-spin fa-spinner"></i> Not yet checked in</span>
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

@endsection

@section('scripts')
<script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script>
$('#datatable').DataTable();

$("#datatable tbody").on("click", ".btnConfirm", function(){
    var $this = $(this);
    if(confirm('You are about to confirm your stay. Sure to confirm?')){
        let data = {
            _token: $this.data('token'),
            owner_id: $this.data('owner'),
            visit_id:  $this.data('visit'),
            transaction_id:  $this.data('transaction'),
            type:  $this.data('type'),
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
                }
            },
            error: function(resp){
                console.log("Something went wrong with request");
            }
        });
    }
    return false;
});
</script>
@endsection