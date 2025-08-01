@extends('layouts.app')

@section('title', 'Manage Users - EventPro Admin')

@section('content')
<x-admin-layout :pageTitle="'Manage Users'" :breadcrumbs="[
    ['name' => 'Dashboard', 'url' => route('admin.dashboard')],
    ['name' => 'Users', 'url' => null]
]">
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body p-0">
            <div class="d-flex justify-content-between align-items-center p-4">
                <h5 class="fw-semibold mb-0">Users Management</h5>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUserModal">
                    <i class="fas fa-plus me-2"></i> Add New User
                </button>
            </div>

            <div class="user-filters px-4 pb-4">
                <div class="row g-3">
                    <div class="col-md-3">
                        <select class="form-select" id="filterRole">
                            <option value="">All Roles</option>
                            <option value="admin">Administrator</option>
                            <option value="organizer">Organizer</option>
                            <option value="user">Standard User</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select class="form-select" id="filterStatus">
                            <option value="">All Statuses</option>
                            <option value="active">Active</option>
                            <option value="suspended">Suspended</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search users...">
                            <button class="btn btn-outline-secondary" type="button">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-outline-primary w-100" type="button" id="userAdvancedFilters">
                            <i class="fas fa-filter me-2"></i> Filters
                        </button>
                    </div>
                </div>

                <div class="user-advanced-filters mt-3 d-none">
                    <div class="card border-0 bg-light">
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-md-3">
                                    <label class="form-label small fw-semibold">Registration Date</label>
                                    <div class="input-group">
                                        <input type="date" class="form-control form-control-sm">
                                        <span class="input-group-text">to</span>
                                        <input type="date" class="form-control form-control-sm">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label small fw-semibold">Last Login</label>
                                    <div class="input-group">
                                        <input type="date" class="form-control form-control-sm">
                                        <span class="input-group-text">to</span>
                                        <input type="date" class="form-control form-control-sm">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label small fw-semibold">Tickets Purchased</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control form-control-sm" placeholder="Min">
                                        <span class="input-group-text">to</span>
                                        <input type="number" class="form-control form-control-sm" placeholder="Max">
                                    </div>
                                </div>
                                <div class="col-md-3 d-flex align-items-end">
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
                                    <input class="form-check-input" type="checkbox" value="" id="selectAllUsers">
                                    <label class="form-check-label" for="selectAllUsers"></label>
                                </div>
                            </th>
                            <th>User</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Registered</th>
                            <th>Last Login</th>
                            <th class="text-end pe-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- User 1 -->
                        <tr>
                            <td class="ps-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1">
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="user-avatar me-3 bg-primary">JD</div>
                                    <div>
                                        <div class="fw-semibold">John Doe</div>
                                        <div class="text-muted small">ID: #1001</div>
                                    </div>
                                </div>
                            </td>
                            <td>john.doe@example.com</td>
                            <td>
                                <span class="badge bg-primary-subtle text-primary">Administrator</span>
                            </td>
                            <td>
                                <span class="badge bg-success">Active</span>
                            </td>
                            <td>
                                <div>Jan 15, 2025</div>
                                <div class="text-muted small">2 months ago</div>
                            </td>
                            <td>
                                <div>Today</div>
                                <div class="text-muted small">10:45 AM</div>
                            </td>
                            <td>
                                <div class="d-flex justify-content-end pe-4">
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-secondary" type="button" data-bs-toggle="dropdown">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a class="dropdown-item" href="{{ route('admin.users.edit', 1) }}"><i class="fas fa-user-edit me-2"></i> Edit</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="fas fa-eye me-2"></i> View</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="fas fa-lock me-2"></i> Change Password</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-warning" href="#"><i class="fas fa-ban me-2"></i> Suspend</a></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="fas fa-trash me-2"></i> Delete</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </td>
                        </tr>

                        <!-- User 2 -->
                        <tr>
                            <td class="ps-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="2">
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="user-avatar me-3 bg-success">JS</div>
                                    <div>
                                        <div class="fw-semibold">Jane Smith</div>
                                        <div class="text-muted small">ID: #1002</div>
                                    </div>
                                </div>
                            </td>
                            <td>jane.smith@example.com</td>
                            <td>
                                <span class="badge bg-success-subtle text-success">Organizer</span>
                            </td>
                            <td>
                                <span class="badge bg-success">Active</span>
                            </td>
                            <td>
                                <div>Feb 03, 2025</div>
                                <div class="text-muted small">1 month ago</div>
                            </td>
                            <td>
                                <div>Yesterday</div>
                                <div class="text-muted small">3:22 PM</div>
                            </td>
                            <td>
                                <div class="d-flex justify-content-end pe-4">
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-secondary" type="button" data-bs-toggle="dropdown">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a class="dropdown-item" href="{{ route('admin.users.edit', 2) }}"><i class="fas fa-user-edit me-2"></i> Edit</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="fas fa-eye me-2"></i> View</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="fas fa-lock me-2"></i> Change Password</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-warning" href="#"><i class="fas fa-ban me-2"></i> Suspend</a></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="fas fa-trash me-2"></i> Delete</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </td>
                        </tr>

                        <!-- User 3 -->
                        <tr>
                            <td class="ps-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="3">
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="user-avatar me-3 bg-info">RJ</div>
                                    <div>
                                        <div class="fw-semibold">Robert Johnson</div>
                                        <div class="text-muted small">ID: #1003</div>
                                    </div>
                                </div>
                            </td>
                            <td>robert.johnson@example.com</td>
                            <td>
                                <span class="badge bg-info-subtle text-info">User</span>
                            </td>
                            <td>
                                <span class="badge bg-warning">Suspended</span>
                            </td>
                            <td>
                                <div>Mar 12, 2025</div>
                                <div class="text-muted small">2 weeks ago</div>
                            </td>
                            <td>
                                <div>Mar 15, 2025</div>
                                <div class="text-muted small">1 week ago</div>
                            </td>
                            <td>
                                <div class="d-flex justify-content-end pe-4">
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-secondary" type="button" data-bs-toggle="dropdown">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a class="dropdown-item" href="{{ route('admin.users.edit', 3) }}"><i class="fas fa-user-edit me-2"></i> Edit</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="fas fa-eye me-2"></i> View</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="fas fa-lock me-2"></i> Change Password</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-success" href="#"><i class="fas fa-check-circle me-2"></i> Activate</a></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="fas fa-trash me-2"></i> Delete</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </td>
                        </tr>

                        <!-- User 4 -->
                        <tr>
                            <td class="ps-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="4">
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="user-avatar me-3 bg-warning">AL</div>
                                    <div>
                                        <div class="fw-semibold">Amanda Lee</div>
                                        <div class="text-muted small">ID: #1004</div>
                                    </div>
                                </div>
                            </td>
                            <td>amanda.lee@example.com</td>
                            <td>
                                <span class="badge bg-success-subtle text-success">Organizer</span>
                            </td>
                            <td>
                                <span class="badge bg-success">Active</span>
                            </td>
                            <td>
                                <div>Mar 18, 2025</div>
                                <div class="text-muted small">10 days ago</div>
                            </td>
                            <td>
                                <div>Today</div>
                                <div class="text-muted small">9:15 AM</div>
                            </td>
                            <td>
                                <div class="d-flex justify-content-end pe-4">
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-secondary" type="button" data-bs-toggle="dropdown">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a class="dropdown-item" href="{{ route('admin.users.edit', 4) }}"><i class="fas fa-user-edit me-2"></i> Edit</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="fas fa-eye me-2"></i> View</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="fas fa-lock me-2"></i> Change Password</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-warning" href="#"><i class="fas fa-ban me-2"></i> Suspend</a></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="fas fa-trash me-2"></i> Delete</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </td>
                        </tr>

                        <!-- User 5 -->
                        <tr>
                            <td class="ps-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="5">
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="user-avatar me-3 bg-danger">MW</div>
                                    <div>
                                        <div class="fw-semibold">Michael Wilson</div>
                                        <div class="text-muted small">ID: #1005</div>
                                    </div>
                                </div>
                            </td>
                            <td>michael.wilson@example.com</td>
                            <td>
                                <span class="badge bg-info-subtle text-info">User</span>
                            </td>
                            <td>
                                <span class="badge bg-secondary">Inactive</span>
                            </td>
                            <td>
                                <div>Jan 25, 2025</div>
                                <div class="text-muted small">2 months ago</div>
                            </td>
                            <td>
                                <div>Feb 10, 2025</div>
                                <div class="text-muted small">1 month ago</div>
                            </td>
                            <td>
                                <div class="d-flex justify-content-end pe-4">
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-secondary" type="button" data-bs-toggle="dropdown">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a class="dropdown-item" href="{{ route('admin.users.edit', 5) }}"><i class="fas fa-user-edit me-2"></i> Edit</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="fas fa-eye me-2"></i> View</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="fas fa-lock me-2"></i> Change Password</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-success" href="#"><i class="fas fa-check-circle me-2"></i> Activate</a></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="fas fa-trash me-2"></i> Delete</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-between align-items-center p-4">
                <div class="user-bulk-actions d-flex align-items-center">
                    <div class="me-3 text-muted small">0 users selected</div>
                    <div class="btn-group">
                        <button class="btn btn-sm btn-outline-success">Activate</button>
                        <button class="btn btn-sm btn-outline-warning">Suspend</button>
                        <button class="btn btn-sm btn-outline-danger">Delete</button>
                    </div>
                </div>

                <nav aria-label="Users pagination">
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

    <!-- Add User Modal -->
    <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content border-0">
                <div class="modal-header border-0">
                    <h5 class="modal-title fw-bold" id="addUserModalLabel">Add New User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addUserForm">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="firstName" class="form-label">First Name *</label>
                                <input type="text" class="form-control" id="firstName" required>
                            </div>
                            <div class="col-md-6">
                                <label for="lastName" class="form-label">Last Name *</label>
                                <input type="text" class="form-control" id="lastName" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="email" class="form-label">Email Address *</label>
                                <input type="email" class="form-control" id="email" required>
                            </div>
                            <div class="col-md-6">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="tel" class="form-control" id="phone">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="password" class="form-label">Password *</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="password" required>
                                    <button class="btn btn-outline-secondary" type="button">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                                <div class="password-strength mt-2">
                                    <div class="progress" style="height: 5px">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="d-flex justify-content-between mt-1">
                                        <small class="text-muted">Password Strength</small>
                                        <small class="text-danger">Weak</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="confirmPassword" class="form-label">Confirm Password *</label>
                                <input type="password" class="form-control" id="confirmPassword" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="role" class="form-label">User Role *</label>
                                <select class="form-select" id="role" required>
                                    <option value="" selected disabled>Select role</option>
                                    <option value="admin">Administrator</option>
                                    <option value="organizer">Organizer</option>
                                    <option value="user">Standard User</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="status" class="form-label">Account Status *</label>
                                <select class="form-select" id="status" required>
                                    <option value="active" selected>Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="sendWelcomeEmail" checked>
                                <label class="form-check-label" for="sendWelcomeEmail">
                                    Send welcome email with login details
                                </label>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary">Add User</button>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
@endsection

@push('styles')
<style>
    .user-avatar {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: bold;
    }

    .user-bulk-actions {
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .user-bulk-actions.active {
        opacity: 1;
    }

    .bg-primary-subtle {
        background-color: rgba(59, 130, 246, 0.1);
    }

    .bg-success-subtle {
        background-color: rgba(16, 185, 129, 0.1);
    }

    .bg-info-subtle {
        background-color: rgba(6, 182, 212, 0.1);
    }
</style>
@endpush

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Toggle advanced filters
        const advancedFiltersBtn = document.getElementById('userAdvancedFilters');
        const advancedFiltersSection = document.querySelector('.user-advanced-filters');

        advancedFiltersBtn.addEventListener('click', function() {
            advancedFiltersSection.classList.toggle('d-none');
        });

        // Handle checkbox selection
        const selectAllCheckbox = document.getElementById('selectAllUsers');
        const userCheckboxes = document.querySelectorAll('tbody .form-check-input');
        const bulkActions = document.querySelector('.user-bulk-actions');

        selectAllCheckbox.addEventListener('change', function() {
            const isChecked = this.checked;

            userCheckboxes.forEach(checkbox => {
                checkbox.checked = isChecked;
            });

            updateBulkActionsVisibility();
            updateSelectedCount();
        });

        userCheckboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                updateBulkActionsVisibility();
                updateSelectedCount();

                // Update "select all" checkbox state
                const allChecked = Array.from(userCheckboxes).every(cb => cb.checked);
                const someChecked = Array.from(userCheckboxes).some(cb => cb.checked);

                selectAllCheckbox.checked = allChecked;
                selectAllCheckbox.indeterminate = someChecked && !allChecked;
            });
        });

        function updateBulkActionsVisibility() {
            const checkedBoxes = document.querySelectorAll('tbody .form-check-input:checked');

            if (checkedBoxes.length > 0) {
                bulkActions.classList.add('active');
            } else {
                bulkActions.classList.remove('active');
            }
        }

        function updateSelectedCount() {
            const checkedBoxes = document.querySelectorAll('tbody .form-check-input:checked');
            const countDisplay = document.querySelector('.user-bulk-actions .text-muted');

            countDisplay.textContent = `${checkedBoxes.length} user${checkedBoxes.length !== 1 ? 's' : ''} selected`;
        }

        // Password strength meter
        const passwordInput = document.getElementById('password');
        const passwordStrengthBar = document.querySelector('.password-strength .progress-bar');
        const passwordStrengthText = document.querySelector('.password-strength small:last-child');

        passwordInput.addEventListener('input', function() {
            const password = this.value;
            let strength = 0;
            let status = '';

            if (password.length >= 8) strength += 25;
            if (password.match(/[a-z]+/)) strength += 25;
            if (password.match(/[A-Z]+/)) strength += 25;
            if (password.match(/[0-9]+/)) strength += 25;
            if (password.match(/[^a-zA-Z0-9]+/)) strength += 25;

            if (strength > 100) strength = 100;

            if (strength <= 25) {
                status = 'Weak';
                passwordStrengthBar.className = 'progress-bar bg-danger';
                passwordStrengthText.className = 'text-danger';
            } else if (strength <= 50) {
                status = 'Fair';
                passwordStrengthBar.className = 'progress-bar bg-warning';
                passwordStrengthText.className = 'text-warning';
            } else if (strength <= 75) {
                status = 'Good';
                passwordStrengthBar.className = 'progress-bar bg-info';
                passwordStrengthText.className = 'text-info';
            } else {
                status = 'Strong';
                passwordStrengthBar.className = 'progress-bar bg-success';
                passwordStrengthText.className = 'text-success';
            }

            passwordStrengthBar.style.width = strength + '%';
            passwordStrengthText.textContent = status;
        });
    });
</script>
@endpush
