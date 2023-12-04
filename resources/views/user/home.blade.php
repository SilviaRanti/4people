@extends('user.layouts.main')
@section('content')
<!-- start hero -->
<!-- <div class="hero-slider">
    <div id="carouselExampleCaptions" class="carousel slide">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active" style="height: 800px;">
          <img src="{{asset('images/background/bg-header.jpg')}}" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5>First slide label</h5>
            <p>Some representative placeholder content for the first slide.</p>
            <button>Contact us</button>
          </div>
        </div>
        <div class="carousel-item">
          <img src="..." class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5>Second slide label</h5>
            <p>Some representative placeholder content for the second slide.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="{{asset('images/background/bg-header2.jpeg')}}" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5>Third slide label</h5>
            <p>Some representative placeholder content for the third slide.</p>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
</div> -->

<header>
  <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2000">
    <div class="carousel-inner">
      <div class="carousel-item active carousel-wrapper">
        <img src="{{asset('images/background/bg-header.jpg')}}" class="d-block w-100 h-100" alt="...">
        <div class="carousel-caption">
          <h1>Capturing Timeless Moments</h1>
          <p>Cherish the joy, love, and laughter of friends moments that last a lifetime.</p>
        </div>
      </div>
      <div class="carousel-item carousel-wrapper">
        <img src="{{asset('images/background/bg-header2.jpg')}}" class="d-block w-100 h-100" alt="...">
        <div class="carousel-caption">
          <h1>Family Bonds, Forever Strong</h1>
          <p>Discover the beauty of togetherness and the strength found in family connections.</p>
        </div>
      </div>
      <div class="carousel-item carousel-wrapper">
        <img src="{{asset('images/background/bg-header3.jpeg')}}" class="d-block w-100 h-100" alt="...">
        <div class="carousel-caption">
          <h1>Celebrating Family Love</h1>
          <p>Capture the warmth and joy that family brings into every frame, creating lasting memories.</p>
        </div>
      </div>
    </div>
  </div>
</header>


<!-- end hero -->

<!-- Services -->
<section class="services">
  <article class="row">
    <div class="col-4">
      <div class="wrapper">
        <img src="{{ asset('images/services/baby-born.jpeg') }}" alt="baby-born">
        <div class="text">
          <h3>Newborn</h3>
          <p>Abadikan momen indah kelahiran bayi Anda dengan foto eksklusif kami. Kami menciptakan potret penuh kasih sayang, menangkap kepolosan dan pesona si kecil.</p>
        </div>
      </div>
    </div>

    <div class="col-4">
      <div class="wrapper">
        <img src="{{ asset('images/services/graduation.jpeg') }}" alt="graduation">
        <div class="text">
          <h3>Graduation</h3>
          <p>Catat momen kelulusan Anda dengan foto yang berkesan. Kami mengabadikan kebahagiaan dan prestasi Anda dalam setiap detail, menciptakan kenangan yang abadi.</p>
        </div>
      </div>
    </div>

    <div class="col-4">
      <div class="wrapper">
        <img src="{{ asset('images/services/prewed.jpeg') }}" alt="prewed">
        <div class="text">
          <h3>Prewedding</h3>
          <p>Rayakan cinta Anda dalam gaya yang unik dan indah. Kami mengabadikan momen-momen berharga sebelum pernikahan Anda, menciptakan kisah cinta yang timeless.</p>
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
          <div class="works1"></div>
          <div class="works2"></div>
        </div>
        <div class="col-8">
          <div class="works3"></div>
        </div>
      </div>
    </div>

    <div class="col-5">
      <div class="row">
        <div class="col-12 works4"></div>
      </div>
      <div class="row">
        <div class="col-6 works5"></div>
        <div class="col-6 works6"></div>
      </div>
    </div>
  </div>
</section>
<!-- End of Works -->
@endsection