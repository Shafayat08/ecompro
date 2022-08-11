@extends('layouts.admin')

@section('content')
  <div class="card">
    <div class="card-header">
      <h4>Edit Catagory</h4>
    </div>
    <div class="card-body">
      <form action="{{ url('update-catagory/'.$catagory->id) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="">Name</label>
            <input value="{{ $catagory->name }}" type="text" class="form-control" name="name">
          </div>
          <div class="col-md-6 mb-3">
            <label for="">Slug</label>
            <input value="{{ $catagory->slug }}" type="text" class="form-control" name="slug">
          </div>
          <div class="col-md-12">
            <label for="">Description</label>
            <textarea name="description" rows="5" class="form-control">{{ $catagory->description }}</textarea>
          </div>
          <div class="col-md-6 mb-3">
            <label for="">Status</label>
            <input {{ $catagory->status == "1" ? 'checked':'' }} type="checkbox" name="status">
          </div>
          <div class="col-md-6 mb-3">
            <label for="">Popular</label>
            <input {{ $catagory->popular == "1" ? 'checked':'' }} type="checkbox" name="popular">
          </div>
          <div class="col-md-12 mb-3">
            <label for="">Meta Title</label>
            <input value="{{ $catagory->meta_title }}" type="text" class="form-control" name="meta_title">
          </div>
          <div class="col-md-12">
            <label for="">Meta Keywords</label>
            <textarea name="meta_keywords" rows="3" class="form-control">{{ $catagory->meta_keywords }}</textarea>
          </div>
          <div class="col-md-12">
            <label for="">Meta Description</label>
            <textarea name="meta_descrip" rows="3" class="form-control">{{ $catagory->meta_descrip }}</textarea>
          </div>
          @if ($catagory->image)
            <img src="{{ asset('assets/uploads/catagory/'.$catagory->image) }} " alt="catagory image">
          @endif
          <div class="col-md-12">
            <input value="{{ $catagory->image }}" type="file" name="image" class="form-control">
          </div>
          <div class="col-md-12">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection