@extends('layouts.app')

@extends('artist.layout.header')

@section('content')

<div class="container">
    <!-- Card -->
  <div class="card text-center">
  <div class="card-header">
    <ul class="nav nav-tabs card-header-tabs">
      <li class="nav-item">
        <a class="nav-link" href="{{ route('artist.products.index') }}">Upload Your Illustration</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="{{ route('artist.products-collections.index') }}">Your Product</a>
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
            <th>Product Title</th>
            <th>Product thumbnail</th>
            <th>Price</th>
            <th>Total Sale</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
        @foreach($products as $product)
            <tr>
                <td>{{ $products->firstItem() + $loop->index }}</td>
                <td>{{ $product->name }}</td>
                <td>
                    <img style="width: 180px; height: 150px;" src="{{ $product->image_url }}" class="img-thumbnail w-10 h-10" alt="{{ $product->name }}">
                </td>
                <td>{{ $product->rupiah_formatted_price }}</td>
                <td>1</td>
                <td>
                    <a href="{{ route('artist.products.edit', $product) }}" class="btn btn-primary">Edit</a>
                    <button data-action="{{ route('artist.products.destroy', $product) }}" class="btn btn-danger btn-delete" data-confirm-delete="true">Delete</button>
                </td>
            </tr>
        @endforeach
    </tbody>
      <form action="" id="form-delete" method="post">@csrf @method('DELETE')</form>
</table>

<!-- Card footer-->
<div class="card-footer d-flex justify-content-center">
    {{ $products->links() }}
</div>
</div>
</div>
@endsection

@push('script')
    <script>
        $('.btn-delete').on('click', function (e) {
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
                    $('#form-delete').attr('action', $(this).data('action')).submit();
                }
            });
        });
    </script>
@endpush
