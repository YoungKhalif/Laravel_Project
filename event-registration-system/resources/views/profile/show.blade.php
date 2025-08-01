@extends('layouts.app')

@section('title', 'John Doe - Profile - EventSmart')

@section('content')
<div class="container py-5">
    <div class="row">
        <!-- Profile Header -->
        <div class="col-12 mb-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <div class="row align-items-center">
                        <div class="col-md-3 text-center">
                            <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=150&h=150&fit=crop&crop=face"
                                 class="rounded-circle mb-3" width="150" height="150" alt="Profile">
                            <div class="d-flex justify-content-center gap-2">
                                <button class="btn btn-outline-primary btn-sm" onclick="connectUser()">
                                    <i class="fas fa-user-plus me-1"></i>Connect
                                </button>
                                <button class="btn btn-outline-secondary btn-sm" onclick="sendMessage()">
                                    <i class="fas fa-envelope me-1"></i>Message
                                </button>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <div>
                                    <h2 class="mb-1">John Doe</h2>
                                    <p class="text-muted mb-2">Senior Software Engineer at TechCorp Inc.</p>
                                    <p class="mb-0">
                                        <i class="fas fa-map-marker-alt text-primary me-1"></i>New York, NY
                                        <span class="mx-2">•</span>
                                        <i class="fas fa-calendar text-primary me-1"></i>Joined March 2023
                                    </p>
                                </div>
                                <div class="text-end">
                                    <div class="dropdown">
                                        <button class="btn btn-outline-secondary btn-sm dropdown-toggle" data-bs-toggle="dropdown">
                                            <i class="fas fa-ellipsis-h"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#" onclick="reportUser()">
                                                <i class="fas fa-flag me-2"></i>Report User
                                            </a></li>
                                            <li><a class="dropdown-item" href="#" onclick="blockUser()">
                                                <i class="fas fa-ban me-2"></i>Block User
                                            </a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <p class="text-muted mb-3">
                                Passionate software engineer with 5+ years of experience in web development and cloud technologies.
                                Love attending tech conferences and networking with fellow developers.
                            </p>

                            <!-- Stats -->
                            <div class="row g-3">
                                <div class="col-md-3">
                                    <div class="text-center p-2 bg-light rounded">
                                        <h5 class="mb-1 text-primary">24</h5>
                                        <small class="text-muted">Events Attended</small>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="text-center p-2 bg-light rounded">
                                        <h5 class="mb-1 text-success">8</h5>
                                        <small class="text-muted">Events Organized</small>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="text-center p-2 bg-light rounded">
                                        <h5 class="mb-1 text-info">156</h5>
                                        <small class="text-muted">Connections</small>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="text-center p-2 bg-light rounded">
                                        <h5 class="mb-1 text-warning">4.8</h5>
                                        <small class="text-muted">Rating</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="col-lg-8">
            <!-- About Section -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white border-0 py-3">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-user text-primary me-2"></i>About
                    </h5>
                </div>
                <div class="card-body p-4">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <h6 class="mb-2">Professional Background</h6>
                            <p class="text-muted mb-0">
                                Senior Software Engineer with expertise in full-stack development,
                                cloud architecture, and team leadership. Specialized in React,
                                Node.js, and AWS technologies.
                            </p>
                        </div>
                        <div class="col-md-6">
                            <h6 class="mb-2">Interests</h6>
                            <div class="d-flex flex-wrap gap-1">
                                <span class="badge bg-light text-dark border">Technology</span>
                                <span class="badge bg-light text-dark border">AI/ML</span>
                                <span class="badge bg-light text-dark border">Cloud Computing</span>
                                <span class="badge bg-light text-dark border">Networking</span>
                                <span class="badge bg-light text-dark border">Startups</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h6 class="mb-2">Skills</h6>
                            <div class="d-flex flex-wrap gap-1">
                                <span class="badge bg-primary">JavaScript</span>
                                <span class="badge bg-primary">Python</span>
                                <span class="badge bg-primary">React</span>
                                <span class="badge bg-primary">Node.js</span>
                                <span class="badge bg-primary">AWS</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h6 class="mb-2">Links</h6>
                            <div class="d-flex gap-2">
                                <a href="https://linkedin.com/in/johndoe" target="_blank" class="btn btn-outline-primary btn-sm">
                                    <i class="fab fa-linkedin me-1"></i>LinkedIn
                                </a>
                                <a href="https://johndoe.dev" target="_blank" class="btn btn-outline-secondary btn-sm">
                                    <i class="fas fa-globe me-1"></i>Website
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Events -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white border-0 py-3">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-calendar text-primary me-2"></i>Recent Events
                    </h5>
                </div>
                <div class="card-body p-0">
                    <!-- Event Item -->
                    <div class="border-bottom p-3">
                        <div class="row align-items-center">
                            <div class="col-md-3">
                                <img src="https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=80&h=60&fit=crop"
                                     class="img-fluid rounded" alt="Event">
                            </div>
                            <div class="col-md-6">
                                <h6 class="mb-1">Tech Conference 2024</h6>
                                <p class="text-muted mb-1 small">March 15, 2024</p>
                                <span class="badge bg-success">Attended</span>
                            </div>
                            <div class="col-md-3 text-end">
                                <div class="text-warning mb-1">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <small class="text-muted">Rated 5/5</small>
                            </div>
                        </div>
                    </div>

                    <div class="border-bottom p-3">
                        <div class="row align-items-center">
                            <div class="col-md-3">
                                <img src="https://images.unsplash.com/photo-1515187029135-18ee286d815b?w=80&h=60&fit=crop"
                                     class="img-fluid rounded" alt="Event">
                            </div>
                            <div class="col-md-6">
                                <h6 class="mb-1">Digital Marketing Summit</h6>
                                <p class="text-muted mb-1 small">February 28, 2024</p>
                                <span class="badge bg-primary">Organized</span>
                            </div>
                            <div class="col-md-3 text-end">
                                <div class="text-muted mb-1">
                                    <i class="fas fa-users"></i> 150 attendees
                                </div>
                                <small class="text-muted">Successful event</small>
                            </div>
                        </div>
                    </div>

                    <div class="p-3">
                        <div class="row align-items-center">
                            <div class="col-md-3">
                                <img src="https://images.unsplash.com/photo-1591115765373-5207764f72e7?w=80&h=60&fit=crop"
                                     class="img-fluid rounded" alt="Event">
                            </div>
                            <div class="col-md-6">
                                <h6 class="mb-1">Startup Networking Night</h6>
                                <p class="text-muted mb-1 small">January 20, 2024</p>
                                <span class="badge bg-success">Attended</span>
                            </div>
                            <div class="col-md-3 text-end">
                                <div class="text-warning mb-1">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                </div>
                                <small class="text-muted">Rated 4/5</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Reviews Given -->
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-0 py-3">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-star text-primary me-2"></i>Reviews Given
                    </h5>
                </div>
                <div class="card-body p-4">
                    <div class="mb-4">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <h6 class="mb-0">Tech Conference 2024</h6>
                            <div class="text-warning">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                        <p class="text-muted mb-1 small">March 20, 2024</p>
                        <p class="mb-0">
                            "Amazing conference with excellent speakers and great networking opportunities.
                            The sessions on AI and machine learning were particularly insightful.
                            Highly recommend for anyone in the tech industry!"
                        </p>
                    </div>

                    <div class="mb-0">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <h6 class="mb-0">Startup Networking Night</h6>
                            <div class="text-warning">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                            </div>
                        </div>
                        <p class="text-muted mb-1 small">January 25, 2024</p>
                        <p class="mb-0">
                            "Great networking event with interesting startups. The venue was perfect and
                            the organization was smooth. Would love to see more events like this in the future."
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4">
            <!-- Contact Information -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white border-0 py-3">
                    <h6 class="card-title mb-0">
                        <i class="fas fa-address-card text-primary me-2"></i>Contact Information
                    </h6>
                </div>
                <div class="card-body p-3">
                    <div class="mb-3">
                        <small class="text-muted d-block">Email</small>
                        <span>john.doe@example.com</span>
                    </div>
                    <div class="mb-3">
                        <small class="text-muted d-block">Location</small>
                        <span>New York, NY</span>
                    </div>
                    <div class="mb-0">
                        <small class="text-muted d-block">Member Since</small>
                        <span>March 2023</span>
                    </div>
                </div>
            </div>

            <!-- Recent Activity -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white border-0 py-3">
                    <h6 class="card-title mb-0">
                        <i class="fas fa-clock text-primary me-2"></i>Recent Activity
                    </h6>
                </div>
                <div class="card-body p-0">
                    <div class="border-bottom p-3">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-star text-warning me-3"></i>
                            <div class="flex-grow-1">
                                <p class="mb-0 small">Rated Tech Conference 2024</p>
                                <p class="text-muted mb-0 small">2 days ago</p>
                            </div>
                        </div>
                    </div>
                    <div class="border-bottom p-3">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-ticket-alt text-primary me-3"></i>
                            <div class="flex-grow-1">
                                <p class="mb-0 small">Registered for AI Summit 2024</p>
                                <p class="text-muted mb-0 small">1 week ago</p>
                            </div>
                        </div>
                    </div>
                    <div class="p-3">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-user-plus text-success me-3"></i>
                            <div class="flex-grow-1">
                                <p class="mb-0 small">Connected with Jane Smith</p>
                                <p class="text-muted mb-0 small">2 weeks ago</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mutual Connections -->
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-0 py-3">
                    <h6 class="card-title mb-0">
                        <i class="fas fa-users text-primary me-2"></i>Mutual Connections (3)
                    </h6>
                </div>
                <div class="card-body p-3">
                    <div class="d-flex align-items-center mb-3">
                        <img src="https://images.unsplash.com/photo-1494790108755-2616b612b786?w=40&h=40&fit=crop&crop=face"
                             class="rounded-circle me-3" width="40" height="40">
                        <div>
                            <h6 class="mb-0">Jane Smith</h6>
                            <small class="text-muted">Product Manager</small>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=40&h=40&fit=crop&crop=face"
                             class="rounded-circle me-3" width="40" height="40">
                        <div>
                            <h6 class="mb-0">Mike Johnson</h6>
                            <small class="text-muted">UX Designer</small>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=40&h=40&fit=crop&crop=face"
                             class="rounded-circle me-3" width="40" height="40">
                        <div>
                            <h6 class="mb-0">Sarah Wilson</h6>
                            <small class="text-muted">Data Scientist</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
function connectUser() {
    showNotification('Connection request sent!', 'success');
}

function sendMessage() {
    // Open messaging modal or redirect to messages
    showNotification('Message feature coming soon!', 'info');
}

function reportUser() {
    if (confirm('Are you sure you want to report this user?')) {
        showNotification('User reported. Thank you for helping keep our community safe.', 'success');
    }
}

function blockUser() {
    if (confirm('Are you sure you want to block this user? They will no longer be able to contact you.')) {
        showNotification('User blocked successfully.', 'success');
    }
}

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
