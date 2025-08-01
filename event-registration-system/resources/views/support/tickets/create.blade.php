@extends('layouts.app')

@section('title', 'Create Support Ticket - EventSmart')

@section('content')
<div class="min-h-screen bg-gray-50 py-8">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-3xl">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-2xl font-bold text-gray-900">Create Support Ticket</h1>
            <p class="mt-1 text-gray-600">Submit a new support request</p>
        </div>

        <!-- Ticket Form -->
        <div class="bg-white rounded-xl shadow-sm overflow-hidden">
            <div class="p-6">
                <form method="POST" action="{{ route('support.tickets.store') }}" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    <!-- Subject -->
                    <div>
                        <label for="subject" class="block text-sm font-medium text-gray-700">Subject</label>
                        <input type="text" name="subject" id="subject"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500"
                            placeholder="Brief description of the issue">
                    </div>

                    <!-- Category -->
                    <div>
                        <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                        <select name="category" id="category"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500">
                            <option value="">Select a category</option>
                            <option value="technical">Technical Issue</option>
                            <option value="billing">Billing</option>
                            <option value="account">Account</option>
                            <option value="event">Event Management</option>
                            <option value="refund">Refund Request</option>
                            <option value="other">Other</option>
                        </select>
                    </div>

                    <!-- Priority -->
                    <div>
                        <label for="priority" class="block text-sm font-medium text-gray-700">Priority</label>
                        <select name="priority" id="priority"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500">
                            <option value="low">Low - General question or non-urgent issue</option>
                            <option value="medium">Medium - Issue affecting functionality</option>
                            <option value="high">High - Serious problem needing quick attention</option>
                            <option value="urgent">Urgent - Critical issue requiring immediate response</option>
                        </select>
                    </div>

                    <!-- Related Event -->
                    <div>
                        <label for="event_id" class="block text-sm font-medium text-gray-700">Related Event (Optional)</label>
                        <select name="event_id" id="event_id"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500">
                            <option value="">Select an event</option>
                            @foreach(range(1, 5) as $i)
                                <option value="{{ $i }}">Event {{ $i }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Description -->
                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                        <div class="mt-1">
                            <textarea name="description" id="description" rows="5"
                                class="block w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500"
                                placeholder="Please provide as much detail as possible"></textarea>
                        </div>
                        <p class="mt-2 text-sm text-gray-500">
                            Include any relevant details that might help us resolve your issue faster.
                        </p>
                    </div>

                    <!-- Attachments -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Attachments</label>
                        <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                            <div class="space-y-1 text-center">
                                <i class="fas fa-cloud-upload-alt text-gray-400 text-3xl mb-3"></i>
                                <div class="flex text-sm text-gray-600">
                                    <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-purple-600 hover:text-purple-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-purple-500">
                                        <span>Upload files</span>
                                        <input id="file-upload" name="attachments[]" type="file" class="sr-only" multiple>
                                    </label>
                                    <p class="pl-1">or drag and drop</p>
                                </div>
                                <p class="text-xs text-gray-500">
                                    PNG, JPG, PDF up to 10MB each
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Submit -->
                    <div class="flex items-center justify-end space-x-4">
                        <a href="{{ route('support.tickets.index') }}"
                            class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                            Cancel
                        </a>
                        <button type="submit"
                            class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                            <i class="fas fa-paper-plane mr-2"></i>
                            Submit Ticket
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Help Section -->
        <div class="mt-8 bg-white rounded-xl shadow-sm overflow-hidden">
            <div class="p-6">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Before submitting a ticket</h3>
                <div class="space-y-4">
                    <div class="flex">
                        <i class="fas fa-search text-purple-500 mt-1 mr-4"></i>
                        <div>
                            <h4 class="text-sm font-medium text-gray-900">Check our Knowledge Base</h4>
                            <p class="mt-1 text-sm text-gray-500">
                                You might find an immediate solution to your issue in our documentation.
                            </p>
                        </div>
                    </div>
                    <div class="flex">
                        <i class="fas fa-clock text-purple-500 mt-1 mr-4"></i>
                        <div>
                            <h4 class="text-sm font-medium text-gray-900">Response Times</h4>
                            <p class="mt-1 text-sm text-gray-500">
                                We typically respond within 24 hours. Urgent issues are prioritized.
                            </p>
                        </div>
                    </div>
                    <div class="flex">
                        <i class="fas fa-info-circle text-purple-500 mt-1 mr-4"></i>
                        <div>
                            <h4 class="text-sm font-medium text-gray-900">Provide Details</h4>
                            <p class="mt-1 text-sm text-gray-500">
                                The more information you provide, the faster we can help resolve your issue.
                            </p>
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
    // Handle file upload display
    const fileInput = document.getElementById('file-upload');
    const uploadText = document.querySelector('.text-center');

    fileInput.addEventListener('change', function(e) {
        const fileCount = e.target.files.length;
        if (fileCount > 0) {
            uploadText.innerHTML = `
                <i class="fas fa-check-circle text-green-500 text-3xl mb-3"></i>
                <p class="text-sm text-gray-600">${fileCount} file(s) selected</p>
                <button type="button" class="mt-2 text-xs text-red-500 hover:text-red-700" onclick="clearFiles()">
                    Remove files
                </button>
            `;
        }
    });

    function clearFiles() {
        fileInput.value = '';
        uploadText.innerHTML = `
            <i class="fas fa-cloud-upload-alt text-gray-400 text-3xl mb-3"></i>
            <div class="flex text-sm text-gray-600">
                <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-purple-600 hover:text-purple-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-purple-500">
                    <span>Upload files</span>
                    <input id="file-upload" name="attachments[]" type="file" class="sr-only" multiple>
                </label>
                <p class="pl-1">or drag and drop</p>
            </div>
            <p class="text-xs text-gray-500">
                PNG, JPG, PDF up to 10MB each
            </p>
        `;
    }
</script>
@endpush
