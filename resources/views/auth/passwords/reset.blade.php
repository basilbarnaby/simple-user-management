@extends('layouts.auth')

@section('pageTitle')
    Resset Password
@endsection

@section('pageHeader')
    Reset Password
@endsection

@section('content')
    <div class="row mb-5">
        <div class="col-md-6 offset-md-3 col-lg-4 offset-lg-4">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('password.request') }}" method="POST">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="form-group mt-3">
                            <input type="email" class="form-control" name="email" placeholder="Email" required>
                            @if ($errors->has('email'))
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
                        <div class="row  mt-4 mb-3">
                            <div class="col-md-6 mb-3">
                                <a href="{{ route('login') }}" class="btn btn-outline-secondary btn-block">Cancel</a>
                            </div>
                            <div class="col-md-6">
                                <input type="submit" value="Reset" class="btn btn-outline-success btn-block">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection