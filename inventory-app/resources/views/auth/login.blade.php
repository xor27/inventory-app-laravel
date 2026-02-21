@extends('layouts.auth')

@section('content')
<h4 class="text-center mb-3">Login</h4>

@if(session('status'))
    <div class="alert alert-success">{{ session('status') }}</div>
@endif

<form method="POST" action="{{ route('login') }}">
    @csrf

    <div class="mb-3">
        <label>Email</label>
        <input type="email"
               name="email"
               class="form-control"
               value="{{ old('email') }}"
               required autofocus>
    </div>

    <div class="mb-3">
        <label>Password</label>
        <input type="password"
               name="password"
               class="form-control"
               required>
    </div>

    <div class="mb-3 d-flex justify-content-between align-items-center">
        <div>
            <input type="checkbox" name="remember">
            Remember me
        </div>

        <a href="{{ route('password.request') }}" class="small">
            Forgot password?
        </a>
    </div>

    <button class="btn btn-primary w-100">
        Login
    </button>
</form>

<div class="text-center mt-3">
    <small>
        Don’t have an account?
        <a href="{{ route('register') }}">Register</a>
    </small>
</div>
@endsection