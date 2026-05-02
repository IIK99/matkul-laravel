@extends('layouts.main')

@section('content')
<section id="about" class="about_section layout_padding">
    <div class="container  ">

      <div class="row">
        <div class="col-md-6 ">
          <div class="img-box">
            <img src="{{ asset('feane-assets/images/about-img.jpg') }}" alt="">
          </div>
        </div>
        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
              <h2>
                <span class="text-warning">Cerita Kami</span><br>
                Merawat Sepenuh Hati
              </h2>
            </div>
            <p>
               IKmal's Pet Shop lahir dari kecintaan kami terhadap hewan peliharaan. Kami percaya setiap hewan berhak mendapatkan perawatan terbaik dan kasih sayang yang tulus.
<br><br>
Menyediakan berbagai jenis hewan peliharaan yang sehat, lincah, dan lucu. Mulai dari kucing Persia yang menggemaskan hingga anjing Golden yang setia.
<br><br>
<span class="text-warning">🎵 "IKmal's Pet Shop Cempaka Putih hewannya lucu perawatannya juara bisa pesan online!" 🎵</span><br>
<i>— Jingle yang bikin seluruh pecinta hewan penasaran</i>
            </p>
            {{-- <a href="">
              Read More
            </a> --}}
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end about section -->
@endsection
