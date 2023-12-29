@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center align-middle">
        <div class="col-md-4">
            <div class="card opacity">
                <div class="card-body ">
                    <h1 class="text-center title">ARTCOM</h1>
                    <h4 class="text-center title">Connect with arts.</h4>
                    <div class="row mt-4 mb-2">
                        <div class="d-grid gap-2 col-11 mx-auto ">
                            <a href="{{ route('login') }}" class="btn btn-green rounded-pill text-white fw-bold">Login</a>
                        </div>
                    </div>
                    <div class="row mt-4 mb-2">
                        <div class="d-grid col-11 mx-auto">
                            <p class="text-center mb-1">Don't have an account ?</p>
                           <button class="btn btn-info rounded-pill text-light m-0 fw-bolder" data-bs-toggle="modal" data-bs-target="#createAccount">Create a new account</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Modal Create Account --}}
<div class="modal fade" id="createAccount" tabindex="-1" aria-labelledby="createAccountLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content opacity">
        <div class="modal-body p-4">
            <h1 class="text-center title">ARTCOM</h1>
            <h5 class="text-center title">Select your role: </h5>
            <div class="row mb-2">
                <div class="d-grid gap-2 col-11 mx-auto ">
                    <a href="{{ route('register-client') }}" class="btn btn-info rounded-pill text-light">
                        <b>{{ __('Client') }}</b>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="d-grid gap-2 col-11 mx-auto ">
                    <a href="{{ route('register-artist') }}" class="btn btn-warning rounded-pill text-light text-center">
                        <b>{{ __('Artist') }}</b>
                    </a>
                </div>
            </div>
        </div>
      </div>
    </div>
</div>
@endsection
