<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from metropolitanhost.com/themes/themeforest/html/costic/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 01 Jan 2021 14:12:08 GMT -->
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>She</title>
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
  <link rel="icon" type="image/png" sizes="32x32" href=""{{asset('image')}}/logo.png"">
  @yield('page_css')
  <style>
      .navbar{
            padding:11px 30px;
      }
      .ms-has-quickbar .body-content
      {
          padding-right:5px
      }
  </style>
</head>

<body class="ms-body ms-aside-left-open ms-primary-theme ms-has-quickbar">
  <!-- Preloader -->
  <div id="preloader-wrap">
    <div class="spinner spinner-8">
      <div class="ms-circle1 ms-child"></div>
      <div class="ms-circle2 ms-child"></div>
      <div class="ms-circle3 ms-child"></div>
      <div class="ms-circle4 ms-child"></div>
      <div class="ms-circle5 ms-child"></div>
      <div class="ms-circle6 ms-child"></div>
      <div class="ms-circle7 ms-child"></div>
      <div class="ms-circle8 ms-child"></div>
      <div class="ms-circle9 ms-child"></div>
      <div class="ms-circle10 ms-child"></div>
      <div class="ms-circle11 ms-child"></div>
      <div class="ms-circle12 ms-child"></div>
    </div>
  </div>
  <!-- Overlays -->
  <div class="ms-aside-overlay ms-overlay-left ms-toggler" data-target="#ms-side-nav" data-toggle="slideLeft"></div>
  <div class="ms-aside-overlay ms-overlay-right ms-toggler" data-target="#ms-recent-activity" data-toggle="slideRight"></div>
  <!-- Sidebar Navigation Left -->
 @include('owner.sidebar')
  <!-- Sidebar Right -->

  <!-- Main Content -->
  <main class="body-content">
    <!-- Navigation Bar -->
    <nav class="navbar ms-navbar">
      <div class="ms-aside-toggler ms-toggler pl-0" data-target="#ms-side-nav" data-toggle="slideLeft"> <span class="ms-toggler-bar bg-primary"></span>
        <span class="ms-toggler-bar bg-primary"></span>
        <span class="ms-toggler-bar bg-primary"></span>
      </div>

      <ul class="ms-nav-list ms-inline mb-0" id="ms-nav-options">

        <li class="ms-nav-item dropdown">

        </li>



      </ul>

    </nav>
    @yield('main_content')

    </div>
  </main>
  <!-- MODALS -->
  <!-- Quick bar -->

  <!-- Reminder Modal -->
  <div class="modal fade" id="reminder-modal" tabindex="-1" role="dialog" aria-labelledby="reminder-modal">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header bg-secondary">
          <h5 class="modal-title has-icon text-white"> New Reminder</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form>
          <div class="modal-body">
            <div class="ms-form-group">
              <label>Remind me about</label>
              <textarea class="form-control" name="reminder"></textarea>
            </div>
            <div class="ms-form-group"> <span class="ms-option-name fs-14">Repeat Daily</span>
              <label class="ms-switch float-right">
                <input type="checkbox"> <span class="ms-switch-slider round"></span>
              </label>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="ms-form-group">
                  <input type="text" class="form-control datepicker" name="reminder-date" value="" />
                </div>
              </div>
              <div class="col-md-6">
                <div class="ms-form-group">
                  <select class="form-control" name="reminder-time">
                    <option value="">12:00 pm</option>
                    <option value="">1:00 pm</option>
                    <option value="">2:00 pm</option>
                    <option value="">3:00 pm</option>
                    <option value="">4:00 pm</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-secondary shadow-none" data-dismiss="modal">Add Reminder</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- Notes Modal -->
  <div class="modal fade" id="notes-modal" tabindex="-1" role="dialog" aria-labelledby="notes-modal">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header bg-secondary">
          <h5 class="modal-title has-icon text-white" id="NoteModal">New Note</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form>
          <div class="modal-body">
            <div class="ms-form-group">
              <label>Note Title</label>
              <input type="text" class="form-control" name="note-title" value="">
            </div>
            <div class="ms-form-group">
              <label>Note Description</label>
              <textarea class="form-control" name="note-description"></textarea>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-secondary shadow-none" data-dismiss="modal">Add Note</button>
          </div>
        </form>
      </div>
    </div>
  </div>
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
  <!-- Page Specific Scripts Finish -->
  <!-- Costic core JavaScript -->
  <script src="{{asset('assets')}}/admin/js/framework.js"></script>
  <!-- Settings -->
  <script src="{{asset('assets')}}/admin/js/settings.js"></script>
</body>


<!-- Mirrored from metropolitanhost.com/themes/themeforest/html/costic/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 01 Jan 2021 14:14:34 GMT -->
</html>
