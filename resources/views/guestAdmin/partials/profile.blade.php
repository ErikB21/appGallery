<div class="container-fluid d-flex flex-column eb_cont position-relative">
    <span class="d-block d-lg-inline eb_pos">
        @if (session('success'))
            <span class="alert notification">
                <i class="fa-solid  fa-circle-check"></i> {{ session('success') }}
            </span>
        @endif
    </span>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 d-flex justify-content-lg-between justify-content-center">
                <div class="eb_display">
                    <div class="eb_square">
                        @if (Auth::user()->profile_pic)
                            <img src="{{ asset('storage/' . Auth::user()->profile_pic) }}" />
                        @else
                            <img src="{{ asset('images/avatar.png') }}">
                        @endif
                    </div>

                    <div class="eb_txt">
                        <h1 class="">{{ Auth::user()->name }} {{ Auth::user()->surname }}</h1>
                        <span class=""><span class="m-0 font-weight-bold">Mail:</span> {{ Auth::user()->email }}</span>
                    </div>
                </div>
            </div>
            <div class="col-12 d-flex justify-content-sm-between justify-content-center align-items-center flex-column flex-sm-row pt-3 pt-lg-0 pb-3 pb-lg-0">
                <a href="{{ route('profile.edit', Auth::user()) }}" class="btn eb_btn">Modifica Profilo</a>
                <div class="d-none d-sm-flex justify-content-between align-items-center ">
                    <div class="d-flex justify-content-between align-items-center flex-column me-3">
                        <span class="fw-bold fs_eb">{{ count(Auth::user()->albums) }}</span>
                        <p>
                            <i class="bi bi-journal-album me-1 fs-5"></i>{{ count(Auth::user()->albums) === 1 ? 'Album' : 'Albums' }}
                        </p>
                    </div>
                    <div class="d-flex justify-content-between align-items-center flex-column ms-3">
                        <span class="fs_eb fw-bold">{{ count(Auth::user()->categories) }}</span>
                        <p>
                            <i class="bi bi-tag me-1 fs-5"></i>{{ count(Auth::user()->categories) === 1 ? 'Categoria' : 'Categorie' }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>

@section('footer')
    @parent
    <script>
        $('document').ready(function() {
            $('span.alert').fadeOut(5000);
        });
    </script>
@endsection

<style>

    .eb_pos{
        position: absolute;
        bottom: 0;
        right: 0;
        z-index: 4;
    }

    .eb_display{
        display: flex;
        flex-direction: row;
        justify-content:center;
    }
    .eb_cont {
        padding: 120px 0 0 0;
        background: rgb(32, 37, 41);
        background: linear-gradient(175deg, rgba(32, 37, 41, 1) 50%, rgba(246, 247, 248, 1) 50%);

    }

    .eb_square {
        width: 250px;
        height: 250px;
        outline: 5px solid white;
    }

    .eb_square img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .eb_btn {
        background-color: #ff0057;
        color: whitesmoke;
    }

    .eb_btn:hover {
        background-color: white;
        border-color: #ff0057;
        color: #ff0057;
    }

    .fs_eb {
        font-size: 1.8rem;
    }

    .eb_txt h1, .eb_txt span{
        color: white;
        margin: 0 0 0 25px;
    }

    @media screen and (max-width:660px){

        .eb_display{
            flex-direction: column;
        }
       .eb_txt h1, .eb_txt span{
            color: rgb(32, 37, 41);;
            margin: 25px 0 0 0;
        } 
    }


    /* POPUP */

    .notification {
        background-color: #ff0057;
        color: #f6f5f9;
    }
</style>
