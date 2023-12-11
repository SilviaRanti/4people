@extends('admin.layouts.main')
@section('content')
<div class="content-wrapper">
  <div class="container-fluid mt-4">
    <div class="row">
      <div class="col-12 col-md-12">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Data Latest Work</h3>
          </div>
          <table class="table-hover table">
            <thead>
              <tr>
                <th>Urutan Gambar</th>
                <th>Gambar</th>
                <th style="width: 120px">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($latestWork as $c)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                  <a href="{{ asset('user/images/last-wrok/' . $c->gambar) }}" data-lightbox="hero-image" data-title="{{ $c->gambar }}">
                    <img style="width: 100px; height: 100px;" src="{{ asset('user/images/last-wrok/' . $c->gambar) }}" alt="{{ $c->gambar }}">
                  </a>
                </td>
                <td>
                  <div class="d-flex justify-content-between">
                    <button data-toggle="modal" data-target="#modalEdit{{$c->id}}" class="btn btn-warning mr-1">Edit</button>
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

@foreach ($latestWork as $c)
<!-- Modal Edit Hero -->
<div class="modal fade" id="modalEdit{{$c->id}}" tabindex="-1" role="dialog" aria-labelledby="modalEditLabel{{$c->id}}" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalEditLabel{{$c->id}}">Edit Latest Work - {{ $c->urutan }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="forms-sample" action="{{ route('admin.latest-works.update', $c->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
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
    $('.show_confirm').click(function(event) {
      var form = $(this).closest("form");
      var name = $(this).data("name");
      event.preventDefault();
      swal({
          title: `Delete Data ?`,
          text: "data yang di hapus tidak dapat dipulihkan!",
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