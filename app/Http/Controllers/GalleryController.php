<?php

namespace App\Http\Controllers;

use App\Models\{ Album, Category, Photo };
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index(){
        $albums = Album::with('categories')->latest()->paginate(9);
        $cat = Category::all();
        return view('gallery.albums')->with(['albums' => $albums, 'cat' => $cat,  'category_id' => null]);
    }

    public function showAlbumImages(Album $album){
        $photos = Photo::whereAlbumId($album->id)->paginate(9);
        return view('gallery.images',['images' => $photos, 'album' => $album ]);
    }

    public function showCategoryAlbums(Category $category){
        $cat = $category->albums()->with('categories')->latest()->paginate();
        return view('gallery.albums')->with(['albums' => $cat, 'category_id' => $category->id]);
    }
}
