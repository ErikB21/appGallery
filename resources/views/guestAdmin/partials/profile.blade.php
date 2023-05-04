<div class="container-fluid d-flex justify-content-end flex-column px-4 m-0 eb_cont">
    <div class="row">
        <div class="col-12 d-flex justify-content-between flex-column flex-lg-row">
            <div class="d-flex">
                <div class="eb_square">
                    @if (Auth::user()->profile_pic)
                        <img src="{{ asset('storage/' . Auth::user()->profile_pic) }}" />
                    @else
                        <img src="{{ asset('images/avatar.png') }}">
                    @endif
                </div>

                <div class="ps-3 ms-3 eb_txt">
                    <h1 class="text-light">{{ Auth::user()->name }} {{ Auth::user()->surname }}</h1>
                    <span class="text-light"><span class="font-weight-bold">Mail:</span> {{ Auth::user()->email }}</span>
                </div>
            </div>
            <div class="ms-4">
                @if (session('success'))
                    <div>
                        <div class="alert notification">
                            <i class="fa-solid  fa-circle-check"></i> {{ session('success') }}
                        </div>
                    </div>
                @endif
            </div>
        </div>
        <div class="col-12 d-flex justify-content-between align-items-center px-5">
            <a href="{{ route('profile.edit', Auth::user()) }}" class="btn eb_btn">Modifica Profilo</a>
            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex justify-content-between align-items-center flex-column px-3">
                    <span class="fw-bold fs_eb">{{ count(Auth::user()->albums) }}</span>
                    <p>
                        <i class="bi bi-journal-album pe-1 fs-5"></i>{{ count(Auth::user()->albums) === 1 ? 'Album' : 'Albums' }}
                    </p>
                </div>
                <div class="d-flex justify-content-between align-items-center flex-column px-3">
                    <span class="fs_eb fw-bold">{{ count(Auth::user()->categories) }}</span>
                    <p>
                        <i class="bi bi-tag pe-1 fs-5"></i>{{ count(Auth::user()->categories) === 1 ? 'Categoria' : 'Categorie' }}
                    </p>
                </div>
                <div class="d-flex justify-content-between align-items-center flex-column px-3">
                    @foreach (Auth::user()->albums as $album)
                        @if(count(Auth::user()->albums) > 1)
                            <span class="fs_eb fw-bold"><?php echo count($album->photos, COUNT_NORMAL) ?></span>
                            <p><i class="pe-1 bi bi-images"></i>Foto</p>
                        @else
                            <span class="fs_eb fw-bold">{{ count($album->photos) }}</span>
                            <p><i class="pe-1 bi bi-image"></i>Foto</p>
                       @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@section('footer')
    @parent
    <script>
        $('document').ready(function() {
            $('div.alert').fadeOut(5000);
        });
    </script>
@endsection

<style>
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


    /* POPUP */

    .notification {
        background-color: #ff0057;
        color: #f6f5f9;
    }
</style>
