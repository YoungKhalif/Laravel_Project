@extends('layouts.app')

@section('title', $company->name . ' - EventSmart')

@section('content')
<div class="container-fluid px-4 py-5">
    <!-- Company Header -->
    <div class="row mb-5">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-5">
                    <div class="row align-items-center">
                        <div class="col-md-2 text-center mb-3 mb-md-0">
                            @if($company->logo)
                                <img src="{{ Storage::url($company->logo) }}" 
                                     alt="{{ $company->name }}" 
                                     class="img-fluid rounded-circle shadow"
                                     style="width: 120px; height: 120px; object-fit: cover;">
                            @else
                                <div class="bg-primary text-white rounded-circle mx-auto d-flex align-items-center justify-content-center shadow"
                                     style="width: 120px; height: 120px;">
                                    <i class="fas fa-building fa-3x"></i>
                                </div>
                            @endif
                        </div>
                        <div class="col-md-8">
                            <div class="d-flex align-items-center mb-2">
                                <h1 class="h2 fw-bold mb-0 me-3">{{ $company->name }}</h1>
                                @if($company->is_verified)
                                    <span class="badge bg-success">
                                        <i class="fas fa-check-circle me-1"></i>Verified
                                    </span>
                                @else
                                    <span class="badge bg-warning">
                                        <i class="fas fa-clock me-1"></i>Pending Verification
                                    </span>
                                @endif
                            </div>
                            <p class="text-muted mb-3">{{ $company->description }}</p>
                            
                            <div class="row g-3">
                                <div class="col-auto">
                                    <div class="d-flex align-items-center text-muted">
                                        <i class="fas fa-envelope me-2"></i>
                                        <span>{{ $company->email }}</span>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div class="d-flex align-items-center text-muted">
                                        <i class="fas fa-phone me-2"></i>
                                        <span>{{ $company->phone }}</span>
                                    </div>
                                </div>
                                @if($company->website)
                                    <div class="col-auto">
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-globe me-2 text-muted"></i>
                                            <a href="{{ $company->website }}" target="_blank" class="text-decoration-none">
                                                Visit Website <i class="fas fa-external-link-alt ms-1"></i>
                                            </a>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-2 text-end">
                            @auth
                                @if(Auth::user()->isAdmin() || Auth::user()->company_id === $company->id)
                                    <a href="{{ route('companies.edit', $company) }}" class="btn btn-outline-primary">
                                        <i class="fas fa-edit me-2"></i>Edit
                                    </a>
                                @endif
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="row g-4 mb-5">
        <div class="col-lg-3 col-md-6">
            <div class="card border-0 shadow-sm text-center">
                <div class="card-body">
                    <div class="bg-primary text-white rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center"
                         style="width: 60px; height: 60px;">
                        <i class="fas fa-calendar fa-lg"></i>
                    </div>
                    <h3 class="fw-bold mb-1">{{ $company->events->count() }}</h3>
                    <p class="text-muted mb-0">Total Events</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card border-0 shadow-sm text-center">
                <div class="card-body">
                    <div class="bg-success text-white rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center"
                         style="width: 60px; height: 60px;">
                        <i class="fas fa-calendar-check fa-lg"></i>
                    </div>
                    <h3 class="fw-bold mb-1">{{ $company->events->where('status', 'active')->count() }}</h3>
                    <p class="text-muted mb-0">Active Events</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card border-0 shadow-sm text-center">
                <div class="card-body">
                    <div class="bg-info text-white rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center"
                         style="width: 60px; height: 60px;">
                        <i class="fas fa-users fa-lg"></i>
                    </div>
                    <h3 class="fw-bold mb-1">{{ $company->events->sum('max_attendees') }}</h3>
                    <p class="text-muted mb-0">Total Capacity</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card border-0 shadow-sm text-center">
                <div class="card-body">
                    <div class="bg-warning text-white rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center"
                         style="width: 60px; height: 60px;">
                        <i class="fas fa-star fa-lg"></i>
                    </div>
                    <h3 class="fw-bold mb-1">{{ $company->created_at->year }}</h3>
                    <p class="text-muted mb-0">Joined Year</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Events Section -->
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="fw-bold mb-0">
                    <i class="fas fa-calendar-alt text-primary me-2"></i>
                    Events by {{ $company->name }}
                </h3>
                @if($company->events->count() > 0)
                    <a href="{{ route('events.index', ['company' => $company->id]) }}" class="btn btn-outline-primary">
                        View All Events <i class="fas fa-arrow-right ms-1"></i>
                    </a>
                @endif
            </div>

            @if($company->events->count() > 0)
                <div class="row g-4">
                    @foreach($company->events as $event)
                        <div class="col-lg-4 col-md-6">
                            <div class="card border-0 shadow-sm h-100 event-card">
                                <!-- Event Image -->
                                <div class="position-relative">
                                    @if($event->image)
                                        <img src="{{ Storage::url($event->image) }}" 
                                             alt="{{ $event->title }}" 
                                             class="card-img-top" 
                                             style="height: 200px; object-fit: cover;">
                                    @else
                                        <div class="bg-gradient-primary text-white d-flex align-items-center justify-content-center" 
                                             style="height: 200px;">
                                            <i class="fas fa-calendar fa-3x opacity-50"></i>
                                        </div>
                                    @endif
                                    
                                    <!-- Price Badge -->
                                    <div class="position-absolute top-0 end-0 m-3">
                                        <span class="badge bg-dark">
                                            ${{ number_format($event->ticket_price, 0) }}
                                        </span>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title mb-2">{{ $event->title }}</h5>
                                    <p class="text-muted small mb-3">{{ Str::limit($event->description, 100) }}</p>
                                    
                                    <div class="mb-3">
                                        <div class="d-flex align-items-center text-muted small mb-1">
                                            <i class="fas fa-calendar me-2"></i>
                                            {{ $event->start_date->format('M d, Y') }}
                                        </div>
                                        <div class="d-flex align-items-center text-muted small mb-1">
                                            <i class="fas fa-clock me-2"></i>
                                            {{ $event->start_time->format('g:i A') }}
                                        </div>
                                        <div class="d-flex align-items-center text-muted small">
                                            <i class="fas fa-map-marker-alt me-2"></i>
                                            {{ $event->venue }}, {{ $event->city }}
                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer bg-transparent border-0 pt-0">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <small class="text-muted">
                                            {{ $event->available_tickets }} spots left
                                        </small>
                                        <a href="{{ route('events.show', $event) }}" class="btn btn-primary btn-sm">
                                            View Details
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <!-- No Events -->
                <div class="text-center py-5">
                    <i class="fas fa-calendar text-muted mb-3" style="font-size: 3rem; opacity: 0.3;"></i>
                    <h5 class="text-muted">No Events Yet</h5>
                    <p class="text-muted">{{ $company->name }} hasn't created any events yet.</p>
                    @auth
                        @if(Auth::user()->company_id === $company->id)
                            <a href="{{ route('events.create') }}" class="btn btn-gradient">
                                <i class="fas fa-plus me-2"></i>Create Your First Event
                            </a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
    </div>

    <!-- Company Details -->
    <div class="row mt-5">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-light border-0">
                    <h5 class="mb-0">
                        <i class="fas fa-info-circle text-primary me-2"></i>Company Details
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <h6 class="text-muted mb-2">Registration Number</h6>
                            <p class="mb-0">{{ $company->registration_number }}</p>
                        </div>
                        <div class="col-md-6">
                            <h6 class="text-muted mb-2">Business Address</h6>
                            <p class="mb-0">{{ $company->address }}</p>
                        </div>
                        <div class="col-12">
                            <h6 class="text-muted mb-2">About</h6>
                            <p class="mb-0">{{ $company->description }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-light border-0">
                    <h5 class="mb-0">
                        <i class="fas fa-envelope text-primary me-2"></i>Contact Information
                    </h5>
                </div>
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div class="bg-primary text-white rounded-circle me-3 d-flex align-items-center justify-content-center"
                             style="width: 40px; height: 40px;">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div>
                            <small class="text-muted d-block">Email</small>
                            <a href="mailto:{{ $company->email }}" class="text-decoration-none">{{ $company->email }}</a>
                        </div>
                    </div>
                    
                    <div class="d-flex align-items-center mb-3">
                        <div class="bg-success text-white rounded-circle me-3 d-flex align-items-center justify-content-center"
                             style="width: 40px; height: 40px;">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div>
                            <small class="text-muted d-block">Phone</small>
                            <a href="tel:{{ $company->phone }}" class="text-decoration-none">{{ $company->phone }}</a>
                        </div>
                    </div>
                    
                    @if($company->website)
                        <div class="d-flex align-items-center">
                            <div class="bg-info text-white rounded-circle me-3 d-flex align-items-center justify-content-center"
                                 style="width: 40px; height: 40px;">
                                <i class="fas fa-globe"></i>
                            </div>
                            <div>
                                <small class="text-muted d-block">Website</small>
                                <a href="{{ $company->website }}" target="_blank" class="text-decoration-none">
                                    Visit Website <i class="fas fa-external-link-alt ms-1"></i>
                                </a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
