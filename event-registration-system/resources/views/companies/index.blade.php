@extends('layouts.app')

<<<<<<< HEAD
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
=======
@section('title', 'Companies - EventSmart')

@section('content')
<div class="container-fluid px-4 py-5">
    <!-- Header -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="h3 fw-bold mb-1">Event Organizers</h1>
                    <p class="text-muted mb-0">Discover amazing companies organizing events on our platform</p>
                </div>
                <div>
                    <a href="{{ route('companies.register') }}" class="btn btn-gradient">
                        <i class="fas fa-plus me-2"></i>Register Company
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Search and Filters -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <form method="GET" action="{{ route('companies.index') }}">
                        <div class="row g-3 align-items-end">
                            <div class="col-lg-4 col-md-6">
                                <label for="search" class="form-label">Search Companies</label>
                                <input type="text" class="form-control" id="search" name="search"
                                       placeholder="Search by company name" value="{{ request('search') }}">
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <label for="industry" class="form-label">Industry</label>
                                <select class="form-select" id="industry" name="industry">
                                    <option value="">All Industries</option>
                                    <option value="technology" {{ request('industry') == 'technology' ? 'selected' : '' }}>Technology</option>
                                    <option value="healthcare" {{ request('industry') == 'healthcare' ? 'selected' : '' }}>Healthcare</option>
                                    <option value="finance" {{ request('industry') == 'finance' ? 'selected' : '' }}>Finance</option>
                                    <option value="education" {{ request('industry') == 'education' ? 'selected' : '' }}>Education</option>
                                    <option value="retail" {{ request('industry') == 'retail' ? 'selected' : '' }}>Retail</option>
                                    <option value="consulting" {{ request('industry') == 'consulting' ? 'selected' : '' }}>Consulting</option>
                                </select>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <label for="company_size" class="form-label">Company Size</label>
                                <select class="form-select" id="company_size" name="company_size">
                                    <option value="">All Sizes</option>
                                    <option value="1-10" {{ request('company_size') == '1-10' ? 'selected' : '' }}>1-10 employees</option>
                                    <option value="11-50" {{ request('company_size') == '11-50' ? 'selected' : '' }}>11-50 employees</option>
                                    <option value="51-200" {{ request('company_size') == '51-200' ? 'selected' : '' }}>51-200 employees</option>
                                    <option value="201-1000" {{ request('company_size') == '201-1000' ? 'selected' : '' }}>201-1000 employees</option>
                                    <option value="1000+" {{ request('company_size') == '1000+' ? 'selected' : '' }}>1000+ employees</option>
                                </select>
                            </div>
                            <div class="col-lg-2 col-md-6">
                                <button type="submit" class="btn btn-primary w-100">
                                    <i class="fas fa-search me-1"></i>Search
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Companies Grid -->
    <div class="row g-4">
        <!-- Company Card 1 -->
        <div class="col-lg-4 col-md-6">
            <div class="card border-0 shadow-sm card-hover h-100">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center mb-3">
                        <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3"
                             style="width: 60px; height: 60px;">
                            <i class="fas fa-laptop-code fa-lg"></i>
                        </div>
                        <div class="flex-grow-1">
                            <h5 class="card-title mb-1">TechCorp Inc.</h5>
                            <span class="badge bg-primary">Technology</span>
                        </div>
                    </div>

                    <p class="text-muted mb-3">Leading technology company specializing in AI and machine learning solutions for enterprise clients.</p>

                    <div class="row g-2 mb-3">
                        <div class="col-6">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-users text-muted me-2"></i>
                                <small class="text-muted">201-1000 employees</small>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-calendar text-muted me-2"></i>
                                <small class="text-muted">Founded 2015</small>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-map-marker-alt text-muted me-2"></i>
                                <small class="text-muted">San Francisco, CA</small>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-star text-warning me-2"></i>
                                <small class="text-muted">12 Events</small>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex gap-2">
                            <a href="#" class="btn btn-outline-secondary btn-sm">
                                <i class="fas fa-globe"></i>
                            </a>
                            <a href="#" class="btn btn-outline-primary btn-sm">
                                <i class="fab fa-linkedin"></i>
                            </a>
                        </div>
                        <a href="#" class="btn btn-primary btn-sm">
                            <i class="fas fa-eye me-1"></i>View Profile
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Company Card 2 -->
        <div class="col-lg-4 col-md-6">
            <div class="card border-0 shadow-sm card-hover h-100">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center mb-3">
                        <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center me-3"
                             style="width: 60px; height: 60px;">
                            <i class="fas fa-briefcase fa-lg"></i>
                        </div>
                        <div class="flex-grow-1">
                            <h5 class="card-title mb-1">BizLeaders LLC</h5>
                            <span class="badge bg-success">Consulting</span>
                        </div>
                    </div>

                    <p class="text-muted mb-3">Professional business consulting firm helping organizations achieve their strategic goals through expert guidance.</p>

                    <div class="row g-2 mb-3">
                        <div class="col-6">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-users text-muted me-2"></i>
                                <small class="text-muted">51-200 employees</small>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-calendar text-muted me-2"></i>
                                <small class="text-muted">Founded 2008</small>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-map-marker-alt text-muted me-2"></i>
                                <small class="text-muted">New York, NY</small>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-star text-warning me-2"></i>
                                <small class="text-muted">8 Events</small>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex gap-2">
                            <a href="#" class="btn btn-outline-secondary btn-sm">
                                <i class="fas fa-globe"></i>
                            </a>
                            <a href="#" class="btn btn-outline-primary btn-sm">
                                <i class="fab fa-linkedin"></i>
                            </a>
                        </div>
                        <a href="#" class="btn btn-primary btn-sm">
                            <i class="fas fa-eye me-1"></i>View Profile
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Company Card 3 -->
        <div class="col-lg-4 col-md-6">
            <div class="card border-0 shadow-sm card-hover h-100">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center mb-3">
                        <div class="bg-info text-white rounded-circle d-flex align-items-center justify-content-center me-3"
                             style="width: 60px; height: 60px;">
                            <i class="fas fa-paint-brush fa-lg"></i>
                        </div>
                        <div class="flex-grow-1">
                            <h5 class="card-title mb-1">Creative Arts Studio</h5>
                            <span class="badge bg-info">Arts & Culture</span>
                        </div>
                    </div>

                    <p class="text-muted mb-3">Contemporary art gallery and cultural center promoting emerging artists and hosting community events.</p>

                    <div class="row g-2 mb-3">
                        <div class="col-6">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-users text-muted me-2"></i>
                                <small class="text-muted">11-50 employees</small>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-calendar text-muted me-2"></i>
                                <small class="text-muted">Founded 2012</small>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-map-marker-alt text-muted me-2"></i>
                                <small class="text-muted">Chicago, IL</small>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-star text-warning me-2"></i>
                                <small class="text-muted">15 Events</small>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex gap-2">
                            <a href="#" class="btn btn-outline-secondary btn-sm">
                                <i class="fas fa-globe"></i>
                            </a>
                            <a href="#" class="btn btn-outline-primary btn-sm">
                                <i class="fab fa-linkedin"></i>
                            </a>
                        </div>
                        <a href="#" class="btn btn-primary btn-sm">
                            <i class="fas fa-eye me-1"></i>View Profile
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Company Card 4 -->
        <div class="col-lg-4 col-md-6">
            <div class="card border-0 shadow-sm card-hover h-100">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center mb-3">
                        <div class="bg-warning text-white rounded-circle d-flex align-items-center justify-content-center me-3"
                             style="width: 60px; height: 60px;">
                            <i class="fas fa-graduation-cap fa-lg"></i>
                        </div>
                        <div class="flex-grow-1">
                            <h5 class="card-title mb-1">EduTech Solutions</h5>
                            <span class="badge bg-warning">Education</span>
                        </div>
                    </div>

                    <p class="text-muted mb-3">Educational technology company creating innovative learning solutions for schools and universities.</p>

                    <div class="row g-2 mb-3">
                        <div class="col-6">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-users text-muted me-2"></i>
                                <small class="text-muted">51-200 employees</small>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-calendar text-muted me-2"></i>
                                <small class="text-muted">Founded 2018</small>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-map-marker-alt text-muted me-2"></i>
                                <small class="text-muted">Austin, TX</small>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-star text-warning me-2"></i>
                                <small class="text-muted">6 Events</small>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex gap-2">
                            <a href="#" class="btn btn-outline-secondary btn-sm">
                                <i class="fas fa-globe"></i>
                            </a>
                            <a href="#" class="btn btn-outline-primary btn-sm">
                                <i class="fab fa-linkedin"></i>
                            </a>
                        </div>
                        <a href="#" class="btn btn-primary btn-sm">
                            <i class="fas fa-eye me-1"></i>View Profile
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Company Card 5 -->
        <div class="col-lg-4 col-md-6">
            <div class="card border-0 shadow-sm card-hover h-100">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center mb-3">
                        <div class="bg-danger text-white rounded-circle d-flex align-items-center justify-content-center me-3"
                             style="width: 60px; height: 60px;">
                            <i class="fas fa-heartbeat fa-lg"></i>
                        </div>
                        <div class="flex-grow-1">
                            <h5 class="card-title mb-1">HealthCare Plus</h5>
                            <span class="badge bg-danger">Healthcare</span>
                        </div>
                    </div>

                    <p class="text-muted mb-3">Leading healthcare organization providing comprehensive medical services and wellness programs.</p>

                    <div class="row g-2 mb-3">
                        <div class="col-6">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-users text-muted me-2"></i>
                                <small class="text-muted">1000+ employees</small>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-calendar text-muted me-2"></i>
                                <small class="text-muted">Founded 1995</small>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-map-marker-alt text-muted me-2"></i>
                                <small class="text-muted">Boston, MA</small>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-star text-warning me-2"></i>
                                <small class="text-muted">20 Events</small>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex gap-2">
                            <a href="#" class="btn btn-outline-secondary btn-sm">
                                <i class="fas fa-globe"></i>
                            </a>
                            <a href="#" class="btn btn-outline-primary btn-sm">
                                <i class="fab fa-linkedin"></i>
                            </a>
                        </div>
                        <a href="#" class="btn btn-primary btn-sm">
                            <i class="fas fa-eye me-1"></i>View Profile
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Company Card 6 -->
        <div class="col-lg-4 col-md-6">
            <div class="card border-0 shadow-sm card-hover h-100">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center mb-3">
                        <div class="bg-secondary text-white rounded-circle d-flex align-items-center justify-content-center me-3"
                             style="width: 60px; height: 60px;">
                            <i class="fas fa-chart-line fa-lg"></i>
                        </div>
                        <div class="flex-grow-1">
                            <h5 class="card-title mb-1">FinanceFirst Corp</h5>
                            <span class="badge bg-secondary">Finance</span>
                        </div>
                    </div>

                    <p class="text-muted mb-3">Premier financial services company offering investment solutions and financial planning expertise.</p>

                    <div class="row g-2 mb-3">
                        <div class="col-6">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-users text-muted me-2"></i>
                                <small class="text-muted">201-1000 employees</small>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-calendar text-muted me-2"></i>
                                <small class="text-muted">Founded 2005</small>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-map-marker-alt text-muted me-2"></i>
                                <small class="text-muted">Miami, FL</small>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-star text-warning me-2"></i>
                                <small class="text-muted">10 Events</small>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex gap-2">
                            <a href="#" class="btn btn-outline-secondary btn-sm">
                                <i class="fas fa-globe"></i>
                            </a>
                            <a href="#" class="btn btn-outline-primary btn-sm">
                                <i class="fab fa-linkedin"></i>
                            </a>
                        </div>
                        <a href="#" class="btn btn-primary btn-sm">
                            <i class="fas fa-eye me-1"></i>View Profile
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
>>>>>>> 8a996aa7d56b8b38ce7291c226b99d292509af77
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
<<<<<<< HEAD
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
=======
                        <a class="page-link" href="#">Next</a>
>>>>>>> 8a996aa7d56b8b38ce7291c226b99d292509af77
                    </li>
                </ul>
            </nav>
        </div>
    </div>
<<<<<<< HEAD
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
=======
</div>
@endsection
>>>>>>> 8a996aa7d56b8b38ce7291c226b99d292509af77
