@extends('layouts.app')
@extends('client.layout.header')

@section('content')

    <div class="container">
        <!-- Card -->
        <div class="card">
            <div class="card-body">
                <div class="row upper">
                    <span><i class="fa fa-check-circle-o"></i> Product Details</span>
                </div>
                <div class="row">
                    <div class="col-md-7">
                        <div class="left border p-3">
                            <div class="row mb-5">
                                <span class="header">Payment</span>
                                <div class="icons">
                                    <img src="{{ asset('img/ovo.png') }}" width="50rem"/>
                                    <img src="{{ asset('img/dana.png') }}" width="50rem"/>
                                </div>
                            </div>
                            <form class="form">
                                <span>Name:</span>
                                <input value="{{ $request->client->name }}" disabled>
                                <span>Number:</span>
                                <input value="{{ $request->client->phone_number }}" disabled>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="right border">
                            <div class="header">Order Summary</div>
                            <p>1 item</p>
                            <div class="row item">
                                <div class="col-4 align-self-center">
                                    <img class="img-fluid" src="{{ $request->product->image_url }}">
                                </div>
                                <div class="col-8">
                                    <div class="row"><b>{{ $request->product->rupiah_formatted_price }}</b></div>
                                    <div class="row text-muted">{{ $request->product->name }}</div>
                                    <div class="row">Qty: {{ $request->quantity }}</div>
                                </div>
                            </div>
                            <hr>
                            <div class="row lower">
                                <div class="col text-left">Subtotal</div>
                                <div class="col text-right">{{ $request->sub_total_rupiah_formatted }}</div>
                            </div>
                            <div class="row lower">
                                <div class="col text-left">Shipping</div>
                                <div class="col text-right">Free</div>
                            </div>
                            <div class="row lower">
                                <div class="col text-left"><b>Total to pay</b></div>
                                <div class="col text-right"><b>{{ $request->sub_total_rupiah_formatted }}</b></div>
                            </div>
                            {{-- This action should be store --}}
                            {{-- Why i using update because i shallow it in routes, the flow isn't good at all --}}
                            <button data-action="{{ route('client.payments.update', $request) }}" class="btn btn-primary btn-pay">Pay</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <form action="" id="form" method="post">@csrf @method('PUT')</form>
@endsection

@push('script')
    <script>
        $('.btn-pay').on('click', function (e) {
            Swal.fire({
                title: "Are you sure want to pay?",
                text: "This action cannot be undone!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, pay!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#form').attr('action', $(this).data('action')).submit();
                }
            });
        })
    </script>
@endpush
