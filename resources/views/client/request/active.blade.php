@extends('layouts.app')

@extends('client.layout.header')

@section('content')

    <div class="container">
        <!-- Card -->
        <div class="card text-center">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('client.requests.history') }}">Request History</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('client.requests.ready-payment') }}">Ready to Pay</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('client.requests.active') }}">Active Request</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('client.requests.ready-review') }}">Ready to Review</a>
                    </li>
                </ul>
            </div>

            <!-- Table -->
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>No.</th>
                    <th>Product Name</th>
                    <th>Date Requested</th>
                    <th>Qty</th>
                    <th>Payment Status</th>
                    <th>Project Status</th>
                </tr>
                </thead>

                <tbody>
                    @foreach($requests as $request)
                        <tr>
                            <td>{{ $requests->firstItem() + $loop->index }}</td>
                            <td>{{ $request->product->name }}</td>
                            <td>{{ $request->requested_date->format('d F Y') }}</td>
                            <td>{{ $request->quantity }}</td>
                            <td>Lunas</td>
                            <td>WIP</td>
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
@endsection
