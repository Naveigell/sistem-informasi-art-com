<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    {{-- Font awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    {{-- Bootstrap --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    {{-- Custom styles --}}
    <link rel="stylesheet" href="">
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.2/dist/sweetalert2.min.css" integrity="sha256-ZCK10swXv9CN059AmZf9UzWpJS34XvilDMJ79K+WOgc=" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

</head>
<body class="bg">
    <nav class="navbar navbar-expand-md navbar bg-dark border-bottom border-body sticky-top shadow-sm">
        <div class="container-fluid pe-5">
            <a class="navbar-brand" href="{{ url('/') }}">
                <h1 class="text-white mb-0 p-0 title  ">ARTCOM</h1>
                <p class="text-white m-0 p-0 title  ">A Marketplace to connects artists and clients.</p>
            </a>
            <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon "></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">
                    {{-- Navbar menu  --}}

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link btn btn-green rounded-pill text-white fw-bolder px-4" href="{{ url('/welcome') }}">{{ __('Connect') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-white h5" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <i class="fa fa-user"></i> <b>{{ Auth::user()->name }}</b>
                            </a>


                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                @auth
                                    @if(Auth::user()->role=="admin")
                                        <a href="/admin/dashboard" class="dropdown-item">
                                            <span class="">Dashboard</span>
                                        </a>
                                    @elseif (Auth::user()->role=="artist")
                                        <a href="/artist/dashboard" class="dropdown-item">
                                            <span class="">Dashboard</span>
                                        </a>
                                        <a href="/artist/profile/{{Auth::user()->id}}" class="dropdown-item">
                                            <span class="">View Profile</span>
                                        </a>
                                        <a href="/artist/edit-profile" class="dropdown-item">
                                            <span class="">Edit Profile</span>
                                        </a>
                                    @elseif (Auth::user()->role=="client")
                                        <a href="/client/dashboard" class="dropdown-item">
                                            <span class="">Dashboard</span>
                                        </a>
                                        <a href="/client/profile/{{Auth::user()->id}}" class="dropdown-item">
                                            <span class="">View Profile</span>
                                        </a>
                                        <a href="/client/edit-profile" class="dropdown-item">
                                            <span class="">Edit Profile</span>
                                        </a>
                                    @endif
                                @endauth
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
</nav>
    <div id="app">
        <div class="text-left p-3">
        </div>
        <main class="py-5 align-middle mt-4">
            @yield('content')
        </main>
    </div>
    <footer class="footer py-2 fixed-bottom bg-dark d-flex flex-wrap justify-content-between align-items-center">
        <ul class="d-flex m-0 ">
            <li class="ms-3"><a class= "text-decoration-none text-light" aria-current="page" href="#">Help</a></li>
            <li class="ms-3"><a class= "text-decoration-none text-light" href="#">About</a></li>
        </ul>
    </footer>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.slim.js"></script>
<script>
    $(window).scroll(function() {
    if ($(window).scrollTop() >= 50) {
        $('.navbar').css('background', 'grey');
    } else {
        $('.navbar').css('background', 'transparent');
    }
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.2/dist/sweetalert2.all.min.js" integrity="sha256-iSkyJ41luwYhZX4JnDUop92wix0y8SBGAW5tCnnCfZ4=" crossorigin="anonymous"></script>
@include('sweetalert::alert')
@stack('script')
</html>
