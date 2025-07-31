@extends('layouts.app')

@section('title', 'Register for Tech Conference 2024 - EventSmart')

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
                            <div class="bg-success" style="width: 50px; height: 2px;"></div>
                        </div>

                        <div class="d-flex align-items-center">
                            <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center mx-3"
                                 style="width: 40px; height: 40px;">
                                <i class="fas fa-user-plus"></i>
                            </div>
                            <span class="me-3 text-primary fw-bold">Registration</span>
                            <div class="bg-muted" style="width: 50px; height: 2px;"></div>
                        </div>

                        <div class="d-flex align-items-center">
                            <div class="bg-muted text-muted rounded-circle d-flex align-items-center justify-content-center mx-3"
                                 style="width: 40px; height: 40px;">
                                <i class="fas fa-credit-card"></i>
                            </div>
                            <span class="text-muted">Payment</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Event Summary -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-light border-0 py-3">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-calendar text-primary me-2"></i>Event Summary
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-md-3">
                            <img src="https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=120&h=80&fit=crop"
                                 class="img-fluid rounded" alt="Event">
                        </div>
                        <div class="col-md-6">
                            <h6 class="mb-1">Tech Conference 2024</h6>
                            <p class="text-muted mb-2">The Future of Technology</p>
                            <div class="small text-muted">
                                <div><i class="fas fa-calendar me-1"></i>March 15, 2024 • 10:00 AM - 6:00 PM</div>
                                <div><i class="fas fa-map-marker-alt me-1"></i>Convention Center, New York</div>
                            </div>
                        </div>
                        <div class="col-md-3 text-end">
                            <div class="mb-1">
                                <span class="badge bg-primary">Regular Ticket</span>
                            </div>
                            <div class="h5 text-primary mb-0">$99.00</div>
                            <small class="text-muted">Quantity: 1</small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Registration Form -->
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-0 py-3">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-user-plus text-primary me-2"></i>Registration Details
                    </h5>
                </div>
                <div class="card-body p-4">
                    <form id="registrationForm" method="POST" action="/events/register/process">
                        @csrf

                        <!-- Personal Information -->
                        <div class="mb-4">
                            <h6 class="mb-3">Personal Information</h6>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="first_name" class="form-label">First Name *</label>
                                    <input type="text" class="form-control" id="first_name" name="first_name"
                                           value="{{ auth()->user()->first_name ?? '' }}" required>
                                    <div class="invalid-feedback">Please provide your first name.</div>
                                </div>
                                <div class="col-md-6">
                                    <label for="last_name" class="form-label">Last Name *</label>
                                    <input type="text" class="form-control" id="last_name" name="last_name"
                                           value="{{ auth()->user()->last_name ?? '' }}" required>
                                    <div class="invalid-feedback">Please provide your last name.</div>
                                </div>
                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email Address *</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                           value="{{ auth()->user()->email ?? '' }}" required>
                                    <div class="invalid-feedback">Please provide a valid email address.</div>
                                </div>
                                <div class="col-md-6">
                                    <label for="phone" class="form-label">Phone Number *</label>
                                    <input type="tel" class="form-control" id="phone" name="phone"
                                           value="{{ auth()->user()->phone ?? '' }}" required>
                                    <div class="invalid-feedback">Please provide your phone number.</div>
                                </div>
                            </div>
                        </div>

                        <!-- Professional Information -->
                        <div class="mb-4">
                            <h6 class="mb-3">Professional Information</h6>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="job_title" class="form-label">Job Title</label>
                                    <input type="text" class="form-control" id="job_title" name="job_title"
                                           placeholder="e.g., Software Engineer">
                                </div>
                                <div class="col-md-6">
                                    <label for="company" class="form-label">Company/Organization</label>
                                    <input type="text" class="form-control" id="company" name="company"
                                           placeholder="e.g., TechCorp Inc.">
                                </div>
                                <div class="col-md-6">
                                    <label for="industry" class="form-label">Industry</label>
                                    <select class="form-select" id="industry" name="industry">
                                        <option value="">Select Industry</option>
                                        <option value="technology">Technology</option>
                                        <option value="finance">Finance</option>
                                        <option value="healthcare">Healthcare</option>
                                        <option value="education">Education</option>
                                        <option value="manufacturing">Manufacturing</option>
                                        <option value="retail">Retail</option>
                                        <option value="consulting">Consulting</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="experience_level" class="form-label">Experience Level</label>
                                    <select class="form-select" id="experience_level" name="experience_level">
                                        <option value="">Select Experience Level</option>
                                        <option value="entry">Entry Level (0-2 years)</option>
                                        <option value="mid">Mid Level (3-5 years)</option>
                                        <option value="senior">Senior Level (6-10 years)</option>
                                        <option value="executive">Executive (10+ years)</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Event Preferences -->
                        <div class="mb-4">
                            <h6 class="mb-3">Event Preferences</h6>
                            <div class="row g-3">
                                <div class="col-12">
                                    <label class="form-label">Dietary Restrictions</label>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="dietary_none"
                                                       name="dietary_restrictions[]" value="none" checked>
                                                <label class="form-check-label" for="dietary_none">None</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="dietary_vegetarian"
                                                       name="dietary_restrictions[]" value="vegetarian">
                                                <label class="form-check-label" for="dietary_vegetarian">Vegetarian</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="dietary_vegan"
                                                       name="dietary_restrictions[]" value="vegan">
                                                <label class="form-check-label" for="dietary_vegan">Vegan</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="dietary_gluten_free"
                                                       name="dietary_restrictions[]" value="gluten_free">
                                                <label class="form-check-label" for="dietary_gluten_free">Gluten Free</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label class="form-label">Accessibility Requirements</label>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="accessibility_wheelchair"
                                                       name="accessibility_requirements[]" value="wheelchair">
                                                <label class="form-check-label" for="accessibility_wheelchair">Wheelchair Access</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="accessibility_hearing"
                                                       name="accessibility_requirements[]" value="hearing">
                                                <label class="form-check-label" for="accessibility_hearing">Hearing Assistance</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="accessibility_visual"
                                                       name="accessibility_requirements[]" value="visual">
                                                <label class="form-check-label" for="accessibility_visual">Visual Assistance</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label for="session_interests" class="form-label">Session Interests</label>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="interest_ai"
                                                       name="session_interests[]" value="ai">
                                                <label class="form-check-label" for="interest_ai">Artificial Intelligence</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="interest_blockchain"
                                                       name="session_interests[]" value="blockchain">
                                                <label class="form-check-label" for="interest_blockchain">Blockchain</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="interest_cloud"
                                                       name="session_interests[]" value="cloud">
                                                <label class="form-check-label" for="interest_cloud">Cloud Computing</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="interest_security"
                                                       name="session_interests[]" value="security">
                                                <label class="form-check-label" for="interest_security">Cybersecurity</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="interest_mobile"
                                                       name="session_interests[]" value="mobile">
                                                <label class="form-check-label" for="interest_mobile">Mobile Development</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="interest_networking"
                                                       name="session_interests[]" value="networking">
                                                <label class="form-check-label" for="interest_networking">Networking</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Additional Information -->
                        <div class="mb-4">
                            <h6 class="mb-3">Additional Information</h6>
                            <div class="row g-3">
                                <div class="col-12">
                                    <label for="how_heard" class="form-label">How did you hear about this event?</label>
                                    <select class="form-select" id="how_heard" name="how_heard">
                                        <option value="">Select an option</option>
                                        <option value="social_media">Social Media</option>
                                        <option value="email">Email Newsletter</option>
                                        <option value="website">Company Website</option>
                                        <option value="friend">Friend/Colleague</option>
                                        <option value="search_engine">Search Engine</option>
                                        <option value="advertisement">Advertisement</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label for="special_requests" class="form-label">Special Requests or Comments</label>
                                    <textarea class="form-control" id="special_requests" name="special_requests"
                                              rows="3" placeholder="Any special requests or additional information..."></textarea>
                                </div>
                            </div>
                        </div>

                        <!-- Emergency Contact -->
                        <div class="mb-4">
                            <h6 class="mb-3">Emergency Contact (Optional)</h6>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="emergency_name" class="form-label">Emergency Contact Name</label>
                                    <input type="text" class="form-control" id="emergency_name" name="emergency_name">
                                </div>
                                <div class="col-md-6">
                                    <label for="emergency_phone" class="form-label">Emergency Contact Phone</label>
                                    <input type="tel" class="form-control" id="emergency_phone" name="emergency_phone">
                                </div>
                                <div class="col-12">
                                    <label for="emergency_relationship" class="form-label">Relationship</label>
                                    <input type="text" class="form-control" id="emergency_relationship" name="emergency_relationship"
                                           placeholder="e.g., Spouse, Parent, Friend">
                                </div>
                            </div>
                        </div>

                        <!-- Terms and Conditions -->
                        <div class="mb-4">
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" id="terms_conditions" required>
                                <label class="form-check-label" for="terms_conditions">
                                    I agree to the <a href="/terms" target="_blank" class="text-decoration-none">Terms and Conditions</a> and
                                    <a href="/privacy" target="_blank" class="text-decoration-none">Privacy Policy</a> *
                                </label>
                                <div class="invalid-feedback">You must agree to the terms and conditions.</div>
                            </div>

                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" id="photo_consent">
                                <label class="form-check-label" for="photo_consent">
                                    I consent to photography and video recording during the event for promotional purposes
                                </label>
                            </div>

                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" id="marketing_emails">
                                <label class="form-check-label" for="marketing_emails">
                                    I would like to receive marketing emails about future events and updates
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="data_sharing">
                                <label class="form-check-label" for="data_sharing">
                                    I consent to sharing my contact information with event sponsors for networking purposes
                                </label>
                            </div>
                        </div>

                        <!-- Submit Buttons -->
                        <div class="d-flex gap-3 justify-content-between">
                            <a href="/events/tech-conference-2024" class="btn btn-outline-secondary">
                                <i class="fas fa-arrow-left me-2"></i>Back to Event
                            </a>
                            <div class="d-flex gap-2">
                                <button type="button" class="btn btn-outline-primary" onclick="saveDraft()">
                                    <i class="fas fa-save me-2"></i>Save Draft
                                </button>
                                <button type="submit" class="btn btn-gradient" id="submitBtn">
                                    <i class="fas fa-arrow-right me-2"></i>
                                    <span id="btnText">Continue to Payment</span>
                                    <span id="btnSpinner" class="spinner-border spinner-border-sm ms-2" style="display: none;"></span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Form validation
    const form = document.getElementById('registrationForm');

    // Handle dietary restrictions - uncheck "none" when others are selected
    const noneCheckbox = document.getElementById('dietary_none');
    const otherDietaryCheckboxes = document.querySelectorAll('input[name="dietary_restrictions[]"]:not(#dietary_none)');

    otherDietaryCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            if (this.checked) {
                noneCheckbox.checked = false;
            }
        });
    });

    noneCheckbox.addEventListener('change', function() {
        if (this.checked) {
            otherDietaryCheckboxes.forEach(cb => cb.checked = false);
        }
    });

    // Form submission
    form.addEventListener('submit', function(e) {
        e.preventDefault();

        if (!form.checkValidity()) {
            e.stopPropagation();
            form.classList.add('was-validated');
            return;
        }

        // Show loading state
        const submitBtn = document.getElementById('submitBtn');
        const btnText = document.getElementById('btnText');
        const btnSpinner = document.getElementById('btnSpinner');

        submitBtn.disabled = true;
        btnText.textContent = 'Processing...';
        btnSpinner.style.display = 'inline-block';

        // Simulate form processing
        setTimeout(function() {
            // Store registration data and redirect to payment
            const formData = new FormData(form);
            const registrationData = Object.fromEntries(formData.entries());

            // Store in session storage for payment page
            sessionStorage.setItem('registrationData', JSON.stringify(registrationData));

            // Redirect to payment
            window.location.href = '/tickets/payment?event=tech-conference-2024&registration=complete';
        }, 2000);
    });
});

function saveDraft() {
    const form = document.getElementById('registrationForm');
    const formData = new FormData(form);
    const draftData = Object.fromEntries(formData.entries());

    // Save to localStorage
    localStorage.setItem('eventRegistrationDraft', JSON.stringify(draftData));

    showNotification('Registration draft saved successfully!', 'success');
}

// Load draft data if available
function loadDraft() {
    const draftData = localStorage.getItem('eventRegistrationDraft');
    if (draftData) {
        const data = JSON.parse(draftData);
        Object.keys(data).forEach(key => {
            const element = document.querySelector(`[name="${key}"]`);
            if (element) {
                if (element.type === 'checkbox' || element.type === 'radio') {
                    element.checked = data[key] === element.value;
                } else {
                    element.value = data[key];
                }
            }
        });
    }
}

function showNotification(message, type) {
    const notification = document.createElement('div');
    notification.className = `alert alert-${type === 'success' ? 'success' : type === 'error' ? 'danger' : 'info'} alert-dismissible fade show position-fixed`;
    notification.style.cssText = 'top: 20px; right: 20px; z-index: 1050; min-width: 300px;';
    notification.innerHTML = `
        <i class="fas fa-${type === 'success' ? 'check-circle' : type === 'error' ? 'exclamation-circle' : 'info-circle'} me-2"></i>
        ${message}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    `;

    document.body.appendChild(notification);

    setTimeout(() => {
        if (notification.parentNode) {
            notification.remove();
        }
    }, 5000);
}

// Load draft on page load
window.addEventListener('load', loadDraft);
</script>
@endpush
@endsection
