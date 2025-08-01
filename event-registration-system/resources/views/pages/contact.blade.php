@extends('layouts.app')

@section('title', 'Contact Us - EventSmart')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Hero Section -->
    <div class="relative bg-gradient-to-br from-purple-600 via-blue-600 to-purple-800 text-white py-20">
        <div class="absolute inset-0 bg-black opacity-20"></div>
        <div class="relative container mx-auto px-6 text-center">
            <h1 class="text-5xl md:text-6xl font-bold mb-6">Get in Touch</h1>
            <p class="text-xl md:text-2xl mb-8 max-w-3xl mx-auto opacity-90">
                Have questions, suggestions, or need support? We'd love to hear from you.
            </p>
            <div class="inline-flex items-center space-x-4 bg-white bg-opacity-20 rounded-full px-6 py-3">
                <i class="fas fa-clock text-xl"></i>
                <span class="font-semibold">24/7 Support Available</span>
            </div>
        </div>
    </div>

    <div class="py-16">
        <div class="container mx-auto px-6">
            <div class="grid lg:grid-cols-3 gap-12">
                <!-- Contact Information -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-2xl shadow-lg p-8 h-full">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6">Contact Information</h2>

                        <!-- Phone -->
                        <div class="flex items-start space-x-4 mb-6">
                            <div class="bg-purple-100 rounded-full p-3 flex-shrink-0">
                                <i class="fas fa-phone text-purple-600"></i>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-900 mb-1">Phone Support</h3>
                                <p class="text-gray-600 mb-1">+1 (800) 123-4567</p>
                                <p class="text-sm text-gray-500">Available 24/7</p>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="flex items-start space-x-4 mb-6">
                            <div class="bg-blue-100 rounded-full p-3 flex-shrink-0">
                                <i class="fas fa-envelope text-blue-600"></i>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-900 mb-1">Email Support</h3>
                                <p class="text-gray-600 mb-1">support@eventsmart.com</p>
                                <p class="text-sm text-gray-500">Response within 2 hours</p>
                            </div>
                        </div>

                        <!-- Address -->
                        <div class="flex items-start space-x-4 mb-6">
                            <div class="bg-green-100 rounded-full p-3 flex-shrink-0">
                                <i class="fas fa-map-marker-alt text-green-600"></i>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-900 mb-1">Office Address</h3>
                                <p class="text-gray-600 mb-1">123 Tech Boulevard</p>
                                <p class="text-gray-600 mb-1">San Francisco, CA 94105</p>
                                <p class="text-gray-600">United States</p>
                            </div>
                        </div>

                        <!-- Live Chat -->
                        <div class="flex items-start space-x-4 mb-8">
                            <div class="bg-yellow-100 rounded-full p-3 flex-shrink-0">
                                <i class="fas fa-comments text-yellow-600"></i>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-900 mb-1">Live Chat</h3>
                                <p class="text-gray-600 mb-1">Available on our website</p>
                                <p class="text-sm text-gray-500">Average response: 30 seconds</p>
                            </div>
                        </div>

                        <!-- Social Media -->
                        <div class="border-t pt-6">
                            <h3 class="font-semibold text-gray-900 mb-4">Follow Us</h3>
                            <div class="flex space-x-4">
                                <a href="#" class="bg-blue-600 text-white p-3 rounded-full hover:bg-blue-700 transition-colors">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="#" class="bg-blue-400 text-white p-3 rounded-full hover:bg-blue-500 transition-colors">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="#" class="bg-pink-600 text-white p-3 rounded-full hover:bg-pink-700 transition-colors">
                                    <i class="fab fa-instagram"></i>
                                </a>
                                <a href="#" class="bg-blue-800 text-white p-3 rounded-full hover:bg-blue-900 transition-colors">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contact Form -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-2xl shadow-lg p-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6">Send us a Message</h2>

                        <form id="contactForm" class="space-y-6">
                            @csrf
                            <!-- Name and Email Row -->
                            <div class="grid md:grid-cols-2 gap-6">
                                <div>
                                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                                        Full Name <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" id="name" name="name" required
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-colors"
                                           placeholder="Enter your full name">
                                    <div class="error-message text-red-500 text-sm mt-1 hidden"></div>
                                </div>
                                <div>
                                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                                        Email Address <span class="text-red-500">*</span>
                                    </label>
                                    <input type="email" id="email" name="email" required
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-colors"
                                           placeholder="Enter your email address">
                                    <div class="error-message text-red-500 text-sm mt-1 hidden"></div>
                                </div>
                            </div>

                            <!-- Phone and Subject Row -->
                            <div class="grid md:grid-cols-2 gap-6">
                                <div>
                                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">
                                        Phone Number
                                    </label>
                                    <input type="tel" id="phone" name="phone"
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-colors"
                                           placeholder="Enter your phone number">
                                </div>
                                <div>
                                    <label for="subject" class="block text-sm font-medium text-gray-700 mb-2">
                                        Subject <span class="text-red-500">*</span>
                                    </label>
                                    <select id="subject" name="subject" required
                                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-colors">
                                        <option value="">Select a subject</option>
                                        <option value="general">General Inquiry</option>
                                        <option value="technical">Technical Support</option>
                                        <option value="billing">Billing & Payments</option>
                                        <option value="partnership">Partnership</option>
                                        <option value="feedback">Feedback & Suggestions</option>
                                        <option value="bug">Report a Bug</option>
                                        <option value="other">Other</option>
                                    </select>
                                    <div class="error-message text-red-500 text-sm mt-1 hidden"></div>
                                </div>
                            </div>

                            <!-- Priority -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Priority Level
                                </label>
                                <div class="flex space-x-4">
                                    <label class="flex items-center">
                                        <input type="radio" name="priority" value="low" checked
                                               class="text-purple-600 focus:ring-purple-500">
                                        <span class="ml-2 text-sm text-gray-700">Low</span>
                                    </label>
                                    <label class="flex items-center">
                                        <input type="radio" name="priority" value="medium"
                                               class="text-purple-600 focus:ring-purple-500">
                                        <span class="ml-2 text-sm text-gray-700">Medium</span>
                                    </label>
                                    <label class="flex items-center">
                                        <input type="radio" name="priority" value="high"
                                               class="text-purple-600 focus:ring-purple-500">
                                        <span class="ml-2 text-sm text-gray-700">High</span>
                                    </label>
                                    <label class="flex items-center">
                                        <input type="radio" name="priority" value="urgent"
                                               class="text-purple-600 focus:ring-purple-500">
                                        <span class="ml-2 text-sm text-gray-700">Urgent</span>
                                    </label>
                                </div>
                            </div>

                            <!-- Message -->
                            <div>
                                <label for="message" class="block text-sm font-medium text-gray-700 mb-2">
                                    Message <span class="text-red-500">*</span>
                                </label>
                                <textarea id="message" name="message" rows="6" required
                                          class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-colors resize-none"
                                          placeholder="Tell us how we can help you..."></textarea>
                                <div class="error-message text-red-500 text-sm mt-1 hidden"></div>
                                <div class="text-sm text-gray-500 mt-1">
                                    <span id="charCount">0</span>/1000 characters
                                </div>
                            </div>

                            <!-- Newsletter Subscription -->
                            <div class="flex items-start">
                                <input type="checkbox" id="newsletter" name="newsletter"
                                       class="mt-1 text-purple-600 focus:ring-purple-500">
                                <label for="newsletter" class="ml-3 text-sm text-gray-700">
                                    Subscribe to our newsletter to receive updates about new features, events, and special offers.
                                </label>
                            </div>

                            <!-- Submit Button -->
                            <div class="flex items-center justify-between">
                                <div class="text-sm text-gray-500">
                                    <span class="text-red-500">*</span> Required fields
                                </div>
                                <button type="submit" id="submitBtn"
                                        class="bg-gradient-to-r from-purple-600 to-blue-600 text-white px-8 py-3 rounded-lg font-semibold hover:from-purple-700 hover:to-blue-700 transition-all duration-200 focus:ring-4 focus:ring-purple-300 focus:outline-none">
                                    <span class="flex items-center">
                                        <i class="fas fa-paper-plane mr-2"></i>
                                        Send Message
                                    </span>
                                </button>
                            </div>
                        </form>

                        <!-- Success Message -->
                        <div id="successMessage" class="hidden mt-6 p-4 bg-green-100 border border-green-400 rounded-lg">
                            <div class="flex items-center">
                                <i class="fas fa-check-circle text-green-600 mr-3"></i>
                                <div>
                                    <h3 class="font-semibold text-green-800">Message Sent Successfully!</h3>
                                    <p class="text-green-700 text-sm">We'll get back to you within 24 hours.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- FAQ Section -->
    <div class="py-16 bg-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Frequently Asked Questions</h2>
                <p class="text-lg text-gray-600">Quick answers to common questions</p>
            </div>

            <div class="max-w-3xl mx-auto">
                <div class="space-y-4">
                    <div class="bg-gray-50 rounded-lg">
                        <button class="faq-toggle w-full text-left p-6 focus:outline-none focus:ring-2 focus:ring-purple-500 rounded-lg">
                            <div class="flex justify-between items-center">
                                <h3 class="font-semibold text-gray-900">How do I register for an event?</h3>
                                <i class="fas fa-chevron-down transform transition-transform"></i>
                            </div>
                        </button>
                        <div class="faq-content hidden px-6 pb-6">
                            <p class="text-gray-600">Simply browse our events, click on the event you're interested in, and follow the registration process. You'll receive instant confirmation and digital tickets via email.</p>
                        </div>
                    </div>

                    <div class="bg-gray-50 rounded-lg">
                        <button class="faq-toggle w-full text-left p-6 focus:outline-none focus:ring-2 focus:ring-purple-500 rounded-lg">
                            <div class="flex justify-between items-center">
                                <h3 class="font-semibold text-gray-900">What payment methods do you accept?</h3>
                                <i class="fas fa-chevron-down transform transition-transform"></i>
                            </div>
                        </button>
                        <div class="faq-content hidden px-6 pb-6">
                            <p class="text-gray-600">We accept all major credit cards (Visa, MasterCard, American Express), PayPal, and bank transfers. All payments are processed securely.</p>
                        </div>
                    </div>

                    <div class="bg-gray-50 rounded-lg">
                        <button class="faq-toggle w-full text-left p-6 focus:outline-none focus:ring-2 focus:ring-purple-500 rounded-lg">
                            <div class="flex justify-between items-center">
                                <h3 class="font-semibold text-gray-900">Can I get a refund if I can't attend?</h3>
                                <i class="fas fa-chevron-down transform transition-transform"></i>
                            </div>
                        </button>
                        <div class="faq-content hidden px-6 pb-6">
                            <p class="text-gray-600">Refund policies vary by event and organizer. Please check the specific event's refund policy before purchasing. Generally, refunds are available up to 7 days before the event.</p>
                        </div>
                    </div>

                    <div class="bg-gray-50 rounded-lg">
                        <button class="faq-toggle w-full text-left p-6 focus:outline-none focus:ring-2 focus:ring-purple-500 rounded-lg">
                            <div class="flex justify-between items-center">
                                <h3 class="font-semibold text-gray-900">How do I access my tickets?</h3>
                                <i class="fas fa-chevron-down transform transition-transform"></i>
                            </div>
                        </button>
                        <div class="faq-content hidden px-6 pb-6">
                            <p class="text-gray-600">Your digital tickets are available in your account dashboard and will be emailed to you. You can also add them to your mobile wallet for easy access at the event.</p>
                        </div>
                    </div>

                    <div class="bg-gray-50 rounded-lg">
                        <button class="faq-toggle w-full text-left p-6 focus:outline-none focus:ring-2 focus:ring-purple-500 rounded-lg">
                            <div class="flex justify-between items-center">
                                <h3 class="font-semibold text-gray-900">How can I become an event organizer?</h3>
                                <i class="fas fa-chevron-down transform transition-transform"></i>
                            </div>
                        </button>
                        <div class="faq-content hidden px-6 pb-6">
                            <p class="text-gray-600">Creating events is easy! Sign up for an organizer account, complete the verification process, and you can start creating and managing events right away.</p>
                        </div>
                    </div>
                </div>

                <div class="text-center mt-8">
                    <p class="text-gray-600 mb-4">Still have questions?</p>
                    <a href="#contactForm" class="text-purple-600 hover:text-purple-700 font-semibold">
                        Get in touch with our support team →
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Office Hours -->
    <div class="py-16 bg-gray-900 text-white">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-3xl font-bold mb-8">Our Office Hours</h2>
            <div class="grid md:grid-cols-3 gap-8 max-w-4xl mx-auto">
                <div class="bg-white bg-opacity-10 rounded-lg p-6">
                    <i class="fas fa-headset text-3xl mb-4 text-purple-400"></i>
                    <h3 class="text-xl font-bold mb-2">Phone Support</h3>
                    <p class="text-gray-300">24/7 Available</p>
                    <p class="text-sm text-gray-400 mt-2">Call us anytime for immediate assistance</p>
                </div>
                <div class="bg-white bg-opacity-10 rounded-lg p-6">
                    <i class="fas fa-envelope text-3xl mb-4 text-blue-400"></i>
                    <h3 class="text-xl font-bold mb-2">Email Support</h3>
                    <p class="text-gray-300">24/7 Available</p>
                    <p class="text-sm text-gray-400 mt-2">Response within 2 hours</p>
                </div>
                <div class="bg-white bg-opacity-10 rounded-lg p-6">
                    <i class="fas fa-building text-3xl mb-4 text-green-400"></i>
                    <h3 class="text-xl font-bold mb-2">Office Visits</h3>
                    <p class="text-gray-300">Mon-Fri: 9AM-6PM PST</p>
                    <p class="text-sm text-gray-400 mt-2">Appointments preferred</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Character counter for message
    const messageTextarea = document.getElementById('message');
    const charCountElement = document.getElementById('charCount');
    const maxLength = 1000;

    messageTextarea.addEventListener('input', function() {
        const currentLength = this.value.length;
        charCountElement.textContent = currentLength;

        if (currentLength > maxLength) {
            charCountElement.classList.add('text-red-500');
            charCountElement.classList.remove('text-gray-500');
        } else {
            charCountElement.classList.remove('text-red-500');
            charCountElement.classList.add('text-gray-500');
        }
    });

    // FAQ Toggle
    document.querySelectorAll('.faq-toggle').forEach(button => {
        button.addEventListener('click', function() {
            const content = this.nextElementSibling;
            const icon = this.querySelector('i');

            if (content.classList.contains('hidden')) {
                content.classList.remove('hidden');
                icon.classList.add('rotate-180');
            } else {
                content.classList.add('hidden');
                icon.classList.remove('rotate-180');
            }
        });
    });

    // Form submission
    document.getElementById('contactForm').addEventListener('submit', function(e) {
        e.preventDefault();

        // Basic validation
        let isValid = true;
        const requiredFields = ['name', 'email', 'subject', 'message'];

        requiredFields.forEach(fieldName => {
            const field = document.getElementById(fieldName);
            const errorElement = field.parentNode.querySelector('.error-message');

            if (!field.value.trim()) {
                field.classList.add('border-red-500');
                errorElement.textContent = 'This field is required';
                errorElement.classList.remove('hidden');
                isValid = false;
            } else {
                field.classList.remove('border-red-500');
                errorElement.classList.add('hidden');
            }
        });

        // Email validation
        const emailField = document.getElementById('email');
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (emailField.value && !emailPattern.test(emailField.value)) {
            const errorElement = emailField.parentNode.querySelector('.error-message');
            emailField.classList.add('border-red-500');
            errorElement.textContent = 'Please enter a valid email address';
            errorElement.classList.remove('hidden');
            isValid = false;
        }

        // Message length validation
        const messageField = document.getElementById('message');
        if (messageField.value.length > maxLength) {
            const errorElement = messageField.parentNode.querySelector('.error-message');
            messageField.classList.add('border-red-500');
            errorElement.textContent = `Message must be ${maxLength} characters or less`;
            errorElement.classList.remove('hidden');
            isValid = false;
        }

        if (isValid) {
            // Simulate form submission
            const submitBtn = document.getElementById('submitBtn');
            const originalContent = submitBtn.innerHTML;

            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Sending...';
            submitBtn.disabled = true;

            setTimeout(() => {
                document.getElementById('successMessage').classList.remove('hidden');
                this.reset();
                submitBtn.innerHTML = originalContent;
                submitBtn.disabled = false;
                charCountElement.textContent = '0';

                // Scroll to success message
                document.getElementById('successMessage').scrollIntoView({
                    behavior: 'smooth',
                    block: 'center'
                });
            }, 2000);
        }
    });

    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth'
                });
            }
        });
    });
});
</script>
@endpush
