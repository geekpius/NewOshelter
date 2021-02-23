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
                                        <th>Status</th>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <td>22-54-2021</td>
                                            <td>This property</td>
                                            {{-- @php $image = (empty($booking->property->user->image))? 'user.svg':'users/'.$booking->property->user->image; @endphp --}}
                                            {{-- <td><img src="{{ asset('assets/images/'.$image) }}" alt="{{ $booking->property->user->name }}" class="thumb-sm rounded-circle mr-2">{{ $booking->property->user->name }}</td> --}}
                                            <td>Visitor</td>
                                            <td>200.00 </td>
                                            <td>
                                              Confirmed
                                            </td>
                                        </tr><!--end tr-->                                                                                   
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
                                        <th>Status</th>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <td>22-54-2021</td>
                                            <td>This property</td>
                                            {{-- @php $image = (empty($booking->property->user->image))? 'user.svg':'users/'.$booking->property->user->image; @endphp --}}
                                            {{-- <td><img src="{{ asset('assets/images/'.$image) }}" alt="{{ $booking->property->user->name }}" class="thumb-sm rounded-circle mr-2">{{ $booking->property->user->name }}</td> --}}
                                            <td>Owner</td>
                                            <td>200.00 </td>
                                            <td>
                                              Pending payment
                                            </td>
                                        </tr><!--end tr-->                                                                                   
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