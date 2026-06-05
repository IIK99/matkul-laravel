@extends('layouts.main')

@section('content')
<section id="menu" class="food_section layout_padding-bottom">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Our Menu
        </h2>
      </div>

      <ul class="filters_menu">
        <li class="active" data-filter="*">All</li>
        <li data-filter=".kopi-hitam">Kopi Hitam</li>
        <li data-filter=".kopi-susu">Kopi Susu</li>
        <li data-filter=".latte">Latte & Espresso</li>
        <li data-filter=".specialty">Specialty</li>
      </ul>

      <div class="filters-content">
                <div class="row grid">
          @foreach($menus as $menu)
          <div class="col-sm-6 col-lg-4 all {{ $menu->category }}">
            <div class="box">
              <div>
                <div class="img-box">
                  <img src="{{ asset('feane-assets/images/' . $menu->image) }}" alt="" style="width: 100%; height: 200px; object-fit: cover;">
                </div>
                <div class="detail-box">
                  <h5>
                    {{ $menu->title }}
                  </h5>
                  <p>
                    {{ $menu->description }}
                  </p>
                  <div class="options">
                    <a href="{{ route('menu.detail', $menu->id) }}" class="btn text-white rounded-pill px-4 py-2" style="background-color: #ffbe33;">
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
      {{-- <div class="btn-box">
        <a href="">
          View More
        </a>
      </div> --}}
    </div>
  </section>

  <!-- end food section -->
@endsection
