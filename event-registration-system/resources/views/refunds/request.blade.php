@extends('layouts.app')

@section('title', 'Request Refund - EventSmart')

@section('content')
<div class="min-h-screen bg-gray-50 py-8">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-3xl">
        <div class="bg-white rounded-xl shadow-sm overflow-hidden">
            <div class="p-6 sm:p-8">
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <h1 class="text-2xl font-bold text-gray-900">Request a Refund</h1>
                        <p class="mt-1 text-gray-600">For ticket to {{ $ticket->event->title }}</p>
                    </div>
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium
                        {{ $ticket->event->refund_policy === 'flexible' ? 'bg-green-100 text-green-800' :
                           ($ticket->event->refund_policy === 'moderate' ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800') }}">
                        {{ ucfirst($ticket->event->refund_policy) }} Refund Policy
                    </span>
                </div>

                <!-- Ticket Details -->
                <div class="bg-gray-50 rounded-lg p-4 mb-6">
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <p class="text-sm text-gray-500">Order Number</p>
                            <p class="font-medium text-gray-900">#{{ $ticket->order_number }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Purchase Date</p>
                            <p class="font-medium text-gray-900">{{ $ticket->created_at->format('M d, Y') }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Ticket Type</p>
                            <p class="font-medium text-gray-900">{{ $ticket->type }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Amount Paid</p>
                            <p class="font-medium text-gray-900">${{ number_format($ticket->price, 2) }}</p>
                        </div>
                    </div>
                </div>

                <!-- Refund Policy -->
                <div class="bg-blue-50 border-l-4 border-blue-400 p-4 mb-6">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <i class="fas fa-info-circle text-blue-400"></i>
                        </div>
                        <div class="ml-3">
                            <h3 class="text-sm font-medium text-blue-800">Refund Policy Details</h3>
                            <div class="mt-2 text-sm text-blue-700">
                                @if($ticket->event->refund_policy === 'flexible')
                                    <p>Full refund available up to 24 hours before the event.</p>
                                @elseif($ticket->event->refund_policy === 'moderate')
                                    <p>Full refund available up to 7 days before the event. 50% refund between 7 days and 24 hours before the event.</p>
                                @else
                                    <p>Refunds only available in exceptional circumstances. Please contact support for assistance.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Refund Form -->
                <form method="POST" action="{{ route('refunds.store') }}" class="space-y-6">
                    @csrf
                    <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">

                    <!-- Refund Reason -->
                    <div>
                        <label for="reason" class="block text-sm font-medium text-gray-700">Reason for Refund</label>
                        <select id="reason" name="reason" required
                            class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-purple-500 focus:border-purple-500 rounded-md">
                            <option value="">Select a reason</option>
                            <option value="schedule_conflict">Schedule Conflict</option>
                            <option value="cant_attend">Can't Attend</option>
                            <option value="event_changed">Event Details Changed</option>
                            <option value="duplicate_purchase">Duplicate Purchase</option>
                            <option value="other">Other</option>
                        </select>
                        @error('reason')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Detailed Explanation -->
                    <div>
                        <label for="explanation" class="block text-sm font-medium text-gray-700">
                            Detailed Explanation
                            <span class="text-gray-400">(Required for 'Other' reason)</span>
                        </label>
                        <textarea id="explanation" name="explanation" rows="4"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-purple-500 focus:border-purple-500"
                            placeholder="Please provide additional details about your refund request...">{{ old('explanation') }}</textarea>
                        @error('explanation')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Supporting Documents -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Supporting Documents (Optional)</label>
                        <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                            <div class="space-y-1 text-center">
                                <i class="fas fa-file-upload text-gray-400 text-3xl mb-3"></i>
                                <div class="flex text-sm text-gray-600">
                                    <label for="documents" class="relative cursor-pointer bg-white rounded-md font-medium text-purple-600 hover:text-purple-500">
                                        <span>Upload files</span>
                                        <input id="documents" name="documents[]" type="file" class="sr-only" multiple>
                                    </label>
                                    <p class="pl-1">or drag and drop</p>
                                </div>
                                <p class="text-xs text-gray-500">PDF, DOC up to 10MB each</p>
                            </div>
                        </div>
                    </div>

                    <!-- Terms Agreement -->
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input id="terms" name="terms" type="checkbox" required
                                class="h-4 w-4 text-purple-600 focus:ring-purple-500 border-gray-300 rounded">
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="terms" class="font-medium text-gray-700">I understand and agree to the refund policy</label>
                            <p class="text-gray-500">By submitting this request, you acknowledge that it will be processed according to the event's refund policy.</p>
                        </div>
                    </div>

                    <div class="flex items-center justify-between pt-6 border-t">
                        <button type="button" onclick="window.history.back()"
                            class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                            <i class="fas fa-arrow-left mr-2"></i>
                            Go Back
                        </button>
                        <button type="submit"
                            class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-purple-600 hover:bg-purple-700">
                            <i class="fas fa-paper-plane mr-2"></i>
                            Submit Refund Request
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.getElementById('reason').addEventListener('change', function() {
    const explanation = document.getElementById('explanation');
    if (this.value === 'other') {
        explanation.required = true;
        explanation.parentElement.querySelector('label span').classList.remove('text-gray-400');
        explanation.parentElement.querySelector('label span').classList.add('text-red-500');
    } else {
        explanation.required = false;
        explanation.parentElement.querySelector('label span').classList.add('text-gray-400');
        explanation.parentElement.querySelector('label span').classList.remove('text-red-500');
    }
});

// File upload preview
const documentsInput = document.getElementById('documents');
documentsInput.addEventListener('change', function(e) {
    const files = Array.from(e.target.files);
    const container = this.closest('div').querySelector('p');
    container.textContent = files.length > 0
        ? `${files.length} file${files.length === 1 ? '' : 's'} selected`
        : 'PDF, DOC up to 10MB each';
});
</script>
@endpush
