<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use DataTables;
use Yajra\DataTables\Services\DataTable;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin/users');
    }
    
    public function getUsers()
    {
        $users =  User::select(['name', 'email', 'user_role', 'created_at', 'deleted_at'])->orderBy('name')->get();
        $result = DataTables::of($users)->addColumn('action', function ($user) {
            return '<a title="Update" href="#edit-' . $user->id . '" class="btn btn-sm btn-primary"><i class="bi bi-pen"></i></a>&nbsp;' .
            '<a title="Soft delete" href="#edit-' . $user->id . '" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i> </a>&nbsp;' .
            '<a title="Hard delete" href="#edit-' . $user->id . '" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i> </a>';
        })->make(true);
        return $result;
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
