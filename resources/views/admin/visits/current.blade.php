@extends('admin.layouts.app')

@section('styles') 
<!-- DataTables -->
<link href="{{asset('assets/plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
{{-- date range --}}
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
@endsection
@section('content')

<div class="container-fluid">
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-right">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active">My Current Visits</li>
                    </ol>
                </div>
                <h4 class="page-title">My Current Visits</h4>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
    <!-- end page title end breadcrumb -->
   
    <div class="card">
        
        <div class="row">
          
            <div class="col-sm-12">

                <div class="card-body pt-12">

                    <h4 class="header-title mt-lg-12 mb-3">Visits History</h4> 

                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs nav-justified" role="tablist">
                        <li class="nav-item waves-effect waves-light">
                            <a class="nav-link" href="{{ route('visits') }}" role="tab">All</a>
                        </li>
                        <li class="nav-item waves-effect waves-light">
                            <a class="nav-link" href="{{ route('visits.upcoming') }}" role="tab">Upcoming</a>
                        </li>
                        <li class="nav-item waves-effect waves-light">
                            <a class="nav-link active text-primary font-weight-500" href="{{ route('visits.current') }}" role="tab">Current</a>
                        </li>
                        <li class="nav-item waves-effect waves-light">
                            <a class="nav-link" href="{{ route('visits.past') }}" role="tab">Past</a>
                        </li>
                    </ul>
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
                                        <th>Check In</th>
                                        <th>Check Out</th>
                                        <th>Guest</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr><!--end tr-->
                                    </thead>

                                    <tbody>
                                        @foreach (Auth::user()->userVisits->where('check_in','<',\Carbon\Carbon::today())->where('check_out','>',\Carbon\Carbon::today()) as $visit)
                                        <tr class="record">
                                            <td>{{ \Carbon\Carbon::parse($visit->created_at)->diffForHumans() }}</td>
                                            <td>{{ $visit->property->title }}</td>
                                            <td>{{ \Carbon\Carbon::parse($visit->check_in)->format('d-M-Y') }}</td>
                                            <td>{{ \Carbon\Carbon::parse($visit->check_out)->format('d-M-Y') }}</td>
                                            <td>{{ ($visit->adult+$visit->children) }}</td>
                                            <td><span class="badge badge-md badge-{{ ($visit->status)? 'success':'danger' }}">{{ $visit->checkInOrOut() }}</span></td>
                                            <td>
                                                <a href="{{ route('visits.property', $visit->property_id) }}" class="mr-3" title="View Property"><i class="fas fa-home text-primary font-16"></i></a>
                                                <a href="/user/visits/current/extend" class="btnExtend" data-id="{{ $visit->id }}" data-type="{{ $visit->property->type }}" data-status="{{ $visit->property->type_status }}" data-checkin="{{ \Carbon\Carbon::parse($visit->check_out)->format('m-d-Y') }}" title="Extend Stay">
                                                    <i class="fas fa-clock text-purple font-16"></i>
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


    <!-- withdraw modal -->
    <div id="extendModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="extendModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="extendModalLabel">Extend Stay Request</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <form id="formExtend" action="{{ route('visits.current.extend') }}">
                        @csrf
                        <input type="hidden" name="visit_id" id="visit_id" readonly>
                        <input type="hidden" name="checkin" id="checkin" readonly>
                        <input type="hidden" name="type" id="type" readonly>
                        <input type="hidden" name="status" id="status" readonly>
                        <div class="form-group validate">
                            <label for="extended_date">Extended Date</label>
                            <input type="text" class="form-control" name="extended_date" id="extended_date" title="Select date" data-date="{{ \Carbon\Carbon::parse(\Carbon\Carbon::tomorrow())->format('m-d-Y') }}" />
                            <span class="text-danger mySpan"></span>
                        </div>
                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-gradient-success btnExtendSubmit">Submit</button>
                        </div>
                    </form>                    
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->  

</div><!-- container -->

@endsection

@section('scripts')
<script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
{{-- date range --}}
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script src="{{ asset('assets/pages/visits/current.js') }}"></script>
@endsection