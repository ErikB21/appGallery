<?php

use App\Events\NewAlbumCreated;
use App\Http\Controllers\{AlbumsController, CategoryController, GalleryController, GuestAdminController, PhotosController };
use App\Mail\TestMd;
use App\Models\Album;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
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
    Route::get('/', [GuestAdminController::class, 'index'])->name('profile.index');
    Route::get('/guestAdmin', [GuestAdminController::class, 'edit'])->name('profile.edit');
    Route::patch('/guestAdmin', [GuestAdminController::class, 'update'])->name('profile.update');
    Route::delete('/guestAdmin', [GuestAdminController::class, 'destroy'])->name('profile.destroy');
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
    Route::get('albums', [GalleryController::class, 'index']);
    Route::get('album/{album}/images', [GalleryController::class, 'showAlbumImages'])->name('gallery.album.images');
    Route::get('categories/{category}/albums', [GalleryController::class, 'showCategoryAlbums'])->name('gallery.categories.albums');
});

// Route::resource('guestAdmin/user', GuestAdminController::class);
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');


require __DIR__.'/auth.php';

//Mail

// Route::view('testMail', 'mails.testEmail', ['name' => 'Erik']);
Route::get('testMd', function () {
    Mail::to('erik.borgogno.dev@gmail.com')->send(new TestMd(Auth::user()));
});

//Event

Route::get('testEvent', function(){//creo una rotta che punti all'evento
    $album = Album::first();//creo un'istanza di Album
    event(new NewAlbumCreated($album));//event crea un'istanza di events creando un metodo dispatch(argomenti)
});