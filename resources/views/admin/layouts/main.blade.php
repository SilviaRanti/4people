<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>4People Studio</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="{{asset('/favicon.ico')}}" />

  <link rel="stylesheet" href="{{asset('admin/vendors/feather/feather.css')}}">
  <link rel="stylesheet" href="{{asset('admin/vendors/ti-icons/css/themify-icons.css')}}">
  <link rel="stylesheet" href="{{asset('admin/vendors/css/vendor.bundle.base.css')}}">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="{{asset('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('admin/js/select.dataTables.min.css')}}">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{asset('admin/css/vertical-layout-light/style.css')}}">
  <!-- endinject -->
  <!-- lightbox -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" rel="stylesheet">
  <!-- fa icon -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="{{asset('admin/vendors/select2/select2.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/vendors/select2-bootstrap-theme/select2-bootstrap.min.css')}}">
  @stack('css')
</head>

<body>

  <div class="container-scroller">
    @include('admin.partials.header')
    <div class="container-fluid page-body-wrapper">
      @include('admin.partials.sidebar')
      <div class="main-panel">
        @yield('content')
      </div>
    </div>
  </div>
  <!-- plugins:js -->
  <script src="{{asset('admin/vendors/js/vendor.bundle.base.js')}}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="{{asset('admin/vendors/chart.js/Chart.min.js')}}"></script>
  <script src="{{asset('admin/vendors/datatables.net/jquery.dataTables.js')}}"></script>
  <script src="{{asset('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.js')}}"></script>
  <script src="{{asset('admin/js/dataTables.select.min.js')}}"></script>
  <script src="{{asset('admin/vendors/select2/select2.min.js')}}"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{asset('admin/js/off-canvas.js')}}"></script>
  <script src="{{asset('admin/js/hoverable-collapse.js')}}"></script>
  <script src="{{asset('admin/js/template.js')}}"></script>
  <script src="{{asset('admin/js/settings.js')}}"></script>
  <script src="{{asset('admin/js/todolist.js')}}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{asset('admin/js/dashboard.js')}}"></script>
  <script src="{{asset('admin/js/Chart.roundedBarCharts.js')}}"></script>
  <script src="{{asset('admin/js/typeahead.js')}}"></script>
  <script src="{{asset('admin/js/file-upload.js')}}"></script>
  <!-- End custom js for this page-->
  <!-- sweet alert -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
  <!-- light box -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
  @stack('script')
  <style>
    .select2-selection--single {
      width: 100% !important;
      height: 2.875rem !important;
    }

    .select2-container--default .select2-selection--single .select2-selection__rendered {
      line-height: 20px !important;
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow b {
      top: 80% !important;
    }


   .select2-hidden-accessible {
      position: inherit !important;
    }

    .select2-container {
      width: 100% !important;
    }
  </style>
</body>

</html>