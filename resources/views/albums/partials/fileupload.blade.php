<div class="my-5">
    <label for="album_thumb" class="form-label">
        <h4>Thumbnail</h4>
    </label>
    <input type="file" class="form-control" name="album_thumb" id="album_thumb" value="{{$album->album_name}}">
</div>

@if($album->album_thumb)
    <div class="my-5 d-flex justify-content-center">
        <img width="400" src="{{asset($album->path)}}" alt="{{$album->name}}" title="{{$album->name}}">
    </div>
@endif