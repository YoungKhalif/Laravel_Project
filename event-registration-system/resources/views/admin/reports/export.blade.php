@extends('layouts.app')

@section('title', 'Data Export - EventSmart')

@section('content')
<div class="min-h-screen bg-gray-50 py-8">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-4xl">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-2xl font-bold text-gray-900">Data Export</h1>
            <p class="mt-1 text-gray-600">Export and download your event data</p>
        </div>

        <!-- Export Options -->
        <div class="bg-white rounded-xl shadow-sm overflow-hidden mb-8">
            <div class="p-6">
                <form method="POST" action="{{ route('admin.exports.generate') }}" class="space-y-6">
                    @csrf

                    <!-- Data Type Selection -->
                    <div>
                        <label class="text-base font-medium text-gray-900">What data would you like to export?</label>
                        <p class="text-sm text-gray-500">Select the type of data you want to export</p>
                        <div class="mt-4 grid grid-cols-1 gap-4 sm:grid-cols-2">
                            @foreach([
                                ['id' => 'events', 'title' => 'Events', 'description' => 'Event details, schedules, and settings', 'icon' => 'calendar'],
                                ['id' => 'attendees', 'title' => 'Attendees', 'description' => 'Registration and check-in data', 'icon' => 'users'],
                                ['id' => 'sales', 'title' => 'Sales', 'description' => 'Ticket sales and revenue data', 'icon' => 'chart-line'],
                                ['id' => 'tickets', 'title' => 'Tickets', 'description' => 'Ticket types and inventory', 'icon' => 'ticket-alt'],
                                ['id' => 'reviews', 'title' => 'Reviews', 'description' => 'Event ratings and feedback', 'icon' => 'star'],
                                ['id' => 'refunds', 'title' => 'Refunds', 'description' => 'Refund requests and status', 'icon' => 'undo']
                            ] as $type)
                                <div class="relative flex items-start">
                                    <div class="flex items-center h-5">
                                        <input id="{{ $type['id'] }}" name="data_types[]" type="checkbox" value="{{ $type['id'] }}"
                                            class="h-4 w-4 text-purple-600 focus:ring-purple-500 border-gray-300 rounded">
                                    </div>
                                    <div class="ml-3">
                                        <label for="{{ $type['id'] }}" class="font-medium text-gray-700 flex items-center">
                                            <i class="fas fa-{{ $type['icon'] }} text-purple-500 mr-2"></i>
                                            {{ $type['title'] }}
                                        </label>
                                        <p class="text-gray-500 text-sm">{{ $type['description'] }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Date Range -->
                    <div class="border-t pt-6">
                        <label class="text-base font-medium text-gray-900">Date Range</label>
                        <p class="text-sm text-gray-500">Select the time period for your export</p>
                        <div class="mt-4 grid grid-cols-1 gap-4 sm:grid-cols-2">
                            <div>
                                <label for="start_date" class="block text-sm font-medium text-gray-700">Start Date</label>
                                <input type="date" name="start_date" id="start_date"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-purple-500 focus:border-purple-500">
                            </div>
                            <div>
                                <label for="end_date" class="block text-sm font-medium text-gray-700">End Date</label>
                                <input type="date" name="end_date" id="end_date"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-purple-500 focus:border-purple-500">
                            </div>
                        </div>
                        <div class="mt-4 flex items-center space-x-4">
                            @foreach(['today' => 'Today', 'week' => 'This Week', 'month' => 'This Month', 'year' => 'This Year'] as $value => $label)
                                <button type="button"
                                    class="inline-flex items-center px-3 py-1.5 border border-gray-300 shadow-sm text-sm font-medium rounded text-gray-700 bg-white hover:bg-gray-50"
                                    onclick="setDateRange('{{ $value }}')">
                                    {{ $label }}
                                </button>
                            @endforeach
                        </div>
                    </div>

                    <!-- Export Format -->
                    <div class="border-t pt-6">
                        <label class="text-base font-medium text-gray-900">Export Format</label>
                        <p class="text-sm text-gray-500">Choose your preferred file format</p>
                        <div class="mt-4 grid grid-cols-1 gap-4 sm:grid-cols-3">
                            @foreach([
                                ['id' => 'excel', 'title' => 'Excel', 'description' => 'XLSX format', 'icon' => 'file-excel', 'color' => 'green'],
                                ['id' => 'csv', 'title' => 'CSV', 'description' => 'Comma separated', 'icon' => 'file-csv', 'color' => 'blue'],
                                ['id' => 'pdf', 'title' => 'PDF', 'description' => 'Portable document', 'icon' => 'file-pdf', 'color' => 'red']
                            ] as $format)
                                <div class="relative">
                                    <input type="radio" name="format" id="{{ $format['id'] }}" value="{{ $format['id'] }}" class="sr-only peer">
                                    <label for="{{ $format['id'] }}"
                                        class="flex flex-col p-4 bg-white border rounded-lg cursor-pointer hover:border-purple-500 peer-checked:border-purple-500 peer-checked:ring-2 peer-checked:ring-purple-500">
                                        <div class="flex items-center justify-between">
                                            <div class="flex items-center">
                                                <i class="fas fa-{{ $format['icon'] }} text-{{ $format['color'] }}-500 mr-2 text-lg"></i>
                                                <span class="font-medium">{{ $format['title'] }}</span>
                                            </div>
                                            <i class="fas fa-check-circle text-purple-500 opacity-0 peer-checked:opacity-100"></i>
                                        </div>
                                        <p class="mt-1 text-sm text-gray-500">{{ $format['description'] }}</p>
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Additional Options -->
                    <div class="border-t pt-6">
                        <label class="text-base font-medium text-gray-900">Additional Options</label>
                        <div class="mt-4 space-y-4">
                            <div class="flex items-start">
                                <div class="flex items-center h-5">
                                    <input id="include_headers" name="include_headers" type="checkbox"
                                        class="h-4 w-4 text-purple-600 focus:ring-purple-500 border-gray-300 rounded">
                                </div>
                                <div class="ml-3">
                                    <label for="include_headers" class="font-medium text-gray-700">Include Column Headers</label>
                                    <p class="text-gray-500 text-sm">Add headers to identify each column</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div class="flex items-center h-5">
                                    <input id="compress" name="compress" type="checkbox"
                                        class="h-4 w-4 text-purple-600 focus:ring-purple-500 border-gray-300 rounded">
                                </div>
                                <div class="ml-3">
                                    <label for="compress" class="font-medium text-gray-700">Compress Files</label>
                                    <p class="text-gray-500 text-sm">Create a ZIP archive for multiple files</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Submit -->
                    <div class="border-t pt-6 flex items-center justify-between">
                        <div class="text-sm text-gray-500">
                            <i class="fas fa-shield-alt mr-1"></i>
                            Your data will be encrypted during export
                        </div>
                        <button type="submit"
                            class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                            <i class="fas fa-file-export mr-2"></i>
                            Generate Export
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Recent Exports -->
        <div class="bg-white rounded-xl shadow-sm overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900">Recent Exports</h3>
            </div>
            <div class="divide-y divide-gray-200">
                @foreach(range(1, 5) as $i)
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                @php
                                    $types = ['excel' => 'green', 'csv' => 'blue', 'pdf' => 'red'];
                                    $type = array_rand($types);
                                @endphp
                                <i class="fas fa-file-{{ $type }} text-{{ $types[$type] }}-500 text-xl"></i>
                                <div class="ml-4">
                                    <h4 class="text-sm font-medium text-gray-900">
                                        {{ ucfirst($type) }} Export - {{ now()->subDays($i)->format('M d, Y') }}
                                    </h4>
                                    <p class="text-sm text-gray-500">
                                        {{ rand(100, 999) }} records • {{ rand(1, 10) }}MB
                                    </p>
                                </div>
                            </div>
                            <div class="flex items-center space-x-4">
                                <button class="text-gray-400 hover:text-gray-500">
                                    <i class="fas fa-download"></i>
                                </button>
                                <button class="text-gray-400 hover:text-red-500">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
function setDateRange(range) {
    const today = new Date();
    let startDate = new Date();

    switch(range) {
        case 'today':
            break;
        case 'week':
            startDate.setDate(today.getDate() - 7);
            break;
        case 'month':
            startDate.setMonth(today.getMonth() - 1);
            break;
        case 'year':
            startDate.setFullYear(today.getFullYear() - 1);
            break;
    }

    document.getElementById('start_date').value = startDate.toISOString().split('T')[0];
    document.getElementById('end_date').value = today.toISOString().split('T')[0];
}

// Initialize with current date
document.getElementById('end_date').value = new Date().toISOString().split('T')[0];
</script>
@endpush
