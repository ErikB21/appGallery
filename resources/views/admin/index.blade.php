@extends('templates\admin')

@section('content')

    <h1>Benvenuto {{ Auth::user()->name}}</h1>
    <h3>{{ ucWords(Auth::user()->user_role)}}</h3>

@endsection