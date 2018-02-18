<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreRolesRequest;
use App\Http\Requests\Admin\UpdateRolesRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

class RolesController extends Controller
{
    /**
     * Display a listing of Role.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if ($filterBy = Input::get('filter')) {
            if ($filterBy == 'all') {
                Session::put('Role.filter', 'all');
            } elseif ($filterBy == 'my') {
                Session::put('Role.filter', 'my');
            }
        }

                $roles = Role::all();

        return view('admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating new Role.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $permissions = \App\Permission::get()->pluck('title', 'id');

        $created_bies = \App\User::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');

        return view('admin.roles.create', compact('permissions', 'created_bies'));
    }

    /**
     * Store a newly created Role in storage.
     *
     * @param  \App\Http\Requests\StoreRolesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRolesRequest $request)
    {
        $role = Role::create($request->all());
        $role->permission()->sync(array_filter((array)$request->input('permission')));



        return redirect()->route('admin.roles.index');
    }


    /**
     * Show the form for editing Role.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $permissions = \App\Permission::get()->pluck('title', 'id');

        $created_bies = \App\User::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');

        $role = Role::findOrFail($id);

        return view('admin.roles.edit', compact('role', 'permissions', 'created_bies'));
    }

    /**
     * Update Role in storage.
     *
     * @param  \App\Http\Requests\UpdateRolesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRolesRequest $request, $id)
    {
        $role = Role::findOrFail($id);
        $role->update($request->all());
        $role->permission()->sync(array_filter((array)$request->input('permission')));



        return redirect()->route('admin.roles.index');
    }


    /**
     * Display Role.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $permissions = \App\Permission::get()->pluck('title', 'id');

        $created_bies = \App\User::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');$users = \App\User::whereHas('role',
                    function ($query) use ($id) {
                        $query->where('id', $id);
                    })->get();

        $role = Role::findOrFail($id);

        return view('admin.roles.show', compact('role', 'users'));
    }


    /**
     * Remove Role from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();

        return redirect()->route('admin.roles.index');
    }

    /**
     * Delete all selected Role at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if ($request->input('ids')) {
            $entries = Role::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
