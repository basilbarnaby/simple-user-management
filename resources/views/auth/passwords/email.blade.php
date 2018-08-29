@extends('layouts.auth')

@section('pageTitle')
    Forgot Password
@endsection

@section('pageHeader')
    Password Recovery
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6 offset-md-3 col-lg-4 offset-lg-4">
            @include('_partials.flash')
            @include('_partials.errors')
        </div> 
    </div>
    <div class="row mb-5">
        <div class="col-md-6 offset-md-3 col-lg-4 offset-lg-4">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('password.email') }}" method="POST">
                        @csrf
                        <div class="form-group mt-3">
                            <input type="email" class="form-control" name="email" placeholder="Email" required>
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="row  mt-4 mb-3">
                            <div class="col-md-12 col-lg-6 mb-3">
                                <a href="{{ route('login') }}" class="btn btn-outline-secondary btn-block">Cancel</a>
                            </div>
                            <div class="col-md-12 col-lg-6">
                                <input type="submit" value="Send Password Reset Link" class="btn btn-outline-success btn-block">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection