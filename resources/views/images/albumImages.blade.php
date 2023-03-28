@extends('templates.default')
@section('content')

    <h1 class="text-center my-5">Images</h1>

    @if (session()->has('message'))
        <x-alert-info>{{ session()->get('message') }}</x-alert-info>
    @endif
    <div class="container d-flex justify-content-between flex-wrap">
        @forelse($images as $image)
            <div class="card my-2" style="width: 18rem;">
                <img width="120" src="{{asset($image->path)}}" class="card-img-top">
                <div class="card-body">
                    <p class="card-title">Image: <strong>{{ $image->name }}</strong></p>
                    <p class="card-text">Album: <strong>{{ $album->album_name }}</strong></p>
                    <p class="card-text">Id: <strong>{{ $image->id }}</strong></p>
                    <a class="btn btn-danger" href="{{ route('photos.destroy', $image) }}">Delete</a>
                    <a href="{{ route('photos.edit', $image) }}" class="btn btn-primary">Update</a>
                </div>
            </div>
        @empty
            <h2 class="h1 fw-bold">No images found</h2>
        @endforelse
    </div>
    <div class="mt-4 container">
        {{ $images->links('pagination::bootstrap-5') }}
    </div>
@endsection

@section('footer')
    @parent
    <script>
        $('document').ready(function () {
            $('div.alert-info').fadeOut(4000)//uso per eliminare dopo 4 secondi l'alert dell'aggiornamento
            $('div.card-body').on('click', 'a.btn-danger', function (ele) {
                ele.preventDefault();
                var urlImage = $(this).attr('href');
                // we add another parentNode because of the div
                var cards = ele.target.parentNode.parentNode;
                $.ajax(
                    urlImage,
                    {
                        method: 'DELETE',
                        data: {
                            _token: "{{csrf_token()}}"
                        },
                        complete: function (resp) {
                            console.log(resp);
                            if (resp.responseText == 1) {
                                cards.parentNode.removeChild(cards);
                            }
                        }
                    }
                )
            });
        });
    </script>
@endsection