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
            <th>Qty</th>
            <th>Date Requested</th>
            <th>Review Status</th>
            <th>Payment Status</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td>1</td>
            <td>Potrait cartoon style</td>
            <td>1</td>
            <td>1 januari 2023</td>
            <td>Pending</td>
            <td>Belum Lunas</td>
            <td>
                <a href="/client/request/detail" class="btn btn-primary">View Detail</a>
                <a href="#" class="btn btn-danger">Cancel</a>
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

<!-- Modal -->
<!--
<section class="bg-light">
    <div class="container">
        <div class="text-center">
            <h2>Test Modal</h2>
            <p class="Tes</p>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <p class="text-muted my-4">Desciption</p>
                <button class="btn-btn-primary" data-bs-toggle="modal" 
                data-bs-target="#reg-modal">Tombol</button>
            </div>
        </div>
    </div>
</section>
-->

<!-- Modal -->
<!--
<div class="modal fade" id="reg-modal" tabindex="-1" aria-labelledby="modal-title" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-title">Get the latest update</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Description</p>
                <label for="modal-email" class="form-label">Your email address: </label>
                <input type="email" class="form-control" id="modal-email" placeholder="e.g. email">
            </div>
            <div class="modal-footer">
                <button class="btn-btn-primary">Submit</button>
            </div>
        </div>
    </div>
</div>
-->

