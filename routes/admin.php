<?php

use Illuminate\Support\Facades\Route;

    Route::get('/', function(){
        return 'Hello Admin';
    });

    Route::get('/dashboard', function(){
        return 'Admin DashBoard';
    });
?>