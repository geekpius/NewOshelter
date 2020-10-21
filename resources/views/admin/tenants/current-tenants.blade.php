@extends('admin.layouts.app')

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
                        <li class="breadcrumb-item active">List Current Tenants</li>
                    </ol>
                </div>
                <h4 class="page-title">List Current Tenants</h4>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
    <!-- end page title end breadcrumb -->
   
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link font-weight-500" href="{{ route('tenants') }}" role="tab" aria-selected="true">All Tenants</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active text-primary font-weight-500" href="{{ route('tenants.current') }}" role="tab" aria-selected="false">Current Tenants</a>
                        </li>     
                    </ul>
                    <br>
                    <div class="table-responsive dash-social">
                        <table id="tenantDatatable" class="table">
                            <thead>
                            <tr>
                                <th>Membership</th>
                                <th>Tenant Name</th>
                                <th>Email</th>
                                <th>Phone No</th>  
                                <th>Digital Address</th>    
                                <th>Action</th>
                            </tr><!--end tr-->
                            </thead>

                            <tbody>
                                @foreach ($tenants as $tenant)
                                    @foreach ($tenant->userVisits as $visit)
                                    <tr>
                                        <td>{{ $visit->user->membership }}</td>
                                        @php $image = (empty($visit->user->image))? 'user.svg':'users/'.$visit->user->image; @endphp
                                        <td><img src="{{ asset('assets/images/'.$image) }}" alt="" class="thumb-sm rounded-circle mr-2">{{ $visit->user->name }}</td>
                                        <td>{{ $visit->user->email }}</td>
                                        <td>{{ $visit->user->phone }}</td>
                                        <td>{{ $visit->user->digital_address }}</td>
                                        <td>                                                       
                                            <a href="{{route('tenant.visited', $visit->user_id)}}" class="mr-3" title="Properties Visited"><i class="fas fa-home text-primary font-16"></i></a>
                                            <a href="#" title="Send Email"><i class="fas fa-envelope text-pink font-16"></i></a>
                                        </td>
                                    </tr><!--end tr-->
                                    @endforeach
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
<script src="{{ asset('assets/pages/tenant.js') }}"></script>
@endsection