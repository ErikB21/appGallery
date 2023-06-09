@extends('templates.default')
@section('content')
    <div class="container-fluid mt-5">
        <div class="d-flex justify-content-between align-items-center">
            <h1>ALBUMS</h1>
            @if(session('success'))
                <span class="ms-2">
                    <div class="alert alert-success">
                        <i class="fa-solid  fa-circle-check"></i> {{ session('success') }} 
                    </div>
                </span>
            @endif
        </div>
        
        <div class="table-responsive">
            <table class="table table-striped table-dark albums mt-5">
                <thead>
                <tr class="align-middle">
                    <th>Album</th>
                    <th>Immagine</th>
                    <th>Data</th>
                    <th>Categorie</th>
                    <th>&nbsp;</th><!-- rappresenta uno spazio bianco-->
                    <th>&nbsp;</th><!-- rappresenta uno spazio bianco-->
                </tr>
                </thead>
                <tbody>
                    @forelse($albums as $album)
                        <tr class="align-middle" id="tr-{{$album->id}}">
                            <td title="Id: {{$album->id}}">{{$album->album_name}}</td>
                            <td style="width:150px; height: 150px;">
                                @if($album->album_thumb)
                                    <img style="object-fit: cover; width:100%;" class="rounded-2" title="Creato da {{ $album->user->name }}" src="{{asset($album->path)}}" title="{{$album->album_name}}"
                                        alt="{{$album->album_name}}">

                                @endif
                            </td>
                            <td>{{$album->created_at->diffForHumans()}}</td>
                            <td>
                                @foreach ( $album->categories as $cat)
                                    <span class="badge text-bg-light">{{ Ucwords($cat->category_name) }}</span>
                                @endforeach
                            </td>
                            <td>
                                <div class="row">
                                    <div class="col-md-3 mx-2 mx-lg-0 col-lg-6">
                                        <a title="Add new image" title="New Image" href="{{route('photos.create')}}?album_id={{$album->id}}"
                                        class="btn btn-primary">
                                            <i class="bi bi-plus-circle"></i>
                                        </a>
                                    </div>
                                    <div class="col-md-3 mx-2 mx-lg-0 col-lg-6">
                                        @if($album->photos_count)
                                            <a title="View images" title="View Images ({{ $album->photos_count }})" href="{{route('albums.images',$album)}}" class="btn btn-primary">
                                                <span class="d-flex">
                                                    <i class="bi bi-zoom-in"></i>
                                                    ({{$album->photos_count}})
                                                </span>
                                            </a>
                                        @else
                                            <a title="No Images" disabled class="btn btn-primary pe-none"> 
                                                <i class="bi bi-zoom-in"></i>
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="row">
                                    <div class="col-md-3 mx-2 mx-lg-0 col-lg-4">
                                        <a title="Update Album" href="{{route('albums.edit',$album)}}" class="btn btn-primary"> <i
                                                class="bi bi-pen"></i></a>
                                    </div>
                                    <div class="col-md-3 mx-2 mx-lg-0 col-lg-4">
                                        <form id="form{{$album->id}}" method="POST" action="{{route('albums.destroy',$album)}}"
                                            class="form-inline">
                                            @method('DELETE')

                                            @csrf
                                            <button title="Delete Album" class="btn btn-danger" id="{{$album->id}}"><i class="bi bi-trash"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tfoot>
                            <tr>
                                <th colspan="6">
                                    Nessun Album
                                </th>
                            </tr>
                        </tfoot>
                    @endforelse
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="6">
                            {{ $albums->links('pagination::bootstrap-5') }}
                        </th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div class="container d-flex justify-content-center align-items-center">
            <div class="mb-5">
                <a href="{{ route('albums.create') }}" class="btn btn-primary">Nuovo Album</a>
            </div>
        </div>
    </div>

@endsection
@section('footer')
    @parent
    <script>
        $('document').ready(function () {
            // const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
            // const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
            $('div.alert').fadeOut(5000);
            $('table').on('click', 'button.btn-danger', function (ele) {
                ele.preventDefault();
                console.log(ele.target)
                const id = ele.target.id ? ele.target.id : ele.target.parentNode.id;
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
