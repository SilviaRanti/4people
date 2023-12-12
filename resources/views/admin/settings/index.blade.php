@extends('admin.layouts.main')
@section('content')
<div class="content-wrapper">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Setting Akun</h4>
      <form class="forms-sample" method="post" action="{{ route('admin.settings.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="row">
          <div class="form-group col-md-6">
            <label for="nama">Nama</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" placeholder="Masukan nama hero" value="{{ Auth::guard('admin')->user()->nama }}">
            @error('nama')
            <div class=" invalid-feedback">{{ $message }}
            </div>
            @enderror
          </div>
          <div class="form-group col-md-6">
            <label for="username">Username</label>
            <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" placeholder="Masukan username hero" value="{{ Auth::guard('admin')->user()->username }}">
            @error('username')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        </div>
        <div class="row">
          <div class="form-group col-md-6">
            <label for="password">Password</label>
            <div class="input-group">
              <input name="password" type="password" class="form-control  @error('nama') is-invalid @enderror form-control-lg" id="password" placeholder="Password">
              <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                  <i class="fas fa-eye"></i>
                </button>
                @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>
          </div>
          <div class="form-group col-md-6">
            <label for="password">Password Baru</label>
            <div class="input-group">
              <input name="password_baru" type="password" class="form-control  @error('nama') is-invalid @enderror form-control-lg" id="passwordBaru" placeholder="kosongkan jika tidak diubah">
              <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button" id="togglePasswordBaru">
                  <i class="fas fa-eye"></i>
                </button>
                @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>
          </div>
        </div>
        <button type="submit" class="btn btn-primary mr-2">Update</button>
      </form>
    </div>
  </div>
</div>

@endsection

@push('script')
<script>
  document.addEventListener('DOMContentLoaded', function() {
    var togglePassword = document.getElementById('togglePassword');
    var password = document.getElementById('password');

    togglePassword.addEventListener('click', function() {
      var type = password.getAttribute('type') === 'password' ? 'text' : 'password';
      password.setAttribute('type', type);
      togglePassword.querySelector('i').classList.toggle('fa-eye');
      togglePassword.querySelector('i').classList.toggle('fa-eye-slash');
    });
  });

  document.addEventListener('DOMContentLoaded', function() {
    var togglePassword = document.getElementById('togglePasswordBaru');
    var password = document.getElementById('passwordBaru');

    togglePassword.addEventListener('click', function() {
      var type = password.getAttribute('type') === 'password' ? 'text' : 'password';
      password.setAttribute('type', type);
      togglePassword.querySelector('i').classList.toggle('fa-eye');
      togglePassword.querySelector('i').classList.toggle('fa-eye-slash');
    });
  });


  $(document).ready(function() {
    $('.select-role').select2();
    $('.show_confirm').click(function(event) {
      var form = $(this).closest("form");
      var name = $(this).data("name");
      event.preventDefault();
      swal({
          title: `Delete Data ?`,
          text: "data yang di hapus tidak dapat dipulihkan beserta data lainnya yang terkait!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            form.submit();
          }
        });
    });
  })
</script>
@endpush