@extends('layouts.app')

@section('title', 'Refund Status - EventSmart')

@section('content')
<div class="min-h-screen bg-gray-50 py-8">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-4xl">
        <!-- Header -->
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-900">Refund Status</h1>
            <p class="mt-1 text-gray-600">Track and manage your refund requests</p>
        </div>

        <!-- Status Overview -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
            @php
                $statuses = [
                    ['label' => 'Pending', 'count' => $pendingCount ?? 0, 'color' => 'yellow'],
                    ['label' => 'Approved', 'count' => $approvedCount ?? 0, 'color' => 'green'],
                    ['label' => 'Processing', 'count' => $processingCount ?? 0, 'color' => 'blue'],
                    ['label' => 'Completed', 'count' => $completedCount ?? 0, 'color' => 'purple']
                ];
            @endphp

            @foreach($statuses as $status)
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <span class="inline-flex items-center justify-center h-12 w-12 rounded-md bg-{{ $status['color'] }}-100 text-{{ $status['color'] }}-600">
                                <i class="fas fa-{{ $loop->iteration === 1 ? 'clock' : ($loop->iteration === 2 ? 'check' : ($loop->iteration === 3 ? 'sync' : 'check-double')) }} text-lg"></i>
                            </span>
                        </div>
                        <div class="ml-4">
                            <dt class="text-sm font-medium text-gray-500">
                                {{ $status['label'] }}
                            </dt>
                            <dd class="text-lg font-semibold text-gray-900">
                                {{ $status['count'] }}
                            </dd>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Refund Requests List -->
        <div class="bg-white rounded-xl shadow-sm overflow-hidden">
            <!-- Filters -->
            <div class="p-4 border-b border-gray-200 bg-gray-50">
                <div class="flex flex-wrap items-center justify-between gap-4">
                    <div class="flex items-center space-x-4">
                        <select class="pl-3 pr-10 py-2 text-sm border-gray-300 rounded-md focus:ring-purple-500 focus:border-purple-500">
                            <option value="">All Statuses</option>
                            <option value="pending">Pending</option>
                            <option value="approved">Approved</option>
                            <option value="processing">Processing</option>
                            <option value="completed">Completed</option>
                            <option value="rejected">Rejected</option>
                        </select>
                        <select class="pl-3 pr-10 py-2 text-sm border-gray-300 rounded-md focus:ring-purple-500 focus:border-purple-500">
                            <option value="">All Time</option>
                            <option value="today">Today</option>
                            <option value="week">This Week</option>
                            <option value="month">This Month</option>
                            <option value="year">This Year</option>
                        </select>
                    </div>
                    <div class="flex items-center">
                        <div class="relative">
                            <input type="text" placeholder="Search requests..."
                                class="pl-10 pr-4 py-2 border border-gray-300 rounded-md focus:ring-purple-500 focus:border-purple-500">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-search text-gray-400"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Requests Table -->
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Request ID
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Event
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Amount
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Status
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Submitted
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Updated
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($refunds ?? [] as $refund)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                    #{{ $refund->reference_number }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <img class="h-8 w-8 rounded-full object-cover"
                                            src="{{ $refund->event->image_url }}"
                                            alt="{{ $refund->event->title }}">
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $refund->event->title }}
                                            </div>
                                            <div class="text-sm text-gray-500">
                                                {{ $refund->ticket_type }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">
                                        ${{ number_format($refund->amount, 2) }}
                                    </div>
                                    <div class="text-xs text-gray-500">
                                        Original: ${{ number_format($refund->original_amount, 2) }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @php
                                        $statusColors = [
                                            'pending' => 'yellow',
                                            'approved' => 'green',
                                            'processing' => 'blue',
                                            'completed' => 'purple',
                                            'rejected' => 'red'
                                        ];
                                        $color = $statusColors[$refund->status] ?? 'gray';
                                    @endphp
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-{{ $color }}-100 text-{{ $color }}-800">
                                        {{ ucfirst($refund->status) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <div class="flex items-center">
                                        <i class="far fa-clock mr-1.5 text-gray-400"></i>
                                        {{ $refund->created_at->format('M d, Y') }}
                                    </div>
                                    <div class="text-xs text-gray-400">
                                        {{ $refund->created_at->format('h:i A') }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $refund->updated_at->diffForHumans() }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <div class="flex items-center space-x-3">
                                        <button class="text-purple-600 hover:text-purple-900" title="View Details">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        @if($refund->status === 'pending')
                                            <button class="text-red-600 hover:text-red-900" title="Cancel Request">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        @endif
                                        <button class="text-gray-600 hover:text-gray-900" title="Download Receipt">
                                            <i class="fas fa-download"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-6 py-8 text-center">
                                    <div class="text-gray-500">
                                        <i class="fas fa-receipt text-4xl mb-4"></i>
                                        <p class="text-lg font-medium">No refund requests found</p>
                                        <p class="text-sm">You haven't submitted any refund requests yet.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if(($refunds ?? collect())->hasPages())
                <div class="px-6 py-4 border-t border-gray-200">
                    {{ $refunds->links() }}
                </div>
            @endif
        </div>

        <!-- Help Section -->
        <div class="mt-8 bg-white rounded-xl shadow-sm overflow-hidden">
            <div class="p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Need Help?</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <span class="inline-flex items-center justify-center h-10 w-10 rounded-md bg-purple-100 text-purple-600">
                                <i class="fas fa-question-circle"></i>
                            </span>
                        </div>
                        <div class="ml-4">
                            <h4 class="text-sm font-medium text-gray-900">FAQ</h4>
                            <p class="mt-1 text-sm text-gray-500">
                                Find answers to common questions about refunds
                            </p>
                            <a href="#" class="mt-2 text-sm text-purple-600 hover:text-purple-500">Learn more →</a>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <span class="inline-flex items-center justify-center h-10 w-10 rounded-md bg-purple-100 text-purple-600">
                                <i class="fas fa-life-ring"></i>
                            </span>
                        </div>
                        <div class="ml-4">
                            <h4 class="text-sm font-medium text-gray-900">Support</h4>
                            <p class="mt-1 text-sm text-gray-500">
                                Get help from our support team
                            </p>
                            <a href="#" class="mt-2 text-sm text-purple-600 hover:text-purple-500">Contact support →</a>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <span class="inline-flex items-center justify-center h-10 w-10 rounded-md bg-purple-100 text-purple-600">
                                <i class="fas fa-book"></i>
                            </span>
                        </div>
                        <div class="ml-4">
                            <h4 class="text-sm font-medium text-gray-900">Refund Policy</h4>
                            <p class="mt-1 text-sm text-gray-500">
                                Learn about our refund policies
                            </p>
                            <a href="#" class="mt-2 text-sm text-purple-600 hover:text-purple-500">View policy →</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.querySelector('select').addEventListener('change', function() {
    // Handle status filter change
});

document.querySelector('input[type="text"]').addEventListener('input', debounce(function(e) {
    // Handle search input
}, 300));

function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
        const later = () => {
            clearTimeout(timeout);
            func(...args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
}
</script>
@endpush
