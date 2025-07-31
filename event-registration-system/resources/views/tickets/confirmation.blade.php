@extends('layouts.app')

@section('title', 'Ticket Confirmation - EventSmart')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <!-- Success Header -->
            <div class="text-center mb-5">
                <div class="bg-success text-white rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center"
                     style="width: 80px; height: 80px;">
                    <i class="fas fa-check fa-2x"></i>
                </div>
                <h2 class="mb-2">Payment Successful!</h2>
                <p class="text-muted">Your tickets have been confirmed and sent to your email.</p>
            </div>

            <!-- Confirmation Details -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-light border-0 py-3">
                    <div class="row align-items-center">
                        <div class="col">
                            <h5 class="card-title mb-0">
                                <i class="fas fa-ticket-alt text-primary me-2"></i>Booking Confirmation
                            </h5>
                        </div>
                        <div class="col-auto">
                            <span class="badge bg-success">CONFIRMED</span>
                        </div>
                    </div>
                </div>
                <div class="card-body p-4">
                    <div class="row g-4">
                        <!-- Booking Details -->
                        <div class="col-md-6">
                            <h6 class="mb-3">Booking Details</h6>
                            <div class="mb-2">
                                <strong>Confirmation Number:</strong><br>
                                <span class="font-monospace text-primary">#TC-2024-001234</span>
                            </div>
                            <div class="mb-2">
                                <strong>Payment ID:</strong><br>
                                <span class="font-monospace text-muted">#PAY-789456123</span>
                            </div>
                            <div class="mb-2">
                                <strong>Booking Date:</strong><br>
                                <span class="text-muted">March 10, 2024 at 2:30 PM</span>
                            </div>
                            <div class="mb-0">
                                <strong>Total Amount:</strong><br>
                                <span class="text-success fw-bold">$207.98</span>
                            </div>
                        </div>

                        <!-- Customer Details -->
                        <div class="col-md-6">
                            <h6 class="mb-3">Customer Details</h6>
                            <div class="mb-2">
                                <strong>Name:</strong><br>
                                <span class="text-muted">John Doe</span>
                            </div>
                            <div class="mb-2">
                                <strong>Email:</strong><br>
                                <span class="text-muted">john.doe@example.com</span>
                            </div>
                            <div class="mb-0">
                                <strong>Phone:</strong><br>
                                <span class="text-muted">+1 (555) 123-4567</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Event Details -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-light border-0 py-3">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-calendar-alt text-primary me-2"></i>Event Information
                    </h5>
                </div>
                <div class="card-body p-4">
                    <div class="row align-items-center">
                        <div class="col-md-3">
                            <img src="https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=200&h=120&fit=crop"
                                 class="img-fluid rounded" alt="Event">
                        </div>
                        <div class="col-md-9">
                            <h5 class="mb-2">Tech Conference 2024</h5>
                            <p class="text-muted mb-3">Join us for the biggest technology conference of the year featuring industry leaders, workshops, and networking opportunities.</p>

                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="d-flex align-items-center mb-2">
                                        <i class="fas fa-calendar text-primary me-2"></i>
                                        <span><strong>Date:</strong> March 15, 2024</span>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-clock text-primary me-2"></i>
                                        <span><strong>Time:</strong> 10:00 AM - 6:00 PM</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex align-items-center mb-2">
                                        <i class="fas fa-map-marker-alt text-primary me-2"></i>
                                        <span><strong>Venue:</strong> Convention Center</span>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-map text-primary me-2"></i>
                                        <span><strong>Address:</strong> 123 Main St, New York, NY</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tickets -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-light border-0 py-3">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-tickets-alt text-primary me-2"></i>Your Tickets (2)
                    </h5>
                </div>
                <div class="card-body p-0">
                    <!-- Ticket 1 -->
                    <div class="ticket-item border-bottom p-4">
                        <div class="row align-items-center">
                            <div class="col-md-8">
                                <div class="d-flex align-items-start">
                                    <div class="flex-grow-1">
                                        <h6 class="mb-1">Regular Ticket #1</h6>
                                        <p class="text-muted mb-2">Tech Conference 2024 - General Admission</p>
                                        <div class="d-flex align-items-center">
                                            <span class="badge bg-success me-2">Valid</span>
                                            <small class="text-muted">Ticket ID: #TK-001234-001</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 text-end">
                                <div class="qr-code-container mb-2">
                                    <canvas id="qr1" width="80" height="80" class="border"></canvas>
                                </div>
                                <div class="d-flex gap-2 justify-content-end">
                                    <button class="btn btn-outline-primary btn-sm" onclick="downloadTicket('TK-001234-001')">
                                        <i class="fas fa-download"></i>
                                    </button>
                                    <button class="btn btn-outline-secondary btn-sm" onclick="shareTicket('TK-001234-001')">
                                        <i class="fas fa-share"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Ticket 2 -->
                    <div class="ticket-item p-4">
                        <div class="row align-items-center">
                            <div class="col-md-8">
                                <div class="d-flex align-items-start">
                                    <div class="flex-grow-1">
                                        <h6 class="mb-1">Regular Ticket #2</h6>
                                        <p class="text-muted mb-2">Tech Conference 2024 - General Admission</p>
                                        <div class="d-flex align-items-center">
                                            <span class="badge bg-success me-2">Valid</span>
                                            <small class="text-muted">Ticket ID: #TK-001234-002</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 text-end">
                                <div class="qr-code-container mb-2">
                                    <canvas id="qr2" width="80" height="80" class="border"></canvas>
                                </div>
                                <div class="d-flex gap-2 justify-content-end">
                                    <button class="btn btn-outline-primary btn-sm" onclick="downloadTicket('TK-001234-002')">
                                        <i class="fas fa-download"></i>
                                    </button>
                                    <button class="btn btn-outline-secondary btn-sm" onclick="shareTicket('TK-001234-002')">
                                        <i class="fas fa-share"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Important Information -->
            <div class="card border-0 bg-light mb-4">
                <div class="card-body p-4">
                    <h6 class="mb-3">
                        <i class="fas fa-info-circle text-info me-2"></i>Important Information
                    </h6>
                    <ul class="list-unstyled mb-0">
                        <li class="mb-2">
                            <i class="fas fa-check text-success me-2"></i>
                            Your tickets have been sent to your email address
                        </li>
                        <li class="mb-2">
                            <i class="fas fa-check text-success me-2"></i>
                            Present your QR code at the event entrance for quick check-in
                        </li>
                        <li class="mb-2">
                            <i class="fas fa-check text-success me-2"></i>
                            Arrive 30 minutes early for registration and networking
                        </li>
                        <li class="mb-0">
                            <i class="fas fa-check text-success me-2"></i>
                            Bring a valid ID for verification at the venue
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="row g-3">
                <div class="col-md-4">
                    <button class="btn btn-gradient w-100" onclick="downloadAllTickets()">
                        <i class="fas fa-download me-2"></i>Download All Tickets
                    </button>
                </div>
                <div class="col-md-4">
                    <button class="btn btn-outline-primary w-100" onclick="sendToEmail()">
                        <i class="fas fa-envelope me-2"></i>Email Tickets
                    </button>
                </div>
                <div class="col-md-4">
                    <a href="/dashboard" class="btn btn-outline-secondary w-100">
                        <i class="fas fa-home me-2"></i>Go to Dashboard
                    </a>
                </div>
            </div>

            <!-- Support Contact -->
            <div class="text-center mt-5">
                <p class="text-muted mb-2">Need help with your booking?</p>
                <div class="d-flex justify-content-center gap-3">
                    <a href="mailto:support@eventsmart.com" class="text-decoration-none">
                        <i class="fas fa-envelope me-1"></i>support@eventsmart.com
                    </a>
                    <span class="text-muted">|</span>
                    <a href="tel:+1-555-123-4567" class="text-decoration-none">
                        <i class="fas fa-phone me-1"></i>+1 (555) 123-4567
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Generate QR codes for tickets
    generateQRCode('qr1', 'TK-001234-001');
    generateQRCode('qr2', 'TK-001234-002');
});

function generateQRCode(canvasId, ticketId) {
    const canvas = document.getElementById(canvasId);
    const ticketData = {
        ticketId: ticketId,
        eventId: 'EV-2024-001',
        eventName: 'Tech Conference 2024',
        customerName: 'John Doe',
        date: '2024-03-15',
        time: '10:00',
        venue: 'Convention Center',
        confirmationNumber: 'TC-2024-001234'
    };

    QRCode.toCanvas(canvas, JSON.stringify(ticketData), {
        width: 80,
        height: 80,
        color: {
            dark: '#000000',
            light: '#FFFFFF'
        }
    }, function (error) {
        if (error) console.error(error);
    });
}

function downloadTicket(ticketId) {
    // Simulate ticket download
    const link = document.createElement('a');
    link.href = '/tickets/download/' + ticketId;
    link.download = 'ticket-' + ticketId + '.pdf';
    link.click();

    // Show success message
    showNotification('Ticket downloaded successfully!', 'success');
}

function downloadAllTickets() {
    // Simulate all tickets download
    const link = document.createElement('a');
    link.href = '/tickets/download-all/TC-2024-001234';
    link.download = 'all-tickets-TC-2024-001234.pdf';
    link.click();

    showNotification('All tickets downloaded successfully!', 'success');
}

function shareTicket(ticketId) {
    if (navigator.share) {
        navigator.share({
            title: 'Tech Conference 2024 Ticket',
            text: 'Here is my ticket for Tech Conference 2024',
            url: window.location.origin + '/tickets/view/' + ticketId
        });
    } else {
        // Fallback - copy link to clipboard
        const url = window.location.origin + '/tickets/view/' + ticketId;
        navigator.clipboard.writeText(url).then(function() {
            showNotification('Ticket link copied to clipboard!', 'info');
        });
    }
}

function sendToEmail() {
    // Simulate email sending
    fetch('/tickets/email/TC-2024-001234', {
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

function showNotification(message, type) {
    // Create notification element
    const notification = document.createElement('div');
    notification.className = `alert alert-${type === 'success' ? 'success' : type === 'error' ? 'danger' : 'info'} alert-dismissible fade show position-fixed`;
    notification.style.cssText = 'top: 20px; right: 20px; z-index: 1050; min-width: 300px;';
    notification.innerHTML = `
        <i class="fas fa-${type === 'success' ? 'check-circle' : type === 'error' ? 'exclamation-circle' : 'info-circle'} me-2"></i>
        ${message}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    `;

    document.body.appendChild(notification);

    // Auto remove after 5 seconds
    setTimeout(() => {
        if (notification.parentNode) {
            notification.remove();
        }
    }, 5000);
}
</script>
@endpush
@endsection
