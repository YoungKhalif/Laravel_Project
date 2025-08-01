@extends('layouts.app')

@section('title', 'Smart Event Registration & Ticketing System - EventPro')

@section('content')
<!-- Hero Section -->
<section class="gradient-bg hero-pattern text-white py-5">
    <div class="container py-5">
        <div class="row align-items-center min-vh-75">
            <div class="col-lg-6">
                <div class="hero-content">
                    <h1 class="display-4 fw-bold mb-4 animate__animated animate__fadeInUp">
                        Smart Event Registration &
                        <span class="text-warning">Ticketing System</span>
                    </h1>
                    <p class="lead mb-4 animate__animated animate__fadeInUp animate__delay-1s">
                        Discover, register, and manage events seamlessly. From corporate conferences to entertainment shows,
                        find your next amazing experience with our intelligent ticketing platform.
                    </p>
                    <div class="d-flex flex-column flex-sm-row gap-3 animate__animated animate__fadeInUp animate__delay-2s">
                        <a href="{{ url('/events') }}" class="btn btn-light btn-lg px-4 py-3 rounded-pill">
                            <i class="fas fa-search me-2"></i>Explore Events
                        </a>
                        <a href="{{ url('/register') }}" class="btn btn-outline-light btn-lg px-4 py-3 rounded-pill">
                            <i class="fas fa-user-plus me-2"></i>Get Started
                        </a>
                    </div>

                    <!-- Stats -->
                    <div class="row mt-5 text-center">
                        <div class="col-4">
                            <h3 class="fw-bold">50K+</h3>
                            <p class="small opacity-75">Events Hosted</p>
                        </div>
                        <div class="col-4">
                            <h3 class="fw-bold">2M+</h3>
                            <p class="small opacity-75">Tickets Sold</p>
                        </div>
                        <div class="col-4">
                            <h3 class="fw-bold">500+</h3>
                            <p class="small opacity-75">Companies</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="text-center">
                    <img src="https://images.unsplash.com/photo-1540575467063-178a50c2df87?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80"
                         alt="Event Management" class="img-fluid rounded-4 shadow-lg" style="max-height: 500px; object-fit: cover;">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="py-5" id="features">
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-12 text-center mb-5">
                <h2 class="display-5 fw-bold text-gradient mb-3">Why Choose EventPro?</h2>
                <p class="lead text-muted">Comprehensive event management made simple and efficient</p>
            </div>
        </div>

        <div class="row g-4">
            <!-- Feature 1 -->
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 border-0 shadow-sm card-hover">
                    <div class="card-body text-center p-4">
                        <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                            <i class="fas fa-calendar-plus text-primary fs-2"></i>
                        </div>
                        <h5 class="fw-bold mb-3">Easy Event Creation</h5>
                        <p class="text-muted">Create and manage events with our intuitive interface. Add details, set pricing, and publish in minutes.</p>
                    </div>
                </div>
            </div>

            <!-- Feature 2 -->
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 border-0 shadow-sm card-hover">
                    <div class="card-body text-center p-4">
                        <div class="bg-success bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                            <i class="fas fa-qrcode text-success fs-2"></i>
                        </div>
                        <h5 class="fw-bold mb-3">QR Code Tickets</h5>
                        <p class="text-muted">Generate secure QR code tickets automatically. Easy check-in process and real-time attendance tracking.</p>
                    </div>
                </div>
            </div>

            <!-- Feature 3 -->
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 border-0 shadow-sm card-hover">
                    <div class="card-body text-center p-4">
                        <div class="bg-warning bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                            <i class="fas fa-credit-card text-warning fs-2"></i>
                        </div>
                        <h5 class="fw-bold mb-3">Secure Payments</h5>
                        <p class="text-muted">Integrated payment system with multiple payment options. Secure, fast, and reliable transactions.</p>
                    </div>
                </div>
            </div>

            <!-- Feature 4 -->
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 border-0 shadow-sm card-hover">
                    <div class="card-body text-center p-4">
                        <div class="bg-info bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                            <i class="fas fa-bell text-info fs-2"></i>
                        </div>
                        <h5 class="fw-bold mb-3">Smart Notifications</h5>
                        <p class="text-muted">Email and SMS notifications for registrations, reminders, and updates. Keep everyone informed.</p>
                    </div>
                </div>
            </div>

            <!-- Feature 5 -->
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 border-0 shadow-sm card-hover">
                    <div class="card-body text-center p-4">
                        <div class="bg-danger bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                            <i class="fas fa-chart-line text-danger fs-2"></i>
                        </div>
                        <h5 class="fw-bold mb-3">Analytics & Reports</h5>
                        <p class="text-muted">Detailed analytics and reports. Track attendance, revenue, and performance metrics.</p>
                    </div>
                </div>
            </div>

            <!-- Feature 6 -->
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 border-0 shadow-sm card-hover">
                    <div class="card-body text-center p-4">
                        <div class="bg-purple bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                            <i class="fas fa-users text-purple fs-2"></i>
                        </div>
                        <h5 class="fw-bold mb-3">User Management</h5>
                        <p class="text-muted">Comprehensive user and company registration system. Manage attendees and organizers efficiently.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- How It Works Section -->
<section class="bg-light py-5">
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-12 text-center mb-5">
                <h2 class="display-5 fw-bold text-gradient mb-3">How It Works</h2>
                <p class="lead text-muted">Simple steps to get started with your event journey</p>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-lg-3 col-md-6 text-center">
                <div class="position-relative mb-4">
                    <div class="bg-primary rounded-circle d-inline-flex align-items-center justify-content-center text-white fw-bold" style="width: 80px; height: 80px; font-size: 1.5rem;">
                        1
                    </div>
                </div>
                <h5 class="fw-bold mb-3">Create Account</h5>
                <p class="text-muted">Sign up as an individual or register your company to start managing events.</p>
            </div>

            <div class="col-lg-3 col-md-6 text-center">
                <div class="position-relative mb-4">
                    <div class="bg-success rounded-circle d-inline-flex align-items-center justify-content-center text-white fw-bold" style="width: 80px; height: 80px; font-size: 1.5rem;">
                        2
                    </div>
                </div>
                <h5 class="fw-bold mb-3">Discover Events</h5>
                <p class="text-muted">Browse through amazing events or create your own. Set preferences and get recommendations.</p>
            </div>

            <div class="col-lg-3 col-md-6 text-center">
                <div class="position-relative mb-4">
                    <div class="bg-warning rounded-circle d-inline-flex align-items-center justify-content-center text-white fw-bold" style="width: 80px; height: 80px; font-size: 1.5rem;">
                        3
                    </div>
                </div>
                <h5 class="fw-bold mb-3">Book & Pay</h5>
                <p class="text-muted">Register for events and make secure payments. Get instant confirmation and tickets.</p>
            </div>

            <div class="col-lg-3 col-md-6 text-center">
                <div class="position-relative mb-4">
                    <div class="bg-info rounded-circle d-inline-flex align-items-center justify-content-center text-white fw-bold" style="width: 80px; height: 80px; font-size: 1.5rem;">
                        4
                    </div>
                </div>
                <h5 class="fw-bold mb-3">Attend & Enjoy</h5>
                <p class="text-muted">Show your QR code ticket at the event. Enjoy seamless check-in and great experiences.</p>
            </div>
        </div>
    </div>
</section>

<!-- Featured Events Section -->
<section class="py-5">
    <div class="container py-5">
        <div class="row align-items-center mb-5">
            <div class="col-md-6">
                <h2 class="display-5 fw-bold text-gradient mb-3">Featured Events</h2>
                <p class="lead text-muted">Don't miss out on these amazing upcoming events</p>
            </div>
            <div class="col-md-6 text-md-end">
                <a href="{{ url('/events') }}" class="btn btn-primary-custom px-4 py-2 rounded-pill">
                    <i class="fas fa-arrow-right me-2"></i>View All Events
                </a>
            </div>
        </div>

        <div class="row g-4">
            <!-- Event Card 1 -->
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm card-hover h-100">
                    <div class="position-relative">
                        <img src="https://images.unsplash.com/photo-1540575467063-178a50c2df87?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" class="card-img-top" alt="Tech Conference" style="height: 200px; object-fit: cover;">
                        <div class="position-absolute top-0 end-0 m-3">
                            <span class="badge bg-danger rounded-pill">Featured</span>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <h5 class="card-title fw-bold">Tech Conference 2025</h5>
                            <span class="text-primary fw-bold">$99</span>
                        </div>
                        <p class="card-text text-muted small mb-3">Join the biggest tech conference of the year featuring industry leaders and cutting-edge innovations.</p>
                        <div class="d-flex align-items-center mb-3">
                            <i class="fas fa-calendar text-muted me-2"></i>
                            <small class="text-muted">August 15, 2025</small>
                        </div>
                        <div class="d-flex align-items-center mb-3">
                            <i class="fas fa-map-marker-alt text-muted me-2"></i>
                            <small class="text-muted">San Francisco, CA</small>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <small class="text-success"><i class="fas fa-users me-1"></i>250 attending</small>
                            <a href="#" class="btn btn-primary-custom btn-sm rounded-pill">Register Now</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Event Card 2 -->
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm card-hover h-100">
                    <div class="position-relative">
                        <img src="https://images.unsplash.com/photo-1492684223066-81342ee5ff30?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" class="card-img-top" alt="Music Festival" style="height: 200px; object-fit: cover;">
                        <div class="position-absolute top-0 end-0 m-3">
                            <span class="badge bg-warning rounded-pill">Popular</span>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <h5 class="card-title fw-bold">Summer Music Festival</h5>
                            <span class="text-primary fw-bold">$149</span>
                        </div>
                        <p class="card-text text-muted small mb-3">A three-day music extravaganza featuring top artists from around the world.</p>
                        <div class="d-flex align-items-center mb-3">
                            <i class="fas fa-calendar text-muted me-2"></i>
                            <small class="text-muted">September 20-22, 2025</small>
                        </div>
                        <div class="d-flex align-items-center mb-3">
                            <i class="fas fa-map-marker-alt text-muted me-2"></i>
                            <small class="text-muted">Austin, TX</small>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <small class="text-success"><i class="fas fa-users me-1"></i>5000 attending</small>
                            <a href="#" class="btn btn-primary-custom btn-sm rounded-pill">Register Now</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Event Card 3 -->
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm card-hover h-100">
                    <div class="position-relative">
                        <img src="https://images.unsplash.com/photo-1515187029135-18ee286d815b?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" class="card-img-top" alt="Business Workshop" style="height: 200px; object-fit: cover;">
                        <div class="position-absolute top-0 end-0 m-3">
                            <span class="badge bg-success rounded-pill">New</span>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <h5 class="card-title fw-bold">Business Leadership Workshop</h5>
                            <span class="text-primary fw-bold">$75</span>
                        </div>
                        <p class="card-text text-muted small mb-3">Intensive workshop on modern leadership techniques and business strategy.</p>
                        <div class="d-flex align-items-center mb-3">
                            <i class="fas fa-calendar text-muted me-2"></i>
                            <small class="text-muted">October 8, 2025</small>
                        </div>
                        <div class="d-flex align-items-center mb-3">
                            <i class="fas fa-map-marker-alt text-muted me-2"></i>
                            <small class="text-muted">New York, NY</small>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <small class="text-success"><i class="fas fa-users me-1"></i>50 attending</small>
                            <a href="#" class="btn btn-primary-custom btn-sm rounded-pill">Register Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="bg-light py-5">
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-12 text-center mb-5">
                <h2 class="display-5 fw-bold text-gradient mb-3">What Our Users Say</h2>
                <p class="lead text-muted">Trusted by thousands of event organizers and attendees</p>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                        </div>
                        <p class="card-text mb-4">"EventPro made organizing our annual conference incredibly easy. The QR code system and real-time analytics are game-changers!"</p>
                        <div class="d-flex align-items-center">
                            <img src="https://ui-avatars.com/api/?name=Sarah+Johnson&background=6366f1&color=fff&size=50" class="rounded-circle me-3" width="50" height="50" alt="Sarah Johnson">
                            <div>
                                <h6 class="mb-0 fw-bold">Sarah Johnson</h6>
                                <small class="text-muted">Event Manager, TechCorp</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                        </div>
                        <p class="card-text mb-4">"As an attendee, I love how simple it is to find and register for events. The mobile experience is fantastic!"</p>
                        <div class="d-flex align-items-center">
                            <img src="https://ui-avatars.com/api/?name=Michael+Chen&background=8b5cf6&color=fff&size=50" class="rounded-circle me-3" width="50" height="50" alt="Michael Chen">
                            <div>
                                <h6 class="mb-0 fw-bold">Michael Chen</h6>
                                <small class="text-muted">Software Developer</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                        </div>
                        <p class="card-text mb-4">"The reporting features help us understand our audience better. Customer support is also incredibly responsive!"</p>
                        <div class="d-flex align-items-center">
                            <img src="https://ui-avatars.com/api/?name=Emma+Wilson&background=f59e0b&color=fff&size=50" class="rounded-circle me-3" width="50" height="50" alt="Emma Wilson">
                            <div>
                                <h6 class="mb-0 fw-bold">Emma Wilson</h6>
                                <small class="text-muted">Marketing Director</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="gradient-bg text-white py-5">
    <div class="container py-5">
        <div class="row justify-content-center text-center">
            <div class="col-lg-8">
                <h2 class="display-5 fw-bold mb-4">Ready to Get Started?</h2>
                <p class="lead mb-4">Join thousands of event organizers and attendees who trust EventPro for their event management needs.</p>
                <div class="d-flex flex-column flex-sm-row gap-3 justify-content-center">
                    <a href="{{ url('/register') }}" class="btn btn-light btn-lg px-5 py-3 rounded-pill">
                        <i class="fas fa-rocket me-2"></i>Start Free Today
                    </a>
                    <a href="{{ url('/events') }}" class="btn btn-outline-light btn-lg px-5 py-3 rounded-pill">
                        <i class="fas fa-calendar me-2"></i>Browse Events
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
<style>
.min-vh-75 {
    min-height: 75vh;
}
.text-purple {
    color: #8b5cf6 !important;
}
.bg-purple {
    background-color: #8b5cf6 !important;
}
</style>
@endpush
