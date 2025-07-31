@extends('layouts.app')

@section('title', 'Events - EventSmart')

@section('content')
<div class="container-fluid px-4 py-5">
    <!-- Header -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="h3 fw-bold mb-1">All Events</h1>
                    <p class="text-muted mb-0">Discover amazing events happening near you</p>
                </div>
                @auth
                    <div>
                        <a href="{{ route('events.create') }}" class="btn btn-gradient">
                            <i class="fas fa-plus me-2"></i>Create Event
                        </a>
                    </div>
                @endauth
            </div>
        </div>
    </div>

    <!-- Filters -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <form method="GET" action="{{ route('events.index') }}">
                        <div class="row g-3 align-items-end">
                            <div class="col-lg-3 col-md-6">
                                <label for="search" class="form-label">Search Events</label>
                                <input type="text" class="form-control" id="search" name="search"
                                       placeholder="Search by title or description" value="{{ request('search') }}">
                            </div>
                            <div class="col-lg-2 col-md-6">
                                <label for="category" class="form-label">Category</label>
                                <select class="form-select" id="category" name="category">
                                    <option value="">All Categories</option>
                                    <option value="technology" {{ request('category') == 'technology' ? 'selected' : '' }}>Technology</option>
                                    <option value="business" {{ request('category') == 'business' ? 'selected' : '' }}>Business</option>
                                    <option value="arts" {{ request('category') == 'arts' ? 'selected' : '' }}>Arts & Culture</option>
                                    <option value="music" {{ request('category') == 'music' ? 'selected' : '' }}>Music</option>
                                    <option value="sports" {{ request('category') == 'sports' ? 'selected' : '' }}>Sports</option>
                                    <option value="education" {{ request('category') == 'education' ? 'selected' : '' }}>Education</option>
                                </select>
                            </div>
                            <div class="col-lg-2 col-md-6">
                                <label for="date_from" class="form-label">From Date</label>
                                <input type="date" class="form-control" id="date_from" name="date_from" value="{{ request('date_from') }}">
                            </div>
                            <div class="col-lg-2 col-md-6">
                                <label for="date_to" class="form-label">To Date</label>
                                <input type="date" class="form-control" id="date_to" name="date_to" value="{{ request('date_to') }}">
                            </div>
                            <div class="col-lg-2 col-md-6">
                                <label for="location" class="form-label">Location</label>
                                <input type="text" class="form-control" id="location" name="location"
                                       placeholder="City or venue" value="{{ request('location') }}">
                            </div>
                            <div class="col-lg-1 col-md-6">
                                <button type="submit" class="btn btn-primary w-100">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Events Grid -->
    <div class="row g-4">
        <!-- Event Card 1 -->
        <div class="col-lg-4 col-md-6">
            <div class="card border-0 shadow-sm card-hover h-100">
                <div class="position-relative">
                    <img src="https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=400&h=250&fit=crop"
                         class="card-img-top" alt="Tech Conference 2024" style="height: 250px; object-fit: cover;">
                    <div class="position-absolute top-0 end-0 m-3">
                        <span class="badge bg-primary">Technology</span>
                    </div>
                    <div class="position-absolute bottom-0 start-0 m-3">
                        <span class="badge bg-dark">$99.00</span>
                    </div>
                </div>
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <h5 class="card-title mb-0">Tech Conference 2024</h5>
                        <small class="text-muted">
                            <i class="fas fa-calendar me-1"></i>Mar 15
                        </small>
                    </div>
                    <p class="text-muted mb-3">Join us for the biggest technology conference of the year featuring industry leaders and innovative sessions.</p>

                    <div class="d-flex align-items-center mb-3">
                        <i class="fas fa-map-marker-alt text-muted me-2"></i>
                        <span class="text-muted">Convention Center, New York</span>
                    </div>

                    <div class="d-flex align-items-center mb-3">
                        <i class="fas fa-clock text-muted me-2"></i>
                        <span class="text-muted">10:00 AM - 6:00 PM</span>
                    </div>

                    <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center">
                            <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center me-2" style="width: 30px; height: 30px; font-size: 12px;">
                                <i class="fas fa-building"></i>
                            </div>
                            <small class="text-muted">TechCorp Inc.</small>
                        </div>
                        <div>
                            <span class="text-success fw-bold">245/300 sold</span>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-white border-0 p-4 pt-0">
                    <div class="d-grid gap-2">
                        <a href="#" class="btn btn-outline-primary">
                            <i class="fas fa-eye me-2"></i>View Details
                        </a>
                        <a href="#" class="btn btn-gradient">
                            <i class="fas fa-ticket-alt me-2"></i>Register Now
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Event Card 2 -->
        <div class="col-lg-4 col-md-6">
            <div class="card border-0 shadow-sm card-hover h-100">
                <div class="position-relative">
                    <img src="https://images.unsplash.com/photo-1515187029135-18ee286d815b?w=400&h=250&fit=crop"
                         class="card-img-top" alt="Business Workshop" style="height: 250px; object-fit: cover;">
                    <div class="position-absolute top-0 end-0 m-3">
                        <span class="badge bg-success">Business</span>
                    </div>
                    <div class="position-absolute bottom-0 start-0 m-3">
                        <span class="badge bg-dark">$75.00</span>
                    </div>
                </div>
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <h5 class="card-title mb-0">Business Leadership Workshop</h5>
                        <small class="text-muted">
                            <i class="fas fa-calendar me-1"></i>Mar 22
                        </small>
                    </div>
                    <p class="text-muted mb-3">Enhance your leadership skills with practical workshops and networking opportunities with industry experts.</p>

                    <div class="d-flex align-items-center mb-3">
                        <i class="fas fa-map-marker-alt text-muted me-2"></i>
                        <span class="text-muted">Business Center, Los Angeles</span>
                    </div>

                    <div class="d-flex align-items-center mb-3">
                        <i class="fas fa-clock text-muted me-2"></i>
                        <span class="text-muted">2:00 PM - 5:00 PM</span>
                    </div>

                    <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center">
                            <div class="bg-warning text-white rounded-circle d-flex align-items-center justify-content-center me-2" style="width: 30px; height: 30px; font-size: 12px;">
                                <i class="fas fa-building"></i>
                            </div>
                            <small class="text-muted">BizLeaders LLC</small>
                        </div>
                        <div>
                            <span class="text-warning fw-bold">89/150 sold</span>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-white border-0 p-4 pt-0">
                    <div class="d-grid gap-2">
                        <a href="#" class="btn btn-outline-primary">
                            <i class="fas fa-eye me-2"></i>View Details
                        </a>
                        <a href="#" class="btn btn-gradient">
                            <i class="fas fa-ticket-alt me-2"></i>Register Now
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Event Card 3 -->
        <div class="col-lg-4 col-md-6">
            <div class="card border-0 shadow-sm card-hover h-100">
                <div class="position-relative">
                    <img src="https://images.unsplash.com/photo-1578662996442-48f60103fc96?w=400&h=250&fit=crop"
                         class="card-img-top" alt="Art Exhibition" style="height: 250px; object-fit: cover;">
                    <div class="position-absolute top-0 end-0 m-3">
                        <span class="badge bg-info">Arts & Culture</span>
                    </div>
                    <div class="position-absolute bottom-0 start-0 m-3">
                        <span class="badge bg-dark">Free</span>
                    </div>
                </div>
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <h5 class="card-title mb-0">Modern Art Exhibition</h5>
                        <small class="text-muted">
                            <i class="fas fa-calendar me-1"></i>Apr 5
                        </small>
                    </div>
                    <p class="text-muted mb-3">Explore contemporary artworks from emerging and established artists in our spacious gallery.</p>

                    <div class="d-flex align-items-center mb-3">
                        <i class="fas fa-map-marker-alt text-muted me-2"></i>
                        <span class="text-muted">City Art Gallery, Chicago</span>
                    </div>

                    <div class="d-flex align-items-center mb-3">
                        <i class="fas fa-clock text-muted me-2"></i>
                        <span class="text-muted">All Day Event</span>
                    </div>

                    <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center">
                            <div class="bg-info text-white rounded-circle d-flex align-items-center justify-content-center me-2" style="width: 30px; height: 30px; font-size: 12px;">
                                <i class="fas fa-building"></i>
                            </div>
                            <small class="text-muted">City Gallery</small>
                        </div>
                        <div>
                            <span class="text-info fw-bold">156/200 sold</span>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-white border-0 p-4 pt-0">
                    <div class="d-grid gap-2">
                        <a href="#" class="btn btn-outline-primary">
                            <i class="fas fa-eye me-2"></i>View Details
                        </a>
                        <a href="#" class="btn btn-gradient">
                            <i class="fas fa-ticket-alt me-2"></i>Register Now
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pagination -->
    <div class="row mt-5">
        <div class="col-12">
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
@endsection
