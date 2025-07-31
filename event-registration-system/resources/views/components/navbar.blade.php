<nav class="navbar navbar-expand-lg gradient-bg shadow-lg" x-data="{ mobileMenuOpen: false }">
    <div class="container">
        <a class="navbar-brand text-white" href="{{ route('home') }}">
            <i class="fas fa-calendar-alt me-2"></i>
            EventSmart
        </a>

        <button class="navbar-toggler" type="button" @click="mobileMenuOpen = !mobileMenuOpen">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav" :class="{ 'show': mobileMenuOpen }">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('events.index') }}">
                        <i class="fas fa-calendar me-1"></i>Events
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('companies.index') }}">
                        <i class="fas fa-building me-1"></i>Companies
                    </a>
                </li>
                @auth
                    @if(auth()->user()->is_admin)
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('admin.dashboard') }}">
                                <i class="fas fa-tachometer-alt me-1"></i>Admin Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('admin.reports') }}">
                                <i class="fas fa-chart-bar me-1"></i>Reports
                            </a>
                        </li>
                    @endif
                @endauth
            </ul>

            <ul class="navbar-nav">
                @guest
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('login') }}">
                            <i class="fas fa-sign-in-alt me-1"></i>Login
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('register') }}">
                            <i class="fas fa-user-plus me-1"></i>Register
                        </a>
                    </li>
                @else
                    <li class="nav-item dropdown" x-data="{ dropdownOpen: false }">
                        <a class="nav-link dropdown-toggle text-white" href="#" @click="dropdownOpen = !dropdownOpen">
                            <i class="fas fa-user me-1"></i>{{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu" :class="{ 'show': dropdownOpen }">
                            <li><a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a></li>
                            <li><a class="dropdown-item" href="{{ route('tickets.index') }}">My Tickets</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item">
                                        <i class="fas fa-sign-out-alt me-1"></i>Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
