@extends('layouts.app')

@extends('client.layout.header')

@section('content')

    <div class="container">
        <!-- Card -->
        <div class="card text-center">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Request</a>
                    </li>
                </ul>
            </div>

            <div class="card-body">
                <form method="post"
                      action="{{ route('client.explores.update', $product) }}"
                      enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="productTitle">Product Title</label>
                        <input type="text" value="{{ $product->name }}" name="name"
                               class="form-control @error('name') is-invalid @enderror" id="productTitle" disabled>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" value="{{ old('email') }}" name="email"
                               class="form-control @error('email') is-invalid @enderror" id="email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="productDescription">Description <small class="text text-muted">(Cth. Tolong buatkan saya gambar naruto)</small></label>
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror"
                                  id="productDescription"
                                  rows="6">{{ old('description') }}</textarea>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="productPrice">Price</label>
                        <input name="price" value="{{ $product->price }}" type="text"
                               class="form-control nominal @error('price') is-invalid @enderror" id="productPrice" readonly>
                        @error('price')
                        <span class="invalid-feedback" role="alert">
                              {{ $message }}
                          </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="subTotal">Sub Total</label>
                        <input name="sub_total" value="{{ ($product->price * old('quantity', 1)) }}" type="text"
                               class="form-control nominal @error('sub_total') is-invalid @enderror" id="subTotal" readonly>
                        @error('sub_total')
                        <span class="invalid-feedback" role="alert">
                              {{ $message }}
                          </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="productQuantity">Quantity</label>
                        <input name="quantity" value="{{ old('quantity', 1) }}" type="number" step="1" min="1"
                               class="form-control @error('quantity') is-invalid @enderror" id="productQuantity">
                        @error('quantity')
                        <span class="invalid-feedback" role="alert">
                              {{ $message }}
                          </span>
                        @enderror
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Send</button>
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
    <script>
        var quantity = $('#productQuantity');

        quantity.on('change', function(e) {
            var qty   = parseInt($(this).val());
            var price = parseInt($('#productPrice').inputmask('unmaskedvalue'));

            // prevent negative value
            qty = Math.max(0, qty);

            $('#subTotal').val(qty * price);
        });
    </script>
@endpush
