@extends('layouts.app')

@section('title', 'Page Not Found - EventSmart')

@section('content')
<div class="container-fluid vh-100 d-flex align-items-center justify-content-center">
    <div class="row justify-content-center w-100">
        <div class="col-lg-6 col-md-8 text-center">
            <div class="error-container">
                <!-- 404 Animation -->
                <div class="error-animation mb-4">
                    <div class="error-number">
                        <span class="digit-4 animate__animated animate__bounceInDown">4</span>
                        <span class="digit-0 animate__animated animate__bounceInDown animate__delay-1s">
                            <i class="fas fa-search-minus"></i>
                        </span>
                        <span class="digit-4 animate__animated animate__bounceInDown animate__delay-2s">4</span>
                    </div>
                </div>

                <!-- Error Message -->
                <div class="error-content">
                    <h1 class="error-title mb-3">Oops! Page Not Found</h1>
                    <p class="error-subtitle text-muted mb-4">
                        The page you're looking for doesn't exist or has been moved.
                        Don't worry, let's get you back on track!
                    </p>

                    <!-- Search Box -->
                    <div class="error-search mb-4">
                        <div class="input-group input-group-lg">
                            <span class="input-group-text">
                                <i class="fas fa-search"></i>
                            </span>
                            <input type="text" class="form-control" placeholder="Search for events, help articles..." id="errorPageSearch">
                            <button class="btn btn-gradient" type="button" onclick="searchFromErrorPage()">
                                Search
                            </button>
                        </div>
                    </div>

                    <!-- Quick Actions -->
                    <div class="error-actions mb-5">
                        <div class="row g-3 justify-content-center">
                            <div class="col-auto">
                                <a href="/" class="btn btn-primary btn-lg">
                                    <i class="fas fa-home me-2"></i>Go Home
                                </a>
                            </div>
                            <div class="col-auto">
                                <button class="btn btn-outline-primary btn-lg" onclick="goBack()">
                                    <i class="fas fa-arrow-left me-2"></i>Go Back
                                </button>
                            </div>
                            <div class="col-auto">
                                <a href="/support" class="btn btn-outline-secondary btn-lg">
                                    <i class="fas fa-life-ring me-2"></i>Get Help
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Popular Suggestions -->
                <div class="error-suggestions">
                    <h5 class="mb-4">Popular Pages</h5>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="card border-0 shadow-sm suggestion-card">
                                <div class="card-body text-start">
                                    <div class="d-flex align-items-center">
                                        <div class="suggestion-icon bg-primary bg-opacity-10 rounded-circle me-3 d-flex align-items-center justify-content-center"
                                             style="width: 48px; height: 48px;">
                                            <i class="fas fa-calendar text-primary"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-1">Browse Events</h6>
                                            <p class="text-muted small mb-0">Discover upcoming events in your area</p>
                                        </div>
                                    </div>
                                    <a href="/events" class="stretched-link"></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card border-0 shadow-sm suggestion-card">
                                <div class="card-body text-start">
                                    <div class="d-flex align-items-center">
                                        <div class="suggestion-icon bg-success bg-opacity-10 rounded-circle me-3 d-flex align-items-center justify-content-center"
                                             style="width: 48px; height: 48px;">
                                            <i class="fas fa-plus text-success"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-1">Create Event</h6>
                                            <p class="text-muted small mb-0">Start organizing your own event</p>
                                        </div>
                                    </div>
                                    <a href="/events/create" class="stretched-link"></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card border-0 shadow-sm suggestion-card">
                                <div class="card-body text-start">
                                    <div class="d-flex align-items-center">
                                        <div class="suggestion-icon bg-info bg-opacity-10 rounded-circle me-3 d-flex align-items-center justify-content-center"
                                             style="width: 48px; height: 48px;">
                                            <i class="fas fa-user text-info"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-1">My Dashboard</h6>
                                            <p class="text-muted small mb-0">Access your tickets and events</p>
                                        </div>
                                    </div>
                                    <a href="/dashboard" class="stretched-link"></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card border-0 shadow-sm suggestion-card">
                                <div class="card-body text-start">
                                    <div class="d-flex align-items-center">
                                        <div class="suggestion-icon bg-warning bg-opacity-10 rounded-circle me-3 d-flex align-items-center justify-content-center"
                                             style="width: 48px; height: 48px;">
                                            <i class="fas fa-question-circle text-warning"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-1">Help Center</h6>
                                            <p class="text-muted small mb-0">Get answers to common questions</p>
                                        </div>
                                    </div>
                                    <a href="/support" class="stretched-link"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Error Report -->
                <div class="error-report mt-5 pt-4 border-top">
                    <p class="text-muted small mb-2">
                        <i class="fas fa-bug me-2"></i>
                        Think this is a mistake?
                        <a href="#" class="text-decoration-none" onclick="reportError()">Report this error</a>
                    </p>
                    <p class="text-muted small mb-0">
                        Error Code: 404 | Request ID: {{ uniqid() }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Report Error Modal -->
<div class="modal fade" id="reportErrorModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Report Error</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="errorReportForm">
                    <div class="mb-3">
                        <label class="form-label">What were you trying to do?</label>
                        <textarea class="form-control" rows="3" placeholder="Describe what you were trying to access..." required></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">How did you get here?</label>
                        <select class="form-select" required>
                            <option value="">Select an option...</option>
                            <option value="link">Clicked a link</option>
                            <option value="bookmark">Used a bookmark</option>
                            <option value="typed">Typed the URL</option>
                            <option value="search">From search engine</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Your Email (optional)</label>
                        <input type="email" class="form-control" placeholder="your@email.com">
                        <div class="form-text">We'll contact you if we need more information</div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="submitErrorReport()">Send Report</button>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Add floating animation to search icon
    const searchIcon = document.querySelector('.digit-0 i');
    if (searchIcon) {
        setInterval(() => {
            searchIcon.style.transform = 'translateY(-5px)';
            setTimeout(() => {
                searchIcon.style.transform = 'translateY(0)';
            }, 500);
        }, 2000);
    }

    // Initialize search on enter
    document.getElementById('errorPageSearch').addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            searchFromErrorPage();
        }
    });

    // Add hover effects to suggestion cards
    const suggestionCards = document.querySelectorAll('.suggestion-card');
    suggestionCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-4px)';
        });
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });
});

function goBack() {
    if (window.history.length > 1) {
        window.history.back();
    } else {
        window.location.href = '/';
    }
}

function searchFromErrorPage() {
    const query = document.getElementById('errorPageSearch').value.trim();
    if (query) {
        window.location.href = `/search?q=${encodeURIComponent(query)}`;
    } else {
        showNotification('Please enter a search term', 'warning');
    }
}

function reportError() {
    const modal = new bootstrap.Modal(document.getElementById('reportErrorModal'));
    modal.show();
}

function submitErrorReport() {
    const form = document.getElementById('errorReportForm');

    if (form.checkValidity()) {
        showNotification('Error report submitted successfully. Thank you for helping us improve!', 'success');

        // Close modal and reset form
        const modal = bootstrap.Modal.getInstance(document.getElementById('reportErrorModal'));
        modal.hide();
        form.reset();
    } else {
        form.reportValidity();
    }
}

function showNotification(message, type) {
    const notification = document.createElement('div');
    notification.className = `alert alert-${type === 'success' ? 'success' : type === 'error' ? 'danger' : type === 'warning' ? 'warning' : 'info'} alert-dismissible fade show position-fixed`;
    notification.style.cssText = 'top: 20px; right: 20px; z-index: 1050; min-width: 300px;';
    notification.innerHTML = `
        <i class="fas fa-${type === 'success' ? 'check-circle' : type === 'error' ? 'exclamation-circle' : type === 'warning' ? 'exclamation-triangle' : 'info-circle'} me-2"></i>
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

<style>
.error-container {
    max-width: 600px;
    margin: 0 auto;
}

.error-number {
    font-size: 8rem;
    font-weight: 900;
    color: #6366f1;
    line-height: 1;
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 1rem;
}

.digit-0 {
    display: flex;
    align-items: center;
    justify-content: center;
}

.digit-0 i {
    font-size: 6rem;
    transition: transform 0.5s ease;
}

.error-title {
    font-size: 2.5rem;
    font-weight: 700;
    color: #1f2937;
}

.error-subtitle {
    font-size: 1.1rem;
    max-width: 500px;
    margin: 0 auto;
}

.suggestion-card {
    transition: all 0.3s ease;
    cursor: pointer;
    height: 100%;
}

.suggestion-card:hover {
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15) !important;
}

.suggestion-icon {
    transition: transform 0.2s ease;
}

.suggestion-card:hover .suggestion-icon {
    transform: scale(1.1);
}

.error-search .form-control:focus {
    border-color: #6366f1;
    box-shadow: 0 0 0 0.2rem rgba(99, 102, 241, 0.25);
}

.error-actions .btn {
    min-width: 120px;
}

.error-report {
    opacity: 0.7;
}

.error-report a:hover {
    opacity: 1;
}

@media (max-width: 768px) {
    .error-number {
        font-size: 6rem;
        gap: 0.5rem;
    }

    .digit-0 i {
        font-size: 4rem;
    }

    .error-title {
        font-size: 2rem;
    }

    .error-subtitle {
        font-size: 1rem;
    }

    .error-actions .btn {
        min-width: auto;
        width: 100%;
    }
}

/* Animation delays */
.animate__delay-1s {
    animation-delay: 0.3s;
}

.animate__delay-2s {
    animation-delay: 0.6s;
}

/* Custom bounce effect for better visibility */
@keyframes floatSearch {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-10px); }
}

.digit-0 i {
    animation: floatSearch 3s ease-in-out infinite;
    animation-delay: 1s;
}
</style>
@endsection
