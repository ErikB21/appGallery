@extends('templates\default')

<style>
    .box {
        position: relative;
        width: 300px;
        height: 300px;
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
}

.box .body .imgContainer img {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.box .body .content {
    position: absolute;
    top: 0;
    left: 0;
    width: 300px;
    height: 300px;
    background: #333;
    backface-visibility: hidden;
    transform-style: preserve-3d;
    transform: rotateY(180deg);
}

.box:hover .body {
    transform: rotateY(180deg);
}

.box .body .content div {
    transform-style: preserve-3d;
    display: flex;
    width: 300px;
    height: 300px;
    margin: 20px;
    padding: 10px;
    flex-direction: column;
    background-image: radial-gradient(100% 100% at 100% 0, #5adaff 0, #4D759D 100%);
    transform: translateZ(100px);
}



</style>



@section('content')
    <div class="container">
        <h1 class="text-center mt-3 mb-5">WorldGallery</h1>
        <div class="row">
            @foreach ($albums as $album)
                <div class="col-xs-12 col-sm-6 col-lg-4 px-1 pb-4 m-auto d-flex justify-content-between">
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
                                    <p style="height: 180px;" class="card-text">{{ $album->description }}</p>
                                    <p style="height: 60px;" class="my-2 d-flex justify-content-evenly flex-wrap">
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
    <div class="container mt-3">
        {{ $albums->links('pagination::bootstrap-5') }}
    </div>
@endsection