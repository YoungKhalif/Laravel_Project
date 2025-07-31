@extends('layouts.app')

@section('title', 'Company Registration - EventSmart')

@section('content')
<div class="container-fluid px-4 py-5">
    <!-- Header -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="text-center">
                <h1 class="h3 fw-bold mb-3">Register Your Company</h1>
                <p class="text-muted">Join our platform and start organizing amazing events for your company</p>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card border-0 shadow-lg">
                <div class="card-header gradient-bg text-white py-4">
                    <div class="text-center">
                        <h4 class="mb-0">
                            <i class="fas fa-building me-2"></i>Company Information
                        </h4>
                        <p class="mb-0 mt-2 opacity-75">Tell us about your organization</p>
                    </div>
                </div>
                <div class="card-body p-5">
                    <form method="POST" action="#" enctype="multipart/form-data">
                        @csrf

                        <!-- Company Logo -->
                        <div class="text-center mb-4">
                            <div class="position-relative d-inline-block">
                                <div id="logo-preview" class="bg-light border rounded-circle d-flex align-items-center justify-content-center"
                                     style="width: 120px; height: 120px;">
                                    <i class="fas fa-building fa-3x text-muted"></i>
                                </div>
                                <label for="logo" class="position-absolute bottom-0 end-0 btn btn-primary btn-sm rounded-circle"
                                       style="width: 35px; height: 35px; cursor: pointer;">
                                    <i class="fas fa-camera"></i>
                                </label>
                                <input type="file" id="logo" name="logo" class="d-none" accept="image/*">
                            </div>
                            <div class="mt-2">
                                <small class="text-muted">Upload your company logo (Max: 2MB)</small>
                            </div>
                        </div>

                        <div class="row g-4">
                            <!-- Company Name -->
                            <div class="col-md-6">
                                <label for="company_name" class="form-label">Company Name *</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fas fa-building text-muted"></i>
                                    </span>
                                    <input type="text" class="form-control" id="company_name" name="company_name"
                                           placeholder="Enter company name" required>
                                </div>
                            </div>

                            <!-- Industry -->
                            <div class="col-md-6">
                                <label for="industry" class="form-label">Industry *</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fas fa-industry text-muted"></i>
                                    </span>
                                    <select class="form-select" id="industry" name="industry" required>
                                        <option value="">Select Industry</option>
                                        <option value="technology">Technology</option>
                                        <option value="healthcare">Healthcare</option>
                                        <option value="finance">Finance</option>
                                        <option value="education">Education</option>
                                        <option value="retail">Retail</option>
                                        <option value="manufacturing">Manufacturing</option>
                                        <option value="consulting">Consulting</option>
                                        <option value="media">Media & Entertainment</option>
                                        <option value="nonprofit">Non-Profit</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Company Size -->
                            <div class="col-md-6">
                                <label for="company_size" class="form-label">Company Size *</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fas fa-users text-muted"></i>
                                    </span>
                                    <select class="form-select" id="company_size" name="company_size" required>
                                        <option value="">Select Size</option>
                                        <option value="1-10">1-10 employees</option>
                                        <option value="11-50">11-50 employees</option>
                                        <option value="51-200">51-200 employees</option>
                                        <option value="201-1000">201-1000 employees</option>
                                        <option value="1000+">1000+ employees</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Founded Year -->
                            <div class="col-md-6">
                                <label for="founded_year" class="form-label">Founded Year</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fas fa-calendar text-muted"></i>
                                    </span>
                                    <input type="number" class="form-control" id="founded_year" name="founded_year"
                                           min="1800" max="{{ date('Y') }}" placeholder="e.g., 2010">
                                </div>
                            </div>

                            <!-- Website -->
                            <div class="col-md-6">
                                <label for="website" class="form-label">Website</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fas fa-globe text-muted"></i>
                                    </span>
                                    <input type="url" class="form-control" id="website" name="website"
                                           placeholder="https://www.yourcompany.com">
                                </div>
                            </div>

                            <!-- LinkedIn -->
                            <div class="col-md-6">
                                <label for="linkedin" class="form-label">LinkedIn Profile</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fab fa-linkedin text-muted"></i>
                                    </span>
                                    <input type="url" class="form-control" id="linkedin" name="linkedin"
                                           placeholder="https://linkedin.com/company/yourcompany">
                                </div>
                            </div>

                            <!-- Company Description -->
                            <div class="col-12">
                                <label for="description" class="form-label">Company Description *</label>
                                <textarea class="form-control" id="description" name="description" rows="4"
                                          placeholder="Tell us about your company, what you do, and your mission..." required></textarea>
                            </div>

                            <!-- Contact Information -->
                            <div class="col-12">
                                <h5 class="mt-4 mb-3">
                                    <i class="fas fa-address-card text-primary me-2"></i>Contact Information
                                </h5>
                            </div>

                            <!-- Primary Contact Name -->
                            <div class="col-md-6">
                                <label for="contact_name" class="form-label">Primary Contact Name *</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fas fa-user text-muted"></i>
                                    </span>
                                    <input type="text" class="form-control" id="contact_name" name="contact_name"
                                           placeholder="Full name" required>
                                </div>
                            </div>

                            <!-- Contact Title -->
                            <div class="col-md-6">
                                <label for="contact_title" class="form-label">Contact Title *</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fas fa-id-badge text-muted"></i>
                                    </span>
                                    <input type="text" class="form-control" id="contact_title" name="contact_title"
                                           placeholder="e.g., Event Manager, CEO" required>
                                </div>
                            </div>

                            <!-- Contact Email -->
                            <div class="col-md-6">
                                <label for="contact_email" class="form-label">Contact Email *</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fas fa-envelope text-muted"></i>
                                    </span>
                                    <input type="email" class="form-control" id="contact_email" name="contact_email"
                                           placeholder="contact@company.com" required>
                                </div>
                            </div>

                            <!-- Contact Phone -->
                            <div class="col-md-6">
                                <label for="contact_phone" class="form-label">Contact Phone *</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fas fa-phone text-muted"></i>
                                    </span>
                                    <input type="tel" class="form-control" id="contact_phone" name="contact_phone"
                                           placeholder="+1 (555) 123-4567" required>
                                </div>
                            </div>

                            <!-- Address Information -->
                            <div class="col-12">
                                <h5 class="mt-4 mb-3">
                                    <i class="fas fa-map-marker-alt text-primary me-2"></i>Address Information
                                </h5>
                            </div>

                            <!-- Street Address -->
                            <div class="col-12">
                                <label for="address" class="form-label">Street Address *</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fas fa-map-pin text-muted"></i>
                                    </span>
                                    <input type="text" class="form-control" id="address" name="address"
                                           placeholder="123 Business Street" required>
                                </div>
                            </div>

                            <!-- City -->
                            <div class="col-md-4">
                                <label for="city" class="form-label">City *</label>
                                <input type="text" class="form-control" id="city" name="city"
                                       placeholder="New York" required>
                            </div>

                            <!-- State -->
                            <div class="col-md-4">
                                <label for="state" class="form-label">State/Province *</label>
                                <input type="text" class="form-control" id="state" name="state"
                                       placeholder="NY" required>
                            </div>

                            <!-- Country -->
                            <div class="col-md-4">
                                <label for="country" class="form-label">Country *</label>
                                <select class="form-select" id="country" name="country" required>
                                    <option value="">Select Country</option>
                                    <option value="US" selected>United States</option>
                                    <option value="CA">Canada</option>
                                    <option value="GB">United Kingdom</option>
                                    <option value="AU">Australia</option>
                                    <option value="DE">Germany</option>
                                    <option value="FR">France</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>

                            <!-- Additional Information -->
                            <div class="col-12">
                                <h5 class="mt-4 mb-3">
                                    <i class="fas fa-info-circle text-primary me-2"></i>Additional Information
                                </h5>
                            </div>

                            <!-- Event Types -->
                            <div class="col-12">
                                <label class="form-label">What types of events do you plan to organize? *</label>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="event_types[]" value="conferences" id="conferences">
                                            <label class="form-check-label" for="conferences">Conferences</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="event_types[]" value="workshops" id="workshops">
                                            <label class="form-check-label" for="workshops">Workshops</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="event_types[]" value="seminars" id="seminars">
                                            <label class="form-check-label" for="seminars">Seminars</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="event_types[]" value="networking" id="networking">
                                            <label class="form-check-label" for="networking">Networking Events</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="event_types[]" value="training" id="training">
                                            <label class="form-check-label" for="training">Training Sessions</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="event_types[]" value="exhibitions" id="exhibitions">
                                            <label class="form-check-label" for="exhibitions">Exhibitions</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="event_types[]" value="corporate" id="corporate">
                                            <label class="form-check-label" for="corporate">Corporate Events</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="event_types[]" value="festivals" id="festivals">
                                            <label class="form-check-label" for="festivals">Festivals</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="event_types[]" value="other" id="other_events">
                                            <label class="form-check-label" for="other_events">Other</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Expected Events Per Year -->
                            <div class="col-md-6">
                                <label for="events_per_year" class="form-label">Expected Events Per Year</label>
                                <select class="form-select" id="events_per_year" name="events_per_year">
                                    <option value="">Select Range</option>
                                    <option value="1-5">1-5 events</option>
                                    <option value="6-12">6-12 events</option>
                                    <option value="13-25">13-25 events</option>
                                    <option value="26-50">26-50 events</option>
                                    <option value="50+">50+ events</option>
                                </select>
                            </div>

                            <!-- How did you hear about us -->
                            <div class="col-md-6">
                                <label for="referral_source" class="form-label">How did you hear about us?</label>
                                <select class="form-select" id="referral_source" name="referral_source">
                                    <option value="">Please select</option>
                                    <option value="search_engine">Search Engine</option>
                                    <option value="social_media">Social Media</option>
                                    <option value="referral">Referral from friend/colleague</option>
                                    <option value="advertising">Online Advertising</option>
                                    <option value="conference">Conference/Event</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>

                            <!-- Terms and Conditions -->
                            <div class="col-12">
                                <div class="bg-light p-4 rounded mt-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="terms" id="terms" required>
                                        <label class="form-check-label" for="terms">
                                            I agree to the <a href="#" class="text-decoration-none fw-bold">Terms of Service</a> and
                                            <a href="#" class="text-decoration-none fw-bold">Privacy Policy</a> *
                                        </label>
                                    </div>
                                    <div class="form-check mt-2">
                                        <input class="form-check-input" type="checkbox" name="marketing" id="marketing">
                                        <label class="form-check-label" for="marketing">
                                            I would like to receive marketing emails about new features and updates
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="col-12">
                                <div class="d-grid gap-2 mt-4">
                                    <button type="submit" class="btn btn-gradient btn-lg">
                                        <i class="fas fa-building me-2"></i>Register Company
                                    </button>
                                    <p class="text-center text-muted mb-0">
                                        <small>Your registration will be reviewed within 24-48 hours</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Logo preview functionality
    const logoInput = document.getElementById('logo');
    const logoPreview = document.getElementById('logo-preview');

    logoInput.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                logoPreview.innerHTML = `<img src="${e.target.result}" class="w-100 h-100 rounded-circle" style="object-fit: cover;">`;
            };
            reader.readAsDataURL(file);
        }
    });
});
</script>
@endpush
@endsection
