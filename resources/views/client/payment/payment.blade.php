@extends('layouts.app')
@extends('client.layout.header')

@section('content')

<div class="container">
<body>
    <!-- Card -->
    <div class="card">
        <div class="card-body">
            <div class="row upper">
                <span><i class="fa fa-check-circle-o"></i> Product Details</span>
            </div>
            <div class="row">
                <div class="col-md-7">
                    <div class="left border p-3">
                        <div class="row mb-5">
                            <span class="header">Payment</span>
                            <div class="icons">
                                <img src="{{URL::asset('img/ovo.png')}}" width="50rem"/>
                                <img src="{{URL::asset('img/dana.png')}}" width="50rem"/>
                            </div>
                        </div>
                        <form class="form">
                            <span>Name:</span>
                            <input placeholder="Layla Sleepwalker">
                            <span>Number:</span>
                            <input placeholder="08123456789"> 
                        </form>
                    </div>                        
                </div>
                <div class="col-md-5">
                    <div class="right border">
                        <div class="header">Order Summary</div>
                        <p>1 item</p>
                        <div class="row item">
                            <div class="col-4 align-self-center"><img class="img-fluid" src="{{URL::asset('img/thumbnail.png')}}"></div>
                            <div class="col-8">
                                <div class="row"><b>Rp400.000</b></div>
                                <div class="row text-muted">Potrait cartoon style</div>
                                <div class="row">Qty:1</div>
                            </div>
                        </div>
                        <hr>
                        <div class="row lower">
                            <div class="col text-left">Subtotal</div>
                            <div class="col text-right">Rp400.000</div>
                        </div>
                        <div class="row lower">
                            <div class="col text-left">Shipping</div>
                            <div class="col text-right">Free</div>
                        </div>
                        <div class="row lower">
                            <div class="col text-left"><b>Total to pay</b></div>
                            <div class="col text-right"><b>Rp400.000</b></div>
                        </div>
                        <button class="btn btn-primary">Pay</button>
                    </div>
                </div>
            </div>
        </div>
        
     <div>
    </div>
    </div>
</div>
@endsection