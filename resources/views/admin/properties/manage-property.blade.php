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
                        <li class="breadcrumb-item active">Manage Rented Properties</li>
                    </ol>
                </div>
                <h4 class="page-title">Manage Rented Properties</h4>
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
                                <th>Title</th>
                                <th>Type</th>
                                <th>Status</th>
                                <th>Location</th>   
                                <th>Action</th>
                            </tr><!--end tr-->
                            </thead>

                            <tbody>
                                <tr>
                                    <td>0123456789</td>
                                    <td>xyx@gmail.com</td>
                                    <td>+123456789</td>
                                    <td>68</td>
                                    <td>                                                       
                                        <a href="{{route('tenant.rented', 1)}}" class="mr-3" title="Utilities"><i class="fa fa-money-bill-wave text-primary font-16"></i></a>
                                        <a href="#" title="Send Email to Tenants"><i class="fas fa-envelope text-pink font-16"></i></a>
                                    </td>
                                </tr><!--end tr-->
                                <tr>
                                    <td>0123456789</td>
                                    <td>xyx@gmail.com</td>
                                    <td>+123456789</td>
                                    <td>112</td>
                                    <td>                                                       
                                        <a href="{{route('tenant.rented', 2)}}" class="mr-3" title="Utilities"><i class="fa fa-money-bill-wave text-primary font-16"></i></a>
                                        <a href="#" title="Send Email to Tenants"><i class="fas fa-envelope text-pink font-16"></i></a>
                                    </td>
                                </tr><!--end tr-->
                                                                            
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