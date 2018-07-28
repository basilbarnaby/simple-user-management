<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permission;

class PermissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::all();
        return view('permissions.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (request('permissionType') == 'basic') {
            $this->validate(request(), [
                'display_name' => 'required|max:255',
                'name' => 'required|max:255|alphadash|unique:permissions,name',
                'description' => 'sometimes|max:255'
            ]);

            Permission::create([
                'display_name' => request('display_name'),
                'name' => request('name'),
                'description' => request('description')
            ]);

            session()->flash('success', 'Permission has been successfully added.');

            return redirect()->route('permissions.index');
        
        } elseif (request('permissionType') == 'crud') {
            $this->validate(request(), [
                'resource' => 'required|min:3|max:100|alpha'
            ]);

            $crud = explode(',', request('crud_selected'));

            if (count($crud) > 0) {
                foreach ($crud as $x) {
                    $slug = strtolower($x) . '-' . strtolower(request('resource'));
                    $displayName = ucwords($x . " " . request('resource'));
                    $description = "Allows a user to " . strtoupper($x) . " " . ucwords(request('resource'));

                    Permission::create([ 
                        'name' => $slug,
                        'display_name' => $displayName,
                        'description' => $description
                    ]);
                }

                session()->flash('success', 'Permissions were all successfully added!');

                return redirect()->route('permissions.index');
            }

        } else {

            return redirect()->route('permissions.create')->withInput();

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        return view('permissions.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission)
    {
        $this->validate(request(), [
            'display_name' => 'required|max:255',
            'description' => 'sometimes|max:255',
        ]);

        Permission::where('id', $permission->id)->update([
            'display_name' => request('display_name'),
            'description' => request('description')
        ]);

        session()->flash('success', 'Permission has been successfully updated');

        return redirect()->route('permissions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        //
    }
}
