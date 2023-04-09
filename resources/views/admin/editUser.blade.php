@extends('templates\admin')



@section('content')

    <div class="row justify-content-center">
        <div class="col-auto col-md-6 col-lg-8">
        @if($user->id)
            <h1 class="mb-5">Modifica Utente</h1>
            <form action="{{ route('users.update', $user->id) }}" method="POST">
                @method('PATCH')
        @else
            <h1 class="mb-5">Nuovo Utente</h1>
            <form action="{{ route('users.store') }}" method="POST">
        @endif
                @csrf
                <div class="form-group mb-4">
                    <label for="name">Nome</label>
                    <input type="text" name="name" value="{{ old('name', $user->name) }}" id="name" placeholder="User's name" class="form-control">
                    @error('name')
                            <div class="alert alert-danger">
                            @foreach ($errors->get('name') as $error)
                                {{ $error }}<br>
                            @endforeach
                        </div>
                    @enderror
                </div>
                <div class="form-group mb-4">
                    <label for="email">Email</label>
                    <input type="email" name="email" value="{{ old('email', $user->email) }}" id="email" placeholder="User's email" class="form-control">
                    @error('email')
                        <div class="alert alert-danger">
                            @foreach ($errors->get('email') as $error)
                                {{ $error }}<br>
                            @endforeach
                        </div>
                    @enderror
                </div>
                <div class="form-group mb-4">
                    <label for="user_role">Ruolo</label>
                    <select class="form-select" name="user_role" id="user_role">
                        <option value="">SELECT</option>
                        <option {{ $user->user_role === 'user' ? 'selected' : '' }} value="user">USER</option>
                        <option {{ $user->user_role === 'admin' ? 'selected' : '' }} value="admin">ADMIN</option>
                    </select>
                    @error('user_role')
                        <div class="alert alert-danger">
                            @foreach ($errors->get('user_role') as $error)
                                {{ $error }}<br>
                            @endforeach
                        </div>
                    @enderror
                </div>
                <div class="form-group d-flex mt-4 justify-content-between">
                    <button class="btn btn-outline-primary">Salva</button>
                    <a href="{{ route('users.show', Auth::user()) }}" class="btn btn-outline-dark">Back</a>
                </div>
            </form>
        </div>
    </div>

@endsection

@section('footer')
    @parent
    <script>
        $('document').ready(function () {
            $('div.alert').fadeOut(5000);
        });
    </script>
@endsection