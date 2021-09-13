<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from validthemes.com/themeforest/examin/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 30 Apr 2019 06:32:44 GMT -->
<head>
    <!-- ========== Meta Tags ========== -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="SHE- Tell Your Untold Story">

    <!-- ========== Page Title ========== -->
    <title>She</title>

    <!-- ========== Favicon Icon ========== -->
    <link rel="shortcut icon" href="{{asset('frontview')}}/img/favicon.png" type="image/x-icon">

    <!-- ========== Start Stylesheet ========== -->
    <link href="{{asset('frontview')}}/css/bootstrap.min.css" rel="stylesheet" />
    <link href="{{asset('frontview')}}/css/font-awesome.min.css" rel="stylesheet" />
    <link href="{{asset('frontview')}}/css/flaticon-set.css" rel="stylesheet" />
    <link href="{{asset('frontview')}}/css/magnific-popup.css" rel="stylesheet" />
    <link href="{{asset('frontview')}}/css/owl.carousel.min.css" rel="stylesheet" />
    <link href="{{asset('frontview')}}/css/owl.theme.default.min.css" rel="stylesheet" />
    <link href="{{asset('frontview')}}/css/animate.css" rel="stylesheet" />
    <link href="{{asset('frontview')}}/css/bootsnav.css" rel="stylesheet" />
    <link href="{{asset('frontview')}}/style.css" rel="stylesheet">
    <link href="{{asset('frontview')}}/css/responsive.css" rel="stylesheet" />
    <!-- ========== End Stylesheet ========== -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="{{asset('frontview')}}/js/html5/html5shiv.min.js"></script>
      <script src="{{asset('frontview')}}/js/html5/respond.min.js"></script>
    <![endif]-->

    <!-- ========== Google Fonts ========== -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700,800" rel="stylesheet">

</head>

<body>

    <!-- Preloader Start -->
    <div class="se-pre-con"></div>
    <!-- Preloader Ends -->

    <!-- Start Header Top 
    ============================================= -->
    
    <!-- End Header Top -->

    <!-- Header 
    ============================================= -->
    <header id="home">

        <!-- Start Navigation -->
        <nav class="navbar navbar-default navbar-sticky bootsnav">

           

            

        </nav>
        <!-- End Navigation -->

    </header>
    <!-- End Header -->

    <!-- Start Login 
    ============================================= -->
    <div class="login-area default-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    @if(count($errors)>0)

                      @foreach($errors->all() as $error)

                         <p class="alert alert-danger" >{{$error}}</p>
                      @endforeach
                    @endif

                    @if (Session::has('message'))
                            <div class="alert alert-danger">{{ Session::get('message') }}</div>
                            @endif
                            
                           @if(!empty($error))
                 <div class="alert alert-danger"> {{ $error }}</div>
                          @endif
                      
                    <form action="{{url('verify_other_otp')}}" id="login-form" class="white-popup-block" method="post">
                        {{csrf_field()}}
                        <div class="col-md-4 login-social" style="padding-top:5%">

                              <img src="{{asset('image')}}/logo.png">
                            
                        </div>
                        <div class="col-md-8 login-custom">
                            <h4>Enter Otp</h4>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Otp*" type="text" name="otp">
                                        <input type="hidden" value="{{$otp}}" name="v_otp">
                                         <input type="hidden" value="{{$mobile_number}}" name="mobile_number">
                                        
                                    </div>
                                </div>
                            </div>
                          
                            
                            {{-- <div class="col-md-12">
                                <div class="row">
                                    
                                    <a title="Lost Password" href="{{url('forgot_password')}}" class="lost-pass-link">Lost your password?</a>
                                </div>
                            </div> --}}
                            <div class="col-md-12">
                                <div class="row">
                                    <button type="submit">
                                        Submit
                                    </button>
                                </div>
                            </div>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Login Area -->

    <!-- Start Footer 
    ============================================= -->
    
    <!-- End Footer -->

    <!-- jQuery Frameworks
    ============================================= -->
    <script src="{{asset('frontview')}}/js/jquery-1.12.4.min.js"></script>
    <script src="{{asset('frontview')}}/js/bootstrap.min.js"></script>
    <script src="{{asset('frontview')}}/js/equal-height.min.js"></script>
    <script src="{{asset('frontview')}}/js/jquery.appear.js"></script>
    <script src="{{asset('frontview')}}/js/jquery.easing.min.js"></script>
    <script src="{{asset('frontview')}}/js/jquery.magnific-popup.min.js"></script>
    <script src="{{asset('frontview')}}/js/modernizr.custom.13711.js"></script>
    <script src="{{asset('frontview')}}/js/owl.carousel.min.js"></script>
    <script src="{{asset('frontview')}}/js/wow.min.js"></script>
    <script src="{{asset('frontview')}}/js/isotope.pkgd.min.js"></script>
    <script src="{{asset('frontview')}}/js/imagesloaded.pkgd.min.js"></script>
    <script src="{{asset('frontview')}}/js/count-to.js"></script>
    <script src="{{asset('frontview')}}/js/bootsnav.js"></script>
    <script src="{{asset('frontview')}}/js/main.js"></script>

</body>

<!-- Mirrored from validthemes.com/themeforest/examin/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 30 Apr 2019 06:32:44 GMT -->
</html>