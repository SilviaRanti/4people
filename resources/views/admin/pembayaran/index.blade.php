@extends('admin.layouts.main')
@section('content')
<div class="content-wrapper">
  <div class="row">
    <div class="col-md-12 grid-margin">
      <div class="row">
        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
          <h3 class="font-weight-bold">Welcome</h3>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6 grid-margin stretch-card">
      <div class="card tale-bg">
        <div class="card-people mt-auto">
          <img src="{{asset('admin/images/dashboard/people.svg')}}" alt="people">
          <div class="weather-info">
            <div class="d-flex">
              <div>
                <h2 id="temperature" class="mb-0 font-weight-normal"></h2>
              </div>
              <div class="ml-2">
                <h4 id="location" class="location font-weight-normal"></h4>
                <h6 id="country" class="font-weight-normal"></h6>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6 grid-margin transparent">
      <div class="row">
        <div class="col-md-6 mb-4 stretch-card transparent">
          <div class="card">
            <div class="card-body">
              <p class="mb-4">Total Pemasukan Sukses</p>
              <p class="fs-30 mb-2">{{ Str::rupiah($data['totalPembayaran']) }}</p>
            </div>
          </div>
        </div>

        <div class="col-md-6 mb-4 stretch-card transparent">
          <div class="card card-tale">
            <div class="card-body">
              <p class="mb-4">Total Transaksi</p>
              <p class="fs-30 mb-2">{{ $data['totalPayments'] }}</p>
            </div>
          </div>
        </div>

      </div>

      <div class="row">
        <div class="col-md-6 mb-4 stretch-card transparent">
          <div class="card card-dark-blue">
            <div class="card-body">
              <p class="mb-4">Transaksi Hari Ini</p>
              <p class="fs-30 mb-2">{{ $data['paymentsToday']['count'] }}</p>
            </div>
          </div>
        </div>

        <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
          <div class="card card-light-blue">
            <div class="card-body">
              <p class="mb-4">Transaksi Minggu Ini</p>
              <p class="fs-30 mb-2">{{ $data['paymentsThisWeek']['count'] }}</p>
            </div>
          </div>
        </div>

      </div>
      <div class="row">
        <div class="col-md-6 stretch-card transparent">
          <div class="card card-light-danger">
            <div class="card-body">
              <p class="mb-4">Transaksi Bulan Ini</p>
              <p class="fs-30 mb-2">{{ $data['paymentsThisMonth']['count'] }}</p>
            </div>
          </div>
        </div>
      </div>
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
                <th>Harga</th>
                <th>Status</th>
                <th>Paket</th>
                <th>Tanggal Booking</th>
                <th>Jam Booking</th>
                <th style="width: 120px">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($data['pembayaran'] as $c)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $c->nama }}</td>
                <td>{{ Str::rupiah($c->harga) }}</td>
                <td>{{ $c->status }}</td>
                <td>{{ $c->service->nama }}</td>
                <td>{{ $c->booking->tanggal_booking }}</td>
                <td>{{ $c->booking->jam_booking }}</td>
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


@foreach ($data['pembayaran'] as $c)
<!-- Modal Edit -->
<div class="modal fade" id="modalEdit{{$c->id}}" role="dialog" aria-labelledby="modalEditLabel{{$c->id}}" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalEditLabel{{$c->id}}">Update status pembayaran - {{ $c->nama }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="forms-sample" action="{{ route('admin.pembayaran.update', $c->id) }}" method="POST">
        <div class="modal-body">
          @csrf
          @method('PUT')
          <div class="form-group">
            <label for="status">Status pembayaran</label>
            <input type="text" class="form-control @error('status') is-invalid @enderror" id="status" name="status" placeholder="Masukan status pembayaran" value="{{ $c->status }}">
            @error('status')
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
  // Function to fetch weather data
  async function getWeatherData() {
    const apiKey = "{{ env('WEATHER_API_KEY') }}"; // Replace with your actual API key
    const apiUrl = 'https://api.weatherapi.com/v1/current.json'; // Replace with the API URL

    try {
      const response = await fetch(`${apiUrl}?key=${apiKey}&q=Bandar%20Lampung`); // Replace 'Bandar%20Lampung' with the desired location
      const data = await response.json();

      // Update HTML elements with dynamic data
      document.getElementById('temperature').innerText = `${data.current.temp_c}°C`;
      document.getElementById('location').innerText = 'Bandar Lampung';
      document.getElementById('country').innerText = data.location.country;
    } catch (error) {
      console.error('Error fetching weather data:', error);
    }
  }

  // Call the function to fetch and update data
  getWeatherData();

  $(document).ready(function() {
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