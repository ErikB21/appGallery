@extends('templates\default')


@section('content')

    <section class="container mt-5">
        <header class="mb-3">
            <h1 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Informazioni Profilo') }}
            </h1>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                {{ __("Modifica il tuo account, il tuo nome, la tua foto e la tua email!") }}
            </p>
        </header>

        <form id="send-verification" method="post" action="{{ route('verification.send') }}">
            @csrf
        </form>

        <form method="POST" action="{{ route('guestAdmin.update', Auth::user())}}" class="mt-6 space-y-6"  enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="row justify-content-between align-items-center">
                <div class="col-6">
                    <div class="mb-3">
                        {{-- NAME --}}
                        <label for="name" class="form-label"><h5>Nome</h5></label>
                        <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name', Auth::user()->name)}}" required autofocus autocomplete="name"/>
                        
                        @error('name')
                            <div class='invalid-feedback alert alert-danger p-1'>
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        {{-- SURNAME --}} 
                        <label for="surname" class="form-label"><h5>Cognome</h5></label>
                        <input type="text" id="surname" name="surname" class="form-control @error('surname') is-invalid @enderror" value="{{old('surname', Auth::user()->surname)}}" required autofocus autocomplete="surname"/>

                        @error('surname')
                            <div class='invalid-feedback alert alert-danger p-1'>
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        {{-- EMAIL --}}
                        
                        <label for="email" class="form-label"><h5>Email</h5></label>
                        <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{old('email', Auth::user()->email)}}" required autofocus autocomplete="email"/>

                        @error('email')
                            <div class='invalid-feedback alert alert-danger p-1'>
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="">
                        <div class="mb-3 form-group">
                            <label for="profile_pic"  class="form-label"><h5>Foto Profilo</h5></label>
                            <input type="file" class="form-control" name="profile_pic" id="profile_pic" value="{{Auth::user()->profile_pic}}" required>
                        </div>
                    </div>
                </div>
                <div class="col-6 d-flex justify-content-center">
                    <div class="mb-3 d-flex justify-content-center">
                        {{-- PROFILE_PIC --}}
                        @if($profileEdit['profile_pic'])
                            <div class="my-5 img_container">
                                <img class="img_profile_pic" src="{{asset('storage/' . $profileEdit['profile_pic'])}}" alt="{{Auth::user()->name}}" title="{{Auth::user()->name}}">
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-success mx-1">Applica Modifiche</button>
                <a class="btn btn-primary d-inline-block mx-1" href="{{route('dashboard')}}">Annulla</a>
            </div>

            {{-- <div>
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', Auth::user()->name)" required autofocus autocomplete="name" />
                <x-input-error class="mt-2" :messages="$errors->get('name')" />
            </div>

            <div>
                <x-input-label for="surname" :value="__('Surname')" />
                <x-text-input id="surname" name="surname" type="text" class="mt-1 block w-full" :value="old('surname', Auth::user()->surname)" required autofocus autocomplete="surname" />
                <x-input-error class="mt-2" :messages="$errors->get('sruname')" />
            </div>

            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', Auth::user()->email)" required autocomplete="email" />
                <x-input-error class="mt-2" :messages="$errors->get('email')" />
            </div> --}}
        </form>
    </section>
@endsection

<style>

    .img_container{
        height: 300px;
        width: 300px;
    }
    .img_profile_pic{
        height: 100%;
        width: 100%;
        object-fit: cover;
    }
</style>