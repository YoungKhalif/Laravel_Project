@extends('layouts.app')

@section('title', 'Admin Reports - EventSmart')

@section('content')
<div class="container-fluid px-4 py-5">
    <!-- Header -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="h3 fw-bold mb-1">Analytics & Reports</h1>
                    <p class="text-muted mb-0">Comprehensive insights into platform performance</p>
                </div>
                <div>
                    <button class="btn btn-outline-primary" onclick="exportReports()">
                        <i class="fas fa-download me-2"></i>Export All Reports
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Stats -->
    <div class="row g-4 mb-5">
        <div class="col-lg-3 col-md-6">
            <div class="card border-0 shadow-sm">
                <div class="card-body text-center">
                    <div class="bg-primary text-white rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center"
                         style="width: 60px; height: 60px;">
                        <i class="fas fa-calendar fa-lg"></i>
                    </div>
                    <h3 class="fw-bold mb-1">{{ \App\Models\Event::count() }}</h3>
                    <p class="text-muted mb-0">Total Events</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card border-0 shadow-sm">
                <div class="card-body text-center">
                    <div class="bg-success text-white rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center"
                         style="width: 60px; height: 60px;">
                        <i class="fas fa-ticket-alt fa-lg"></i>
                    </div>
                    <h3 class="fw-bold mb-1">{{ \App\Models\Ticket::where('status', 'confirmed')->count() }}</h3>
                    <p class="text-muted mb-0">Tickets Sold</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card border-0 shadow-sm">
                <div class="card-body text-center">
                    <div class="bg-info text-white rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center"
                         style="width: 60px; height: 60px;">
                        <i class="fas fa-building fa-lg"></i>
                    </div>
                    <h3 class="fw-bold mb-1">{{ \App\Models\Company::where('is_verified', true)->count() }}</h3>
                    <p class="text-muted mb-0">Verified Companies</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card border-0 shadow-sm">
                <div class="card-body text-center">
                    <div class="bg-warning text-white rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center"
                         style="width: 60px; height: 60px;">
                        <i class="fas fa-dollar-sign fa-lg"></i>
                    </div>
                    <h3 class="fw-bold mb-1">${{ number_format(\App\Models\Ticket::where('status', 'confirmed')->sum('price'), 0) }}</h3>
                    <p class="text-muted mb-0">Total Revenue</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Report Forms -->
    <div class="row g-4">
        <!-- Event Report -->
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-light border-0">
                    <h5 class="mb-0">
                        <i class="fas fa-chart-bar text-primary me-2"></i>Event Report
                    </h5>
                </div>
                <div class="card-body">
                    <p class="text-muted mb-3">Generate detailed analytics for a specific event including attendance, sales, and revenue.</p>
                    
                    <form method="POST" action="{{ route('admin.reports.event') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="event_id" class="form-label">Select Event</label>
                            <select class="form-select" id="event_id" name="event_id" required>
                                <option value="">Choose an event...</option>
                                @foreach(\App\Models\Event::with('company')->orderBy('created_at', 'desc')->get() as $event)
                                    <option value="{{ $event->id }}">
                                        {{ $event->title }} ({{ $event->company->name }})
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        
                        <button type="submit" class="btn btn-primary w-100">
                            <i class="fas fa-chart-line me-2"></i>Generate Report
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Company Report -->
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-light border-0">
                    <h5 class="mb-0">
                        <i class="fas fa-building text-success me-2"></i>Company Report
                    </h5>
                </div>
                <div class="card-body">
                    <p class="text-muted mb-3">View comprehensive statistics for event organizers including all their events and performance metrics.</p>
                    
                    <form method="POST" action="{{ route('admin.reports.company') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="company_id" class="form-label">Select Company</label>
                            <select class="form-select" id="company_id" name="company_id" required>
                                <option value="">Choose a company...</option>
                                @foreach(\App\Models\Company::orderBy('name')->get() as $company)
                                    <option value="{{ $company->id }}">
                                        {{ $company->name }}
                                        @if($company->is_verified)
                                            ✓
                                        @endif
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        
                        <button type="submit" class="btn btn-success w-100">
                            <i class="fas fa-chart-pie me-2"></i>Generate Report
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Attendance Report -->
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-light border-0">
                    <h5 class="mb-0">
                        <i class="fas fa-users text-info me-2"></i>Attendance Report
                    </h5>
                </div>
                <div class="card-body">
                    <p class="text-muted mb-3">Track real-time attendance data with check-in times and patterns for any event.</p>
                    
                    <form method="POST" action="{{ route('admin.reports.attendance') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="attendance_event_id" class="form-label">Select Event</label>
                            <select class="form-select" id="attendance_event_id" name="event_id" required>
                                <option value="">Choose an event...</option>
                                @foreach(\App\Models\Event::with('company')->where('start_date', '>=', now()->subDays(30))->orderBy('start_date', 'desc')->get() as $event)
                                    <option value="{{ $event->id }}">
                                        {{ $event->title }} - {{ $event->start_date->format('M d, Y') }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        
                        <button type="submit" class="btn btn-info w-100">
                            <i class="fas fa-clipboard-check me-2"></i>Generate Report
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Activity -->
    <div class="row mt-5">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-light border-0">
                    <h5 class="mb-0">
                        <i class="fas fa-clock text-primary me-2"></i>Recent Platform Activity
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- Recent Events -->
                        <div class="col-md-6">
                            <h6 class="text-muted mb-3">Latest Events</h6>
                            @foreach(\App\Models\Event::with('company')->orderBy('created_at', 'desc')->take(5)->get() as $event)
                                <div class="d-flex align-items-center mb-3">
                                    <div class="bg-primary text-white rounded-circle me-3 d-flex align-items-center justify-content-center"
                                         style="width: 40px; height: 40px;">
                                        <i class="fas fa-calendar"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="mb-1">{{ $event->title }}</h6>
                                        <small class="text-muted">{{ $event->company->name }} • {{ $event->created_at->diffForHumans() }}</small>
                                    </div>
                                    <a href="{{ route('events.show', $event) }}" class="btn btn-outline-primary btn-sm">
                                        View
                                    </a>
                                </div>
                            @endforeach
                        </div>

                        <!-- Recent Tickets -->
                        <div class="col-md-6">
                            <h6 class="text-muted mb-3">Recent Ticket Sales</h6>
                            @foreach(\App\Models\Ticket::with(['event', 'user'])->where('status', 'confirmed')->orderBy('created_at', 'desc')->take(5)->get() as $ticket)
                                <div class="d-flex align-items-center mb-3">
                                    <div class="bg-success text-white rounded-circle me-3 d-flex align-items-center justify-content-center"
                                         style="width: 40px; height: 40px;">
                                        <i class="fas fa-ticket-alt"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="mb-1">${{ number_format($ticket->price, 2) }}</h6>
                                        <small class="text-muted">{{ $ticket->event->title }} • {{ $ticket->purchased_at->diffForHumans() }}</small>
                                    </div>
                                    <span class="badge bg-success">Paid</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts Section -->
    <div class="row mt-5">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-light border-0">
                    <h5 class="mb-0">
                        <i class="fas fa-chart-area text-primary me-2"></i>Monthly Revenue Trend
                    </h5>
                </div>
                <div class="card-body">
                    <canvas id="revenueChart" height="100"></canvas>
                </div>
            </div>
        </div>
        
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-light border-0">
                    <h5 class="mb-0">
                        <i class="fas fa-chart-pie text-success me-2"></i>Event Categories
                    </h5>
                </div>
                <div class="card-body">
                    <canvas id="categoryChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Revenue Chart
    const revenueCtx = document.getElementById('revenueChart').getContext('2d');
    new Chart(revenueCtx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            datasets: [{
                label: 'Revenue ($)',
                data: [12000, 19000, 15000, 25000, 22000, 30000, 28000, 35000, 32000, 40000, 38000, 45000],
                borderColor: 'rgb(75, 192, 192)',
                backgroundColor: 'rgba(75, 192, 192, 0.1)',
                tension: 0.1,
                fill: true
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
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
            labels: ['Technology', 'Business', 'Arts', 'Music', 'Sports', 'Education'],
            datasets: [{
                data: [30, 25, 20, 15, 7, 3],
                backgroundColor: [
                    '#FF6384',
                    '#36A2EB',
                    '#FFCE56',
                    '#4BC0C0',
                    '#9966FF',
                    '#FF9F40'
                ]
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            plugins: {
                legend: {
                    position: 'bottom'
                }
            }
        }
    });
});

function exportReports() {
    // Implementation for exporting all reports
    alert('Exporting all reports... This feature will be implemented.');
}
</script>
@endpush
