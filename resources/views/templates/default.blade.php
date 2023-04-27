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
    <link href="{{ url('/') }}/css/lightbox.css" rel="stylesheet" />
    <style>
        body {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        .nav-link:hover{
            color: #ff0057;
        }
    </style>
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
</head>
<body class="d-flex flex-column h-100">
    
    @include('components\header')

    <main role="main" class="container-fluid mt-5 px-0">
        @yield('content')
        {{$slot ?? ''}}
    </main><!-- /.container -->
    @section('footer')
        <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
                crossorigin="anonymous"></script>
        <script src="{{ url('/') }}/js/lightbox.js"></script>
    @show
</body>
</html>