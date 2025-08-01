@extends('layouts.app')

<<<<<<< HEAD
@section('title', 'My Tickets - EventPro')

@section('content')
<section class="py-5">
    <div class="container py-4">
        <h2 class="fw-bold mb-4">My Tickets</h2>

        @if($registrations->isEmpty())
            <div class="card border-0 shadow-sm text-center py-5">
                <div class="card-body">
                    <i class="fas fa-ticket-alt text-muted mb-3" style="font-size: 3rem;"></i>
                    <h3 class="mb-3">No Tickets Yet</h3>
                    <p class="text-muted mb-4">You haven't purchased any tickets yet. Find exciting events and get your tickets now!</p>
                    <a href="{{ route('events.index') }}" class="btn btn-primary-custom px-4">Browse Events</a>
                </div>
            </div>
        @else
            <div class="row">
                <div class="col-lg-8">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-0">
                            <div class="list-group list-group-flush">
                                @foreach($registrations as $registration)
                                    <div class="list-group-item border-0 p-0">
                                        <div class="d-flex p-3 border-start border-5 {{ $registration->event->start_date >= now() ? 'border-primary' : 'border-secondary' }} mb-2">
                                            <div class="flex-shrink-0 me-3">
                                                @if($registration->event->image)
                                                    <img src="{{ asset('storage/' . $registration->event->image) }}" alt="{{ $registration->event->title }}" class="rounded" width="100" height="100" style="object-fit: cover;">
                                                @else
                                                    <div class="bg-light rounded d-flex align-items-center justify-content-center" style="width: 100px; height: 100px;">
                                                        <i class="fas fa-calendar-alt text-muted" style="font-size: 2rem;"></i>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="flex-grow-1">
                                                <div class="d-flex justify-content-between align-items-start">
                                                    <div>
                                                        <h5 class="mb-1">{{ $registration->event->title }}</h5>
                                                        <div class="mb-2 text-muted">
                                                            <i class="fas fa-calendar me-1"></i>
                                                            {{ date('F j, Y', strtotime($registration->event->start_date)) }}
                                                            <i class="fas fa-clock ms-2 me-1"></i>
                                                            {{ date('g:i A', strtotime($registration->event->start_time)) }}
                                                        </div>
                                                        <div class="mb-1 text-muted">
                                                            <i class="fas fa-map-marker-alt me-1"></i>
                                                            {{ $registration->event->location }}
                                                        </div>
                                                    </div>
                                                    <span class="badge {{ $registration->payment_status == 'paid' ? 'bg-success' : 'bg-warning' }}">
                                                        {{ ucfirst($registration->payment_status) }}
                                                    </span>
                                                </div>
                                                <div class="d-flex justify-content-between mt-3">
                                                    <div>
                                                        <span class="text-muted">Order #: {{ $registration->registration_number }}</span>
                                                    </div>
                                                    <div>
                                                        <a href="{{ route('tickets.show', $registration->id) }}" class="btn btn-sm btn-outline-primary">View Ticket</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="mt-4">
                        {{ $registrations->links() }}
                    </div>
                </div>

                <div class="col-lg-4 mt-4 mt-lg-0">
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-body p-4">
                            <h5 class="fw-bold mb-3">Ticket Information</h5>
                            <p class="text-muted mb-3">Your tickets provide you with access to the events you've registered for. Keep your ticket information secure and easily accessible.</p>

                            <div class="d-flex align-items-center mb-3">
                                <div class="icon-box bg-light rounded-circle me-3">
                                    <i class="fas fa-qrcode text-primary"></i>
                                </div>
                                <div>
                                    <h6 class="mb-1">QR Code Tickets</h6>
                                    <p class="text-muted small mb-0">Each ticket has a unique QR code for event entry</p>
                                </div>
                            </div>

                            <div class="d-flex align-items-center mb-3">
                                <div class="icon-box bg-light rounded-circle me-3">
                                    <i class="fas fa-mobile-alt text-primary"></i>
                                </div>
                                <div>
                                    <h6 class="mb-1">Mobile Ready</h6>
                                    <p class="text-muted small mb-0">Show your tickets on your phone for easy access</p>
                                </div>
                            </div>

                            <div class="d-flex align-items-center">
                                <div class="icon-box bg-light rounded-circle me-3">
                                    <i class="fas fa-print text-primary"></i>
                                </div>
                                <div>
                                    <h6 class="mb-1">Printable</h6>
                                    <p class="text-muted small mb-0">Download and print your tickets if preferred</p>
=======
@section('title', 'My Tickets - EventSmart')

@section('content')
<div class="container py-5">
    <div class="row">
        <!-- Page Header -->
        <div class="col-12 mb-4">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h2 class="mb-1">My Tickets</h2>
                    <p class="text-muted mb-0">Manage your event tickets and bookings</p>
                </div>
                <div>
                    <button class="btn btn-outline-primary me-2" onclick="downloadAllTickets()">
                        <i class="fas fa-download me-2"></i>Download All
                    </button>
                    <a href="/events" class="btn btn-gradient">
                        <i class="fas fa-plus me-2"></i>Book New Event
                    </a>
                </div>
            </div>
        </div>

        <!-- Filters -->
        <div class="col-12 mb-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-3">
                    <div class="row g-3 align-items-center">
                        <div class="col-md-3">
                            <select class="form-select" id="statusFilter">
                                <option value="">All Statuses</option>
                                <option value="upcoming">Upcoming</option>
                                <option value="completed">Completed</option>
                                <option value="cancelled">Cancelled</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select class="form-select" id="dateFilter">
                                <option value="">All Dates</option>
                                <option value="this_week">This Week</option>
                                <option value="this_month">This Month</option>
                                <option value="next_month">Next Month</option>
                                <option value="past">Past Events</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fas fa-search"></i>
                                </span>
                                <input type="text" class="form-control" placeholder="Search events..." id="searchInput">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-outline-secondary w-100" onclick="clearFilters()">
                                <i class="fas fa-times me-1"></i>Clear
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tickets List -->
        <div class="col-12">
            <div id="ticketsList">
                <!-- Upcoming Event -->
                <div class="card border-0 shadow-sm mb-4 ticket-card" data-status="upcoming" data-date="2024-03-15">
                    <div class="card-body p-4">
                        <div class="row align-items-center">
                            <div class="col-md-2">
                                <img src="https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=120&h=80&fit=crop"
                                     class="img-fluid rounded" alt="Event">
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-start justify-content-between mb-2">
                                    <h5 class="mb-1">Tech Conference 2024</h5>
                                    <span class="badge bg-primary">Upcoming</span>
                                </div>
                                <p class="text-muted mb-2">The biggest technology conference of the year</p>
                                <div class="row g-2 text-sm">
                                    <div class="col-md-6">
                                        <i class="fas fa-calendar text-primary me-1"></i>
                                        <span>March 15, 2024</span>
                                    </div>
                                    <div class="col-md-6">
                                        <i class="fas fa-clock text-primary me-1"></i>
                                        <span>10:00 AM - 6:00 PM</span>
                                    </div>
                                    <div class="col-md-12">
                                        <i class="fas fa-map-marker-alt text-primary me-1"></i>
                                        <span>Convention Center, New York</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 text-center">
                                <div class="mb-2">
                                    <div class="badge bg-light text-dark border">2 Tickets</div>
                                </div>
                                <p class="text-muted mb-1 small">Confirmation</p>
                                <p class="font-monospace small">#TC-2024-001234</p>
                            </div>
                            <div class="col-md-2 text-end">
                                <div class="dropdown">
                                    <button class="btn btn-outline-secondary btn-sm dropdown-toggle" type="button"
                                            data-bs-toggle="dropdown">
                                        Actions
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item" href="#" onclick="viewTickets('TC-2024-001234')">
                                                <i class="fas fa-eye me-2"></i>View Tickets
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#" onclick="downloadTickets('TC-2024-001234')">
                                                <i class="fas fa-download me-2"></i>Download
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#" onclick="emailTickets('TC-2024-001234')">
                                                <i class="fas fa-envelope me-2"></i>Email
                                            </a>
                                        </li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li>
                                            <a class="dropdown-item text-danger" href="#" onclick="cancelBooking('TC-2024-001234')">
                                                <i class="fas fa-times me-2"></i>Cancel Booking
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Another Upcoming Event -->
                <div class="card border-0 shadow-sm mb-4 ticket-card" data-status="upcoming" data-date="2024-03-22">
                    <div class="card-body p-4">
                        <div class="row align-items-center">
                            <div class="col-md-2">
                                <img src="https://images.unsplash.com/photo-1515187029135-18ee286d815b?w=120&h=80&fit=crop"
                                     class="img-fluid rounded" alt="Event">
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-start justify-content-between mb-2">
                                    <h5 class="mb-1">Digital Marketing Summit</h5>
                                    <span class="badge bg-primary">Upcoming</span>
                                </div>
                                <p class="text-muted mb-2">Learn the latest digital marketing strategies</p>
                                <div class="row g-2 text-sm">
                                    <div class="col-md-6">
                                        <i class="fas fa-calendar text-primary me-1"></i>
                                        <span>March 22, 2024</span>
                                    </div>
                                    <div class="col-md-6">
                                        <i class="fas fa-clock text-primary me-1"></i>
                                        <span>9:00 AM - 5:00 PM</span>
                                    </div>
                                    <div class="col-md-12">
                                        <i class="fas fa-map-marker-alt text-primary me-1"></i>
                                        <span>Business Center, Los Angeles</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 text-center">
                                <div class="mb-2">
                                    <div class="badge bg-light text-dark border">1 Ticket</div>
                                </div>
                                <p class="text-muted mb-1 small">Confirmation</p>
                                <p class="font-monospace small">#DM-2024-005678</p>
                            </div>
                            <div class="col-md-2 text-end">
                                <div class="dropdown">
                                    <button class="btn btn-outline-secondary btn-sm dropdown-toggle" type="button"
                                            data-bs-toggle="dropdown">
                                        Actions
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item" href="#" onclick="viewTickets('DM-2024-005678')">
                                                <i class="fas fa-eye me-2"></i>View Tickets
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#" onclick="downloadTickets('DM-2024-005678')">
                                                <i class="fas fa-download me-2"></i>Download
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#" onclick="emailTickets('DM-2024-005678')">
                                                <i class="fas fa-envelope me-2"></i>Email
                                            </a>
                                        </li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li>
                                            <a class="dropdown-item text-danger" href="#" onclick="cancelBooking('DM-2024-005678')">
                                                <i class="fas fa-times me-2"></i>Cancel Booking
                                            </a>
                                        </li>
                                    </ul>
>>>>>>> 8a996aa7d56b8b38ce7291c226b99d292509af77
                                </div>
                            </div>
                        </div>
                    </div>
<<<<<<< HEAD

                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-4">
                            <h5 class="fw-bold mb-3">Need Help?</h5>
                            <p class="text-muted mb-3">Having issues with your tickets or need to make changes to your registration?</p>
                            <a href="#" class="btn btn-outline-primary d-block">Contact Support</a>
=======
                </div>

                <!-- Past Event -->
                <div class="card border-0 shadow-sm mb-4 ticket-card" data-status="completed" data-date="2024-02-10">
                    <div class="card-body p-4">
                        <div class="row align-items-center">
                            <div class="col-md-2">
                                <img src="https://images.unsplash.com/photo-1591115765373-5207764f72e7?w=120&h=80&fit=crop"
                                     class="img-fluid rounded" alt="Event">
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-start justify-content-between mb-2">
                                    <h5 class="mb-1">Startup Networking Event</h5>
                                    <span class="badge bg-success">Completed</span>
                                </div>
                                <p class="text-muted mb-2">Connect with fellow entrepreneurs</p>
                                <div class="row g-2 text-sm">
                                    <div class="col-md-6">
                                        <i class="fas fa-calendar text-primary me-1"></i>
                                        <span>February 10, 2024</span>
                                    </div>
                                    <div class="col-md-6">
                                        <i class="fas fa-clock text-primary me-1"></i>
                                        <span>6:00 PM - 9:00 PM</span>
                                    </div>
                                    <div class="col-md-12">
                                        <i class="fas fa-map-marker-alt text-primary me-1"></i>
                                        <span>Innovation Hub, San Francisco</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 text-center">
                                <div class="mb-2">
                                    <div class="badge bg-light text-dark border">1 Ticket</div>
                                </div>
                                <p class="text-muted mb-1 small">Confirmation</p>
                                <p class="font-monospace small">#SN-2024-009876</p>
                            </div>
                            <div class="col-md-2 text-end">
                                <div class="dropdown">
                                    <button class="btn btn-outline-secondary btn-sm dropdown-toggle" type="button"
                                            data-bs-toggle="dropdown">
                                        Actions
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item" href="#" onclick="viewTickets('SN-2024-009876')">
                                                <i class="fas fa-eye me-2"></i>View Tickets
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#" onclick="downloadTickets('SN-2024-009876')">
                                                <i class="fas fa-download me-2"></i>Download
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#" onclick="rateEvent('SN-2024-009876')">
                                                <i class="fas fa-star me-2"></i>Rate Event
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Cancelled Event -->
                <div class="card border-0 shadow-sm mb-4 ticket-card" data-status="cancelled" data-date="2024-02-28">
                    <div class="card-body p-4 opacity-75">
                        <div class="row align-items-center">
                            <div class="col-md-2">
                                <img src="https://images.unsplash.com/photo-1556761175-b413da4baf72?w=120&h=80&fit=crop"
                                     class="img-fluid rounded" alt="Event">
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-start justify-content-between mb-2">
                                    <h5 class="mb-1">Web Development Bootcamp</h5>
                                    <span class="badge bg-danger">Cancelled</span>
                                </div>
                                <p class="text-muted mb-2">Intensive coding bootcamp - Refunded</p>
                                <div class="row g-2 text-sm">
                                    <div class="col-md-6">
                                        <i class="fas fa-calendar text-primary me-1"></i>
                                        <span>February 28, 2024</span>
                                    </div>
                                    <div class="col-md-6">
                                        <i class="fas fa-clock text-primary me-1"></i>
                                        <span>9:00 AM - 5:00 PM</span>
                                    </div>
                                    <div class="col-md-12">
                                        <i class="fas fa-map-marker-alt text-primary me-1"></i>
                                        <span>Tech Campus, Chicago</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 text-center">
                                <div class="mb-2">
                                    <div class="badge bg-light text-dark border">1 Ticket</div>
                                </div>
                                <p class="text-muted mb-1 small">Confirmation</p>
                                <p class="font-monospace small">#WD-2024-123456</p>
                            </div>
                            <div class="col-md-2 text-end">
                                <div class="dropdown">
                                    <button class="btn btn-outline-secondary btn-sm dropdown-toggle" type="button"
                                            data-bs-toggle="dropdown">
                                        Actions
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item" href="#" onclick="viewRefund('WD-2024-123456')">
                                                <i class="fas fa-receipt me-2"></i>View Refund
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
>>>>>>> 8a996aa7d56b8b38ce7291c226b99d292509af77
                        </div>
                    </div>
                </div>
            </div>
<<<<<<< HEAD
        @endif
    </div>
</section>
@endsection

@push('styles')
<style>
    .icon-box {
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
</style>
@endpush
=======

            <!-- Empty State -->
            <div id="emptyState" class="text-center py-5" style="display: none;">
                <i class="fas fa-ticket-alt fa-3x text-muted mb-3"></i>
                <h5 class="text-muted">No tickets found</h5>
                <p class="text-muted mb-4">You haven't booked any events yet or no results match your filters.</p>
                <a href="/events" class="btn btn-gradient">
                    <i class="fas fa-plus me-2"></i>Browse Events
                </a>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const statusFilter = document.getElementById('statusFilter');
    const dateFilter = document.getElementById('dateFilter');
    const searchInput = document.getElementById('searchInput');

    // Filter functionality
    function filterTickets() {
        const statusValue = statusFilter.value;
        const dateValue = dateFilter.value;
        const searchValue = searchInput.value.toLowerCase();
        const ticketCards = document.querySelectorAll('.ticket-card');
        let visibleCount = 0;

        ticketCards.forEach(card => {
            let show = true;

            // Status filter
            if (statusValue && card.dataset.status !== statusValue) {
                show = false;
            }

            // Date filter
            if (dateValue && !matchesDateFilter(card.dataset.date, dateValue)) {
                show = false;
            }

            // Search filter
            if (searchValue && !card.textContent.toLowerCase().includes(searchValue)) {
                show = false;
            }

            card.style.display = show ? 'block' : 'none';
            if (show) visibleCount++;
        });

        // Show/hide empty state
        document.getElementById('emptyState').style.display = visibleCount === 0 ? 'block' : 'none';
    }

    function matchesDateFilter(eventDate, filter) {
        const date = new Date(eventDate);
        const now = new Date();

        switch (filter) {
            case 'this_week':
                const weekStart = new Date(now.setDate(now.getDate() - now.getDay()));
                const weekEnd = new Date(now.setDate(now.getDate() - now.getDay() + 6));
                return date >= weekStart && date <= weekEnd;
            case 'this_month':
                return date.getMonth() === now.getMonth() && date.getFullYear() === now.getFullYear();
            case 'next_month':
                const nextMonth = new Date(now.getFullYear(), now.getMonth() + 1, 1);
                return date.getMonth() === nextMonth.getMonth() && date.getFullYear() === nextMonth.getFullYear();
            case 'past':
                return date < now;
            default:
                return true;
        }
    }

    statusFilter.addEventListener('change', filterTickets);
    dateFilter.addEventListener('change', filterTickets);
    searchInput.addEventListener('input', filterTickets);

    window.clearFilters = function() {
        statusFilter.value = '';
        dateFilter.value = '';
        searchInput.value = '';
        filterTickets();
    };
});

function viewTickets(confirmationNumber) {
    window.location.href = `/tickets/confirmation?ref=${confirmationNumber}`;
}

function downloadTickets(confirmationNumber) {
    const link = document.createElement('a');
    link.href = `/tickets/download/${confirmationNumber}`;
    link.download = `tickets-${confirmationNumber}.pdf`;
    link.click();
    showNotification('Tickets downloaded successfully!', 'success');
}

function downloadAllTickets() {
    const link = document.createElement('a');
    link.href = '/tickets/download-all';
    link.download = 'all-tickets.pdf';
    link.click();
    showNotification('All tickets downloaded successfully!', 'success');
}

function emailTickets(confirmationNumber) {
    fetch(`/tickets/email/${confirmationNumber}`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    })
    .then(response => response.json())
    .then(data => {
        showNotification('Tickets sent to your email successfully!', 'success');
    })
    .catch(error => {
        showNotification('Failed to send tickets. Please try again.', 'error');
    });
}

function cancelBooking(confirmationNumber) {
    if (confirm('Are you sure you want to cancel this booking? This action cannot be undone.')) {
        fetch(`/tickets/cancel/${confirmationNumber}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(data => {
            showNotification('Booking cancelled successfully!', 'success');
            // Refresh page after 2 seconds
            setTimeout(() => window.location.reload(), 2000);
        })
        .catch(error => {
            showNotification('Failed to cancel booking. Please try again.', 'error');
        });
    }
}

function rateEvent(confirmationNumber) {
    // Open rating modal or redirect to rating page
    window.location.href = `/events/rate/${confirmationNumber}`;
}

function viewRefund(confirmationNumber) {
    window.location.href = `/refunds/view/${confirmationNumber}`;
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
