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
                        <li class="breadcrumb-item active">My Visits</li>
                    </ol>
                </div>
                <h4 class="page-title">My Visits</h4>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
    <!-- end page title end breadcrumb -->
   
    <div class="card">
        
        <div class="row">
          
            <div class="col-sm-12">

                <div class="card-body pt-12">

                    <h4 class="header-title mt-lg-12 mb-3">Visits History</h4> 

                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs nav-justified" role="tablist">
                        <li class="nav-item waves-effect waves-light">
                            <a class="nav-link active text-primary font-weight-500" href="{{ route('visits') }}" role="tab">Choose from below</a>
                        </li>
                    </ul>
                    <br>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active p-3" id="all" role="tabpanel">
                            <div class="row">
                          
                                <div class="col-sm-4 offset-sm-4 col-lg-3 offset-lg-3">
                                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                        <ol class="carousel-indicators">
                                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                        </ol>
                                        <div class="carousel-inner" role="listbox">
                                            <a href="{{ route('visits.hostel') }}">
                                                <div class="carousel-item active">
                                                    <img class="d-block img-fluid" src="{{ asset('assets/images/hostel.jpg') }}" alt="hostel" style="display: block; position: relative; overflow: hidden; 
                                                    height: 320px; margin-bottom: 10px;background-size: cover; background-position: center center; background-repeat: no-repeat; border-top-left-radius: 2%; border-top-right-radius: 2%" />
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <h4>
                                        <a href="{{ route('visits.hostel') }}">Hostel Rents</a>
                                    </h4>
                                </div>

                                <div class="col-sm-4 col-lg-3">
                                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                        <ol class="carousel-indicators">
                                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                        </ol>
                                        <div class="carousel-inner" role="listbox">
                                            <a href="{{ route('visits.all') }}">
                                                <div class="carousel-item active">
                                                    <img class="d-block img-fluid" src="{{ asset('assets/images/other.jpg') }}" alt="other" style="display: block; position: relative; overflow: hidden; 
                                                    height: 320px; margin-bottom: 10px;background-size: cover; background-position: center center; background-repeat: no-repeat; border-top-left-radius: 2%; border-top-right-radius: 2%" />
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <h4>
                                        <a href="{{ route('visits.all') }}">Other Rents</a>
                                    </h4>
                                </div>
                            </div> 
                        </div>
                    </div>    


                </div><!--end card-body--> 
                
            </div><!--end col--> 
            <div class="col-sm-3"></div>                    
        </div><!-- End row -->
    </div>
</div><!-- container -->

@endsection

@section('scripts')
@endsection