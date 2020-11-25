<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Real estate platform where property owners can manage their guests/tenants" name="description" />
        <meta content="Fiifi Pius Geek" name="author" />
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>OShelter - {{$page_title}} </title>
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}">

        @yield('styles')

        <!-- App css -->
        <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/metisMenu.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/my-styles.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/sweetalert/sweetalert.css') }}" rel="stylesheet" type="text/css" />

    </head>

    <body class="dark-topbar">

        <!-- Top Bar Start -->
        <div class="topbar">

            <!-- LOGO -->
            <div class="topbar-left">
                <a href="{{ route('index') }}" class="logo">
                    <span>
                        <img src="{{ asset('assets/images/logo-sm.png') }}" alt="logo-small" class="logo-sm">
                    </span>
                    <span>
                        <img src="{{ asset('assets/images/logo.png') }}" alt="logo-large" class="text-logo">
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
                            <span class="badge badge-danger badge-pill noti-icon-badge myMessageCount" data-url="{{ route('message.count') }}"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-lg myMessages" data-url="{{ route('message.notification') }}">
                            
                        </div>
                    </li>

                    <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle arrow-none waves-light waves-effect" data-toggle="dropdown" href="#" role="button"
                            aria-haspopup="false" aria-expanded="false">
                            <i class="dripicons-bell noti-icon text-white"></i>
                            <span class="badge badge-danger badge-pill noti-icon-badge myNotificationCount" data-url="{{ route('notification.count') }}"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-lg myNotifications" data-url="{{ route('notifications') }}">
                            
                        </div>
                    </li>


                    <li class="dropdown">
                        <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button"
                            aria-haspopup="false" aria-expanded="false">
                            <img src="{{ (empty(Auth::user()->image))? asset('assets/images/user.svg'):asset('assets/images/users/'.Auth::user()->image) }}" alt="{{ Auth::user()->membership }}" class="rounded-circle img_preview" /> 
                            <span class="ml-1 nav-user-name hidden-sm">{{ current(explode(' ',Auth::user()->name)) }} <i class="mdi mdi-chevron-down"></i> </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="{{ route('account') }}"><i class="dripicons-user text-muted mr-2"></i> My Account</a>
                            <a class="dropdown-item" href="{{route('saved')}}"><i class="dripicons-heart text-muted mr-2"></i> Wishlist</a>
                            <a class="dropdown-item" href="{{ route('visits') }}"><i class="dripicons-user text-muted mr-2"></i> Visits</a>
                            <a class="dropdown-item" href="{{ route('requests') }}"><i class="fa fa-exchange-alt text-muted mr-2"></i> Requests</a>
                            {{-- <a class="dropdown-item" href="{{route('wallet')}}"><i class="dripicons-wallet text-muted mr-2"></i> Wallet</a> --}}
                            {{-- <a class="dropdown-item" href="{{route('activities')}}"><i class="dripicons-view-list text-muted mr-2"></i> Activities</a> --}}
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item"  href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="dripicons-exit text-muted mr-2"></i> Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
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
                        <a href="{{ route('dashboard') }}" class="nav-link bg-pink shadow-pink" data-toggle="tooltip-custom" data-placement="right" title="" data-original-title="Home">
                            <i class="dripicons-meter text-white"></i>
                        </a>
                            
                        <a href="{{ route('property') }}" class="nav-link bg-warning shadow-warning" data-toggle="tooltip-custom" data-placement="right" title="" data-original-title="Properties">
                            <i class="fa fa-home text-white"></i>
                        </a><!--end MetricaCrypto-->
        
                        {{-- <a href="{{route('tenants')}}" class="nav-link bg-success shadow-success" data-toggle="tooltip-custom" data-placement="right" title="" data-original-title="Guests">
                            <i class="fa fa-users text-white"></i>
                        </a><!--end MetricaProject--> --}}
        
                        <a href="{{route('messages')}}" class="nav-link bg-purple shadow-purple" data-toggle="tooltip-custom" data-placement="right" title="" data-original-title="Messages">
                            <i class="fa fa-inbox text-white"></i>
                        </a> <!--end MetricaEcommerce-->   
        
                        <a href="{{route('ticket')}}" class="nav-link bg-secondary shadow-secondary" data-toggle="tooltip-custom" data-placement="right" title="" data-original-title="Support">
                            <i class="typcn typcn-support text-white font-24"></i>
                        </a><!--end MetricaCRM-->
                    </nav><!--end nav-->
                </div><!--end main-icon-menu-->
        
                <div class="main-menu-inner">
                    <div class="menu-body slimscroll">
                        <div id="" class="main-icon-menu-pane">
                            <div class="title-box">
                                <h6 class="menu-title">Statistics</h6>       
                            </div>
                            <ul class="nav">
                                <li class="nav-item"><a class="nav-link" href="{{ route('dashboard') }}"><i class="dripicons-meter"></i>Dashboard</a></li>
                            </ul>
                        </div><!-- end Analytic -->
                        <div id="MetricaProperty" class="main-icon-menu-pane">
                            <div class="title-box">
                                <h6 class="menu-title">Properties</h6>
                            </div>
                            <ul class="nav">
                                <li class="nav-item"><a class="nav-link" href="{{ route('property') }}"><i class="fa fa-list-alt"></i>List Properties</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('property.add') }}"><i class="fa fa-plus-square"></i>New Listing</a></li>
                                {{-- <li class="nav-item"><a class="nav-link" href="{{route('property.manage')}}"><i class="dripicons-wallet"></i>My Properties</a></li> --}}
                                @if (Route::currentRouteNamed('property.start'))
                                <li class="nav-item" style="display:none !important"><a class="nav-link" href=""><i class="dripicons-wallet"></i></a></li>
                                @endif
                                @if (Route::currentRouteNamed('property.edit'))
                                <li class="nav-item" style="display:none !important"><a class="nav-link" href=""><i class="dripicons-wallet"></i></a></li>
                                @endif
                                @if (Route::currentRouteNamed('property.confirmdelete'))
                                <li class="nav-item" style="display:none !important"><a class="nav-link" href=""><i class="dripicons-wallet"></i></a></li>
                                @endif
                                @if (Route::currentRouteNamed('property.utilities'))
                                <li class="nav-item" style="display:none !important"><a class="nav-link" href=""><i class="dripicons-wallet"></i></a></li>
                                @endif
                            </ul>
                        </div><!-- end Crypto -->
                        {{-- <div id="MetricaTenant" class="main-icon-menu-pane">
                            <div class="title-box">
                                <h6 class="menu-title">Guests</h6>        
                            </div>
                            <ul class="nav">
                                <li class="nav-item"><a class="nav-link" href="{{route('tenants')}}"><i class="dripicons-user-id"></i>List Tenants</a></li>
                                @if (Route::currentRouteNamed('tenants.current'))
                                <li class="nav-item" style="display:none !important"><a class="nav-link" href=""><i class="dripicons-user-id"></i></a></li>
                                @endif
                                <li class="nav-item"><a class="nav-link" href="{{route('buyers')}}"><i class="dripicons-user-id"></i>List Buyers</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{route('bidders')}}"><i class="dripicons-user-id"></i>List Bidders</a></li>

                                @if (Route::currentRouteNamed('tenant.visited'))
                                <li class="nav-item" style="display:none !important"><a class="nav-link" href=""><i class="dripicons-wallet"></i></a></li>
                                @endif
                            </ul>
                        </div><!-- end  Project--> --}}
                        <div id="MetricaMessage" class="main-icon-menu-pane">
                            <div class="title-box">
                                <h6 class="menu-title">Messages</h6>           
                            </div>
                            <ul class="nav">
                                <li class="nav-item"><a class="nav-link" href="{{route('messages')}}"><i class="dripicons-inbox"></i>Messages</a></li>
                                @if (Route::currentRouteNamed('messages.compose'))
                                <li class="nav-item" style="display:none !important"><a class="nav-link" href=""><i class="dripicons-wallet"></i></a></li>
                                @endif
                            </ul>
                        </div><!-- end Ecommerce -->
                        <div id="MetricaSupport" class="main-icon-menu-pane">
                            <div class="title-box">
                                <h6 class="menu-title">Support</h6>          
                            </div>
                            <ul class="nav">
                                <li class="nav-item"><a class="nav-link" href="{{route('ticket')}}"><i class="mdi mdi-ticket"></i>New Ticket</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{route('ticket.view')}}"><i class="mdi mdi-ticket-outline"></i>View All Tickets</a></li>
                                @if (Route::currentRouteNamed('ticket.read'))
                                <li class="nav-item" style="display:none !important"><a class="nav-link" href=""><i class="mdi mdi-ticket-outline"></i></a></li>  
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
                    OShelter &copy; <script>document.write(new Date().getFullYear());</script> Copyrights <span class="text-muted d-none d-sm-inline-block float-right">Designed with <i class="mdi mdi-heart text-danger"></i> by VibTech Ghana</span>
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
        <!-- App js -->
        <script src="{{ asset('assets/js/jquery.core.js') }}"></script>
        <script src="{{ asset('assets/js/app.js') }}"></script>
        <script src="{{ asset('assets/pages/layout.js') }}"></script>
    </body>
</html>
