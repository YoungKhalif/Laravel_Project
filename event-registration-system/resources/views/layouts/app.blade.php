<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

<<<<<<< HEAD
    <title>@yield('title', 'Smart Event Registration & Ticketing System')</title>

    <!-- Fonts - Optimized loading -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Poppins:wght@500;600&display=swap" rel="stylesheet">

    <!-- Bootstrap 5 CSS - Minified -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Font Awesome - Optimized loading -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer">

    <!-- Optimized CSS -->
    <style>
        :root {
            --primary-color: #3b82f6;
            --primary-dark: #1d4ed8;
            --secondary-color: #8b5cf6;
            --success-color: #10b981;
            --danger-color: #ef4444;
            --warning-color: #f59e0b;
            --dark-color: #1f2937;
            --light-color: #f9fafb;
            --border-radius: 8px;
            --shadow-sm: 0 1px 2px 0 rgb(0 0 0 / 0.05);
            --shadow-md: 0 4px 6px -1px rgb(0 0 0 / 0.1);
            --shadow-lg: 0 10px 15px -3px rgb(0 0 0 / 0.1);
        }

        body {
            font-family: 'Inter', sans-serif;
            line-height: 1.6;
        }

        .font-poppins {
            font-family: 'Poppins', sans-serif;
        }

        /* Optimized Button Styles */
        .btn-primary-custom {
            background: var(--primary-color);
            border: none;
            color: white;
            font-weight: 500;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow-sm);
        }

        .btn-primary-custom:hover {
            background: var(--primary-dark);
            box-shadow: var(--shadow-md);
        }

        .btn-outline-primary-custom {
            border: 2px solid var(--primary-color);
            color: var(--primary-color);
            background: transparent;
            font-weight: 500;
            border-radius: var(--border-radius);
        }

        .btn-outline-primary-custom:hover {
            background: var(--primary-color);
            color: white;
        }

        /* Simplified Card Styles */
        .card {
            border-radius: var(--border-radius);
            border: none;
            box-shadow: var(--shadow-sm);
        }

        .card:hover {
            box-shadow: var(--shadow-md);
        }

        /* Text Gradient */
        .text-gradient {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* Minimal Loading Spinner */
        .spinner-border-sm {
            width: 1rem;
            height: 1rem;
        }

        /* Performance optimized utilities */
        .will-change-transform {
            will-change: transform;
        }

        .transition-fast {
            transition: all 0.15s ease;
        }

        .transition-normal {
            transition: all 0.3s ease;
        }

        /* Responsive utilities */
        @media (max-width: 768px) {
            .container-xl {
                padding: 0 1rem;
            }
=======
    <title>{{ config('app.name', 'Event Registration System') }} - @yield('title', 'Smart Event Management')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    
    <style>
        .navbar-brand {
            font-weight: 600;
            font-size: 1.5rem;
        }
        .hero-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 100px 0;
        }
        .card {
            transition: transform 0.3s ease;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .footer {
            background-color: #2c3e50;
            color: white;
            padding: 40px 0;
        }
        .event-card {
            border: none;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .btn-gradient {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            color: white;
        }
        .btn-gradient:hover {
            background: linear-gradient(135deg, #5a67d8 0%, #6b46c1 100%);
            color: white;
>>>>>>> 8a996aa7d56b8b38ce7291c226b99d292509af77
        }
    </style>

    @stack('styles')
</head>
<<<<<<< HEAD
<body class="bg-gray-50">
    <!-- Header -->
    @include('components.header')
=======
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <i class="fas fa-calendar-alt me-2"></i>
                EventPro
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('events.index') }}">
                            <i class="fas fa-calendar me-1"></i>Events
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('companies.index') }}">
                            <i class="fas fa-building me-1"></i>Companies
                        </a>
                    </li>
                </ul>
                
                <ul class="navbar-nav">
                    @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                                <i class="fas fa-user me-1"></i>{{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('dashboard') }}">
                                    <i class="fas fa-tachometer-alt me-2"></i>Dashboard
                                </a></li>
                                @if(Auth::user()->isOrganizer() || Auth::user()->isAdmin())
                                    <li><a class="dropdown-item" href="{{ route('events.my') }}">
                                        <i class="fas fa-calendar-plus me-2"></i>My Events
                                    </a></li>
                                    <li><a class="dropdown-item" href="{{ route('events.create') }}">
                                        <i class="fas fa-plus me-2"></i>Create Event
                                    </a></li>
                                @endif
                                <li><a class="dropdown-item" href="{{ route('tickets.my') }}">
                                    <i class="fas fa-ticket-alt me-2"></i>My Tickets
                                </a></li>
                                @if(Auth::user()->isAdmin())
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}">
                                        <i class="fas fa-cog me-2"></i>Admin Panel
                                    </a></li>
                                @endif
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}" class="d-inline">
                                        @csrf
                                        <button type="submit" class="dropdown-item">
                                            <i class="fas fa-sign-out-alt me-2"></i>Logout
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">
                                <i class="fas fa-sign-in-alt me-1"></i>Login
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">
                                <i class="fas fa-user-plus me-1"></i>Register
                            </a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <!-- Flash Messages -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fas fa-exclamation-triangle me-2"></i>
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif
>>>>>>> 8a996aa7d56b8b38ce7291c226b99d292509af77

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
<<<<<<< HEAD
    @include('components.footer')

    <!-- Optimized Scripts -->
    <!-- Bootstrap 5 JS - Async loading -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" async></script>

    <!-- Alpine.js - Essential for interactivity -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Optimized Custom JS -->
    <script>
        // Navbar scroll effect - debounced
        let scrollTimer;
        window.addEventListener('scroll', function() {
            clearTimeout(scrollTimer);
            scrollTimer = setTimeout(function() {
                const navbar = document.querySelector('.navbar-custom');
                if (navbar) {
                    navbar.classList.toggle('scrolled', window.scrollY > 50);
                }
            }, 10);
        });

        // Simple toast function
        window.showToast = function(message, type = 'success') {
            const toast = document.createElement('div');
            toast.className = `alert alert-${type} position-fixed top-0 end-0 m-3`;
            toast.style.zIndex = '9999';
            toast.textContent = message;
            document.body.appendChild(toast);

            setTimeout(() => toast.remove(), 3000);
        };
    </script>

=======
    <footer class="footer mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5><i class="fas fa-calendar-alt me-2"></i>EventPro</h5>
                    <p>Your premier destination for event management and ticketing solutions.</p>
                </div>
                <div class="col-md-4">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('events.index') }}" class="text-light">Browse Events</a></li>
                        <li><a href="{{ route('companies.index') }}" class="text-light">Companies</a></li>
                        <li><a href="{{ route('companies.create') }}" class="text-light">Register Company</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Contact</h5>
                    <p><i class="fas fa-envelope me-2"></i>info@eventpro.com</p>
                    <p><i class="fas fa-phone me-2"></i>+1 (555) 123-4567</p>
                </div>
            </div>
            <hr>
            <div class="text-center">
                <p>&copy; {{ date('Y') }} EventPro. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
>>>>>>> 8a996aa7d56b8b38ce7291c226b99d292509af77
    @stack('scripts')
</body>
</html>
