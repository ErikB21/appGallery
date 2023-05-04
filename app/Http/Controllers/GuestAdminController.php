<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class GuestAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $profileEdit = Auth::user();
        return view('guestAdmin.edit', compact('user', 'profileEdit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        $user = User::find($id);
        $user->name = $req->input('name');
        $user->surname = $req->input('surname');
        $user->email = $req->input('email');
        $user->profile_pic = $req->input('profile_pic');

        $this->processFile($id, $req, $user);

        $res = $user->save();
        $message = $res ? $user->name . ', hai modificato le tue credenziali con successo!' : $user->name . ', si è creato un errore imprevisto!';
        session()->flash('message', $message);
        return redirect()->route('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {   
        $profileEdit = User::where('id', Auth::user()->id);
        $thumb = $user->profile_pic;
        $res = $profileEdit->forceDelete();
        if ($res && $thumb && Storage::exists($thumb)) {
            // $album->categories()->detach($album->categories->pluck('id')); lo useremo solamente se nel seeder non ci fosse onDelete('cascade')
            Storage::forceDelete($thumb);
        }
        if (request()->ajax()) {
            return $res;
        }
        Auth::logout();
        $profileEdit->forceDelete();
        session()->flash('message', 'Cancellazione avvenuta con successo!');
        return redirect()->route('register');
    }



    public function processFile($id, Request $req, $user): bool
    {
        if (!$req->hasFile('profile_pic')) {
            return false;
        }

        $file = $req->file('profile_pic');
        if (!$file->isValid()) {
            return false;
        }


        $filename = $id . '.' . $file->extension();
        $filename = $file->storeAs(env('IMG_PROFILE'), $filename);
        $user->profile_pic = $filename;
        return true;
    }
}
