@extends('templates\default')

@section('content')
    <div class="container">
        <div class="row">
            @foreach ($albums as $album)
                <div class="col-6 col-lg-4 col-xl-3">
                    <div class="card m-2">
                        <a href="{{ route('gallery.album.images', $album->id) }}">
                            @if($album->album_thumb)
                                <img class="card-img-top img-fluid rounded" src="{{asset($album->path)}}" alt="{{$album->name}}" title="{{$album->name}}">
                            @endif
                        </a>
                        <div class="card-body">
                            <a class="nav-link" href="{{ route('gallery.album.images', $album->id) }}">
                                <h3 class="card-title">{{$album->album_name}}</h3>
                            </a> 
                            <h5 class="card-subtitle muted">Id: <strong>{{ $album->id }}</strong></h5>
                            <p class="card-text">{{ $album->created_at->diffForHumans() }}</p>
                            <p style="height: 80px;" class="card-text">{{ $album->description }}</p>
                            <p class="card-text">Creato da <strong>{{ $album->user->name }}</strong></p>
                        </div>
                    </div>
                </div>
            @endforeach 
        </div>
    </div>
@endsection