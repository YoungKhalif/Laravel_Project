@extends('layouts.app')

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
                </div>
            </div>
        </div>

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
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
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
                        }
                    }
                }
            }
        }
    });
});
</script>
@endpush
