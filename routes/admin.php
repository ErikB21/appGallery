<?php

// use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Admin\AdminUsersController;
use Illuminate\Support\Facades\Route;

    Route::resource('users', AdminUsersController::class);
    Route::get('getUsers', [AdminUsersController::class, 'getUsers'])->name('admin.getUsers');
    Route::view('/', 'templates/admin')->name('admin');
    

    Route::get('/dashboard', function(){
        return 'Admin DashBoard';
    });
?>