@extends('layouts.main')

@section('pageTitle')
    User Roles
@endsection

@section('pageHeader')
    Edit User Role
@endsection

@section('content')
    <div class="row">
        <div class="col-md-4 offset-md-6">
            @include('_partials.flash')
            @include('_partials.errors')
        </div>
    </div>
    <div class="row" id="form">
        <div class="col-md-8 offset-md-2">
            <form action="{{ route('roles.update', $role->id) }}" method="POST">
                <input name="_method" type="hidden" value="PUT">
                @csrf
                <div class="card">
                    <div class="card-header bg-secondary text-light">
                        <h5 class="title">Edit Role: {{ $role->display_name}}</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Role Display Name</span>
                                    </div>
                                    <input type="text" name="display_name" value="{{ $role->display_name }}" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Slug</span>
                                    </div>
                                    <input type="text" name="slug" value="{{ $role->name }}" class="form-control" required disabled>
                                </div>
                                <div class="mb-3"><small class="text-muted">Cannot be changed once saved.</small></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Description</span>
                                    </div>
                                    <input type="text" name="description" value="{{ $role->description }}" class="form-control" required>
                                </div>
                                <div class="mb-3"><small class="text-muted">Describes the type of role.</small></div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-header">
                        <h5 class="title">Assigned Permissions</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 label-on-left">
                                @foreach ($permissions as $permission)
                                    <div class="row">
                                        <div class="col-md-12 my-mb-p5">
                                            <div class="checkbox checkbox-inline">
                                                <label>
                                                    <input type="checkbox" name="create" value="{{ $permission->id }}" v-model="permissionsSelected"> {{ $permission->display_name }} <em><small>({{ $permission->description}})</small></em>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 offset-md-6">
                                <a href="{{ url()->previous() }}" class="btn btn-outline-secondary btn-block">Cancel</a>
                            </div>
                            <div class="col-md-3">
                                <input type="submit" value="Update" class="btn btn-outline-success btn-block">
                            </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="permissions" :value="permissionsSelected">
            </form>
        </div>
    </div>
@endsection

@section('vue')
    <script>
        var app = new Vue({
            el: '#form',
            data: {
                permissionsSelected: {!!$role->permissions->pluck('id')!!}
            }
        });
    </script>
@endsection