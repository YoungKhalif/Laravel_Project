@extends('layouts.app')

@section('title', 'Secure Payment - ' . $registration->event->title . ' - EventPro')

@push('styles')
<style>
    .payment-hero {
        background: linear-gradient(135deg, rgba(59, 130, 246, 0.1) 0%, rgba(139, 92, 246, 0.1) 100%);
        border-bottom: 1px solid rgba(59, 130, 246, 0.1);
    }

    .payment-card {
        background: white;
        border-radius: 20px;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        border: 1px solid rgba(0, 0, 0, 0.05);
        overflow: hidden;
        transition: all 0.3s ease;
        position: relative;
    }

    .payment-card:hover {
        box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
        transform: translateY(-2px);
    }

    .form-section {
        padding: 2rem;
        border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        position: relative;
    }

    .form-section:last-child {
        border-bottom: none;
    }

    .form-section::before {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        width: 4px;
        height: 100%;
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .form-section:focus-within::before {
        opacity: 1;
    }

    .section-title {
        color: var(--dark-color);
        font-weight: 700;
        margin-bottom: 1.5rem;
        font-size: 1.25rem;
        position: relative;
        padding-left: 2rem;
    }

    .section-title::before {
        content: '';
        position: absolute;
        left: 0;
        top: 50%;
        transform: translateY(-50%);
        width: 24px;
        height: 24px;
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        border-radius: 6px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .section-title.card-title::before {
        background-image: url("data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' fill='white' viewBox='0 0 24 24'><path d='M2 10h20v2H2zM2 14h20v2H2zM2 6h20v2H2z'/></svg>");
        background-size: 12px;
        background-repeat: no-repeat;
        background-position: center;
    }

    .section-title.billing-title::before {
        background-image: url("data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' fill='white' viewBox='0 0 24 24'><path d='M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z'/></svg>");
        background-size: 12px;
        background-repeat: no-repeat;
        background-position: center;
    }

    .form-control-enhanced {
        border: 2px solid #e5e7eb;
        border-radius: 12px;
        padding: 16px 20px;
        font-size: 16px;
        font-weight: 500;
        transition: all 0.3s ease;
        background: rgba(249, 250, 251, 0.5);
    }

    .form-control-enhanced:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1);
        background: white;
        transform: translateY(-1px);
    }

    .form-control-enhanced.is-valid {
        border-color: var(--success-color);
        background: rgba(16, 185, 129, 0.05);
    }

    .form-control-enhanced.is-invalid {
        border-color: var(--danger-color);
        background: rgba(239, 68, 68, 0.05);
    }

    .submit-button {
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
        border: none;
        color: white;
        font-weight: 700;
        font-size: 18px;
        padding: 20px 32px;
        border-radius: 16px;
        width: 100%;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .submit-button::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.5s ease;
    }

    .submit-button:hover::before {
        left: 100%;
    }

    .submit-button:hover {
        transform: translateY(-3px);
        box-shadow: 0 15px 35px rgba(59, 130, 246, 0.4);
    }

    .submit-button:disabled {
        background: #9ca3af;
        cursor: not-allowed;
        transform: none;
        box-shadow: none;
    }

    .loading-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(255, 255, 255, 0.9);
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 16px;
        z-index: 10;
        opacity: 0;
        visibility: hidden;
        transition: all 0.3s ease;
    }

    .loading-overlay.show {
        opacity: 1;
        visibility: visible;
    }

    .breadcrumb-custom {
        background: none;
        padding: 0;
        margin-bottom: 2rem;
    }

    .breadcrumb-custom .breadcrumb-item {
        color: #6b7280;
        font-weight: 500;
    }

    .breadcrumb-custom .breadcrumb-item.active {
        color: var(--primary-color);
        font-weight: 600;
    }

    .breadcrumb-custom .breadcrumb-item + .breadcrumb-item::before {
        content: "→";
        color: #d1d5db;
        font-weight: bold;
    }

    @media (max-width: 768px) {
        .form-section {
            padding: 1.5rem;
        }

        .section-title {
            font-size: 1.1rem;
            padding-left: 1.5rem;
        }

        .section-title::before {
            width: 20px;
            height: 20px;
        }
    }
</style>
@endpush

@section('content')
<!-- Payment Hero -->
<div class="payment-hero py-4">
    <div class="container-xl">
        <nav class="breadcrumb-custom" aria-label="breadcrumb" data-aos="fade-right">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('events.index') }}" class="text-decoration-none">
                        <i class="fas fa-calendar-alt me-1"></i>Events
                    </a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('events.show', $registration->event_id) }}" class="text-decoration-none">
                        {{ Str::limit($registration->event->title, 30) }}
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    <i class="fas fa-credit-card me-1"></i>Payment
                </li>
            </ol>
        </nav>

        <div class="d-flex align-items-center gap-3" data-aos="fade-up" data-aos-delay="100">
            <div class="bg-primary rounded-circle p-3">
                <i class="fas fa-lock text-white fs-4"></i>
            </div>
            <div>
                <h1 class="display-6 fw-bold mb-1 font-poppins">Secure Payment</h1>
                <p class="text-muted mb-0">Complete your ticket purchase safely and securely</p>
            </div>
        </div>
    </div>
</div>

<!-- Payment Section -->
<section class="py-5">
    <div class="container-xl">
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert" data-aos="fade-down">
                <div class="d-flex align-items-center">
                    <i class="fas fa-exclamation-triangle me-3"></i>
                    <div>
                        <strong>Payment Error</strong><br>
                        {{ session('error') }}
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row g-4">
            <!-- Payment Form -->
            <div class="col-lg-8">
                <div class="payment-card" data-aos="fade-right">
                    <div class="loading-overlay" id="payment-loading">
                        <div class="text-center">
                            <div class="loading-spinner mb-3"></div>
                            <div class="fw-semibold">Processing your payment...</div>
                            <div class="text-muted small">Please don't refresh the page</div>
                        </div>
                    </div>

                    <form id="payment-form" action="{{ route('payments.process', $registration->id) }}" method="POST">
                        @csrf

                        <input type="hidden" name="payment_intent_id" id="payment_intent_id">
                        <input type="hidden" name="payment_intent_client_secret" value="{{ $clientSecret }}">
                        <input type="hidden" name="payment_method_id" id="payment_method_id">

                        <!-- Credit Card Section -->
                        <div class="form-section">
                            <h3 class="section-title card-title">Credit Card Information</h3>

                            <div class="row g-3">
                                <div class="col-12">
                                    <label for="cardholder-name" class="form-label fw-semibold">
                                        <i class="fas fa-user me-2 text-primary"></i>Cardholder Name
                                    </label>
                                    <input type="text" class="form-control form-control-enhanced"
                                           id="cardholder-name"
                                           value="{{ Auth::user()->name }}"
                                           required
                                           placeholder="Enter the name on your card">
                                </div>

                                <div class="col-12">
                                    <label for="card-element" class="form-label fw-semibold">
                                        <i class="fas fa-credit-card me-2 text-primary"></i>Credit or Debit Card
                                    </label>
                                    <div id="card-element" class="form-control form-control-enhanced d-flex align-items-center" style="min-height: 56px;">
                                        <!-- Stripe Elements will create form elements here -->
                                    </div>
                                    <div id="card-errors" class="invalid-feedback d-block"></div>
                                    <div class="form-text mt-2">
                                        <i class="fas fa-shield-alt text-success me-1"></i>
                                        Your card information is encrypted and secure
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Billing Information Section -->
                        <div class="form-section">
                            <h3 class="section-title billing-title">Billing Information</h3>

                            <div class="row g-3">
                                <div class="col-12">
                                    <label for="billing-address" class="form-label fw-semibold">
                                        <i class="fas fa-map-marker-alt me-2 text-primary"></i>Billing Address
                                    </label>
                                    <input type="text" class="form-control form-control-enhanced"
                                           id="billing-address"
                                           required
                                           placeholder="123 Main Street">
                                </div>

                                <div class="col-md-6">
                                    <label for="city" class="form-label fw-semibold">
                                        <i class="fas fa-city me-2 text-primary"></i>City
                                    </label>
                                    <input type="text" class="form-control form-control-enhanced"
                                           id="city"
                                           required
                                           placeholder="New York">
                                </div>

                                <div class="col-md-6">
                                    <label for="state" class="form-label fw-semibold">
                                        <i class="fas fa-flag me-2 text-primary"></i>State/Province
                                    </label>
                                    <input type="text" class="form-control form-control-enhanced"
                                           id="state"
                                           required
                                           placeholder="NY">
                                </div>

                                <div class="col-12">
                                    <label for="postal-code" class="form-label fw-semibold">
                                        <i class="fas fa-envelope me-2 text-primary"></i>ZIP/Postal Code
                                    </label>
                                    <input type="text" class="form-control form-control-enhanced"
                                           id="postal-code"
                                           required
                                           placeholder="10001">
                                </div>
                            </div>
                        </div>

                        <!-- Submit Section -->
                        <div class="form-section">
                            <button type="submit" class="submit-button" id="submit-button">
                                <i class="fas fa-lock me-3"></i>
                                <span class="button-text">Complete Payment - ${{ number_format($registration->amount_paid, 2) }}</span>
                            </button>

                            <div class="text-center mt-3">
                                <small class="text-muted">
                                    <i class="fas fa-shield-alt me-1 text-success"></i>
                                    256-bit SSL encryption • PCI DSS compliant • Your data is protected
                                </small>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Order Summary -->
            <div class="col-lg-4">
                <div class="sticky-top" style="top: 120px;" data-aos="fade-left">
                    <!-- Order Summary Card -->
                    <div class="card border-0 shadow-lg mb-4" style="border-radius: 20px; overflow: hidden;">
                        <div class="card-header bg-gradient text-white p-4" style="background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));">
                            <h4 class="fw-bold mb-0">
                                <i class="fas fa-receipt me-2"></i>Order Summary
                            </h4>
                        </div>
                        <div class="card-body p-4">
                            <!-- Event Preview -->
                            <div class="d-flex align-items-start gap-3 mb-4 p-3 rounded-3" style="background: rgba(59, 130, 246, 0.05);">
                                <div class="flex-shrink-0">
                                    @if($registration->event->image)
                                        <img src="{{ asset('storage/' . $registration->event->image) }}"
                                             alt="{{ $registration->event->title }}"
                                             class="rounded-3 shadow-sm"
                                             style="width: 80px; height: 80px; object-fit: cover;">
                                    @else
                                        <div class="bg-primary rounded-3 d-flex align-items-center justify-content-center shadow-sm"
                                             style="width: 80px; height: 80px;">
                                            <i class="fas fa-calendar-alt text-white fs-4"></i>
                                        </div>
                                    @endif
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="fw-bold mb-2 text-primary">{{ $registration->event->title }}</h6>
                                    <div class="text-muted small">
                                        <div class="d-flex align-items-center mb-1">
                                            <i class="fas fa-calendar me-2 text-primary"></i>
                                            {{ \Carbon\Carbon::parse($registration->event->start_date)->format('M j, Y') }}
                                        </div>
                                        <div class="d-flex align-items-center mb-1">
                                            <i class="fas fa-clock me-2 text-primary"></i>
                                            {{ \Carbon\Carbon::parse($registration->event->start_time)->format('g:i A') }}
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-map-marker-alt me-2 text-primary"></i>
                                            {{ Str::limit($registration->event->location, 25) }}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr class="my-4">

                            <!-- Price Breakdown -->
                            <div class="price-breakdown">
                                <div class="d-flex justify-content-between align-items-center mb-3 pb-2 border-bottom">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-ticket-alt me-2 text-primary"></i>
                                        <span class="fw-semibold">Standard Ticket</span>
                                    </div>
                                    <div class="text-muted small">×1</div>
                                </div>

                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span>Ticket Price</span>
                                    <span class="fw-semibold">${{ number_format($registration->ticket->price ?? 0, 2) }}</span>
                                </div>

                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span>Service Fee</span>
                                    <span class="fw-semibold">${{ number_format(($registration->amount_paid ?? 0) - ($registration->ticket->price ?? 0), 2) }}</span>
                                </div>

                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span>Processing Fee</span>
                                    <span class="fw-semibold text-success">FREE</span>
                                </div>

                                <hr class="my-3">

                                <div class="d-flex justify-content-between align-items-center mb-0">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-calculator me-2 text-primary"></i>
                                        <span class="fw-bold fs-5">Total</span>
                                    </div>
                                    <span class="fw-bold fs-5 text-primary">${{ number_format($registration->amount_paid ?? 0, 2) }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Payment Methods -->
                    <div class="card border-0 shadow-lg mb-4" style="border-radius: 20px;">
                        <div class="card-body p-4 text-center">
                            <h6 class="fw-bold mb-3">Accepted Payment Methods</h6>
                            <div class="d-flex justify-content-center gap-3 mb-3">
                                <div class="payment-icon" title="Visa" style="transition: all 0.3s ease;">
                                    <i class="fab fa-cc-visa fa-2x text-primary"></i>
                                </div>
                                <div class="payment-icon" title="Mastercard" style="transition: all 0.3s ease;">
                                    <i class="fab fa-cc-mastercard fa-2x text-warning"></i>
                                </div>
                                <div class="payment-icon" title="American Express" style="transition: all 0.3s ease;">
                                    <i class="fab fa-cc-amex fa-2x text-success"></i>
                                </div>
                                <div class="payment-icon" title="Discover" style="transition: all 0.3s ease;">
                                    <i class="fab fa-cc-discover fa-2x text-info"></i>
                                </div>
                            </div>
                            <div class="small text-muted">
                                <i class="fas fa-shield-alt me-1 text-success"></i>
                                All payments are secured with 256-bit SSL encryption
                            </div>
                        </div>
                    </div>

                    <!-- Trust Indicators -->
                    <div class="card border-0 shadow-lg" style="border-radius: 20px; background: linear-gradient(135deg, rgba(16, 185, 129, 0.05), rgba(59, 130, 246, 0.05));">
                        <div class="card-body p-4 text-center">
                            <div class="mb-3">
                                <i class="fas fa-users fs-3 text-primary mb-2"></i>
                                <div class="fw-semibold">Join 50,000+ Happy Customers</div>
                            </div>

                            <div class="d-flex justify-content-center gap-1 mb-3">
                                @for($i = 1; $i <= 5; $i++)
                                    <i class="fas fa-star text-warning"></i>
                                @endfor
                                <span class="text-muted small ms-2">(4.9/5 Rating)</span>
                            </div>

                            <div class="row g-3 text-center">
                                <div class="col-6">
                                    <div class="border-end">
                                        <div class="fw-bold text-primary fs-5">99.9%</div>
                                        <div class="small text-muted">Uptime</div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="fw-bold text-success fs-5">Secure</div>
                                    <div class="small text-muted">Payments</div>
                                </div>
                            </div>

                            <hr class="my-3">

                            <div class="small text-muted">
                                <i class="fas fa-phone-alt me-1 text-primary"></i>
                                Need help? Call us at
                                <a href="tel:+15551234567" class="text-decoration-none fw-semibold">+1 (555) 123-4567</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@push('scripts')
<script src="https://js.stripe.com/v3/"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize Stripe
    const stripe = Stripe('{{ config("services.stripe.key") }}');
    const elements = stripe.elements();

    // Card element setup with enhanced styling
    const cardElement = elements.create('card', {
        style: {
            base: {
                fontSize: '16px',
                fontWeight: '500',
                color: '#1f2937',
                fontFamily: 'Inter, system-ui, sans-serif',
                '::placeholder': {
                    color: '#9ca3af',
                },
                iconColor: '#3b82f6',
            },
            invalid: {
                color: '#ef4444',
                iconColor: '#ef4444',
            },
            complete: {
                color: '#10b981',
                iconColor: '#10b981',
            },
        },
    });

    cardElement.mount('#card-element');

    // Handle real-time validation errors from the card Element
    cardElement.on('change', function(event) {
        const displayError = document.getElementById('card-errors');
        const cardContainer = document.getElementById('card-element');

        if (event.error) {
            displayError.textContent = event.error.message;
            displayError.style.display = 'block';
            cardContainer.classList.add('is-invalid');
            cardContainer.classList.remove('is-valid');
        } else {
            displayError.textContent = '';
            displayError.style.display = 'none';
            cardContainer.classList.remove('is-invalid');

            if (event.complete) {
                cardContainer.classList.add('is-valid');
            } else {
                cardContainer.classList.remove('is-valid');
            }
        }
    });

    // Handle form submission
    const form = document.getElementById('payment-form');
    const submitButton = document.getElementById('submit-button');
    const loadingOverlay = document.getElementById('payment-loading');

    form.addEventListener('submit', async function(event) {
        event.preventDefault();

        // Show loading state
        submitButton.disabled = true;
        submitButton.innerHTML = '<i class="fas fa-spinner fa-spin me-3"></i>Processing Payment...';
        loadingOverlay.classList.add('show');

        // Create payment method
        const { error, paymentMethod } = await stripe.createPaymentMethod({
            type: 'card',
            card: cardElement,
            billing_details: {
                name: document.getElementById('cardholder-name').value,
                address: {
                    line1: document.getElementById('billing-address').value,
                    city: document.getElementById('city').value,
                    state: document.getElementById('state').value,
                    postal_code: document.getElementById('postal-code').value,
                }
            },
        });

        if (error) {
            // Show error to customer
            const errorElement = document.getElementById('card-errors');
            errorElement.textContent = error.message;
            errorElement.style.display = 'block';

            // Reset button state
            submitButton.disabled = false;
            submitButton.innerHTML = '<i class="fas fa-lock me-3"></i>Complete Payment - ${{ number_format($registration->amount_paid, 2) }}';
            loadingOverlay.classList.remove('show');
        } else {
            // Submit the form normally with the payment method
            document.getElementById('payment_method_id').value = paymentMethod.id;
            form.submit();
        }
    });

    // Enhanced form validation
    const inputs = form.querySelectorAll('.form-control-enhanced');
    inputs.forEach(input => {
        input.addEventListener('blur', function() {
            if (this.checkValidity()) {
                this.classList.add('is-valid');
                this.classList.remove('is-invalid');
            } else {
                this.classList.add('is-invalid');
                this.classList.remove('is-valid');
            }
        });

        input.addEventListener('input', function() {
            if (this.classList.contains('is-invalid') && this.checkValidity()) {
                this.classList.remove('is-invalid');
                this.classList.add('is-valid');
            }
        });
    });

    // Auto-format postal code
    const postalCodeInput = document.getElementById('postal-code');
    postalCodeInput.addEventListener('input', function() {
        let value = this.value.replace(/\D/g, '');
        if (value.length > 5) {
            value = value.substring(0, 5) + '-' + value.substring(5, 9);
        }
        this.value = value;
    });

    // Payment method icons hover effect
    const paymentIcons = document.querySelectorAll('.payment-icon');
    paymentIcons.forEach(icon => {
        icon.addEventListener('mouseenter', function() {
            this.style.transform = 'scale(1.1) translateY(-2px)';
        });

        icon.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1) translateY(0)';
        });
    });

    // Animate loading spinner
    const loadingSpinner = document.querySelector('.loading-spinner');
    if (loadingSpinner) {
        loadingSpinner.innerHTML = '<div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span></div>';
    }
});
</script>
@endpush
@endsection
