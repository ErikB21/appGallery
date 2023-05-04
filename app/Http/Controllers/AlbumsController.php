<?php

namespace App\Http\Controllers;

use App\Events\NewAlbumCreated;
use App\Http\Requests\AlbumRequest;
use App\Models\Album;
use App\Models\Category;
use App\Models\Photo;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class AlbumsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @return View
     */
    public function index(Request $request)
    {
        $albumsPerPage = config('filesystems.albums_per_page');
        //query builder
        $queryBuilder = Album::orderBy('id', 'DESC')->withCount('photos');
        $queryBuilder->where('user_id', Auth::id());
        if($request->has('id')){
            $queryBuilder->where('id', '=', $request->input('id'));
        }
        if ($request->has('album_name')) {
            $queryBuilder->where('album_name', 'LIKE', $request->input('album_name'). '%');
        }
        if ($request->has('category_id')) {
            $queryBuilder->whereHas('categories', fn($q) => $q->where('category_id', $request->category_id));
            //nome relazione +arrow function dove $q sta per category_id che deve essere uguale al category_id della request
        }
        $albums = $queryBuilder->paginate($albumsPerPage);
        return view('albums.albums', ['albums' => $albums]);

        //query grezza

        // $sql = 'select * from albums WHERE 1=1 ';
        // $where = [];
        // if ($request->has('id')) {
        //     $where['id'] = $request->get('id');
        //     $sql .= ' AND ID=:id';
        // }
        // if ($request->has('album_name')) {
        //     $where['album_name'] = $request->get('album_name');
        //     $sql .= ' AND album_name=:album_name';
        // }
        // $sql .= 'ORDER BY id DESC';
        // //dd($sql);
        // $albums = DB::select($sql, $where);
        // return view('albums.albums', ['albums' => $albums]);
    }






    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $album = new Album();
        $selectedCategories = [];

        $categories = Category::orderBy('category_name')->get();
        return view('albums.createAlbum', ['album' => $album, 'categories' => $categories, 'selectedCategories' => []]);
    }






    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AlbumRequest $request): RedirectResponse
    {
        $this->authorize(Album::class);
        $album = new Album();
        $album->album_name = request()->input('album_name');
        $album->album_thumb = '/';
        $album->description = request()->input('description');
        $album->user_id = Auth::id();
        $res = $album->save();
        if ($res) {
            // event(new NewAlbumCreated($album));
            if($request->has('categories')){
                $album->categories()->attach($request->input('categories'));
            }

            if ($this->processFile($album->id, $request, $album)) {
                $album->save();
            }
        }
        //$res =  Album::create($data);
        request()->input('name');
        return redirect()->route('albums.index')->with('success', "Hai creato l'album correttamente");
        
        //query grezza
        // $data = $request->only(['album_name', 'description']);
        // $data['user_id'] = 1;
        // $data['album_thumb'] = '/';
        // $query = 'INSERT INTO albums (album_name, description, user_id, album_thumb) values (:album_name, :description, :user_id, :album_thumb)';
        // $res = DB::insert($query, $data);
    }

    public function processFile($id, Request $req, $album): bool
    {
        if (!$req->hasFile('album_thumb')) {
            return false;
        }

        $file = $req->file('album_thumb');
        if (!$file->isValid()) {
            return false;
        }


        $filename = $id . '.' . $file->extension();
        $filename = $file->storeAs(env('IMG_DIR'), $filename);
        $album->album_thumb = $filename;
        return true;
    }





    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function show(Album $album)
    {
        if(+$album->user_id === +Auth::id()){
            return $album;
        }
        abort('401');
    }







    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function edit(Album $album)
    {
        // if($album->user_id !== Auth::id()){
        //     abort('401');
        // guardare AuthServiceProvider.php
        $this->authorize($album);
        $categories = Category::orderBy('category_name')->get();
        $selectedCategories = $album->categories->pluck('id')->toArray();
        
        return view('albums.editAlbum')->with(compact('album', 'categories', 'selectedCategories'));
        // $sql = 'SELECT * FROM albums WHERE id=:id';
        // $albumEdit = DB::select($sql, ['id' => $album->id]);
        // return view('albums.editalbum', ['album' => $albumEdit[0]]);
        // return view('albums.editalbum')->withAlbum($album);
    }







    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function update(AlbumRequest $req, $id): RedirectResponse
    {

        $album = Album::find($id);

        $this->authorize($album);
        $album->album_name = $req->input('album_name');
        $album->description = $req->input('description');
        $album->user_id = Auth::id();
        $this->processFile($id, $req, $album);

        $album->save();
        if ($req->has('categories')) {
            $album->categories()->sync($req->input('categories'));
        }
        
        return redirect()->route('albums.index')->with('success', "Hai modificato l'album correttamente");

        // query grezza
        // $data = $request->only(['album_name', 'description']);
        // $data['id'] = $album;
        // $query = 'UPDATE albums set album_name=:album_name, description=:description where id=:id';
        // $res = Db::update($query, $data);
        // $message = 'Album con id= ' . $album;
        // $message .= $res ? ' Aggiornato' : ' Non aggiornato';
        // session()->flash('message', $message);
        // return redirect()->route('albums.index');
    }





    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function destroy(Album $album)
    {
        $this->authorize($album);
        $thumbnail = $album->album_thumb;
        $res = $album->delete();
        
        if($res && $thumbnail && Storage::exists($thumbnail)){
            // $album->categories()->detach($album->categories->pluck('id')); lo useremo solamente se nel seeder non ci fosse onDelete('cascade')
            Storage::delete($thumbnail);
        }
        if(request()->ajax()){
            return $res;
        }
        return redirect()->route('albums.index')->with('success', "Hai cancellato l'album in modo corretto");


        //usare int al posto di Album
        // return Album::destroy($album);
        // return Album::findOrFail($album)->delete();



        //query builder
        // $res = DB::table('albums')->delete($album);
        // $res = Album::where('id', $album)->delete();
        // return $res;

        //query grezza
        // $sql = 'DELETE FROM albums WHERE id=:id';
        // return DB::delete($sql, ['id' => $album]);
    }

    //funzione delete di prova
    // public function delete($id)
    // {
    //     $sql = 'DELETE FROM albums WHERE id=:id';
    //     return DB::delete($sql, ['id' => $id]);
    //     // return redirect()->back();
    // }

    public function getImages($id)
    {
        $imgPerPage = config('filesystems.img_per_page');
        $album = Album::find($id);
        $album_id = $album->id;
        $images = Photo::where('album_id',$album->id)->paginate($imgPerPage);
        //se prima di paginate uso latest() automaticamente verranno inseriti i record in ordine decrescente
        return view('images.albumImages', compact('album', 'images'));
    }
}
