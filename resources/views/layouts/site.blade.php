<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="keywords" content="Real Estate, Website, Room, House, Property, Property Management, Hosting, Apartment, Shelter, Buy, Sell, Rent, Office Space, Auction, Store, Building, Storey Building, Short Stay, Booking, Guests, Landlord, Host, Accomodation, Room Agent, Hostel, Self Contain" />
        <meta property="og:author" content="Fiifi Pius Geek"/>
        <meta property="og:site_name" content="OShelter"/>
        <meta name="twitter:title" content="{{ $page_title }}"/>
        <meta name="twitter:site" content="@oshelter"/>
        <meta property="og:image" content="{{ asset('assets/light/images/hero-1.jpg') }}, {{ asset('assets/light/images/favicon.png') }}">
        <meta property="og:title" content="{{ $page_title }}">
        <meta property="og:url" content="{{ Request::url() }}"/>
	    <meta property="og:description" content="Real estate platform where property owners can rent, sell, auction their properties and manage their rented properties as well">
        <meta content="Real estate platform where property owners can rent, sell, auction their properties and manage their rented properties as well" name="description" />
        <meta content="Fiifi Pius Geek" name="author" />
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="shortcut icon" href="{{ asset('assets/light/images/favicon.png') }}" type="image/x-icon">
        <title>{{ empty($page_title)? '':$page_title.' -' }} OShelter {{ empty($page_title)? '- The space is yours':'' }}</title>

        <link href="https://fonts.googleapis.com/css?family=Roboto:400,700,900" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('assets/light/css/bootstrap.min.css') }}">
        <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="{{ asset('assets/light/css/font-awesome.min.css') }}">
        @yield('style')
        <link rel="stylesheet" href="{{ asset('assets/light/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/light/css/my-style.css') }}">
        <link href="{{ asset('assets/sweetalert/sweetalert.css') }}" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <div class="pxp-header fixed-top pxp-animate nav-blue-background {{ empty($menu)? '':$menu }}">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-5 col-md-2">
                        <a href="{{ route('index') }}" class="pxp-logo text-decoration-none">
                            <img src="{{ asset('assets/images/logo-sm.png') }}" alt="logo-small" class="thumb-md nav-logo-sm">
                            <img src="{{ asset('assets/images/form-logo.png') }}" alt="logo-small" class="thumb-md nav-logo-sm2 hide-logo-on-scroll">
                            <span class="font-14-large">OShelter</span>
                        </a>
                    </div>
                    
                    <div class="col-2 col-md-7 text-right">
                        <ul class="pxp-nav list-inline">
                            {{-- <li class="list-inline-item"><a href="{{ route('own.property') }}" class="font-14 font-14-sm-laptop font-14-lg-laptop">Own a Property</a></li> --}}
                            <li class="list-inline-item"><a href="#" class="font-12 font-14-sm-laptop font-12-lg-laptop">Own a Property</a></li>
                            <li class="list-inline-item"><a href="{{ route('property.start') }}" class="font-12 font-14-sm-laptop font-12-lg-laptop">Become an Owner</a></li>
                            <li class="list-inline-item">
                                <a href="#" class="font-12 font-14-sm-laptop font-12-lg-laptop"><i class="fa fa-question-circle"></i> Help</a>
                                <ul class="pxp-nav-sub rounded-lg">
                                    <li><a href="{{ route('help.owner') }}" class="font-13 sub-menu-item">Property Owners</a></li>
                                    <li><a href="#" class="font-13 sub-menu-item">Guests and Tenants</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>

                    {{-- @auth
                    <div class="col-2 col-md-1 text-right">
                        <div class="dropdown notification-list">
                            <a class="nav-link" data-toggle="dropdown" href="#" role="button"
                                aria-haspopup="false" aria-expanded="false">
                                <i class="fa fa-bell fa-lg text-white noti-bell"></i>
                                <span class="badge badge-danger badge-pill noti-icon-badge myNotificationCount" data-url="">3</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right myNotifications" data-url=""  style="width: 200px">
                                
                            </div>
                        </div>
                    </div>
                    @endauth --}}

                    <div class="col-5 col-md-2 text-right">
                        <a href="javascript:void(0);" class="pxp-header-nav-trigger"><span class="fa fa-bars fa-lg"></span></a>
                        
                        @auth
                        <div class="dropdown notification-list float-left">
                            <a class="nav-link" data-toggle="dropdown" href="#" role="button"
                                aria-haspopup="false" aria-expanded="false">
                                <i class="fa fa-bell fa-lg text-white noti-bell"></i>
                                <span class="badge badge-danger badge-pill noti-icon-badge myNotificationCount" data-url="{{ route('notification.count') }}"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right myNotifications" data-url=""  style="width: 200px">
                                
                            </div>
                        </div>
                        @endauth

                        <div class="dropdown">
                            <a href="javascript:void(0);" class="pxp-header-user" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div class="profile-avatar-container p-1">
                                    <i class="fa fa-bars text-dark ml-2"></i>
                                    <img src="{{ asset('assets/images/'.(empty(Auth::user()->image)? 'user.svg':'users/'.Auth::user()->image)) }}" alt="Avatar" class="rounded-circle thumb-sm ml-3" />
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink" style="width: 200px">
                                @auth
                                <a class="dropdown-item" href="#"><span class="fa fa-envelope"></span> Message</a>
                                <a class="dropdown-item" href="{{ route('visits') }}"><span class="fa fa-user"></span> Visits</a>
                                <a class="dropdown-item" href="{{ route('saved') }}"><span class="fa fa-heart"></span> Wishlist</a>
                                <hr>
                                <a class="dropdown-item" href="{{ route('property') }}"><span class="fa fa-home"></span> List a property</a>
                                <a class="dropdown-item" href="{{ route('account') }}"><span class="fa fa-user-circle"></span> Account</a>
                                <hr>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i> Logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                                @endauth
                                @guest
                                <a class="dropdown-item" href="{{ route('login') }}"><span class="fas fa-sign-in-alt"></span> Log in</a>
                                <a class="dropdown-item" href="{{ route('register') }}"><span class="fa fa-user-circle"></span> Sign up</a>
                                <hr>
                                <a class="dropdown-item" href="{{ route('property') }}"><span class="fa fa-home"></span> List a property</a>
                                @endguest
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @yield('content')

        <div class="pxp-footer pt-100 pb-100 mt-100">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-lg-4">
                        <div class="pxp-footer-logo">OShelter</div>
                        <div class="pxp-footer-address mt-2">
                            Joy Lane, Behind Ghana Int. Trade Fair<br>
                            Tse-Addo-Accra, <a href="https://ghanapostgps.com/mapview.html#GL-050-6970" target="_blank">GL-050-6970</a><br>
                            (+233) 030-279-5111
                        </div>
                        <div class="pxp-footer-social mt-2">
                            <a href="https://www.facebook.com/Oshelter"><span class="fa fa-facebook-square text-primary"></span></a>
                            <a href="https://twitter.com/Oshelter1"><span class="fa fa-twitter text-primary"></span></a>
                            <a href="https://www.linkedin.com/in/oshelter-42296b200/"><span class="fa fa-linkedin-square text-primary"></span></a>
                            <a href="https://www.instagram.com/osheltergh/"><span class="fa fa-instagram text-pink"></span></a>
                            <a href="#"><span class="fa fa-youtube-square text-danger"></span></a>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-8">
                        <div class="row">
                            <div class="col-sm-12 col-md-4">
                                <h4 class="pxp-footer-header mt-4 mt-lg-0">Company</h4>
                                <ul class="list-unstyled pxp-footer-links mt-2">
                                    <li><a href="{{ route('index') }}">OShelter</a></li>
                                    <li><a href="{{ route('contact') }}">About Us</a></li>
                                    <li><a href="{{ route('contact') }}">Contact Us</a></li>
                                </ul>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <h4 class="pxp-footer-header mt-4 mt-lg-0">Actions</h4>
                                <ul class="list-unstyled pxp-footer-links mt-2">
                                    <li><a href="#">Buy Properties</a></li>
                                    <li><a href="#">Rent Properties</a></li>
                                    <li><a href="#">Sell Properties</a></li>
                                    <li><a href="#">Auction Properties</a></li>
                                </ul>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <h4 class="pxp-footer-header mt-4 mt-lg-0">Explore</h4>
                                <ul class="list-unstyled pxp-footer-links mt-2">
                                    <li><a href="#">Properties for Rent</a></li>
                                    <li><a href="#">properties for Sale</a></li>
                                    <li><a href="#">Apartments for Auction</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pxp-footer-bottom mt-2">
                    <div><a href="#">Terms & Conditions</a> &nbsp; <a href="#">Privacy Policy</a></div>
                    <div class="pxp-footer-copyright">&copy; OShelter <script>document.write(new Date().getFullYear());</script>. All Rights Reserved.</div>
                </div>
            </div>
        </div>


        <script src="{{ asset('assets/light/js/jquery-3.4.1.min.js') }}"></script>
        {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> --}}
        <script src="{{ asset('assets/light/js/popper.min.js') }}"></script>
        <script src="{{ asset('assets/light/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/sweetalert/sweetalert.min.js') }}"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTTmu7TKO3YhnpFYLdWY2g4ngzmpOj8Kg&amp;libraries=places"></script>
        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                }
            })
        </script>
        @yield('scripts')
        <script src="{{ asset('assets/light/js/main.js') }}"></script>
        <script src="{{ asset('assets/light/js/layout.js') }}"></script>
    </body>
</html>