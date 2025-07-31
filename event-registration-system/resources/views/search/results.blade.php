@extends('layouts.app')

@section('title', 'Search Results - EventSmart')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <!-- Search Header -->
        <div class="col-12 mb-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <div class="input-group input-group-lg">
                                <span class="input-group-text">
                                    <i class="fas fa-search"></i>
                                </span>
                                <input type="text" class="form-control" id="searchQuery"
                                       placeholder="Search events, companies, or topics..."
                                       value="{{ request('q', 'technology conference') }}">
                                <button class="btn btn-gradient" type="button" onclick="performSearch()">
                                    Search
                                </button>
                            </div>
                        </div>
                        <div class="col-md-4 text-end">
                            <div class="d-flex align-items-center justify-content-end">
                                <span class="text-muted me-3">Found <strong>247</strong> results</span>
                                <button class="btn btn-outline-primary" data-bs-toggle="collapse" data-bs-target="#advancedFilters">
                                    <i class="fas fa-filter me-2"></i>Filters
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Advanced Filters -->
                    <div class="collapse mt-4" id="advancedFilters">
                        <div class="border-top pt-4">
                            <div class="row g-3">
                                <div class="col-md-3">
                                    <label class="form-label">Category</label>
                                    <select class="form-select" id="categoryFilter">
                                        <option value="">All Categories</option>
                                        <option value="technology" selected>Technology</option>
                                        <option value="business">Business</option>
                                        <option value="education">Education</option>
                                        <option value="healthcare">Healthcare</option>
                                        <option value="arts">Arts & Culture</option>
                                        <option value="sports">Sports</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Date Range</label>
                                    <select class="form-select" id="dateFilter">
                                        <option value="">Any Date</option>
                                        <option value="today">Today</option>
                                        <option value="week">This Week</option>
                                        <option value="month" selected>This Month</option>
                                        <option value="quarter">Next 3 Months</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Price Range</label>
                                    <select class="form-select" id="priceFilter">
                                        <option value="">Any Price</option>
                                        <option value="free">Free</option>
                                        <option value="0-50">$0 - $50</option>
                                        <option value="50-100">$50 - $100</option>
                                        <option value="100-500">$100 - $500</option>
                                        <option value="500+">$500+</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Location</label>
                                    <select class="form-select" id="locationFilter">
                                        <option value="">Any Location</option>
                                        <option value="online">Online</option>
                                        <option value="new-york">New York</option>
                                        <option value="san-francisco">San Francisco</option>
                                        <option value="london">London</option>
                                        <option value="toronto">Toronto</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-12">
                                    <button class="btn btn-primary me-2" onclick="applyFilters()">Apply Filters</button>
                                    <button class="btn btn-outline-secondary" onclick="clearFilters()">Clear All</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Sidebar Filters -->
            <div class="col-lg-3 mb-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white border-0 py-3">
                        <h6 class="card-title mb-0">Refine Results</h6>
                    </div>
                    <div class="card-body">
                        <!-- Event Type -->
                        <div class="mb-4">
                            <h6 class="fw-bold mb-3">Event Type</h6>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="conference" checked>
                                <label class="form-check-label" for="conference">
                                    Conference <span class="text-muted">(89)</span>
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="workshop">
                                <label class="form-check-label" for="workshop">
                                    Workshop <span class="text-muted">(67)</span>
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="seminar">
                                <label class="form-check-label" for="seminar">
                                    Seminar <span class="text-muted">(45)</span>
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="networking">
                                <label class="form-check-label" for="networking">
                                    Networking <span class="text-muted">(32)</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="webinar">
                                <label class="form-check-label" for="webinar">
                                    Webinar <span class="text-muted">(14)</span>
                                </label>
                            </div>
                        </div>

                        <!-- Duration -->
                        <div class="mb-4">
                            <h6 class="fw-bold mb-3">Duration</h6>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="halfDay">
                                <label class="form-check-label" for="halfDay">
                                    Half Day <span class="text-muted">(56)</span>
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="fullDay" checked>
                                <label class="form-check-label" for="fullDay">
                                    Full Day <span class="text-muted">(112)</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="multiDay">
                                <label class="form-check-label" for="multiDay">
                                    Multi-Day <span class="text-muted">(79)</span>
                                </label>
                            </div>
                        </div>

                        <!-- Rating -->
                        <div class="mb-4">
                            <h6 class="fw-bold mb-3">Minimum Rating</h6>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" name="rating" id="rating5">
                                <label class="form-check-label" for="rating5">
                                    <div class="d-flex align-items-center">
                                        <span class="me-2">5</span>
                                        <i class="fas fa-star text-warning"></i>
                                        <span class="text-muted ms-2">(23)</span>
                                    </div>
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" name="rating" id="rating4" checked>
                                <label class="form-check-label" for="rating4">
                                    <div class="d-flex align-items-center">
                                        <span class="me-2">4+</span>
                                        <i class="fas fa-star text-warning"></i>
                                        <span class="text-muted ms-2">(156)</span>
                                    </div>
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" name="rating" id="rating3">
                                <label class="form-check-label" for="rating3">
                                    <div class="d-flex align-items-center">
                                        <span class="me-2">3+</span>
                                        <i class="fas fa-star text-warning"></i>
                                        <span class="text-muted ms-2">(201)</span>
                                    </div>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="rating" id="ratingAll">
                                <label class="form-check-label" for="ratingAll">
                                    All Ratings <span class="text-muted">(247)</span>
                                </label>
                            </div>
                        </div>

                        <!-- Features -->
                        <div class="mb-4">
                            <h6 class="fw-bold mb-3">Features</h6>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="certificates">
                                <label class="form-check-label" for="certificates">
                                    Certificates <span class="text-muted">(89)</span>
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="networking">
                                <label class="form-check-label" for="networking">
                                    Networking <span class="text-muted">(134)</span>
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="recordings">
                                <label class="form-check-label" for="recordings">
                                    Recordings <span class="text-muted">(67)</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="materials">
                                <label class="form-check-label" for="materials">
                                    Materials <span class="text-muted">(156)</span>
                                </label>
                            </div>
                        </div>

                        <button class="btn btn-gradient w-100">Apply Filters</button>
                    </div>
                </div>

                <!-- Save Search -->
                <div class="card border-0 shadow-sm mt-4">
                    <div class="card-body text-center">
                        <i class="fas fa-bell fa-2x text-primary mb-3"></i>
                        <h6>Save This Search</h6>
                        <p class="text-muted small mb-3">Get notified when new events match your criteria</p>
                        <button class="btn btn-outline-primary btn-sm" onclick="saveSearch()">
                            <i class="fas fa-save me-2"></i>Save Search
                        </button>
                    </div>
                </div>
            </div>

            <!-- Search Results -->
            <div class="col-lg-9">
                <!-- Sort Options -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div class="d-flex align-items-center">
                        <span class="text-muted me-3">Showing 1-12 of 247 results</span>
                        <div class="btn-group btn-group-sm" role="group">
                            <input type="radio" class="btn-check" name="viewMode" id="gridView" checked>
                            <label class="btn btn-outline-secondary" for="gridView">
                                <i class="fas fa-th"></i>
                            </label>

                            <input type="radio" class="btn-check" name="viewMode" id="listView">
                            <label class="btn btn-outline-secondary" for="listView">
                                <i class="fas fa-list"></i>
                            </label>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <label class="form-label me-2 mb-0">Sort by:</label>
                        <select class="form-select form-select-sm" style="width: auto;">
                            <option value="relevance">Relevance</option>
                            <option value="date">Date</option>
                            <option value="price-low">Price: Low to High</option>
                            <option value="price-high">Price: High to Low</option>
                            <option value="rating">Rating</option>
                            <option value="popularity">Popularity</option>
                        </select>
                    </div>
                </div>

                <!-- Results Grid -->
                <div class="search-results" id="searchResults">
                    <div class="row g-4">
                        <!-- Event Card 1 -->
                        <div class="col-md-6 col-xl-4">
                            <div class="card border-0 shadow-sm h-100 event-card">
                                <div class="position-relative">
                                    <img src="https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=400&h=200&fit=crop"
                                         class="card-img-top" alt="Tech Conference 2024" style="height: 200px; object-fit: cover;">
                                    <div class="position-absolute top-0 end-0 m-2">
                                        <button class="btn btn-light btn-sm rounded-circle" onclick="toggleWishlist(this)">
                                            <i class="far fa-heart"></i>
                                        </button>
                                    </div>
                                    <div class="position-absolute bottom-0 start-0 m-2">
                                        <span class="badge bg-primary">Conference</span>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-start mb-2">
                                        <h6 class="card-title mb-0">Tech Conference 2024</h6>
                                        <div class="text-end">
                                            <span class="text-primary fw-bold">$299</span>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center mb-2">
                                        <div class="me-2">
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                        </div>
                                        <small class="text-muted">4.9 (156 reviews)</small>
                                    </div>
                                    <p class="card-text text-muted small mb-3">Join industry leaders for cutting-edge insights into the future of technology.</p>
                                    <div class="row text-muted small mb-3">
                                        <div class="col-6">
                                            <i class="fas fa-calendar me-1"></i>
                                            Aug 15, 2025
                                        </div>
                                        <div class="col-6">
                                            <i class="fas fa-clock me-1"></i>
                                            9:00 AM
                                        </div>
                                    </div>
                                    <div class="row text-muted small mb-3">
                                        <div class="col-12">
                                            <i class="fas fa-map-marker-alt me-1"></i>
                                            San Francisco Convention Center
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="badge bg-success bg-opacity-10 text-success">245 spots left</span>
                                        <a href="/events/tech-conference-2024" class="btn btn-outline-primary btn-sm">View Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Event Card 2 -->
                        <div class="col-md-6 col-xl-4">
                            <div class="card border-0 shadow-sm h-100 event-card">
                                <div class="position-relative">
                                    <img src="https://images.unsplash.com/photo-1505373877841-8d25f7d46678?w=400&h=200&fit=crop"
                                         class="card-img-top" alt="AI Workshop" style="height: 200px; object-fit: cover;">
                                    <div class="position-absolute top-0 end-0 m-2">
                                        <button class="btn btn-light btn-sm rounded-circle" onclick="toggleWishlist(this)">
                                            <i class="fas fa-heart text-danger"></i>
                                        </button>
                                    </div>
                                    <div class="position-absolute bottom-0 start-0 m-2">
                                        <span class="badge bg-info">Workshop</span>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-start mb-2">
                                        <h6 class="card-title mb-0">AI & Machine Learning Workshop</h6>
                                        <div class="text-end">
                                            <span class="text-primary fw-bold">$149</span>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center mb-2">
                                        <div class="me-2">
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="far fa-star text-warning"></i>
                                        </div>
                                        <small class="text-muted">4.7 (89 reviews)</small>
                                    </div>
                                    <p class="card-text text-muted small mb-3">Hands-on workshop covering the latest AI technologies and practical implementations.</p>
                                    <div class="row text-muted small mb-3">
                                        <div class="col-6">
                                            <i class="fas fa-calendar me-1"></i>
                                            Aug 20, 2025
                                        </div>
                                        <div class="col-6">
                                            <i class="fas fa-clock me-1"></i>
                                            10:00 AM
                                        </div>
                                    </div>
                                    <div class="row text-muted small mb-3">
                                        <div class="col-12">
                                            <i class="fas fa-globe me-1"></i>
                                            Online Event
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="badge bg-warning bg-opacity-10 text-warning">12 spots left</span>
                                        <a href="/events/ai-workshop" class="btn btn-outline-primary btn-sm">View Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Event Card 3 -->
                        <div class="col-md-6 col-xl-4">
                            <div class="card border-0 shadow-sm h-100 event-card">
                                <div class="position-relative">
                                    <img src="https://images.unsplash.com/photo-1559136555-9303baea8ebd?w=400&h=200&fit=crop"
                                         class="card-img-top" alt="Digital Marketing Summit" style="height: 200px; object-fit: cover;">
                                    <div class="position-absolute top-0 end-0 m-2">
                                        <button class="btn btn-light btn-sm rounded-circle" onclick="toggleWishlist(this)">
                                            <i class="far fa-heart"></i>
                                        </button>
                                    </div>
                                    <div class="position-absolute bottom-0 start-0 m-2">
                                        <span class="badge bg-success">Summit</span>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-start mb-2">
                                        <h6 class="card-title mb-0">Digital Marketing Summit</h6>
                                        <div class="text-end">
                                            <span class="text-success fw-bold">Free</span>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center mb-2">
                                        <div class="me-2">
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                        </div>
                                        <small class="text-muted">4.8 (203 reviews)</small>
                                    </div>
                                    <p class="card-text text-muted small mb-3">Learn the latest digital marketing strategies from industry experts.</p>
                                    <div class="row text-muted small mb-3">
                                        <div class="col-6">
                                            <i class="fas fa-calendar me-1"></i>
                                            Aug 25, 2025
                                        </div>
                                        <div class="col-6">
                                            <i class="fas fa-clock me-1"></i>
                                            1:00 PM
                                        </div>
                                    </div>
                                    <div class="row text-muted small mb-3">
                                        <div class="col-12">
                                            <i class="fas fa-map-marker-alt me-1"></i>
                                            New York Business Center
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="badge bg-success bg-opacity-10 text-success">567 spots left</span>
                                        <a href="/events/digital-marketing-summit" class="btn btn-outline-primary btn-sm">View Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Additional cards would be repeated here -->
                        <div class="col-md-6 col-xl-4">
                            <div class="card border-0 shadow-sm h-100 event-card">
                                <div class="position-relative">
                                    <img src="https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?w=400&h=200&fit=crop"
                                         class="card-img-top" alt="Startup Networking" style="height: 200px; object-fit: cover;">
                                    <div class="position-absolute top-0 end-0 m-2">
                                        <button class="btn btn-light btn-sm rounded-circle" onclick="toggleWishlist(this)">
                                            <i class="far fa-heart"></i>
                                        </button>
                                    </div>
                                    <div class="position-absolute bottom-0 start-0 m-2">
                                        <span class="badge bg-warning">Networking</span>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-start mb-2">
                                        <h6 class="card-title mb-0">Startup Networking Event</h6>
                                        <div class="text-end">
                                            <span class="text-primary fw-bold">$25</span>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center mb-2">
                                        <div class="me-2">
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="far fa-star text-warning"></i>
                                        </div>
                                        <small class="text-muted">4.6 (134 reviews)</small>
                                    </div>
                                    <p class="card-text text-muted small mb-3">Connect with entrepreneurs, investors, and innovators in the startup ecosystem.</p>
                                    <div class="row text-muted small mb-3">
                                        <div class="col-6">
                                            <i class="fas fa-calendar me-1"></i>
                                            Sep 5, 2025
                                        </div>
                                        <div class="col-6">
                                            <i class="fas fa-clock me-1"></i>
                                            6:00 PM
                                        </div>
                                    </div>
                                    <div class="row text-muted small mb-3">
                                        <div class="col-12">
                                            <i class="fas fa-map-marker-alt me-1"></i>
                                            Innovation Hub, Toronto
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="badge bg-success bg-opacity-10 text-success">89 spots left</span>
                                        <a href="/events/startup-networking" class="btn btn-outline-primary btn-sm">View Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Load More Button -->
                        <div class="col-12 text-center mt-4">
                            <button class="btn btn-outline-primary" onclick="loadMoreResults()">
                                <i class="fas fa-plus me-2"></i>Load More Results
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    initializeSearchPage();
});

function initializeSearchPage() {
    // Initialize view mode toggle
    const viewModeButtons = document.querySelectorAll('input[name="viewMode"]');
    viewModeButtons.forEach(button => {
        button.addEventListener('change', function() {
            toggleViewMode(this.id);
        });
    });

    // Initialize search on enter
    document.getElementById('searchQuery').addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            performSearch();
        }
    });
}

function performSearch() {
    const query = document.getElementById('searchQuery').value;
    showNotification(`Searching for "${query}"...`, 'info');

    // Simulate search delay
    setTimeout(() => {
        showNotification('Search completed successfully!', 'success');
    }, 1000);
}

function applyFilters() {
    showNotification('Filters applied successfully!', 'success');
    // Simulate filtering results
}

function clearFilters() {
    // Reset all filter inputs
    document.querySelectorAll('#advancedFilters select').forEach(select => {
        select.selectedIndex = 0;
    });
    document.querySelectorAll('.form-check-input').forEach(checkbox => {
        checkbox.checked = false;
    });

    showNotification('All filters cleared', 'info');
}

function toggleViewMode(mode) {
    const resultsContainer = document.getElementById('searchResults');

    if (mode === 'listView') {
        resultsContainer.innerHTML = generateListView();
    } else {
        resultsContainer.innerHTML = generateGridView();
    }
}

function generateListView() {
    return `
        <div class="list-group">
            <div class="list-group-item border-0 shadow-sm mb-3 rounded">
                <div class="row align-items-center">
                    <div class="col-md-3">
                        <img src="https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=300&h=200&fit=crop"
                             class="img-fluid rounded" alt="Tech Conference 2024">
                    </div>
                    <div class="col-md-6">
                        <h6 class="mb-1">Tech Conference 2024</h6>
                        <div class="mb-2">
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <small class="text-muted ms-1">4.9 (156 reviews)</small>
                        </div>
                        <p class="text-muted mb-2">Join industry leaders for cutting-edge insights into the future of technology.</p>
                        <div class="d-flex align-items-center text-muted small">
                            <span class="me-3"><i class="fas fa-calendar me-1"></i>Aug 15, 2025</span>
                            <span class="me-3"><i class="fas fa-clock me-1"></i>9:00 AM</span>
                            <span><i class="fas fa-map-marker-alt me-1"></i>San Francisco</span>
                        </div>
                    </div>
                    <div class="col-md-3 text-end">
                        <div class="mb-2">
                            <span class="text-primary fw-bold h5">$299</span>
                        </div>
                        <div class="mb-2">
                            <span class="badge bg-success bg-opacity-10 text-success">245 spots left</span>
                        </div>
                        <a href="/events/tech-conference-2024" class="btn btn-primary btn-sm">View Details</a>
                    </div>
                </div>
            </div>
            <!-- More list items would be here -->
        </div>
    `;
}

function generateGridView() {
    // Return to original grid view
    location.reload();
}

function toggleWishlist(button) {
    const icon = button.querySelector('i');

    if (icon.classList.contains('far')) {
        icon.classList.remove('far');
        icon.classList.add('fas', 'text-danger');
        showNotification('Added to wishlist!', 'success');
    } else {
        icon.classList.remove('fas', 'text-danger');
        icon.classList.add('far');
        showNotification('Removed from wishlist', 'info');
    }
}

function saveSearch() {
    showNotification('Search saved! You will be notified when new matching events are added.', 'success');
}

function loadMoreResults() {
    showNotification('Loading more results...', 'info');

    setTimeout(() => {
        showNotification('No more results to load', 'info');
    }, 1000);
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
.event-card {
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}

.event-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15) !important;
}

.search-results .card-img-top {
    transition: transform 0.3s ease;
}

.event-card:hover .card-img-top {
    transform: scale(1.05);
}

.form-check-input:checked {
    background-color: rgb(99, 102, 241);
    border-color: rgb(99, 102, 241);
}

.btn-check:checked + .btn {
    background-color: rgb(99, 102, 241);
    border-color: rgb(99, 102, 241);
    color: white;
}

.list-group-item {
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}

.list-group-item:hover {
    transform: translateX(4px);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1) !important;
}
</style>
@endsection
