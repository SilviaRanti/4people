@extends('admin.layouts.main')
@section('content')
<div class="content-wrapper">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Form Booking</h4>
      <form class="forms-sample" method="post" action="{{ route('admin.bookings.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="row">
          <div class="form-group col-md-6">
            <label for="pembooking">Nama Pembooking</label>
            <input type="text" class="form-control @error('pembooking') is-invalid @enderror" id="pembooking" name="pembooking" placeholder="Masukan nama pembooking" value="{{ old('pembooking') }}">
            @error('pembooking')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group col-md-6">
            <label for="no_hp">Nomor HP/WA Pembooking</label>
            <input type="tel" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" name="no_hp" placeholder="Masukan nomor hp pembooking" value="{{ old('no_hp') }}">
            @error('no_hp')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        </div>
        <div class="row">
          <div class="form-group col-md-6">
            <label for="tanggal_booking">Tanggal Booking</label>
            <div class="input-group date" id="tanggal_booking" data-target-input="nearest">
              <input type="text" class="form-control datetimepicker-input" data-target="#tanggal_booking" name="tanggal_booking" />
              <div class="input-group-append" data-target="#tanggal_booking" data-toggle="datetimepicker">
                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
              </div>
            </div>
          </div>
          <div class="form-group col-md-6">
            <label for="jam_booking">Jam Booking</label>
            <div class="input-group date" id="jam_booking" data-target-input="nearest">
              <input type="text" class="form-control datetimepicker-input" data-target="#jam_booking" name="jam_booking" />
              <div class="input-group-append" data-target="#jam_booking" data-toggle="datetimepicker">
                <div class="input-group-text"><i class="fa fa-clock"></i></div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="form-group col-md-6">
            <label for="service">Pilih Paket</label>
            <select class="select-service form-control select2" name="service" id="service">
              @foreach($services as $service)
              <option value="{{ $service->id }}" {{ old('service') == $service->id ? 'selected' : '' }}>{{ $service->nama }}</option>
              @endforeach
            </select>
            @error('service')
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
                <th>Nomor HP</th>
                <th>Paket</th>
                <th>Tanggal Booking</th>
                <th>Jam Booking</th>
                <th style="width: 120px">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($bookings as $c)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $c->pembooking }}</td>
                <td>{{ $c->no_hp }}</td>
                <td>{{ $c->service->nama }}</td>
                <td>{{ $c->tanggal_booking }}</td>
                <td>{{ $c->jam_booking }}</td>
                <td>
                  <div class="d-flex justify-content-between">
                    <button data-toggle="modal" data-target="#modalEdit{{$c->id}}" class="btn btn-warning mr-1">Edit</button>
                    <form action="{{ route('admin.bookings.destroy', $c->id) }}" method="post">
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

@foreach ($bookings as $c)
<!-- Modal Edit -->
<div class="modal fade" id="modalEdit{{$c->id}}" role="dialog" aria-labelledby="modalEditLabel{{$c->id}}" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalEditLabel{{$c->id}}">Edit Booking - {{ $c->pembooking }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="forms-sample" action="{{ route('admin.bookings.update', $c->id) }}" method="POST">
        <div class="modal-body">
          @csrf
          @method('PUT')
          <div class="form-group">
            <label for="pembooking">Pembooking</label>
            <input type="text" class="form-control @error('pembooking') is-invalid @enderror" id="pembooking" name="pembooking" placeholder="Nama Pembooking" value="{{ $c->pembooking }}">
            @error('pembooking')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label for="no_hp">No HP</label>
            <input type="text" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" name="no_hp" placeholder="Nomor HP" value="{{ $c->no_hp }}">
            @error('no_hp')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label for="tanggal_booking{{$c->id}}">Tanggal Booking</label>
            <input type="text" class="form-control datetimepicker-input" id="tanggal_booking{{$c->id}}" name="tanggal_booking" data-toggle="datetimepicker" data-target="#tanggal_booking{{$c->id}}" value="{{ \Carbon\Carbon::parse($c->tanggal_booking)->format('m/d/Y') }}">
          </div>
          <div class="form-group">
            <label for="jam_booking{{$c->id}}">Jam Booking</label>
            <input type="text" class="form-control datetimepicker-input" id="jam_booking{{$c->id}}" name="jam_booking" data-toggle="datetimepicker" data-target="#jam_booking{{$c->id}}" value="{{ $c->jam_booking }}">
          </div>
          <div class="form-group">
            <label for="id_service{{$c->id}}">Paket</label>
            <select class="form-control select2" id="id_service{{$c->id}}" name="service">
              @foreach ($services as $service)
              <option value="{{ $service->id }}" {{ $c->id_service == $service->id ? 'selected' : '' }}>{{ $service->nama }}</option>
              @endforeach
            </select>
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
    $('#tanggal_booking').datetimepicker({
      format: 'L'
    });

    $('#jam_booking').datetimepicker({
      format: 'HH:mm',
      useCurrent: false,
      stepping: 5, // This will make the minutes go up and down in 5-minute intervals
      minDate: moment().startOf('day').add(9, 'hours'), // sets the earliest selectable time to 9 AM today
      maxDate: moment().startOf('day').add(17, 'hours'), // sets the latest selectable time to 5 PM today
      enabledHours: [9, 10, 11, 12, 13, 14, 15, 16, 17], // This enables only the hours between 9 AM and 5 PM
      defaultDate: moment().startOf('day').add(9, 'hours') // sets a default time to 9 AM today
    });


    $('.table').DataTable({
      responsive: true
    });
    $('.select2').select2({
      placeholder: "Pilih Paket",
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

    $('.modal').on('shown.bs.modal', function() {
      $(this).find('.select2').select2({
        placeholder: "Plih paket",
        width: '100%'
      });
    });

    $('.modal').each(function() {
      var modalId = $(this).attr('id');
      var tanggalBookingId = '#tanggal_booking' + modalId.replace('modalEdit', '');
      var jamBookingId = '#jam_booking' + modalId.replace('modalEdit', '');

      $(tanggalBookingId).datetimepicker({
        format: 'L'
      });

      $(jamBookingId).datetimepicker({
        format: 'HH:mm',
        useCurrent: false,
        stepping: 5, // This will make the minutes go up and down in 5-minute intervals
        minDate: moment().startOf('day').add(9, 'hours'), // sets the earliest selectable time to 9 AM today
        maxDate: moment().startOf('day').add(17, 'hours'), // sets the latest selectable time to 5 PM today
        enabledHours: [9, 10, 11, 12, 13, 14, 15, 16, 17], // This enables only the hours between 9 AM and 5 PM
        defaultDate: moment().startOf('day').add(9, 'hours') // sets a default time to 9 AM today
      });
    });
  })
</script>
@endpush