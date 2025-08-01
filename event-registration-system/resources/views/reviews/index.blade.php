@extends('layouts.app')

@section('title', 'Event Reviews - EventSmart')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <!-- Header -->
        <div class="col-12 mb-4">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h2 class="mb-1">Event Reviews & Ratings</h2>
                    <p class="text-muted mb-0">Share your experience and help others discover great events</p>
                </div>
                <div class="d-flex gap-2">
                    <select class="form-select" id="sortReviews">
                        <option value="newest">Newest First</option>
                        <option value="oldest">Oldest First</option>
                        <option value="highest">Highest Rated</option>
                        <option value="lowest">Lowest Rated</option>
                    </select>
                    <button class="btn btn-gradient" data-bs-toggle="modal" data-bs-target="#writeReviewModal">
                        <i class="fas fa-plus me-2"></i>Write Review
                    </button>
                </div>
            </div>
        </div>

        <!-- Review Summary -->
        <div class="col-12 mb-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-md-3 text-center">
                            <h1 class="display-4 mb-0 text-primary">4.7</h1>
                            <div class="mb-2">
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                            </div>
                            <p class="text-muted mb-0">Based on 1,247 reviews</p>
                        </div>
                        <div class="col-md-6">
                            <div class="rating-breakdown">
                                <div class="d-flex align-items-center mb-2">
                                    <span class="me-2">5</span>
                                    <i class="fas fa-star text-warning me-2"></i>
                                    <div class="progress flex-grow-1 me-3" style="height: 8px;">
                                        <div class="progress-bar bg-warning" style="width: 75%"></div>
                                    </div>
                                    <span class="text-muted">934</span>
                                </div>
                                <div class="d-flex align-items-center mb-2">
                                    <span class="me-2">4</span>
                                    <i class="fas fa-star text-warning me-2"></i>
                                    <div class="progress flex-grow-1 me-3" style="height: 8px;">
                                        <div class="progress-bar bg-warning" style="width: 15%"></div>
                                    </div>
                                    <span class="text-muted">187</span>
                                </div>
                                <div class="d-flex align-items-center mb-2">
                                    <span class="me-2">3</span>
                                    <i class="fas fa-star text-warning me-2"></i>
                                    <div class="progress flex-grow-1 me-3" style="height: 8px;">
                                        <div class="progress-bar bg-warning" style="width: 6%"></div>
                                    </div>
                                    <span class="text-muted">74</span>
                                </div>
                                <div class="d-flex align-items-center mb-2">
                                    <span class="me-2">2</span>
                                    <i class="fas fa-star text-warning me-2"></i>
                                    <div class="progress flex-grow-1 me-3" style="height: 8px;">
                                        <div class="progress-bar bg-warning" style="width: 3%"></div>
                                    </div>
                                    <span class="text-muted">37</span>
                                </div>
                                <div class="d-flex align-items-center">
                                    <span class="me-2">1</span>
                                    <i class="fas fa-star text-warning me-2"></i>
                                    <div class="progress flex-grow-1 me-3" style="height: 8px;">
                                        <div class="progress-bar bg-warning" style="width: 1%"></div>
                                    </div>
                                    <span class="text-muted">15</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="d-grid gap-2">
                                <button class="btn btn-outline-primary" onclick="showReviewStats()">
                                    <i class="fas fa-chart-bar me-2"></i>View Statistics
                                </button>
                                <button class="btn btn-outline-secondary" onclick="exportReviews()">
                                    <i class="fas fa-download me-2"></i>Export Reviews
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filter Reviews -->
        <div class="col-12 mb-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body py-3">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="btn-group" role="group">
                                <input type="radio" class="btn-check" name="ratingFilter" id="allRatings" checked>
                                <label class="btn btn-outline-primary" for="allRatings">All Ratings</label>

                                <input type="radio" class="btn-check" name="ratingFilter" id="rating5">
                                <label class="btn btn-outline-primary" for="rating5">5 Stars</label>

                                <input type="radio" class="btn-check" name="ratingFilter" id="rating4">
                                <label class="btn btn-outline-primary" for="rating4">4 Stars</label>

                                <input type="radio" class="btn-check" name="ratingFilter" id="rating3">
                                <label class="btn btn-outline-primary" for="rating3">3 Stars</label>

                                <input type="radio" class="btn-check" name="ratingFilter" id="rating2">
                                <label class="btn btn-outline-primary" for="rating2">2 Stars</label>

                                <input type="radio" class="btn-check" name="ratingFilter" id="rating1">
                                <label class="btn btn-outline-primary" for="rating1">1 Star</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fas fa-search"></i>
                                </span>
                                <input type="text" class="form-control" placeholder="Search reviews...">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Reviews List -->
        <div class="col-12">
            <div class="row g-4">
                <!-- Review Item 1 -->
                <div class="col-12">
                    <div class="card border-0 shadow-sm review-item" data-rating="5">
                        <div class="card-body">
                            <div class="d-flex align-items-start">
                                <img src="https://ui-avatars.com/api/?name=Sarah+Johnson&background=6366f1&color=fff&size=60"
                                     alt="Sarah Johnson" class="rounded-circle me-3" width="60" height="60">
                                <div class="flex-grow-1">
                                    <div class="d-flex justify-content-between align-items-start mb-2">
                                        <div>
                                            <h6 class="mb-1">Sarah Johnson</h6>
                                            <div class="d-flex align-items-center mb-1">
                                                <div class="me-3">
                                                    <i class="fas fa-star text-warning"></i>
                                                    <i class="fas fa-star text-warning"></i>
                                                    <i class="fas fa-star text-warning"></i>
                                                    <i class="fas fa-star text-warning"></i>
                                                    <i class="fas fa-star text-warning"></i>
                                                </div>
                                                <small class="text-muted">Tech Conference 2024 • 2 days ago</small>
                                            </div>
                                        </div>
                                        <div class="dropdown">
                                            <button class="btn btn-link btn-sm p-0" data-bs-toggle="dropdown">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li><a class="dropdown-item" href="#" onclick="reportReview(this)">Report review</a></li>
                                                <li><a class="dropdown-item" href="#" onclick="shareReview(this)">Share review</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <h6 class="review-title">Absolutely Outstanding Experience!</h6>
                                    <p class="review-content mb-3">
                                        This conference exceeded all my expectations! The speakers were world-class, the content was cutting-edge,
                                        and the networking opportunities were invaluable. The venue was perfect, the organization was flawless,
                                        and the food was exceptional. I learned so much and made incredible connections.
                                        Already looking forward to next year!
                                    </p>
                                    <div class="review-tags mb-3">
                                        <span class="badge bg-primary bg-opacity-10 text-primary me-2">Great Speakers</span>
                                        <span class="badge bg-success bg-opacity-10 text-success me-2">Well Organized</span>
                                        <span class="badge bg-info bg-opacity-10 text-info me-2">Networking</span>
                                        <span class="badge bg-warning bg-opacity-10 text-warning">Great Venue</span>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <button class="btn btn-link btn-sm p-0 me-3" onclick="likeReview(this)">
                                            <i class="far fa-thumbs-up me-1"></i>
                                            <span class="like-count">23</span> Helpful
                                        </button>
                                        <button class="btn btn-link btn-sm p-0 me-3" onclick="replyToReview(this)">
                                            <i class="far fa-comment me-1"></i>Reply
                                        </button>
                                        <span class="text-muted">Verified Attendee</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Review Item 2 -->
                <div class="col-12">
                    <div class="card border-0 shadow-sm review-item" data-rating="4">
                        <div class="card-body">
                            <div class="d-flex align-items-start">
                                <img src="https://ui-avatars.com/api/?name=Michael+Chen&background=059669&color=fff&size=60"
                                     alt="Michael Chen" class="rounded-circle me-3" width="60" height="60">
                                <div class="flex-grow-1">
                                    <div class="d-flex justify-content-between align-items-start mb-2">
                                        <div>
                                            <h6 class="mb-1">Michael Chen</h6>
                                            <div class="d-flex align-items-center mb-1">
                                                <div class="me-3">
                                                    <i class="fas fa-star text-warning"></i>
                                                    <i class="fas fa-star text-warning"></i>
                                                    <i class="fas fa-star text-warning"></i>
                                                    <i class="fas fa-star text-warning"></i>
                                                    <i class="far fa-star text-warning"></i>
                                                </div>
                                                <small class="text-muted">AI Workshop • 1 week ago</small>
                                            </div>
                                        </div>
                                        <div class="dropdown">
                                            <button class="btn btn-link btn-sm p-0" data-bs-toggle="dropdown">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li><a class="dropdown-item" href="#" onclick="reportReview(this)">Report review</a></li>
                                                <li><a class="dropdown-item" href="#" onclick="shareReview(this)">Share review</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <h6 class="review-title">Great Content, Minor Issues</h6>
                                    <p class="review-content mb-3">
                                        The workshop content was excellent and very informative. The instructor was knowledgeable and engaging.
                                        However, there were some technical issues with the demo setup that caused delays.
                                        The venue was a bit cramped for the number of attendees. Overall, still a valuable experience.
                                    </p>
                                    <div class="review-tags mb-3">
                                        <span class="badge bg-primary bg-opacity-10 text-primary me-2">Informative</span>
                                        <span class="badge bg-warning bg-opacity-10 text-warning me-2">Technical Issues</span>
                                        <span class="badge bg-info bg-opacity-10 text-info">Good Instructor</span>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <button class="btn btn-link btn-sm p-0 me-3" onclick="likeReview(this)">
                                            <i class="far fa-thumbs-up me-1"></i>
                                            <span class="like-count">15</span> Helpful
                                        </button>
                                        <button class="btn btn-link btn-sm p-0 me-3" onclick="replyToReview(this)">
                                            <i class="far fa-comment me-1"></i>Reply
                                        </button>
                                        <span class="text-muted">Verified Attendee</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Review Item 3 -->
                <div class="col-12">
                    <div class="card border-0 shadow-sm review-item" data-rating="5">
                        <div class="card-body">
                            <div class="d-flex align-items-start">
                                <img src="https://ui-avatars.com/api/?name=Emily+Davis&background=dc2626&color=fff&size=60"
                                     alt="Emily Davis" class="rounded-circle me-3" width="60" height="60">
                                <div class="flex-grow-1">
                                    <div class="d-flex justify-content-between align-items-start mb-2">
                                        <div>
                                            <h6 class="mb-1">Emily Davis</h6>
                                            <div class="d-flex align-items-center mb-1">
                                                <div class="me-3">
                                                    <i class="fas fa-star text-warning"></i>
                                                    <i class="fas fa-star text-warning"></i>
                                                    <i class="fas fa-star text-warning"></i>
                                                    <i class="fas fa-star text-warning"></i>
                                                    <i class="fas fa-star text-warning"></i>
                                                </div>
                                                <small class="text-muted">Digital Marketing Summit • 2 weeks ago</small>
                                            </div>
                                        </div>
                                        <div class="dropdown">
                                            <button class="btn btn-link btn-sm p-0" data-bs-toggle="dropdown">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li><a class="dropdown-item" href="#" onclick="reportReview(this)">Report review</a></li>
                                                <li><a class="dropdown-item" href="#" onclick="shareReview(this)">Share review</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <h6 class="review-title">Perfect for Marketing Professionals</h6>
                                    <p class="review-content mb-3">
                                        As a marketing manager, this summit was exactly what I needed. The sessions covered the latest trends,
                                        practical strategies, and real case studies. The networking was fantastic - I connected with industry leaders
                                        and potential partners. The swag bag was also amazing! Highly recommend for anyone in digital marketing.
                                    </p>
                                    <div class="review-tags mb-3">
                                        <span class="badge bg-primary bg-opacity-10 text-primary me-2">Practical</span>
                                        <span class="badge bg-success bg-opacity-10 text-success me-2">Industry Leaders</span>
                                        <span class="badge bg-info bg-opacity-10 text-info me-2">Case Studies</span>
                                        <span class="badge bg-warning bg-opacity-10 text-warning">Great Swag</span>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <button class="btn btn-link btn-sm p-0 me-3" onclick="likeReview(this)">
                                            <i class="far fa-thumbs-up me-1"></i>
                                            <span class="like-count">31</span> Helpful
                                        </button>
                                        <button class="btn btn-link btn-sm p-0 me-3" onclick="replyToReview(this)">
                                            <i class="far fa-comment me-1"></i>Reply
                                        </button>
                                        <span class="text-muted">Verified Attendee</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Load More -->
                <div class="col-12 text-center">
                    <button class="btn btn-outline-primary" onclick="loadMoreReviews()">
                        <i class="fas fa-plus me-2"></i>Load More Reviews
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Write Review Modal -->
<div class="modal fade" id="writeReviewModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Write a Review</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="reviewForm">
                    <div class="row g-4">
                        <div class="col-12">
                            <label class="form-label">Select Event</label>
                            <select class="form-select" required>
                                <option value="">Choose an event you attended...</option>
                                <option value="tech-conf">Tech Conference 2024</option>
                                <option value="marketing-summit">Digital Marketing Summit</option>
                                <option value="ai-workshop">AI Workshop</option>
                                <option value="startup-networking">Startup Networking Event</option>
                            </select>
                        </div>

                        <div class="col-12">
                            <label class="form-label">Overall Rating</label>
                            <div class="rating-input d-flex align-items-center">
                                <div class="star-rating me-3">
                                    <i class="fas fa-star" data-rating="1"></i>
                                    <i class="fas fa-star" data-rating="2"></i>
                                    <i class="fas fa-star" data-rating="3"></i>
                                    <i class="fas fa-star" data-rating="4"></i>
                                    <i class="fas fa-star" data-rating="5"></i>
                                </div>
                                <span class="rating-text text-muted">Click to rate</span>
                            </div>
                        </div>

                        <div class="col-12">
                            <label class="form-label">Review Title</label>
                            <input type="text" class="form-control" placeholder="Summarize your experience in a few words..." required>
                        </div>

                        <div class="col-12">
                            <label class="form-label">Your Review</label>
                            <textarea class="form-control" rows="5" placeholder="Tell others about your experience. What did you like? What could be improved?" required></textarea>
                            <div class="form-text">Minimum 50 characters</div>
                        </div>

                        <div class="col-12">
                            <label class="form-label">Tags (Optional)</label>
                            <div class="tag-input">
                                <div class="form-control tag-container d-flex flex-wrap align-items-center" style="min-height: 48px; cursor: text;" onclick="focusTagInput()">
                                    <input type="text" class="tag-input-field" placeholder="Add tags (e.g., great speakers, good food, networking)" style="border: none; outline: none; flex: 1; min-width: 200px;">
                                </div>
                                <div class="form-text">Press Enter to add tags</div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="recommendEvent" checked>
                                <label class="form-check-label" for="recommendEvent">
                                    I would recommend this event to others
                                </label>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="attendAgain" checked>
                                <label class="form-check-label" for="attendAgain">
                                    I would attend this event again
                                </label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-gradient" onclick="submitReview()">Submit Review</button>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    initializeReviewSystem();
});

function initializeReviewSystem() {
    // Initialize star rating
    const stars = document.querySelectorAll('.star-rating .fas');
    stars.forEach((star, index) => {
        star.addEventListener('click', function() {
            const rating = this.getAttribute('data-rating');
            setStarRating(rating);
        });

        star.addEventListener('mouseover', function() {
            const rating = this.getAttribute('data-rating');
            highlightStars(rating);
        });
    });

    document.querySelector('.star-rating').addEventListener('mouseleave', function() {
        const currentRating = this.getAttribute('data-current-rating') || 0;
        highlightStars(currentRating);
    });

    // Initialize tag input
    initializeTagInput();
}

function setStarRating(rating) {
    const starContainer = document.querySelector('.star-rating');
    starContainer.setAttribute('data-current-rating', rating);
    highlightStars(rating);

    const ratingText = document.querySelector('.rating-text');
    const ratingTexts = ['', 'Poor', 'Fair', 'Good', 'Very Good', 'Excellent'];
    ratingText.textContent = ratingTexts[rating];
}

function highlightStars(rating) {
    const stars = document.querySelectorAll('.star-rating .fas');
    stars.forEach((star, index) => {
        if (index < rating) {
            star.classList.add('text-warning');
            star.classList.remove('text-muted');
        } else {
            star.classList.add('text-muted');
            star.classList.remove('text-warning');
        }
    });
}

function initializeTagInput() {
    const tagInput = document.querySelector('.tag-input-field');
    const tagContainer = document.querySelector('.tag-container');

    tagInput.addEventListener('keydown', function(e) {
        if (e.key === 'Enter') {
            e.preventDefault();
            const tagText = this.value.trim();
            if (tagText) {
                addTag(tagText);
                this.value = '';
            }
        }
    });
}

function addTag(text) {
    const tagContainer = document.querySelector('.tag-container');
    const tagInput = document.querySelector('.tag-input-field');

    const tag = document.createElement('span');
    tag.className = 'badge bg-primary me-2 mb-2';
    tag.innerHTML = `${text} <i class="fas fa-times ms-1" onclick="removeTag(this)" style="cursor: pointer;"></i>`;

    tagContainer.insertBefore(tag, tagInput);
}

function removeTag(element) {
    element.closest('.badge').remove();
}

function focusTagInput() {
    document.querySelector('.tag-input-field').focus();
}

function likeReview(element) {
    const likeCount = element.querySelector('.like-count');
    const currentCount = parseInt(likeCount.textContent);
    const icon = element.querySelector('i');

    if (icon.classList.contains('far')) {
        icon.classList.remove('far');
        icon.classList.add('fas');
        likeCount.textContent = currentCount + 1;
        element.classList.add('text-primary');
    } else {
        icon.classList.remove('fas');
        icon.classList.add('far');
        likeCount.textContent = currentCount - 1;
        element.classList.remove('text-primary');
    }
}

function replyToReview(element) {
    showNotification('Reply feature coming soon!', 'info');
}

function reportReview(element) {
    if (confirm('Are you sure you want to report this review?')) {
        showNotification('Review reported successfully. Our team will review it.', 'success');
    }
}

function shareReview(element) {
    if (navigator.share) {
        navigator.share({
            title: 'Event Review',
            text: 'Check out this review on EventSmart',
            url: window.location.href
        });
    } else {
        // Fallback for browsers that don't support Web Share API
        navigator.clipboard.writeText(window.location.href);
        showNotification('Review link copied to clipboard!', 'success');
    }
}

function submitReview() {
    const form = document.getElementById('reviewForm');
    const rating = document.querySelector('.star-rating').getAttribute('data-current-rating');

    if (!rating) {
        showNotification('Please select a rating', 'error');
        return;
    }

    if (form.checkValidity()) {
        showNotification('Review submitted successfully! Thank you for your feedback.', 'success');

        // Close modal
        const modal = bootstrap.Modal.getInstance(document.getElementById('writeReviewModal'));
        modal.hide();

        // Reset form
        form.reset();
        setStarRating(0);
        document.querySelectorAll('.badge').forEach(badge => {
            if (badge.querySelector('.fa-times')) {
                badge.remove();
            }
        });
    } else {
        form.reportValidity();
    }
}

function loadMoreReviews() {
    showNotification('Loading more reviews...', 'info');

    setTimeout(() => {
        showNotification('No more reviews to load', 'info');
    }, 1000);
}

function showReviewStats() {
    showNotification('Review statistics feature coming soon!', 'info');
}

function exportReviews() {
    showNotification('Exporting reviews... Download will begin shortly.', 'success');
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

<style>
.star-rating .fas {
    font-size: 1.5rem;
    cursor: pointer;
    transition: color 0.2s ease;
    color: #dee2e6;
}

.star-rating .fas:hover {
    color: #ffc107 !important;
}

.tag-container {
    min-height: 48px;
    border: 1px solid #dee2e6;
    border-radius: 0.375rem;
    padding: 0.375rem 0.75rem;
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    gap: 0.25rem;
}

.tag-input-field {
    border: none !important;
    outline: none !important;
    flex: 1;
    min-width: 200px;
    background: transparent;
}

.review-item:hover {
    transform: translateY(-2px);
    transition: transform 0.2s ease, box-shadow 0.2s ease;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1) !important;
}

.review-title {
    font-weight: 600;
    color: #1f2937;
}

.review-content {
    line-height: 1.6;
    color: #4b5563;
}

.review-tags .badge {
    font-size: 0.75rem;
    padding: 0.25rem 0.5rem;
}

.rating-breakdown .progress {
    background-color: #f3f4f6;
}
</style>
@endsection
