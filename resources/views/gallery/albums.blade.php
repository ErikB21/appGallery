@extends('templates.default')


@section('content')
    @include('gallery.partials.homeJumbotron')
    <div class="container-fluid px-3 pt-5 bg-dark">
        <div class="row mx-1">
            <h2 class="eb_color text-center py-4">Album In Evidenza</h2>
            @foreach ($albums as $album)
                <div class="col-12 col-md-6 col-lg-4 pb-4 m-auto d-flex justify-content-center justify-content-md-evenly">
                    <div class="box">
                        <div class="body">
                            <div class="imgContainer">
                                <a href="{{ route('gallery.album.images', $album->id) }}">
                                    @if($album->album_thumb)
                                        <img class="img_flip" src="{{asset($album->path)}}" alt="{{$album->name}}" title="{{$album->name}}">
                                    @endif
                                </a>
                            </div>
                            <div class="content d-flex flex-column align-items-center justify-content-center">
                                <div>
                                    <a style="height: 40px;" class="nav-link" href="{{ route('gallery.album.images', $album->id) }}">
                                        <h2 class="card-title text-light">{{$album->album_name}}</h2>
                                    </a>
                                    <p style="height: 20px;" class="card-text">{{ $album->created_at->diffForHumans() }}</p>
                                    <p style="height: 150px;" class="card-text">{{ $album->description }}</p>
                                    <p class="my-2 d-flex justify-content-evenly aling-items-center flex-wrap">
                                        @foreach ($album->categories as $cat )
                                            @if ($cat->id !== $category_id)
                                                <a class="text-decoration-none mx-1" href="{{ route('gallery.categories.albums', $cat->id) }}">
                                                    <span class="badge text-bg-secondary">
                                                        {{ $cat->category_name }}
                                                    </span>
                                                </a>
                                            @else
                                                <span class="badge text-bg-success">
                                                    {{ $cat->category_name }}
                                                </span>
                                            @endif             
                                        @endforeach
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="container-fluid bg-dark py-1">
        <p>{{ $albums->links() }}</p>
    </div>
@endsection

<style>
    .eb_color{
        color: #ff0057;
        font-size: 3rem;
    }
    .box {
        position: relative;
        max-width: 300px;
        max-height: 300px;
        min-width: 300px;
        min-height: 300px;
        margin: 20px;
        transform-style: preserve-3d;
        perspective: 1000px;
        cursor: pointer;
    }

    .box .body {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        transform-style: preserve-3d;
        transition: 0.9s ease;
    }

    .box .body .imgContainer {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        transform-style: preserve-3d;
        border-radius: 25px;
    }

    .box .body .imgContainer img {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 25px;
    }

    .box .body .content {
        position: absolute;
        top: 0;
        left: 0;
        max-width: 300px;
        max-height: 300px;
        min-width: 300px;
        min-height: 300px;
        background: #333;
        backface-visibility: hidden;
        transform-style: preserve-3d;
        transform: rotateY(180deg);
        border-radius: 25px;
    }

    .box:hover .body {
        transform: rotateY(180deg);
    }

    .box .body .content div {
        transform-style: preserve-3d;
        display: flex;
        max-width: 300px;
        max-height: 300px;
        min-width: 300px;
        min-height: 300px;
        margin: 20px;
        padding: 10px;
        border-radius: 25px;
        flex-direction: column;
        background-image: radial-gradient(100% 100% at 100% 0, #5adaff 0, #4D759D 100%);
        transform: translateZ(100px);
    }
</style>