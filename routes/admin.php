<?php

// use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Admin\AdminUsersController;
use Illuminate\Support\Facades\Route;
    
    //rotta che ritorna la vista nel template dell'admin
    Route::view('/', 'templates/admin')->name('admin');

    //rotta che definisce tutti i metodi del controller
    Route::resource('users', AdminUsersController::class);

    //rotta usata per il metodo restore del controller
    Route::patch('restore/{user}', [AdminUsersController::class, 'restore'])->name('admin.userRestore');

    //rotta usata per il metodo getUsers del controller
    Route::get('getUsers', [AdminUsersController::class, 'getUsers'])->name('admin.getUsers');

    Route::get('/dashboard', function(){
        return 'Admin DashBoard';
    });
?>