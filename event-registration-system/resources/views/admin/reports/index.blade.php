@extends('layouts.app')

@section('title', 'Reports & Analytics - Admin - EventSmart')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <!-- Header -->
        <div class="col-12 mb-4">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h2 class="mb-1">Reports & Analytics</h2>
                    <p class="text-muted mb-0">Comprehensive insights into your platform performance</p>
                </div>
                <div class="d-flex gap-2">
                    <select class="form-select" id="dateRange">
                        <option value="7">Last 7 days</option>
                        <option value="30" selected>Last 30 days</option>
                        <option value="90">Last 90 days</option>
                        <option value="365">Last year</option>
                    </select>
                    <button class="btn btn-gradient" onclick="exportReport()">
                        <i class="fas fa-download me-2"></i>Export Report
                    </button>
                </div>
            </div>
        </div>

        <!-- Summary Stats -->
        <div class="col-12 mb-4">
            <div class="row g-4">
                <div class="col-md-3">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body text-center">
                            <div class="bg-primary bg-opacity-10 rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center"
                                 style="width: 60px; height: 60px;">
                                <i class="fas fa-dollar-sign fa-2x text-primary"></i>
                            </div>
                            <h3 class="mb-1">$124,567</h3>
                            <p class="text-muted mb-1">Total Revenue</p>
                            <small class="text-success">
                                <i class="fas fa-arrow-up"></i> +18.2% from last month
                            </small>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body text-center">
                            <div class="bg-success bg-opacity-10 rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center"
                                 style="width: 60px; height: 60px;">
                                <i class="fas fa-ticket-alt fa-2x text-success"></i>
                            </div>
                            <h3 class="mb-1">4,523</h3>
                            <p class="text-muted mb-1">Tickets Sold</p>
                            <small class="text-success">
                                <i class="fas fa-arrow-up"></i> +24.7% from last month
                            </small>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body text-center">
                            <div class="bg-info bg-opacity-10 rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center"
                                 style="width: 60px; height: 60px;">
                                <i class="fas fa-calendar fa-2x text-info"></i>
                            </div>
                            <h3 class="mb-1">147</h3>
                            <p class="text-muted mb-1">Events Created</p>
                            <small class="text-success">
                                <i class="fas fa-arrow-up"></i> +12.3% from last month
                            </small>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body text-center">
                            <div class="bg-warning bg-opacity-10 rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center"
                                 style="width: 60px; height: 60px;">
                                <i class="fas fa-users fa-2x text-warning"></i>
                            </div>
                            <h3 class="mb-1">2,891</h3>
                            <p class="text-muted mb-1">New Users</p>
                            <small class="text-success">
                                <i class="fas fa-arrow-up"></i> +8.4% from last month
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts Row -->
        <div class="col-12 mb-4">
            <div class="row g-4">
                <!-- Revenue Chart -->
                <div class="col-lg-8">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-white border-0 py-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <h6 class="card-title mb-0">Revenue Trends</h6>
                                <div class="btn-group btn-group-sm" role="group">
                                    <input type="radio" class="btn-check" name="revenueView" id="daily" checked>
                                    <label class="btn btn-outline-primary" for="daily">Daily</label>

                                    <input type="radio" class="btn-check" name="revenueView" id="weekly">
                                    <label class="btn btn-outline-primary" for="weekly">Weekly</label>

                                    <input type="radio" class="btn-check" name="revenueView" id="monthly">
                                    <label class="btn btn-outline-primary" for="monthly">Monthly</label>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <canvas id="revenueChart" height="300"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Event Categories Chart -->
                <div class="col-lg-4">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-white border-0 py-3">
                            <h6 class="card-title mb-0">Event Categories</h6>
                        </div>
                        <div class="card-body">
                            <canvas id="categoryChart" height="300"></canvas>
                            <div class="mt-3">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span class="d-flex align-items-center">
                                        <span class="bg-primary rounded-circle me-2" style="width: 10px; height: 10px;"></span>
                                        Technology
                                    </span>
                                    <span class="fw-bold">35%</span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span class="d-flex align-items-center">
                                        <span class="bg-success rounded-circle me-2" style="width: 10px; height: 10px;"></span>
                                        Business
                                    </span>
                                    <span class="fw-bold">25%</span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span class="d-flex align-items-center">
                                        <span class="bg-warning rounded-circle me-2" style="width: 10px; height: 10px;"></span>
                                        Education
                                    </span>
                                    <span class="fw-bold">20%</span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="d-flex align-items-center">
                                        <span class="bg-info rounded-circle me-2" style="width: 10px; height: 10px;"></span>
                                        Other
                                    </span>
                                    <span class="fw-bold">20%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Reports Tabs -->
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-0 py-3">
                    <ul class="nav nav-tabs card-header-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#sales-report" role="tab">
                                <i class="fas fa-chart-line me-2"></i>Sales Report
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#events-report" role="tab">
                                <i class="fas fa-calendar me-2"></i>Events Report
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#users-report" role="tab">
                                <i class="fas fa-users me-2"></i>Users Report
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#attendance-report" role="tab">
                                <i class="fas fa-check-circle me-2"></i>Attendance Report
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <!-- Sales Report -->
                        <div class="tab-pane fade show active" id="sales-report" role="tabpanel">
                            <div class="row g-4 mb-4">
                                <div class="col-md-3">
                                    <div class="text-center p-3 bg-light rounded">
                                        <h4 class="text-primary mb-1">$89,432</h4>
                                        <small class="text-muted">Gross Revenue</small>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="text-center p-3 bg-light rounded">
                                        <h4 class="text-success mb-1">$78,567</h4>
                                        <small class="text-muted">Net Revenue</small>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="text-center p-3 bg-light rounded">
                                        <h4 class="text-info mb-1">$10,865</h4>
                                        <small class="text-muted">Platform Fees</small>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="text-center p-3 bg-light rounded">
                                        <h4 class="text-warning mb-1">3,245</h4>
                                        <small class="text-muted">Transactions</small>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Event</th>
                                            <th>Tickets Sold</th>
                                            <th>Revenue</th>
                                            <th>Platform Fee</th>
                                            <th>Net Revenue</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Tech Conference 2024</td>
                                            <td>245</td>
                                            <td>$24,255</td>
                                            <td>$2,425</td>
                                            <td>$21,830</td>
                                            <td><span class="badge bg-success">Completed</span></td>
                                        </tr>
                                        <tr>
                                            <td>Digital Marketing Summit</td>
                                            <td>189</td>
                                            <td>$18,900</td>
                                            <td>$1,890</td>
                                            <td>$17,010</td>
                                            <td><span class="badge bg-primary">Active</span></td>
                                        </tr>
                                        <tr>
                                            <td>Startup Networking</td>
                                            <td>156</td>
                                            <td>$7,800</td>
                                            <td>$780</td>
                                            <td>$7,020</td>
                                            <td><span class="badge bg-success">Completed</span></td>
                                        </tr>
                                        <tr>
                                            <td>AI Workshop</td>
                                            <td>98</td>
                                            <td>$14,700</td>
                                            <td>$1,470</td>
                                            <td>$13,230</td>
                                            <td><span class="badge bg-warning">Upcoming</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Events Report -->
                        <div class="tab-pane fade" id="events-report" role="tabpanel">
                            <div class="row g-4 mb-4">
                                <div class="col-md-3">
                                    <div class="text-center p-3 bg-light rounded">
                                        <h4 class="text-primary mb-1">147</h4>
                                        <small class="text-muted">Total Events</small>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="text-center p-3 bg-light rounded">
                                        <h4 class="text-success mb-1">89</h4>
                                        <small class="text-muted">Completed</small>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="text-center p-3 bg-light rounded">
                                        <h4 class="text-warning mb-1">42</h4>
                                        <small class="text-muted">Upcoming</small>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="text-center p-3 bg-light rounded">
                                        <h4 class="text-danger mb-1">16</h4>
                                        <small class="text-muted">Cancelled</small>
                                    </div>
                                </div>
                            </div>

                            <canvas id="eventsChart" height="200"></canvas>
                        </div>

                        <!-- Users Report -->
                        <div class="tab-pane fade" id="users-report" role="tabpanel">
                            <div class="row g-4 mb-4">
                                <div class="col-md-3">
                                    <div class="text-center p-3 bg-light rounded">
                                        <h4 class="text-primary mb-1">12,456</h4>
                                        <small class="text-muted">Total Users</small>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="text-center p-3 bg-light rounded">
                                        <h4 class="text-success mb-1">2,891</h4>
                                        <small class="text-muted">New This Month</small>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="text-center p-3 bg-light rounded">
                                        <h4 class="text-info mb-1">8,734</h4>
                                        <small class="text-muted">Active Users</small>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="text-center p-3 bg-light rounded">
                                        <h4 class="text-warning mb-1">234</h4>
                                        <small class="text-muted">Event Organizers</small>
                                    </div>
                                </div>
                            </div>

                            <canvas id="usersChart" height="200"></canvas>
                        </div>

                        <!-- Attendance Report -->
                        <div class="tab-pane fade" id="attendance-report" role="tabpanel">
                            <div class="row g-4 mb-4">
                                <div class="col-md-3">
                                    <div class="text-center p-3 bg-light rounded">
                                        <h4 class="text-primary mb-1">87.3%</h4>
                                        <small class="text-muted">Average Attendance</small>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="text-center p-3 bg-light rounded">
                                        <h4 class="text-success mb-1">23,456</h4>
                                        <small class="text-muted">Total Attendees</small>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="text-center p-3 bg-light rounded">
                                        <h4 class="text-info mb-1">3,234</h4>
                                        <small class="text-muted">No-Shows</small>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="text-center p-3 bg-light rounded">
                                        <h4 class="text-warning mb-1">4.7</h4>
                                        <small class="text-muted">Avg Rating</small>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Event</th>
                                            <th>Expected</th>
                                            <th>Attended</th>
                                            <th>Attendance Rate</th>
                                            <th>Rating</th>
                                            <th>Feedback</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Tech Conference 2024</td>
                                            <td>245</td>
                                            <td>221</td>
                                            <td>90.2%</td>
                                            <td>4.8/5</td>
                                            <td><a href="#" class="btn btn-sm btn-outline-primary">View</a></td>
                                        </tr>
                                        <tr>
                                            <td>Startup Networking</td>
                                            <td>156</td>
                                            <td>134</td>
                                            <td>85.9%</td>
                                            <td>4.6/5</td>
                                            <td><a href="#" class="btn btn-sm btn-outline-primary">View</a></td>
                                        </tr>
                                        <tr>
                                            <td>Web Dev Bootcamp</td>
                                            <td>89</td>
                                            <td>76</td>
                                            <td>85.4%</td>
                                            <td>4.7/5</td>
                                            <td><a href="#" class="btn btn-sm btn-outline-primary">View</a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    initializeCharts();
});

function initializeCharts() {
    // Revenue Chart
    const revenueCtx = document.getElementById('revenueChart').getContext('2d');
    new Chart(revenueCtx, {
        type: 'line',
        data: {
            labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
            datasets: [{
                label: 'Revenue',
                data: [15000, 22000, 18000, 28000],
                borderColor: 'rgb(99, 102, 241)',
                backgroundColor: 'rgba(99, 102, 241, 0.1)',
                tension: 0.4,
                fill: true
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
            labels: ['Technology', 'Business', 'Education', 'Other'],
            datasets: [{
                data: [35, 25, 20, 20],
                backgroundColor: [
                    'rgb(99, 102, 241)',
                    'rgb(34, 197, 94)',
                    'rgb(251, 191, 36)',
                    'rgb(156, 163, 175)'
                ]
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            }
        }
    });

    // Events Chart
    const eventsCtx = document.getElementById('eventsChart').getContext('2d');
    new Chart(eventsCtx, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            datasets: [{
                label: 'Events Created',
                data: [12, 19, 15, 25, 22, 30],
                backgroundColor: 'rgba(99, 102, 241, 0.8)'
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
                    beginAtZero: true
                }
            }
        }
    });

    // Users Chart
    const usersCtx = document.getElementById('usersChart').getContext('2d');
    new Chart(usersCtx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            datasets: [{
                label: 'New Users',
                data: [450, 890, 650, 1200, 980, 1450],
                borderColor: 'rgb(34, 197, 94)',
                backgroundColor: 'rgba(34, 197, 94, 0.1)',
                tension: 0.4,
                fill: true
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
                    beginAtZero: true
                }
            }
        }
    });
}

function exportReport() {
    // Simulate report export
    const activeTab = document.querySelector('.nav-link.active').textContent.trim();
    showNotification(`${activeTab} exported successfully! Download will begin shortly.`, 'success');

    // Simulate file download
    setTimeout(() => {
        const link = document.createElement('a');
        link.href = '#';
        link.download = `${activeTab.toLowerCase().replace(' ', '_')}_report.pdf`;
        link.click();
    }, 1000);
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
