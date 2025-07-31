@extends('layouts.app')

@section('title', 'Payment Management - Admin Dashboard - EventSmart')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Header -->
    <div class="bg-white shadow-sm border-b">
        <div class="container mx-auto px-6 py-4">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900">Payment Management</h1>
                    <p class="text-gray-600">Monitor transactions, manage payouts, and oversee financial operations</p>
                </div>
                <div class="flex items-center space-x-4">
                    <button id="exportFinancials" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition-colors">
                        <i class="fas fa-download mr-2"></i>Export Report
                    </button>
                    <button id="processPayouts" class="bg-purple-600 text-white px-4 py-2 rounded-lg hover:bg-purple-700 transition-colors">
                        <i class="fas fa-money-bill-wave mr-2"></i>Process Payouts
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="container mx-auto px-6 py-8">
        <!-- Financial Overview -->
        <div class="grid md:grid-cols-4 gap-6 mb-8">
            <div class="bg-white rounded-xl shadow-sm p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm font-medium">Total Revenue</p>
                        <p class="text-3xl font-bold text-green-600">$847,325</p>
                    </div>
                    <div class="bg-green-100 p-3 rounded-full">
                        <i class="fas fa-dollar-sign text-green-600 text-xl"></i>
                    </div>
                </div>
                <div class="mt-4 flex items-center">
                    <span class="text-green-600 text-sm font-medium">+12.5% from last month</span>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm font-medium">Platform Fees</p>
                        <p class="text-3xl font-bold text-blue-600">$42,366</p>
                    </div>
                    <div class="bg-blue-100 p-3 rounded-full">
                        <i class="fas fa-percentage text-blue-600 text-xl"></i>
                    </div>
                </div>
                <div class="mt-4 flex items-center">
                    <span class="text-blue-600 text-sm font-medium">5% average fee rate</span>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm font-medium">Pending Payouts</p>
                        <p class="text-3xl font-bold text-yellow-600">$158,940</p>
                    </div>
                    <div class="bg-yellow-100 p-3 rounded-full">
                        <i class="fas fa-clock text-yellow-600 text-xl"></i>
                    </div>
                </div>
                <div class="mt-4 flex items-center">
                    <span class="text-yellow-600 text-sm font-medium">47 organizers pending</span>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm font-medium">Refunds Processed</p>
                        <p class="text-3xl font-bold text-red-600">$12,450</p>
                    </div>
                    <div class="bg-red-100 p-3 rounded-full">
                        <i class="fas fa-undo text-red-600 text-xl"></i>
                    </div>
                </div>
                <div class="mt-4 flex items-center">
                    <span class="text-red-600 text-sm font-medium">1.47% refund rate</span>
                </div>
            </div>
        </div>

        <!-- Financial Tabs -->
        <div class="bg-white rounded-xl shadow-sm mb-8">
            <div class="border-b border-gray-200">
                <nav class="flex space-x-8 px-6">
                    <button class="financial-tab active py-4 px-2 text-green-600 border-b-2 border-green-600 font-semibold" data-tab="transactions">
                        Transactions
                    </button>
                    <button class="financial-tab py-4 px-2 text-gray-600 hover:text-purple-600 font-semibold" data-tab="payouts">
                        Payouts
                    </button>
                    <button class="financial-tab py-4 px-2 text-gray-600 hover:text-red-600 font-semibold" data-tab="refunds">
                        Refunds
                    </button>
                    <button class="financial-tab py-4 px-2 text-gray-600 hover:text-blue-600 font-semibold" data-tab="fees">
                        Fee Management
                    </button>
                    <button class="financial-tab py-4 px-2 text-gray-600 hover:text-yellow-600 font-semibold" data-tab="analytics">
                        Financial Analytics
                    </button>
                </nav>
            </div>

            <!-- Transactions Tab -->
            <div id="transactionsTab" class="tab-content p-6">
                <!-- Filters -->
                <div class="flex flex-col md:flex-row justify-between items-center mb-6 space-y-4 md:space-y-0">
                    <div class="flex flex-col md:flex-row items-center space-y-4 md:space-y-0 md:space-x-4 w-full md:w-auto">
                        <div class="relative w-full md:w-auto">
                            <input type="text" id="searchTransactions" placeholder="Search by transaction ID, event, or user..."
                                   class="w-full md:w-80 pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500">
                            <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                        </div>

                        <select id="transactionStatus" class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500">
                            <option value="">All Status</option>
                            <option value="completed">Completed</option>
                            <option value="pending">Pending</option>
                            <option value="failed">Failed</option>
                            <option value="refunded">Refunded</option>
                        </select>

                        <select id="transactionPeriod" class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500">
                            <option value="">All Time</option>
                            <option value="today">Today</option>
                            <option value="week">This Week</option>
                            <option value="month">This Month</option>
                            <option value="quarter">This Quarter</option>
                        </select>
                    </div>

                    <button id="clearTransactionFilters" class="text-purple-600 hover:text-purple-700 font-semibold">
                        Clear Filters
                    </button>
                </div>

                <!-- Transactions Table -->
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Transaction</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Event</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Customer</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Amount</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fee</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="transactionsTable" class="bg-white divide-y divide-gray-200">
                            <!-- Transactions will be populated by JavaScript -->
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Payouts Tab -->
            <div id="payoutsTab" class="tab-content p-6 hidden">
                <!-- Payout Controls -->
                <div class="flex flex-col md:flex-row justify-between items-center mb-6 space-y-4 md:space-y-0">
                    <div class="flex items-center space-x-4">
                        <select id="payoutStatus" class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500">
                            <option value="">All Status</option>
                            <option value="pending">Pending</option>
                            <option value="processing">Processing</option>
                            <option value="completed">Completed</option>
                            <option value="failed">Failed</option>
                        </select>

                        <input type="date" id="payoutDateFrom" class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500">
                        <input type="date" id="payoutDateTo" class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500">
                    </div>

                    <div class="flex items-center space-x-3">
                        <button id="bulkPayout" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition-colors">
                            <i class="fas fa-money-check-alt mr-2"></i>Bulk Payout
                        </button>
                        <button id="payoutSettings" class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700 transition-colors">
                            <i class="fas fa-cog mr-2"></i>Settings
                        </button>
                    </div>
                </div>

                <!-- Payouts List -->
                <div id="payoutsList" class="space-y-4">
                    <!-- Payouts will be populated by JavaScript -->
                </div>
            </div>

            <!-- Refunds Tab -->
            <div id="refundsTab" class="tab-content p-6 hidden">
                <!-- Refund Controls -->
                <div class="flex flex-col md:flex-row justify-between items-center mb-6 space-y-4 md:space-y-0">
                    <div class="flex items-center space-x-4">
                        <select id="refundReason" class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500">
                            <option value="">All Reasons</option>
                            <option value="event-cancelled">Event Cancelled</option>
                            <option value="customer-request">Customer Request</option>
                            <option value="duplicate-payment">Duplicate Payment</option>
                            <option value="technical-error">Technical Error</option>
                        </select>

                        <select id="refundStatus" class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500">
                            <option value="">All Status</option>
                            <option value="pending">Pending</option>
                            <option value="approved">Approved</option>
                            <option value="processed">Processed</option>
                            <option value="denied">Denied</option>
                        </select>
                    </div>

                    <button id="newRefund" class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition-colors">
                        <i class="fas fa-plus mr-2"></i>Process Refund
                    </button>
                </div>

                <!-- Refunds Table -->
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Refund ID</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Transaction</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Customer</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Amount</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Reason</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="refundsTable" class="bg-white divide-y divide-gray-200">
                            <!-- Refunds will be populated by JavaScript -->
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Fee Management Tab -->
            <div id="feesTab" class="tab-content p-6 hidden">
                <div class="grid lg:grid-cols-2 gap-8">
                    <!-- Fee Configuration -->
                    <div>
                        <h3 class="text-lg font-bold text-gray-900 mb-6">Platform Fee Configuration</h3>

                        <div class="space-y-6">
                            <div class="bg-gray-50 p-6 rounded-lg">
                                <h4 class="font-semibold text-gray-900 mb-4">Standard Events</h4>
                                <div class="space-y-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Platform Fee (%)</label>
                                        <input type="number" value="5" step="0.1" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Fixed Fee ($)</label>
                                        <input type="number" value="0.50" step="0.01" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500">
                                    </div>
                                </div>
                            </div>

                            <div class="bg-gray-50 p-6 rounded-lg">
                                <h4 class="font-semibold text-gray-900 mb-4">Premium Events</h4>
                                <div class="space-y-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Platform Fee (%)</label>
                                        <input type="number" value="3" step="0.1" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Fixed Fee ($)</label>
                                        <input type="number" value="1.00" step="0.01" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500">
                                    </div>
                                </div>
                            </div>

                            <div class="bg-gray-50 p-6 rounded-lg">
                                <h4 class="font-semibold text-gray-900 mb-4">Free Events</h4>
                                <div class="space-y-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Processing Fee ($)</label>
                                        <input type="number" value="0" step="0.01" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500">
                                    </div>
                                </div>
                            </div>

                            <button class="w-full bg-purple-600 text-white py-3 rounded-lg hover:bg-purple-700 transition-colors font-semibold">
                                Update Fee Structure
                            </button>
                        </div>
                    </div>

                    <!-- Fee Analytics -->
                    <div>
                        <h3 class="text-lg font-bold text-gray-900 mb-6">Fee Performance</h3>

                        <div class="space-y-6">
                            <div class="bg-blue-50 p-6 rounded-lg">
                                <h4 class="font-semibold text-blue-900 mb-4">Monthly Fee Collection</h4>
                                <div class="text-3xl font-bold text-blue-600 mb-2">$42,366</div>
                                <div class="text-blue-700 text-sm">+8.3% from last month</div>
                            </div>

                            <div class="bg-green-50 p-6 rounded-lg">
                                <h4 class="font-semibold text-green-900 mb-4">Average Fee Rate</h4>
                                <div class="text-3xl font-bold text-green-600 mb-2">4.2%</div>
                                <div class="text-green-700 text-sm">Across all event types</div>
                            </div>

                            <div class="bg-yellow-50 p-6 rounded-lg">
                                <h4 class="font-semibold text-yellow-900 mb-4">Fee Waivers</h4>
                                <div class="text-3xl font-bold text-yellow-600 mb-2">$1,240</div>
                                <div class="text-yellow-700 text-sm">12 organizers this month</div>
                            </div>

                            <!-- Fee Breakdown Chart Placeholder -->
                            <div class="bg-gray-50 p-6 rounded-lg">
                                <h4 class="font-semibold text-gray-900 mb-4">Fee Distribution</h4>
                                <div class="space-y-3">
                                    <div class="flex justify-between items-center">
                                        <span class="text-gray-600">Standard Events</span>
                                        <span class="font-semibold">78%</span>
                                    </div>
                                    <div class="w-full bg-gray-200 rounded-full h-2">
                                        <div class="bg-blue-600 h-2 rounded-full" style="width: 78%"></div>
                                    </div>

                                    <div class="flex justify-between items-center">
                                        <span class="text-gray-600">Premium Events</span>
                                        <span class="font-semibold">20%</span>
                                    </div>
                                    <div class="w-full bg-gray-200 rounded-full h-2">
                                        <div class="bg-green-600 h-2 rounded-full" style="width: 20%"></div>
                                    </div>

                                    <div class="flex justify-between items-center">
                                        <span class="text-gray-600">Free Events</span>
                                        <span class="font-semibold">2%</span>
                                    </div>
                                    <div class="w-full bg-gray-200 rounded-full h-2">
                                        <div class="bg-yellow-600 h-2 rounded-full" style="width: 2%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Analytics Tab -->
            <div id="analyticsTab" class="tab-content p-6 hidden">
                <div class="grid lg:grid-cols-2 gap-8">
                    <!-- Revenue Trends -->
                    <div>
                        <h3 class="text-lg font-bold text-gray-900 mb-6">Revenue Trends</h3>
                        <div class="bg-gray-50 p-6 rounded-lg">
                            <div class="mb-4">
                                <select class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500">
                                    <option>Last 30 Days</option>
                                    <option>Last 90 Days</option>
                                    <option>Last 6 Months</option>
                                    <option>Last Year</option>
                                </select>
                            </div>

                            <!-- Placeholder for chart -->
                            <div class="h-64 bg-white rounded-lg border-2 border-dashed border-gray-300 flex items-center justify-center">
                                <div class="text-center">
                                    <i class="fas fa-chart-line text-4xl text-gray-400 mb-4"></i>
                                    <p class="text-gray-600">Revenue Chart Placeholder</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Key Metrics -->
                    <div>
                        <h3 class="text-lg font-bold text-gray-900 mb-6">Key Metrics</h3>
                        <div class="space-y-4">
                            <div class="bg-white p-6 rounded-lg border border-gray-200">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-gray-600 text-sm">Average Transaction</p>
                                        <p class="text-2xl font-bold text-gray-900">$127.50</p>
                                    </div>
                                    <div class="text-green-600">
                                        <i class="fas fa-arrow-up"></i> 5.2%
                                    </div>
                                </div>
                            </div>

                            <div class="bg-white p-6 rounded-lg border border-gray-200">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-gray-600 text-sm">Daily Transactions</p>
                                        <p class="text-2xl font-bold text-gray-900">1,247</p>
                                    </div>
                                    <div class="text-green-600">
                                        <i class="fas fa-arrow-up"></i> 12.1%
                                    </div>
                                </div>
                            </div>

                            <div class="bg-white p-6 rounded-lg border border-gray-200">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-gray-600 text-sm">Success Rate</p>
                                        <p class="text-2xl font-bold text-gray-900">98.7%</p>
                                    </div>
                                    <div class="text-green-600">
                                        <i class="fas fa-arrow-up"></i> 0.3%
                                    </div>
                                </div>
                            </div>

                            <div class="bg-white p-6 rounded-lg border border-gray-200">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-gray-600 text-sm">Chargeback Rate</p>
                                        <p class="text-2xl font-bold text-gray-900">0.2%</p>
                                    </div>
                                    <div class="text-red-600">
                                        <i class="fas fa-arrow-down"></i> 0.1%
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Payment Methods Breakdown -->
                <div class="mt-8">
                    <h3 class="text-lg font-bold text-gray-900 mb-6">Payment Methods</h3>
                    <div class="grid md:grid-cols-3 gap-6">
                        <div class="bg-white p-6 rounded-lg border border-gray-200">
                            <div class="flex items-center justify-between mb-4">
                                <h4 class="font-semibold text-gray-900">Credit Cards</h4>
                                <i class="fab fa-cc-visa text-2xl text-blue-600"></i>
                            </div>
                            <div class="text-2xl font-bold text-gray-900 mb-2">68.5%</div>
                            <div class="text-gray-600 text-sm">$580,412 volume</div>
                        </div>

                        <div class="bg-white p-6 rounded-lg border border-gray-200">
                            <div class="flex items-center justify-between mb-4">
                                <h4 class="font-semibold text-gray-900">PayPal</h4>
                                <i class="fab fa-paypal text-2xl text-blue-500"></i>
                            </div>
                            <div class="text-2xl font-bold text-gray-900 mb-2">24.8%</div>
                            <div class="text-gray-600 text-sm">$210,154 volume</div>
                        </div>

                        <div class="bg-white p-6 rounded-lg border border-gray-200">
                            <div class="flex items-center justify-between mb-4">
                                <h4 class="font-semibold text-gray-900">Bank Transfer</h4>
                                <i class="fas fa-university text-2xl text-green-600"></i>
                            </div>
                            <div class="text-2xl font-bold text-gray-900 mb-2">6.7%</div>
                            <div class="text-gray-600 text-sm">$56,759 volume</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Transaction Details Modal -->
<div id="transactionModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
    <div class="bg-white rounded-xl max-w-2xl w-full mx-4">
        <div class="p-6 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <h3 class="text-xl font-bold text-gray-900">Transaction Details</h3>
                <button id="closeTransactionModal" class="text-gray-400 hover:text-gray-600">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>
        </div>

        <div class="p-6">
            <div id="transactionDetails">
                <!-- Transaction details will be populated by JavaScript -->
            </div>
        </div>
    </div>
</div>

<!-- Payout Modal -->
<div id="payoutModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
    <div class="bg-white rounded-xl max-w-md w-full mx-4">
        <div class="p-6">
            <div class="text-center">
                <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-money-bill-wave text-green-600 text-2xl"></i>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">Process Payouts</h3>
                <p class="text-gray-600 mb-6">Process all pending payouts for eligible organizers?</p>

                <div class="flex space-x-3">
                    <button id="cancelPayout" class="flex-1 bg-gray-200 text-gray-800 py-2 rounded-lg hover:bg-gray-300 transition-colors">
                        Cancel
                    </button>
                    <button id="confirmPayout" class="flex-1 bg-green-600 text-white py-2 rounded-lg hover:bg-green-700 transition-colors">
                        Process All
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
    // Sample financial data
    const transactionsData = [
        {
            id: 'TXN-2025-001847',
            eventTitle: 'Tech Innovation Summit 2025',
            customerName: 'Sarah Johnson',
            customerEmail: 'sarah@example.com',
            amount: 299.00,
            fee: 14.95,
            status: 'completed',
            paymentMethod: 'Credit Card',
            date: '2025-07-29',
            refundable: true
        },
        {
            id: 'TXN-2025-001846',
            eventTitle: 'AI Workshop Series',
            customerName: 'Michael Chen',
            customerEmail: 'michael@example.com',
            amount: 149.00,
            fee: 7.45,
            status: 'completed',
            paymentMethod: 'PayPal',
            date: '2025-07-29',
            refundable: true
        },
        {
            id: 'TXN-2025-001845',
            eventTitle: 'Startup Networking Event',
            customerName: 'Emily Rodriguez',
            customerEmail: 'emily@example.com',
            amount: 25.00,
            fee: 1.75,
            status: 'pending',
            paymentMethod: 'Credit Card',
            date: '2025-07-29',
            refundable: false
        },
        {
            id: 'TXN-2025-001844',
            eventTitle: 'Digital Marketing Bootcamp',
            customerName: 'David Kim',
            customerEmail: 'david@example.com',
            amount: 199.00,
            fee: 9.95,
            status: 'failed',
            paymentMethod: 'Bank Transfer',
            date: '2025-07-28',
            refundable: false
        }
    ];

    const payoutsData = [
        {
            id: 'PO-2025-00123',
            organizer: 'TechCorp Inc.',
            email: 'finance@techcorp.com',
            amount: 12450.00,
            events: 8,
            status: 'pending',
            dueDate: '2025-08-01',
            method: 'Bank Transfer'
        },
        {
            id: 'PO-2025-00122',
            organizer: 'DataScience Academy',
            email: 'payments@datasci.com',
            amount: 8930.00,
            events: 12,
            status: 'processing',
            dueDate: '2025-07-30',
            method: 'PayPal'
        },
        {
            id: 'PO-2025-00121',
            organizer: 'Startup NYC',
            email: 'billing@startupnyc.com',
            amount: 3250.00,
            events: 5,
            status: 'completed',
            dueDate: '2025-07-25',
            method: 'Bank Transfer'
        }
    ];

    const refundsData = [
        {
            id: 'REF-2025-00456',
            transactionId: 'TXN-2025-001820',
            customerName: 'Lisa Wong',
            customerEmail: 'lisa@example.com',
            amount: 299.00,
            reason: 'event-cancelled',
            status: 'processed',
            date: '2025-07-28',
            processedDate: '2025-07-29'
        },
        {
            id: 'REF-2025-00455',
            transactionId: 'TXN-2025-001815',
            customerName: 'John Smith',
            customerEmail: 'john@example.com',
            amount: 149.00,
            reason: 'customer-request',
            status: 'pending',
            date: '2025-07-27',
            processedDate: null
        }
    ];

    let currentTab = 'transactions';
    let filteredTransactions = [...transactionsData];

    // Initialize page
    function init() {
        renderTransactions();
        renderPayouts();
        renderRefunds();
        setupEventListeners();
    }

    // Tab switching
    function switchTab(tabName) {
        currentTab = tabName;

        // Update active tab
        document.querySelectorAll('.financial-tab').forEach(tab => {
            tab.classList.remove('active', 'text-green-600', 'border-b-2', 'border-green-600');
            tab.classList.add('text-gray-600');
        });

        const activeTab = document.querySelector(`[data-tab="${tabName}"]`);
        activeTab.classList.add('active', 'text-green-600', 'border-b-2', 'border-green-600');
        activeTab.classList.remove('text-gray-600');

        // Show/hide content
        document.querySelectorAll('.tab-content').forEach(content => {
            content.classList.add('hidden');
        });
        document.getElementById(tabName + 'Tab').classList.remove('hidden');
    }

    // Render transactions
    function renderTransactions() {
        const tbody = document.getElementById('transactionsTable');
        tbody.innerHTML = '';

        filteredTransactions.forEach(transaction => {
            const row = document.createElement('tr');
            row.className = 'hover:bg-gray-50';

            const statusBadge = getStatusBadge(transaction.status);

            row.innerHTML = `
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm font-medium text-gray-900">${transaction.id}</div>
                    <div class="text-sm text-gray-500">${transaction.paymentMethod}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm font-medium text-gray-900">${transaction.eventTitle}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm font-medium text-gray-900">${transaction.customerName}</div>
                    <div class="text-sm text-gray-500">${transaction.customerEmail}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm font-medium text-gray-900">$${transaction.amount.toFixed(2)}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm font-medium text-gray-600">$${transaction.fee.toFixed(2)}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    ${statusBadge}
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">${formatDate(transaction.date)}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                    <div class="flex space-x-2">
                        <button onclick="viewTransaction('${transaction.id}')" class="text-purple-600 hover:text-purple-900 p-1" title="View Details">
                            <i class="fas fa-eye"></i>
                        </button>
                        ${transaction.refundable ? `
                            <button onclick="processRefund('${transaction.id}')" class="text-red-600 hover:text-red-900 p-1" title="Refund">
                                <i class="fas fa-undo"></i>
                            </button>
                        ` : ''}
                        <button onclick="downloadReceipt('${transaction.id}')" class="text-blue-600 hover:text-blue-900 p-1" title="Download Receipt">
                            <i class="fas fa-download"></i>
                        </button>
                    </div>
                </td>
            `;

            tbody.appendChild(row);
        });
    }

    // Render payouts
    function renderPayouts() {
        const container = document.getElementById('payoutsList');
        container.innerHTML = '';

        payoutsData.forEach(payout => {
            const payoutCard = document.createElement('div');
            payoutCard.className = 'bg-white p-6 rounded-lg border border-gray-200 hover:shadow-md transition-shadow';

            const statusBadge = getPayoutStatusBadge(payout.status);

            payoutCard.innerHTML = `
                <div class="flex items-center justify-between">
                    <div class="flex-1">
                        <div class="flex items-center space-x-4 mb-4">
                            <h4 class="text-lg font-semibold text-gray-900">${payout.organizer}</h4>
                            ${statusBadge}
                        </div>

                        <div class="grid md:grid-cols-2 gap-4 text-sm">
                            <div class="space-y-2">
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Payout ID:</span>
                                    <span class="font-medium">${payout.id}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Email:</span>
                                    <span class="font-medium">${payout.email}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Events:</span>
                                    <span class="font-medium">${payout.events} events</span>
                                </div>
                            </div>

                            <div class="space-y-2">
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Amount:</span>
                                    <span class="font-medium text-green-600">$${payout.amount.toLocaleString()}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Method:</span>
                                    <span class="font-medium">${payout.method}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Due Date:</span>
                                    <span class="font-medium">${formatDate(payout.dueDate)}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="ml-6 flex flex-col space-y-2">
                        ${payout.status === 'pending' ? `
                            <button onclick="processSinglePayout('${payout.id}')" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition-colors text-sm">
                                <i class="fas fa-check mr-2"></i>Process
                            </button>
                        ` : ''}
                        <button onclick="viewPayoutDetails('${payout.id}')" class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700 transition-colors text-sm">
                            <i class="fas fa-eye mr-2"></i>Details
                        </button>
                    </div>
                </div>
            `;

            container.appendChild(payoutCard);
        });
    }

    // Render refunds
    function renderRefunds() {
        const tbody = document.getElementById('refundsTable');
        tbody.innerHTML = '';

        refundsData.forEach(refund => {
            const row = document.createElement('tr');
            row.className = 'hover:bg-gray-50';

            const statusBadge = getRefundStatusBadge(refund.status);

            row.innerHTML = `
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm font-medium text-gray-900">${refund.id}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm font-medium text-gray-900">${refund.transactionId}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm font-medium text-gray-900">${refund.customerName}</div>
                    <div class="text-sm text-gray-500">${refund.customerEmail}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm font-medium text-gray-900">$${refund.amount.toFixed(2)}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900 capitalize">${refund.reason.replace('-', ' ')}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    ${statusBadge}
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">${formatDate(refund.date)}</div>
                    ${refund.processedDate ? `<div class="text-xs text-gray-500">Processed: ${formatDate(refund.processedDate)}</div>` : ''}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                    <div class="flex space-x-2">
                        <button onclick="viewRefundDetails('${refund.id}')" class="text-purple-600 hover:text-purple-900 p-1" title="View Details">
                            <i class="fas fa-eye"></i>
                        </button>
                        ${refund.status === 'pending' ? `
                            <button onclick="approveRefund('${refund.id}')" class="text-green-600 hover:text-green-900 p-1" title="Approve">
                                <i class="fas fa-check"></i>
                            </button>
                            <button onclick="denyRefund('${refund.id}')" class="text-red-600 hover:text-red-900 p-1" title="Deny">
                                <i class="fas fa-times"></i>
                            </button>
                        ` : ''}
                    </div>
                </td>
            `;

            tbody.appendChild(row);
        });
    }

    // Status badge functions
    function getStatusBadge(status) {
        const badges = {
            completed: '<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">Completed</span>',
            pending: '<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">Pending</span>',
            failed: '<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">Failed</span>',
            refunded: '<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">Refunded</span>'
        };
        return badges[status] || badges.pending;
    }

    function getPayoutStatusBadge(status) {
        const badges = {
            pending: '<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">Pending</span>',
            processing: '<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">Processing</span>',
            completed: '<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">Completed</span>',
            failed: '<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">Failed</span>'
        };
        return badges[status] || badges.pending;
    }

    function getRefundStatusBadge(status) {
        const badges = {
            pending: '<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">Pending</span>',
            approved: '<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">Approved</span>',
            processed: '<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">Processed</span>',
            denied: '<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">Denied</span>'
        };
        return badges[status] || badges.pending;
    }

    // Format date
    function formatDate(dateString) {
        return new Date(dateString).toLocaleDateString('en-US', {
            year: 'numeric',
            month: 'short',
            day: 'numeric'
        });
    }

    // Filter transactions
    function filterTransactions() {
        const searchTerm = document.getElementById('searchTransactions').value.toLowerCase();
        const status = document.getElementById('transactionStatus').value;
        const period = document.getElementById('transactionPeriod').value;

        filteredTransactions = transactionsData.filter(transaction => {
            let matches = true;

            if (searchTerm && !transaction.id.toLowerCase().includes(searchTerm) &&
                !transaction.eventTitle.toLowerCase().includes(searchTerm) &&
                !transaction.customerName.toLowerCase().includes(searchTerm)) {
                matches = false;
            }

            if (status && transaction.status !== status) matches = false;

            // Add period filtering logic here if needed

            return matches;
        });

        renderTransactions();
    }

    // Setup event listeners
    function setupEventListeners() {
        // Tab switching
        document.querySelectorAll('.financial-tab').forEach(tab => {
            tab.addEventListener('click', function() {
                switchTab(this.dataset.tab);
            });
        });

        // Transaction filters
        document.getElementById('searchTransactions').addEventListener('input', filterTransactions);
        document.getElementById('transactionStatus').addEventListener('change', filterTransactions);
        document.getElementById('transactionPeriod').addEventListener('change', filterTransactions);

        // Clear filters
        document.getElementById('clearTransactionFilters').addEventListener('click', () => {
            document.getElementById('searchTransactions').value = '';
            document.getElementById('transactionStatus').value = '';
            document.getElementById('transactionPeriod').value = '';
            filterTransactions();
        });

        // Process payouts
        document.getElementById('processPayouts').addEventListener('click', () => {
            document.getElementById('payoutModal').classList.remove('hidden');
            document.getElementById('payoutModal').classList.add('flex');
        });

        document.getElementById('cancelPayout').addEventListener('click', () => {
            document.getElementById('payoutModal').classList.add('hidden');
            document.getElementById('payoutModal').classList.remove('flex');
        });

        document.getElementById('confirmPayout').addEventListener('click', () => {
            // Process all pending payouts
            payoutsData.forEach(payout => {
                if (payout.status === 'pending') {
                    payout.status = 'processing';
                }
            });

            renderPayouts();
            showSuccessMessage('Payouts processed successfully');

            document.getElementById('payoutModal').classList.add('hidden');
            document.getElementById('payoutModal').classList.remove('flex');
        });

        // Modal close
        document.getElementById('closeTransactionModal').addEventListener('click', () => {
            document.getElementById('transactionModal').classList.add('hidden');
            document.getElementById('transactionModal').classList.remove('flex');
        });
    }

    // Action functions
    window.viewTransaction = function(transactionId) {
        const transaction = transactionsData.find(t => t.id === transactionId);
        if (!transaction) return;

        const details = document.getElementById('transactionDetails');
        details.innerHTML = `
            <div class="space-y-6">
                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <h4 class="font-semibold text-gray-900 mb-3">Transaction Information</h4>
                        <div class="space-y-2 text-sm">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Transaction ID:</span>
                                <span class="font-medium">${transaction.id}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Amount:</span>
                                <span class="font-medium">$${transaction.amount.toFixed(2)}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Platform Fee:</span>
                                <span class="font-medium">$${transaction.fee.toFixed(2)}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Payment Method:</span>
                                <span class="font-medium">${transaction.paymentMethod}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Status:</span>
                                <span class="font-medium">${getStatusBadge(transaction.status)}</span>
                            </div>
                        </div>
                    </div>

                    <div>
                        <h4 class="font-semibold text-gray-900 mb-3">Customer Information</h4>
                        <div class="space-y-2 text-sm">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Name:</span>
                                <span class="font-medium">${transaction.customerName}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Email:</span>
                                <span class="font-medium">${transaction.customerEmail}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Event:</span>
                                <span class="font-medium">${transaction.eventTitle}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Date:</span>
                                <span class="font-medium">${formatDate(transaction.date)}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex justify-end space-x-3">
                    <button onclick="downloadReceipt('${transaction.id}')" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors">
                        Download Receipt
                    </button>
                    ${transaction.refundable ? `
                        <button onclick="processRefund('${transaction.id}')" class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition-colors">
                            Process Refund
                        </button>
                    ` : ''}
                </div>
            </div>
        `;

        document.getElementById('transactionModal').classList.remove('hidden');
        document.getElementById('transactionModal').classList.add('flex');
    };

    window.processRefund = function(transactionId) {
        if (confirm('Are you sure you want to process a refund for this transaction?')) {
            showSuccessMessage('Refund processed successfully');
        }
    };

    window.downloadReceipt = function(transactionId) {
        showSuccessMessage('Receipt download started');
    };

    window.processSinglePayout = function(payoutId) {
        const payout = payoutsData.find(p => p.id === payoutId);
        if (payout) {
            payout.status = 'processing';
            renderPayouts();
            showSuccessMessage('Payout processed successfully');
        }
    };

    window.viewPayoutDetails = function(payoutId) {
        showSuccessMessage('Payout details would be displayed here');
    };

    window.viewRefundDetails = function(refundId) {
        showSuccessMessage('Refund details would be displayed here');
    };

    window.approveRefund = function(refundId) {
        const refund = refundsData.find(r => r.id === refundId);
        if (refund) {
            refund.status = 'approved';
            renderRefunds();
            showSuccessMessage('Refund approved successfully');
        }
    };

    window.denyRefund = function(refundId) {
        if (confirm('Are you sure you want to deny this refund request?')) {
            const refund = refundsData.find(r => r.id === refundId);
            if (refund) {
                refund.status = 'denied';
                renderRefunds();
                showSuccessMessage('Refund denied');
            }
        }
    };

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
.financial-tab.active {
    color: #059669;
    border-bottom: 2px solid #059669;
}
</style>
@endpush
