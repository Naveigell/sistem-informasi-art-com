@extends('layouts.app')

@extends('artist.layout.header')

@section('content')
    <div class="container ">
        <!-- Card -->
        <div class="card  ">
            <div class="card-body">
                <h3 class="card-title text-center">Review Request</h3>
                <table class="mx-3" style="var(--bs-body-font-family);">
                    <tr>
                        <th>Client Name</th>
                        <td>: {{ $review->client->name }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>: {{ $review->email }}</td>
                    </tr>
                    <tr>
                        <th>Product Name</th>
                        <td>: {{ $review->product->name }}</td>
                    </tr>
                    <tr>
                        <th>Requested Date</th>
                        <td>: {{ $review->requested_date->format('d F Y') }} </td>
                    </tr>
                    <tr>
                        <th>Quantity</th>
                        <td>: {{ $review->quantity }} </td>
                    </tr>
                    <tr>
                        <th>Description</th>
                        <td> :
                        </td>
                    </tr>
                </table>
                <div class="mx-3 mt-4">
                    <p>{!! strip_tags(nl2br($review->description)) !!}</p>
                </div>
                <div class="text-center">
                    <button
                        data-action="{{ route('artist.requests.reviews.update', [$review, \App\Enums\RequestStatus::APPROVED]) . '?' . http_build_query(['redirect' => route('artist.requests.incoming')]) }}"
                        class="btn btn-primary btn-accept">Accept
                    </button>
                    <button
                        data-action="{{ route('artist.requests.reviews.update', [$review, \App\Enums\RequestStatus::REJECTED]) . '?' . http_build_query(['redirect' => route('artist.requests.incoming')]) }}"
                        class="btn btn-danger btn-reject">Reject
                    </button>
                </div>
            </div>
        </div>
        <form action="" id="form" method="post">@csrf @method('PATCH')</form>
    </div>
@endsection

@push('script')
    <script>
        $('.btn-accept').on('click', function () {
            Swal.fire({
                title: "Are you sure want to accept?",
                text: "This action cannot be undone!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, accept!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#form').attr('action', $(this).data('action')).submit();
                }
            });
        });

        $('.btn-reject').on('click', function () {
            Swal.fire({
                title: "Are you sure want to reject?",
                text: "This action cannot be undone!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, reject!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#form').attr('action', $(this).data('action')).submit();
                }
            });
        });
    </script>
@endpush
