@extends('layouts.app')

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
                    </div>
                </div>
            </div>

            <!-- Upcoming Events -->
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
