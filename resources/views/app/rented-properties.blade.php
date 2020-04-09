@extends('layouts.app')

@section('styles')
@endsection
@section('content')

<div class="container-fluid">
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-right">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active">Rented Properties</li>
                    </ol>
                </div>
                <h4 class="page-title">Rented Properties</h4>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
    <!-- end page title end breadcrumb -->
   
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3"> 
                        <a href="javascript:void(0);" class="mr-4"> {{$user->name}} Rented Properties </a>
                        <a href="javascript:void(0);" class="text-primary ml-4" onclick="window.location='{{ route('tenant') }}';"><i class="fa fa-backward"></i> Go Back</a>
                    </div>
                    @if (count($user->propertyRents))
                    <div class="row">
                        @foreach ($user->propertyRents as $rent)
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="dropdown d-inline-block float-right">
                                        <a class="nav-link dropdown-toggle arrow-none" id="dLabel1" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v font-20 text-muted"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dLabel1">
                                            <a class="dropdown-item text-primary btnExtend" href="javascript:void(0);"><i class="fa fa-calendar"></i> Extend</a>
                                            <a class="dropdown-item text-danger btnEvict" href="javascript:void(0);"><i class="fa fa-arrow-right"></i> Evict</a>
                                        </div>
                                    </div>

                                    <div class="blog-card">
                                        <a href="{{ route('property.preview', $rent->property->id) }}">
                                            <img src="{{ asset('assets/images/properties/'.$rent->property->propertyImages->first()->image) }}" alt="PropertyPhoto" class="img-fluid">
                                        </a>
                                        <div class="meta-box">            
                                            <h5 class="mt-3">
                                                <a href="{{ route('property.preview', $rent->property->id) }}" class="text-primary">{{ $rent->property->title }}</a>
                                            </h5>
                                            <ul class="p-0 mt-0 list-inline">
                                                <li class="list-inline-item text-capitalize"><i class="fa fa-map-marker"></i> {{$rent->property->propertyLocation->location}}</li>
                                                <li class="list-inline-item"><i class="fa fa-clock"></i> {{  \Carbon\Carbon::parse($rent->created_at)->format('d M, Y')  }}</li>
                                            </ul>
                                            <ul class="p-0 mt-0 list-inline">
                                                <li class="list-inline-item text-capitalize"><i class="fa fa-money-bill"></i> Rented at {{$rent->currency}} {{number_format($rent->amount,2)}} <small class="text-lowercase">per {{ $rent->price_calendar }}</small></li>
                                                <li class="list-inline-item text-lowercase">
                                                    <i class="fa fa-calendar"></i>  
                                                    @if ($rent->payment_duration==3)
                                                        <span>3 months advance paid</span>
                                                    @elseif ($rent->payment_duration==6)
                                                        <span>6 months advance paid</span>
                                                    @elseif ($rent->payment_duration==12)
                                                        <span>1 year advance paid</span>
                                                    @elseif ($rent->payment_duration==24)
                                                        <span>2 years advance paid</span>
                                                    @endif
                                                </li>
                                            </ul>
                                            <ul class="p-0 mt-0 list-inline">
                                                <li class="list-inline-item text-capitalize"><i class="fa fa-clock"></i> Move In Date: {{ \Carbon\Carbon::parse($rent->date_from)->format('d M, Y') }}</li>
                                                <li class="list-inline-item text-capitalize"><i class="fa fa-clock"></i> Move Out Date: {{ \Carbon\Carbon::parse($rent->date_to)->format('d M, Y') }}</li>
                                            </ul>
                                        </div><!--end meta-box-->
                                    </div><!--end blog-card-->                                   
                                </div><!--end card-body-->
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @else
                    <div class="text-center mt-5 mb-3">
                        <div class="alert icon-custom-alert alert-outline-pink b-round fade show" role="alert">                                            
                            <i class="mdi mdi-alert-outline alert-icon"></i>
                            <div class="alert-text">
                                <strong>None!</strong> No property found in your lists. You can add new property list now.
                            </div>
                            
                            <div class="alert-close">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true"><i class="mdi mdi-close text-danger"></i></span>
                                </button>
                            </div>
                        </div>
                    </div>                    
                    @endif

                </div><!--end card-body-->
            </div><!--end card-->
        </div><!--end col-->
    </div> 


    <!-- extend modal -->
    <div id="extendModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="extendModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="extendModalLabel">Extend Tenant Stay</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                                       
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->  
    
</div><!-- container -->

@endsection

@section('scripts')
<script>
$(".btnExtend").on("click", function(e){
    e.preventDefault();
    e.stopPropagation();
    var $this = $(this);
    $('#extendModal').modal('show');
    return false;
});

$(".btnEvict").on("click", function(e){
    e.preventDefault();
    e.stopPropagation();
    var $this = $(this);
    swal({
        title: "Are you sure?",
        text: "You are about evict tenant. This action is irreversible.",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger btn-sm",
        cancelButtonClass: "btn-sm",
        confirmButtonText: "Yes, Evict",
        closeOnConfirm: false
        },
    function(){
        //window.location = $href;
    });
    //swal("Exceed", "You can not upload more than 10 photos.", "warning");
    return false;
});
</script>
@endsection