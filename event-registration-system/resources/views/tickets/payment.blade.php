@extends('layouts.app')

@section('title', 'Payment - EventSmart')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <!-- Progress Steps -->
            <div class="row mb-5">
                <div class="col-12">
                    <div class="d-flex align-items-center justify-content-center">
                        <div class="d-flex align-items-center">
                            <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center"
                                 style="width: 40px; height: 40px;">
                                <i class="fas fa-check"></i>
                            </div>
                            <span class="mx-3 text-success fw-bold">Event Selection</span>
                            <div class="bg-muted" style="width: 50px; height: 2px;"></div>
                        </div>

                        <div class="d-flex align-items-center">
                            <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center mx-3"
                                 style="width: 40px; height: 40px;">
                                <i class="fas fa-credit-card"></i>
                            </div>
                            <span class="me-3 text-primary fw-bold">Payment</span>
                            <div class="bg-muted" style="width: 50px; height: 2px;"></div>
                        </div>

                        <div class="d-flex align-items-center">
                            <div class="bg-muted text-muted rounded-circle d-flex align-items-center justify-content-center mx-3"
                                 style="width: 40px; height: 40px;">
                                <i class="fas fa-ticket-alt"></i>
                            </div>
                            <span class="text-muted">Confirmation</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-4">
                <!-- Order Summary -->
                <div class="col-lg-5">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-light border-0 py-3">
                            <h5 class="card-title mb-0">
                                <i class="fas fa-receipt text-primary me-2"></i>Order Summary
                            </h5>
                        </div>
                        <div class="card-body p-4">
                            <!-- Event Details -->
                            <div class="d-flex align-items-start mb-4">
                                <img src="https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=80&h=80&fit=crop"
                                     class="rounded me-3" alt="Event" style="width: 80px; height: 80px; object-fit: cover;">
                                <div class="flex-grow-1">
                                    <h6 class="mb-1">Tech Conference 2024</h6>
                                    <p class="text-muted mb-1 small">
                                        <i class="fas fa-calendar me-1"></i>March 15, 2024
                                    </p>
                                    <p class="text-muted mb-0 small">
                                        <i class="fas fa-clock me-1"></i>10:00 AM - 6:00 PM
                                    </p>
                                    <p class="text-muted mb-0 small">
                                        <i class="fas fa-map-marker-alt me-1"></i>Convention Center, New York
                                    </p>
                                </div>
                            </div>

                            <hr>

                            <!-- Ticket Details -->
                            <div class="mb-4">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span>Regular Ticket x 2</span>
                                    <span>$198.00</span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span class="text-muted small">Processing Fee</span>
                                    <span class="text-muted small">$5.99</span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span class="text-muted small">Service Fee</span>
                                    <span class="text-muted small">$3.99</span>
                                </div>
                            </div>

                            <hr>

                            <!-- Discount Code -->
                            <div class="mb-4">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Promo code" id="promoCode">
                                    <button class="btn btn-outline-primary" type="button" onclick="applyPromoCode()">
                                        Apply
                                    </button>
                                </div>
                                <div id="promoMessage" class="mt-2"></div>
                            </div>

                            <hr>

                            <!-- Total -->
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">Total</h5>
                                <h5 class="mb-0 text-primary">$207.98</h5>
                            </div>
                        </div>
                    </div>

                    <!-- Security Notice -->
                    <div class="card border-0 bg-light mt-4">
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-shield-alt text-success me-2"></i>
                                <small class="text-muted">
                                    Your payment information is secure and encrypted
                                </small>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Payment Form -->
                <div class="col-lg-7">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-white border-0 py-3">
                            <h5 class="card-title mb-0">
                                <i class="fas fa-credit-card text-primary me-2"></i>Payment Information
                            </h5>
                        </div>
                        <div class="card-body p-4">
                            <form id="paymentForm" method="POST" action="#">
                                @csrf

                                <!-- Contact Information -->
                                <div class="mb-4">
                                    <h6 class="mb-3">Contact Information</h6>
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label for="first_name" class="form-label">First Name *</label>
                                            <input type="text" class="form-control" id="first_name" name="first_name" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="last_name" class="form-label">Last Name *</label>
                                            <input type="text" class="form-control" id="last_name" name="last_name" required>
                                        </div>
                                        <div class="col-12">
                                            <label for="email" class="form-label">Email Address *</label>
                                            <input type="email" class="form-control" id="email" name="email" required>
                                        </div>
                                        <div class="col-12">
                                            <label for="phone" class="form-label">Phone Number *</label>
                                            <input type="tel" class="form-control" id="phone" name="phone" required>
                                        </div>
                                    </div>
                                </div>

                                <hr>

                                <!-- Payment Method -->
                                <div class="mb-4">
                                    <h6 class="mb-3">Payment Method</h6>

                                    <!-- Payment Options -->
                                    <div class="row g-2 mb-3">
                                        <div class="col-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="payment_method"
                                                       id="credit_card" value="credit_card" checked>
                                                <label class="form-check-label d-flex align-items-center" for="credit_card">
                                                    <i class="fas fa-credit-card me-2"></i>Credit/Debit Card
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="payment_method"
                                                       id="paypal" value="paypal">
                                                <label class="form-check-label d-flex align-items-center" for="paypal">
                                                    <i class="fab fa-paypal me-2"></i>PayPal
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Credit Card Form -->
                                    <div id="credit-card-form">
                                        <div class="row g-3">
                                            <div class="col-12">
                                                <label for="card_number" class="form-label">Card Number *</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="card_number"
                                                           placeholder="1234 5678 9012 3456" maxlength="19" required>
                                                    <span class="input-group-text">
                                                        <i class="fas fa-credit-card text-muted"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <label for="card_name" class="form-label">Cardholder Name *</label>
                                                <input type="text" class="form-control" id="card_name"
                                                       placeholder="John Doe" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="expiry_date" class="form-label">Expiry Date *</label>
                                                <input type="text" class="form-control" id="expiry_date"
                                                       placeholder="MM/YY" maxlength="5" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="cvv" class="form-label">CVV *</label>
                                                <input type="text" class="form-control" id="cvv"
                                                       placeholder="123" maxlength="4" required>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- PayPal Form -->
                                    <div id="paypal-form" style="display: none;">
                                        <div class="text-center p-4 bg-light rounded">
                                            <i class="fab fa-paypal fa-3x text-primary mb-3"></i>
                                            <p class="text-muted">You will be redirected to PayPal to complete your payment.</p>
                                        </div>
                                    </div>
                                </div>

                                <hr>

                                <!-- Billing Address -->
                                <div class="mb-4">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h6 class="mb-0">Billing Address</h6>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="same_as_contact" checked>
                                            <label class="form-check-label" for="same_as_contact">
                                                Same as contact information
                                            </label>
                                        </div>
                                    </div>

                                    <div id="billing-address" style="display: none;">
                                        <div class="row g-3">
                                            <div class="col-12">
                                                <label for="address" class="form-label">Street Address</label>
                                                <input type="text" class="form-control" id="address" name="address">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="city" class="form-label">City</label>
                                                <input type="text" class="form-control" id="city" name="city">
                                            </div>
                                            <div class="col-md-3">
                                                <label for="state" class="form-label">State</label>
                                                <input type="text" class="form-control" id="state" name="state">
                                            </div>
                                            <div class="col-md-3">
                                                <label for="zip" class="form-label">ZIP Code</label>
                                                <input type="text" class="form-control" id="zip" name="zip">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Terms and Conditions -->
                                <div class="mb-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="terms" required>
                                        <label class="form-check-label" for="terms">
                                            I agree to the <a href="#" class="text-decoration-none">Terms of Service</a> and
                                            <a href="#" class="text-decoration-none">Privacy Policy</a> *
                                        </label>
                                    </div>
                                    <div class="form-check mt-2">
                                        <input class="form-check-input" type="checkbox" id="newsletter">
                                        <label class="form-check-label" for="newsletter">
                                            Subscribe to event updates and newsletters
                                        </label>
                                    </div>
                                </div>

                                <!-- Submit Button -->
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-gradient btn-lg" id="submitBtn">
                                        <i class="fas fa-lock me-2"></i>
                                        <span id="btnText">Complete Payment - $207.98</span>
                                        <span id="btnSpinner" class="spinner-border spinner-border-sm ms-2" style="display: none;"></span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Payment method toggle
    const creditCardRadio = document.getElementById('credit_card');
    const paypalRadio = document.getElementById('paypal');
    const creditCardForm = document.getElementById('credit-card-form');
    const paypalForm = document.getElementById('paypal-form');

    function togglePaymentMethod() {
        if (paypalRadio.checked) {
            creditCardForm.style.display = 'none';
            paypalForm.style.display = 'block';
        } else {
            creditCardForm.style.display = 'block';
            paypalForm.style.display = 'none';
        }
    }

    creditCardRadio.addEventListener('change', togglePaymentMethod);
    paypalRadio.addEventListener('change', togglePaymentMethod);

    // Billing address toggle
    const sameAsContactCheck = document.getElementById('same_as_contact');
    const billingAddress = document.getElementById('billing-address');

    sameAsContactCheck.addEventListener('change', function() {
        billingAddress.style.display = this.checked ? 'none' : 'block';
    });

    // Card number formatting
    const cardNumberInput = document.getElementById('card_number');
    cardNumberInput.addEventListener('input', function(e) {
        let value = e.target.value.replace(/\s/g, '').replace(/[^0-9]/gi, '');
        let formattedValue = value.match(/.{1,4}/g)?.join(' ') || value;
        this.value = formattedValue;
    });

    // Expiry date formatting
    const expiryInput = document.getElementById('expiry_date');
    expiryInput.addEventListener('input', function(e) {
        let value = e.target.value.replace(/\D/g, '');
        if (value.length >= 2) {
            value = value.substring(0, 2) + '/' + value.substring(2, 4);
        }
        this.value = value;
    });

    // CVV formatting
    const cvvInput = document.getElementById('cvv');
    cvvInput.addEventListener('input', function(e) {
        this.value = this.value.replace(/[^0-9]/g, '');
    });

    // Form submission
    const form = document.getElementById('paymentForm');
    const submitBtn = document.getElementById('submitBtn');
    const btnText = document.getElementById('btnText');
    const btnSpinner = document.getElementById('btnSpinner');

    form.addEventListener('submit', function(e) {
        e.preventDefault();

        // Show loading state
        submitBtn.disabled = true;
        btnText.textContent = 'Processing Payment...';
        btnSpinner.style.display = 'inline-block';

        // Simulate payment processing
        setTimeout(function() {
            // Redirect to confirmation page
            window.location.href = '/tickets/confirmation';
        }, 3000);
    });
});

function applyPromoCode() {
    const promoCode = document.getElementById('promoCode').value;
    const promoMessage = document.getElementById('promoMessage');

    if (promoCode.toLowerCase() === 'save10') {
        promoMessage.innerHTML = '<small class="text-success"><i class="fas fa-check me-1"></i>Promo code applied! $20.80 discount</small>';
        // Update total here
    } else if (promoCode) {
        promoMessage.innerHTML = '<small class="text-danger"><i class="fas fa-times me-1"></i>Invalid promo code</small>';
    }
}
</script>
@endpush
@endsection
