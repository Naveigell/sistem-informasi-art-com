@extends('layouts.app')

@extends('client.layout.header')

@section('content')

<div class="container">
    <!-- Card -->
    <div class="card" style="width: 30rem;">
        <div class="card-body">
          <h5 class="card-title">Ordered Details</h5>
            <table class="mx-3" style="var(--bs-body-font-family);">
                <tr>
                    <th>Client Name</th>
                    <td>: {{ $request->client->name }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>: {{ $request->email }}</td>
                </tr>
                <tr>
                    <th>Product Name</th>
                    <td>: {{ $request->product->name }}</td>
                </tr>
                <tr>
                    <th>Requested Date</th>
                    <td>: {{ $request->requested_date->format('d F Y') }} </td>
                </tr>
                <tr>
                    <th>Quantity</th>
                    <td>: {{ $request->quantity }} </td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td> :
                    </td>
                </tr>
            </table>
            <div class="mx-3 mt-4">
                <p>{!! strip_tags(nl2br($request->description)) !!}</p>
            </div>
          <div class="text-center">
            <a href="{{ route('client.requests.history') }}" class="btn btn-danger">Close</a>
          </div>
        </div>
      </div>

</div>
</div>
@endsection
