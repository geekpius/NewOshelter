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
                        <li class="breadcrumb-item active">List Saved</li>
                    </ol>
                </div>
                <h4 class="page-title">Saved Properties</h4>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
    <!-- end page title end breadcrumb -->
   
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @if (count($lists))
                    <div class="row">
                        @foreach ($lists as $list)
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="blog-card">
                                        <a href="{{ route('host.property.preview', $list->property_id) }}">
                                            <img src="{{ asset('assets/images/properties/'.$list->property->propertyImages->first()->image) }}" alt="PropertyPhoto" class="img-fluid">
                                        </a>         
                                        <div class="mt-2 text-center">
                                            <i class="fa fa-trash text-danger float-right" style="cursor:pointer" onclick="window.location='{{ route('host.saved.remove', $list->id) }}'"></i>
                                            <h5>
                                                <a href="{{ route('host.property.preview', $list->property_id) }}" class="text-primary">{{ $list->property->title }}</a>
                                            </h5>
                                        </div>
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
                                <strong>Opps!</strong> No property found in your saved lists.
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
@endsection