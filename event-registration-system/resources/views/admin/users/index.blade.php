@extends('layouts.app')

@section('title', 'User Management - Admin Dashboard - EventSmart')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Header -->
    <div class="bg-white shadow-sm border-b">
        <div class="container mx-auto px-6 py-4">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900">User Management</h1>
                    <p class="text-gray-600">Manage users, permissions, and account settings</p>
                </div>
                <div class="flex items-center space-x-4">
                    <button id="exportUsers" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition-colors">
                        <i class="fas fa-download mr-2"></i>Export Users
                    </button>
                    <button id="addUser" class="bg-purple-600 text-white px-4 py-2 rounded-lg hover:bg-purple-700 transition-colors">
                        <i class="fas fa-plus mr-2"></i>Add User
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
                        <p class="text-gray-600 text-sm font-medium">Total Users</p>
                        <p class="text-3xl font-bold text-gray-900">12,847</p>
                    </div>
                    <div class="bg-blue-100 p-3 rounded-full">
                        <i class="fas fa-users text-blue-600 text-xl"></i>
                    </div>
                </div>
                <div class="mt-4 flex items-center">
                    <span class="text-green-600 text-sm font-medium">+8.2% from last month</span>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm font-medium">Active Users (30d)</p>
                        <p class="text-3xl font-bold text-gray-900">9,423</p>
                    </div>
                    <div class="bg-green-100 p-3 rounded-full">
                        <i class="fas fa-user-check text-green-600 text-xl"></i>
                    </div>
                </div>
                <div class="mt-4 flex items-center">
                    <span class="text-green-600 text-sm font-medium">73.3% engagement rate</span>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm font-medium">Event Organizers</p>
                        <p class="text-3xl font-bold text-gray-900">1,284</p>
                    </div>
                    <div class="bg-purple-100 p-3 rounded-full">
                        <i class="fas fa-calendar-plus text-purple-600 text-xl"></i>
                    </div>
                </div>
                <div class="mt-4 flex items-center">
                    <span class="text-blue-600 text-sm font-medium">10% of total users</span>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm font-medium">Suspended Users</p>
                        <p class="text-3xl font-bold text-gray-900">127</p>
                    </div>
                    <div class="bg-red-100 p-3 rounded-full">
                        <i class="fas fa-user-slash text-red-600 text-xl"></i>
                    </div>
                </div>
                <div class="mt-4 flex items-center">
                    <span class="text-red-600 text-sm font-medium">0.99% of total</span>
                </div>
            </div>
        </div>

        <!-- Filters and Search -->
        <div class="bg-white rounded-xl shadow-sm p-6 mb-8">
            <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
                <div class="flex flex-col md:flex-row items-center space-y-4 md:space-y-0 md:space-x-4 w-full md:w-auto">
                    <div class="relative w-full md:w-auto">
                        <input type="text" id="searchUsers" placeholder="Search users by name, email, or ID..."
                               class="w-full md:w-96 pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500">
                        <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                    </div>

                    <select id="userStatus" class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500">
                        <option value="">All Status</option>
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                        <option value="suspended">Suspended</option>
                        <option value="pending">Pending Verification</option>
                    </select>

                    <select id="userRole" class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500">
                        <option value="">All Roles</option>
                        <option value="user">Regular User</option>
                        <option value="organizer">Event Organizer</option>
                        <option value="admin">Administrator</option>
                    </select>

                    <select id="userSort" class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500">
                        <option value="newest">Newest First</option>
                        <option value="oldest">Oldest First</option>
                        <option value="name">Name A-Z</option>
                        <option value="activity">Most Active</option>
                    </select>
                </div>

                <button id="clearFilters" class="text-purple-600 hover:text-purple-700 font-semibold">
                    Clear Filters
                </button>
            </div>
        </div>

        <!-- Users Table -->
        <div class="bg-white rounded-xl shadow-sm overflow-hidden">
            <div class="p-6 border-b border-gray-200">
                <div class="flex items-center justify-between">
                    <h2 class="text-xl font-bold text-gray-900">All Users</h2>
                    <div class="flex items-center space-x-4">
                        <span class="text-sm text-gray-600">Showing <span id="userCount">25</span> of <span id="totalUsers">12,847</span> users</span>
                        <div class="flex items-center space-x-2">
                            <span class="text-sm text-gray-600">Bulk Actions:</span>
                            <select id="bulkAction" class="px-3 py-1 border border-gray-300 rounded text-sm">
                                <option value="">Select Action</option>
                                <option value="activate">Activate</option>
                                <option value="suspend">Suspend</option>
                                <option value="delete">Delete</option>
                                <option value="export">Export Selected</option>
                            </select>
                            <button id="applyBulkAction" class="bg-gray-600 text-white px-3 py-1 rounded text-sm hover:bg-gray-700 transition-colors">
                                Apply
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <input type="checkbox" id="selectAll" class="rounded border-gray-300 text-purple-600 focus:ring-purple-500">
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">User</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Role</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Events</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Joined</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Last Active</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="usersTable" class="bg-white divide-y divide-gray-200">
                        <!-- Table rows will be populated by JavaScript -->
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="px-6 py-3 bg-gray-50 border-t border-gray-200">
                <div class="flex items-center justify-between">
                    <div class="text-sm text-gray-700">
                        Showing <span class="font-medium">1</span> to <span class="font-medium">25</span> of <span class="font-medium">12,847</span> results
                    </div>
                    <div class="flex space-x-2">
                        <button class="px-3 py-1 text-sm bg-white border border-gray-300 rounded hover:bg-gray-50 disabled:opacity-50" disabled>
                            Previous
                        </button>
                        <button class="px-3 py-1 text-sm bg-purple-600 text-white rounded">1</button>
                        <button class="px-3 py-1 text-sm bg-white border border-gray-300 rounded hover:bg-gray-50">2</button>
                        <button class="px-3 py-1 text-sm bg-white border border-gray-300 rounded hover:bg-gray-50">3</button>
                        <button class="px-3 py-1 text-sm bg-white border border-gray-300 rounded hover:bg-gray-50">
                            Next
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- User Details Modal -->
<div id="userModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
    <div class="bg-white rounded-xl max-w-4xl w-full mx-4 max-h-screen overflow-y-auto">
        <div class="p-6 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <h3 class="text-xl font-bold text-gray-900">User Details</h3>
                <button id="closeUserModal" class="text-gray-400 hover:text-gray-600">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>
        </div>

        <div class="p-6">
            <div id="userDetails">
                <!-- User details will be populated by JavaScript -->
            </div>
        </div>
    </div>
</div>

<!-- Add User Modal -->
<div id="addUserModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
    <div class="bg-white rounded-xl max-w-2xl w-full mx-4">
        <div class="p-6 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <h3 class="text-xl font-bold text-gray-900">Add New User</h3>
                <button id="closeAddUserModal" class="text-gray-400 hover:text-gray-600">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>
        </div>

        <form id="addUserForm" class="p-6">
            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">First Name</label>
                    <input type="text" id="firstName" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Last Name</label>
                    <input type="text" id="lastName" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input type="email" id="email" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Phone</label>
                    <input type="tel" id="phone" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Role</label>
                    <select id="role" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500" required>
                        <option value="user">Regular User</option>
                        <option value="organizer">Event Organizer</option>
                        <option value="admin">Administrator</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                    <select id="status" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500" required>
                        <option value="active">Active</option>
                        <option value="pending">Pending Verification</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>
            </div>

            <div class="mt-6">
                <label class="block text-sm font-medium text-gray-700 mb-1">Bio</label>
                <textarea id="bio" rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500" placeholder="Optional bio..."></textarea>
            </div>

            <div class="mt-6 flex justify-end space-x-4">
                <button type="button" id="cancelAddUser" class="px-6 py-2 border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">
                    Cancel
                </button>
                <button type="submit" class="bg-purple-600 text-white px-6 py-2 rounded-lg hover:bg-purple-700 transition-colors">
                    Create User
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Confirmation Modal -->
<div id="confirmModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
    <div class="bg-white rounded-xl max-w-md w-full mx-4">
        <div class="p-6">
            <div class="text-center">
                <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-exclamation-triangle text-red-600 text-2xl"></i>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">Confirm Action</h3>
                <p class="text-gray-600 mb-6" id="confirmMessage">Are you sure you want to perform this action?</p>

                <div class="flex space-x-3">
                    <button id="cancelConfirm" class="flex-1 bg-gray-200 text-gray-800 py-2 rounded-lg hover:bg-gray-300 transition-colors">
                        Cancel
                    </button>
                    <button id="confirmAction" class="flex-1 bg-red-600 text-white py-2 rounded-lg hover:bg-red-700 transition-colors">
                        Confirm
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
    // Sample users data
    const usersData = [
        {
            id: 1,
            firstName: 'Sarah',
            lastName: 'Johnson',
            email: 'sarah.johnson@example.com',
            phone: '+1 (555) 123-4567',
            role: 'organizer',
            status: 'active',
            avatar: 'https://via.placeholder.com/50x50/667eea/ffffff?text=SJ',
            eventsCreated: 12,
            eventsAttended: 28,
            joinDate: '2024-03-15',
            lastActive: '2025-07-29',
            bio: 'Professional event organizer specializing in tech conferences.',
            location: 'San Francisco, CA',
            totalRevenue: 45000
        },
        {
            id: 2,
            firstName: 'Michael',
            lastName: 'Chen',
            email: 'michael.chen@example.com',
            phone: '+1 (555) 234-5678',
            role: 'user',
            status: 'active',
            avatar: 'https://via.placeholder.com/50x50/48bb78/ffffff?text=MC',
            eventsCreated: 0,
            eventsAttended: 15,
            joinDate: '2024-05-20',
            lastActive: '2025-07-28',
            bio: 'Tech enthusiast and frequent event attendee.',
            location: 'New York, NY',
            totalRevenue: 0
        },
        {
            id: 3,
            firstName: 'Emily',
            lastName: 'Rodriguez',
            email: 'emily.rodriguez@example.com',
            phone: '+1 (555) 345-6789',
            role: 'admin',
            status: 'active',
            avatar: 'https://via.placeholder.com/50x50/f59e0b/ffffff?text=ER',
            eventsCreated: 0,
            eventsAttended: 5,
            joinDate: '2023-12-01',
            lastActive: '2025-07-29',
            bio: 'Platform administrator and community manager.',
            location: 'Los Angeles, CA',
            totalRevenue: 0
        },
        {
            id: 4,
            firstName: 'David',
            lastName: 'Kim',
            email: 'david.kim@example.com',
            phone: '+1 (555) 456-7890',
            role: 'organizer',
            status: 'suspended',
            avatar: 'https://via.placeholder.com/50x50/ef4444/ffffff?text=DK',
            eventsCreated: 8,
            eventsAttended: 20,
            joinDate: '2024-01-10',
            lastActive: '2025-07-20',
            bio: 'Workshop facilitator and training coordinator.',
            location: 'Chicago, IL',
            totalRevenue: 12000
        },
        {
            id: 5,
            firstName: 'Lisa',
            lastName: 'Wong',
            email: 'lisa.wong@example.com',
            phone: '+1 (555) 567-8901',
            role: 'user',
            status: 'pending',
            avatar: 'https://via.placeholder.com/50x50/8b5cf6/ffffff?text=LW',
            eventsCreated: 0,
            eventsAttended: 2,
            joinDate: '2025-07-25',
            lastActive: '2025-07-25',
            bio: 'New user interested in networking events.',
            location: 'Seattle, WA',
            totalRevenue: 0
        }
    ];

    let filteredUsers = [...usersData];
    let selectedUsers = new Set();

    // Initialize page
    function init() {
        renderUsersTable();
        setupEventListeners();
    }

    // Render users table
    function renderUsersTable() {
        const tbody = document.getElementById('usersTable');
        tbody.innerHTML = '';

        filteredUsers.forEach(user => {
            const row = document.createElement('tr');
            row.className = 'hover:bg-gray-50';

            const statusBadge = getStatusBadge(user.status);
            const roleBadge = getRoleBadge(user.role);

            row.innerHTML = `
                <td class="px-6 py-4 whitespace-nowrap">
                    <input type="checkbox" class="user-checkbox rounded border-gray-300 text-purple-600 focus:ring-purple-500"
                           data-id="${user.id}" ${selectedUsers.has(user.id) ? 'checked' : ''}>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center cursor-pointer" onclick="viewUser(${user.id})">
                        <div class="flex-shrink-0 h-10 w-10">
                            <img class="h-10 w-10 rounded-full" src="${user.avatar}" alt="${user.firstName} ${user.lastName}">
                        </div>
                        <div class="ml-4">
                            <div class="text-sm font-medium text-gray-900">${user.firstName} ${user.lastName}</div>
                            <div class="text-sm text-gray-500">${user.email}</div>
                        </div>
                    </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    ${roleBadge}
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    ${statusBadge}
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">
                        ${user.role === 'organizer' ? `${user.eventsCreated} created` : `${user.eventsAttended} attended`}
                    </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">${formatDate(user.joinDate)}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">${formatDate(user.lastActive)}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                    <div class="flex space-x-2">
                        <button onclick="viewUser(${user.id})" class="text-purple-600 hover:text-purple-900 p-1" title="View Details">
                            <i class="fas fa-eye"></i>
                        </button>
                        <button onclick="editUser(${user.id})" class="text-blue-600 hover:text-blue-900 p-1" title="Edit">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button onclick="toggleUserStatus(${user.id})" class="text-yellow-600 hover:text-yellow-900 p-1" title="Toggle Status">
                            <i class="fas fa-toggle-on"></i>
                        </button>
                        <button onclick="deleteUser(${user.id})" class="text-red-600 hover:text-red-900 p-1" title="Delete">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </td>
            `;

            tbody.appendChild(row);
        });

        updateUserCount();
    }

    // Get status badge
    function getStatusBadge(status) {
        const badges = {
            active: '<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">Active</span>',
            inactive: '<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">Inactive</span>',
            suspended: '<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">Suspended</span>',
            pending: '<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">Pending</span>'
        };
        return badges[status] || badges.active;
    }

    // Get role badge
    function getRoleBadge(role) {
        const badges = {
            user: '<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">User</span>',
            organizer: '<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-purple-100 text-purple-800">Organizer</span>',
            admin: '<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">Admin</span>'
        };
        return badges[role] || badges.user;
    }

    // Format date
    function formatDate(dateString) {
        return new Date(dateString).toLocaleDateString('en-US', {
            year: 'numeric',
            month: 'short',
            day: 'numeric'
        });
    }

    // Update user count
    function updateUserCount() {
        document.getElementById('userCount').textContent = filteredUsers.length;
    }

    // Filter users
    function filterUsers() {
        const searchTerm = document.getElementById('searchUsers').value.toLowerCase();
        const status = document.getElementById('userStatus').value;
        const role = document.getElementById('userRole').value;
        const sort = document.getElementById('userSort').value;

        filteredUsers = usersData.filter(user => {
            let matches = true;

            if (searchTerm && !user.firstName.toLowerCase().includes(searchTerm) &&
                !user.lastName.toLowerCase().includes(searchTerm) &&
                !user.email.toLowerCase().includes(searchTerm) &&
                !user.id.toString().includes(searchTerm)) {
                matches = false;
            }

            if (status && user.status !== status) matches = false;
            if (role && user.role !== role) matches = false;

            return matches;
        });

        // Sort users
        filteredUsers.sort((a, b) => {
            switch (sort) {
                case 'oldest':
                    return new Date(a.joinDate) - new Date(b.joinDate);
                case 'name':
                    return `${a.firstName} ${a.lastName}`.localeCompare(`${b.firstName} ${b.lastName}`);
                case 'activity':
                    return new Date(b.lastActive) - new Date(a.lastActive);
                case 'newest':
                default:
                    return new Date(b.joinDate) - new Date(a.joinDate);
            }
        });

        renderUsersTable();
    }

    // Setup event listeners
    function setupEventListeners() {
        // Search and filters
        document.getElementById('searchUsers').addEventListener('input', filterUsers);
        document.getElementById('userStatus').addEventListener('change', filterUsers);
        document.getElementById('userRole').addEventListener('change', filterUsers);
        document.getElementById('userSort').addEventListener('change', filterUsers);

        // Clear filters
        document.getElementById('clearFilters').addEventListener('click', () => {
            document.getElementById('searchUsers').value = '';
            document.getElementById('userStatus').value = '';
            document.getElementById('userRole').value = '';
            document.getElementById('userSort').value = 'newest';
            filterUsers();
        });

        // Select all checkbox
        document.getElementById('selectAll').addEventListener('change', function() {
            const checkboxes = document.querySelectorAll('.user-checkbox');
            checkboxes.forEach(checkbox => {
                checkbox.checked = this.checked;
                const userId = parseInt(checkbox.dataset.id);
                if (this.checked) {
                    selectedUsers.add(userId);
                } else {
                    selectedUsers.delete(userId);
                }
            });
        });

        // Individual checkboxes
        document.addEventListener('change', function(e) {
            if (e.target.classList.contains('user-checkbox')) {
                const userId = parseInt(e.target.dataset.id);
                if (e.target.checked) {
                    selectedUsers.add(userId);
                } else {
                    selectedUsers.delete(userId);
                }
            }
        });

        // Bulk actions
        document.getElementById('applyBulkAction').addEventListener('click', () => {
            const action = document.getElementById('bulkAction').value;
            if (!action || selectedUsers.size === 0) {
                alert('Please select an action and users');
                return;
            }
            applyBulkAction(action);
        });

        // Modal handlers
        document.getElementById('addUser').addEventListener('click', () => openAddUserModal());
        document.getElementById('closeUserModal').addEventListener('click', () => closeUserModal());
        document.getElementById('closeAddUserModal').addEventListener('click', () => closeAddUserModal());
        document.getElementById('cancelAddUser').addEventListener('click', () => closeAddUserModal());

        // Form submission
        document.getElementById('addUserForm').addEventListener('submit', handleAddUser);

        // Confirmation modal
        document.getElementById('cancelConfirm').addEventListener('click', () => closeConfirmModal());
    }

    // View user details
    window.viewUser = function(userId) {
        const user = usersData.find(u => u.id === userId);
        if (!user) return;

        const userDetails = document.getElementById('userDetails');
        userDetails.innerHTML = `
            <div class="grid lg:grid-cols-3 gap-8">
                <div class="lg:col-span-2">
                    <div class="flex items-start space-x-6 mb-8">
                        <img src="${user.avatar}" alt="${user.firstName} ${user.lastName}" class="w-24 h-24 rounded-full">
                        <div class="flex-1">
                            <h3 class="text-2xl font-bold text-gray-900 mb-2">${user.firstName} ${user.lastName}</h3>
                            <p class="text-gray-600 mb-4">${user.email}</p>
                            <div class="flex items-center space-x-4 mb-4">
                                ${getRoleBadge(user.role)}
                                ${getStatusBadge(user.status)}
                            </div>
                            <p class="text-gray-600">${user.bio}</p>
                        </div>
                    </div>

                    <div class="grid md:grid-cols-2 gap-6">
                        <div class="bg-gray-50 p-6 rounded-lg">
                            <h4 class="font-semibold text-gray-900 mb-4">Contact Information</h4>
                            <div class="space-y-3">
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Email:</span>
                                    <span class="font-medium">${user.email}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Phone:</span>
                                    <span class="font-medium">${user.phone}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Location:</span>
                                    <span class="font-medium">${user.location}</span>
                                </div>
                            </div>
                        </div>

                        <div class="bg-gray-50 p-6 rounded-lg">
                            <h4 class="font-semibold text-gray-900 mb-4">Activity Summary</h4>
                            <div class="space-y-3">
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Events Created:</span>
                                    <span class="font-medium">${user.eventsCreated}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Events Attended:</span>
                                    <span class="font-medium">${user.eventsAttended}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Total Revenue:</span>
                                    <span class="font-medium">$${user.totalRevenue.toLocaleString()}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <div class="bg-gray-50 p-6 rounded-lg mb-6">
                        <h4 class="font-semibold text-gray-900 mb-4">Account Details</h4>
                        <div class="space-y-3">
                            <div class="flex justify-between">
                                <span class="text-gray-600">User ID:</span>
                                <span class="font-medium">#${user.id}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Joined:</span>
                                <span class="font-medium">${formatDate(user.joinDate)}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Last Active:</span>
                                <span class="font-medium">${formatDate(user.lastActive)}</span>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-3">
                        <button onclick="editUser(${user.id})" class="w-full bg-purple-600 text-white py-2 rounded-lg hover:bg-purple-700 transition-colors">
                            Edit User
                        </button>
                        <button onclick="toggleUserStatus(${user.id})" class="w-full bg-yellow-600 text-white py-2 rounded-lg hover:bg-yellow-700 transition-colors">
                            ${user.status === 'active' ? 'Suspend' : 'Activate'} User
                        </button>
                        <button onclick="deleteUser(${user.id})" class="w-full bg-red-600 text-white py-2 rounded-lg hover:bg-red-700 transition-colors">
                            Delete User
                        </button>
                    </div>
                </div>
            </div>
        `;

        document.getElementById('userModal').classList.remove('hidden');
        document.getElementById('userModal').classList.add('flex');
    };

    // Edit user
    window.editUser = function(userId) {
        // This would open an edit modal similar to add user modal
        console.log('Edit user:', userId);
        showSuccessMessage('Edit functionality would be implemented here');
    };

    // Toggle user status
    window.toggleUserStatus = function(userId) {
        const user = usersData.find(u => u.id === userId);
        if (!user) return;

        const newStatus = user.status === 'active' ? 'suspended' : 'active';
        showConfirmModal(
            `Are you sure you want to ${newStatus === 'active' ? 'activate' : 'suspend'} ${user.firstName} ${user.lastName}?`,
            () => {
                user.status = newStatus;
                renderUsersTable();
                showSuccessMessage(`User ${newStatus === 'active' ? 'activated' : 'suspended'} successfully`);
                closeConfirmModal();
            }
        );
    };

    // Delete user
    window.deleteUser = function(userId) {
        const user = usersData.find(u => u.id === userId);
        if (!user) return;

        showConfirmModal(
            `Are you sure you want to delete ${user.firstName} ${user.lastName}? This action cannot be undone.`,
            () => {
                const index = usersData.findIndex(u => u.id === userId);
                if (index > -1) {
                    usersData.splice(index, 1);
                    filterUsers();
                    showSuccessMessage('User deleted successfully');
                }
                closeConfirmModal();
            }
        );
    };

    // Modal functions
    function openAddUserModal() {
        document.getElementById('addUserModal').classList.remove('hidden');
        document.getElementById('addUserModal').classList.add('flex');
    }

    function closeAddUserModal() {
        document.getElementById('addUserModal').classList.add('hidden');
        document.getElementById('addUserModal').classList.remove('flex');
        document.getElementById('addUserForm').reset();
    }

    function closeUserModal() {
        document.getElementById('userModal').classList.add('hidden');
        document.getElementById('userModal').classList.remove('flex');
    }

    function showConfirmModal(message, onConfirm) {
        document.getElementById('confirmMessage').textContent = message;
        document.getElementById('confirmAction').onclick = onConfirm;
        document.getElementById('confirmModal').classList.remove('hidden');
        document.getElementById('confirmModal').classList.add('flex');
    }

    function closeConfirmModal() {
        document.getElementById('confirmModal').classList.add('hidden');
        document.getElementById('confirmModal').classList.remove('flex');
    }

    // Handle add user form
    function handleAddUser(e) {
        e.preventDefault();

        const newUser = {
            id: Math.max(...usersData.map(u => u.id)) + 1,
            firstName: document.getElementById('firstName').value,
            lastName: document.getElementById('lastName').value,
            email: document.getElementById('email').value,
            phone: document.getElementById('phone').value,
            role: document.getElementById('role').value,
            status: document.getElementById('status').value,
            bio: document.getElementById('bio').value,
            avatar: `https://via.placeholder.com/50x50/667eea/ffffff?text=${document.getElementById('firstName').value[0]}${document.getElementById('lastName').value[0]}`,
            eventsCreated: 0,
            eventsAttended: 0,
            joinDate: new Date().toISOString().split('T')[0],
            lastActive: new Date().toISOString().split('T')[0],
            location: 'Not specified',
            totalRevenue: 0
        };

        usersData.push(newUser);
        filterUsers();
        closeAddUserModal();
        showSuccessMessage('User created successfully');
    }

    // Apply bulk action
    function applyBulkAction(action) {
        if (selectedUsers.size === 0) return;

        const actionText = action === 'activate' ? 'activate' :
                          action === 'suspend' ? 'suspend' :
                          action === 'delete' ? 'delete' : 'perform this action on';

        showConfirmModal(
            `Are you sure you want to ${actionText} ${selectedUsers.size} selected users?`,
            () => {
                selectedUsers.forEach(userId => {
                    const user = usersData.find(u => u.id === userId);
                    if (user) {
                        if (action === 'activate') user.status = 'active';
                        else if (action === 'suspend') user.status = 'suspended';
                        else if (action === 'delete') {
                            const index = usersData.findIndex(u => u.id === userId);
                            if (index > -1) usersData.splice(index, 1);
                        }
                    }
                });

                selectedUsers.clear();
                document.getElementById('selectAll').checked = false;
                filterUsers();
                showSuccessMessage(`Bulk ${action} completed successfully`);
                closeConfirmModal();
            }
        );
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
@endpush
