@extends('layouts.app')

@section('title', 'API Documentation - EventSmart')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Header -->
    <div class="bg-purple-600">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="text-center">
                <h1 class="text-3xl font-bold text-white">API Documentation</h1>
                <p class="mt-4 text-xl text-purple-100">
                    Everything you need to integrate with the EventSmart platform
                </p>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="grid grid-cols-12 gap-6">
            <!-- Sidebar Navigation -->
            <div class="col-span-12 lg:col-span-3">
                <div class="sticky top-8">
                    <nav class="space-y-1 bg-white rounded-xl shadow-sm p-4" aria-label="Sidebar">
                        <a href="#getting-started" class="text-purple-600 hover:bg-purple-50 group flex items-center px-3 py-2 text-sm font-medium rounded-md">
                            <i class="fas fa-play-circle w-6"></i>
                            Getting Started
                        </a>
                        <a href="#authentication" class="text-gray-900 hover:bg-purple-50 group flex items-center px-3 py-2 text-sm font-medium rounded-md">
                            <i class="fas fa-key w-6"></i>
                            Authentication
                        </a>
                        <a href="#events" class="text-gray-900 hover:bg-purple-50 group flex items-center px-3 py-2 text-sm font-medium rounded-md">
                            <i class="fas fa-calendar w-6"></i>
                            Events
                        </a>
                        <a href="#tickets" class="text-gray-900 hover:bg-purple-50 group flex items-center px-3 py-2 text-sm font-medium rounded-md">
                            <i class="fas fa-ticket-alt w-6"></i>
                            Tickets
                        </a>
                        <a href="#users" class="text-gray-900 hover:bg-purple-50 group flex items-center px-3 py-2 text-sm font-medium rounded-md">
                            <i class="fas fa-users w-6"></i>
                            Users
                        </a>
                        <a href="#webhooks" class="text-gray-900 hover:bg-purple-50 group flex items-center px-3 py-2 text-sm font-medium rounded-md">
                            <i class="fas fa-plug w-6"></i>
                            Webhooks
                        </a>
                        <a href="#errors" class="text-gray-900 hover:bg-purple-50 group flex items-center px-3 py-2 text-sm font-medium rounded-md">
                            <i class="fas fa-exclamation-circle w-6"></i>
                            Errors
                        </a>
                    </nav>

                    <!-- API Keys -->
                    <div class="mt-6 bg-white rounded-xl shadow-sm p-6">
                        <h3 class="text-lg font-medium text-gray-900">Your API Keys</h3>
                        <div class="mt-4 space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Live API Key</label>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                    <input type="text" value="sk_live_..." readonly
                                        class="flex-1 min-w-0 block w-full px-3 py-2 rounded-md text-sm text-gray-900 bg-gray-50 border-gray-300">
                                    <button type="button" class="ml-3 inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                                        <i class="fas fa-copy"></i>
                                    </button>
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Test API Key</label>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                    <input type="text" value="sk_test_..." readonly
                                        class="flex-1 min-w-0 block w-full px-3 py-2 rounded-md text-sm text-gray-900 bg-gray-50 border-gray-300">
                                    <button type="button" class="ml-3 inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                                        <i class="fas fa-copy"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Documentation Content -->
            <div class="col-span-12 lg:col-span-9 space-y-8">
                <!-- Getting Started -->
                <div id="getting-started" class="bg-white rounded-xl shadow-sm overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-200">
                        <h2 class="text-xl font-medium text-gray-900">Getting Started</h2>
                    </div>
                    <div class="p-6 prose max-w-none">
                        <p>
                            Welcome to the EventSmart API! You can use our API to access all the features
                            of our platform programmatically, from creating and managing events to processing
                            ticket sales and handling user registrations.
                        </p>
                        <h3>Base URL</h3>
                        <pre class="bg-gray-800 text-white p-4 rounded-md overflow-x-auto">
https://api.eventsmart.com/v1</pre>

                        <h3>Client Libraries</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 not-prose">
                            @foreach(['PHP', 'Python', 'Node.js', 'Ruby'] as $lang)
                                <a href="#" class="flex items-center p-4 border rounded-lg hover:border-purple-500 hover:shadow-sm">
                                    <i class="fab fa-{{ strtolower($lang) }} text-2xl text-purple-600 mr-3"></i>
                                    <div>
                                        <div class="font-medium text-gray-900">{{ $lang }}</div>
                                        <div class="text-sm text-gray-500">View Documentation</div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Authentication -->
                <div id="authentication" class="bg-white rounded-xl shadow-sm overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-200">
                        <h2 class="text-xl font-medium text-gray-900">Authentication</h2>
                    </div>
                    <div class="p-6 prose max-w-none">
                        <p>
                            Authentication to the API is performed via HTTP Bearer Auth. Provide your API key
                            as the bearer token in the Authorization header.
                        </p>
                        <pre class="bg-gray-800 text-white p-4 rounded-md overflow-x-auto">
curl -H "Authorization: Bearer YOUR_API_KEY" \
     https://api.eventsmart.com/v1/events</pre>

                        <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 not-prose">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <i class="fas fa-exclamation-triangle text-yellow-400"></i>
                                </div>
                                <div class="ml-3">
                                    <h3 class="text-sm font-medium text-yellow-800">
                                        Important Security Notice
                                    </h3>
                                    <div class="mt-2 text-sm text-yellow-700">
                                        <p>Never share your API keys or commit them to version control.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Events API -->
                <div id="events" class="bg-white rounded-xl shadow-sm overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-200">
                        <h2 class="text-xl font-medium text-gray-900">Events API</h2>
                    </div>
                    <div class="p-6 space-y-6">
                        <!-- List Events -->
                        <div>
                            <div class="flex items-center justify-between">
                                <h3 class="text-lg font-medium text-gray-900">List Events</h3>
                                <span class="px-3 py-1 text-xs font-medium text-green-800 bg-green-100 rounded-full">GET</span>
                            </div>
                            <p class="mt-2 text-sm text-gray-500">
                                Returns a list of events. The events are returned sorted by creation date,
                                with the most recently created events appearing first.
                            </p>
                            <pre class="mt-4 bg-gray-800 text-white p-4 rounded-md overflow-x-auto">
GET /v1/events

{
  "data": [
    {
      "id": "evt_123",
      "name": "Tech Conference 2025",
      "start_date": "2025-09-15T09:00:00Z",
      "end_date": "2025-09-17T17:00:00Z",
      "status": "published"
    }
  ],
  "meta": {
    "total": 1,
    "page": 1,
    "per_page": 10
  }
}</pre>
                        </div>

                        <!-- Create Event -->
                        <div class="pt-6 border-t border-gray-200">
                            <div class="flex items-center justify-between">
                                <h3 class="text-lg font-medium text-gray-900">Create Event</h3>
                                <span class="px-3 py-1 text-xs font-medium text-blue-800 bg-blue-100 rounded-full">POST</span>
                            </div>
                            <p class="mt-2 text-sm text-gray-500">
                                Creates a new event with the provided details.
                            </p>
                            <pre class="mt-4 bg-gray-800 text-white p-4 rounded-md overflow-x-auto">
POST /v1/events

{
  "name": "Tech Conference 2025",
  "description": "Annual technology conference",
  "start_date": "2025-09-15T09:00:00Z",
  "end_date": "2025-09-17T17:00:00Z",
  "timezone": "America/New_York",
  "venue": {
    "name": "Convention Center",
    "address": "123 Main St"
  }
}</pre>
                        </div>
                    </div>
                </div>

                <!-- Request Examples -->
                <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-200">
                        <h2 class="text-xl font-medium text-gray-900">Request Examples</h2>
                    </div>
                    <div class="p-6">
                        <!-- Language Tabs -->
                        <div class="border-b border-gray-200">
                            <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                                <button class="border-purple-500 text-purple-600 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                                    cURL
                                </button>
                                <button class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                                    PHP
                                </button>
                                <button class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                                    Python
                                </button>
                                <button class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                                    Node.js
                                </button>
                            </nav>
                        </div>

                        <!-- Code Example -->
                        <pre class="mt-4 bg-gray-800 text-white p-4 rounded-md overflow-x-auto">
curl -X POST "https://api.eventsmart.com/v1/events" \
  -H "Authorization: Bearer YOUR_API_KEY" \
  -H "Content-Type: application/json" \
  -d '{
    "name": "Tech Conference 2025",
    "description": "Annual technology conference",
    "start_date": "2025-09-15T09:00:00Z",
    "end_date": "2025-09-17T17:00:00Z",
    "timezone": "America/New_York"
  }'</pre>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
// Smooth scroll to sections
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
    });
});

// Copy API keys
document.querySelectorAll('.fa-copy').forEach(button => {
    button.parentElement.addEventListener('click', function() {
        const input = this.parentElement.querySelector('input');
        input.select();
        document.execCommand('copy');

        // Show copied notification
        const originalText = this.innerHTML;
        this.innerHTML = '<i class="fas fa-check"></i>';
        setTimeout(() => {
            this.innerHTML = originalText;
        }, 2000);
    });
});
</script>
@endpush
