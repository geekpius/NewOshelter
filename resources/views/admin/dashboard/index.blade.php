@extends('admin.layouts.app')

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
                            <i class="fa fa-bed report-main-icon bg-icon-purple"></i>
                        </div> 
                        <span class="badge badge-light text-purple font-weight-600"> Short Stays</span>
                        <h3 class="my-3">{{ $count_short_stay }}</h3>
                        <p class="mb-0 text-truncate">Short Stays</p>
                    </div><!--end card-body--> 
                </div><!--end card--> 
            </div> <!--end col--> 
            <div class="col-md-6 col-lg-3">
                <div class="card report-card bg-danger-gradient shadow-danger">
                    <div class="card-body">
                        <div class="float-right">
                            <i class="dripicons-clock report-main-icon bg-icon-danger"></i>
                        </div> 
                        <span class="badge badge-light text-danger">Rentals</span>
                        <h3 class="my-3">{{ $count_rent }}</h3>
                        <p class="mb-0 text-truncate font-weight-600"> Rentals</p>
                    </div><!--end card-body--> 
                </div><!--end card--> 
            </div> <!--end col--> 
            <div class="col-md-6 col-lg-3">
                <div class="card report-card bg-secondary-gradient shadow-secondary">
                    <div class="card-body">
                        <div class="float-right">
                            <i class="fa fa-tag report-main-icon bg-icon-secondary"></i>
                        </div> 
                        <span class="badge badge-light text-secondary">Sales</span>
                        <h3 class="my-3">{{ $count_sell }}</h3>
                        <p class="mb-0 text-truncate font-weight-600"> Sales</p>
                    </div><!--end card-body--> 
                </div><!--end card--> 
            </div> <!--end col--> 
            <div class="col-md-6 col-lg-3">
                <div class="card report-card bg-warning-gradient shadow-warning">
                    <div class="card-body">
                        <div class="float-right">
                            <i class="fa fa-fist-raised report-main-icon bg-icon-warning"></i>
                        </div> 
                        <span class="badge badge-light text-warning">Auctions</span>
                        <h3 class="my-3">{{ $count_auction }}</h3>
                        <p class="mb-0 text-truncate font-weight-600"> Auctions</p>
                    </div><!--end card-body--> 
                </div><!--end card--> 
            </div> <!--end col-->                               
        </div><!--end row-->

        <div class="row">
            <div class="col-lg-8">                                                        
                <div class="card">
                    <div class="card-body">  
                        <h4 class="header-title mt-0">Audience Overview</h4>                                 
                        <div class="">
                            <div id="ana_dash_1" class="apex-charts"></div>
                        </div>  
                    </div><!--end card-body-->                                
                </div><!--end card-->
                <div class="card">
                    <div class="card-body">                                    
                        <div class="row">
                            <div class="col-lg-6">
                                <h4 class="header-title mt-0 mb-3">Live Visits Our New Site</h4> 
                                <div id="circlechart" class="apex-charts"></div>
                            </div><!--end col-->
                            <div class="col-lg-6">   
                                <h4 class="header-title mt-0 mb-3">Traffic Sources</h4>                                         
                                <div class="traffic-card">                                                
                                    <h3>80</h3>
                                    <h5>Right Now</h5>
                                </div>
                                <div class="progress mb-4">                                                    
                                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100">55%</div>
                                    <div class="progress-bar bg-pink" role="progressbar" style="width: 28%" aria-valuenow="28" aria-valuemin="0" aria-valuemax="100">28%</div>
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 17%" aria-valuenow="17" aria-valuemin="0" aria-valuemax="100">17%</div>
                                </div>                
                                <ul class="list-unstyled url-list mb-0">
                                    <li>
                                        <i class="mdi mdi-circle-medium text-primary"></i>
                                        <span>Organic</span>                                                                                                      
                                    </li>
                                    <li>
                                        <i class="mdi mdi-circle-medium text-secondary"></i> 
                                        <span>Direct</span>                                              
                                    </li>
                                    <li>
                                        <i class="mdi mdi-circle-medium text-warning"></i>
                                        <span>Campaign</span>                                                 
                                    </li>                                                
                                </ul>
                            </div><!--end col-->
                        </div><!--end row-->                                   
                    </div><!--end card-body--> 
                </div><!--end card--> 
            </div><!--end col-->
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body mb-0">
                        <div class="row">                                            
                            <div class="col-8 align-self-center">
                                <div class="impressions-data">
                                    <h4 class="mt-0 header-title">Overall Reviews</h4>
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
                                        <td class="no-border" width="200">
                                            <div class="progress" style="height: 3px;">
                                                <div class="progress-bar bg-warning" role="progressbar" style="width: 100%;"></div>
                                            </div>
                                        </td>
                                        <td class="no-border" style="padding-left:0px !important">5</td>
                                    </tr>

                                    <tr>
                                        <td class="no-border"><i class="fa fa-map-marked text-primary"></i> <b>Location</b></td>
                                        <td class="no-border" width="200">
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
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mt-0">Sessions Device</h4>  
                        <div id="ana_device" class="apex-charts"></div>
                        <div class="table-responsive mt-4">
                            <table class="table mb-0">
                                <thead class="thead-light">
                                <tr>
                                    <th>Device</th>
                                    <th>Sassions</th>
                                    <th>Day</th>
                                    <th>Week</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="row">Dasktops</th>
                                    <td>1843</td>
                                    <td>-3</td>
                                    <td>-12</td>
                                </tr>
                                <tr>
                                    <th scope="row">Tablets</th>
                                    <td>2543</td>
                                    <td>-5</td>
                                    <td>-2</td>                                                 
                                </tr>
                                <tr>
                                    <th scope="row">Mobiles</th>
                                    <td>3654</td>
                                    <td>-5</td>
                                    <td>-6</td>
                                </tr>
                                
                                </tbody>
                            </table><!--end /table-->
                        </div>
                    </div><!--end card-body-->
                </div><!--end card-->
            </div><!--end col-->
        </div><!--end row-->
        
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mt-0 mb-3">Browser Used By Users</h4>
                        <div class="table-responsive browser_users">
                            <table class="table mb-0">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="border-top-0">Browser</th>
                                        <th class="border-top-0">Sessions</th>
                                        <th class="border-top-0">Bounce Rate</th>
                                        <th class="border-top-0">Transactions</th>
                                    </tr><!--end tr-->
                                </thead>
                                <tbody>
                                    <tr>                                                        
                                        <td><i class="fab fa-chrome mr-2 text-danger font-16"></i>Chrome</td>
                                        <td>10853<small class="text-muted">(52%)</small></td>                                   
                                        <td> 52.80%</td>
                                        <td>566<small class="text-muted">(92%)</small></td>
                                    </tr><!--end tr-->     
                                    <tr>                                                        
                                        <td><i class="fab fa-safari mr-2 text-info font-16"></i>Safari</td>
                                        <td>2545<small class="text-muted">(47%)</small></td>                                   
                                        <td> 47.54%</td>
                                        <td>498<small class="text-muted">(81%)</small></td>
                                    </tr><!--end tr-->    
                                    <tr>                                                        
                                        <td><i class="fab fa-internet-explorer mr-2 text-warning font-16"></i>Internet-Explorer</td>
                                        <td>1836<small class="text-muted">(38%)</small></td>                                   
                                        <td> 41.12%</td>
                                        <td>455<small class="text-muted">(74%)</small></td>
                                    </tr><!--end tr-->    
                                    <tr>                                                        
                                        <td><i class="fab fa-opera mr-2 text-danger font-16"></i>Opera</td>
                                        <td>1958<small class="text-muted">(31%)</small></td>                                   
                                        <td> 36.82%</td>
                                        <td>361<small class="text-muted">(61%)</small></td>
                                    </tr><!--end tr-->    
                                    <tr>                                                        
                                        <td><i class="fab fa-firefox mr-2 text-blue font-16"></i>Firefox</td>
                                        <td>1566<small class="text-muted">(26%)</small></td>                                   
                                        <td> 29.33%</td>
                                        <td>299<small class="text-muted">(49%)</small></td>
                                    </tr><!--end tr-->                                
                                </tbody>
                            </table> <!--end table-->                                               
                        </div><!--end /div-->
                    </div><!--end card-body-->
                </div><!--end card-->
            </div><!--end col-->

            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mt-0 mb-3">Traffic Sources</h4>
                        <div class="table-responsive browser_users">
                            <table class="table mb-0">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="border-top-0">Channel</th>
                                        <th class="border-top-0">Sessions</th>
                                        <th class="border-top-0">Prev.Period</th>
                                        <th class="border-top-0">% Change</th>
                                    </tr><!--end tr-->
                                </thead>
                                <tbody>
                                    <tr>                                                        
                                        <td><a href="" class="text-primary">Organic search</a></td>
                                        <td>10853<small class="text-muted">(52%)</small></td>
                                        <td>566<small class="text-muted">(92%)</small></td>
                                        <td> 52.80% <i class="fas fa-caret-up text-success font-16"></i></td>
                                    </tr><!--end tr-->     
                                    <tr>                                                        
                                        <td><a href="" class="text-primary">Direct</a></td>
                                        <td>2545<small class="text-muted">(47%)</small></td>
                                        <td>498<small class="text-muted">(81%)</small></td>
                                        <td> -17.20% <i class="fas fa-caret-down text-danger font-16"></i></td>
                                        
                                    </tr><!--end tr-->    
                                    <tr>                                                        
                                        <td><a href="" class="text-primary">Referal</a></td>
                                        <td>1836<small class="text-muted">(38%)</small></td> 
                                        <td>455<small class="text-muted">(74%)</small></td>
                                        <td> 41.12% <i class="fas fa-caret-up text-success font-16"></i></td>
                                        
                                    </tr><!--end tr-->    
                                    <tr>                                                        
                                        <td><a href="" class="text-primary">Email</a></td>
                                        <td>1958<small class="text-muted">(31%)</small></td> 
                                        <td>361<small class="text-muted">(61%)</small></td>
                                        <td> -8.24% <i class="fas fa-caret-down text-danger font-16"></i></td>
                                    </tr><!--end tr-->    
                                    <tr>                                                        
                                        <td><a href="" class="text-primary">Social</a></td>
                                        <td>1566<small class="text-muted">(26%)</small></td> 
                                        <td>299<small class="text-muted">(49%)</small></td>
                                        <td> 29.33% <i class="fas fa-caret-up text-success"></i></td>
                                    </tr><!--end tr-->                                
                                </tbody>
                            </table> <!--end table-->                                               
                        </div><!--end /div-->
                    </div><!--end card-body-->
                </div><!--end card-->
            </div><!--end col-->
        </div><!--end row-->    

    </div><!-- container -->

@endsection

@section('scripts')
<script src="{{ asset('assets/plugins/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets/pages/jquery.analytics_dashboard.init.js') }}"></script>
@endsection