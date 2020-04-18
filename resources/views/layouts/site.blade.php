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
        <link rel="stylesheet" href="{{ asset('assets/light/css/font-awesome.min.css') }}">
        @yield('style')
        <link rel="stylesheet" href="{{ asset('assets/light/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/light/css/my-style.css') }}">
    </head>
    <body>
        <div class="pxp-header fixed-top pxp-animate {{ empty($menu)? '':$menu }}">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-5 col-md-2">
                        <a href="{{ route('index') }}" class="pxp-logo text-decoration-none">OShelter</a>
                    </div>
                    <div class="col-2 col-md-8 text-right">
                        <ul class="pxp-nav list-inline">
                            <li class="list-inline-item"><a href="{{ route('own.property') }}" class="font-14 font-14-sm-laptop font-14-lg-laptop">Own a Property</a></li>
                            <li class="list-inline-item"><a href="{{ route('property.start') }}" class="font-14 font-14-sm-laptop font-14-lg-laptop">Become an Owner</a></li>
                            <li class="list-inline-item">
                                <a href="#" class="font-14 font-14-sm-laptop font-14-lg-laptop"><i class="fa fa-question-circle"></i> Help</a>
                                <ul class="pxp-nav-sub rounded-lg">
                                    <li><a href="{{ route('help.owner') }}" class="font-13 sub-menu-item">Property Owners</a></li>
                                    <li><a href="{{ route('help.booking') }}" class="font-13 sub-menu-item">Booking And Travellers</a></li>
                                </ul>
                            </li>
                            @guest
                            <li class="list-inline-item ml-lg-5"><a class="font-14 font-14-sm-laptop font-14-lg-laptop" href="{{ route('login') }}" id="signIn">sign In</a></li>
                            <li class="list-inline-item"><a class="font-14 font-14-sm-laptop font-14-lg-laptop" href="{{ route('register') }}" id="signUp">sign Up</a></li>
                            @endguest
                        </ul>
                    </div>
                    <div class="col-5 col-md-2 text-right">
                        <a href="javascript:void(0);" class="pxp-header-nav-trigger"><span class="fa fa-bars fa-lg"></span></a>
                        @auth
                        <div class="dropdown">
                            <a href="javascript:void(0);" class="pxp-header-user" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="{{ asset('assets/images/'.(empty(Auth::user()->image)? 'user.svg':'users/'.Auth::user()->image)) }}" alt="Avatar" class="rounded-circle thumb-md">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="{{ route('dashboard') }}"><span class="fa fa-dashboard"></span> Dashboard</a>
                                <a class="dropdown-item" href="{{ route('property') }}"><span class="fa fa-home"></span> Listings</a>
                                <a class="dropdown-item" href="{{ route('messages') }}"><span class="fa fa-envelope"></span> Messages</a>
                                <a class="dropdown-item" href="{{ route('saved') }}"><span class="fa fa-heart"></span> Saved</a>
                                <a class="dropdown-item" href="{{ route('wallet') }}"><span class="fa fa-google-wallet"></span> My Wallet</a>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i> Logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </div>
                        @endauth
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
                            <a href="#"><span class="fa fa-instagram"></span></a>
                            <a href="#"><span class="fa fa-facebook-square"></span></a>
                            <a href="#"><span class="fa fa-twitter"></span></a>
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
        <script src="{{ asset('assets/light/js/popper.min.js') }}"></script>
        <script src="{{ asset('assets/light/js/bootstrap.min.js') }}"></script>
        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                }
            })
        </script>
        @yield('scripts')
        <script src="{{ asset('assets/light/js/main.js') }}"></script>
        <script>
            $(".btnHeart").on("click", function(e){
                e.preventDefault();
                e.stopPropagation();
                var $this = $(this);
                //login before saving
                var data={
                    property_id : $this.data('id')
                }
                $.ajax({
                    url: "{{ route('saved.submit') }}", 
                    type: 'POST',
                    data: data,
                    statusCode: {
                        401: function() {
                            alert("Login to save favourite.");
                        }
                    },
                    success: function (resp) {
                        if(resp=='success'){

                        }else{
                            console.log('Something went wrong');
                        }
                    },
                    error: function(resp){
                        console.log('Something went wrong with request');
                    }
                    
                });
                return false;
            });
        </script>
    </body>
</html>