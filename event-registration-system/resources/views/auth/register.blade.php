<<<<<<< HEAD
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - EventPro</title>
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

        .registration-container {
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

        .form-control, .form-select {
            padding: 12px 15px;
            border-radius: 10px;
            border: 2px solid #e9ecef;
            transition: all 0.3s;
        }

        .form-control:focus, .form-select:focus {
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

        .user-type-card {
            transition: all 0.3s ease;
            border: 2px solid #e9ecef;
            border-radius: 12px;
            overflow: hidden;
            height: 100%;
            text-align: center;
            padding: 20px 10px;
            cursor: pointer;
        }

        .user-type-card:hover, .user-type-card.active {
            border-color: var(--primary);
            background-color: rgba(111, 66, 193, 0.05);
        }

        .user-type-card i {
            font-size: 2rem;
            margin-bottom: 15px;
            color: var(--primary);
            background: rgba(111, 66, 193, 0.1);
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            margin: 0 auto 15px;
        }

        .user-type-card .title {
            font-weight: 600;
            margin-bottom: 5px;
        }

        .user-type-card .desc {
            font-size: 0.85rem;
            color: #6c757d;
        }

        .btn-register {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            border: none;
            padding: 12px 20px;
            font-weight: 600;
            border-radius: 10px;
            transition: all 0.3s;
        }

        .btn-register:hover {
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

        .organizer-fields {
            background: rgba(111, 66, 193, 0.03);
            border-radius: 12px;
            padding: 20px;
            border-left: 3px solid var(--primary);
            margin: 20px 0;
        }

        .invalid-feedback {
            display: block;
            width: 100%;
            margin-top: 0.25rem;
            font-size: 0.875rem;
            color: #dc3545;
        }

        .form-control.is-invalid, .form-select.is-invalid {
            border-color: #dc3545;
        }

        .alert {
            border-radius: 10px;
            border: none;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
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
            .social-buttons .col-md-4 {
                margin-bottom: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="container registration-container">
        <div class="row g-0">
            <div class="col-lg-7">
                <div class="form-section">
                    <div class="form-header">
                        <h2>Create Your Account</h2>
                        <p>Join EventPro and start managing amazing events</p>
                    </div>

                    <!-- Display Validation Errors -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <h6><i class="fas fa-exclamation-triangle me-2"></i>Please fix the following errors:</h6>
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="row">
                            <!-- Name -->
                            <div class="col-md-6 mb-4">
                                <label for="name" class="form-label fw-medium">Full Name</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fas fa-user"></i>
                                    </span>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                           id="name" name="name" value="{{ old('name') }}"
                                           placeholder="Enter your full name" required>
                                </div>
                                @error('name')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Email -->
                            <div class="col-md-6 mb-4">
                                <label for="email" class="form-label fw-medium">Email Address</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fas fa-envelope"></i>
                                    </span>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                           id="email" name="email" value="{{ old('email') }}"
                                           placeholder="Enter your email" required>
                                </div>
                                @error('email')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Phone -->
                            <div class="col-md-6 mb-4">
                                <label for="phone" class="form-label fw-medium">Phone Number</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fas fa-phone"></i>
                                    </span>
                                    <input type="tel" class="form-control @error('phone') is-invalid @enderror"
                                           id="phone" name="phone" value="{{ old('phone') }}"
                                           placeholder="Enter your phone" required>
                                </div>
                                @error('phone')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Date of Birth -->
                            <div class="col-md-6 mb-4">
                                <label for="date_of_birth" class="form-label fw-medium">Date of Birth</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fas fa-calendar-alt"></i>
                                    </span>
                                    <input type="date" class="form-control @error('date_of_birth') is-invalid @enderror"
                                           id="date_of_birth" name="date_of_birth" value="{{ old('date_of_birth') }}" required>
                                </div>
                                @error('date_of_birth')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Password -->
                            <div class="col-md-6 mb-4">
                                <label for="password" class="form-label fw-medium">Password</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fas fa-lock"></i>
                                    </span>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                           id="password" name="password" placeholder="Create password" required>
                                    <span class="input-group-text toggle-password">
                                        <i class="fas fa-eye-slash"></i>
                                    </span>
                                </div>
                                <small class="text-muted">Must be at least 8 characters with letters, numbers and symbols</small>
                                @error('password')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Password Confirmation -->
                            <div class="col-md-6 mb-4">
                                <label for="password_confirmation" class="form-label fw-medium">Confirm Password</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fas fa-lock"></i>
                                    </span>
                                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                                           id="password_confirmation" name="password_confirmation"
                                           placeholder="Confirm password" required>
                                    <span class="input-group-text toggle-confirm-password">
                                        <i class="fas fa-eye-slash"></i>
                                    </span>
                                </div>
                                @error('password_confirmation')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- User Type -->
                        <div class="mb-4">
                            <label class="form-label fw-medium">I am registering as:</label>
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <div class="user-type-card {{ old('user_type', 'attendee') == 'attendee' ? 'active' : '' }}" data-type="attendee">
                                        <i class="fas fa-user-friends"></i>
                                        <div class="title">Attendee</div>
                                        <div class="desc">Discover and attend events</div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="user-type-card {{ old('user_type') == 'organizer' ? 'active' : '' }}" data-type="organizer">
                                        <i class="fas fa-user-tie"></i>
                                        <div class="title">Organizer</div>
                                        <div class="desc">Create and manage events</div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="user-type-card {{ old('user_type') == 'company' ? 'active' : '' }}" data-type="company">
                                        <i class="fas fa-building"></i>
                                        <div class="title">Company</div>
                                        <div class="desc">Represent an organization</div>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="user_type" id="user_type" value="{{ old('user_type', 'attendee') }}">
                            @error('user_type')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Organizer Additional Fields (Hidden by default) -->
                        <div id="organizerFields" class="organizer-fields" style="display: {{ in_array(old('user_type'), ['organizer', 'company']) ? 'block' : 'none' }};">
                            <h5 class="mb-4"><i class="fas fa-building me-2"></i>Organization Information</h5>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="company_name" class="form-label fw-medium">Company/Organization Name</label>
                                    <input type="text" class="form-control @error('company_name') is-invalid @enderror"
                                           id="company_name" name="company_name" value="{{ old('company_name') }}"
                                           placeholder="Enter company name">
                                    @error('company_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="contact_person" class="form-label fw-medium">Contact Person</label>
                                    <input type="text" class="form-control @error('contact_person') is-invalid @enderror"
                                           id="contact_person" name="contact_person" value="{{ old('contact_person') }}"
                                           placeholder="Contact person name">
                                    @error('contact_person')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="website" class="form-label fw-medium">Website</label>
                                    <input type="url" class="form-control @error('website') is-invalid @enderror"
                                           id="website" name="website" value="{{ old('website') }}"
                                           placeholder="https://yourcompany.com">
                                    @error('website')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="location" class="form-label fw-medium">Location</label>
                                    <input type="text" class="form-control @error('location') is-invalid @enderror"
                                           id="location" name="location" value="{{ old('location') }}"
                                           placeholder="City, Country">
                                    @error('location')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="description" class="form-label fw-medium">Description</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror"
                                              id="description" name="description" rows="2"
                                              placeholder="Brief description of your organization">{{ old('description') }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Terms and Conditions -->
                        <div class="mb-4">
                            <div class="form-check">
                                <input class="form-check-input @error('terms') is-invalid @enderror"
                                       type="checkbox" id="terms" name="terms" value="1"
                                       {{ old('terms') ? 'checked' : '' }} required>
                                <label class="form-check-label" for="terms">
                                    I agree to the <a href="#" class="text-primary">Terms of Service</a> and <a href="#" class="text-primary">Privacy Policy</a>
                                </label>
                                @error('terms')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Register Button -->
                        <div class="mb-4">
                            <button type="submit" class="btn btn-register w-100 py-3">
                                <i class="fas fa-user-plus me-2"></i>Create Account
                            </button>
                        </div>

                        <!-- Social Login Divider -->
                        <div class="social-divider">
                            <span>Or register with</span>
                        </div>

                        <!-- Social Login Options -->
                        <div class="row g-2 mb-4 social-buttons">
                            <div class="col-md-4">
                                <a href="#" class="btn btn-outline-secondary w-100 d-flex align-items-center justify-content-center gap-2">
                                    <i class="fab fa-google"></i> Google
                                </a>
                            </div>
                            <div class="col-md-4">
                                <a href="#" class="btn btn-outline-secondary w-100 d-flex align-items-center justify-content-center gap-2">
                                    <i class="fab fa-facebook-f"></i> Facebook
                                </a>
                            </div>
                            <div class="col-md-4">
                                <a href="#" class="btn btn-outline-secondary w-100 d-flex align-items-center justify-content-center gap-2">
                                    <i class="fab fa-apple"></i> Apple
                                </a>
                            </div>
                        </div>

                        <!-- Login Link -->
                        <div class="text-center">
                            <p class="mb-0">Already have an account? <a href="{{ route('login') }}" class="text-primary fw-medium">Log In</a></p>
                        </div>
                    </form>
                </div>
            </div>

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
=======
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
>>>>>>> 8a996aa7d56b8b38ce7291c226b99d292509af77
                    </div>
                </div>
            </div>
        </div>
<<<<<<< HEAD
    </div>

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

        // Toggle confirm password visibility
        document.querySelector('.toggle-confirm-password').addEventListener('click', function() {
            const passwordInput = document.querySelector('#password_confirmation');
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

        // User type selection
        const userTypeCards = document.querySelectorAll('.user-type-card');
        const userTypeField = document.getElementById('user_type');
        const organizerFields = document.getElementById('organizerFields');

        userTypeCards.forEach(card => {
            card.addEventListener('click', function() {
                // Remove active class from all cards
                userTypeCards.forEach(c => c.classList.remove('active'));

                // Add active class to clicked card
                this.classList.add('active');

                // Update hidden field value
                const userType = this.getAttribute('data-type');
                userTypeField.value = userType;

                // Show/hide organizer fields and update required attributes
                if (userType === 'organizer' || userType === 'company') {
                    organizerFields.style.display = 'block';
                    // Make organizer fields required
                    document.getElementById('company_name').required = true;
                    document.getElementById('contact_person').required = true;
                    document.getElementById('location').required = true;
                } else {
                    organizerFields.style.display = 'none';
                    // Remove required attribute from organizer fields
                    document.getElementById('company_name').required = false;
                    document.getElementById('contact_person').required = false;
                    document.getElementById('location').required = false;
                }
            });
        });

        // Initialize the form based on current selection
        document.addEventListener('DOMContentLoaded', function() {
            const activeCard = document.querySelector('.user-type-card.active');
            if (activeCard) {
                const userType = activeCard.getAttribute('data-type');
                if (userType === 'organizer' || userType === 'company') {
                    organizerFields.style.display = 'block';
                    document.getElementById('company_name').required = true;
                    document.getElementById('contact_person').required = true;
                    document.getElementById('location').required = true;
                }
            }
        });

        // Form validation
        document.querySelector('form').addEventListener('submit', function(e) {
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('password_confirmation').value;
            const terms = document.getElementById('terms').checked;

            if (password !== confirmPassword) {
                e.preventDefault();
                alert('Passwords do not match!');
                return false;
            }

            if (!terms) {
                e.preventDefault();
                alert('Please accept the Terms of Service and Privacy Policy to continue.');
                return false;
            }

            // Show loading state
            const submitBtn = this.querySelector('button[type="submit"]');
            if (submitBtn) {
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Creating Account...';
                submitBtn.disabled = true;
            }
        });
    </script>
</body>
</html>
=======

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
>>>>>>> 8a996aa7d56b8b38ce7291c226b99d292509af77
