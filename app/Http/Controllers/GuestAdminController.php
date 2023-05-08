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
        return view('dashboard');
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
    public function update(Request $request)
    {
        $user = User::whereId(Auth::user()->id)->first();
        $data = $request->all();
        if (array_key_exists('profile_pic', $data)) {
            // Elimino il la vecchia img
            if ($user->profile_pic) {
                Storage::delete($user->profile_pic);
            }
            $profile_pic = Storage::put('images/users', $data['profile_pic']);
            $data['profile_pic'] = $profile_pic;
        }
        // $this->processFile($req, $user);

        $user->update($data);
        return redirect()->route('dashboard')->with('success', 'Hai modificato correttamente il tuo profilo');
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



    // public function processFile(Request $req, $user): bool
    // {
    //     if (!$req->hasFile('profile_pic')) {
    //         return false;
    //     }

    //     $file = $req->file('profile_pic');
    //     if (!$file->isValid()) {
    //         return false;
    //     }


    //     $filename = $file->extension();
    //     $filename = $file->storeAs(env('IMG_PROFILE'), $filename);
    //     $user->profile_pic = $filename;
    //     return true;
    // }
}
