@extends('admin.layouts.main')
@section('content')
<div class="content-wrapper">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Form Kategori</h4>
      <form class="forms-sample" method="post" action="{{ route('admin.categories.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="row">
          <div class="form-group col-md-4">
            <label for="nama">Nama Kategori</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" placeholder="Masukan nama kategori" value="{{ old('nama') }}">
            @error('nama')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        </div>
        <div class="row">
          <div class="form-group col-md-12">
            <label for="deskripsi">Deskripsi Kategori</label>
            <textarea id="deskripsi" name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="3" placeholder="Deskripsi kategori...">{{ old('deskripsi') }}</textarea>
            @error('deskripsi')
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
            <h3 class="card-title">Data Kategori</h3>
          </div>
          <table class="table-hover table">
            <thead>
              <tr>
                <th>Nomor</th>
                <th>Nama</th>
                <th>Deskripsi</th>
                <th style="width: 120px">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($categories as $c)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $c->nama }}</td>
                <td class="wrap-text">{{ $c->deskripsi }}</td>
                <td>
                  <div class="d-flex justify-content-between">
                    <button data-toggle="modal" data-target="#modalEdit{{$c->id}}" class="btn btn-warning mr-1">Edit</button>
                    <form action="{{ route('admin.categories.destroy', $c->id) }}" method="post">
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

@foreach ($categories as $c)
<!-- Modal Edit user -->
<div class="modal fade" id="modalEdit{{$c->id}}" role="dialog" aria-labelledby="modalEditLabel{{$c->id}}" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalEditLabel{{$c->id}}">Edit Kategori - {{ $c->nama }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="forms-sample" action="{{ route('admin.categories.update', $c->id) }}" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
          @csrf
          @method('PUT')
          <div class="form-group">
            <label for="nama">Nama Kategori</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" placeholder="Masukan nama kategori" value="{{ $c->nama }}">
            @error('nama')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label for="deskripsi">Deskripsi Kategori</label>
            <textarea id="deskripsi" name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="6" placeholder="Deskripsi kategori...">{{ $c->deskripsi }}</textarea>
            @error('deskripsi')
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


<style>
  .table {
    table-layout: fixed;
    width: 100%;
  }

  .wrap-text {
    word-wrap: break-word;
    white-space: normal;
    overflow-wrap: break-word;
    overflow: hidden;
    text-overflow: ellipsis;
  }
</style>

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