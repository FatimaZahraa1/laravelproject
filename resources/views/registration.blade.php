@extends('layout')

@section('title', 'Register')

@section('content')
<div class="card shadow fade-in">
    <div class="card-body">
        <h4 class="mb-4 text-center">Create an Account</h4>

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-3">
                <label class="form-label"><i class="bi bi-person-fill me-1"></i>Full Name</label>
                <input type="text" name="name" class="form-control" placeholder="Enter your full name" required>
            </div>

            <div class="mb-3">
                <label class="form-label"><i class="bi bi-envelope-fill me-1"></i>Email Address</label>
                <input type="email" name="email" class="form-control" placeholder="Enter a valid email" required>
            </div>

            <div class="mb-3">
                <label class="form-label"><i class="bi bi-lock-fill me-1"></i>Password</label>
                <input type="password" name="password" class="form-control" placeholder="Create a secure password" required>
            </div>

            <div class="mb-3">
                <label class="form-label"><i class="bi bi-lock-fill me-1"></i>Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-control" placeholder="Repeat your password" required>
            </div>

            <button type="submit" class="btn btn-success w-100 mt-3">Register</button>
        </form>

<p class="text-center mt-3 mb-0">
    Already have an account? <a href="{{ route('login') }}" class="text-success fw-semibold">Login here</a>
</p>

    </div>
</div>
@endsection
