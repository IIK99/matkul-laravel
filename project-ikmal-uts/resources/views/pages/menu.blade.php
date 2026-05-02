@extends('layouts.main')

@section('content')
<section id="menu" class="food_section layout_padding-bottom">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Our Pets
        </h2>
      </div>

      <ul class="filters_menu">
        <li class="active" data-filter="*">All</li>
        <li data-filter=".kucing">Kucing</li>
        <li data-filter=".burung">Burung</li>
        <li data-filter=".ikan">Ikan</li>
        <li data-filter=".anjing">Anjing</li>
      </ul>

      <div class="filters-content">
                <div class="row grid">
          @foreach($pets as $pet)
          <div class="col-sm-6 col-lg-4 all {{ $pet->species }}">
            <div class="box">
              <div>
                <div class="img-box">
                  <img src="{{ asset('feane-assets/images/' . $pet->image) }}" alt="">
                </div>
                <div class="detail-box">
                  <h5>
                    {{ $pet->name }}
                  </h5>
                  <p>
                    {{ $pet->description }}
                  </p>
                  <div class="options">
                    <a href="{{ route('menu.detail', $pet->id) }}" class="btn text-white rounded-pill px-4 py-2" style="background-color: #ffbe33;">
                      <i class="fa fa-arrow-right"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>

    </div>
  </section>

  <!-- end food section -->
@endsection
