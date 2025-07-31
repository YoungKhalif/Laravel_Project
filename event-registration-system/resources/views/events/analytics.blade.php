@extends('layouts.app')

@section('title', 'Event Analytics - EventSmart')

@section('content')
<div class="container-fluid px-4 py-5">
    <!-- Header -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="h3 fw-bold mb-1">Event Analytics</h1>
                    <p class="text-muted mb-0">Comprehensive insights for {{ $event->title }}</p>
                </div>
                <div>
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fas fa-calendar me-2"></i>Last 30 Days
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Last 7 Days</a></li>
                            <li><a class="dropdown-item" href="#">Last 30 Days</a></li>
                            <li><a class="dropdown-item" href="#">Last 90 Days</a></li>
                            <li><a class="dropdown-item" href="#">All Time</a></li>
                        </ul>
                    </div>
                    <button class="btn btn-primary ms-2">
                        <i class="fas fa-download me-2"></i>Export Report
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Key Metrics -->
    <div class="row g-4 mb-5">
        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted text-uppercase mb-1">Total Registrations</h6>
                            <h3 class="fw-bold mb-0 text-primary">{{ number_format($totalRegistrations) }}</h3>
                            <small class="text-success">
                                <i class="fas fa-arrow-up me-1"></i>+15% from last period
                            </small>
                        </div>
                        <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                            <i class="fas fa-users fa-lg"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted text-uppercase mb-1">Revenue Generated</h6>
                            <h3 class="fw-bold mb-0 text-success">${{ number_format($totalRevenue, 2) }}</h3>
                            <small class="text-success">
                                <i class="fas fa-arrow-up me-1"></i>+23% from last period
                            </small>
                        </div>
                        <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                            <i class="fas fa-dollar-sign fa-lg"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted text-uppercase mb-1">Check-in Rate</h6>
                            <h3 class="fw-bold mb-0 text-info">{{ number_format($checkinRate, 1) }}%</h3>
                            <small class="text-info">
                                {{ $checkedInCount }} of {{ $totalRegistrations }} attended
                            </small>
                        </div>
                        <div class="bg-info text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                            <i class="fas fa-qrcode fa-lg"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted text-uppercase mb-1">Avg. Ticket Price</h6>
                            <h3 class="fw-bold mb-0 text-warning">${{ number_format($avgTicketPrice, 2) }}</h3>
                            <small class="text-muted">
                                Across all ticket types
                            </small>
                        </div>
                        <div class="bg-warning text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                            <i class="fas fa-ticket-alt fa-lg"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts Row -->
    <div class="row g-4 mb-5">
        <!-- Registration Trend -->
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-bottom-0 pb-0">
                    <h5 class="mb-0">Registration Trend</h5>
                    <p class="text-muted mb-0">Daily registrations over time</p>
                </div>
                <div class="card-body">
                    <canvas id="registrationChart" height="300"></canvas>
                </div>
            </div>
        </div>

        <!-- Ticket Types Breakdown -->
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-bottom-0 pb-0">
                    <h5 class="mb-0">Ticket Types</h5>
                    <p class="text-muted mb-0">Sales by ticket type</p>
                </div>
                <div class="card-body">
                    <canvas id="ticketTypesChart" height="300"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Demographics and Traffic -->
    <div class="row g-4 mb-5">
        <!-- Age Demographics -->
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-bottom-0 pb-0">
                    <h5 class="mb-0">Age Demographics</h5>
                    <p class="text-muted mb-0">Attendee age distribution</p>
                </div>
                <div class="card-body">
                    <canvas id="ageChart" height="250"></canvas>
                </div>
            </div>
        </div>

        <!-- Geographic Distribution -->
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-bottom-0 pb-0">
                    <h5 class="mb-0">Geographic Distribution</h5>
                    <p class="text-muted mb-0">Attendees by location</p>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>Location</th>
                                    <th>Attendees</th>
                                    <th>Percentage</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><i class="fas fa-map-marker-alt text-primary me-2"></i>New York, NY</td>
                                    <td>156</td>
                                    <td>
                                        <div class="progress" style="height: 6px;">
                                            <div class="progress-bar" style="width: 45%"></div>
                                        </div>
                                        45%
                                    </td>
                                </tr>
                                <tr>
                                    <td><i class="fas fa-map-marker-alt text-success me-2"></i>Los Angeles, CA</td>
                                    <td>89</td>
                                    <td>
                                        <div class="progress" style="height: 6px;">
                                            <div class="progress-bar bg-success" style="width: 26%"></div>
                                        </div>
                                        26%
                                    </td>
                                </tr>
                                <tr>
                                    <td><i class="fas fa-map-marker-alt text-info me-2"></i>Chicago, IL</td>
                                    <td>67</td>
                                    <td>
                                        <div class="progress" style="height: 6px;">
                                            <div class="progress-bar bg-info" style="width: 19%"></div>
                                        </div>
                                        19%
                                    </td>
                                </tr>
                                <tr>
                                    <td><i class="fas fa-map-marker-alt text-warning me-2"></i>Miami, FL</td>
                                    <td>34</td>
                                    <td>
                                        <div class="progress" style="height: 6px;">
                                            <div class="progress-bar bg-warning" style="width: 10%"></div>
                                        </div>
                                        10%
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Traffic Sources and Engagement -->
    <div class="row g-4 mb-5">
        <!-- Traffic Sources -->
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-bottom-0 pb-0">
                    <h5 class="mb-0">Traffic Sources</h5>
                    <p class="text-muted mb-0">How attendees found your event</p>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6 mb-3">
                            <div class="d-flex align-items-center">
                                <div class="bg-primary rounded-circle me-3" style="width: 12px; height: 12px;"></div>
                                <div class="flex-grow-1">
                                    <div class="d-flex justify-content-between">
                                        <span>Direct</span>
                                        <strong>42%</strong>
                                    </div>
                                    <div class="progress mt-1" style="height: 4px;">
                                        <div class="progress-bar bg-primary" style="width: 42%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 mb-3">
                            <div class="d-flex align-items-center">
                                <div class="bg-success rounded-circle me-3" style="width: 12px; height: 12px;"></div>
                                <div class="flex-grow-1">
                                    <div class="d-flex justify-content-between">
                                        <span>Social Media</span>
                                        <strong>28%</strong>
                                    </div>
                                    <div class="progress mt-1" style="height: 4px;">
                                        <div class="progress-bar bg-success" style="width: 28%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 mb-3">
                            <div class="d-flex align-items-center">
                                <div class="bg-info rounded-circle me-3" style="width: 12px; height: 12px;"></div>
                                <div class="flex-grow-1">
                                    <div class="d-flex justify-content-between">
                                        <span>Email</span>
                                        <strong>18%</strong>
                                    </div>
                                    <div class="progress mt-1" style="height: 4px;">
                                        <div class="progress-bar bg-info" style="width: 18%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 mb-3">
                            <div class="d-flex align-items-center">
                                <div class="bg-warning rounded-circle me-3" style="width: 12px; height: 12px;"></div>
                                <div class="flex-grow-1">
                                    <div class="d-flex justify-content-between">
                                        <span>Search</span>
                                        <strong>12%</strong>
                                    </div>
                                    <div class="progress mt-1" style="height: 4px;">
                                        <div class="progress-bar bg-warning" style="width: 12%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Engagement Metrics -->
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-bottom-0 pb-0">
                    <h5 class="mb-0">Engagement Metrics</h5>
                    <p class="text-muted mb-0">Event page performance</p>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6 mb-3">
                            <div class="text-center">
                                <h4 class="fw-bold text-primary mb-1">2,847</h4>
                                <small class="text-muted">Page Views</small>
                            </div>
                        </div>
                        <div class="col-6 mb-3">
                            <div class="text-center">
                                <h4 class="fw-bold text-success mb-1">12.3%</h4>
                                <small class="text-muted">Conversion Rate</small>
                            </div>
                        </div>
                        <div class="col-6 mb-3">
                            <div class="text-center">
                                <h4 class="fw-bold text-info mb-1">4:32</h4>
                                <small class="text-muted">Avg. Time on Page</small>
                            </div>
                        </div>
                        <div class="col-6 mb-3">
                            <div class="text-center">
                                <h4 class="fw-bold text-warning mb-1">23%</h4>
                                <small class="text-muted">Bounce Rate</small>
                            </div>
                        </div>
                    </div>
                    
                    <hr>
                    
                    <h6 class="mb-3">Social Engagement</h6>
                    <div class="d-flex justify-content-between mb-2">
                        <span><i class="fab fa-facebook text-primary me-2"></i>Facebook Shares</span>
                        <strong>127</strong>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span><i class="fab fa-twitter text-info me-2"></i>Twitter Shares</span>
                        <strong>89</strong>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span><i class="fab fa-linkedin text-primary me-2"></i>LinkedIn Shares</span>
                        <strong>45</strong>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Performance Insights -->
    <div class="row g-4">
        <!-- Key Insights -->
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-bottom-0 pb-0">
                    <h5 class="mb-0">Key Insights & Recommendations</h5>
                    <p class="text-muted mb-0">AI-powered insights to improve your event performance</p>
                </div>
                <div class="card-body">
                    <div class="alert alert-success border-0 mb-3">
                        <div class="d-flex">
                            <i class="fas fa-lightbulb fa-2x text-success me-3"></i>
                            <div>
                                <h6 class="alert-heading">Peak Registration Period</h6>
                                <p class="mb-0">Most registrations occurred between 2-4 PM on weekdays. Consider timing your promotional activities during these hours for maximum impact.</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="alert alert-info border-0 mb-3">
                        <div class="d-flex">
                            <i class="fas fa-chart-line fa-2x text-info me-3"></i>
                            <div>
                                <h6 class="alert-heading">Price Optimization</h6>
                                <p class="mb-0">Your current pricing strategy shows strong demand. Consider offering early bird discounts for future events to boost initial sales momentum.</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="alert alert-warning border-0 mb-3">
                        <div class="d-flex">
                            <i class="fas fa-users fa-2x text-warning me-3"></i>
                            <div>
                                <h6 class="alert-heading">Audience Engagement</h6>
                                <p class="mb-0">Your bounce rate is slightly above average. Consider adding more engaging content like videos or testimonials to your event page.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-bottom-0 pb-0">
                    <h5 class="mb-0">Quick Actions</h5>
                    <p class="text-muted mb-0">Manage your event</p>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <a href="{{ route('events.edit', $event) }}" class="btn btn-outline-primary">
                            <i class="fas fa-edit me-2"></i>Edit Event Details
                        </a>
                        <a href="{{ route('events.checkin', $event) }}" class="btn btn-outline-success">
                            <i class="fas fa-qrcode me-2"></i>Check-in Attendees
                        </a>
                        <a href="{{ route('events.attendees', $event) }}" class="btn btn-outline-info">
                            <i class="fas fa-users me-2"></i>View Attendee List
                        </a>
                        <button class="btn btn-outline-warning">
                            <i class="fas fa-envelope me-2"></i>Send Announcement
                        </button>
                        <button class="btn btn-outline-secondary">
                            <i class="fas fa-share-alt me-2"></i>Promote Event
                        </button>
                    </div>
                    
                    <hr>
                    
                    <h6 class="mb-3">Export Options</h6>
                    <div class="d-grid gap-2">
                        <button class="btn btn-sm btn-outline-dark">
                            <i class="fas fa-file-excel me-2"></i>Attendee List (Excel)
                        </button>
                        <button class="btn btn-sm btn-outline-dark">
                            <i class="fas fa-file-pdf me-2"></i>Analytics Report (PDF)
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
// Registration Trend Chart
const registrationCtx = document.getElementById('registrationChart').getContext('2d');
new Chart(registrationCtx, {
    type: 'line',
    data: {
        labels: ['Jan 1', 'Jan 8', 'Jan 15', 'Jan 22', 'Jan 29', 'Feb 5', 'Feb 12', 'Feb 19', 'Feb 26'],
        datasets: [{
            label: 'Registrations',
            data: [12, 19, 3, 17, 28, 24, 33, 42, 39],
            borderColor: 'rgb(54, 162, 235)',
            backgroundColor: 'rgba(54, 162, 235, 0.1)',
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
                grid: {
                    color: 'rgba(0,0,0,0.1)'
                }
            },
            x: {
                grid: {
                    display: false
                }
            }
        }
    }
});

// Ticket Types Chart
const ticketTypesCtx = document.getElementById('ticketTypesChart').getContext('2d');
new Chart(ticketTypesCtx, {
    type: 'doughnut',
    data: {
        labels: ['General', 'VIP', 'Student', 'Group'],
        datasets: [{
            data: [180, 45, 67, 23],
            backgroundColor: [
                '#007bff',
                '#28a745', 
                '#ffc107',
                '#dc3545'
            ],
            borderWidth: 0
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

// Age Demographics Chart
const ageCtx = document.getElementById('ageChart').getContext('2d');
new Chart(ageCtx, {
    type: 'bar',
    data: {
        labels: ['18-24', '25-34', '35-44', '45-54', '55+'],
        datasets: [{
            label: 'Attendees',
            data: [45, 89, 67, 34, 21],
            backgroundColor: 'rgba(54, 162, 235, 0.8)',
            borderColor: 'rgb(54, 162, 235)',
            borderWidth: 1
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
                grid: {
                    color: 'rgba(0,0,0,0.1)'
                }
            },
            x: {
                grid: {
                    display: false
                }
            }
        }
    }
});
</script>
@endsection
