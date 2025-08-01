<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EventPro - Premium Event Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://unpkg.com/alpinejs" defer></script>
    <style>
        :root {
            --primary: #6366f1;
            --primary-dark: #4f46e5;
            --primary-light: #c7d2fe;
            --secondary: #ec4899;
            --dark: #1e293b;
            --light: #f8fafc;
            --gray: #94a3b8;
            --success: #10b981;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: #f1f5f9;
        }

        /* Premium Navbar Styles */
        .navbar-premium {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(226, 232, 240, 0.5);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            padding: 0.8rem 0;
            z-index: 1030;
        }

        .navbar-premium.scrolled {
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.08);
        }

        .brand-gradient {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: 800;
            letter-spacing: -0.5px;
        }

        .nav-item .nav-link {
            color: var(--dark);
            font-weight: 500;
            padding: 0.5rem 1.2rem;
            border-radius: 50px;
            transition: all 0.3s ease;
            position: relative;
        }

        .nav-item .nav-link:hover,
        .nav-item .nav-link.active {
            color: var(--primary-dark);
            background: rgba(99, 102, 241, 0.08);
        }

        .nav-item .nav-link.active:after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 50%;
            transform: translateX(-50%);
            width: 5px;
            height: 5px;
            background: var(--primary);
            border-radius: 50%;
        }

        /* Buttons */
        .btn-primary-custom {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            border: none;
            color: white;
            border-radius: 50px;
            padding: 0.5rem 1.5rem;
            font-weight: 500;
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px rgba(99, 102, 241, 0.15);
        }

        .btn-primary-custom:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(99, 102, 241, 0.25);
        }

        .btn-outline-custom {
            border: 1px solid var(--primary);
            color: var(--primary);
            border-radius: 50px;
            padding: 0.5rem 1.5rem;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-outline-custom:hover {
            background: rgba(99, 102, 241, 0.1);
            color: var(--primary-dark);
        }

        /* User Menu */
        .user-avatar {
            width: 36px;
            height: 36px;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            font-weight: 600;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
        }

        .dropdown-menu-premium {
            border-radius: 16px;
            border: none;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            padding: 1rem 0;
            min-width: 240px;
            margin-top: 0.75rem;
        }

        .dropdown-item-premium {
            padding: 0.7rem 1.5rem;
            border-radius: 10px;
            margin: 0 0.5rem;
            font-weight: 500;
            color: var(--dark);
            transition: all 0.2s ease;
        }

        .dropdown-item-premium:hover {
            background: rgba(99, 102, 241, 0.08);
            color: var(--primary-dark);
        }

        /* Mobile Menu */
        .mobile-menu {
            position: fixed;
            top: 0;
            right: 0;
            width: 85%;
            max-width: 320px;
            height: 100vh;
            background: white;
            z-index: 1050;
            transform: translateX(100%);
            transition: transform 0.4s cubic-bezier(0.23, 1, 0.32, 1);
            box-shadow: -10px 0 50px rgba(0, 0, 0, 0.1);
            padding: 1.5rem;
            overflow-y: auto;
        }

        .mobile-menu.open {
            transform: translateX(0);
        }

        .mobile-backdrop {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1040;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }

        .mobile-backdrop.show {
            opacity: 1;
            visibility: visible;
        }

        /* Hamburger Icon */
        .hamburger {
            width: 28px;
            height: 20px;
            position: relative;
            cursor: pointer;
            z-index: 1051;
        }

        .hamburger span {
            display: block;
            position: absolute;
            height: 2px;
            width: 100%;
            background: var(--dark);
            border-radius: 2px;
            left: 0;
            transition: all 0.3s ease;
        }

        .hamburger span:nth-child(1) { top: 0; }
        .hamburger span:nth-child(2) { top: 8px; width: 80%; }
        .hamburger span:nth-child(3) { top: 16px; width: 60%; }

        .hamburger.active span:nth-child(1) {
            top: 8px;
            transform: rotate(45deg);
        }

        .hamburger.active span:nth-child(2) {
            opacity: 0;
        }

        .hamburger.active span:nth-child(3) {
            top: 8px;
            width: 100%;
            transform: rotate(-45deg);
        }

        /* Content Spacing */
        .content-spacer {
            height: 100px;
        }

        .preview-content {
            background: linear-gradient(135deg, #4f46e5, #7c3aed);
            color: white;
            border-radius: 20px;
            padding: 2rem;
            margin-top: 2rem;
        }
    </style>
</head>
<body>
    <!-- Header/Navigation Component -->
    <nav class="navbar navbar-expand-lg navbar-premium fixed-top" x-data="{ mobileMenuOpen: false, scrolled: false }"
         @scroll.window="scrolled = (window.pageYOffset > 10)">
        <div class="container">
            <!-- Brand Logo -->
            <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
                <div class="bg-primary rounded-lg p-2 me-2">
                    <i class="fas fa-calendar-alt text-white fs-5"></i>
                </div>
                <span class="fw-bold fs-4 brand-gradient">EventPro</span>
            </a>

            <!-- Desktop Navigation -->
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}"
                           :class="{ 'active': '{{ request()->routeIs('home') }}' }">
                            <i class="fas fa-home me-2"></i>Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('events.index') }}"
                           :class="{ 'active': '{{ request()->routeIs('events.*') }}' }">
                            <i class="fas fa-calendar-alt me-2"></i>Events
                        </a>
                    </li>
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('tickets.index') }}"
                               :class="{ 'active': '{{ request()->routeIs('tickets.*') }}' }">
                                <i class="fas fa-ticket-alt me-2"></i>My Tickets
                            </a>
                        </li>
                        @if(auth()->user()->role === 'organizer' || auth()->user()->role === 'admin')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('companies.index') }}"
                                   :class="{ 'active': '{{ request()->routeIs('companies.*') }}' }">
                                    <i class="fas fa-building me-2"></i>Companies
                                </a>
                            </li>
                        @endif
                    @endauth
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-chart-bar me-2"></i>Reports
                        </a>
                    </li>
                </ul>

                <!-- User Actions -->
                <div class="d-flex align-items-center gap-3">
                    <div class="dropdown" x-data="{ open: false }">
                        <button class="btn btn-light rounded-circle p-2 position-relative border-0"
                                @click="open = !open"
                                @click.away="open = false">
                            <i class="fas fa-bell text-gray-600"></i>
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 10px;">
                                3
                            </span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-premium"
                             :class="{ 'show': open }">
                            <div class="dropdown-header d-flex justify-content-between align-items-center px-3 py-2">
                                <span class="fw-semibold">Notifications</span>
                                <small class="text-muted">3 new</small>
                            </div>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item dropdown-item-premium">
                                <div class="d-flex">
                                    <div class="flex-shrink-0 me-3">
                                        <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                            <i class="fas fa-ticket-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <div class="fw-semibold">Ticket Confirmed</div>
                                        <div class="text-muted small">Your ticket for Tech Conference 2024 has been confirmed</div>
                                        <div class="text-muted small mt-1">2 hours ago</div>
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="dropdown-item dropdown-item-premium">
                                <div class="d-flex">
                                    <div class="flex-shrink-0 me-3">
                                        <div class="bg-success rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                            <i class="fas fa-qrcode text-white"></i>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <div class="fw-semibold">Ticket Ready</div>
                                        <div class="text-muted small">Your QR code ticket is now available</div>
                                        <div class="text-muted small mt-1">5 hours ago</div>
                                    </div>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item dropdown-item-premium text-center py-2">
                                View all notifications
                            </a>
                        </div>
                    </div>

                    @guest
                        <a href="{{ route('login') }}" class="btn btn-outline-custom px-4 py-2">
                            <i class="fas fa-sign-in-alt me-2"></i>Login
                        </a>
                        <a href="{{ route('register') }}" class="btn btn-primary-custom px-4 py-2">
                            <i class="fas fa-user-plus me-2"></i>Register
                        </a>
                    @else
                        <div class="dropdown" x-data="{ open: false }">
                            <button class="btn btn-light rounded-pill p-1 d-flex align-items-center gap-2"
                                    @click="open = !open"
                                    @click.away="open = false">
                                <div class="user-avatar">
                                    {{ substr(Auth::user()->name, 0, 1) }}
                                </div>
                                <span class="fw-medium d-none d-md-inline">{{ Auth::user()->name }}</span>
                                <i class="fas fa-chevron-down small text-gray-600"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-premium"
                                 :class="{ 'show': open }">
                                <div class="dropdown-header px-3 py-2">
                                    <strong>{{ Auth::user()->name }}</strong>
                                    <div class="text-muted small">{{ Auth::user()->email }}</div>
                                </div>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item dropdown-item-premium" href="{{ route('dashboard') }}">
                                    <i class="fas fa-tachometer-alt me-2"></i>Dashboard
                                </a>
                                <a class="dropdown-item dropdown-item-premium" href="{{ route('profile') }}">
                                    <i class="fas fa-user me-2"></i>Profile
                                </a>
                                <a class="dropdown-item dropdown-item-premium" href="{{ route('settings') }}">
                                    <i class="fas fa-cog me-2"></i>Settings
                                </a>
                                <div class="dropdown-divider"></div>
                                <form method="POST" action="{{ route('logout') }}" class="d-inline">
                                    @csrf
                                    <button type="submit" class="dropdown-item dropdown-item-premium text-danger w-100 text-start">
                                        <i class="fas fa-sign-out-alt me-2"></i>Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endguest
                </div>
            </div>

            <!-- Mobile Menu Button -->
            <button class="navbar-toggler border-0 p-0 d-lg-none" type="button"
                    @click="mobileMenuOpen = true">
                <div class="hamburger" :class="{ 'active': mobileMenuOpen }">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </button>
        </div>

        <!-- Mobile Menu Overlay -->
        <div class="mobile-backdrop" :class="{ 'show': mobileMenuOpen }"
             @click="mobileMenuOpen = false"></div>

        <!-- Mobile Menu Content -->
        <div class="mobile-menu" :class="{ 'open': mobileMenuOpen }">
            <div class="d-flex justify-content-between align-items-center mb-5">
                <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
                    <div class="bg-primary rounded-lg p-2 me-2">
                        <i class="fas fa-calendar-alt text-white fs-5"></i>
                    </div>
                    <span class="fw-bold fs-4 brand-gradient">EventPro</span>
                </a>
                <button class="btn p-0" @click="mobileMenuOpen = false">
                    <i class="fas fa-times fs-4 text-dark"></i>
                </button>
            </div>

            <ul class="navbar-nav mb-4">
                <li class="nav-item mb-2">
                    <a class="nav-link d-block p-3 rounded-3" href="{{ route('home') }}">
                        <i class="fas fa-home me-3"></i>Home
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link d-block p-3 rounded-3" href="{{ route('events.index') }}">
                        <i class="fas fa-calendar-alt me-3"></i>Events
                    </a>
                </li>
                @auth
                    <li class="nav-item mb-2">
                        <a class="nav-link d-block p-3 rounded-3" href="{{ route('tickets.index') }}">
                            <i class="fas fa-ticket-alt me-3"></i>My Tickets
                        </a>
                    </li>
                    @if(auth()->user()->role === 'organizer' || auth()->user()->role === 'admin')
                        <li class="nav-item mb-2">
                            <a class="nav-link d-block p-3 rounded-3" href="{{ route('companies.index') }}">
                                <i class="fas fa-building me-3"></i>Companies
                            </a>
                        </li>
                    @endif
                @endauth
                <li class="nav-item mb-2">
                    <a class="nav-link d-block p-3 rounded-3" href="#">
                        <i class="fas fa-chart-bar me-3"></i>Reports
                    </a>
                </li>
            </ul>

            <div class="border-top pt-4">
                @guest
                    <div class="d-flex flex-column gap-2">
                        <a href="{{ route('login') }}" class="btn btn-outline-custom w-100">
                            <i class="fas fa-sign-in-alt me-2"></i>Login
                        </a>
                        <a href="{{ route('register') }}" class="btn btn-primary-custom w-100">
                            <i class="fas fa-user-plus me-2"></i>Register
                        </a>
                    </div>
                @else
                    <div class="d-flex align-items-center gap-3 mb-4">
                        <div class="user-avatar">
                            {{ substr(Auth::user()->name, 0, 1) }}
                        </div>
                        <div>
                            <strong>{{ Auth::user()->name }}</strong>
                            <div class="text-muted small">{{ Auth::user()->email }}</div>
                        </div>
                    </div>

                    <a href="{{ route('dashboard') }}" class="btn btn-primary-custom w-100 mb-2">
                        <i class="fas fa-tachometer-alt me-2"></i>Dashboard
                    </a>
                    <form method="POST" action="{{ route('logout') }}" class="d-inline w-100">
                        @csrf
                        <button type="submit" class="btn btn-outline-custom w-100">
                            <i class="fas fa-sign-out-alt me-2"></i>Logout
                        </button>
                    </form>
                @endguest
            </div>
        </div>
    </nav>

    <!-- Spacer for fixed navbar -->
    <div class="content-spacer"></div>

    <!-- Preview Content -->
</div>
<!-- <div class="container">
    <div class="preview-content text-center">
        <h2 class="mb-3">Event Management Platform</h2>
        <p class="mb-0">This is a preview of the modern header component</p>
    </div>

    <div class="row mt-4">
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">System Features</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">User Registration & Login</li>
                        <li class="list-group-item">Event Management</li>
                        <li class="list-group-item">QR Code Ticketing</li>
                        <li class="list-group-item">Attendance Tracking</li>
                        <li class="list-group-item">Detailed Reporting</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Current Status</h5>
                    <div class="d-flex justify-content-between mb-2">
                        <span>Active Events:</span>
                        <strong>24</strong>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span>Tickets Sold:</span>
                        <strong>1,284</strong>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span>Registered Companies:</span>
                        <strong>42</strong>
                    </div>
                    <div class="d-flex justify-content-between">
                        <span>Upcoming Events:</span>
                        <strong>8</strong>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Add scroll effect to navbar
        document.addEventListener('DOMContentLoaded', function() {
            const navbar = document.querySelector('.navbar-premium');
            window.addEventListener('scroll', function() {
                if (window.scrollY > 10) {
                    navbar.classList.add('scrolled');
                } else {
                    navbar.classList.remove('scrolled');
                }
            });
        });
    </script>
</body>
</html>
