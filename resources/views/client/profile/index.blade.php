@extends('layouts.app')

@extends('client.layout.header')

@section('content')

<div class="container">
    <div class="row">
        <div class="col">
          {{-- Create Card that contains profile picture --}}
          <div class="card" style="width: 20rem;">
              {{-- flex column center --}}
              <div class="d-flex flex-column align-items-center">
                  {{-- if user have a profile picture show it if no show default profile --}}
                  @auth
                    @if ($user['avatar'])
                        <img src="/avatars/{{$user['avatar']}}" class="card-img-top rounded-circle mt-4 w-75 h-75" alt="Profile">
                    @else
                        <img src="{{URL::asset('/img/profile2.png')}}" class="card-img-top rounded-circle mt-4 w-75 h-75" alt="Profile">
                    @endif
                  @endauth  
                  <h5 class="card-title mt-3">
                    @auth
                      {{ $user['name'] }}
                    @endauth
                  </h5>
              </div>

              <div class="card-body">
                <h5 class="card-title">Member Since: </h5>
                <p class="text-primary card-text">{{ $user['created_at'] }}</p>
                {{-- About Me --}}
                <h5 class="card-title">About Me : </h5>
                <p class="card-text">
                  @auth
                    {{ $user['about_me'] }}
                  @endauth
                </p>
                <div class="d-flex flex-column align-items-cente gap-2">
                  {{-- Message Me --}}
                  @auth
                    @if (Auth::user()->id != $user['id'])
                      <a href="#" class="btn btn-primary">Message Me</a>
                    @endif
                  @endauth
                  {{-- Edit Profile --}}
                  @auth
                    @if (Auth::user()->id == $user['id'])
                      <a href="{{route('client.edit-profile')}}" class="btn btn-secondary">Edit Profile</a>
                    @endif
                  @endauth
                </div>
              </div>
          </div>
        </div>
        <div class="col-8">
          {{-- Card with header the title is collection --}}
          <div class="card">
            <div class="card-header">
              My Works
            </div>
            <div class="card-body">
              <h5 class="card-title text-secondary">No work found, start to upload your illustration/past work now!</h5>
             
            </div>
          </div>
        </div>
      </div>
    
</div>
@endsection
