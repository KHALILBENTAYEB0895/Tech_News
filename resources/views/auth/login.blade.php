@extends('auth.auth-layout')

@section('title', "Login Page")

@section('auth-form')
    <h1>Login</h1>
    @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="form-group">
            <input class="form-control" type="email" name="email" placeholder="Email">
        </div>
        <div class="form-group">
            <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" placeholder="Password">
        </div>
        <div class="form-group">
            <button class="btn btn-primary btn-block" type="submit">Login</button>
        </div>
    </form>
    <div class="text-center forgotpass"><a href="{{ route('password.request') }}">Forgot your password?</a> </div>

<div class="text-center dont-have">You don't have an account? <a href="{{ route('register') }}">Register</a></div>  
@endsection