@extends('templates.admin')



@section('content')
    <h1>Users List</h1>
    <table class="table table-striped table-light data-table">
        <thead>
            <tr>
                <th>NAME</th>
                <th>EMAIL</th>
                <th>ROLE</th>
                <th>CREATED</th>
                <th>DELETED</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ ucWords($user->user_role) }}</td>
                    <td>{{ $user->created_at->diffForHumans() }}</td>
                    <td>{{ $user->deleted_at?$user->deleted_at->diffForHumans():'' }}</td>
                    <td>
                        <div class="row">
                            <div class="col-sm-4">
                                <button class="btn btn-primary btn-sm" title="Update"><i class="bi bi-pen"></i></button>
                            </div>
                            <div class="col-sm-4">
                                @if($user->deleted_at)
                                    <button class="btn btn-warning btn-sm" disabled title="Logical Delete"><i class="bi bi-recycle"></i></button>
                                @else
                                    <button class="btn btn-warning btn-sm" title="Logical Delete"><i class="bi bi-recycle"></i></button>
                                @endif
                            </div>
                            <div class="col-sm-4">
                                <button class="btn btn-danger btn-sm" title="ForceDelete"><i class="bi bi-trash"></i></button>
                            </div>
                        </div>
                    </td>
                </tr>   
            @endforeach
        </tbody>
        <tfoot>

        </tfoot>
    </table>

@endsection