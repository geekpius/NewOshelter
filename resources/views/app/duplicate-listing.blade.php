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
                        <li class="breadcrumb-item active">Found Something</li>
                    </ol>
                </div>
                <h4 class="page-title">Found Something?</h4>
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
                            <div class="mb-5">
                                <i class="fa fa-home fa-5x"></i>
                                <h5>Would you like to list new property?</h5>
                                <a href="{{ route('property.start') }}" class="text-primary">Start New Listing</a> 
                            </div> 

                            @foreach ($property as $item)
                            <div class="mb-5">
                                <i class="fa fa-home fa-5x"></i>
                                <h5><i class="fa fa-dot-circle" style="font-size:10px"></i> {{ $item->title }}</h5>
                                <a href="{{ route('property.create', $item->id) }}" class="text-primary">Complete Listing</a> &nbsp; &nbsp; || &nbsp; &nbsp;
                                <a href="{{ route('property.edit',$item->id) }}" class="text-warning">Edit Property Type</a> &nbsp; &nbsp; || &nbsp; &nbsp;
                                <a href="{{ route('property.confirmdelete', $item->id) }}" class="text-danger">Remove Listing</a> 
                            </div>     
                            @endforeach

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
</script>
@endsection