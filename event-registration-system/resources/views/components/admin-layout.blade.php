{{-- Admin Dashboard Layout Component --}}
<div class="admin-dashboard">
    <div class="admin-sidebar" x-data="{ mobileMenuOpen: false }">
        <!-- Mobile Sidebar Toggle -->
        <div class="mobile-sidebar-toggle d-lg-none">
            <button class="btn btn-primary px-4 py-2" type="button" @click="mobileMenuOpen = !mobileMenuOpen">
                <i class="fas fa-bars me-2"></i> Menu
            </button>
        </div>

        <!-- Sidebar Menu -->
        <div class="sidebar" :class="{ 'show': mobileMenuOpen }">
            <div class="sidebar-header">
                <a href="{{ route('admin.dashboard') }}" class="logo-wrapper">
                    <div class="bg-primary rounded-lg p-2 me-2">
                        <i class="fas fa-calendar-alt text-white"></i>
                    </div>
                    <span class="fw-bold text-white fs-5">EventPro Admin</span>
                </a>
                <button class="btn-close btn-close-white d-lg-none" @click="mobileMenuOpen = false"></button>
            </div>

            <div class="sidebar-user">
                <div class="user-avatar">
                    @if(Auth::user()->profile_photo)
                        <img src="{{ asset('storage/' . Auth::user()->profile_photo) }}" alt="Profile">
                    @else
                        <div class="avatar-placeholder">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </div>
                    @endif
                </div>
                <div class="user-details">
                    <div class="user-name fw-semibold">{{ Auth::user()->name }}</div>
                    <div class="user-role small">{{ ucfirst(Auth::user()->role) }}</div>
                </div>
            </div>

            <div class="sidebar-divider">Main Navigation</div>

            <ul class="sidebar-nav">
                <li class="sidebar-item{{ request()->routeIs('admin.dashboard') ? ' active' : '' }}">
                    <a href="{{ route('admin.dashboard') }}" class="sidebar-link">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-item{{ request()->routeIs('admin.events*') ? ' active' : '' }}">
                    <a href="{{ route('admin.events.index') }}" class="sidebar-link">
                        <i class="fas fa-calendar-week"></i>
                        <span>Events</span>
                    </a>
                </li>

                <li class="sidebar-item{{ request()->routeIs('admin.users*') ? ' active' : '' }}">
                    <a href="{{ route('admin.users.index') }}" class="sidebar-link">
                        <i class="fas fa-users"></i>
                        <span>Users</span>
                    </a>
                </li>

                <li class="sidebar-item{{ request()->routeIs('admin.companies*') ? ' active' : '' }}">
                    <a href="{{ route('admin.companies.index') }}" class="sidebar-link">
                        <i class="fas fa-building"></i>
                        <span>Companies</span>
                    </a>
                </li>

                <li class="sidebar-item{{ request()->routeIs('admin.tickets*') ? ' active' : '' }}">
                    <a href="{{ route('admin.tickets.index') }}" class="sidebar-link">
                        <i class="fas fa-ticket-alt"></i>
                        <span>Tickets</span>
                    </a>
                </li>

                <div class="sidebar-divider">Management</div>

                <li class="sidebar-item{{ request()->routeIs('admin.reports*') ? ' active' : '' }}">
                    <a href="{{ route('admin.reports') }}" class="sidebar-link">
                        <i class="fas fa-chart-bar"></i>
                        <span>Reports & Analytics</span>
                    </a>
                </li>

                <li class="sidebar-item{{ request()->routeIs('admin.payments*') ? ' active' : '' }}">
                    <a href="{{ route('admin.payments') }}" class="sidebar-link">
                        <i class="fas fa-credit-card"></i>
                        <span>Payments</span>
                    </a>
                </li>

                <li class="sidebar-item{{ request()->routeIs('admin.settings*') ? ' active' : '' }}">
                    <a href="{{ route('admin.settings') }}" class="sidebar-link">
                        <i class="fas fa-cog"></i>
                        <span>Settings</span>
                    </a>
                </li>
            </ul>

            <div class="sidebar-footer">
                <a href="{{ route('home') }}" class="btn btn-sm btn-outline-light me-2">
                    <i class="fas fa-home me-1"></i> Main Site
                </a>

                <form method="POST" action="{{ route('logout') }}" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-light">
                        <i class="fas fa-sign-out-alt me-1"></i> Logout
                    </button>
                </form>
            </div>
        </div>
    </div>

    <div class="admin-content">
        <div class="admin-header">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h4 class="fw-bold mb-0">{{ $pageTitle ?? 'Admin Dashboard' }}</h4>
                    <nav aria-label="breadcrumb" class="mt-1">
                        <ol class="breadcrumb mb-0 small">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Admin</a></li>
                            @if(isset($breadcrumbs))
                                @foreach($breadcrumbs as $label => $url)
                                    <li class="breadcrumb-item {{ $loop->last ? 'active' : '' }}">
                                        @if($loop->last)
                                            {{ $label }}
                                        @else
                                            <a href="{{ $url }}">{{ $label }}</a>
                                        @endif
                                    </li>
                                @endforeach
                            @endif
                        </ol>
                    </nav>
                </div>

                <div class="header-actions d-flex align-items-center">
                    <!-- Search -->
                    <div class="header-search me-3">
                        <div class="input-group">
                            <input type="text" class="form-control form-control-sm border-0" placeholder="Search..." aria-label="Search">
                            <button class="btn btn-sm btn-light" type="button"><i class="fas fa-search"></i></button>
                        </div>
                    </div>

                    <!-- Notifications Dropdown -->
                    <div class="dropdown me-3" x-data="{ open: false }">
                        <button class="btn btn-light position-relative rounded-circle p-2" @click="open = !open" @click.away="open = false">
                            <i class="fas fa-bell"></i>
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                3
                            </span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" :class="{ 'show': open }" style="width: 300px;">
                            <div class="p-3 border-bottom">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h6 class="fw-bold mb-0">Notifications</h6>
                                    <span class="badge bg-primary">3 new</span>
                                </div>
                            </div>
                            <div class="notifications-container">
                                <a href="#" class="dropdown-item border-bottom py-3">
                                    <div class="d-flex">
                                        <div class="notification-icon me-3 bg-primary-light text-primary rounded-circle p-2">
                                            <i class="fas fa-user-plus"></i>
                                        </div>
                                        <div>
                                            <div class="fw-semibold">New user registered</div>
                                            <div class="text-muted small">15 minutes ago</div>
                                        </div>
                                    </div>
                                </a>
                                <a href="#" class="dropdown-item border-bottom py-3">
                                    <div class="d-flex">
                                        <div class="notification-icon me-3 bg-success-light text-success rounded-circle p-2">
                                            <i class="fas fa-calendar-check"></i>
                                        </div>
                                        <div>
                                            <div class="fw-semibold">New event created</div>
                                            <div class="text-muted small">1 hour ago</div>
                                        </div>
                                    </div>
                                </a>
                                <a href="#" class="dropdown-item py-3">
                                    <div class="d-flex">
                                        <div class="notification-icon me-3 bg-warning-light text-warning rounded-circle p-2">
                                            <i class="fas fa-exclamation-triangle"></i>
                                        </div>
                                        <div>
                                            <div class="fw-semibold">System alert</div>
                                            <div class="text-muted small">3 hours ago</div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="p-2 border-top text-center">
                                <a href="{{ route('admin.notifications') }}" class="text-decoration-none small">View all notifications</a>
                            </div>
                        </div>
                    </div>

                    <!-- User Dropdown -->
                    <div class="dropdown" x-data="{ open: false }">
                        <button class="btn btn-light rounded-circle p-1" @click="open = !open" @click.away="open = false">
                            @if(Auth::user()->profile_photo)
                                <img src="{{ asset('storage/' . Auth::user()->profile_photo) }}" alt="Profile" class="avatar-img">
                            @else
                                <div class="avatar-img-placeholder">
                                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                </div>
                            @endif
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" :class="{ 'show': open }">
                            <div class="p-3 border-bottom">
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm me-3">
                                        @if(Auth::user()->profile_photo)
                                            <img src="{{ asset('storage/' . Auth::user()->profile_photo) }}" alt="Profile" class="avatar-img">
                                        @else
                                            <div class="avatar-img-placeholder">
                                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                            </div>
                                        @endif
                                    </div>
                                    <div>
                                        <div class="fw-bold">{{ Auth::user()->name }}</div>
                                        <div class="text-muted small">{{ Auth::user()->email }}</div>
                                    </div>
                                </div>
                            </div>
                            <a href="{{ route('profile') }}" class="dropdown-item py-2">
                                <i class="fas fa-user me-2 text-primary"></i> My Profile
                            </a>
                            <a href="{{ route('admin.settings') }}" class="dropdown-item py-2">
                                <i class="fas fa-cog me-2 text-primary"></i> Admin Settings
                            </a>
                            <div class="dropdown-divider"></div>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item py-2 text-danger">
                                    <i class="fas fa-sign-out-alt me-2"></i> Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="admin-body">
            {{ $slot }}
        </div>

        <div class="admin-footer">
            <div class="d-flex justify-content-between align-items-center">
                <div>&copy; {{ date('Y') }} EventPro. All rights reserved.</div>
                <div class="d-flex gap-3">
                    <a href="#" class="text-muted small">Privacy Policy</a>
                    <a href="#" class="text-muted small">Terms of Service</a>
                    <a href="#" class="text-muted small">Help</a>
                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
    /* Optimized Admin Dashboard Layout */
    .admin-dashboard {
        display: flex;
        min-height: 100vh;
    }

    /* Simplified Sidebar */
    .admin-sidebar {
        width: 250px;
        flex-shrink: 0;
    }

    .sidebar {
        position: fixed;
        top: 0;
        left: 0;
        width: 250px;
        height: 100vh;
        background: #1e40af;
        color: #fff;
        z-index: 1000;
        display: flex;
        flex-direction: column;
    }

    .sidebar-header {
        padding: 1.5rem;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }

    .logo-wrapper {
        color: white;
        text-decoration: none;
    }

    .sidebar-user {
        padding: 1.5rem;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }

    .user-avatar {
        width: 40px;
        height: 40px;
        margin-right: 0.875rem;
        border-radius: 50%;
    }

    .sidebar-nav {
        list-style: none;
        padding: 0;
        margin: 0;
        flex-grow: 1;
        overflow-y: auto;
    }

    .sidebar-link {
        display: flex;
        align-items: center;
        padding: 0.75rem 1.5rem;
        color: rgba(255, 255, 255, 0.8);
        text-decoration: none;
    }

    .sidebar-link:hover {
        background-color: rgba(255, 255, 255, 0.1);
        color: white;
    }

    .sidebar-item.active .sidebar-link {
        background-color: white;
        color: #1e40af;
    }

    /* Content Area */
    .admin-content {
        flex-grow: 1;
        margin-left: 250px;
        background-color: #f8f9fa;
    }

    .admin-header {
        padding: 1rem 2rem;
        background-color: white;
        border-bottom: 1px solid #dee2e6;
    }

    .admin-body {
        padding: 2rem;
    }

    .admin-footer {
        padding: 1rem 2rem;
        background-color: white;
        border-top: 1px solid #dee2e6;
    }

    /* Mobile */
    @media (max-width: 991px) {
        .admin-sidebar { width: 0; }
        .sidebar { transform: translateX(-100%); }
        .sidebar.show { transform: translateX(0); }
        .admin-content { margin-left: 0; }
    }
</style>
@endpush
