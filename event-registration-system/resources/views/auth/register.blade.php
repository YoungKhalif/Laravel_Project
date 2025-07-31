@extends('layouts.app')

@section('title', 'Register - EventSmart')

@section('content')
<div class="container-fluid">
    <div class="row min-vh-100">
        <!-- Left Side - Hero Image -->
        <div class="col-lg-6 gradient-bg d-none d-lg-flex align-items-center justify-content-center text-white">
            <div class="text-center">
                <i class="fas fa-user-plus mb-4" style="font-size: 6rem; opacity: 0.8;"></i>
                <h2 class="display-4 fw-bold mb-4">Join EventSmart</h2>
                <p class="lead mb-4">Start organizing amazing events today</p>
                <div class="row g-4 mt-5">
                    <div class="col-12">
                        <div class="card bg-transparent border-light">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <i class="fas fa-check-circle me-2"></i>
                                    What you get:
                                </h5>
                                <ul class="list-unstyled mt-3">
                                    <li class="mb-2">
                                        <i class="fas fa-star me-2 text-warning"></i>
                                        Free event creation
                                    </li>
                                    <li class="mb-2">
                                        <i class="fas fa-star me-2 text-warning"></i>
                                        Advanced ticketing system
                                    </li>
                                    <li class="mb-2">
                                        <i class="fas fa-star me-2 text-warning"></i>
                                        QR code generation
                                    </li>
                                    <li class="mb-2">
                                        <i class="fas fa-star me-2 text-warning"></i>
                                        Real-time analytics
                                    </li>
                                    <li class="mb-2">
                                        <i class="fas fa-star me-2 text-warning"></i>
                                        24/7 support
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Side - Registration Form -->
        <div class="col-lg-6 d-flex align-items-center justify-content-center bg-white">
            <div class="w-100" style="max-width: 500px;">
                <div class="text-center mb-5">
                    <h1 class="h3 fw-bold mb-3">Create Your Account</h1>
                    <p class="text-muted">Join thousands of event organizers</p>
                </div>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="row">
                        <!-- Name -->
                        <div class="col-md-6 mb-3">
                            <label for="name" class="form-label">Full Name</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fas fa-user text-muted"></i>
                                </span>
                                <input id="name" type="text"
                                       class="form-control @error('name') is-invalid @enderror"
                                       name="name"
                                       value="{{ old('name') }}"
                                       required
                                       autocomplete="name"
                                       autofocus
                                       placeholder="Enter your full name">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <!-- Phone -->
                        <div class="col-md-6 mb-3">
                            <label for="phone" class="form-label">Phone Number</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fas fa-phone text-muted"></i>
                                </span>
                                <input id="phone" type="tel"
                                       class="form-control @error('phone') is-invalid @enderror"
                                       name="phone"
                                       value="{{ old('phone') }}"
                                       placeholder="Enter your phone number">
                                @error('phone')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Email Address -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="fas fa-envelope text-muted"></i>
                            </span>
                            <input id="email" type="email"
                                   class="form-control @error('email') is-invalid @enderror"
                                   name="email"
                                   value="{{ old('email') }}"
                                   required
                                   autocomplete="email"
                                   placeholder="Enter your email address">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <!-- Password -->
                        <div class="col-md-6 mb-3">
                            <label for="password" class="form-label">Password</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fas fa-lock text-muted"></i>
                                </span>
                                <input id="password" type="password"
                                       class="form-control @error('password') is-invalid @enderror"
                                       name="password"
                                       required
                                       autocomplete="new-password"
                                       placeholder="Create a password">
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <!-- Confirm Password -->
                        <div class="col-md-6 mb-3">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fas fa-lock text-muted"></i>
                                </span>
                                <input id="password_confirmation" type="password"
                                       class="form-control"
                                       name="password_confirmation"
                                       required
                                       autocomplete="new-password"
                                       placeholder="Confirm your password">
                            </div>
                        </div>
                    </div>

                    <!-- User Type -->
                    <div class="mb-3">
                        <label class="form-label">I am registering as:</label>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="user_type" id="individual" value="individual" checked>
                                    <label class="form-check-label" for="individual">
                                        <i class="fas fa-user me-1"></i>Individual
                                    </label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="user_type" id="company" value="company">
                                    <label class="form-check-label" for="company">
                                        <i class="fas fa-building me-1"></i>Company
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Terms and Conditions -->
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="terms" id="terms" required>
                            <label class="form-check-label" for="terms">
                                I agree to the <a href="#" class="text-decoration-none">Terms of Service</a> and
                                <a href="#" class="text-decoration-none">Privacy Policy</a>
                            </label>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="d-grid mb-3">
                        <button type="submit" class="btn btn-gradient btn-lg">
                            <i class="fas fa-user-plus me-2"></i>Create Account
                        </button>
                    </div>
                </form>

                <hr class="my-4">

                <div class="text-center">
                    <p class="mb-0">Already have an account?
                        <a href="{{ route('login') }}" class="text-decoration-none fw-bold">
                            Sign in here
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
