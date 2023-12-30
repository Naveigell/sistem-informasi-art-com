@extends('layouts.app')

@extends('artist.layout.header')

@section('content')
    <div class="container">
        <!-- Card -->
        <div class="card text-center">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('artist.requests.incoming') }}">Incoming Request</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('artist.requests.active') }}">Active Request</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('artist.requests.finish') }}">Finish Request</a>
                    </li>
                </ul>
            </div>

            @if($message = session('success'))
                <x-alerts.alert :message="$message"></x-alerts.alert>
            @endif

            <!-- Table -->
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>No.</th>
                    <th>Client Name</th>
                    <th>Email</th>
                    <th>Date Requested</th>
                    <th>Ordered Product</th>
                    <th>Qty</th>
                    <th>Payment Status</th>
                    <th>Project Status</th>
                    <th>Action</th>
                </tr>
                </thead>

                <tbody>
                @foreach($requests as $request)
                    <tr>
                        <td>{{ $requests->firstItem() + $loop->index }}</td>
                        <td>{{ $request->client->name }}</td>
                        <td>{{ $request->email }}</td>
                        <td>{{ $request->requested_date->format('d F Y') }}</td>
                        <td>{{ $request->product->name }}</td>
                        <td>{{ $request->quantity }}</td>
                        <td>
                            @if($request->payment->status == \App\Enums\PaymentStatus::PAID)
                                <span class="badge badge-success">Lunas</span>
                            @else
                                <span class="badge badge-danger">Belum Lunas</span>
                            @endif
                        </td>
                        <td>WIP</td>
                        <td>
                            <button
                                data-action="{{ route('artist.requests.reviews.update', [$request, \App\Enums\RequestStatus::FINISHED]) }}"
                                class="btn btn-primary btn-complete">Complete
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <!-- Card footer-->
            <div class="card-footer">
                <!-- Pagination -->
                {{ $requests->links() }}
            </div>

        </div>
    </div>

    <form action="" id="form" method="post">@csrf @method('PATCH')</form>
@endsection

@push('script')
    <script>
        $('.btn-complete').on('click', function () {
            Swal.fire({
                title: "Are you sure want to complete?",
                text: "This action cannot be undone!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, complete!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#form').attr('action', $(this).data('action')).submit();
                }
            });
        });
    </script>
@endpush
