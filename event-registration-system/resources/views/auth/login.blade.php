@extends('layouts.app')

@section('title', 'Login - EventSmart')

@section('content')
<div class="container-fluid">
    <div class="row min-vh-100">
        <!-- Left Side - Hero Image -->
        <div class="col-lg-6 hero-section d-none d-lg-flex align-items-center justify-content-center text-white">
            <div class="text-center">
                <i class="fas fa-sign-in-alt mb-4" style="font-size: 6rem; opacity: 0.8;"></i>
                <h2 class="display-4 fw-bold mb-4">Welcome Back</h2>
                <p class="lead mb-4">Continue managing your events</p>
                <div class="row g-4 mt-5">
                    <div class="col-12">
                        <div class="card bg-transparent border-light">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <i class="fas fa-rocket me-2"></i>
                                    Quick Access To:
                                </h5>
                                <ul class="list-unstyled">
                                    <li><i class="fas fa-check me-2"></i>Event Dashboard</li>
                                    <li><i class="fas fa-check me-2"></i>Ticket Management</li>
                                    <li><i class="fas fa-check me-2"></i>Analytics & Reports</li>
                                    <li><i class="fas fa-check me-2"></i>Attendee Management</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Side - Login Form -->
        <div class="col-lg-6 d-flex align-items-center justify-content-center">
            <div class="w-100" style="max-width: 400px;">
                <div class="text-center mb-5">
                    <h1 class="h3 fw-bold">Sign In</h1>
                    <p class="text-muted">Enter your credentials to access your account</p>
                </div>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="fas fa-envelope"></i>
                            </span>
                            <input type="email" 
                                   class="form-control @error('email') is-invalid @enderror" 
                                   id="email" 
                                   name="email" 
                                   value="{{ old('email') }}" 
                                   required 
                                   autofocus 
                                   placeholder="Enter your email">
                        </div>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="fas fa-lock"></i>
                            </span>
                            <input type="password" 
                                   class="form-control @error('password') is-invalid @enderror" 
                                   id="password" 
                                   name="password" 
                                   required 
                                   placeholder="Enter your password">
                        </div>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Remember Me -->
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="remember" name="remember">
                        <label class="form-check-label" for="remember">
                            Remember me
                        </label>
                    </div>

                    <!-- Submit Button -->
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-gradient btn-lg">
                            <i class="fas fa-sign-in-alt me-2"></i>Sign In
                        </button>
                    </div>
                </form>

                <!-- Links -->
                <div class="text-center mt-4">
                    <p class="mb-2">
                        <a href="#" class="text-decoration-none">Forgot your password?</a>
                    </p>
                    <p class="text-muted">
                        Don't have an account? 
                        <a href="{{ route('register') }}" class="text-decoration-none fw-bold">
                            Sign up here
                        </a>
                    </p>
                </div>

                <!-- Divider -->
                <div class="text-center mt-4">
                    <div class="position-relative">
                        <hr>
                        <span class="position-absolute top-50 start-50 translate-middle bg-white px-3 text-muted">
                            or continue with
                        </span>
                    </div>
                </div>

                <!-- Social Login (Optional) -->
                <div class="row g-2 mt-3">
                    <div class="col-6">
                        <button type="button" class="btn btn-outline-primary w-100">
                            <i class="fab fa-google me-2"></i>Google
                        </button>
                    </div>
                    <div class="col-6">
                        <button type="button" class="btn btn-outline-dark w-100">
                            <i class="fab fa-github me-2"></i>GitHub
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
