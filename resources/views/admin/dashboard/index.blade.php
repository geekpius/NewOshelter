@extends('admin.layouts.app')

@section('styles') 
<!-- DataTables -->
<link href="{{asset('assets/plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')

    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="float-right">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Dashboard</h4>
                </div><!--end page-title-box-->
            </div><!--end col-->
        </div>
        <!-- end page title end breadcrumb -->

        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-3">
                <div class="card report-card bg-purple-gradient shadow-purple">
                    <div class="card-body">
                        <div class="float-right">
                            <i class="fa fa-school report-main-icon bg-icon-purple"></i>
                        </div> 
                        <span class="badge badge-light text-purple font-weight-600"> Properties</span>
                        <h3 class="my-3">{{ $count_properties }}</h3>
                        <p class="mb-0 text-truncate">Properties</p>
                    </div><!--end card-body--> 
                </div><!--end card--> 
            </div> <!--end col--> 
            <div class="col-md-6 col-lg-3">
                <div class="card report-card bg-danger-gradient shadow-danger">
                    <div class="card-body">
                        <div class="float-right">
                            <i class="dripicons-clock report-main-icon bg-icon-danger"></i>
                        </div> 
                        <span class="badge badge-light text-danger">WishList</span>
                        <h3 class="my-3">{{ $count_wishlist }}</h3>
                        <p class="mb-0 text-truncate font-weight-600"> WishList</p>
                    </div><!--end card-body--> 
                </div><!--end card--> 
            </div> <!--end col--> 
            <div class="col-md-6 col-lg-3">
                <div class="card report-card bg-secondary-gradient shadow-secondary">
                    <div class="card-body">
                        <div class="float-right">
                            <i class="fa fa-tag report-main-icon bg-icon-secondary"></i>
                        </div> 
                        <span class="badge badge-light text-secondary">Rents</span>
                        <h3 class="my-3">{{ $count_rent }}</h3>
                        <p class="mb-0 text-truncate font-weight-600"> For Rents</p>
                    </div><!--end card-body--> 
                </div><!--end card--> 
            </div> <!--end col--> 
            <div class="col-md-6 col-lg-3">
                <div class="card report-card bg-warning-gradient shadow-warning">
                    <div class="card-body">
                        <div class="float-right">
                            <i class="fa fa-building report-main-icon bg-icon-warning"></i>
                        </div> 
                        <span class="badge badge-light text-warning">Visits</span>
                        <h3 class="my-3">{{ $count_visited }}</h3>
                        <p class="mb-0 text-truncate font-weight-600"> Visits</p>
                    </div><!--end card-body--> 
                </div><!--end card--> 
            </div> <!--end col-->                               
        </div><!--end row-->

        <div class="row">
            
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mt-0">Property Types</h4>  
                        <div id="ana_device" class="apex-charts"></div>
                        
                    </div><!--end card-body-->
                    <br><br>
                </div><!--end card-->
            </div><!--end col-->
        </div><!--end row-->
        
        
    </div><!-- container -->

@endsection

@section('scripts')
<script src="{{ asset('assets/plugins/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script>
    $('#datatable').DataTable();

    var options = {
    chart: {
        height: 250,
        type: 'donut',
        dropShadow: {
            enabled: true,
            top: 10,
            left: 0,
            bottom: 0,
            right: 0,
            blur: 2,
            color: '#b6c2e4',
            opacity: 0.15
        },
    }, 
    plotOptions: {
        pie: {
        donut: {
            size: '85%'
        }
        }
    },
    dataLabels: {
        enabled: false,
        },
 
    series: [
        @foreach($property_types as $pt)
        {{ Auth::user()->properties->where('type', strtolower($pt->name))->count() }},
        @endforeach
        ],
    legend: {
        show: true,
        position: 'bottom',
        horizontalAlign: 'center',
        verticalAlign: 'middle',
        floating: false,
        fontSize: '14px',
        offsetX: 0,
        offsetY: -13
    },
    labels: [
        @foreach($property_types as $pt)
        "{{ $pt->name }}",
        @endforeach
        ],
    colors: ["#34bfa3", "#5d78ff", "#fd3c97", "#483d45", "#2B3B91", "#EFC13F", "#000000", "#FFFFFF", "#FC7A8B"],
 
    responsive: [{
        breakpoint: 600,
        options: {
            plotOptions: {
                donut: {
                customScale: 0.2
                }
            },        
            chart: {
                height: 240
            },
            legend: {
                show: false
            },
        }
    }],

    tooltip: {
        y: {
            formatter: function (val) {
                return   val + " %"
            }
        }
    }
    
    }

    var chart = new ApexCharts(
    document.querySelector("#ana_device"),
    options
    );

chart.render();

</script>
@endsection