@extends('layouts.app')

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
                        <li class="breadcrumb-item active">List Bidders</li>
                    </ol>
                </div>
                <h4 class="page-title">List Bidders</h4>
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
                                <th>Membership</th>
                                <th>Bidder Name</th>
                                <th>Email</th>
                                <th>Phone No</th>  
                                <th>Digital Address</th>    
                                <th>Action</th>
                            </tr><!--end tr-->
                            </thead>

                            <tbody>
                                <tr>
                                    <td>0123456789</td>
                                    <td><img src="../assets/images/users/user-4.jpg" alt="" class="thumb-sm rounded-circle mr-2">Donald Gardner<small class="badge badge-soft-pink ml-1">New</small></td>
                                    <td>xyx@gmail.com</td>
                                    <td>+123456789</td>
                                    <td>68</td>
                                    <td>                                                       
                                        <a href="#" title="Properties Bidded"><i class="fas fa-home text-primary font-16"></i></a>
                                    </td>
                                </tr><!--end tr-->
                                <tr>
                                    <td>0123456789</td>
                                    <td><img src="../assets/images/users/user-4.jpg" alt="" class="thumb-sm rounded-circle mr-2">Matt Rosales</td>
                                    <td>xyx@gmail.com</td>
                                    <td>+123456789</td>
                                    <td>112</td>
                                    <td>                                                       
                                        <a href="#" title="Properties Bidded"><i class="fas fa-home text-primary font-16"></i></a>
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