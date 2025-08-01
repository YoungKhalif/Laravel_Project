@extends('layouts.app')

@section('title', 'Help & FAQ - EventSmart')

@section('content')
<div class="container py-5">
    <!-- Header -->
    <div class="row mb-5">
        <div class="col-12 text-center">
            <h1 class="display-4 fw-bold mb-3">Help & Support</h1>
            <p class="lead text-muted">Find answers to common questions and get the help you need</p>
        </div>
    </div>

    <!-- Search -->
    <div class="row mb-5">
        <div class="col-md-8 mx-auto">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="input-group input-group-lg">
                        <span class="input-group-text bg-white border-end-0">
                            <i class="fas fa-search text-muted"></i>
                        </span>
                        <input type="text" class="form-control border-start-0" 
                               placeholder="Search for help articles..." 
                               id="helpSearch">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Help Cards -->
    <div class="row g-4 mb-5">
        <div class="col-md-4">
            <div class="card h-100 border-0 shadow-sm card-hover">
                <div class="card-body text-center">
                    <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                        <i class="fas fa-calendar-plus fa-lg"></i>
                    </div>
                    <h5>Creating Events</h5>
                    <p class="text-muted">Learn how to create and manage your events</p>
                    <a href="#events" class="btn btn-outline-primary">Learn More</a>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card h-100 border-0 shadow-sm card-hover">
                <div class="card-body text-center">
                    <div class="bg-success text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                        <i class="fas fa-ticket-alt fa-lg"></i>
                    </div>
                    <h5>Buying Tickets</h5>
                    <p class="text-muted">Everything about purchasing and managing tickets</p>
                    <a href="#tickets" class="btn btn-outline-success">Learn More</a>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card h-100 border-0 shadow-sm card-hover">
                <div class="card-body text-center">
                    <div class="bg-info text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                        <i class="fas fa-credit-card fa-lg"></i>
                    </div>
                    <h5>Payments & Refunds</h5>
                    <p class="text-muted">Payment methods, billing, and refund policies</p>
                    <a href="#payments" class="btn btn-outline-info">Learn More</a>
                </div>
            </div>
        </div>
    </div>

    <!-- FAQ Section -->
    <div class="row">
        <div class="col-lg-3">
            <!-- FAQ Categories -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white">
                    <h5 class="mb-0">Categories</h5>
                </div>
                <div class="list-group list-group-flush">
                    <a href="#general" class="list-group-item list-group-item-action">
                        <i class="fas fa-question-circle me-2"></i>General
                    </a>
                    <a href="#account" class="list-group-item list-group-item-action">
                        <i class="fas fa-user me-2"></i>Account & Profile
                    </a>
                    <a href="#events" class="list-group-item list-group-item-action">
                        <i class="fas fa-calendar me-2"></i>Creating Events
                    </a>
                    <a href="#tickets" class="list-group-item list-group-item-action">
                        <i class="fas fa-ticket-alt me-2"></i>Tickets & Registration
                    </a>
                    <a href="#payments" class="list-group-item list-group-item-action">
                        <i class="fas fa-credit-card me-2"></i>Payments & Billing
                    </a>
                    <a href="#technical" class="list-group-item list-group-item-action">
                        <i class="fas fa-cog me-2"></i>Technical Issues
                    </a>
                </div>
            </div>

            <!-- Contact Card -->
            <div class="card border-0 shadow-sm">
                <div class="card-body text-center">
                    <h5>Still Need Help?</h5>
                    <p class="text-muted mb-3">Can't find what you're looking for?</p>
                    <a href="{{ route('contact') }}" class="btn btn-primary mb-2 d-block">Contact Support</a>
                    <a href="mailto:support@eventpro.com" class="btn btn-outline-secondary d-block">
                        <i class="fas fa-envelope me-2"></i>Email Us
                    </a>
                </div>
            </div>
        </div>

        <div class="col-lg-9">
            <!-- General FAQ -->
            <div id="general" class="mb-5">
                <h3 class="mb-4">General Questions</h3>
                <div class="accordion" id="generalAccordion">
                    <div class="accordion-item border-0 shadow-sm mb-3">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#general1">
                                What is EventPro and how does it work?
                            </button>
                        </h2>
                        <div id="general1" class="accordion-collapse collapse show" data-bs-parent="#generalAccordion">
                            <div class="accordion-body">
                                EventPro is a comprehensive event management platform that allows organizers to create, promote, and manage events while providing attendees with an easy way to discover and register for events. Whether you're hosting a small workshop or a large conference, EventPro provides all the tools you need for successful event management.
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item border-0 shadow-sm mb-3">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#general2">
                                Is EventPro free to use?
                            </button>
                        </h2>
                        <div id="general2" class="accordion-collapse collapse" data-bs-parent="#generalAccordion">
                            <div class="accordion-body">
                                EventPro offers both free and paid plans. You can create free events with basic features at no cost. For advanced features like custom branding, analytics, and premium support, we offer paid plans starting at $29/month.
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item border-0 shadow-sm mb-3">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#general3">
                                How do I get started with EventPro?
                            </button>
                        </h2>
                        <div id="general3" class="accordion-collapse collapse" data-bs-parent="#generalAccordion">
                            <div class="accordion-body">
                                Getting started is easy! Simply sign up for a free account, complete your profile, and you can immediately start creating events or browsing events to attend. Our setup wizard will guide you through creating your first event.
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Account FAQ -->
            <div id="account" class="mb-5">
                <h3 class="mb-4">Account & Profile</h3>
                <div class="accordion" id="accountAccordion">
                    <div class="accordion-item border-0 shadow-sm mb-3">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#account1">
                                How do I create an account?
                            </button>
                        </h2>
                        <div id="account1" class="accordion-collapse collapse" data-bs-parent="#accountAccordion">
                            <div class="accordion-body">
                                Click the "Sign Up" button in the top right corner of our homepage. Fill in your basic information including name, email, and password. You'll receive a confirmation email to verify your account.
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item border-0 shadow-sm mb-3">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#account2">
                                How do I reset my password?
                            </button>
                        </h2>
                        <div id="account2" class="accordion-collapse collapse" data-bs-parent="#accountAccordion">
                            <div class="accordion-body">
                                On the login page, click "Forgot Password?" Enter your email address and we'll send you a password reset link. Follow the instructions in the email to create a new password.
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item border-0 shadow-sm mb-3">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#account3">
                                How do I update my profile information?
                            </button>
                        </h2>
                        <div id="account3" class="accordion-collapse collapse" data-bs-parent="#accountAccordion">
                            <div class="accordion-body">
                                Go to your account settings by clicking your profile picture in the top right corner and selecting "Settings". From there, you can update your personal information, contact details, and preferences.
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Events FAQ -->
            <div id="events" class="mb-5">
                <h3 class="mb-4">Creating Events</h3>
                <div class="accordion" id="eventsAccordion">
                    <div class="accordion-item border-0 shadow-sm mb-3">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#events1">
                                How do I create my first event?
                            </button>
                        </h2>
                        <div id="events1" class="accordion-collapse collapse" data-bs-parent="#eventsAccordion">
                            <div class="accordion-body">
                                From your dashboard, click "Create Event". Fill in the event details including title, description, date, time, and location. Set up ticketing options if needed, then publish your event. You can preview your event before making it live.
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item border-0 shadow-sm mb-3">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#events2">
                                Can I edit an event after publishing?
                            </button>
                        </h2>
                        <div id="events2" class="accordion-collapse collapse" data-bs-parent="#eventsAccordion">
                            <div class="accordion-body">
                                Yes, you can edit most event details after publishing. However, certain changes (like date and time) will automatically notify registered attendees. Some restrictions apply for events with existing ticket sales.
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item border-0 shadow-sm mb-3">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#events3">
                                How do I promote my event?
                            </button>
                        </h2>
                        <div id="events3" class="accordion-collapse collapse" data-bs-parent="#eventsAccordion">
                            <div class="accordion-body">
                                EventPro provides several promotional tools including social media sharing buttons, email invitations, promotional codes, and event widgets for your website. Premium users also get access to our event directory and featured listings.
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tickets FAQ -->
            <div id="tickets" class="mb-5">
                <h3 class="mb-4">Tickets & Registration</h3>
                <div class="accordion" id="ticketsAccordion">
                    <div class="accordion-item border-0 shadow-sm mb-3">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#tickets1">
                                How do I register for an event?
                            </button>
                        </h2>
                        <div id="tickets1" class="accordion-collapse collapse" data-bs-parent="#ticketsAccordion">
                            <div class="accordion-body">
                                Find the event you want to attend and click "Register" or "Buy Tickets". Select your ticket type and quantity, fill in your information, and complete the payment process. You'll receive a confirmation email with your tickets.
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item border-0 shadow-sm mb-3">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#tickets2">
                                Where can I find my tickets?
                            </button>
                        </h2>
                        <div id="tickets2" class="accordion-collapse collapse" data-bs-parent="#ticketsAccordion">
                            <div class="accordion-body">
                                Your tickets are available in the "My Tickets" section of your account dashboard. You can also access them through the confirmation email sent after purchase. Each ticket includes a unique QR code for event entry.
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item border-0 shadow-sm mb-3">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#tickets3">
                                Can I transfer my ticket to someone else?
                            </button>
                        </h2>
                        <div id="tickets3" class="accordion-collapse collapse" data-bs-parent="#ticketsAccordion">
                            <div class="accordion-body">
                                Ticket transfer policies vary by event. Some organizers allow transfers while others don't. Check the event details or contact the organizer directly. If transfers are allowed, you can do this through your "My Tickets" page.
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Payments FAQ -->
            <div id="payments" class="mb-5">
                <h3 class="mb-4">Payments & Billing</h3>
                <div class="accordion" id="paymentsAccordion">
                    <div class="accordion-item border-0 shadow-sm mb-3">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#payments1">
                                What payment methods do you accept?
                            </button>
                        </h2>
                        <div id="payments1" class="accordion-collapse collapse" data-bs-parent="#paymentsAccordion">
                            <div class="accordion-body">
                                We accept all major credit cards (Visa, MasterCard, American Express), PayPal, Apple Pay, and Google Pay. All payments are processed securely through our encrypted payment system.
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item border-0 shadow-sm mb-3">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#payments2">
                                What is your refund policy?
                            </button>
                        </h2>
                        <div id="payments2" class="accordion-collapse collapse" data-bs-parent="#paymentsAccordion">
                            <div class="accordion-body">
                                Refund policies are set by individual event organizers. Most events offer full refunds if cancelled by the organizer. For attendee-initiated refunds, policies vary by event. Check the specific event's refund policy before purchasing.
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item border-0 shadow-sm mb-3">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#payments3">
                                I didn't receive my receipt. What should I do?
                            </button>
                        </h2>
                        <div id="payments3" class="accordion-collapse collapse" data-bs-parent="#paymentsAccordion">
                            <div class="accordion-body">
                                Check your email spam folder first. If you still can't find it, go to "My Tickets" in your account dashboard where you can download receipts for all your purchases. For further assistance, contact our support team.
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Technical FAQ -->
            <div id="technical" class="mb-5">
                <h3 class="mb-4">Technical Issues</h3>
                <div class="accordion" id="technicalAccordion">
                    <div class="accordion-item border-0 shadow-sm mb-3">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#technical1">
                                I'm having trouble logging in. What should I do?
                            </button>
                        </h2>
                        <div id="technical1" class="accordion-collapse collapse" data-bs-parent="#technicalAccordion">
                            <div class="accordion-body">
                                First, try resetting your password. If that doesn't work, clear your browser cache and cookies, or try using a different browser. Make sure you're using the correct email address associated with your account.
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item border-0 shadow-sm mb-3">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#technical2">
                                The website is loading slowly. How can I fix this?
                            </button>
                        </h2>
                        <div id="technical2" class="accordion-collapse collapse" data-bs-parent="#technicalAccordion">
                            <div class="accordion-body">
                                Slow loading can be caused by internet connectivity or browser issues. Try refreshing the page, clearing your browser cache, or switching to a different browser. If problems persist, check your internet connection or contact our support team.
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item border-0 shadow-sm mb-3">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#technical3">
                                My QR code isn't working at the event. What should I do?
                            </button>
                        </h2>
                        <div id="technical3" class="accordion-collapse collapse" data-bs-parent="#technicalAccordion">
                            <div class="accordion-body">
                                Make sure your phone screen brightness is turned up and the QR code is clearly visible. If scanning still fails, show your ticket number or confirmation email to event staff. They can manually check you in using your registration details.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact Section -->
    <div class="row mt-5">
        <div class="col-12">
            <div class="card border-0 shadow-sm bg-primary text-white">
                <div class="card-body text-center py-5">
                    <h3>Still Have Questions?</h3>
                    <p class="mb-4">Our support team is here to help you 24/7</p>
                    <div class="row justify-content-center">
                        <div class="col-md-4 mb-3">
                            <div class="d-flex align-items-center justify-content-center">
                                <i class="fas fa-envelope fa-2x me-3"></i>
                                <div class="text-start">
                                    <strong>Email Support</strong><br>
                                    <a href="mailto:support@eventpro.com" class="text-white">support@eventpro.com</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="d-flex align-items-center justify-content-center">
                                <i class="fas fa-phone fa-2x me-3"></i>
                                <div class="text-start">
                                    <strong>Phone Support</strong><br>
                                    <a href="tel:+1-555-123-4567" class="text-white">+1 (555) 123-4567</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="d-flex align-items-center justify-content-center">
                                <i class="fas fa-comments fa-2x me-3"></i>
                                <div class="text-start">
                                    <strong>Live Chat</strong><br>
                                    <span>Available 24/7</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
// Search functionality
document.getElementById('helpSearch').addEventListener('input', function(e) {
    const searchTerm = e.target.value.toLowerCase();
    const accordionItems = document.querySelectorAll('.accordion-item');
    
    accordionItems.forEach(item => {
        const text = item.textContent.toLowerCase();
        if (text.includes(searchTerm)) {
            item.style.display = 'block';
        } else {
            item.style.display = searchTerm === '' ? 'block' : 'none';
        }
    });
});

// Smooth scrolling for category links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});
</script>
@endsection
