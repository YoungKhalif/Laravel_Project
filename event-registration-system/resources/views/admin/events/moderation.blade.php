@extends('layouts.app')

@section('title', 'Event Moderation - Admin Dashboard - EventSmart')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Header -->
    <div class="bg-white shadow-sm border-b">
        <div class="container mx-auto px-6 py-4">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900">Event Moderation</h1>
                    <p class="text-gray-600">Review and approve events submitted by organizers</p>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="bg-yellow-100 px-4 py-2 rounded-lg">
                        <span class="text-yellow-800 font-semibold">
                            <i class="fas fa-clock mr-2"></i>
                            <span id="pendingCount">12</span> Pending Review
                        </span>
                    </div>
                    <button id="bulkApprove" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition-colors">
                        <i class="fas fa-check-double mr-2"></i>Bulk Approve
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="container mx-auto px-6 py-8">
        <!-- Stats Overview -->
        <div class="grid md:grid-cols-4 gap-6 mb-8">
            <div class="bg-white rounded-xl shadow-sm p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm font-medium">Pending Review</p>
                        <p class="text-3xl font-bold text-yellow-600">12</p>
                    </div>
                    <div class="bg-yellow-100 p-3 rounded-full">
                        <i class="fas fa-clock text-yellow-600 text-xl"></i>
                    </div>
                </div>
                <div class="mt-4 flex items-center">
                    <span class="text-gray-600 text-sm">Avg. review time: 2.3 hours</span>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm font-medium">Approved Today</p>
                        <p class="text-3xl font-bold text-green-600">28</p>
                    </div>
                    <div class="bg-green-100 p-3 rounded-full">
                        <i class="fas fa-check-circle text-green-600 text-xl"></i>
                    </div>
                </div>
                <div class="mt-4 flex items-center">
                    <span class="text-green-600 text-sm font-medium">+15% from yesterday</span>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm font-medium">Rejected Today</p>
                        <p class="text-3xl font-bold text-red-600">3</p>
                    </div>
                    <div class="bg-red-100 p-3 rounded-full">
                        <i class="fas fa-times-circle text-red-600 text-xl"></i>
                    </div>
                </div>
                <div class="mt-4 flex items-center">
                    <span class="text-red-600 text-sm font-medium">8.2% rejection rate</span>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm font-medium">Total Events</p>
                        <p class="text-3xl font-bold text-blue-600">1,247</p>
                    </div>
                    <div class="bg-blue-100 p-3 rounded-full">
                        <i class="fas fa-calendar-alt text-blue-600 text-xl"></i>
                    </div>
                </div>
                <div class="mt-4 flex items-center">
                    <span class="text-blue-600 text-sm font-medium">This month</span>
                </div>
            </div>
        </div>

        <!-- Moderation Queue Tabs -->
        <div class="bg-white rounded-xl shadow-sm mb-8">
            <div class="border-b border-gray-200">
                <nav class="flex space-x-8 px-6">
                    <button class="moderation-tab active py-4 px-2 text-yellow-600 border-b-2 border-yellow-600 font-semibold" data-status="pending">
                        Pending Review (12)
                    </button>
                    <button class="moderation-tab py-4 px-2 text-gray-600 hover:text-green-600 font-semibold" data-status="approved">
                        Recently Approved (28)
                    </button>
                    <button class="moderation-tab py-4 px-2 text-gray-600 hover:text-red-600 font-semibold" data-status="rejected">
                        Rejected (3)
                    </button>
                    <button class="moderation-tab py-4 px-2 text-gray-600 hover:text-blue-600 font-semibold" data-status="flagged">
                        Flagged Events (2)
                    </button>
                </nav>
            </div>

            <!-- Filters -->
            <div class="p-6 border-b border-gray-200">
                <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
                    <div class="flex flex-col md:flex-row items-center space-y-4 md:space-y-0 md:space-x-4 w-full md:w-auto">
                        <div class="relative w-full md:w-auto">
                            <input type="text" id="searchEvents" placeholder="Search events by title, organizer, or category..."
                                   class="w-full md:w-96 pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500">
                            <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                        </div>

                        <select id="categoryFilter" class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500">
                            <option value="">All Categories</option>
                            <option value="conference">Conference</option>
                            <option value="workshop">Workshop</option>
                            <option value="networking">Networking</option>
                            <option value="webinar">Webinar</option>
                            <option value="seminar">Seminar</option>
                        </select>

                        <select id="priorityFilter" class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500">
                            <option value="">All Priorities</option>
                            <option value="high">High Priority</option>
                            <option value="medium">Medium Priority</option>
                            <option value="low">Low Priority</option>
                        </select>

                        <select id="sortFilter" class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500">
                            <option value="newest">Newest First</option>
                            <option value="oldest">Oldest First</option>
                            <option value="priority">Priority</option>
                            <option value="event-date">Event Date</option>
                        </select>
                    </div>

                    <button id="clearModerationFilters" class="text-purple-600 hover:text-purple-700 font-semibold">
                        Clear Filters
                    </button>
                </div>
            </div>
        </div>

        <!-- Events List -->
        <div id="eventsContainer">
            <!-- Events will be populated by JavaScript -->
        </div>

        <!-- Pagination -->
        <div class="flex justify-center mt-8">
            <div class="flex space-x-2">
                <button class="px-3 py-2 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 disabled:opacity-50" disabled>
                    Previous
                </button>
                <button class="px-3 py-2 bg-purple-600 text-white rounded-lg">1</button>
                <button class="px-3 py-2 bg-white border border-gray-300 rounded-lg hover:bg-gray-50">2</button>
                <button class="px-3 py-2 bg-white border border-gray-300 rounded-lg hover:bg-gray-50">3</button>
                <button class="px-3 py-2 bg-white border border-gray-300 rounded-lg hover:bg-gray-50">
                    Next
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Event Review Modal -->
<div id="reviewModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
    <div class="bg-white rounded-xl max-w-6xl w-full mx-4 max-h-screen overflow-y-auto">
        <div class="p-6 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <h3 class="text-xl font-bold text-gray-900">Event Review</h3>
                <button id="closeReviewModal" class="text-gray-400 hover:text-gray-600">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>
        </div>

        <div class="p-6">
            <div id="eventReviewContent">
                <!-- Event review content will be populated by JavaScript -->
            </div>
        </div>

        <div class="p-6 border-t border-gray-200 bg-gray-50">
            <div class="flex justify-end space-x-4">
                <button id="rejectEvent" class="bg-red-600 text-white px-6 py-2 rounded-lg hover:bg-red-700 transition-colors">
                    <i class="fas fa-times mr-2"></i>Reject Event
                </button>
                <button id="requestChanges" class="bg-yellow-600 text-white px-6 py-2 rounded-lg hover:bg-yellow-700 transition-colors">
                    <i class="fas fa-edit mr-2"></i>Request Changes
                </button>
                <button id="approveEvent" class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700 transition-colors">
                    <i class="fas fa-check mr-2"></i>Approve Event
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Rejection/Changes Modal -->
<div id="feedbackModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
    <div class="bg-white rounded-xl max-w-2xl w-full mx-4">
        <div class="p-6 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <h3 class="text-xl font-bold text-gray-900" id="feedbackModalTitle">Provide Feedback</h3>
                <button id="closeFeedbackModal" class="text-gray-400 hover:text-gray-600">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>
        </div>

        <form id="feedbackForm" class="p-6">
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">Reason for Action</label>
                <select id="feedbackReason" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500" required>
                    <option value="">Select a reason...</option>
                    <option value="inappropriate-content">Inappropriate Content</option>
                    <option value="incomplete-information">Incomplete Information</option>
                    <option value="pricing-issues">Pricing Issues</option>
                    <option value="date-conflicts">Date/Time Conflicts</option>
                    <option value="venue-issues">Venue Issues</option>
                    <option value="spam">Spam or Duplicate</option>
                    <option value="policy-violation">Policy Violation</option>
                    <option value="other">Other</option>
                </select>
            </div>

            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">Detailed Feedback</label>
                <textarea id="feedbackMessage" rows="6" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500"
                          placeholder="Provide detailed feedback to help the organizer understand the issues..." required></textarea>
            </div>

            <div class="mb-6">
                <label class="flex items-center">
                    <input type="checkbox" id="sendNotification" checked class="rounded border-gray-300 text-purple-600 focus:ring-purple-500">
                    <span class="ml-2 text-sm text-gray-600">Send email notification to organizer</span>
                </label>
            </div>

            <div class="flex justify-end space-x-4">
                <button type="button" id="cancelFeedback" class="px-6 py-2 border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">
                    Cancel
                </button>
                <button type="submit" id="submitFeedback" class="bg-purple-600 text-white px-6 py-2 rounded-lg hover:bg-purple-700 transition-colors">
                    Submit Feedback
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Bulk Action Modal -->
<div id="bulkModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
    <div class="bg-white rounded-xl max-w-md w-full mx-4">
        <div class="p-6">
            <div class="text-center">
                <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-check-double text-green-600 text-2xl"></i>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">Bulk Approve Events</h3>
                <p class="text-gray-600 mb-6">Are you sure you want to approve all selected events?</p>

                <div class="flex space-x-3">
                    <button id="cancelBulkAction" class="flex-1 bg-gray-200 text-gray-800 py-2 rounded-lg hover:bg-gray-300 transition-colors">
                        Cancel
                    </button>
                    <button id="confirmBulkAction" class="flex-1 bg-green-600 text-white py-2 rounded-lg hover:bg-green-700 transition-colors">
                        Approve All
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Sample events data
    const eventsData = [
        {
            id: 1,
            title: 'Tech Innovation Summit 2025',
            organizer: 'TechCorp Inc.',
            organizerEmail: 'contact@techcorp.com',
            category: 'conference',
            status: 'pending',
            priority: 'high',
            submittedDate: '2025-07-28',
            eventDate: '2025-08-15',
            location: 'San Francisco Convention Center',
            price: 299,
            capacity: 500,
            description: 'Join industry leaders for the most anticipated tech conference of the year. Featuring keynotes from top innovators, hands-on workshops, and extensive networking opportunities.',
            image: 'https://via.placeholder.com/400x200/667eea/ffffff?text=Tech+Summit',
            flagged: false,
            flagReason: '',
            attendeeCount: 0,
            revenue: 0
        },
        {
            id: 2,
            title: 'AI Workshop Series - Machine Learning Fundamentals',
            organizer: 'DataScience Academy',
            organizerEmail: 'hello@datascience.com',
            category: 'workshop',
            status: 'pending',
            priority: 'medium',
            submittedDate: '2025-07-27',
            eventDate: '2025-08-10',
            location: 'Online',
            price: 149,
            capacity: 100,
            description: 'Comprehensive machine learning workshop covering fundamentals to advanced techniques. Perfect for beginners and intermediate data scientists.',
            image: 'https://via.placeholder.com/400x200/48bb78/ffffff?text=AI+Workshop',
            flagged: false,
            flagReason: '',
            attendeeCount: 0,
            revenue: 0
        },
        {
            id: 3,
            title: 'Startup Networking Mixer',
            organizer: 'Startup NYC',
            organizerEmail: 'events@startupnyc.com',
            category: 'networking',
            status: 'approved',
            priority: 'low',
            submittedDate: '2025-07-25',
            eventDate: '2025-08-05',
            location: 'Manhattan Business Center',
            price: 25,
            capacity: 150,
            description: 'Connect with fellow entrepreneurs, investors, and startup enthusiasts in the heart of NYC.',
            image: 'https://via.placeholder.com/400x200/f59e0b/ffffff?text=Networking',
            flagged: false,
            flagReason: '',
            attendeeCount: 85,
            revenue: 2125
        },
        {
            id: 4,
            title: 'Questionable Business Seminar',
            organizer: 'Shady Corp',
            organizerEmail: 'sketchy@example.com',
            category: 'seminar',
            status: 'flagged',
            priority: 'high',
            submittedDate: '2025-07-26',
            eventDate: '2025-08-20',
            location: 'Unknown Venue',
            price: 999,
            capacity: 50,
            description: 'Get rich quick schemes and questionable business practices. Guaranteed results!',
            image: 'https://via.placeholder.com/400x200/ef4444/ffffff?text=Flagged',
            flagged: true,
            flagReason: 'Potential scam - unrealistic promises and suspicious content',
            attendeeCount: 0,
            revenue: 0
        },
        {
            id: 5,
            title: 'Digital Marketing Bootcamp',
            organizer: 'Marketing Pros',
            organizerEmail: 'team@marketingpros.com',
            category: 'workshop',
            status: 'rejected',
            priority: 'medium',
            submittedDate: '2025-07-24',
            eventDate: '2025-08-12',
            location: 'Chicago Training Center',
            price: 199,
            capacity: 75,
            description: 'Incomplete event description and missing required information.',
            image: 'https://via.placeholder.com/400x200/ef4444/ffffff?text=Rejected',
            flagged: false,
            flagReason: 'Incomplete information - missing detailed agenda and speaker bios',
            attendeeCount: 0,
            revenue: 0
        }
    ];

    let filteredEvents = [...eventsData];
    let currentStatus = 'pending';
    let selectedEvents = new Set();

    // Initialize page
    function init() {
        renderEvents();
        setupEventListeners();
        updateStats();
    }

    // Render events
    function renderEvents() {
        const container = document.getElementById('eventsContainer');
        container.innerHTML = '';

        const statusEvents = filteredEvents.filter(event => {
            if (currentStatus === 'pending') return event.status === 'pending';
            if (currentStatus === 'approved') return event.status === 'approved';
            if (currentStatus === 'rejected') return event.status === 'rejected';
            if (currentStatus === 'flagged') return event.flagged || event.status === 'flagged';
            return true;
        });

        if (statusEvents.length === 0) {
            container.innerHTML = `
                <div class="text-center py-16">
                    <i class="fas fa-inbox text-6xl text-gray-300 mb-6"></i>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">No Events Found</h3>
                    <p class="text-gray-600">No events match your current filters.</p>
                </div>
            `;
            return;
        }

        statusEvents.forEach(event => {
            const eventCard = createEventCard(event);
            container.appendChild(eventCard);
        });
    }

    // Create event card
    function createEventCard(event) {
        const card = document.createElement('div');
        card.className = 'bg-white rounded-xl shadow-sm mb-6 overflow-hidden hover:shadow-lg transition-shadow duration-300';

        const statusBadge = getStatusBadge(event.status, event.flagged);
        const priorityBadge = getPriorityBadge(event.priority);

        card.innerHTML = `
            <div class="flex">
                ${currentStatus === 'pending' ? `
                    <div class="p-4 flex items-center">
                        <input type="checkbox" class="event-checkbox rounded border-gray-300 text-purple-600 focus:ring-purple-500"
                               data-id="${event.id}" ${selectedEvents.has(event.id) ? 'checked' : ''}>
                    </div>
                ` : ''}

                <div class="flex-shrink-0">
                    <img src="${event.image}" alt="${event.title}" class="w-48 h-32 object-cover">
                </div>

                <div class="flex-1 p-6">
                    <div class="flex items-start justify-between mb-4">
                        <div class="flex-1">
                            <div class="flex items-center space-x-3 mb-2">
                                <h3 class="text-xl font-bold text-gray-900">${event.title}</h3>
                                ${statusBadge}
                                ${priorityBadge}
                                ${event.flagged ? '<i class="fas fa-flag text-red-500" title="Flagged Event"></i>' : ''}
                            </div>

                            <div class="grid md:grid-cols-2 gap-4 text-sm text-gray-600 mb-4">
                                <div class="space-y-2">
                                    <div class="flex items-center">
                                        <i class="fas fa-user mr-2 w-4"></i>
                                        <span>${event.organizer}</span>
                                    </div>
                                    <div class="flex items-center">
                                        <i class="fas fa-calendar mr-2 w-4"></i>
                                        <span>${formatDate(event.eventDate)}</span>
                                    </div>
                                    <div class="flex items-center">
                                        <i class="fas fa-map-marker-alt mr-2 w-4"></i>
                                        <span>${event.location}</span>
                                    </div>
                                </div>
                                <div class="space-y-2">
                                    <div class="flex items-center">
                                        <i class="fas fa-tag mr-2 w-4"></i>
                                        <span class="capitalize">${event.category}</span>
                                    </div>
                                    <div class="flex items-center">
                                        <i class="fas fa-dollar-sign mr-2 w-4"></i>
                                        <span>${event.price === 0 ? 'Free' : `$${event.price}`}</span>
                                    </div>
                                    <div class="flex items-center">
                                        <i class="fas fa-users mr-2 w-4"></i>
                                        <span>${event.attendeeCount}/${event.capacity} attendees</span>
                                    </div>
                                </div>
                            </div>

                            <p class="text-gray-600 mb-4 line-clamp-2">${event.description}</p>

                            ${event.flagged ? `
                                <div class="bg-red-50 border border-red-200 rounded-lg p-3 mb-4">
                                    <div class="flex items-center">
                                        <i class="fas fa-exclamation-triangle text-red-600 mr-2"></i>
                                        <span class="text-red-800 font-semibold">Flagged: </span>
                                        <span class="text-red-700">${event.flagReason}</span>
                                    </div>
                                </div>
                            ` : ''}

                            <div class="text-xs text-gray-500">
                                Submitted ${formatDate(event.submittedDate)}
                                ${event.status === 'approved' ? ` • ${event.attendeeCount} registered • $${event.revenue.toLocaleString()} revenue` : ''}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="p-6 flex flex-col justify-center space-y-3">
                    <button onclick="reviewEvent(${event.id})" class="bg-purple-600 text-white px-4 py-2 rounded-lg hover:bg-purple-700 transition-colors text-sm font-semibold">
                        <i class="fas fa-eye mr-2"></i>Review
                    </button>

                    ${event.status === 'pending' ? `
                        <button onclick="quickApprove(${event.id})" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition-colors text-sm font-semibold">
                            <i class="fas fa-check mr-2"></i>Quick Approve
                        </button>
                        <button onclick="quickReject(${event.id})" class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition-colors text-sm font-semibold">
                            <i class="fas fa-times mr-2"></i>Quick Reject
                        </button>
                    ` : ''}

                    ${event.flagged ? `
                        <button onclick="unflagEvent(${event.id})" class="bg-yellow-600 text-white px-4 py-2 rounded-lg hover:bg-yellow-700 transition-colors text-sm font-semibold">
                            <i class="fas fa-flag mr-2"></i>Unflag
                        </button>
                    ` : `
                        <button onclick="flagEvent(${event.id})" class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700 transition-colors text-sm font-semibold">
                            <i class="fas fa-flag mr-2"></i>Flag
                        </button>
                    `}
                </div>
            </div>
        `;

        return card;
    }

    // Get status badge
    function getStatusBadge(status, flagged) {
        if (flagged) {
            return '<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">Flagged</span>';
        }

        const badges = {
            pending: '<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">Pending</span>',
            approved: '<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">Approved</span>',
            rejected: '<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">Rejected</span>'
        };
        return badges[status] || badges.pending;
    }

    // Get priority badge
    function getPriorityBadge(priority) {
        const badges = {
            high: '<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">High Priority</span>',
            medium: '<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">Medium Priority</span>',
            low: '<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">Low Priority</span>'
        };
        return badges[priority] || badges.medium;
    }

    // Format date
    function formatDate(dateString) {
        return new Date(dateString).toLocaleDateString('en-US', {
            year: 'numeric',
            month: 'short',
            day: 'numeric'
        });
    }

    // Update stats
    function updateStats() {
        const pending = eventsData.filter(e => e.status === 'pending').length;
        const approved = eventsData.filter(e => e.status === 'approved').length;
        const rejected = eventsData.filter(e => e.status === 'rejected').length;
        const flagged = eventsData.filter(e => e.flagged).length;

        document.getElementById('pendingCount').textContent = pending;

        // Update tab counts
        document.querySelector('[data-status="pending"]').textContent = `Pending Review (${pending})`;
        document.querySelector('[data-status="approved"]').textContent = `Recently Approved (${approved})`;
        document.querySelector('[data-status="rejected"]').textContent = `Rejected (${rejected})`;
        document.querySelector('[data-status="flagged"]').textContent = `Flagged Events (${flagged})`;
    }

    // Filter events
    function filterEvents() {
        const searchTerm = document.getElementById('searchEvents').value.toLowerCase();
        const category = document.getElementById('categoryFilter').value;
        const priority = document.getElementById('priorityFilter').value;
        const sort = document.getElementById('sortFilter').value;

        filteredEvents = eventsData.filter(event => {
            let matches = true;

            if (searchTerm && !event.title.toLowerCase().includes(searchTerm) &&
                !event.organizer.toLowerCase().includes(searchTerm) &&
                !event.category.toLowerCase().includes(searchTerm)) {
                matches = false;
            }

            if (category && event.category !== category) matches = false;
            if (priority && event.priority !== priority) matches = false;

            return matches;
        });

        // Sort events
        filteredEvents.sort((a, b) => {
            switch (sort) {
                case 'oldest':
                    return new Date(a.submittedDate) - new Date(b.submittedDate);
                case 'priority':
                    const priorityOrder = { high: 3, medium: 2, low: 1 };
                    return priorityOrder[b.priority] - priorityOrder[a.priority];
                case 'event-date':
                    return new Date(a.eventDate) - new Date(b.eventDate);
                case 'newest':
                default:
                    return new Date(b.submittedDate) - new Date(a.submittedDate);
            }
        });

        renderEvents();
    }

    // Setup event listeners
    function setupEventListeners() {
        // Tab switching
        document.querySelectorAll('.moderation-tab').forEach(tab => {
            tab.addEventListener('click', function() {
                document.querySelectorAll('.moderation-tab').forEach(t => {
                    t.classList.remove('active', 'text-yellow-600', 'border-b-2', 'border-yellow-600');
                    t.classList.add('text-gray-600');
                });

                this.classList.add('active', 'text-yellow-600', 'border-b-2', 'border-yellow-600');
                this.classList.remove('text-gray-600');

                currentStatus = this.dataset.status;
                renderEvents();
            });
        });

        // Search and filters
        document.getElementById('searchEvents').addEventListener('input', filterEvents);
        document.getElementById('categoryFilter').addEventListener('change', filterEvents);
        document.getElementById('priorityFilter').addEventListener('change', filterEvents);
        document.getElementById('sortFilter').addEventListener('change', filterEvents);

        // Clear filters
        document.getElementById('clearModerationFilters').addEventListener('click', () => {
            document.getElementById('searchEvents').value = '';
            document.getElementById('categoryFilter').value = '';
            document.getElementById('priorityFilter').value = '';
            document.getElementById('sortFilter').value = 'newest';
            filterEvents();
        });

        // Event checkboxes
        document.addEventListener('change', function(e) {
            if (e.target.classList.contains('event-checkbox')) {
                const eventId = parseInt(e.target.dataset.id);
                if (e.target.checked) {
                    selectedEvents.add(eventId);
                } else {
                    selectedEvents.delete(eventId);
                }
            }
        });

        // Modal handlers
        document.getElementById('closeReviewModal').addEventListener('click', closeReviewModal);
        document.getElementById('closeFeedbackModal').addEventListener('click', closeFeedbackModal);
        document.getElementById('cancelFeedback').addEventListener('click', closeFeedbackModal);

        // Bulk actions
        document.getElementById('bulkApprove').addEventListener('click', () => {
            if (selectedEvents.size === 0) {
                alert('Please select events to approve');
                return;
            }
            document.getElementById('bulkModal').classList.remove('hidden');
            document.getElementById('bulkModal').classList.add('flex');
        });

        document.getElementById('cancelBulkAction').addEventListener('click', () => {
            document.getElementById('bulkModal').classList.add('hidden');
            document.getElementById('bulkModal').classList.remove('flex');
        });

        document.getElementById('confirmBulkAction').addEventListener('click', () => {
            selectedEvents.forEach(eventId => {
                const event = eventsData.find(e => e.id === eventId);
                if (event) event.status = 'approved';
            });

            selectedEvents.clear();
            renderEvents();
            updateStats();
            showSuccessMessage(`${selectedEvents.size} events approved successfully`);

            document.getElementById('bulkModal').classList.add('hidden');
            document.getElementById('bulkModal').classList.remove('flex');
        });

        // Review modal actions
        document.getElementById('approveEvent').addEventListener('click', () => {
            const eventId = parseInt(document.getElementById('approveEvent').dataset.eventId);
            approveEvent(eventId);
        });

        document.getElementById('rejectEvent').addEventListener('click', () => {
            const eventId = parseInt(document.getElementById('rejectEvent').dataset.eventId);
            openFeedbackModal('reject', eventId);
        });

        document.getElementById('requestChanges').addEventListener('click', () => {
            const eventId = parseInt(document.getElementById('requestChanges').dataset.eventId);
            openFeedbackModal('changes', eventId);
        });

        // Feedback form
        document.getElementById('feedbackForm').addEventListener('submit', handleFeedbackSubmission);
    }

    // Review event
    window.reviewEvent = function(eventId) {
        const event = eventsData.find(e => e.id === eventId);
        if (!event) return;

        const content = document.getElementById('eventReviewContent');
        content.innerHTML = `
            <div class="grid lg:grid-cols-3 gap-8">
                <div class="lg:col-span-2">
                    <div class="mb-8">
                        <img src="${event.image}" alt="${event.title}" class="w-full h-64 object-cover rounded-lg mb-6">

                        <h2 class="text-3xl font-bold text-gray-900 mb-4">${event.title}</h2>

                        <div class="grid md:grid-cols-2 gap-6 mb-6">
                            <div class="space-y-3">
                                <div class="flex items-center">
                                    <i class="fas fa-user mr-3 text-gray-400"></i>
                                    <div>
                                        <span class="font-semibold">Organizer:</span>
                                        <div>${event.organizer}</div>
                                        <div class="text-sm text-gray-600">${event.organizerEmail}</div>
                                    </div>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-calendar mr-3 text-gray-400"></i>
                                    <div>
                                        <span class="font-semibold">Event Date:</span>
                                        <div>${formatDate(event.eventDate)}</div>
                                    </div>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-map-marker-alt mr-3 text-gray-400"></i>
                                    <div>
                                        <span class="font-semibold">Location:</span>
                                        <div>${event.location}</div>
                                    </div>
                                </div>
                            </div>

                            <div class="space-y-3">
                                <div class="flex items-center">
                                    <i class="fas fa-tag mr-3 text-gray-400"></i>
                                    <div>
                                        <span class="font-semibold">Category:</span>
                                        <div class="capitalize">${event.category}</div>
                                    </div>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-dollar-sign mr-3 text-gray-400"></i>
                                    <div>
                                        <span class="font-semibold">Price:</span>
                                        <div>${event.price === 0 ? 'Free' : `$${event.price}`}</div>
                                    </div>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-users mr-3 text-gray-400"></i>
                                    <div>
                                        <span class="font-semibold">Capacity:</span>
                                        <div>${event.capacity} attendees</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-6">
                            <h3 class="text-xl font-bold text-gray-900 mb-3">Event Description</h3>
                            <p class="text-gray-600 leading-relaxed">${event.description}</p>
                        </div>

                        ${event.flagged ? `
                            <div class="bg-red-50 border border-red-200 rounded-lg p-4 mb-6">
                                <h4 class="font-semibold text-red-800 mb-2">
                                    <i class="fas fa-exclamation-triangle mr-2"></i>Flagged Content
                                </h4>
                                <p class="text-red-700">${event.flagReason}</p>
                            </div>
                        ` : ''}
                    </div>
                </div>

                <div>
                    <div class="bg-gray-50 p-6 rounded-lg mb-6">
                        <h3 class="text-lg font-bold text-gray-900 mb-4">Review Checklist</h3>
                        <div class="space-y-3">
                            <label class="flex items-center">
                                <input type="checkbox" class="rounded border-gray-300 text-green-600 focus:ring-green-500">
                                <span class="ml-2 text-sm">Event title is appropriate</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" class="rounded border-gray-300 text-green-600 focus:ring-green-500">
                                <span class="ml-2 text-sm">Description is complete and accurate</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" class="rounded border-gray-300 text-green-600 focus:ring-green-500">
                                <span class="ml-2 text-sm">Pricing is reasonable</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" class="rounded border-gray-300 text-green-600 focus:ring-green-500">
                                <span class="ml-2 text-sm">Date and venue are valid</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" class="rounded border-gray-300 text-green-600 focus:ring-green-500">
                                <span class="ml-2 text-sm">Organizer is verified</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" class="rounded border-gray-300 text-green-600 focus:ring-green-500">
                                <span class="ml-2 text-sm">Content follows community guidelines</span>
                            </label>
                        </div>
                    </div>

                    <div class="bg-gray-50 p-6 rounded-lg">
                        <h3 class="text-lg font-bold text-gray-900 mb-4">Submission Details</h3>
                        <div class="space-y-2 text-sm">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Event ID:</span>
                                <span class="font-medium">#${event.id}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Submitted:</span>
                                <span class="font-medium">${formatDate(event.submittedDate)}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Priority:</span>
                                <span class="font-medium capitalize">${event.priority}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Status:</span>
                                <span class="font-medium capitalize">${event.status}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        `;

        // Set event ID for action buttons
        document.getElementById('approveEvent').dataset.eventId = eventId;
        document.getElementById('rejectEvent').dataset.eventId = eventId;
        document.getElementById('requestChanges').dataset.eventId = eventId;

        document.getElementById('reviewModal').classList.remove('hidden');
        document.getElementById('reviewModal').classList.add('flex');
    };

    // Quick actions
    window.quickApprove = function(eventId) {
        approveEvent(eventId);
    };

    window.quickReject = function(eventId) {
        openFeedbackModal('reject', eventId);
    };

    window.flagEvent = function(eventId) {
        const reason = prompt('Reason for flagging this event:');
        if (reason) {
            const event = eventsData.find(e => e.id === eventId);
            if (event) {
                event.flagged = true;
                event.flagReason = reason;
                renderEvents();
                updateStats();
                showSuccessMessage('Event flagged successfully');
            }
        }
    };

    window.unflagEvent = function(eventId) {
        const event = eventsData.find(e => e.id === eventId);
        if (event) {
            event.flagged = false;
            event.flagReason = '';
            renderEvents();
            updateStats();
            showSuccessMessage('Event unflagged successfully');
        }
    };

    // Approve event
    function approveEvent(eventId) {
        const event = eventsData.find(e => e.id === eventId);
        if (event) {
            event.status = 'approved';
            renderEvents();
            updateStats();
            closeReviewModal();
            showSuccessMessage('Event approved successfully');
        }
    }

    // Open feedback modal
    function openFeedbackModal(type, eventId) {
        const title = type === 'reject' ? 'Reject Event' : 'Request Changes';
        document.getElementById('feedbackModalTitle').textContent = title;
        document.getElementById('feedbackForm').dataset.action = type;
        document.getElementById('feedbackForm').dataset.eventId = eventId;

        document.getElementById('feedbackModal').classList.remove('hidden');
        document.getElementById('feedbackModal').classList.add('flex');
        closeReviewModal();
    }

    // Handle feedback submission
    function handleFeedbackSubmission(e) {
        e.preventDefault();

        const action = e.target.dataset.action;
        const eventId = parseInt(e.target.dataset.eventId);
        const reason = document.getElementById('feedbackReason').value;
        const message = document.getElementById('feedbackMessage').value;
        const sendNotification = document.getElementById('sendNotification').checked;

        const event = eventsData.find(e => e.id === eventId);
        if (event) {
            event.status = action === 'reject' ? 'rejected' : 'pending';
            event.flagReason = `${reason}: ${message}`;

            renderEvents();
            updateStats();
            closeFeedbackModal();

            const actionText = action === 'reject' ? 'rejected' : 'changes requested for';
            showSuccessMessage(`Event ${actionText} successfully`);
        }
    }

    // Modal functions
    function closeReviewModal() {
        document.getElementById('reviewModal').classList.add('hidden');
        document.getElementById('reviewModal').classList.remove('flex');
    }

    function closeFeedbackModal() {
        document.getElementById('feedbackModal').classList.add('hidden');
        document.getElementById('feedbackModal').classList.remove('flex');
        document.getElementById('feedbackForm').reset();
    }

    // Show success message
    function showSuccessMessage(message) {
        const notification = document.createElement('div');
        notification.className = 'fixed top-4 right-4 bg-green-600 text-white px-6 py-3 rounded-lg shadow-lg z-50';
        notification.innerHTML = `
            <div class="flex items-center">
                <i class="fas fa-check-circle mr-2"></i>
                ${message}
            </div>
        `;

        document.body.appendChild(notification);

        setTimeout(() => {
            notification.remove();
        }, 3000);
    }

    // Initialize page
    init();
});
</script>

<style>
.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.moderation-tab.active {
    color: #d97706;
    border-bottom: 2px solid #d97706;
}
</style>
@endpush
