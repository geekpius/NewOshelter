@extends('layouts.site')

@section('style') 
<!-- DataTables -->
<link href="{{asset('assets/plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="pxp-content pull-content-down">
    <div class="container">
        <h2>Upcoming Residence Visits</h2>  
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
                                    <a class="nav-link active text-dark font-weight-500" href="{{ route('visits.upcoming') }}" role="tab">Upcoming</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-primary" href="{{ route('visits.past') }}" role="tab">Past</a>
                                </li>
                            </ul>

                            <div class="table-responsive mt-3">
                                <table id="datatable" class="table table-striped">
                                    <thead class="thead-light">
                                    <tr>                                        
                                        <th>Booked At</th>
                                        <th>Property</th>
                                        <th>Owner</th>
                                        <th>Check In</th>
                                        <th>Check Out</th>
                                        <th>Guest</th>
                                        <th>Status</th>
                                        {{-- <th>Action</th> --}}
                                    </tr><!--end tr-->
                                    </thead>

                                    <tbody>
                                        @foreach (Auth::user()->userVisits->where('check_in','>',\Carbon\Carbon::today()) as $visit)
                                        <tr>
                                            <td>{{ \Carbon\Carbon::parse($visit->created_at)->diffForHumans() }}</td>
                                            <td>{{ $visit->property->title }}</td>
                                            <td><img src="{{ asset('assets/images/users/'.$visit->property->user->image) }}" alt="" class="thumb-sm rounded-circle mr-2">{{ $visit->property->user->name }}</td>
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