<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserFormRequest;
use App\Models\User;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->user_role === 'admin'){
            return view('admin\index');
        };
        return view('admin\users');
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
    public function store(UserFormRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin\users', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //ritorna la vista creata appositamente per il form
        return view('admin.editUser', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserFormRequest $request,User $user)
    {
        //prendo la richiesta del form e salvo i dati di modifica
        $user->name = $request->name;
        $user->email = $request->email;
        $user->user_role = $request->user_role;
        $users = $user->save();
        $message = $users ? 'User   ' . $user->name . ' modificato con successo!' : 'User ' . $user->name . ' nonmodificato!';
        session()->flash('message', $message);
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //prendi tutti gli users, anche quelli cancellati,cercali per id o dai un eccezione
        $user = User::withTrashed()->findOrFail($id);

        //dopo controlla se ce il parametro hard
        $hard = \request('hard', '');

        // se c'e cancelliamo fisicamente il record dal Db, altrimenti lo cancelliamo in modo soft e nella tabella deleted_at ci apparirà quando è stato cancellato
        $res = $hard ? $user->forceDelete() : $user->delete();

        // ritorno il risultato
        return '' . $res;
    }








    /**
     * FUNZIONI PER CAMBIARE DINAMICAMENTE I BOTTONI DI EDIT, RESTORE E DESTROY
     * 
     * FUNZIONE PER CREARE ATTRAVERSO DATATABLES UNA TABELLA DINAMICA CON TUTTI GLI UTENTI
     * 
     */

    public function restore($id)
    {
        //stessa cosa della destroy
        $user = User::withTrashed()->findOrFail($id);

        //ma qui invece di cancellare, possiamo immettere nuovamente un record in precedenza cancellato come record attivo e funzionante
        $res = $user->restore();

        //ritorno il risultato
        return '' . $res;
    }



    private function getUserButtons(User $user)
    {
        //id sarà uguale all'id dell'user 
        $id = $user->id;

        //button per rotta update di default
        $buttonEdit = "<a id='edit-$id' title='Update' style='cursor:default;' class='btn btn-sm btn-default'><i class='bi bi-pen'></i></a>&nbsp;";


        //se lo user è stato cancellato 
        if ($user->deleted_at) { //allora il buttonDelete

            //avrà una rotta verso il metodo restore
            $deleteRoute = route('admin.userRestore', ['user' => $id]);

            //cambierà colore, icona, ID e il title
            $btnClass = 'btn-success';
            $iconDelete = '<i class="bi bi-arrow-clockwise"></i>';
            $btnId = 'restore-' . $id;
            $btnTitle = 'Restore';
        } else { //se invece non è stato ancora cancellato

            //rotta verso destroy, con cambio di colore, icona, ID e title
            $deleteRoute = route('users.destroy', ['user' => $id]);
            $btnClass = 'btn-warning';
            $iconDelete = '<i class="bi bi-trash"></i>';
            $btnId = 'delete-' . $id;
            $btnTitle = 'Soft Delete';

            //button per rotta update, dove si può modificare uno user, sovrascritta
            $buttonEdit = '<a href="' . route('users.edit', ['user' => $id]) . '" id="edit-' . $id . '" title="Update" class="btn btn-sm btn-primary"><i  class="bi bi-pen"></i></a>&nbsp;';
        }

        //il nostro bottone dinamico che cambia : se è stato cancellato diventa bottone da restore, altrimenti resta da softDelete
        $buttonDelete = "<a href='$deleteRoute' title='$btnTitle' id='$btnId' class='ajax $btnClass btn btn-sm my-1'>$iconDelete</a>&nbsp;";

        //il nostro button per cancellare fisicamente il record dal DB
        $buttonForceDelete = '<a href="' . route('users.destroy', ['user' => $id]) . '?hard=1" title="Hard Delete" id="forcedelete-' . $id . '" class="ajax btn btn-sm btn-danger"><i class="bi bi-trash"></i> </a>';

        return $buttonEdit . $buttonDelete . $buttonForceDelete;
    }


    public function getUsers()
    {
        //seleziona gli User per ..., ordinali per nome, carica anche quelli cancellati in modo soft
        $users =  User::select(['id', 'name', 'email', 'user_role', 'created_at', 'deleted_at'])->orderBy('name')->withTrashed()->get();

        //crea una DataTables con gli utenti(array $users)
        $result = DataTables::of($users)->addColumn('action', function ($user) {

            //aggiungi le condizioni della funzione getUserButtons
            return  $this->getUserButtons($user);
            //edito il formato date delle colonne created, updated e deleted _AT con ternario
        })->editColumn('created_at', function ($user) {
            return $user->created_at ? $user->created_at->format('d/m/y') : '';
        })->editColumn('updated_at', function ($user) {
            return $user->updated_at ? $user->updated_at->format('d/m/y') : '';
        })->editColumn('deleted_at', function ($user) {
            return $user->deleted_at ? $user->deleted_at->format('d/m/y') : '';
        })->make(true);
        return $result;
    }
}
