<<<<<<< HEAD
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - EventPro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
    <style>
        :root {
            --primary: #6f42c1;
            --primary-dark: #5a32a3;
            --secondary: #ff6b6b;
            --accent: #4dabf7;
            --light-bg: #f8f9fa;
            --dark-text: #343a40;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #e4e7f1 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            padding: 20px 0;
            color: var(--dark-text);
        }

        .login-container {
            max-width: 1200px;
            margin: 0 auto;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
            border-radius: 20px;
            overflow: hidden;
            background: white;
        }

        .form-section {
            padding: 50px;
            background: white;
        }

        .image-section {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 30px;
            position: relative;
            overflow: hidden;
        }

        .image-section::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, rgba(255,255,255,0) 70%);
            transform: rotate(30deg);
        }

        .app-logo {
            color: white;
            font-weight: 700;
            font-size: 2.5rem;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .app-logo i {
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            padding: 15px;
        }

        .app-features {
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 30px;
        }

        .app-features li {
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .form-header {
            margin-bottom: 30px;
        }

        .form-header h2 {
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 10px;
        }

        .form-header p {
            color: #6c757d;
        }

        .form-control {
            padding: 12px 15px;
            border-radius: 10px;
            border: 2px solid #e9ecef;
            transition: all 0.3s;
        }

        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(111, 66, 193, 0.2);
        }

        .input-group-text {
            background: var(--light-bg);
            border: 2px solid #e9ecef;
            border-right: none;
            border-radius: 10px 0 0 10px !important;
        }

        .toggle-password {
            cursor: pointer;
            background: var(--light-bg);
            border: 2px solid #e9ecef;
            border-left: none;
            border-radius: 0 10px 10px 0 !important;
        }

        .btn-login {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            border: none;
            padding: 12px 20px;
            font-weight: 600;
            border-radius: 10px;
            transition: all 0.3s;
            color: white;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 7px 14px rgba(111, 66, 193, 0.3);
        }

        .social-divider {
            position: relative;
            text-align: center;
            margin: 25px 0;
        }

        .social-divider::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            height: 1px;
            background: #e9ecef;
            z-index: 1;
        }

        .social-divider span {
            position: relative;
            display: inline-block;
            padding: 0 15px;
            background: white;
            z-index: 2;
            color: #6c757d;
            font-size: 0.9rem;
        }

        .btn-social {
            border: 2px solid #e9ecef;
            border-radius: 10px;
            padding: 10px;
            font-weight: 500;
            transition: all 0.3s;
        }

        .btn-social:hover {
            border-color: var(--primary);
            color: var(--primary);
        }

        .forgot-link {
            color: var(--primary);
            text-decoration: none;
            transition: all 0.3s;
        }

        .forgot-link:hover {
            text-decoration: underline;
        }

        .remember-check {
            accent-color: var(--primary);
        }

        @media (max-width: 992px) {
            .image-section {
                display: none;
            }

            .form-section {
                padding: 30px;
            }
        }

        @media (max-width: 768px) {
            .social-buttons .col {
                margin-bottom: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="container login-container">
        <div class="row g-0">
            <!-- Image Section -->
            <div class="col-lg-5 d-none d-lg-block">
                <div class="image-section h-100">
                    <div class="text-center text-white">
                        <div class="app-logo">
                            <i class="fas fa-calendar-check"></i>
                            <span>EventPro</span>
                        </div>

                        <h3 class="mb-4">Smart Event Registration & Ticketing System</h3>

                        <ul class="app-features text-start">
                            <li><i class="fas fa-check-circle"></i> User registration and Login</li>
                            <li><i class="fas fa-check-circle"></i> Event Management</li>
                            <li><i class="fas fa-check-circle"></i> Register Event companies</li>
                            <li><i class="fas fa-check-circle"></i> Ticketing System</li>
                            <li><i class="fas fa-check-circle"></i> Generate Ticket with QR Code</li>
                            <li><i class="fas fa-check-circle"></i> Email and SMS notifications</li>
                            <li><i class="fas fa-check-circle"></i> Detailed Event Analytics</li>
                        </ul>

                        <img src="https://images.unsplash.com/photo-1511795409834-ef04bbd61622?auto=format&fit=crop&w=500" alt="Event Management" class="img-fluid rounded-3 shadow" style="max-width: 80%;">
                    </div>
                </div>
            </div>

            <!-- Form Section -->
            <div class="col-lg-7">
                <div class="form-section">
                    <div class="form-header text-center">
                        <h2>Welcome Back!</h2>
                        <p>Log in to access your EventPro account</p>
                    </div>

                    <form>
                        <!-- Email -->
                        <div class="mb-4">
                            <label for="email" class="form-label fw-medium">Email Address</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fas fa-envelope"></i>
                                </span>
                                <input type="email" class="form-control" id="email" placeholder="Enter your email">
                            </div>
                        </div>

                        <!-- Password -->
                        <div class="mb-4">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <label for="password" class="form-label fw-medium">Password</label>
                                <a href="#" class="forgot-link">Forgot Password?</a>
                            </div>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fas fa-lock"></i>
                                </span>
                                <input type="password" class="form-control" id="password" placeholder="Enter your password">
                                <span class="input-group-text toggle-password">
                                    <i class="fas fa-eye-slash"></i>
                                </span>
                            </div>
                        </div>

                        <!-- Remember Me -->
                        <div class="mb-4">
                            <div class="form-check">
                                <input class="form-check-input remember-check" type="checkbox" id="remember">
                                <label class="form-check-label" for="remember">
                                    Remember me
                                </label>
                            </div>
                        </div>

                        <!-- Login Button -->
                        <div class="mb-4">
                            <button type="submit" class="btn btn-login w-100 py-3">
                                <i class="fas fa-sign-in-alt me-2"></i>Log In
                            </button>
                        </div>

                        <!-- Social Login Divider -->
                        <div class="social-divider">
                            <span>Or continue with</span>
                        </div>

                        <!-- Social Login Options -->
                        <div class="row g-2 mb-4 social-buttons">
                            <div class="col">
                                <a href="#" class="btn btn-outline-secondary w-100 d-flex align-items-center justify-content-center gap-2">
                                    <i class="fab fa-google"></i> Google
                                </a>
                            </div>
                            <div class="col">
                                <a href="#" class="btn btn-outline-secondary w-100 d-flex align-items-center justify-content-center gap-2">
                                    <i class="fab fa-facebook-f"></i> Facebook
                                </a>
                            </div>
                            <div class="col">
                                <a href="#" class="btn btn-outline-secondary w-100 d-flex align-items-center justify-content-center gap-2">
                                    <i class="fab fa-apple"></i> Apple
                                </a>
                            </div>
                        </div>

                        <!-- Register Link -->
                        <div class="text-center">
                            <p class="mb-0">Don't have an account? <a href="{{ route('register') }}" class="text-primary fw-medium">Register Now</a></p>
                        </div>
                    </form>
=======
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
>>>>>>> 8a996aa7d56b8b38ce7291c226b99d292509af77
                </div>
            </div>
        </div>
    </div>
<<<<<<< HEAD

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Toggle password visibility
        document.querySelector('.toggle-password').addEventListener('click', function() {
            const passwordInput = document.querySelector('#password');
            const icon = this.querySelector('i');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            } else {
                passwordInput.type = 'password';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            }
        });

        // Add animation to form elements
        const inputs = document.querySelectorAll('.form-control');
        inputs.forEach(input => {
            input.addEventListener('focus', () => {
                input.parentElement.classList.add('shadow-sm');
            });

            input.addEventListener('blur', () => {
                input.parentElement.classList.remove('shadow-sm');
            });
        });
    </script>
</body>
</html>
=======
</div>
@endsection
>>>>>>> 8a996aa7d56b8b38ce7291c226b99d292509af77
