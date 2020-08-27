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
                        <li class="breadcrumb-item active">My Visited Property</li>
                    </ol>
                </div>
                <h4 class="page-title">My Visited Property</h4>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
    <!-- end page title end breadcrumb -->
   
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="ml-2 mt-1"> 
                        <a href="{{ route('visits') }}" class="text-primary mr-4"><i class="fa fa-backward"></i> Go Back</a>
                        <a href="javascript:void(0);" class="ml-4"><strong class="font-weight-bold">{{ $property->user->name }}</strong> is the owner</a>
                    </div>
                    <br>
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

                            <div class="text-center">
                                {{ $property->title }} in {{ $property->base }}
                            </div>
                        </div>

                        <div class="col-lg-6 offset-lg-1">
                            <div class="card">
                                <div class="card-body">
                                    <h5>Your property Utilities/Bills breakdown</h5>
                                    
                                    @if (count($property->propertyUtilities))
                                    <div class="table-responsive">
                                        <table class="table mt-4">
                                            @php $i=0; @endphp
                                            @foreach ($property->propertyUtilities as $util)
                                            @php $i++; @endphp
                                            <tr class="record">
                                                <td class="{{ ($i==1)? '':'no-border' }}"><span class="font-weight-500 text-primary">{{ ucwords($util->name) }} Bill</span></td>
                                                <td class="{{ ($i==1)? '':'no-border' }}"><a href="/utilities" class="text-primary onUpdate font-weight-600">{{ $util->currency }} {{ number_format($util->amount,2) }}/<small>month</small></a></td>
                                             </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                    @else
                                        <div style="background-image: url('{{ asset('assets/images/svg/3266884.svg') }}'); background-repeat: no-repeat; height:400px"></div>
                                    @endif
                                </div>
                            </div><!--end card-body-->
                        </div>

                    </div>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

</div><!-- container -->

@endsection

@section('scripts')
@endsection