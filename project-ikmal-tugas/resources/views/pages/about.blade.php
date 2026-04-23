@extends('layouts.main')

@section('content')
<section id="about" class="about_section layout_padding">
    <div class="container  ">

      <div class="row">
        <div class="col-md-6 ">
          <div class="img-box">
            <img src="{{ asset('feane-assets/images/about-img.png') }}" alt="">
          </div>
        </div>
        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
              <h2>
                <span class="text-warning">Cerita Kami</span><br>
                Dari Hati, Untuk Perut
              </h2>
            </div>
            <p>
              Aldi's Burger lahir dari ide sederhana: burger enak gak harus mahal. Dengan konsep open kitchen, setiap burger dibuat langsung di depan mata — roti dipanggang, patty di-grill dengan saus BBQ, disusun dengan cinta.
<br><br>
Nama "Gallagher" terinspirasi dari Liam Gallagher, vokalis OASIS — karena Aldi dan Gallagher sama-sama berakhiran "-er". Dan sama-sama bikin orang ketagihan.
<br><br>
<span class="text-warning">🎵 "Aldis Burger Cempaka Putih rotinya lembut dagingnya Juicy Luicy Mahalini Rizky Febian bisa pesan online!" 🎵</span><br>
<i>— Jingle yang bikin seluruh Indonesia penasaran</i>
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
