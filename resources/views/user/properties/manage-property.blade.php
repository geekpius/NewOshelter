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

                    <div class="table-responsive dash-social">
                        <table id="manageDataTable" class="table">
                            <thead>
                            <tr>
                                <th>Title</th>
                                <th>Type</th>
                                <th>Status</th>
                                <th>Location</th>   
                                <th>Rent Times</th>   
                                {{-- <th>Action</th> --}}
                            </tr><!--end tr-->
                            </thead>

                            <tbody>
                                @foreach ($properties as $property)
                                <tr>
                                    <td  data-toggle="popover" data-trigger="hover" data-placement="left" data-html=true data-title='<img src="{{ asset('assets/images/properties/'.$property->propertyImages->first()->image) }}" alt="{{ $property->title }}" class="img-responsive img-thumbnail" height="400" width="400">'>
                                        {{ $property->title }}
                                    </td>
                                    <td>{{ ucwords($property->type) }}</td>
                                    <td>{{ ucwords($property->type_status) }}</td>
                                    <td>{{ $property->propertyLocation->location }}</td>
                                    <td>{{ $property->userVisits->count() }}</td>
                                    {{-- <td>                                                       
                                       <a href="{{ route('property.manage.detail', $property->id) }}" title="View {{ $property->title }}"><i class="fas fa-eye text-primary font-16"></i></a>
                                    </td> --}}
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
// wrap table with dataTable
$('#manageDataTable').DataTable();
</script>
@endsection