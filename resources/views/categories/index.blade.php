@extends('templates\default')

@section('content')

    <div class="row align-items-center">
        <div class="col-12 col-lg-8">
            <div class="d-flex align-items-center justify-content-between">
                <h1 class="mb-4 text-center">Categories</h1>
                @if(session()->has('message'))
                    <x-alert-info>{{ session()->get('message') }}</x-alert-info>
                @endif
            </div>
            <table class="table table-stripe table-hover table-dark">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Created</th>
                        <th>Update</th>
                        <th>Albums</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{ucWords($category->category_name)}}</td>
                            <td>{{$category->created_at->diffForHumans()}}</td>
                            <td>{{$category->updated_at->diffForHumans()}}</td>
                            <td>
                                @if ($category->albums_count > 0)
                                    <a class="btn btn-success" data-bs-toggle="tooltip" data-bs-title="Views Albums" class="" href="{{ route('albums.index') }}?category_id={{$category->id}}">{{$category->albums_count}}</a>
                                @else
                                    <a class="btn btn-default text-light" data-bs-toggle="tooltip" data-bs-title="No Albums" href="#">{{$category->albums_count}}</a>
                                @endif
                            </td>
                            <td>
                                <a data-bs-toggle="tooltip" data-bs-title="Update Category" href="{{route('categories.edit',$category)}}" class="btn btn-primary"> <i class="bi bi-pen"></i></a>
                                <form id="form{{$category->id}}" method="POST" action="{{route('categories.destroy',$category)}}"
                                    class="form-inline">
                                    @method('DELETE')

                                    @csrf
                                    <button data-bs-toggle="tooltip" data-bs-title="Delete Category" class="btn btn-danger" id="{{$category->id}}"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tfoot>
                            <tr>
                                <th colspan="6">
                                    No Categories
                                </th>
                            </tr>
                        </tfoot>
                    @endforelse
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="6">
                            <div class="d-flex justify-content-between align-items-center">
                                <a class="btn btn-primary" href="{{ route('categories.create') }}">New Category</a>
                                {{ $categories->links('pagination::bootstrap-5') }}
                            </div>
                        </th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div class="d-none d-lg-block col-lg-4">
            <div class="border rounded-5 d-flex flex-column align-items-center mt-5 py-5">
                <h2 class="mb-5">New Category</h2>
                @include('categories\categoryForm')
            </div>
        </div>
    </div>
    
@endsection

@section('footer')
    @parent
    <script>
        $('document').ready(function () {
            const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
            const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
            $('.alert').fadeOut(5000);
        });
    </script>
@endsection
