@extends('admin.layouts.main')
@section('content')
<div class="content-wrapper">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Form Highlight</h4>
      <form class="forms-sample" method="post" action="{{ route('admin.hero.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="row">
          <div class="form-group col-md-6">
            <label for="judul">Judul</label>
            <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" placeholder="Masukan judul" value="{{ old('judul') }}">
            @error('judul')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group col-md-6">
            <label for="deskripsi">Deskripsi</label>
            <input type="text" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" placeholder="Masukan deskripsi" value="{{ old('deskripsi') }}">
            @error('deskripsi')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        </div>
        <div class="row">
          <div class="form-group col-md-6">
            <label>Pilih gambar</label>
            <input type="file" name="gambar" class="file-upload-default @error('gambar') is-invalid @enderror">
            <div class="input-group col-xs-12">
              <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Gambar">
              <span class="input-group-append">
                <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
              </span>
            </div>
            @error('gambar')
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
            <h3 class="card-title">Data Highlight</h3>
          </div>
          <table class="table-hover table">
            <thead>
              <tr>
                <th>Nomor</th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Gambar</th>
                <th style="width: 120px">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($heros as $c)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $c->judul }}</td>
                <td>{{ $c->deskripsi }}</td>
                <td>
                  <a href="{{ asset('user/images/background/' . $c->gambar) }}" data-lightbox="hero-image" data-title="{{ $c->gambar }}">
                    <img style="width: 100px; height: 100px;" src="{{ asset('user/images/background/' . $c->gambar) }}" alt="{{ $c->gambar }}">
                  </a>
                </td>
                <td>
                  <div class="d-flex justify-content-between">
                    <button data-toggle="modal" data-target="#modalEdit{{$c->id}}" class="btn btn-warning mr-1">Edit</button>
                    <form action="{{ route('admin.hero.destroy', $c->id) }}" method="post">
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

@foreach ($heros as $c)
<!-- Modal Edit -->
<div class="modal fade" id="modalEdit{{$c->id}}" tabindex="-1" role="dialog" aria-labelledby="modalEditLabel{{$c->id}}" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalEditLabel{{$c->id}}">Edit Highlight - {{ $c->nama }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="forms-sample" action="{{ route('admin.hero.update', $c->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="form-group">
            <label for="judul">Judul</label>
            <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukan judul" value="{{ $c->judul }}">
          </div>
          <div class="form-group">
            <label for="deskripsi">Deskripsi Hero</label>
            <input type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="Masukan deskripsi" value="{{ $c->deskripsi }}">
          </div>
          <div class="form-group">
            <label>Pilih gambar</label>
            <input type="file" name="gambar" class="file-upload-default">
            <div class="input-group col-xs-12">
              <input type="text" class="form-control file-upload-info" disabled="" placeholder="Kosongkan jika tidak ingin diubah">
              <span class="input-group-append">
                <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
              </span>
            </div>
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
  $(document).ready(function() {
    $('.table').DataTable({
      responsive: true
    });
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