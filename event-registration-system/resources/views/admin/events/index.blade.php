@extends('layouts.app')

@section('title', 'Manage Events - EventPro Admin')

@section('content')
<x-admin-layout :pageTitle="'Manage Events'" :breadcrumbs="[
    ['name' => 'Dashboard', 'url' => route('admin.dashboard')],
    ['name' => 'Events', 'url' => null]
]">
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body p-0">
            <div class="d-flex justify-content-between align-items-center p-4">
                <h5 class="fw-semibold mb-0">Events Management</h5>
                <a href="{{ route('admin.events.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i> Create New Event
                </a>
            </div>

            <div class="event-filters px-4 pb-4">
                <div class="row g-3">
                    <div class="col-md-3">
                        <select class="form-select" id="filterStatus">
                            <option value="">All Statuses</option>
                            <option value="active">Active</option>
                            <option value="draft">Draft</option>
                            <option value="completed">Completed</option>
                            <option value="canceled">Canceled</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select class="form-select" id="filterCategory">
                            <option value="">All Categories</option>
                            <option value="music">Music</option>
                            <option value="business">Business</option>
                            <option value="technology">Technology</option>
                            <option value="arts">Arts</option>
                            <option value="sports">Sports</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search events...">
                            <button class="btn btn-outline-secondary" type="button">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-outline-primary w-100" type="button" id="advancedFilters">
                            <i class="fas fa-filter me-2"></i> Filters
                        </button>
                    </div>
                </div>

                <div class="advanced-filters mt-3 d-none">
                    <div class="card border-0 bg-light">
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <label class="form-label small fw-semibold">Date Range</label>
                                    <div class="input-group">
                                        <input type="date" class="form-control form-control-sm">
                                        <span class="input-group-text">to</span>
                                        <input type="date" class="form-control form-control-sm">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label small fw-semibold">Price Range</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control form-control-sm" placeholder="Min">
                                        <span class="input-group-text">to</span>
                                        <input type="number" class="form-control form-control-sm" placeholder="Max">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label small fw-semibold">Organizer</label>
                                    <select class="form-select form-select-sm">
                                        <option value="">All Organizers</option>
                                        <option value="1">TechCorp Inc</option>
                                        <option value="2">Music Events LLC</option>
                                        <option value="3">Business Network</option>
                                    </select>
                                </div>
                                <div class="col-md-2 d-flex align-items-end">
                                    <button class="btn btn-sm btn-primary w-100" type="button">
                                        Apply Filters
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-hover mb-0 align-middle">
                    <thead class="table-light">
                        <tr>
                            <th class="ps-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="selectAllEvents">
                                    <label class="form-check-label" for="selectAllEvents"></label>
                                </div>
                            </th>
                            <th>Event</th>
                            <th>Date & Time</th>
                            <th>Location</th>
                            <th>Status</th>
                            <th>Tickets</th>
                            <th>Revenue</th>
                            <th class="text-end pe-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Event 1 -->
                        <tr>
                            <td class="ps-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1">
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="event-img me-3" style="background-image: url('https://images.unsplash.com/photo-1501281668745-f7f57925c3b4?ixlib=rb-4.0.3&auto=format&fit=crop&w=1740&q=80');"></div>
                                    <div>
                                        <div class="fw-semibold">Tech Conference 2025</div>
                                        <div class="text-muted small">By TechCorp Inc.</div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div>Aug 15, 2025</div>
                                <div class="text-muted small">9:00 AM - 5:00 PM</div>
                            </td>
                            <td>
                                <div>San Francisco Convention Center</div>
                                <div class="text-muted small">San Francisco, CA</div>
                            </td>
                            <td>
                                <span class="badge bg-success">Active</span>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="me-2">125 / 500</div>
                                    <div class="progress flex-grow-1" style="height: 6px; width: 80px">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 25%"></div>
                                    </div>
                                </div>
                            </td>
                            <td>$12,540</td>
                            <td>
                                <div class="d-flex justify-content-end pe-4">
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-secondary" type="button" data-bs-toggle="dropdown">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a class="dropdown-item" href="{{ route('admin.events.edit', 1) }}"><i class="fas fa-edit me-2"></i> Edit</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="fas fa-eye me-2"></i> View</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="fas fa-chart-bar me-2"></i> Analytics</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-success" href="#"><i class="fas fa-ticket-alt me-2"></i> Manage Tickets</a></li>
                                            <li><a class="dropdown-item text-warning" href="#"><i class="fas fa-copy me-2"></i> Duplicate</a></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="fas fa-trash me-2"></i> Delete</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </td>
                        </tr>

                        <!-- Event 2 -->
                        <tr>
                            <td class="ps-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="2">
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="event-img me-3" style="background-image: url('https://images.unsplash.com/photo-1470229722913-7c0e2dbbafd3?ixlib=rb-4.0.3&auto=format&fit=crop&w=1740&q=80');"></div>
                                    <div>
                                        <div class="fw-semibold">Music Festival 2025</div>
                                        <div class="text-muted small">By Music Events LLC</div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div>Sep 05-07, 2025</div>
                                <div class="text-muted small">All day</div>
                            </td>
                            <td>
                                <div>Sunset Park Amphitheater</div>
                                <div class="text-muted small">Los Angeles, CA</div>
                            </td>
                            <td>
                                <span class="badge bg-success">Active</span>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="me-2">247 / 1000</div>
                                    <div class="progress flex-grow-1" style="height: 6px; width: 80px">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 24.7%"></div>
                                    </div>
                                </div>
                            </td>
                            <td>$24,750</td>
                            <td>
                                <div class="d-flex justify-content-end pe-4">
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-secondary" type="button" data-bs-toggle="dropdown">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a class="dropdown-item" href="{{ route('admin.events.edit', 2) }}"><i class="fas fa-edit me-2"></i> Edit</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="fas fa-eye me-2"></i> View</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="fas fa-chart-bar me-2"></i> Analytics</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-success" href="#"><i class="fas fa-ticket-alt me-2"></i> Manage Tickets</a></li>
                                            <li><a class="dropdown-item text-warning" href="#"><i class="fas fa-copy me-2"></i> Duplicate</a></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="fas fa-trash me-2"></i> Delete</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </td>
                        </tr>

                        <!-- Event 3 -->
                        <tr>
                            <td class="ps-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="3">
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="event-img me-3" style="background-image: url('https://images.unsplash.com/photo-1515169067868-5387ec356754?ixlib=rb-4.0.3&auto=format&fit=crop&w=1740&q=80');"></div>
                                    <div>
                                        <div class="fw-semibold">Business Summit 2025</div>
                                        <div class="text-muted small">By Business Network</div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div>Oct 12-13, 2025</div>
                                <div class="text-muted small">8:00 AM - 4:00 PM</div>
                            </td>
                            <td>
                                <div>Hilton Conference Center</div>
                                <div class="text-muted small">New York, NY</div>
                            </td>
                            <td>
                                <span class="badge bg-warning">Draft</span>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="me-2">0 / 300</div>
                                    <div class="progress flex-grow-1" style="height: 6px; width: 80px">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 0%"></div>
                                    </div>
                                </div>
                            </td>
                            <td>$0</td>
                            <td>
                                <div class="d-flex justify-content-end pe-4">
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-secondary" type="button" data-bs-toggle="dropdown">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a class="dropdown-item" href="{{ route('admin.events.edit', 3) }}"><i class="fas fa-edit me-2"></i> Edit</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="fas fa-eye me-2"></i> View</a></li>
                                            <li><a class="dropdown-item text-primary" href="#"><i class="fas fa-paper-plane me-2"></i> Publish</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-success" href="#"><i class="fas fa-ticket-alt me-2"></i> Manage Tickets</a></li>
                                            <li><a class="dropdown-item text-warning" href="#"><i class="fas fa-copy me-2"></i> Duplicate</a></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="fas fa-trash me-2"></i> Delete</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </td>
                        </tr>

                        <!-- Event 4 -->
                        <tr>
                            <td class="ps-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="4">
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="event-img me-3" style="background-image: url('https://images.unsplash.com/photo-1540575467063-178a50c2df87?ixlib=rb-4.0.3&auto=format&fit=crop&w=2000&q=80');"></div>
                                    <div>
                                        <div class="fw-semibold">Art Exhibition</div>
                                        <div class="text-muted small">By Arts Foundation</div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div>Nov 22-30, 2025</div>
                                <div class="text-muted small">10:00 AM - 8:00 PM</div>
                            </td>
                            <td>
                                <div>Metropolitan Art Gallery</div>
                                <div class="text-muted small">Chicago, IL</div>
                            </td>
                            <td>
                                <span class="badge bg-info">Upcoming</span>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="me-2">32 / 200</div>
                                    <div class="progress flex-grow-1" style="height: 6px; width: 80px">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 16%"></div>
                                    </div>
                                </div>
                            </td>
                            <td>$3,250</td>
                            <td>
                                <div class="d-flex justify-content-end pe-4">
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-secondary" type="button" data-bs-toggle="dropdown">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a class="dropdown-item" href="{{ route('admin.events.edit', 4) }}"><i class="fas fa-edit me-2"></i> Edit</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="fas fa-eye me-2"></i> View</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="fas fa-chart-bar me-2"></i> Analytics</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-success" href="#"><i class="fas fa-ticket-alt me-2"></i> Manage Tickets</a></li>
                                            <li><a class="dropdown-item text-warning" href="#"><i class="fas fa-copy me-2"></i> Duplicate</a></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="fas fa-trash me-2"></i> Delete</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </td>
                        </tr>

                        <!-- Event 5 -->
                        <tr>
                            <td class="ps-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="5">
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="event-img me-3" style="background-image: url('https://images.unsplash.com/photo-1560520653-9e0e4c89eb11?ixlib=rb-4.0.3&auto=format&fit=crop&w=1572&q=80');"></div>
                                    <div>
                                        <div class="fw-semibold">Sports Tournament</div>
                                        <div class="text-muted small">By Sports Association</div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div>Mar 18-20, 2025</div>
                                <div class="text-muted small">9:00 AM - 6:00 PM</div>
                            </td>
                            <td>
                                <div>City Sports Arena</div>
                                <div class="text-muted small">Dallas, TX</div>
                            </td>
                            <td>
                                <span class="badge bg-secondary">Completed</span>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="me-2">450 / 450</div>
                                    <div class="progress flex-grow-1" style="height: 6px; width: 80px">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%"></div>
                                    </div>
                                </div>
                            </td>
                            <td>$22,500</td>
                            <td>
                                <div class="d-flex justify-content-end pe-4">
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-secondary" type="button" data-bs-toggle="dropdown">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a class="dropdown-item" href="#"><i class="fas fa-eye me-2"></i> View</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="fas fa-chart-bar me-2"></i> Analytics</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="fas fa-file-alt me-2"></i> Report</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-warning" href="#"><i class="fas fa-copy me-2"></i> Duplicate</a></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="fas fa-archive me-2"></i> Archive</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-between align-items-center p-4">
                <div class="bulk-actions d-flex align-items-center">
                    <div class="me-3 text-muted small">5 items selected</div>
                    <div class="btn-group">
                        <button class="btn btn-sm btn-outline-primary">Publish</button>
                        <button class="btn btn-sm btn-outline-warning">Duplicate</button>
                        <button class="btn btn-sm btn-outline-danger">Delete</button>
                    </div>
                </div>

                <nav aria-label="Events pagination">
                    <ul class="pagination pagination-sm mb-0">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                                <i class="fas fa-chevron-left small"></i>
                            </a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">
                                <i class="fas fa-chevron-right small"></i>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</x-admin-layout>
@endsection

@push('styles')
<style>
    .event-img {
        width: 48px;
        height: 48px;
        background-size: cover;
        background-position: center;
        border-radius: 8px;
    }

    .bulk-actions {
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .bulk-actions.active {
        opacity: 1;
    }
</style>
@endpush

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Toggle advanced filters
        const advancedFiltersBtn = document.getElementById('advancedFilters');
        const advancedFiltersSection = document.querySelector('.advanced-filters');

        advancedFiltersBtn.addEventListener('click', function() {
            advancedFiltersSection.classList.toggle('d-none');
        });

        // Handle checkbox selection
        const selectAllCheckbox = document.getElementById('selectAllEvents');
        const eventCheckboxes = document.querySelectorAll('tbody .form-check-input');
        const bulkActions = document.querySelector('.bulk-actions');

        selectAllCheckbox.addEventListener('change', function() {
            const isChecked = this.checked;

            eventCheckboxes.forEach(checkbox => {
                checkbox.checked = isChecked;
            });

            updateBulkActionsVisibility();
        });

        eventCheckboxes.forEach(checkbox => {
            checkbox.addEventListener('change', updateBulkActionsVisibility);
        });

        function updateBulkActionsVisibility() {
            const checkedBoxes = document.querySelectorAll('tbody .form-check-input:checked');

            if (checkedBoxes.length > 0) {
                bulkActions.classList.add('active');
            } else {
                bulkActions.classList.remove('active');
            }
        }
    });
</script>
@endpush
