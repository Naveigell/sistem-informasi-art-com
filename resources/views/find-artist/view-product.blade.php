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
                            <span class="header text-center">Potrait cartoon style</span>
                            <div class="product-picture d-flex justify-content-center">
                                <img src="img/produk.jpg" width="300rem"/>
                            </div>
                        </div>
                    </div>                        
                </div>
                <div class="col-md-5">
                    <div class="right border">
                        <div class="header">Informations</div>
                        <hr>
                        <div class="row item">
                            <div class="col-2 align-self-center"><img class="img-fluid" src="img/artist.png" style="width: 100px;"></div>
                            <div class="col-8 align-self-center">
                                <div class="row text-muted">Artist Name</div>
                                <div class="row text-muted">From: Indonesia</div>
                            </div>
                        </div>
                        <hr>
                        <div class="row lower">
                            <div class="col text-left">Price</div>
                            <div class="col text-right">Rp400.000</div>
                        </div>
                        <div class="row lower">
                            <div class="col text-left">Shipping</div>
                            <div class="col text-right">Free</div>
                        </div>
                        <div class="row lower">
                            <div class="col text-left">Saya akan membuatkan anda gambar 2D dengan gaya anime. Anda bebas dalam memilih karakter yang ingin dipesan,
                                serta temasuk pose seperti apa yang anda inginkan.</div>
                        </div>
                        <button class="btn-custom-product">Request This Illustration</button>
                        <button class="btn-custom-product">View Artist Profile</button>
                    </div>
                </div>
            </div>
        </div>
    <div>
</div>
@endsection