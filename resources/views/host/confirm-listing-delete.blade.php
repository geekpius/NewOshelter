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
                        <li class="breadcrumb-item active">Confirm Delete</li>
                    </ol>
                </div>
                <h4 class="page-title">Confirm Delete</h4>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
    <!-- end page title end breadcrumb -->
   
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                   
                    <div class="row">
                        <div class="col-lg-4 col-sm-3"></div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="mb-5">
                                @include('includes.alerts')
                                <form class="mt-4" id="formConfirm" method="POST" action="{{ route('host.property.delete', $property->id) }}">
                                    @csrf
                                    <div class="form-group validate">
                                        <label for="">Let us know that it is you.</label>
                                        <input type="password" name="password" class="form-control" placeholder="Confirm your password">
                                        <span class="text-danger small mySpan" role="alert">{{ $errors->has('password') ? $errors->first('password') : '' }}</span>
                                    </div>
                                    <div class="form-group mt-3">
                                        <button type="submit" class="btn btnConfirm btn-gradient-danger btn-sm btn-block">
                                            <i class="fa fa-arrow-right"></i>
                                            Confirm Delete
                                        </button>
                                    </div>
                                </form>
                            </div> 
                        </div>
                    </div><!-- end row --> 


                </div><!--end card-body-->
            </div><!--end card-->
        </div><!--end col-->
    </div> 
    
</div><!-- container -->

@endsection

@section('scripts')
<script>
    $("#formConfirm").on("submit", function(e){
        e.stopPropagation();
        var valid = true;
        $('#formConfirm input').each(function() {
            var $this = $(this);
            
            if(!$this.val()) {
                valid = false;
                $this.parents('.validate').find('.mySpan').text('The '+$this.attr('name').replace(/[\_]+/g, ' ')+' field is required');
            }
        });
    
        if(valid){
            $(".btnConfirm").html('<i class="fa fa-spin fa-spinner"></i> Deleting...').attr('disabled',true);
            return true;
        }
        return false;
    });
    
    
    //remove error message if inputs are filled
    $("input").on('input', function(){
        if($(this).val()!=''){
            $(this).parents('.validate').find('.mySpan').text('');
        }else{ $(this).parents('.validate').find('.mySpan').text('The '+$(this).attr('name').replace(/[\_]+/g, ' ')+' field is required'); }
    });
    
</script>
@endsection