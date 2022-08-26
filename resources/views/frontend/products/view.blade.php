@extends('layouts.front')

@section('title')
  {{ $products->name }}
@endsection

@section('content')

<div class="py-3 mb-4 shadow-sm bg-warning border-top">
  <div class="container">
    <h5 class="mb-0">Collections / {{ $products->catagory->name }} / {{ $products->name }}</h5>
  </div>
</div>

<div class="container">
  <div class="card shadow">
    <div class="row">
      <div class="col-md-4 borer-right">
        <img src="{{ asset('assets/uploads/products/'.$products->image) }}" class="w-100" alt="">
      </div>
      <div class="col-md-8">
        <h2 class="mb-0">
          {{ $products->name }}
          @if ($products->trending=='1')
            <label style="font-size: 16px;" class="float-end badge bg-danger trending_tag">
              Trending
            </label>
          @endif

        </h2>
        <hr>
        <label class="me-3">Original Price: <s>$ {{ $products->original_price }}</s></label>
        <label class="fw-bold">Selling Price: $ {{ $products->selling_price }}</label>
        <p class="mt-3">
          {!! $products->small_description !!}
        </p>
        <hr>
        @if ($products->qty > 0)
          <label class="badge bg-success">In Stock</label>
        @else
          <label class="badge bg-danger">Out of Stock</label>
        @endif
        <div class="row mt-2">
          <div class="col-md-2">
            <label for="Quantity">Quantity</label>
            <div class="input-group text-center mb-3">
              <button class="input-group-text decrement-btn">-</button>
              <input type="text" name="quantity" value="1" class="form-control qty-input text-center">
              <button class="input-group-text increment-btn">+</button>
            </div>
          </div>
          <div class="col-md-10">
            <br>
            <button type="button" class="btn btn-success me-3 float-start"><i class="fa fa-heart"> </i> Add To Wishlist</button>
            <button type="button" class="btn btn-primary me-3 float-start"><i class="fa fa-shopping-cart"></i> Add To Cart</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

@section('scripts')
  <script>
    $(document).ready(function(){
      $('.increment-btn').click(function(e){
        e.preventDefault();

        var inc_value = $('.qty-input').val();
        var value = parseInt(inc_value, 10);
        if(value == null){
          value = 0;
        }else{
          value = value;
        }

        if(value<10){
          value++;
          $('.qty-input').val(value);
        }
      });

      $('.decrement-btn').click(function(e){
        e.preventDefault();

        var dec_value = $('.qty-input').val();
        var value = parseInt(dec_value, 10);
        if(value == null){
          value = 0;
        }else{
          value = value;
        }

        if(value>1){
          value--;
          $('.qty-input').val(value);
        }
      });
    });
  </script>
@endsection