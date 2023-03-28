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
                        <p class="card-text">Id: <strong>{{ $album->id }}</strong></p>
                        <div class="d-flex flex-column justify-content-center">
                            <a href="{{route('photos.create')}}?album_id={{ $album->id }}" class="btn btn-primary mt-2">NEW IMAGE</a>
                            @if($album->photos_count)
                                <a href="{{route('albums.images',$album)}}" class="btn btn-success mt-2">VIEW IMAGES
                                    ({{$album->photos_count}})</a>
                            @else
                                <a href="#" disabled class="btn btn-default mt-2">NO IMAGES</a>
                            @endif
                            <div class="d-flex div-body mt-2 justify-content-between">
                                <a href="{{route('albums.edit',$album)}}" class="btn btn-warning">UPDATE</a>
                                <a href="{{route('albums.destroy', $album)}}" class="btn btn-danger">DELETE</a>
                            </div>
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