@extends('layouts.app')

<<<<<<< HEAD
@section('title', 'Dashboard - EventPro')

@section('content')
<section class="py-5">
    <div class="container py-4">
        <div class="row mb-5">
            <div class="col-md-12">
                <h2 class="fw-bold mb-4">Dashboard</h2>

                <!-- Include the enhanced dashboard analytics component -->
                <x-dashboard-analytics
                    :stats="[
                        'upcoming_events' => $upcomingEventsCount ?? 5,
                        'active_tickets' => $activeTicketsCount ?? 8,
                        'past_events' => $pastEventsCount ?? 12,
                        'reward_points' => $rewardPoints ?? 250
                    ]"
                    :monthlyEvents="$monthlyEvents ?? null"
                    :categoryBreakdown="$categoryBreakdown ?? null"
                    :nextEvent="$nextEvent ?? null"
                />

                <!-- Previous Stats Overview - Keeping for reference -->
                <!-- <div class="row g-4 mb-5" style="display: none;">
                    <!-- Upcoming Events -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <div class="rounded-circle bg-primary bg-opacity-10 p-3">
                                        <i class="fas fa-calendar-day text-primary fs-4"></i>
                                    </div>
                                    <h3 class="fw-bold mb-0 text-primary">5</h3>
                                </div>
                                <h5 class="card-title fw-semibold">Upcoming Events</h5>
                                <p class="text-muted small mb-0">Events you're registered for</p>
                            </div>
                            <div class="card-footer bg-transparent border-0 pt-0">
                                <a href="{{ url('/tickets') }}" class="btn btn-link text-primary p-0">
                                    View all <i class="fas fa-arrow-right ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Active Tickets -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <div class="rounded-circle bg-success bg-opacity-10 p-3">
                                        <i class="fas fa-ticket-alt text-success fs-4"></i>
                                    </div>
                                    <h3 class="fw-bold mb-0 text-success">12</h3>
                                </div>
                                <h5 class="card-title fw-semibold">Active Tickets</h5>
                                <p class="text-muted small mb-0">Tickets for upcoming events</p>
                            </div>
                            <div class="card-footer bg-transparent border-0 pt-0">
                                <a href="{{ url('/tickets') }}" class="btn btn-link text-success p-0">
                                    View all <i class="fas fa-arrow-right ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- My Events -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <div class="rounded-circle bg-warning bg-opacity-10 p-3">
                                        <i class="fas fa-calendar-check text-warning fs-4"></i>
                                    </div>
                                    <h3 class="fw-bold mb-0 text-warning">3</h3>
                                </div>
                                <h5 class="card-title fw-semibold">My Events</h5>
                                <p class="text-muted small mb-0">Events you're organizing</p>
                            </div>
                            <div class="card-footer bg-transparent border-0 pt-0">
                                <a href="{{ url('/events') }}" class="btn btn-link text-warning p-0">
                                    View all <i class="fas fa-arrow-right ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Notifications -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <div class="rounded-circle bg-danger bg-opacity-10 p-3">
                                        <i class="fas fa-bell text-danger fs-4"></i>
                                    </div>
                                    <h3 class="fw-bold mb-0 text-danger">7</h3>
                                </div>
                                <h5 class="card-title fw-semibold">Notifications</h5>
                                <p class="text-muted small mb-0">New messages and alerts</p>
                            </div>
                            <div class="card-footer bg-transparent border-0 pt-0">
                                <a href="{{ url('/notifications') }}" class="btn btn-link text-danger p-0">
                                    View all <i class="fas fa-arrow-right ms-1"></i>
                                </a>
                            </div>
=======
@section('title', 'Dashboard - EventSmart')

@section('content')
<div class="container-fluid px-4 py-5">
    <!-- Header -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="h3 fw-bold mb-1">Dashboard</h1>
                    <p class="text-muted mb-0">Welcome back, {{ Auth::user()->name }}!</p>
                </div>
                <div>
                    <a href="{{ route('events.create') }}" class="btn btn-gradient">
                        <i class="fas fa-plus me-2"></i>Create Event
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="row g-4 mb-5">
        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm card-hover">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted text-uppercase mb-1">My Events</h6>
                            <h3 class="fw-bold mb-0">12</h3>
                            <small class="text-success">
                                <i class="fas fa-arrow-up me-1"></i>+2 this month
                            </small>
                        </div>
                        <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                            <i class="fas fa-calendar fa-lg"></i>
>>>>>>> 8a996aa7d56b8b38ce7291c226b99d292509af77
                        </div>
                    </div>
                </div>
            </div>
        </div>

<<<<<<< HEAD
        <!-- Quick Actions & Upcoming Events -->
        <div class="row">
            <!-- Quick Actions -->
            <div class="col-lg-4 mb-4">
                <h5 class="fw-bold mb-4">Quick Actions</h5>

                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body p-0">
                        <a href="{{ route('events.create') }}" class="d-flex align-items-center p-3 text-decoration-none text-dark border-bottom">
                            <div class="me-3">
                                <div class="bg-primary text-white rounded-circle p-2" style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center;">
                                    <i class="fas fa-plus"></i>
                                </div>
                            </div>
                            <div>
                                <h6 class="mb-0 fw-semibold">Create Event</h6>
                                <p class="text-muted small mb-0">Set up a new event</p>
                            </div>
                        </a>

                        <a href="{{ url('/tickets/purchase') }}" class="d-flex align-items-center p-3 text-decoration-none text-dark border-bottom">
                            <div class="me-3">
                                <div class="bg-success text-white rounded-circle p-2" style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center;">
                                    <i class="fas fa-ticket-alt"></i>
                                </div>
                            </div>
                            <div>
                                <h6 class="mb-0 fw-semibold">Buy Tickets</h6>
                                <p class="text-muted small mb-0">Purchase tickets for events</p>
                            </div>
                        </a>

                        <a href="{{ url('/companies/register') }}" class="d-flex align-items-center p-3 text-decoration-none text-dark border-bottom">
                            <div class="me-3">
                                <div class="bg-info text-white rounded-circle p-2" style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center;">
                                    <i class="fas fa-building"></i>
                                </div>
                            </div>
                            <div>
                                <h6 class="mb-0 fw-semibold">Register Company</h6>
                                <p class="text-muted small mb-0">Add your organization</p>
                            </div>
                        </a>

                        <a href="{{ url('/profile') }}" class="d-flex align-items-center p-3 text-decoration-none text-dark">
                            <div class="me-3">
                                <div class="bg-warning text-white rounded-circle p-2" style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center;">
                                    <i class="fas fa-user-edit"></i>
                                </div>
                            </div>
                            <div>
                                <h6 class="mb-0 fw-semibold">Update Profile</h6>
                                <p class="text-muted small mb-0">Edit your account details</p>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Recent Activities -->
                <h5 class="fw-bold mb-4">Recent Activities</h5>
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-0">
                        <div class="d-flex align-items-center p-3 border-bottom">
                            <div class="rounded-circle bg-light p-2 me-3">
                                <i class="fas fa-ticket-alt text-primary"></i>
                            </div>
                            <div>
                                <h6 class="mb-1 fw-semibold">Purchased ticket</h6>
                                <p class="text-muted small mb-0">Tech Conference 2025</p>
                                <small class="text-muted">Today, 10:30 AM</small>
                            </div>
                        </div>

                        <div class="d-flex align-items-center p-3 border-bottom">
                            <div class="rounded-circle bg-light p-2 me-3">
                                <i class="fas fa-sign-in-alt text-success"></i>
                            </div>
                            <div>
                                <h6 class="mb-1 fw-semibold">Account login</h6>
                                <p class="text-muted small mb-0">From Chrome on Windows</p>
                                <small class="text-muted">Today, 9:15 AM</small>
                            </div>
                        </div>

                        <div class="d-flex align-items-center p-3">
                            <div class="rounded-circle bg-light p-2 me-3">
                                <i class="fas fa-calendar-plus text-warning"></i>
                            </div>
                            <div>
                                <h6 class="mb-1 fw-semibold">Event registration</h6>
                                <p class="text-muted small mb-0">Summer Music Festival</p>
                                <small class="text-muted">Yesterday, 3:45 PM</small>
                            </div>
                        </div>
=======
        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm card-hover">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted text-uppercase mb-1">Total Tickets</h6>
                            <h3 class="fw-bold mb-0">1,247</h3>
                            <small class="text-success">
                                <i class="fas fa-arrow-up me-1"></i>+156 this week
                            </small>
                        </div>
                        <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                            <i class="fas fa-ticket-alt fa-lg"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm card-hover">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted text-uppercase mb-1">Revenue</h6>
                            <h3 class="fw-bold mb-0">$24,890</h3>
                            <small class="text-success">
                                <i class="fas fa-arrow-up me-1"></i>+12% this month
                            </small>
                        </div>
                        <div class="bg-warning text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                            <i class="fas fa-dollar-sign fa-lg"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm card-hover">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted text-uppercase mb-1">Attendees</h6>
                            <h3 class="fw-bold mb-0">892</h3>
                            <small class="text-info">
                                <i class="fas fa-users me-1"></i>Active registrations
                            </small>
                        </div>
                        <div class="bg-info text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                            <i class="fas fa-users fa-lg"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <!-- Recent Events -->
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-0 py-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Recent Events</h5>
                        <a href="{{ route('events.index') }}" class="btn btn-outline-primary btn-sm">View All</a>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="border-0 ps-4">Event</th>
                                    <th class="border-0">Date</th>
                                    <th class="border-0">Tickets Sold</th>
                                    <th class="border-0">Revenue</th>
                                    <th class="border-0">Status</th>
                                    <th class="border-0 pe-4">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="ps-4">
                                        <div class="d-flex align-items-center">
                                            <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">
                                                <i class="fas fa-music"></i>
                                            </div>
                                            <div>
                                                <h6 class="mb-0">Tech Conference 2024</h6>
                                                <small class="text-muted">Technology & Innovation</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Mar 15, 2024</td>
                                    <td>245 / 300</td>
                                    <td>$12,250</td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td class="pe-4">
                                        <div class="dropdown">
                                            <button class="btn btn-outline-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                                Actions
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="#">View</a></li>
                                                <li><a class="dropdown-item" href="#">Edit</a></li>
                                                <li><a class="dropdown-item" href="#">Reports</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="ps-4">
                                        <div class="d-flex align-items-center">
                                            <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">
                                                <i class="fas fa-briefcase"></i>
                                            </div>
                                            <div>
                                                <h6 class="mb-0">Business Workshop</h6>
                                                <small class="text-muted">Professional Development</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Mar 22, 2024</td>
                                    <td>89 / 150</td>
                                    <td>$4,450</td>
                                    <td><span class="badge bg-warning">Selling</span></td>
                                    <td class="pe-4">
                                        <div class="dropdown">
                                            <button class="btn btn-outline-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                                Actions
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="#">View</a></li>
                                                <li><a class="dropdown-item" href="#">Edit</a></li>
                                                <li><a class="dropdown-item" href="#">Reports</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="ps-4">
                                        <div class="d-flex align-items-center">
                                            <div class="bg-info text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">
                                                <i class="fas fa-paint-brush"></i>
                                            </div>
                                            <div>
                                                <h6 class="mb-0">Art Exhibition</h6>
                                                <small class="text-muted">Arts & Culture</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Apr 5, 2024</td>
                                    <td>156 / 200</td>
                                    <td>$7,800</td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td class="pe-4">
                                        <div class="dropdown">
                                            <button class="btn btn-outline-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                                Actions
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="#">View</a></li>
                                                <li><a class="dropdown-item" href="#">Edit</a></li>
                                                <li><a class="dropdown-item" href="#">Reports</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-0 py-3">
                    <h5 class="card-title mb-0">Quick Actions</h5>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-3">
                        <a href="{{ route('events.create') }}" class="btn btn-outline-primary d-flex align-items-center">
                            <i class="fas fa-plus me-3"></i>
                            <div class="text-start">
                                <div class="fw-bold">Create Event</div>
                                <small class="text-muted">Start organizing a new event</small>
                            </div>
                        </a>

                        <a href="{{ route('tickets.index') }}" class="btn btn-outline-success d-flex align-items-center">
                            <i class="fas fa-ticket-alt me-3"></i>
                            <div class="text-start">
                                <div class="fw-bold">My Tickets</div>
                                <small class="text-muted">View purchased tickets</small>
                            </div>
                        </a>

                        <a href="{{ route('profile.edit') }}" class="btn btn-outline-info d-flex align-items-center">
                            <i class="fas fa-user-edit me-3"></i>
                            <div class="text-start">
                                <div class="fw-bold">Edit Profile</div>
                                <small class="text-muted">Update your information</small>
                            </div>
                        </a>

                        <a href="#" class="btn btn-outline-warning d-flex align-items-center">
                            <i class="fas fa-chart-line me-3"></i>
                            <div class="text-start">
                                <div class="fw-bold">Analytics</div>
                                <small class="text-muted">View detailed reports</small>
                            </div>
                        </a>
>>>>>>> 8a996aa7d56b8b38ce7291c226b99d292509af77
                    </div>
                </div>
            </div>

            <!-- Upcoming Events -->
<<<<<<< HEAD
            <div class="col-lg-8">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h5 class="fw-bold mb-0">Your Upcoming Events</h5>
                    <a href="{{ url('/events') }}" class="btn btn-sm btn-outline-primary rounded-pill">
                        View All Events
                    </a>
                </div>

                <div class="row g-4">
                    <!-- Event Card 1 -->
                    <div class="col-md-6">
                        <div class="card border-0 shadow-sm card-hover h-100">
                            <div class="position-relative">
                                <img src="https://images.unsplash.com/photo-1540575467063-178a50c2df87?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" class="card-img-top" alt="Tech Conference" style="height: 160px; object-fit: cover;">
                                <div class="position-absolute top-0 end-0 m-2">
                                    <span class="badge bg-primary rounded-pill">
                                        <i class="fas fa-calendar me-1"></i>Aug 15
                                    </span>
                                </div>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title fw-bold mb-1">Tech Conference 2025</h5>
                                <div class="d-flex align-items-center mb-3">
                                    <i class="fas fa-map-marker-alt text-muted me-2"></i>
                                    <small class="text-muted">San Francisco, CA</small>
                                </div>
                                <div class="progress mb-3" style="height: 6px;">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 80%;" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div class="d-flex justify-content-between align-items-center small text-muted mb-3">
                                    <span>200/250 attendees</span>
                                    <span>80% filled</span>
                                </div>
                                <div class="d-grid gap-2">
                                    <a href="#" class="btn btn-primary-custom btn-sm rounded-pill">
                                        <i class="fas fa-qrcode me-1"></i>View Ticket
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Event Card 2 -->
                    <div class="col-md-6">
                        <div class="card border-0 shadow-sm card-hover h-100">
                            <div class="position-relative">
                                <img src="https://images.unsplash.com/photo-1492684223066-81342ee5ff30?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" class="card-img-top" alt="Music Festival" style="height: 160px; object-fit: cover;">
                                <div class="position-absolute top-0 end-0 m-2">
                                    <span class="badge bg-primary rounded-pill">
                                        <i class="fas fa-calendar me-1"></i>Sep 20
                                    </span>
                                </div>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title fw-bold mb-1">Summer Music Festival</h5>
                                <div class="d-flex align-items-center mb-3">
                                    <i class="fas fa-map-marker-alt text-muted me-2"></i>
                                    <small class="text-muted">Austin, TX</small>
                                </div>
                                <div class="progress mb-3" style="height: 6px;">
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 65%;" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div class="d-flex justify-content-between align-items-center small text-muted mb-3">
                                    <span>3250/5000 attendees</span>
                                    <span>65% filled</span>
                                </div>
                                <div class="d-grid gap-2">
                                    <a href="#" class="btn btn-primary-custom btn-sm rounded-pill">
                                        <i class="fas fa-qrcode me-1"></i>View Ticket
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Event Card 3 -->
                    <div class="col-md-6">
                        <div class="card border-0 shadow-sm card-hover h-100">
                            <div class="position-relative">
                                <img src="https://images.unsplash.com/photo-1515187029135-18ee286d815b?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" class="card-img-top" alt="Business Workshop" style="height: 160px; object-fit: cover;">
                                <div class="position-absolute top-0 end-0 m-2">
                                    <span class="badge bg-primary rounded-pill">
                                        <i class="fas fa-calendar me-1"></i>Oct 8
                                    </span>
                                </div>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title fw-bold mb-1">Business Leadership Workshop</h5>
                                <div class="d-flex align-items-center mb-3">
                                    <i class="fas fa-map-marker-alt text-muted me-2"></i>
                                    <small class="text-muted">New York, NY</small>
                                </div>
                                <div class="progress mb-3" style="height: 6px;">
                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 90%;" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div class="d-flex justify-content-between align-items-center small text-muted mb-3">
                                    <span>45/50 attendees</span>
                                    <span>90% filled</span>
                                </div>
                                <div class="d-grid gap-2">
                                    <a href="#" class="btn btn-primary-custom btn-sm rounded-pill">
                                        <i class="fas fa-qrcode me-1"></i>View Ticket
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Create Event Card -->
                    <div class="col-md-6">
                        <div class="card border-dashed h-100 bg-light">
                            <div class="card-body d-flex flex-column align-items-center justify-content-center" style="min-height: 300px;">
                                <div class="bg-white rounded-circle p-3 mb-3 shadow-sm">
                                    <i class="fas fa-plus text-primary fa-2x"></i>
                                </div>
                                <h5 class="fw-bold mb-2">Create New Event</h5>
                                <p class="text-muted text-center mb-4">Set up your next amazing event and start selling tickets</p>
                                <a href="{{ route('events.create') }}" class="btn btn-primary-custom rounded-pill">
                                    <i class="fas fa-calendar-plus me-2"></i>Create Event
                                </a>
=======
            <div class="card border-0 shadow-sm mt-4">
                <div class="card-header bg-white border-0 py-3">
                    <h5 class="card-title mb-0">Upcoming Events</h5>
                </div>
                <div class="card-body">
                    <div class="list-group list-group-flush">
                        <div class="list-group-item border-0 px-0 py-3">
                            <div class="d-flex align-items-center">
                                <div class="bg-primary text-white rounded text-center me-3" style="width: 50px; height: 50px; display: flex; flex-direction: column; justify-content: center; font-size: 12px;">
                                    <div class="fw-bold">15</div>
                                    <div>MAR</div>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-1">Tech Conference 2024</h6>
                                    <small class="text-muted">10:00 AM - 6:00 PM</small>
                                </div>
                            </div>
                        </div>

                        <div class="list-group-item border-0 px-0 py-3">
                            <div class="d-flex align-items-center">
                                <div class="bg-success text-white rounded text-center me-3" style="width: 50px; height: 50px; display: flex; flex-direction: column; justify-content: center; font-size: 12px;">
                                    <div class="fw-bold">22</div>
                                    <div>MAR</div>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-1">Business Workshop</h6>
                                    <small class="text-muted">2:00 PM - 5:00 PM</small>
                                </div>
                            </div>
                        </div>

                        <div class="list-group-item border-0 px-0 py-3">
                            <div class="d-flex align-items-center">
                                <div class="bg-info text-white rounded text-center me-3" style="width: 50px; height: 50px; display: flex; flex-direction: column; justify-content: center; font-size: 12px;">
                                    <div class="fw-bold">05</div>
                                    <div>APR</div>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-1">Art Exhibition</h6>
                                    <small class="text-muted">All Day Event</small>
                                </div>
>>>>>>> 8a996aa7d56b8b38ce7291c226b99d292509af77
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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

    .border-dashed {
        border: 2px dashed #dee2e6;
        transition: all 0.3s ease;
    }

    .border-dashed:hover {
        border-color: var(--primary-color);
        background-color: rgba(99, 102, 241, 0.05) !important;
    }
</style>
@endpush
=======
</div>
@endsection
>>>>>>> 8a996aa7d56b8b38ce7291c226b99d292509af77
