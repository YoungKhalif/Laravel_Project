@extends('layouts.app')

@section('title', 'Sales Reports - EventSmart')

@section('content')
<div class="min-h-screen bg-gray-50 py-8">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="mb-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900">Sales Reports</h1>
                    <p class="mt-1 text-gray-600">Track and analyze your event revenue</p>
                </div>
                <div class="flex items-center space-x-4">
                    <button class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">
                        <i class="fas fa-download mr-2"></i>
                        Export Report
                    </button>
                    <div class="relative">
                        <button class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-purple-600 hover:bg-purple-700">
                            <i class="fas fa-calendar mr-2"></i>
                            Last 30 Days
                            <i class="fas fa-chevron-down ml-2"></i>
                        </button>
                        <!-- Date Range Dropdown -->
                        <div class="hidden absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5">
                            <div class="py-1">
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Today</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Last 7 Days</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Last 30 Days</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">This Month</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Custom Range</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Key Metrics -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            @foreach([
                ['label' => 'Total Revenue', 'value' => '$' . number_format($totalRevenue ?? 0, 2), 'change' => '+15.3%', 'icon' => 'dollar-sign'],
                ['label' => 'Tickets Sold', 'value' => number_format($ticketsSold ?? 0), 'change' => '+8.2%', 'icon' => 'ticket-alt'],
                ['label' => 'Average Order Value', 'value' => '$' . number_format($averageOrderValue ?? 0, 2), 'change' => '+3.7%', 'icon' => 'chart-line'],
                ['label' => 'Refund Rate', 'value' => number_format($refundRate ?? 0, 1) . '%', 'change' => '-2.1%', 'icon' => 'undo']
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

        <!-- Revenue Chart -->
        <div class="bg-white rounded-lg shadow-sm p-6 mb-8">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-semibold text-gray-900">Revenue Over Time</h3>
                <div class="flex items-center space-x-4">
                    <button class="px-3 py-1 text-sm font-medium text-gray-700 hover:text-gray-900">Daily</button>
                    <button class="px-3 py-1 text-sm font-medium bg-purple-100 text-purple-700 rounded-md">Weekly</button>
                    <button class="px-3 py-1 text-sm font-medium text-gray-700 hover:text-gray-900">Monthly</button>
                </div>
            </div>
            <div class="h-80">
                <!-- Canvas for Chart.js -->
                <canvas id="revenueChart"></canvas>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Top Events -->
            <div class="bg-white rounded-lg shadow-sm p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Top Performing Events</h3>
                <div class="space-y-4">
                    @foreach(range(1, 5) as $i)
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <img class="h-10 w-10 rounded-lg object-cover" src="https://picsum.photos/200?random={{ $i }}" alt="Event">
                            </div>
                            <div class="ml-4 flex-1">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <h4 class="text-sm font-medium text-gray-900">Summer Music Festival {{ $i }}</h4>
                                        <p class="text-sm text-gray-500">{{ rand(50, 200) }} tickets sold</p>
                                    </div>
                                    <div class="text-right">
                                        <p class="text-sm font-medium text-gray-900">${{ number_format(rand(5000, 15000), 2) }}</p>
                                        <p class="text-xs text-green-600">+{{ rand(5, 15) }}%</p>
                                    </div>
                                </div>
                                <div class="mt-2 w-full bg-gray-200 rounded-full h-1.5">
                                    <div class="bg-purple-600 h-1.5 rounded-full" style="width: {{ rand(60, 95) }}%"></div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <a href="#" class="mt-6 block text-center text-sm text-purple-600 hover:text-purple-500">
                    View all events →
                </a>
            </div>

            <!-- Sales by Category -->
            <div class="bg-white rounded-lg shadow-sm p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Sales by Category</h3>
                <div class="h-80">
                    <canvas id="categoryChart"></canvas>
                </div>
                <div class="mt-4 grid grid-cols-2 gap-4">
                    @foreach([
                        ['category' => 'Music', 'amount' => '$12,450', 'percentage' => '35%'],
                        ['category' => 'Business', 'amount' => '$8,230', 'percentage' => '23%'],
                        ['category' => 'Sports', 'amount' => '$6,120', 'percentage' => '17%'],
                        ['category' => 'Technology', 'amount' => '$4,580', 'percentage' => '13%']
                    ] as $category)
                        <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                            <div>
                                <p class="text-sm font-medium text-gray-900">{{ $category['category'] }}</p>
                                <p class="text-sm text-gray-500">{{ $category['percentage'] }}</p>
                            </div>
                            <p class="text-sm font-semibold text-gray-900">{{ $category['amount'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Recent Transactions -->
        <div class="mt-8 bg-white rounded-lg shadow-sm">
            <div class="px-6 py-4 border-b border-gray-200">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-gray-900">Recent Transactions</h3>
                    <a href="#" class="text-sm text-purple-600 hover:text-purple-500">View all</a>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Transaction ID
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Customer
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
                                Date
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach(range(1, 5) as $i)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    #{{ str_pad(rand(1000, 9999), 8, '0', STR_PAD_LEFT) }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="h-8 w-8 rounded-full bg-gray-200"></div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">John Doe</div>
                                            <div class="text-sm text-gray-500">john@example.com</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    Summer Music Festival {{ $i }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    ${{ number_format(rand(50, 200), 2) }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                        Completed
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ now()->subHours(rand(1, 24))->format('M d, Y H:i A') }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
// Revenue Chart
const revenueCtx = document.getElementById('revenueChart').getContext('2d');
new Chart(revenueCtx, {
    type: 'line',
    data: {
        labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
        datasets: [{
            label: 'Revenue',
            data: [4500, 6000, 5200, 7800],
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
                beginAtZero: true,
                ticks: {
                    callback: function(value) {
                        return '$' + value;
                    }
                }
            }
        }
    }
});

// Category Chart
const categoryCtx = document.getElementById('categoryChart').getContext('2d');
new Chart(categoryCtx, {
    type: 'doughnut',
    data: {
        labels: ['Music', 'Business', 'Sports', 'Technology', 'Other'],
        datasets: [{
            data: [35, 23, 17, 13, 12],
            backgroundColor: [
                '#7C3AED',
                '#9F7AEA',
                '#B794F4',
                '#D6BCFA',
                '#E9D8FD'
            ]
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
