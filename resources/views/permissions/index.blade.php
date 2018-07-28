@extends('layouts.main')

@section('pageTitle')
    Permissions
@endsection

@section('pageHeader')
    Permission Management
@endsection

@section('topButtons')
    <div class="btn-toolbar mb-2 mb-md-0">
        <a class="btn btn-sm btn-outline-secondary" href="{{ route('permissions.create') }}">
            <span data-feather="plus"></span>
            Add a Permission
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
                                <th>slug</th>
                                <th>Description</th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($permissions as $permission)
                                <tr>
                                    <td>{{ $permission->id }} </td>
                                    <td>{{ $permission->display_name }} </td>
                                    <td>{{ $permission->name }} </td>
                                    <td>{{ $permission->description }} </td>
                                    <td class="text-right">
                                        <a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-sm btn-simple text-warning btn-icon"><span data-feather="edit"></span></a>
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