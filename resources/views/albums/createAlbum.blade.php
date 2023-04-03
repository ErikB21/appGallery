@extends('templates.default')

@section('content')
<div class="container my-5">
    
    <h1 class="my-4 fw-bold text-center">NEW ALBUM</h1>

    @include('albums.partials.inputErrors')

    <div class="d-flex justify-content-between align-items-center">
        <form class="my-4 pt-5" style="width: 50%;" action="{{route('albums.store')}}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="my-4 form-group">
                <label for="album_name" class="form-label">
                    <h4>Name</h4>
                </label>
                <input type="text" class="form-control" placeholder="Album Name" id="album_name" name="album_name" value="{{ old('album_name') }}">
            </div>

            @include('albums.partials.fileupload')

            @include('albums.partials.categoryCombo')
            
            <div class="my-4 form-group">
                <label for="description" class="form-label">
                    <h4>Description</h4>
                </label>
                <textarea class="form-control" id="description" name="description" placeholder="Album Description">
                    {{ old('description') }}
                </textarea>
            </div>
            <div class="form-group my-4">
                <button type="submit" class="btn btn-primary">Send</button>
            </div>
        </form>
        <div>
            <img width="300" src="{{ asset('img/albums.png') }}" alt="">
        </div>
    </div>
</div>
@endsection