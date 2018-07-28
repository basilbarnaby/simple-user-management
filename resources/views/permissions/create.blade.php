@extends('layouts.main')

@section('pageTitle')
    User Permissions
@endsection

@section('pageHeader')
    Create a User Permission
@endsection

@section('content')
    <div class="row">
        <div class="col-md-4 offset-md-6">
            @include('_partials.flash')
            @include('_partials.errors')
        </div>
    </div>
    <div class="row mb-5" id="form">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header bg-secondary text-light">
                    <h5>Permissions details</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('permissions.store') }}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="permissionType" value="basic" checked="true" v-model="permissionType">
                                    <label class="form-check-label" for="permissionType">Basic Permission</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="permissionType" value="crud" v-model="permissionType">
                                    <label class="form-check-label" for="permissionType">CRUD Permission</label>
                                </div>
                            </div>
                        </div>
                        <div class="row my-mb-1" v-if="permissionType == 'basic'">
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">Name (Display Name)</label>
                                    <input type="text" name="display_name" class="form-control" value="{{ old('display_name') }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row my-mb-1" v-if="permissionType == 'basic'">
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">Slug</label>
                                    <input type="text" name="name" class="form-control" value="{{  old('name') }}" required>
                                    <small class="text-muted">Hypens (-) used to separate words. Cannot be changed once saved.</small>
                                </div>
                            </div>
                        </div>
                        <div class="row my-mb-1" v-if="permissionType == 'basic'">
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">Description</label>
                                    <input type="text" name="description" class="form-control" value="{{  old('description') }}" required>
                                    <small class="text-muted">Describe what this permission does.</small>
                                </div>
                            </div>
                        </div>
                        <div class="row my-mb-1" v-if="permissionType == 'crud'">
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">Resource</label>
                                    <input type="text" name="resource" id="resource" class="form-control" value="{{  old('resource') }}" required v-model="resource">
                                    <small class="text-muted">The name of the resource (must be lowercase and plural).</small>
                                </div>
                            </div>
                        </div>

                        <div class="row" v-if="permissionType == 'crud'">
                            <div class="col-md-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="create" value="create" v-model="crudSelected">
                                    <label class="form-check-label" for="defaultCheck1">
                                        Create
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="read" value="read" v-model="crudSelected">
                                    <label class="form-check-label" for="defaultCheck1">
                                        Read
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="update" value="update" v-model="crudSelected">
                                    <label class="form-check-label" for="defaultCheck1">
                                        Update
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="delete" value="delete" v-model="crudSelected">
                                    <label class="form-check-label" for="defaultCheck1">
                                        Delete
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 offset-md-6">
                                <a href="{{ route('permissions.index') }}" class="btn btn-outline-secondary btn-block">Cancel</a>
                            </div>
                            <div class="col-md-3">
                                <input type="submit" value="Save permissions" class="btn btn-outline-success btn-block">
                            </div>
                        </div>
                        <input type="hidden" name="crud_selected" :value="crudSelected">
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>

            <div class="card mt-3" v-if="permissionType == 'crud'">
                <div class="card-header">
                    <h5 class="text-muted">Permissions that will be created</h5>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Description</th>
                        </thead>
                        <tbody v-if="resource.length >= 3">
                            <tr v-for="item in crudSelected">
                                <td v-text="crudName(item)"></td>
                                <td v-text="crudSlug(item)"></td>
                                <td v-text="crudDescription(item)"></td>
                            </tr>
                        </tbody>
                    </table>
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