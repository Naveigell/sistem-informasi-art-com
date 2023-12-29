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

<section style="background-color: #eee;">
    <div class="container py-5">
      <div class="row justify-content-center ">
        <!--Search bar-->
        <div class="col-md-6 mb-5">
            <div class="card p-5 ">
                <h5>An Easier way to find your Illustrations and Artist</h5>
                    <div class="col-md-12">
                        <input type="text" class="form-control" placeholder="Enter illustrations e.g. cartoon, anime, potrait, custom style">
                    </div>
                    <div class="col-md-5 ">
                        <button class="btn btn-primary btn-sm">Search Results</button>                          
                    </div>
              </div>
          </div>
      <!--Search bar-->
        <div class="col-md-12 col-xl-10">
          <div class="card shadow-0 border rounded-3">
            <div class="card-body">
              <div class="row">
                <div class="col-md-12 col-lg-3 col-xl-3 mb-4 mb-lg-0">
                  <div class="bg-image hover-zoom ripple rounded ripple-surface">
                    <img src="img/thumbnail.png"
                      class="w-100" />
                    <a href="#!">
                      <div class="hover-overlay">
                        <div class="mask" style="background-color: rgba(253, 253, 253, 0.15);"></div>
                      </div>
                    </a>
                  </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-6">
                  <h5>Potrait cartoon style {{Auth::user()->role === 'client' ? 'client' : 'artist'}}</h5>
                  <div class="d-flex flex-row">
                    <div class="text-danger mb-1 me-2">
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                    </div>
                    <span>1 review</span>
                  </div>
                  <div class="mt-1 mb-0 text-muted small">
                    <span>By Artist Name</span>
                  </div>
                  <p class="text-truncate mb-4 mb-md-0">
                    Saya akan membuatkan anda gambar 2D dengan gaya anime. Anda bebas dalam memilih karakter yang ingin dipesan,
                    serta temasuk pose seperti apa yang anda inginkan.
                  </p>
                </div>
                <div class="col-md-6 col-lg-3 col-xl-3 border-sm-start-none border-start">
                  <div class="d-flex flex-row align-items-center mb-1">
                    <h4 class="mb-1 me-1">Rp400.000</h4>
                  </div>
                  <h6 class="text-success">Free shipping</h6>
                  <div class="d-flex flex-column mt-4">
                    <button class="btn btn-primary btn-sm" type="button">
                      <a href="/product" class="text-decoration-none text-white">
                      View Product Detail </a> </button>
                    <button class="btn btn-outline-primary btn-sm mt-2" type="button">
                      Add to wishlist
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row justify-content-center mb-3">
        <div class="col-md-12 col-xl-10">
          <div class="card shadow-0 border rounded-3">
            <div class="card-body">
              <div class="row">
                <div class="col-md-12 col-lg-3 col-xl-3 mb-4 mb-lg-0">
                  <div class="bg-image hover-zoom ripple rounded ripple-surface">
                    <img src="img/thumbnail.png"
                      class="w-100" />
                    <a href="#!">
                      <div class="hover-overlay">
                        <div class="mask" style="background-color: rgba(253, 253, 253, 0.15);"></div>
                      </div>
                    </a>
                  </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-6">
                  <h5>Potrait JoJo style</h5>
                  <div class="d-flex flex-row">
                    <div class="text-danger mb-1 me-2">
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                    </div>
                    <span>1 review</span>
                  </div>
                  <div class="mt-1 mb-0 text-muted small">
                    <span>By Artist Name</span>
                  </div>
                  <p class="text-truncate mb-4 mb-md-0">
                    Saya akan membuatkan anda gambar 2D dengan gaya anime. Anda bebas dalam memilih karakter yang ingin dipesan,
                    serta temasuk pose seperti apa yang anda inginkan.
                  </p>
                </div>
                <div class="col-md-6 col-lg-3 col-xl-3 border-sm-start-none border-start">
                  <div class="d-flex flex-row align-items-center mb-1">
                    <h4 class="mb-1 me-1">Rp300.000</h4>
                  </div>
                  <h6 class="text-success">Free shipping</h6>
                  <div class="d-flex flex-column mt-4">
                    <button class="btn btn-primary btn-sm" type="button">View Product Detail</button>
                    <button class="btn btn-outline-primary btn-sm mt-2" type="button">
                      Add to wishlist
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row justify-content-center mb-3">
        <div class="col-md-12 col-xl-10">
          <div class="card shadow-0 border rounded-3">
            <div class="card-body">
              <div class="row">
                <div class="col-md-12 col-lg-3 col-xl-3 mb-4 mb-lg-0">
                  <div class="bg-image hover-zoom ripple rounded ripple-surface">
                    <img src="img/thumbnail.png"
                      class="w-100" />
                    <a href="#!">
                      <div class="hover-overlay">
                        <div class="mask" style="background-color: rgba(253, 253, 253, 0.15);"></div>
                      </div>
                    </a>
                  </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-6">
                  <h5>Winter character custom</h5>
                  <div class="d-flex flex-row">
                    <div class="text-danger mb-1 me-2">
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                    </div>
                    <span>1 review</span>
                  </div>
                  <div class="mt-1 mb-0 text-muted small">
                    <span>By Artist Name</span>
                  </div>
                  <p class="text-truncate mb-4 mb-md-0">
                    Saya akan membuatkan anda gambar 2D dengan gaya anime. Anda bebas dalam memilih karakter yang ingin dipesan,
                    serta temasuk pose seperti apa yang anda inginkan.
                  </p>
                </div>
                <div class="col-md-6 col-lg-3 col-xl-3 border-sm-start-none border-start">
                  <div class="d-flex flex-row align-items-center mb-1">
                    <h4 class="mb-1 me-1">Rp500.000</h4>
                  </div>
                  <h6 class="text-success">Free shipping</h6>
                  <div class="d-flex flex-column mt-4">
                    <button class="btn btn-primary btn-sm" type="button">View Product Detail</button>
                    <button class="btn btn-outline-primary btn-sm mt-2" type="button">
                      Add to wishlist
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row justify-content-center mb-3">
        <div class="col-md-12 col-xl-10">
          <div class="card shadow-0 border rounded-3">
            <div class="card-body">
              <div class="row">
                <div class="col-md-12 col-lg-3 col-xl-3 mb-4 mb-lg-0">
                  <div class="bg-image hover-zoom ripple rounded ripple-surface">
                    <img src="img/thumbnail.png"
                      class="w-100" />
                    <a href="#!">
                      <div class="hover-overlay">
                        <div class="mask" style="background-color: rgba(253, 253, 253, 0.15);"></div>
                      </div>
                    </a>
                  </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-6">
                  <h5>Winter character custom</h5>
                  <div class="d-flex flex-row">
                    <div class="text-danger mb-1 me-2">
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                    </div>
                    <span>1 review</span>
                  </div>
                  <div class="mt-1 mb-0 text-muted small">
                    <span>By Artist Name</span>
                  </div>
                  <p class="text-truncate mb-4 mb-md-0">
                    Saya akan membuatkan anda gambar 2D dengan gaya anime. Anda bebas dalam memilih karakter yang ingin dipesan,
                    serta temasuk pose seperti apa yang anda inginkan.
                  </p>
                </div>
                <div class="col-md-6 col-lg-3 col-xl-3 border-sm-start-none border-start">
                  <div class="d-flex flex-row align-items-center mb-1">
                    <h4 class="mb-1 me-1">Rp500.000</h4>
                  </div>
                  <h6 class="text-success">Free shipping</h6>
                  <div class="d-flex flex-column mt-4">
                    <button class="btn btn-primary btn-sm" type="button">View Product Detail</button>
                    <button class="btn btn-outline-primary btn-sm mt-2" type="button">
                      Add to wishlist
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row justify-content-center mb-3">
        <div class="col-md-12 col-xl-10">
          <div class="card shadow-0 border rounded-3">
            <div class="card-body">
              <div class="row">
                <div class="col-md-12 col-lg-3 col-xl-3 mb-4 mb-lg-0">
                  <div class="bg-image hover-zoom ripple rounded ripple-surface">
                    <img src="img/thumbnail.png"
                      class="w-100" />
                    <a href="#!">
                      <div class="hover-overlay">
                        <div class="mask" style="background-color: rgba(253, 253, 253, 0.15);"></div>
                      </div>
                    </a>
                  </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-6">
                  <h5>Winter character custom</h5>
                  <div class="d-flex flex-row">
                    <div class="text-danger mb-1 me-2">
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                    </div>
                    <span>1 review</span>
                  </div>
                  <div class="mt-1 mb-0 text-muted small">
                    <span>By Artist Name</span>
                  </div>
                  <p class="text-truncate mb-4 mb-md-0">
                    Saya akan membuatkan anda gambar 2D dengan gaya anime. Anda bebas dalam memilih karakter yang ingin dipesan,
                    serta temasuk pose seperti apa yang anda inginkan.
                  </p>
                </div>
                <div class="col-md-6 col-lg-3 col-xl-3 border-sm-start-none border-start">
                  <div class="d-flex flex-row align-items-center mb-1">
                    <h4 class="mb-1 me-1">Rp500.000</h4>
                  </div>
                  <h6 class="text-success">Free shipping</h6>
                  <div class="d-flex flex-column mt-4">
                    <button class="btn btn-primary btn-sm" type="button">View Product Detail</button>
                    <button class="btn btn-outline-primary btn-sm mt-2" type="button">
                      Add to wishlist
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </section>
  @endsection