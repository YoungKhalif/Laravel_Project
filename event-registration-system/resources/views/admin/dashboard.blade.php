@extends('layouts.app')

<<<<<<< HEAD
@section('title', 'Admin Dashboard - EventPro')

@section('content')
<x-admin-layout :pageTitle="'Admin Dashboard'" :breadcrumbs="[]">
    <div class="row g-4 mb-4">
        <!-- Statistics Cards -->
        <div class="col-md-6 col-lg-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div class="stat-icon bg-primary-light text-primary rounded-3 p-3">
                            <i class="fas fa-users fs-4"></i>
                        </div>
                        <div class="stat-value">
                            <h3 class="fw-bold mb-0">1,254</h3>
                            <span class="text-success small fw-semibold">
                                <i class="fas fa-arrow-up me-1"></i>12%
                            </span>
                        </div>
                    </div>
                    <h5 class="fw-semibold mb-0">Total Users</h5>
                    <p class="text-muted small mb-0">Compared to previous month</p>
=======
@section('title', 'Admin Dashboard - EventSmart')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-lg-2 mb-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-3">
                    <h6 class="card-title mb-3">
                        <i class="fas fa-tachometer-alt text-primary me-2"></i>Admin Panel
                    </h6>
                    <nav class="nav flex-column">
                        <a class="nav-link active px-0 py-2" href="#dashboard" onclick="showSection('dashboard')">
                            <i class="fas fa-chart-bar me-2"></i>Dashboard
                        </a>
                        <a class="nav-link px-0 py-2" href="#events" onclick="showSection('events')">
                            <i class="fas fa-calendar me-2"></i>Events
                        </a>
                        <a class="nav-link px-0 py-2" href="#bookings" onclick="showSection('bookings')">
                            <i class="fas fa-ticket-alt me-2"></i>Bookings
                        </a>
                        <a class="nav-link px-0 py-2" href="#users" onclick="showSection('users')">
                            <i class="fas fa-users me-2"></i>Users
                        </a>
                        <a class="nav-link px-0 py-2" href="#companies" onclick="showSection('companies')">
                            <i class="fas fa-building me-2"></i>Companies
                        </a>
                        <a class="nav-link px-0 py-2" href="#reports" onclick="showSection('reports')">
                            <i class="fas fa-chart-line me-2"></i>Reports
                        </a>
                        <a class="nav-link px-0 py-2" href="#settings" onclick="showSection('settings')">
                            <i class="fas fa-cog me-2"></i>Settings
                        </a>
                    </nav>
>>>>>>> 8a996aa7d56b8b38ce7291c226b99d292509af77
                </div>
            </div>
        </div>

<<<<<<< HEAD
        <div class="col-md-6 col-lg-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div class="stat-icon bg-success-light text-success rounded-3 p-3">
                            <i class="fas fa-calendar-check fs-4"></i>
                        </div>
                        <div class="stat-value">
                            <h3 class="fw-bold mb-0">45</h3>
                            <span class="text-success small fw-semibold">
                                <i class="fas fa-arrow-up me-1"></i>8%
                            </span>
                        </div>
                    </div>
                    <h5 class="fw-semibold mb-0">Active Events</h5>
                    <p class="text-muted small mb-0">Currently published events</p>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div class="stat-icon bg-info-light text-info rounded-3 p-3">
                            <i class="fas fa-ticket-alt fs-4"></i>
                        </div>
                        <div class="stat-value">
                            <h3 class="fw-bold mb-0">823</h3>
                            <span class="text-success small fw-semibold">
                                <i class="fas fa-arrow-up me-1"></i>24%
                            </span>
                        </div>
                    </div>
                    <h5 class="fw-semibold mb-0">Tickets Sold</h5>
                    <p class="text-muted small mb-0">In the last 30 days</p>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div class="stat-icon bg-warning-light text-warning rounded-3 p-3">
                            <i class="fas fa-dollar-sign fs-4"></i>
                        </div>
                        <div class="stat-value">
                            <h3 class="fw-bold mb-0">$18,452</h3>
                            <span class="text-success small fw-semibold">
                                <i class="fas fa-arrow-up me-1"></i>18%
                            </span>
                        </div>
                    </div>
                    <h5 class="fw-semibold mb-0">Revenue</h5>
                    <p class="text-muted small mb-0">In the last 30 days</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4 mb-4">
        <!-- Sales Overview Chart -->
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white p-4 border-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="fw-bold mb-0">Sales Overview</h5>
                            <p class="text-muted small mb-0">Monthly revenue and tickets sold</p>
                        </div>
                        <div class="chart-period">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-outline-primary active">Month</button>
                                <button type="button" class="btn btn-sm btn-outline-primary">Quarter</button>
                                <button type="button" class="btn btn-sm btn-outline-primary">Year</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body p-4">
                    <div class="chart-container" style="height: 300px;">
                        <canvas id="salesChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Top Events Pie Chart -->
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-white p-4 border-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="fw-bold mb-0">Popular Event Types</h5>
                        <a href="{{ route('admin.events.index') }}" class="text-decoration-none">View All</a>
                    </div>
                </div>
                <div class="card-body p-4 d-flex flex-column justify-content-center">
                    <div class="chart-container" style="height: 200px;">
                        <canvas id="eventTypesChart"></canvas>
                    </div>
                    <div class="chart-legend mt-4 d-flex flex-wrap gap-3 justify-content-center">
                        <div class="d-flex align-items-center">
                            <div class="legend-color" style="background-color: #3b82f6;"></div>
                            <div class="ms-2">Music (30%)</div>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="legend-color" style="background-color: #10b981;"></div>
                            <div class="ms-2">Business (25%)</div>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="legend-color" style="background-color: #f59e0b;"></div>
                            <div class="ms-2">Tech (20%)</div>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="legend-color" style="background-color: #ef4444;"></div>
                            <div class="ms-2">Arts (15%)</div>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="legend-color" style="background-color: #8b5cf6;"></div>
                            <div class="ms-2">Sports (10%)</div>
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
                <div class="card-header bg-white p-4 border-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="fw-bold mb-0">Recent Events</h5>
                        <a href="{{ route('admin.events.index') }}" class="btn btn-sm btn-primary">View All Events</a>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Event</th>
                                    <th>Organizer</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Sales</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="event-img me-3" style="background-image: url('https://images.unsplash.com/photo-1501281668745-f7f57925c3b4?ixlib=rb-4.0.3&auto=format&fit=crop&w=1740&q=80');"></div>
                                            <div>
                                                <div class="fw-semibold">Tech Conference 2025</div>
                                                <div class="text-muted small">San Francisco, CA</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>TechCorp Inc.</td>
                                    <td>Aug 15, 2025</td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td>$12,540 (125)</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('admin.events.edit', 1) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                                            <button type="button" class="btn btn-sm btn-outline-danger">Delete</button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="event-img me-3" style="background-image: url('https://images.unsplash.com/photo-1470229722913-7c0e2dbbafd3?ixlib=rb-4.0.3&auto=format&fit=crop&w=1740&q=80');"></div>
                                            <div>
                                                <div class="fw-semibold">Music Festival 2025</div>
                                                <div class="text-muted small">Los Angeles, CA</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Music Events LLC</td>
                                    <td>Sep 05, 2025</td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td>$24,750 (247)</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('admin.events.edit', 2) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                                            <button type="button" class="btn btn-sm btn-outline-danger">Delete</button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="event-img me-3" style="background-image: url('https://images.unsplash.com/photo-1515169067868-5387ec356754?ixlib=rb-4.0.3&auto=format&fit=crop&w=1740&q=80');"></div>
                                            <div>
                                                <div class="fw-semibold">Business Summit 2025</div>
                                                <div class="text-muted small">New York, NY</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Business Network</td>
                                    <td>Oct 12, 2025</td>
                                    <td><span class="badge bg-warning">Draft</span></td>
                                    <td>$0 (0)</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('admin.events.edit', 3) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                                            <button type="button" class="btn btn-sm btn-outline-danger">Delete</button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="event-img me-3" style="background-image: url('https://images.unsplash.com/photo-1540575467063-178a50c2df87?ixlib=rb-4.0.3&auto=format&fit=crop&w=2000&q=80');"></div>
                                            <div>
                                                <div class="fw-semibold">Art Exhibition</div>
                                                <div class="text-muted small">Chicago, IL</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Arts Foundation</td>
                                    <td>Nov 22, 2025</td>
                                    <td><span class="badge bg-info">Upcoming</span></td>
                                    <td>$3,250 (32)</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('admin.events.edit', 4) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                                            <button type="button" class="btn btn-sm btn-outline-danger">Delete</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Users & Activity -->
        <div class="col-lg-4">
            <!-- Recent Users -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white p-4 border-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="fw-bold mb-0">Recent Users</h5>
                        <a href="{{ route('admin.users.index') }}" class="text-decoration-none">View All</a>
                    </div>
                </div>
                <div class="card-body p-0">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item p-3">
                            <div class="d-flex align-items-center">
                                <div class="user-avatar me-3 bg-primary">JD</div>
                                <div class="flex-grow-1">
                                    <div class="fw-semibold">John Doe</div>
                                    <div class="text-muted small">Registered 2 hours ago</div>
                                </div>
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-light" type="button" data-bs-toggle="dropdown">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li><a class="dropdown-item" href="#">View Profile</a></li>
                                        <li><a class="dropdown-item" href="#">Edit User</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li><a class="dropdown-item text-danger" href="#">Delete User</a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item p-3">
                            <div class="d-flex align-items-center">
                                <div class="user-avatar me-3 bg-success">JS</div>
                                <div class="flex-grow-1">
                                    <div class="fw-semibold">Jane Smith</div>
                                    <div class="text-muted small">Registered 5 hours ago</div>
                                </div>
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-light" type="button" data-bs-toggle="dropdown">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li><a class="dropdown-item" href="#">View Profile</a></li>
                                        <li><a class="dropdown-item" href="#">Edit User</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li><a class="dropdown-item text-danger" href="#">Delete User</a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item p-3">
                            <div class="d-flex align-items-center">
                                <div class="user-avatar me-3 bg-info">RJ</div>
                                <div class="flex-grow-1">
                                    <div class="fw-semibold">Robert Johnson</div>
                                    <div class="text-muted small">Registered 1 day ago</div>
                                </div>
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-light" type="button" data-bs-toggle="dropdown">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li><a class="dropdown-item" href="#">View Profile</a></li>
                                        <li><a class="dropdown-item" href="#">Edit User</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li><a class="dropdown-item text-danger" href="#">Delete User</a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item p-3">
                            <div class="d-flex align-items-center">
                                <div class="user-avatar me-3 bg-warning">AL</div>
                                <div class="flex-grow-1">
                                    <div class="fw-semibold">Amanda Lee</div>
                                    <div class="text-muted small">Registered 2 days ago</div>
                                </div>
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-light" type="button" data-bs-toggle="dropdown">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li><a class="dropdown-item" href="#">View Profile</a></li>
                                        <li><a class="dropdown-item" href="#">Edit User</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li><a class="dropdown-item text-danger" href="#">Delete User</a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Recent Activity -->
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white p-4 border-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="fw-bold mb-0">Recent Activity</h5>
                        <a href="#" class="text-decoration-none">View All</a>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="activity-timeline p-4">
                        <div class="activity-item">
                            <div class="activity-point"></div>
                            <div class="activity-content">
                                <div class="fw-semibold">New event created</div>
                                <div class="text-muted small">Tech Conference 2025 was created by Admin</div>
                                <div class="activity-time">2 hours ago</div>
                            </div>
                        </div>
                        <div class="activity-item">
                            <div class="activity-point bg-success"></div>
                            <div class="activity-content">
                                <div class="fw-semibold">User registration</div>
                                <div class="text-muted small">John Doe registered a new account</div>
                                <div class="activity-time">5 hours ago</div>
                            </div>
                        </div>
                        <div class="activity-item">
                            <div class="activity-point bg-warning"></div>
                            <div class="activity-content">
                                <div class="fw-semibold">Payment received</div>
                                <div class="text-muted small">$250 payment for Music Festival tickets</div>
                                <div class="activity-time">12 hours ago</div>
                            </div>
                        </div>
                        <div class="activity-item">
                            <div class="activity-point bg-danger"></div>
                            <div class="activity-content">
                                <div class="fw-semibold">Event canceled</div>
                                <div class="text-muted small">Workshop on AI was canceled</div>
                                <div class="activity-time">1 day ago</div>
                            </div>
                        </div>
                        <div class="activity-item">
                            <div class="activity-point bg-info"></div>
                            <div class="activity-content">
                                <div class="fw-semibold">Settings updated</div>
                                <div class="text-muted small">Admin updated payment settings</div>
                                <div class="activity-time">2 days ago</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
@endsection

@push('styles')
<style>
    /* Dashboard Card Styles */
    .stat-icon {
        width: 56px;
        height: 56px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .bg-primary-light { background-color: rgba(59, 130, 246, 0.1); }
    .bg-success-light { background-color: rgba(16, 185, 129, 0.1); }
    .bg-warning-light { background-color: rgba(245, 158, 11, 0.1); }
    .bg-danger-light { background-color: rgba(239, 68, 68, 0.1); }
    .bg-info-light { background-color: rgba(6, 182, 212, 0.1); }

    /* Event Image Style */
    .event-img {
        width: 48px;
        height: 48px;
        background-size: cover;
        background-position: center;
        border-radius: 8px;
    }

    /* User Avatar Style */
    .user-avatar {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: bold;
    }

    /* Chart Legend Style */
    .legend-color {
        width: 16px;
        height: 16px;
        border-radius: 4px;
    }

    /* Activity Timeline Style */
    .activity-timeline {
        position: relative;
    }

    .activity-timeline::before {
        content: '';
        position: absolute;
        top: 0;
        bottom: 0;
        left: 10px;
        width: 2px;
        background-color: #e5e7eb;
    }

    .activity-item {
        position: relative;
        padding-left: 30px;
        padding-bottom: 24px;
    }

    .activity-item:last-child {
        padding-bottom: 0;
    }

    .activity-point {
        position: absolute;
        left: 0;
        top: 4px;
        width: 20px;
        height: 20px;
        border-radius: 50%;
        background-color: #3b82f6;
        border: 4px solid white;
        z-index: 1;
    }

    .activity-time {
        color: #9ca3af;
        font-size: 0.75rem;
        margin-top: 4px;
    }
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Sales Chart
    const salesCtx = document.getElementById('salesChart').getContext('2d');

    // Create gradient for the area under the line
    const salesGradient = salesCtx.createLinearGradient(0, 0, 0, 300);
    salesGradient.addColorStop(0, 'rgba(59, 130, 246, 0.5)');
    salesGradient.addColorStop(1, 'rgba(59, 130, 246, 0)');

    const salesChart = new Chart(salesCtx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            datasets: [
                {
                    label: 'Revenue',
                    data: [5000, 8000, 12000, 10000, 15000, 18000, 14000, 16000, 20000, 18000, 22000, 25000],
                    borderColor: '#3b82f6',
                    backgroundColor: salesGradient,
                    borderWidth: 2,
                    pointBackgroundColor: '#ffffff',
                    pointBorderColor: '#3b82f6',
                    pointBorderWidth: 2,
                    pointRadius: 4,
                    pointHoverRadius: 6,
                    fill: true,
                    tension: 0.4
                },
                {
                    label: 'Tickets',
                    data: [120, 180, 250, 200, 300, 350, 280, 320, 400, 360, 440, 500],
                    borderColor: '#10b981',
                    backgroundColor: 'transparent',
                    borderWidth: 2,
                    pointBackgroundColor: '#ffffff',
                    pointBorderColor: '#10b981',
                    pointBorderWidth: 2,
                    pointRadius: 4,
                    pointHoverRadius: 6,
                    fill: false,
                    tension: 0.4,
                    yAxisID: 'y1'
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        color: 'rgba(0, 0, 0, 0.05)'
                    },
                    ticks: {
                        callback: function(value) {
                            return '$' + value;
                        }
                    },
                    title: {
                        display: true,
                        text: 'Revenue',
                        color: '#6b7280'
                    }
                },
                y1: {
                    beginAtZero: true,
                    position: 'right',
                    grid: {
                        display: false
                    },
                    ticks: {
                        color: '#10b981'
                    },
                    title: {
                        display: true,
                        text: 'Tickets',
                        color: '#10b981'
                    }
                },
                x: {
                    grid: {
                        display: false
                    }
                }
            },
            plugins: {
                legend: {
                    position: 'top',
                    labels: {
                        usePointStyle: true,
                        boxWidth: 6
                    }
                },
                tooltip: {
                    backgroundColor: 'rgba(255, 255, 255, 0.9)',
                    titleColor: '#1f2937',
                    bodyColor: '#4b5563',
                    bodySpacing: 6,
                    padding: 12,
                    borderColor: 'rgba(0, 0, 0, 0.1)',
                    borderWidth: 1,
                    mode: 'index',
                    intersect: false,
                    callbacks: {
                        label: function(context) {
                            let label = context.dataset.label || '';
                            if (label) {
                                label += ': ';
                            }
                            if (context.dataset.yAxisID === 'y1') {
                                label += context.parsed.y + ' tickets';
                            } else {
                                label += '$' + context.parsed.y;
                            }
                            return label;
                        }
                    }
                }
            },
            interaction: {
                mode: 'index',
                intersect: false
            }
        }
    });

    // Event Types Chart
    const eventTypesCtx = document.getElementById('eventTypesChart').getContext('2d');
    const eventTypesChart = new Chart(eventTypesCtx, {
        type: 'doughnut',
        data: {
            labels: ['Music', 'Business', 'Tech', 'Arts', 'Sports'],
            datasets: [{
                data: [30, 25, 20, 15, 10],
                backgroundColor: ['#3b82f6', '#10b981', '#f59e0b', '#ef4444', '#8b5cf6'],
                borderWidth: 0,
                hoverOffset: 5
=======
        <!-- Main Content -->
        <div class="col-lg-10">
            <!-- Dashboard Section -->
            <div id="dashboard-section" class="admin-section">
                <!-- Header -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h2 class="mb-1">Dashboard Overview</h2>
                        <p class="text-muted mb-0">Welcome back, Admin! Here's what's happening.</p>
                    </div>
                    <div>
                        <select class="form-select" id="dateRange">
                            <option value="7">Last 7 days</option>
                            <option value="30" selected>Last 30 days</option>
                            <option value="90">Last 90 days</option>
                            <option value="365">Last year</option>
                        </select>
                    </div>
                </div>

                <!-- Stats Cards -->
                <div class="row g-4 mb-4">
                    <div class="col-md-3">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <div class="bg-primary bg-opacity-10 rounded-circle p-3">
                                            <i class="fas fa-calendar text-primary"></i>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h5 class="mb-1">127</h5>
                                        <p class="text-muted mb-0 small">Total Events</p>
                                        <small class="text-success">
                                            <i class="fas fa-arrow-up"></i> +12%
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <div class="bg-success bg-opacity-10 rounded-circle p-3">
                                            <i class="fas fa-ticket-alt text-success"></i>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h5 class="mb-1">3,542</h5>
                                        <p class="text-muted mb-0 small">Tickets Sold</p>
                                        <small class="text-success">
                                            <i class="fas fa-arrow-up"></i> +28%
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <div class="bg-info bg-opacity-10 rounded-circle p-3">
                                            <i class="fas fa-dollar-sign text-info"></i>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h5 class="mb-1">$89,432</h5>
                                        <p class="text-muted mb-0 small">Revenue</p>
                                        <small class="text-success">
                                            <i class="fas fa-arrow-up"></i> +18%
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <div class="bg-warning bg-opacity-10 rounded-circle p-3">
                                            <i class="fas fa-users text-warning"></i>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h5 class="mb-1">1,234</h5>
                                        <p class="text-muted mb-0 small">Active Users</p>
                                        <small class="text-success">
                                            <i class="fas fa-arrow-up"></i> +7%
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Charts Row -->
                <div class="row g-4 mb-4">
                    <div class="col-lg-8">
                        <div class="card border-0 shadow-sm">
                            <div class="card-header bg-white border-0 py-3">
                                <h6 class="card-title mb-0">Revenue Overview</h6>
                            </div>
                            <div class="card-body">
                                <canvas id="revenueChart" height="300"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card border-0 shadow-sm">
                            <div class="card-header bg-white border-0 py-3">
                                <h6 class="card-title mb-0">Event Categories</h6>
                            </div>
                            <div class="card-body">
                                <canvas id="categoryChart" height="300"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Activity -->
                <div class="row g-4">
                    <div class="col-lg-8">
                        <div class="card border-0 shadow-sm">
                            <div class="card-header bg-white border-0 py-3">
                                <h6 class="card-title mb-0">Recent Bookings</h6>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-hover mb-0">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Customer</th>
                                                <th>Event</th>
                                                <th>Tickets</th>
                                                <th>Amount</th>
                                                <th>Status</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=32&h=32&fit=crop&crop=face"
                                                             class="rounded-circle me-2" width="32" height="32">
                                                        <span>John Doe</span>
                                                    </div>
                                                </td>
                                                <td>Tech Conference 2024</td>
                                                <td>2</td>
                                                <td>$198.00</td>
                                                <td><span class="badge bg-success">Confirmed</span></td>
                                                <td>2 min ago</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="https://images.unsplash.com/photo-1494790108755-2616b612b786?w=32&h=32&fit=crop&crop=face"
                                                             class="rounded-circle me-2" width="32" height="32">
                                                        <span>Jane Smith</span>
                                                    </div>
                                                </td>
                                                <td>Digital Marketing Summit</td>
                                                <td>1</td>
                                                <td>$149.00</td>
                                                <td><span class="badge bg-warning">Pending</span></td>
                                                <td>15 min ago</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=32&h=32&fit=crop&crop=face"
                                                             class="rounded-circle me-2" width="32" height="32">
                                                        <span>Mike Johnson</span>
                                                    </div>
                                                </td>
                                                <td>Startup Networking</td>
                                                <td>3</td>
                                                <td>$297.00</td>
                                                <td><span class="badge bg-success">Confirmed</span></td>
                                                <td>1 hour ago</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card border-0 shadow-sm">
                            <div class="card-header bg-white border-0 py-3">
                                <h6 class="card-title mb-0">Quick Actions</h6>
                            </div>
                            <div class="card-body">
                                <div class="d-grid gap-2">
                                    <a href="/events/create" class="btn btn-gradient">
                                        <i class="fas fa-plus me-2"></i>Create New Event
                                    </a>
                                    <button class="btn btn-outline-primary" onclick="exportData()">
                                        <i class="fas fa-download me-2"></i>Export Reports
                                    </button>
                                    <button class="btn btn-outline-success" onclick="sendNotifications()">
                                        <i class="fas fa-bell me-2"></i>Send Notifications
                                    </button>
                                    <button class="btn btn-outline-info" onclick="viewAnalytics()">
                                        <i class="fas fa-chart-line me-2"></i>View Analytics
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Events Section -->
            <div id="events-section" class="admin-section" style="display: none;">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h2 class="mb-1">Event Management</h2>
                        <p class="text-muted mb-0">Manage all events on the platform</p>
                    </div>
                    <div>
                        <a href="/events/create" class="btn btn-gradient">
                            <i class="fas fa-plus me-2"></i>Add New Event
                        </a>
                    </div>
                </div>

                <!-- Filters -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body p-3">
                        <div class="row g-3 align-items-center">
                            <div class="col-md-3">
                                <select class="form-select">
                                    <option value="">All Categories</option>
                                    <option value="technology">Technology</option>
                                    <option value="business">Business</option>
                                    <option value="education">Education</option>
                                    <option value="networking">Networking</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select class="form-select">
                                    <option value="">All Statuses</option>
                                    <option value="upcoming">Upcoming</option>
                                    <option value="ongoing">Ongoing</option>
                                    <option value="completed">Completed</option>
                                    <option value="cancelled">Cancelled</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fas fa-search"></i>
                                    </span>
                                    <input type="text" class="form-control" placeholder="Search events...">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-outline-secondary w-100">
                                    <i class="fas fa-filter me-1"></i>Filter
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Events Table -->
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>Event</th>
                                        <th>Organizer</th>
                                        <th>Date</th>
                                        <th>Tickets Sold</th>
                                        <th>Revenue</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=40&h=40&fit=crop"
                                                     class="rounded me-3" width="40" height="40">
                                                <div>
                                                    <h6 class="mb-0">Tech Conference 2024</h6>
                                                    <small class="text-muted">Technology</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td>TechCorp Inc.</td>
                                        <td>Mar 15, 2024</td>
                                        <td>245/300</td>
                                        <td>$24,255</td>
                                        <td><span class="badge bg-success">Active</span></td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-sm btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown">
                                                    Actions
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="#"><i class="fas fa-eye me-2"></i>View</a></li>
                                                    <li><a class="dropdown-item" href="#"><i class="fas fa-edit me-2"></i>Edit</a></li>
                                                    <li><a class="dropdown-item" href="#"><i class="fas fa-chart-bar me-2"></i>Analytics</a></li>
                                                    <li><hr class="dropdown-divider"></li>
                                                    <li><a class="dropdown-item text-danger" href="#"><i class="fas fa-ban me-2"></i>Suspend</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- More rows would go here -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Other sections would be implemented similarly -->
            <div id="bookings-section" class="admin-section" style="display: none;">
                <h2>Bookings Management</h2>
                <p class="text-muted">Content for bookings management...</p>
            </div>

            <div id="users-section" class="admin-section" style="display: none;">
                <h2>User Management</h2>
                <p class="text-muted">Content for user management...</p>
            </div>

            <div id="companies-section" class="admin-section" style="display: none;">
                <h2>Company Management</h2>
                <p class="text-muted">Content for company management...</p>
            </div>

            <div id="reports-section" class="admin-section" style="display: none;">
                <h2>Reports & Analytics</h2>
                <p class="text-muted">Content for reports and analytics...</p>
            </div>

            <div id="settings-section" class="admin-section" style="display: none;">
                <h2>Platform Settings</h2>
                <p class="text-muted">Content for platform settings...</p>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize charts
    initializeCharts();
});

function showSection(sectionName) {
    // Hide all sections
    document.querySelectorAll('.admin-section').forEach(section => {
        section.style.display = 'none';
    });

    // Show selected section
    document.getElementById(sectionName + '-section').style.display = 'block';

    // Update active nav link
    document.querySelectorAll('.nav-link').forEach(link => {
        link.classList.remove('active');
    });
    event.target.classList.add('active');
}

function initializeCharts() {
    // Revenue Chart
    const revenueCtx = document.getElementById('revenueChart').getContext('2d');
    new Chart(revenueCtx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            datasets: [{
                label: 'Revenue',
                data: [12000, 19000, 15000, 25000, 22000, 30000],
                borderColor: 'rgb(99, 102, 241)',
                backgroundColor: 'rgba(99, 102, 241, 0.1)',
                tension: 0.4
>>>>>>> 8a996aa7d56b8b38ce7291c226b99d292509af77
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
<<<<<<< HEAD
            cutout: '70%',
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    backgroundColor: 'rgba(255, 255, 255, 0.9)',
                    titleColor: '#1f2937',
                    bodyColor: '#4b5563',
                    bodySpacing: 6,
                    padding: 12,
                    borderColor: 'rgba(0, 0, 0, 0.1)',
                    borderWidth: 1,
                    callbacks: {
                        label: function(context) {
                            return context.label + ': ' + context.parsed + '%';
=======
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return '$' + value.toLocaleString();
>>>>>>> 8a996aa7d56b8b38ce7291c226b99d292509af77
                        }
                    }
                }
            }
        }
    });
<<<<<<< HEAD
});
</script>
@endpush
=======

    // Category Chart
    const categoryCtx = document.getElementById('categoryChart').getContext('2d');
    new Chart(categoryCtx, {
        type: 'doughnut',
        data: {
            labels: ['Technology', 'Business', 'Education', 'Networking', 'Other'],
            datasets: [{
                data: [35, 25, 20, 15, 5],
                backgroundColor: [
                    'rgb(99, 102, 241)',
                    'rgb(34, 197, 94)',
                    'rgb(251, 191, 36)',
                    'rgb(239, 68, 68)',
                    'rgb(156, 163, 175)'
                ]
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom'
                }
            }
        }
    });
}

function exportData() {
    // Simulate data export
    showNotification('Report export initiated. You will receive an email when ready.', 'info');
}

function sendNotifications() {
    // Simulate sending notifications
    showNotification('Notifications sent to all active users.', 'success');
}

function viewAnalytics() {
    // Open analytics page
    window.open('/admin/analytics', '_blank');
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
