<?php

// use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Admin\AdminUsersController;
use Illuminate\Support\Facades\Route;
    
    Route::view('/', 'templates/admin')->name('admin');
    Route::resource('users', AdminUsersController::class);
    Route::patch('restore/{user}', [AdminUsersController::class, 'restore'])->name('admin.userRestore');
    Route::get('getUsers', [AdminUsersController::class, 'getUsers'])->name('admin.getUsers');

    Route::get('/dashboard', function(){
        return 'Admin DashBoard';
    });
?>