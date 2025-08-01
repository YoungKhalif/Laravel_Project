@extends('layouts.app')

@section('title', 'Ticket Confirmation - EventPro')

@section('content')
<section class="py-5">
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-5 text-center">
                        <div class="mb-4">
                            <div class="icon-success mb-3">
                                <i class="fas fa-check"></i>
                            </div>
                            <h2 class="fw-bold">Thank You For Your Purchase!</h2>
                            <p class="lead text-muted">Your tickets have been reserved successfully.</p>
                        </div>

                        <div class="alert {{ $registration->payment_status === 'paid' ? 'alert-success' : 'alert-primary' }} d-flex align-items-center" role="alert">
                            <i class="{{ $registration->payment_status === 'paid' ? 'fas fa-check-circle' : 'fas fa-info-circle' }} me-2"></i>
                            <div>
                                {{ $paymentMessage ?? 'Your payment is currently being processed.' }} You will receive an email with your ticket(s) {{ $registration->payment_status === 'paid' ? 'shortly' : 'once confirmed' }}.
                            </div>
                        </div>

                        <div class="order-details p-4 bg-light rounded mt-4 mb-4">
                            <h4 class="mb-3 text-start">Order Details</h4>

                            <div class="d-flex justify-content-between mb-2">
                                <span class="text-muted">Order Number:</span>
                                <span class="fw-bold">{{ $registration->registration_number }}</span>
                            </div>

                            <div class="d-flex justify-content-between mb-2">
                                <span class="text-muted">Event:</span>
                                <span>{{ $registration->event->title }}</span>
                            </div>

                            <div class="d-flex justify-content-between mb-2">
                                <span class="text-muted">Date:</span>
                                <span>{{ date('F j, Y', strtotime($registration->event->start_date)) }}</span>
                            </div>

                            <div class="d-flex justify-content-between mb-2">
                                <span class="text-muted">Time:</span>
                                <span>{{ date('g:i A', strtotime($registration->event->start_time)) }}</span>
                            </div>

                            <div class="d-flex justify-content-between mb-2">
                                <span class="text-muted">Ticket Type:</span>
                                <span>Standard</span>
                            </div>

                            <div class="d-flex justify-content-between mb-2">
                                <span class="text-muted">Quantity:</span>
                                <span>1</span>
                            </div>

                            <div class="d-flex justify-content-between fw-bold">
                                <span>Total:</span>
                                <span>${{ number_format($registration->amount_paid, 2) }}</span>
                            </div>
                        </div>

                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <a href="{{ route('tickets.show', $registration->id) }}" class="btn btn-primary-custom btn-lg w-100">
                                    <i class="fas fa-ticket-alt me-2"></i>View Ticket
                                </a>
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('events.show', $registration->event_id) }}" class="btn btn-outline-secondary btn-lg w-100">
                                    <i class="fas fa-arrow-left me-2"></i>Back to Event
                                </a>
                            </div>
                        </div>

                        <div class="text-muted">
                            <h5 class="fw-bold mb-3">What's Next?</h5>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <i class="fas fa-envelope-open-text mb-2" style="font-size: 1.5rem;"></i>
                                        <h6>Check Your Email</h6>
                                        <p class="small">We've sent the tickets to your email address.</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <i class="fas fa-mobile-alt mb-2" style="font-size: 1.5rem;"></i>
                                        <h6>Save Your Tickets</h6>
                                        <p class="small">Access tickets anytime from your account.</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <i class="fas fa-calendar-check mb-2" style="font-size: 1.5rem;"></i>
                                        <h6>Attend the Event</h6>
                                        <p class="small">Show your ticket QR code at the entrance.</p>
                                    </div>
                                </div>
                            </div>
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
    .icon-success {
        width: 80px;
        height: 80px;
        margin: 0 auto;
        background-color: #28a745;
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
    }

    .order-details {
        text-align: left;
    }
</style>
@endpush
