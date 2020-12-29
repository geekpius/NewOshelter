@extends('admin.layouts.app')

@section('styles') 
<!-- DataTables -->
<link href="{{asset('assets/plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')

<div class="container-fluid">
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-right">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active">My Requests</li>
                    </ol>
                </div>
                <h4 class="page-title">My Requests</h4>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
    <!-- end page title end breadcrumb -->
   
    <div class="card">
        
        <div class="row">
          
            <div class="col-sm-12">

                <div class="card-body pt-12">

                    <h4 class="header-title mt-lg-12 mb-3">Request History</h4> 

                   <div class="col-sm-4">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs nav-justified" role="tablist">
                            <li class="nav-item waves-effect waves-light">
                                <a class="nav-link" href="{{ route('requests') }}" role="tab">Booking Requests</a>
                            </li>
                            <li class="nav-item waves-effect waves-light">
                                <a class="nav-link active text-primary font-weight-500" href="{{ route('requests.extension') }}" role="tab">Date Extension Requests</a>
                            </li>
                            {{-- 
                            <li class="nav-item waves-effect waves-light">
                                <a class="nav-link" href="{{ route('visits.current') }}" role="tab">Current</a>
                            </li>
                            <li class="nav-item waves-effect waves-light">
                                <a class="nav-link" href="{{ route('visits.past') }}" role="tab">Past</a>
                            </li> --}}
                        </ul>
                   </div>
                    <br>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active p-3" id="withdrawn" role="tabpanel">
                            <div class="table-responsive dash-social">
                                <table id="datatable" class="table table-bordered">
                                    <thead class="thead-light">
                                    <tr>                                        
                                        <th>Date</th>
                                        <th>Property</th>
                                        <th>Owner</th>
                                        <th>Check In</th>
                                        <th>Check Out</th>
                                        <th class="text-primary">Extended Date</th>
                                        <th>Paid</th>
                                        <th>Confirm</th>
                                    </tr><!--end tr-->
                                    </thead>

                                    <tbody>
                                        @foreach ($extensions as $ext)
                                        <tr class="record">
                                            <td>{{ \Carbon\Carbon::parse($ext->created_at)->diffForHumans() }}</td>
                                            <td>{{ $ext->visit->property->title }}</td>
                                            <td><img src="{{ asset('assets/images/users/'.$ext->owner->image) }}" alt="" class="thumb-sm rounded-circle mr-2">{{ $ext->owner->name }}</td>
                                            <td>{{ \Carbon\Carbon::parse($ext->visit->check_in)->format('d-M-Y') }}</td>
                                            <td>{{ \Carbon\Carbon::parse($ext->visit->check_out)->format('d-M-Y') }}</td>
                                            <td class="text-primary">{{ \Carbon\Carbon::parse($ext->extension_date)->format('d-M-Y') }}</td>
                                            <td>
                                                @if ($ext->isPaidAttribute())
                                                <span class="text-success">Paid</span>
                                                @else
                                                <span class="text-danger">Not Paid</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($ext->isPendingAttribute())
                                                <span class="badge badge-md badge-primary"><i class="fa fa-spin fa-spinner"></i> Pending</span>
                                                @elseif ($ext->isConfirmAttribute())
                                                <a href="{{ route('requests.extension.payment', $ext->id) }}"><span class="badge badge-md badge-primary">Make Payment</span></a>
                                                @elseif ($ext->isRejectAttribute())
                                                <span class="badge badge-md badge-danger"><i class="fa fa-times"></i> Cancelled</span>
                                                @elseif ($ext->isDoneAttribute())
                                                <a href="{{ route('requests.invoice', $ext->id) }}"><span class="badge badge-md badge-primary">View Invoice</span></a>
                                                @endif
                                            </td>
                                        </tr><!--end tr-->
                                        @endforeach                                                                                   
                                    </tbody>
                                </table>                      
                            </div>                             
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
<script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script>
    $('#datatable').DataTable();
</script>
@endsection