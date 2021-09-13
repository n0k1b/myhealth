<!doctype html>
<html class="no-js" lang="zxx">

<!-- Mirrored from preview.hasthemes.com/aahar/menu-list.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Jan 2021 15:28:35 GMT -->
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Restaurant Management System</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Favicons -->
	<link rel="shortcut icon" href="{{asset('assets')}}/frontend/images/favicon.ico">
	<link rel="apple-touch-icon" href="{{asset('assets')}}/frontend/images/icon.png">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="{{ asset('assets') }}/frontend/css/bootstrap.min.css?{{ time() }}">
	<link rel="stylesheet" href="{{ asset('assets') }}/frontend/css/plugins.css?{{ time() }}">
	<link rel="stylesheet" href="{{ asset('assets') }}/frontend/css/style.css?{{ time() }}">

	<!-- Cusom css -->
   <link rel="stylesheet" href="{{ asset('assets') }}/frontend/css/custom.css?{{ time() }}">
   @yield('page_css')

	<!-- Modernizer js -->
	<script src="{{asset('assets')}}/frontend/js/vendor/modernizr-3.5.0.min.js?{{ time() }}"></script>
</head>
<body>

	<div class="wrapper" id="wrapper">
		<!-- Start Header Area -->
        <header class="htc__header bg--white">
            <!-- Start Mainmenu Area -->
            <div id="sticky-header-with-topbar" class="mainmenu__wrap sticky__header">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-2 col-sm-4 col-md-6 order-1 order-lg-1">

                        </div>

                        <div class="col-lg-1 col-sm-4 col-md-4 order-2 order-lg-3">
                            <div class="header__right d-flex justify-content-end">

                                @yield('cart')
                            </div>
                        </div>
                    </div>
                    <!-- Mobile Menu -->
                        <div class="mobile-menu d-block d-lg-none"></div>
                    <!-- Mobile Menu -->
                </div>
            </div>
            <!-- End Mainmenu Area -->
        </header>
        <!-- End Header Area -->
        <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area bg-image--18">
            <div class="ht__bradcaump__wrap d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="bradcaump__inner text-center">
                                <h2 class="bradcaump-title">Restaurant</h2>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- Start Menu Grid Area -->
     @yield('main_content')
        <!-- End Menu Grid Area -->
        <!-- Start Footer Area -->

        <!-- End Footer Area -->
        <!-- Login Form -->
        <div class="accountbox-wrapper">
            <div class="accountbox text-left">
                <ul class="nav accountbox__filters" id="myTab" role="tablist">
                    <li>
                        <a class="active" id="log-tab" data-toggle="tab" href="#log" role="tab" aria-controls="log" aria-selected="true">Login</a>
                    </li>
                    <li>
                        <a id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Register</a>
                    </li>
                </ul>
                <div class="accountbox__inner tab-content" id="myTabContent">
                    <div class="accountbox__login tab-pane fade show active" id="log" role="tabpanel" aria-labelledby="log-tab">
                        <form action="#">
                            <div class="single-input">
                                <input class="cr-round--lg" type="text" placeholder="User name or email">
                            </div>
                            <div class="single-input">
                                <input class="cr-round--lg" type="password" placeholder="Password">
                            </div>
                            <div class="single-input">
                                <button type="submit" class="food__btn"><span>Go</span></button>
                            </div>
                            <div class="accountbox-login__others">
                                <h6>Or login with</h6>
                                <div class="social-icons">
                                    <ul>
                                        <li class="facebook"><a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a></li>
                                        <li class="twitter"><a href="https://twitter.com/"><i class="fa fa-twitter"></i></a></li>
                                        <li class="pinterest"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="accountbox__register tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <form action="#">
                            <div class="single-input">
                                <input class="cr-round--lg" type="text" placeholder="User name">
                            </div>
                            <div class="single-input">
                                <input class="cr-round--lg" type="email" placeholder="Email address">
                            </div>
                            <div class="single-input">
                                <input class="cr-round--lg" type="password" placeholder="Password">
                            </div>
                            <div class="single-input">
                                <input class="cr-round--lg" type="password" placeholder="Confirm password">
                            </div>

                        </form>
                    </div>
                    <span class="accountbox-close-button"><i class="zmdi zmdi-close"></i></span>
                </div>
            </div>
        </div><!-- //Login Form -->
            <!-- Cartbox -->
     @yield('cart_box')<!-- //Cartbox -->
	</div><!-- //Main wrapper -->

	<!-- JS Files -->
	<script src="{{asset('assets')}}/frontend/js/vendor/jquery-3.2.1.min.js"></script>
	<script src="{{asset('assets')}}/frontend/js/popper.min.js"></script>
	<script src="{{asset('assets')}}/frontend/js/bootstrap.min.js"></script>
	<script src="{{asset('assets')}}/frontend/js/plugins.js"></script>
    <script src="{{asset('assets')}}/frontend/js/active.js"></script>
    @yield('page_js')
</body>

<!-- Mirrored from preview.hasthemes.com/aahar/menu-list.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Jan 2021 15:28:46 GMT -->
</html>
