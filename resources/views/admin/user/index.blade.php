@extends('admin.layouts.main')
@section('content')
<div class="content-wrapper">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Form Akun</h4>
      <form class="forms-sample" method="post" action="{{ route('admin.user.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="row">
          <div class="form-group col-md-6">
            <label for="nama">Nama</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" placeholder="Masukan nama akun" value="{{ old('nama') }}">
            @error('nama')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group col-md-6">
            <label for="username">Username</label>
            <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" placeholder="Masukan username akun" value="{{ old('username') }}">
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
            <label for="role">Pilih Role</label>
            <select class="select-role form-control" name="role">
              <option value="" {{ old('role') == '' ? 'selected' : '' }}>Pilih Role</option>
              <option value="1" {{ old('role') == '1' ? 'selected' : '' }}>Admin</option>
              <option value="2" {{ old('role') == '2' ? 'selected' : '' }}>Karyawan</option>
            </select>
            @error('role')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        </div>
        <button type="submit" class="btn btn-primary mr-2">Submit</button>
      </form>
    </div>
  </div>

  <div class="container-fluid mt-4">
    <div class="row">
      <div class="col-12 col-md-12">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Data Akun</h3>
          </div>
          <table class="table-hover table">
            <thead>
              <tr>
                <th>Nomor</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Role</th>
                <th style="width: 120px">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($users as $c)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $c->nama }}</td>
                <td>{{ $c->username }}</td>
                <td>{{ $c->role == 1 ? 'Admin' : 'Karyawan' }}</td>
                <td>
                  <div class="d-flex justify-content-between">
                    <button data-toggle="modal" data-target="#modalEdit{{$c->id}}" class="btn btn-warning mr-1">Edit</button>
                    <form action="{{ route('admin.user.destroy', $c->id) }}" method="post">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger show_confirm">Delete</button>
                    </form>
                  </div>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

@foreach ($users as $c)
<!-- Modal Edit user -->
<div class="modal fade" id="modalEdit{{$c->id}}" role="dialog" aria-labelledby="modalEditLabel{{$c->id}}" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalEditLabel{{$c->id}}">Edit User - {{ $c->nama }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="forms-sample" action="{{ route('admin.user.update', $c->id) }}" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
          @csrf
          @method('PUT')
          <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" placeholder="Masukan nama akun" value="{{ $c->nama }}">
          </div>
          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" placeholder="Masukan username akun" value="{{ $c->username }}">
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <div class="input-group">
              <input name="password" type="password" class="form-control form-control-lg password" id="password" placeholder="Kosongkan jikda tidak diubah">
              <div class="input-group-append">
                <button class="btn btn-outline-secondary togglePassword" type="button" id="togglePassword">
                  <i class="fas fa-eye"></i>
                </button>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="role">Pilih Role</label>
            <select class="select-role form-control" name="role">
              <option value="" {{ $c->role == '' ? 'selected' : '' }}>Pilih Role</option>
              <option value="1" {{ $c->role == '1' ? 'selected' : '' }}>Admin</option>
              <option value="2" {{ $c->role == '2' ? 'selected' : '' }}>Karyawan</option>
            </select>
            @error('role')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endforeach

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
    var togglePasswords = document.querySelectorAll('.togglePassword');
    togglePasswords.forEach(function(togglePassword) {
      togglePassword.addEventListener('click', function() {
        console.log('klik');
        var modal = togglePassword.closest('.modal');
        var password = modal.querySelector('.password');

        var type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);

        togglePassword.querySelector('i').classList.toggle('fa-eye');
        togglePassword.querySelector('i').classList.toggle('fa-eye-slash');
      });
    });
  });


  $(document).ready(function() {
    $('.table').DataTable({
      responsive: true
    });
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