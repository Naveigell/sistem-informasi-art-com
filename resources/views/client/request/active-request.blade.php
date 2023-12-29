@extends('layouts.app')

@extends('client.layout.header')

@section('content')

<div class="container">
    <!-- Card -->
    <div class="card text-center">
        <div class="card-header">
          <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item">
              <a class="nav-link active" href="/client/request">Request History</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="/client/request/pay">Ready to Pay</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="/client/request/active-request">Active Request</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="/client/request/ready-review">Ready to Review</a>
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
    <tr>
        <td>1</td>
        <td>Potrait cartoon style</td>
        <td>1 januari 2023</td>
        <td>1</td>
        <td>Lunas</td>
        <td>WIP</td>
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