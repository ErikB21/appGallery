@extends('templates.default')
@section('content')
    <h1 class="text-center my-5">ALBUMS</h1>
    @if (session()->has('message'))
        <x-alert-info>{{ session()->get('message') }}</x-alert-info>
    @endif
    <div class="container">
        <div class=" d-flex justify-content-between flex-wrap">
            @foreach($albums as $album)
                <div id="div{{ $album->id }}" class="card my-2" style="width: 18rem;">
                    @if($album->album_thumb)
                        <img class="card-img-top" width="120" src="{{asset($album->path)}}" alt="{{$album->name}}" title="{{$album->name}}">
                    @endif
                    <div class="card-body d-flex flex-column">
                        <h3 class="card-title">{{$album->album_name}}</h3>
                        <h5 class="card-subtitle muted">Id: <strong>{{ $album->id }}</strong></h5>
                        <p class="card-text">{{ $album->created_at->diffForHumans() }}</p>
                        <p style="height: 80px;" class="card-text">{{ $album->description }}</p>
                        <div class="row div-body">
                            <div class="col-3">
                                <a href="{{route('photos.create')}}?album_id={{ $album->id }}" data-bs-toggle="tooltip" data-bs-title="New Image" class="btn btn-primary mt-2"><i class="bi bi-plus-circle"></i></a>
                            </div>
                            <div class="col-3">
                                <a href="{{route('albums.images',$album)}}" data-bs-toggle="tooltip" data-bs-title="View Album's Image" class="btn d-flex justify-content-center btn-success mt-2"><i class="bi bi-eye"></i>({{$album->photos_count}})</a>
                            </div>
                            <div class="col-3">
                                <a href="{{route('albums.edit',$album)}}" data-bs-toggle="tooltip" data-bs-title="Update Album" class="btn btn-warning mt-2"><i class="bi bi-recycle"></i></a>
                            </div>
                            <div class="col-3">
                                <form id="form{{ $album->id }}" class="div-btn" method="POST" action="{{route('albums.destroy', $album)}}">
                                    @csrf
                                    @method('DELETE')
                                    <button id="{{ $album->id }}" href="" data-bs-toggle="tooltip" data-bs-title="Delete Album" class="btn btn-danger mt-2"><i class="bi bi-trash3"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="mt-4 container">
        {{ $albums->links('pagination::bootstrap-5') }}
    </div>
@endsection
@section('footer')
    @parent
    <script>
        $('document').ready(function () {
            const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
            const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
            $('div.alert-info').fadeOut(4000)//uso per eliminare dopo 4 secondi l'alert dell'aggiornamento
            $('form.div-btn').on('click', 'button.btn-danger', function (evt) {
                evt.preventDefault();
                let id = evt.target.id;
                let form = $('#form' + id)
                var urlAlbum = form.attr('action');
                // we add another parentNode because of the div
                var cards = $('#div' + id);
                $.ajax(
                    urlAlbum,
                    {
                        method: 'DELETE',
                        data: {
                            _token: '{{ csrf_token()}}'
                        },
                        complete: function (resp) {
                            console.log(resp);
                            if (resp.responseText == 1) {
                                //   alert(resp.responseText)
                                cards.remove();
                                // $(li).remove();
                            }
                        }
                    }
                )
            });
        });
    </script>
@endsection