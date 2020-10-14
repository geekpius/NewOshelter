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
                    <div class="card-body mb-0">
                        <div class="row">                                            
                            <div class="col-8 align-self-center">
                                <div class="impressions-data">
                                    <h4 class="mt-0 header-title">Overall Owners' Reviews</h4>
                                    <p>
                                        <i class="fa fa-star"></i> 
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        &nbsp;&nbsp;
                                        {{ Auth::user()->propertyReviews->count() }} Reviews
                                    </p>
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->
                    </div><!--end card-body-->
                    <div class="card-body overflow-hidden p-0">
                        <div class="d-flex mb-0 h-100">
                            <div class="w-100">  
                                <table class="table table-responsive">
                                    <tr>
                                        <td class="no-border"><i class="fa fa-thumbs-up text-primary"></i> <b>Accuracy</b></td>
                                        <td class="no-border" width="400">
                                            <div class="progress" style="height: 3px;">
                                                <div class="progress-bar bg-warning" role="progressbar" style="width: 100%;"></div>
                                            </div>
                                        </td>
                                        <td class="no-border" style="padding-left:0px !important">5</td>
                                    </tr>

                                    <tr>
                                        <td class="no-border"><i class="fa fa-map-marked text-primary"></i> <b>Location</b></td>
                                        <td class="no-border" width="400">
                                            <div class="progress" style="height: 3px;">
                                                <div class="progress-bar bg-warning" role="progressbar" style="width: 100%;"></div>
                                            </div>
                                        </td>
                                        <td class="no-border" style="padding-left:0px !important">5</td>
                                    </tr>

                                    <tr>
                                        <td class="no-border"><i class="mdi mdi-security text-primary"></i> <b>Security</b></td>
                                        <td class="no-border">
                                            <div class="progress" style="height: 3px;">
                                                <div class="progress-bar bg-warning" role="progressbar" style="width: 90%;"></div>
                                            </div>
                                        </td>
                                        <td class="no-border" style="padding-left:0px !important">4.5</td>
                                    </tr>

                                    <tr>
                                        <td class="no-border"><i class="mdi mdi-currency-usd text-primary"></i> <b>Value</b></td>
                                        <td class="no-border">
                                            <div class="progress" style="height: 3px;">
                                                <div class="progress-bar bg-warning" role="progressbar" style="width: 100%;"></div>
                                            </div>
                                        </td>
                                        <td class="no-border" style="padding-left:0px !important">5</td>
                                    </tr>

                                    <tr>
                                        <td class="no-border"><i class="mdi mdi-comment text-primary"></i> <b>Communication</b></td>
                                        <td class="no-border">
                                            <div class="progress" style="height: 3px;">
                                                <div class="progress-bar bg-warning" role="progressbar" style="width: 80%;"></div>
                                            </div>
                                        </td>
                                        <td class="no-border" style="padding-left:0px !important">4</td>
                                    </tr>
                                    <tr>
                                        <td class="no-border"><i class="fa fa-dumpster text-primary"></i> <b>Cleanliness</b></td>
                                        <td class="no-border">
                                            <div class="progress" style="height: 3px;">
                                                <div class="progress-bar bg-warning" role="progressbar" style="width: 60%;"></div>
                                            </div>
                                        </td>
                                        <td class="no-border" style="padding-left:0px !important">3</td>
                                    </tr>
                                </table> 
                            </div>
                        </div>
                    </div><!--end card-body-->                                                                  
                </div>                
            </div><!--end col-->

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
        
        <div class="row">
            <div class="col-md-12">                                                        
                <div class="card">
                    <div class="card-body">                                
                        <div class="table-responsive dash-social">
                            <table id="datatable" class="table table-bordered">
                                <thead class="thead-light">
                                <tr>
                                    <th>Date</th>                                               
                                    <th>Transaction ID</th>
                                    <th>Type</th>
                                    <th>Value</th>
                                </tr><!--end tr-->
                                </thead>

                                <tbody>
                                    <tr>
                                        <td>0000</td>
                                        <td>0000</td>
                                        <td>0000</td>
                                        <td>0000</td>
                                    </tr><!--end tr-->                                                                                 
                                </tbody>
                            </table>                    
                        </div>   
                    </div><!--end card-body-->                                
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