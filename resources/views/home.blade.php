
@extends('layouts.app')
@auth
    @switch(Auth::user()->role)
        @case('artist')
            @include('artist.layout.header')
            @break
        @case('client')
            @include('client.layout.header')
            @break
        @default
    @endswitch
@endauth
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body text-center">
                    WELLCOME TO THE ARTCOM, WHERE THE ART MEET YOUR NEEDS
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
