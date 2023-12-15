@extends('user.layouts.main')
@section('content')
<!-- start hero -->
<header>
  <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2000">
    <div class="carousel-inner">
      @foreach ($heros as $hero)
      <div class="carousel-item {{ $loop->first ? 'active' : '' }} carousel-wrapper">
        <img src="{{ asset('user/images/background/' . $hero->gambar) }}" class="d-block w-100 h-100" alt="{{ $hero->nama }}">
        <div class="carousel-caption">
          <h1>{{ $hero->judul }}</h1>
          <p>{{ $hero->deskripsi }}</p>
        </div>
      </div>
      @endforeach

      <!-- Duplicate set of items for infinite loop -->
      @foreach ($heros as $hero)
      <div class="carousel-item carousel-wrapper">
        <img src="{{ asset('user/images/background/' . $hero->gambar) }}" class="d-block w-100 h-100" alt="{{ $hero->nama }}">
        <div class="carousel-caption">
          <h1>{{ $hero->judul }}</h1>
          <p>{{ $hero->deskripsi }}</p>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</header>

<!-- Pricing Section -->
<section class="pricing container">

  @foreach ($categories as $category)
  <!-- Category Section -->
  <article class="row d-flex justify-content-center align-item-center">
    <h3>{{ $category->nama }}</h3>
    <p>{{ $category->deskripsi }}</p>

    @foreach ($category->packages as $service)
    <!-- Service -->
    <div class="col-4">
      <div class="wrapper">
        <h3>{{ $service->nama }}</h3>
        <h4>{{ Str::rupiah($service->harga) }}</h4>
        {!! $service->deskripsi !!}
        <button type="button" class="btn btn-primary book-now" data-bs-toggle="modal" data-bs-target="#bookingModal" data-id-service="{{ $service->id }}">
          Book Now
        </button>
      </div>
    </div>
    @endforeach

  </article>
  @endforeach

</section>
<!-- End of Pricing Section -->

<!-- modal booking -->
<!-- Modal -->
<div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="bookingModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content rounded-4 card">
      <div class="card-header bg-white">
        <div class="py-3 text-center">
          <h2>Formulir Booking</h2>
          <p class="lead">Silahkan kamu lengkapi form dibawah ini</p>
        </div>
      </div>
      <div class="card-body bg-white">
        <form action="{{route('user.booking')}}" method="post" id="bookingForm">
          @csrf
          <input type="hidden" name="id_service" id="id_service">
          <div class="form-group my-2">
            <label for="exampleInputNamaDepan">Nama lengkap<b style="color: red;">*</b></label>
            <div>
              <small id="NamaDepanHelp" class="form-text text-muted">Silakan masukan nama kamu</small>
            </div>
            <input id="nama" type="text" name="nama" class="form-control" placeholder="Masukan nama lengkap kamu">
          </div>
          <div class="form-group my-2">
            <label for="Ponsel">No. WhatsApp<b style="color: red;">*</b></label>
            <div>
              <small id="EmailHelp" class="form-text text-muted">Silakan masukan nomor handphone kamu</small>
            </div>
            <input id="whatsapp" type="number" name="whatsapp" class="form-control" placeholder="Contoh : 08782378901">
          </div>

          <div class="form-group my-2">
            <label for="tanggal_booking">Tanggal Booking</label>
            <div class="input-group date" id="tanggal_booking" data-target-input="nearest">
              <input type="text" class="form-control datetimepicker-input" data-target="#tanggal_booking" name="tanggal_booking" />
              <div class="input-group-append" data-target="#tanggal_booking" data-toggle="datetimepicker">
                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
              </div>
            </div>
          </div>

          <div class="form-group my-2">
            <label for="jam_booking">Jam Booking</label>
            <div class="input-group date" id="jam_booking" data-target-input="nearest">
              <input type="text" class="form-control datetimepicker-input" data-target="#jam_booking" name="jam_booking" />
              <div class="input-group-append" data-target="#jam_booking" data-toggle="datetimepicker">
                <div class="input-group-text"><i class="fa fa-clock"></i></div>
              </div>
            </div>
          </div>
          <div class="col-12 mt-2">
            <button class="btn btn-success btn-lg btn-block col-12" type="submit">Booking</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<style>
  .input-group-text {
    display: block;
  }
</style>
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
  })
</script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Get all 'Book Now' buttons
    var bookNowButtons = document.querySelectorAll('.book-now');

    // Attach click event to each button
    bookNowButtons.forEach(function(button) {
      button.addEventListener('click', function() {
        // Get the service ID from the data attribute
        var idService = this.getAttribute('data-id-service');

        // Set the service ID in the hidden input
        var hiddenInput = document.getElementById('id_service');
        hiddenInput.value = idService;

        // Optional: If you need to do more things when the modal opens, like set other fields
        // you can trigger them here
      });
    });
  });
</script>

@endpush