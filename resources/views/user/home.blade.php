@extends('user.layouts.main')
@section('content')
  <!-- start hero -->
  <header>
    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2000">
      <div class="carousel-inner">
        @foreach ($heros as $hero)
          <div class="carousel-item {{ $loop->first ? 'active' : '' }} carousel-wrapper">
            <img src="{{ asset('user/images/background/' . $hero->gambar) }}" class="d-block w-100 h-100"
              alt="{{ $hero->nama }}">
            <div class="carousel-caption">
              <h1>{{ $hero->judul }}</h1>
              <p>{{ $hero->deskripsi }}</p>
            </div>
          </div>
        @endforeach

        <!-- Duplicate set of items for infinite loop -->
        @foreach ($heros as $hero)
          <div class="carousel-item carousel-wrapper">
            <img src="{{ asset('user/images/background/' . $hero->gambar) }}" class="d-block w-100 h-100"
              alt="{{ $hero->nama }}">
            <div class="carousel-caption">
              <h1>{{ $hero->judul }}</h1>
              <p>{{ $hero->deskripsi }}</p>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </header>
  <!-- end hero -->


  <!-- Services -->
  <section class="services">
    <article class="row">
      <div class="col-4">
        <div class="wrapper">
          <img src="{{ asset('user/images/services/baby-born.jpeg') }}" alt="baby-born">
          <div class="text">
            <h3>Newborn</h3>
            <p>Abadikan momen indah kelahiran bayi Anda dengan foto eksklusif kami. Kami menciptakan potret penuh kasih
              sayang, menangkap kepolosan dan pesona si kecil.</p>
          </div>
        </div>
      </div>

      <div class="col-4">
        <div class="wrapper">
          <img src="{{ asset('user/images/services/prewed.jpg') }}" alt="prewed">
          <div class="text">
            <h3>Potrait of You</h3>
            <p>Rayakan cinta Anda dalam gaya yang unik dan indah. Kami mengabadikan momen-momen berharga sebelum
              pernikahan Anda, menciptakan kisah cinta yang timeless.</p>
          </div>
        </div>
      </div>

      <div class="col-4">
        <div class="wrapper">
          <img src="{{ asset('user/images/services/graduation.jpeg') }}" alt="graduation">
          <div class="text">
            <h3>Graduation</h3>
            <p>Catat momen kelulusan Anda dengan foto yang berkesan. Kami mengabadikan kebahagiaan dan prestasi Anda dalam
              setiap detail, menciptakan kenangan yang abadi.</p>
          </div>
        </div>
      </div>

    </article>
  </section>
  <!-- End of Services -->

  <!-- Works -->
  <section class="works gallery">
    <h2>Latest Works</h2>
    <div class="row">
      <div class="col-7">
        <div class="row">
          <div class="col-4">
            <div class="works1"
              style="background-image: url('{{ asset('user/images/last-wrok/' . $latestWorks[0]->gambar) }}')"></div>
            <div class="works2"
              style="background-image: url('{{ asset('user/images/last-wrok/' . $latestWorks[1]->gambar) }}')"></div>
          </div>
          <div class="col-8">
            <div class="works3"
              style="background-image: url('{{ asset('user/images/last-wrok/' . $latestWorks[2]->gambar) }}')"></div>
          </div>
        </div>
      </div>

      <div class="col-5">
        <div class="row">
          <div class="col-12 works4"
            style="background-image: url('{{ asset('user/images/last-wrok/' . $latestWorks[3]->gambar) }}')"></div>
        </div>
        <div class="row">
          <div class="col-6 works5"
            style="background-image: url('{{ asset('user/images/last-wrok/' . $latestWorks[4]->gambar) }}')"></div>
          <div class="col-6 works6"
            style="background-image: url('{{ asset('user/images/last-wrok/' . $latestWorks[5]->gambar) }}')"></div>
        </div>
      </div>
    </div>
  </section>
  <!-- End of Works -->
@endsection
