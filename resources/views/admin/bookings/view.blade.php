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
                        <li class="breadcrumb-item active">My View Bookings </li>
                    </ol>
                </div>
                <h4 class="page-title">My View Bookings </h4>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
    <!-- end page title end breadcrumb -->
   
    <div class="card">
        
        <div class="row">
          
            <div class="col-sm-12">

                <div class="card-body pt-12">

                    <h4 class="header-title mt-lg-12 mb-3">Bookings History</h4> 

                    <!-- Nav tabs -->
                    <ul class="nav nav-pills nav-justified" role="tablist">
                        <li class="nav-item waves-effect waves-light">
                            <a class="nav-link active" data-toggle="tab" href="#all" role="tab">All</a>
                        </li>
                        <li class="nav-item waves-effect waves-light">
                            <a class="nav-link" data-toggle="tab" href="#complete" role="tab">Complete</a>
                        </li>
                        <li class="nav-item waves-effect waves-light">
                            <a class="nav-link" data-toggle="tab" href="#incomplete" role="tab">Incomplete</a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active p-3" id="all" role="tabpanel">
                            <div class="table-responsive dash-social">
                                <table id="datatable" class="table table-bordered">
                                    <thead class="thead-light">
                                    <tr>
                                        <th>Date</th>                                               
                                        <th>Property</th>
                                        <th>Check In</th>
                                        <th>Check Out</th>
                                        <th>Guests</th>
                                        <th>Status</th>
                                    </tr><!--end tr-->
                                    </thead>

                                    <tbody>
                                        @foreach ($bookings as $booking)
                                        <tr>
                                            <td>{{ \Carbon\Carbon::parse($booking->created_at)->diffForHumans() }}</td>
                                            <td>
                                                @php $image = $booking->property->propertyImages->first();  @endphp
                                                <a href="javascript:void(0);" data-toggle="popover" data-trigger="hover" data-placement="left" data-html=true data-title='<img src="{{ asset('assets/images/properties/'.$image->image) }}" alt="{{ $image->caption }}" class="img-responsive img-thumbnail" height="300" width="300">'>
                                                    <span>{{ $booking->property->title }}</span>
                                                </a>
                                            </td>
                                            <td>{{ \Carbon\Carbon::parse($booking->check_in)->format('d-M-Y') }}</td>
                                            <td>{{ \Carbon\Carbon::parse($booking->check_out)->format('d-M-Y') }}</td>
                                            <td>{{ ($booking->adult+$booking->children+$booking->infant) }}</td>
                                            <td>
                                                @if ($booking->status==4)
                                                <span class="badge badge-md badge-soft-success" style="color: #000000 !important">Complete</span>
                                                @else
                                                <span class="badge badge-md badge-soft-warning" style="color: #000000 !important">Incomplete</span>   
                                                @endif
                                            </td>
                                        </tr><!--end tr-->    
                                        @endforeach                                                                              
                                    </tbody>
                                </table>                    
                            </div>     
                        </div>
                        <div class="tab-pane p-3" id="complete" role="tabpanel">
                            <div class="table-responsive dash-social">
                                <table id="datatable1" class="table table-bordered">
                                    <thead class="thead-light">
                                    <tr>
                                        <tr>
                                            <th>Date</th>                                               
                                            <th>Property</th>
                                            <th>Check In</th>
                                            <th>Check Out</th>
                                            <th>Guests</th>
                                            <th>Status</th>
                                        </tr>
                                    </tr><!--end tr-->
                                    </thead>

                                    <tbody>
                                        @foreach ($bookings as $booking)
                                        @if ($booking->status==4)
                                        <tr>
                                            <td>{{ \Carbon\Carbon::parse($booking->created_at)->diffForHumans() }}</td>
                                            <td>
                                                @php $image = $booking->property->propertyImages->first();  @endphp
                                                <a href="javascript:void(0);" data-toggle="popover" data-trigger="hover" data-placement="left" data-html=true data-title='<img src="{{ asset('assets/images/properties/'.$image->image) }}" alt="{{ $image->caption }}" class="img-responsive img-thumbnail" height="300" width="300">'>
                                                    <span>{{ $booking->property->title }}</span>
                                                </a>
                                            </td>
                                            <td>{{ \Carbon\Carbon::parse($booking->check_in)->format('d-M-Y') }}</td>
                                            <td>{{ \Carbon\Carbon::parse($booking->check_out)->format('d-M-Y') }}</td>
                                            <td>{{ ($booking->adult+$booking->children+$booking->infant) }}</td>
                                            <td>
                                               
                                                <span class="badge badge-md badge-soft-success" style="color: #000000 !important">Complete</span>
                                               
                                            </td>
                                        </tr><!--end tr--> 
                                        @endif    
                                        @endforeach                                                                            
                                    </tbody>
                                </table>                    
                            </div>                             
                        </div>
                        <div class="tab-pane p-3" id="incomplete" role="tabpanel">
                            <div class="table-responsive dash-social">
                                <table id="datatable2" class="table table-bordered">
                                    <thead class="thead-light">
                                    <tr>
                                        <th>Date</th>                                               
                                        <th>Property</th>
                                        <th>Check In</th>
                                        <th>Check Out</th>
                                        <th>Guests</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr><!--end tr-->
                                    </thead>

                                    <tbody>
                                        @foreach ($bookings as $booking)
                                        @if (!$booking->status==4)
                                        <tr>
                                            <td>{{ \Carbon\Carbon::parse($booking->created_at)->diffForHumans() }}</td>
                                            <td>
                                                @php $image = $booking->property->propertyImages->first();  @endphp
                                                <a href="javascript:void(0);" data-toggle="popover" data-trigger="hover" data-placement="left" data-html=true data-title='<img src="{{ asset('assets/images/properties/'.$image->image) }}" alt="{{ $image->caption }}" class="img-responsive img-thumbnail" height="300" width="300">'>
                                                    <span>{{ $booking->property->title }}</span>
                                                </a>
                                            </td>
                                            <td>{{ \Carbon\Carbon::parse($booking->check_in)->format('d-M-Y') }}</td>
                                            <td>{{ \Carbon\Carbon::parse($booking->check_out)->format('d-M-Y') }}</td>
                                            <td>{{ ($booking->adult+$booking->children+$booking->infant) }}</td>
                                            <td> 
                                                <span class="badge badge-md badge-soft-warning" style="color: #000000 !important">InComplete</span>
                                            </td>
                                            <td></td>
                                        </tr><!--end tr--> 
                                        @endif 
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
$('#datatable, #datatable1, #datatable2').DataTable();

</script>
@endsection