<?php

// use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

    Route::get('/', function(){
        // dd(Auth::user()->isAdmin());
        return 'Hello Admin';
    });

    Route::get('/dashboard', function(){
        return 'Admin DashBoard';
    });
?>