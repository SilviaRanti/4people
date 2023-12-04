@extends('user.layouts.main')
@section('content')
<!-- About-->
<section class="about">
  <div class="row">
    <div class="col-6" style="text-align: justify;">
      <h2 class="pl-2">Menangkap Momen yang Memikat Hatimu</h2>
      <br />
      <p>Di 4People Studio, kami bukan hanya sekadar mengabadikan gambar, tapi juga emosi, kisah, dan inti dari momen-momen berharga dalam hidupmu. Dengan detail yang penuh gairah dan komitmen pada keunggulan, kami mengubah instan yang singkat menjadi kenangan abadi.</p>
      <p>Tim kami yang berdedikasi memahami pentingnya setiap momen, memastikan setiap foto mencerminkan emosi sejati dan narasi unik dari acara istimewa Anda. Baik itu pernikahan, pertemuan keluarga, atau peristiwa bersejarah, kami di sini untuk mempertahankan keajaiban yang memukau hatimu.</p>
      <p>Rasakan seni bercerita melalui lensa kami. 4People Studio di mana setiap klik menceritakan kisah, dan setiap kisah menjadi kenangan berharga.</p>
      <div class="row">
        <h3>Profesionalisme</h3>
        <p>Di 4People Studio, kami mewujudkan esensi profesionalisme dalam setiap aspek pekerjaan kami. Kami berkomitmen untuk memberikan bukan hanya fotografi, melainkan pengalaman profesional yang menangkap hakiki dari momen-momen spesial Anda. Komitmen kami pada keunggulan memastikan bahwa setiap momen diubah menjadi kenangan abadi.</p>
      </div>

      <div class="row">
        <h3>Individual Approach</h3>
        <p>Kami memahami bahwa setiap individu dan setiap momen adalah unik. Tim kami di 4People Studio mengambil pendekatan individual, memastikan bahwa setiap foto mencerminkan emosi yang tulus dan narasi yang unik dari acara istimewa Anda. Baik itu pernikahan, pertemuan keluarga, atau acara bersejarah, kami di sini untuk menjaga pesona yang menakjubkan di hati Anda.</p>
      </div>

      <div class="row">
        <h3>Flexible Schedule</h3>
        <p>Hidup adalah dinamis, dan kami mengakui pentingnya fleksibilitas. 4People Studio menyediakan jadwal yang fleksibel untuk menyesuaikan dengan kehidupan Anda yang sibuk. Kami berusaha membuat momen berharga Anda lebih mudah, memastikan bahwa pengalaman Anda bersama kami secepat dan senyaman mungkin.</p>
      </div>

      <div class="row">
        <h3>Experience</h3>
        <p>Dengan pengalaman bertahun-tahun, 4People Studio membawa pengetahuan dan keahlian yang melimpah ke setiap sesi foto. Kami tidak hanya sekadar menangkap gambar; kami menyimpan emosi, kisah, dan esensi dari momen berharga dalam hidup Anda. Percayakan kepada kami untuk mengubah instan yang singkat menjadi kenangan abadi melalui lensa berpengalaman kami.</p>
      </div>

    </div>
    <div class="col-6" >
      <div id="carouselAbout" class="carousel slide h-100" data-bs-ride="carousel" data-bs-interval="2000" class="h-100">
        <div class="carousel-inner h-100">
          <div class="carousel-item active h-100">
            <img src="{{asset('user/images/background/bg-about.jpeg')}}" alt="about 1" class="d-block h-100 carousel-about img-fluid">
          </div>
          <div class="carousel-item h-100">
            <img src="{{asset('user/images/background/bg-about.jpeg')}}" alt="about 2" class="d-block h-100 img-fluid">
          </div>
          <div class="carousel-item h-100">
            <img src="{{asset('user/images/background/bg-about.jpeg')}}" alt="about 3" class="d-block h-100 img-fluid">
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End of About-->


<!-- Team -->
<section class="team container">
  <h2>Our team</h2>
  <p>Di 4People Studio, kami memiliki tim yang berkomitmen untuk memberikan layanan terbaik dalam mengabadikan momen-momen berharga Anda. Setiap individu dalam tim kami memiliki dedikasi tinggi untuk seni fotografi dan memastikan bahwa setiap detail tertangkap dengan sempurna dalam setiap foto.</p>
  <div class="row">
    <div class="col-3">
      <img src="{{asset('user/images/teams/jean.jpg')}}" alt="team1">
      <div class="description">
        <h4>Jenan Toinette</h4>
        <p>CEO</p>
        <a href="https://www.instagram.com/jenantoinette/" style="text-decoration: none;">Instagram <i class="fab fa-instagram"></i></a>
      </div>
    </div>

    <div class="col-3">
      <img src="{{asset('user/images/teams/tobing.jpg')}}" alt="team2">
      <div class="description">
        <h4>Rendy Tobing</h4>
        <p>Manager</p>
        <a href="https://www.instagram.com/rendytobing/" style="text-decoration: none;">Instagram <i class="fab fa-instagram"></i></a>
      </div>
    </div>

    <div class="col-3">
      <img src="{{asset('user/images/teams/dtvni.jpg')}}" alt="team3">
      <div class="description">
        <h4>dtvni</h4>
        <p>Photographer</p>
        <a href="https://www.instagram.com/dtvni_/" style="text-decoration: none;">Instagram <i class="fab fa-instagram"></i></a>
      </div>
    </div>

    <div class="col-3">
      <img src="{{asset('user/images/teams/wahyu.jpg')}}" alt="team4">
      <div class="description">
        <h4>Wahyu</h4>
        <p>Assistant</p>
        <a href="https://www.instagram.com/wahyutomypriyanto/" style="text-decoration: none;">Instagram <i class="fab fa-instagram"></i></a>
      </div>
    </div>
  </div>
</section>
<!-- End of Team-->

<!-- Promote-->
<section class="promote">
  <h2>Promote Your Brand</h2>
  <Dengan>Di 4People Studio, kami membantu Anda mempromosikan merek Anda melalui fotografi yang memukau. Kami tidak hanya menangkap gambar, tetapi juga menciptakan cerita visual yang memperkuat identitas dan pesan merek Anda. Dengan penuh kreativitas dan dedikasi, kami menghadirkan visual yang menarik dan meyakinkan untuk meningkatkan daya tarik dan kesan merek Anda. Setiap foto yang kami ambil dirancang untuk mencerminkan nilai-nilai dan kualitas unik dari bisnis atau merek Anda.</p>
    <button>Contact us</button>
</section>
<!-- End of Promote-->

<!-- Testimonials -->
<section class="testimonials container">
  <h2>Testimonial</h2>
  <p>Terima kasih kepada pelanggan kami yang telah berbagi pengalaman mereka.</p>
  <article class="row">
    <div class="col-4">
      <img src="{{asset('user/images/testimonial/rizki.jpg')}}" alt="client1">
      <div class="hgroup">
        <h3>Rizki & Mia</h3>
      </div>
      <div class="clearfix"></div>
      <p>Sebuah pengalaman prewedding yang tak terlupakan! 4People Studio mampu menangkap momen indah kami dengan sempurna. Profesionalisme, kreativitas, dan dedikasi mereka luar biasa. Terima kasih atas hasil kerja yang memukau!</p>
    </div>

    <div class="col-4">
      <img src="{{asset('user/images/testimonial/rich.jpg')}}" alt="client1">
      <div class="hgroup">
        <h3>Rich Brian</h3>
      </div>
      <div class="clearfix"></div>
      <p>Rich Brian mempercayakan momen-momen berharganya kepada 4People Studio, dan hasilnya luar biasa! Dengan keahlian dan kreativitas yang tinggi, mereka mampu menangkap esensi setiap momen. Profesionalisme mereka tak tertandingi. Terima kasih 4People Studio!</p>
    </div>

    <div class="col-4">
      <img src="{{asset('user/images/testimonial/rita.jpg')}}" alt="client1">
      <div class="hgroup">
        <h3>Rita</h3>
      </div>
      <div class="clearfix"></div>
      <p>Rita, mengabadikan keindahan kehamilan 8 bulan dengan 4People Studio adalah suatu kebahagiaan. Mereka mampu menciptakan foto-foto yang menangkap momen-momen istimewa dalam perjalanan kehidupan ini. Profesionalisme dan kelembutan tim membuat pengalaman ini luar biasa. Terima kasih 4People Studio!</p>
    </div>
  </article>
</section>
<!-- End of Testimonials-->
@endsection