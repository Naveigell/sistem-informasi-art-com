@extends('layouts.app')

@extends('artist.layout.header')

@section('content')
    <div class="container">
        <!-- Card -->
        <div class="card text-center">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('artist.requests.incoming') }}">Incoming Request</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('artist.requests.active') }}">Active Request</a>
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
                    <th>Review Status</th>
                    <th>Payment Status</th>
                    <th>Action</th>
                </tr>
                </thead>

                <tbody>
                @foreach($requests as $request)
                    <tr>
                        <td>{{ $requests->firstItem() + $loop->index }}</td>
                        <td>{{ $request->client->name }}</td>
                        <td>{{ $request->client->email }}</td>
                        <td>{{ $request->requested_date->format('d F Y') }}</td>
                        <td>
                            @if($request->status == \App\Enums\RequestStatus::PENDING)
                                <span class="badge badge-dark">{{ $request->status }}</span>
                            @elseif($request->status == \App\Enums\RequestStatus::REJECTED)
                                <span class="badge badge-danger">{{ $request->status }}</span>
                            @else
                                {{ $request->status }}
                            @endif
                        </td>
                        <td>Belum Lunas</td>
                        <td>
                            <a href="{{ route('artist.reviews.edit', $request) }}" class="btn btn-primary">Review</a>
                            <button data-action="{{ route('artist.requests.destroy', $request) }}"
                                    class="btn btn-danger btn-delete" data-confirm-delete="true">Delete
                            </button>
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
    <form action="" id="form" method="post">@csrf @method('DELETE')</form>
@endsection

@push('script')
    <script>
        $('.btn-delete').on('click', function () {
            Swal.fire({
                title: "Are you sure want to delete?",
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
        });
    </script>
@endpush
