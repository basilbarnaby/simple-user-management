<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\Permission;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all();
        return view('roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'display_name' => 'required|max:191',
            'name' => 'required|max:100|alpha_dash|unique:roles,name',
            'description' =>'required|max:191'
        ]);

        $role = Role::create([
            'display_name' => request('display_name'),
            'name' => request('name'),
            'description' => request('description')
        ]);

        if ($request->permissions) {
            $role->SyncPermissions(explode(',', request('permissions')));
        }

        session()->flash('success', 'The ' . $role->display_name . ' role was successfully created!');
        return redirect()->route('roles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        return view('roles.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $permissions = Permission::all();
        return view('roles.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $this->validate(request(), [
            'display_name' => 'required|max:191',
            'description' =>'required|max:191'
        ]);

        Role::where('id', $role->id)->update([
            'display_name' => request('display_name'),
            'description' => request('description')
        ]);

        if ($request->permissions) {
            $role->SyncPermissions(explode(',', request('permissions')));
        }

        session()->flash('success', 'The ' . $role->display_name . ' role was successfully updated!');
        return redirect()->route('roles.show', $role->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        //
    }
}
