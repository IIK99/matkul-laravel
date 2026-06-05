@extends('layouts.main')

@section('content')
<section id="about" class="about_section layout_padding">
    <div class="container  ">

      <div class="row">
        <div class="col-md-6 ">
          <div class="img-box">
            <img src="{{ asset('feane-assets/images/about-img2.png') }}" alt="">
          </div>
        </div>
        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
              <h2>
                <span class="text-warning">Cerita Kami</span><br>
                Dari Hati, Untuk Kamu Yang Merasa Gagal
              </h2>
            </div>
            <p>
             Kopi Gak Jago bukan tempat buat pura-pura hebat.
Ini tempat buat orang-orang yang capek harus selalu menang, selalu kuat, selalu terlihat baik-baik aja.
<br><br>
Di sini, kami percaya kalau hidup gak harus selalu tentang jadi yang paling jago. Kadang kita gagal, kalah, bingung, overthinking, bahkan kehilangan arah. Dan itu gak apa-apa.
<br><br>
Kopi Gak Jago hadir sebagai ruang buat semua orang yang sedang belajar menerima diri sendiri — tempat untuk berhenti sejenak, menenangkan kepala, ngobrol tanpa tekanan, dan berdamai dengan kekalahan yang pernah datang.
<br><br>
Karena pada akhirnya, gak semua orang harus jadi hebat untuk tetap layak bahagia.
<br><br>
Secangkir kopi, obrolan sederhana, dan suasana yang hangat.
Cukup buat nemenin hari-hari yang lagi berat.
<br><br>

<span class="text-warning">🎵 "Tidak Harus Hebat untuk Tetap Berharga." 🎵</span><br>
<i>— Jingle kesayangan kita semua</i>
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
