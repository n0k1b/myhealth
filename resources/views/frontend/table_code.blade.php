<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from metropolitanhost.com/themes/themeforest/html/costic/pages/prebuilt-pages/default-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 01 Jan 2021 14:23:04 GMT -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Costic Dashboard</title>
    <!-- Iconic Fonts -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{{asset('assets')}}/admin/vendors/iconic-fonts/font-awesome/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets')}}/admin/vendors/iconic-fonts/flat-icons/flaticon.css">
    <link rel="stylesheet" href="{{asset('assets')}}/admin/vendors/iconic-fonts/cryptocoins/cryptocoins.css">
    <link rel="stylesheet" href="{{asset('assets')}}/admin/vendors/iconic-fonts/cryptocoins/cryptocoins-colors.css">
    <!-- Bootstrap core CSS -->
    <link href="{{asset('assets')}}/admin/css/bootstrap.min.css" rel="stylesheet">
    <!-- jQuery UI -->
    <link href="{{asset('assets')}}/admin/css/jquery-ui.min.css" rel="stylesheet">
    <!-- Page Specific CSS (Slick Slider.css) -->
    <link href="{{asset('assets')}}/admin/css/slick.css" rel="stylesheet">
    <link href="{{asset('assets')}}/admin/css/datatables.min.css" rel="stylesheet">
    <!-- Costic styles -->
    <link href="{{asset('assets')}}/admin/css/style.css" rel="stylesheet">
    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('assets')}}/admin/favicon.ico">
    @yield('page_css')
  </head>

<body class="ms-body ms-primary-theme ms-logged-out">

  <!-- Preloader -->

  <!-- Overlays -->

  <!-- Sidebar Navigation Left -->

  <!-- Main Content -->
  <main class="body-content">

    <div class="ms-content-wrapper ms-auth">
      <div class="ms-auth-container">
        <div class="ms-auth-col">
          <div class="ms-auth-bg"></div>
        </div>
        <div class="ms-auth-col">
          <div class="ms-auth-form">


            <form class="needs-validation" novalidate="" action="{{ route('check_table_code') }}" method="POST">
                @if(Session::has('error'))
                <div class="alert alert-danger" >

                    {{Session::get('error')}}

                    </div>
                @endif
                @csrf

              <p>Please enter the table code</p>
              <div class="mb-3">
                <label for="validationCustom08">Table code</label>
                <div class="input-group">
                  <input type="text" name="unique_number"  class="form-control" id="validationCustom08" placeholder="Enter the code" required="">
                  <div class="invalid-feedback">Please provide a valid email.</div>
                </div>
              </div>


              <button class="btn btn-primary mt-4 d-block w-100" type="submit">Sign In</button>

              </p>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Forgot Password Modal -->

  </main>
  <!-- SCRIPTS -->
  <!-- Global Required Scripts Start -->
  <script src="{{asset('assets')}}/admin/js/jquery-3.5.0.min.js"></script>
  <script src="{{asset('assets')}}/admin/js/popper.min.js"></script>
  <script src="{{asset('assets')}}/admin/js/bootstrap.min.js"></script>
  <script src="{{asset('assets')}}/admin/js/perfect-scrollbar.js">
  </script>
  <script src="{{asset('assets')}}/admin/js/jquery-ui.min.js">
  </script>
  <!-- Global Required Scripts End -->
  <!-- Page Specific Scripts Start -->

  <script src="{{asset('assets')}}/admin/js/Chart.bundle.min.js">
  </script>
  <script src="{{asset('assets')}}/admin/js/widgets.js"> </script>
  <script src="{{asset('assets')}}/admin/js/clients.js"> </script>
  <script src="{{asset('assets')}}/admin/js/Chart.Financial.js"> </script>
  <script src="{{asset('assets')}}/admin/js/d3.v3.min.js">
  </script>
  <script src="{{asset('assets')}}/admin//js/topojson.v1.min.js">
  </script>
  <script src="{{asset('assets')}}/admin/js/datatables.min.js">
  </script>
  <script src="{{asset('assets')}}/admin/js/data-tables.js"></script>
  @yield('page_js')
</body>



</html>
