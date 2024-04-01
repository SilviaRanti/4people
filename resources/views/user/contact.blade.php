@extends('user.layouts.main')
@section('content')
<section class="map">
  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3971.9555967527012!2d105.26248137592832!3d-5.423717654147374!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e40da4b143e7ac5%3A0x1d8fa800405e94f!2s4people%20Studio!5e0!3m2!1sen!2sid!4v1701507060617!5m2!1sen!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</section>

<section class="contact container">
  <div class="row">
    <div class="col-6">
      <h2>Hubungi Kami di 4people Studio</h2>
      <p>Siap untuk mengabadikan momen berharga Anda? Kami di 4people Studio siap membantu mewujudkannya. Hubungi kami untuk informasi lebih lanjut atau kunjungi studio kami.</p>
      <div class="row">
        <div class="col-1">
          <i class="fas fa-map-marker-alt"></i>
        </div>
        <div class="col-11">
          <h5>Alamat</h5>
          <p>Jl. Kacapiring No.17, Pahoman, Kec. Tanjungkarang Timur, Kota Bandar Lampung, Lampung 35213</p>
        </div>
      </div>

      <div class="row">
        <div class="col-1">
          <i class="fas fa-phone"></i>
        </div>
        <div class="col-11">
          <h5>Telepon</h5>
          <p>Hubungi kami di 0721-267752</p>
        </div>
      </div>

      <div class="row">
        <div class="col-1">
          <i class="fab fa-whatsapp"></i>
        </div>
        <div class="col-11">
          <h5>Whatsapp</h5>
          <p>WA kami di 087776140609 (9am-5pm)</p>
        </div>
      </div>

      <div class="row">
        <div class="col-1">
          <i class="far fa-clock"></i>
        </div>
        <div class="col-11">
          <h5>Jam Buka</h5>
          <p>10.00am - 05.00pm ( Senin libur )</p>
        </div>
      </div>
    </div>
    <div class="col-6">
      <h2>Hal Yang Sering Ditanyakan</h2>
      <div class="accordion accordion-flush" id="accordionFlushExample">
        <div class="accordion-item">
          <h2 class="accordion-header" id="flush-headingOne">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
              Apakah hanya foto studio atau bisa outdoor ?
            </button>
          </h2>
          <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">4people Studio menawarkan fleksibilitas dalam pemilihan lokasi baik itu studio photo indoor ataupun outdoor. Kami menyediakan sesi foto di studio dengan set terbaru dan tren, serta sesi foto di luar ruangan untuk prewedding, acara pernikahan, dan berbagai acara lainnya.</div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header" id="flush-headingTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
              Apakah disediakan properti dan kelengkapan lainnya ?
            </button>
          </h2>
          <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">Kami menyediakan beragam properti lucu dan lembut untuk sesi foto newborn dan kiddy yang penuh keceriaan. Dari selimut yang lembut hingga aksesoris imut, setiap elemen kami dirancang untuk membuat momen foto mereka begitu istimewa. Tapi jangan khawatir, Anda juga bisa membawa properti pribadi untuk menambah sentuhan personal dalam setiap foto. Di sini, kreativitas Anda diperbolehkan berkembang!.</div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header" id="flush-headingThree">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
              Fasilitas lainya apa saja ?
            </button>
          </h2>
          <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">4people Studio dilengkapi dengan beragam pilihan set studio, ruang tunggu yang nyaman, customer service yang ramah, ruang make up yang lengkap, serta parkir luas dan aman. Lokasi studio kami juga sangat mudah dijangkau untuk kenyamanan Anda.</div>
          </div>
        </div>
      </div>
    </div>
</section>

<style>
  .contact button {
    background: #cebbae !important;
  }
</style>
@endsection