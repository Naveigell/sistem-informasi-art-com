@extends('layouts.app')

@extends('artist.layout.header')

@section('content')

<div class="container">
  <!-- Card -->
  <div class="card text-center">
  <div class="card-header">
    <ul class="nav nav-tabs card-header-tabs">
      <li class="nav-item">
        <a class="nav-link active" href="{{ route('artist.products.index') }}">Upload Your Illustration</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('artist.products-collections.index') }}">Your Product</a>
      </li>
    </ul>
  </div>
  <div class="card-body">
    <h5 class="card-title">Welcome to ART & TERM Page</h5>
    <p class="card-text">Do you want to upload your illustration?</p>
    <a href="/artist/product/upload" class="btn btn-primary">Upload Product</a>
  </div>
</div>

  @endsection
