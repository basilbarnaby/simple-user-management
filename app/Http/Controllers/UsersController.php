<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    public function index()
    {
        return view('users.index');
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        dd($request);
    }

    public function show(User $user)
    {

    }

    public function edit(Request $request, User $user)
    {

    }

    public function update(Request $request, User $user)
    {

    }

    public function  destroy(Request $request, User $user)
    {

    }
}
