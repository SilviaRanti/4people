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
              Accordion Item #1
            </button>
          </h2>
          <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the first item's accordion body.</div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header" id="flush-headingTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
              Accordion Item #2
            </button>
          </h2>
          <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the second item's accordion body. Let's imagine this being filled with some actual content.</div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header" id="flush-headingThree">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
              Accordion Item #3
            </button>
          </h2>
          <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the third item's accordion body. Nothing more exciting happening here in terms of content, but just filling up the space to make it look, at least at first glance, a bit more representative of how this would look in a real-world application.</div>
          </div>
        </div>
      </div>
    </div>
</section>
@endsection