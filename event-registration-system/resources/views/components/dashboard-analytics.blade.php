{{-- Dashboard Analytics Cards Component --}}

<div class="dashboard-analytics mb-5">
    <div class="row g-4">
        <!-- Stat Card 1: Upcoming Events -->
        <div class="col-lg-3 col-md-6">
            <div class="card dashboard-card border-0 rounded-4 shadow-sm h-100 hover-lift" data-aos="fade-up" data-aos-delay="100">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div class="icon-wrapper rounded-4 bg-primary-light p-3">
                            <i class="fas fa-calendar-day text-primary fs-4"></i>
                        </div>
                        <div>
                            <h3 class="fw-bold mb-0 counter">{{ $stats['upcoming_events'] ?? 0 }}</h3>
                        </div>
                    </div>
                    <h5 class="card-title fw-bold">Upcoming Events</h5>
                    <p class="text-muted small mb-0">Events you're registered for</p>

                    <!-- Progress bar indicating how many events are approaching -->
                    <div class="progress mt-3" style="height: 6px;">
                        <div class="progress-bar bg-primary" role="progressbar"
                            style="width: {{ min(($stats['upcoming_events'] ?? 0) * 10, 100) }}%;"
                            aria-valuenow="{{ min(($stats['upcoming_events'] ?? 0) * 10, 100) }}"
                            aria-valuemin="0"
                            aria-valuemax="100"></div>
                    </div>
                </div>
                <div class="card-footer bg-transparent border-0 pt-0 pb-3 px-4">
                    <a href="{{ route('tickets.index') }}" class="btn btn-link text-primary p-0 fw-medium">
                        View all <i class="fas fa-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Stat Card 2: Active Tickets -->
        <div class="col-lg-3 col-md-6">
            <div class="card dashboard-card border-0 rounded-4 shadow-sm h-100 hover-lift" data-aos="fade-up" data-aos-delay="200">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div class="icon-wrapper rounded-4 bg-success-light p-3">
                            <i class="fas fa-ticket-alt text-success fs-4"></i>
                        </div>
                        <div>
                            <h3 class="fw-bold mb-0 counter">{{ $stats['active_tickets'] ?? 0 }}</h3>
                        </div>
                    </div>
                    <h5 class="card-title fw-bold">Active Tickets</h5>
                    <p class="text-muted small mb-0">Valid tickets for future events</p>

                    <!-- Progress bar for tickets -->
                    <div class="progress mt-3" style="height: 6px;">
                        <div class="progress-bar bg-success" role="progressbar"
                            style="width: {{ min(($stats['active_tickets'] ?? 0) * 10, 100) }}%;"
                            aria-valuenow="{{ min(($stats['active_tickets'] ?? 0) * 10, 100) }}"
                            aria-valuemin="0"
                            aria-valuemax="100"></div>
                    </div>
                </div>
                <div class="card-footer bg-transparent border-0 pt-0 pb-3 px-4">
                    <a href="{{ route('tickets.index') }}" class="btn btn-link text-success p-0 fw-medium">
                        Manage tickets <i class="fas fa-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Stat Card 3: Past Events -->
        <div class="col-lg-3 col-md-6">
            <div class="card dashboard-card border-0 rounded-4 shadow-sm h-100 hover-lift" data-aos="fade-up" data-aos-delay="300">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div class="icon-wrapper rounded-4 bg-info-light p-3">
                            <i class="fas fa-history text-info fs-4"></i>
                        </div>
                        <div>
                            <h3 class="fw-bold mb-0 counter">{{ $stats['past_events'] ?? 0 }}</h3>
                        </div>
                    </div>
                    <h5 class="card-title fw-bold">Past Events</h5>
                    <p class="text-muted small mb-0">Events you've attended</p>

                    <!-- Progress bar for past events -->
                    <div class="progress mt-3" style="height: 6px;">
                        <div class="progress-bar bg-info" role="progressbar"
                            style="width: {{ min(($stats['past_events'] ?? 0) * 5, 100) }}%;"
                            aria-valuenow="{{ min(($stats['past_events'] ?? 0) * 5, 100) }}"
                            aria-valuemin="0"
                            aria-valuemax="100"></div>
                    </div>
                </div>
                <div class="card-footer bg-transparent border-0 pt-0 pb-3 px-4">
                    <a href="{{ route('events.past') }}" class="btn btn-link text-info p-0 fw-medium">
                        View history <i class="fas fa-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Stat Card 4: Total Spent or Rewards -->
        <div class="col-lg-3 col-md-6">
            <div class="card dashboard-card border-0 rounded-4 shadow-sm h-100 hover-lift" data-aos="fade-up" data-aos-delay="400">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div class="icon-wrapper rounded-4 bg-warning-light p-3">
                            <i class="fas fa-star text-warning fs-4"></i>
                        </div>
                        <div>
                            <h3 class="fw-bold mb-0"><span class="counter">{{ $stats['reward_points'] ?? 0 }}</span></h3>
                        </div>
                    </div>
                    <h5 class="card-title fw-bold">Reward Points</h5>
                    <p class="text-muted small mb-0">Points earned from purchases</p>

                    <!-- Progress bar for rewards -->
                    <div class="progress mt-3" style="height: 6px;">
                        <div class="progress-bar bg-warning" role="progressbar"
                            style="width: {{ min((($stats['reward_points'] ?? 0) / 100), 100) }}%;"
                            aria-valuenow="{{ min((($stats['reward_points'] ?? 0) / 100), 100) }}"
                            aria-valuemin="0"
                            aria-valuemax="100"></div>
                    </div>
                </div>
                <div class="card-footer bg-transparent border-0 pt-0 pb-3 px-4">
                    <a href="{{ route('rewards') }}" class="btn btn-link text-warning p-0 fw-medium">
                        Use points <i class="fas fa-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Upcoming Events Chart -->
<div class="row mb-5">
    <div class="col-lg-8 mb-4 mb-lg-0">
        <div class="card border-0 rounded-4 shadow-sm" data-aos="fade-up" data-aos-delay="100">
            <div class="card-header bg-white p-4 border-bottom-0">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="fw-bold mb-0">Your Upcoming Events</h5>
                    <div class="dropdown">
                        <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                            <i class="fas fa-calendar-alt me-1"></i> Last 30 days
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="#">Last 7 days</a></li>
                            <li><a class="dropdown-item" href="#">Last 30 days</a></li>
                            <li><a class="dropdown-item" href="#">Last 3 months</a></li>
                            <li><a class="dropdown-item" href="#">Last year</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card-body p-4 pt-0">
                <div class="chart-container" style="position: relative; height:300px;">
                    <canvas id="upcomingEventsChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card border-0 rounded-4 shadow-sm h-100" data-aos="fade-up" data-aos-delay="200">
            <div class="card-header bg-white p-4 border-bottom-0">
                <h5 class="fw-bold mb-0">Event Categories</h5>
            </div>
            <div class="card-body p-4 pt-0">
                <div class="chart-container" style="position: relative; height:300px;">
                    <canvas id="eventCategoriesChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Next Event Highlight -->
@if(isset($nextEvent) && $nextEvent)
<div class="next-event-card mb-5" data-aos="fade-up" data-aos-delay="100">
    <div class="card border-0 rounded-4 shadow-sm overflow-hidden">
        <div class="card-body p-0">
            <div class="row g-0">
                <div class="col-md-4">
                    <div class="next-event-img" style="background-image: url('{{ $nextEvent->image ? asset('storage/' . $nextEvent->image) : 'https://images.unsplash.com/photo-1501281668745-f7f57925c3b4?ixlib=rb-4.0.3&auto=format&fit=crop&w=1740&q=80' }}');">
                        <div class="overlay d-flex align-items-center justify-content-center">
                            <div class="countdown-timer" data-event-date="{{ $nextEvent->start_date }}">
                                <div class="d-flex justify-content-center gap-3">
                                    <div class="time-block">
                                        <span class="time days">00</span>
                                        <span class="label">Days</span>
                                    </div>
                                    <div class="time-block">
                                        <span class="time hours">00</span>
                                        <span class="label">Hours</span>
                                    </div>
                                    <div class="time-block">
                                        <span class="time minutes">00</span>
                                        <span class="label">Mins</span>
                                    </div>
                                    <div class="time-block">
                                        <span class="time seconds">00</span>
                                        <span class="label">Secs</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="p-4 p-md-5">
                        <div class="d-flex align-items-center mb-3">
                            <span class="badge bg-primary me-2">Next Event</span>
                            <span class="text-muted small">{{ $nextEvent->start_date->format('l, F j, Y') }}</span>
                        </div>
                        <h4 class="fw-bold mb-3">{{ $nextEvent->title }}</h4>
                        <div class="d-flex align-items-center mb-4">
                            <div class="me-4">
                                <i class="fas fa-map-marker-alt text-primary me-2"></i>
                                <span>{{ $nextEvent->location }}</span>
                            </div>
                            <div>
                                <i class="fas fa-clock text-primary me-2"></i>
                                <span>{{ $nextEvent->start_time->format('g:i A') }}</span>
                            </div>
                        </div>
                        <p class="mb-4">{{ \Illuminate\Support\Str::limit($nextEvent->description, 150) }}</p>
                        <div class="d-flex align-items-center justify-content-between">
                            <a href="{{ route('events.show', $nextEvent) }}" class="btn btn-primary">
                                <i class="fas fa-info-circle me-2"></i> Event Details
                            </a>
                            <a href="#" class="btn btn-outline-secondary ms-2">
                                <i class="fas fa-calendar-alt me-2"></i> Add to Calendar
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

@push('styles')
<style>
    /* Dashboard cards styling */
    .dashboard-card {
        transition: all 0.3s ease;
        border-radius: 16px;
        overflow: hidden;
        height: 100%;
    }

    .hover-lift:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.08) !important;
    }

    .icon-wrapper {
        width: 56px;
        height: 56px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
    }

    .dashboard-card:hover .icon-wrapper {
        transform: scale(1.1);
    }

    .bg-primary-light { background-color: rgba(59, 130, 246, 0.1); }
    .bg-success-light { background-color: rgba(16, 185, 129, 0.1); }
    .bg-info-light { background-color: rgba(6, 182, 212, 0.1); }
    .bg-warning-light { background-color: rgba(245, 158, 11, 0.1); }

    /* Counter animation */
    .counter {
        animation: countUp 2s ease-out;
    }

    @keyframes countUp {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    /* Next event card styling */
    .next-event-img {
        height: 100%;
        min-height: 250px;
        background-size: cover;
        background-position: center;
        position: relative;
    }

    .next-event-img .overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        backdrop-filter: blur(3px);
    }

    .countdown-timer {
        color: white;
        text-align: center;
    }

    .time-block {
        background: rgba(255, 255, 255, 0.2);
        backdrop-filter: blur(5px);
        border-radius: 10px;
        padding: 10px;
        min-width: 70px;
        text-align: center;
    }

    .time-block .time {
        font-size: 1.5rem;
        font-weight: bold;
        display: block;
    }

    .time-block .label {
        font-size: 0.75rem;
        text-transform: uppercase;
        display: block;
    }

    /* Chart container */
    .chart-container {
        width: 100%;
    }

    @media (max-width: 767px) {
        .next-event-img {
            min-height: 200px;
        }
    }
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize countdown timer for next event
    const countdownElements = document.querySelectorAll('.countdown-timer');
    countdownElements.forEach(element => {
        const eventDate = new Date(element.dataset.eventDate);

        function updateCountdown() {
            const now = new Date();
            const diff = eventDate - now;

            if (diff <= 0) {
                element.innerHTML = '<div class="alert alert-info mb-0">Event has started!</div>';
                return;
            }

            const days = Math.floor(diff / (1000 * 60 * 60 * 24));
            const hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((diff % (1000 * 60)) / 1000);

            element.querySelector('.days').innerHTML = days.toString().padStart(2, '0');
            element.querySelector('.hours').innerHTML = hours.toString().padStart(2, '0');
            element.querySelector('.minutes').innerHTML = minutes.toString().padStart(2, '0');
            element.querySelector('.seconds').innerHTML = seconds.toString().padStart(2, '0');
        }

        updateCountdown();
        setInterval(updateCountdown, 1000);
    });

    // Upcoming Events Chart
    if (document.getElementById('upcomingEventsChart')) {
        const ctx = document.getElementById('upcomingEventsChart').getContext('2d');

        const gradient = ctx.createLinearGradient(0, 0, 0, 300);
        gradient.addColorStop(0, 'rgba(59, 130, 246, 0.6)');
        gradient.addColorStop(1, 'rgba(59, 130, 246, 0)');

        // Sample data - replace with actual data from your backend
        const labels = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        const data = {
            labels: labels,
            datasets: [{
                label: 'Events',
                data: {{ json_encode($monthlyEvents ?? [0, 1, 0, 2, 1, 3, 0, 2, 1, 0, 1, 3]) }},
                backgroundColor: gradient,
                borderColor: '#3b82f6',
                borderWidth: 2,
                pointBackgroundColor: '#ffffff',
                pointBorderColor: '#3b82f6',
                pointBorderWidth: 2,
                pointRadius: 4,
                tension: 0.4,
                fill: true
            }]
        };

        new Chart(ctx, {
            type: 'line',
            data: data,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            display: true,
                            color: 'rgba(0, 0, 0, 0.05)'
                        },
                        ticks: {
                            stepSize: 1
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
                        display: false
                    },
                    tooltip: {
                        backgroundColor: 'rgba(255, 255, 255, 0.9)',
                        titleColor: '#333',
                        bodyColor: '#666',
                        bodyFont: {
                            size: 12
                        },
                        titleFont: {
                            size: 14,
                            weight: 'bold'
                        },
                        padding: 12,
                        borderWidth: 1,
                        borderColor: 'rgba(0, 0, 0, 0.1)',
                        displayColors: false
                    }
                }
            }
        });
    }

    // Event Categories Chart
    if (document.getElementById('eventCategoriesChart')) {
        const ctx = document.getElementById('eventCategoriesChart').getContext('2d');

        // Sample data - replace with actual data from your backend
        const data = {
            labels: ['Music', 'Business', 'Tech', 'Sports', 'Arts'],
            datasets: [{
                data: {{ json_encode($categoryBreakdown ?? [30, 20, 25, 15, 10]) }},
                backgroundColor: [
                    '#3b82f6',  // Primary blue
                    '#10b981',  // Success green
                    '#6366f1',  // Indigo
                    '#f59e0b',  // Warning yellow
                    '#ef4444'   // Danger red
                ],
                borderWidth: 2,
                borderColor: '#ffffff'
            }]
        };

        new Chart(ctx, {
            type: 'doughnut',
            data: data,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                cutout: '65%',
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            padding: 20,
                            boxWidth: 12,
                            usePointStyle: true,
                            pointStyle: 'circle'
                        }
                    },
                    tooltip: {
                        backgroundColor: 'rgba(255, 255, 255, 0.9)',
                        titleColor: '#333',
                        bodyColor: '#666',
                        bodyFont: {
                            size: 12
                        },
                        titleFont: {
                            size: 14,
                            weight: 'bold'
                        },
                        padding: 12,
                        borderWidth: 1,
                        borderColor: 'rgba(0, 0, 0, 0.1)',
                        displayColors: false
                    }
                }
            }
        });
    }
});
</script>
@endpush
