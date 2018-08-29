@extends('layouts.auth')

@section('pageTitle')
    Registration
@endsection

@section('pageHeader')
    User Registration
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
            @include('_partials.flash')
            @include('_partials.errors')
        </div> 
    </div>
    <div class="row mb-5">
        <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
            <div class="card">
                <div class="card-header">
                    <h5>User details</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-6 mb-3">
                                <input class="form-control" type="text" name="fname" placeholder="First Name" required>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('fname') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <input class="form-control" type="text" name="lname" placeholder="Last Name" required>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('lname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" placeholder="Email" required>
                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <input class="form-control" type="password" name="password" placeholder="Password">
                                <p class="text-muted"><small>User's password must be atleast six (6) characters in length.</small></p>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <input class="form-control" type="password" name="password_confirmation" placeholder="Confirm Password">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 offset-md-6 mb-3">
                                <a href="{{ route('login') }}" class="btn btn-outline-secondary btn-block">Cancel</a>
                            </div>
                            <div class="col-md-3">
                                <input type="submit" value="Register" class="btn btn-outline-success btn-block">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection