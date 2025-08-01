@extends('layouts.app')

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
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-4">
                            <h5 class="fw-bold mb-3">Need Help?</h5>
                            <p class="text-muted mb-3">Having issues with your tickets or need to make changes to your registration?</p>
                            <a href="#" class="btn btn-outline-primary d-block">Contact Support</a>
                        </div>
                    </div>
                </div>
            </div>
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
