@extends('layouts.app')

@section('title', 'Help & Support Center - EventSmart')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <!-- Header -->
        <div class="col-12 mb-4">
            <div class="text-center">
                <h1 class="mb-3">How can we help you?</h1>
                <p class="text-muted mb-4">Find answers to common questions or get in touch with our support team</p>

                <!-- Search Help -->
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="input-group input-group-lg">
                            <span class="input-group-text">
                                <i class="fas fa-search"></i>
                            </span>
                            <input type="text" class="form-control" id="helpSearch"
                                   placeholder="Search for help articles...">
                            <button class="btn btn-gradient" type="button" onclick="searchHelp()">
                                Search
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="col-12 mb-5">
            <div class="row g-4">
                <div class="col-md-3">
                    <div class="card border-0 shadow-sm h-100 text-center quick-action-card">
                        <div class="card-body">
                            <div class="bg-primary bg-opacity-10 rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center"
                                 style="width: 60px; height: 60px;">
                                <i class="fas fa-ticket-alt fa-2x text-primary"></i>
                            </div>
                            <h6 class="card-title">Event Registration</h6>
                            <p class="card-text text-muted small">Learn how to register for events, manage tickets, and access your bookings</p>
                            <a href="#registration-help" class="btn btn-outline-primary btn-sm">Get Help</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card border-0 shadow-sm h-100 text-center quick-action-card">
                        <div class="card-body">
                            <div class="bg-success bg-opacity-10 rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center"
                                 style="width: 60px; height: 60px;">
                                <i class="fas fa-credit-card fa-2x text-success"></i>
                            </div>
                            <h6 class="card-title">Payment & Billing</h6>
                            <p class="card-text text-muted small">Get help with payments, refunds, and billing questions</p>
                            <a href="#payment-help" class="btn btn-outline-success btn-sm">Get Help</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card border-0 shadow-sm h-100 text-center quick-action-card">
                        <div class="card-body">
                            <div class="bg-info bg-opacity-10 rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center"
                                 style="width: 60px; height: 60px;">
                                <i class="fas fa-calendar-plus fa-2x text-info"></i>
                            </div>
                            <h6 class="card-title">Event Creation</h6>
                            <p class="card-text text-muted small">Learn how to create and manage your own events</p>
                            <a href="#creation-help" class="btn btn-outline-info btn-sm">Get Help</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card border-0 shadow-sm h-100 text-center quick-action-card">
                        <div class="card-body">
                            <div class="bg-warning bg-opacity-10 rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center"
                                 style="width: 60px; height: 60px;">
                                <i class="fas fa-user-cog fa-2x text-warning"></i>
                            </div>
                            <h6 class="card-title">Account Settings</h6>
                            <p class="card-text text-muted small">Manage your profile, preferences, and account security</p>
                            <a href="#account-help" class="btn btn-outline-warning btn-sm">Get Help</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- FAQ Section -->
            <div class="col-lg-8 mb-5">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white border-0 py-3">
                        <h5 class="card-title mb-0">Frequently Asked Questions</h5>
                    </div>
                    <div class="card-body">
                        <div class="accordion" id="faqAccordion">
                            <!-- FAQ Item 1 -->
                            <div class="accordion-item border-0 mb-3">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed bg-light border-0 rounded" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#faq1">
                                        How do I register for an event?
                                    </button>
                                </h2>
                                <div id="faq1" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        <p>To register for an event:</p>
                                        <ol>
                                            <li>Browse events on our homepage or use the search function</li>
                                            <li>Click on the event you're interested in</li>
                                            <li>Review the event details and click "Register Now"</li>
                                            <li>Fill in your personal information and select ticket type</li>
                                            <li>Complete payment process</li>
                                            <li>You'll receive a confirmation email with your ticket</li>
                                        </ol>
                                        <p>If you encounter any issues during registration, please contact our support team.</p>
                                    </div>
                                </div>
                            </div>

                            <!-- FAQ Item 2 -->
                            <div class="accordion-item border-0 mb-3">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed bg-light border-0 rounded" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#faq2">
                                        What payment methods do you accept?
                                    </button>
                                </h2>
                                <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        <p>We accept the following payment methods:</p>
                                        <ul>
                                            <li><strong>Credit/Debit Cards:</strong> Visa, MasterCard, American Express, Discover</li>
                                            <li><strong>Digital Wallets:</strong> PayPal, Apple Pay, Google Pay</li>
                                            <li><strong>Bank Transfer:</strong> For corporate bookings over $500</li>
                                        </ul>
                                        <p>All payments are processed securely using SSL encryption.</p>
                                    </div>
                                </div>
                            </div>

                            <!-- FAQ Item 3 -->
                            <div class="accordion-item border-0 mb-3">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed bg-light border-0 rounded" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#faq3">
                                        Can I get a refund if I can't attend?
                                    </button>
                                </h2>
                                <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        <p>Our refund policy varies by event organizer, but generally:</p>
                                        <ul>
                                            <li><strong>Full Refund:</strong> 30+ days before event</li>
                                            <li><strong>50% Refund:</strong> 15-29 days before event</li>
                                            <li><strong>25% Refund:</strong> 7-14 days before event</li>
                                            <li><strong>No Refund:</strong> Less than 7 days before event</li>
                                        </ul>
                                        <p>Check the specific event's refund policy on the event page. You can request refunds from your dashboard.</p>
                                    </div>
                                </div>
                            </div>

                            <!-- FAQ Item 4 -->
                            <div class="accordion-item border-0 mb-3">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed bg-light border-0 rounded" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#faq4">
                                        How do I access my tickets?
                                    </button>
                                </h2>
                                <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        <p>You can access your tickets in several ways:</p>
                                        <ul>
                                            <li><strong>Email:</strong> Check your confirmation email for ticket attachment</li>
                                            <li><strong>Dashboard:</strong> Log in to your account and visit "My Tickets"</li>
                                            <li><strong>Mobile App:</strong> Download our mobile app for easy access</li>
                                            <li><strong>QR Code:</strong> Show the QR code on your phone at the event</li>
                                        </ul>
                                        <p>We recommend downloading tickets to your phone before the event.</p>
                                    </div>
                                </div>
                            </div>

                            <!-- FAQ Item 5 -->
                            <div class="accordion-item border-0 mb-3">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed bg-light border-0 rounded" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#faq5">
                                        How do I create my own event?
                                    </button>
                                </h2>
                                <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        <p>Creating an event is easy:</p>
                                        <ol>
                                            <li>Log in to your account and click "Create Event"</li>
                                            <li>Fill in event details (title, description, date, location)</li>
                                            <li>Set ticket types and pricing</li>
                                            <li>Upload event images and additional information</li>
                                            <li>Review and publish your event</li>
                                        </ol>
                                        <p>Our team reviews all events within 24 hours before they go live.</p>
                                    </div>
                                </div>
                            </div>

                            <!-- FAQ Item 6 -->
                            <div class="accordion-item border-0 mb-3">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed bg-light border-0 rounded" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#faq6">
                                        What are the platform fees?
                                    </button>
                                </h2>
                                <div id="faq6" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        <p>Our platform fees are transparent and competitive:</p>
                                        <ul>
                                            <li><strong>Free Events:</strong> No platform fee</li>
                                            <li><strong>Paid Events:</strong> 2.9% + $0.30 per ticket</li>
                                            <li><strong>Enterprise Plans:</strong> Custom pricing available</li>
                                        </ul>
                                        <p>Payment processing fees are included in our platform fee. No hidden charges!</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="text-center mt-4">
                            <p class="text-muted">Can't find what you're looking for?</p>
                            <button class="btn btn-outline-primary" onclick="showContactForm()">
                                Contact Support
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Support Sidebar -->
            <div class="col-lg-4">
                <!-- Contact Support -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-white border-0 py-3">
                        <h6 class="card-title mb-0">Need More Help?</h6>
                    </div>
                    <div class="card-body">
                        <div class="d-grid gap-3">
                            <button class="btn btn-gradient" onclick="showContactForm()">
                                <i class="fas fa-envelope me-2"></i>Contact Support
                            </button>
                            <button class="btn btn-outline-primary" onclick="startLiveChat()">
                                <i class="fas fa-comments me-2"></i>Live Chat
                            </button>
                            <a href="tel:+1-800-123-4567" class="btn btn-outline-secondary">
                                <i class="fas fa-phone me-2"></i>Call Us: (800) 123-4567
                            </a>
                        </div>
                        <hr>
                        <div class="text-center">
                            <h6>Support Hours</h6>
                            <p class="text-muted small mb-0">
                                <strong>Monday - Friday:</strong> 9 AM - 6 PM EST<br>
                                <strong>Saturday:</strong> 10 AM - 4 PM EST<br>
                                <strong>Sunday:</strong> Closed
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Popular Articles -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-white border-0 py-3">
                        <h6 class="card-title mb-0">Popular Articles</h6>
                    </div>
                    <div class="card-body">
                        <div class="list-group list-group-flush">
                            <a href="#" class="list-group-item list-group-item-action border-0 px-0">
                                <div class="d-flex align-items-start">
                                    <i class="fas fa-file-alt text-primary me-3 mt-1"></i>
                                    <div>
                                        <h6 class="mb-1">Getting Started Guide</h6>
                                        <small class="text-muted">Complete guide for new users</small>
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action border-0 px-0">
                                <div class="d-flex align-items-start">
                                    <i class="fas fa-mobile-alt text-success me-3 mt-1"></i>
                                    <div>
                                        <h6 class="mb-1">Mobile App Guide</h6>
                                        <small class="text-muted">How to use our mobile app</small>
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action border-0 px-0">
                                <div class="d-flex align-items-start">
                                    <i class="fas fa-shield-alt text-info me-3 mt-1"></i>
                                    <div>
                                        <h6 class="mb-1">Security & Privacy</h6>
                                        <small class="text-muted">How we protect your data</small>
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action border-0 px-0">
                                <div class="d-flex align-items-start">
                                    <i class="fas fa-chart-line text-warning me-3 mt-1"></i>
                                    <div>
                                        <h6 class="mb-1">Event Analytics</h6>
                                        <small class="text-muted">Understanding your event data</small>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Community -->
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white border-0 py-3">
                        <h6 class="card-title mb-0">Community</h6>
                    </div>
                    <div class="card-body">
                        <p class="text-muted small mb-3">Join our community to connect with other users and get tips</p>
                        <div class="d-grid gap-2">
                            <a href="#" class="btn btn-outline-primary btn-sm">
                                <i class="fab fa-discord me-2"></i>Discord Community
                            </a>
                            <a href="#" class="btn btn-outline-info btn-sm">
                                <i class="fab fa-facebook me-2"></i>Facebook Group
                            </a>
                            <a href="#" class="btn btn-outline-secondary btn-sm">
                                <i class="fas fa-blog me-2"></i>Knowledge Base
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Contact Support Modal -->
<div class="modal fade" id="contactModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Contact Support</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="contactForm">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <label class="form-label">First Name *</label>
                            <input type="text" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Last Name *</label>
                            <input type="text" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Email Address *</label>
                            <input type="email" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Phone Number</label>
                            <input type="tel" class="form-control">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Category *</label>
                            <select class="form-select" required>
                                <option value="">Select a category...</option>
                                <option value="registration">Event Registration</option>
                                <option value="payment">Payment & Billing</option>
                                <option value="technical">Technical Issues</option>
                                <option value="account">Account Settings</option>
                                <option value="event-creation">Event Creation</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Subject *</label>
                            <input type="text" class="form-control" placeholder="Brief description of your issue" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Message *</label>
                            <textarea class="form-control" rows="5" placeholder="Please provide detailed information about your issue..." required></textarea>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Priority</label>
                            <select class="form-select">
                                <option value="low">Low - General question</option>
                                <option value="medium" selected>Medium - Issue affecting usage</option>
                                <option value="high">High - Urgent issue</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="emailUpdates">
                                <label class="form-check-label" for="emailUpdates">
                                    I would like to receive email updates about my support request
                                </label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-gradient" onclick="submitContactForm()">Send Message</button>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    initializeHelpPage();
});

function initializeHelpPage() {
    // Initialize search on enter
    document.getElementById('helpSearch').addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            searchHelp();
        }
    });
}

function searchHelp() {
    const query = document.getElementById('helpSearch').value;
    if (query.trim()) {
        showNotification(`Searching for "${query}"...`, 'info');

        setTimeout(() => {
            showNotification('Search completed! Found 5 relevant articles.', 'success');
        }, 1000);
    }
}

function showContactForm() {
    const modal = new bootstrap.Modal(document.getElementById('contactModal'));
    modal.show();
}

function startLiveChat() {
    showNotification('Connecting you to live chat...', 'info');

    setTimeout(() => {
        showNotification('Live chat is currently unavailable. Please try again later or contact us via email.', 'warning');
    }, 2000);
}

function submitContactForm() {
    const form = document.getElementById('contactForm');

    if (form.checkValidity()) {
        showNotification('Your message has been sent successfully! We will respond within 24 hours.', 'success');

        // Close modal and reset form
        const modal = bootstrap.Modal.getInstance(document.getElementById('contactModal'));
        modal.hide();
        form.reset();
    } else {
        form.reportValidity();
    }
}

function showNotification(message, type) {
    const notification = document.createElement('div');
    notification.className = `alert alert-${type === 'success' ? 'success' : type === 'error' ? 'danger' : type === 'warning' ? 'warning' : 'info'} alert-dismissible fade show position-fixed`;
    notification.style.cssText = 'top: 20px; right: 20px; z-index: 1050; min-width: 300px;';
    notification.innerHTML = `
        <i class="fas fa-${type === 'success' ? 'check-circle' : type === 'error' ? 'exclamation-circle' : type === 'warning' ? 'exclamation-triangle' : 'info-circle'} me-2"></i>
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
</script>
@endpush

<style>
.quick-action-card {
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}

.quick-action-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15) !important;
}

.accordion-button {
    font-weight: 600;
    color: #1f2937;
}

.accordion-button:not(.collapsed) {
    background-color: rgb(99, 102, 241);
    color: white;
    box-shadow: none;
}

.accordion-button:focus {
    box-shadow: none;
    border-color: rgb(99, 102, 241);
}

.list-group-item-action:hover {
    background-color: rgba(99, 102, 241, 0.05);
    border-radius: 0.375rem;
}

.list-group-item-action {
    transition: background-color 0.2s ease;
}
</style>
@endsection
