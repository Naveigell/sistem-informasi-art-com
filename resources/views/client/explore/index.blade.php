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

@push('style')
    <style>
        mark{
            background: orange;
            color: black;
            padding: 0;
        }
    </style>
@endpush

@section('content')

    <section style="background-color: #eee;">
        <div class="container py-5">
            <div class="row justify-content-center ">
                <!--Search bar-->
                <div class="col-md-6 mb-5">
                    <form class="card p-5" action="{{ route('client.explores.index') }}" method="get">
                        <h5>An Easier way to find your Illustrations and Artist</h5>
                        <div class="col-md-12">
                            <input type="text" id="query" name="query" value="{{ request()->query('query') }}" class="form-control" placeholder="Enter illustrations e.g. cartoon, anime, potrait, custom style">
                        </div>
                        <div class="col-md-5 ">
                            <button type="submit" class="btn btn-primary btn-sm">Search Results</button>
                        </div>
                    </form>
                </div>
                <!--Search bar-->
            </div>

            @if($message = session('success'))
                <x-alerts.alert :message="$message"></x-alerts.alert>
            @endif

            @foreach($products as $product)
                <div class="row justify-content-center mb-3">
                    <div class="col-md-12 col-xl-10">
                        <div class="card shadow-0 border rounded-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 col-lg-3 col-xl-3 mb-4 mb-lg-0">
                                        <div class="bg-image hover-zoom ripple rounded ripple-surface">
                                            <img src="{{ $product->image_url }}"
                                                 class="w-100" />
                                            <a href="#!">
                                                <div class="hover-overlay">
                                                    <div class="mask" style="background-color: rgba(253, 253, 253, 0.15);"></div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-xl-6">
                                        <h5 class="result-context">{{ $product->name }}</h5>
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
                                            <span>{{ $product->artist->name }}</span>
                                        </div>
                                        <p class="text-truncate mb-4 mb-md-0">
                                            {{ $product->description }}
                                        </p>
                                    </div>
                                    <div class="col-md-6 col-lg-3 col-xl-3 border-sm-start-none border-start">
                                        <div class="d-flex flex-row align-items-center mb-1">
                                            <h4 class="mb-1 me-1">{{ $product->rupiah_formatted_price }}</h4>
                                        </div>
                                        <h6 class="text-success">Free shipping</h6>
                                        <div class="d-flex flex-column mt-4">
                                            <a href="{{ route('client.explores.show', $product->slug) }}" class="btn btn-primary btn-sm">View Product Detail</a>
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
            @endforeach

        </div>

        <div class="pagination d-flex justify-content-center mb-4">
            {{ $products->links() }}
        </div>
    </section>
@endsection

@push('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mark.js/8.11.1/mark.min.js" integrity="sha512-5CYOlHXGh6QpOFA/TeTylKLWfB3ftPsde7AnmhuitiTX4K5SqCLBeKro6sPS8ilsz1Q4NRx3v8Ko2IBiszzdww==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        var context = document.querySelectorAll(".result-context");
        var instance = new Mark(context);
        instance.mark(document.getElementById('query').value);
    </script>
@endpush
