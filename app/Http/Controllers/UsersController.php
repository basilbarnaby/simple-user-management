<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use Hash;
use Auth;

class UsersController extends Controller
{
    public function index()
    {
        if(Auth::user()->hasRole(['superadmin'])){
            $users = User::all();
        } else {
            $users = User::getUsers()->get();
        }
        
        return view('users.index', compact('users'));
    }

    public function create()
    {
        if(Auth::user()->hasRole(['superadmin'])){
            $roles = Role::all();
        } else {
            $roles = Role::getRoles()->get();
        }

        return view('users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required|unique:users,email',
            // 'password' => 'required',
        ]);

        $user = User::create([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'email' => $request->email,
            'password' => Hash::make('123'), //Generated Password 123
        ]);

        if ($request->roles) {
            $user->SyncRoles(explode(',', request('roles')));
        }

        session()->flash('success', 'User was successfully created!');
        return redirect()->route('users.index');
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        if(Auth::user()->hasRole(['superadmin'])){
            $roles = Role::all();
        } else {
            $roles = Role::getRoles()->get();
        }

        return view('users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required|unique:users,email,'.$user->id,
        ]);

        if($request->password_options == 'manual'){
            User::where('id', $user->id)->update([
                'fname' => $request->fname,
                'lname' => $request->lname,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
        }else{
            User::where('id', $user->id)->update([
                'fname' => $request->fname,
                'lname' => $request->lname,
                'email' => $request->email,
            ]);
        }

        if($request->roles){
            $user->syncRoles(explode(',', $request->roles), false);
        }else{
            $user->detachRoles($user->roles);
        }

        session()->flash('success', 'User has been successfully update!');
        return redirect()->route('users.show', $user->id);
    }

    public function  destroy(User $user)
    {

    }
}
