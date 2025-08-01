@extends('layouts.app')

@section('title', 'Companies - EventPro')

@section('content')
<section class="py-5">
    <div class="container py-4">
        <div class="row mb-5">
            <div class="col-md-8">
                <h2 class="fw-bold">Event Organizations</h2>
                <p class="text-muted lead">Discover trusted companies organizing events</p>
            </div>
            <div class="col-md-4 text-md-end">
                <a href="{{ route('companies.create') }}" class="btn btn-primary-custom rounded-pill">
                    <i class="fas fa-plus me-2"></i>Register Organization
                </a>
            </div>
        </div>

        <!-- Search Section -->
        <div class="card border-0 shadow-sm mb-5">
            <div class="card-body p-4">
                <form action="{{ route('companies.index') }}" method="GET">
                    <div class="row g-3">
                        <div class="col-lg-8">
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="fas fa-search text-muted"></i>
                                </span>
                                <input type="text" class="form-control border-start-0 ps-0"
                                       placeholder="Search organizations..." name="search" value="{{ request('search') }}">
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-6">
                            <select class="form-select" name="sort_by">
                                <option value="name" {{ request('sort_by') == 'name' ? 'selected' : '' }}>Name</option>
                                <option value="newest" {{ request('sort_by') == 'newest' ? 'selected' : '' }}>Newest</option>
                                <option value="events" {{ request('sort_by') == 'events' ? 'selected' : '' }}>Most Events</option>
                            </select>
                        </div>

                        <div class="col-lg-2 col-md-6">
                            <button type="submit" class="btn btn-primary-custom w-100">
                                <i class="fas fa-filter me-2"></i>Filter
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Companies Grid -->
        <div class="row g-4">
            <!-- Company Card 1 -->
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm card-hover h-100">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-4">
                            <div class="company-logo me-3 bg-light rounded-circle">
                                <i class="fas fa-building text-primary"></i>
                            </div>
                            <div>
                                <h5 class="fw-bold mb-1">TechEvents Inc.</h5>
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-star text-warning me-1"></i>
                                    <span class="me-2">4.8</span>
                                    <span class="text-muted small">(120 reviews)</span>
                                </div>
                            </div>
                        </div>

                        <p class="text-muted mb-3">Leading provider of technology conferences and networking events for IT professionals and developers.</p>

                        <div class="d-flex align-items-center small text-muted mb-3">
                            <i class="fas fa-map-marker-alt me-2"></i>
                            <span>San Francisco, CA</span>
                        </div>

                        <div class="d-flex align-items-center small text-muted mb-4">
                            <i class="fas fa-calendar-alt me-2"></i>
                            <span>15 upcoming events</span>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="#" class="btn btn-sm btn-outline-secondary">
                                <i class="fas fa-external-link-alt me-1"></i>
                                Website
                            </a>
                            <a href="#" class="btn btn-sm btn-primary-custom">
                                View Profile
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Company Card 2 -->
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm card-hover h-100">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-4">
                            <div class="company-logo me-3 bg-light rounded-circle">
                                <i class="fas fa-music text-primary"></i>
                            </div>
                            <div>
                                <h5 class="fw-bold mb-1">Music Festival Group</h5>
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-star text-warning me-1"></i>
                                    <span class="me-2">4.6</span>
                                    <span class="text-muted small">(85 reviews)</span>
                                </div>
                            </div>
                        </div>

                        <p class="text-muted mb-3">Organizers of world-class music festivals featuring top artists from various genres and amazing experiences.</p>

                        <div class="d-flex align-items-center small text-muted mb-3">
                            <i class="fas fa-map-marker-alt me-2"></i>
                            <span>Austin, TX</span>
                        </div>

                        <div class="d-flex align-items-center small text-muted mb-4">
                            <i class="fas fa-calendar-alt me-2"></i>
                            <span>8 upcoming events</span>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="#" class="btn btn-sm btn-outline-secondary">
                                <i class="fas fa-external-link-alt me-1"></i>
                                Website
                            </a>
                            <a href="#" class="btn btn-sm btn-primary-custom">
                                View Profile
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Company Card 3 -->
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm card-hover h-100">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-4">
                            <div class="company-logo me-3 bg-light rounded-circle">
                                <i class="fas fa-briefcase text-primary"></i>
                            </div>
                            <div>
                                <h5 class="fw-bold mb-1">Business Summit Co.</h5>
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-star text-warning me-1"></i>
                                    <span class="me-2">4.9</span>
                                    <span class="text-muted small">(210 reviews)</span>
                                </div>
                            </div>
                        </div>

                        <p class="text-muted mb-3">Expert organizers of business conferences, leadership workshops, and professional development events.</p>

                        <div class="d-flex align-items-center small text-muted mb-3">
                            <i class="fas fa-map-marker-alt me-2"></i>
                            <span>New York, NY</span>
                        </div>

                        <div class="d-flex align-items-center small text-muted mb-4">
                            <i class="fas fa-calendar-alt me-2"></i>
                            <span>12 upcoming events</span>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="#" class="btn btn-sm btn-outline-secondary">
                                <i class="fas fa-external-link-alt me-1"></i>
                                Website
                            </a>
                            <a href="#" class="btn btn-sm btn-primary-custom">
                                View Profile
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Company Card 4 -->
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm card-hover h-100">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-4">
                            <div class="company-logo me-3 bg-light rounded-circle">
                                <i class="fas fa-palette text-primary"></i>
                            </div>
                            <div>
                                <h5 class="fw-bold mb-1">Arts & Culture Exhibitions</h5>
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-star text-warning me-1"></i>
                                    <span class="me-2">4.7</span>
                                    <span class="text-muted small">(92 reviews)</span>
                                </div>
                            </div>
                        </div>

                        <p class="text-muted mb-3">Curating exceptional art exhibitions, cultural events, and creative workshops for art enthusiasts.</p>

                        <div class="d-flex align-items-center small text-muted mb-3">
                            <i class="fas fa-map-marker-alt me-2"></i>
                            <span>Chicago, IL</span>
                        </div>

                        <div class="d-flex align-items-center small text-muted mb-4">
                            <i class="fas fa-calendar-alt me-2"></i>
                            <span>7 upcoming events</span>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="#" class="btn btn-sm btn-outline-secondary">
                                <i class="fas fa-external-link-alt me-1"></i>
                                Website
                            </a>
                            <a href="#" class="btn btn-sm btn-primary-custom">
                                View Profile
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Company Card 5 -->
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm card-hover h-100">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-4">
                            <div class="company-logo me-3 bg-light rounded-circle">
                                <i class="fas fa-running text-primary"></i>
                            </div>
                            <div>
                                <h5 class="fw-bold mb-1">Sports Event Promoters</h5>
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-star text-warning me-1"></i>
                                    <span class="me-2">4.5</span>
                                    <span class="text-muted small">(76 reviews)</span>
                                </div>
                            </div>
                        </div>

                        <p class="text-muted mb-3">Organizing professional sporting events, marathons, championships, and sports-themed festivals.</p>

                        <div class="d-flex align-items-center small text-muted mb-3">
                            <i class="fas fa-map-marker-alt me-2"></i>
                            <span>Boston, MA</span>
                        </div>

                        <div class="d-flex align-items-center small text-muted mb-4">
                            <i class="fas fa-calendar-alt me-2"></i>
                            <span>10 upcoming events</span>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="#" class="btn btn-sm btn-outline-secondary">
                                <i class="fas fa-external-link-alt me-1"></i>
                                Website
                            </a>
                            <a href="#" class="btn btn-sm btn-primary-custom">
                                View Profile
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Company Card 6 -->
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm card-hover h-100">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-4">
                            <div class="company-logo me-3 bg-light rounded-circle">
                                <i class="fas fa-utensils text-primary"></i>
                            </div>
                            <div>
                                <h5 class="fw-bold mb-1">Food Festival Organizers</h5>
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-star text-warning me-1"></i>
                                    <span class="me-2">4.8</span>
                                    <span class="text-muted small">(142 reviews)</span>
                                </div>
                            </div>
                        </div>

                        <p class="text-muted mb-3">Creating delicious culinary experiences through food festivals, tasting events, and cooking competitions.</p>

                        <div class="d-flex align-items-center small text-muted mb-3">
                            <i class="fas fa-map-marker-alt me-2"></i>
                            <span>Los Angeles, CA</span>
                        </div>

                        <div class="d-flex align-items-center small text-muted mb-4">
                            <i class="fas fa-calendar-alt me-2"></i>
                            <span>5 upcoming events</span>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="#" class="btn btn-sm btn-outline-secondary">
                                <i class="fas fa-external-link-alt me-1"></i>
                                Website
                            </a>
                            <a href="#" class="btn btn-sm btn-primary-custom">
                                View Profile
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-5">
            <nav aria-label="Page navigation">
                <ul class="pagination">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
    .company-logo {
        width: 60px;
        height: 60px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .company-logo i {
        font-size: 24px;
    }

    .card-hover {
        transition: all 0.3s ease;
    }

    .card-hover:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
    }
</style>
@endpush
