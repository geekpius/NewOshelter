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
                                <a class="nav-link active text-primary font-weight-500" href="{{ route('requests') }}" role="tab">Booking Requests</a>
                            </li>
                            <li class="nav-item waves-effect waves-light">
                                <a class="nav-link" href="{{ route('requests.extension') }}" role="tab">Date Extension Requests</a>
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
                                        <th>Guests</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr><!--end tr-->
                                    </thead>

                                    <tbody>
                                        @foreach ($bookings as $book)
                                        <tr class="record">
                                            <td>{{ \Carbon\Carbon::parse($book->created_at)->diffForHumans() }}</td>
                                            <td>{{ $book->property->title }}</td>
                                            <td><img src="{{ asset('assets/images/users/'.$book->owner->image) }}" alt="" class="thumb-sm rounded-circle mr-2">{{ $book->owner->name }}</td>
                                            <td>{{ \Carbon\Carbon::parse($book->check_in)->format('d-M-Y') }}</td>
                                            <td>{{ \Carbon\Carbon::parse($book->check_out)->format('d-M-Y') }}</td>
                                            <td>{{ $book->getGuestAttribute() }}</td>
                                            <td>
                                                @if ($book->isPendingAttribute())
                                                <span class="text-primary"><i class="fa fa-spin fa-spinner"></i> Waiting...</span>
                                                @elseif ($book->isConfirmAttribute())
                                                <span class="text-success"><i class="fa fa-check"></i> Confirmed</span>
                                                @elseif ($book->isRejectAttribute())
                                                <span class="text-danger"><i class="fa fa-times"></i> Cancelled</span>
                                                @elseif ($book->isDoneAttribute())
                                                <span class="text-success"><i class="fa fa-money-bill"></i> Paid</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($book->isPendingAttribute())
                                                <span class="text-primary"><i class="fa fa-spin fa-spinner"></i> Waiting...</span>
                                                @elseif ($book->isConfirmAttribute())
                                                <a href="{{ route('requests.payment', $book->id) }}"><span class="badge badge-md badge-primary">Make Payment</span></a>
                                                @elseif ($book->isRejectAttribute())
                                                <span class="badge badge-md badge-danger"><i class="fa fa-times"></i> Cancelled</span>
                                                @elseif ($book->isDoneAttribute())
                                                <a href="{{ route('requests.invoice', $book->id) }}"><span class="badge badge-md badge-primary">View Invoice</span></a>
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