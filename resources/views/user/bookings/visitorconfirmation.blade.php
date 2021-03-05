@extends('layouts.site')

@section('style') 
<!-- DataTables -->
<link href="{{asset('assets/plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="pxp-content pull-content-down">
    <div class="container">
        <h2>My Stay Confirmations</h2>  
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
                                            <th>Action</th>
                                        </tr><!--end tr-->
                                    </thead>
    
                                    <tbody>
                                        @foreach (Auth::user()->userVisits->where('check_in','<=',\Carbon\Carbon::today()) as $visit)
                                        <tr class="record">
                                            <td>{{ \Carbon\Carbon::parse($visit->created_at)->diffForHumans() }}</td>
                                            <td>{{ $visit->property->title }}</td>
                                            @php $image = (empty($visit->property->user->image))? 'user.svg':'users/'.$visit->property->user->image; @endphp
                                            <td><img src="{{ asset('assets/images/'.$image) }}" alt="{{ $visit->property->user->name }}" class="thumb-sm rounded-circle mr-2">{{ $visit->property->user->name }}</td>
                                            <td>{{ \Carbon\Carbon::parse($visit->check_in)->format('d-M-Y') }}</td>
                                            <td>{{ \Carbon\Carbon::parse($visit->check_out)->format('d-M-Y') }}</td>
                                            <td>{{ $visit->getGuestAttribute() }}</td>
                                            <td>
                                                <a href="#" class="btnConfirm mr-4 text-decoration-none text-success" title="Confirm your stay">
                                                    <i class="fas fa-check-circle font-16"></i>
                                                </a>
                                                <a href="#" class="text-decoration-none btnReject text-danger" title="Cancel your stay">
                                                    <i class="fas fa-times-circle font-16"></i>
                                                </a>
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
                                            <th>Action</th>
                                        </tr><!--end tr-->
                                    </thead>

                                    <tbody>
                                        @foreach (Auth::user()->userHostelVisits->where('check_in','<=',\Carbon\Carbon::today()) as $visit)
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
                                                <a href="#" class="btnConfirm mr-4 text-decoration-none text-success" title="Confirm your stay">
                                                    <i class="fas fa-check-circle font-16"></i>
                                                </a>
                                                <a href="#" class="text-decoration-none btnReject text-danger" title="Cancel your stay">
                                                    <i class="fas fa-times-circle font-16"></i>
                                                </a>                                            
                                            </td>
                                        </tr><!--end tr-->
                                        @endforeach                                                                                   
                                    </tbody>
                                </table>                         
                            </div> 
                            <div class="mt-2">
                                <p class="font-13">
                                    <span class="text-danger">Note:</span> You are oblige as visitor to either <i class="fas fa-check-circle text-success"></i> confirm your stay or 
                                    <i class="fas fa-times-circle text-danger"></i> cancel your stay. Confirming your stay means you have given the right for owner to cashout.
                                </p>
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

$("#datatable tbody").on("click", ".btnConfirm", function(){
    var $this = $(this);
    swal({
        title: "Confirm",
        text: "You are about to confirm your stay",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-primary btn-sm",
        cancelButtonClass: "btn-danger btn-sm",
        confirmButtonText: "Confirm",
        closeOnConfirm: true
        },
    function(){
        $this.parents('.record').find('td').eq(6).html('<span class="text-success">Confirmed</span>');
        // $.ajax({
        //     url: $this.attr('action'),
        //     type: "POST",
        //     data: data,
        //     success: function(resp){
        //         if(resp=='success'){
        //             swal({
        //                 title: "Confirmed",
        //                 text: "You have sent a booking request to owner\nWait for owner confirmation.",
        //                 type: "success",
        //                 confirmButtonClass: "btn-primary btn-sm",
        //                 confirmButtonText: "Okay",
        //                 closeOnConfirm: true
        //                 },
        //             function(){
        //                 window.location.href = $(".confirmBooking").data('href');
        //             });
        //         }else{
        //             swal("Warning", resp, "warning");
        //             $(".confirmBooking").text('<i class="fa fa-spinner fa-spin"></i> CONFIRM BOOKING REQUEST').attr('disabled', false);
        //         }
        //     },
        //     error: function(resp){
        //         console.log("Something went wrong with request");
        //     }
        // });
    });
    return false;
});
</script>
@endsection