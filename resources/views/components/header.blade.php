<header>
    <!-- Fixed navbar -->
    <nav class="navbar border-bottom border-secondary border-bottom-1 navbar-expand-lg navbar-dark fixed-top bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('gallery.index') }}">GALLERY</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                @auth
                    <ul class="navbar-nav mx-auto mb-2 mb-md-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{ route('dashboard') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('albums.index')}}">Albums</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('albums.create')}}">Nuovo Album</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('photos.create')}}">Nuova Immagine</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('categories.index')}}">Categorie</a>
                        </li>
                        @if(Auth::user()->user_role === 'admin')
                            <li>
                                <a class="nav-link" href="{{ route('users.index') }}">Admin</a>
                            </li>
                        @endif
                    </ul>
                @endauth
                @guest
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a class="nav-link" href="{{route('login')}}">Login</a>
                        </li>
                        <li>
                            <a class="nav-link" href="{{route('register')}}">Register</a>
                        </li>
                    </ul>
                @endguest
                @auth
                    <div class="dropdown">
                        <div style="width:50px; height:50px;" class="d-inline-block">
                            @if (Auth::user()->profile_pic) 
                                <img style="width:50px; height:50px; object-fit:cover;" class="rounded-circle" src="{{ asset('storage/' .  Auth::user()->profile_pic) }}"/>
                            @else
                                <img style="width:50px; height:50px; object-fit:cover;" class="rounded-circle" src="{{asset('images/avatar.png')}}">   
                            @endif
                        </div>
                        <a class="btn btn-default text-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                        data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuLink">
                            <li>
                                <form id="logout-form" action="{{ route('logout')}}" method="POST" class="d-flex mb-0 justify-content-start align-items-center">
                                    {{ csrf_field() }}
                                    <button class="btn btn_hover text-secondary">Logout</button>
                                </form>
                            </li>
                            <li>
                                <form class="d-flex mb-0 justify-content-start align-items-center" action="{{route('guestAdmin.destroy', Auth::user()->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn_hover text-secondary">Elimina Profilo</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @endauth
            </div>
        </div>
    </nav>
</header>

<style>
    .nav-link:hover, .btn_hover:hover{
        color: #ff0057!important;
    }
</style>