@extends('templates\default')

@section('content')
    <div class="container">
        <div class="row">
            @foreach ($albums as $album)
                <div class="col-6 col-lg-4 col-xl-3">
                    <div class="card m-2" style="height: 500px;">
                        <a href="{{ route('gallery.album.images', $album->id) }}">
                            @if($album->album_thumb)
                                <img style="width: 100%; height: 170px;"  class="card-img-top img-fluid rounded" src="{{asset($album->path)}}" alt="{{$album->name}}" title="{{$album->name}}">
                            @endif
                        </a>
                        <div class="card-body">
                            <a class="nav-link" href="{{ route('gallery.album.images', $album->id) }}">
                                <h3 class="card-title">{{$album->album_name}}</h3>
                            </a> 
                            <p class="card-text">{{ $album->created_at->diffForHumans() }}</p>
                            <p style="height: 110px;" class="card-text">{{ $album->description }}</p>
                            <div class="my-4">
                                @foreach ($album->categories as $cat )
                                @if ($cat->id !== $category_id)
                                    <a class="text-decoration-none" href="{{ route('gallery.categories.albums', $cat->id) }}">
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
                            </div>
                            <span class="card-text">Creato da <strong>{{ $album->user->name }}</strong></span>
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