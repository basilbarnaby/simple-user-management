@extends('layouts.main')

@section('pageTitle')
    Create Users
@endsection

@section('pageHeader')
    Create Users
@endsection

@section('content')
    <div class="row mb-5" id="form">
        <div class="col-md-8 offset-md-2">
            <form action="{{ route('users.store') }}" method="POST">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h5>User details</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-md-6">
                                <input class="form-control" type="text" name="fname" placeholder="First Name" required>
                            </div>
                            <div class="col-md-6">
                                <input class="form-control" type="text" name="lname" placeholder="Last Name" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" placeholder="Email" required>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <input class="form-control" type="password" name="password" placeholder="Password" disabled>
                                <p class="text-muted"><small>User's password (123) will be set automatically for testing purposes.</small></p>
                            </div>
                            <div class="col-md-6">
                                <input class="form-control" type="password" name="confirm_password" placeholder="Confirm Password" disabled>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mt-4 ">
                    <div class="card-header bg-light">
                        <h5 class="title">Assign Permissions</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 label-on-left">
                                @foreach ($roles as $role)
                                    <div class="row">
                                        <div class="col-md-12 my-mb-p5">
                                            <div class="checkbox checkbox-inline">
                                                <label>
                                                    <input type="checkbox" name="create" value="{{ $role->id }}" v-model="rolesSelected"> {{ $role->display_name }} <em><small>({{ $role->description}})</small></em>
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
                                <input type="submit" value="Save User" class="btn btn-outline-success btn-block">
                            </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="roles" :value="rolesSelected">
            </form>
        </div>
    </div>
@endsection

@section('vue')
    <script>
        var app = new Vue({
            el: '#form',
            data: {
                rolesSelected: []
            }
        });
    </script>
@endsection