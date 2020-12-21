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
                        <li class="breadcrumb-item active">My Properties</li>
                    </ol>
                </div>
                <h4 class="page-title">My Properties</h4>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
    <!-- end page title end breadcrumb -->
   
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3"> 
                        <a href="{{ route('property.manage') }}" class="text-primary mr-4"><i class="fa fa-backward"></i> Go Back</a>
                        <a href="javascript:void(0);" class="ml-4"><strong class="font-weight-bold">{{$property->title}}</strong> </a>
                    </div>

                    <div class="row">
                        <div class="col-lg-5">
                            <div class="card">
                                <div class="blog-card">
                                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                        <ol class="carousel-indicators">
                                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                            @for ((int) $i = 1; $i <= count($images); $i++)
                                            <li data-target="#carouselExampleIndicators" data-slide-to="{{ $i }}" class=""></li>
                                            @endfor
                                        </ol>
                                        <div class="carousel-inner" role="listbox">
                                            <div class="carousel-item active">
                                                <img class="d-block img-fluid" src="{{ asset('assets/images/properties/'.$property->propertyImages->first()->image) }}" alt="{{ $property->propertyImages->first()->caption }}">
                                            </div>
                                            @foreach ($images as $img)
                                            <div class="carousel-item">
                                                <img class="d-block img-fluid" src="{{ asset('assets/images/properties/'.$img->image) }}" alt="{{ $img->caption }}">
                                            </div>
                                            @endforeach
                                        </div>
                                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                </div>
                            </div><!--end blog-card-->
                        </div>

                        <div class="col-lg-6 offset-lg-1">
                            <div class="card">
                                <div class="card-body">
                                    <h4>Visitors</h4>
                                    <table id="manageDataTable" class="table">
                                        <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Check In</th>
                                            <th>Check Out</th>
                                        </tr><!--end tr-->
                                        </thead>
            
                                        <tbody>
                                            @foreach ($property->userVisits as $visit)
                                            <tr>
                                                <td>{{ $visit->user->name }}</td>
                                                <td>{{ \Carbon\Carbon::parse($visit->check_in)->format('d-M-Y') }}</td>
                                                <td>{{ \Carbon\Carbon::parse($visit->check_out)->format('d-M-Y') }}</td>
                                            </tr><!--end tr-->
                                            @endforeach                       
                                        </tbody>
                                    </table>            
                                </div>
                            </div><!--end card-body-->
                        </div>

                    </div>

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
// wrap table with dataTable
$('#manageDataTable').DataTable();
</script>
@endsection