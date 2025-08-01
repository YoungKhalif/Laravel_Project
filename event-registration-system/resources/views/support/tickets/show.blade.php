@extends('layouts.app')

@section('title', 'Support Ticket Details - EventSmart')

@section('content')
<div class="min-h-screen bg-gray-50 py-8">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-4xl">
        <!-- Breadcrumb -->
        <nav class="flex mb-8" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('support.tickets.index') }}" class="text-gray-500 hover:text-gray-700">
                        <i class="fas fa-ticket-alt mr-2"></i>
                        Support Tickets
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                        <span class="text-gray-500">Ticket #12345</span>
                    </div>
                </li>
            </ol>
        </nav>

        <!-- Ticket Header -->
        <div class="bg-white rounded-xl shadow-sm overflow-hidden mb-6">
            <div class="p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-2xl font-bold text-gray-900">Payment Issue with Event Registration</h1>
                        <div class="mt-2 flex items-center space-x-4">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                <i class="fas fa-clock mr-1"></i>
                                In Progress
                            </span>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-orange-100 text-orange-800">
                                <i class="fas fa-exclamation-circle mr-1"></i>
                                High Priority
                            </span>
                            <span class="text-sm text-gray-500">
                                <i class="far fa-calendar mr-1"></i>
                                Opened on July 28, 2025
                            </span>
                        </div>
                    </div>
                    <div class="flex items-center space-x-3">
                        <button type="button" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">
                            <i class="fas fa-print mr-2"></i>
                            Print
                        </button>
                        <button type="button" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-purple-600 hover:bg-purple-700">
                            <i class="fas fa-check-circle mr-2"></i>
                            Resolve Ticket
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-3 gap-6">
            <!-- Ticket Thread -->
            <div class="col-span-2 space-y-6">
                <!-- Original Message -->
                <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                    <div class="p-6">
                        <div class="flex items-start space-x-3">
                            <div class="flex-shrink-0">
                                <img class="h-10 w-10 rounded-full" src="https://ui-avatars.com/api/?name=John+Doe&background=6366f1&color=fff" alt="John Doe">
                            </div>
                            <div class="flex-1">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <h3 class="text-sm font-medium text-gray-900">John Doe</h3>
                                        <p class="text-sm text-gray-500">Customer</p>
                                    </div>
                                    <time class="text-sm text-gray-500">July 28, 2025 at 10:30 AM</time>
                                </div>
                                <div class="mt-2 text-sm text-gray-700 space-y-4">
                                    <p>
                                        I'm having issues with the payment processing for the Tech Conference registration.
                                        The transaction was declined but the amount was still deducted from my account.
                                    </p>
                                    <p>
                                        Transaction ID: TXN-123456789
                                        <br>
                                        Event: Tech Conference 2025
                                        <br>
                                        Amount: $199.00
                                    </p>
                                </div>
                                <!-- Attachments -->
                                <div class="mt-4">
                                    <div class="flex items-center space-x-3 text-sm">
                                        <a href="#" class="inline-flex items-center px-3 py-1 border border-gray-300 rounded text-gray-700 bg-white hover:bg-gray-50">
                                            <i class="fas fa-paperclip mr-2"></i>
                                            payment_screenshot.png
                                        </a>
                                        <a href="#" class="inline-flex items-center px-3 py-1 border border-gray-300 rounded text-gray-700 bg-white hover:bg-gray-50">
                                            <i class="fas fa-file-pdf mr-2"></i>
                                            bank_statement.pdf
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Support Response -->
                <div class="bg-purple-50 rounded-xl shadow-sm overflow-hidden">
                    <div class="p-6">
                        <div class="flex items-start space-x-3">
                            <div class="flex-shrink-0">
                                <img class="h-10 w-10 rounded-full" src="https://ui-avatars.com/api/?name=Support+Team&background=6366f1&color=fff" alt="Support Team">
                            </div>
                            <div class="flex-1">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <h3 class="text-sm font-medium text-gray-900">Support Team</h3>
                                        <p class="text-sm text-gray-500">Customer Support</p>
                                    </div>
                                    <time class="text-sm text-gray-500">July 28, 2025 at 11:15 AM</time>
                                </div>
                                <div class="mt-2 text-sm text-gray-700 space-y-4">
                                    <p>
                                        Hello John,
                                    </p>
                                    <p>
                                        Thank you for bringing this to our attention. I can see that the transaction was declined
                                        due to a temporary gateway issue. I've checked with our payment processor and can confirm
                                        that the amount should be returned to your account within 24-48 hours.
                                    </p>
                                    <p>
                                        In the meantime, I've gone ahead and manually confirmed your registration for the Tech Conference.
                                        You should receive a confirmation email shortly.
                                    </p>
                                    <p>
                                        Please let me know if you have any questions or if there's anything else I can help with.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Reply Box -->
                <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                    <div class="p-6">
                        <h3 class="text-sm font-medium text-gray-900 mb-4">Add Reply</h3>
                        <form>
                            <div class="space-y-4">
                                <div>
                                    <textarea rows="4"
                                        class="block w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500"
                                        placeholder="Type your message here..."></textarea>
                                </div>
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center space-x-4">
                                        <button type="button"
                                            class="inline-flex items-center px-3 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded text-gray-700 bg-white hover:bg-gray-50">
                                            <i class="fas fa-paperclip mr-2"></i>
                                            Attach Files
                                        </button>
                                        <button type="button"
                                            class="inline-flex items-center px-3 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded text-gray-700 bg-white hover:bg-gray-50">
                                            <i class="fas fa-smile mr-2"></i>
                                            Add Emoji
                                        </button>
                                    </div>
                                    <button type="submit"
                                        class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-purple-600 hover:bg-purple-700">
                                        <i class="fas fa-paper-plane mr-2"></i>
                                        Send Reply
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Ticket Info Sidebar -->
            <div class="space-y-6">
                <!-- Ticket Details -->
                <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-200">
                        <h3 class="text-sm font-medium text-gray-900">Ticket Details</h3>
                    </div>
                    <div class="px-6 py-4">
                        <dl class="space-y-4">
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Ticket ID</dt>
                                <dd class="mt-1 text-sm text-gray-900">#12345</dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Category</dt>
                                <dd class="mt-1 text-sm text-gray-900">Payment & Billing</dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Related Event</dt>
                                <dd class="mt-1 text-sm text-purple-600">
                                    <a href="#" class="hover:text-purple-500">Tech Conference 2025</a>
                                </dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Last Updated</dt>
                                <dd class="mt-1 text-sm text-gray-900">45 minutes ago</dd>
                            </div>
                        </dl>
                    </div>
                </div>

                <!-- Customer Info -->
                <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-200">
                        <h3 class="text-sm font-medium text-gray-900">Customer Information</h3>
                    </div>
                    <div class="px-6 py-4">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <img class="h-12 w-12 rounded-full" src="https://ui-avatars.com/api/?name=John+Doe&background=6366f1&color=fff" alt="John Doe">
                            </div>
                            <div class="ml-4">
                                <h4 class="text-sm font-medium text-gray-900">John Doe</h4>
                                <p class="text-sm text-gray-500">john.doe@example.com</p>
                            </div>
                        </div>
                        <dl class="mt-4 space-y-4">
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Account Status</dt>
                                <dd class="mt-1">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                        Active
                                    </span>
                                </dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Member Since</dt>
                                <dd class="mt-1 text-sm text-gray-900">January 15, 2025</dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Previous Tickets</dt>
                                <dd class="mt-1 text-sm text-gray-900">3 tickets</dd>
                            </div>
                        </dl>
                    </div>
                </div>

                <!-- Internal Notes -->
                <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-200">
                        <h3 class="text-sm font-medium text-gray-900">Internal Notes</h3>
                    </div>
                    <div class="p-6">
                        <form>
                            <textarea rows="3"
                                class="block w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500 text-sm"
                                placeholder="Add an internal note..."></textarea>
                            <div class="mt-3 text-right">
                                <button type="submit"
                                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-gray-600 hover:bg-gray-700">
                                    Add Note
                                </button>
                            </div>
                        </form>
                        <div class="mt-4 space-y-4">
                            <div class="text-sm">
                                <div class="flex justify-between text-gray-500">
                                    <span>Added by Support Team</span>
                                    <span>2 hours ago</span>
                                </div>
                                <p class="mt-1 text-gray-700">
                                    Customer has been refunded and registration has been confirmed.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
