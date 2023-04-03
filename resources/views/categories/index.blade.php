@extends('templates\default')

@section('content')

    @if(session()->has('message'))
        <x-alert-info>{{ session()->get('message') }}</x-alert-info>
    @endif
    <table class="table table-striped table-dark">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Created</th>
                <th>Update</th>
                <th>Albums</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($categories as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td>{{ucWords($category->category_name)}}</td>
                    <td>{{$category->created_at->diffForHumans()}}</td>
                    <td>{{$category->updated_at->diffForHumans()}}</td>
                    <td>{{$category->albums_count}}</td>
                </tr>
            @empty
                <tfoot>
                    <tr>
                        <th colspan="5">
                            No Categories
                        </th>
                    </tr>
                </tfoot>
            @endforelse
        </tbody>
        <tfoot>
            <tr>
                <th colspan="5">
                    <div class="d-flex justify-content-between align-items-center">
                        <a class="btn btn-primary" href="{{ route('categories.create') }}">New Category</a>
                        {{ $categories->links('pagination::bootstrap-5') }}
                    </div>
                </th>
            </tr>
        </tfoot>
    </table>

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
