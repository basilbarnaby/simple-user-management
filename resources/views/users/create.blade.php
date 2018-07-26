@extends('layouts.main')

@section('pageTitle')
    Create Users
@endsection

@section('pageHeader')
    Create Users
@endsection

@section('content')
    <div class="row mt-5">
        <div class="col-md-8 offset-md-2">
            <form action="POST" method="{{ route('users.store') }}">
                @csrf
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
                        <p class="text-muted"><small>User's password will be set automatically for testing purposes.</small></p>
                    </div>
                    <div class="col-md-6">
                        <input class="form-control" type="password" name="confirm_password" placeholder="Confirm Password" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <h5>Assign Role(s)</h6>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-3 offset-md-9">
                        <input type="submit" value="Save" class="btn btn-block btn-success">
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection