@extends('layouts.app')

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
