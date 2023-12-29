@extends('layouts.app')

@extends('artist.layout.header')

@section('content')
<div class="container">
    <!-- Card -->
  <div class="card text-center">
  <div class="card-header">
    <ul class="nav nav-tabs card-header-tabs">
      <li class="nav-item">
        <a class="nav-link" href="{{ route('artist.requests.index', ["type" => \App\Enums\RequestType::INCOMING]) }}">Incoming Request</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('artist.requests.index', ["type" => \App\Enums\RequestType::ACTIVE]) }}">Active Request</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="{{ route('artist.requests.index', ["type" => \App\Enums\RequestType::FINISH]) }}">Finish Request</a>
      </li>
    </ul>
  </div>

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
    <tr>
        <td>1</td>
        <td>Layla Sleepwalker</td>
        <td>layla@gmail.com</td>
        <td>1 januari 2023</td>
        <td>Potrait cartoon style</td>
        <td>1</td>
        <td>Lunas</td>
        <td>Complete</td>
        <td>
            <a href="/delete" class="btn btn-danger" data-confirm-delete="true">Delete</a>
        </td>
    </tr>
    </tbody>
  </table>

<!-- Card footer-->
<div class="card-footer">
    <!-- Pagination -->
    <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center">
          <li class="page-item"><a class="page-link" href="#">Previous</a></li>
          <li class="page-item"><a class="page-link" href="#">1</a></li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item"><a class="page-link" href="#">Next</a></li>
        </ul>
      </nav>
</div>
</div>
</div>
@endsection
