<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>4People Studio</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="{{asset('admin/vendors/feather/feather.css')}}">
  <link rel="stylesheet" href="{{asset('admin/vendors/ti-icons/css/themify-icons.css')}}">
  <link rel="stylesheet" href="{{asset('admin/vendors/css/vendor.bundle.base.css')}}">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="{{asset('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}">
  <link rel="stylesheet" href="{{asset('admin/vendors/ti-icons/css/themify-icons.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('admin/js/select.dataTables.min.css')}}">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{asset('admin/css/vertical-layout-light/style.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{asset('admin/images/favicon.png')}}" />
  @stack('css')
</head>

<body>

  <div class="container-scroller">
    @include('admin.partials.header')
    <div class="container-fluid page-body-wrapper">
      @include('admin.partials.sidebar')
      <div class="main-panel">
        @yield('content')
        @include('admin.partials.footer')
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
  <!-- End custom js for this page-->
  @stack('script')

</body>

</html>