@extends('layouts.front')

@section('title')
  {{ $catagory->name }}
@endsection

@section('content')

  <div class="py-3">
    <div class="container">
      <div class="row">
        <h2>{{ $catagory->name }}</h2>
          @foreach ($products as $prod)
          <div class="col-md-3 mb-3">
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

@endsection