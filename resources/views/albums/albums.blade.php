@extends('templates.default')
@section('content')
    <h1 class="text-center my-5">ALBUMS</h1>
    @if (session()->has('message'))
        <x-alert-info>{{ session()->get('message') }}</x-alert-info>
    @endif
    <div class="container">
        <form class=" d-flex justify-content-between flex-wrap">
            <input id="_token" type="hidden" name="_token" value="{{csrf_token()}}">
            @foreach($albums as $album)
                <div class="card my-2" style="width: 18rem;">
                    @if($album->album_thumb)
                        <img class="card-img-top" width="120" src="{{asset($album->path)}}" alt="{{$album->name}}" title="{{$album->name}}">
                    @endif
                    <div class="card-body">
                        <h3 class="card-title">{{$album->album_name}}</h3>
                        <h5 class="card-subtitle muted">Id: <strong>{{ $album->id }}</strong></h5>
                        <p class="card-text">{{ $album->created_at->diffForHumans() }}</p>
                        <p class="card-text">{{ $album->description }}</p>
                        <div class="d-flex justify-content-between div-body">
                            <a href="{{route('photos.create')}}?album_id={{ $album->id }}" data-bs-toggle="tooltip" data-bs-title="New Image" class="btn btn-primary mt-2"><i class="bi bi-plus-circle"></i></a>
                            <a href="{{route('albums.images',$album)}}" data-bs-toggle="tooltip" data-bs-title="View Album's Image" class="btn btn-success mt-2"><i class="bi bi-eye"></i> ({{$album->photos_count}})</a>
                            <a href="{{route('albums.edit',$album)}}" data-bs-toggle="tooltip" data-bs-title="Update Album" class="btn btn-warning mt-2"><i class="bi bi-recycle"></i></a>
                            <a href="{{route('albums.destroy', $album)}}" data-bs-toggle="tooltip" data-bs-title="Delete Album" class="btn btn-danger mt-2"><i class="bi bi-trash3"></i></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </form>
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
            $('div.div-body').on('click', 'a.btn-danger', function (ele) {
                ele.preventDefault();
                var urlAlbum = $(this).attr('href');
                // we add another parentNode because of the div
                var cards = ele.target.parentNode.parentNode.parentNode.parentNode;
                $.ajax(
                    urlAlbum,
                    {
                        method: 'DELETE',
                        data: {
                            _token: $('#_token').val()
                        },
                        complete: function (resp) {
                            console.log(resp);
                            if (resp.responseText == 1) {
                                //   alert(resp.responseText)
                                cards.parentNode.removeChild(cards);
                                // $(li).remove();
                            }
                        }
                    }
                )
            });
        });
    </script>
@endsection