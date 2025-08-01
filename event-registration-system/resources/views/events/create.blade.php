@extends('layouts.app')

@section('title', 'Create Event - EventPro')

@section('content')
<section class="py-5">
    <div class="container py-4">
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('events.index') }}">Events</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create Event</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-lg-8">
                <h2 class="fw-bold mb-4">Create a New Event</h2>

                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-4">
                                <label for="title" class="form-label fw-medium">Event Title <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                       id="title" name="title" value="{{ old('title') }}" required>
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <small class="text-muted">Choose a clear, descriptive title for your event.</small>
                            </div>

                            <div class="mb-4">
                                <label for="category" class="form-label fw-medium">Category <span class="text-danger">*</span></label>
                                <select class="form-select @error('category') is-invalid @enderror"
                                        id="category" name="category" required>
                                    <option value="">Select a category</option>
                                    <option value="tech" {{ old('category') == 'tech' ? 'selected' : '' }}>Technology</option>
                                    <option value="business" {{ old('category') == 'business' ? 'selected' : '' }}>Business</option>
                                    <option value="music" {{ old('category') == 'music' ? 'selected' : '' }}>Music</option>
                                    <option value="sports" {{ old('category') == 'sports' ? 'selected' : '' }}>Sports</option>
                                    <option value="arts" {{ old('category') == 'arts' ? 'selected' : '' }}>Arts</option>
                                    <option value="food" {{ old('category') == 'food' ? 'selected' : '' }}>Food & Drink</option>
                                    <option value="education" {{ old('category') == 'education' ? 'selected' : '' }}>Education</option>
                                    <option value="other" {{ old('category') == 'other' ? 'selected' : '' }}>Other</option>
                                </select>
                                @error('category')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="description" class="form-label fw-medium">Event Description <span class="text-danger">*</span></label>
                                <textarea class="form-control @error('description') is-invalid @enderror"
                                          id="description" name="description" rows="5" required>{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <small class="text-muted">Provide details about your event. What will attendees experience? What should they expect?</small>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-6 mb-3 mb-md-0">
                                    <label for="start_date" class="form-label fw-medium">Start Date <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control @error('start_date') is-invalid @enderror"
                                           id="start_date" name="start_date" value="{{ old('start_date') }}" required>
                                    @error('start_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="end_date" class="form-label fw-medium">End Date</label>
                                    <input type="date" class="form-control @error('end_date') is-invalid @enderror"
                                           id="end_date" name="end_date" value="{{ old('end_date') }}">
                                    @error('end_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <small class="text-muted">Leave empty for single-day events</small>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-6 mb-3 mb-md-0">
                                    <label for="start_time" class="form-label fw-medium">Start Time <span class="text-danger">*</span></label>
                                    <input type="time" class="form-control @error('start_time') is-invalid @enderror"
                                           id="start_time" name="start_time" value="{{ old('start_time') }}" required>
                                    @error('start_time')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="end_time" class="form-label fw-medium">End Time</label>
                                    <input type="time" class="form-control @error('end_time') is-invalid @enderror"
                                           id="end_time" name="end_time" value="{{ old('end_time') }}">
                                    @error('end_time')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="location" class="form-label fw-medium">Location <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('location') is-invalid @enderror"
                                       id="location" name="location" value="{{ old('location') }}" required>
                                @error('location')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <small class="text-muted">Enter the venue name or physical address</small>
                            </div>

                            <div class="mb-4">
                                <label for="address" class="form-label fw-medium">Full Address</label>
                                <textarea class="form-control @error('address') is-invalid @enderror"
                                          id="address" name="address" rows="2">{{ old('address') }}</textarea>
                                @error('address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-medium">Event Type <span class="text-danger">*</span></label>
                                <div class="d-flex">
                                    <div class="form-check me-4">
                                        <input class="form-check-input" type="radio" name="event_type" id="type_in_person"
                                               value="in_person" {{ old('event_type', 'in_person') == 'in_person' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="type_in_person">
                                            In Person
                                        </label>
                                    </div>
                                    <div class="form-check me-4">
                                        <input class="form-check-input" type="radio" name="event_type" id="type_online"
                                               value="online" {{ old('event_type') == 'online' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="type_online">
                                            Online
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="event_type" id="type_hybrid"
                                               value="hybrid" {{ old('event_type') == 'hybrid' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="type_hybrid">
                                            Hybrid
                                        </label>
                                    </div>
                                </div>
                                @error('event_type')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="image" class="form-label fw-medium">Event Banner Image</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror"
                                       id="image" name="image" accept="image/*">
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <small class="text-muted">Recommended size: 1920x1080px (16:9 ratio). Max file size: 5MB</small>
                            </div>

                            <hr class="my-4">

                            <h4 class="fw-bold mb-3">Ticket Information</h4>

                            <div class="mb-4">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch"
                                           id="has_tickets" name="has_tickets"
                                           {{ old('has_tickets') ? 'checked' : '' }}>
                                    <label class="form-check-label fw-medium" for="has_tickets">Enable Ticket Sales</label>
                                </div>
                                <small class="text-muted">Turn this on if you want to sell tickets for your event</small>
                            </div>

                            <div id="ticket-options" class="mb-4">
                                <div class="card bg-light border">
                                    <div class="card-body">
                                        <h5 class="card-title">Standard Ticket</h5>

                                        <div class="mb-3">
                                            <label for="ticket_price" class="form-label">Price ($) <span class="text-danger">*</span></label>
                                            <input type="number" class="form-control" id="ticket_price" name="ticket_price"
                                                   min="0" step="0.01" value="{{ old('ticket_price', '0.00') }}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="ticket_quantity" class="form-label">Available Quantity <span class="text-danger">*</span></label>
                                            <input type="number" class="form-control" id="ticket_quantity" name="ticket_quantity"
                                                   min="1" value="{{ old('ticket_quantity', '100') }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="text-end mt-2">
                                    <button type="button" class="btn btn-outline-primary btn-sm">
                                        <i class="fas fa-plus me-1"></i>Add More Ticket Types
                                    </button>
                                </div>
                            </div>

                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button type="button" class="btn btn-outline-secondary px-4">Save as Draft</button>
                                <button type="submit" class="btn btn-primary-custom px-4">Publish Event</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 mt-4 mt-lg-0">
                <div class="sticky-lg-top" style="top: 100px; z-index: 1;">
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-body p-4">
                            <h5 class="fw-bold mb-3">Event Creation Tips</h5>
                            <ul class="list-unstyled">
                                <li class="mb-3">
                                    <div class="d-flex">
                                        <div class="me-3 text-primary">
                                            <i class="fas fa-lightbulb"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-1 fw-bold">Create a Catchy Title</h6>
                                            <p class="text-muted small">Your title is the first thing potential attendees will see. Make it descriptive and engaging.</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="mb-3">
                                    <div class="d-flex">
                                        <div class="me-3 text-primary">
                                            <i class="fas fa-camera"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-1 fw-bold">Use High-Quality Images</h6>
                                            <p class="text-muted small">Events with great images attract 2x more attendees. Use professional photos when possible.</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="mb-3">
                                    <div class="d-flex">
                                        <div class="me-3 text-primary">
                                            <i class="fas fa-align-left"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-1 fw-bold">Detailed Description</h6>
                                            <p class="text-muted small">Be specific about what attendees will experience. Include agenda, speakers, or special activities.</p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex">
                                        <div class="me-3 text-primary">
                                            <i class="fas fa-ticket-alt"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-1 fw-bold">Set Clear Ticket Options</h6>
                                            <p class="text-muted small">Consider creating different ticket tiers (e.g., early bird, VIP) to appeal to different audiences.</p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-4 bg-light">
                            <h5 class="fw-bold mb-3">Need Help?</h5>
                            <p class="text-muted small">Our support team is available to assist you with creating and managing your events.</p>
                            <a href="#" class="btn btn-outline-primary btn-sm d-block">Contact Support</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
    #ticket-options {
        display: none;
    }
</style>
@endpush

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Toggle ticket options when checkbox is clicked
        const hasTicketsCheckbox = document.getElementById('has_tickets');
        const ticketOptions = document.getElementById('ticket-options');

        function toggleTicketOptions() {
            ticketOptions.style.display = hasTicketsCheckbox.checked ? 'block' : 'none';
        }

        // Initial state
        toggleTicketOptions();

        // Listen for changes
        hasTicketsCheckbox.addEventListener('change', toggleTicketOptions);
    });
</script>
@endpush
