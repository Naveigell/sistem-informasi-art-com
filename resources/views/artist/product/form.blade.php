@extends('layouts.app')

@extends('artist.layout.header')

@section('content')

<div class="container">
  <!-- Card -->
  <div class="card text-center">
    <div class="card-header">
      <ul class="nav nav-tabs card-header-tabs">
        <li class="nav-item">
          <a class="nav-link active" href="#">Upload Product</a>
        </li>
      </ul>
    </div>

    <div class="card-body">
      <form method="post" action="{{ @$product ? route('artist.products.update', $product) : route('artist.products.store') }}" enctype="multipart/form-data">
          @csrf
          @method(@$product ? 'PUT' : 'POST')
          <div class="form-group">
              <label for="exampleFormControlFile1">Upload your Illustration Product</label>
              <input type="file" accept="image/png,image/jpg,image/jpeg" name="image" class="form-control @error('image') is-invalid @enderror" id="exampleFormControlFile1">
              @error('image')
                  <span class="invalid-feedback" role="alert">
                      {{ $message }}
                  </span>
              @enderror
          </div>

          <div class="form-group">
            <label for="productTitle">Product Title</label>
            <input type="text" value="{{ old('name', @$product->name) }}" name="name" class="form-control @error('name') is-invalid @enderror" id="productTitle">
            @error('name')
                <span class="invalid-feedback" role="alert">
                    {{ $message }}
                </span>
            @enderror
          </div>
          <div class="form-group">
              <label for="productDescription">Description</label>
              <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="productDescription" rows="6">{{ old('description', @$product->description) }}</textarea>
              @error('description')
                  <span class="invalid-feedback" role="alert">
                      {{ $message }}
                  </span>
              @enderror
            </div>
          <div class="form-group">
              <label for="productPrice">Price</label>
              <input name="price" value="{{ old('price', @$product->price) }}" type="text" class="form-control nominal @error('price') is-invalid @enderror" id="productPrice">
              @error('price')
                  <span class="invalid-feedback" role="alert">
                      {{ $message }}
                  </span>
              @enderror
            </div>

          <div class="text-center" >
              <button type="submit" class="btn btn-primary mr-5">Upload</button>
              <button type="submit" class="btn btn-danger">Cancel</button>
          </div>

        </form>
    </div>
  </div>
</div>

@endsection

@push('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.7/jquery.inputmask.min.js" integrity="sha512-jTgBq4+dMYh73dquskmUFEgMY5mptcbqSw2rmhOZZSJjZbD2wMt0H5nhqWtleVkyBEjmzid5nyERPSNBafG4GQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(".nominal").inputmask({
            alias : "currency",
            groupSeparator: ".",
            radixPoint: ",",
            prefix: "Rp. ",
            placeholder: "",
            allowPlus: false,
            allowMinus: false,
            rightAlign: false,
            digits: 0,
            removeMaskOnSubmit: true,
        });
    </script>
@endpush
