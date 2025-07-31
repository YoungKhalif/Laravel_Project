@extends('layouts.app')

@section('title', 'About Us - EventSmart')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Hero Section -->
    <div class="relative bg-gradient-to-br from-purple-600 via-blue-600 to-purple-800 text-white py-24">
        <div class="absolute inset-0 bg-black opacity-20"></div>
        <div class="relative container mx-auto px-6 text-center">
            <h1 class="text-5xl md:text-6xl font-bold mb-6">About EventSmart</h1>
            <p class="text-xl md:text-2xl mb-8 max-w-3xl mx-auto opacity-90">
                Making events memorable, one ticket at a time. We're passionate about connecting people through amazing experiences.
            </p>
            <div class="inline-flex items-center space-x-4 bg-white bg-opacity-20 rounded-full px-6 py-3">
                <i class="fas fa-calendar-check text-2xl"></i>
                <span class="font-semibold">Established in 2023</span>
            </div>
        </div>
    </div>

    <!-- Our Story Section -->
    <div class="py-20 bg-white">
        <div class="container mx-auto px-6">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <div>
                    <h2 class="text-4xl font-bold text-gray-900 mb-6">Our Story</h2>
                    <p class="text-lg text-gray-700 mb-6 leading-relaxed">
                        EventSmart was born from a simple idea: event discovery and registration should be effortless,
                        secure, and enjoyable. Founded in 2023 by a team of passionate event enthusiasts and tech innovators,
                        we set out to transform how people find, register for, and manage their event experiences.
                    </p>
                    <p class="text-lg text-gray-700 mb-6 leading-relaxed">
                        What started as a solution to streamline event registration has evolved into a comprehensive
                        platform that serves thousands of event organizers and attendees worldwide. We believe that
                        great events bring people together, create lasting memories, and build stronger communities.
                    </p>
                    <div class="flex items-start space-x-4 p-6 bg-blue-50 rounded-lg">
                        <i class="fas fa-lightbulb text-blue-600 text-2xl mt-1"></i>
                        <div>
                            <h3 class="font-semibold text-gray-900 mb-2">Our Mission</h3>
                            <p class="text-gray-700">To democratize event access and make discovering amazing experiences as simple as a click.</p>
                        </div>
                    </div>
                </div>
                <div class="relative">
                    <div class="bg-gradient-to-br from-purple-100 to-blue-100 rounded-3xl p-8 h-96 flex items-center justify-center">
                        <div class="text-center">
                            <i class="fas fa-users text-6xl text-purple-600 mb-4"></i>
                            <h3 class="text-2xl font-bold text-gray-900 mb-2">Building Communities</h3>
                            <p class="text-gray-700">Connecting people through shared experiences</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistics Section -->
    <div class="py-16 bg-gray-900 text-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold mb-4">Our Impact in Numbers</h2>
                <p class="text-xl text-gray-300">See how we're making events better for everyone</p>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="text-center">
                    <div class="bg-gradient-to-br from-purple-500 to-blue-600 rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-ticket-alt text-2xl"></i>
                    </div>
                    <div class="text-3xl font-bold mb-2 text-purple-400">500K+</div>
                    <div class="text-gray-300">Tickets Sold</div>
                </div>
                <div class="text-center">
                    <div class="bg-gradient-to-br from-green-500 to-teal-600 rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-calendar-alt text-2xl"></i>
                    </div>
                    <div class="text-3xl font-bold mb-2 text-green-400">15K+</div>
                    <div class="text-gray-300">Events Hosted</div>
                </div>
                <div class="text-center">
                    <div class="bg-gradient-to-br from-yellow-500 to-orange-600 rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-users text-2xl"></i>
                    </div>
                    <div class="text-3xl font-bold mb-2 text-yellow-400">100K+</div>
                    <div class="text-gray-300">Happy Users</div>
                </div>
                <div class="text-center">
                    <div class="bg-gradient-to-br from-red-500 to-pink-600 rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-globe text-2xl"></i>
                    </div>
                    <div class="text-3xl font-bold mb-2 text-red-400">50+</div>
                    <div class="text-gray-300">Countries</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Values Section -->
    <div class="py-20 bg-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Our Core Values</h2>
                <p class="text-xl text-gray-600">The principles that guide everything we do</p>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="text-center group hover:transform hover:scale-105 transition-all duration-300">
                    <div class="bg-gradient-to-br from-purple-100 to-blue-100 rounded-full w-24 h-24 flex items-center justify-center mx-auto mb-6 group-hover:shadow-lg">
                        <i class="fas fa-heart text-3xl text-purple-600"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Passion</h3>
                    <p class="text-gray-600 leading-relaxed">
                        We're passionate about events and believe in their power to bring people together, inspire creativity, and create lasting memories.
                    </p>
                </div>
                <div class="text-center group hover:transform hover:scale-105 transition-all duration-300">
                    <div class="bg-gradient-to-br from-green-100 to-teal-100 rounded-full w-24 h-24 flex items-center justify-center mx-auto mb-6 group-hover:shadow-lg">
                        <i class="fas fa-shield-alt text-3xl text-green-600"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Trust</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Security, transparency, and reliability are at the core of our platform. Your data and transactions are always protected.
                    </p>
                </div>
                <div class="text-center group hover:transform hover:scale-105 transition-all duration-300">
                    <div class="bg-gradient-to-br from-yellow-100 to-orange-100 rounded-full w-24 h-24 flex items-center justify-center mx-auto mb-6 group-hover:shadow-lg">
                        <i class="fas fa-rocket text-3xl text-yellow-600"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Innovation</h3>
                    <p class="text-gray-600 leading-relaxed">
                        We continuously innovate to make event discovery, registration, and management simpler and more intuitive.
                    </p>
                </div>
                <div class="text-center group hover:transform hover:scale-105 transition-all duration-300">
                    <div class="bg-gradient-to-br from-red-100 to-pink-100 rounded-full w-24 h-24 flex items-center justify-center mx-auto mb-6 group-hover:shadow-lg">
                        <i class="fas fa-users text-3xl text-red-600"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Community</h3>
                    <p class="text-gray-600 leading-relaxed">
                        We're building more than a platform – we're fostering a global community of event enthusiasts and organizers.
                    </p>
                </div>
                <div class="text-center group hover:transform hover:scale-105 transition-all duration-300">
                    <div class="bg-gradient-to-br from-indigo-100 to-purple-100 rounded-full w-24 h-24 flex items-center justify-center mx-auto mb-6 group-hover:shadow-lg">
                        <i class="fas fa-magic text-3xl text-indigo-600"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Excellence</h3>
                    <p class="text-gray-600 leading-relaxed">
                        We strive for excellence in every aspect of our service, from user experience to customer support.
                    </p>
                </div>
                <div class="text-center group hover:transform hover:scale-105 transition-all duration-300">
                    <div class="bg-gradient-to-br from-blue-100 to-cyan-100 rounded-full w-24 h-24 flex items-center justify-center mx-auto mb-6 group-hover:shadow-lg">
                        <i class="fas fa-handshake text-3xl text-blue-600"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Partnership</h3>
                    <p class="text-gray-600 leading-relaxed">
                        We work closely with event organizers to understand their needs and provide tools that help them succeed.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Team Section -->
    <div class="py-20 bg-gray-50">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Meet Our Team</h2>
                <p class="text-xl text-gray-600">The passionate people behind EventSmart</p>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="text-center bg-white rounded-lg p-6 shadow-md hover:shadow-lg transition-shadow">
                    <div class="w-24 h-24 bg-gradient-to-br from-purple-400 to-blue-500 rounded-full mx-auto mb-4 flex items-center justify-center">
                        <i class="fas fa-user text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Sarah Johnson</h3>
                    <p class="text-purple-600 font-semibold mb-3">CEO & Founder</p>
                    <p class="text-gray-600 text-sm">Former event manager with 10+ years of experience in the industry.</p>
                </div>
                <div class="text-center bg-white rounded-lg p-6 shadow-md hover:shadow-lg transition-shadow">
                    <div class="w-24 h-24 bg-gradient-to-br from-green-400 to-teal-500 rounded-full mx-auto mb-4 flex items-center justify-center">
                        <i class="fas fa-user text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Mike Chen</h3>
                    <p class="text-green-600 font-semibold mb-3">CTO</p>
                    <p class="text-gray-600 text-sm">Full-stack developer and technology enthusiast with expertise in scalable platforms.</p>
                </div>
                <div class="text-center bg-white rounded-lg p-6 shadow-md hover:shadow-lg transition-shadow">
                    <div class="w-24 h-24 bg-gradient-to-br from-yellow-400 to-orange-500 rounded-full mx-auto mb-4 flex items-center justify-center">
                        <i class="fas fa-user text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Emily Rodriguez</h3>
                    <p class="text-yellow-600 font-semibold mb-3">Head of Design</p>
                    <p class="text-gray-600 text-sm">UX/UI designer focused on creating intuitive and beautiful user experiences.</p>
                </div>
                <div class="text-center bg-white rounded-lg p-6 shadow-md hover:shadow-lg transition-shadow">
                    <div class="w-24 h-24 bg-gradient-to-br from-red-400 to-pink-500 rounded-full mx-auto mb-4 flex items-center justify-center">
                        <i class="fas fa-user text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">David Wilson</h3>
                    <p class="text-red-600 font-semibold mb-3">Head of Operations</p>
                    <p class="text-gray-600 text-sm">Operations expert ensuring smooth platform performance and customer satisfaction.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Future Vision Section -->
    <div class="py-20 bg-gradient-to-br from-purple-600 via-blue-600 to-purple-800 text-white">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-4xl font-bold mb-6">Our Vision for the Future</h2>
            <p class="text-xl mb-12 max-w-4xl mx-auto opacity-90 leading-relaxed">
                We envision a world where discovering and attending events is seamless, where organizers have the tools
                they need to create amazing experiences, and where communities are strengthened through shared moments.
                Join us as we continue to innovate and shape the future of event technology.
            </p>
            <div class="grid md:grid-cols-3 gap-8 mb-12">
                <div class="bg-white bg-opacity-10 rounded-lg p-6">
                    <i class="fas fa-globe-americas text-4xl mb-4"></i>
                    <h3 class="text-xl font-bold mb-3">Global Expansion</h3>
                    <p class="opacity-90">Bringing EventSmart to every corner of the world</p>
                </div>
                <div class="bg-white bg-opacity-10 rounded-lg p-6">
                    <i class="fas fa-brain text-4xl mb-4"></i>
                    <h3 class="text-xl font-bold mb-3">AI-Powered Recommendations</h3>
                    <p class="opacity-90">Smart suggestions based on your preferences and behavior</p>
                </div>
                <div class="bg-white bg-opacity-10 rounded-lg p-6">
                    <i class="fas fa-mobile-alt text-4xl mb-4"></i>
                    <h3 class="text-xl font-bold mb-3">Mobile-First Experience</h3>
                    <p class="opacity-90">Seamless event management from any device, anywhere</p>
                </div>
            </div>
            <div class="space-x-4">
                <a href="{{ route('events.index') }}" class="bg-white text-purple-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition-colors inline-block">
                    Explore Events
                </a>
                <a href="{{ route('contact') }}" class="border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-purple-600 transition-colors inline-block">
                    Get in Touch
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Animate statistics when they come into view
    const observerOptions = {
        threshold: 0.5,
        rootMargin: '0px 0px -100px 0px'
    };

    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const counter = entry.target;
                const target = parseInt(counter.dataset.target);
                animateCounter(counter, target);
            }
        });
    }, observerOptions);

    // Add data-target attributes and observe counters
    document.querySelectorAll('.text-3xl.font-bold').forEach((counter, index) => {
        const targets = [500000, 15000, 100000, 50];
        counter.dataset.target = targets[index] || 0;
        observer.observe(counter);
    });

    function animateCounter(element, target) {
        let current = 0;
        const increment = target / 100;
        const timer = setInterval(() => {
            current += increment;
            if (current >= target) {
                current = target;
                clearInterval(timer);
            }

            let displayValue = Math.floor(current);
            if (displayValue >= 1000) {
                displayValue = Math.floor(displayValue / 1000) + 'K+';
            }
            element.textContent = displayValue;
        }, 20);
    }
});
</script>
@endpush
