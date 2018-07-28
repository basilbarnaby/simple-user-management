@extends('layouts.main')

@section('pageTitle')
    Roles
@endsection

@section('pageHeader')
    Roles
@endsection

@section('topButtons')
    <div class="btn-toolbar mb-2 mb-md-0">
        <a class="btn btn-sm btn-outline-secondary" href="{{ route('roles.create') }}">
            <span data-feather="plus"></span>
            Add a Role
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
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body small-table-font">
                    <table class="table table-sm table-hover table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Display Name</th>
                                <th>Description</th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)
                                <tr>
                                    <td>{{ $role->id }} </td>
                                    <td>{{ $role->name }} </td>
                                    <td>{{ $role->display_name }} </td>
                                    <td>{{ $role->description }} </td>
                                    <td class="text-right">
                                        <a href="{{ route('roles.show', $role->id) }}" class="btn btn-sm btn-simple text-info btn-icon"><span data-feather="monitor"></span></a>
                                        <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-sm btn-simple text-warning btn-icon"><span data-feather="edit"></span></a>
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