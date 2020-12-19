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
                        <li class="breadcrumb-item active">My Past Visits</li>
                    </ol>
                </div>
                <h4 class="page-title">My Past Visits</h4>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
    <!-- end page title end breadcrumb -->
   
    <div class="card">
        
        <div class="row">
          
            <div class="col-sm-12">

                <div class="card-body pt-12">

                    <h4 class="header-title mt-lg-12 mb-3">Visits History</h4> 

                   <div class="col-sm-3">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs nav-justified" role="tablist">
                            <li class="nav-item waves-effect waves-light">
                                <a class="nav-link" href="{{ route('visits.upcoming') }}" role="tab">Upcoming</a>
                            </li>
                            <li class="nav-item waves-effect waves-light">
                                <a class="nav-link active text-primary font-weight-500" href="{{ route('visits.past') }}" role="tab">Past</a>
                            </li>
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
                                        <th>Booked At</th>
                                        <th>Property</th>
                                        <th>Owner</th>
                                        <th>Check In</th>
                                        <th>Check Out</th>
                                        <th>Guest</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr><!--end tr-->
                                    </thead>

                                    <tbody>
                                        @foreach (Auth::user()->userVisits->where('check_in','<=',\Carbon\Carbon::today()) as $visit)
                                        <tr>
                                            <td>{{ \Carbon\Carbon::parse($visit->created_at)->diffForHumans() }}</td>
                                            <td>{{ $visit->property->title }}</td>
                                            <td><img src="{{ asset('assets/images/users/'.$visit->property->user->image) }}" alt="" class="thumb-sm rounded-circle mr-2">{{ $visit->property->user->name }}</td>
                                            <td>{{ \Carbon\Carbon::parse($visit->check_in)->format('d-M-Y') }}</td>
                                            <td>{{ \Carbon\Carbon::parse($visit->check_out)->format('d-M-Y') }}</td>
                                            <td>{{ $visit->getGuestAttribute() }}</td>
                                            <td>
                                                @if ($visit->isInAttribute())
                                                <span class="badge badge-md badge-success">IN</span>
                                                @else
                                                <span class="badge badge-md badge-success">OUT</span>                                                    
                                                @endif
                                            </td>
                                            <td>
                                                @if ($visit->isInAttribute())
                                                <a href="/user/visits/past/extend" class="btnExtend mr-2" data-owner="{{ $visit->property->user_id }}" data-id="{{ $visit->id }}" data-type="{{ $visit->property->type }}" data-status="{{ $visit->property->type_status }}" data-checkin="{{ \Carbon\Carbon::parse($visit->check_out)->format('m-d-Y') }}" title="Extend Stay">
                                                    <i class="fas fa-clock text-purple font-16"></i>
                                                </a>
                                                @endif
                                                <a href="{{ route('visits.property.rating', $visit->id) }}" class="" title="Rate Property">
                                                    <i class="fas fa-star text-warning font-16"></i>
                                                </a>
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
<script src="{{ asset('assets/pages/visits/past.js') }}"></script>
@endsection