@extends('layouts.app')

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
                </div>
            </div>
        </div>

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
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
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
                        }
                    }
                }
            }
        }
    });

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
