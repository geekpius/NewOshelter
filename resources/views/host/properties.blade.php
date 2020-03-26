@extends('layouts.host')

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
                        <li class="breadcrumb-item active">List Properties</li>
                    </ol>
                </div>
                <h4 class="page-title">Properties</h4>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
    <!-- end page title end breadcrumb -->
   
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="text-center mb-4">
                        <a href="{{ route('host.property.add') }}" class="btn btn-gradient-primary btn-sm text-light"><i class="fa fa-plus-circle"></i> Add New Listing</a>
                    </div>

                    @if (count($properties))
                    <div class="row">
                        @foreach ($properties as $property)
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-body myParent">
                                    <div class="dropdown d-inline-block float-right">
                                        <a class="nav-link dropdown-toggle arrow-none" id="dLabel1" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v font-20 text-muted"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dLabel1">
                                            <a class="dropdown-item text-warning" href="javascript:void(0);" onclick="window.location='{{ route('host.property.preview', $property->id) }}';"><i class="fa fa-eye"></i> Preview</a>
                                            <a class="dropdown-item {{$property->publish? 'text-pink':'text-success'}} btnVisibility" href="javascript:void(0);" data-href="{{ route('host.property.visibility', $property->id) }}" data-title="{{ $property->title }}"><i class="{{$property->publish? 'fa fa-eye-slash':'fa fa-check'}}"></i> {{$property->publish? 'Hide':'Publish'}}</a>
                                            <a class="dropdown-item text-primary" href="javascript:void(0);" onclick="window.location='{{ route('host.property.edit', $property->id) }}';"><i class="fa fa-edit"></i> Edit</a>
                                            <a class="dropdown-item text-danger" href="javascript:void(0);" onclick="window.location='{{ route('host.property.confirmdelete', $property->id) }}';"><i class="fa fa-trash"></i> Delete</a>
                                        </div>
                                    </div>

                                    <div class="blog-card">
                                        <a href="{{ route('host.property.preview', $property->id) }}">
                                            <img src="{{ asset('assets/images/properties/'.$property->propertyImages->first()->image) }}" alt="PropertyPhoto" class="img-fluid">
                                        </a>
                                        <div class="meta-box">
                                            <ul class="p-0 mt-4 list-inline">
                                                <li class="list-inline-item">
                                                    @if ($property->vacant)
                                                        <span class="badge badge-secondary px-3">Available</span>
                                                    @else
                                                        <span class="badge badge-danger px-3">
                                                            @if ($property->type_status=='rent')
                                                                Rented
                                                            @elseif ($property->type_status=='sell')
                                                                Sold
                                                            @else
                                                                Auctioned
                                                            @endif
                                                        </span>
                                                    @endif
                                                </li>
                                                <li class="list-inline-item"><i class="fa fa-clock"></i> {{  \Carbon\Carbon::parse($property->created_at)->format('d M, Y')  }}</li>
                                                <li class="list-inline-item text-capitalize publishStatus"><i class="{{  $property->publish? 'fa fa-check':'fa fa-eye-slash'  }}"></i> {{  $property->publish? 'Published':"Hidden"  }}</li>
                                            </ul>
                                        </div><!--end meta-box-->            
                                        <h5 class="mt-2">
                                            <a href="{{ route('host.property.preview', $property->id) }}" class="text-primary">{{ $property->title }}</a>
                                        </h5>
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

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

</div><!-- container -->

@endsection

@section('scripts')
<script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
    }
})

$(".btnVisibility").on("click", function(e){
    e.preventDefault();
    e.stopPropagation();
    var $this = $(this);
    swal({
        title: "Are you sure?",
        text: "You are about "+$this.text().toLowerCase()+" "+$this.data("title")+" listing.",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: ((jQuery.trim($this.text().toLowerCase())=="hide")? "btn-danger":"btn-success")+" btn-sm",
        cancelButtonClass: "btn-sm",
        confirmButtonText: "Yes, "+$this.text(),
        closeOnConfirm: false
        },
    function(){
        $.ajax({
            url: $this.data('href'),
            type: "POST",
            success: function(resp){
                if(resp=='success'){
                    swal(((jQuery.trim($this.text().toLowerCase())=="hide")? "Hidden":"Published"), "Property "+((jQuery.trim($this.text().toLowerCase())=="hide")? "hidden":"published")+" successful", "success");
                    $this.parents(".myParent").find(".blog-card .publishStatus").html(((jQuery.trim($this.text().toLowerCase())=="hide")? '<i class="fa fa-eye-slash"></i> Hidden':'<i class="fa fa-check"></i> Published'));
                    $this.html(((jQuery.trim($this.text().toLowerCase())=="hide")? '<i class="fa fa-check"></i> Publish':'<i class="fa fa-eye-slash"></i> Hide'));
                    if(jQuery.trim($this.text().toLowerCase())=="hide"){
                        $this.removeClass('text-success').addClass('text-pink');
                    }else{
                        $this.removeClass('text-pink').addClass('text-success');
                    }
                }
                else{
                    alert("Something went wrong");
                }
            },
            error: function(resp){
                alert("Something went wrong with request");
            }
        });
    });
    return false;
});
</script>
@endsection