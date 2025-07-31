@extends('layouts.app')

@section('title', 'Waitlist Management - EventSmart')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Header -->
    <div class="bg-white shadow-sm border-b">
        <div class="container mx-auto px-6 py-4">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900">Waitlist Management</h1>
                    <p class="text-gray-600">Manage event waitlists and notify attendees when spots become available</p>
                </div>
                <div class="flex items-center space-x-4">
                    <select id="eventFilter" class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500">
                        <option value="">All Events</option>
                        <option value="1">Tech Innovation Summit 2025</option>
                        <option value="2">AI Workshop Series</option>
                        <option value="3">Developer Conference</option>
                    </select>
                    <button id="exportWaitlist" class="bg-purple-600 text-white px-4 py-2 rounded-lg hover:bg-purple-700 transition-colors">
                        <i class="fas fa-download mr-2"></i>Export
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
                        <p class="text-gray-600 text-sm font-medium">Total Waitlisted</p>
                        <p class="text-3xl font-bold text-gray-900">247</p>
                    </div>
                    <div class="bg-purple-100 p-3 rounded-full">
                        <i class="fas fa-clock text-purple-600 text-xl"></i>
                    </div>
                </div>
                <div class="mt-4 flex items-center">
                    <span class="text-green-600 text-sm font-medium">+12% from last week</span>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm font-medium">Spots Available</p>
                        <p class="text-3xl font-bold text-gray-900">18</p>
                    </div>
                    <div class="bg-green-100 p-3 rounded-full">
                        <i class="fas fa-ticket-alt text-green-600 text-xl"></i>
                    </div>
                </div>
                <div class="mt-4 flex items-center">
                    <span class="text-blue-600 text-sm font-medium">Ready to notify</span>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm font-medium">Converted Today</p>
                        <p class="text-3xl font-bold text-gray-900">8</p>
                    </div>
                    <div class="bg-blue-100 p-3 rounded-full">
                        <i class="fas fa-user-check text-blue-600 text-xl"></i>
                    </div>
                </div>
                <div class="mt-4 flex items-center">
                    <span class="text-green-600 text-sm font-medium">89% conversion rate</span>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm font-medium">Avg. Wait Time</p>
                        <p class="text-3xl font-bold text-gray-900">3.2</p>
                        <p class="text-gray-500 text-sm">days</p>
                    </div>
                    <div class="bg-yellow-100 p-3 rounded-full">
                        <i class="fas fa-hourglass-half text-yellow-600 text-xl"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="bg-white rounded-xl shadow-sm p-6 mb-8">
            <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
                <div>
                    <h2 class="text-lg font-bold text-gray-900 mb-2">Quick Actions</h2>
                    <p class="text-gray-600 text-sm">Manage waitlists and notify participants</p>
                </div>
                <div class="flex flex-wrap gap-3">
                    <button id="notifyNext" class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700 transition-colors font-semibold">
                        <i class="fas fa-bell mr-2"></i>Notify Next 10
                    </button>
                    <button id="bulkNotify" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition-colors font-semibold">
                        <i class="fas fa-users mr-2"></i>Bulk Notify
                    </button>
                    <button id="sendReminder" class="bg-yellow-600 text-white px-6 py-2 rounded-lg hover:bg-yellow-700 transition-colors font-semibold">
                        <i class="fas fa-envelope mr-2"></i>Send Reminder
                    </button>
                    <button id="manageCapacity" class="bg-purple-600 text-white px-6 py-2 rounded-lg hover:bg-purple-700 transition-colors font-semibold">
                        <i class="fas fa-cog mr-2"></i>Manage Capacity
                    </button>
                </div>
            </div>
        </div>

        <!-- Events with Waitlists -->
        <div class="grid lg:grid-cols-3 gap-8">
            <!-- Waitlist Table -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                    <div class="p-6 border-b border-gray-200">
                        <div class="flex items-center justify-between">
                            <h2 class="text-xl font-bold text-gray-900">Current Waitlists</h2>
                            <div class="flex items-center space-x-3">
                                <div class="relative">
                                    <input type="text" id="searchWaitlist" placeholder="Search participants..."
                                           class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500">
                                    <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                                </div>
                                <select id="statusFilter" class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500">
                                    <option value="">All Status</option>
                                    <option value="waiting">Waiting</option>
                                    <option value="notified">Notified</option>
                                    <option value="expired">Expired</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Waitlist Table -->
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        <input type="checkbox" id="selectAll" class="rounded border-gray-300 text-purple-600 focus:ring-purple-500">
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Participant</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Event</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Position</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Wait Time</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody id="waitlistTable" class="bg-white divide-y divide-gray-200">
                                <!-- Table rows will be populated by JavaScript -->
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="px-6 py-3 bg-gray-50 border-t border-gray-200">
                        <div class="flex items-center justify-between">
                            <div class="text-sm text-gray-700">
                                Showing <span class="font-medium">1</span> to <span class="font-medium">10</span> of <span class="font-medium">247</span> results
                            </div>
                            <div class="flex space-x-2">
                                <button class="px-3 py-1 text-sm bg-white border border-gray-300 rounded hover:bg-gray-50">Previous</button>
                                <button class="px-3 py-1 text-sm bg-purple-600 text-white rounded">1</button>
                                <button class="px-3 py-1 text-sm bg-white border border-gray-300 rounded hover:bg-gray-50">2</button>
                                <button class="px-3 py-1 text-sm bg-white border border-gray-300 rounded hover:bg-gray-50">3</button>
                                <button class="px-3 py-1 text-sm bg-white border border-gray-300 rounded hover:bg-gray-50">Next</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="space-y-6">
                <!-- Event Details -->
                <div class="bg-white rounded-xl shadow-sm p-6">
                    <h3 class="text-lg font-bold text-gray-900 mb-4">Event Details</h3>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Select Event</label>
                            <select id="eventSelect" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500">
                                <option value="1">Tech Innovation Summit 2025</option>
                                <option value="2">AI Workshop Series</option>
                                <option value="3">Developer Conference</option>
                            </select>
                        </div>

                        <div class="bg-gray-50 p-4 rounded-lg">
                            <div class="flex justify-between items-center mb-2">
                                <span class="text-sm text-gray-600">Current Capacity</span>
                                <span class="font-semibold">500/500</span>
                            </div>
                            <div class="flex justify-between items-center mb-2">
                                <span class="text-sm text-gray-600">Waitlist Count</span>
                                <span class="font-semibold">127</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-600">Available Spots</span>
                                <span class="font-semibold text-green-600">8</span>
                            </div>
                        </div>

                        <button class="w-full bg-purple-600 text-white py-2 rounded-lg hover:bg-purple-700 transition-colors font-semibold">
                            Update Capacity
                        </button>
                    </div>
                </div>

                <!-- Notification Settings -->
                <div class="bg-white rounded-xl shadow-sm p-6">
                    <h3 class="text-lg font-bold text-gray-900 mb-4">Notification Settings</h3>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Notification Window</label>
                            <select class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500">
                                <option>24 hours</option>
                                <option>48 hours</option>
                                <option>72 hours</option>
                                <option>1 week</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Auto-notify when spots available</label>
                            <div class="flex items-center">
                                <input type="checkbox" id="autoNotify" checked class="rounded border-gray-300 text-purple-600 focus:ring-purple-500">
                                <label for="autoNotify" class="ml-2 text-sm text-gray-600">Enable automatic notifications</label>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Batch size for notifications</label>
                            <input type="number" value="10" min="1" max="50" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500">
                        </div>
                    </div>
                </div>

                <!-- Recent Activity -->
                <div class="bg-white rounded-xl shadow-sm p-6">
                    <h3 class="text-lg font-bold text-gray-900 mb-4">Recent Activity</h3>
                    <div class="space-y-3" id="recentActivity">
                        <!-- Activity items will be populated by JavaScript -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Notification Modal -->
<div id="notificationModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
    <div class="bg-white rounded-xl p-8 max-w-md w-full mx-4">
        <div class="text-center">
            <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                <i class="fas fa-bell text-green-600 text-2xl"></i>
            </div>
            <h3 class="text-xl font-bold text-gray-900 mb-2">Notify Participants</h3>
            <p class="text-gray-600 mb-6">Send notifications to the next 10 participants on the waitlist?</p>

            <div class="flex space-x-3">
                <button id="cancelNotify" class="flex-1 bg-gray-200 text-gray-800 py-2 rounded-lg hover:bg-gray-300 transition-colors">
                    Cancel
                </button>
                <button id="confirmNotify" class="flex-1 bg-green-600 text-white py-2 rounded-lg hover:bg-green-700 transition-colors">
                    Send Notifications
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Capacity Modal -->
<div id="capacityModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
    <div class="bg-white rounded-xl p-8 max-w-md w-full mx-4">
        <h3 class="text-xl font-bold text-gray-900 mb-4">Update Event Capacity</h3>

        <div class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Current Capacity</label>
                <input type="number" id="currentCapacity" value="500" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">New Capacity</label>
                <input type="number" id="newCapacity" value="550" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500">
            </div>

            <div class="bg-blue-50 p-4 rounded-lg">
                <p class="text-sm text-blue-600">
                    <i class="fas fa-info-circle mr-1"></i>
                    Increasing capacity will automatically notify waitlisted participants.
                </p>
            </div>
        </div>

        <div class="flex space-x-3 mt-6">
            <button id="cancelCapacity" class="flex-1 bg-gray-200 text-gray-800 py-2 rounded-lg hover:bg-gray-300 transition-colors">
                Cancel
            </button>
            <button id="updateCapacity" class="flex-1 bg-purple-600 text-white py-2 rounded-lg hover:bg-purple-700 transition-colors">
                Update Capacity
            </button>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Sample waitlist data
    const waitlistData = [
        {
            id: 1,
            name: 'Sarah Johnson',
            email: 'sarah@example.com',
            event: 'Tech Innovation Summit',
            position: 1,
            waitTime: '2 days',
            status: 'waiting',
            joinedDate: '2025-08-01'
        },
        {
            id: 2,
            name: 'Michael Chen',
            email: 'michael@example.com',
            event: 'Tech Innovation Summit',
            position: 2,
            waitTime: '3 days',
            status: 'notified',
            joinedDate: '2025-07-30'
        },
        {
            id: 3,
            name: 'Emily Rodriguez',
            email: 'emily@example.com',
            event: 'AI Workshop Series',
            position: 1,
            waitTime: '1 day',
            status: 'waiting',
            joinedDate: '2025-08-02'
        },
        {
            id: 4,
            name: 'David Kim',
            email: 'david@example.com',
            event: 'Developer Conference',
            position: 3,
            waitTime: '5 days',
            status: 'waiting',
            joinedDate: '2025-07-28'
        },
        {
            id: 5,
            name: 'Lisa Wong',
            email: 'lisa@example.com',
            event: 'Tech Innovation Summit',
            position: 4,
            waitTime: '1 week',
            status: 'expired',
            joinedDate: '2025-07-25'
        }
    ];

    const recentActivities = [
        {
            type: 'notification',
            message: '10 participants notified for Tech Summit',
            time: '2 minutes ago',
            icon: 'fas fa-bell',
            color: 'text-green-600'
        },
        {
            type: 'conversion',
            message: 'Sarah J. converted from waitlist',
            time: '15 minutes ago',
            icon: 'fas fa-user-check',
            color: 'text-blue-600'
        },
        {
            type: 'capacity',
            message: 'AI Workshop capacity increased to 100',
            time: '1 hour ago',
            icon: 'fas fa-plus-circle',
            color: 'text-purple-600'
        },
        {
            type: 'waitlist',
            message: '5 new waitlist registrations',
            time: '2 hours ago',
            icon: 'fas fa-clock',
            color: 'text-yellow-600'
        }
    ];

    let filteredData = [...waitlistData];

    // Initialize page
    function init() {
        renderWaitlistTable();
        renderRecentActivity();
        setupEventListeners();
    }

    // Render waitlist table
    function renderWaitlistTable() {
        const tbody = document.getElementById('waitlistTable');
        tbody.innerHTML = '';

        filteredData.forEach(participant => {
            const row = document.createElement('tr');
            row.className = 'hover:bg-gray-50';

            const statusBadge = getStatusBadge(participant.status);

            row.innerHTML = `
                <td class="px-6 py-4 whitespace-nowrap">
                    <input type="checkbox" class="participant-checkbox rounded border-gray-300 text-purple-600 focus:ring-purple-500" data-id="${participant.id}">
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 h-10 w-10">
                            <div class="h-10 w-10 rounded-full bg-purple-100 flex items-center justify-center">
                                <span class="text-purple-600 font-semibold text-sm">
                                    ${participant.name.split(' ').map(n => n[0]).join('')}
                                </span>
                            </div>
                        </div>
                        <div class="ml-4">
                            <div class="text-sm font-medium text-gray-900">${participant.name}</div>
                            <div class="text-sm text-gray-500">${participant.email}</div>
                        </div>
                    </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">${participant.event}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm font-medium text-gray-900">#${participant.position}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">${participant.waitTime}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    ${statusBadge}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                    <div class="flex space-x-2">
                        <button class="text-purple-600 hover:text-purple-900 p-1" onclick="notifyParticipant(${participant.id})" title="Notify">
                            <i class="fas fa-bell"></i>
                        </button>
                        <button class="text-blue-600 hover:text-blue-900 p-1" onclick="emailParticipant(${participant.id})" title="Email">
                            <i class="fas fa-envelope"></i>
                        </button>
                        <button class="text-green-600 hover:text-green-900 p-1" onclick="promoteParticipant(${participant.id})" title="Promote">
                            <i class="fas fa-arrow-up"></i>
                        </button>
                        <button class="text-red-600 hover:text-red-900 p-1" onclick="removeParticipant(${participant.id})" title="Remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </td>
            `;

            tbody.appendChild(row);
        });
    }

    // Get status badge
    function getStatusBadge(status) {
        const badges = {
            waiting: '<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">Waiting</span>',
            notified: '<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">Notified</span>',
            expired: '<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">Expired</span>'
        };
        return badges[status] || badges.waiting;
    }

    // Render recent activity
    function renderRecentActivity() {
        const container = document.getElementById('recentActivity');
        container.innerHTML = '';

        recentActivities.forEach(activity => {
            const item = document.createElement('div');
            item.className = 'flex items-start space-x-3 p-3 bg-gray-50 rounded-lg';

            item.innerHTML = `
                <div class="flex-shrink-0">
                    <i class="${activity.icon} ${activity.color}"></i>
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm text-gray-900">${activity.message}</p>
                    <p class="text-xs text-gray-500">${activity.time}</p>
                </div>
            `;

            container.appendChild(item);
        });
    }

    // Filter functionality
    function filterWaitlist() {
        const searchTerm = document.getElementById('searchWaitlist').value.toLowerCase();
        const statusFilter = document.getElementById('statusFilter').value;
        const eventFilter = document.getElementById('eventFilter').value;

        filteredData = waitlistData.filter(participant => {
            let matches = true;

            if (searchTerm && !participant.name.toLowerCase().includes(searchTerm) &&
                !participant.email.toLowerCase().includes(searchTerm)) {
                matches = false;
            }

            if (statusFilter && participant.status !== statusFilter) {
                matches = false;
            }

            if (eventFilter && !participant.event.includes(eventFilter)) {
                matches = false;
            }

            return matches;
        });

        renderWaitlistTable();
    }

    // Setup event listeners
    function setupEventListeners() {
        // Search and filters
        document.getElementById('searchWaitlist').addEventListener('input', filterWaitlist);
        document.getElementById('statusFilter').addEventListener('change', filterWaitlist);
        document.getElementById('eventFilter').addEventListener('change', filterWaitlist);

        // Select all checkbox
        document.getElementById('selectAll').addEventListener('change', function() {
            const checkboxes = document.querySelectorAll('.participant-checkbox');
            checkboxes.forEach(checkbox => {
                checkbox.checked = this.checked;
            });
        });

        // Action buttons
        document.getElementById('notifyNext').addEventListener('click', () => {
            document.getElementById('notificationModal').classList.remove('hidden');
            document.getElementById('notificationModal').classList.add('flex');
        });

        document.getElementById('bulkNotify').addEventListener('click', () => {
            const selected = getSelectedParticipants();
            if (selected.length === 0) {
                alert('Please select participants to notify');
                return;
            }
            document.getElementById('notificationModal').classList.remove('hidden');
            document.getElementById('notificationModal').classList.add('flex');
        });

        document.getElementById('manageCapacity').addEventListener('click', () => {
            document.getElementById('capacityModal').classList.remove('hidden');
            document.getElementById('capacityModal').classList.add('flex');
        });

        // Modal actions
        document.getElementById('cancelNotify').addEventListener('click', closeNotificationModal);
        document.getElementById('confirmNotify').addEventListener('click', () => {
            // Simulate notification sending
            showSuccessMessage('Notifications sent successfully!');
            closeNotificationModal();
        });

        document.getElementById('cancelCapacity').addEventListener('click', closeCapacityModal);
        document.getElementById('updateCapacity').addEventListener('click', () => {
            // Simulate capacity update
            showSuccessMessage('Event capacity updated successfully!');
            closeCapacityModal();
        });

        // Export functionality
        document.getElementById('exportWaitlist').addEventListener('click', () => {
            // Simulate export
            showSuccessMessage('Waitlist exported successfully!');
        });
    }

    // Helper functions
    function getSelectedParticipants() {
        const checkboxes = document.querySelectorAll('.participant-checkbox:checked');
        return Array.from(checkboxes).map(cb => parseInt(cb.dataset.id));
    }

    function closeNotificationModal() {
        document.getElementById('notificationModal').classList.add('hidden');
        document.getElementById('notificationModal').classList.remove('flex');
    }

    function closeCapacityModal() {
        document.getElementById('capacityModal').classList.add('hidden');
        document.getElementById('capacityModal').classList.remove('flex');
    }

    function showSuccessMessage(message) {
        // Create and show success notification
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

    // Global functions for table actions
    window.notifyParticipant = function(id) {
        showSuccessMessage('Participant notified successfully!');
    };

    window.emailParticipant = function(id) {
        showSuccessMessage('Email sent to participant!');
    };

    window.promoteParticipant = function(id) {
        showSuccessMessage('Participant promoted in waitlist!');
        // Update table
        renderWaitlistTable();
    };

    window.removeParticipant = function(id) {
        if (confirm('Are you sure you want to remove this participant from the waitlist?')) {
            // Remove from data
            const index = waitlistData.findIndex(p => p.id === id);
            if (index > -1) {
                waitlistData.splice(index, 1);
                filterWaitlist();
            }
            showSuccessMessage('Participant removed from waitlist!');
        }
    };

    // Initialize page
    init();
});
</script>
@endpush
