<?php

use App\Http\Controllers\{AlbumsController, CategoryController, GalleryController, PhotosController, ProfileController };
use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('gallery.index');
});

Route::middleware('auth')->prefix('dashboard')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('/albums', AlbumsController::class)->middleware('auth');
    Route::resource('photos', PhotosController::class);
    Route::get('/albums/{album}/images', [AlbumsController::class, 'getImages'])->name('albums.images');
    Route::resource('categories', CategoryController::class);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//gallery

Route::group(['prefix' => 'gallery'], function(){
    Route::get('/', [GalleryController::class, 'index'])->name('gallery.index');
    Route::get('album/{album}/images', [GalleryController::class, 'showAlbumImages'])->name('gallery.album.images');
    Route::get('categories/{category}/albums', [GalleryController::class, 'showCategoryAlbums'])->name('gallery.categories.albums');
});

require __DIR__.'/auth.php';
