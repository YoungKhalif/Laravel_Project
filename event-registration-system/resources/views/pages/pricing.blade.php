@extends('layouts.app')

@section('title', 'Pricing Plans - EventSmart')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Hero Section -->
    <div class="relative bg-gradient-to-br from-purple-600 via-blue-600 to-purple-800 text-white py-20">
        <div class="absolute inset-0 bg-black opacity-20"></div>
        <div class="relative container mx-auto px-6 text-center">
            <h1 class="text-5xl md:text-6xl font-bold mb-6">Simple, Transparent Pricing</h1>
            <p class="text-xl md:text-2xl mb-8 max-w-3xl mx-auto opacity-90">
                Choose the perfect plan for your event needs. No hidden fees, no surprises.
            </p>
            <div class="inline-flex items-center space-x-4 bg-white bg-opacity-20 rounded-full px-6 py-3">
                <i class="fas fa-shield-alt text-xl"></i>
                <span class="font-semibold">30-Day Money Back Guarantee</span>
            </div>
        </div>
    </div>

    <!-- Billing Toggle -->
    <div class="py-8 bg-white">
        <div class="container mx-auto px-6">
            <div class="flex justify-center">
                <div class="bg-gray-100 rounded-lg p-1 flex">
                    <button id="monthlyBtn" class="billing-toggle active px-6 py-2 rounded-md font-semibold transition-all">
                        Monthly
                    </button>
                    <button id="yearlyBtn" class="billing-toggle px-6 py-2 rounded-md font-semibold transition-all">
                        Yearly
                        <span class="ml-2 bg-green-500 text-white text-xs px-2 py-1 rounded-full">Save 20%</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Pricing Plans -->
    <div class="py-16 bg-white">
        <div class="container mx-auto px-6">
            <div class="grid lg:grid-cols-4 gap-8">
                <!-- Free Plan -->
                <div class="bg-white border-2 border-gray-200 rounded-2xl p-8 hover:shadow-lg transition-all duration-300">
                    <div class="text-center">
                        <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-rocket text-2xl text-gray-600"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-2">Starter</h3>
                        <p class="text-gray-600 mb-6">Perfect for small events and getting started</p>

                        <div class="mb-6">
                            <span class="text-4xl font-bold text-gray-900">$0</span>
                            <span class="text-gray-600">/month</span>
                        </div>

                        <button class="w-full bg-gray-800 text-white py-3 px-6 rounded-lg font-semibold hover:bg-gray-900 transition-colors mb-6">
                            Get Started Free
                        </button>
                    </div>

                    <div class="space-y-4">
                        <div class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-3"></i>
                            <span class="text-gray-700">Up to 50 tickets per event</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-3"></i>
                            <span class="text-gray-700">Basic event management</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-3"></i>
                            <span class="text-gray-700">Email notifications</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-3"></i>
                            <span class="text-gray-700">QR code tickets</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-3"></i>
                            <span class="text-gray-700">Basic support</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-times text-gray-400 mr-3"></i>
                            <span class="text-gray-400">Custom branding</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-times text-gray-400 mr-3"></i>
                            <span class="text-gray-400">Advanced analytics</span>
                        </div>
                    </div>
                </div>

                <!-- Professional Plan -->
                <div class="bg-white border-2 border-purple-500 rounded-2xl p-8 hover:shadow-xl transition-all duration-300 relative">
                    <div class="absolute -top-4 left-1/2 transform -translate-x-1/2">
                        <span class="bg-purple-500 text-white px-4 py-1 rounded-full text-sm font-semibold">Most Popular</span>
                    </div>

                    <div class="text-center">
                        <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-star text-2xl text-purple-600"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-2">Professional</h3>
                        <p class="text-gray-600 mb-6">Ideal for growing events and businesses</p>

                        <div class="mb-6">
                            <span class="monthly-price">
                                <span class="text-4xl font-bold text-gray-900">$29</span>
                                <span class="text-gray-600">/month</span>
                            </span>
                            <span class="yearly-price hidden">
                                <span class="text-4xl font-bold text-gray-900">$23</span>
                                <span class="text-gray-600">/month</span>
                                <div class="text-sm text-green-600 font-semibold">$276/year (Save $72)</div>
                            </span>
                        </div>

                        <button class="w-full bg-gradient-to-r from-purple-600 to-blue-600 text-white py-3 px-6 rounded-lg font-semibold hover:from-purple-700 hover:to-blue-700 transition-all mb-6">
                            Start Free Trial
                        </button>
                    </div>

                    <div class="space-y-4">
                        <div class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-3"></i>
                            <span class="text-gray-700">Up to 500 tickets per event</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-3"></i>
                            <span class="text-gray-700">Advanced event management</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-3"></i>
                            <span class="text-gray-700">Custom branding</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-3"></i>
                            <span class="text-gray-700">Advanced analytics</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-3"></i>
                            <span class="text-gray-700">Priority support</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-3"></i>
                            <span class="text-gray-700">Marketing tools</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-3"></i>
                            <span class="text-gray-700">API access</span>
                        </div>
                    </div>
                </div>

                <!-- Business Plan -->
                <div class="bg-white border-2 border-gray-200 rounded-2xl p-8 hover:shadow-lg transition-all duration-300">
                    <div class="text-center">
                        <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-building text-2xl text-blue-600"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-2">Business</h3>
                        <p class="text-gray-600 mb-6">For larger events and organizations</p>

                        <div class="mb-6">
                            <span class="monthly-price">
                                <span class="text-4xl font-bold text-gray-900">$89</span>
                                <span class="text-gray-600">/month</span>
                            </span>
                            <span class="yearly-price hidden">
                                <span class="text-4xl font-bold text-gray-900">$71</span>
                                <span class="text-gray-600">/month</span>
                                <div class="text-sm text-green-600 font-semibold">$852/year (Save $216)</div>
                            </span>
                        </div>

                        <button class="w-full bg-blue-600 text-white py-3 px-6 rounded-lg font-semibold hover:bg-blue-700 transition-colors mb-6">
                            Start Free Trial
                        </button>
                    </div>

                    <div class="space-y-4">
                        <div class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-3"></i>
                            <span class="text-gray-700">Up to 2,000 tickets per event</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-3"></i>
                            <span class="text-gray-700">Everything in Professional</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-3"></i>
                            <span class="text-gray-700">Multi-user accounts</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-3"></i>
                            <span class="text-gray-700">Advanced integrations</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-3"></i>
                            <span class="text-gray-700">White-label solution</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-3"></i>
                            <span class="text-gray-700">Dedicated support</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-3"></i>
                            <span class="text-gray-700">Custom reporting</span>
                        </div>
                    </div>
                </div>

                <!-- Enterprise Plan -->
                <div class="bg-gradient-to-br from-gray-900 to-gray-800 text-white rounded-2xl p-8 hover:shadow-xl transition-all duration-300">
                    <div class="text-center">
                        <div class="w-16 h-16 bg-white bg-opacity-20 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-crown text-2xl text-yellow-400"></i>
                        </div>
                        <h3 class="text-2xl font-bold mb-2">Enterprise</h3>
                        <p class="text-gray-300 mb-6">Custom solutions for large organizations</p>

                        <div class="mb-6">
                            <span class="text-4xl font-bold">Custom</span>
                            <div class="text-gray-300 mt-1">Contact for pricing</div>
                        </div>

                        <button class="w-full bg-white text-gray-900 py-3 px-6 rounded-lg font-semibold hover:bg-gray-100 transition-colors mb-6">
                            Contact Sales
                        </button>
                    </div>

                    <div class="space-y-4">
                        <div class="flex items-center">
                            <i class="fas fa-check text-green-400 mr-3"></i>
                            <span>Unlimited tickets per event</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-check text-green-400 mr-3"></i>
                            <span>Everything in Business</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-check text-green-400 mr-3"></i>
                            <span>Custom development</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-check text-green-400 mr-3"></i>
                            <span>On-premise deployment</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-check text-green-400 mr-3"></i>
                            <span>24/7 phone support</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-check text-green-400 mr-3"></i>
                            <span>Custom SLA</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-check text-green-400 mr-3"></i>
                            <span>Training & onboarding</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Feature Comparison Table -->
    <div class="py-16 bg-gray-50">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Compare All Features</h2>
                <p class="text-lg text-gray-600">See what's included in each plan</p>
            </div>

            <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="text-left py-4 px-6 font-semibold text-gray-900">Features</th>
                                <th class="text-center py-4 px-6 font-semibold text-gray-900">Starter</th>
                                <th class="text-center py-4 px-6 font-semibold text-purple-600">Professional</th>
                                <th class="text-center py-4 px-6 font-semibold text-gray-900">Business</th>
                                <th class="text-center py-4 px-6 font-semibold text-gray-900">Enterprise</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            <tr>
                                <td class="py-4 px-6 font-medium text-gray-900">Tickets per event</td>
                                <td class="py-4 px-6 text-center text-gray-600">50</td>
                                <td class="py-4 px-6 text-center text-gray-600">500</td>
                                <td class="py-4 px-6 text-center text-gray-600">2,000</td>
                                <td class="py-4 px-6 text-center text-gray-600">Unlimited</td>
                            </tr>
                            <tr class="bg-gray-50">
                                <td class="py-4 px-6 font-medium text-gray-900">Custom branding</td>
                                <td class="py-4 px-6 text-center"><i class="fas fa-times text-red-500"></i></td>
                                <td class="py-4 px-6 text-center"><i class="fas fa-check text-green-500"></i></td>
                                <td class="py-4 px-6 text-center"><i class="fas fa-check text-green-500"></i></td>
                                <td class="py-4 px-6 text-center"><i class="fas fa-check text-green-500"></i></td>
                            </tr>
                            <tr>
                                <td class="py-4 px-6 font-medium text-gray-900">Advanced analytics</td>
                                <td class="py-4 px-6 text-center"><i class="fas fa-times text-red-500"></i></td>
                                <td class="py-4 px-6 text-center"><i class="fas fa-check text-green-500"></i></td>
                                <td class="py-4 px-6 text-center"><i class="fas fa-check text-green-500"></i></td>
                                <td class="py-4 px-6 text-center"><i class="fas fa-check text-green-500"></i></td>
                            </tr>
                            <tr class="bg-gray-50">
                                <td class="py-4 px-6 font-medium text-gray-900">API access</td>
                                <td class="py-4 px-6 text-center"><i class="fas fa-times text-red-500"></i></td>
                                <td class="py-4 px-6 text-center"><i class="fas fa-check text-green-500"></i></td>
                                <td class="py-4 px-6 text-center"><i class="fas fa-check text-green-500"></i></td>
                                <td class="py-4 px-6 text-center"><i class="fas fa-check text-green-500"></i></td>
                            </tr>
                            <tr>
                                <td class="py-4 px-6 font-medium text-gray-900">Multi-user accounts</td>
                                <td class="py-4 px-6 text-center"><i class="fas fa-times text-red-500"></i></td>
                                <td class="py-4 px-6 text-center"><i class="fas fa-times text-red-500"></i></td>
                                <td class="py-4 px-6 text-center"><i class="fas fa-check text-green-500"></i></td>
                                <td class="py-4 px-6 text-center"><i class="fas fa-check text-green-500"></i></td>
                            </tr>
                            <tr class="bg-gray-50">
                                <td class="py-4 px-6 font-medium text-gray-900">White-label solution</td>
                                <td class="py-4 px-6 text-center"><i class="fas fa-times text-red-500"></i></td>
                                <td class="py-4 px-6 text-center"><i class="fas fa-times text-red-500"></i></td>
                                <td class="py-4 px-6 text-center"><i class="fas fa-check text-green-500"></i></td>
                                <td class="py-4 px-6 text-center"><i class="fas fa-check text-green-500"></i></td>
                            </tr>
                            <tr>
                                <td class="py-4 px-6 font-medium text-gray-900">24/7 phone support</td>
                                <td class="py-4 px-6 text-center"><i class="fas fa-times text-red-500"></i></td>
                                <td class="py-4 px-6 text-center"><i class="fas fa-times text-red-500"></i></td>
                                <td class="py-4 px-6 text-center"><i class="fas fa-times text-red-500"></i></td>
                                <td class="py-4 px-6 text-center"><i class="fas fa-check text-green-500"></i></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- FAQ Section -->
    <div class="py-16 bg-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Frequently Asked Questions</h2>
                <p class="text-lg text-gray-600">Common questions about our pricing</p>
            </div>

            <div class="max-w-3xl mx-auto">
                <div class="space-y-4">
                    <div class="bg-gray-50 rounded-lg">
                        <button class="faq-toggle w-full text-left p-6 focus:outline-none focus:ring-2 focus:ring-purple-500 rounded-lg">
                            <div class="flex justify-between items-center">
                                <h3 class="font-semibold text-gray-900">Can I switch plans anytime?</h3>
                                <i class="fas fa-chevron-down transform transition-transform"></i>
                            </div>
                        </button>
                        <div class="faq-content hidden px-6 pb-6">
                            <p class="text-gray-600">Yes! You can upgrade or downgrade your plan at any time. Changes will be reflected in your next billing cycle.</p>
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
                            <p class="text-gray-600">We accept all major credit cards, PayPal, and bank transfers for annual plans. All payments are processed securely.</p>
                        </div>
                    </div>

                    <div class="bg-gray-50 rounded-lg">
                        <button class="faq-toggle w-full text-left p-6 focus:outline-none focus:ring-2 focus:ring-purple-500 rounded-lg">
                            <div class="flex justify-between items-center">
                                <h3 class="font-semibold text-gray-900">Is there a free trial?</h3>
                                <i class="fas fa-chevron-down transform transition-transform"></i>
                            </div>
                        </button>
                        <div class="faq-content hidden px-6 pb-6">
                            <p class="text-gray-600">Yes! All paid plans come with a 14-day free trial. No credit card required to start.</p>
                        </div>
                    </div>

                    <div class="bg-gray-50 rounded-lg">
                        <button class="faq-toggle w-full text-left p-6 focus:outline-none focus:ring-2 focus:ring-purple-500 rounded-lg">
                            <div class="flex justify-between items-center">
                                <h3 class="font-semibold text-gray-900">Are there any transaction fees?</h3>
                                <i class="fas fa-chevron-down transform transition-transform"></i>
                            </div>
                        </button>
                        <div class="faq-content hidden px-6 pb-6">
                            <p class="text-gray-600">We charge a small transaction fee of 2.9% + $0.30 per ticket for paid events. Free events have no transaction fees.</p>
                        </div>
                    </div>

                    <div class="bg-gray-50 rounded-lg">
                        <button class="faq-toggle w-full text-left p-6 focus:outline-none focus:ring-2 focus:ring-purple-500 rounded-lg">
                            <div class="flex justify-between items-center">
                                <h3 class="font-semibold text-gray-900">What happens if I exceed my ticket limit?</h3>
                                <i class="fas fa-chevron-down transform transition-transform"></i>
                            </div>
                        </button>
                        <div class="faq-content hidden px-6 pb-6">
                            <p class="text-gray-600">If you exceed your plan's ticket limit, we'll automatically suggest an upgrade. You can continue selling tickets, and we'll adjust your billing accordingly.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="py-20 bg-gradient-to-br from-purple-600 via-blue-600 to-purple-800 text-white">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-4xl font-bold mb-6">Ready to Get Started?</h2>
            <p class="text-xl mb-8 max-w-2xl mx-auto opacity-90">
                Join thousands of event organizers who trust EventSmart to power their events.
            </p>
            <div class="space-x-4">
                <a href="#" class="bg-white text-purple-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition-colors inline-block">
                    Start Free Trial
                </a>
                <a href="{{ route('contact') }}" class="border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-purple-600 transition-colors inline-block">
                    Contact Sales
                </a>
            </div>
            <p class="text-sm mt-6 opacity-75">No credit card required • Cancel anytime • 30-day money-back guarantee</p>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Billing toggle functionality
    const monthlyBtn = document.getElementById('monthlyBtn');
    const yearlyBtn = document.getElementById('yearlyBtn');
    const monthlyPrices = document.querySelectorAll('.monthly-price');
    const yearlyPrices = document.querySelectorAll('.yearly-price');

    function toggleBilling(isYearly) {
        if (isYearly) {
            yearlyBtn.classList.add('active');
            monthlyBtn.classList.remove('active');
            monthlyPrices.forEach(price => price.classList.add('hidden'));
            yearlyPrices.forEach(price => price.classList.remove('hidden'));
        } else {
            monthlyBtn.classList.add('active');
            yearlyBtn.classList.remove('active');
            yearlyPrices.forEach(price => price.classList.add('hidden'));
            monthlyPrices.forEach(price => price.classList.remove('hidden'));
        }
    }

    monthlyBtn.addEventListener('click', () => toggleBilling(false));
    yearlyBtn.addEventListener('click', () => toggleBilling(true));

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
});
</script>

<style>
.billing-toggle.active {
    background-color: white;
    color: #6366f1;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
}

.billing-toggle:not(.active) {
    color: #6b7280;
}
</style>
@endpush
