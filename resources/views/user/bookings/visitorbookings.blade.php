@extends('layouts.site')

@section('style') 
<!-- DataTables -->
<link href="{{asset('assets/plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="pxp-content pull-content-down">
    <div class="container">
        <h2>My Bookings</h2>  
        <p>
            <strong>{{ Auth::user()->name }},</strong> account owner 
        </p>
        <div class="pt-4">
            <div class="row">
                <div class="col-sm-12 mb-3">
                    <a class="text-decoration-none" href="{{ route('account.requests') }}">&lt;Back</a>
                </div>
                <div class="col-sm-12">
                    <div class="card card-bordered-blue">
                        <div class="card-body">
                            <ul class="nav" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link text-dark" href="#" id="btnResidence" role="tab">Residence</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-primary font-weight-500" href="#" id="btnHostel" role="tab">Hostel</a>
                                </li>
                            </ul>

                            <div class="table-responsive" id="residenceTable">
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
                                        @foreach (Auth::user()->userBookings as $booking)
                                        <tr>
                                            <td>{{ \Carbon\Carbon::parse($booking->created_at)->diffForHumans() }}</td>
                                            <td><a target="_blank" href="{{ route('property.preview', $booking->property_id) }}">{{ $booking->property->title }}</a></td>
                                            @php $image = (empty($booking->property->user->image))? 'user.svg':'users/'.$booking->property->user->image; @endphp
                                            <td><img src="{{ asset('assets/images/'.$image) }}" alt="{{ $booking->property->user->name }}" class="thumb-sm rounded-circle mr-2">{{ $booking->property->user->name }}</td>
                                            <td>{{ \Carbon\Carbon::parse($booking->check_in)->format('d-M-Y') }}</td>
                                            <td>{{ \Carbon\Carbon::parse($booking->check_out)->format('d-M-Y') }}</td>
                                            <td class="text-center">{{ $booking->getGuestAttribute() }}</td>
                                            <td>
                                                @if ($booking->isPendingAttribute())
                                                    <span class="text-primary"><i class="fa fa-spin fa-spinner"></i> Pending</span>
                                                @elseif ($booking->isConfirmAttribute())
                                                    <a href="#" class="btnViewLocation text-decoration-none" data-text="{{ $booking->property->title }}" data-link="https://www.google.com/maps/place/{{ $booking->property->propertyLocation->latitude }},{{ $booking->property->propertyLocation->longitude }}" data-title="{{ $booking->property->propertyLocation->location }}" data-lat="{{ $booking->property->propertyLocation->latitude }}" data-lng="{{ $booking->property->propertyLocation->longitude }}">
                                                        <span class="text-success"><i class="mdi mdi-map-marker"></i> Cofirmed, view location</span>
                                                    </a>
                                                @elseif ($booking->isRejectAttribute())
                                                    <span class="text-danger"><i class="fa fa-times-circle"></i> Cancelled</span>
                                                @elseif ($booking->isCancelAttribute())
                                                    <span class="text-danger"><i class="fa fa-times-circle"></i> Paid but cancelled</span>
                                                @else
                                                    <span class="text-success"><i class="fa fa-check-circle"></i> Paid</span>
                                                @endif
                                            </td>
                                        </tr><!--end tr-->
                                        @endforeach                                                                                   
                                    </tbody>
                                </table>                     
                            </div> 

                            <div class="table-responsive" id="hostelTable" style="display: none">
                                <table id="datatable1" class="table table-striped small">
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
                                        @foreach (Auth::user()->userHostelBookings as $booking)
                                        <tr>
                                            <td>{{ \Carbon\Carbon::parse($booking->created_at)->diffForHumans() }}</td>
                                            <td><a target="_blank" href="{{ route('property.preview', $booking->property_id) }}">{{ $booking->property->title }}</a></td>
                                            @php $image = (empty($booking->property->user->image))? 'user.svg':'users/'.$booking->property->user->image; @endphp
                                            <td><img src="{{ asset('assets/images/'.$image) }}" alt="{{ $booking->property->user->name }}" class="thumb-sm rounded-circle mr-2">{{ $booking->property->user->name }}</td>
                                            {{-- <td>{{ $booking->hostelBlockRoom->propertyHostelBlock->block_name }}({{ $booking->hostelBlockRoom->block_room_type }})</td> --}}
                                            <td>{{ $booking->hostelBlockRoomNumber->hostelBlockRoom->propertyHostelBlock->block_name }}({{ $booking->hostelBlockRoomNumber->hostelBlockRoom->block_room_type }})</td>
                                            <td class="text-center">{{ $booking->hostelBlockRoomNumber->room_no }}</td>
                                            <td>{{ \Carbon\Carbon::parse($booking->check_in)->format('d-M-Y') }}</td>
                                            <td>{{ \Carbon\Carbon::parse($booking->check_out)->format('d-M-Y') }}</td>
                                            <td>
                                                @if ($booking->isPendingAttribute())
                                                    <span class="text-primary"><i class="fa fa-spin fa-spinner"></i> Pending</span>
                                                @elseif ($booking->isConfirmAttribute())
                                                    <a href="#" class="btnViewLocation text-decoration-none" data-text="{{ $booking->property->title }}" data-link="{{ route('property.preview', $booking->property->id) }}" data-title="{{ $booking->property->propertyLocation->location }}" data-lat="{{ $booking->property->propertyLocation->latitude }}" data-lng="{{ $booking->property->propertyLocation->longitude }}">
                                                        <span class="text-success"><i class="mdi mdi-map-marker"></i> Confirmed, view location</span>
                                                    </a>
                                                @elseif ($booking->isRejectAttribute())
                                                    <span class="text-danger"><i class="fa fa-times-circle"></i> Cancelled</span>
                                                @elseif ($booking->isCancelAttribute())
                                                    <span class="text-danger"><i class="fa fa-times-circle"></i> Paid but cancelled</span>
                                                @else
                                                    <span class="text-success"><i class="fa fa-check-circle"></i> Paid</span>
                                                @endif
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

<!-- id modal -->
<div id="locationModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="locationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-heading pl-5 mb-2">
                <a href="javascript:void(0);" class="float-right mr-5 btnShare"><i class="fa fa-share-alt-square fa-lg"></i></a>
                <h6 class="modal-title"></h6>
            </div>
            <div class="modal-body">
                <div id="gmaps-markers" class="gmaps1"></div>        
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->  
@endsection

@section('scripts')
<script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
<!-- Gmaps file -->
<script src="{{ asset('assets/plugins/gmaps/gmaps.min.js') }}"></script>
<!-- demo codes -->
<script src="{{ asset('assets/pages/booking/property.map.js') }}"></script>
<script>
$('#datatable').DataTable();
$('#datatable1').DataTable();
let hostelBtn = document.getElementById('btnHostel');
let residenceBtn = document.getElementById('btnResidence');
function openHostelLink(e){
    e.preventDefault();
    $("#residenceTable").hide("slow");
    hostelBtn.classList.remove("text-primary");
    hostelBtn.classList.add("text-dark");
    $("#hostelTable").show("slow");
    residenceBtn.classList.remove("text-dark");
    residenceBtn.classList.add("text-primary");
}

hostelBtn.addEventListener("click", openHostelLink);

function openResidenceLink(e){
    e.preventDefault();
    $("#hostelTable").hide("slow");
    residenceBtn.classList.remove("text-primary");
    residenceBtn.classList.add("text-dark");
    $("#residenceTable").show("slow");
    hostelBtn.classList.remove("text-dark");
    hostelBtn.classList.add("text-primary");
}

residenceBtn.addEventListener("click", openResidenceLink);

</script>
@endsection