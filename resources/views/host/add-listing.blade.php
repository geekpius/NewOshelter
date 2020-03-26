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
                        <li class="breadcrumb-item active">New Listing</li>
                    </ol>
                </div>
                <h4 class="page-title">New Listing</h4>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
    <!-- end page title end breadcrumb -->
   
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                   
                    <div class="row">
                        <div class="col-lg-1"></div>
                        <div class="col-lg-5">
                            <h4>What kind of property are you listing?</h4>
                            <form class="mt-4" id="formPropertyType" method="POST" action="{{ route('host.property.store') }}">
                                @csrf
                                <input type="hidden" name="step" value="0" readonly>
                                <div class="form-group validate">
                                    <label for="">Choose your base property</label>
                                    <select name="base_property" class="form-control" id="base_property">
                                        <option value="">--Select--</option>
                                        <option value="house">House</option>
                                        <option value="apartment">Apartment</option>
                                        <option value="building">Building</option>
                                        <option value="storey_building">Storey Building</option>
                                    </select>
                                    <span class="text-danger small" role="alert"></span>
                                </div>
                                <div class="form-group validate">
                                    <label for="">Now choose your property type</label>
                                    <select name="property_type" class="form-control" id="property_type">
                                        <option value="">--Select--</option>
                                        @foreach ($property_types as $type)
                                        <option value="{{ strtolower(str_replace(' ','_',$type->name))  }}">{{ $type->name }}</option>    
                                        @endforeach
                                    </select>
                                    <span class="text-danger small" role="alert"></span>
                                </div>
                                <div class="form-group validate">
                                    <label for="">Property Title</label>
                                    <input type="text" name="property_title" class="form-control" placeholder="eg: Single room self contain">
                                    <span class="text-danger small" role="alert"></span>
                                </div>
                                <div class="form-group validate">
                                    <label for="">What do you want to do with your property?</label>
                                    <select name="property_type_status" class="form-control" id="property_type_status">
                                        <option value="">--Select--</option>
                                        <option value="rent">I want to rent out</option>                                        
                                        <option value="sell">I want to sell</option>                                        
                                        <option value="auction">I want to auction</option>                                        
                                    </select>
                                    <span class="text-danger small" role="alert"></span>
                                </div>
                                <div class="form-group mt-5">
                                    <button type="submit" class="btn btnMove btn-gradient-primary btn-sm">
                                        <i class="fa fa-arrow-right"></i>
                                        Lets build a property portfolio
                                    </button>
                                </div>
                            </form>



                        </div>
                        <div class="col-lg-6">
                            <p class="mt-4 ml-5">Finding it difficult? <a href="javascript:void(0);" class="text-primary" data-toggle="modal" data-animation="bounce" data-target="#tutorialModal">Property listing tutorial for you</a></p>
                        </div>
                    </div><!-- end row --> 


                </div><!--end card-body-->
            </div><!--end card-->
        </div><!--end col-->
    </div> 
    
    <!-- tutorial modal -->
    <div id="tutorialModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="tutorialModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="tutorialModalLabel">Listing Tutorials</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <p>Cras mattis consectetur purus sit amet fermentum.
                        Cras justo odio, dapibus ac facilisis in,
                        egestas eget quam. Morbi leo risus, porta ac
                        consectetur ac, vestibulum at eros.</p>
                    <p>Praesent commodo cursus magna, vel scelerisque
                        nisl consectetur et. Vivamus sagittis lacus vel
                        augue laoreet rutrum faucibus dolor auctor.</p>
                    <p>Aenean lacinia bibendum nulla sed consectetur.
                        Praesent commodo cursus magna, vel scelerisque
                        nisl consectetur et. Donec sed odio dui. Donec
                        ullamcorper nulla non metus auctor
                        fringilla.</p>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    
</div><!-- container -->

@endsection

@section('scripts')

<script>
$("#formPropertyType").on("submit", function(e){
    e.stopPropagation();
    var valid = true;
    $('#formPropertyType input, #formPropertyType select').each(function() {
        var $this = $(this);
        
        if(!$this.val()) {
            valid = false;
            $this.parents('.validate').find('span').text('The '+$this.attr('name').replace(/[\_]+/g, ' ')+' field is required');
        }
    });

    if(valid){
        $(".btnMove").html('<i class="fa fa-spin fa-spinner"></i> Lets build a property portfolio').attr('disabled',true);
        return true;
    }
    return false;
});


//remove error message if inputs are filled
$("input").on('input', function(){
    if($(this).val()!=''){
        $(this).parents('.validate').find('span').text('');
    }else{ $(this).parents('.validate').find('span').text('The '+$(this).attr('name').replace(/[\_]+/g, ' ')+' field is required'); }
});

$("select").on('change', function(){
    if($(this).val()!=''){
        $(this).parents('.validate').find('span').text('');
    }else{ 
        $(this).parents('.validate').find('span').text('The '+$(this).attr('name').replace(/[\_]+/g, ' ')+' field is required');
    }
});

$("#property_type").on("change", function(){
    var $this = $(this);
    $("#property_type_status").val('');
    if($this.val()=='hostel'){
        $('#property_type_status option:first').next().nextAll().hide();
    }else{
        $('#property_type_status option:first').next().nextAll().show();
    }
    return false;
});
</script>
@endsection