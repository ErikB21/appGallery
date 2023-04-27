<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <title>Dashboard - SB Admin</title>
    <link href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet"/>
    <link href="{{url('/')}}/css/styles.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
            crossorigin="anonymous"></script>
    <script>
        window.Laravel = @json(['csrf_token' => csrf_token(), 'csrfToken' => csrf_token()]);
    </script>
</head>
<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.html">LARAGALLERY ADMIN</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="bi bi-list"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..."
                    aria-describedby="btnNavbarSearch"/>
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="bi bi-search"></i></button>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4 px-3">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <div style="width:45px; height:45px;" class="d-inline-block">
                        @if (Auth::user()->profile_pic) 
                            <img style="width:45px; height:45px; object-fit:cover;" class="rounded-circle" src="{{ asset('storage/' .  Auth::user()->profile_pic) }}"/>
                        @else
                            <img style="width:45px; height:45px; object-fit:cover;" class="rounded-circle" src="{{asset('images/avatar.png')}}">   
                        @endif
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-start dropdown-menu-dark" aria-labelledby="navbarDropdown">
                    <li class="d-flex justify-content-center">
                        <form id="logout-form" action="{{ route('logout')}}" method="POST">
                            {{ csrf_field() }}
                            <button class="btn btn-default text-light">Logout</button>
                        </form>    
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="{{ route('users.index') }}">
                            <div class="sb-nav-link-icon"><i class="bi bi-speedometer2 pe-2"></i></div>
                            Dashboard
                        </a>
                        <a class="nav-link" href="{{ route('dashboard') }}">
                            <div class="sb-nav-link-icon"><i class="bi bi-bar-chart pe-2"></i></div>
                            AppGallery
                        </a>
                        <div class="sb-sidenav-menu-heading">Interface</div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="bi bi-columns pe-2"></i></div>
                            Users
                            <div class="sb-sidenav-collapse-arrow"><i class="bi bi-caret-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{route('users.show', Auth::user())}}"><i
                                        class="bi bi-people-fill pe-2"></i> Users list</a>
                                <a class="nav-link" href="{{route('users.create')}}"><i
                                        class="bi bi-person-plus-fill pe-2"></i> New user</a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages"
                        aria-expanded="false" aria-controls="collapsePages">
                        <div class="sb-nav-link-icon"><i class="bi bi-images pe-2"></i></div>
                        Gallery
                        <div class="sb-sidenav-collapse-arrow"><i class="bi bi-caret-down"></i></div>
                    </a>
                    <div class="collapse" id="collapsePages" aria-labelledby="headingTwo"
                        data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                            <a href="{{ route('albums.index') }}" class="nav-link">
                                <i class="bi bi-book pe-2"></i>
                                Album
                            </a>
                            <a href="{{ route('albums.create') }}" class="nav-link">
                                <i class="bi bi-plus-circle pe-2"></i>
                                Nuovo Album
                            </a>
                            <a href="{{ route('photos.create') }}" class="nav-link">
                                <i class="bi bi-image pe-2"></i>
                                Nuova Immagine
                            </a>
                            <a href="{{ route('categories.index') }}" class="nav-link">
                                <i class="bi bi-tag pe-2"></i>
                                Categorie
                            </a>
                        </nav>
                    </div>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small pb-1">Logged in as:</div>
                    <div style="width:45px; height:45px;" class="d-inline-block">
                        @if (Auth::user()->profile_pic) 
                            <img style="width:45px; height:45px; object-fit:cover;" class="rounded-circle" src="{{ asset('storage/' .  Auth::user()->profile_pic) }}"/>
                        @else
                            <img style="width:45px; height:45px; object-fit:cover;" class="rounded-circle" src="{{asset('images/avatar.png')}}">   
                        @endif
                    </div>
                    {{ Auth::user()->name }} {{ Auth::user()->surname }}
                </div>
            </nav>
        </div>
        
    
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4 my-5">
                @yield('content')
            </div>
        </main>
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; Your Website 2021</div>
                    <div>
                        <a href="#">Privacy Policy</a>
                        &middot;
                        <a href="#">Terms &amp; Conditions</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>
@section('footer')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            crossorigin="anonymous"></script>
    <script src="{{/js/scripts.js"></script>

    <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    @show
</body>
</html>