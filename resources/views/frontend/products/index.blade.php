@extends('layouts.front')

@section('title')
  {{ $catagory->name }}
@endsection

@section('content')

<div class="py-3 mb-4 shadow-sm bg-warning border-top">
  <div class="container">
    <h5 class="mb-0">Collections / {{ $catagory->name }}</h5>
  </div>
</div>

  <div class="py-3">
    <div class="container">
      <div class="row">
        <h2>{{ $catagory->name }}</h2>
          @foreach ($products as $prod)
          <div class="col-md-3 mb-3">
            <div class="card">
              <a href="{{ url('catagory/'.$catagory->slug.'/'.$prod->slug) }}">
                <img src="{{ asset('assets/uploads/products/'.$prod->image) }}" alt="Product Image">
                <div class="card-body">
                  <h5>{{ $prod->name }}</h5>
                  <span class="float-start">${{ $prod->selling_price }}</span>
                </div>
              </a>
            </div>
          </div>
          @endforeach
      </div>
    </div>
  </div>

@endsection