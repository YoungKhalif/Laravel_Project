@extends('layouts.app')

@section('title', 'Register Company - EventSmart')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <!-- Header -->
            <div class="text-center mb-5">
                <h2 class="fw-bold mb-3">Register Your Company</h2>
                <p class="text-muted">Join our platform as an event organizer and start creating amazing events</p>
            </div>

            <!-- Registration Form -->
            <div class="card border-0 shadow-sm">
                <div class="card-body p-5">
                    <form method="POST" action="{{ route('companies.store') }}" enctype="multipart/form-data">
                        @csrf

                        <!-- Company Information -->
                        <div class="mb-4">
                            <h5 class="text-primary mb-3">
                                <i class="fas fa-building me-2"></i>Company Information
                            </h5>
                            
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="name" class="form-label">Company Name *</label>
                                    <input type="text" 
                                           class="form-control @error('name') is-invalid @enderror" 
                                           id="name" 
                                           name="name" 
                                           value="{{ old('name') }}" 
                                           required
                                           placeholder="Enter company name">
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="col-md-6">
                                    <label for="registration_number" class="form-label">Registration Number *</label>
                                    <input type="text" 
                                           class="form-control @error('registration_number') is-invalid @enderror" 
                                           id="registration_number" 
                                           name="registration_number" 
                                           value="{{ old('registration_number') }}" 
                                           required
                                           placeholder="Company registration number">
                                    @error('registration_number')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="col-12">
                                    <label for="description" class="form-label">Company Description *</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" 
                                              id="description" 
                                              name="description" 
                                              rows="4" 
                                              required
                                              placeholder="Describe your company and what types of events you organize">{{ old('description') }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Contact Information -->
                        <div class="mb-4">
                            <h5 class="text-primary mb-3">
                                <i class="fas fa-envelope me-2"></i>Contact Information
                            </h5>
                            
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email Address *</label>
                                    <input type="email" 
                                           class="form-control @error('email') is-invalid @enderror" 
                                           id="email" 
                                           name="email" 
                                           value="{{ old('email') }}" 
                                           required
                                           placeholder="company@example.com">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="col-md-6">
                                    <label for="phone" class="form-label">Phone Number *</label>
                                    <input type="tel" 
                                           class="form-control @error('phone') is-invalid @enderror" 
                                           id="phone" 
                                           name="phone" 
                                           value="{{ old('phone') }}" 
                                           required
                                           placeholder="+1 (555) 123-4567">
                                    @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="col-md-6">
                                    <label for="website" class="form-label">Website</label>
                                    <input type="url" 
                                           class="form-control @error('website') is-invalid @enderror" 
                                           id="website" 
                                           name="website" 
                                           value="{{ old('website') }}"
                                           placeholder="https://www.company.com">
                                    @error('website')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="col-md-6">
                                    <label for="logo" class="form-label">Company Logo</label>
                                    <input type="file" 
                                           class="form-control @error('logo') is-invalid @enderror" 
                                           id="logo" 
                                           name="logo"
                                           accept="image/*">
                                    <small class="text-muted">Recommended: 300x300px, max 2MB</small>
                                    @error('logo')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="col-12">
                                    <label for="address" class="form-label">Business Address *</label>
                                    <textarea class="form-control @error('address') is-invalid @enderror" 
                                              id="address" 
                                              name="address" 
                                              rows="3" 
                                              required
                                              placeholder="Enter complete business address">{{ old('address') }}</textarea>
                                    @error('address')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Terms and Conditions -->
                        <div class="mb-4">
                            <div class="card bg-light border-0">
                                <div class="card-body">
                                    <h6 class="text-primary mb-3">
                                        <i class="fas fa-info-circle me-2"></i>Verification Process
                                    </h6>
                                    <ul class="list-unstyled mb-0">
                                        <li class="mb-2">
                                            <i class="fas fa-check text-success me-2"></i>
                                            Your company will be reviewed by our team
                                        </li>
                                        <li class="mb-2">
                                            <i class="fas fa-check text-success me-2"></i>
                                            Verification typically takes 2-3 business days
                                        </li>
                                        <li class="mb-2">
                                            <i class="fas fa-check text-success me-2"></i>
                                            You'll receive an email once approved
                                        </li>
                                        <li class="mb-0">
                                            <i class="fas fa-check text-success me-2"></i>
                                            Only verified companies can create events
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <div class="form-check">
                                <input class="form-check-input @error('terms') is-invalid @enderror" 
                                       type="checkbox" 
                                       id="terms" 
                                       name="terms" 
                                       required>
                                <label class="form-check-label" for="terms">
                                    I agree to the <a href="#" class="text-decoration-none">Terms of Service</a> 
                                    and <a href="#" class="text-decoration-none">Privacy Policy</a>
                                </label>
                                @error('terms')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-gradient btn-lg">
                                <i class="fas fa-paper-plane me-2"></i>Submit for Review
                            </button>
                            <a href="{{ route('companies.index') }}" class="btn btn-outline-secondary">
                                <i class="fas fa-arrow-left me-2"></i>Back to Companies
                            </a>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Additional Information -->
            <div class="row mt-5">
                <div class="col-md-4">
                    <div class="text-center">
                        <div class="bg-primary text-white rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center"
                             style="width: 60px; height: 60px;">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <h6>Verified & Secure</h6>
                        <small class="text-muted">All companies are verified before approval</small>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="text-center">
                        <div class="bg-success text-white rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center"
                             style="width: 60px; height: 60px;">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <h6>Growth Opportunities</h6>
                        <small class="text-muted">Reach thousands of potential attendees</small>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="text-center">
                        <div class="bg-info text-white rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center"
                             style="width: 60px; height: 60px;">
                            <i class="fas fa-headset"></i>
                        </div>
                        <h6>24/7 Support</h6>
                        <small class="text-muted">Dedicated support for event organizers</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Logo preview
    const logoInput = document.getElementById('logo');
    if (logoInput) {
        logoInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                // Check file size (2MB)
                if (file.size > 2 * 1024 * 1024) {
                    alert('File size must be less than 2MB');
                    this.value = '';
                    return;
                }
                
                // Show preview
                const reader = new FileReader();
                reader.onload = function(e) {
                    let preview = document.getElementById('logo-preview');
                    if (!preview) {
                        preview = document.createElement('img');
                        preview.id = 'logo-preview';
                        preview.className = 'img-thumbnail mt-2';
                        preview.style.maxWidth = '150px';
                        logoInput.parentNode.appendChild(preview);
                    }
                    preview.src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });
    }
});
</script>
@endpush
