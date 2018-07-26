@extends('layouts.main')

@section('pageTitle')
    Users
@endsection

@section('pageHeader')
    Users
@endsection

@section('content')
    <div class="row">
        <div class="col-md-3 offset-md-9">
            <a href="{{ route('users.create') }}" class="btn  btn-block btn-primary">
                <span data-feather="add"></span>
                Add User
            </a>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-12">
            <table class="table table-sm table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                        <th scope="col" class="text-right">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                        <td>@mdo</td>
                        <td class="text-right">@mdo</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    
@endsection