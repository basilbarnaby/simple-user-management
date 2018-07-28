@extends('layouts.main')

@section('pageTitle')
    Users
@endsection

@section('pageHeader')
    Edit User
@endsection

@section('topButtons')
    <div class="btn-toolbar mb-2 mb-md-0">
        <a class="btn btn-sm btn-outline-secondary mr-2" href="{{ route('users.index') }}">
            <span data-feather="chevron-left"></span>
            Back to Users
        </a>
    </div>  
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6 offset-md-4">
            @include('_partials.flash')
            @include('_partials.errors')
        </div>
    </div>
    <div class="row" id="form">
        <div class="col-md-8 offset-md-2">
        <form action="{{ route('users.update', $user->id) }}" method="POST">
            <input name="_method" type="hidden" value="PUT">
            @csrf
                <div class="card">
                    <div class="card-header">
                        <h4 class="title">{{ $user->fname }} {{ $user->lname }}</h4>
                        <p class="category-custom">Edit user details</p>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-md-6">
                                <input class="form-control" type="text" name="fname" value="{{ $user->fname }}" placeholder="First Name" required>
                            </div>
                            <div class="col-md-6">
                                <input class="form-control" type="text" name="lname" value="{{ $user->lname }}" placeholder="Last Name" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" value="{{ $user->email }}" placeholder="Email" required>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-2">
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="password_options" value="keep" checked="true" v-model="password_options"> Do Not Change Password
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="password_options" value="manual" v-model="password_options"> Manually Set New Password
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="input-group mb-3" v-if="password_options == 'manual'">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">New Password</span>
                                    </div>
                                    <input type="text" name="password" id="password" class="form-control" required>
                                </div>
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
                            <div class="col-md-12 label-on-left">
                                @foreach ($roles as $role)
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="checkbox checkbox-inline">
                                                <label>
                                                    <input type="checkbox" name="create" value="{{ $role->id }}" v-model="rolesSelected"> {{ $role->display_name }} <em><small>({{ $role->description}})</small></em>
                                                    <input type="hidden" name="roles" :value="rolesSelected">
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
            </form>
        </div>
    </div>
@endsection

@section('vue')
    <script>
        var app = new Vue({
            el: '#form',
            data: {
                password_options: 'keep',
                rolesSelected: {!! $user->roles->pluck('id') !!}
            }
        });
    </script>
@endsection