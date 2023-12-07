<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>4People Studio</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{asset('admin/vendors/feather/feather.css')}}">
  <link rel="stylesheet" href="{{asset('admin/vendors/ti-icons/css/themify-icons.css')}}">
  <link rel="stylesheet" href="{{asset('admin/vendors/css/vendor.bundle.base.css')}}">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{asset('admin/css/vertical-layout-light/style.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{asset('/favicon.ico')}}" />
  <!-- fa icon -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="{{ asset('/logo.jpg') }}" alt="logo')}}" class="rounded-circle" style="width: 10%;">
              </div>
              <h4>Hello! let's get started</h4>
              <h6 class="font-weight-light">Sign in to continue.</h6>
              <form class="pt-3" method="post" action="{{ route('admin.procesLogin') }}">
                @csrf <!-- Tambahkan token CSRF -->
                <div class="form-group">
                  <input name="username" type="text" class="form-control form-control-lg" id="username" placeholder="Username" value="{{ old('username') }}">
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <input name="password" type="password" class="form-control form-control-lg" id="password" placeholder="Password">
                    <div class="input-group-append">
                      <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                        <i class="fas fa-eye"></i>
                      </button>
                    </div>
                  </div>
                </div>
                <div class="mt-3">
                  <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SIGN IN</button>
                </div>
              </form>
              @if($errors->any())
              <div class="mt-3">
                <div class="alert alert-danger">
                  {{ $errors->first() }}
                </div>
              </div>
              @endif
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="{{asset('admin/vendors/js/vendor.bundle.base.js')}}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{asset('admin/js/off-canvas.js')}}"></script>
  <script src="{{asset('admin/js/hoverable-collapse.js')}}"></script>
  <script src="{{asset('admin/js/template.js')}}"></script>
  <script src="{{asset('admin/js/settings.js')}}"></script>
  <script src="{{asset('admin/js/todolist.js')}}"></script>
  <!-- endinject -->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var togglePassword = document.getElementById('togglePassword');
      var password = document.getElementById('password');

      togglePassword.addEventListener('click', function() {
        var type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);

        // Pastikan Anda menggunakan class yang benar
        togglePassword.querySelector('i').classList.toggle('fa-eye');
        togglePassword.querySelector('i').classList.toggle('fa-eye-slash');
      });
    });
  </script>
</body>

</html>