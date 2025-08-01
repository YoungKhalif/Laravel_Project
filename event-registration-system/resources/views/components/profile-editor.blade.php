{{-- User Profile Component --}}
<div class="profile-edit-section py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 mb-4 mb-lg-0">
                <div class="card border-0 shadow rounded-4 sticky-top profile-sidebar" style="top: 100px;">
                    <div class="card-body p-0">
                        <!-- User Profile Header -->
                        <div class="profile-header bg-light text-center p-4 border-bottom">
                            <div class="profile-avatar-wrapper mb-3">
                                @if($user->profile_photo)
                                    <div class="profile-avatar" style="background-image: url('{{ asset('storage/' . $user->profile_photo) }}')"></div>
                                @else
                                    <div class="profile-avatar-placeholder">
                                        <span>{{ strtoupper(substr($user->name, 0, 1)) }}</span>
                                    </div>
                                @endif

                                <label for="profile_photo" class="avatar-upload-btn" title="Change profile picture">
                                    <i class="fas fa-camera"></i>
                                </label>
                            </div>
                            <h5 class="fw-bold mb-1">{{ $user->name }}</h5>
                            <p class="text-muted small mb-0">{{ $user->email }}</p>
                            <div class="mt-2">
                                <span class="badge bg-{{ $user->role === 'admin' ? 'danger' : ($user->role === 'organizer' ? 'primary' : 'secondary') }} rounded-pill px-3 py-2">
                                    {{ ucfirst($user->role) }}
                                </span>
                            </div>
                        </div>

                        <!-- Navigation Tabs -->
                        <div class="profile-tabs p-2">
                            <div class="nav flex-column nav-pills" id="profile-tab" role="tablist">
                                <button class="nav-link active text-start py-3 px-4 d-flex align-items-center"
                                        id="profile-info-tab"
                                        data-bs-toggle="pill"
                                        data-bs-target="#profile-info"
                                        type="button"
                                        role="tab"
                                        aria-controls="profile-info"
                                        aria-selected="true">
                                    <i class="fas fa-user me-3 text-primary"></i>
                                    <div>
                                        <span class="fw-semibold d-block">Personal Info</span>
                                        <small class="text-muted">Update your basic info</small>
                                    </div>
                                </button>

                                <button class="nav-link text-start py-3 px-4 d-flex align-items-center"
                                        id="security-tab"
                                        data-bs-toggle="pill"
                                        data-bs-target="#security"
                                        type="button"
                                        role="tab"
                                        aria-controls="security"
                                        aria-selected="false">
                                    <i class="fas fa-lock me-3 text-primary"></i>
                                    <div>
                                        <span class="fw-semibold d-block">Security</span>
                                        <small class="text-muted">Change password & security</small>
                                    </div>
                                </button>

                                <button class="nav-link text-start py-3 px-4 d-flex align-items-center"
                                        id="preferences-tab"
                                        data-bs-toggle="pill"
                                        data-bs-target="#preferences"
                                        type="button"
                                        role="tab"
                                        aria-controls="preferences"
                                        aria-selected="false">
                                    <i class="fas fa-cog me-3 text-primary"></i>
                                    <div>
                                        <span class="fw-semibold d-block">Preferences</span>
                                        <small class="text-muted">Customize your experience</small>
                                    </div>
                                </button>

                                <button class="nav-link text-start py-3 px-4 d-flex align-items-center"
                                        id="notifications-tab"
                                        data-bs-toggle="pill"
                                        data-bs-target="#notifications"
                                        type="button"
                                        role="tab"
                                        aria-controls="notifications"
                                        aria-selected="false">
                                    <i class="fas fa-bell me-3 text-primary"></i>
                                    <div>
                                        <span class="fw-semibold d-block">Notifications</span>
                                        <small class="text-muted">Manage alerts & emails</small>
                                    </div>
                                </button>

                                <div class="border-top my-3"></div>

                                <a href="{{ route('dashboard') }}" class="nav-link text-start py-3 px-4 d-flex align-items-center">
                                    <i class="fas fa-tachometer-alt me-3 text-primary"></i>
                                    <span class="fw-semibold">Go to Dashboard</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-9">
                <div class="tab-content" id="profile-tabContent">
                    <!-- Personal Info Tab -->
                    <div class="tab-pane fade show active" id="profile-info" role="tabpanel" aria-labelledby="profile-info-tab">
                        <div class="card border-0 shadow rounded-4">
                            <div class="card-header bg-white p-4 border-bottom">
                                <h4 class="fw-bold mb-0">Personal Information</h4>
                                <p class="text-muted mb-0">Update your personal details and profile</p>
                            </div>
                            <div class="card-body p-4">
                                @if (session('profile_status'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ session('profile_status') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                @endif

                                <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="profile-form">
                                    @csrf
                                    @method('PUT')

                                    <div class="row g-4">
                                        <!-- Hidden Profile Photo Input -->
                                        <input type="file" name="profile_photo" id="profile_photo" class="d-none" accept="image/*">

                                        <!-- Full Name -->
                                        <div class="col-md-6">
                                            <label for="name" class="form-label fw-semibold">Full Name</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light border-0">
                                                    <i class="fas fa-user text-muted"></i>
                                                </span>
                                                <input type="text"
                                                       class="form-control ps-2 border-0 bg-light @error('name') is-invalid @enderror"
                                                       id="name"
                                                       name="name"
                                                       value="{{ old('name', $user->name) }}"
                                                       required>
                                            </div>
                                            @error('name')
                                                <div class="invalid-feedback d-block">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <!-- Email Address -->
                                        <div class="col-md-6">
                                            <label for="email" class="form-label fw-semibold">Email Address</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light border-0">
                                                    <i class="fas fa-envelope text-muted"></i>
                                                </span>
                                                <input type="email"
                                                       class="form-control ps-2 border-0 bg-light @error('email') is-invalid @enderror"
                                                       id="email"
                                                       name="email"
                                                       value="{{ old('email', $user->email) }}"
                                                       required>
                                            </div>
                                            @error('email')
                                                <div class="invalid-feedback d-block">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <!-- Phone Number -->
                                        <div class="col-md-6">
                                            <label for="phone" class="form-label fw-semibold">Phone Number</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light border-0">
                                                    <i class="fas fa-phone text-muted"></i>
                                                </span>
                                                <input type="tel"
                                                       class="form-control ps-2 border-0 bg-light @error('phone') is-invalid @enderror"
                                                       id="phone"
                                                       name="phone"
                                                       value="{{ old('phone', $user->phone ?? '') }}">
                                            </div>
                                            @error('phone')
                                                <div class="invalid-feedback d-block">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <!-- Date of Birth -->
                                        <div class="col-md-6">
                                            <label for="birth_date" class="form-label fw-semibold">Date of Birth</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light border-0">
                                                    <i class="fas fa-calendar-alt text-muted"></i>
                                                </span>
                                                <input type="date"
                                                       class="form-control ps-2 border-0 bg-light @error('birth_date') is-invalid @enderror"
                                                       id="birth_date"
                                                       name="birth_date"
                                                       value="{{ old('birth_date', $user->birth_date ?? '') }}">
                                            </div>
                                            @error('birth_date')
                                                <div class="invalid-feedback d-block">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <!-- Address -->
                                        <div class="col-12">
                                            <label for="address" class="form-label fw-semibold">Address</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light border-0">
                                                    <i class="fas fa-map-marker-alt text-muted"></i>
                                                </span>
                                                <input type="text"
                                                       class="form-control ps-2 border-0 bg-light @error('address') is-invalid @enderror"
                                                       id="address"
                                                       name="address"
                                                       value="{{ old('address', $user->address ?? '') }}"
                                                       placeholder="Street address">
                                            </div>
                                            @error('address')
                                                <div class="invalid-feedback d-block">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <!-- City, State, Zip in a row -->
                                        <div class="col-md-5">
                                            <label for="city" class="form-label fw-semibold">City</label>
                                            <input type="text"
                                                   class="form-control bg-light border-0 @error('city') is-invalid @enderror"
                                                   id="city"
                                                   name="city"
                                                   value="{{ old('city', $user->city ?? '') }}">
                                            @error('city')
                                                <div class="invalid-feedback d-block">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="col-md-4">
                                            <label for="state" class="form-label fw-semibold">State/Province</label>
                                            <input type="text"
                                                   class="form-control bg-light border-0 @error('state') is-invalid @enderror"
                                                   id="state"
                                                   name="state"
                                                   value="{{ old('state', $user->state ?? '') }}">
                                            @error('state')
                                                <div class="invalid-feedback d-block">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="col-md-3">
                                            <label for="zip" class="form-label fw-semibold">ZIP / Postal</label>
                                            <input type="text"
                                                   class="form-control bg-light border-0 @error('zip') is-invalid @enderror"
                                                   id="zip"
                                                   name="zip"
                                                   value="{{ old('zip', $user->zip ?? '') }}">
                                            @error('zip')
                                                <div class="invalid-feedback d-block">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <!-- Country -->
                                        <div class="col-md-6">
                                            <label for="country" class="form-label fw-semibold">Country</label>
                                            <select class="form-select bg-light border-0 @error('country') is-invalid @enderror"
                                                    id="country"
                                                    name="country">
                                                <option value="">Select a country</option>
                                                <option value="US" {{ (old('country', $user->country ?? '') == 'US') ? 'selected' : '' }}>United States</option>
                                                <option value="CA" {{ (old('country', $user->country ?? '') == 'CA') ? 'selected' : '' }}>Canada</option>
                                                <option value="UK" {{ (old('country', $user->country ?? '') == 'UK') ? 'selected' : '' }}>United Kingdom</option>
                                                <option value="AU" {{ (old('country', $user->country ?? '') == 'AU') ? 'selected' : '' }}>Australia</option>
                                                <option value="FR" {{ (old('country', $user->country ?? '') == 'FR') ? 'selected' : '' }}>France</option>
                                                <option value="DE" {{ (old('country', $user->country ?? '') == 'DE') ? 'selected' : '' }}>Germany</option>
                                                <!-- Add more countries as needed -->
                                            </select>
                                            @error('country')
                                                <div class="invalid-feedback d-block">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <!-- Bio -->
                                        <div class="col-12">
                                            <label for="bio" class="form-label fw-semibold">Bio</label>
                                            <textarea class="form-control bg-light border-0 @error('bio') is-invalid @enderror"
                                                     id="bio"
                                                     name="bio"
                                                     rows="4">{{ old('bio', $user->bio ?? '') }}</textarea>
                                            <div class="form-text">Tell us a little about yourself. This will be visible on your public profile.</div>
                                            @error('bio')
                                                <div class="invalid-feedback d-block">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="col-12 mt-4">
                                            <hr>
                                            <div class="d-flex justify-content-end gap-3">
                                                <button type="reset" class="btn btn-outline-secondary px-4">Cancel</button>
                                                <button type="submit" class="btn btn-primary px-4">
                                                    <i class="fas fa-save me-2"></i> Save Changes
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Security Tab -->
                    <div class="tab-pane fade" id="security" role="tabpanel" aria-labelledby="security-tab">
                        <div class="card border-0 shadow rounded-4">
                            <div class="card-header bg-white p-4 border-bottom">
                                <h4 class="fw-bold mb-0">Security Settings</h4>
                                <p class="text-muted mb-0">Manage your password and account security</p>
                            </div>
                            <div class="card-body p-4">
                                @if (session('security_status'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ session('security_status') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                @endif

                                <!-- Change Password Form -->
                                <div class="password-section mb-5">
                                    <h5 class="fw-semibold mb-4">Change Password</h5>
                                    <form method="POST" action="{{ route('password.update') }}" class="password-form">
                                        @csrf
                                        @method('PUT')

                                        <div class="row g-4">
                                            <!-- Current Password -->
                                            <div class="col-md-12">
                                                <label for="current_password" class="form-label fw-semibold">Current Password</label>
                                                <div class="input-group password-toggle">
                                                    <span class="input-group-text bg-light border-0">
                                                        <i class="fas fa-lock text-muted"></i>
                                                    </span>
                                                    <input type="password"
                                                           class="form-control ps-2 border-0 bg-light @error('current_password') is-invalid @enderror"
                                                           id="current_password"
                                                           name="current_password"
                                                           required>
                                                    <button class="btn btn-light border-0 password-toggle-btn" type="button">
                                                        <i class="fas fa-eye text-muted"></i>
                                                    </button>
                                                </div>
                                                @error('current_password')
                                                    <div class="invalid-feedback d-block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <!-- New Password -->
                                            <div class="col-md-6">
                                                <label for="password" class="form-label fw-semibold">New Password</label>
                                                <div class="input-group password-toggle">
                                                    <span class="input-group-text bg-light border-0">
                                                        <i class="fas fa-key text-muted"></i>
                                                    </span>
                                                    <input type="password"
                                                           class="form-control ps-2 border-0 bg-light @error('password') is-invalid @enderror"
                                                           id="password"
                                                           name="password"
                                                           required>
                                                    <button class="btn btn-light border-0 password-toggle-btn" type="button">
                                                        <i class="fas fa-eye text-muted"></i>
                                                    </button>
                                                </div>
                                                @error('password')
                                                    <div class="invalid-feedback d-block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                                <div class="password-strength mt-2" id="password-strength">
                                                    <div class="progress" style="height: 6px;">
                                                        <div class="progress-bar" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                    <div class="d-flex justify-content-between mt-1">
                                                        <small class="text-muted">Weak</small>
                                                        <small class="text-muted">Strong</small>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Confirm New Password -->
                                            <div class="col-md-6">
                                                <label for="password_confirmation" class="form-label fw-semibold">Confirm New Password</label>
                                                <div class="input-group password-toggle">
                                                    <span class="input-group-text bg-light border-0">
                                                        <i class="fas fa-check-circle text-muted"></i>
                                                    </span>
                                                    <input type="password"
                                                           class="form-control ps-2 border-0 bg-light"
                                                           id="password_confirmation"
                                                           name="password_confirmation"
                                                           required>
                                                    <button class="btn btn-light border-0 password-toggle-btn" type="button">
                                                        <i class="fas fa-eye text-muted"></i>
                                                    </button>
                                                </div>
                                                <div class="match-feedback mt-2"></div>
                                            </div>

                                            <div class="col-12">
                                                <div class="d-flex justify-content-end">
                                                    <button type="submit" class="btn btn-primary px-4">
                                                        <i class="fas fa-save me-2"></i> Update Password
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <!-- Two-Factor Authentication -->
                                <div class="two-factor-section mb-5">
                                    <h5 class="fw-semibold mb-3">Two-Factor Authentication</h5>
                                    <p class="text-muted">Add an extra layer of security to your account.</p>

                                    <div class="card bg-light border-0 mb-4">
                                        <div class="card-body p-4">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <h6 class="fw-semibold mb-1">Two-Factor Authentication</h6>
                                                    <p class="text-muted mb-0 small">
                                                        @if($user->two_factor_enabled ?? false)
                                                            <span class="text-success">
                                                                <i class="fas fa-check-circle me-1"></i> Enabled
                                                            </span>
                                                        @else
                                                            <span class="text-muted">
                                                                Not enabled
                                                            </span>
                                                        @endif
                                                    </p>
                                                </div>
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" id="twoFactorToggle"
                                                        {{ ($user->two_factor_enabled ?? false) ? 'checked' : '' }}>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Account Activity -->
                                <div class="account-activity-section">
                                    <h5 class="fw-semibold mb-3">Recent Account Activity</h5>
                                    <p class="text-muted">Review recent logins to your account.</p>

                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead class="table-light">
                                                <tr>
                                                    <th scope="col">Date & Time</th>
                                                    <th scope="col">IP Address</th>
                                                    <th scope="col">Device</th>
                                                    <th scope="col">Location</th>
                                                    <th scope="col">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- Sample login activity data -->
                                                <tr>
                                                    <td>{{ now()->subHours(1)->format('M d, Y g:i A') }}</td>
                                                    <td>192.168.1.1</td>
                                                    <td>Chrome on Windows</td>
                                                    <td>New York, USA</td>
                                                    <td><span class="badge bg-success rounded-pill">Current</span></td>
                                                </tr>
                                                <tr>
                                                    <td>{{ now()->subDays(1)->format('M d, Y g:i A') }}</td>
                                                    <td>192.168.1.5</td>
                                                    <td>Firefox on MacOS</td>
                                                    <td>San Francisco, USA</td>
                                                    <td><span class="badge bg-secondary rounded-pill">Success</span></td>
                                                </tr>
                                                <tr>
                                                    <td>{{ now()->subDays(3)->format('M d, Y g:i A') }}</td>
                                                    <td>10.0.0.1</td>
                                                    <td>Safari on iOS</td>
                                                    <td>Chicago, USA</td>
                                                    <td><span class="badge bg-secondary rounded-pill">Success</span></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Preferences Tab -->
                    <div class="tab-pane fade" id="preferences" role="tabpanel" aria-labelledby="preferences-tab">
                        <div class="card border-0 shadow rounded-4">
                            <div class="card-header bg-white p-4 border-bottom">
                                <h4 class="fw-bold mb-0">Account Preferences</h4>
                                <p class="text-muted mb-0">Customize your experience on our platform</p>
                            </div>
                            <div class="card-body p-4">
                                <form method="POST" action="{{ route('preferences.update') }}" class="preferences-form">
                                    @csrf
                                    @method('PUT')

                                    <!-- Language Preference -->
                                    <div class="preference-section mb-4">
                                        <h5 class="fw-semibold mb-3">Language & Region</h5>

                                        <div class="row g-4">
                                            <div class="col-md-6">
                                                <label for="language" class="form-label">Preferred Language</label>
                                                <select class="form-select bg-light border-0" id="language" name="language">
                                                    <option value="en" {{ ($user->language ?? 'en') == 'en' ? 'selected' : '' }}>English</option>
                                                    <option value="es" {{ ($user->language ?? '') == 'es' ? 'selected' : '' }}>Spanish</option>
                                                    <option value="fr" {{ ($user->language ?? '') == 'fr' ? 'selected' : '' }}>French</option>
                                                    <option value="de" {{ ($user->language ?? '') == 'de' ? 'selected' : '' }}>German</option>
                                                </select>
                                            </div>

                                            <div class="col-md-6">
                                                <label for="timezone" class="form-label">Time Zone</label>
                                                <select class="form-select bg-light border-0" id="timezone" name="timezone">
                                                    <option value="UTC" {{ ($user->timezone ?? '') == 'UTC' ? 'selected' : '' }}>UTC (Coordinated Universal Time)</option>
                                                    <option value="America/New_York" {{ ($user->timezone ?? '') == 'America/New_York' ? 'selected' : '' }}>Eastern Time (US & Canada)</option>
                                                    <option value="America/Chicago" {{ ($user->timezone ?? '') == 'America/Chicago' ? 'selected' : '' }}>Central Time (US & Canada)</option>
                                                    <option value="America/Denver" {{ ($user->timezone ?? '') == 'America/Denver' ? 'selected' : '' }}>Mountain Time (US & Canada)</option>
                                                    <option value="America/Los_Angeles" {{ ($user->timezone ?? '') == 'America/Los_Angeles' ? 'selected' : '' }}>Pacific Time (US & Canada)</option>
                                                    <option value="Europe/London" {{ ($user->timezone ?? '') == 'Europe/London' ? 'selected' : '' }}>London</option>
                                                    <option value="Europe/Paris" {{ ($user->timezone ?? '') == 'Europe/Paris' ? 'selected' : '' }}>Paris</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <hr class="my-4">

                                    <!-- Interface Preferences -->
                                    <div class="preference-section mb-4">
                                        <h5 class="fw-semibold mb-3">Interface Settings</h5>

                                        <div class="mb-3">
                                            <label class="form-label d-block">Color Theme</label>
                                            <div class="btn-group theme-selector" role="group">
                                                <input type="radio" class="btn-check" name="theme" id="theme-light" value="light"
                                                       {{ ($user->theme ?? 'light') == 'light' ? 'checked' : '' }}>
                                                <label class="btn btn-outline-primary" for="theme-light">
                                                    <i class="fas fa-sun me-2"></i> Light
                                                </label>

                                                <input type="radio" class="btn-check" name="theme" id="theme-dark" value="dark"
                                                       {{ ($user->theme ?? '') == 'dark' ? 'checked' : '' }}>
                                                <label class="btn btn-outline-primary" for="theme-dark">
                                                    <i class="fas fa-moon me-2"></i> Dark
                                                </label>

                                                <input type="radio" class="btn-check" name="theme" id="theme-system" value="system"
                                                       {{ ($user->theme ?? '') == 'system' ? 'checked' : '' }}>
                                                <label class="btn btn-outline-primary" for="theme-system">
                                                    <i class="fas fa-laptop me-2"></i> System
                                                </label>
                                            </div>
                                        </div>

                                        <div class="row g-4">
                                            <div class="col-md-6">
                                                <div class="form-check form-switch mb-3">
                                                    <input class="form-check-input" type="checkbox" id="reduceMotion" name="reduce_motion"
                                                           {{ ($user->reduce_motion ?? false) ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="reduceMotion">
                                                        Reduce animations
                                                    </label>
                                                    <div class="form-text">Minimize motion effects throughout the interface.</div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-check form-switch mb-3">
                                                    <input class="form-check-input" type="checkbox" id="highContrast" name="high_contrast"
                                                           {{ ($user->high_contrast ?? false) ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="highContrast">
                                                        High contrast mode
                                                    </label>
                                                    <div class="form-text">Increase text contrast for better readability.</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <hr class="my-4">

                                    <!-- Content Preferences -->
                                    <div class="preference-section mb-4">
                                        <h5 class="fw-semibold mb-3">Content Preferences</h5>

                                        <div class="row mb-3">
                                            <div class="col-12">
                                                <label class="form-label">Interested Event Categories</label>
                                                <div class="category-checkboxes d-flex flex-wrap gap-2">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="cat-music" name="categories[]" value="music"
                                                               {{ in_array('music', $user->categories ?? []) ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="cat-music">Music</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="cat-business" name="categories[]" value="business"
                                                               {{ in_array('business', $user->categories ?? []) ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="cat-business">Business</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="cat-tech" name="categories[]" value="tech"
                                                               {{ in_array('tech', $user->categories ?? []) ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="cat-tech">Technology</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="cat-arts" name="categories[]" value="arts"
                                                               {{ in_array('arts', $user->categories ?? []) ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="cat-arts">Arts</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="cat-sports" name="categories[]" value="sports"
                                                               {{ in_array('sports', $user->categories ?? []) ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="cat-sports">Sports</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="cat-food" name="categories[]" value="food"
                                                               {{ in_array('food', $user->categories ?? []) ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="cat-food">Food & Drinks</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 mt-4">
                                        <hr>
                                        <div class="d-flex justify-content-end gap-3">
                                            <button type="reset" class="btn btn-outline-secondary px-4">Cancel</button>
                                            <button type="submit" class="btn btn-primary px-4">
                                                <i class="fas fa-save me-2"></i> Save Preferences
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Notifications Tab -->
                    <div class="tab-pane fade" id="notifications" role="tabpanel" aria-labelledby="notifications-tab">
                        <div class="card border-0 shadow rounded-4">
                            <div class="card-header bg-white p-4 border-bottom">
                                <h4 class="fw-bold mb-0">Notification Settings</h4>
                                <p class="text-muted mb-0">Manage how you receive notifications from our platform</p>
                            </div>
                            <div class="card-body p-4">
                                <form method="POST" action="{{ route('notifications.update') }}" class="notifications-form">
                                    @csrf
                                    @method('PUT')

                                    <!-- Email Notifications -->
                                    <div class="notification-section mb-4">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <h5 class="fw-semibold mb-0">Email Notifications</h5>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="emailNotificationsToggle" name="email_notifications_enabled"
                                                       {{ ($user->email_notifications_enabled ?? true) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="emailNotificationsToggle">
                                                    {{ ($user->email_notifications_enabled ?? true) ? 'Enabled' : 'Disabled' }}
                                                </label>
                                            </div>
                                        </div>

                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th>Notification Type</th>
                                                        <th class="text-center">Email</th>
                                                        <th class="text-center">Push</th>
                                                        <th class="text-center">SMS</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <div class="fw-semibold">Event Reminders</div>
                                                            <div class="text-muted small">Get reminded about upcoming events</div>
                                                        </td>
                                                        <td class="text-center">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="notify_event_reminder_email"
                                                                       {{ ($user->notify_event_reminder_email ?? true) ? 'checked' : '' }}>
                                                            </div>
                                                        </td>
                                                        <td class="text-center">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="notify_event_reminder_push"
                                                                       {{ ($user->notify_event_reminder_push ?? true) ? 'checked' : '' }}>
                                                            </div>
                                                        </td>
                                                        <td class="text-center">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="notify_event_reminder_sms"
                                                                       {{ ($user->notify_event_reminder_sms ?? false) ? 'checked' : '' }}>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="fw-semibold">Ticket Purchases</div>
                                                            <div class="text-muted small">Confirmation for ticket purchases</div>
                                                        </td>
                                                        <td class="text-center">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="notify_ticket_purchase_email"
                                                                       {{ ($user->notify_ticket_purchase_email ?? true) ? 'checked' : '' }}>
                                                            </div>
                                                        </td>
                                                        <td class="text-center">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="notify_ticket_purchase_push"
                                                                       {{ ($user->notify_ticket_purchase_push ?? true) ? 'checked' : '' }}>
                                                            </div>
                                                        </td>
                                                        <td class="text-center">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="notify_ticket_purchase_sms"
                                                                       {{ ($user->notify_ticket_purchase_sms ?? true) ? 'checked' : '' }}>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="fw-semibold">Event Updates</div>
                                                            <div class="text-muted small">Changes to events you're attending</div>
                                                        </td>
                                                        <td class="text-center">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="notify_event_update_email"
                                                                       {{ ($user->notify_event_update_email ?? true) ? 'checked' : '' }}>
                                                            </div>
                                                        </td>
                                                        <td class="text-center">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="notify_event_update_push"
                                                                       {{ ($user->notify_event_update_push ?? true) ? 'checked' : '' }}>
                                                            </div>
                                                        </td>
                                                        <td class="text-center">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="notify_event_update_sms"
                                                                       {{ ($user->notify_event_update_sms ?? false) ? 'checked' : '' }}>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="fw-semibold">Marketing & Promotions</div>
                                                            <div class="text-muted small">Special offers and promotions</div>
                                                        </td>
                                                        <td class="text-center">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="notify_marketing_email"
                                                                       {{ ($user->notify_marketing_email ?? false) ? 'checked' : '' }}>
                                                            </div>
                                                        </td>
                                                        <td class="text-center">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="notify_marketing_push"
                                                                       {{ ($user->notify_marketing_push ?? false) ? 'checked' : '' }}>
                                                            </div>
                                                        </td>
                                                        <td class="text-center">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="notify_marketing_sms"
                                                                       {{ ($user->notify_marketing_sms ?? false) ? 'checked' : '' }}>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <hr class="my-4">

                                    <!-- Notification Frequency -->
                                    <div class="notification-frequency mb-4">
                                        <h5 class="fw-semibold mb-3">Notification Frequency</h5>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="email_frequency" class="form-label">Email Digest Frequency</label>
                                                <select class="form-select bg-light border-0" id="email_frequency" name="email_frequency">
                                                    <option value="immediate" {{ ($user->email_frequency ?? '') == 'immediate' ? 'selected' : '' }}>Immediate - As events occur</option>
                                                    <option value="daily" {{ ($user->email_frequency ?? 'daily') == 'daily' ? 'selected' : '' }}>Daily Digest</option>
                                                    <option value="weekly" {{ ($user->email_frequency ?? '') == 'weekly' ? 'selected' : '' }}>Weekly Digest</option>
                                                </select>
                                                <div class="form-text">How often would you like to receive email notifications.</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 mt-4">
                                        <hr>
                                        <div class="d-flex justify-content-end gap-3">
                                            <button type="reset" class="btn btn-outline-secondary px-4">Cancel</button>
                                            <button type="submit" class="btn btn-primary px-4">
                                                <i class="fas fa-save me-2"></i> Save Notification Settings
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
    /* Profile Avatar Styling */
    .profile-avatar-wrapper {
        position: relative;
        width: 100px;
        height: 100px;
        margin: 0 auto;
    }

    .profile-avatar {
        width: 100%;
        height: 100%;
        border-radius: 50%;
        background-size: cover;
        background-position: center;
        border: 3px solid white;
        box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
    }

    .profile-avatar-placeholder {
        width: 100%;
        height: 100%;
        border-radius: 50%;
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        color: white;
        font-size: 2.5rem;
        font-weight: bold;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 3px solid white;
        box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
    }

    .avatar-upload-btn {
        position: absolute;
        bottom: 0;
        right: 0;
        width: 32px;
        height: 32px;
        border-radius: 50%;
        background: var(--primary-color);
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.2s;
        border: 2px solid white;
        box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
    }

    .avatar-upload-btn:hover {
        transform: scale(1.1);
    }

    /* Tab Navigation Styling */
    .profile-tabs .nav-link {
        color: #64748b;
        border-radius: 10px;
        transition: all 0.3s ease;
    }

    .profile-tabs .nav-link:hover:not(.active) {
        background-color: #f8fafc;
        color: var(--primary-color);
    }

    .profile-tabs .nav-link.active {
        background-color: rgba(59, 130, 246, 0.1);
        color: var(--primary-color);
        font-weight: 600;
    }

    /* Form Control Styling */
    .form-control, .form-select, .input-group-text {
        padding: 0.75rem 1rem;
        border-radius: 10px;
    }

    .input-group .form-control {
        border-top-left-radius: 0;
        border-bottom-left-radius: 0;
    }

    .input-group .input-group-text {
        border-top-right-radius: 0;
        border-bottom-right-radius: 0;
    }

    .form-check-input {
        cursor: pointer;
    }

    /* Password Strength Meter */
    .password-strength .progress-bar {
        transition: width 0.3s ease;
    }

    .password-strength .progress-bar.bg-danger {
        background-color: #ef4444 !important;
    }

    .password-strength .progress-bar.bg-warning {
        background-color: #f59e0b !important;
    }

    .password-strength .progress-bar.bg-success {
        background-color: #10b981 !important;
    }

    /* Theme Selector */
    .theme-selector .btn {
        padding: 0.5rem 1rem;
    }

    /* Notification Table */
    .table td, .table th {
        padding: 1rem;
    }

    /* Responsive Adjustments */
    @media (max-width: 767px) {
        .profile-sidebar {
            position: static !important;
            margin-bottom: 2rem;
        }

        .profile-avatar-wrapper {
            width: 80px;
            height: 80px;
        }
    }
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Profile photo upload handling
    const profilePhotoInput = document.getElementById('profile_photo');
    const uploadButton = document.querySelector('.avatar-upload-btn');

    if (uploadButton && profilePhotoInput) {
        uploadButton.addEventListener('click', function(e) {
            e.preventDefault();
            profilePhotoInput.click();
        });

        profilePhotoInput.addEventListener('change', function(e) {
            if (this.files && this.files[0]) {
                const file = this.files[0];
                const reader = new FileReader();

                reader.onload = function(e) {
                    const avatar = document.querySelector('.profile-avatar') ||
                                   document.querySelector('.profile-avatar-placeholder');

                    if (avatar.classList.contains('profile-avatar-placeholder')) {
                        // Create new avatar image element
                        const newAvatar = document.createElement('div');
                        newAvatar.className = 'profile-avatar';
                        newAvatar.style.backgroundImage = `url(${e.target.result})`;

                        // Replace placeholder with actual image
                        avatar.parentNode.replaceChild(newAvatar, avatar);
                    } else {
                        // Update existing avatar image
                        avatar.style.backgroundImage = `url(${e.target.result})`;
                    }
                };

                reader.readAsDataURL(file);
            }
        });
    }

    // Password visibility toggle
    document.querySelectorAll('.password-toggle-btn').forEach(button => {
        button.addEventListener('click', function() {
            const input = this.parentNode.querySelector('input');
            const icon = this.querySelector('i');

            if (input.type === 'password') {
                input.type = 'text';
                icon.className = 'fas fa-eye-slash text-muted';
            } else {
                input.type = 'password';
                icon.className = 'fas fa-eye text-muted';
            }
        });
    });

    // Password strength meter
    const passwordInput = document.getElementById('password');
    const confirmInput = document.getElementById('password_confirmation');
    const strengthBar = document.querySelector('#password-strength .progress-bar');
    const matchFeedback = document.querySelector('.match-feedback');

    if (passwordInput && strengthBar) {
        passwordInput.addEventListener('input', function() {
            const value = this.value;
            let strength = 0;

            // Check password strength
            if (value.length >= 8) strength += 20;
            if (value.match(/[a-z]+/)) strength += 20;
            if (value.match(/[A-Z]+/)) strength += 20;
            if (value.match(/[0-9]+/)) strength += 20;
            if (value.match(/[^a-zA-Z0-9]+/)) strength += 20;

            // Update the strength bar
            strengthBar.style.width = strength + '%';

            // Update the color based on strength
            if (strength < 40) {
                strengthBar.className = 'progress-bar bg-danger';
            } else if (strength < 80) {
                strengthBar.className = 'progress-bar bg-warning';
            } else {
                strengthBar.className = 'progress-bar bg-success';
            }

            // Check if passwords match
            if (confirmInput && confirmInput.value) {
                checkPasswordMatch();
            }
        });
    }

    // Password match checker
    if (confirmInput && matchFeedback) {
        confirmInput.addEventListener('input', checkPasswordMatch);

        function checkPasswordMatch() {
            if (passwordInput.value === confirmInput.value) {
                matchFeedback.innerHTML = '<small class="text-success"><i class="fas fa-check-circle me-1"></i> Passwords match</small>';
            } else {
                matchFeedback.innerHTML = '<small class="text-danger"><i class="fas fa-times-circle me-1"></i> Passwords do not match</small>';
            }
        }
    }

    // Two-factor authentication toggle
    const twoFactorToggle = document.getElementById('twoFactorToggle');

    if (twoFactorToggle) {
        twoFactorToggle.addEventListener('change', function() {
            if (this.checked) {
                // Simulate opening a 2FA setup modal
                alert('In a real application, this would open a 2FA setup process. For this demo, we\'ll just pretend it\'s enabled.');
            } else {
                // Simulate 2FA disable confirmation
                if (confirm('Are you sure you want to disable Two-Factor Authentication? This will make your account less secure.')) {
                    console.log('2FA disabled');
                } else {
                    this.checked = true;
                }
            }
        });
    }

    // Email notifications toggle label updater
    const emailNotificationsToggle = document.getElementById('emailNotificationsToggle');

    if (emailNotificationsToggle) {
        emailNotificationsToggle.addEventListener('change', function() {
            const label = this.nextElementSibling;
            label.textContent = this.checked ? 'Enabled' : 'Disabled';
        });
    }
});
</script>
@endpush
