@extends('layouts.app')

@section('title', 'Ticket - ' . $registration->event->title . ' - EventPro')

@section('content')
<section class="py-5">
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="mb-4 d-flex justify-content-between align-items-center">
                    <h2 class="fw-bold mb-0">Your Ticket</h2>
                    <div>
                        <button class="btn btn-outline-primary me-2" id="print-ticket">
                            <i class="fas fa-print me-2"></i>Print
                        </button>
                        <a href="{{ route('tickets.index') }}" class="btn btn-outline-secondary">
                            <i class="fas fa-arrow-left me-2"></i>Back to Tickets
                        </a>
                    </div>
                </div>

                <div class="card border-0 shadow-sm ticket-card">
                    <div class="card-header bg-primary text-white p-3">
                        <div class="d-flex justify-content-between">
                            <h5 class="mb-0">Event Ticket</h5>
                            <span>#{{ $registration->registration_number }}</span>
                        </div>
                    </div>

                    <div class="card-body p-4">
                        <div class="row g-4">
                            <div class="col-md-8">
                                <h3 class="card-title mb-3 fw-bold">{{ $registration->event->title }}</h3>

                                <div class="d-flex align-items-center mb-3">
                                    <i class="fas fa-calendar-alt text-primary me-2"></i>
                                    <div>
                                        <div class="fw-bold">Date & Time</div>
                                        <div>
                                            {{ date('l, F j, Y', strtotime($registration->event->start_date)) }}<br>
                                            {{ date('g:i A', strtotime($registration->event->start_time)) }}
                                            @if($registration->event->end_time)
                                                - {{ date('g:i A', strtotime($registration->event->end_time)) }}
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex align-items-center mb-3">
                                    <i class="fas fa-map-marker-alt text-primary me-2"></i>
                                    <div>
                                        <div class="fw-bold">Location</div>
                                        <div>{{ $registration->event->location }}</div>
                                        @if($registration->event->address)
                                            <div class="small text-muted">{{ $registration->event->address }}</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="d-flex align-items-center mb-3">
                                    <i class="fas fa-ticket-alt text-primary me-2"></i>
                                    <div>
                                        <div class="fw-bold">Ticket Information</div>
                                        <div>Standard Ticket</div>
                                        <div class="small text-muted">Admit One</div>
                                    </div>
                                </div>

                                <div class="d-flex align-items-center">
                                    <i class="fas fa-user text-primary me-2"></i>
                                    <div>
                                        <div class="fw-bold">Attendee</div>
                                        <div>{{ $registration->user->name }}</div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 text-center">
                                <div class="qr-code-container bg-light p-3 rounded">
                                    <div id="qrcode" class="mb-2"></div>
                                    <small class="text-muted">Scan for entry</small>
                                </div>

                                <div class="mt-3">
                                    <span class="badge rounded-pill bg-{{ $registration->payment_status == 'paid' ? 'success' : 'warning' }}">
                                        {{ ucfirst($registration->payment_status) }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        <hr class="my-4">

                        <div class="row">
                            <div class="col-md-8">
                                <h5 class="fw-bold mb-3">Important Information</h5>
                                <ul class="text-muted small ps-3">
                                    <li>Please arrive at least 30 minutes before the event start time.</li>
                                    <li>Have your QR code ready to be scanned at the entrance.</li>
                                    <li>This ticket is valid for one-time entry only.</li>
                                    <li>No refunds or exchanges after purchase.</li>
                                </ul>
                            </div>
                            <div class="col-md-4 text-center">
                                <div class="organizer-info small">
                                    <p class="mb-1">Organized by</p>
                                    <p class="fw-bold mb-0">
                                        @if($registration->event->company)
                                            {{ $registration->event->company->name }}
                                        @else
                                            EventPro
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer bg-light p-3 text-center">
                        <small class="text-muted">This ticket was issued on {{ $registration->created_at->format('F j, Y, g:i A') }}</small>
                    </div>
                </div>

                <div class="mt-4">
                    <div class="alert alert-info d-flex" role="alert">
                        <div class="me-3">
                            <i class="fas fa-info-circle fa-lg"></i>
                        </div>
                        <div>
                            <h5 class="alert-heading mb-1">Need assistance?</h5>
                            <p class="mb-0">If you have any questions about your ticket or the event, please contact our support team at support@eventpro.com</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
    .ticket-card {
        overflow: hidden;
    }

    .qr-code-container {
        height: 180px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    @media print {
        body * {
            visibility: hidden;
        }

        .ticket-card, .ticket-card * {
            visibility: visible;
        }

        .ticket-card {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
        }
    }
</style>
@endpush

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Generate QR code
        const qrContainer = document.getElementById('qrcode');

        // The QR code data will be the registration number
        const qrData = "{{ $registration->registration_number }}";

        new QRCode(qrContainer, {
            text: qrData,
            width: 128,
            height: 128,
            colorDark: "#000000",
            colorLight: "#ffffff",
            correctLevel: QRCode.CorrectLevel.H
        });

        // Print ticket
        document.getElementById('print-ticket').addEventListener('click', function() {
            window.print();
        });
    });
</script>
@endpush
