<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Real estate platform where property owners can manage their guests/tenants" name="description" />
        <meta content="Fiifi Pius(Geek)" name="author" />
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Real Home - {{$page_title}} </title>
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

        @yield('styles')

        <!-- App css -->
        <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/metisMenu.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/sweetalert/sweetalert.css') }}" rel="stylesheet" type="text/css" />

    </head>

    <body class="dark-topbar">

        <!-- Top Bar Start -->
        <div class="topbar">

            <!-- LOGO -->
            <div class="topbar-left">
                <a href="{{ route('host.dashboard') }}" class="logo">
                    <span>
                        <img src="{{ asset('assets/images/logo-sm.png') }}" alt="logo-small" class="logo-sm">
                    </span>
                    <span>
                        <img src="{{ asset('assets/images/logo-dark.png') }}" alt="logo-large" class="logo-lg">
                    </span>
                    <span>
                        <img src="{{ asset('assets/images/logo.png') }}" alt="logo-large" class="logo-light">
                    </span>                    
                </a>
            </div>
            <!--end logo-->
            <!-- Navbar -->
            <nav class="navbar-custom">    
                <ul class="list-unstyled topbar-nav float-right mb-0"> 

                    <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle arrow-none waves-light waves-effect" data-toggle="dropdown" href="#" role="button"
                            aria-haspopup="false" aria-expanded="false">
                            <i class="dripicons-inbox noti-icon text-white"></i>
                            <span class="badge badge-danger badge-pill noti-icon-badge myMessageCount"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-lg myMessages">
                            
                        </div>
                    </li>

                    <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle arrow-none waves-light waves-effect" data-toggle="dropdown" href="#" role="button"
                            aria-haspopup="false" aria-expanded="false">
                            <i class="dripicons-bell noti-icon text-white"></i>
                            <span class="badge badge-danger badge-pill noti-icon-badge">18</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-lg">
                            <!-- item-->
                            <h6 class="dropdown-item-text">
                                Notifications (18)
                            </h6>
                            <div class="slimscroll notification-list">
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item active">
                                    <div class="notify-icon bg-success"><i class="mdi mdi-cart-outline"></i></div>
                                    <p class="notify-details">Your order is placed<small class="text-muted">Dummy text of the printing and typesetting industry.</small></p>
                                </a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-primary"><i class="mdi mdi-cart-outline"></i></div>
                                    <p class="notify-details">Your order is placed<small class="text-muted">Dummy text of the printing and typesetting industry.</small></p>
                                </a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-danger"><i class="mdi mdi-message"></i></div>
                                    <p class="notify-details">New Message received<small class="text-muted">You have 87 unread messages</small></p>
                                </a>
                            </div>
                            <!-- All-->
                            <a href="javascript:void(0);" class="dropdown-item text-center text-primary">
                                View all <i class="fi-arrow-right"></i>
                            </a>
                        </div>
                    </li>


                    <li class="dropdown">
                        <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button"
                            aria-haspopup="false" aria-expanded="false">
                            <img src="{{ (empty(Auth::user()->image))? asset('assets/images/users/user-4.jpg'):asset('assets/images/users/'.Auth::user()->image) }}" alt="profile-user" class="rounded-circle img_preview" /> 
                            <span class="ml-1 nav-user-name hidden-sm">{{ current(explode(' ',Auth::user()->name)) }} <i class="mdi mdi-chevron-down"></i> </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="{{ route('host.account') }}"><i class="dripicons-user text-muted mr-2"></i> My Account</a>
                            <a class="dropdown-item" href="{{route('host.saved')}}"><i class="dripicons-heart text-muted mr-2"></i> Saved</a>
                            <a class="dropdown-item" href="{{route('host.wallet')}}"><i class="dripicons-wallet text-muted mr-2"></i> My Wallet</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item"  href="{{ route('host.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="dripicons-exit text-muted mr-2"></i> Logout</a>
                            <form id="logout-form" action="{{ route('host.logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul><!--end topbar-nav-->
    
                <ul class="list-unstyled topbar-nav mb-0">                        
                    <li>
                        <button class="button-menu-mobile nav-link waves-effect waves-light">
                            <i class="dripicons-menu nav-icon"></i>
                        </button>
                    </li>
                </ul>
            </nav>
            <!-- end navbar-->
        </div>
        <!-- Top Bar End -->
        
        <div class="page-wrapper">
            <!-- Left Sidenav -->
            <div class="left-sidenav">
                <div class="main-icon-menu">
                    <nav class="nav">
                        <a href="#MetricaDashboard" class="nav-link leftmenu-sm-item bg-pink shadow-pink" data-toggle="tooltip-custom" data-placement="right" title="" data-original-title="Home">
                            <i class="dripicons-meter text-white"></i>
                        </a>
                            
                        <a href="#MetricaProperty" class="nav-link leftmenu-sm-item bg-warning shadow-warning" data-toggle="tooltip-custom" data-placement="right" title="" data-original-title="Properties">
                            <i class="fa fa-home text-white"></i>
                        </a><!--end MetricaCrypto-->
        
                        <a href="#MetricaTenant" class="nav-link leftmenu-sm-item bg-success shadow-success" data-toggle="tooltip-custom" data-placement="right" title="" data-original-title="Guests">
                            <i class="fa fa-users text-white"></i>
                        </a><!--end MetricaProject-->
        
                        <a href="#MetricaMessage" class="nav-link leftmenu-sm-item bg-purple shadow-purple" data-toggle="tooltip-custom" data-placement="right" title="" data-original-title="Messages">
                            <i class="fa fa-inbox text-white"></i>
                        </a> <!--end MetricaEcommerce-->   
        
                        <a href="#MetricaSupport" class="nav-link leftmenu-sm-item bg-secondary shadow-secondary" data-toggle="tooltip-custom" data-placement="right" title="" data-original-title="Support">
                            <i class="typcn typcn-support text-white font-24"></i>
                        </a><!--end MetricaCRM-->
                    </nav><!--end nav-->
                </div><!--end main-icon-menu-->
        
                <div class="main-menu-inner">
                    <div class="menu-body slimscroll">
                        <div id="MetricaDashboard" class="main-icon-menu-pane">
                            <div class="title-box">
                                <h6 class="menu-title">Statistics</h6>       
                            </div>
                            <ul class="nav">
                                <li class="nav-item"><a class="nav-link" href="{{ route('host.dashboard') }}"><i class="dripicons-meter"></i>Dashboard</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('host.guest.statistics') }}"><i class="dripicons-user-group"></i>Guests</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('host.property.statistics') }}"><i class="dripicons-document"></i>Properties</a></li> 
                                <li class="nav-item"><a class="nav-link" href="{{ route('host.payment.statistics') }}"><i class="fa fa-money-bill-alt font-11"></i>Payments</a></li> 
                            </ul>
                        </div><!-- end Analytic -->
                        <div id="MetricaProperty" class="main-icon-menu-pane">
                            <div class="title-box">
                                <h6 class="menu-title">Properties</h6>
                            </div>
                            <ul class="nav">
                                <li class="nav-item"><a class="nav-link" href="{{ route('host.property') }}"><i class="fa fa-list-alt"></i>List Properties</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('host.property.add') }}"><i class="fa fa-plus-square"></i>New Listing</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{route('host.property.manage')}}"><i class="dripicons-wallet"></i>Manage Properties</a></li>
                                @if (Route::currentRouteName('host.property.start'))
                                <li class="nav-item" style="display:none !important"><a class="nav-link" href="{{ route('host.property.start') }}"><i class="dripicons-wallet"></i></a></li>
                                @endif
                            </ul>
                        </div><!-- end Crypto -->
                        <div id="MetricaTenant" class="main-icon-menu-pane">
                            <div class="title-box">
                                <h6 class="menu-title">Guests</h6>        
                            </div>
                            <ul class="nav">
                                <li class="nav-item"><a class="nav-link" href="{{route('host.tenant')}}"><i class="dripicons-user-id"></i>List Tenants</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{route('host.buyer')}}"><i class="dripicons-user-id"></i>List Buyers</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{route('host.bidder')}}"><i class="dripicons-user-id"></i>List Bidders</a></li>
                            </ul>
                        </div><!-- end  Project-->
                        <div id="MetricaMessage" class="main-icon-menu-pane">
                            <div class="title-box">
                                <h6 class="menu-title">Messages</h6>           
                            </div>
                            <ul class="nav">
                                <li class="nav-item"><a class="nav-link" href="{{route('host.messages')}}"><i class="dripicons-inbox"></i>Messages</a></li>
                            </ul>
                        </div><!-- end Ecommerce -->
                        <div id="MetricaSupport" class="main-icon-menu-pane">
                            <div class="title-box">
                                <h6 class="menu-title">Support</h6>          
                            </div>
                            <ul class="nav">
                                <li class="nav-item"><a class="nav-link" href="{{route('host.ticket')}}"><i class="mdi mdi-ticket"></i>New Ticket</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{route('host.ticket.view')}}"><i class="mdi mdi-ticket-outline"></i>View All Tickets</a></li>
                                @if (Route::currentRouteNamed('host.ticket.read'))
                                <li class="nav-item" style="display:none !important"><a class="nav-link" href="{{ route('host.ticket.read',1) }}"><i class="mdi mdi-ticket-outline"></i></a></li>  
                                @endif
                                
                            </ul>
                        </div><!-- end CRM -->
                    </div><!--end menu-body-->
                </div><!-- end main-menu-inner-->
            </div>
            <!-- end left-sidenav-->

            <!-- Page Content-->
            <div class="page-content">
                @yield('content')
                <footer class="footer text-center text-sm-left">
                    Real Home &copy; <script>document.write(new Date().getFullYear());</script> Copyrights <span class="text-muted d-none d-sm-inline-block float-right">Designed with <i class="mdi mdi-heart text-danger"></i> by VibTech Ghana</span>
                </footer><!--end footer-->
            </div>
            <!-- end page content -->
        </div>
        <!-- end page-wrapper -->

        <!-- jQuery  -->
        <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/js/metisMenu.min.js') }}"></script>
        <script src="{{ asset('assets/js/waves.min.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.slimscroll.min.js') }}"></script>
        <script src="{{ asset('assets/sweetalert/sweetalert.min.js') }}"></script>

        @yield('scripts')
        <!-- App js -->
        <script src="{{ asset('assets/js/app.js') }}"></script>
        <script>
            function getMessageCount(){
                $.ajax({
                    url: "{{ route('host.message.count') }}",
                    type: "GET",
                    success: function(resp){
                        $(".myMessageCount").text(resp);
                    },
                    error: function(resp){
                        console.log("Something went wrong with request");
                    }
                });
                
                setTimeout(getMessageCount, 1000);
            }

            function getMessageNotification(){
                $.ajax({
                    url: "{{ route('host.message.notification') }}",
                    type: "GET",
                    success: function(resp){
                        $(".myMessages").html(resp);
                    },
                    error: function(resp){
                        console.log("Something went wrong with request");
                    }
                });

                setTimeout(getMessageNotification, 1000);
            }
            getMessageCount();
            getMessageNotification();
        </script>
    </body>
</html>