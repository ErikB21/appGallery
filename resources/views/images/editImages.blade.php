@extends('templates.default')

@section('content')

@php
    /**
     * * @var $photo App\Models\Photo;
     */
@endphp
<div class="d-flex justify-content-center align-items-center flex-column container border rounded-5 my-5">

    @if($photo->id)
        <h3 class="h2 fw-bold mb-5">Modifica Immagine {{$photo->name}}</h3>
        <form style="width: 60%;" method="post" action="{{route('photos.update',$photo->id)}}" enctype="multipart/form-data">

            @method('PATCH')
            @else
                <h3 class="h2 fw-bold mb-5 mt-4 text-center">Nuova immagine dell'album {{$album->album_name}}</h3>
                <form style="width: 60%;" method="post" action="{{route('photos.store')}}" enctype="multipart/form-data">

                    @endif
                    {{ csrf_field() }}
                    <div class="my-4 form-group">
                        <label for="album_id" class="form-label fw-bold">Album</label>
                        <select name="album_id" id="album_id" class="form-select">
                            <option value="">Seleziona</option>
                            @foreach($albums as $item)
                                <option
                                    {{$item->id === $album->id? 'selected' : ''}} value="{{$item->id}}">{{$item->album_name}}
                                </option>
                            @endforeach
                        </select>

                    </div>

                    <div class="my-4 form-group">
                        <label for="name" class="form-label fw-bold">Nome</label>
                        <input class="form-control" name="name" id="name" value="{{$photo->name}}">
                    </div>
                    <div class="my-4">
                        @include('images.partials.fileupload')
                    </div>

                    <div class="my-4 form-group">
                        <label for='description' class="form-label fw-bold">Descrizione</label>
                        <textarea class='form-control' name='description'
                                  id='description'>{{$photo->description}}</textarea>
                    </div>
                    <div class="my-4 form-group d-flex justify-content-center">
                        <button type="sumbit" class="btn btn-primary">Salva</button>
                    </div>
                </form>
</div>
<div class="container">
    @include('images.partials.inputErrors')
</div>
@endsection