@extends('layouts.app')

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
                        <li class="breadcrumb-item active">Account Activities</li>
                    </ol>
                </div>
                <h4 class="page-title">Account Activities</h4>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
    <!-- end page title end breadcrumb -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body  met-pro-bg">
                    <div class="met-profile">
                        <div class="row">
                            <div class="col-lg-8 align-self-center mb-3 mb-lg-0">
                                <div class="met-profile-main">
                                    <div class="met-profile-main-pic">
                                        <img src="{{ (empty(Auth::user()->image))? asset('assets/images/user.svg'):asset('assets/images/users/'.Auth::user()->image) }}" alt="{{ Auth::user()->name }}" width="130" height="130" class="rounded-circle img_preview">
                                        
                                    </div>
                                    <div class="met-profile_user-detail ml-3">
                                        <h5 class="met-user-name"><span id="myLegalName">{{ Auth::user()->name }}</span> <small>({{ Auth::user()->membership }})</small></h5>                                                        
                                        <p class="mb-0 met-user-name-post" id="myOccupation">{{ empty(Auth::user()->profile->occupation)? 'N/A':Auth::user()->profile->occupation }}</p>
                                    </div>
                                </div>                                                
                            </div><!--end col-->
                            <div class="col-lg-4">
                                <ul class="list-unstyled personal-detail">
                                    <li class=""><i class="dripicons-phone mr-2 text-info font-18"></i> <b> Phone </b> : {{ Auth::user()->phone }}</li>
                                    <li class="mt-2"><i class="dripicons-mail text-info font-18 mt-2 mr-2"></i> <b> Email </b> : {{ Auth::user()->email }}</li>
                                    <li class="mt-2"><i class="dripicons-location text-info font-18 mt-2 mr-2"></i> <b>Location</b> : <span id="myCity">{{ empty(Auth::user()->profile->city)? 'N/A':Auth::user()->profile->city }}</span></li>
                                    <li class="mt-2"><i class="fas fa-map-pin text-info font-18 mt-2 mr-2"></i> <b>Digital Address</b> : <span class="text-white">{{ Auth::user()->digital_address }}</span></li>
                                    <li class="mt-2"><i class="fa fa-clock text-info font-18 mt-2 mr-2"></i> <b>Login Time</b> : {{ Auth::user()->login_time }}</li>
                                </ul>
                            </div><!--end col-->
                        </div><!--end row-->
                    </div><!--end f_profile-->                                                                                
                </div><!--end card-body-->
            </div><!--end card-->
        </div><!--end col-->
    </div><!--end row-->
    
    
    <div class="row">
        <div class="col-sm-12 mx-auto">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-1"></div>
                        <div class="col-sm-10">
                            <h5 class="text-primary mb-3">Account Activities</h5>
                            <div class="table-responsive dash-social">
                                <table id="datatable" class="table table-bordered">
                                    <thead class="thead-light">
                                    <tr>
                                        <th>Timestamp</th>                                               
                                        <th>Action</th>
                                    </tr><!--end tr-->
                                    </thead>

                                    <tbody>
                                        @foreach ($activites as $act)
                                        <tr>
                                            <td>{{ \Carbon\Carbon::parse($act->created_at)->diffForHumans() }}</td>
                                            <td>{{ $act->action }}</td>
                                        </tr><!--end tr-->                                               
                                        @endforeach                                                                               
                                    </tbody>
                                </table>                    
                            </div> 
                        </div>
                    </div>
                </div>                                            
            </div>
        </div> <!--end col-->                                          
    </div><!--end row-->

</div><!-- container -->


@endsection

@section('scripts')
<script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
    }
})

$('#datatable').DataTable();

</script>
@endsection