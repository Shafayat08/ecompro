@extends('layouts.admin')

@section('content')
  <div class="card">
    <div class="card-header">
      <h4>Categories</h4>
      <hr>
    </div>
    <div class="card-body">
      <table class="table table-boardered table-striped">
        <thead>
          <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Description</th>
            <th>Image</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($catagory as $item)
          <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->description }}</td>
            <td>
              <img src="{{ asset('assets/uploads/catagory/'.$item->image) }}" class="cate-image" alt="Image Here">
            </td>
            <td>
              <a href="{{ url('edit-catagory/'.$item->id) }}" class="btn btn-primary">Edit</a>
              <a href="{{ url('delete-catagory/'.$item->id) }}" class="btn btn-danger">Delete</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection