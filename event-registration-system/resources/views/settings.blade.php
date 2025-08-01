@extends('layouts.app')

@section('title', 'Account Settings - EventSmart')

@section('content')
<div class="container py-5">
    <div class="row">
        <!-- Settings Navigation -->
        <div class="col-lg-3 mb-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-0">
                    <div class="list-group list-group-flush">
                        <a href="#personal" class="list-group-item list-group-item-action active" data-bs-toggle="pill">
                            <i class="fas fa-user me-3"></i>Personal Information
                        </a>
                        <a href="#security" class="list-group-item list-group-item-action" data-bs-toggle="pill">
                            <i class="fas fa-shield-alt me-3"></i>Security & Privacy
                        </a>
                        <a href="#notifications" class="list-group-item list-group-item-action" data-bs-toggle="pill">
                            <i class="fas fa-bell me-3"></i>Notifications
                        </a>
                        <a href="#billing" class="list-group-item list-group-item-action" data-bs-toggle="pill">
                            <i class="fas fa-credit-card me-3"></i>Billing & Payments
                        </a>
                        <a href="#preferences" class="list-group-item list-group-item-action" data-bs-toggle="pill">
                            <i class="fas fa-cog me-3"></i>Preferences
                        </a>
                        <a href="#integrations" class="list-group-item list-group-item-action" data-bs-toggle="pill">
                            <i class="fas fa-plug me-3"></i>Integrations
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Settings Content -->
        <div class="col-lg-9">
            <div class="tab-content">
                <!-- Personal Information -->
                <div class="tab-pane fade show active" id="personal">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-white border-bottom-0 pb-0">
                            <h4 class="mb-0">Personal Information</h4>
                            <p class="text-muted mb-0">Update your personal details and profile information</p>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                
                                <!-- Profile Picture -->
                                <div class="row mb-4">
                                    <div class="col-md-3">
                                        <div class="text-center">
                                            <img src="{{ Auth::user()->avatar_url ?? 'https://via.placeholder.com/150x150' }}" 
                                                 alt="Profile Picture" 
                                                 class="rounded-circle img-fluid mb-3" 
                                                 style="width: 120px; height: 120px; object-fit: cover;">
                                            <div>
                                                <input type="file" class="form-control-file d-none" id="avatar" name="avatar" accept="image/*">
                                                <label for="avatar" class="btn btn-outline-primary btn-sm">
                                                    <i class="fas fa-camera me-1"></i>Change Photo
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="first_name" class="form-label">First Name</label>
                                                <input type="text" class="form-control" id="first_name" name="first_name" 
                                                       value="{{ old('first_name', Auth::user()->first_name) }}" required>
                                                @error('first_name')
                                                    <div class="text-danger small">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="last_name" class="form-label">Last Name</label>
                                                <input type="text" class="form-control" id="last_name" name="last_name" 
                                                       value="{{ old('last_name', Auth::user()->last_name) }}" required>
                                                @error('last_name')
                                                    <div class="text-danger small">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="bio" class="form-label">Bio</label>
                                            <textarea class="form-control" id="bio" name="bio" rows="3" 
                                                      placeholder="Tell us about yourself...">{{ old('bio', Auth::user()->bio) }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <!-- Contact Information -->
                                <h5 class="mb-3">Contact Information</h5>
                                <div class="row mb-3">
                                    <div class="col-md-6 mb-3">
                                        <label for="email" class="form-label">Email Address</label>
                                        <input type="email" class="form-control" id="email" name="email" 
                                               value="{{ old('email', Auth::user()->email) }}" required>
                                        @error('email')
                                            <div class="text-danger small">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="phone" class="form-label">Phone Number</label>
                                        <input type="tel" class="form-control" id="phone" name="phone" 
                                               value="{{ old('phone', Auth::user()->phone) }}">
                                        @error('phone')
                                            <div class="text-danger small">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Address Information -->
                                <h5 class="mb-3">Address Information</h5>
                                <div class="row mb-3">
                                    <div class="col-12 mb-3">
                                        <label for="address" class="form-label">Street Address</label>
                                        <input type="text" class="form-control" id="address" name="address" 
                                               value="{{ old('address', Auth::user()->address) }}">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="city" class="form-label">City</label>
                                        <input type="text" class="form-control" id="city" name="city" 
                                               value="{{ old('city', Auth::user()->city) }}">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="state" class="form-label">State/Province</label>
                                        <input type="text" class="form-control" id="state" name="state" 
                                               value="{{ old('state', Auth::user()->state) }}">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="zip_code" class="form-label">ZIP/Postal Code</label>
                                        <input type="text" class="form-control" id="zip_code" name="zip_code" 
                                               value="{{ old('zip_code', Auth::user()->zip_code) }}">
                                    </div>
                                </div>

                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save me-2"></i>Save Changes
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Security & Privacy -->
                <div class="tab-pane fade" id="security">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-white border-bottom-0 pb-0">
                            <h4 class="mb-0">Security & Privacy</h4>
                            <p class="text-muted mb-0">Manage your account security and privacy settings</p>
                        </div>
                        <div class="card-body">
                            <!-- Change Password -->
                            <form action="{{ route('password.update') }}" method="POST" class="mb-5">
                                @csrf
                                @method('PUT')
                                
                                <h5 class="mb-3">Change Password</h5>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="current_password" class="form-label">Current Password</label>
                                        <input type="password" class="form-control" id="current_password" name="current_password" required>
                                        @error('current_password')
                                            <div class="text-danger small">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="password" class="form-label">New Password</label>
                                        <input type="password" class="form-control" id="password" name="password" required>
                                        @error('password')
                                            <div class="text-danger small">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="password_confirmation" class="form-label">Confirm New Password</label>
                                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Update Password</button>
                            </form>

                            <!-- Two-Factor Authentication -->
                            <div class="border-top pt-4 mb-4">
                                <h5 class="mb-3">Two-Factor Authentication</h5>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <p class="mb-1">Add an extra layer of security to your account</p>
                                        <small class="text-muted">We'll send a code to your phone when you sign in</small>
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="two_factor" {{ Auth::user()->two_factor_enabled ? 'checked' : '' }}>
                                        <label class="form-check-label" for="two_factor"></label>
                                    </div>
                                </div>
                            </div>

                            <!-- Login Activity -->
                            <div class="border-top pt-4">
                                <h5 class="mb-3">Recent Login Activity</h5>
                                <div class="table-responsive">
                                    <table class="table table-sm">
                                        <thead>
                                            <tr>
                                                <th>Device</th>
                                                <th>Location</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><i class="fas fa-desktop me-2"></i>Chrome on Windows</td>
                                                <td>New York, NY</td>
                                                <td>{{ now()->format('M j, Y g:i A') }}</td>
                                                <td><span class="badge bg-success">Current</span></td>
                                            </tr>
                                            <tr>
                                                <td><i class="fas fa-mobile me-2"></i>Safari on iPhone</td>
                                                <td>New York, NY</td>
                                                <td>{{ now()->subDays(1)->format('M j, Y g:i A') }}</td>
                                                <td><span class="badge bg-secondary">Inactive</span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Notifications -->
                <div class="tab-pane fade" id="notifications">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-white border-bottom-0 pb-0">
                            <h4 class="mb-0">Notification Preferences</h4>
                            <p class="text-muted mb-0">Choose how you want to be notified about events and updates</p>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('notifications.update') }}" method="POST">
                                @csrf
                                @method('PUT')
                                
                                <!-- Email Notifications -->
                                <h5 class="mb-3">Email Notifications</h5>
                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" type="checkbox" id="email_events" name="email_events" checked>
                                            <label class="form-check-label" for="email_events">
                                                <strong>Event Updates</strong><br>
                                                <small class="text-muted">Notifications about events you're attending</small>
                                            </label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" type="checkbox" id="email_tickets" name="email_tickets" checked>
                                            <label class="form-check-label" for="email_tickets">
                                                <strong>Ticket Confirmations</strong><br>
                                                <small class="text-muted">Receipts and ticket confirmations</small>
                                            </label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" type="checkbox" id="email_reminders" name="email_reminders" checked>
                                            <label class="form-check-label" for="email_reminders">
                                                <strong>Event Reminders</strong><br>
                                                <small class="text-muted">Reminders before events start</small>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" type="checkbox" id="email_marketing" name="email_marketing">
                                            <label class="form-check-label" for="email_marketing">
                                                <strong>Marketing & Promotions</strong><br>
                                                <small class="text-muted">Special offers and event recommendations</small>
                                            </label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" type="checkbox" id="email_newsletter" name="email_newsletter">
                                            <label class="form-check-label" for="email_newsletter">
                                                <strong>Newsletter</strong><br>
                                                <small class="text-muted">Weekly digest of upcoming events</small>
                                            </label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" type="checkbox" id="email_security" name="email_security" checked>
                                            <label class="form-check-label" for="email_security">
                                                <strong>Security Alerts</strong><br>
                                                <small class="text-muted">Login and security notifications</small>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <!-- SMS Notifications -->
                                <h5 class="mb-3">SMS Notifications</h5>
                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" type="checkbox" id="sms_reminders" name="sms_reminders">
                                            <label class="form-check-label" for="sms_reminders">
                                                <strong>Event Reminders</strong><br>
                                                <small class="text-muted">SMS reminders 1 hour before events</small>
                                            </label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" type="checkbox" id="sms_urgent" name="sms_urgent">
                                            <label class="form-check-label" for="sms_urgent">
                                                <strong>Urgent Updates</strong><br>
                                                <small class="text-muted">Important event changes or cancellations</small>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save me-2"></i>Save Preferences
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Billing & Payments -->
                <div class="tab-pane fade" id="billing">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-white border-bottom-0 pb-0">
                            <h4 class="mb-0">Billing & Payment Methods</h4>
                            <p class="text-muted mb-0">Manage your payment methods and billing history</p>
                        </div>
                        <div class="card-body">
                            <!-- Payment Methods -->
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5 class="mb-0">Payment Methods</h5>
                                <button class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addPaymentModal">
                                    <i class="fas fa-plus me-2"></i>Add Payment Method
                                </button>
                            </div>
                            
                            <div class="row mb-4">
                                <div class="col-md-6 mb-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between align-items-start">
                                                <div class="d-flex">
                                                    <i class="fab fa-cc-visa fa-2x text-primary me-3"></i>
                                                    <div>
                                                        <h6 class="mb-1">•••• •••• •••• 1234</h6>
                                                        <small class="text-muted">Expires 12/25</small>
                                                        <br><span class="badge bg-success">Primary</span>
                                                    </div>
                                                </div>
                                                <div class="dropdown">
                                                    <button class="btn btn-sm btn-outline-secondary" data-bs-toggle="dropdown">
                                                        <i class="fas fa-ellipsis-v"></i>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li><a class="dropdown-item" href="#">Edit</a></li>
                                                        <li><a class="dropdown-item text-danger" href="#">Remove</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Billing History -->
                            <h5 class="mb-3">Billing History</h5>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Description</th>
                                            <th>Amount</th>
                                            <th>Status</th>
                                            <th>Receipt</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ now()->format('M j, Y') }}</td>
                                            <td>Tech Conference 2024 - 2 tickets</td>
                                            <td>$198.00</td>
                                            <td><span class="badge bg-success">Paid</span></td>
                                            <td><a href="#" class="btn btn-sm btn-outline-primary">Download</a></td>
                                        </tr>
                                        <tr>
                                            <td>{{ now()->subDays(15)->format('M j, Y') }}</td>
                                            <td>Music Festival Pass</td>
                                            <td>$89.00</td>
                                            <td><span class="badge bg-success">Paid</span></td>
                                            <td><a href="#" class="btn btn-sm btn-outline-primary">Download</a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Preferences -->
                <div class="tab-pane fade" id="preferences">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-white border-bottom-0 pb-0">
                            <h4 class="mb-0">Account Preferences</h4>
                            <p class="text-muted mb-0">Customize your EventPro experience</p>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('preferences.update') }}" method="POST">
                                @csrf
                                @method('PUT')
                                
                                <!-- Display Preferences -->
                                <h5 class="mb-3">Display & Interface</h5>
                                <div class="row mb-4">
                                    <div class="col-md-6 mb-3">
                                        <label for="timezone" class="form-label">Timezone</label>
                                        <select class="form-select" id="timezone" name="timezone">
                                            <option value="America/New_York" selected>Eastern Time (ET)</option>
                                            <option value="America/Chicago">Central Time (CT)</option>
                                            <option value="America/Denver">Mountain Time (MT)</option>
                                            <option value="America/Los_Angeles">Pacific Time (PT)</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="language" class="form-label">Language</label>
                                        <select class="form-select" id="language" name="language">
                                            <option value="en" selected>English</option>
                                            <option value="es">Español</option>
                                            <option value="fr">Français</option>
                                            <option value="de">Deutsch</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Event Preferences -->
                                <h5 class="mb-3">Event Preferences</h5>
                                <div class="row mb-4">
                                    <div class="col-12 mb-3">
                                        <label class="form-label">Preferred Event Categories</label>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="cat_tech" name="categories[]" value="technology">
                                                    <label class="form-check-label" for="cat_tech">Technology</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="cat_business" name="categories[]" value="business">
                                                    <label class="form-check-label" for="cat_business">Business</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="cat_music" name="categories[]" value="music">
                                                    <label class="form-check-label" for="cat_music">Music</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="cat_sports" name="categories[]" value="sports">
                                                    <label class="form-check-label" for="cat_sports">Sports</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="cat_education" name="categories[]" value="education">
                                                    <label class="form-check-label" for="cat_education">Education</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="cat_health" name="categories[]" value="health">
                                                    <label class="form-check-label" for="cat_health">Health & Wellness</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save me-2"></i>Save Preferences
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Integrations -->
                <div class="tab-pane fade" id="integrations">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-white border-bottom-0 pb-0">
                            <h4 class="mb-0">Third-party Integrations</h4>
                            <p class="text-muted mb-0">Connect your favorite apps and services</p>
                        </div>
                        <div class="card-body">
                            <div class="row g-4">
                                <!-- Google Calendar -->
                                <div class="col-md-6">
                                    <div class="card h-100">
                                        <div class="card-body text-center">
                                            <i class="fab fa-google fa-3x text-danger mb-3"></i>
                                            <h5>Google Calendar</h5>
                                            <p class="text-muted">Sync your events with Google Calendar</p>
                                            <button class="btn btn-outline-danger">Connect</button>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Outlook -->
                                <div class="col-md-6">
                                    <div class="card h-100">
                                        <div class="card-body text-center">
                                            <i class="fab fa-microsoft fa-3x text-primary mb-3"></i>
                                            <h5>Microsoft Outlook</h5>
                                            <p class="text-muted">Sync with Outlook Calendar</p>
                                            <button class="btn btn-outline-primary">Connect</button>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Slack -->
                                <div class="col-md-6">
                                    <div class="card h-100">
                                        <div class="card-body text-center">
                                            <i class="fab fa-slack fa-3x text-info mb-3"></i>
                                            <h5>Slack</h5>
                                            <p class="text-muted">Get event notifications in Slack</p>
                                            <button class="btn btn-success">
                                                <i class="fas fa-check me-2"></i>Connected
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Zoom -->
                                <div class="col-md-6">
                                    <div class="card h-100">
                                        <div class="card-body text-center">
                                            <i class="fas fa-video fa-3x text-primary mb-3"></i>
                                            <h5>Zoom</h5>
                                            <p class="text-muted">Automatically create Zoom meetings</p>
                                            <button class="btn btn-outline-primary">Connect</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Payment Method Modal -->
<div class="modal fade" id="addPaymentModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Payment Method</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="card_number" class="form-label">Card Number</label>
                        <input type="text" class="form-control" id="card_number" placeholder="1234 5678 9012 3456">
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="exp_date" class="form-label">Expiry Date</label>
                            <input type="text" class="form-control" id="exp_date" placeholder="MM/YY">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="cvv" class="form-label">CVV</label>
                            <input type="text" class="form-control" id="cvv" placeholder="123">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="card_name" class="form-label">Cardholder Name</label>
                        <input type="text" class="form-control" id="card_name" placeholder="John Doe">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Add Card</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
// Profile picture preview
document.getElementById('avatar').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.querySelector('img').src = e.target.result;
        };
        reader.readAsDataURL(file);
    }
});

// Two-factor authentication toggle
document.getElementById('two_factor').addEventListener('change', function() {
    if (this.checked) {
        // Show setup modal or redirect to setup page
        alert('Two-factor authentication setup would be initiated here');
    } else {
        // Confirm disable
        if (confirm('Are you sure you want to disable two-factor authentication?')) {
            // Process disable
        } else {
            this.checked = true;
        }
    }
});
</script>
@endsection
