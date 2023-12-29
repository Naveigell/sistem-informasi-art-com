@extends('layouts.app')

@extends('client.layout.header')

@section('content')

<div class="container">
    <!-- Card -->
    <div class="card" style="width: 30rem;">
        <div class="card-body">
          <h5 class="card-title">Ordered Details</h5>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">Client Name : Layla Sleepwalker</li>
            <li class="list-group-item">Email       : layla@gmail.com</li>
            <li class="list-group-item">Product Name: Potrait Cartoon Style</li>
            <li class="list-group-item">Requested Date: 1 Januari 2023</li>
            <li class="list-group-item">Requested Due Date: 14 Januari 2023</li>
            <li class="list-group-item">Qty: 1</li>
            <li class="list-group-item">
                <p>Description Project: Tolong gambarkan saya sebuah potrait dengan gaya kartun (anime).</p>
                <p>Link 1: https://i0.wp.com/www.jacketscreator.com/wp-content/uploads/2019/07/devil-may-cry-5-vergil-coat-1.jpg?fit=1275%2C1500&ssl=1</p>
                <p>Gaya/Pose: https://i.pinimg.com/736x/ba/0b/e3/ba0be38edff1f68e8ad2d4f876d18159.jpg</p>     
            </li>
          </ul>
          <div class="text-center">
            <a href="/client/request" class="btn btn-danger">Close</a>
          </div>
        </div>
      </div>

</div>
</div>
@endsection