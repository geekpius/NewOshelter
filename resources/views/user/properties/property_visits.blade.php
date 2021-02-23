@extends('layouts.site')

@section('style') 
<!-- DataTables -->
<link href="{{asset('assets/plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="pxp-content pull-content-down">
    <div class="container">
        <h2>Property Visits</h2>  
        <p>
            <strong>{{ Auth::user()->name }},</strong> visits 
        </p>
        <div class="pt-4">
            <div class="row">
                <div class="col-sm-12 mb-3">
                    <a class="text-decoration-none" href="{{ route('property') }}">&lt;Back</a>
                </div>
                <div class="col-sm-12">
                    <div class="card card-bordered-blue">
                        <div class="card-body">
                            <div class="table-responsive">
                                @if ($property->type=='hostel')
                                <table id="datatable" class="table table-striped small">
                                    <thead class="thead-light">
                                        <tr>                                        
                                            <th>Booked At</th>
                                            <th>Property</th>
                                            <th>Owner</th>
                                            <th>Block</th>
                                            <th>Room#</th>
                                            <th>Check In</th>
                                            <th>Check Out</th>
                                            <th>Status</th>
                                        </tr><!--end tr-->
                                    </thead>

                                    <tbody>
                                        @foreach ($property->userHostelVisits as $visit)
                                        <tr>
                                            <td>{{ \Carbon\Carbon::parse($visit->created_at)->diffForHumans() }}</td>
                                            <td>{{ $visit->property->title }}</td>
                                            @php $image = (empty($visit->property->user->image))? 'user.svg':'users/'.$visit->property->user->image; @endphp
                                            <td><img src="{{ asset('assets/images/'.$image) }}" alt="{{ $visit->property->user->name }}" class="thumb-sm rounded-circle mr-2">{{ $visit->property->user->name }}</td>
                                            <td>{{ $visit->hostelBlockRoom->propertyHostelBlock->block_name }}({{ $visit->hostelBlockRoom->block_room_type }})</td>
                                            <td>{{ $visit->hostelBlockRoomNumber->room_no }}</td>
                                            <td>{{ \Carbon\Carbon::parse($visit->check_in)->format('d-M-Y') }}</td>
                                            <td>{{ \Carbon\Carbon::parse($visit->check_out)->format('d-M-Y') }}</td>
                                            <td>
                                                @if ($visit->isInAttribute())
                                                <span class="badge badge-md badge-success">IN</span>
                                                @else
                                                <span class="badge badge-md badge-success">OUT</span>                                                    
                                                @endif
                                            </td>
                                        </tr><!--end tr-->
                                        @endforeach                                                                                   
                                    </tbody>
                                </table>    
                                @else  
                                <table id="datatable" class="table table-striped small">
                                    <thead class="thead-light">
                                    <tr>                                        
                                        <th>Booked At</th>
                                        <th>Property</th>
                                        <th>Owner</th>
                                        <th>Check In</th>
                                        <th>Check Out</th>
                                        <th>Guest</th>
                                        <th>Status</th>
                                    </thead>

                                    <tbody>
                                        @foreach ($property->userVisits as $visit)
                                        <tr>
                                            <td>{{ \Carbon\Carbon::parse($visit->created_at)->diffForHumans() }}</td>
                                            <td>{{ $visit->property->title }}</td>
                                            @php $image = (empty($visit->property->user->image))? 'user.svg':'users/'.$visit->property->user->image; @endphp
                                            <td><img src="{{ asset('assets/images/'.$image) }}" alt="{{ $visit->property->user->name }}" class="thumb-sm rounded-circle mr-2">{{ $visit->property->user->name }}</td>
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
                                        </tr><!--end tr-->
                                        @endforeach                                                                                   
                                    </tbody>
                                </table>   
                                @endif                      
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</div>
@endsection

@section('scripts')
<script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script>
$('#datatable').DataTable();
</script>
@endsection