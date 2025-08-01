@extends('layouts.app')

@section('title', 'Event Attendees - EventSmart')

@push('styles')
<style>
    .dropdown:hover .dropdown-content {
        display: block;
    }
    @media (max-width: 640px) {
        .dropdown-content {
            position: static;
            box-shadow: none;
            width: 100%;
        }
    }
</style>
@endpush

@section('content')
<div class="min-h-screen bg-gray-50">
    <div class="container mx-auto px-6 py-8">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Attendees for: <span class="text-purple-600">{{ $event->title ?? 'Event Title' }}</span></h1>
                <p class="text-gray-600">View and manage all registered attendees for this event.</p>
            </div>
            <div class="flex flex-col sm:flex-row items-center space-y-2 sm:space-y-0 sm:space-x-4">
                <div class="dropdown relative">
                    <button class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition-colors">
                        <i class="fas fa-download mr-2"></i>Export List
                        <i class="fas fa-chevron-down ml-2"></i>
                    </button>
                    <div class="dropdown-content hidden absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5">
                        <div class="py-1">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                <i class="fas fa-file-excel mr-2 text-green-600"></i>Export as Excel
                            </a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                <i class="fas fa-file-csv mr-2 text-blue-600"></i>Export as CSV
                            </a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                <i class="fas fa-file-pdf mr-2 text-red-600"></i>Export as PDF
                            </a>
                        </div>
                    </div>
                </div>
                <div class="dropdown relative">
                    <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors">
                        <i class="fas fa-envelope mr-2"></i>Email All
                        <i class="fas fa-chevron-down ml-2"></i>
                    </button>
                    <div class="dropdown-content hidden absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5">
                        <div class="py-1">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                <i class="fas fa-paper-plane mr-2"></i>Send Updates
                            </a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                <i class="fas fa-calendar-alt mr-2"></i>Send Reminder
                            </a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                <i class="fas fa-ticket-alt mr-2"></i>Send Tickets
                            </a>
                        </div>
                    </div>
                </div>
                <button class="bg-purple-600 text-white px-4 py-2 rounded-lg hover:bg-purple-700 transition-colors">
                    <i class="fas fa-qrcode mr-2"></i>Bulk Check-in
                </button>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm p-6">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-4 gap-4">
                <div class="flex flex-col sm:flex-row items-center gap-4">
                    <div class="relative w-full sm:w-64">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-500">
                            <i class="fas fa-search"></i>
                        </span>
                        <input type="text" placeholder="Search attendees..."
                            class="w-full pl-10 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                    </div>
                    <div class="flex items-center space-x-2 w-full sm:w-auto">
                        <select class="w-full sm:w-auto px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500">
                            <option value="">All Status</option>
                            <option value="confirmed">Confirmed</option>
                            <option value="pending">Pending</option>
                            <option value="cancelled">Cancelled</option>
                        </select>
                        <select class="w-full sm:w-auto px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500">
                            <option value="">All Ticket Types</option>
                            <option value="vip">VIP</option>
                            <option value="regular">Regular</option>
                            <option value="early">Early Bird</option>
                        </select>
                    </div>
                </div>
                <div class="flex items-center space-x-2">
                    <span class="text-sm text-gray-600">Show:</span>
                    <select class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ticket Type</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Checked In</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($attendees ?? [] as $attendee)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        <img class="h-10 w-10 rounded-full" src="{{ $attendee->avatar ?? 'https://ui-avatars.com/api/?name=' . urlencode($attendee->name) }}" alt="{{ $attendee->name }}">
                                    </div>
                                    <div class="ml-4">
                                        <div class="font-medium text-gray-900">{{ $attendee->name }}</div>
                                        <div class="text-sm text-gray-500">Registration #{{ $attendee->registration_number ?? 'N/A' }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-gray-700">{{ $attendee->email }}</div>
                                <div class="text-sm text-gray-500">Registered: {{ $attendee->created_at?->diffForHumans() ?? 'N/A' }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-purple-700 font-medium">{{ $attendee->ticket_type ?? 'Regular' }}</div>
                                <div class="text-sm text-gray-500">${{ number_format($attendee->ticket_price ?? 0, 2) }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @php
                                    $statusColors = [
                                        'confirmed' => ['bg' => 'bg-green-100', 'text' => 'text-green-800'],
                                        'pending' => ['bg' => 'bg-yellow-100', 'text' => 'text-yellow-800'],
                                        'cancelled' => ['bg' => 'bg-red-100', 'text' => 'text-red-800'],
                                    ];
                                    $status = strtolower($attendee->status ?? 'pending');
                                    $colors = $statusColors[$status] ?? ['bg' => 'bg-gray-100', 'text' => 'text-gray-800'];
                                @endphp
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $colors['bg'] }} {{ $colors['text'] }} capitalize">
                                    {{ $status }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                @if($attendee->checked_in ?? false)
                                    <span class="text-green-600" title="Checked in at {{ $attendee->checked_in_at?->format('M d, Y H:i') }}">
                                        <i class="fas fa-check-circle"></i>
                                    </span>
                                @else
                                    <button class="text-gray-400 hover:text-green-600 transition-colors" title="Check in attendee">
                                        <i class="fas fa-user-check"></i>
                                    </button>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center space-x-3">
                                    <button class="text-blue-600 hover:text-blue-900 transition-colors" title="View Details">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="text-purple-600 hover:text-purple-900 transition-colors" title="Send Email">
                                        <i class="fas fa-envelope"></i>
                                    </button>
                                    <button class="text-green-600 hover:text-green-900 transition-colors" title="Download Ticket">
                                        <i class="fas fa-ticket-alt"></i>
                                    </button>
                                    <button class="text-red-600 hover:text-red-900 transition-colors" title="Remove Attendee">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="px-6 py-8 text-center">
                                <div class="text-gray-500">
                                    <i class="fas fa-users text-4xl mb-4"></i>
                                    <p class="text-lg font-medium">No attendees found</p>
                                    <p class="text-sm">There are no registered attendees for this event yet.</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
