@extends('layouts.app')

<<<<<<< HEAD
@section('title', $event->title ?? 'Event Details - EventPro')

@push('styles')
<style>
    .event-hero {
        min-height: 60vh;
        background: linear-gradient(135deg, rgba(0, 0, 0, 0.7), rgba(59, 130, 246, 0.3)),
                    url('{{ $event->image ? asset("storage/" . $event->image) : "https://images.unsplash.com/photo-1540575467063-178a50c2df87?ixlib=rb-4.0.3&auto=format&fit=crop&w=2000&q=80" }}');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        position: relative;
        display: flex;
        align-items: center;
        overflow: hidden;
    }

    .event-hero::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: radial-gradient(circle at center, rgba(59, 130, 246, 0.1) 0%, rgba(0, 0, 0, 0.4) 100%);
        pointer-events: none;
    }

    .floating-shapes {
        position: absolute;
        width: 100%;
        height: 100%;
        overflow: hidden;
        pointer-events: none;
    }

    .floating-shape {
        position: absolute;
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        border-radius: 50%;
        animation: float 6s ease-in-out infinite;
    }

    .floating-shape:nth-child(1) {
        width: 80px;
        height: 80px;
        top: 20%;
        left: 10%;
        animation-delay: 0s;
    }

    .floating-shape:nth-child(2) {
        width: 120px;
        height: 120px;
        top: 60%;
        right: 15%;
        animation-delay: 2s;
    }

    .floating-shape:nth-child(3) {
        width: 60px;
        height: 60px;
        bottom: 20%;
        left: 80%;
        animation-delay: 4s;
    }

    @keyframes float {
        0%, 100% { transform: translateY(0px) rotate(0deg); }
        33% { transform: translateY(-20px) rotate(120deg); }
        66% { transform: translateY(10px) rotate(240deg); }
    }

    .event-badge {
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        color: white;
        padding: 8px 20px;
        border-radius: 25px;
        font-weight: 600;
        font-size: 14px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        box-shadow: 0 4px 15px rgba(59, 130, 246, 0.3);
        animation: pulse 2s infinite;
    }

    @keyframes pulse {
        0% { box-shadow: 0 4px 15px rgba(59, 130, 246, 0.3); }
        50% { box-shadow: 0 8px 25px rgba(59, 130, 246, 0.5); }
        100% { box-shadow: 0 4px 15px rgba(59, 130, 246, 0.3); }
    }

    .event-meta {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 20px;
        padding: 2rem;
        color: white;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
    }

    .meta-item {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 1rem;
        padding: 12px 0;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        transition: all 0.3s ease;
    }

    .meta-item:last-child {
        border-bottom: none;
        margin-bottom: 0;
    }

    .meta-item:hover {
        transform: translateX(10px);
        background: rgba(255, 255, 255, 0.05);
        border-radius: 12px;
        padding-left: 16px;
        padding-right: 16px;
    }

    .meta-icon {
        width: 40px;
        height: 40px;
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 18px;
        box-shadow: 0 4px 15px rgba(59, 130, 246, 0.3);
    }

    .avatar-group {
        display: flex;
        align-items: center;
        gap: -8px;
    }

    .avatar {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        border: 3px solid rgba(255, 255, 255, 0.3);
        overflow: hidden;
        position: relative;
        margin-left: -8px;
        transition: all 0.3s ease;
    }

    .avatar:first-child {
        margin-left: 0;
    }

    .avatar:hover {
        transform: scale(1.1) translateY(-2px);
        border-color: white;
        z-index: 10;
    }

    .avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .content-section {
        background: white;
        border-radius: 20px;
        padding: 2.5rem;
        margin-bottom: 2rem;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
        border: 1px solid rgba(0, 0, 0, 0.05);
        position: relative;
        overflow: hidden;
    }

    .content-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 4px;
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
    }

    .section-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--dark-color);
        margin-bottom: 1.5rem;
        position: relative;
        padding-left: 2rem;
    }

    .section-title::before {
        content: '';
        position: absolute;
        left: 0;
        top: 50%;
        transform: translateY(-50%);
        width: 24px;
        height: 24px;
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        border-radius: 6px;
    }

    .ticket-card {
        background: linear-gradient(135deg, rgba(59, 130, 246, 0.05), rgba(139, 92, 246, 0.05));
        border: 2px solid rgba(59, 130, 246, 0.1);
        border-radius: 20px;
        padding: 2rem;
        position: sticky;
        top: 120px;
        transition: all 0.3s ease;
    }

    .ticket-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 60px rgba(59, 130, 246, 0.2);
        border-color: rgba(59, 130, 246, 0.3);
    }

    .price-display {
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        font-size: 3rem;
        font-weight: 800;
        line-height: 1;
        margin-bottom: 0.5rem;
    }

    .ticket-features {
        list-style: none;
        padding: 0;
        margin: 1.5rem 0;
    }

    .ticket-features li {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 8px 0;
        color: #6b7280;
        font-weight: 500;
    }

    .ticket-features li::before {
        content: '✓';
        color: var(--success-color);
        font-weight: bold;
        font-size: 16px;
        width: 20px;
        height: 20px;
        background: rgba(16, 185, 129, 0.1);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 12px;
    }

    .action-buttons {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    .btn-register {
        background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
        border: none;
        color: white;
        font-weight: 700;
        padding: 16px 32px;
        border-radius: 16px;
        font-size: 18px;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .btn-register::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.5s ease;
    }

    .btn-register:hover::before {
        left: 100%;
    }

    .btn-register:hover {
        transform: translateY(-3px);
        box-shadow: 0 15px 35px rgba(59, 130, 246, 0.4);
        color: white;
    }

    .btn-wishlist {
        background: white;
        border: 2px solid #e5e7eb;
        color: #6b7280;
        font-weight: 600;
        padding: 12px 24px;
        border-radius: 12px;
        transition: all 0.3s ease;
    }

    .btn-wishlist:hover {
        border-color: var(--primary-color);
        color: var(--primary-color);
        background: rgba(59, 130, 246, 0.05);
    }

    .organizer-card {
        background: white;
        border-radius: 16px;
        padding: 1.5rem;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        border: 1px solid rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
    }

    .organizer-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
    }

    .organizer-avatar {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        object-fit: cover;
        border: 3px solid rgba(59, 130, 246, 0.2);
    }

    .breadcrumb-custom {
        background: none;
        padding: 0;
        margin-bottom: 0;
    }

    .breadcrumb-custom .breadcrumb-item {
        color: rgba(255, 255, 255, 0.8);
        font-weight: 500;
    }

    .breadcrumb-custom .breadcrumb-item.active {
        color: white;
        font-weight: 600;
    }

    .breadcrumb-custom .breadcrumb-item + .breadcrumb-item::before {
        content: "→";
        color: rgba(255, 255, 255, 0.6);
        font-weight: bold;
    }

    .breadcrumb-custom a {
        color: rgba(255, 255, 255, 0.8);
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .breadcrumb-custom a:hover {
        color: white;
    }

    @media (max-width: 768px) {
        .event-hero {
            min-height: 50vh;
            background-attachment: scroll;
        }

        .event-meta {
            margin-top: 2rem;
        }

        .content-section {
            padding: 1.5rem;
        }

        .ticket-card {
            position: static;
            margin-top: 2rem;
        }

        .price-display {
            font-size: 2.5rem;
        }
    }
</style>
@endpush

@section('content')
<!-- Event Hero Section -->
<div class="event-hero">
    <div class="floating-shapes">
        <div class="floating-shape"></div>
        <div class="floating-shape"></div>
        <div class="floating-shape"></div>
    </div>

    <div class="container-xl position-relative">
        <!-- Breadcrumb -->
        <nav class="breadcrumb-custom mb-4" aria-label="breadcrumb" data-aos="fade-right">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('events.index') }}">
                        <i class="fas fa-calendar-alt me-1"></i>Events
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    {{ Str::limit($event->title ?? 'Event Details', 30) }}
                </li>
            </ol>
        </nav>

        <div class="row align-items-center">
            <div class="col-lg-8">
                <div data-aos="fade-up">
                    <div class="event-badge mb-3">
                        {{ ucfirst($event->category ?? 'Technology') }}
                    </div>
                    <h1 class="display-4 fw-bold text-white mb-4 font-poppins">
                        {{ $event->title ?? 'Tech Conference 2025' }}
                    </h1>
                    <p class="text-white-50 fs-5 mb-4">
                        {{ Str::limit($event->description ?? 'Join industry leaders and innovators for an unforgettable tech conference experience.', 120) }}
                    </p>

                    <!-- Attendee Avatars -->
                    <div class="d-flex align-items-center mb-4">
                        <div class="avatar-group me-3">
                            <div class="avatar">
                                <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Attendee">
                            </div>
                            <div class="avatar">
                                <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Attendee">
                            </div>
                            <div class="avatar">
                                <img src="https://randomuser.me/api/portraits/men/51.jpg" alt="Attendee">
                            </div>
                            <div class="avatar bg-primary d-flex align-items-center justify-content-center">
                                <span class="fw-bold small">+{{ $attendeeCount ?? 247 }}</span>
                            </div>
                        </div>
                        <div class="text-white-50">
                            <span class="fw-semibold text-white">{{ $attendeeCount ?? 250 }}+</span> people attending
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="event-meta" data-aos="fade-left" data-aos-delay="200">
                    <div class="meta-item">
                        <div class="meta-icon">
                            <i class="fas fa-calendar-day"></i>
                        </div>
                        <div>
                            <div class="fw-semibold">Date</div>
                            <div class="small opacity-75">
                                {{ $event->start_date ? \Carbon\Carbon::parse($event->start_date)->format('M j, Y') : 'August 15, 2025' }}
                                @if(isset($event->end_date) && $event->end_date != $event->start_date)
                                    - {{ \Carbon\Carbon::parse($event->end_date)->format('M j, Y') }}
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="meta-item">
                        <div class="meta-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div>
                            <div class="fw-semibold">Time</div>
                            <div class="small opacity-75">
                                {{ $event->start_time ? \Carbon\Carbon::parse($event->start_time)->format('g:i A') : '9:00 AM' }}
                                @if(isset($event->end_time))
                                    - {{ \Carbon\Carbon::parse($event->end_time)->format('g:i A') }}
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="meta-item">
                        <div class="meta-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div>
                            <div class="fw-semibold">Location</div>
                            <div class="small opacity-75">{{ $event->location ?? 'San Francisco, CA' }}</div>
                        </div>
                    </div>

                    <div class="meta-item">
                        <div class="meta-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <div>
                            <div class="fw-semibold">Capacity</div>
                            <div class="small opacity-75">{{ $event->max_attendees ?? 500 }} people</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
                        </span>
                    </div>
                    <span class="text-white">250 people attending</span>
=======
@section('title', 'Tech Conference 2024 - EventSmart')

@section('content')
<div class="container py-4">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/" class="text-decoration-none">Home</a></li>
            <li class="breadcrumb-item"><a href="/events" class="text-decoration-none">Events</a></li>
            <li class="breadcrumb-item active">Tech Conference 2024</li>
        </ol>
    </nav>

    <!-- Alert Messages -->
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="row g-4">
        <!-- Main Content -->
        <div class="col-lg-8">
            <!-- Event Header -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="position-relative">
                    <img src="https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=800&h=400&fit=crop"
                         class="card-img-top" style="height: 300px; object-fit: cover;" alt="Event Banner">
                    <div class="position-absolute top-0 end-0 m-3">
                        <span class="badge bg-success fs-6 px-3 py-2">
                            <i class="fas fa-calendar me-1"></i>Upcoming
                        </span>
                    </div>
                    <div class="position-absolute bottom-0 start-0 end-0 bg-gradient-to-t from-black/50 to-transparent text-white p-4">
                        <div class="d-flex justify-content-between align-items-end">
                            <div>
                                <h1 class="h2 mb-2 fw-bold">Tech Conference 2024</h1>
                                <p class="mb-0 fs-5">The Future of Technology</p>
                            </div>
                            <div class="text-end">
                                <div class="fs-3 fw-bold">$99</div>
                                <small>per ticket</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Event Details -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body p-4">
                    <div class="row g-4 mb-4">
                        <div class="col-md-6">
                            <div class="d-flex align-items-center mb-3">
                                <div class="bg-primary bg-opacity-10 rounded-circle p-3 me-3">
                                    <i class="fas fa-calendar text-primary"></i>
                                </div>
                                <div>
                                    <h6 class="mb-0">Date & Time</h6>
                                    <p class="text-muted mb-0">March 15, 2024</p>
                                    <p class="text-muted mb-0">10:00 AM - 6:00 PM EST</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-center mb-3">
                                <div class="bg-success bg-opacity-10 rounded-circle p-3 me-3">
                                    <i class="fas fa-map-marker-alt text-success"></i>
                                </div>
                                <div>
                                    <h6 class="mb-0">Location</h6>
                                    <p class="text-muted mb-0">Convention Center</p>
                                    <p class="text-muted mb-0">123 Main St, New York, NY 10001</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-center mb-3">
                                <div class="bg-info bg-opacity-10 rounded-circle p-3 me-3">
                                    <i class="fas fa-users text-info"></i>
                                </div>
                                <div>
                                    <h6 class="mb-0">Capacity</h6>
                                    <p class="text-muted mb-0">500 attendees</p>
                                    <p class="text-muted mb-0">245 tickets sold</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-center mb-3">
                                <div class="bg-warning bg-opacity-10 rounded-circle p-3 me-3">
                                    <i class="fas fa-building text-warning"></i>
                                </div>
                                <div>
                                    <h6 class="mb-0">Organizer</h6>
                                    <p class="text-muted mb-0">TechCorp Inc.</p>
                                    <a href="/companies/techcorp" class="text-decoration-none small">View Profile</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Actions -->
                    <div class="d-flex gap-2 mb-4">
                        <button class="btn btn-outline-primary btn-sm" onclick="shareEvent()">
                            <i class="fas fa-share me-1"></i>Share
                        </button>
                        <button class="btn btn-outline-secondary btn-sm" onclick="addToCalendar()">
                            <i class="fas fa-calendar-plus me-1"></i>Add to Calendar
                        </button>
                        <button class="btn btn-outline-danger btn-sm" onclick="toggleWishlist()">
                            <i class="fas fa-heart me-1"></i>Save
                        </button>
                    </div>

                    <!-- Event Description -->
                    <div class="mb-4">
                        <h5 class="mb-3">About This Event</h5>
                        <p class="text-muted mb-3">
                            Join us for the biggest technology conference of the year! This event brings together industry leaders,
                            innovators, and technology enthusiasts for a day of learning, networking, and inspiration.
                        </p>
                        <p class="text-muted mb-3">
                            Discover the latest trends in artificial intelligence, machine learning, blockchain, and more.
                            Connect with like-minded professionals and explore opportunities for collaboration and growth.
                        </p>

                        <h6 class="mb-2">What You'll Get:</h6>
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Access to all keynote sessions</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Networking lunch and coffee breaks</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Conference materials and swag bag</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Certificate of attendance</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Access to presentation slides</li>
                        </ul>
                    </div>

                    <!-- Agenda/Schedule -->
                    <div class="mb-4">
                        <h5 class="mb-3">Event Schedule</h5>
                        <div class="row g-3">
                            <div class="col-12">
                                <div class="d-flex align-items-start border-start border-primary border-3 ps-3">
                                    <div class="flex-shrink-0 me-3">
                                        <span class="badge bg-primary">10:00 AM</span>
                                    </div>
                                    <div>
                                        <h6 class="mb-1">Registration & Welcome Coffee</h6>
                                        <p class="text-muted mb-0 small">Check-in and networking</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-flex align-items-start border-start border-primary border-3 ps-3">
                                    <div class="flex-shrink-0 me-3">
                                        <span class="badge bg-primary">11:00 AM</span>
                                    </div>
                                    <div>
                                        <h6 class="mb-1">Opening Keynote: The Future of AI</h6>
                                        <p class="text-muted mb-0 small">By Dr. Sarah Johnson, MIT</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-flex align-items-start border-start border-primary border-3 ps-3">
                                    <div class="flex-shrink-0 me-3">
                                        <span class="badge bg-primary">12:30 PM</span>
                                    </div>
                                    <div>
                                        <h6 class="mb-1">Networking Lunch</h6>
                                        <p class="text-muted mb-0 small">Connect with fellow attendees</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-flex align-items-start border-start border-primary border-3 ps-3">
                                    <div class="flex-shrink-0 me-3">
                                        <span class="badge bg-primary">2:00 PM</span>
                                    </div>
                                    <div>
                                        <h6 class="mb-1">Panel: Blockchain & Cryptocurrency</h6>
                                        <p class="text-muted mb-0 small">Industry experts discuss the future</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-flex align-items-start border-start border-primary border-3 ps-3">
                                    <div class="flex-shrink-0 me-3">
                                        <span class="badge bg-primary">4:00 PM</span>
                                    </div>
                                    <div>
                                        <h6 class="mb-1">Closing Remarks & Networking</h6>
                                        <p class="text-muted mb-0 small">Final thoughts and connections</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Speakers -->
                    <div class="mb-4">
                        <h5 class="mb-3">Featured Speakers</h5>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="d-flex align-items-center">
                                    <img src="https://images.unsplash.com/photo-1494790108755-2616b612b786?w=60&h=60&fit=crop&crop=face"
                                         class="rounded-circle me-3" width="60" height="60">
                                    <div>
                                        <h6 class="mb-0">Dr. Sarah Johnson</h6>
                                        <p class="text-muted mb-0 small">AI Research Director, MIT</p>
                                        <p class="text-muted mb-0 small">Keynote Speaker</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-center">
                                    <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=60&h=60&fit=crop&crop=face"
                                         class="rounded-circle me-3" width="60" height="60">
                                    <div>
                                        <h6 class="mb-0">Michael Chen</h6>
                                        <p class="text-muted mb-0 small">CTO, TechCorp</p>
                                        <p class="text-muted mb-0 small">Panel Moderator</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tags -->
                    <div>
                        <h6 class="mb-2">Tags</h6>
                        <div class="d-flex flex-wrap gap-2">
                            <span class="badge bg-light text-dark border">Technology</span>
                            <span class="badge bg-light text-dark border">AI</span>
                            <span class="badge bg-light text-dark border">Machine Learning</span>
                            <span class="badge bg-light text-dark border">Blockchain</span>
                            <span class="badge bg-light text-dark border">Networking</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Reviews Section -->
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-0 py-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">
                            <i class="fas fa-star text-warning me-2"></i>Reviews & Ratings
                        </h5>
                        <div class="d-flex align-items-center">
                            <span class="text-warning me-2">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </span>
                            <span class="fw-bold">4.5</span>
                            <span class="text-muted ms-1">(23 reviews)</span>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Sample Reviews -->
                    <div class="border-bottom pb-3 mb-3">
                        <div class="d-flex align-items-start">
                            <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=40&h=40&fit=crop&crop=face"
                                 class="rounded-circle me-3" width="40" height="40">
                            <div class="flex-grow-1">
                                <div class="d-flex justify-content-between align-items-start mb-1">
                                    <h6 class="mb-0">John Smith</h6>
                                    <small class="text-muted">2 days ago</small>
                                </div>
                                <div class="text-warning mb-2">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <p class="text-muted mb-0">Amazing event! Great speakers and excellent networking opportunities. Highly recommend!</p>
                            </div>
                        </div>
                    </div>

                    <div class="text-center">
                        <button class="btn btn-outline-primary" onclick="showAllReviews()">
                            View All Reviews
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4">
            <!-- Registration Card -->
            <div class="card border-0 shadow-sm mb-4 position-sticky" style="top: 20px;">
                <div class="card-header bg-light border-0 py-3">
                    <h5 class="card-title mb-0 text-center">
                        <i class="fas fa-ticket-alt text-primary me-2"></i>Register Now
                    </h5>
                </div>
                <div class="card-body p-4">
                    <!-- Ticket Options -->
                    <div class="mb-4">
                        <h6 class="mb-3">Choose Your Ticket</h6>

                        <div class="border rounded p-3 mb-3 ticket-option" data-price="99" data-type="regular">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="ticket_type" id="regular" value="regular" checked>
                                <label class="form-check-label w-100" for="regular">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <strong>Regular Ticket</strong>
                                            <br><small class="text-muted">General admission</small>
                                        </div>
                                        <div class="text-end">
                                            <strong>$99</strong>
                                        </div>
                                    </div>
                                </label>
                            </div>
                        </div>

                        <div class="border rounded p-3 mb-3 ticket-option" data-price="199" data-type="vip">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="ticket_type" id="vip" value="vip">
                                <label class="form-check-label w-100" for="vip">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <strong>VIP Ticket</strong>
                                            <br><small class="text-muted">Premium access + lunch</small>
                                        </div>
                                        <div class="text-end">
                                            <strong>$199</strong>
                                        </div>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Quantity -->
                    <div class="mb-4">
                        <label class="form-label">Number of Tickets</label>
                        <div class="input-group">
                            <button class="btn btn-outline-secondary" type="button" onclick="changeQuantity(-1)">-</button>
                            <input type="number" class="form-control text-center" id="quantity" value="1" min="1" max="10">
                            <button class="btn btn-outline-secondary" type="button" onclick="changeQuantity(1)">+</button>
                        </div>
                    </div>

                    <!-- Total -->
                    <div class="border-top pt-3 mb-4">
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="fw-bold">Total:</span>
                            <span class="h5 text-primary mb-0" id="total-price">$99.00</span>
                        </div>
                    </div>

                    <!-- Register Button -->
                    @auth
                        <div class="d-grid mb-3">
                            <button class="btn btn-gradient btn-lg" onclick="proceedToPayment()">
                                <i class="fas fa-credit-card me-2"></i>Buy Tickets
                            </button>
                        </div>
                    @else
                        <div class="d-grid mb-3">
                            <a href="/auth/login" class="btn btn-gradient btn-lg">
                                <i class="fas fa-sign-in-alt me-2"></i>Login to Register
                            </a>
                        </div>
                    @endauth

                    <!-- Event Status -->
                    <div class="text-center">
                        <small class="text-success">
                            <i class="fas fa-check-circle me-1"></i>255 spots remaining
                        </small>
                    </div>
                </div>
            </div>

            <!-- Event Info -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white border-0 py-3">
                    <h6 class="card-title mb-0">
                        <i class="fas fa-info-circle text-info me-2"></i>Event Information
                    </h6>
                </div>
                <div class="card-body p-3">
                    <div class="mb-3">
                        <small class="text-muted d-block">Event ID</small>
                        <span class="font-monospace">#EV-2024-001</span>
                    </div>
                    <div class="mb-3">
                        <small class="text-muted d-block">Category</small>
                        <span class="badge bg-primary">Technology</span>
                    </div>
                    <div class="mb-3">
                        <small class="text-muted d-block">Language</small>
                        <span>English</span>
                    </div>
                    <div class="mb-0">
                        <small class="text-muted d-block">Dress Code</small>
                        <span>Business Casual</span>
                    </div>
                </div>
            </div>

            <!-- Share Event -->
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-0 py-3">
                    <h6 class="card-title mb-0">
                        <i class="fas fa-share text-success me-2"></i>Share This Event
                    </h6>
                </div>
                <div class="card-body p-3">
                    <div class="d-flex gap-2">
                        <button class="btn btn-outline-primary btn-sm flex-fill" onclick="shareToFacebook()">
                            <i class="fab fa-facebook"></i>
                        </button>
                        <button class="btn btn-outline-info btn-sm flex-fill" onclick="shareToTwitter()">
                            <i class="fab fa-twitter"></i>
                        </button>
                        <button class="btn btn-outline-success btn-sm flex-fill" onclick="shareToWhatsApp()">
                            <i class="fab fa-whatsapp"></i>
                        </button>
                        <button class="btn btn-outline-secondary btn-sm flex-fill" onclick="copyLink()">
                            <i class="fas fa-link"></i>
                        </button>
                    </div>
>>>>>>> 8a996aa7d56b8b38ce7291c226b99d292509af77
                </div>
            </div>
        </div>
    </div>
</div>

<<<<<<< HEAD
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <!-- Event Description -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body p-4">
                        <h4 class="fw-bold mb-4">About This Event</h4>

                        <div class="event-description mb-4">
                            @if(isset($event->description))
                                {!! nl2br(e($event->description)) !!}
                            @else
                                <p>Join the biggest tech conference of the year featuring industry leaders and cutting-edge innovations. This conference brings together experts from around the world to discuss the latest trends in technology, AI, blockchain, and more.</p>

                                <p>Over the course of three days, you'll have the opportunity to attend keynote speeches, participate in hands-on workshops, network with industry professionals, and gain valuable insights into the future of tech.</p>

                                <h5 class="fw-bold mt-4 mb-3">What to expect:</h5>
                                <ul>
                                    <li>Keynote speeches from industry leaders</li>
                                    <li>Panel discussions on emerging technologies</li>
                                    <li>Hands-on workshops and demonstrations</li>
                                    <li>Networking opportunities with professionals</li>
                                    <li>Product exhibitions from leading tech companies</li>
                                    <li>Career fair and recruitment opportunities</li>
                                </ul>

                                <p class="mt-4">Don't miss this opportunity to be part of the most anticipated tech event of the year!</p>
                            @endif
                        </div>

                        <div class="d-flex flex-wrap align-items-center mt-4 pt-3 border-top">
                            <div class="me-3 mb-2">
                                <strong>Share this event:</strong>
                            </div>
                            <div class="social-share mb-2">
                                <a href="#" class="btn btn-outline-secondary btn-sm rounded-circle me-2">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="#" class="btn btn-outline-secondary btn-sm rounded-circle me-2">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="#" class="btn btn-outline-secondary btn-sm rounded-circle me-2">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                                <a href="#" class="btn btn-outline-secondary btn-sm rounded-circle">
                                    <i class="fas fa-envelope"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Event Location -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body p-4">
                        <h4 class="fw-bold mb-4">Location</h4>

                        <div class="mb-4">
                            <h5 class="fw-bold">{{ $event->location ?? 'Moscone Center' }}</h5>
                            <p class="text-muted">{{ $event->address ?? '747 Howard St, San Francisco, CA 94103' }}</p>
                        </div>

                        <div class="location-map rounded overflow-hidden mb-3">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3153.1080023668623!2d-122.4033233!3d37.7841189!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x808580877d4006e3%3A0xaf894c29473dec8!2sMoscone%20Center!5e0!3m2!1sen!2sus!4v1664554290672!5m2!1sen!2sus"
                                width="100%"
                                height="300"
                                style="border: 0;"
                                allowfullscreen
                                loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        </div>

                        <div class="d-flex align-items-center">
                            <a href="https://maps.google.com/?q={{ urlencode($event->address ?? 'Moscone Center, San Francisco') }}"
                               class="btn btn-outline-primary"
                               target="_blank">
                                <i class="fas fa-directions me-2"></i>Get Directions
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Organizer -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body p-4">
                        <h4 class="fw-bold mb-4">Organizer</h4>

                        <div class="d-flex">
                            <div class="flex-shrink-0">
                                <div class="organizer-logo rounded-circle bg-light d-flex align-items-center justify-content-center">
                                    <i class="fas fa-building text-primary fs-4"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h5 class="fw-bold mb-1">{{ $event->company->name ?? 'TechEvents Inc.' }}</h5>
                                <p class="text-muted mb-2">{{ $event->company->description ?? 'Leading provider of tech conferences and events worldwide.' }}</p>
                                <a href="#" class="btn btn-sm btn-outline-secondary me-2">
                                    <i class="fas fa-globe me-1"></i>Website
                                </a>
                                <a href="#" class="btn btn-sm btn-outline-secondary">
                                    <i class="fas fa-envelope me-1"></i>Contact
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Similar Events -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h4 class="fw-bold mb-0">Similar Events</h4>
                            <a href="{{ route('events.index') }}" class="text-decoration-none">View All</a>
                        </div>

                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="card border card-hover h-100">
                                    <img src="https://images.unsplash.com/photo-1505373877841-8d25f7d46678?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" class="card-img-top" alt="Event" style="height: 140px; object-fit: cover;">
                                    <div class="card-body">
                                        <h6 class="card-title fw-bold mb-1">DevOps Summit 2025</h6>
                                        <p class="small text-muted mb-2">September 10, 2025</p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="badge bg-light text-dark">Tech</span>
                                            <span class="text-primary fw-bold">$75</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card border card-hover h-100">
                                    <img src="https://images.unsplash.com/photo-1515187029135-18ee286d815b?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" class="card-img-top" alt="Event" style="height: 140px; object-fit: cover;">
                                    <div class="card-body">
                                        <h6 class="card-title fw-bold mb-1">AI & Machine Learning Expo</h6>
                                        <p class="small text-muted mb-2">October 5, 2025</p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="badge bg-light text-dark">Tech</span>
                                            <span class="text-primary fw-bold">$120</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <!-- Ticket Card -->
                <div class="sticky-lg-top" style="top: 100px; z-index: 1;">
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-body p-4">
                            <h4 class="fw-bold mb-4">Tickets</h4>

                            <div class="ticket-options">
                                <!-- Standard Ticket -->
                                <div class="ticket-card mb-3 p-3 border rounded">
                                    <div class="d-flex justify-content-between mb-2">
                                        <h5 class="fw-bold mb-0">Standard</h5>
                                        <span class="fw-bold text-primary">${{ $event->ticket->price ?? '99.00' }}</span>
                                    </div>
                                    <p class="small text-muted mb-3">Access to all keynotes, workshops, and networking events</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="small text-muted">
                                            <i class="fas fa-ticket-alt me-1"></i>
                                            {{ $event->ticket->quantity ?? '100' }} tickets left
                                        </span>
                                        <div class="input-group input-group-sm ticket-quantity" style="width: 100px;">
                                            <button class="btn btn-outline-secondary quantity-down" type="button">-</button>
                                            <input type="text" class="form-control text-center quantity-input" value="1">
                                            <button class="btn btn-outline-secondary quantity-up" type="button">+</button>
                                        </div>
                                    </div>
                                </div>

                                <!-- VIP Ticket -->
                                <div class="ticket-card p-3 border rounded mb-4">
                                    <div class="d-flex justify-content-between mb-2">
                                        <div>
                                            <h5 class="fw-bold mb-0">VIP Pass</h5>
                                            <span class="badge bg-warning text-dark">Best Value</span>
                                        </div>
                                        <span class="fw-bold text-primary">$199.00</span>
                                    </div>
                                    <p class="small text-muted mb-3">All standard benefits plus exclusive VIP lounge access, priority seating, and special networking dinner</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="small text-muted">
                                            <i class="fas fa-ticket-alt me-1"></i>
                                            20 tickets left
                                        </span>
                                        <div class="input-group input-group-sm ticket-quantity" style="width: 100px;">
                                            <button class="btn btn-outline-secondary quantity-down" type="button">-</button>
                                            <input type="text" class="form-control text-center quantity-input" value="0">
                                            <button class="btn btn-outline-secondary quantity-up" type="button">+</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="ticket-summary p-3 bg-light rounded">
                                <div class="d-flex justify-content-between mb-2">
                                    <span>Standard Ticket (1)</span>
                                    <span>$99.00</span>
                                </div>
                                <div class="d-flex justify-content-between mb-2">
                                    <span>Service Fee</span>
                                    <span>$5.95</span>
                                </div>
                                <div class="d-flex justify-content-between fw-bold mt-2 pt-2 border-top">
                                    <span>Total</span>
                                    <span>$104.95</span>
                                </div>
                            </div>

                            <div class="d-grid gap-2 mt-4">
                                <button class="btn btn-primary-custom btn-lg">
                                    Register Now
                                </button>
                                <button class="btn btn-outline-secondary">
                                    <i class="far fa-calendar-plus me-2"></i>Add to Calendar
                                </button>
                            </div>

                            <div class="text-center mt-3">
                                <small class="text-muted">
                                    <i class="fas fa-lock me-1"></i>Secure checkout powered by Stripe
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
    .event-banner {
        height: 400px;
        background-size: cover;
        background-position: center;
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
    }

    .overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.8));
    }

    .event-detail-header {
        color: white;
        padding-top: 80px;
        margin-bottom: 20px;
    }

    .avatar-group {
        display: flex;
    }

    .avatar {
        width: 36px;
        height: 36px;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 2px solid #fff;
        margin-left: -8px;
        overflow: hidden;
        font-size: 12px;
        font-weight: 600;
    }

    .avatar:first-child {
        margin-left: 0;
    }

    .avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .card-hover {
        transition: all 0.3s ease;
    }

    .card-hover:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
    }

    .organizer-logo {
        width: 60px;
        height: 60px;
    }
</style>
@endpush

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Ticket quantity controls
        const quantityDown = document.querySelectorAll('.quantity-down');
        const quantityUp = document.querySelectorAll('.quantity-up');
        const quantityInputs = document.querySelectorAll('.quantity-input');

        quantityDown.forEach(function(btn, index) {
            btn.addEventListener('click', function() {
                const currentValue = parseInt(quantityInputs[index].value);
                if (currentValue > 0) {
                    quantityInputs[index].value = currentValue - 1;
                    updateSummary();
                }
            });
        });

        quantityUp.forEach(function(btn, index) {
            btn.addEventListener('click', function() {
                const currentValue = parseInt(quantityInputs[index].value);
                if (currentValue < 10) {  // Maximum 10 tickets per person
                    quantityInputs[index].value = currentValue + 1;
                    updateSummary();
                }
            });
        });

        function updateSummary() {
            // This is a simplified version - would be more complex in a real application
            const standardQuantity = parseInt(quantityInputs[0].value);
            const vipQuantity = parseInt(quantityInputs[1].value);

            const standardPrice = 99;
            const vipPrice = 199;

            const standardTotal = standardQuantity * standardPrice;
            const vipTotal = vipQuantity * vipPrice;
            const subtotal = standardTotal + vipTotal;

            // Service fee calculation (simplified)
            const serviceFee = subtotal > 0 ? (subtotal * 0.06).toFixed(2) : 0;

            const total = (parseFloat(subtotal) + parseFloat(serviceFee)).toFixed(2);

            // Update summary in the DOM
            const summaryEl = document.querySelector('.ticket-summary');
            let html = '';

            if (standardQuantity > 0) {
                html += `<div class="d-flex justify-content-between mb-2">
                            <span>Standard Ticket (${standardQuantity})</span>
                            <span>$${standardTotal.toFixed(2)}</span>
                         </div>`;
            }

            if (vipQuantity > 0) {
                html += `<div class="d-flex justify-content-between mb-2">
                            <span>VIP Pass (${vipQuantity})</span>
                            <span>$${vipTotal.toFixed(2)}</span>
                         </div>`;
            }

            html += `<div class="d-flex justify-content-between mb-2">
                        <span>Service Fee</span>
                        <span>$${serviceFee}</span>
                     </div>
                     <div class="d-flex justify-content-between fw-bold mt-2 pt-2 border-top">
                        <span>Total</span>
                        <span>$${total}</span>
                     </div>`;

            summaryEl.innerHTML = html;
        }
    });
</script>
@endpush

{{-- Include the new ticket purchase section component --}}
<x-ticket-purchase-section :event="$event" />
=======
@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    updateTotalPrice();

    // Ticket type change handler
    document.querySelectorAll('input[name="ticket_type"]').forEach(radio => {
        radio.addEventListener('change', updateTotalPrice);
    });
});

function changeQuantity(delta) {
    const quantityInput = document.getElementById('quantity');
    const currentValue = parseInt(quantityInput.value);
    const newValue = Math.max(1, Math.min(10, currentValue + delta));
    quantityInput.value = newValue;
    updateTotalPrice();
}

function updateTotalPrice() {
    const selectedTicket = document.querySelector('input[name="ticket_type"]:checked');
    const quantity = parseInt(document.getElementById('quantity').value);
    const price = parseFloat(selectedTicket.closest('.ticket-option').dataset.price);
    const total = price * quantity;

    document.getElementById('total-price').textContent = `$${total.toFixed(2)}`;
}

function proceedToPayment() {
    const selectedTicket = document.querySelector('input[name="ticket_type"]:checked').value;
    const quantity = document.getElementById('quantity').value;

    // Redirect to payment page with parameters
    window.location.href = `/tickets/payment?event=tech-conference-2024&type=${selectedTicket}&quantity=${quantity}`;
}

function shareEvent() {
    if (navigator.share) {
        navigator.share({
            title: 'Tech Conference 2024',
            text: 'Check out this amazing tech conference!',
            url: window.location.href
        });
    } else {
        copyLink();
    }
}

function addToCalendar() {
    const startDate = '20240315T100000';
    const endDate = '20240315T180000';
    const title = 'Tech Conference 2024';
    const location = 'Convention Center, 123 Main St, New York, NY 10001';

    const url = `https://calendar.google.com/calendar/render?action=TEMPLATE&text=${encodeURIComponent(title)}&dates=${startDate}/${endDate}&location=${encodeURIComponent(location)}`;
    window.open(url, '_blank');
}

function toggleWishlist() {
    // Toggle wishlist functionality
    const button = event.target.closest('button');
    const icon = button.querySelector('i');

    if (icon.classList.contains('fas')) {
        icon.classList.remove('fas');
        icon.classList.add('far');
        showNotification('Removed from wishlist', 'info');
    } else {
        icon.classList.remove('far');
        icon.classList.add('fas');
        showNotification('Added to wishlist', 'success');
    }
}

function shareToFacebook() {
    const url = `https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(window.location.href)}`;
    window.open(url, '_blank', 'width=600,height=400');
}

function shareToTwitter() {
    const text = 'Check out this amazing tech conference!';
    const url = `https://twitter.com/intent/tweet?text=${encodeURIComponent(text)}&url=${encodeURIComponent(window.location.href)}`;
    window.open(url, '_blank', 'width=600,height=400');
}

function shareToWhatsApp() {
    const text = `Check out this amazing tech conference! ${window.location.href}`;
    const url = `https://wa.me/?text=${encodeURIComponent(text)}`;
    window.open(url, '_blank');
}

function copyLink() {
    navigator.clipboard.writeText(window.location.href).then(function() {
        showNotification('Link copied to clipboard!', 'success');
    });
}

function showAllReviews() {
    window.location.href = '/events/tech-conference-2024/reviews';
}

function showNotification(message, type) {
    const notification = document.createElement('div');
    notification.className = `alert alert-${type === 'success' ? 'success' : type === 'error' ? 'danger' : 'info'} alert-dismissible fade show position-fixed`;
    notification.style.cssText = 'top: 20px; right: 20px; z-index: 1050; min-width: 300px;';
    notification.innerHTML = `
        <i class="fas fa-${type === 'success' ? 'check-circle' : type === 'error' ? 'exclamation-circle' : 'info-circle'} me-2"></i>
        ${message}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    `;

    document.body.appendChild(notification);

    setTimeout(() => {
        if (notification.parentNode) {
            notification.remove();
        }
    }, 5000);
}
</script>
@endpush
@endsection
>>>>>>> 8a996aa7d56b8b38ce7291c226b99d292509af77
