@extends('user.layouts.main')
@section('content')
<header>
  <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2000">
    <div class="carousel-inner">
      <div class="carousel-item active carousel-wrapper">
        <img src="{{asset('user/images/background/bg-header.jpg')}}" class="d-block w-100 h-100" alt="...">
        <div class="carousel-caption">
          <h1>Capturing Timeless Moments</h1>
          <p>Cherish the joy, love, and laughter of friends moments that last a lifetime.</p>
        </div>
      </div>
      <div class="carousel-item carousel-wrapper">
        <img src="{{asset('user/images/background/bg-header2.jpg')}}" class="d-block w-100 h-100" alt="...">
        <div class="carousel-caption">
          <h1>Family Bonds, Forever Strong</h1>
          <p>Discover the beauty of togetherness and the strength found in family connections.</p>
        </div>
      </div>
      <div class="carousel-item carousel-wrapper">
        <img src="{{asset('user/images/background/bg-header3.jpeg')}}" class="d-block w-100 h-100" alt="...">
        <div class="carousel-caption">
          <h1>Celebrating Family Love</h1>
          <p>Capture the warmth and joy that family brings into every frame, creating lasting memories.</p>
        </div>
      </div>
    </div>
  </div>
</header>
<!-- Pricing -->
<section class="pricing container">
  <!-- Newborn and Kiddy -->
  <article class="row d-flex justify-content-center align-item-center">
    <h3>Newborn & Kiddy</h3>
    <p>Sambut kehadiran si kecil dengan kehangatan melalui paket fotografi Newborn & Kiddy kami. Kami memahami keindahan dan kepolosan momen-momen awal dalam kehidupan anak Anda, dan kami berkomitmen untuk mengabadikannya dengan penuh kasih sayang.</p>
    <div class="col-4">
      <div class="wrapper">
        <h3>Newborn</h3>
        <h4>$99</h4>
        <ul class="ul-pricing">
          <li>Up to 30 photos</li>
          <li>No retouched</li>
          <li>No makeup</li>
          <li>No stylist assistance</li>
        </ul>
        <button>Bookin Now</button>
      </div>
    </div>

    <div class="col-4">
      <div class="wrapper">
        <h3>Kiddy</h3>
        <h4>$199</h4>
        <ul class="ul-pricing">
          <li>Up to 30 photos</li>
          <li>No retouched</li>
          <li>No makeup</li>
          <li>No stylist assistance</li>
        </ul>
        <button>Bookin Now</button>
      </div>
    </div>
  </article>

  <!-- Portrait Of You and Graduation -->
  <article class="row d-flex justify-content-center align-item-center">
    <h3>Portrait & Graduation</h3>
    <p>Rasakan keindahan momen Anda dengan paket fotografi Portrait & Wisuda kami. Kami hadir untuk mengabadikan esensi kepribadian Anda dan kebahagiaan kelulusan dalam setiap bidikan kamera. Setiap foto adalah cerminan keunikan dan pencapaian Anda, diabadikan dengan keahlian dan kelembutan.</p>
    <div class="col-4">
      <div class="wrapper">
        <h3>Potrait of You</h3>
        <h4>$99</h4>
        <ul class="ul-pricing">
          <li>Up to 30 photos</li>
          <li>No retouched</li>
          <li>No makeup</li>
          <li>No stylist assistance</li>
        </ul>
        <button>Bookin Now</button>
      </div>
    </div>

    <div class="col-4">
      <div class="wrapper">
        <h3>Graduation</h3>
        <h4>$199</h4>
        <ul class="ul-pricing">
          <li>Up to 30 photos</li>
          <li>No retouched</li>
          <li>No makeup</li>
          <li>No stylist assistance</li>
        </ul>
        <button>Bookin Now</button>
      </div>
    </div>
  </article>

  <!-- Prewedding, Group, Couple, and Family -->
  <article class="row d-flex justify-content-center align-item-center">
    <h3>Prewedding & Groups</h3>
    <p>Rayakan momen istimewa Anda dengan paket fotografi Prewedding & Kelompok kami. Meresapi keajaiban cinta dan kebersamaan, yang terabadikan dengan sempurna oleh fotografer berbakat kami. Baik itu sesi pra-pernikahan yang romantis atau kumpul-kumpul tak terlupakan bersama teman dan keluarga, kami menjamin setiap momen diabadikan dengan sempurna.</p>
    <div class="col-3">
      <div class="wrapper">
        <h3>Prewedding</h3>
        <h4>$99</h4>
        <ul class="ul-pricing">
          <li>Up to 30 photos</li>
          <li>No retouched</li>
          <li>No makeup</li>
          <li>No stylist assistance</li>
        </ul>
        <button>Bookin Now</button>
      </div>
    </div>

    <div class="col-3">
      <div class="wrapper">
        <h3>Group</h3>
        <h4>$199</h4>
        <ul class="ul-pricing">
          <li>Up to 30 photos</li>
          <li>No retouched</li>
          <li>No makeup</li>
          <li>No stylist assistance</li>
        </ul>
        <button>Bookin Now</button>
      </div>
    </div>
    <div class="col-3">
      <div class="wrapper">
        <h3>Couple</h3>
        <h4>$199</h4>
        <ul class="ul-pricing">
          <li>Up to 30 photos</li>
          <li>No retouched</li>
          <li>No makeup</li>
          <li>No stylist assistance</li>
        </ul>
        <button>Bookin Now</button>
      </div>
    </div>
    <div class="col-3">
      <div class="wrapper">
        <h3>Family</h3>
        <h4>$199</h4>
        <ul class="ul-pricing">
          <li>Up to 30 photos</li>
          <li>No retouched</li>
          <li>No makeup</li>
          <li>No stylist assistance</li>
        </ul>
        <button>Bookin Now</button>
      </div>
    </div>
  </article>
</section>
<!-- End of Pricing -->
@endsection