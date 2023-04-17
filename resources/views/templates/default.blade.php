<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <script>
        window.Laravel = @json(['csrf_token' => csrf_token()]);
    </script>
    <title>@yield('title', 'AppGallery')</title>
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href="/css/lightbox.css" rel="stylesheet" />
    <style>
        body {
            padding: 70px 15px 0;
        }
    </style>
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
</head>
<body class="d-flex flex-column h-100">

<header>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('gallery.index') }}">GALLERY</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                @auth
                    <ul class="navbar-nav me-auto mb-2 mb-md-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('dashboard') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('albums.index')}}">Albums</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('albums.create')}}">New Album</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('photos.create')}}">New Image</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('categories.index')}}">Categories</a>
                        </li>
                        @if(Auth::user()->user_role === 'admin')
                            <li>
                                <a class="nav-link" href="{{ route('users.index') }}">Admin</a>
                            </li>
                        @endif
                    </ul>
                @endauth
                <ul class="nav navbar-nav navbar-right">
                    @guest
                        <li>
                            <a class="nav-link" href="{{route('login')}}">Login</a>
                        </li>
                        <li>
                            <a class="nav-link" href="{{route('register')}}">Register</a>
                        </li>
                    @endguest
                    @auth
                        <li class="dropdown-center">
                            <a href="#" class="dropdown-toggle me-5 nav-link" data-bs-toggle="dropdown" role="button"
                               aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu dropdown-menu-dark" role="menu">
                                <li>
                                    <form id="logout-form" action="{{ route('logout')}}" method="POST">
                                        {{ csrf_field() }}
                                        <button class="btn btn-default text-light">Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
</header>

<main role="main" class="container-fluid mt-5">
    @yield('content')
    {{$slot ?? ''}}
</main><!-- /.container -->
@section('footer')
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="/js/lightbox.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
            crossorigin="anonymous"></script>
    <script>
        lightbox.option({
            'resizeDuration' : 200,
            'wrapAround' : true,
        })
    </script>
@show
</body>
</html>