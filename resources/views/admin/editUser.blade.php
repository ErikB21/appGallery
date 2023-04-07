@extends('templates\admin')



@section('content')

    <div class="row justify-content-center">
        <div class="col-auto col-md-6 col-lg-8">
            <h1 class="mb-5">Manage User</h1>
        @if($user->id)
            <form action="{{ route('users.update', $user->id) }}" method="POST">
                @method('PATCH')
        @else
            <form action="{{ route('users.store') }}" method="POST">
        @endif
                @csrf
                <div class="form-group mb-4">
                    <label for="name">Name</label>
                    <input type="text" name="name" value="{{ old('name', $user->name) }}" id="name" placeholder="User's name" class="form-control">
                </div>
                <div class="form-group mb-4">
                    <label for="email">Email</label>
                    <input type="email" name="email" value="{{ old('email', $user->email) }}" id="email" placeholder="User's email" class="form-control">
                </div>
                <div class="form-group mb-4">
                    <label for="user_role">Role</label>
                    <select class="form-select" name="user_role" id="user_role">
                        <option value="">SELECT</option>
                        <option {{ $user->user_role === 'user' ? 'selected' : '' }} value="user">USER</option>
                        <option {{ $user->user_role === 'admin' ? 'selected' : '' }} value="admin">ADMIN</option>
                    </select>
                </div>
                <div class="form-group d-flex mt-4 justify-content-between">
                    <div>
                        <button class="btn btn-outline-info me-2" type="reset">RESET</button>
                        <button class="btn btn-outline-primary">SAVE</button>
                    </div>
                    <div>
                        <a href="{{ route('users.index') }}" class="btn btn-outline-dark">BACK</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection