@extends('layouts.app')

<<<<<<< HEAD
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
=======
@section('title', 'Purchase Tickets - EventSmart')

@push('styles')
<style>
    .payment-form {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    }
    .card-input {
        font-family: 'Courier New', monospace;
    }
</style>
@endpush

@section('content')
<div class="container py-5">
    <div class="row">
        <!-- Event Summary -->
        <div class="col-lg-4 mb-4">
            <div class="card border-0 shadow-sm sticky-top" style="top: 100px;">
                <div class="card-header bg-light border-0">
                    <h5 class="mb-0">
                        <i class="fas fa-calendar-check text-primary me-2"></i>Order Summary
                    </h5>
                </div>
                <div class="card-body">
                    <!-- Event Info -->
                    <div class="d-flex mb-3">
                        @if($event->image)
                            <img src="{{ Storage::url($event->image) }}" 
                                 alt="{{ $event->title }}" 
                                 class="rounded me-3" 
                                 style="width: 60px; height: 60px; object-fit: cover;">
                        @else
                            <div class="bg-primary text-white rounded me-3 d-flex align-items-center justify-content-center"
                                 style="width: 60px; height: 60px;">
                                <i class="fas fa-calendar"></i>
                            </div>
                        @endif
                        <div>
                            <h6 class="mb-1">{{ $event->title }}</h6>
                            <small class="text-muted">
                                <i class="fas fa-calendar me-1"></i>
                                {{ $event->start_date->format('M d, Y') }}
                            </small><br>
                            <small class="text-muted">
                                <i class="fas fa-map-marker-alt me-1"></i>
                                {{ $event->venue }}
                            </small>
                        </div>
                    </div>

                    <hr>

                    <!-- Pricing -->
                    <div class="d-flex justify-content-between mb-2">
                        <span>Ticket Price</span>
                        <span>${{ number_format($event->ticket_price, 2) }}</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span>Quantity</span>
                        <span>{{ $quantity }}</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span>Service Fee</span>
                        <span>${{ number_format($total_amount * 0.05, 2) }}</span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between fw-bold h5">
                        <span>Total</span>
                        <span class="text-primary">${{ number_format($total_amount * 1.05, 2) }}</span>
                    </div>

                    <!-- Security Info -->
                    <div class="bg-light rounded p-3 mt-3">
                        <div class="d-flex align-items-center text-success mb-2">
                            <i class="fas fa-shield-alt me-2"></i>
                            <small class="fw-bold">Secure Payment</small>
                        </div>
                        <small class="text-muted">
                            Your payment information is encrypted and secure. We never store your card details.
                        </small>
>>>>>>> 8a996aa7d56b8b38ce7291c226b99d292509af77
                    </div>
                </div>
            </div>
        </div>
<<<<<<< HEAD
    </div>
</section>
=======

        <!-- Payment Form -->
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-0 py-4">
                    <h4 class="mb-0">
                        <i class="fas fa-credit-card text-primary me-2"></i>Payment Information
                    </h4>
                </div>
                <div class="card-body payment-form">
                    <form method="POST" action="{{ route('tickets.process', $event) }}" id="payment-form">
                        @csrf
                        <input type="hidden" name="quantity" value="{{ $quantity }}">

                        <!-- Payment Method -->
                        <div class="mb-4">
                            <label class="form-label fw-bold">Payment Method</label>
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <div class="card payment-method-card" data-method="card">
                                        <div class="card-body text-center py-3">
                                            <i class="fas fa-credit-card fa-2x text-primary mb-2"></i>
                                            <div class="fw-bold">Credit Card</div>
                                            <small class="text-muted">Visa, Mastercard, etc.</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card payment-method-card" data-method="paypal">
                                        <div class="card-body text-center py-3">
                                            <i class="fab fa-paypal fa-2x text-info mb-2"></i>
                                            <div class="fw-bold">PayPal</div>
                                            <small class="text-muted">Pay with PayPal</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card payment-method-card" data-method="bank_transfer">
                                        <div class="card-body text-center py-3">
                                            <i class="fas fa-university fa-2x text-success mb-2"></i>
                                            <div class="fw-bold">Bank Transfer</div>
                                            <small class="text-muted">Direct transfer</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="payment_method" id="payment_method" required>
                        </div>

                        <!-- Credit Card Form -->
                        <div id="card-form" style="display: none;">
                            <div class="row g-3 mb-4">
                                <div class="col-12">
                                    <label for="card_number" class="form-label">Card Number</label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fas fa-credit-card"></i>
                                        </span>
                                        <input type="text" 
                                               class="form-control card-input" 
                                               id="card_number" 
                                               name="card_number"
                                               placeholder="1234 5678 9012 3456"
                                               maxlength="19">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <label for="card_expiry" class="form-label">Expiry Date</label>
                                    <input type="text" 
                                           class="form-control card-input" 
                                           id="card_expiry" 
                                           name="card_expiry"
                                           placeholder="MM/YY"
                                           maxlength="5">
                                </div>
                                <div class="col-md-4">
                                    <label for="card_cvv" class="form-label">CVV</label>
                                    <input type="text" 
                                           class="form-control card-input" 
                                           id="card_cvv" 
                                           name="card_cvv"
                                           placeholder="123"
                                           maxlength="4">
                                </div>
                                <div class="col-12">
                                    <label for="card_name" class="form-label">Cardholder Name</label>
                                    <input type="text" 
                                           class="form-control" 
                                           id="card_name" 
                                           name="card_name"
                                           placeholder="John Doe">
                                </div>
                            </div>
                        </div>

                        <!-- PayPal Info -->
                        <div id="paypal-info" style="display: none;">
                            <div class="alert alert-info">
                                <i class="fab fa-paypal me-2"></i>
                                You'll be redirected to PayPal to complete your payment securely.
                            </div>
                        </div>

                        <!-- Bank Transfer Info -->
                        <div id="bank-info" style="display: none;">
                            <div class="alert alert-warning">
                                <i class="fas fa-info-circle me-2"></i>
                                Bank transfer instructions will be provided after you submit this form.
                            </div>
                        </div>

                        <!-- Terms and Conditions -->
                        <div class="mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="terms" name="terms" required>
                                <label class="form-check-label" for="terms">
                                    I agree to the <a href="#" class="text-decoration-none">Terms and Conditions</a> 
                                    and <a href="#" class="text-decoration-none">Privacy Policy</a>
                                </label>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-gradient btn-lg" id="submit-btn">
                                <i class="fas fa-lock me-2"></i>
                                Complete Payment - ${{ number_format($total_amount * 1.05, 2) }}
                            </button>
                            <a href="{{ route('events.show', $event) }}" class="btn btn-outline-secondary">
                                <i class="fas fa-arrow-left me-2"></i>Back to Event
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
>>>>>>> 8a996aa7d56b8b38ce7291c226b99d292509af77
@endsection

@push('scripts')
<script>
<<<<<<< HEAD
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
=======
document.addEventListener('DOMContentLoaded', function() {
    // Payment method selection
    const paymentCards = document.querySelectorAll('.payment-method-card');
    const paymentMethodInput = document.getElementById('payment_method');
    const cardForm = document.getElementById('card-form');
    const paypalInfo = document.getElementById('paypal-info');
    const bankInfo = document.getElementById('bank-info');

    paymentCards.forEach(card => {
        card.addEventListener('click', function() {
            paymentCards.forEach(c => c.classList.remove('border-primary', 'bg-primary', 'text-white'));
            this.classList.add('border-primary', 'bg-primary', 'text-white');
            
            const method = this.dataset.method;
            paymentMethodInput.value = method;

            // Show/hide forms
            cardForm.style.display = method === 'card' ? 'block' : 'none';
            paypalInfo.style.display = method === 'paypal' ? 'block' : 'none';
            bankInfo.style.display = method === 'bank_transfer' ? 'block' : 'none';

            // Update required fields
            const cardInputs = cardForm.querySelectorAll('input');
            cardInputs.forEach(input => {
                input.required = method === 'card';
            });
        });
    });

    // Card number formatting
    const cardNumberInput = document.getElementById('card_number');
    if (cardNumberInput) {
        cardNumberInput.addEventListener('input', function() {
            let value = this.value.replace(/\s/g, '').replace(/[^0-9]/gi, '');
            let formattedValue = value.match(/.{1,4}/g)?.join(' ') || value;
            this.value = formattedValue;
        });
    }

    // Expiry date formatting
    const expiryInput = document.getElementById('card_expiry');
    if (expiryInput) {
        expiryInput.addEventListener('input', function() {
            let value = this.value.replace(/\D/g, '');
            if (value.length >= 2) {
                value = value.substring(0, 2) + '/' + value.substring(2, 4);
            }
            this.value = value;
        });
    }

    // CVV validation
    const cvvInput = document.getElementById('card_cvv');
    if (cvvInput) {
        cvvInput.addEventListener('input', function() {
            this.value = this.value.replace(/\D/g, '');
        });
    }
});
</script>

<style>
.payment-method-card {
    cursor: pointer;
    transition: all 0.3s ease;
}
.payment-method-card:hover {
    border-color: #007bff !important;
    transform: translateY(-2px);
}
</style>
>>>>>>> 8a996aa7d56b8b38ce7291c226b99d292509af77
@endpush
