@extends('layouts.app')

@section('title', 'Tech Conference 2024 - EventSmart')

@section('content')
<div class="container py-4">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/" class="text-decoration-none">Home</a></li>
            <li class="breadcrumb-item"><a href="/events" class="text-decoration-none">Events</a></li>
            <li class="breadcrumb-item active">Tech Conference 2024</li>
        </ol>
    </nav>

    <!-- Alert Messages -->
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="row g-4">
        <!-- Main Content -->
        <div class="col-lg-8">
            <!-- Event Header -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="position-relative">
                    <img src="https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=800&h=400&fit=crop"
                         class="card-img-top" style="height: 300px; object-fit: cover;" alt="Event Banner">
                    <div class="position-absolute top-0 end-0 m-3">
                        <span class="badge bg-success fs-6 px-3 py-2">
                            <i class="fas fa-calendar me-1"></i>Upcoming
                        </span>
                    </div>
                    <div class="position-absolute bottom-0 start-0 end-0 bg-gradient-to-t from-black/50 to-transparent text-white p-4">
                        <div class="d-flex justify-content-between align-items-end">
                            <div>
                                <h1 class="h2 mb-2 fw-bold">Tech Conference 2024</h1>
                                <p class="mb-0 fs-5">The Future of Technology</p>
                            </div>
                            <div class="text-end">
                                <div class="fs-3 fw-bold">$99</div>
                                <small>per ticket</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Event Details -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body p-4">
                    <div class="row g-4 mb-4">
                        <div class="col-md-6">
                            <div class="d-flex align-items-center mb-3">
                                <div class="bg-primary bg-opacity-10 rounded-circle p-3 me-3">
                                    <i class="fas fa-calendar text-primary"></i>
                                </div>
                                <div>
                                    <h6 class="mb-0">Date & Time</h6>
                                    <p class="text-muted mb-0">March 15, 2024</p>
                                    <p class="text-muted mb-0">10:00 AM - 6:00 PM EST</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-center mb-3">
                                <div class="bg-success bg-opacity-10 rounded-circle p-3 me-3">
                                    <i class="fas fa-map-marker-alt text-success"></i>
                                </div>
                                <div>
                                    <h6 class="mb-0">Location</h6>
                                    <p class="text-muted mb-0">Convention Center</p>
                                    <p class="text-muted mb-0">123 Main St, New York, NY 10001</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-center mb-3">
                                <div class="bg-info bg-opacity-10 rounded-circle p-3 me-3">
                                    <i class="fas fa-users text-info"></i>
                                </div>
                                <div>
                                    <h6 class="mb-0">Capacity</h6>
                                    <p class="text-muted mb-0">500 attendees</p>
                                    <p class="text-muted mb-0">245 tickets sold</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-center mb-3">
                                <div class="bg-warning bg-opacity-10 rounded-circle p-3 me-3">
                                    <i class="fas fa-building text-warning"></i>
                                </div>
                                <div>
                                    <h6 class="mb-0">Organizer</h6>
                                    <p class="text-muted mb-0">TechCorp Inc.</p>
                                    <a href="/companies/techcorp" class="text-decoration-none small">View Profile</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Actions -->
                    <div class="d-flex gap-2 mb-4">
                        <button class="btn btn-outline-primary btn-sm" onclick="shareEvent()">
                            <i class="fas fa-share me-1"></i>Share
                        </button>
                        <button class="btn btn-outline-secondary btn-sm" onclick="addToCalendar()">
                            <i class="fas fa-calendar-plus me-1"></i>Add to Calendar
                        </button>
                        <button class="btn btn-outline-danger btn-sm" onclick="toggleWishlist()">
                            <i class="fas fa-heart me-1"></i>Save
                        </button>
                    </div>

                    <!-- Event Description -->
                    <div class="mb-4">
                        <h5 class="mb-3">About This Event</h5>
                        <p class="text-muted mb-3">
                            Join us for the biggest technology conference of the year! This event brings together industry leaders,
                            innovators, and technology enthusiasts for a day of learning, networking, and inspiration.
                        </p>
                        <p class="text-muted mb-3">
                            Discover the latest trends in artificial intelligence, machine learning, blockchain, and more.
                            Connect with like-minded professionals and explore opportunities for collaboration and growth.
                        </p>

                        <h6 class="mb-2">What You'll Get:</h6>
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Access to all keynote sessions</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Networking lunch and coffee breaks</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Conference materials and swag bag</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Certificate of attendance</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Access to presentation slides</li>
                        </ul>
                    </div>

                    <!-- Agenda/Schedule -->
                    <div class="mb-4">
                        <h5 class="mb-3">Event Schedule</h5>
                        <div class="row g-3">
                            <div class="col-12">
                                <div class="d-flex align-items-start border-start border-primary border-3 ps-3">
                                    <div class="flex-shrink-0 me-3">
                                        <span class="badge bg-primary">10:00 AM</span>
                                    </div>
                                    <div>
                                        <h6 class="mb-1">Registration & Welcome Coffee</h6>
                                        <p class="text-muted mb-0 small">Check-in and networking</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-flex align-items-start border-start border-primary border-3 ps-3">
                                    <div class="flex-shrink-0 me-3">
                                        <span class="badge bg-primary">11:00 AM</span>
                                    </div>
                                    <div>
                                        <h6 class="mb-1">Opening Keynote: The Future of AI</h6>
                                        <p class="text-muted mb-0 small">By Dr. Sarah Johnson, MIT</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-flex align-items-start border-start border-primary border-3 ps-3">
                                    <div class="flex-shrink-0 me-3">
                                        <span class="badge bg-primary">12:30 PM</span>
                                    </div>
                                    <div>
                                        <h6 class="mb-1">Networking Lunch</h6>
                                        <p class="text-muted mb-0 small">Connect with fellow attendees</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-flex align-items-start border-start border-primary border-3 ps-3">
                                    <div class="flex-shrink-0 me-3">
                                        <span class="badge bg-primary">2:00 PM</span>
                                    </div>
                                    <div>
                                        <h6 class="mb-1">Panel: Blockchain & Cryptocurrency</h6>
                                        <p class="text-muted mb-0 small">Industry experts discuss the future</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-flex align-items-start border-start border-primary border-3 ps-3">
                                    <div class="flex-shrink-0 me-3">
                                        <span class="badge bg-primary">4:00 PM</span>
                                    </div>
                                    <div>
                                        <h6 class="mb-1">Closing Remarks & Networking</h6>
                                        <p class="text-muted mb-0 small">Final thoughts and connections</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Speakers -->
                    <div class="mb-4">
                        <h5 class="mb-3">Featured Speakers</h5>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="d-flex align-items-center">
                                    <img src="https://images.unsplash.com/photo-1494790108755-2616b612b786?w=60&h=60&fit=crop&crop=face"
                                         class="rounded-circle me-3" width="60" height="60">
                                    <div>
                                        <h6 class="mb-0">Dr. Sarah Johnson</h6>
                                        <p class="text-muted mb-0 small">AI Research Director, MIT</p>
                                        <p class="text-muted mb-0 small">Keynote Speaker</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-center">
                                    <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=60&h=60&fit=crop&crop=face"
                                         class="rounded-circle me-3" width="60" height="60">
                                    <div>
                                        <h6 class="mb-0">Michael Chen</h6>
                                        <p class="text-muted mb-0 small">CTO, TechCorp</p>
                                        <p class="text-muted mb-0 small">Panel Moderator</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tags -->
                    <div>
                        <h6 class="mb-2">Tags</h6>
                        <div class="d-flex flex-wrap gap-2">
                            <span class="badge bg-light text-dark border">Technology</span>
                            <span class="badge bg-light text-dark border">AI</span>
                            <span class="badge bg-light text-dark border">Machine Learning</span>
                            <span class="badge bg-light text-dark border">Blockchain</span>
                            <span class="badge bg-light text-dark border">Networking</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Reviews Section -->
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-0 py-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">
                            <i class="fas fa-star text-warning me-2"></i>Reviews & Ratings
                        </h5>
                        <div class="d-flex align-items-center">
                            <span class="text-warning me-2">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </span>
                            <span class="fw-bold">4.5</span>
                            <span class="text-muted ms-1">(23 reviews)</span>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Sample Reviews -->
                    <div class="border-bottom pb-3 mb-3">
                        <div class="d-flex align-items-start">
                            <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=40&h=40&fit=crop&crop=face"
                                 class="rounded-circle me-3" width="40" height="40">
                            <div class="flex-grow-1">
                                <div class="d-flex justify-content-between align-items-start mb-1">
                                    <h6 class="mb-0">John Smith</h6>
                                    <small class="text-muted">2 days ago</small>
                                </div>
                                <div class="text-warning mb-2">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <p class="text-muted mb-0">Amazing event! Great speakers and excellent networking opportunities. Highly recommend!</p>
                            </div>
                        </div>
                    </div>

                    <div class="text-center">
                        <button class="btn btn-outline-primary" onclick="showAllReviews()">
                            View All Reviews
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4">
            <!-- Registration Card -->
            <div class="card border-0 shadow-sm mb-4 position-sticky" style="top: 20px;">
                <div class="card-header bg-light border-0 py-3">
                    <h5 class="card-title mb-0 text-center">
                        <i class="fas fa-ticket-alt text-primary me-2"></i>Register Now
                    </h5>
                </div>
                <div class="card-body p-4">
                    <!-- Ticket Options -->
                    <div class="mb-4">
                        <h6 class="mb-3">Choose Your Ticket</h6>

                        <div class="border rounded p-3 mb-3 ticket-option" data-price="99" data-type="regular">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="ticket_type" id="regular" value="regular" checked>
                                <label class="form-check-label w-100" for="regular">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <strong>Regular Ticket</strong>
                                            <br><small class="text-muted">General admission</small>
                                        </div>
                                        <div class="text-end">
                                            <strong>$99</strong>
                                        </div>
                                    </div>
                                </label>
                            </div>
                        </div>

                        <div class="border rounded p-3 mb-3 ticket-option" data-price="199" data-type="vip">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="ticket_type" id="vip" value="vip">
                                <label class="form-check-label w-100" for="vip">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <strong>VIP Ticket</strong>
                                            <br><small class="text-muted">Premium access + lunch</small>
                                        </div>
                                        <div class="text-end">
                                            <strong>$199</strong>
                                        </div>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Quantity -->
                    <div class="mb-4">
                        <label class="form-label">Number of Tickets</label>
                        <div class="input-group">
                            <button class="btn btn-outline-secondary" type="button" onclick="changeQuantity(-1)">-</button>
                            <input type="number" class="form-control text-center" id="quantity" value="1" min="1" max="10">
                            <button class="btn btn-outline-secondary" type="button" onclick="changeQuantity(1)">+</button>
                        </div>
                    </div>

                    <!-- Total -->
                    <div class="border-top pt-3 mb-4">
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="fw-bold">Total:</span>
                            <span class="h5 text-primary mb-0" id="total-price">$99.00</span>
                        </div>
                    </div>

                    <!-- Register Button -->
                    @auth
                        <div class="d-grid mb-3">
                            <button class="btn btn-gradient btn-lg" onclick="proceedToPayment()">
                                <i class="fas fa-credit-card me-2"></i>Buy Tickets
                            </button>
                        </div>
                    @else
                        <div class="d-grid mb-3">
                            <a href="/auth/login" class="btn btn-gradient btn-lg">
                                <i class="fas fa-sign-in-alt me-2"></i>Login to Register
                            </a>
                        </div>
                    @endauth

                    <!-- Event Status -->
                    <div class="text-center">
                        <small class="text-success">
                            <i class="fas fa-check-circle me-1"></i>255 spots remaining
                        </small>
                    </div>
                </div>
            </div>

            <!-- Event Info -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white border-0 py-3">
                    <h6 class="card-title mb-0">
                        <i class="fas fa-info-circle text-info me-2"></i>Event Information
                    </h6>
                </div>
                <div class="card-body p-3">
                    <div class="mb-3">
                        <small class="text-muted d-block">Event ID</small>
                        <span class="font-monospace">#EV-2024-001</span>
                    </div>
                    <div class="mb-3">
                        <small class="text-muted d-block">Category</small>
                        <span class="badge bg-primary">Technology</span>
                    </div>
                    <div class="mb-3">
                        <small class="text-muted d-block">Language</small>
                        <span>English</span>
                    </div>
                    <div class="mb-0">
                        <small class="text-muted d-block">Dress Code</small>
                        <span>Business Casual</span>
                    </div>
                </div>
            </div>

            <!-- Share Event -->
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-0 py-3">
                    <h6 class="card-title mb-0">
                        <i class="fas fa-share text-success me-2"></i>Share This Event
                    </h6>
                </div>
                <div class="card-body p-3">
                    <div class="d-flex gap-2">
                        <button class="btn btn-outline-primary btn-sm flex-fill" onclick="shareToFacebook()">
                            <i class="fab fa-facebook"></i>
                        </button>
                        <button class="btn btn-outline-info btn-sm flex-fill" onclick="shareToTwitter()">
                            <i class="fab fa-twitter"></i>
                        </button>
                        <button class="btn btn-outline-success btn-sm flex-fill" onclick="shareToWhatsApp()">
                            <i class="fab fa-whatsapp"></i>
                        </button>
                        <button class="btn btn-outline-secondary btn-sm flex-fill" onclick="copyLink()">
                            <i class="fas fa-link"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    updateTotalPrice();

    // Ticket type change handler
    document.querySelectorAll('input[name="ticket_type"]').forEach(radio => {
        radio.addEventListener('change', updateTotalPrice);
    });
});

function changeQuantity(delta) {
    const quantityInput = document.getElementById('quantity');
    const currentValue = parseInt(quantityInput.value);
    const newValue = Math.max(1, Math.min(10, currentValue + delta));
    quantityInput.value = newValue;
    updateTotalPrice();
}

function updateTotalPrice() {
    const selectedTicket = document.querySelector('input[name="ticket_type"]:checked');
    const quantity = parseInt(document.getElementById('quantity').value);
    const price = parseFloat(selectedTicket.closest('.ticket-option').dataset.price);
    const total = price * quantity;

    document.getElementById('total-price').textContent = `$${total.toFixed(2)}`;
}

function proceedToPayment() {
    const selectedTicket = document.querySelector('input[name="ticket_type"]:checked').value;
    const quantity = document.getElementById('quantity').value;

    // Redirect to payment page with parameters
    window.location.href = `/tickets/payment?event=tech-conference-2024&type=${selectedTicket}&quantity=${quantity}`;
}

function shareEvent() {
    if (navigator.share) {
        navigator.share({
            title: 'Tech Conference 2024',
            text: 'Check out this amazing tech conference!',
            url: window.location.href
        });
    } else {
        copyLink();
    }
}

function addToCalendar() {
    const startDate = '20240315T100000';
    const endDate = '20240315T180000';
    const title = 'Tech Conference 2024';
    const location = 'Convention Center, 123 Main St, New York, NY 10001';

    const url = `https://calendar.google.com/calendar/render?action=TEMPLATE&text=${encodeURIComponent(title)}&dates=${startDate}/${endDate}&location=${encodeURIComponent(location)}`;
    window.open(url, '_blank');
}

function toggleWishlist() {
    // Toggle wishlist functionality
    const button = event.target.closest('button');
    const icon = button.querySelector('i');

    if (icon.classList.contains('fas')) {
        icon.classList.remove('fas');
        icon.classList.add('far');
        showNotification('Removed from wishlist', 'info');
    } else {
        icon.classList.remove('far');
        icon.classList.add('fas');
        showNotification('Added to wishlist', 'success');
    }
}

function shareToFacebook() {
    const url = `https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(window.location.href)}`;
    window.open(url, '_blank', 'width=600,height=400');
}

function shareToTwitter() {
    const text = 'Check out this amazing tech conference!';
    const url = `https://twitter.com/intent/tweet?text=${encodeURIComponent(text)}&url=${encodeURIComponent(window.location.href)}`;
    window.open(url, '_blank', 'width=600,height=400');
}

function shareToWhatsApp() {
    const text = `Check out this amazing tech conference! ${window.location.href}`;
    const url = `https://wa.me/?text=${encodeURIComponent(text)}`;
    window.open(url, '_blank');
}

function copyLink() {
    navigator.clipboard.writeText(window.location.href).then(function() {
        showNotification('Link copied to clipboard!', 'success');
    });
}

function showAllReviews() {
    window.location.href = '/events/tech-conference-2024/reviews';
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
