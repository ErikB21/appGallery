@extends('templates.default')
@section('content')
    <h1>ALBUMS</h1>

    @if(session()->has('message'))
        <x-alert-info>{{ session()->get('message') }}</x-alert-info>
    @endif

    <table class="table table-striped table-dark albums">
        <thead>
        <tr class="align-middle">
            <th>Album name</th>
            <th>Thumb</th>
            <th>Author</th>
            <th>Date</th>
            <th>Categories</th>
            <th>&nbsp;</th>
        </tr>
        </thead>
        @foreach($albums as $album)
            <tr class="align-middle" id="tr-{{$album->id}}">
                <td>({{$album->id}}) {{$album->album_name}}</td>
                <td>
                    @if($album->album_thumb)
                        <img width="100" src="{{asset($album->path)}}" title="{{$album->album_name}}"
                             alt="{{$album->album_name}}">

                    @endif
                </td>
                <td>{{$album->user->name}}</td>
                <td>{{$album->created_at->diffForHumans()}}</td>
                @foreach ( $album->categories as $cat)
                    <td><span class="badge text-bg-light">{{ Ucwords($cat->category_name) }}</span></td>
                @endforeach
                <td>
                    <div class="row">
                        <div class="col-md-2 mx-1 mx-lg-0 col-lg-3">
                            <a title="Add new image" data-bs-toggle="tooltip" data-bs-title="New Image" href="{{route('photos.create')}}?album_id={{$album->id}}"
                               class="btn btn-primary">
                                <i class="bi bi-plus-circle"></i>
                            </a>
                        </div>
                        <div class="col-md-2 mx-1 mx-lg-0 col-lg-3">
                            @if($album->photos_count)
                                <a title="View images" data-bs-toggle="tooltip" data-bs-title="View Images" href="{{route('albums.images',$album)}}"
                                   class="btn btn-primary">
                                    <i
                                        class="bi bi-zoom-in"></i> ({{$album->photos_count}})</a>
                            @else
                                <a data-bs-toggle="tooltip" data-bs-title="No Images" disabled class="btn btn-primary pe-none"> <i
                                        class="bi bi-zoom-in"></i></a>
                            @endif
                        </div>
                        <div class="col-md-2 mx-1 mx-lg-0 col-lg-3">
                            <a data-bs-toggle="tooltip" data-bs-title="Update Album" href="{{route('albums.edit',$album)}}" class="btn btn-primary"> <i
                                    class="bi bi-pen"></i></a>
                        </div>
                        <div class="col-md-2 mx-1 mx-lg-0 col-lg-3">
                            <form id="form{{$album->id}}" method="POST" action="{{route('albums.destroy',$album)}}"
                                  class="form-inline">
                                @method('DELETE')

                                @csrf
                                <button data-bs-toggle="tooltip" data-bs-title="Delete Album" class="btn btn-danger" id="{{$album->id}}"><i class="bi bi-trash"></i></button>
                            </form>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
        {{-- <tr>
            <td colspan="5">
                <div class="row">
                    <div class="mt-4 container">
                        {{ $albums->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </td>
        </tr> --}}
    </table>

@endsection
@section('footer')
    @parent
    <script>
        $('document').ready(function () {
            const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
            const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
            $('.alert').fadeOut(5000);
            $('table').on('click', 'button.btn-danger', function (ele) {
                ele.preventDefault();
                console.log(ele.target)
                const id = ele.target.id ? ele.target.id : ele.target.parentNode.id;
                alert(id)
                alert('#tr-' + id)
                const tr = $('#tr-' + id);
                console.log(tr)
                const f = $('#form' + id);
                const urlAlbum = f.attr('action');
                $.ajax(
                    urlAlbum,
                    {
                        method: 'DELETE',
                        data: {
                            _token: '{{csrf_token()}}'
                        },
                        complete: function (resp) {
                            console.log(resp);
                            if (resp.responseText == 1) {
                                //   alert(resp.responseText)
                                tr.remove();
                                // $(li).remove();
                            } else {
                                alert('Problem contacting server');
                            }
                        }
                    }
                )
            });
        });
    </script>
@endsection
