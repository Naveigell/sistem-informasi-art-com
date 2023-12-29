@extends('layouts.app')

@extends('client.layout.header')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Client Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="text-center">
                        Welcome, {{Auth::user()->name}} <br>
                        <b>You are in the client dashboard. 
                        Explore the art here !</b> <br> <br>
                        <a href="" class="btn btn-outline-success">Explore now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
