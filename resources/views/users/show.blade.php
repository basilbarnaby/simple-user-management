@extends('layouts.main')

@section('pageTitle')
    Users
@endsection

@section('pageHeader')
    User Management
@endsection

@section('topButtons')
    <div class="btn-toolbar mb-2 mb-md-0">
        <a class="btn btn-sm btn-outline-secondary mr-2" href="{{ route('users.index') }}">
            <span data-feather="chevron-left"></span>
            Back to Users
        </a>
        <a class="btn btn-sm btn-outline-secondary" href="{{ route('users.edit', $user->id) }}">
            <span data-feather="plus"></span>
            Edit this User
        </a>
    </div>  
@endsection

@section('content')
    <div class="row mb-5">
        <div class="col-md-4 offset-md-6">
                @include ('_partials.errors')
                @include ('_partials.flash')
        </div>
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h4>{{ $user->fname }} {{ $user->lname }}</h4>
                    <p class="category">User details</p>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <p class="text-muted"><small>Name</small></p>
                            <p>{{ $user->fname }} {{ $user->lname }}</p>
                        </div>
                        <div class="col-md-12">
                            <p class="text-muted"><small>Email</small></p>
                            <p>{{ $user->email }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-header">
                    <h4 class="title">Assigned Roles</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            @if( $user->roles->count() == 0 ? 'This user does not have any roles assiged.' : '' )
                            @endif
                            <ul>
                                @foreach ($user->roles as $role)
                                    <li>{{ $role->display_name }} <em><small>{{ $role->description }}</small></em></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection