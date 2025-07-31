@extends('layouts.app')

@section('title', 'Smart Event Registration & Ticketing System')

@section('content')
<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold mb-4">Smart Event Registration & Ticketing System</h1>
                <p class="lead mb-4">
                    Create, manage, and attend events with our comprehensive platform. 
                    From registration to ticketing, we've got you covered.
                </p>
                <div class="d-flex gap-3 mb-4">
                    <a href="{{ route('events.index') }}" class="btn btn-light btn-lg">
                        <i class="fas fa-calendar me-2"></i>Browse Events
                    </a>
                    @guest
                        <a href="{{ route('register') }}" class="btn btn-outline-light btn-lg">
                            <i class="fas fa-user-plus me-2"></i>Get Started
                        </a>
                    @else
                        <a href="{{ route('dashboard') }}" class="btn btn-outline-light btn-lg">
                            <i class="fas fa-tachometer-alt me-2"></i>Dashboard
                        </a>
                    @endguest
                </div>
                <div class="row g-3">
                    <div class="col-auto">
                        <div class="d-flex align-items-center text-white-50">
                            <i class="fas fa-check-circle me-2"></i>
                            <span>Easy Registration</span>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="d-flex align-items-center text-white-50">
                            <i class="fas fa-check-circle me-2"></i>
                            <span>QR Code Tickets</span>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="d-flex align-items-center text-white-50">
                            <i class="fas fa-check-circle me-2"></i>
                            <span>Real-time Analytics</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 text-center">
                <img src="https://via.placeholder.com/500x400/667eea/ffffff?text=Event+Management" 
                     alt="Event Management" class="img-fluid rounded shadow-lg">
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="h1 fw-bold mb-3">Everything You Need</h2>
            <p class="lead text-muted">Comprehensive event management features</p>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                             style="width: 60px; height: 60px;">
                            <i class="fas fa-users fa-lg"></i>
                        </div>
                        <h5 class="fw-bold mb-3">User Management</h5>
                        <p class="text-muted">User registration, login, and role management for organizers and attendees.</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="bg-success text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                             style="width: 60px; height: 60px;">
                            <i class="fas fa-calendar-plus fa-lg"></i>
                        </div>
                        <h5 class="fw-bold mb-3">Event Creation</h5>
                        <p class="text-muted">Create and manage events with detailed information, images, and scheduling.</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="bg-info text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                             style="width: 60px; height: 60px;">
                            <i class="fas fa-building fa-lg"></i>
                        </div>
                        <h5 class="fw-bold mb-3">Company Registration</h5>
                        <p class="text-muted">Register event companies and organizations with verification system.</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="bg-warning text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                             style="width: 60px; height: 60px;">
                            <i class="fas fa-ticket-alt fa-lg"></i>
                        </div>
                        <h5 class="fw-bold mb-3">Ticketing System</h5>
                        <p class="text-muted">Secure ticket purchasing with payment processing and QR code generation.</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="bg-danger text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                             style="width: 60px; height: 60px;">
                            <i class="fas fa-qrcode fa-lg"></i>
                        </div>
                        <h5 class="fw-bold mb-3">QR Code Check-in</h5>
                        <p class="text-muted">Quick and easy attendance confirmation using QR code scanning.</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="bg-dark text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                             style="width: 60px; height: 60px;">
                            <i class="fas fa-chart-bar fa-lg"></i>
                        </div>
                        <h5 class="fw-bold mb-3">Analytics & Reports</h5>
                        <p class="text-muted">Comprehensive reporting on attendance, sales, and event performance.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row text-center g-4">
            <div class="col-lg-3 col-md-6">
                <h3 class="display-4 fw-bold text-primary">500+</h3>
                <p class="text-muted mb-0">Events Created</p>
            </div>
            <div class="col-lg-3 col-md-6">
                <h3 class="display-4 fw-bold text-success">10K+</h3>
                <p class="text-muted mb-0">Tickets Sold</p>
            </div>
            <div class="col-lg-3 col-md-6">
                <h3 class="display-4 fw-bold text-info">100+</h3>
                <p class="text-muted mb-0">Companies</p>
            </div>
            <div class="col-lg-3 col-md-6">
                <h3 class="display-4 fw-bold text-warning">50K+</h3>
                <p class="text-muted mb-0">Happy Users</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h2 class="h1 fw-bold mb-3">Ready to Get Started?</h2>
                <p class="lead text-muted mb-4">
                    Join thousands of event organizers who trust our platform for their event management needs.
                </p>
                <div class="d-flex gap-3 justify-content-center">
                    @guest
                        <a href="{{ route('register') }}" class="btn btn-gradient btn-lg">
                            <i class="fas fa-rocket me-2"></i>Start Free Trial
                        </a>
                        <a href="{{ route('events.index') }}" class="btn btn-outline-primary btn-lg">
                            <i class="fas fa-search me-2"></i>Browse Events
                        </a>
                    @else
                        <a href="{{ route('events.create') }}" class="btn btn-gradient btn-lg">
                            <i class="fas fa-plus me-2"></i>Create Your First Event
                        </a>
                        <a href="{{ route('dashboard') }}" class="btn btn-outline-primary btn-lg">
                            <i class="fas fa-tachometer-alt me-2"></i>Go to Dashboard
                        </a>
                    @endguest
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
