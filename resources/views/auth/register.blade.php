@extends('auth.auth-layout')

@section('title', "Register Page")

@section('auth-form')
<h1 class="mb-3">S'inscrire</h1>
<form action="{{ route('register') }}" method="POST">
    @csrf
    <div class="form-group">
        <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" placeholder="Name">
        @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" placeholder="Email">
        @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" placeholder="Password">
        @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <input class="form-control @error('password_confirmation') is-invalid @enderror" type="password" name="password_confirmation" placeholder="Confirm Password">
        @error('password_confirmation')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group mb-0">
        <button class="btn btn-primary btn-block" type="submit">S'inscrire</button>
    </div>
</form>

<div class="text-center dont-have">Vous avez deja un compte? <a href="login.html">Se connecter</a> </div>
@endsection