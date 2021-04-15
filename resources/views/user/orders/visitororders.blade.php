@extends('layouts.site')

@section('style') 
<!-- DataTables -->
<link href="{{asset('assets/plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="pxp-content pull-content-down">
    <div class="container">
        <h2>My Orders</h2>  
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
                                        <th>Ordered At</th>
                                        <th>Property</th>
                                        <th>Owner</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                    </thead>

                                    <tbody>
                                        @foreach (Auth::user()->orders as $order)
                                        <tr>
                                            <td>{{ \Carbon\Carbon::parse($order->created_at)->diffForHumans() }}</td>
                                            <td><a target="_blank" href="{{ route('property.preview', $order->property_id) }}">{{ $order->property->title }}</a></td>
                                            @php $image = (empty($order->owner->image))? 'user.svg':'users/'.$order->owner->image; @endphp
                                            <td><img src="{{ asset('assets/images/'.$image) }}" alt="{{ $order->owner->name }}" class="thumb-sm rounded-circle mr-2">{{ $order->owner->name }}</td>
                                            <td class="">{{ $order->property->propertyPrice->getPropertyPrice() }}</td>
                                            <td>
                                                @if ($order->isPendingAttribute())
                                                    <span class="text-primary"><i class="fa fa-spin fa-spinner"></i> Processing</span>
                                                @elseif ($order->isDoneAttribute())
                                                    <span class="text-success"><i class="fa fa-check-circle"></i> Bought</span>
                                                @elseif ($order->isCancelAttribute())
                                                    <span class="text-danger"><i class="fa fa-times-circle"></i> Cancelled</span>
                                                @endif
                                            </td>
                                        </tr><!--end tr-->
                                        @endforeach                                                                                   
                                    </tbody>
                                </table>                     
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