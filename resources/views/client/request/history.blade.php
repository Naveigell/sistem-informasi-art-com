@extends('layouts.app')

@extends('client.layout.header')

@section('content')

    <div class="container">
        <!-- Card -->
        <div class="card text-center">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('client.requests.history') }}">Request History</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('client.requests.ready-payment') }}">Ready to Pay</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('client.requests.active') }}">Active Request</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('client.requests.ready-review') }}">Ready to Review</a>
                    </li>
                </ul>
            </div>

            @if($message = Session::get('success'))
                <x-alerts.alert :message="$message"></x-alerts.alert>
            @endif

            <!-- Table -->
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>No.</th>
                    <th>Product Name</th>
                    <th>Qty</th>
                    <th>Date Requested</th>
                    <th>Review Status</th>
                    <th>Payment Status</th>
                    <th>Action</th>
                </tr>
                </thead>

                <tbody>
                @foreach($requests as $request)
                    <tr>
                        <td>{{ $requests->firstItem() + $loop->index }}</td>
                        <td>{{ $request->product->name }}</td>
                        <td>{{ $request->quantity }}</td>
                        <td>{{ $request->requested_date->format('d F Y') }}</td>
                        <td>Pending</td>
                        <td>Belum Lunas</td>
                        <td>
                            <a href="{{ route('client.requests.show', $request) }}" class="btn btn-primary">View Detail</a>
                            <button data-action="{{ route('client.requests.update.type', [$request, \App\Enums\RequestStatus::CANCELLED]) }}" class="btn btn-danger btn-cancel">Cancel</button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <!-- Card footer-->
            <div class="card-footer d-flex justify-content-center">
                <!-- Pagination -->
                {{ $requests->links() }}
            </div>
        </div>
    </div>
    <form action="" id="form" method="post">@csrf @method('PATCH')</form>
@endsection

@push('script')
    <script>
        $('.btn-cancel').on('click', function (e) {
            Swal.fire({
                title: "Are you sure?",
                text: "This action cannot be undone!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, delete!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#form').attr('action', $(this).data('action')).submit();
                }
            });
        })
    </script>
@endpush
