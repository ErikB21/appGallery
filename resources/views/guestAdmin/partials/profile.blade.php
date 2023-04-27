<div class="container-fluid d-flex justify-content-end flex-column px-4 m-0 eb_cont">
    <div class="row">
        <div class="col-12 d-flex justify-content-between">
            <div class="d-flex">
                <div class="eb_square">
                    @if (Auth::user()->profile_pic) 
                        <img src="{{ asset('storage/' .  Auth::user()->profile_pic) }}"/>
                    @else
                        <img src="{{asset('images/avatar.png')}}">   
                    @endif
                </div>

                <div class="ps-3 ms-3 eb_txt">
                    <h1 class="text-light">{{Auth::user()->name}} {{Auth::user()->surname}}</h1>
                    <span class="text-light"><span class="font-weight-bold">Mail:</span> {{Auth::user()->email}}</span>
                </div>
            </div>
            <div class="ms-4">
                {{-- @if (Auth::check())
                    <div class="notification d-lg-block d-none">
                        <p class="fw-bold">Welcome back, {{ Auth::user()->name }} 👋</p>
                        <span class="notification__progress"></span>
                    </div>
                @endif --}}
                    
                @if(session('success'))
                    <div class="container">
                        <div class="alert alert-success">
                            <i class="fa-solid  fa-circle-check"></i> {{ session('success') }} 
                        </div>
                    </div>
                @endif
                <span>
                    @if(session()->has('message'))
                        <x-alert-info>{{ session()->get('message') }}</x-alert-info>
                    @endif
                </span>
            </div>
        </div>
        <div class="col-12 d-flex justify-content-between align-items-center px-5">
            <a href="{{route('guestAdmin.edit', Auth::user())}}" class="btn eb_btn">Modifica Profilo</a>
            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex justify-content-between align-items-center flex-column px-3">
                    <span class="fw-bold fs_eb">{{ count(Auth::user()->albums) }}</span>
                    <p><i class="bi bi-journal-album pe-1 fs-5"></i>{{ count(Auth::user()->albums) === 1 ? 'Album' : 'Albums'}}</p>
                </div>
                <div class="d-flex justify-content-between align-items-center flex-column px-3">
                    <span class="fs_eb fw-bold">{{ count(Auth::user()->categories) }}</span>
                    <p><i class="bi bi-tag pe-1 fs-5"></i>{{ count(Auth::user()->categories) === 1 ? 'Categoria' : 'Categorie'}}</p>
                </div>
            </div>
        </div>
    </div>
</div>

<style>

    .eb_cont{
        padding: 120px 0 0 0;
        background: rgb(32,37,41);
        background: linear-gradient(175deg, rgba(32,37,41,1) 50%, rgba(246,247,248,1) 50%);

    }
    .eb_square{
        width: 250px;
        height: 250px;
        outline: 5px solid white;
    }

    .eb_square img{
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .eb_btn{
        background-color: #0A4067;
        color: whitesmoke;
    }
    .eb_btn:hover{
        background-color: white;
        border-color: #0A4067;
        color: #0A4067;
    }

    .fs_eb{
        font-size: 1.8rem;
    }


    /* POPUP

    .notification{
        width: max-content;
        padding: 20px 15px;
        border-radius: 4px;
        background-color: #ff0057;
        color: #f6f5f9;
        box-shadow: 0 1px 10px rgba(0, 0, 0, 0.1);
        transform: translateY(30px);
        visibility: hidden;
        animation: fade-in 4s linear forwards;
        position: relative;
    }

    .notification__progress{
        position: absolute;
        left: 5px;
        bottom: 5px;
        width: calc(100% - 10px);
        height: 3px;
        transform: scaleX(0);
        transform-origin: left;
        background-image: linear-gradient(to right, #333, #fff);
        border-radius: inherit;
        animation: load 3s 0.25s linear forwards;
    }

    @keyframes fade-in{
        5%{
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }
        90% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes load {
        to {
            transform: scaleX(1);
        }
    } */
</style>