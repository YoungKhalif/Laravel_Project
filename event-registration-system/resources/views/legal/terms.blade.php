@extends('layouts.app')

@section('title', 'Terms of Service - EventSmart')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-0 py-4">
                    <div class="text-center">
                        <h1 class="mb-2">Terms of Service</h1>
                        <p class="text-muted mb-0">Last updated: July 29, 2025</p>
                    </div>
                </div>
                <div class="card-body p-5">
                    <!-- Table of Contents -->
                    <div class="alert alert-primary bg-opacity-10 border-0 mb-5">
                        <h6 class="mb-3">Table of Contents</h6>
                        <div class="row">
                            <div class="col-md-6">
                                <ul class="list-unstyled mb-0">
                                    <li><a href="#acceptance" class="text-decoration-none">1. Acceptance of Terms</a></li>
                                    <li><a href="#description" class="text-decoration-none">2. Description of Service</a></li>
                                    <li><a href="#accounts" class="text-decoration-none">3. User Accounts</a></li>
                                    <li><a href="#content" class="text-decoration-none">4. User Content</a></li>
                                    <li><a href="#events" class="text-decoration-none">5. Event Creation & Management</a></li>
                                    <li><a href="#payments" class="text-decoration-none">6. Payments & Refunds</a></li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul class="list-unstyled mb-0">
                                    <li><a href="#conduct" class="text-decoration-none">7. Prohibited Conduct</a></li>
                                    <li><a href="#intellectual" class="text-decoration-none">8. Intellectual Property</a></li>
                                    <li><a href="#privacy" class="text-decoration-none">9. Privacy</a></li>
                                    <li><a href="#disclaimers" class="text-decoration-none">10. Disclaimers</a></li>
                                    <li><a href="#limitation" class="text-decoration-none">11. Limitation of Liability</a></li>
                                    <li><a href="#contact" class="text-decoration-none">12. Contact Information</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Terms Content -->
                    <section id="acceptance" class="mb-5">
                        <h3 class="text-primary mb-3">1. Acceptance of Terms</h3>
                        <p>Welcome to EventSmart! These Terms of Service ("Terms") govern your use of the EventSmart platform, website, and services (collectively, the "Service") operated by EventSmart Inc. ("we," "us," or "our").</p>
                        <p>By accessing or using our Service, you agree to be bound by these Terms. If you disagree with any part of these Terms, then you may not access the Service.</p>
                        <div class="alert alert-warning bg-opacity-10 border-0">
                            <i class="fas fa-exclamation-triangle me-2"></i>
                            <strong>Important:</strong> These Terms constitute a legally binding agreement between you and EventSmart Inc.
                        </div>
                    </section>

                    <section id="description" class="mb-5">
                        <h3 class="text-primary mb-3">2. Description of Service</h3>
                        <p>EventSmart is a platform that enables users to:</p>
                        <ul>
                            <li>Discover and register for events</li>
                            <li>Create and manage their own events</li>
                            <li>Process payments and ticket sales</li>
                            <li>Connect with other event attendees and organizers</li>
                            <li>Access event-related tools and analytics</li>
                        </ul>
                        <p>We reserve the right to modify, suspend, or discontinue any aspect of the Service at any time, with or without notice.</p>
                    </section>

                    <section id="accounts" class="mb-5">
                        <h3 class="text-primary mb-3">3. User Accounts</h3>
                        <h5>3.1 Account Creation</h5>
                        <p>To use certain features of our Service, you must create an account. You agree to:</p>
                        <ul>
                            <li>Provide accurate, current, and complete information</li>
                            <li>Maintain and update your account information</li>
                            <li>Keep your password secure and confidential</li>
                            <li>Accept responsibility for all activities under your account</li>
                        </ul>

                        <h5>3.2 Account Eligibility</h5>
                        <p>You must be at least 13 years old to create an account. If you are under 18, you must have permission from a parent or guardian.</p>

                        <h5>3.3 Account Termination</h5>
                        <p>We may suspend or terminate your account if you violate these Terms or engage in prohibited conduct.</p>
                    </section>

                    <section id="content" class="mb-5">
                        <h3 class="text-primary mb-3">4. User Content</h3>
                        <h5>4.1 Your Content</h5>
                        <p>You retain ownership of content you submit to EventSmart, including event descriptions, images, and other materials ("User Content").</p>

                        <h5>4.2 License to EventSmart</h5>
                        <p>By submitting User Content, you grant EventSmart a worldwide, non-exclusive, royalty-free license to use, reproduce, modify, and display your content for the purpose of providing the Service.</p>

                        <h5>4.3 Content Standards</h5>
                        <p>All User Content must comply with our content guidelines and must not:</p>
                        <ul>
                            <li>Violate any laws or regulations</li>
                            <li>Infringe on intellectual property rights</li>
                            <li>Contain harmful, offensive, or inappropriate material</li>
                            <li>Promote illegal activities or discrimination</li>
                        </ul>
                    </section>

                    <section id="events" class="mb-5">
                        <h3 class="text-primary mb-3">5. Event Creation & Management</h3>
                        <h5>5.1 Event Organizer Responsibilities</h5>
                        <p>As an event organizer, you are responsible for:</p>
                        <ul>
                            <li>Ensuring accurate event information</li>
                            <li>Complying with all applicable laws and regulations</li>
                            <li>Obtaining necessary permits and licenses</li>
                            <li>Providing promised services and amenities</li>
                            <li>Handling customer service for your events</li>
                        </ul>

                        <h5>5.2 Event Approval</h5>
                        <p>EventSmart reserves the right to review and approve all events before publication. We may reject events that violate our policies or applicable laws.</p>

                        <h5>5.3 Event Cancellation</h5>
                        <p>If you need to cancel an event, you must notify attendees and process refunds according to your stated refund policy.</p>
                    </section>

                    <section id="payments" class="mb-5">
                        <h3 class="text-primary mb-3">6. Payments & Refunds</h3>
                        <h5>6.1 Platform Fees</h5>
                        <p>EventSmart charges a platform fee for paid events as outlined in our <a href="/pricing" class="text-decoration-none">Pricing Page</a>. Fees are:</p>
                        <ul>
                            <li>2.9% + $0.30 per paid ticket</li>
                            <li>No fees for free events</li>
                            <li>Custom pricing available for enterprise customers</li>
                        </ul>

                        <h5>6.2 Payment Processing</h5>
                        <p>Payments are processed securely through our third-party payment partners. We do not store your payment information.</p>

                        <h5>6.3 Refunds</h5>
                        <p>Refund policies are set by individual event organizers. EventSmart facilitates refunds but does not guarantee them. Processing fees are non-refundable.</p>

                        <h5>6.4 Disputes</h5>
                        <p>Payment disputes should first be addressed with the event organizer. If unresolved, you may contact EventSmart support.</p>
                    </section>

                    <section id="conduct" class="mb-5">
                        <h3 class="text-primary mb-3">7. Prohibited Conduct</h3>
                        <p>You agree not to:</p>
                        <div class="row">
                            <div class="col-md-6">
                                <ul>
                                    <li>Violate any laws or regulations</li>
                                    <li>Infringe on others' rights</li>
                                    <li>Transmit harmful code or viruses</li>
                                    <li>Attempt to gain unauthorized access</li>
                                    <li>Interfere with the Service's operation</li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul>
                                    <li>Create fake accounts or impersonate others</li>
                                    <li>Spam or send unsolicited communications</li>
                                    <li>Collect user data without permission</li>
                                    <li>Use the Service for commercial purposes outside of event creation</li>
                                    <li>Engage in fraudulent activities</li>
                                </ul>
                            </div>
                        </div>
                    </section>

                    <section id="intellectual" class="mb-5">
                        <h3 class="text-primary mb-3">8. Intellectual Property</h3>
                        <h5>8.1 EventSmart Property</h5>
                        <p>The EventSmart platform, including its design, code, logos, and trademarks, is owned by EventSmart Inc. and protected by intellectual property laws.</p>

                        <h5>8.2 Third-Party Content</h5>
                        <p>Some content on our platform may be owned by third parties. You must respect all intellectual property rights.</p>

                        <h5>8.3 DMCA Compliance</h5>
                        <p>We respond to valid DMCA takedown notices. If you believe your copyrighted work has been infringed, please contact us with proper documentation.</p>
                    </section>

                    <section id="privacy" class="mb-5">
                        <h3 class="text-primary mb-3">9. Privacy</h3>
                        <p>Your privacy is important to us. Our collection and use of personal information is governed by our <a href="/privacy-policy" class="text-decoration-none">Privacy Policy</a>, which is incorporated into these Terms by reference.</p>
                        <div class="alert alert-info bg-opacity-10 border-0">
                            <i class="fas fa-info-circle me-2"></i>
                            <strong>Note:</strong> Please review our Privacy Policy to understand how we collect, use, and protect your information.
                        </div>
                    </section>

                    <section id="disclaimers" class="mb-5">
                        <h3 class="text-primary mb-3">10. Disclaimers</h3>
                        <h5>10.1 Service Availability</h5>
                        <p>The Service is provided "as is" without warranties of any kind. We do not guarantee that the Service will be uninterrupted, error-free, or secure.</p>

                        <h5>10.2 Third-Party Events</h5>
                        <p>EventSmart is not responsible for the quality, safety, or legality of events created by third-party organizers. We encourage users to research events before attending.</p>

                        <h5>10.3 Content Accuracy</h5>
                        <p>We do not verify the accuracy of user-generated content and disclaim responsibility for any errors or omissions.</p>
                    </section>

                    <section id="limitation" class="mb-5">
                        <h3 class="text-primary mb-3">11. Limitation of Liability</h3>
                        <p>To the maximum extent permitted by law, EventSmart Inc. shall not be liable for any indirect, incidental, special, consequential, or punitive damages resulting from your use of the Service.</p>
                        <p>Our total liability for any claims arising from these Terms or your use of the Service shall not exceed the amount you paid to EventSmart in the 12 months preceding the claim.</p>
                        <div class="alert alert-danger bg-opacity-10 border-0">
                            <i class="fas fa-exclamation-triangle me-2"></i>
                            <strong>Important:</strong> Some jurisdictions do not allow the exclusion of certain warranties or limitations of liability. In such cases, these limitations may not apply to you.
                        </div>
                    </section>

                    <section id="general" class="mb-5">
                        <h3 class="text-primary mb-3">12. General Provisions</h3>
                        <h5>12.1 Changes to Terms</h5>
                        <p>We may update these Terms from time to time. We will notify users of significant changes via email or platform notification.</p>

                        <h5>12.2 Governing Law</h5>
                        <p>These Terms are governed by the laws of the State of California, without regard to conflict of law principles.</p>

                        <h5>12.3 Dispute Resolution</h5>
                        <p>Any disputes arising from these Terms shall be resolved through binding arbitration in accordance with the rules of the American Arbitration Association.</p>

                        <h5>12.4 Severability</h5>
                        <p>If any provision of these Terms is found to be unenforceable, the remaining provisions shall continue in full force and effect.</p>
                    </section>

                    <section id="contact" class="mb-5">
                        <h3 class="text-primary mb-3">13. Contact Information</h3>
                        <p>If you have questions about these Terms of Service, please contact us:</p>
                        <div class="row">
                            <div class="col-md-6">
                                <address>
                                    <strong>EventSmart Inc.</strong><br>
                                    123 Tech Boulevard<br>
                                    San Francisco, CA 94105<br>
                                    United States
                                </address>
                            </div>
                            <div class="col-md-6">
                                <p>
                                    <strong>Email:</strong> <a href="mailto:legal@eventsmart.com" class="text-decoration-none">legal@eventsmart.com</a><br>
                                    <strong>Phone:</strong> <a href="tel:+1-800-123-4567" class="text-decoration-none">(800) 123-4567</a><br>
                                    <strong>Support:</strong> <a href="/support" class="text-decoration-none">Help Center</a>
                                </p>
                            </div>
                        </div>
                    </section>

                    <!-- Footer -->
                    <div class="border-top pt-4 mt-5">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <p class="text-muted small mb-0">
                                    <i class="fas fa-calendar-alt me-2"></i>
                                    Last updated: July 29, 2025
                                </p>
                            </div>
                            <div class="col-md-6 text-end">
                                <a href="/privacy-policy" class="btn btn-outline-primary btn-sm me-2">Privacy Policy</a>
                                <a href="/support" class="btn btn-outline-secondary btn-sm">Contact Support</a>
                            </div>
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
    // Smooth scrolling for TOC links
    const tocLinks = document.querySelectorAll('a[href^="#"]');
    tocLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const targetId = this.getAttribute('href');
            const targetElement = document.querySelector(targetId);

            if (targetElement) {
                targetElement.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // Highlight current section in TOC
    const sections = document.querySelectorAll('section[id]');
    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach(entry => {
                const tocLink = document.querySelector(`a[href="#${entry.target.id}"]`);
                if (tocLink) {
                    if (entry.isIntersecting) {
                        tocLink.classList.add('fw-bold', 'text-primary');
                    } else {
                        tocLink.classList.remove('fw-bold', 'text-primary');
                    }
                }
            });
        },
        { threshold: 0.5 }
    );

    sections.forEach(section => observer.observe(section));
});
</script>
@endpush

<style>
section {
    scroll-margin-top: 2rem;
}

.alert a {
    color: inherit;
    font-weight: 600;
}

.alert a:hover {
    text-decoration: underline !important;
}

address {
    font-style: normal;
    line-height: 1.6;
}

h5 {
    color: #374151;
    margin-top: 1.5rem;
    margin-bottom: 1rem;
}

.card-body {
    line-height: 1.7;
}

ul li {
    margin-bottom: 0.5rem;
}
</style>
@endsection
