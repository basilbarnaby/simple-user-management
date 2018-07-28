@extends('layouts.main')

@section('pageTitle')
    User Permissions
@endsection

@section('pageHeader')
    Edit User Permission
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
            <div class="card">
                <div class="card-header">
                    <h5 class="title">Edit Permission: {{ $permission->display_name }}</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('permissions.update', $permission->id) }}" method="POST">
                        <input name="_method" type="hidden" value="PUT">
                        @csrf
                        <div class="row mb-1">
                            <div class="col-md-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Permission Display Name</span>
                                    </div>
                                    <input type="text" class="form-control" name="display_name" value="{{ $permission->display_name }} " required>
                                </div>
                            </div>
                        </div>
                        <div class="row" >
                            <div class="col-md-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Slug</span>
                                    </div>
                                    <input type="text" class="form-control" name="name" value="{{ $permission->name }}" required disabled>
                                </div>
                                <div class="mb-3"><small class="text-muted">Cannot be changed.</small></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Description</span>
                                    </div>
                                    <input type="text" class="form-control" name="description" value="{{ $permission->description }}" required>
                                </div>
                                <div class="mb-3"><small class="text-muted">Describe what this permission does.</small></div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-3 offset-md-6">
                                <a href="{{ route('permissions.index')}}" class="btn btn-outline-secondary btn-block">Cancel</a>
                            </div>
                            <div class="col-md-3">
                                <input type="submit" value="Update" class="btn btn-outline-success btn-block">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('vue')
<script>
        var app = new Vue({
            el: '#form',
            data: {
                permissionType: 'basic',
                resource: '',
                crudSelected: ['create', 'read', 'update', 'delete']
            },
            methods: {
                crudName: function(item) {
                    return item.substr(0,1).toUpperCase() + item.substr(1) + " " + app.resource.substr(0,1).toUpperCase() + app.resource.substr(1); 
                },
                crudSlug: function(item) {
                    return item.toLowerCase() + "-" + app.resource.toLowerCase();
                },
                crudDescription: function(item) {
                    return "Allow a User to " + item.toUpperCase() + " " + app.resource.substr(0,1).toUpperCase() + app.resource.substr(1);
                }
            }
        });
    </script>
@endsection