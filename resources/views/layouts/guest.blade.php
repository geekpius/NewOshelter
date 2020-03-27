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
                            <span class="badge badge-danger badge-pill noti-icon-badge">2</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-lg">
                            <!-- item-->
                            <h6 class="dropdown-item-text">
                                Messages (2)
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
                            </div>
                            <!-- All-->
                            <a href="javascript:void(0);" class="dropdown-item text-center text-primary">
                                View all <i class="fi-arrow-right"></i>
                            </a>
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
                            <a class="dropdown-item" href="{{ route('guest.account') }}"><i class="dripicons-user text-muted mr-2"></i> My Account</a>
                            <a class="dropdown-item" href="{{route('guest.saved')}}"><i class="dripicons-heart text-muted mr-2"></i> Saved</a>
                            <a class="dropdown-item" href="{{route('guest.wallet')}}"><i class="dripicons-wallet text-muted mr-2"></i> My Wallet</a>
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
                        <a href="#MetricaDashboard" class="nav-link leftmenu-sm-item bg-pink shadow-pink" data-toggle="tooltip-custom" data-placement="right" title="" data-original-title="Home">
                            <i class="dripicons-meter text-white"></i>
                        </a>
                            
                        <a href="#MetricaProperty" class="nav-link leftmenu-sm-item bg-warning shadow-warning" data-toggle="tooltip-custom" data-placement="right" title="" data-original-title="Properties">
                            <i class="fa fa-home text-white"></i>
                        </a><!--end MetricaCrypto-->
        
                        <a href="#MetricaTenant" class="nav-link leftmenu-sm-item bg-success shadow-success" data-toggle="tooltip-custom" data-placement="right" title="" data-original-title="Team Players">
                            <i class="fa fa-users text-white"></i>
                        </a><!--end MetricaProject-->
        
                        <a href="#MetricaMessage" class="nav-link leftmenu-sm-item bg-purple shadow-purple" data-toggle="tooltip-custom" data-placement="right" title="" data-original-title="Messages">
                            <i class="fa fa-inbox text-white"></i>
                        </a> <!--end MetricaEcommerce-->   
        
                        <a href="#MetricaSupport" class="nav-link leftmenu-sm-item bg-secondary shadow-secondary" data-toggle="tooltip-custom" data-placement="right" title="" data-original-title="Support">
                            <i class="typcn typcn-support text-white font-24"></i>
                        </a><!--end MetricaCRM-->
        
                        <a href="#MetricaOthers" class="nav-link leftmenu-sm-item bg-primary shadow-primary" data-toggle="tooltip-custom" data-placement="right" title="" data-original-title="UI Kit">
                            <svg class="nav-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <path d="M70.7 164.5l169.2 81.7c4.4 2.1 10.3 3.2 16.1 3.2s11.7-1.1 16.1-3.2l169.2-81.7c8.9-4.3 8.9-11.3 0-15.6L272.1 67.2c-4.4-2.1-10.3-3.2-16.1-3.2s-11.7 1.1-16.1 3.2L70.7 148.9c-8.9 4.3-8.9 11.3 0 15.6z"/>
                                <path class="svg-primary" d="M441.3 248.2s-30.9-14.9-35-16.9-5.2-1.9-9.5.1S272 291.6 272 291.6c-4.5 2.1-10.3 3.2-16.1 3.2s-11.7-1.1-16.1-3.2c0 0-117.3-56.6-122.8-59.3-6-2.9-7.7-2.9-13.1-.3l-33.4 16.1c-8.9 4.3-8.9 11.3 0 15.6l169.2 81.7c4.4 2.1 10.3 3.2 16.1 3.2s11.7-1.1 16.1-3.2l169.2-81.7c9.1-4.2 9.1-11.2.2-15.5z"/>
                                <path d="M441.3 347.5s-30.9-14.9-35-16.9-5.2-1.9-9.5.1S272.1 391 272.1 391c-4.5 2.1-10.3 3.2-16.1 3.2s-11.7-1.1-16.1-3.2c0 0-117.3-56.6-122.8-59.3-6-2.9-7.7-2.9-13.1-.3l-33.4 16.1c-8.9 4.3-8.9 11.3 0 15.6l169.2 81.7c4.4 2.2 10.3 3.2 16.1 3.2s11.7-1.1 16.1-3.2l169.2-81.7c9-4.3 9-11.3.1-15.6z"/>
                            </svg>
                        </a><!--end MetricaOthers-->
        
                        <a href="#MetricaPages" class="nav-link leftmenu-sm-item bg-dark shadow-dark" data-toggle="tooltip-custom" data-placement="right" title="" data-original-title="Pages">
                            <svg class="nav-svg" version="1.1" id="Layer_4" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                                <g>
                                    <path d="M462.5,352.3c-1.9-5.5-5.6-11.5-11.4-18.3c-10.2-12-30.8-29.3-54.8-47.2c-2.6-2-6.4-0.8-7.5,2.3l-4.7,13.4
                                        c-0.7,2,0,4.3,1.7,5.5c15.9,11.6,35.9,27.9,41.8,35.9c2,2.8-0.5,6.6-3.9,5.8c-10-2.3-29-7.3-44.2-12.8c-8.6-3.1-17.7-6.7-27.2-10.6
                                        c16-20.8,24.7-46.3,24.7-72.6c0-32.8-13.2-63.6-37.1-86.4c-22.9-21.9-53.8-34.1-85.7-33.7c-25.7,0.3-50.1,8.4-70.7,23.5
                                        c-18.3,13.4-32.2,31.3-40.6,52c-8.3-6-16.1-11.9-23.2-17.6c-13.7-10.9-28.4-22-38.7-34.7c-2.2-2.8,0.9-6.7,4.4-5.9
                                        c11.3,2.6,35.4,10.9,56.4,18.9c1.5,0.6,3.2,0.3,4.5-0.8l11.1-10.1c2.4-2.1,1.7-6-1.3-7.2C121,137.4,89.2,128,73.2,128
                                        c-11.5,0-19.3,3.5-23.3,10.4c-7.6,13.3,7.1,35.2,45.1,66.8c34.1,28.5,82.6,61.8,136.5,92c87.5,49.1,171.1,81,208,81
                                        c11.2,0,18.7-3.1,22.1-9.1C464.4,364.4,464.7,358.7,462.5,352.3z"/>
                                    <path  class="svg-primary" d="M312,354c-29.1-12.8-59.3-26-92.6-44.8c-30.1-16.9-59.4-36.5-84.4-53.6c-1-0.7-2.2-1.1-3.4-1.1c-0.9,0-1.9,0.2-2.8,0.7
                                        c-2,1-3.3,3-3.3,5.2c0,1.2-0.1,2.4-0.1,3.5c0,32.1,12.6,62.3,35.5,84.9c22.9,22.7,53.4,35.2,85.8,35.2c23.6,0,46.5-6.7,66.2-19.5
                                        c1.9-1.2,2.9-3.3,2.7-5.5C315.5,356.8,314.1,354.9,312,354z"/>
                                </g>
                            </svg>                           
                        </a>
        
                        <a href="#MetricaAuthentication" class="nav-link leftmenu-sm-item bg-danger shadow-danger" data-toggle="tooltip-custom" data-placement="right" title="" data-original-title="Authentication">
                            <svg class="nav-svg" version="1.1" id="Layer_5" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                            viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                                <g>
                                    <path class="svg-primary" d="M376,192h-24v-46.7c0-52.7-42-96.5-94.7-97.3c-53.4-0.7-97.3,42.8-97.3,96v48h-24c-22,0-40,18-40,40v192c0,22,18,40,40,40
                                        h240c22,0,40-18,40-40V232C416,210,398,192,376,192z M270,316.8v68.8c0,7.5-5.8,14-13.3,14.4c-8,0.4-14.7-6-14.7-14v-69.2
                                        c-11.5-5.6-19.1-17.8-17.9-31.7c1.4-15.5,14.1-27.9,29.6-29c18.7-1.3,34.3,13.5,34.3,31.9C288,300.7,280.7,311.6,270,316.8z
                                            M324,192H188v-48c0-18.1,7.1-35.1,20-48s29.9-20,48-20s35.1,7.1,48,20s20,29.9,20,48V192z"/>
                                </g>
                            </svg>
                        </a> 
        
                        <a href="../pages/pages-calendar.html" class="nav-link bg-info shadow-info" data-toggle="tooltip-custom" data-placement="right" title="" data-original-title="Calendar">                            
                            <svg class="nav-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <path class="svg-primary" d="M368.005 272h-96v96h96v-96zm-32-208v32h-160V64h-48v32h-24.01c-22.002 0-40 17.998-40 40v272c0 22.002 17.998 40 40 40h304.01c22.002 0 40-17.998 40-40V136c0-22.002-17.998-40-40-40h-24V64h-48zm72 344h-304.01V196h304.01v212z"/>
                            </svg>                            
                        </a>
                    </nav><!--end nav-->
                </div><!--end main-icon-menu-->
        
                <div class="main-menu-inner">
                    <div class="menu-body slimscroll">
                        <div id="MetricaDashboard" class="main-icon-menu-pane">
                            <div class="title-box">
                                <h6 class="menu-title">Statistics</h6>       
                            </div>
                            <ul class="nav">
                                <li class="nav-item"><a class="nav-link" href="{{ route('guest.dashboard') }}"><i class="dripicons-meter"></i>Dashboard</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('guest.property.statistics') }}"><i class="dripicons-document"></i>Properties</a></li> 
                                <li class="nav-item"><a class="nav-link" href="{{ route('guest.payment.statistics') }}"><i class="fa fa-money-bill-alt font-11"></i>Payments</a></li> 
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
                                @if (Route::currentRouteNamed('host.property.start'))
                                <li class="nav-item" style="display:none !important"><a class="nav-link" href="{{ route('host.property.start') }}"><i class="dripicons-wallet"></i>Starting Process</a></li>
                                @endif
                            </ul>
                        </div><!-- end Crypto -->
                        <div id="MetricaTenant" class="main-icon-menu-pane">
                            <div class="title-box">
                                <h6 class="menu-title">Team Players</h6>        
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
                        <div id="MetricaOthers" class="main-icon-menu-pane">
                            <div class="title-box">
                                <h6 class="menu-title">Others</h6>      
                            </div>
                            <ul class="nav metismenu" id="main_menu_side_nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><i class="dripicons-mail"></i><span class="w-100">Email</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                                    <ul class="nav-second-level" aria-expanded="false">
                                        <li><a href="../others/email-inbox.html">Inbox</a></li>
                                        <li><a href="../others/email-read.html">Read Email</a></li>            
                                    </ul>            
                                </li><!--end nav-item-->
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><i class="dripicons-view-thumb"></i><span class="w-100">UI Elements</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                                    <ul class="nav-second-level" aria-expanded="false">
                                        <li><a href="../others/ui-bootstrap.html">Bootstrap</a></li>
                                        <li><a href="../others/ui-animation.html">Animation</a></li>
                                        <li><a href="../others/ui-avatar.html">Avatar</a></li>
                                        <li><a href="../others/ui-clipboard.html">Clip Board</a></li>
                                        <li><a href="../others/ui-files.html">File Manager</a></li>
                                        <li><a href="../others/ui-ribbons.html">Ribbons</a></li>
                                        <li><a href="../others/ui-dragula.html"><span>Dragula</span></a></li>
                                        <li><a href="../others/ui-check-radio.html"><span>Check & Radio</span></a></li>
                                    </ul>            
                                </li><!--end nav-item-->
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><i class="dripicons-anchor"></i><span class="w-100">Advanced UI</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                                    <ul class="nav-second-level" aria-expanded="false">
                                        <li><a href="../others/advanced-rangeslider.html">Range Slider</a></li>
                                        <li><a href="../others/advanced-sweetalerts.html">Sweet Alerts</a></li>
                                        <li><a href="../others/advanced-nestable.html">Nestable List</a></li>
                                        <li><a href="../others/advanced-ratings.html">Ratings</a></li>
                                        <li><a href="../others/advanced-highlight.html">Highlight</a></li>
                                        <li><a href="../others/advanced-session.html">Session Timeout</a></li>
                                        <li><a href="../others/advanced-idle-timer.html">Idle Timer</a></li>
                                    </ul>            
                                </li><!--end nav-item-->
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><i class="dripicons-document"></i><span class="w-100">Forms</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                                    <ul class="nav-second-level" aria-expanded="false">
                                        <li><a href="../others/forms-elements.html">Basic Elements</a></li>
                                        <li><a href="../others/forms-advanced.html">Advance Elements</a></li>
                                        <li><a href="../others/forms-validation.html">Validation</a></li>
                                        <li><a href="../others/forms-wizard.html">Wizard</a></li>
                                        <li><a href="../others/forms-editors.html">Editors</a></li>
                                        <li><a href="../others/forms-repeater.html">Repeater</a></li>
                                        <li><a href="../others/forms-x-editable.html">X Editable</a></li>
                                        <li><a href="../others/forms-uploads.html">File Upload</a></li>
                                        <li><a href="../others/forms-img-crop.html">Image Crop</a></li>
                                    </ul>            
                                </li><!--end nav-item-->
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><i class="dripicons-graph-line"></i><span class="w-100">Charts</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                                    <ul class="nav-second-level" aria-expanded="false">
                                        <li><a href="../others/charts-apex.html">Apex</a></li>
                                        <li><a href="../others/charts-morris.html">Morris</a></li>
                                        <li><a href="../others/charts-chartist.html">Chartist</a></li>
                                        <li><a href="../others/charts-flot.html">Flot</a></li>
                                        <li><a href="../others/charts-peity.html">Peity</a></li>
                                        <li><a href="../others/charts-chartjs.html">Chartjs</a></li>
                                        <li><a href="../others/charts-sparkline.html">Sparkline</a></li>
                                        <li><a href="../others/charts-knob.html">Jquery Knob</a></li>
                                        <li><a href="../others/charts-justgage.html">JustGage</a></li>
                                    </ul>            
                                </li><!--end nav-item-->
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><i class="dripicons-view-list-large"></i><span class="w-100">Tables</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                                    <ul class="nav-second-level" aria-expanded="false">
                                        <li><a href="../others/tables-basic.html">Basic</a></li>
                                        <li><a href="../others/tables-datatable.html">Datatables</a></li>
                                        <li><a href="../others/tables-responsive.html">Responsive</a></li>
                                        <li><a href="../others/tables-footable.html">Footable</a></li>
                                        <li><a href="../others/tables-jsgrid.html">Jsgrid</a></li>
                                        <li><a href="../others/tables-editable.html">Editable</a></li>
                                    </ul>            
                                </li><!--end nav-item-->
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><i class="dripicons-headset"></i><span class="w-100">Icons</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                                    <ul class="nav-second-level" aria-expanded="false">
                                        <li><a href="../others/icons-materialdesign.html">Material Design</a></li>
                                        <li><a href="../others/icons-dripicons.html">Dripicons</a></li>
                                        <li><a href="../others/icons-fontawesome.html">Font awesome</a></li>
                                        <li><a href="../others/icons-themify.html">Themify</a></li>
                                        <li><a href="../others/icons-typicons.html">Typicons</a></li>
                                        <li><a href="../others/icons-emoji.html">Emoji <i class="em em-ok_hand"></i></a></li>
                                        <li><a href="../others/icons-svg.html">SVG</a></li>
                                    </ul>            
                                </li><!--end nav-item-->
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><i class="dripicons-map"></i><span class="w-100">Maps</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                                    <ul class="nav-second-level" aria-expanded="false">
                                        <li><a href="../others/maps-google.html">Google Maps</a></li>
                                        <li><a href="../others/maps-vector.html">Vector Maps</a></li>        
                                    </ul>            
                                </li><!--end nav-item-->
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><i class="dripicons-article"></i><span class="w-100">Email Templates</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                                    <ul class="nav-second-level" aria-expanded="false">
                                        <li><a href="../others/email-templates-basic.html">Basic Action Email</a></li>
                                        <li><a href="../others/email-templates-alert.html">Alert Email</a></li>
                                        <li><a href="../others/email-templates-billing.html">Billing Email</a></li>               
                                    </ul>            
                                </li><!--end nav-item-->
                            </ul><!--end nav-->
                        </div><!-- end Others -->
        
                        <div id="MetricaPages" class="main-icon-menu-pane">
                            <div class="title-box">
                                <h6 class="menu-title">Pages</h6>        
                            </div>
                            <ul class="nav">
                                <li class="nav-item"><a class="nav-link" href="../pages/pages-profile.html"><i class="dripicons-user"></i>Profile</a></li>
                                <li class="nav-item"><a class="nav-link" href="../pages/pages-chat.html"><i class="dripicons-conversation"></i>Chat</a></li>
                                <li class="nav-item"><a class="nav-link" href="../pages/pages-contact-list.html"><i class="dripicons-user-id"></i>Contact List</a></li>
                                <li class="nav-item"><a class="nav-link" href="../pages/pages-tour.html"><i class="dripicons-rocket"></i>Tour</a></li>
                                <li class="nav-item"><a class="nav-link" href="../pages/pages-timeline.html"><i class="dripicons-clock"></i>Timeline</a></li>
                                <li class="nav-item"><a class="nav-link" href="../pages/pages-invoice.html"><i class="dripicons-document"></i>Invoice</a></li>
                                <li class="nav-item"><a class="nav-link" href="../pages/pages-treeview.html"><i class="dripicons-network-3"></i>Treeview</a></li>
                                <li class="nav-item"><a class="nav-link" href="../pages/pages-starter.html"><i class="dripicons-clipboard"></i>Starter Page</a></li>
                                <li class="nav-item"><a class="nav-link" href="../pages/pages-pricing.html"><i class="dripicons-article"></i>Pricing</a></li>
                                <li class="nav-item"><a class="nav-link" href="../pages/pages-blogs.html"><i class="dripicons-blog"></i>Blogs</a></li>
                                <li class="nav-item"><a class="nav-link" href="../pages/pages-faq.html"><i class="dripicons-question"></i>FAQs</a></li>
                                <li class="nav-item"><a class="nav-link" href="../pages/pages-gallery.html"><i class="dripicons-photo-group"></i>Gallery</a></li>
                            </ul>
                        </div><!-- end Pages -->
                        <div id="MetricaAuthentication" class="main-icon-menu-pane">
                            <div class="title-box">
                                <h6 class="menu-title">Authentication</h6>     
                            </div>
                            <ul class="nav">
                                <li class="nav-item"><a class="nav-link" href="../authentication/auth-login.html"><i class="dripicons-enter"></i>Log in</a></li>
                                <li class="nav-item"><a class="nav-link" href="../authentication/auth-register.html"><i class="dripicons-pencil"></i>Register</a></li>
                                <li class="nav-item"><a class="nav-link" href="../authentication/auth-recover-pw.html"><i class="dripicons-clockwise"></i>Recover Password</a></li>
                                <li class="nav-item"><a class="nav-link" href="../authentication/auth-lock-screen.html"><i class="dripicons-lock"></i>Lock Screen</a></li>
                                <li class="nav-item"><a class="nav-link" href="../authentication/auth-404.html"><i class="dripicons-warning"></i>Error 404</a></li>
                                <li class="nav-item"><a class="nav-link" href="../authentication/auth-500.html"><i class="dripicons-wrong"></i>Error 500</a></li>
                            </ul>
                        </div><!-- end Authentication-->
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
    </body>
</html>