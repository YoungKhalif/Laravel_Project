@extends('layouts.app')

@section('title', 'Profile Settings - EventSmart')

@section('content')
<div class="container py-5">
    <div class="row">
        <!-- Sidebar Navigation -->
        <div class="col-lg-3 mb-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-3">
                    <div class="text-center mb-4">
                        <div class="position-relative d-inline-block">
                            <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=80&h=80&fit=crop&crop=face"
                                 class="rounded-circle" width="80" height="80" alt="Profile">
                            <button class="btn btn-sm btn-primary position-absolute bottom-0 end-0 rounded-circle p-1"
                                    onclick="changeProfilePhoto()" style="width: 30px; height: 30px;">
                                <i class="fas fa-camera fa-xs"></i>
                            </button>
                        </div>
                        <h6 class="mt-2 mb-0">John Doe</h6>
                        <small class="text-muted">Software Engineer</small>
                    </div>

                    <nav class="nav flex-column">
                        <a class="nav-link active px-0 py-2" href="#personal" onclick="showSection('personal')">
                            <i class="fas fa-user me-2"></i>Personal Info
                        </a>
                        <a class="nav-link px-0 py-2" href="#professional" onclick="showSection('professional')">
                            <i class="fas fa-briefcase me-2"></i>Professional
                        </a>
                        <a class="nav-link px-0 py-2" href="#preferences" onclick="showSection('preferences')">
                            <i class="fas fa-cog me-2"></i>Preferences
                        </a>
                        <a class="nav-link px-0 py-2" href="#security" onclick="showSection('security')">
                            <i class="fas fa-shield-alt me-2"></i>Security
                        </a>
                        <a class="nav-link px-0 py-2" href="#notifications" onclick="showSection('notifications')">
                            <i class="fas fa-bell me-2"></i>Notifications
                        </a>
                        <a class="nav-link px-0 py-2" href="#privacy" onclick="showSection('privacy')">
                            <i class="fas fa-lock me-2"></i>Privacy
                        </a>
                    </nav>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="col-lg-9">
            <!-- Personal Information Section -->
            <div id="personal-section" class="profile-section">
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-white border-0 py-3">
                        <h5 class="card-title mb-0">
                            <i class="fas fa-user text-primary me-2"></i>Personal Information
                        </h5>
                    </div>
                    <div class="card-body p-4">
                        <form id="personalForm" method="POST" action="/profile/update/personal">
                            @csrf
                            @method('PUT')

                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="first_name" class="form-label">First Name *</label>
                                    <input type="text" class="form-control" id="first_name" name="first_name"
                                           value="John" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="last_name" class="form-label">Last Name *</label>
                                    <input type="text" class="form-control" id="last_name" name="last_name"
                                           value="Doe" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email Address *</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                           value="john.doe@example.com" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="phone" class="form-label">Phone Number</label>
                                    <input type="tel" class="form-control" id="phone" name="phone"
                                           value="+1 (555) 123-4567">
                                </div>
                                <div class="col-md-6">
                                    <label for="date_of_birth" class="form-label">Date of Birth</label>
                                    <input type="date" class="form-control" id="date_of_birth" name="date_of_birth"
                                           value="1990-01-15">
                                </div>
                                <div class="col-md-6">
                                    <label for="gender" class="form-label">Gender</label>
                                    <select class="form-select" id="gender" name="gender">
                                        <option value="">Prefer not to say</option>
                                        <option value="male" selected>Male</option>
                                        <option value="female">Female</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label for="bio" class="form-label">Bio</label>
                                    <textarea class="form-control" id="bio" name="bio" rows="3"
                                              placeholder="Tell us about yourself...">Passionate software engineer with 5+ years of experience in web development and cloud technologies.</textarea>
                                </div>
                                <div class="col-12">
                                    <label for="address" class="form-label">Address</label>
                                    <input type="text" class="form-control" id="address" name="address"
                                           value="123 Main Street, New York, NY 10001">
                                </div>
                            </div>

                            <div class="mt-4">
                                <button type="submit" class="btn btn-gradient me-2">
                                    <i class="fas fa-save me-2"></i>Save Changes
                                </button>
                                <button type="reset" class="btn btn-outline-secondary">
                                    <i class="fas fa-undo me-2"></i>Reset
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Professional Information Section -->
            <div id="professional-section" class="profile-section" style="display: none;">
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-white border-0 py-3">
                        <h5 class="card-title mb-0">
                            <i class="fas fa-briefcase text-primary me-2"></i>Professional Information
                        </h5>
                    </div>
                    <div class="card-body p-4">
                        <form id="professionalForm" method="POST" action="/profile/update/professional">
                            @csrf
                            @method('PUT')

                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="job_title" class="form-label">Job Title</label>
                                    <input type="text" class="form-control" id="job_title" name="job_title"
                                           value="Senior Software Engineer">
                                </div>
                                <div class="col-md-6">
                                    <label for="company" class="form-label">Company</label>
                                    <input type="text" class="form-control" id="company" name="company"
                                           value="TechCorp Inc.">
                                </div>
                                <div class="col-md-6">
                                    <label for="industry" class="form-label">Industry</label>
                                    <select class="form-select" id="industry" name="industry">
                                        <option value="">Select Industry</option>
                                        <option value="technology" selected>Technology</option>
                                        <option value="finance">Finance</option>
                                        <option value="healthcare">Healthcare</option>
                                        <option value="education">Education</option>
                                        <option value="manufacturing">Manufacturing</option>
                                        <option value="retail">Retail</option>
                                        <option value="consulting">Consulting</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="experience_level" class="form-label">Experience Level</label>
                                    <select class="form-select" id="experience_level" name="experience_level">
                                        <option value="">Select Experience Level</option>
                                        <option value="entry">Entry Level (0-2 years)</option>
                                        <option value="mid">Mid Level (3-5 years)</option>
                                        <option value="senior" selected>Senior Level (6-10 years)</option>
                                        <option value="executive">Executive (10+ years)</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label for="skills" class="form-label">Skills</label>
                                    <input type="text" class="form-control" id="skills" name="skills"
                                           value="JavaScript, Python, React, Node.js, AWS"
                                           placeholder="Separate skills with commas">
                                    <small class="text-muted">Separate skills with commas</small>
                                </div>
                                <div class="col-12">
                                    <label for="linkedin_url" class="form-label">LinkedIn Profile</label>
                                    <input type="url" class="form-control" id="linkedin_url" name="linkedin_url"
                                           value="https://linkedin.com/in/johndoe" placeholder="https://linkedin.com/in/yourprofile">
                                </div>
                                <div class="col-12">
                                    <label for="website_url" class="form-label">Personal Website</label>
                                    <input type="url" class="form-control" id="website_url" name="website_url"
                                           value="https://johndoe.dev" placeholder="https://yourwebsite.com">
                                </div>
                            </div>

                            <div class="mt-4">
                                <button type="submit" class="btn btn-gradient me-2">
                                    <i class="fas fa-save me-2"></i>Save Changes
                                </button>
                                <button type="reset" class="btn btn-outline-secondary">
                                    <i class="fas fa-undo me-2"></i>Reset
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Preferences Section -->
            <div id="preferences-section" class="profile-section" style="display: none;">
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-white border-0 py-3">
                        <h5 class="card-title mb-0">
                            <i class="fas fa-cog text-primary me-2"></i>Event Preferences
                        </h5>
                    </div>
                    <div class="card-body p-4">
                        <form id="preferencesForm" method="POST" action="/profile/update/preferences">
                            @csrf
                            @method('PUT')

                            <div class="mb-4">
                                <h6 class="mb-3">Dietary Restrictions</h6>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="dietary_none"
                                                   name="dietary_restrictions[]" value="none">
                                            <label class="form-check-label" for="dietary_none">None</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="dietary_vegetarian"
                                                   name="dietary_restrictions[]" value="vegetarian">
                                            <label class="form-check-label" for="dietary_vegetarian">Vegetarian</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="dietary_vegan"
                                                   name="dietary_restrictions[]" value="vegan">
                                            <label class="form-check-label" for="dietary_vegan">Vegan</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="dietary_gluten_free"
                                                   name="dietary_restrictions[]" value="gluten_free">
                                            <label class="form-check-label" for="dietary_gluten_free">Gluten Free</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-4">
                                <h6 class="mb-3">Event Categories of Interest</h6>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="interest_technology"
                                                   name="interests[]" value="technology" checked>
                                            <label class="form-check-label" for="interest_technology">Technology</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="interest_business"
                                                   name="interests[]" value="business">
                                            <label class="form-check-label" for="interest_business">Business</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="interest_education"
                                                   name="interests[]" value="education">
                                            <label class="form-check-label" for="interest_education">Education</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="interest_networking"
                                                   name="interests[]" value="networking" checked>
                                            <label class="form-check-label" for="interest_networking">Networking</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="interest_health"
                                                   name="interests[]" value="health">
                                            <label class="form-check-label" for="interest_health">Health & Wellness</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="interest_arts"
                                                   name="interests[]" value="arts">
                                            <label class="form-check-label" for="interest_arts">Arts & Culture</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-4">
                                <h6 class="mb-3">Communication Preferences</h6>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="preferred_language" class="form-label">Preferred Language</label>
                                        <select class="form-select" id="preferred_language" name="preferred_language">
                                            <option value="en" selected>English</option>
                                            <option value="es">Spanish</option>
                                            <option value="fr">French</option>
                                            <option value="de">German</option>
                                            <option value="it">Italian</option>
                                            <option value="pt">Portuguese</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="timezone" class="form-label">Timezone</label>
                                        <select class="form-select" id="timezone" name="timezone">
                                            <option value="America/New_York" selected>Eastern Time (ET)</option>
                                            <option value="America/Chicago">Central Time (CT)</option>
                                            <option value="America/Denver">Mountain Time (MT)</option>
                                            <option value="America/Los_Angeles">Pacific Time (PT)</option>
                                            <option value="Europe/London">London (GMT)</option>
                                            <option value="Europe/Paris">Paris (CET)</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-4">
                                <button type="submit" class="btn btn-gradient me-2">
                                    <i class="fas fa-save me-2"></i>Save Preferences
                                </button>
                                <button type="reset" class="btn btn-outline-secondary">
                                    <i class="fas fa-undo me-2"></i>Reset
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Security Section -->
            <div id="security-section" class="profile-section" style="display: none;">
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-white border-0 py-3">
                        <h5 class="card-title mb-0">
                            <i class="fas fa-shield-alt text-primary me-2"></i>Security Settings
                        </h5>
                    </div>
                    <div class="card-body p-4">
                        <!-- Change Password -->
                        <div class="mb-4">
                            <h6 class="mb-3">Change Password</h6>
                            <form id="passwordForm" method="POST" action="/profile/update/password">
                                @csrf
                                @method('PUT')

                                <div class="row g-3">
                                    <div class="col-12">
                                        <label for="current_password" class="form-label">Current Password *</label>
                                        <input type="password" class="form-control" id="current_password"
                                               name="current_password" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="new_password" class="form-label">New Password *</label>
                                        <input type="password" class="form-control" id="new_password"
                                               name="new_password" required>
                                        <small class="text-muted">Minimum 8 characters with letters and numbers</small>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="confirm_password" class="form-label">Confirm New Password *</label>
                                        <input type="password" class="form-control" id="confirm_password"
                                               name="password_confirmation" required>
                                    </div>
                                </div>

                                <div class="mt-3">
                                    <button type="submit" class="btn btn-gradient">
                                        <i class="fas fa-key me-2"></i>Update Password
                                    </button>
                                </div>
                            </form>
                        </div>

                        <hr>

                        <!-- Two-Factor Authentication -->
                        <div class="mb-4">
                            <h6 class="mb-3">Two-Factor Authentication</h6>
                            <div class="d-flex justify-content-between align-items-center p-3 border rounded">
                                <div>
                                    <h6 class="mb-1">SMS Authentication</h6>
                                    <small class="text-muted">Receive SMS codes for account verification</small>
                                </div>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="sms_2fa">
                                    <label class="form-check-label" for="sms_2fa"></label>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between align-items-center p-3 border rounded mt-2">
                                <div>
                                    <h6 class="mb-1">App Authentication</h6>
                                    <small class="text-muted">Use Google Authenticator or similar app</small>
                                </div>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="app_2fa">
                                    <label class="form-check-label" for="app_2fa"></label>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <!-- Login History -->
                        <div>
                            <h6 class="mb-3">Recent Login Activity</h6>
                            <div class="table-responsive">
                                <table class="table table-sm">
                                    <thead>
                                        <tr>
                                            <th>Date & Time</th>
                                            <th>Location</th>
                                            <th>Device</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Today, 2:30 PM</td>
                                            <td>New York, NY</td>
                                            <td>Chrome on Windows</td>
                                            <td><span class="badge bg-success">Current</span></td>
                                        </tr>
                                        <tr>
                                            <td>Yesterday, 9:15 AM</td>
                                            <td>New York, NY</td>
                                            <td>Safari on iPhone</td>
                                            <td><span class="badge bg-secondary">Success</span></td>
                                        </tr>
                                        <tr>
                                            <td>Jul 27, 6:45 PM</td>
                                            <td>Unknown Location</td>
                                            <td>Chrome on Android</td>
                                            <td><span class="badge bg-warning">Suspicious</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <button class="btn btn-outline-danger btn-sm">
                                <i class="fas fa-sign-out-alt me-1"></i>Sign Out All Devices
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Other sections would be implemented similarly -->
            <div id="notifications-section" class="profile-section" style="display: none;">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white border-0 py-3">
                        <h5 class="card-title mb-0">
                            <i class="fas fa-bell text-primary me-2"></i>Notification Settings
                        </h5>
                    </div>
                    <div class="card-body p-4">
                        <p class="text-muted">Notification preferences will be implemented here...</p>
                    </div>
                </div>
            </div>

            <div id="privacy-section" class="profile-section" style="display: none;">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white border-0 py-3">
                        <h5 class="card-title mb-0">
                            <i class="fas fa-lock text-primary me-2"></i>Privacy Settings
                        </h5>
                    </div>
                    <div class="card-body p-4">
                        <p class="text-muted">Privacy settings will be implemented here...</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
function showSection(sectionName) {
    // Hide all sections
    document.querySelectorAll('.profile-section').forEach(section => {
        section.style.display = 'none';
    });

    // Show selected section
    document.getElementById(sectionName + '-section').style.display = 'block';

    // Update active nav link
    document.querySelectorAll('.nav-link').forEach(link => {
        link.classList.remove('active');
    });
    event.target.classList.add('active');
}

function changeProfilePhoto() {
    // Profile photo change functionality
    const input = document.createElement('input');
    input.type = 'file';
    input.accept = 'image/*';
    input.onchange = function(e) {
        const file = e.target.files[0];
        if (file) {
            // Handle photo upload
            showNotification('Profile photo updated successfully!', 'success');
        }
    };
    input.click();
}

// Form submissions
document.getElementById('personalForm').addEventListener('submit', function(e) {
    e.preventDefault();
    showNotification('Personal information updated successfully!', 'success');
});

document.getElementById('professionalForm').addEventListener('submit', function(e) {
    e.preventDefault();
    showNotification('Professional information updated successfully!', 'success');
});

document.getElementById('preferencesForm').addEventListener('submit', function(e) {
    e.preventDefault();
    showNotification('Preferences updated successfully!', 'success');
});

document.getElementById('passwordForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const newPassword = document.getElementById('new_password').value;
    const confirmPassword = document.getElementById('confirm_password').value;

    if (newPassword !== confirmPassword) {
        showNotification('Passwords do not match!', 'error');
        return;
    }

    showNotification('Password updated successfully!', 'success');
    this.reset();
});

function showNotification(message, type) {
    const notification = document.createElement('div');
    notification.className = `alert alert-${type === 'success' ? 'success' : type === 'error' ? 'danger' : 'info'} alert-dismissible fade show position-fixed`;
    notification.style.cssText = 'top: 20px; right: 20px; z-index: 1050; min-width: 300px;';
    notification.innerHTML = `
        <i class="fas fa-${type === 'success' ? 'check-circle' : type === 'error' ? 'exclamation-circle' : 'info-circle'} me-2"></i>
        ${message}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    `;

    document.body.appendChild(notification);

    setTimeout(() => {
        if (notification.parentNode) {
            notification.remove();
        }
    }, 5000);
}
</script>
@endpush
@endsection
