@extends('layouts.main')

@section('content')
<section class="food_section layout_padding">
  <div class="container">
    <div class="row align-items-center mt-5">
      <div class="col-md-5">
        <div class="img-box text-center p-4 bg-dark rounded" style="border-radius: 20px !important;">
          <img src="{{ asset('feane-assets/images/' . $menu->image) }}" alt="{{ $menu->title }}" class="img-fluid w-100" style="max-height: 400px; object-fit: contain;">
        </div>
      </div>
      <div class="col-md-7 px-md-5 mt-4 mt-md-0">
        <div class="detail-box">
          <h2 class="font-weight-bold mb-3" style="font-family: 'Dancing Script', cursive; font-size: 3rem;">
            {{ $menu->title }}
          </h2>
          <span class="badge badge-warning text-white px-3 py-2 mb-4" style="font-size: 1rem; text-transform: uppercase;">{{ $menu->category }}</span>
          
          <p class="text-muted mb-4" style="font-size: 1.1rem; line-height: 1.8;">
            {{ $menu->description }}
          </p>
          
          <h4 class="mb-3 font-weight-bold">Composition:</h4>
          <p class="mb-4 bg-light p-3 rounded" style="font-size: 1.1rem; color: #555;">
            <i class="fa fa-cutlery text-warning mr-2"></i> {{ $menu->composition ?? 'Standard fresh ingredients.' }}
          </p>
          
          <div class="d-flex align-items-center mt-5 mb-4">
            <h3 class="font-weight-bold m-0 mr-4" style="font-size: 2.5rem; color: #222;">
              ${{ $menu->price }}
            </h3>
          </div>
          
          <div class="btn-box d-flex gap-3">
            <a href="#" class="btn text-white rounded-pill px-5 py-3 shadow-sm mr-3" style="background-color: #ffbe33; font-size: 1.1rem;">
              <i class="fa fa-shopping-cart mr-2"></i> Add to Cart
            </a>
            <a href="{{ route('home') }}" class="btn btn-outline-dark rounded-pill px-4 py-3" style="font-size: 1.1rem;">
               <i class="fa fa-arrow-left mr-2"></i> Back
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
