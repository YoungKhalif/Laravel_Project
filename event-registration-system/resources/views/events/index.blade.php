@extends('layouts.app')

<<<<<<< HEAD
@section('title', 'Discover Amazing Events - EventPro')

@push('styles')
<style>
    .hero-section {
        background: linear-gradient(135deg, rgba(59, 130, 246, 0.95) 0%, rgba(139, 92, 246, 0.95) 100%),
                    url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><defs><radialGradient id="a" cx="50%" cy="50%"><stop offset="0%" stop-color="%23ffffff" stop-opacity="0.1"/><stop offset="100%" stop-color="%23ffffff" stop-opacity="0"/></radialGradient></defs><circle cx="200" cy="200" r="100" fill="url(%23a)"/><circle cx="800" cy="300" r="150" fill="url(%23a)"/><circle cx="600" cy="700" r="120" fill="url(%23a)"/></svg>');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        min-height: 60vh;
        position: relative;
        overflow: hidden;
    }

    .search-card {
        backdrop-filter: blur(20px);
        background: rgba(255, 255, 255, 0.95);
        border: 1px solid rgba(255, 255, 255, 0.2);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
    }

    .event-card {
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        border: none;
        overflow: hidden;
        position: relative;
        background: white;
    }

    .event-card:hover {
        transform: translateY(-10px) rotateX(5deg);
        box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
    }

    .event-card-image {
        position: relative;
        overflow: hidden;
        height: 200px;
    }

    .event-card-image img {
        transition: transform 0.6s ease;
        object-fit: cover;
        width: 100%;
        height: 100%;
    }

    .event-card:hover .event-card-image img {
        transform: scale(1.1);
    }

    .event-card-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(45deg, rgba(59, 130, 246, 0.8), rgba(139, 92, 246, 0.8));
        opacity: 0;
        transition: opacity 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .event-card:hover .event-card-overlay {
        opacity: 1;
    }

    .filter-chip {
        background: rgba(59, 130, 246, 0.1);
        color: var(--primary-color);
        border: 1px solid rgba(59, 130, 246, 0.2);
        border-radius: 50px;
        padding: 6px 16px;
        font-size: 14px;
        font-weight: 500;
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .filter-chip:hover,
    .filter-chip.active {
        background: var(--primary-color);
        color: white;
        border-color: var(--primary-color);
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(59, 130, 246, 0.3);
    }

    .stats-card {
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.9), rgba(255, 255, 255, 0.7));
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.3);
        transition: all 0.3s ease;
    }

    .stats-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
    }

    .floating-elements {
        position: absolute;
        width: 100%;
        height: 100%;
        overflow: hidden;
        z-index: 1;
    }

    .floating-elements::before {
        content: '';
        position: absolute;
        top: 20%;
        left: 10%;
        width: 100px;
        height: 100px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
        animation: float 6s ease-in-out infinite;
    }

    .floating-elements::after {
        content: '';
        position: absolute;
        bottom: 30%;
        right: 15%;
        width: 150px;
        height: 150px;
        background: rgba(255, 255, 255, 0.05);
        border-radius: 50%;
        animation: float 8s ease-in-out infinite reverse;
    }

    @keyframes float {
        0%, 100% { transform: translateY(0) rotate(0deg); }
        50% { transform: translateY(-20px) rotate(10deg); }
    }

    .category-icon {
        width: 50px;
        height: 50px;
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 20px;
        margin-bottom: 1rem;
        transition: all 0.3s ease;
    }

    .category-card:hover .category-icon {
        transform: rotate(10deg) scale(1.1);
        box-shadow: 0 10px 25px rgba(59, 130, 246, 0.3);
    }

    .price-badge {
        position: absolute;
        top: 15px;
        right: 15px;
        background: linear-gradient(135deg, #10b981, #059669);
        color: white;
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        z-index: 2;
    }

    .date-badge {
        position: absolute;
        top: 15px;
        left: 15px;
        background: rgba(255, 255, 255, 0.95);
        color: var(--primary-color);
        padding: 8px 12px;
        border-radius: 12px;
        font-size: 12px;
        font-weight: 600;
        z-index: 2;
        backdrop-filter: blur(10px);
    }
</style>
@endpush

@section('content')
<!-- Hero Section -->
<section class="hero-section d-flex align-items-center position-relative">
    <div class="floating-elements"></div>
    <div class="container-xl position-relative" style="z-index: 2;">
        <div class="row align-items-center">
            <div class="col-lg-6" data-aos="fade-right">
                <h1 class="display-4 fw-bold text-white mb-4 font-poppins">
                    Discover Amazing <span class="text-warning">Events</span>
                </h1>
                <p class="lead text-white mb-5 opacity-90">
                    Find and join incredible events that match your interests. From conferences to concerts, workshops to festivals - your next adventure awaits!
                </p>

                <!-- Quick Stats -->
                <div class="row g-3 mb-5">
                    <div class="col-4">
                        <div class="stats-card rounded-xl p-3 text-center">
                            <div class="fw-bold fs-4 text-primary">{{ $events->total() ?? 0 }}</div>
                            <div class="small text-muted">Total Events</div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="stats-card rounded-xl p-3 text-center">
                            <div class="fw-bold fs-4 text-success">24+</div>
                            <div class="small text-muted">Categories</div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="stats-card rounded-xl p-3 text-center">
                            <div class="fw-bold fs-4 text-warning">50K+</div>
                            <div class="small text-muted">Attendees</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6" data-aos="fade-left" data-aos-delay="200">
                <!-- Search Card -->
                <div class="search-card rounded-xl p-4 shadow-xl">
                    <h4 class="fw-bold mb-4 text-gradient">Find Your Perfect Event</h4>
                    <form action="{{ route('events.index') }}" method="GET" class="needs-validation" novalidate>
                        <div class="mb-3">
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="fas fa-search text-primary"></i>
                                </span>
                                <input type="text" class="form-control-custom border-start-0 ps-2"
                                       placeholder="Search events, keywords..."
                                       name="search"
                                       value="{{ request('search') }}"
                                       required>
                            </div>
                        </div>

                        <div class="row g-3 mb-4">
                            <div class="col-6">
                                <select class="form-select form-control-custom" name="category">
                                    <option value="">All Categories</option>
                                    <option value="technology" {{ request('category') == 'technology' ? 'selected' : '' }}>Technology</option>
                                    <option value="business" {{ request('category') == 'business' ? 'selected' : '' }}>Business</option>
                                    <option value="music" {{ request('category') == 'music' ? 'selected' : '' }}>Music</option>
                                    <option value="sports" {{ request('category') == 'sports' ? 'selected' : '' }}>Sports</option>
                                    <option value="arts" {{ request('category') == 'arts' ? 'selected' : '' }}>Arts & Culture</option>
                                    <option value="food" {{ request('category') == 'food' ? 'selected' : '' }}>Food & Drink</option>
                                    <option value="health" {{ request('category') == 'health' ? 'selected' : '' }}>Health & Wellness</option>
                                    <option value="education" {{ request('category') == 'education' ? 'selected' : '' }}>Education</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <select class="form-select form-control-custom" name="location">
                                    <option value="">All Locations</option>
                                    <option value="san francisco" {{ request('location') == 'san francisco' ? 'selected' : '' }}>San Francisco</option>
                                    <option value="new york" {{ request('location') == 'new york' ? 'selected' : '' }}>New York</option>
                                    <option value="austin" {{ request('location') == 'austin' ? 'selected' : '' }}>Austin</option>
                                    <option value="chicago" {{ request('location') == 'chicago' ? 'selected' : '' }}>Chicago</option>
                                    <option value="los angeles" {{ request('location') == 'los angeles' ? 'selected' : '' }}>Los Angeles</option>
                                    <option value="miami" {{ request('location') == 'miami' ? 'selected' : '' }}>Miami</option>
                                    <option value="seattle" {{ request('location') == 'seattle' ? 'selected' : '' }}>Seattle</option>
                                    <option value="boston" {{ request('location') == 'boston' ? 'selected' : '' }}>Boston</option>
                                </select>
                            </div>
                        </div>

                        <div class="row g-3 mb-4">
                            <div class="col-6">
                                <select class="form-select form-control-custom" name="date">
                                    <option value="">Any Date</option>
                                    <option value="today" {{ request('date') == 'today' ? 'selected' : '' }}>Today</option>
                                    <option value="tomorrow" {{ request('date') == 'tomorrow' ? 'selected' : '' }}>Tomorrow</option>
                                    <option value="week" {{ request('date') == 'week' ? 'selected' : '' }}>This Week</option>
                                    <option value="month" {{ request('date') == 'month' ? 'selected' : '' }}>This Month</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <select class="form-select form-control-custom" name="price">
                                    <option value="">Any Price</option>
                                    <option value="free" {{ request('price') == 'free' ? 'selected' : '' }}>Free</option>
                                    <option value="paid" {{ request('price') == 'paid' ? 'selected' : '' }}>Paid</option>
                                </select>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary-custom w-100 py-3">
                            <i class="fas fa-search me-2"></i>Search Events
                        </button>
=======
@section('title', 'Events - EventSmart')

@section('content')
<div class="container-fluid px-4 py-5">
    <!-- Header -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="h3 fw-bold mb-1">All Events</h1>
                    <p class="text-muted mb-0">Discover amazing events happening near you</p>
                </div>
                @auth
                    <div>
                        <a href="{{ route('events.create') }}" class="btn btn-gradient">
                            <i class="fas fa-plus me-2"></i>Create Event
                        </a>
                    </div>
                @endauth
            </div>
        </div>
    </div>

    <!-- Filters -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <form method="GET" action="{{ route('events.index') }}">
                        <div class="row g-3 align-items-end">
                            <div class="col-lg-3 col-md-6">
                                <label for="search" class="form-label">Search Events</label>
                                <input type="text" class="form-control" id="search" name="search"
                                       placeholder="Search by title or description" value="{{ request('search') }}">
                            </div>
                            <div class="col-lg-2 col-md-6">
                                <label for="category" class="form-label">Category</label>
                                <select class="form-select" id="category" name="category">
                                    <option value="">All Categories</option>
                                    <option value="technology" {{ request('category') == 'technology' ? 'selected' : '' }}>Technology</option>
                                    <option value="business" {{ request('category') == 'business' ? 'selected' : '' }}>Business</option>
                                    <option value="arts" {{ request('category') == 'arts' ? 'selected' : '' }}>Arts & Culture</option>
                                    <option value="music" {{ request('category') == 'music' ? 'selected' : '' }}>Music</option>
                                    <option value="sports" {{ request('category') == 'sports' ? 'selected' : '' }}>Sports</option>
                                    <option value="education" {{ request('category') == 'education' ? 'selected' : '' }}>Education</option>
                                </select>
                            </div>
                            <div class="col-lg-2 col-md-6">
                                <label for="date_from" class="form-label">From Date</label>
                                <input type="date" class="form-control" id="date_from" name="date_from" value="{{ request('date_from') }}">
                            </div>
                            <div class="col-lg-2 col-md-6">
                                <label for="date_to" class="form-label">To Date</label>
                                <input type="date" class="form-control" id="date_to" name="date_to" value="{{ request('date_to') }}">
                            </div>
                            <div class="col-lg-2 col-md-6">
                                <label for="location" class="form-label">Location</label>
                                <input type="text" class="form-control" id="location" name="location"
                                       placeholder="City or venue" value="{{ request('location') }}">
                            </div>
                            <div class="col-lg-1 col-md-6">
                                <button type="submit" class="btn btn-primary w-100">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
>>>>>>> 8a996aa7d56b8b38ce7291c226b99d292509af77
                    </form>
                </div>
            </div>
        </div>
    </div>
<<<<<<< HEAD
</section>

<!-- Events Section -->
<section class="py-5 bg-light">
    <div class="container-xl">
        <!-- Section Header -->
        <div class="row mb-5" data-aos="fade-up">
            <div class="col-lg-8">
                <h2 class="display-6 fw-bold mb-3 font-poppins">
                    {{ request()->has('search') ? 'Search Results' : 'Trending Events' }}
                </h2>
                <p class="text-muted lead">
                    {{ request()->has('search') ? 'Found ' . ($events->total() ?? 0) . ' events matching your criteria' : 'Discover the most popular events happening right now' }}
                </p>
            </div>
            <div class="col-lg-4 text-lg-end">
                @auth
                    @if(auth()->user()->role === 'organizer' || auth()->user()->role === 'admin')
                        <a href="{{ route('events.create') }}" class="btn btn-primary-custom btn-lg px-4 py-3">
                            <i class="fas fa-plus me-2"></i>Create Event
                        </a>
                    @endif
                @endauth
            </div>
        </div>

        <!-- Filter Chips -->
        <div class="mb-5" data-aos="fade-up" data-aos-delay="100">
            <div class="d-flex flex-wrap gap-2">
                <span class="filter-chip {{ !request()->has('category') ? 'active' : '' }}">
                    <a href="{{ route('events.index') }}" class="text-decoration-none">All Events</a>
                </span>
                <span class="filter-chip {{ request('category') == 'technology' ? 'active' : '' }}">
                    <a href="{{ route('events.index', ['category' => 'technology']) }}" class="text-decoration-none">
                        <i class="fas fa-laptop-code me-1"></i>Technology
                    </a>
                </span>
                <span class="filter-chip {{ request('category') == 'business' ? 'active' : '' }}">
                    <a href="{{ route('events.index', ['category' => 'business']) }}" class="text-decoration-none">
                        <i class="fas fa-briefcase me-1"></i>Business
                    </a>
                </span>
                <span class="filter-chip {{ request('category') == 'music' ? 'active' : '' }}">
                    <a href="{{ route('events.index', ['category' => 'music']) }}" class="text-decoration-none">
                        <i class="fas fa-music me-1"></i>Music
                    </a>
                </span>
                <span class="filter-chip {{ request('category') == 'arts' ? 'active' : '' }}">
                    <a href="{{ route('events.index', ['category' => 'arts']) }}" class="text-decoration-none">
                        <i class="fas fa-palette me-1"></i>Arts & Culture
                    </a>
                </span>
                <span class="filter-chip {{ request('category') == 'sports' ? 'active' : '' }}">
                    <a href="{{ route('events.index', ['category' => 'sports']) }}" class="text-decoration-none">
                        <i class="fas fa-dumbbell me-1"></i>Sports
                    </a>
                </span>
            </div>
        </div>

        <!-- Events Grid -->
        @if(isset($events) && $events->count() > 0)
            <div class="grid-responsive" data-aos="fade-up" data-aos-delay="200">
                @foreach($events as $index => $event)
                    <div class="event-card card-animate rounded-xl shadow-lg" data-aos="zoom-in" data-aos-delay="{{ 100 + ($index * 100) }}">
                        <!-- Event Image -->
                        <div class="event-card-image">
                            @if($event->image)
                                <img src="{{ asset('storage/' . $event->image) }}" alt="{{ $event->title }}">
                            @else
                                <img src="https://images.unsplash.com/photo-1540575467063-178a50c2df87?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" alt="{{ $event->title }}">
                            @endif

                            <!-- Price Badge -->
                            @if($event->ticket && $event->ticket->price > 0)
                                <div class="price-badge">
                                    ${{ number_format($event->ticket->price, 0) }}
                                </div>
                            @else
                                <div class="price-badge" style="background: linear-gradient(135deg, #10b981, #059669);">
                                    FREE
                                </div>
                            @endif

                            <!-- Date Badge -->
                            <div class="date-badge">
                                <i class="fas fa-calendar me-1"></i>
                                {{ \Carbon\Carbon::parse($event->start_date)->format('M j') }}
                            </div>

                            <!-- Hover Overlay -->
                            <div class="event-card-overlay">
                                <a href="{{ route('events.show', $event->id) }}" class="btn btn-light btn-lg">
                                    <i class="fas fa-eye me-2"></i>View Details
                                </a>
                            </div>
                        </div>

                        <!-- Event Content -->
                        <div class="p-4">
                            <!-- Category & Rating -->
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="badge bg-primary-subtle text-primary px-3 py-1 rounded-pill">
                                    {{ ucfirst($event->category ?? 'General') }}
                                </span>
                                <div class="d-flex align-items-center text-muted small">
                                    <div class="me-2">
                                        @for($i = 1; $i <= 5; $i++)
                                            <i class="fas fa-star {{ $i <= 4 ? 'text-warning' : 'text-muted' }}"></i>
                                        @endfor
                                    </div>
                                    <span>(4.8)</span>
                                </div>
                            </div>

                            <!-- Event Title -->
                            <h5 class="fw-bold mb-2 text-truncate">
                                <a href="{{ route('events.show', $event->id) }}" class="text-decoration-none text-dark">
                                    {{ $event->title }}
                                </a>
                            </h5>

                            <!-- Event Meta -->
                            <div class="text-muted small mb-3">
                                <div class="d-flex align-items-center mb-1">
                                    <i class="fas fa-map-marker-alt me-2 text-primary"></i>
                                    <span class="text-truncate">{{ $event->location }}</span>
                                </div>
                                <div class="d-flex align-items-center mb-1">
                                    <i class="fas fa-clock me-2 text-primary"></i>
                                    <span>{{ \Carbon\Carbon::parse($event->start_date)->format('M j, Y') }} at {{ \Carbon\Carbon::parse($event->start_time)->format('g:i A') }}</span>
                                </div>
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-users me-2 text-primary"></i>
                                    <span>{{ $event->ticket ? $event->ticket->total - $event->ticket->available : 0 }} attending</span>
                                </div>
                            </div>

                            <!-- Event Description -->
                            <p class="text-muted small mb-3" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                                {{ $event->description }}
                            </p>

                            <!-- Action Buttons -->
                            <div class="d-flex gap-2">
                                <a href="{{ route('events.show', $event->id) }}" class="btn btn-primary-custom flex-fill">
                                    <i class="fas fa-info-circle me-2"></i>Details
                                </a>
                                @if($event->ticket && $event->ticket->available > 0)
                                    <a href="{{ route('tickets.purchase', $event->id) }}" class="btn btn-outline-primary-custom flex-fill">
                                        <i class="fas fa-ticket-alt me-2"></i>Get Ticket
                                    </a>
                                @else
                                    <button class="btn btn-outline-secondary flex-fill" disabled>
                                        <i class="fas fa-times-circle me-2"></i>Sold Out
                                    </button>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            @if($events->hasPages())
                <div class="d-flex justify-content-center mt-5" data-aos="fade-up">
                    {{ $events->appends(request()->query())->links() }}
                </div>
            @endif
        @else
            <!-- No Events Found -->
            <div class="text-center py-5" data-aos="fade-up">
                <div class="mb-4">
                    <i class="fas fa-calendar-times display-1 text-muted opacity-50"></i>
                </div>
                <h3 class="fw-bold mb-3">No Events Found</h3>
                <p class="text-muted mb-4">
                    {{ request()->has('search') ? 'Try adjusting your search criteria or browse all events.' : 'There are no events available at the moment. Check back later!' }}
                </p>
                <div class="d-flex gap-3 justify-content-center">
                    <a href="{{ route('events.index') }}" class="btn btn-outline-primary-custom">
                        <i class="fas fa-search me-2"></i>Browse All Events
                    </a>
                    @auth
                        @if(auth()->user()->role === 'organizer' || auth()->user()->role === 'admin')
                            <a href="{{ route('events.create') }}" class="btn btn-primary-custom">
                                <i class="fas fa-plus me-2"></i>Create Event
                            </a>
                        @endif
                    @endauth
                </div>
            </div>
        @endif
    </div>
</section>

<!-- Call to Action Section -->
<section class="py-5 gradient-primary text-white position-relative overflow-hidden">
    <div class="floating-elements"></div>
    <div class="container-xl position-relative" style="z-index: 2;">
        <div class="row align-items-center">
            <div class="col-lg-8" data-aos="fade-right">
                <h2 class="display-6 fw-bold mb-3 font-poppins">Ready to Host Your Own Event?</h2>
                <p class="lead mb-4 opacity-90">
                    Create amazing experiences for your audience with our comprehensive event management platform.
                    From planning to execution, we've got you covered!
                </p>
                <div class="d-flex flex-wrap gap-3">
                    <a href="{{ route('events.create') }}" class="btn btn-warning btn-lg px-4 py-3">
                        <i class="fas fa-rocket me-2"></i>Start Creating
                    </a>
                    <a href="#" class="btn btn-outline-light btn-lg px-4 py-3">
                        <i class="fas fa-play-circle me-2"></i>Watch Demo
                    </a>
                </div>
            </div>
            <div class="col-lg-4 text-center" data-aos="fade-left" data-aos-delay="200">
                <div class="position-relative">
                    <i class="fas fa-calendar-plus display-1 opacity-20"></i>
                    <div class="position-absolute top-50 start-50 translate-middle">
                        <div class="bg-white rounded-circle p-4 shadow-lg">
                            <i class="fas fa-plus text-primary display-6"></i>
                        </div>
=======

    <!-- Events Grid -->
    <div class="row g-4">
        <!-- Event Card 1 -->
        <div class="col-lg-4 col-md-6">
            <div class="card border-0 shadow-sm card-hover h-100">
                <div class="position-relative">
                    <img src="https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=400&h=250&fit=crop"
                         class="card-img-top" alt="Tech Conference 2024" style="height: 250px; object-fit: cover;">
                    <div class="position-absolute top-0 end-0 m-3">
                        <span class="badge bg-primary">Technology</span>
                    </div>
                    <div class="position-absolute bottom-0 start-0 m-3">
                        <span class="badge bg-dark">$99.00</span>
                    </div>
                </div>
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <h5 class="card-title mb-0">Tech Conference 2024</h5>
                        <small class="text-muted">
                            <i class="fas fa-calendar me-1"></i>Mar 15
                        </small>
                    </div>
                    <p class="text-muted mb-3">Join us for the biggest technology conference of the year featuring industry leaders and innovative sessions.</p>

                    <div class="d-flex align-items-center mb-3">
                        <i class="fas fa-map-marker-alt text-muted me-2"></i>
                        <span class="text-muted">Convention Center, New York</span>
                    </div>

                    <div class="d-flex align-items-center mb-3">
                        <i class="fas fa-clock text-muted me-2"></i>
                        <span class="text-muted">10:00 AM - 6:00 PM</span>
                    </div>

                    <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center">
                            <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center me-2" style="width: 30px; height: 30px; font-size: 12px;">
                                <i class="fas fa-building"></i>
                            </div>
                            <small class="text-muted">TechCorp Inc.</small>
                        </div>
                        <div>
                            <span class="text-success fw-bold">245/300 sold</span>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-white border-0 p-4 pt-0">
                    <div class="d-grid gap-2">
                        <a href="#" class="btn btn-outline-primary">
                            <i class="fas fa-eye me-2"></i>View Details
                        </a>
                        <a href="#" class="btn btn-gradient">
                            <i class="fas fa-ticket-alt me-2"></i>Register Now
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Event Card 2 -->
        <div class="col-lg-4 col-md-6">
            <div class="card border-0 shadow-sm card-hover h-100">
                <div class="position-relative">
                    <img src="https://images.unsplash.com/photo-1515187029135-18ee286d815b?w=400&h=250&fit=crop"
                         class="card-img-top" alt="Business Workshop" style="height: 250px; object-fit: cover;">
                    <div class="position-absolute top-0 end-0 m-3">
                        <span class="badge bg-success">Business</span>
                    </div>
                    <div class="position-absolute bottom-0 start-0 m-3">
                        <span class="badge bg-dark">$75.00</span>
                    </div>
                </div>
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <h5 class="card-title mb-0">Business Leadership Workshop</h5>
                        <small class="text-muted">
                            <i class="fas fa-calendar me-1"></i>Mar 22
                        </small>
                    </div>
                    <p class="text-muted mb-3">Enhance your leadership skills with practical workshops and networking opportunities with industry experts.</p>

                    <div class="d-flex align-items-center mb-3">
                        <i class="fas fa-map-marker-alt text-muted me-2"></i>
                        <span class="text-muted">Business Center, Los Angeles</span>
                    </div>

                    <div class="d-flex align-items-center mb-3">
                        <i class="fas fa-clock text-muted me-2"></i>
                        <span class="text-muted">2:00 PM - 5:00 PM</span>
                    </div>

                    <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center">
                            <div class="bg-warning text-white rounded-circle d-flex align-items-center justify-content-center me-2" style="width: 30px; height: 30px; font-size: 12px;">
                                <i class="fas fa-building"></i>
                            </div>
                            <small class="text-muted">BizLeaders LLC</small>
                        </div>
                        <div>
                            <span class="text-warning fw-bold">89/150 sold</span>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-white border-0 p-4 pt-0">
                    <div class="d-grid gap-2">
                        <a href="#" class="btn btn-outline-primary">
                            <i class="fas fa-eye me-2"></i>View Details
                        </a>
                        <a href="#" class="btn btn-gradient">
                            <i class="fas fa-ticket-alt me-2"></i>Register Now
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Event Card 3 -->
        <div class="col-lg-4 col-md-6">
            <div class="card border-0 shadow-sm card-hover h-100">
                <div class="position-relative">
                    <img src="https://images.unsplash.com/photo-1578662996442-48f60103fc96?w=400&h=250&fit=crop"
                         class="card-img-top" alt="Art Exhibition" style="height: 250px; object-fit: cover;">
                    <div class="position-absolute top-0 end-0 m-3">
                        <span class="badge bg-info">Arts & Culture</span>
                    </div>
                    <div class="position-absolute bottom-0 start-0 m-3">
                        <span class="badge bg-dark">Free</span>
                    </div>
                </div>
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <h5 class="card-title mb-0">Modern Art Exhibition</h5>
                        <small class="text-muted">
                            <i class="fas fa-calendar me-1"></i>Apr 5
                        </small>
                    </div>
                    <p class="text-muted mb-3">Explore contemporary artworks from emerging and established artists in our spacious gallery.</p>

                    <div class="d-flex align-items-center mb-3">
                        <i class="fas fa-map-marker-alt text-muted me-2"></i>
                        <span class="text-muted">City Art Gallery, Chicago</span>
                    </div>

                    <div class="d-flex align-items-center mb-3">
                        <i class="fas fa-clock text-muted me-2"></i>
                        <span class="text-muted">All Day Event</span>
                    </div>

                    <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center">
                            <div class="bg-info text-white rounded-circle d-flex align-items-center justify-content-center me-2" style="width: 30px; height: 30px; font-size: 12px;">
                                <i class="fas fa-building"></i>
                            </div>
                            <small class="text-muted">City Gallery</small>
                        </div>
                        <div>
                            <span class="text-info fw-bold">156/200 sold</span>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-white border-0 p-4 pt-0">
                    <div class="d-grid gap-2">
                        <a href="#" class="btn btn-outline-primary">
                            <i class="fas fa-eye me-2"></i>View Details
                        </a>
                        <a href="#" class="btn btn-gradient">
                            <i class="fas fa-ticket-alt me-2"></i>Register Now
                        </a>
>>>>>>> 8a996aa7d56b8b38ce7291c226b99d292509af77
                    </div>
                </div>
            </div>
        </div>
    </div>
<<<<<<< HEAD
</section>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Enhanced search functionality
        const searchForm = document.querySelector('form');
        const searchInput = document.querySelector('input[name="search"]');

        // Real-time search suggestions (mock data)
        if (searchInput) {
            let searchTimeout;
            searchInput.addEventListener('input', function() {
                clearTimeout(searchTimeout);
                searchTimeout = setTimeout(() => {
                    // Here you could implement live search suggestions
                    console.log('Searching for:', this.value);
                }, 300);
            });
        }

        // Smooth form submission
        if (searchForm) {
            searchForm.addEventListener('submit', function(e) {
                const submitBtn = this.querySelector('button[type="submit"]');
                if (submitBtn) {
                    setLoadingState(submitBtn, true);
                }
            });
        }

        // Event card interactions
        const eventCards = document.querySelectorAll('.event-card');
        eventCards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-10px) rotateX(5deg)';
            });

            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0) rotateX(0)';
            });
        });

        // Filter chips interaction
        const filterChips = document.querySelectorAll('.filter-chip');
        filterChips.forEach(chip => {
            chip.addEventListener('click', function(e) {
                if (!chip.classList.contains('active')) {
                    filterChips.forEach(c => c.classList.remove('active'));
                    chip.classList.add('active');
                }
            });
        });

        // Lazy loading for images
        const images = document.querySelectorAll('img[data-src]');
        const imageObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    img.src = img.dataset.src;
                    img.classList.remove('lazy');
                    observer.unobserve(img);
                }
            });
        });

        images.forEach(img => imageObserver.observe(img));

        // Enhanced pagination
        const paginationLinks = document.querySelectorAll('.pagination a');
        paginationLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                const spinner = document.createElement('div');
                spinner.className = 'loading-spinner me-2';
                this.prepend(spinner);
            });
        });

        // Auto-refresh events (every 5 minutes)
        setInterval(() => {
            if (!document.hidden) {
                // Check for new events
                fetch(window.location.href, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                }).then(response => {
                    if (response.ok) {
                        console.log('Events data refreshed');
                    }
                }).catch(error => {
                    console.log('Auto-refresh failed:', error);
                });
            }
        }, 300000); // 5 minutes

        // Enhanced form validation
        const forms = document.querySelectorAll('form');
        forms.forEach(form => {
            form.addEventListener('submit', function(e) {
                if (!form.checkValidity()) {
                    e.preventDefault();
                    e.stopPropagation();

                    // Show validation messages
                    const invalidInputs = form.querySelectorAll(':invalid');
                    if (invalidInputs.length > 0) {
                        invalidInputs[0].focus();
                        showToast('Please fill in all required fields', 'warning');
                    }
                }
                form.classList.add('was-validated');
            });
        });

        // Keyboard shortcuts
        document.addEventListener('keydown', function(e) {
            // Ctrl/Cmd + K for search
            if ((e.ctrlKey || e.metaKey) && e.key === 'k') {
                e.preventDefault();
                if (searchInput) {
                    searchInput.focus();
                }
            }

            // Escape to clear search
            if (e.key === 'Escape' && searchInput === document.activeElement) {
                searchInput.value = '';
                searchInput.blur();
            }
        });

        // Share functionality
        if (navigator.share) {
            const shareButtons = document.querySelectorAll('.share-btn');
            shareButtons.forEach(btn => {
                btn.addEventListener('click', async function() {
                    try {
                        await navigator.share({
                            title: 'Check out this event!',
                            url: window.location.href
                        });
                    } catch (err) {
                        console.log('Error sharing:', err);
                    }
                });
            });
        }
    });

    // Performance monitoring
    window.addEventListener('load', function() {
        if ('performance' in window) {
            const loadTime = performance.timing.loadEventEnd - performance.timing.navigationStart;
            console.log('Page load time:', loadTime + 'ms');

            if (loadTime > 3000) {
                console.warn('Page load time is slow. Consider optimizing.');
            }
        }
    });
</script>
@endpush
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

            <!-- More Event Cards -->
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm card-hover h-100">
                    <div class="position-relative">
                        <img src="https://images.unsplash.com/photo-1501281668745-f7f57925c3b4?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" class="card-img-top" alt="Art Exhibition" style="height: 200px; object-fit: cover;">
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <h5 class="card-title fw-bold">Modern Art Exhibition</h5>
                            <span class="text-primary fw-bold">$25</span>
                        </div>
                        <p class="card-text text-muted small mb-3">Experience contemporary art from emerging artists around the world.</p>
                        <div class="d-flex align-items-center mb-3">
                            <i class="fas fa-calendar text-muted me-2"></i>
                            <small class="text-muted">November 5-15, 2025</small>
                        </div>
                        <div class="d-flex align-items-center mb-3">
                            <i class="fas fa-map-marker-alt text-muted me-2"></i>
                            <small class="text-muted">Chicago, IL</small>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <small class="text-success"><i class="fas fa-users me-1"></i>120 attending</small>
                            <a href="#" class="btn btn-primary-custom btn-sm rounded-pill">Register Now</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm card-hover h-100">
                    <div class="position-relative">
                        <img src="https://images.unsplash.com/photo-1511578314322-379afb476865?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" class="card-img-top" alt="Sports Event" style="height: 200px; object-fit: cover;">
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <h5 class="card-title fw-bold">Marathon Championship</h5>
                            <span class="text-primary fw-bold">$50</span>
                        </div>
                        <p class="card-text text-muted small mb-3">Join thousands of runners in this annual marathon through the city's most scenic routes.</p>
                        <div class="d-flex align-items-center mb-3">
                            <i class="fas fa-calendar text-muted me-2"></i>
                            <small class="text-muted">December 10, 2025</small>
                        </div>
                        <div class="d-flex align-items-center mb-3">
                            <i class="fas fa-map-marker-alt text-muted me-2"></i>
                            <small class="text-muted">Boston, MA</small>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <small class="text-success"><i class="fas fa-users me-1"></i>1500 attending</small>
                            <a href="#" class="btn btn-primary-custom btn-sm rounded-pill">Register Now</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm card-hover h-100">
                    <div class="position-relative">
                        <img src="https://images.unsplash.com/photo-1505373877841-8d25f7d46678?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" class="card-img-top" alt="Food Festival" style="height: 200px; object-fit: cover;">
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <h5 class="card-title fw-bold">International Food Festival</h5>
                            <span class="text-primary fw-bold">$35</span>
                        </div>
                        <p class="card-text text-muted small mb-3">Taste cuisines from around the world with over 50 food vendors and cooking demonstrations.</p>
                        <div class="d-flex align-items-center mb-3">
                            <i class="fas fa-calendar text-muted me-2"></i>
                            <small class="text-muted">September 5-7, 2025</small>
                        </div>
                        <div class="d-flex align-items-center mb-3">
                            <i class="fas fa-map-marker-alt text-muted me-2"></i>
                            <small class="text-muted">Los Angeles, CA</small>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <small class="text-success"><i class="fas fa-users me-1"></i>750 attending</small>
                            <a href="#" class="btn btn-primary-custom btn-sm rounded-pill">Register Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-5">
            <nav aria-label="Page navigation">
                <ul class="pagination">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
=======

    <!-- Pagination -->
    <div class="row mt-5">
        <div class="col-12">
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
>>>>>>> 8a996aa7d56b8b38ce7291c226b99d292509af77
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
<<<<<<< HEAD
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
=======
                        <a class="page-link" href="#">Next</a>
>>>>>>> 8a996aa7d56b8b38ce7291c226b99d292509af77
                    </li>
                </ul>
            </nav>
        </div>
    </div>
<<<<<<< HEAD
</section>
@endsection

@push('styles')
<style>
    .card-hover {
        transition: all 0.3s ease;
    }

    .card-hover:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
    }
</style>
@endpush
=======
</div>
@endsection
>>>>>>> 8a996aa7d56b8b38ce7291c226b99d292509af77
