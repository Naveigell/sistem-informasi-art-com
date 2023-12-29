@extends('layouts.app')

@extends('artist.layout.header')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              Edit Profile
            </div>
            <div class="card-body">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @elseif (session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                @endif
              {{-- Form edit profile --}}
              <form action="{{ route('artist.profile.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                  <label for="avatar" class="form-label">Avatar</label>
                  <input type="file" class="form-control @error('avatar') is-invalid @enderror" id="avatar" name="avatar" value="{{ old('avatar') }}" accept="image/*" >
                    @if (Auth::user()->avatar)
                        <img src="/avatars/{{ Auth::user()->avatar }}" class="img-thumbnail rounded-circle mt-4 w-25 h-25" alt="Avatar">
                  
                    @else
                    <img src="{{ URL::asset('/img/profile2.png') }}" class="img-thumbnail rounded-circle mt-4 w-25 h-25" alt="Avatar">
                    @endif
                  {{-- @error('avatar')
                    <span class="text-danger">{{ $message }}</span> 
                  @enderror --}}
                </div>
                <div class="mb-3">
                  <label for="name" class="form-label">Full Name</label>
                  <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ Auth::user()->name }}"> 
                    @error('name')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                  <label for="about_me" class="form-label">About Me</label>
                  <input type="about_me" class="form-control @error('about_me') is-invalid @enderror" id="about_me" name="about_me" value="{{ Auth::user()->about_me }}">
                  @error('about_me')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
               
                <div class="mb-3">
                  {{-- Phone Number --}}
                  <label for="phone_number" class="form-label">Phone Number</label>
                  <input type="text" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number" name="phone_number" value="{{ Auth::user()->phone_number }}">
                </div>
                {{-- Payment option --}}
                <div class="mb-3 d-flex flex-row gap-3">
                  <label for="payment_option" class="form-label">Payment Option</label>
                 {{-- Checkbox of list --}}
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="payment_option" id="paymentOption1" value="ovo">
                    <label class="form-check-label" for="paymentOption1">
                      Ovo
                    </label>
                  </div>
                  <img src="{{ URL::asset('/img/ovo.png') }}" class="img-thumbnail w-10 h-10" alt="Avatar">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="payment_option" id="paymentOption2" value="dana">
                    <label class="form-check-label" for="paymentOption2">
                      Dana
                    </label>
                  </div>
                  <img src="{{ URL::asset('/img/dana.png') }}" class="img-thumbnail w-10 h-10" alt="Avatar">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="payment_option" id="paymentOption3" value="bank">
                    <label class="form-check-label" for="paymentOption3">
                      Bank
                    </label>
               
                  </div>

                  <img src="{{ URL::asset('/img/bank.png') }}" class="img-thumbnail w-10 h-10" alt="Avatar">
                  @error('payment_option')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
            
                </div>
                <div class="mb-3">
                    <label for="oldPasswordInput" class="form-label">Old Password</label>
                    <input name="old_password" type="password" class="form-control @error('old_password') is-invalid @enderror" id="oldPasswordInput"
                        placeholder="Old Password">
                    @error('old_password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="newPasswordInput" class="form-label">New Password</label>
                    <input name="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror" id="newPasswordInput"
                        placeholder="New Password">
                    @error('new_password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="confirmNewPasswordInput" class="form-label">Confirm New Password</label>
                    <input name="new_password_confirmation" type="password" class="form-control" id="confirmNewPasswordInput"
                        placeholder="Confirm New Password">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    
</div>
@endsection
