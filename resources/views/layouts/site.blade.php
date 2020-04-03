<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="keywords" content="Real Estate, Website, Room, House, Property, Property Management, Hosting, Apartment, Buy, Sell, Rent, Office Space, Auction, Store, Building, Storey Building, Short Stay, Booking, Guests, Landlord, Host, Accomodation, Room Agent, Hostel, Self Contain" />
        <meta property="og:image" content="{{ asset('assets/light/images/images/ph-big.jpg') }}, {{ asset('assets/light/images/favicon.png') }}">
	    <meta property="og:title" content="Real Estate | The Space Is Yours | VibSpace | Property Management">
	    <meta property="og:description" content="Real estate platform where property owners can rent, sell, auction their properties and manage their rented properties as well">
        <meta content="Real estate platform where property owners can rent, sell, auction their properties and manage their rented properties as well" name="description" />
        <meta content="Fiifi Pius(Geek)" name="author" />
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="shortcut icon" href="{{ asset('assets/light/images/favicon.png') }}" type="image/x-icon">
        <title>{{ empty($page_title)? '':$page_title.' -' }} VibSpace {{ empty($page_title)? '- The space is yours':'' }}</title>

        <link href="https://fonts.googleapis.com/css?family=Roboto:400,700,900" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('assets/light/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/light/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/light/css/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/light/css/owl.theme.default.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/light/css/style.css') }}">
        @yield('style')
    </head>
    <body>
        <div class="pxp-header fixed-top pxp-animate">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-5 col-md-2">
                        <a href="{{ route('index') }}" class="pxp-logo text-decoration-none">VibSpace</a>
                    </div>
                    <div class="col-2 col-md-8 text-right">
                        <ul class="pxp-nav list-inline">
                            <li class="list-inline-item"><a href="{{ route('index') }}">List a Property</a></li>
                            <li class="list-inline-item"><a href="#">Listings</a></li>
                            <li class="list-inline-item pxp-is-last"><a href="#">Adventure</a></li>
                            <li class="list-inline-item pxp-has-btns">
                                <div class="pxp-user-btns">
                                    <a href="#" class="pxp-user-btns-signup pxp-signup-trigger">Sign Up</a>
                                    <a href="#" class="pxp-user-btns-login pxp-signin-trigger">Sign In</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="col-5 col-md-2 text-right">
                        <a href="javascript:void(0);" class="pxp-header-nav-trigger"><span class="fa fa-bars"></span></a>
                        <a href="javascript:void(0);" class="pxp-header-user pxp-signin-trigger"><span class="fa fa-user-o"></span></a>
                    </div>
                </div>
            </div>
        </div>

        @yield('content')

        <div class="pxp-footer pt-100 pb-100 mt-100">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-lg-4">
                        <div class="pxp-footer-logo">VibSpace</div>
                        <div class="pxp-footer-address mt-2">
                            90 Fifth Avenue, 3rd Floor<br>
                            San Francisco, CA 1980<br>
                            (123) 456-7890
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
                                    <li><a href="#">VibSpace</a></li>
                                    <li><a href="#">About Us</a></li>
                                    <li><a href="#">Listing</a></li>
                                    <li><a href="#">Contact Us</a></li>
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
                                    <li><a href="#">Homes for Rent</a></li>
                                    <li><a href="#">Apartments for Rent</a></li>
                                    <li><a href="#">Homes for Sale</a></li>
                                    <li><a href="#">Apartments for Sale</a></li>
                                    <li><a href="#">CRM</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pxp-footer-bottom mt-2">
                    <div><a href="#">Terms & Conditions</a> &nbsp; <a href="#">Privacy Policy</a> &nbsp; <a href="#">Sitemap</a></div>
                    <div class="pxp-footer-copyright">&copy; VibSpace <script>document.write(new Date().getFullYear());</script>. All Rights Reserved.</div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="pxp-signin-modal" tabindex="-1" role="dialog" aria-labelledby="pxpSigninModal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h5 class="modal-title" id="pxpSigninModal">Welcome back!</h5>
                        <form class="mt-4">
                            <div class="form-group">
                                <label for="pxp-signin-email">Email</label>
                                <input type="text" class="form-control" id="pxp-signin-email" placeholder="Enter your email address">
                            </div>
                            <div class="form-group">
                                <label for="pxp-signin-pass">Password</label>
                                <input type="password" class="form-control" id="pxp-signin-pass" placeholder="Enter your password">
                            </div>
                            <div class="form-group">
                                <a href="#" class="pxp-agent-contact-modal-btn">Sign In</a>
                            </div>
                            <div class="form-group mt-4 text-center pxp-modal-small">
                                <a href="#" class="pxp-modal-link">Forgot password</a>
                            </div>
                            <div class="text-center pxp-modal-small">
                                New to Resideo? <a href="javascript:void(0);" class="pxp-modal-link pxp-signup-trigger">Create an account</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="pxp-signup-modal" tabindex="-1" role="dialog" aria-labelledby="pxpSignupModal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h5 class="modal-title" id="pxpSignupModal">Create an account</h5>
                        <form class="mt-4">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="pxp-signup-firstname">First Name</label>
                                        <input type="text" class="form-control" id="pxp-signup-firstname" placeholder="Enter first name">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="pxp-signup-lastname">Last Name</label>
                                        <input type="text" class="form-control" id="pxp-signup-lastname" placeholder="Enter last name">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="pxp-signup-email">Email</label>
                                <input type="text" class="form-control" id="pxp-signup-email" placeholder="Enter your email address">
                            </div>
                            <div class="form-group">
                                <label for="pxp-signup-pass">Password</label>
                                <input type="password" class="form-control" id="pxp-signup-pass" placeholder="Create a password">
                            </div>
                            <div class="form-group">
                                <a href="#" class="pxp-agent-contact-modal-btn">Sign Up</a>
                            </div>
                            <div class="text-center mt-4 pxp-modal-small">
                                Already have an account? <a href="javascript:void(0);" class="pxp-modal-link pxp-signin-trigger">Sign in</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script src="{{ asset('assets/light/js/jquery-3.4.1.min.js') }}"></script>
        <script src="{{ asset('assets/light/js/popper.min.js') }}"></script>
        <script src="{{ asset('assets/light/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/light/js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('assets/light/js/main.js') }}"></script>
        <script type="text/javascript" id="cookieinfo"
            src="//cookieinfoscript.com/js/cookieinfo.min.js"
            data-bg="#645862"
            data-fg="#FFFFFF"
            data-link="#F1D600"
            data-cookie="CookieInfoScript"
            data-text-align="left"
            data-close-text="Got it!">
        </script>

        @yield('scripts')
    </body>
</html>