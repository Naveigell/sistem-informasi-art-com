@extends('layouts.app')

@extends('artist.layout.header')

@section('content')

<div class="container">
    <!-- Card -->
  <div class="card text-center">
  <div class="card-header">
    <ul class="nav nav-tabs card-header-tabs">
      <li class="nav-item">
        <a class="nav-link" href="{{ route('artist.products.index') }}">Upload Your Illustration</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="{{ route('artist.products-collections.index') }}">Your Product</a>
      </li>
    </ul>
  </div>
  <!-- Table -->
  <table class="table table-bordered">
    <thead>
        <tr>
            <th>No.</th>
            <th>Product Title</th>
            <th>Product thumbnail</th>
            <th>Price</th>
            <th>Total Sale</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td>1</td>
            <td>Potrait cartoon style</td>
            <td><img src="{{ URL::asset('/img/thumbnail.png') }}" class="img-thumbnail w-10 h-10" alt="Art"></td>
            <td>Rp400.000</td>
            <td>1</td>
            <td>
                <a href="/artist/product/edit" class="btn btn-primary">Edit</a>
                <a href="/delete" class="btn btn-danger" data-confirm-delete="true">Delete</a>
            </td>
        </tr>

        <tr>
            <td>2</td>
            <td>Potrait JoJo style</td>
            <td><img src="{{ URL::asset('/img/thumbnail.png') }}" class="img-thumbnail w-10 h-10" alt="Art"></td>
            <td>Rp300.000</td>
            <td>1</td>
            <td>
                <a href="/artist/product/edit" class="btn btn-primary">Edit</a>
                <a href="/delete" class="btn btn-danger" data-confirm-delete="true">Delete</a>
            </td>
        </tr>

        <tr>
            <td>3</td>
            <td>Winter Character custom</td>
            <td>
                <img src="{{ URL::asset('/img/thumbnail.png') }}" class="img-thumbnail w-10 h-10" alt="Avatar"></td>
            <td>Rp500.000</td>
            <td>1</td>
            <td>
                <a href="/artist/product/edit" class="btn btn-primary">Edit</a>
                <a href="/delete" class="btn btn-danger" data-confirm-delete="true">Delete</a>
            </td>
        </tr>
    </tbody>
</table>

<!-- Card footer-->
<div class="card-footer">
    <!-- Pagination -->
    <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center">
          <li class="page-item"><a class="page-link" href="#">Previous</a></li>
          <li class="page-item"><a class="page-link" href="#">1</a></li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item"><a class="page-link" href="#">Next</a></li>
        </ul>
      </nav>
</div>
</div>
</div>
@endsection
