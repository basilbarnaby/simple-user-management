@extends('layouts.main')

@section('pageTitle')
    User Roles
@endsection

@section('pageHeader')
    User Role Management
@endsection

@section('topButtons')
    <div class="btn-toolbar mb-2 mb-md-0">
        <a class="btn btn-sm btn-outline-secondary mr-2" href="{{ route('roles.index') }}">
            <span data-feather="chevron-left"></span>
            Back to Roles
        </a>
        <a class="btn btn-sm btn-outline-secondary" href="{{ route('roles.edit', $role->id) }}">
            <span data-feather="plus"></span>
            Edit this Role
        </a>
    </div>  
@endsection

@section('content')
    <div class="row">
        <div class="col-md-4 offset-md-6">
            @include('_partials.flash')
            @include('_partials.errors')
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header bg-secondary text-light">
                    <h5>Role name: {{ $role->display_name}} <em><small class="my-ml-2" >({{ $role->name }})</small></em></h5>
                </div>
                <div class="card-body">
                    <p>{{ $role->description}} </p>
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-header">
                    <h5>Permssions</h5>
                </div>
                <div class="card-body">
                    @if ($role->permissions->count() == 0)
                        <p class="text-muted">There are no permisisons assigned to this role as yet!</p>
                    @else
                        <ul>
                            @foreach ($role->permissions as $permission)
                                <li>{{ $permission->display_name}} <small class="my-ml-p5">({{ $permission->description }})</small></li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection