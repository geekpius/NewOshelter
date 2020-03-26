@extends('layouts.host')

@section('styles')
<!-- DataTables -->
<link href="{{asset('assets/plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/plugins/datatables/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
<!-- Responsive datatable examples -->
<link href="{{asset('assets/plugins/datatables/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />  
@endsection
@section('content')

<div class="container-fluid">
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-right">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active">All Tickets</li>
                    </ol>
                </div>
                <h4 class="page-title">All Tickets</h4>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
    <!-- end page title end breadcrumb -->
   
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">

                    <div class="table-responsive dash-social">
                        <table id="datatable" class="table">
                            <thead>
                            <tr>
                                <th>ID#</th>
                                <th>Subject</th>
                                <th>Help Desk</th>
                                <th>Status</th>   
                                <th>Date</th>   
                                <th>Action</th>
                            </tr><!--end tr-->
                            </thead>

                            <tbody>
                            @foreach ($tickets as $tick)
                                <tr>
                                    <td>#{{$tick->id}}</td>
                                    <td class="text-primary">{{$tick->subject}}</td>
                                    <td>{{$tick->help_desk}}</td>
                                    <td>
                                    @if (!$tick->status)
                                        Pending
                                    @else
                                        Closed
                                    @endif    
                                    </td>
                                    <td>{{\Carbon\Carbon::parse($tick->created_at)->diffForHumans() }}</td>
                                    <td>                                                       
                                        <a href="{{ route('host.ticket.read', $tick->id) }}" class="mr-3" title="View"><i class="fa fa-eye text-primary font-16"></i></a>
                                        @if (!$tick->status)
                                        <a href="#" title="Close"><i class="fas fa-times-circle text-danger font-16"></i></a>
                                        @endif
                                    </td>
                                </tr><!--end tr-->
                            @endforeach                                       
                            </tbody>
                        </table>                    

                </div><!--end card-body-->
            </div><!--end card-->
        </div><!--end col-->
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