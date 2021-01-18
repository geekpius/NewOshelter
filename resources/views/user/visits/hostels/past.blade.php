@extends('layouts.site')

@section('style') 
<!-- DataTables -->
<link href="{{asset('assets/plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="pxp-content pull-content-down">
    <div class="container">
        <h2>Past Hostel Visits</h2>  
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
                                    <a class="nav-link text-primary" href="{{ route('visits.hostel.upcoming') }}" role="tab">Upcoming</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active text-dark font-weight-500" href="{{ route('visits.hostel.past') }}" role="tab">Past</a>
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
                                            <th>Action</th>
                                        </tr><!--end tr-->
                                    </thead>

                                    <tbody>
                                        @foreach (Auth::user()->userHostelVisits->where('check_in','<=',\Carbon\Carbon::today()) as $visit)
                                        <tr>
                                            <td>{{ \Carbon\Carbon::parse($visit->created_at)->diffForHumans() }}</td>
                                            <td>{{ $visit->property->title }}</td>
                                            <td><img src="{{ asset('assets/images/users/'.$visit->property->user->image) }}" alt="{{ $visit->property->user->name }}" class="thumb-sm rounded-circle mr-2">{{ $visit->property->user->name }}</td>
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
                                            <td>
                                                @if ($visit->isInAttribute())
                                                <a href="/user/visits/past/extend" class="btnExtend mr-2 text-decoration-none" data-duration="{{ $visit->hostelBlockRoom->propertyHostelPrice->payment_duration }}" data-owner="{{ $visit->property->user_id }}" data-id="{{ $visit->id }}" data-type="{{ $visit->property->type }}" data-status="{{ $visit->property->type_status }}" data-checkin="{{ \Carbon\Carbon::parse($visit->check_out)->format('m-d-Y') }}" title="Extend Stay">
                                                    <i class="fas fa-clock text-purple font-16"></i>
                                                </a>
                                                @endif
                                                <a href="{{ route('visits.property.rating', $visit->id) }}" class="text-decoration-none" title="Rate Property">
                                                    <i class="fas fa-star text-warning font-16"></i>
                                                </a>                                               
                                            </td>
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

<!-- withdraw modal -->
<div id="extendModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="extendModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="extendModalLabel">Extend Stay Request</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form id="formHostelExtend" action="{{ route('visits.past.extend') }}" style="display: none">
                    @csrf
                    <input type="hidden" name="visit_id" readonly>
                    <input type="hidden" name="checkin" readonly>
                    <input type="hidden" name="type" readonly>
                    <input type="hidden" name="status" readonly>
                    <input type="hidden" name="owner" readonly>
                    <input type="hidden" name="duration" value="0" readonly>
                    <div class="form-group validate">
                        <label for="extended_date">Extended Date</label>
                        <select name="extended_date" class="form-control">
                            <option value="">--Select rent duration--</option>
                            <option value="3">3 months</option>
                            <option value="4">4 months</option>
                            <option value="6">6 months</option>
                            <option value="8">8 months</option>
                            <option value="9">9 months</option>
                            <option value="12">1 year</option>
                        </select>
                        <span class="text-danger mySpan"></span>
                    </div>
                    <div class="form-group text-right">
                        <button type="submit" class="btn btn-success btnExtendSubmit">Submit</button>
                    </div>
                </form>                    
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->  
@endsection

@section('scripts')
<script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('assets/pages/visits/past.js') }}"></script>
@endsection