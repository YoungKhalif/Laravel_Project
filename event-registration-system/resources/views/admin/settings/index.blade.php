@extends('layouts.app')

@section('title', 'System Settings - Admin Dashboard - EventSmart')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Header -->
    <div class="bg-white shadow-sm border-b">
        <div class="container mx-auto px-6 py-4">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900">System Settings</h1>
                    <p class="text-gray-600">Configure platform preferences, features, and notifications</p>
                </div>
                <div class="flex items-center space-x-4">
                    <button id="saveSettings" class="bg-purple-600 text-white px-4 py-2 rounded-lg hover:bg-purple-700 transition-colors">
                        <i class="fas fa-save mr-2"></i>Save Changes
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="container mx-auto px-6 py-8">
        <!-- Settings Navigation -->
        <div class="mb-8 bg-white rounded-xl shadow-sm overflow-hidden">
            <div class="flex overflow-x-auto scrollbar-thin scrollbar-thumb-gray-300 scrollbar-track-gray-100" id="settingsNav">
                <button class="settings-tab active whitespace-nowrap py-4 px-6 text-purple-600 border-b-2 border-purple-600 font-semibold" data-tab="general">
                    <i class="fas fa-cog mr-2"></i>General
                </button>
                <button class="settings-tab whitespace-nowrap py-4 px-6 text-gray-600 hover:text-purple-600 font-semibold" data-tab="features">
                    <i class="fas fa-toggle-on mr-2"></i>Features
                </button>
                <button class="settings-tab whitespace-nowrap py-4 px-6 text-gray-600 hover:text-purple-600 font-semibold" data-tab="notifications">
                    <i class="fas fa-bell mr-2"></i>Notifications
                </button>
                <button class="settings-tab whitespace-nowrap py-4 px-6 text-gray-600 hover:text-purple-600 font-semibold" data-tab="administration">
                    <i class="fas fa-user-shield mr-2"></i>Administration
                </button>
                <button class="settings-tab whitespace-nowrap py-4 px-6 text-gray-600 hover:text-purple-600 font-semibold" data-tab="security">
                    <i class="fas fa-lock mr-2"></i>Security
                </button>
                <button class="settings-tab whitespace-nowrap py-4 px-6 text-gray-600 hover:text-purple-600 font-semibold" data-tab="appearance">
                    <i class="fas fa-paint-brush mr-2"></i>Appearance
                </button>
                <button class="settings-tab whitespace-nowrap py-4 px-6 text-gray-600 hover:text-purple-600 font-semibold" data-tab="integrations">
                    <i class="fas fa-plug mr-2"></i>Integrations
                </button>
            </div>
        </div>

        <!-- General Settings Tab -->
        <div id="generalTab" class="settings-content">
            <div class="bg-white rounded-xl shadow-sm p-8">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-lg font-bold text-gray-900">General Settings</h2>
                    <div class="text-xs bg-blue-100 text-blue-800 px-2 py-1 rounded-md">Last updated: July 29, 2025</div>
                </div>

                <div class="space-y-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Platform Name</label>
                        <input type="text" value="EventSmart" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500">
                        <p class="mt-1 text-sm text-gray-500">Used throughout the platform for branding</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Platform Logo</label>
                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-gray-200 rounded-md overflow-hidden flex items-center justify-center mr-4">
                                <i class="fas fa-calendar-check text-gray-500 text-xl"></i>
                            </div>
                            <button class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-4 py-2 rounded-lg transition-colors">
                                <i class="fas fa-upload mr-2"></i>Upload Logo
                            </button>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Default Timezone</label>
                        <select class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500">
                            <option>UTC</option>
                            <option>America/New_York</option>
                            <option>Europe/London</option>
                            <option>Asia/Tokyo</option>
                            <option>Africa/Lagos</option>
                            <option>America/Los_Angeles</option>
                            <option>America/Chicago</option>
                            <option>Asia/Dubai</option>
                            <option>Asia/Singapore</option>
                            <option>Australia/Sydney</option>
                        </select>
                        <p class="mt-1 text-sm text-gray-500">Default timezone for event listings and reminders</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Primary Contact Email</label>
                        <input type="email" value="support@eventsmart.com" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500">
                        <p class="mt-1 text-sm text-gray-500">Used for system notifications and customer support</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Default Currency</label>
                        <select class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500">
                            <option>USD - US Dollar</option>
                            <option>EUR - Euro</option>
                            <option>GBP - British Pound</option>
                            <option>JPY - Japanese Yen</option>
                            <option>CAD - Canadian Dollar</option>
                            <option>AUD - Australian Dollar</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Language</label>
                        <select class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500">
                            <option>English</option>
                            <option>Spanish</option>
                            <option>French</option>
                            <option>German</option>
                            <option>Japanese</option>
                            <option>Chinese (Simplified)</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <!-- Features Tab -->
        <div id="featuresTab" class="settings-content hidden">
            <div class="bg-white rounded-xl shadow-sm p-8">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-lg font-bold text-gray-900">Feature Management</h2>
                    <button class="text-xs bg-purple-100 text-purple-800 px-3 py-1 rounded-md hover:bg-purple-200">
                        <i class="fas fa-plus-circle mr-1"></i>Add Custom Feature
                    </button>
                </div>

                <div class="space-y-6">
                    <div class="grid md:grid-cols-2 gap-6">
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <div class="flex items-center justify-between mb-2">
                                <div class="flex items-center">
                                    <i class="fas fa-user-clock text-green-600 mr-2"></i>
                                    <span class="font-medium text-gray-900">Waitlist Management</span>
                                </div>
                                <div class="relative inline-block w-12 h-6 border-2 border-gray-200 rounded-full cursor-pointer">
                                    <input type="checkbox" id="waitlist-toggle" class="sr-only" checked>
                                    <span class="toggle-dot absolute left-0.5 top-0.5 bg-purple-600 w-4 h-4 rounded-full transition-transform duration-300 ease-in-out transform translate-x-6"></span>
                                </div>
                            </div>
                            <p class="text-sm text-gray-600">Allow users to join waitlists for sold-out events</p>
                        </div>

                        <div class="bg-gray-50 p-4 rounded-lg">
                            <div class="flex items-center justify-between mb-2">
                                <div class="flex items-center">
                                    <i class="fas fa-star text-yellow-500 mr-2"></i>
                                    <span class="font-medium text-gray-900">Reviews & Ratings</span>
                                </div>
                                <div class="relative inline-block w-12 h-6 border-2 border-gray-200 rounded-full cursor-pointer">
                                    <input type="checkbox" id="reviews-toggle" class="sr-only" checked>
                                    <span class="toggle-dot absolute left-0.5 top-0.5 bg-purple-600 w-4 h-4 rounded-full transition-transform duration-300 ease-in-out transform translate-x-6"></span>
                                </div>
                            </div>
                            <p class="text-sm text-gray-600">Enable event reviews and ratings system</p>
                        </div>

                        <div class="bg-gray-50 p-4 rounded-lg">
                            <div class="flex items-center justify-between mb-2">
                                <div class="flex items-center">
                                    <i class="fas fa-id-badge text-blue-600 mr-2"></i>
                                    <span class="font-medium text-gray-900">Organizer Profiles</span>
                                </div>
                                <div class="relative inline-block w-12 h-6 border-2 border-gray-200 rounded-full cursor-pointer">
                                    <input type="checkbox" id="profiles-toggle" class="sr-only" checked>
                                    <span class="toggle-dot absolute left-0.5 top-0.5 bg-purple-600 w-4 h-4 rounded-full transition-transform duration-300 ease-in-out transform translate-x-6"></span>
                                </div>
                            </div>
                            <p class="text-sm text-gray-600">Enable public organizer profiles with history</p>
                        </div>

                        <div class="bg-gray-50 p-4 rounded-lg">
                            <div class="flex items-center justify-between mb-2">
                                <div class="flex items-center">
                                    <i class="fas fa-exchange-alt text-purple-600 mr-2"></i>
                                    <span class="font-medium text-gray-900">Ticket Transfers</span>
                                </div>
                                <div class="relative inline-block w-12 h-6 border-2 border-gray-200 rounded-full cursor-pointer">
                                    <input type="checkbox" id="transfers-toggle" class="sr-only">
                                    <span class="toggle-dot absolute left-0.5 top-0.5 bg-gray-400 w-4 h-4 rounded-full transition-transform duration-300 ease-in-out"></span>
                                </div>
                            </div>
                            <p class="text-sm text-gray-600">Allow attendees to transfer tickets to others</p>
                            <div class="mt-2">
                                <span class="text-xs bg-yellow-100 text-yellow-800 px-2 py-1 rounded">BETA</span>
                            </div>
                        </div>

                        <div class="bg-gray-50 p-4 rounded-lg">
                            <div class="flex items-center justify-between mb-2">
                                <div class="flex items-center">
                                    <i class="fas fa-envelope text-red-600 mr-2"></i>
                                    <span class="font-medium text-gray-900">Email Notifications</span>
                                </div>
                                <div class="relative inline-block w-12 h-6 border-2 border-gray-200 rounded-full cursor-pointer">
                                    <input type="checkbox" id="email-toggle" class="sr-only" checked>
                                    <span class="toggle-dot absolute left-0.5 top-0.5 bg-purple-600 w-4 h-4 rounded-full transition-transform duration-300 ease-in-out transform translate-x-6"></span>
                                </div>
                            </div>
                            <p class="text-sm text-gray-600">Enable system-wide email notifications</p>
                        </div>

                        <div class="bg-gray-50 p-4 rounded-lg">
                            <div class="flex items-center justify-between mb-2">
                                <div class="flex items-center">
                                    <i class="fas fa-calendar-check text-green-600 mr-2"></i>
                                    <span class="font-medium text-gray-900">Calendar View</span>
                                </div>
                                <div class="relative inline-block w-12 h-6 border-2 border-gray-200 rounded-full cursor-pointer">
                                    <input type="checkbox" id="calendar-toggle" class="sr-only" checked>
                                    <span class="toggle-dot absolute left-0.5 top-0.5 bg-purple-600 w-4 h-4 rounded-full transition-transform duration-300 ease-in-out transform translate-x-6"></span>
                                </div>
                            </div>
                            <p class="text-sm text-gray-600">Enable calendar view for event browsing</p>
                        </div>
                    </div>

                    <hr class="border-gray-200">

                    <div class="space-y-4">
                        <h3 class="font-semibold text-gray-800">Advanced Features</h3>

                        <div class="grid md:grid-cols-2 gap-6">
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <div class="flex items-center justify-between mb-2">
                                    <div class="flex items-center">
                                        <i class="fas fa-ticket-alt text-indigo-600 mr-2"></i>
                                        <span class="font-medium text-gray-900">Digital Tickets</span>
                                    </div>
                                    <div class="relative inline-block w-12 h-6 border-2 border-gray-200 rounded-full cursor-pointer">
                                        <input type="checkbox" id="digital-toggle" class="sr-only" checked>
                                        <span class="toggle-dot absolute left-0.5 top-0.5 bg-purple-600 w-4 h-4 rounded-full transition-transform duration-300 ease-in-out transform translate-x-6"></span>
                                    </div>
                                </div>
                                <p class="text-sm text-gray-600">Enable QR code digital tickets</p>
                            </div>

                            <div class="bg-gray-50 p-4 rounded-lg">
                                <div class="flex items-center justify-between mb-2">
                                    <div class="flex items-center">
                                        <i class="fas fa-comments text-blue-600 mr-2"></i>
                                        <span class="font-medium text-gray-900">Event Chat</span>
                                    </div>
                                    <div class="relative inline-block w-12 h-6 border-2 border-gray-200 rounded-full cursor-pointer">
                                        <input type="checkbox" id="chat-toggle" class="sr-only">
                                        <span class="toggle-dot absolute left-0.5 top-0.5 bg-gray-400 w-4 h-4 rounded-full transition-transform duration-300 ease-in-out"></span>
                                    </div>
                                </div>
                                <p class="text-sm text-gray-600">In-app chat for event attendees</p>
                                <div class="mt-2">
                                    <span class="text-xs bg-blue-100 text-blue-800 px-2 py-1 rounded">COMING SOON</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Notifications Tab -->
        <div id="notificationsTab" class="settings-content hidden">
            <div class="bg-white rounded-xl shadow-sm p-8">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-lg font-bold text-gray-900">Notification Settings</h2>
                    <button class="text-xs bg-purple-100 text-purple-800 px-3 py-1 rounded-md hover:bg-purple-200">
                        <i class="fas fa-envelope mr-1"></i>Test Notifications
                    </button>
                </div>

                <div class="mb-6">
                    <div class="flex items-center justify-between">
                        <h3 class="font-medium text-gray-900">Email Templates</h3>
                        <button class="text-purple-600 hover:text-purple-800 text-sm">Manage Templates</button>
                    </div>
                    <div class="mt-4 grid md:grid-cols-2 gap-4">
                        <div class="border border-gray-200 rounded-md p-3 flex items-center justify-between">
                            <div>
                                <div class="font-medium">Registration Confirmation</div>
                                <div class="text-xs text-gray-500">Last edited: July 25, 2025</div>
                            </div>
                            <button class="text-blue-600 hover:text-blue-800">
                                <i class="fas fa-edit"></i>
                            </button>
                        </div>
                        <div class="border border-gray-200 rounded-md p-3 flex items-center justify-between">
                            <div>
                                <div class="font-medium">Event Reminder</div>
                                <div class="text-xs text-gray-500">Last edited: July 28, 2025</div>
                            </div>
                            <button class="text-blue-600 hover:text-blue-800">
                                <i class="fas fa-edit"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="space-y-6">
                    <h3 class="font-medium text-gray-900">Notification Preferences</h3>

                    <div class="space-y-4">
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <i class="fas fa-chart-bar text-blue-600 mr-3"></i>
                                    <div>
                                        <div class="font-medium text-gray-900">Daily Summary Emails</div>
                                        <div class="text-sm text-gray-600">Send platform statistics summary to admins</div>
                                    </div>
                                </div>
                                <div class="relative inline-block w-12 h-6 border-2 border-gray-200 rounded-full cursor-pointer">
                                    <input type="checkbox" id="summary-toggle" class="sr-only" checked>
                                    <span class="toggle-dot absolute left-0.5 top-0.5 bg-purple-600 w-4 h-4 rounded-full transition-transform duration-300 ease-in-out transform translate-x-6"></span>
                                </div>
                            </div>
                            <div class="mt-3 flex items-center">
                                <span class="text-xs text-gray-500 mr-2">Send to:</span>
                                <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded">Admin Team</span>
                            </div>
                        </div>

                        <div class="bg-gray-50 p-4 rounded-lg">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <i class="fas fa-calendar-alt text-green-600 mr-3"></i>
                                    <div>
                                        <div class="font-medium text-gray-900">Event Reminder Emails</div>
                                        <div class="text-sm text-gray-600">Send reminders to attendees before events</div>
                                    </div>
                                </div>
                                <div class="relative inline-block w-12 h-6 border-2 border-gray-200 rounded-full cursor-pointer">
                                    <input type="checkbox" id="reminder-toggle" class="sr-only" checked>
                                    <span class="toggle-dot absolute left-0.5 top-0.5 bg-purple-600 w-4 h-4 rounded-full transition-transform duration-300 ease-in-out transform translate-x-6"></span>
                                </div>
                            </div>
                            <div class="mt-3">
                                <div class="flex items-center">
                                    <span class="text-xs text-gray-500 mr-2">Send</span>
                                    <select class="text-xs border border-gray-300 rounded px-2 py-1">
                                        <option>24 hours</option>
                                        <option>48 hours</option>
                                        <option>72 hours</option>
                                    </select>
                                    <span class="text-xs text-gray-500 ml-2">before event</span>
                                </div>
                            </div>
                        </div>

                        <div class="bg-gray-50 p-4 rounded-lg">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <i class="fas fa-money-bill-wave text-yellow-600 mr-3"></i>
                                    <div>
                                        <div class="font-medium text-gray-900">Payment Alerts</div>
                                        <div class="text-sm text-gray-600">Send payment confirmation and alerts</div>
                                    </div>
                                </div>
                                <div class="relative inline-block w-12 h-6 border-2 border-gray-200 rounded-full cursor-pointer">
                                    <input type="checkbox" id="payment-toggle" class="sr-only">
                                    <span class="toggle-dot absolute left-0.5 top-0.5 bg-gray-400 w-4 h-4 rounded-full transition-transform duration-300 ease-in-out"></span>
                                </div>
                            </div>
                        </div>

                        <div class="bg-gray-50 p-4 rounded-lg">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <i class="fas fa-bullhorn text-red-600 mr-3"></i>
                                    <div>
                                        <div class="font-medium text-gray-900">System Announcements</div>
                                        <div class="text-sm text-gray-600">Send platform-wide announcements</div>
                                    </div>
                                </div>
                                <div class="relative inline-block w-12 h-6 border-2 border-gray-200 rounded-full cursor-pointer">
                                    <input type="checkbox" id="announcement-toggle" class="sr-only" checked>
                                    <span class="toggle-dot absolute left-0.5 top-0.5 bg-purple-600 w-4 h-4 rounded-full transition-transform duration-300 ease-in-out transform translate-x-6"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Administration Tab -->
        <div id="administrationTab" class="settings-content hidden">
            <div class="bg-white rounded-xl shadow-sm p-8">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-lg font-bold text-gray-900">Administrative Controls</h2>
                    <div class="text-xs bg-red-100 text-red-800 px-2 py-1 rounded-md">Admin Only</div>
                </div>

                <div class="space-y-8">
                    <div class="space-y-4">
                        <h3 class="font-medium text-gray-900">User Sessions</h3>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Session Timeout (minutes)</label>
                            <input type="number" value="30" min="5" max="240" class="w-full md:w-1/3 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500">
                            <p class="mt-1 text-sm text-gray-500">Inactive users will be automatically logged out after this period</p>
                        </div>

                        <div>
                            <div class="flex items-center justify-between">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Currently Active Sessions</label>
                                <button class="text-xs bg-red-600 text-white px-3 py-1 rounded-md hover:bg-red-700">
                                    Invalidate All Sessions
                                </button>
                            </div>
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <div class="text-center text-gray-500">12 active admin sessions</div>
                                <div class="text-center text-gray-500">234 active user sessions</div>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <h3 class="font-medium text-gray-900">Security Controls</h3>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Max Login Attempts</label>
                            <input type="number" value="5" min="1" max="20" class="w-full md:w-1/3 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500">
                            <p class="mt-1 text-sm text-gray-500">Account will be temporarily locked after this many failed login attempts</p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Password Requirements</label>
                            <div class="space-y-2">
                                <div class="flex items-center">
                                    <input type="checkbox" checked class="form-checkbox h-4 w-4 text-purple-600 mr-2">
                                    <span class="text-sm text-gray-700">Minimum 8 characters</span>
                                </div>
                                <div class="flex items-center">
                                    <input type="checkbox" checked class="form-checkbox h-4 w-4 text-purple-600 mr-2">
                                    <span class="text-sm text-gray-700">Require uppercase letters</span>
                                </div>
                                <div class="flex items-center">
                                    <input type="checkbox" checked class="form-checkbox h-4 w-4 text-purple-600 mr-2">
                                    <span class="text-sm text-gray-700">Require numbers</span>
                                </div>
                                <div class="flex items-center">
                                    <input type="checkbox" checked class="form-checkbox h-4 w-4 text-purple-600 mr-2">
                                    <span class="text-sm text-gray-700">Require special characters</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <h3 class="font-medium text-gray-900">System Maintenance</h3>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Maintenance Mode</label>
                            <select class="w-full md:w-1/3 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500">
                                <option>Off</option>
                                <option>On</option>
                            </select>
                            <p class="mt-1 text-sm text-gray-500">When enabled, only admins can access the site</p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Maintenance Message</label>
                            <textarea rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500">We're currently performing scheduled maintenance. Please check back shortly.</textarea>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Schedule Maintenance</label>
                            <div class="grid md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-xs text-gray-600 mb-1">Start Date/Time</label>
                                    <input type="datetime-local" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500">
                                </div>
                                <div>
                                    <label class="block text-xs text-gray-600 mb-1">End Date/Time</label>
                                    <input type="datetime-local" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Security Tab -->
        <div id="securityTab" class="settings-content hidden">
            <div class="bg-white rounded-xl shadow-sm p-8">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-lg font-bold text-gray-900">Security Settings</h2>
                    <button class="text-xs bg-green-100 text-green-800 px-3 py-1 rounded-md hover:bg-green-200">
                        <i class="fas fa-shield-alt mr-1"></i>Security Audit
                    </button>
                </div>

                <div class="space-y-8">
                    <div>
                        <h3 class="font-medium text-gray-900 mb-4">Authentication</h3>
                        <div class="space-y-4">
                            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                                <div class="flex items-center">
                                    <i class="fas fa-key text-yellow-600 mr-3 text-xl"></i>
                                    <div>
                                        <div class="font-medium">Two-Factor Authentication</div>
                                        <p class="text-sm text-gray-600">Require 2FA for admin accounts</p>
                                    </div>
                                </div>
                                <div class="relative inline-block w-12 h-6 border-2 border-gray-200 rounded-full cursor-pointer">
                                    <input type="checkbox" id="2fa-toggle" class="sr-only" checked>
                                    <span class="toggle-dot absolute left-0.5 top-0.5 bg-purple-600 w-4 h-4 rounded-full transition-transform duration-300 ease-in-out transform translate-x-6"></span>
                                </div>
                            </div>

                            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                                <div class="flex items-center">
                                    <i class="fab fa-google text-red-600 mr-3 text-xl"></i>
                                    <div>
                                        <div class="font-medium">Google OAuth</div>
                                        <p class="text-sm text-gray-600">Allow sign in with Google</p>
                                    </div>
                                </div>
                                <div class="relative inline-block w-12 h-6 border-2 border-gray-200 rounded-full cursor-pointer">
                                    <input type="checkbox" id="google-toggle" class="sr-only" checked>
                                    <span class="toggle-dot absolute left-0.5 top-0.5 bg-purple-600 w-4 h-4 rounded-full transition-transform duration-300 ease-in-out transform translate-x-6"></span>
                                </div>
                            </div>

                            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                                <div class="flex items-center">
                                    <i class="fab fa-facebook text-blue-600 mr-3 text-xl"></i>
                                    <div>
                                        <div class="font-medium">Facebook OAuth</div>
                                        <p class="text-sm text-gray-600">Allow sign in with Facebook</p>
                                    </div>
                                </div>
                                <div class="relative inline-block w-12 h-6 border-2 border-gray-200 rounded-full cursor-pointer">
                                    <input type="checkbox" id="facebook-toggle" class="sr-only" checked>
                                    <span class="toggle-dot absolute left-0.5 top-0.5 bg-purple-600 w-4 h-4 rounded-full transition-transform duration-300 ease-in-out transform translate-x-6"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <h3 class="font-medium text-gray-900 mb-4">Data Protection</h3>
                        <div class="space-y-4">
                            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                                <div class="flex items-center">
                                    <i class="fas fa-lock text-purple-600 mr-3 text-xl"></i>
                                    <div>
                                        <div class="font-medium">Data Encryption</div>
                                        <p class="text-sm text-gray-600">Encrypt sensitive user data</p>
                                    </div>
                                </div>
                                <div class="relative inline-block w-12 h-6 border-2 border-gray-200 rounded-full cursor-pointer">
                                    <input type="checkbox" id="encryption-toggle" class="sr-only" checked>
                                    <span class="toggle-dot absolute left-0.5 top-0.5 bg-purple-600 w-4 h-4 rounded-full transition-transform duration-300 ease-in-out transform translate-x-6"></span>
                                </div>
                            </div>

                            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                                <div class="flex items-center">
                                    <i class="fas fa-cookie-bite text-brown-600 mr-3 text-xl"></i>
                                    <div>
                                        <div class="font-medium">Cookie Consent</div>
                                        <p class="text-sm text-gray-600">Require cookie consent banner</p>
                                    </div>
                                </div>
                                <div class="relative inline-block w-12 h-6 border-2 border-gray-200 rounded-full cursor-pointer">
                                    <input type="checkbox" id="cookie-toggle" class="sr-only" checked>
                                    <span class="toggle-dot absolute left-0.5 top-0.5 bg-purple-600 w-4 h-4 rounded-full transition-transform duration-300 ease-in-out transform translate-x-6"></span>
                                </div>
                            </div>

                            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                                <div class="flex items-center">
                                    <i class="fas fa-user-shield text-green-600 mr-3 text-xl"></i>
                                    <div>
                                        <div class="font-medium">GDPR Compliance</div>
                                        <p class="text-sm text-gray-600">Enable GDPR compliance features</p>
                                    </div>
                                </div>
                                <div class="relative inline-block w-12 h-6 border-2 border-gray-200 rounded-full cursor-pointer">
                                    <input type="checkbox" id="gdpr-toggle" class="sr-only" checked>
                                    <span class="toggle-dot absolute left-0.5 top-0.5 bg-purple-600 w-4 h-4 rounded-full transition-transform duration-300 ease-in-out transform translate-x-6"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <h3 class="font-medium text-gray-900 mb-4">API & Integrations Security</h3>
                        <div class="p-4 bg-gray-50 rounded-lg">
                            <div class="flex items-center justify-between mb-4">
                                <div class="font-medium">API Keys</div>
                                <button class="text-purple-600 hover:text-purple-800 text-sm">
                                    <i class="fas fa-plus-circle mr-1"></i>Generate New Key
                                </button>
                            </div>

                            <div class="space-y-3">
                                <div class="flex items-center justify-between p-3 bg-white rounded-md border border-gray-200">
                                    <div>
                                        <div class="text-sm font-medium">Production API</div>
                                        <div class="text-xs text-gray-500">Created: July 12, 2025</div>
                                    </div>
                                    <div class="flex items-center">
                                        <span class="px-2 py-1 bg-green-100 text-green-800 text-xs rounded mr-2">Active</span>
                                        <button class="text-red-600 hover:text-red-800">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="flex items-center justify-between p-3 bg-white rounded-md border border-gray-200">
                                    <div>
                                        <div class="text-sm font-medium">Testing API</div>
                                        <div class="text-xs text-gray-500">Created: July 20, 2025</div>
                                    </div>
                                    <div class="flex items-center">
                                        <span class="px-2 py-1 bg-yellow-100 text-yellow-800 text-xs rounded mr-2">Testing</span>
                                        <button class="text-red-600 hover:text-red-800">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Appearance Tab -->
        <div id="appearanceTab" class="settings-content hidden">
            <div class="bg-white rounded-xl shadow-sm p-8">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-lg font-bold text-gray-900">Appearance Settings</h2>
                    <button class="text-xs bg-purple-100 text-purple-800 px-3 py-1 rounded-md hover:bg-purple-200">
                        <i class="fas fa-undo mr-1"></i>Reset to Default
                    </button>
                </div>

                <div class="grid md:grid-cols-2 gap-8">
                    <div>
                        <h3 class="font-medium text-gray-900 mb-4">Theme Configuration</h3>

                        <div class="space-y-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Primary Color</label>
                                <div class="flex items-center space-x-3">
                                    <input type="color" value="#8B5CF6" class="w-10 h-10 rounded-md cursor-pointer">
                                    <input type="text" value="#8B5CF6" class="w-28 px-3 py-2 border border-gray-300 rounded-lg">
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Secondary Color</label>
                                <div class="flex items-center space-x-3">
                                    <input type="color" value="#10B981" class="w-10 h-10 rounded-md cursor-pointer">
                                    <input type="text" value="#10B981" class="w-28 px-3 py-2 border border-gray-300 rounded-lg">
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Font Family</label>
                                <select class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500">
                                    <option>Inter</option>
                                    <option>Roboto</option>
                                    <option>Open Sans</option>
                                    <option>Montserrat</option>
                                </select>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Button Style</label>
                                <div class="grid grid-cols-3 gap-3">
                                    <div class="border border-purple-600 p-2 rounded-md flex flex-col items-center">
                                        <div class="w-full h-8 bg-purple-600 rounded-md mb-2"></div>
                                        <span class="text-xs">Solid</span>
                                    </div>
                                    <div class="border border-gray-300 p-2 rounded-md flex flex-col items-center">
                                        <div class="w-full h-8 bg-white border-2 border-purple-600 rounded-md mb-2"></div>
                                        <span class="text-xs">Outline</span>
                                    </div>
                                    <div class="border border-gray-300 p-2 rounded-md flex flex-col items-center">
                                        <div class="w-full h-8 bg-purple-100 text-purple-800 rounded-md mb-2"></div>
                                        <span class="text-xs">Soft</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <h3 class="font-medium text-gray-900 mb-4">Layout & Components</h3>

                        <div class="space-y-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Preferred Layout</label>
                                <div class="grid grid-cols-2 gap-4">
                                    <div class="border-2 border-purple-600 p-2 rounded-lg">
                                        <div class="bg-gray-100 h-24 mb-2 rounded"></div>
                                        <div class="text-xs text-center">Card View</div>
                                    </div>
                                    <div class="border border-gray-300 p-2 rounded-lg">
                                        <div class="bg-gray-100 h-24 mb-2 rounded"></div>
                                        <div class="text-xs text-center">List View</div>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Border Radius</label>
                                <div class="flex items-center space-x-3">
                                    <input type="range" min="0" max="16" value="8" class="w-full">
                                    <span class="text-sm font-medium">8px</span>
                                </div>
                            </div>

                            <div>
                                <div class="flex items-center justify-between mb-2">
                                    <label class="text-sm font-medium text-gray-700">Dark Mode</label>
                                    <div class="relative inline-block w-12 h-6 border-2 border-gray-200 rounded-full cursor-pointer">
                                        <input type="checkbox" id="dark-mode-toggle" class="sr-only">
                                        <span class="toggle-dot absolute left-0.5 top-0.5 bg-gray-400 w-4 h-4 rounded-full transition-transform duration-300 ease-in-out"></span>
                                    </div>
                                </div>
                                <p class="text-sm text-gray-500">Enable dark mode option for users</p>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Custom CSS</label>
                                <textarea rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-lg font-mono text-sm focus:ring-2 focus:ring-purple-500">.event-card:hover {
  transform: translateY(-4px);
  transition: all 0.3s ease;
}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-6 p-4 bg-gray-50 rounded-lg">
                    <h3 class="font-medium text-gray-900 mb-3">Preview</h3>
                    <div class="bg-white border border-gray-200 rounded-lg p-4 flex items-center justify-center h-40">
                        <div class="text-center">
                            <button class="bg-purple-600 text-white px-4 py-2 rounded-lg mb-3">Sample Button</button>
                            <div class="text-sm text-gray-600">Theme preview will appear here</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Integrations Tab -->
        <div id="integrationsTab" class="settings-content hidden">
            <div class="bg-white rounded-xl shadow-sm p-8">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-lg font-bold text-gray-900">Platform Integrations</h2>
                    <button class="text-xs bg-blue-100 text-blue-800 px-3 py-1 rounded-md hover:bg-blue-200">
                        <i class="fas fa-plus-circle mr-1"></i>Add New Integration
                    </button>
                </div>

                <div class="space-y-8">
                    <div>
                        <h3 class="font-medium text-gray-900 mb-4">Payment Processors</h3>
                        <div class="space-y-4">
                            <div class="border border-gray-200 rounded-lg p-4">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mr-4">
                                            <i class="fab fa-paypal text-blue-600 text-xl"></i>
                                        </div>
                                        <div>
                                            <h4 class="font-medium text-gray-900">PayPal</h4>
                                            <p class="text-sm text-gray-500">Connected on July 10, 2025</p>
                                        </div>
                                    </div>
                                    <div>
                                        <span class="px-3 py-1 bg-green-100 text-green-800 text-xs rounded-full">Connected</span>
                                    </div>
                                </div>

                                <div class="mt-4 flex justify-end space-x-3">
                                    <button class="text-sm text-gray-600 hover:text-gray-900">
                                        <i class="fas fa-cog mr-1"></i>Settings
                                    </button>
                                    <button class="text-sm text-red-600 hover:text-red-900">
                                        <i class="fas fa-unlink mr-1"></i>Disconnect
                                    </button>
                                </div>
                            </div>

                            <div class="border border-gray-200 rounded-lg p-4">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center mr-4">
                                            <i class="fab fa-stripe text-purple-600 text-xl"></i>
                                        </div>
                                        <div>
                                            <h4 class="font-medium text-gray-900">Stripe</h4>
                                            <p class="text-sm text-gray-500">Connected on July 15, 2025</p>
                                        </div>
                                    </div>
                                    <div>
                                        <span class="px-3 py-1 bg-green-100 text-green-800 text-xs rounded-full">Connected</span>
                                    </div>
                                </div>

                                <div class="mt-4 flex justify-end space-x-3">
                                    <button class="text-sm text-gray-600 hover:text-gray-900">
                                        <i class="fas fa-cog mr-1"></i>Settings
                                    </button>
                                    <button class="text-sm text-red-600 hover:text-red-900">
                                        <i class="fas fa-unlink mr-1"></i>Disconnect
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <h3 class="font-medium text-gray-900 mb-4">Email Services</h3>
                        <div class="space-y-4">
                            <div class="border border-gray-200 rounded-lg p-4">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mr-4">
                                            <i class="fas fa-envelope text-green-600 text-xl"></i>
                                        </div>
                                        <div>
                                            <h4 class="font-medium text-gray-900">MailChimp</h4>
                                            <p class="text-sm text-gray-500">Not connected</p>
                                        </div>
                                    </div>
                                    <div>
                                        <button class="px-3 py-1 bg-blue-600 text-white text-xs rounded-lg hover:bg-blue-700">Connect</button>
                                    </div>
                                </div>
                            </div>

                            <div class="border border-gray-200 rounded-lg p-4">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <div class="w-12 h-12 bg-orange-100 rounded-full flex items-center justify-center mr-4">
                                            <i class="fas fa-paper-plane text-orange-600 text-xl"></i>
                                        </div>
                                        <div>
                                            <h4 class="font-medium text-gray-900">SendGrid</h4>
                                            <p class="text-sm text-gray-500">Connected on July 18, 2025</p>
                                        </div>
                                    </div>
                                    <div>
                                        <span class="px-3 py-1 bg-green-100 text-green-800 text-xs rounded-full">Connected</span>
                                    </div>
                                </div>

                                <div class="mt-4 flex justify-end space-x-3">
                                    <button class="text-sm text-gray-600 hover:text-gray-900">
                                        <i class="fas fa-cog mr-1"></i>Settings
                                    </button>
                                    <button class="text-sm text-red-600 hover:text-red-900">
                                        <i class="fas fa-unlink mr-1"></i>Disconnect
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <h3 class="font-medium text-gray-900 mb-4">Social Media</h3>
                        <div class="grid md:grid-cols-2 gap-4">
                            <div class="border border-gray-200 rounded-lg p-4 flex items-center justify-between">
                                <div class="flex items-center">
                                    <i class="fab fa-facebook text-blue-600 text-2xl mr-3"></i>
                                    <span>Facebook</span>
                                </div>
                                <button class="px-3 py-1 bg-blue-600 text-white text-xs rounded-lg hover:bg-blue-700">Connect</button>
                            </div>

                            <div class="border border-gray-200 rounded-lg p-4 flex items-center justify-between">
                                <div class="flex items-center">
                                    <i class="fab fa-twitter text-blue-400 text-2xl mr-3"></i>
                                    <span>Twitter</span>
                                </div>
                                <button class="px-3 py-1 bg-blue-600 text-white text-xs rounded-lg hover:bg-blue-700">Connect</button>
                            </div>

                            <div class="border border-gray-200 rounded-lg p-4 flex items-center justify-between">
                                <div class="flex items-center">
                                    <i class="fab fa-instagram text-pink-600 text-2xl mr-3"></i>
                                    <span>Instagram</span>
                                </div>
                                <span class="px-3 py-1 bg-green-100 text-green-800 text-xs rounded-full">Connected</span>
                            </div>

                            <div class="border border-gray-200 rounded-lg p-4 flex items-center justify-between">
                                <div class="flex items-center">
                                    <i class="fab fa-youtube text-red-600 text-2xl mr-3"></i>
                                    <span>YouTube</span>
                                </div>
                                <button class="px-3 py-1 bg-blue-600 text-white text-xs rounded-lg hover:bg-blue-700">Connect</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Save Success Notification -->
<div id="saveSuccess" class="fixed top-4 right-4 bg-green-600 text-white px-6 py-3 rounded-lg shadow-lg z-50 hidden">
    <div class="flex items-center">
        <i class="fas fa-check-circle mr-2"></i>
        Settings saved successfully
    </div>
</div>

<!-- Confirmation Modal -->
<div id="confirmationModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
    <div class="bg-white rounded-xl max-w-md w-full mx-4 p-6">
        <div class="text-center">
            <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-4">
                <i class="fas fa-exclamation-triangle text-yellow-600 text-2xl"></i>
            </div>
            <h3 class="text-lg font-bold text-gray-900 mb-2">Confirm Changes</h3>
            <p class="text-gray-600 mb-6">Are you sure you want to save these settings? Some changes may affect how users interact with the platform.</p>

            <div class="flex space-x-3">
                <button id="cancelChanges" class="flex-1 bg-gray-200 text-gray-800 py-2 rounded-lg hover:bg-gray-300 transition-colors">
                    Cancel
                </button>
                <button id="confirmChanges" class="flex-1 bg-purple-600 text-white py-2 rounded-lg hover:bg-purple-700 transition-colors">
                    Confirm
                </button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Tab switching
    const tabs = document.querySelectorAll('.settings-tab');
    const tabContents = document.querySelectorAll('.settings-content');

    tabs.forEach(tab => {
        tab.addEventListener('click', () => {
            // Remove active class from all tabs
            tabs.forEach(t => {
                t.classList.remove('active', 'text-purple-600', 'border-b-2', 'border-purple-600');
                t.classList.add('text-gray-600');
            });

            // Add active class to clicked tab
            tab.classList.add('active', 'text-purple-600', 'border-b-2', 'border-purple-600');
            tab.classList.remove('text-gray-600');

            // Hide all tab contents
            tabContents.forEach(content => {
                content.classList.add('hidden');
            });

            // Show corresponding tab content
            const tabId = tab.getAttribute('data-tab');
            document.getElementById(tabId + 'Tab').classList.remove('hidden');
        });
    });

    // Toggle switches
    document.querySelectorAll('input[type="checkbox"]').forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            const toggleDot = this.nextElementSibling;
            if (this.checked) {
                toggleDot.classList.add('bg-purple-600', 'transform', 'translate-x-6');
                toggleDot.classList.remove('bg-gray-400');
            } else {
                toggleDot.classList.remove('bg-purple-600', 'transform', 'translate-x-6');
                toggleDot.classList.add('bg-gray-400');
            }
        });
    });

    // Save settings
    document.getElementById('saveSettings').addEventListener('click', function() {
        // Show confirmation modal
        document.getElementById('confirmationModal').classList.remove('hidden');
        document.getElementById('confirmationModal').classList.add('flex');
    });

    // Cancel changes
    document.getElementById('cancelChanges').addEventListener('click', function() {
        document.getElementById('confirmationModal').classList.add('hidden');
        document.getElementById('confirmationModal').classList.remove('flex');
    });

    // Confirm changes
    document.getElementById('confirmChanges').addEventListener('click', function() {
        // Hide confirmation modal
        document.getElementById('confirmationModal').classList.add('hidden');
        document.getElementById('confirmationModal').classList.remove('flex');

        // Show success notification
        document.getElementById('saveSuccess').classList.remove('hidden');
        setTimeout(() => {
            document.getElementById('saveSuccess').classList.add('hidden');
        }, 2500);
    });
});
</script>

<style>
.scrollbar-thin::-webkit-scrollbar {
    height: 6px;
}

.scrollbar-thumb-gray-300::-webkit-scrollbar-thumb {
    background-color: #d1d5db;
    border-radius: 3px;
}

.scrollbar-track-gray-100::-webkit-scrollbar-track {
    background-color: #f3f4f6;
}

.toggle-dot {
    transition: all 0.3s ease-in-out;
}

input[type="checkbox"]:checked + .toggle-dot {
    transform: translateX(1.5rem);
}
</style>
@endpush
