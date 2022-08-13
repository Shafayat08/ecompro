@extends('layouts.front')

@section('title')
  Welcome To E-Shop
@endsection

@section('content')
  @include('layouts.inc.slider')

  <div class="py-3">
    <div class="container">
      <div class="row">
        <h2>Featured Prodects</h2>
        <div class="owl-carousel featured-carousel owl-theme">
          @foreach ($featured_products as $prod)
          <div class="item">
            <div class="card">
              <img src="{{ asset('assets/uploads/products/'.$prod->image) }}" alt="Product Image">
              <div class="card-body">
                <h5>{{ $prod->name }}</h5>
                <span class="float-start">${{ $prod->selling_price }}</span>
              </div>
            </div>
          </div>
          @endforeach
      </div>
      </div>
    </div>
  </div>

  <div class="py-3">
    <div class="container">
      <div class="row">
        <h2>Trending Catagory</h2>
        <div class="owl-carousel featured-carousel owl-theme">
          @foreach ($trending_catagory as $tcatagory)
          <div class="item">
            <a href="{{ url('view-catagory/'.$tcatagory->slug) }}">
              <div class="card">
                <img src="{{ asset('assets/uploads/catagory/'.$tcatagory->image) }}" alt="Catagory Image">
                <div class="card-body">
                  <h5>{{ $tcatagory->name }}</h5>
                  <p>
                    {{ $tcatagory->description }}
                  </p>
                </div>
              </div>
            </a>
          </div>
          @endforeach
      </div>
      </div>
    </div>
  </div>

  @endsection

@section('scripts')
  <script>
    $('.featured-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    dots:false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:4
        }
      }
    })
  </script>
@endsection