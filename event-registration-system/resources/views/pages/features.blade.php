@extends('layouts.app')

@section('title', 'Features - EventSmart Platform')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Hero Section -->
    <div class="relative bg-gradient-to-br from-purple-600 via-blue-600 to-purple-800 text-white py-24">
        <div class="absolute inset-0 bg-black opacity-20"></div>
        <div class="relative container mx-auto px-6 text-center">
            <h1 class="text-5xl md:text-6xl font-bold mb-6">Powerful Features</h1>
            <p class="text-xl md:text-2xl mb-8 max-w-3xl mx-auto opacity-90">
                Everything you need to create, manage, and promote unforgettable events.
            </p>
            <div class="grid md:grid-cols-3 gap-6 max-w-4xl mx-auto mt-12">
                <div class="bg-white bg-opacity-20 rounded-lg p-6">
                    <i class="fas fa-bolt text-3xl mb-3"></i>
                    <h3 class="font-semibold text-lg mb-2">Lightning Fast</h3>
                    <p class="text-sm opacity-90">Setup events in minutes, not hours</p>
                </div>
                <div class="bg-white bg-opacity-20 rounded-lg p-6">
                    <i class="fas fa-shield-alt text-3xl mb-3"></i>
                    <h3 class="font-semibold text-lg mb-2">Secure & Reliable</h3>
                    <p class="text-sm opacity-90">Bank-level security for all transactions</p>
                </div>
                <div class="bg-white bg-opacity-20 rounded-lg p-6">
                    <i class="fas fa-mobile-alt text-3xl mb-3"></i>
                    <h3 class="font-semibold text-lg mb-2">Mobile First</h3>
                    <p class="text-sm opacity-90">Perfect experience on any device</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Core Features -->
    <div class="py-20 bg-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Core Event Management</h2>
                <p class="text-xl text-gray-600">Essential tools to manage every aspect of your events</p>
            </div>

            <div class="grid lg:grid-cols-3 gap-12">
                <!-- Event Creation -->
                <div class="text-center group">
                    <div class="bg-gradient-to-br from-purple-100 to-blue-100 rounded-2xl p-8 mb-6 group-hover:shadow-lg transition-all duration-300">
                        <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-blue-600 rounded-full flex items-center justify-center mx-auto mb-6">
                            <i class="fas fa-calendar-plus text-2xl text-white"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Easy Event Creation</h3>
                        <p class="text-gray-600 leading-relaxed">
                            Create stunning event pages in minutes with our intuitive drag-and-drop builder.
                            Add images, descriptions, schedules, and speaker information with ease.
                        </p>
                        <div class="mt-6 space-y-2 text-sm text-gray-500">
                            <div class="flex items-center justify-center">
                                <i class="fas fa-check text-green-500 mr-2"></i>
                                <span>Drag & drop page builder</span>
                            </div>
                            <div class="flex items-center justify-center">
                                <i class="fas fa-check text-green-500 mr-2"></i>
                                <span>Multiple event types</span>
                            </div>
                            <div class="flex items-center justify-center">
                                <i class="fas fa-check text-green-500 mr-2"></i>
                                <span>Rich media support</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Ticket Management -->
                <div class="text-center group">
                    <div class="bg-gradient-to-br from-green-100 to-teal-100 rounded-2xl p-8 mb-6 group-hover:shadow-lg transition-all duration-300">
                        <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-teal-600 rounded-full flex items-center justify-center mx-auto mb-6">
                            <i class="fas fa-ticket-alt text-2xl text-white"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Smart Ticketing</h3>
                        <p class="text-gray-600 leading-relaxed">
                            Flexible ticket types with dynamic pricing, early bird discounts, group rates,
                            and promotional codes. Generate QR codes for seamless check-ins.
                        </p>
                        <div class="mt-6 space-y-2 text-sm text-gray-500">
                            <div class="flex items-center justify-center">
                                <i class="fas fa-check text-green-500 mr-2"></i>
                                <span>Multiple ticket tiers</span>
                            </div>
                            <div class="flex items-center justify-center">
                                <i class="fas fa-check text-green-500 mr-2"></i>
                                <span>Dynamic pricing</span>
                            </div>
                            <div class="flex items-center justify-center">
                                <i class="fas fa-check text-green-500 mr-2"></i>
                                <span>QR code generation</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Registration -->
                <div class="text-center group">
                    <div class="bg-gradient-to-br from-yellow-100 to-orange-100 rounded-2xl p-8 mb-6 group-hover:shadow-lg transition-all duration-300">
                        <div class="w-16 h-16 bg-gradient-to-br from-yellow-500 to-orange-600 rounded-full flex items-center justify-center mx-auto mb-6">
                            <i class="fas fa-user-plus text-2xl text-white"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Streamlined Registration</h3>
                        <p class="text-gray-600 leading-relaxed">
                            Customize registration forms to collect exactly the information you need.
                            Support for custom fields, conditional logic, and payment integration.
                        </p>
                        <div class="mt-6 space-y-2 text-sm text-gray-500">
                            <div class="flex items-center justify-center">
                                <i class="fas fa-check text-green-500 mr-2"></i>
                                <span>Custom form fields</span>
                            </div>
                            <div class="flex items-center justify-center">
                                <i class="fas fa-check text-green-500 mr-2"></i>
                                <span>Conditional logic</span>
                            </div>
                            <div class="flex items-center justify-center">
                                <i class="fas fa-check text-green-500 mr-2"></i>
                                <span>Instant confirmation</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Advanced Features -->
    <div class="py-20 bg-gray-50">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Advanced Capabilities</h2>
                <p class="text-xl text-gray-600">Professional tools for serious event organizers</p>
            </div>

            <div class="grid lg:grid-cols-2 gap-16 items-center mb-20">
                <div>
                    <h3 class="text-3xl font-bold text-gray-900 mb-6">📊 Real-time Analytics & Insights</h3>
                    <p class="text-lg text-gray-600 mb-8 leading-relaxed">
                        Get deep insights into your event performance with comprehensive analytics. Track
                        registrations, revenue, attendee demographics, and engagement metrics in real-time.
                    </p>
                    <div class="space-y-4">
                        <div class="flex items-start">
                            <div class="bg-purple-100 rounded-full p-2 mr-4 flex-shrink-0">
                                <i class="fas fa-chart-line text-purple-600"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900 mb-1">Registration Tracking</h4>
                                <p class="text-gray-600 text-sm">Monitor registration trends and identify peak booking periods</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="bg-blue-100 rounded-full p-2 mr-4 flex-shrink-0">
                                <i class="fas fa-users text-blue-600"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900 mb-1">Audience Demographics</h4>
                                <p class="text-gray-600 text-sm">Understand your audience with detailed demographic breakdowns</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="bg-green-100 rounded-full p-2 mr-4 flex-shrink-0">
                                <i class="fas fa-dollar-sign text-green-600"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900 mb-1">Revenue Analytics</h4>
                                <p class="text-gray-600 text-sm">Track sales performance and optimize pricing strategies</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-2xl p-8 shadow-lg">
                    <div class="h-64 bg-gradient-to-br from-purple-100 to-blue-100 rounded-lg flex items-center justify-center">
                        <div class="text-center">
                            <i class="fas fa-chart-bar text-6xl text-purple-600 mb-4"></i>
                            <h4 class="text-xl font-bold text-gray-900">Interactive Dashboard</h4>
                            <p class="text-gray-600">Real-time data visualization</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid lg:grid-cols-2 gap-16 items-center mb-20">
                <div class="bg-white rounded-2xl p-8 shadow-lg order-2 lg:order-1">
                    <div class="h-64 bg-gradient-to-br from-green-100 to-teal-100 rounded-lg flex items-center justify-center">
                        <div class="text-center">
                            <i class="fas fa-envelope text-6xl text-green-600 mb-4"></i>
                            <h4 class="text-xl font-bold text-gray-900">Email Campaign Center</h4>
                            <p class="text-gray-600">Automated marketing workflows</p>
                        </div>
                    </div>
                </div>
                <div class="order-1 lg:order-2">
                    <h3 class="text-3xl font-bold text-gray-900 mb-6">📧 Marketing & Communication</h3>
                    <p class="text-lg text-gray-600 mb-8 leading-relaxed">
                        Engage your audience with powerful marketing tools. Send targeted email campaigns,
                        automated reminders, and personalized communications to boost attendance.
                    </p>
                    <div class="space-y-4">
                        <div class="flex items-start">
                            <div class="bg-yellow-100 rounded-full p-2 mr-4 flex-shrink-0">
                                <i class="fas fa-paper-plane text-yellow-600"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900 mb-1">Email Campaigns</h4>
                                <p class="text-gray-600 text-sm">Design and send beautiful emails with our drag-and-drop editor</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="bg-red-100 rounded-full p-2 mr-4 flex-shrink-0">
                                <i class="fas fa-bell text-red-600"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900 mb-1">Automated Reminders</h4>
                                <p class="text-gray-600 text-sm">Set up automatic reminders and follow-up sequences</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="bg-indigo-100 rounded-full p-2 mr-4 flex-shrink-0">
                                <i class="fas fa-share-alt text-indigo-600"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900 mb-1">Social Media Integration</h4>
                                <p class="text-gray-600 text-sm">Share events across social platforms with one click</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <div>
                    <h3 class="text-3xl font-bold text-gray-900 mb-6">💳 Secure Payment Processing</h3>
                    <p class="text-lg text-gray-600 mb-8 leading-relaxed">
                        Accept payments seamlessly with our integrated payment system. Support for multiple
                        payment methods, currencies, and automatic tax calculations.
                    </p>
                    <div class="space-y-4">
                        <div class="flex items-start">
                            <div class="bg-green-100 rounded-full p-2 mr-4 flex-shrink-0">
                                <i class="fas fa-credit-card text-green-600"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900 mb-1">Multiple Payment Methods</h4>
                                <p class="text-gray-600 text-sm">Credit cards, PayPal, bank transfers, and more</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="bg-blue-100 rounded-full p-2 mr-4 flex-shrink-0">
                                <i class="fas fa-shield-alt text-blue-600"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900 mb-1">PCI Compliant</h4>
                                <p class="text-gray-600 text-sm">Bank-level security for all transactions</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="bg-purple-100 rounded-full p-2 mr-4 flex-shrink-0">
                                <i class="fas fa-globe text-purple-600"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900 mb-1">Global Currency Support</h4>
                                <p class="text-gray-600 text-sm">Accept payments in 150+ currencies worldwide</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-2xl p-8 shadow-lg">
                    <div class="h-64 bg-gradient-to-br from-yellow-100 to-orange-100 rounded-lg flex items-center justify-center">
                        <div class="text-center">
                            <i class="fas fa-lock text-6xl text-yellow-600 mb-4"></i>
                            <h4 class="text-xl font-bold text-gray-900">Secure Checkout</h4>
                            <p class="text-gray-600">SSL encrypted transactions</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Integration Features -->
    <div class="py-20 bg-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Seamless Integrations</h2>
                <p class="text-xl text-gray-600">Connect with your favorite tools and platforms</p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="text-center bg-gray-50 rounded-xl p-6 hover:shadow-lg transition-all">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fab fa-google text-2xl text-blue-600"></i>
                    </div>
                    <h3 class="font-semibold text-gray-900 mb-2">Google Calendar</h3>
                    <p class="text-sm text-gray-600">Sync events with Google Calendar automatically</p>
                </div>

                <div class="text-center bg-gray-50 rounded-xl p-6 hover:shadow-lg transition-all">
                    <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fab fa-mailchimp text-2xl text-red-600"></i>
                    </div>
                    <h3 class="font-semibold text-gray-900 mb-2">MailChimp</h3>
                    <p class="text-sm text-gray-600">Sync attendee data with your email lists</p>
                </div>

                <div class="text-center bg-gray-50 rounded-xl p-6 hover:shadow-lg transition-all">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fab fa-salesforce text-2xl text-green-600"></i>
                    </div>
                    <h3 class="font-semibold text-gray-900 mb-2">Salesforce</h3>
                    <p class="text-sm text-gray-600">Integrate with your CRM system</p>
                </div>

                <div class="text-center bg-gray-50 rounded-xl p-6 hover:shadow-lg transition-all">
                    <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fab fa-slack text-2xl text-purple-600"></i>
                    </div>
                    <h3 class="font-semibold text-gray-900 mb-2">Slack</h3>
                    <p class="text-sm text-gray-600">Get real-time notifications in Slack</p>
                </div>

                <div class="text-center bg-gray-50 rounded-xl p-6 hover:shadow-lg transition-all">
                    <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fab fa-zapier text-2xl text-yellow-600"></i>
                    </div>
                    <h3 class="font-semibold text-gray-900 mb-2">Zapier</h3>
                    <p class="text-sm text-gray-600">Connect with 2000+ apps via Zapier</p>
                </div>

                <div class="text-center bg-gray-50 rounded-xl p-6 hover:shadow-lg transition-all">
                    <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fab fa-facebook text-2xl text-indigo-600"></i>
                    </div>
                    <h3 class="font-semibold text-gray-900 mb-2">Facebook</h3>
                    <p class="text-sm text-gray-600">Create Facebook events automatically</p>
                </div>

                <div class="text-center bg-gray-50 rounded-xl p-6 hover:shadow-lg transition-all">
                    <div class="w-16 h-16 bg-pink-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-code text-2xl text-pink-600"></i>
                    </div>
                    <h3 class="font-semibold text-gray-900 mb-2">API Access</h3>
                    <p class="text-sm text-gray-600">Build custom integrations with our API</p>
                </div>

                <div class="text-center bg-gray-50 rounded-xl p-6 hover:shadow-lg transition-all">
                    <div class="w-16 h-16 bg-teal-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-webhook text-2xl text-teal-600"></i>
                    </div>
                    <h3 class="font-semibold text-gray-900 mb-2">Webhooks</h3>
                    <p class="text-sm text-gray-600">Real-time data sync with webhooks</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Mobile Features -->
    <div class="py-20 bg-gray-900 text-white">
        <div class="container mx-auto px-6">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <div>
                    <h2 class="text-4xl font-bold mb-6">📱 Mobile-First Experience</h2>
                    <p class="text-xl text-gray-300 mb-8 leading-relaxed">
                        Your attendees expect a seamless mobile experience. Our platform is designed
                        mobile-first to ensure perfect functionality on any device.
                    </p>

                    <div class="space-y-6">
                        <div class="flex items-start">
                            <div class="bg-blue-500 rounded-full p-3 mr-4 flex-shrink-0">
                                <i class="fas fa-mobile-alt text-white"></i>
                            </div>
                            <div>
                                <h3 class="text-xl font-semibold mb-2">Responsive Design</h3>
                                <p class="text-gray-300">Perfect experience on phones, tablets, and desktops</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="bg-green-500 rounded-full p-3 mr-4 flex-shrink-0">
                                <i class="fas fa-qrcode text-white"></i>
                            </div>
                            <div>
                                <h3 class="text-xl font-semibold mb-2">Digital Tickets</h3>
                                <p class="text-gray-300">QR code tickets that work offline and online</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="bg-purple-500 rounded-full p-3 mr-4 flex-shrink-0">
                                <i class="fas fa-wallet text-white"></i>
                            </div>
                            <div>
                                <h3 class="text-xl font-semibold mb-2">Mobile Wallet</h3>
                                <p class="text-gray-300">Add tickets to Apple Wallet and Google Pay</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="bg-yellow-500 rounded-full p-3 mr-4 flex-shrink-0">
                                <i class="fas fa-bolt text-white"></i>
                            </div>
                            <div>
                                <h3 class="text-xl font-semibold mb-2">Instant Check-in</h3>
                                <p class="text-gray-300">Fast check-in process with QR code scanning</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-center">
                    <div class="bg-white bg-opacity-10 rounded-3xl p-12 inline-block">
                        <i class="fas fa-mobile-alt text-8xl text-white mb-6"></i>
                        <h3 class="text-2xl font-bold mb-4">Mobile-Optimized</h3>
                        <p class="text-gray-300">Built for the mobile generation</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Security Features -->
    <div class="py-20 bg-red-50">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">🔒 Enterprise-Grade Security</h2>
                <p class="text-xl text-gray-600">Your data and your attendees' information is always protected</p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="text-center bg-white rounded-xl p-6 shadow-md">
                    <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-shield-alt text-2xl text-red-600"></i>
                    </div>
                    <h3 class="font-semibold text-gray-900 mb-2">SSL Encryption</h3>
                    <p class="text-sm text-gray-600">All data transmitted with 256-bit SSL encryption</p>
                </div>

                <div class="text-center bg-white rounded-xl p-6 shadow-md">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-credit-card text-2xl text-blue-600"></i>
                    </div>
                    <h3 class="font-semibold text-gray-900 mb-2">PCI Compliance</h3>
                    <p class="text-sm text-gray-600">Level 1 PCI DSS compliant payment processing</p>
                </div>

                <div class="text-center bg-white rounded-xl p-6 shadow-md">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-database text-2xl text-green-600"></i>
                    </div>
                    <h3 class="font-semibold text-gray-900 mb-2">Data Backup</h3>
                    <p class="text-sm text-gray-600">Automated daily backups with 99.9% uptime</p>
                </div>

                <div class="text-center bg-white rounded-xl p-6 shadow-md">
                    <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-user-shield text-2xl text-purple-600"></i>
                    </div>
                    <h3 class="font-semibold text-gray-900 mb-2">GDPR Ready</h3>
                    <p class="text-sm text-gray-600">Full GDPR compliance and data privacy protection</p>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="py-20 bg-gradient-to-br from-purple-600 via-blue-600 to-purple-800 text-white">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-4xl font-bold mb-6">Ready to Experience These Features?</h2>
            <p class="text-xl mb-8 max-w-2xl mx-auto opacity-90">
                Start your free trial today and see how EventSmart can transform your event management.
            </p>
            <div class="space-x-4">
                <a href="#" class="bg-white text-purple-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition-colors inline-block">
                    Start Free Trial
                </a>
                <a href="{{ route('pricing') }}" class="border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-purple-600 transition-colors inline-block">
                    View Pricing
                </a>
            </div>
            <p class="text-sm mt-6 opacity-75">No credit card required • 14-day free trial • Cancel anytime</p>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Intersection Observer for animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-fadeInUp');
            }
        });
    }, observerOptions);

    // Observe all feature cards
    document.querySelectorAll('.group').forEach(card => {
        observer.observe(card);
    });

    // Add smooth hover effects
    document.querySelectorAll('.group').forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-5px)';
        });

        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });
});
</script>

<style>
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.animate-fadeInUp {
    animation: fadeInUp 0.6s ease-out forwards;
}

.group {
    transition: transform 0.3s ease;
}
</style>
@endpush
