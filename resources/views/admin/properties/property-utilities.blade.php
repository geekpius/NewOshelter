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
                                    <h5>Set utilities/Bills for this property - <small class="text-pink">Click on amount to change prices</small></h5>
                                    <button class="btn btn-primary btn-sm px-4" id="btnAddBill"><i class="fa fa-plus-circle"></i> Add Bill</button>
                                    <div id="getBillContent"></div>
                                </div>
                            </div><!--end card-body-->
                        </div>

                    </div>
                </div><!--end card-body-->
            </div><!--end card-->
        </div><!--end col-->
    </div> 


      <!-- extend modal -->
      <div id="addUtilityModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="addUtilityModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="addUtilityModalLabel">Add New Bill</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal form-material mb-0" id="formAddBill">
                        <input type="hidden" name="property_id" id="property_id" value="{{ $property->id }}" readonly />
                        <div class="form-group validate">
                            <select name="bill" id="bill" class="form-control">
                                <option value="">--Select bill--</option>
                                <option value="light">Light</option>
                                <option value="water">Water</option>
                                <option value="sanitation">Sanitation</option>
                            </select>
                            <span class="text-danger small mySpan" role="alert"></span>                                  
                        </div>
                        <div class="form-group validate">
                            <input type="text" name="amount" id="amount" placeholder="Enter Amount" class="form-control">
                            <span class="text-danger small mySpan" role="alert"></span>                                  
                        </div>
                        <div class="form-group validate">
                            <select name="currency" id="currency" class="form-control">
                                <option value="GHC">Ghana(GHC)</option>
                            </select>
                            <span class="text-danger small mySpan" role="alert"></span>                                  
                        </div>
                        <div class="form-group">
                            <button class="btn btn-gradient-primary btn-sm text-light px-4 mt-3 float-right btnAddBill"><i class="mdi mdi-plus-circle fa-lg"></i> Add Bill</button>
                        </div>
                    </form>                     
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->  
    
</div><!-- container -->

@endsection

@section('scripts')
<script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
    }
})

function getBillContent()
{
    $.ajax({
        url: "{{ route('property.utilities.list', $property->id) }}",
        type: "GET",
        success: function(resp){
            $("#getBillContent").html(resp);
        },
        error: function(resp){
            console.log('something went wrong with request');
        }
    });
}
getBillContent();

$("#btnAddBill").on("click", function(e){
    e.preventDefault();
    e.stopPropagation();
    var $this = $(this);
    $('#addUtilityModal').modal('show');
    return false;
});

$("#formAddBill").on("submit", function(e){
    e.preventDefault();
    e.stopPropagation();
    var $this = $(this);
    var valid = true;
    $('#formAddBill input, #formAddBill select').each(function() {
        let $this = $(this);
        
        if(!$this.val()) {
            valid = false;
            $this.parents('.validate').find('.mySpan').text('The '+$this.attr('name').replace(/[\_]+/g, ' ')+' field is required');
        }
    });

    if(valid){
        $(".btnAddBill").html('<i class="fa fa-spin fa-spinner"></i> Adding Bill...').attr('disabled',true);
        let data = $this.serialize();
        $.ajax({
            url: "{{ route('property.utilities.submit') }}",
            type: "POST",
            data: data,
            success: function(resp){
                if(resp=='success'){
                    getBillContent();
                    $("#formAddBill #amount, #formAddBill #bill").val('');
                    $('#addUtilityModal').modal('hide');
                }else{
                    swal("Error", resp, "error");
                }
                $(".btnAddBill").html('<i class="mdi mdi-plus-circle fa-lg"></i> Add Bill').attr('disabled',false);
            },
            error: function(resp){
                console.log('something went wrong with request');
            }

        });
    }
    return false;
});

$('#amount').keypress(function(event) {
    if (((event.which != 46 || (event.which == 46 && $(this).val() == '')) ||
            $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
        event.preventDefault();
    }
}).on('paste', function(event) {
    event.preventDefault();
});
</script>
@endsection