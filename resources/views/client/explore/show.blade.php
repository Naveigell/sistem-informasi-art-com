@extends('layouts.app')

{{-- if user is client then show client header --}}
@auth
    @switch(Auth::user()->role)
        @case('artist')
            @include('artist.layout.header')
            @break
        @case('client')
            @include('client.layout.header')
            @break
        @default
    @endswitch
@endauth
@section('content')

    <div class="container">
        <div class="card ">
            <div class="card-body p-5">
                <div class="row upper ">
                    <span><i class="fa fa-check-circle"></i> Product Details</span>
                </div>
                <div class="row">
                    <div class="col-md-7 ">
                        <div class="left border">
                            <div class="row">
                                <span class="header text-center">{{ $product->name }}</span>
                                <div class="product-picture d-flex justify-content-center">
                                    <img src="{{ $product->image_url }}" width="300rem"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="right border">
                            <div class="header">Informations</div>
                            <hr>
                            <div class="row item">
                                <div class="col-2 align-self-center"><img class="img-fluid" src="{{ asset('img/artist.png') }}"
                                                                          style="width: 100px;"></div>
                                <div class="col-8 align-self-center">
                                    <div class="row text-muted">{{ $product->artist->name }}</div>
                                    <div class="row text-muted">From: Indonesia</div>
                                </div>
                            </div>
                            <hr>
                            <div class="row lower">
                                <div class="col text-left">Price</div>
                                <div class="col text-right">{{ $product->rupiah_formatted_price }}</div>
                            </div>
                            <div class="row lower">
                                <div class="col text-left">Shipping</div>
                                <div class="col text-right">Free</div>
                            </div>
                            <div class="row lower">
                                <div class="col text-left">
                                    {!! strip_tags(nl2br($product->description)) !!}
                                </div>
                            </div>
                            <a href="{{ route('client.explores.edit', $product) }}" class="btn-custom-product d-block text-center text-decoration-none">Request This Illustration</a>
                            <button class="btn-custom-product">View Artist Profile</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
