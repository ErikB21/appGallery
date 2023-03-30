@extends('templates.default')

@section('content')

@php
    /**
     * * @var $album App\Models\Album;
     */
@endphp
<div class="container d-flex justify-content-center flex-column align-items-center">
    @include('albums.partials.inputErrors');

    <h1 class="mt-5">EDIT ALBUM <strong class="text-primary">{{$album->album_name}}</strong></h1>

    <form class="mt-5 pt-5" style="width: 60%" action="{{route('albums.update', ['album' =>$album->id])}}" method="POST" enctype="multipart/form-data">
        {{-- {{method_field('PATCH')}} --}}
        @method('PATCH')
        @csrf
        {{-- <input type="hidden" value="PATCH" name="_method" id=""> --}}
        <div class="mb-3 form-group">
            <label for="album_name" class="form-label">
                <h4>Name</h4>
            </label>
            <input type="text" class="form-control" id="album_name" name="album_name" placeholder="Album name" value="{{$album->album_name}}">
        </div>

        @include('albums.partials.fileupload');

        <div class="mb-3 form-group">
            <label for="description" class="form-label">
                <h4>Description</h4>
            </label>
            <textarea placeholder="Album description" class="form-control" id="description" name="description">
                {{$album->description}}
            </textarea>
        </div>
        <div class="form-group mb-3">
            <button type="submit"class="btn btn-primary">Invia</button>
        </div>


    </form>
</div>
@endsection