@extends('templates.default')

@section('content')

    @include('categories.partials.inputErrors')
    <div class="container mt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-auto">
                @include('categories\categoryForm')
            </div>
        </div>
    </div>

@endsection