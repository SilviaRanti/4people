@extends('admin.layouts.main')
@section('content')
<div class="content-wrapper">
  <div class="card">
    <form class="forms-sample" method="post" action="{{ route('admin.packages.store') }}" enctype="multipart/form-data">
      <div class="card-body">
        <h4 class="card-title">Form Package</h4>
        @csrf
        <div class="row">
          <div class="form-group col-md-4">
            <label for="nama">Nama</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" placeholder="Masukan nama paket" value="{{ old('nama') }}">
            @error('nama')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group col-md-4">
            <label for="harga">Harga</label>
            <input type="text" class="form-control @error('harga') is-invalid @enderror" id="harga" placeholder="Masukan harga paket" value="{{ old('harga') }}">
            <input type="hidden" id="harga_raw" name="harga" value="{{ old('harga') }}">
            @error('harga')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group col-md-4">
            <label for="kategori">Kategori</label>
            <select id="kategori" name="kategori" class="form-control select2 @error('kategori') is-invalid @enderror">
              <option value="">Pilih Kategori</option>
              @foreach ($categories as $category)
              <option value="{{ $category->id }}" {{ old('kategori') == $category->id ? 'selected' : '' }}>
                {{ $category->nama }}
              </option>
              @endforeach
            </select>
            @error('kategori')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        </div>
        <div class="row">
          <div class="form-group col-md-12">
            <label for="deskripsi">Deskripsi Paket</label>
            <textarea id="deskripsi" name="deskripsi" class="summernote form-control @error('deskripsi') is-invalid @enderror" rows="3" placeholder="Deskripsi Service">{{ old('deskripsi') }}</textarea>
            @error('deskripsi')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        </div>
        <button type="submit" class="btn btn-primary mr-2">Submit</button>
      </div>
    </form>
  </div>

  <div class="container-fluid mt-4">
    <div class="row">
      <div class="col-12 col-md-12">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Data Paket</h3>
          </div>
          <table class="table-hover table">
            <thead>
              <tr>
                <th>Nomor</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Kategori</th>
                <th>Deskripsi</th>
                <th style="width: 120px">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($services as $c)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $c->nama }}</td>
                <td>{{ Str::rupiah($c->harga) }}</td>
                <td>{{ $c->category->nama }}</td>
                <td class="wrap-text">{!! $c->deskripsi !!}</td>
                <td>
                  <div class="d-flex justify-content-between">
                    <button data-toggle="modal" data-target="#modalEdit{{$c->id}}" class="btn btn-warning mr-1">Edit</button>
                    <form action="{{ route('admin.packages.destroy', $c->id) }}" method="post">
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


</div>

@foreach ($services as $service)
<!-- Modal Edit -->
<div class="modal fade" id="modalEdit{{ $service->id }}" role="dialog" aria-labelledby="modalEditLabel{{ $service->id }}" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalEditLabel{{ $service->id }}">Edit Paket - {{ $service->nama }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="forms-sample" action="{{ route('admin.packages.update', $service->id) }}" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
          @csrf
          @method('PUT')
          <div class="form-group">
            <label for="nama{{ $service->id }}">Nama</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama{{ $service->id }}" name="nama" placeholder="Masukan nama paket" value="{{ old('nama', $service->nama) }}">
            @error('nama')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label for="harga{{ $service->id }}">Harga</label>
            <input type="text" class="form-control @error('harga') is-invalid @enderror" id="harga{{ $service->id }}" placeholder="Masukan harga paket" value="{{ old('harga', number_format($service->harga, 0, ',', '.')) }}">
            <input type="hidden" id="harga_raw{{ $service->id }}" name="harga" value="{{ old('harga', $service->harga) }}">
            @error('harga')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label for="kategori{{ $service->id }}">Kategori</label>
            <select id="kategori{{ $service->id }}" name="kategori" class="form-control select2 @error('kategori') is-invalid @enderror">
              <option value="">Pilih Kategori</option>
              @foreach ($categories as $category)
              <option value="{{ $category->id }}" {{ old('kategori', $service->category_id) == $category->id ? 'selected' : '' }}>
                {{ $category->nama }}
              </option>
              @endforeach
            </select>
            @error('kategori')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label for="deskripsi{{ $service->id }}">Deskripsi Paket</label>
            <textarea id="deskripsi{{ $service->id }}" name="deskripsi" class="form-control summernote @error('deskripsi') is-invalid @enderror" rows="3" placeholder="Deskripsi Paket">{{ old('deskripsi', $service->deskripsi) }}</textarea>
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
  function initializeSummernote() {
    $('.summernote').each(function() {
      if (!$(this).next('.note-editor').length) {
        $(this).summernote({
          placeholder: 'Isi deskripsi paket...',
          tabsize: 2,
          height: 300
        });
      }
    });
  }

  function initializeSelect2() {
    $('.select2').select2({
      placeholder: "Pilih Kategori",
    });
  }

  function formatRupiahInput(serviceId = '') {
    const hargaInputId = serviceId ? `harga${serviceId}` : 'harga';
    const hargaRawInputId = serviceId ? `harga_raw${serviceId}` : 'harga_raw';

    const hargaInput = document.getElementById(hargaInputId);
    const hargaRawInput = document.getElementById(hargaRawInputId);

    if (hargaInput && hargaRawInput) {
      hargaInput.addEventListener('input', function(e) {
        let value = this.value.replace(/\D/g, '');
        let formatted = new Intl.NumberFormat('id-ID').format(value);
        this.value = `Rp. ${formatted}`;
        hargaRawInput.value = value;
      });

      let initialValue = hargaInput.value.replace(/\D/g, '');
      if (initialValue) {
        hargaInput.value = `Rp. ${new Intl.NumberFormat('id-ID').format(initialValue)}`;
      }
    }
  }

  $(document).ready(function() {
    initializeSummernote();
    initializeSelect2();
    formatRupiahInput();

    $('.table').DataTable({
      responsive: true
    });

    $('.modal').on('shown.bs.modal', function() {
      const serviceId = this.id.replace('modalEdit', '');
      formatRupiahInput(serviceId);
      initializeSummernote();
      initializeSelect2();
      $(this).find('.select2').select2({
        dropdownParent: $(this)
      });
    });

    $('.modal').on('hidden.bs.modal', function() {
      $(this).find('textarea.summernote').summernote('destroy');
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