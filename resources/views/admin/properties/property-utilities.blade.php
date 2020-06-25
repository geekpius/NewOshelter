@extends('admin.layouts.app')

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
                        <li class="breadcrumb-item active">Property Utilities</li>
                    </ol>
                </div>
                <h4 class="page-title">Property Utilities</h4>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
    <!-- end page title end breadcrumb -->
   
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3"> 
                        <a href="{{ route('property.manage') }}" class="text-primary mr-4"><i class="fa fa-backward"></i> Go Back</a>
                        <a href="javascript:void(0);" class="ml-4"><strong class="font-weight-bold">{{$property->title}}</strong> </a>
                    </div>
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="card">
                                <div class="blog-card">
                                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                        <ol class="carousel-indicators">
                                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                            @for ((int) $i = 1; $i <= count($images); $i++)
                                            <li data-target="#carouselExampleIndicators" data-slide-to="{{ $i }}" class=""></li>
                                            @endfor
                                        </ol>
                                        <div class="carousel-inner" role="listbox">
                                            <div class="carousel-item active">
                                                <img class="d-block img-fluid" src="{{ asset('assets/images/properties/'.$property->propertyImages->first()->image) }}" alt="{{ $property->propertyImages->first()->caption }}">
                                            </div>
                                            @foreach ($images as $img)
                                            <div class="carousel-item">
                                                <img class="d-block img-fluid" src="{{ asset('assets/images/properties/'.$img->image) }}" alt="{{ $img->caption }}">
                                            </div>
                                            @endforeach
                                        </div>
                                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                </div>
                            </div><!--end blog-card-->
                        </div>

                        <div class="col-lg-6 offset-lg-1">
                            <div class="card">
                                <div class="card-body">
                                    <h5>Choose utilities for this property - <small class="text-pink">Click on amount to change prices</small></h5>
                                    <table class="table mt-3">
                                        <tr>
                                            <td>
                                                <div class="checkbox checkbox-primary">
                                                    <input id="light" type="checkbox">
                                                    <label for="light">
                                                        Light Bill
                                                    </label>
                                                </div>
                                            </td>
                                            <td class="text-right"><a href="/utilities" data-name="Light Bill" class="text-primary onUpdate">GHC 15.00/month</a></td>
                                        </tr>
                                        <tr>
                                            <td class="no-border">
                                                <div class="checkbox checkbox-primary">
                                                    <input id="water" type="checkbox">
                                                    <label for="water">
                                                        Water Bill
                                                    </label>
                                                </div>
                                            </td>
                                            <td class="no-border text-right"><a href="/utilities" data-name="Water Bill" class="text-primary onUpdate">GHC 20.00/month</a></td>
                                        </tr>
                                        <tr>
                                            <td class="no-border">
                                                <div class="checkbox checkbox-primary">
                                                    <input id="sanitation" type="checkbox">
                                                    <label for="sanitation">
                                                        Sanitation
                                                    </label>
                                                </div>
                                            </td>
                                            <td class="no-border text-right"><a href="/utilities" data-name="Sanitation Bill" class="text-primary onUpdate">GHC 30.00/month</a></td>
                                        </tr>
                                    </table>
                                </div>
                            </div><!--end card-body-->
                        </div>

                    </div>
                </div><!--end card-body-->
            </div><!--end card-->
        </div><!--end col-->
    </div> 


    <!-- extend modal -->
    <div id="utilityModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="utilityModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="utilityModalLabel">Update Amount</h5>
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
$(".onUpdate").on("click", function(e){
    e.preventDefault();
    e.stopPropagation();
    var $this = $(this);
    $("#utilityModalLabel").text("Update "+$this.data('name')+ " amount");
    $('#utilityModal').modal('show');
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