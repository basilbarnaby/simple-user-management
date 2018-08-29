@extends('layouts.auth')

@section('pageTitle')
    Login
@endsection

@section('pageHeader')
    Simple User Management
@endsection

@section('content')
    <div class="row mb-5">
        <div class="col-md-6 offset-md-3 col-lg-4 offset-lg-4">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="form-group mt-3">
                                <input type="email" class="form-control" name="email" placeholder="Email" required>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <input class="form-control" type="password" name="password" placeholder="Password">
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label text-muted" for="remember">
                                            Remember me
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row  mt-4 mb-3">
                                <div class="col-md-12">
                                    <input type="submit" value="Login" class="btn btn-lg btn-outline-success btn-block">
                                </div>
                            </div>
                        </form>
                        <div class="row">
                            <div class="col-md-12">
                                <a href="{{ route('password.request') }}" class=" btn btn-link float-right">Forgot Password?</a>
                                <a href="{{ route('register') }}" class="btn btn-link float-right">Register</a>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="row mt-3">
                <div class="col-md-12">
                    <p class="text-muted text-center"><strong>Test Admin Credentials</strong><br>Username: admin@example <br> Password: password</p>
                </div>
            </div>
        </div>
    </div>
    
@endsection