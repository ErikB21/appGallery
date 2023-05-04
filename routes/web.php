<?php

use App\Events\NewAlbumCreated;
use App\Http\Controllers\{AlbumsController, CategoryController, GalleryController, GuestAdminController, PhotosController, ProfileController };
use App\Mail\TestMd;
use App\Models\Album;
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
    Route::get('albums', [GalleryController::class, 'index']);
    Route::get('album/{album}/images', [GalleryController::class, 'showAlbumImages'])->name('gallery.album.images');
    Route::get('categories/{category}/albums', [GalleryController::class, 'showCategoryAlbums'])->name('gallery.categories.albums');
});

Route::resource('guestAdmin/{guestAdmin}', GuestAdminController::class);



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