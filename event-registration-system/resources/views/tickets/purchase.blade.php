@extends('layouts.app')

@section('title', 'Purchase Tickets - ' . $event->title . ' - EventPro')

@section('content')
<section class="py-5">
    <div class="container py-4">
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('events.index') }}">Events</a></li>
                <li class="breadcrumb-item"><a href="{{ route('events.show', $event->id) }}">{{ $event->title }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">Purchase Tickets</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-lg-8">
                <h2 class="fw-bold mb-4">Purchase Tickets</h2>

                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body p-4">
                        <h5 class="fw-bold">Event Details</h5>

                        <div class="d-flex mt-3">
                            <div class="flex-shrink-0 me-3">
                                @if($event->image)
                                    <img src="{{ asset('storage/' . $event->image) }}" alt="{{ $event->title }}" class="rounded" width="100" height="100" style="object-fit: cover;">
                                @else
                                    <div class="bg-light rounded d-flex align-items-center justify-content-center" style="width: 100px; height: 100px;">
                                        <i class="fas fa-calendar-alt text-muted" style="font-size: 2rem;"></i>
                                    </div>
                                @endif
                            </div>
                            <div>
                                <h4 class="mb-1">{{ $event->title }}</h4>
                                <div class="mb-2">
                                    <i class="fas fa-calendar text-muted me-2"></i>
                                    {{ date('F j, Y', strtotime($event->start_date)) }}
                                    @if($event->end_date && $event->end_date != $event->start_date)
                                        - {{ date('F j, Y', strtotime($event->end_date)) }}
                                    @endif
                                </div>
                                <div class="mb-2">
                                    <i class="fas fa-clock text-muted me-2"></i>
                                    {{ date('g:i A', strtotime($event->start_time)) }}
                                    @if($event->end_time)
                                        - {{ date('g:i A', strtotime($event->end_time)) }}
                                    @endif
                                </div>
                                <div>
                                    <i class="fas fa-map-marker-alt text-muted me-2"></i>
                                    {{ $event->location }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <h5 class="fw-bold mb-4">Ticket Selection</h5>

                        <form action="{{ route('tickets.process', $event->id) }}" method="POST">
                            @csrf

                            <div class="mb-4">
                                <div class="ticket-selection p-3 border rounded">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div>
                                            <h5 class="mb-1">Standard Ticket</h5>
                                            <p class="text-muted mb-2">{{ $event->ticket->description ?? 'General admission ticket' }}</p>
                                            <span class="badge bg-success">{{ $event->ticket->available }} remaining</span>
                                        </div>
                                        <div class="h4 fw-bold text-primary">${{ number_format($event->ticket->price, 2) }}</div>
                                    </div>

                                    <div class="mt-3">
                                        <label for="quantity" class="form-label">Quantity</label>
                                        <select class="form-select @error('quantity') is-invalid @enderror" id="quantity" name="quantity">
                                            @for($i = 1; $i <= min(10, $event->ticket->available); $i++)
                                                <option value="{{ $i }}" {{ old('quantity') == $i ? 'selected' : '' }}>{{ $i }}</option>
                                            @endfor
                                        </select>
                                        @error('quantity')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="mb-4">
                                <h5 class="fw-bold mb-3">Contact Information</h5>

                                <div class="mb-3">
                                    <label for="name" class="form-label">Full Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', Auth::user()->name) }}" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email Address</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', Auth::user()->email) }}" required>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <div class="form-text">Your tickets will be sent to this email address</div>
                                </div>
                            </div>

                            <div class="mb-4">
                                <div class="form-check">
                                    <input class="form-check-input @error('agree_to_terms') is-invalid @enderror" type="checkbox" id="agree_to_terms" name="agree_to_terms" required {{ old('agree_to_terms') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="agree_to_terms">
                                        I agree to the <a href="#" class="text-decoration-none">Terms and Conditions</a> and <a href="#" class="text-decoration-none">Privacy Policy</a>
                                    </label>
                                    @error('agree_to_terms')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary-custom btn-lg">
                                    <i class="fas fa-lock me-2"></i>Proceed to Payment
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 mt-4 mt-lg-0">
                <div class="sticky-lg-top" style="top: 100px; z-index: 1;">
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-body p-4">
                            <h5 class="fw-bold mb-3">Order Summary</h5>

                            <div class="d-flex justify-content-between mb-2">
                                <span>Standard Ticket</span>
                                <span class="ticket-quantity">x1</span>
                            </div>

                            <div class="d-flex justify-content-between mb-2">
                                <span>Price per ticket</span>
                                <span>${{ number_format($event->ticket->price, 2) }}</span>
                            </div>

                            <hr class="my-3">

                            <div class="d-flex justify-content-between fw-bold mb-2">
                                <span>Subtotal</span>
                                <span class="subtotal">${{ number_format($event->ticket->price, 2) }}</span>
                            </div>

                            <div class="d-flex justify-content-between mb-2">
                                <span>Service Fee</span>
                                <span class="service-fee">${{ number_format($event->ticket->price * 0.05, 2) }}</span>
                            </div>

                            <hr class="my-3">

                            <div class="d-flex justify-content-between h5 fw-bold">
                                <span>Total</span>
                                <span class="total-amount text-primary">${{ number_format($event->ticket->price * 1.05, 2) }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-4">
                            <h5 class="fw-bold mb-3">Secure Checkout</h5>

                            <div class="d-flex align-items-center mb-3">
                                <div class="me-3 text-primary">
                                    <i class="fas fa-lock"></i>
                                </div>
                                <div>
                                    <h6 class="mb-1">Secure Transaction</h6>
                                    <p class="text-muted small mb-0">Your payment information is protected</p>
                                </div>
                            </div>

                            <div class="d-flex align-items-center mb-3">
                                <div class="me-3 text-primary">
                                    <i class="fas fa-undo"></i>
                                </div>
                                <div>
                                    <h6 class="mb-1">Refund Policy</h6>
                                    <p class="text-muted small mb-0">Refundable up to 7 days before the event</p>
                                </div>
                            </div>

                            <div class="d-flex align-items-center">
                                <div class="me-3 text-primary">
                                    <i class="fas fa-headset"></i>
                                </div>
                                <div>
                                    <h6 class="mb-1">Customer Support</h6>
                                    <p class="text-muted small mb-0">Available 24/7 for any questions</p>
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

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const quantitySelect = document.getElementById('quantity');
        const ticketQuantity = document.querySelector('.ticket-quantity');
        const subtotal = document.querySelector('.subtotal');
        const serviceFee = document.querySelector('.service-fee');
        const totalAmount = document.querySelector('.total-amount');

        const pricePerTicket = parseFloat("{{ $event->ticket->price }}");

        quantitySelect.addEventListener('change', function() {
            const quantity = parseInt(this.value);

            // Update ticket quantity display
            ticketQuantity.textContent = `x${quantity}`;

            // Calculate new subtotal
            const newSubtotal = pricePerTicket * quantity;
            subtotal.textContent = `$${newSubtotal.toFixed(2)}`;

            // Calculate new service fee (5% of subtotal)
            const newFee = newSubtotal * 0.05;
            serviceFee.textContent = `$${newFee.toFixed(2)}`;

            // Calculate new total
            const newTotal = newSubtotal + newFee;
            totalAmount.textContent = `$${newTotal.toFixed(2)}`;
        });
    });
</script>
@endpush
