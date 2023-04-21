@extends('templates\default')

@section('content')
    <div class="container">
        <div class="row">
            @forelse ($images as $image)
                <div class="col-6 col-lg-4 col-xl-3">
                    <div class="card m-2">
                        <a href="{{asset($image->img_path)}}" data-lightbox="{{ $album->album_name }}" data-title="{{ $image->name }}" >
                            @if($image->img_path)
                                <img class="card-img-top img-fluid rounded" src="{{asset($image->img_path)}}" alt="{{$image->name}}" title="{{$image->name}}">
                            @endif
                        </a>
                        <div class="card-body">
                            <h4 style="height: 100px" class="card-title">{{ $image->name }}</h4>
                            <p style="height: 100px" class="card-text">{{ $image->description }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="container-fluid d-flex justify-content-center align-items-center">
                    <h1>No Image Found</h1>
                </div>
            @endforelse 
        </div>
        <div class="row">
            <div class="mt-4">
                {{ $images->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @parent
    <script>
        lightbox.option({
        'maxWidth': 200,
        'maxHeight': 200
        })
    </script>
@endsection