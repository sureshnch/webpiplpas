<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreUsersRequest;
use App\Http\Requests\Admin\UpdateUsersRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

class UsersController extends Controller
{
    /**
     * Display a listing of User.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if ($filterBy = Input::get('filter')) {
            if ($filterBy == 'all') {
                Session::put('User.filter', 'all');
            } elseif ($filterBy == 'my') {
                Session::put('User.filter', 'my');
            }
        }

                $users = User::all();

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating new User.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $roles = \App\Role::get()->pluck('title', 'id');

        $created_bies = \App\User::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');

        return view('admin.users.create', compact('roles', 'created_bies'));
    }

    /**
     * Store a newly created User in storage.
     *
     * @param  \App\Http\Requests\StoreUsersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUsersRequest $request)
    {
        $user = User::create($request->all());
        $user->role()->sync(array_filter((array)$request->input('role')));



        return redirect()->route('admin.users.index');
    }


    /**
     * Show the form for editing User.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $roles = \App\Role::get()->pluck('title', 'id');

        $created_bies = \App\User::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');

        $user = User::findOrFail($id);

        return view('admin.users.edit', compact('user', 'roles', 'created_bies'));
    }

    /**
     * Update User in storage.
     *
     * @param  \App\Http\Requests\UpdateUsersRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUsersRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());
        $user->role()->sync(array_filter((array)$request->input('role')));



        return redirect()->route('admin.users.index');
    }


    /**
     * Display User.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $roles = \App\Role::get()->pluck('title', 'id');

        $created_bies = \App\User::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');$permissions = \App\Permission::where('created_by_id', $id)->get();$roles = \App\Role::where('created_by_id', $id)->get();$users = \App\User::where('created_by_id', $id)->get();$tasks = \App\Task::where('user_id', $id)->get();$resumes = \App\Resume::where('created_by_id', $id)->get();$requirements = \App\Requirement::whereHas('assigned_to_users',
                    function ($query) use ($id) {
                        $query->where('id', $id);
                    })->get();$requirements = \App\Requirement::where('created_by_id', $id)->get();

        $user = User::findOrFail($id);

        return view('admin.users.show', compact('user', 'permissions', 'roles', 'users', 'tasks', 'resumes', 'requirements', 'requirements'));
    }


    /**
     * Remove User from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users.index');
    }

    /**
     * Delete all selected User at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if ($request->input('ids')) {
            $entries = User::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
