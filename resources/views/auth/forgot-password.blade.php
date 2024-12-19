@extends('auth.auth-layout')

@section('title', 'password reset page')

@section('auth-form')

    <h1>Forgot your password?</h1>
    <p class="account-subtitle">Enter your email to get the reset link</p>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <form action="{{ route('password.email') }}" method="POST">
        @csrf
        <div class="form-group">
            <input class="form-control" type="email" name="email" value="{{ old('email') }}" placeholder="Email"> </div>
        <div class="form-group mb-0">
            <button class="btn btn-primary btn-block" type="submit">Receive the link</button>
        </div>
    </form>
    <div class="text-center dont-have">Vous vous souvenez de votre mot de passe? <a href="{{ route('login') }}">Login</a></div>
    
@endsection