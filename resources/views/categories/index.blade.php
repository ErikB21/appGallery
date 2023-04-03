@extends('templates\default')

@section('content')


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
                
            @endforelse
        </tbody>
    </table>









@endsection