@extends('layouts.app')

@extends('artist.layout.header')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Artist Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="text-center">
                        Welcome, {{Auth::user()->name}} <br>
                        <b>You are in the artist dashboard. Explore your creativity here !</b> <br> <br>
                        <a href="{{ route('artist.products.index') }}" class="btn btn-primary">Create New Art</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
