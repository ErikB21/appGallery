@extends('templates\default')

@section('content')

    <h1 class="text-center mb-5">{{ $category->category_name ? 'Modify category' : 'New category' }}</h1>
    @include('categories.partials.inputErrors')
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-auto">
                @include('categories\categoryForm')
            </div>
        </div>
    </div>

@endsection