@extends('layouts.site')

@section('style') 
<!-- DataTables -->
<link href="{{asset('assets/plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="pxp-content pull-content-down">
    <div class="container">
        <h2>Upcoming Hostel Visits</h2>  
        <p>
            <strong>{{ Auth::user()->name }},</strong> visits 
        </p>
        <div class="pt-4">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-bordered-blue">
                        <div class="card-body">
                            <!-- Nav tabs -->
                            <ul class="nav" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active text-dark font-weight-500" href="{{ route('visits.hostel.upcoming') }}" role="tab">Upcoming</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-primary" href="{{ route('visits.hostel.past') }}" role="tab">Past</a>
                                </li>
                            </ul>

                            <div class="table-responsive mt-3">
                                <table id="datatable" class="table table-striped">
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
                                            {{-- <th>Action</th> --}}
                                        </tr><!--end tr-->
                                    </thead>
    
                                    <tbody>
                                        @foreach (Auth::user()->userHostelVisits->where('check_in','>',\Carbon\Carbon::today()) as $visit)
                                        <tr>
                                            <td>{{ \Carbon\Carbon::parse($visit->created_at)->diffForHumans() }}</td>
                                            <td>{{ $visit->property->title }}</td>
                                            <td>{{ $visit->property->user->name }}</td>
                                            <td>{{ $visit->hostelBlockRoom->propertyHostelBlock->block_name }}({{ $visit->hostelBlockRoom->block_room_type }})</td>
                                            <td>{{ $visit->hostelBlockRoomNumber->room_no }}</td>
                                            <td>{{ \Carbon\Carbon::parse($visit->check_in)->format('d-M-Y') }}</td>
                                            <td>{{ \Carbon\Carbon::parse($visit->check_out)->format('d-M-Y') }}</td>
                                            <td><span class="badge badge-md badge-{{ ($visit->is_in)? 'success':'danger' }}">{{ $visit->checkInOrOut() }}</span></td>
                                            {{-- <td>
                                                <a href="{{ route('visits.property', $visit->property_id) }}" class="mr-3" title="View Property"><i class="fas fa-home text-primary font-16"></i></a>
                                            </td> --}}
                                        </tr><!--end tr-->
                                        @endforeach                                                                                   
                                    </tbody>
                                </table>                         
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