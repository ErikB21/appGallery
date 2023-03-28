<div class="my-4">
    <label for="img_path" class="form-label fw-bold">Thumbnail</label>
    <input type="file" class="form-control" name="img_path" id="img_path" value="{{$photo->name}}">
</div>

@if($photo->img_path)
    <div class="my-4 d-flex justify-content-center">
        <img width="300" src="{{asset($photo->path)}}" alt="{{$photo->name}}" title="{{$photo->name}}">
    </div>
@endif