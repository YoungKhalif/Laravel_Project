@extends('layouts.app')

@section('title', 'Privacy Policy - EventSmart')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-0 py-4">
                    <div class="text-center">
                        <h1 class="mb-2">Privacy Policy</h1>
                        <p class="text-muted mb-0">Last updated: July 29, 2025</p>
                    </div>
                </div>
                <div class="card-body p-5">
                    <!-- Privacy Notice -->
                    <div class="alert alert-info bg-opacity-10 border-0 mb-5">
                        <div class="d-flex align-items-start">
                            <i class="fas fa-shield-alt fa-2x text-info me-3 mt-1"></i>
                            <div>
                                <h6 class="mb-2">Your Privacy Matters</h6>
                                <p class="mb-0">EventSmart is committed to protecting your privacy and personal information. This Privacy Policy explains how we collect, use, and safeguard your data when you use our platform.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Table of Contents -->
                    <div class="alert alert-primary bg-opacity-10 border-0 mb-5">
                        <h6 class="mb-3">Table of Contents</h6>
                        <div class="row">
                            <div class="col-md-6">
                                <ul class="list-unstyled mb-0">
                                    <li><a href="#overview" class="text-decoration-none">1. Overview</a></li>
                                    <li><a href="#information-we-collect" class="text-decoration-none">2. Information We Collect</a></li>
                                    <li><a href="#how-we-use" class="text-decoration-none">3. How We Use Your Information</a></li>
                                    <li><a href="#sharing" class="text-decoration-none">4. Information Sharing</a></li>
                                    <li><a href="#data-security" class="text-decoration-none">5. Data Security</a></li>
                                    <li><a href="#your-rights" class="text-decoration-none">6. Your Rights</a></li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul class="list-unstyled mb-0">
                                    <li><a href="#cookies" class="text-decoration-none">7. Cookies & Tracking</a></li>
                                    <li><a href="#third-party" class="text-decoration-none">8. Third-Party Services</a></li>
                                    <li><a href="#international" class="text-decoration-none">9. International Transfers</a></li>
                                    <li><a href="#children" class="text-decoration-none">10. Children's Privacy</a></li>
                                    <li><a href="#changes" class="text-decoration-none">11. Policy Changes</a></li>
                                    <li><a href="#contact-privacy" class="text-decoration-none">12. Contact Us</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Privacy Content -->
                    <section id="overview" class="mb-5">
                        <h3 class="text-primary mb-3">1. Overview</h3>
                        <p>EventSmart Inc. ("we," "us," or "our") operates the EventSmart platform that enables users to discover, create, and manage events. This Privacy Policy describes:</p>
                        <ul>
                            <li>What personal information we collect</li>
                            <li>How we use and protect that information</li>
                            <li>When and how we share information with others</li>
                            <li>Your choices about your personal information</li>
                        </ul>
                        <p>By using EventSmart, you consent to the data practices described in this Privacy Policy.</p>
                    </section>

                    <section id="information-we-collect" class="mb-5">
                        <h3 class="text-primary mb-3">2. Information We Collect</h3>

                        <h5>2.1 Information You Provide Directly</h5>
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <h6>Account Information:</h6>
                                <ul>
                                    <li>Name and email address</li>
                                    <li>Phone number</li>
                                    <li>Profile photo</li>
                                    <li>Professional information</li>
                                    <li>Payment information</li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <h6>Event Information:</h6>
                                <ul>
                                    <li>Event details and descriptions</li>
                                    <li>Event images and media</li>
                                    <li>Attendee information</li>
                                    <li>Communication preferences</li>
                                    <li>Reviews and feedback</li>
                                </ul>
                            </div>
                        </div>

                        <h5>2.2 Information Collected Automatically</h5>
                        <p>When you use our platform, we automatically collect:</p>
                        <ul>
                            <li><strong>Device Information:</strong> IP address, browser type, operating system, device identifiers</li>
                            <li><strong>Usage Data:</strong> Pages visited, features used, time spent on platform, clicks and interactions</li>
                            <li><strong>Location Data:</strong> General location based on IP address (with your consent for precise location)</li>
                            <li><strong>Performance Data:</strong> Error reports, performance metrics, crash data</li>
                        </ul>

                        <h5>2.3 Information from Third Parties</h5>
                        <p>We may receive information about you from:</p>
                        <ul>
                            <li>Social media platforms (when you connect your accounts)</li>
                            <li>Payment processors</li>
                            <li>Analytics providers</li>
                            <li>Other users who refer you or mention you</li>
                        </ul>
                    </section>

                    <section id="how-we-use" class="mb-5">
                        <h3 class="text-primary mb-3">3. How We Use Your Information</h3>

                        <div class="row">
                            <div class="col-md-6">
                                <h6>Platform Operations:</h6>
                                <ul>
                                    <li>Provide and maintain our services</li>
                                    <li>Process registrations and payments</li>
                                    <li>Send transactional communications</li>
                                    <li>Provide customer support</li>
                                    <li>Verify identity and prevent fraud</li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <h6>Improvement & Marketing:</h6>
                                <ul>
                                    <li>Analyze usage and improve our platform</li>
                                    <li>Personalize your experience</li>
                                    <li>Send promotional communications (with consent)</li>
                                    <li>Conduct research and analytics</li>
                                    <li>Develop new features and services</li>
                                </ul>
                            </div>
                        </div>

                        <div class="alert alert-success bg-opacity-10 border-0 mt-4">
                            <h6><i class="fas fa-check-circle me-2"></i>Legal Basis for Processing</h6>
                            <p class="mb-0">We process your personal information based on:</p>
                            <ul class="mb-0 mt-2">
                                <li><strong>Contract:</strong> To provide services you've requested</li>
                                <li><strong>Legitimate Interest:</strong> To improve our platform and prevent fraud</li>
                                <li><strong>Consent:</strong> For marketing communications and non-essential features</li>
                                <li><strong>Legal Obligation:</strong> To comply with applicable laws</li>
                            </ul>
                        </div>
                    </section>

                    <section id="sharing" class="mb-5">
                        <h3 class="text-primary mb-3">4. Information Sharing</h3>

                        <h5>4.1 When We Share Information</h5>
                        <p>We may share your personal information in the following circumstances:</p>

                        <div class="row">
                            <div class="col-md-6">
                                <h6>Event-Related Sharing:</h6>
                                <ul>
                                    <li>With event organizers (registration details)</li>
                                    <li>With other attendees (basic profile info)</li>
                                    <li>For networking features (with your consent)</li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <h6>Service Providers:</h6>
                                <ul>
                                    <li>Payment processors</li>
                                    <li>Email service providers</li>
                                    <li>Analytics services</li>
                                    <li>Cloud storage providers</li>
                                </ul>
                            </div>
                        </div>

                        <h5>4.2 Legal Requirements</h5>
                        <p>We may disclose information when required by law or to:</p>
                        <ul>
                            <li>Comply with legal process or government requests</li>
                            <li>Protect our rights, property, or safety</li>
                            <li>Prevent fraud or illegal activities</li>
                            <li>Enforce our Terms of Service</li>
                        </ul>

                        <h5>4.3 Business Transfers</h5>
                        <p>In the event of a merger, acquisition, or sale of assets, your information may be transferred as part of that transaction.</p>
                    </section>

                    <section id="data-security" class="mb-5">
                        <h3 class="text-primary mb-3">5. Data Security</h3>

                        <h5>5.1 Security Measures</h5>
                        <p>We implement industry-standard security measures to protect your information:</p>
                        <div class="row">
                            <div class="col-md-6">
                                <ul>
                                    <li>SSL/TLS encryption for data transmission</li>
                                    <li>Encrypted data storage</li>
                                    <li>Regular security audits and testing</li>
                                    <li>Access controls and authentication</li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul>
                                    <li>Employee training on data protection</li>
                                    <li>Incident response procedures</li>
                                    <li>Regular software updates and patches</li>
                                    <li>Third-party security assessments</li>
                                </ul>
                            </div>
                        </div>

                        <h5>5.2 Data Retention</h5>
                        <p>We retain your personal information for as long as necessary to:</p>
                        <ul>
                            <li>Provide our services to you</li>
                            <li>Comply with legal obligations</li>
                            <li>Resolve disputes and enforce agreements</li>
                            <li>Maintain security and prevent fraud</li>
                        </ul>

                        <div class="alert alert-warning bg-opacity-10 border-0">
                            <i class="fas fa-shield-alt me-2"></i>
                            <strong>Important:</strong> While we implement strong security measures, no method of transmission over the internet is 100% secure. We cannot guarantee absolute security.
                        </div>
                    </section>

                    <section id="your-rights" class="mb-5">
                        <h3 class="text-primary mb-3">6. Your Rights</h3>

                        <p>Depending on your location, you may have the following rights regarding your personal information:</p>

                        <div class="row">
                            <div class="col-md-6">
                                <h6>Access & Control:</h6>
                                <ul>
                                    <li><strong>Access:</strong> View your personal information</li>
                                    <li><strong>Update:</strong> Correct inaccurate information</li>
                                    <li><strong>Delete:</strong> Request deletion of your data</li>
                                    <li><strong>Export:</strong> Receive a copy of your data</li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <h6>Privacy Controls:</h6>
                                <ul>
                                    <li><strong>Opt-out:</strong> Unsubscribe from marketing emails</li>
                                    <li><strong>Restrict:</strong> Limit how we process your data</li>
                                    <li><strong>Object:</strong> Object to certain processing activities</li>
                                    <li><strong>Withdraw consent:</strong> For consent-based processing</li>
                                </ul>
                            </div>
                        </div>

                        <h5>6.1 How to Exercise Your Rights</h5>
                        <p>To exercise any of these rights, you can:</p>
                        <ul>
                            <li>Update your account settings directly</li>
                            <li>Contact us at <a href="mailto:privacy@eventsmart.com" class="text-decoration-none">privacy@eventsmart.com</a></li>
                            <li>Use our <a href="/support" class="text-decoration-none">Privacy Request Form</a></li>
                        </ul>

                        <p>We will respond to your request within 30 days. Some requests may require identity verification.</p>
                    </section>

                    <section id="cookies" class="mb-5">
                        <h3 class="text-primary mb-3">7. Cookies & Tracking Technologies</h3>

                        <h5>7.1 Types of Cookies We Use</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="table-light">
                                    <tr>
                                        <th>Cookie Type</th>
                                        <th>Purpose</th>
                                        <th>Duration</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><strong>Essential</strong></td>
                                        <td>Required for platform functionality</td>
                                        <td>Session or up to 1 year</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Analytics</strong></td>
                                        <td>Help us understand usage patterns</td>
                                        <td>Up to 2 years</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Marketing</strong></td>
                                        <td>Personalize ads and content</td>
                                        <td>Up to 1 year</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Preferences</strong></td>
                                        <td>Remember your settings</td>
                                        <td>Up to 1 year</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <h5>7.2 Managing Cookies</h5>
                        <p>You can control cookies through:</p>
                        <ul>
                            <li>Your browser settings (to block or delete cookies)</li>
                            <li>Our cookie preference center</li>
                            <li>Opting out of analytics tracking</li>
                        </ul>
                    </section>

                    <section id="third-party" class="mb-5">
                        <h3 class="text-primary mb-3">8. Third-Party Services</h3>

                        <p>Our platform integrates with various third-party services:</p>

                        <div class="row">
                            <div class="col-md-4">
                                <h6>Payment Processing:</h6>
                                <ul>
                                    <li>Stripe</li>
                                    <li>PayPal</li>
                                    <li>Apple Pay</li>
                                    <li>Google Pay</li>
                                </ul>
                            </div>
                            <div class="col-md-4">
                                <h6>Analytics & Marketing:</h6>
                                <ul>
                                    <li>Google Analytics</li>
                                    <li>Facebook Pixel</li>
                                    <li>Mailchimp</li>
                                    <li>Intercom</li>
                                </ul>
                            </div>
                            <div class="col-md-4">
                                <h6>Infrastructure:</h6>
                                <ul>
                                    <li>Amazon Web Services</li>
                                    <li>Cloudflare</li>
                                    <li>SendGrid</li>
                                    <li>Twilio</li>
                                </ul>
                            </div>
                        </div>

                        <p>These services have their own privacy policies and terms. We encourage you to review them.</p>
                    </section>

                    <section id="international" class="mb-5">
                        <h3 class="text-primary mb-3">9. International Data Transfers</h3>

                        <p>EventSmart is based in the United States. If you are located outside the US, your information may be transferred to and processed in the US or other countries where our service providers operate.</p>

                        <h5>9.1 Transfer Safeguards</h5>
                        <p>For international transfers, we implement appropriate safeguards such as:</p>
                        <ul>
                            <li>Standard Contractual Clauses (SCCs)</li>
                            <li>Adequacy decisions</li>
                            <li>Certification schemes</li>
                            <li>Binding corporate rules</li>
                        </ul>

                        <h5>9.2 GDPR Compliance</h5>
                        <p>For users in the European Economic Area (EEA), we comply with the General Data Protection Regulation (GDPR) and provide additional protections.</p>
                    </section>

                    <section id="children" class="mb-5">
                        <h3 class="text-primary mb-3">10. Children's Privacy</h3>

                        <p>EventSmart is not intended for children under 13 years of age. We do not knowingly collect personal information from children under 13.</p>

                        <h5>10.1 Parental Consent</h5>
                        <p>Users between 13 and 18 years old must have parental consent to use our platform. If you are a parent and believe your child has provided us with personal information, please contact us.</p>

                        <h5>10.2 School and Educational Events</h5>
                        <p>For educational events involving minors, additional privacy protections may apply in accordance with COPPA and FERPA requirements.</p>
                    </section>

                    <section id="changes" class="mb-5">
                        <h3 class="text-primary mb-3">11. Policy Changes</h3>

                        <p>We may update this Privacy Policy from time to time to reflect changes in our practices or applicable laws.</p>

                        <h5>11.1 Notification of Changes</h5>
                        <p>We will notify you of significant changes by:</p>
                        <ul>
                            <li>Email notification to your registered address</li>
                            <li>Prominent notice on our platform</li>
                            <li>In-app notifications</li>
                        </ul>

                        <h5>11.2 Continued Use</h5>
                        <p>Your continued use of EventSmart after changes take effect constitutes acceptance of the updated Privacy Policy.</p>
                    </section>

                    <section id="contact-privacy" class="mb-5">
                        <h3 class="text-primary mb-3">12. Contact Us</h3>

                        <p>If you have questions about this Privacy Policy or our privacy practices, please contact us:</p>

                        <div class="row">
                            <div class="col-md-6">
                                <h6>General Privacy Inquiries:</h6>
                                <address>
                                    <strong>Privacy Team</strong><br>
                                    EventSmart Inc.<br>
                                    123 Tech Boulevard<br>
                                    San Francisco, CA 94105<br>
                                    United States
                                </address>
                                <p>
                                    <strong>Email:</strong> <a href="mailto:privacy@eventsmart.com" class="text-decoration-none">privacy@eventsmart.com</a><br>
                                    <strong>Phone:</strong> <a href="tel:+1-800-123-4567" class="text-decoration-none">(800) 123-4567</a>
                                </p>
                            </div>
                            <div class="col-md-6">
                                <h6>Data Protection Officer:</h6>
                                <p>For EU residents, you can contact our Data Protection Officer:</p>
                                <p>
                                    <strong>Email:</strong> <a href="mailto:dpo@eventsmart.com" class="text-decoration-none">dpo@eventsmart.com</a><br>
                                    <strong>Online Form:</strong> <a href="/privacy-request" class="text-decoration-none">Privacy Request Portal</a>
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
                                <a href="/legal/terms" class="btn btn-outline-primary btn-sm me-2">Terms of Service</a>
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

h5, h6 {
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

.table th {
    background-color: #f8f9fa;
    font-weight: 600;
    border-color: #dee2e6;
}

.table td {
    border-color: #dee2e6;
}
</style>
@endsection
