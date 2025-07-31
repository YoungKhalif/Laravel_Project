@extends('layouts.app')

@section('title', 'My Tickets - EventSmart')

@section('content')
<div class="container-fluid px-4 py-5">
    <!-- Header -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="h3 fw-bold mb-1">My Tickets</h1>
                    <p class="text-muted mb-0">Manage your event tickets and download receipts</p>
                </div>
                <div>
                    <a href="{{ route('events.index') }}" class="btn btn-gradient">
                        <i class="fas fa-search me-2"></i>Find More Events
                    </a>
                </div>
            </div>
        </div>
    </div>

    @if($tickets->count() > 0)
        <!-- Tickets Grid -->
        <div class="row g-4">
            @foreach($tickets as $ticket)
                <div class="col-lg-6 col-xl-4">
                    <div class="card border-0 shadow-sm h-100">
                        <!-- Event Image -->
                        <div class="position-relative">
                            @if($ticket->event->image)
                                <img src="{{ Storage::url($ticket->event->image) }}" 
                                     alt="{{ $ticket->event->title }}" 
                                     class="card-img-top" 
                                     style="height: 200px; object-fit: cover;">
                            @else
                                <div class="bg-gradient-primary text-white d-flex align-items-center justify-content-center" 
                                     style="height: 200px;">
                                    <i class="fas fa-calendar fa-3x opacity-50"></i>
                                </div>
                            @endif
                            
                            <!-- Status Badge -->
                            <div class="position-absolute top-0 end-0 m-3">
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

                        <div class="card-body">
                            <!-- Event Title -->
                            <h5 class="card-title mb-2">{{ $ticket->event->title }}</h5>
                            
                            <!-- Event Details -->
                            <div class="text-muted small mb-3">
                                <div class="mb-1">
                                    <i class="fas fa-calendar me-2"></i>
                                    {{ $ticket->event->start_date->format('M d, Y') }} at 
                                    {{ $ticket->event->start_time->format('g:i A') }}
                                </div>
                                <div class="mb-1">
                                    <i class="fas fa-map-marker-alt me-2"></i>
                                    {{ $ticket->event->venue }}, {{ $ticket->event->city }}
                                </div>
                                <div>
                                    <i class="fas fa-ticket-alt me-2"></i>
                                    Ticket #{{ $ticket->ticket_number }}
                                </div>
                            </div>

                            <!-- Price -->
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="text-muted">Price Paid:</span>
                                <span class="fw-bold text-success">${{ number_format($ticket->price, 2) }}</span>
                            </div>

                            <!-- QR Code -->
                            @if($ticket->status === 'confirmed')
                                <div class="text-center mb-3">
                                    <div id="qr-{{ $ticket->id }}" class="d-inline-block p-2 bg-white border rounded"></div>
                                </div>
                            @endif
                        </div>

                        <!-- Actions -->
                        <div class="card-footer bg-transparent border-0 pt-0">
                            <div class="d-grid gap-2">
                                @if($ticket->status === 'confirmed')
                                    <a href="{{ route('tickets.show', $ticket) }}" class="btn btn-primary">
                                        <i class="fas fa-eye me-2"></i>View Details
                                    </a>
                                    <div class="row g-2">
                                        <div class="col-6">
                                            <a href="{{ route('tickets.download', $ticket) }}" class="btn btn-outline-secondary btn-sm w-100">
                                                <i class="fas fa-download me-1"></i>Download
                                            </a>
                                        </div>
                                        <div class="col-6">
                                            <button class="btn btn-outline-info btn-sm w-100" onclick="shareTicket('{{ $ticket->ticket_number }}')">
                                                <i class="fas fa-share me-1"></i>Share
                                            </button>
                                        </div>
                                    </div>
                                @else
                                    <button class="btn btn-outline-secondary" disabled>
                                        <i class="fas fa-clock me-2"></i>Awaiting Confirmation
                                    </button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="row mt-5">
            <div class="col-12 d-flex justify-content-center">
                {{ $tickets->links() }}
            </div>
        </div>
    @else
        <!-- Empty State -->
        <div class="row justify-content-center">
            <div class="col-lg-6 text-center">
                <div class="py-5">
                    <i class="fas fa-ticket-alt text-muted mb-4" style="font-size: 4rem; opacity: 0.3;"></i>
                    <h3 class="mb-3">No Tickets Yet</h3>
                    <p class="text-muted mb-4">
                        You haven't purchased any tickets yet. Discover amazing events happening near you!
                    </p>
                    <a href="{{ route('events.index') }}" class="btn btn-gradient btn-lg">
                        <i class="fas fa-search me-2"></i>Browse Events
                    </a>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/qrcode@1.5.3/build/qrcode.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Generate QR codes for confirmed tickets
    @foreach($tickets as $ticket)
        @if($ticket->status === 'confirmed')
            QRCode.toCanvas(document.getElementById('qr-{{ $ticket->id }}'), '{{ $ticket->qr_code }}', {
                width: 150,
                height: 150,
                margin: 1,
                color: {
                    dark: '#000000',
                    light: '#FFFFFF'
                }
            });
        @endif
    @endforeach
});

function shareTicket(ticketNumber) {
    if (navigator.share) {
        navigator.share({
            title: 'My Event Ticket',
            text: `Check out my ticket #${ticketNumber}`,
            url: window.location.href
        });
    } else {
        // Fallback: copy to clipboard
        navigator.clipboard.writeText(`Ticket #${ticketNumber} - ${window.location.href}`).then(function() {
            alert('Ticket link copied to clipboard!');
        });
    }
}
</script>
@endpush
