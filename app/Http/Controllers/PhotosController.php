<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class PhotosController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth')->except(['index', 'show']);
    // }


    protected $rules = [
        'album_id' => 'required|integer|exists:albums,id',
        'name' => 'required',
        'img_path' => 'required|image'
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Photo::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $photo = new Photo();
        $album = $request->album_id ? Album::findOrFail($request->album_id) : new Album();
        $albums = $this->getAlbums();
        return view('images.editImages', compact('album', 'photo', 'albums'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, $this->rules);
        $photo = new Photo();
        $photo->name = $request->input('name');
        $photo->description = $request->input('description');
        $photo->album_id = $request->input('album_id');
        $this->processFile($request, $photo);
        $photo->save();
        return redirect(route('albums.images', $photo->album));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Photo $photo)
    {
        return $photo;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Photo $photo)
    {
        $album = $photo->album;
        $albums = $this->getAlbums();
        return view('images.editImages', compact('photo', 'album', 'albums'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Photo $photo)
    {
        $data = $request->only(['name', 'description', 'album_id']);
        //$res = Album::where('id', $id)->update($data);
        $photo->name = $data['name'];
        $photo->description = $data['description'];
        $photo->album_id = $data['album_id'];
        if ($request->hasFile('img_path')) {
            $this->processFile($request, $photo);
        }

        $res = $photo->save();
        $message = $res ? 'Immagine ' . $photo->name . ' modificata' : 'Immagine' . $photo->name . ' non modificata.';
        session()->flash('message', $message);
        return redirect()->route('albums.images', ['albums' => $photo->album]);
    }

    public function processFile(Request $request, Photo $photo): void
    {
        $disk = config('filesystems.default');
        $file = $request->file('img_path');
        $name = preg_replace('@[^a-z]i@', '_', $photo->name);
        $filename = $name . '.' . $file->extension();
        $thumbnail = $file->storeAs(config('filesystems.img_dir', $photo->album_id), $filename, ['disk' => $disk]);
        $photo->img_path = $thumbnail;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Photo $photo)
    {
        $res = $photo->delete();
        return $res;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getAlbums() : Collection{
        return Album::orderBy('album_name')->select(['id', 'album_name'])->get();
    }
}
