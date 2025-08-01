@extends('layouts.app')

@section('title', 'Attendance Analytics - EventSmart')

@section('content')
<div class="min-h-screen bg-gray-50 py-8">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="mb-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900">Attendance Analytics</h1>
                    <p class="mt-1 text-gray-600">Track and analyze event attendance patterns</p>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="relative inline-block">
                        <select class="pl-3 pr-10 py-2 text-sm border-gray-300 rounded-md focus:ring-purple-500 focus:border-purple-500">
                            <option value="all">All Events</option>
                            @foreach($events ?? [] as $event)
                                <option value="{{ $event->id }}">{{ $event->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="relative">
                        <button class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">
                            <i class="fas fa-calendar mr-2"></i>
                            Last 30 Days
                            <i class="fas fa-chevron-down ml-2"></i>
                        </button>
                    </div>
                    <button class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-purple-600 hover:bg-purple-700">
                        <i class="fas fa-download mr-2"></i>
                        Export Report
                    </button>
                </div>
            </div>
        </div>

        <!-- Key Metrics -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            @foreach([
                ['label' => 'Total Attendees', 'value' => number_format($totalAttendees ?? 1250), 'change' => '+12.5%', 'icon' => 'users'],
                ['label' => 'Check-in Rate', 'value' => number_format($checkInRate ?? 85, 1) . '%', 'change' => '+5.2%', 'icon' => 'clipboard-check'],
                ['label' => 'No-Show Rate', 'value' => number_format($noShowRate ?? 15, 1) . '%', 'change' => '-2.8%', 'icon' => 'user-times'],
                ['label' => 'Avg. Duration', 'value' => number_format($avgDuration ?? 2.5, 1) . ' hrs', 'change' => '+0.5 hrs', 'icon' => 'clock']
            ] as $metric)
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-500">{{ $metric['label'] }}</p>
                            <p class="mt-2 text-2xl font-semibold text-gray-900">{{ $metric['value'] }}</p>
                        </div>
                        <div class="h-12 w-12 rounded-full bg-purple-100 flex items-center justify-center">
                            <i class="fas fa-{{ $metric['icon'] }} text-purple-600 text-lg"></i>
                        </div>
                    </div>
                    <div class="mt-4">
                        <span class="inline-flex items-center text-sm {{ strpos($metric['change'], '-') === 0 ? 'text-red-600' : 'text-green-600' }}">
                            <i class="fas fa-{{ strpos($metric['change'], '-') === 0 ? 'arrow-down' : 'arrow-up' }} mr-1"></i>
                            {{ $metric['change'] }}
                            <span class="text-gray-500 ml-2">vs last period</span>
                        </span>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
            <!-- Attendance Over Time -->
            <div class="bg-white rounded-lg shadow-sm p-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold text-gray-900">Attendance Over Time</h3>
                    <div class="flex items-center space-x-4">
                        <button class="px-3 py-1 text-sm font-medium text-gray-700 hover:text-gray-900">Hourly</button>
                        <button class="px-3 py-1 text-sm font-medium bg-purple-100 text-purple-700 rounded-md">Daily</button>
                        <button class="px-3 py-1 text-sm font-medium text-gray-700 hover:text-gray-900">Weekly</button>
                    </div>
                </div>
                <div class="h-80">
                    <canvas id="attendanceChart"></canvas>
                </div>
            </div>

            <!-- Check-in Distribution -->
            <div class="bg-white rounded-lg shadow-sm p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Check-in Distribution</h3>
                <div class="h-80">
                    <canvas id="checkInChart"></canvas>
                </div>
                <div class="mt-4 grid grid-cols-3 gap-4 text-center text-sm">
                    <div class="bg-green-50 p-3 rounded-lg">
                        <div class="font-medium text-green-700">Early</div>
                        <div class="text-green-600">32%</div>
                    </div>
                    <div class="bg-blue-50 p-3 rounded-lg">
                        <div class="font-medium text-blue-700">On Time</div>
                        <div class="text-blue-600">45%</div>
                    </div>
                    <div class="bg-yellow-50 p-3 rounded-lg">
                        <div class="font-medium text-yellow-700">Late</div>
                        <div class="text-yellow-600">23%</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Demographic Analysis -->
        <div class="bg-white rounded-lg shadow-sm p-6 mb-8">
            <h3 class="text-lg font-semibold text-gray-900 mb-6">Demographic Analysis</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Age Distribution -->
                <div>
                    <h4 class="text-sm font-medium text-gray-700 mb-4">Age Distribution</h4>
                    <div class="space-y-4">
                        @foreach(['18-24', '25-34', '35-44', '45-54', '55+'] as $range)
                            <div>
                                <div class="flex items-center justify-between text-sm">
                                    <span class="text-gray-600">{{ $range }}</span>
                                    <span class="font-medium">{{ rand(10, 30) }}%</span>
                                </div>
                                <div class="mt-1 w-full bg-gray-200 rounded-full h-2">
                                    <div class="bg-purple-600 h-2 rounded-full" style="width: {{ rand(10, 30) }}%"></div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Gender Distribution -->
                <div>
                    <h4 class="text-sm font-medium text-gray-700 mb-4">Gender Distribution</h4>
                    <div class="h-64">
                        <canvas id="genderChart"></canvas>
                    </div>
                </div>

                <!-- Location Analysis -->
                <div>
                    <h4 class="text-sm font-medium text-gray-700 mb-4">Top Locations</h4>
                    <div class="space-y-4">
                        @foreach(['New York', 'Los Angeles', 'Chicago', 'Houston', 'Phoenix'] as $city)
                            <div class="flex items-center">
                                <div class="h-8 w-8 rounded-full bg-purple-100 flex items-center justify-center text-sm font-medium text-purple-600">
                                    {{ $loop->iteration }}
                                </div>
                                <div class="ml-4 flex-1">
                                    <div class="flex items-center justify-between">
                                        <span class="text-sm font-medium text-gray-900">{{ $city }}</span>
                                        <span class="text-sm text-gray-500">{{ rand(5, 15) }}%</span>
                                    </div>
                                    <div class="mt-1 w-full bg-gray-200 rounded-full h-1.5">
                                        <div class="bg-purple-600 h-1.5 rounded-full" style="width: {{ rand(20, 80) }}%"></div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <!-- Attendance Details -->
        <div class="bg-white rounded-lg shadow-sm overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-gray-900">Attendance Details</h3>
                    <div class="flex items-center space-x-4">
                        <div class="relative">
                            <input type="text" placeholder="Search attendees..."
                                class="pl-10 pr-4 py-2 border border-gray-300 rounded-md focus:ring-purple-500 focus:border-purple-500">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-search text-gray-400"></i>
                            </div>
                        </div>
                        <select class="pl-3 pr-10 py-2 text-sm border-gray-300 rounded-md focus:ring-purple-500 focus:border-purple-500">
                            <option value="">All Statuses</option>
                            <option value="checked_in">Checked In</option>
                            <option value="not_checked_in">Not Checked In</option>
                            <option value="late">Late</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Attendee</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ticket Type</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Check-in Time</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Duration</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach(range(1, 5) as $i)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="h-10 w-10 rounded-full bg-gray-200"></div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">John Doe</div>
                                            <div class="text-sm text-gray-500">john@example.com</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-purple-100 text-purple-800">
                                        VIP
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ now()->subHours(rand(1, 5))->format('h:i A') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ rand(1, 4) }} hrs {{ rand(0, 59) }} min
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @php
                                        $statuses = [
                                            ['label' => 'Checked In', 'color' => 'green'],
                                            ['label' => 'Late', 'color' => 'yellow'],
                                            ['label' => 'Not Checked In', 'color' => 'red']
                                        ];
                                        $status = $statuses[array_rand($statuses)];
                                    @endphp
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-{{ $status['color'] }}-100 text-{{ $status['color'] }}-800">
                                        {{ $status['label'] }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="px-6 py-4 border-t border-gray-200">
                <div class="flex items-center justify-between">
                    <div class="text-sm text-gray-500">
                        Showing 1 to 5 of 25 entries
                    </div>
                    <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                        <!-- Add pagination controls here -->
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
// Attendance Chart
const attendanceCtx = document.getElementById('attendanceChart').getContext('2d');
new Chart(attendanceCtx, {
    type: 'line',
    data: {
        labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
        datasets: [{
            label: 'Attendees',
            data: [120, 190, 300, 250, 280, 420, 380],
            borderColor: '#7C3AED',
            backgroundColor: 'rgba(124, 58, 237, 0.1)',
            fill: true,
            tension: 0.4
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                display: false
            }
        },
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

// Check-in Distribution Chart
const checkInCtx = document.getElementById('checkInChart').getContext('2d');
new Chart(checkInCtx, {
    type: 'bar',
    data: {
        labels: ['8 AM', '9 AM', '10 AM', '11 AM', '12 PM', '1 PM', '2 PM'],
        datasets: [{
            label: 'Check-ins',
            data: [45, 70, 120, 190, 140, 80, 50],
            backgroundColor: '#7C3AED'
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                display: false
            }
        },
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

// Gender Distribution Chart
const genderCtx = document.getElementById('genderChart').getContext('2d');
new Chart(genderCtx, {
    type: 'doughnut',
    data: {
        labels: ['Male', 'Female', 'Other'],
        datasets: [{
            data: [45, 48, 7],
            backgroundColor: ['#7C3AED', '#9F7AEA', '#B794F4']
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                position: 'bottom'
            }
        }
    }
});
</script>
@endpush
