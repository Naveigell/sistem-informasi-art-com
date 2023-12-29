@extends('layouts.app')

@extends('artist.layout.header')

@section('content')
<div class="container">
  <div class="card">
    <!-- Card -->
    <div class="card-header">
      <ul class="nav nav-tabs card-header-tabs">
        <li class="nav-item">
          <a class="nav-link active" href="#">Edit Product Information</a>
        </li>
      </ul>
    </div>

    <div class="card-body">
      <form>
          <div class="form-group">
              <label for="exampleFormControlFile1">Upload your Illustration Product</label>
              <input type="file" class="form-control-file" id="exampleFormControlFile1">
          </div>
      
          <div class="form-group">
            <label for="productTitle">Product Title</label>
            <input type="title" class="form-control" id="productTitle">
          </div>
          <div class="form-group">
              <label for="productDescription">Description</label>
              <textarea class="form-control" id="productDescription" rows="6"></textarea>
            </div>
          <div class="form-group">
              <label for="productPrice">Price</label>
              <input type="price" class="form-control" id="productPrice">
            </div>
          
          <div class="text-center" >
              <button type="submit" class="btn btn-primary mr-5">Update</button>
              <button type="submit" class="btn btn-danger">Cancel</button>
          </div>
          
        </form>
    </div>
  </div>
</div>
  

  @endsection