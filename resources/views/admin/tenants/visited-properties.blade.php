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
                        <li class="breadcrumb-item active">Rented Properties</li>
                    </ol>
                </div>
                <h4 class="page-title">Rented Properties</h4>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
    <!-- end page title end breadcrumb -->
   
    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="ml-2 mt-1"> 
                    <a href="{{ route('tenants') }}" class="text-primary mr-4"><i class="fa fa-backward"></i> Go Back</a>
                    <a href="javascript:void(0);" class="ml-4"><strong class="font-weight-bold">{{ $user->name }}</strong> Rented Properties </a>
                </div>
                <div class="card-body">
                    @if (count($visits))
                    <div class="row">
                        @foreach ($visits as $visit)
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-body myParent">
                                    <div class="blog-card">
                                        <img src="{{ asset('assets/images/properties/'.$visit->property->propertyImages->first()->image) }}" alt="PropertyPhoto" class="img-fluid">
                                        <div class="meta-box">
                                            <ul class="p-0 mt-4 list-inline">
                                                <li class="list-inline-item"><i class="fa fa-sign-in-alt"></i> {{  \Carbon\Carbon::parse($visit->check_in)->format('d M, Y')  }}</li>
                                                <li class="list-inline-item"><i class="fa fa-sign-out-alt"></i> {{  \Carbon\Carbon::parse($visit->check_out)->format('d M, Y')  }}</li>
                                                @php
                                                    $checkIn = \Carbon\Carbon::parse($visit->check_in);
                                                    $checkOut = \Carbon\Carbon::parse($visit->check_out);
                                                @endphp
                                                <li class="list-inline-item text-danger text-lowercase">{{  ($checkIn->diffInDays($checkOut, false)>1)? $checkIn->diffInDays($checkOut, false).' days left':$checkIn->diffInDays($checkOut, false).' day left'  }}</li>
                                           </ul>
                                        </div><!--end meta-box-->            
                                        <h5 class="mt-2 text-primary">{{ $visit->property->title }}</h5>
                                        <span>{{ $visit->property->propertyLocation->location }}</span>
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
@endsection