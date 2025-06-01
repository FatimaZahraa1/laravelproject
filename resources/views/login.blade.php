@extends('layout')

@section('title', 'Login')

@section('content')
<div class="card shadow fade-in">
    <div class="card-body">
        <h4 class="mb-4 text-center">Welcome Back</h4>

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-3">
                <label class="form-label"><i class="bi bi-envelope-fill me-1"></i>Email address</label>
                <input type="email" name="email" class="form-control" placeholder="Enter your email address" required>
            </div>

            <div class="mb-3">
                <label class="form-label"><i class="bi bi-lock-fill me-1"></i>Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter your password" required>
            </div>

            <button type="submit" class="btn btn-success w-100 mt-3">Login</button>
        </form>

        <p class="text-center mt-3 mb-0">
            Don't have an account? <a href="{{ route('register') }}" class="text-success fw-semibold">Register here</a>
        </p>

    </div>
</div>
@endsection
