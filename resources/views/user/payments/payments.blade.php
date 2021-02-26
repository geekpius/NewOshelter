@extends('layouts.site')

@section('style') 
<!-- DataTables -->
<link href="{{asset('assets/plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="pxp-content pull-content-down">
    <div class="container">
        <h2>My Payments</h2>  
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
                            <div class="table-responsive">
                                @if (Auth::user()->account_type == 'owner')
                                <table id="datatable" class="table table-striped small">
                                    <thead class="thead-light">
                                        <tr>                                        
                                            <th>Paid At</th>
                                            <th>Property</th>
                                            <th>Visitor</th>
                                            <th>Amount</th>
                                            <th>Description</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach (Auth::user()->ownerTransactions as $trans)
                                        <tr>
                                            <td>{{ \Carbon\Carbon::parse($trans->created_at)->diffForHumans() }}</td>
                                            <td>
                                                @if ($trans->property_type == 'hostel')
                                                    {{ $trans->bookingTransaction->hostelBooking->property->title }}
                                                @elseif ($trans->property_type == 'extension_request')
                                                    {{ $trans->extensionTransaction->property->title }}
                                                @else
                                                    {{ $trans->bookingTransaction->booking->property->title }}
                                                @endif    
                                            </td>
                                            @php $image = (empty($trans->user->image))? 'user.svg':'users/'.$trans->user->image; @endphp
                                            <td><img src="{{ asset('assets/images/'.$image) }}" alt="{{ $trans->user->name }}" class="thumb-sm rounded-circle mr-2">{{ $trans->user->name }}</td>
                                            <td>{{ $trans->currency }} {{ $trans->payableAmount() }}</td>
                                            <td>
                                                @if ($trans->property_type == 'hostel')
                                                    Payment for <a target="_blank" href="{{ route('single.property', $trans->bookingTransaction->hostelBooking->property->id) }}">{{ $trans->bookingTransaction->hostelBooking->property->title }}</a> booking
                                                @elseif ($trans->property_type == 'extension_request')
                                                    Payment for <a target="_blank" href="{{ route('single.property', $trans->extensionTransaction->property->id) }}">{{ $trans->extensionTransaction->property->title }}</a> extension date
                                                @else
                                                    Payment for <a target="_blank" href="{{ route('single.property', $trans->bookingTransaction->booking->property->id) }}">{{ $trans->bookingTransaction->booking->property->title }}</a> booking
                                                @endif
                                            </td>
                                        </tr><!--end tr-->   
                                        @endforeach                                                                                
                                    </tbody>
                                </table>   
                                @else
                                <table id="datatable" class="table table-striped small">
                                    <thead class="thead-light">
                                    <tr>                                        
                                        <th>Paid At</th>
                                        <th>Property</th>
                                        <th>Owner</th>
                                        <th>Amount</th>
                                        <th>Description</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                        @foreach (Auth::user()->userTransactions as $trans)
                                        <tr>
                                            <td>{{ \Carbon\Carbon::parse($trans->created_at)->diffForHumans() }}</td>
                                            <td>
                                                @if ($trans->property_type == 'hostel')
                                                    {{ $trans->bookingTransaction->hostelBooking->property->title }}
                                                @elseif ($trans->property_type == 'extension_request')
                                                    {{ $trans->extensionTransaction->property->title }}
                                                @else
                                                    {{ $trans->bookingTransaction->booking->property->title }}
                                                @endif
                                            </td>
                                            @php $image = (empty($trans->owner->image))? 'user.svg':'users/'.$trans->owner->image; @endphp
                                            <td><img src="{{ asset('assets/images/'.$image) }}" alt="{{ $trans->owner->name }}" class="thumb-sm rounded-circle mr-2">{{ $trans->owner->name }}</td>
                                            <td>{{ $trans->currency }} {{ $trans->payableAmount() }}</td>
                                            <td>
                                                @if ($trans->property_type == 'hostel')
                                                    Payment for <a target="_blank" href="{{ route('single.property', $trans->bookingTransaction->hostelBooking->property->id) }}">{{ $trans->bookingTransaction->hostelBooking->property->title }}</a> booking
                                                @elseif ($trans->property_type == 'extension_request')
                                                    Payment for <a target="_blank" href="{{ route('single.property', $trans->extensionTransaction->property->id) }}">{{ $trans->extensionTransaction->property->title }}</a> extension date
                                                @else
                                                    Payment for <a target="_blank" href="{{ route('single.property', $trans->bookingTransaction->booking->property->id) }}">{{ $trans->bookingTransaction->booking->property->title }}</a> booking
                                                @endif
                                            </td>
                                        </tr><!--end tr-->   
                                        @endforeach                                                                                
                                    </tbody>
                                </table>  
                                @endif                   
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
</script>
@endsection