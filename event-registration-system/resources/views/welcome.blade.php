@extends('layouts.app')

@section('title', 'Welcome to EventPro - Smart Event Registration')

@section('content')
<!-- Lightweight Hero Section -->
<section class="hero-section">
    <div class="container-xl">
        <div class="row align-items-center min-vh-100">
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold text-gradient mb-4">
                    Your Events, Perfectly Organized
                </h1>
                <p class="lead text-muted mb-4">
                    EventPro makes event registration and ticket management simple, secure, and efficient.
                    Join thousands of organizers who trust us with their events.
                </p>
                <div class="d-flex gap-3 flex-wrap">
                    <a href="{{ route('events.index') }}" class="btn btn-primary-custom btn-lg">
                        <i class="fas fa-calendar me-2"></i>Browse Events
                    </a>
                    <a href="{{ route('register') }}" class="btn btn-outline-primary-custom btn-lg">
                        <i class="fas fa-user-plus me-2"></i>Get Started
                    </a>
                </div>
            </div>
            <div class="col-lg-6">
                <img src="https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=800&auto=format&fit=crop&q=80"
                     alt="Event Management"
                     class="img-fluid rounded-3 shadow-lg">
            </div>
        </div>
    </div>
</section>

<!-- Quick Features -->
<section class="py-5 bg-light">
    <div class="container-xl">
        <div class="row text-center">
            <div class="col-md-4 mb-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body p-4">
                        <div class="bg-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                            <i class="fas fa-ticket-alt text-white fs-4"></i>
                        </div>
                        <h5 class="fw-bold">Easy Ticketing</h5>
                        <p class="text-muted">Create and manage tickets with our intuitive platform</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body p-4">
                        <div class="bg-success rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                            <i class="fas fa-shield-alt text-white fs-4"></i>
                        </div>
                        <h5 class="fw-bold">Secure Payments</h5>
                        <p class="text-muted">Process payments securely with industry-standard encryption</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body p-4">
                        <div class="bg-info rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                            <i class="fas fa-chart-line text-white fs-4"></i>
                        </div>
                        <h5 class="fw-bold">Real-time Analytics</h5>
                        <p class="text-muted">Track your event performance with detailed insights</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="py-5">
    <div class="container-xl">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h2 class="fw-bold mb-4">Ready to Get Started?</h2>
                <p class="lead text-muted mb-4">
                    Join thousands of event organizers who trust EventPro for their event management needs.
                </p>
                <a href="{{ route('register') }}" class="btn btn-primary-custom btn-lg">
                    <i class="fas fa-rocket me-2"></i>Start Your Free Trial
                </a>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
    .hero-section {
        background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
        padding: 2rem 0;
    }

    .min-vh-100 {
        min-height: 80vh;
    }
</style>
@endpush
