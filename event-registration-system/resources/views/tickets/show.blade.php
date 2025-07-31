@extends('layouts.app')

@section('title', 'Ticket Details - EventSmart')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <!-- Back Button -->
            <div class="mb-4">
                <a href="{{ route('tickets.my') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left me-2"></i>Back to My Tickets
                </a>
            </div>

            <!-- Ticket Card -->
            <div class="card border-0 shadow-lg overflow-hidden">
                <!-- Header -->
                <div class="card-header bg-gradient text-white text-center py-4">
                    <h3 class="mb-2">
                        <i class="fas fa-ticket-alt me-2"></i>Event Ticket
                    </h3>
                    <p class="mb-0 opacity-75">{{ $ticket->ticket_number }}</p>
                </div>

                <div class="card-body p-0">
                    <div class="row g-0">
                        <!-- Event Details -->
                        <div class="col-md-8 p-4">
                            <div class="mb-4">
                                <h4 class="fw-bold mb-3">{{ $ticket->event->title }}</h4>
                                
                                <div class="row g-3">
                                    <div class="col-sm-6">
                                        <div class="d-flex align-items-center text-muted mb-2">
                                            <i class="fas fa-calendar me-3 text-primary"></i>
                                            <div>
                                                <small class="d-block">Date</small>
                                                <strong class="text-dark">{{ $ticket->event->start_date->format('M d, Y') }}</strong>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="d-flex align-items-center text-muted mb-2">
                                            <i class="fas fa-clock me-3 text-primary"></i>
                                            <div>
                                                <small class="d-block">Time</small>
                                                <strong class="text-dark">{{ $ticket->event->start_time->format('g:i A') }}</strong>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="d-flex align-items-start text-muted mb-2">
                                            <i class="fas fa-map-marker-alt me-3 text-primary mt-1"></i>
                                            <div>
                                                <small class="d-block">Venue</small>
                                                <strong class="text-dark">{{ $ticket->event->venue }}</strong><br>
                                                <span class="text-muted">{{ $ticket->event->address }}, {{ $ticket->event->city }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Attendee Info -->
                            <div class="border-top pt-4 mb-4">
                                <h6 class="text-muted mb-3">ATTENDEE INFORMATION</h6>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <strong>{{ $ticket->user->name }}</strong><br>
                                        <span class="text-muted">{{ $ticket->user->email }}</span>
                                    </div>
                                    <div class="col-sm-6">
                                        <span class="text-muted">Phone: </span>{{ $ticket->user->phone ?: 'N/A' }}
                                    </div>
                                </div>
                            </div>

                            <!-- Ticket Info -->
                            <div class="border-top pt-4">
                                <h6 class="text-muted mb-3">TICKET INFORMATION</h6>
                                <div class="row g-3">
                                    <div class="col-sm-6">
                                        <small class="text-muted d-block">Ticket Number</small>
                                        <strong>{{ $ticket->ticket_number }}</strong>
                                    </div>
                                    <div class="col-sm-6">
                                        <small class="text-muted d-block">Price</small>
                                        <strong class="text-success">${{ number_format($ticket->price, 2) }}</strong>
                                    </div>
                                    <div class="col-sm-6">
                                        <small class="text-muted d-block">Purchase Date</small>
                                        <strong>{{ $ticket->purchased_at->format('M d, Y g:i A') }}</strong>
                                    </div>
                                    <div class="col-sm-6">
                                        <small class="text-muted d-block">Status</small>
                                        @if($ticket->status === 'confirmed')
                                            <span class="badge bg-success">
                                                <i class="fas fa-check me-1"></i>Confirmed
                                            </span>
                                        @elseif($ticket->status === 'pending')
                                            <span class="badge bg-warning">
                                                <i class="fas fa-clock me-1"></i>Pending
                                            </span>
                                        @else
                                            <span class="badge bg-danger">
                                                <i class="fas fa-times me-1"></i>Cancelled
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- QR Code Section -->
                        <div class="col-md-4 bg-light d-flex flex-column justify-content-center align-items-center p-4">
                            @if($ticket->status === 'confirmed')
                                <div class="text-center">
                                    <h6 class="text-muted mb-3">SCAN FOR ENTRY</h6>
                                    <div id="qr-code" class="mb-3 p-3 bg-white rounded shadow-sm"></div>
                                    <small class="text-muted">
                                        Present this QR code at the event entrance for quick check-in
                                    </small>
                                </div>
                            @else
                                <div class="text-center">
                                    <i class="fas fa-clock text-muted mb-3" style="font-size: 3rem; opacity: 0.3;"></i>
                                    <h6 class="text-muted">QR Code Available After Confirmation</h6>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Actions -->
                <div class="card-footer bg-white border-0 p-4">
                    <div class="row g-2">
                        <div class="col-md-4">
                            <a href="{{ route('tickets.download', $ticket) }}" class="btn btn-primary w-100">
                                <i class="fas fa-download me-2"></i>Download PDF
                            </a>
                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-outline-info w-100" onclick="shareTicket()">
                                <i class="fas fa-share me-2"></i>Share Ticket
                            </button>
                        </div>
                        <div class="col-md-4">
                            <a href="{{ route('events.show', $ticket->event) }}" class="btn btn-outline-secondary w-100">
                                <i class="fas fa-eye me-2"></i>View Event
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Important Notes -->
            <div class="card border-0 shadow-sm mt-4">
                <div class="card-body">
                    <h6 class="text-warning mb-3">
                        <i class="fas fa-exclamation-triangle me-2"></i>Important Notes
                    </h6>
                    <ul class="list-unstyled mb-0">
                        <li class="mb-2">
                            <i class="fas fa-check text-success me-2"></i>
                            Please arrive at least 30 minutes before the event starts
                        </li>
                        <li class="mb-2">
                            <i class="fas fa-check text-success me-2"></i>
                            Bring a valid photo ID for verification
                        </li>
                        <li class="mb-2">
                            <i class="fas fa-check text-success me-2"></i>
                            This ticket is non-transferable and non-refundable
                        </li>
                        <li class="mb-0">
                            <i class="fas fa-check text-success me-2"></i>
                            Save this ticket to your phone or print a copy
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/qrcode@1.5.3/build/qrcode.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    @if($ticket->status === 'confirmed')
        // Generate QR code
        QRCode.toCanvas(document.getElementById('qr-code'), '{{ $ticket->qr_code }}', {
            width: 200,
            height: 200,
            margin: 2,
            color: {
                dark: '#000000',
                light: '#FFFFFF'
            }
        });
    @endif
});

function shareTicket() {
    if (navigator.share) {
        navigator.share({
            title: '{{ $ticket->event->title }} - Ticket',
            text: 'Check out my ticket for {{ $ticket->event->title }}',
            url: window.location.href
        });
    } else {
        // Fallback: copy to clipboard
        const text = `{{ $ticket->event->title }} - Ticket #{{ $ticket->ticket_number }}\n${window.location.href}`;
        navigator.clipboard.writeText(text).then(function() {
            alert('Ticket details copied to clipboard!');
        }).catch(function() {
            // Manual copy fallback
            const textArea = document.createElement('textarea');
            textArea.value = text;
            document.body.appendChild(textArea);
            textArea.select();
            document.execCommand('copy');
            document.body.removeChild(textArea);
            alert('Ticket details copied to clipboard!');
        });
    }
}
</script>
@endpush
