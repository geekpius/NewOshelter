@extends('layouts.host')

@section('styles')
<!-- DataTables -->
<link href="{{asset('assets/plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/plugins/datatables/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')

<div class="container-fluid">
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-right">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active">All Tickets</li>
                    </ol>
                </div>
                <h4 class="page-title">All Tickets</h4>
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
                                <th>ID#</th>
                                <th>Subject</th>
                                <th>Help Desk</th>
                                <th>Status</th>   
                                <th>Date</th>   
                                <th>Action</th>
                            </tr><!--end tr-->
                            </thead>

                            <tbody>
                            @foreach ($tickets as $tick)
                                <tr class="record">
                                    <td>#{{$tick->id}}</td>
                                    <td class="text-primary">{{$tick->subject}}</td>
                                    <td>{{$tick->help_desk}}</td>
                                    <td>
                                    @if (!$tick->status)
                                        Pending
                                    @else
                                        Closed
                                    @endif    
                                    </td>
                                    <td>{{\Carbon\Carbon::parse($tick->created_at)->diffForHumans() }}</td>
                                    <td>                                                       
                                        <a href="{{ route('host.ticket.read', $tick->id) }}" class="mr-3" title="View"><i class="fa fa-eye text-primary font-16"></i></a>
                                        @if (!$tick->status)
                                        <a href="javascript:void(0);" data-id="{{ $tick->id }}" data-href="{{ route('host.ticket.close',$tick->id) }}" class="btnClose" title="Close"><i class="fas fa-times-circle text-danger font-16"></i></a>
                                        @endif
                                    </td>
                                </tr><!--end tr-->
                            @endforeach                                       
                            </tbody>
                        </table>                    
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
    $('#datatable').DataTable();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
        }
    })


    $("#datatable tbody").on("click", ".btnClose", function(e){
        e.preventDefault();
        e.stopPropagation();
        var $this = $(this);

        swal({
            title: "Are you sure?",
            text: "You are about to close ticket #"+$this.data('id'),
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger btn-sm",
            cancelButtonClass: "btn-sm",
            confirmButtonText: "Yes, Close",
            closeOnConfirm: true
        },
        function(){
            $this.addClass('disabled');
            $.ajax({
                url: $this.data('href'),
                type: "GET",
                success: function(resp){
                    if(resp=='success'){
                        jQuery.trim($this.parents('.record').find('td').eq(3).text('Closed'));
                        $this.remove();
                    }
                    else{
                        alert("Something went wrong. Refresh page");
                    }
                    $this.removeClass('disabled');
                },
                error: function(resp){
                    alert("Something went wrong with your request");
                    $this.removeClass('disabled');
                }
            });
        });

        
        return false;
    });
</script>
@endsection