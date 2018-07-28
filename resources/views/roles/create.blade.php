@extends('layouts.main')

@section('pageTitle')
    User Roles
@endsection

@section('pageHeader')
    Create a User Role
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
            <form action="{{ route('roles.store') }}" method="post">
                @csrf
                <div class="card">
                    <div class="card-header bg-secondary text-light">
                        <h5 class="title">Role Details</h5>
                    </div>
                    <div class="card-body">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Role Display Name</span>
                            </div>
                            <input type="text" name="display_name" value="{{ old('display_name') }}" class="form-control" required>
                        </div>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Slug</span>
                            </div>
                            <input type="text" name="name" value="{{ old('name') }}" class="form-control" required>
                        </div>
                        <div class="mb-3"><small class="text-muted mt-4">Hypens (-) used to separate words. Cannot be changed once saved.</small></div>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Description</span>
                            </div>
                            <input type="text" name="description" value="{{ old('description') }}" class="form-control" required>
                        </div>
                        <div class="mb-3"><small class="text-muted mt-4">Describes the type of role.</small></div>
                    </div>
                </div>
                <div class="card mt-4">
                    <div class="card-header bg-light">
                        <h5 class="title">Assign Permissions</h5>
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
                                <a href="{{ route('roles.index') }}" class="btn btn-outline-secondary btn-block">Cancel</a>
                            </div>
                            <div class="col-md-3">
                                <input type="submit" value="Save Role" class="btn btn-outline-success btn-block">
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
                permissionsSelected: []
            }
        });
    </script>
@endsection