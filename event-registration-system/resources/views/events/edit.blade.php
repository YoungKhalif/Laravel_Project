@extends('layouts.app')

@section('title', 'Edit Event - EventPro')

@section('content')
<section class="py-5">
    <div class="container py-4">
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('events.index') }}">Events</a></li>
                <li class="breadcrumb-item"><a href="{{ route('events.show', $event->id) }}">{{ $event->title }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-lg-8">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h2 class="fw-bold">Edit Event</h2>

                    <div>
                        <form action="{{ route('events.destroy', $event->id) }}" method="POST" class="d-inline" id="delete-event-form">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                <i class="fas fa-trash-alt me-2"></i>Delete
                            </button>
                        </form>
                    </div>
                </div>

                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <form action="{{ route('events.update', $event->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-4">
                                <label for="title" class="form-label fw-medium">Event Title <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                       id="title" name="title" value="{{ old('title', $event->title) }}" required>
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="category" class="form-label fw-medium">Category <span class="text-danger">*</span></label>
                                <select class="form-select @error('category') is-invalid @enderror"
                                        id="category" name="category" required>
                                    <option value="">Select a category</option>
                                    <option value="tech" {{ old('category', $event->category) == 'tech' ? 'selected' : '' }}>Technology</option>
                                    <option value="business" {{ old('category', $event->category) == 'business' ? 'selected' : '' }}>Business</option>
                                    <option value="music" {{ old('category', $event->category) == 'music' ? 'selected' : '' }}>Music</option>
                                    <option value="sports" {{ old('category', $event->category) == 'sports' ? 'selected' : '' }}>Sports</option>
                                    <option value="arts" {{ old('category', $event->category) == 'arts' ? 'selected' : '' }}>Arts</option>
                                    <option value="food" {{ old('category', $event->category) == 'food' ? 'selected' : '' }}>Food & Drink</option>
                                    <option value="education" {{ old('category', $event->category) == 'education' ? 'selected' : '' }}>Education</option>
                                    <option value="other" {{ old('category', $event->category) == 'other' ? 'selected' : '' }}>Other</option>
                                </select>
                                @error('category')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="description" class="form-label fw-medium">Event Description <span class="text-danger">*</span></label>
                                <textarea class="form-control @error('description') is-invalid @enderror"
                                          id="description" name="description" rows="5" required>{{ old('description', $event->description) }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-6 mb-3 mb-md-0">
                                    <label for="start_date" class="form-label fw-medium">Start Date <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control @error('start_date') is-invalid @enderror"
                                           id="start_date" name="start_date" value="{{ old('start_date', $event->start_date ? date('Y-m-d', strtotime($event->start_date)) : '') }}" required>
                                    @error('start_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="end_date" class="form-label fw-medium">End Date</label>
                                    <input type="date" class="form-control @error('end_date') is-invalid @enderror"
                                           id="end_date" name="end_date" value="{{ old('end_date', $event->end_date ? date('Y-m-d', strtotime($event->end_date)) : '') }}">
                                    @error('end_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-6 mb-3 mb-md-0">
                                    <label for="start_time" class="form-label fw-medium">Start Time <span class="text-danger">*</span></label>
                                    <input type="time" class="form-control @error('start_time') is-invalid @enderror"
                                           id="start_time" name="start_time" value="{{ old('start_time', $event->start_time ? date('H:i', strtotime($event->start_time)) : '') }}" required>
                                    @error('start_time')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="end_time" class="form-label fw-medium">End Time</label>
                                    <input type="time" class="form-control @error('end_time') is-invalid @enderror"
                                           id="end_time" name="end_time" value="{{ old('end_time', $event->end_time ? date('H:i', strtotime($event->end_time)) : '') }}">
                                    @error('end_time')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="location" class="form-label fw-medium">Location <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('location') is-invalid @enderror"
                                       id="location" name="location" value="{{ old('location', $event->location) }}" required>
                                @error('location')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="address" class="form-label fw-medium">Full Address</label>
                                <textarea class="form-control @error('address') is-invalid @enderror"
                                          id="address" name="address" rows="2">{{ old('address', $event->address) }}</textarea>
                                @error('address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-medium">Event Type <span class="text-danger">*</span></label>
                                <div class="d-flex">
                                    <div class="form-check me-4">
                                        <input class="form-check-input" type="radio" name="event_type" id="type_in_person"
                                               value="in_person" {{ old('event_type', $event->event_type) == 'in_person' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="type_in_person">
                                            In Person
                                        </label>
                                    </div>
                                    <div class="form-check me-4">
                                        <input class="form-check-input" type="radio" name="event_type" id="type_online"
                                               value="online" {{ old('event_type', $event->event_type) == 'online' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="type_online">
                                            Online
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="event_type" id="type_hybrid"
                                               value="hybrid" {{ old('event_type', $event->event_type) == 'hybrid' ? 'checked' : '' }}>
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

                                @if($event->image)
                                <div class="mb-3">
                                    <img src="{{ asset('storage/' . $event->image) }}" alt="Event Banner" class="img-thumbnail" style="max-height: 200px;">
                                    <div class="form-check mt-2">
                                        <input class="form-check-input" type="checkbox" id="delete_image" name="delete_image" value="1">
                                        <label class="form-check-label" for="delete_image">
                                            Remove current image
                                        </label>
                                    </div>
                                </div>
                                @endif

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
                                           {{ old('has_tickets', isset($event->ticket)) ? 'checked' : '' }}>
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
                                                   min="0" step="0.01" value="{{ old('ticket_price', $event->ticket->price ?? '0.00') }}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="ticket_quantity" class="form-label">Available Quantity <span class="text-danger">*</span></label>
                                            <input type="number" class="form-control" id="ticket_quantity" name="ticket_quantity"
                                                   min="1" value="{{ old('ticket_quantity', $event->ticket->quantity ?? '100') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <a href="{{ route('events.show', $event->id) }}" class="btn btn-outline-secondary px-4">Cancel</a>
                                <button type="submit" class="btn btn-primary-custom px-4">Update Event</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 mt-4 mt-lg-0">
                <div class="sticky-lg-top" style="top: 100px; z-index: 1;">
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-body p-4">
                            <h5 class="fw-bold mb-3">Event Status</h5>
                            <div class="d-flex align-items-center mb-3">
                                <div class="me-2">
                                    <span class="badge bg-success">Published</span>
                                </div>
                                <div>
                                    <small class="text-muted">Published on {{ date('M d, Y', strtotime($event->created_at ?? now())) }}</small>
                                </div>
                            </div>

                            <div class="mb-3">
                                <button type="button" class="btn btn-sm btn-outline-secondary d-flex align-items-center">
                                    <i class="far fa-eye me-2"></i>
                                    Preview Event
                                </button>
                            </div>

                            <div class="mb-3">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" id="event_active" {{ $event->is_active ?? true ? 'checked' : '' }}>
                                    <label class="form-check-label" for="event_active">Event Active</label>
                                </div>
                                <small class="text-muted">When turned off, users cannot register for this event</small>
                            </div>

                            <hr class="my-3">

                            <h5 class="fw-bold mb-3">Event Statistics</h5>
                            <div class="row">
                                <div class="col-6 mb-3">
                                    <div class="d-flex align-items-center">
                                        <div class="stat-icon bg-light text-primary me-2">
                                            <i class="fas fa-eye"></i>
                                        </div>
                                        <div>
                                            <div class="small text-muted">Views</div>
                                            <div class="fw-bold">237</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 mb-3">
                                    <div class="d-flex align-items-center">
                                        <div class="stat-icon bg-light text-success me-2">
                                            <i class="fas fa-ticket-alt"></i>
                                        </div>
                                        <div>
                                            <div class="small text-muted">Tickets Sold</div>
                                            <div class="fw-bold">42</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="d-flex align-items-center">
                                        <div class="stat-icon bg-light text-warning me-2">
                                            <i class="fas fa-chart-line"></i>
                                        </div>
                                        <div>
                                            <div class="small text-muted">Conversion</div>
                                            <div class="fw-bold">17.7%</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="d-flex align-items-center">
                                        <div class="stat-icon bg-light text-info me-2">
                                            <i class="fas fa-dollar-sign"></i>
                                        </div>
                                        <div>
                                            <div class="small text-muted">Revenue</div>
                                            <div class="fw-bold">$4,158</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-4">
                            <h5 class="fw-bold mb-3">Event Checklist</h5>
                            <div class="event-checklist">
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" id="check1" checked disabled>
                                    <label class="form-check-label" for="check1">Create event details</label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" id="check2" checked disabled>
                                    <label class="form-check-label" for="check2">Set up ticketing</label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" id="check3" disabled>
                                    <label class="form-check-label" for="check3">Add custom registration form</label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" id="check4" disabled>
                                    <label class="form-check-label" for="check4">Set up payment processing</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="check5" disabled>
                                    <label class="form-check-label" for="check5">Configure notifications</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="mb-0">Are you sure you want to delete this event? This action cannot be undone.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="confirmDelete">Delete Event</button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .stat-icon {
        width: 36px;
        height: 36px;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
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

        // Confirm delete
        const deleteButton = document.getElementById('confirmDelete');
        const deleteForm = document.getElementById('delete-event-form');

        deleteButton.addEventListener('click', function() {
            deleteForm.submit();
        });
    });
</script>
@endpush
