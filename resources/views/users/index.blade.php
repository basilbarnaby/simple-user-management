@extends('layouts.main')

@section('pageTitle')
    Users
@endsection

@section('pageHeader')
    User management
@endsection

@section('topButtons')
    <div class="btn-toolbar mb-2 mb-md-0">
        <a class="btn btn-sm btn-outline-secondary" href="{{ route('users.create') }}">
            <span data-feather="plus"></span>
            Add a User
        </a>
    </div>  
@endsection

@section('content')
    <div class="row">
        <div class="col-md-4 offset-md-8">
            @include('_partials.flash')
            @include('_partials.errors')
        </div>
    </div>
    <div class="row mb-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body small-table-font">
                    <table class="table table-sm table-hover table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Access Level</th>
                                <th class="disabled-sorting text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td> {{ $user->id }} </td>
                                    <td> {{ $user->fname }} {{ $user->lname }}</td>
                                    <td> {{ $user->email }} </td>
                                    <td>
                                        @foreach($user->roles as $role)
                                            <span class="badge badge-secondary">{{ $role->display_name }}</span>
                                        @endforeach
                                    </td>
                                    <td class="text-right">
                                        <a href="{{ route('users.show', $user->id) }}" class="btn btn-sm btn-simple text-info btn-icon"><span data-feather="monitor"></span></a>
                                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-simple text-warning btn-icon"><span data-feather="edit"></span></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection