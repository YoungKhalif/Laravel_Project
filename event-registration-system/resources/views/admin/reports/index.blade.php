@extends('layouts.app')

<<<<<<< HEAD
@section('title', 'Reports & Analytics - EventPro Admin')

@section('content')
<x-admin-layout :pageTitle="'Reports & Analytics'" :breadcrumbs="[
    ['name' => 'Dashboard', 'url' => route('admin.dashboard')],
    ['name' => 'Reports', 'url' => null]
]">
    <!-- Date Range Selector -->
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body">
            <div class="row align-items-center">
                <div class="col-lg-4">
                    <h5 class="fw-bold mb-0">Reports & Analytics</h5>
                    <p class="text-muted small mb-0">View and export performance data</p>
                </div>
                <div class="col-lg-5">
                    <div class="input-group">
                        <input type="date" class="form-control" value="2025-01-01">
                        <span class="input-group-text">to</span>
                        <input type="date" class="form-control" value="2025-03-31">
                        <button class="btn btn-primary" type="button">Apply</button>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="btn-group w-100">
                        <button type="button" class="btn btn-outline-primary">
                            <i class="fas fa-file-export me-2"></i> Export
                        </button>
                        <button type="button" class="btn btn-outline-primary">
                            <i class="fas fa-print me-2"></i> Print
                        </button>
                        <button type="button" class="btn btn-outline-primary">
                            <i class="fas fa-share-alt me-2"></i> Share
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Revenue & Metrics Overview -->
    <div class="row g-4 mb-4">
        <div class="col-md-6 col-lg-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div class="stat-icon bg-primary-light text-primary rounded-3 p-3">
                            <i class="fas fa-dollar-sign fs-4"></i>
                        </div>
                        <div class="stat-value">
                            <h3 class="fw-bold mb-0">$78,452</h3>
                            <span class="text-success small fw-semibold">
                                <i class="fas fa-arrow-up me-1"></i>18%
                            </span>
                        </div>
                    </div>
                    <h5 class="fw-semibold mb-0">Total Revenue</h5>
                    <p class="text-muted small mb-0">Q1 2025 (Jan - Mar)</p>
=======
@section('title', 'Reports & Analytics - Admin - EventSmart')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <!-- Header -->
        <div class="col-12 mb-4">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h2 class="mb-1">Reports & Analytics</h2>
                    <p class="text-muted mb-0">Comprehensive insights into your platform performance</p>
                </div>
                <div class="d-flex gap-2">
                    <select class="form-select" id="dateRange">
                        <option value="7">Last 7 days</option>
                        <option value="30" selected>Last 30 days</option>
                        <option value="90">Last 90 days</option>
                        <option value="365">Last year</option>
                    </select>
                    <button class="btn btn-gradient" onclick="exportReport()">
                        <i class="fas fa-download me-2"></i>Export Report
                    </button>
>>>>>>> 8a996aa7d56b8b38ce7291c226b99d292509af77
                </div>
            </div>
        </div>

<<<<<<< HEAD
        <div class="col-md-6 col-lg-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div class="stat-icon bg-success-light text-success rounded-3 p-3">
                            <i class="fas fa-ticket-alt fs-4"></i>
                        </div>
                        <div class="stat-value">
                            <h3 class="fw-bold mb-0">1,547</h3>
                            <span class="text-success small fw-semibold">
                                <i class="fas fa-arrow-up me-1"></i>24%
                            </span>
                        </div>
                    </div>
                    <h5 class="fw-semibold mb-0">Tickets Sold</h5>
                    <p class="text-muted small mb-0">Q1 2025 (Jan - Mar)</p>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div class="stat-icon bg-info-light text-info rounded-3 p-3">
                            <i class="fas fa-users fs-4"></i>
                        </div>
                        <div class="stat-value">
                            <h3 class="fw-bold mb-0">354</h3>
                            <span class="text-success small fw-semibold">
                                <i class="fas fa-arrow-up me-1"></i>12%
                            </span>
                        </div>
                    </div>
                    <h5 class="fw-semibold mb-0">New Users</h5>
                    <p class="text-muted small mb-0">Q1 2025 (Jan - Mar)</p>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div class="stat-icon bg-warning-light text-warning rounded-3 p-3">
                            <i class="fas fa-calendar-check fs-4"></i>
                        </div>
                        <div class="stat-value">
                            <h3 class="fw-bold mb-0">32</h3>
                            <span class="text-success small fw-semibold">
                                <i class="fas fa-arrow-up me-1"></i>8%
                            </span>
                        </div>
                    </div>
                    <h5 class="fw-semibold mb-0">Events Held</h5>
                    <p class="text-muted small mb-0">Q1 2025 (Jan - Mar)</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4 mb-4">
        <!-- Monthly Revenue Trend -->
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white p-4 border-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="fw-bold mb-0">Revenue Trend</h5>
                            <p class="text-muted small mb-0">Monthly revenue and ticket sales for 2025</p>
                        </div>
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-outline-primary active">Revenue</button>
                            <button type="button" class="btn btn-sm btn-outline-primary">Tickets</button>
                            <button type="button" class="btn btn-sm btn-outline-primary">Combined</button>
                        </div>
                    </div>
                </div>
                <div class="card-body p-4">
                    <div class="chart-container" style="height: 350px;">
                        <canvas id="revenueChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sales by Category -->
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white p-4 border-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="fw-bold mb-0">Sales by Category</h5>
                        <button type="button" class="btn btn-sm btn-outline-primary">
                            <i class="fas fa-filter me-1"></i> Filter
                        </button>
                    </div>
                </div>
                <div class="card-body p-4">
                    <div class="chart-container mb-3" style="height: 250px;">
                        <canvas id="categorySalesChart"></canvas>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-sm">
                            <thead class="table-light">
                                <tr>
                                    <th>Category</th>
                                    <th class="text-end">Revenue</th>
                                    <th class="text-end">Tickets</th>
                                    <th class="text-end">%</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="legend-color me-2" style="background-color: #3b82f6;"></div>
                                            <div>Music</div>
                                        </div>
                                    </td>
                                    <td class="text-end">$32,150</td>
                                    <td class="text-end">643</td>
                                    <td class="text-end">41%</td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="legend-color me-2" style="background-color: #10b981;"></div>
                                            <div>Business</div>
                                        </div>
                                    </td>
                                    <td class="text-end">$18,745</td>
                                    <td class="text-end">375</td>
                                    <td class="text-end">24%</td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="legend-color me-2" style="background-color: #f59e0b;"></div>
                                            <div>Technology</div>
                                        </div>
                                    </td>
                                    <td class="text-end">$15,420</td>
                                    <td class="text-end">308</td>
                                    <td class="text-end">20%</td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="legend-color me-2" style="background-color: #ef4444;"></div>
                                            <div>Arts</div>
                                        </div>
                                    </td>
                                    <td class="text-end">$7,825</td>
                                    <td class="text-end">156</td>
                                    <td class="text-end">10%</td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="legend-color me-2" style="background-color: #8b5cf6;"></div>
                                            <div>Sports</div>
                                        </div>
                                    </td>
                                    <td class="text-end">$4,312</td>
                                    <td class="text-end">65</td>
                                    <td class="text-end">5%</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4 mb-4">
        <!-- Geographic Distribution -->
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-white p-4 border-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="fw-bold mb-0">Geographic Distribution</h5>
                        <div class="dropdown">
                            <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                Revenue
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item active" href="#">Revenue</a></li>
                                <li><a class="dropdown-item" href="#">Tickets Sold</a></li>
                                <li><a class="dropdown-item" href="#">Events</a></li>
                                <li><a class="dropdown-item" href="#">Users</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-body p-4">
                    <div class="chart-container" style="height: 350px;">
                        <!-- Map chart would go here, using placeholder for layout -->
                        <div class="geo-map-placeholder d-flex flex-column align-items-center justify-content-center h-100">
                            <div class="mb-3">
                                <i class="fas fa-map-marked-alt fa-4x text-muted"></i>
                            </div>
                            <h6 class="text-muted">Geographic Distribution Map</h6>
                            <p class="text-muted small text-center">An interactive map showing revenue distribution across regions would be displayed here.</p>
=======
        <!-- Summary Stats -->
        <div class="col-12 mb-4">
            <div class="row g-4">
                <div class="col-md-3">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body text-center">
                            <div class="bg-primary bg-opacity-10 rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center"
                                 style="width: 60px; height: 60px;">
                                <i class="fas fa-dollar-sign fa-2x text-primary"></i>
                            </div>
                            <h3 class="mb-1">$124,567</h3>
                            <p class="text-muted mb-1">Total Revenue</p>
                            <small class="text-success">
                                <i class="fas fa-arrow-up"></i> +18.2% from last month
                            </small>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body text-center">
                            <div class="bg-success bg-opacity-10 rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center"
                                 style="width: 60px; height: 60px;">
                                <i class="fas fa-ticket-alt fa-2x text-success"></i>
                            </div>
                            <h3 class="mb-1">4,523</h3>
                            <p class="text-muted mb-1">Tickets Sold</p>
                            <small class="text-success">
                                <i class="fas fa-arrow-up"></i> +24.7% from last month
                            </small>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body text-center">
                            <div class="bg-info bg-opacity-10 rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center"
                                 style="width: 60px; height: 60px;">
                                <i class="fas fa-calendar fa-2x text-info"></i>
                            </div>
                            <h3 class="mb-1">147</h3>
                            <p class="text-muted mb-1">Events Created</p>
                            <small class="text-success">
                                <i class="fas fa-arrow-up"></i> +12.3% from last month
                            </small>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body text-center">
                            <div class="bg-warning bg-opacity-10 rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center"
                                 style="width: 60px; height: 60px;">
                                <i class="fas fa-users fa-2x text-warning"></i>
                            </div>
                            <h3 class="mb-1">2,891</h3>
                            <p class="text-muted mb-1">New Users</p>
                            <small class="text-success">
                                <i class="fas fa-arrow-up"></i> +8.4% from last month
                            </small>
>>>>>>> 8a996aa7d56b8b38ce7291c226b99d292509af77
                        </div>
                    </div>
                </div>
            </div>
        </div>

<<<<<<< HEAD
        <!-- Top Performing Events -->
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-white p-4 border-0 d-flex justify-content-between align-items-center">
                    <h5 class="fw-bold mb-0">Top Performing Events</h5>
                    <button class="btn btn-sm btn-outline-primary">View All</button>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="ps-4">Event</th>
                                    <th>Date</th>
                                    <th>Revenue</th>
                                    <th>Tickets</th>
                                    <th class="text-end pe-4">Fill Rate</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="ps-4">
                                        <div class="d-flex align-items-center">
                                            <div class="event-img me-3" style="background-image: url('https://images.unsplash.com/photo-1470229722913-7c0e2dbbafd3?ixlib=rb-4.0.3&auto=format&fit=crop&w=1740&q=80');"></div>
                                            <div>Music Festival 2025</div>
                                        </div>
                                    </td>
                                    <td>Sep 05, 2025</td>
                                    <td>$24,750</td>
                                    <td>247</td>
                                    <td class="text-end pe-4">
                                        <div class="d-flex align-items-center justify-content-end">
                                            <div class="me-2">24.7%</div>
                                            <div class="progress flex-grow-1" style="height: 6px; width: 80px">
                                                <div class="progress-bar bg-primary" role="progressbar" style="width: 24.7%"></div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="ps-4">
                                        <div class="d-flex align-items-center">
                                            <div class="event-img me-3" style="background-image: url('https://images.unsplash.com/photo-1501281668745-f7f57925c3b4?ixlib=rb-4.0.3&auto=format&fit=crop&w=1740&q=80');"></div>
                                            <div>Tech Conference 2025</div>
                                        </div>
                                    </td>
                                    <td>Aug 15, 2025</td>
                                    <td>$12,540</td>
                                    <td>125</td>
                                    <td class="text-end pe-4">
                                        <div class="d-flex align-items-center justify-content-end">
                                            <div class="me-2">25.0%</div>
                                            <div class="progress flex-grow-1" style="height: 6px; width: 80px">
                                                <div class="progress-bar bg-primary" role="progressbar" style="width: 25%"></div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="ps-4">
                                        <div class="d-flex align-items-center">
                                            <div class="event-img me-3" style="background-image: url('https://images.unsplash.com/photo-1560520653-9e0e4c89eb11?ixlib=rb-4.0.3&auto=format&fit=crop&w=1572&q=80');"></div>
                                            <div>Sports Tournament</div>
                                        </div>
                                    </td>
                                    <td>Mar 18, 2025</td>
                                    <td>$22,500</td>
                                    <td>450</td>
                                    <td class="text-end pe-4">
                                        <div class="d-flex align-items-center justify-content-end">
                                            <div class="me-2">100.0%</div>
                                            <div class="progress flex-grow-1" style="height: 6px; width: 80px">
                                                <div class="progress-bar bg-success" role="progressbar" style="width: 100%"></div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="ps-4">
                                        <div class="d-flex align-items-center">
                                            <div class="event-img me-3" style="background-image: url('https://images.unsplash.com/photo-1540575467063-178a50c2df87?ixlib=rb-4.0.3&auto=format&fit=crop&w=2000&q=80');"></div>
                                            <div>Art Exhibition</div>
                                        </div>
                                    </td>
                                    <td>Nov 22, 2025</td>
                                    <td>$3,250</td>
                                    <td>32</td>
                                    <td class="text-end pe-4">
                                        <div class="d-flex align-items-center justify-content-end">
                                            <div class="me-2">16.0%</div>
                                            <div class="progress flex-grow-1" style="height: 6px; width: 80px">
                                                <div class="progress-bar bg-primary" role="progressbar" style="width: 16%"></div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="ps-4">
                                        <div class="d-flex align-items-center">
                                            <div class="event-img me-3" style="background-image: url('https://images.unsplash.com/photo-1515169067868-5387ec356754?ixlib=rb-4.0.3&auto=format&fit=crop&w=1740&q=80');"></div>
                                            <div>Business Summit 2025</div>
                                        </div>
                                    </td>
                                    <td>Oct 12, 2025</td>
                                    <td>$0</td>
                                    <td>0</td>
                                    <td class="text-end pe-4">
                                        <div class="d-flex align-items-center justify-content-end">
                                            <div class="me-2">0.0%</div>
                                            <div class="progress flex-grow-1" style="height: 6px; width: 80px">
                                                <div class="progress-bar bg-primary" role="progressbar" style="width: 0%"></div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
=======
        <!-- Charts Row -->
        <div class="col-12 mb-4">
            <div class="row g-4">
                <!-- Revenue Chart -->
                <div class="col-lg-8">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-white border-0 py-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <h6 class="card-title mb-0">Revenue Trends</h6>
                                <div class="btn-group btn-group-sm" role="group">
                                    <input type="radio" class="btn-check" name="revenueView" id="daily" checked>
                                    <label class="btn btn-outline-primary" for="daily">Daily</label>

                                    <input type="radio" class="btn-check" name="revenueView" id="weekly">
                                    <label class="btn btn-outline-primary" for="weekly">Weekly</label>

                                    <input type="radio" class="btn-check" name="revenueView" id="monthly">
                                    <label class="btn btn-outline-primary" for="monthly">Monthly</label>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <canvas id="revenueChart" height="300"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Event Categories Chart -->
                <div class="col-lg-4">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-white border-0 py-3">
                            <h6 class="card-title mb-0">Event Categories</h6>
                        </div>
                        <div class="card-body">
                            <canvas id="categoryChart" height="300"></canvas>
                            <div class="mt-3">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span class="d-flex align-items-center">
                                        <span class="bg-primary rounded-circle me-2" style="width: 10px; height: 10px;"></span>
                                        Technology
                                    </span>
                                    <span class="fw-bold">35%</span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span class="d-flex align-items-center">
                                        <span class="bg-success rounded-circle me-2" style="width: 10px; height: 10px;"></span>
                                        Business
                                    </span>
                                    <span class="fw-bold">25%</span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span class="d-flex align-items-center">
                                        <span class="bg-warning rounded-circle me-2" style="width: 10px; height: 10px;"></span>
                                        Education
                                    </span>
                                    <span class="fw-bold">20%</span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="d-flex align-items-center">
                                        <span class="bg-info rounded-circle me-2" style="width: 10px; height: 10px;"></span>
                                        Other
                                    </span>
                                    <span class="fw-bold">20%</span>
                                </div>
                            </div>
                        </div>
>>>>>>> 8a996aa7d56b8b38ce7291c226b99d292509af77
                    </div>
                </div>
            </div>
        </div>
<<<<<<< HEAD
    </div>

    <!-- Report Tabs -->
    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white p-4 border-0">
            <ul class="nav nav-tabs card-header-tabs" id="reportTabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="sales-tab" data-bs-toggle="tab" href="#sales" role="tab" aria-controls="sales" aria-selected="true">
                        <i class="fas fa-chart-line me-2"></i> Sales Report
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="users-tab" data-bs-toggle="tab" href="#users" role="tab" aria-controls="users" aria-selected="false">
                        <i class="fas fa-users me-2"></i> User Report
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="events-tab" data-bs-toggle="tab" href="#events" role="tab" aria-controls="events" aria-selected="false">
                        <i class="fas fa-calendar me-2"></i> Event Report
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="conversion-tab" data-bs-toggle="tab" href="#conversion" role="tab" aria-controls="conversion" aria-selected="false">
                        <i class="fas fa-exchange-alt me-2"></i> Conversion Report
                    </a>
                </li>
            </ul>
        </div>

        <div class="card-body p-4">
            <div class="tab-content" id="reportTabContent">
                <!-- Sales Report Tab -->
                <div class="tab-pane fade show active" id="sales" role="tabpanel" aria-labelledby="sales-tab">
                    <div class="d-flex justify-content-between mb-4">
                        <h5 class="fw-bold">Sales Report - Q1 2025</h5>
                        <div class="btn-group">
                            <button class="btn btn-sm btn-outline-secondary active">Daily</button>
                            <button class="btn btn-sm btn-outline-secondary">Weekly</button>
                            <button class="btn btn-sm btn-outline-secondary">Monthly</button>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>Date</th>
                                    <th>Transactions</th>
                                    <th>Tickets Sold</th>
                                    <th>Gross Sales</th>
                                    <th>Refunds</th>
                                    <th>Net Sales</th>
                                    <th>Avg. Order Value</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Mar 31, 2025</td>
                                    <td>24</td>
                                    <td>52</td>
                                    <td>$2,640</td>
                                    <td>$0</td>
                                    <td>$2,640</td>
                                    <td>$110.00</td>
                                </tr>
                                <tr>
                                    <td>Mar 30, 2025</td>
                                    <td>18</td>
                                    <td>36</td>
                                    <td>$1,980</td>
                                    <td>$120</td>
                                    <td>$1,860</td>
                                    <td>$110.00</td>
                                </tr>
                                <tr>
                                    <td>Mar 29, 2025</td>
                                    <td>31</td>
                                    <td>64</td>
                                    <td>$3,480</td>
                                    <td>$240</td>
                                    <td>$3,240</td>
                                    <td>$112.26</td>
                                </tr>
                                <tr>
                                    <td>Mar 28, 2025</td>
                                    <td>27</td>
                                    <td>42</td>
                                    <td>$2,350</td>
                                    <td>$0</td>
                                    <td>$2,350</td>
                                    <td>$87.04</td>
                                </tr>
                                <tr>
                                    <td>Mar 27, 2025</td>
                                    <td>22</td>
                                    <td>38</td>
                                    <td>$1,920</td>
                                    <td>$180</td>
                                    <td>$1,740</td>
                                    <td>$87.27</td>
                                </tr>
                            </tbody>
                            <tfoot class="table-light fw-bold">
                                <tr>
                                    <td>Total (Q1 2025)</td>
                                    <td>1,254</td>
                                    <td>1,547</td>
                                    <td>$80,452</td>
                                    <td>$2,000</td>
                                    <td>$78,452</td>
                                    <td>$101.24</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    <div class="d-flex justify-content-between mt-4">
                        <nav aria-label="Sales pagination">
                            <ul class="pagination pagination-sm mb-0">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                                        <i class="fas fa-chevron-left small"></i>
                                    </a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">
                                        <i class="fas fa-chevron-right small"></i>
                                    </a>
                                </li>
                            </ul>
                        </nav>

                        <div>
                            <button class="btn btn-sm btn-primary">
                                <i class="fas fa-file-csv me-2"></i> Export CSV
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Other report tabs content would go here -->
                <div class="tab-pane fade" id="users" role="tabpanel" aria-labelledby="users-tab">
                    <div class="d-flex justify-content-center align-items-center py-5">
                        <div class="text-center">
                            <i class="fas fa-users fa-3x text-muted mb-3"></i>
                            <h5>User Report</h5>
                            <p class="text-muted">User growth, engagement, and retention analytics</p>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="events" role="tabpanel" aria-labelledby="events-tab">
                    <div class="d-flex justify-content-center align-items-center py-5">
                        <div class="text-center">
                            <i class="fas fa-calendar fa-3x text-muted mb-3"></i>
                            <h5>Event Report</h5>
                            <p class="text-muted">Event performance, attendance, and feedback analytics</p>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="conversion" role="tabpanel" aria-labelledby="conversion-tab">
                    <div class="d-flex justify-content-center align-items-center py-5">
                        <div class="text-center">
                            <i class="fas fa-exchange-alt fa-3x text-muted mb-3"></i>
                            <h5>Conversion Report</h5>
                            <p class="text-muted">Visitor to registration conversion rate analytics</p>
=======

        <!-- Reports Tabs -->
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-0 py-3">
                    <ul class="nav nav-tabs card-header-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#sales-report" role="tab">
                                <i class="fas fa-chart-line me-2"></i>Sales Report
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#events-report" role="tab">
                                <i class="fas fa-calendar me-2"></i>Events Report
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#users-report" role="tab">
                                <i class="fas fa-users me-2"></i>Users Report
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#attendance-report" role="tab">
                                <i class="fas fa-check-circle me-2"></i>Attendance Report
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <!-- Sales Report -->
                        <div class="tab-pane fade show active" id="sales-report" role="tabpanel">
                            <div class="row g-4 mb-4">
                                <div class="col-md-3">
                                    <div class="text-center p-3 bg-light rounded">
                                        <h4 class="text-primary mb-1">$89,432</h4>
                                        <small class="text-muted">Gross Revenue</small>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="text-center p-3 bg-light rounded">
                                        <h4 class="text-success mb-1">$78,567</h4>
                                        <small class="text-muted">Net Revenue</small>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="text-center p-3 bg-light rounded">
                                        <h4 class="text-info mb-1">$10,865</h4>
                                        <small class="text-muted">Platform Fees</small>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="text-center p-3 bg-light rounded">
                                        <h4 class="text-warning mb-1">3,245</h4>
                                        <small class="text-muted">Transactions</small>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Event</th>
                                            <th>Tickets Sold</th>
                                            <th>Revenue</th>
                                            <th>Platform Fee</th>
                                            <th>Net Revenue</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Tech Conference 2024</td>
                                            <td>245</td>
                                            <td>$24,255</td>
                                            <td>$2,425</td>
                                            <td>$21,830</td>
                                            <td><span class="badge bg-success">Completed</span></td>
                                        </tr>
                                        <tr>
                                            <td>Digital Marketing Summit</td>
                                            <td>189</td>
                                            <td>$18,900</td>
                                            <td>$1,890</td>
                                            <td>$17,010</td>
                                            <td><span class="badge bg-primary">Active</span></td>
                                        </tr>
                                        <tr>
                                            <td>Startup Networking</td>
                                            <td>156</td>
                                            <td>$7,800</td>
                                            <td>$780</td>
                                            <td>$7,020</td>
                                            <td><span class="badge bg-success">Completed</span></td>
                                        </tr>
                                        <tr>
                                            <td>AI Workshop</td>
                                            <td>98</td>
                                            <td>$14,700</td>
                                            <td>$1,470</td>
                                            <td>$13,230</td>
                                            <td><span class="badge bg-warning">Upcoming</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Events Report -->
                        <div class="tab-pane fade" id="events-report" role="tabpanel">
                            <div class="row g-4 mb-4">
                                <div class="col-md-3">
                                    <div class="text-center p-3 bg-light rounded">
                                        <h4 class="text-primary mb-1">147</h4>
                                        <small class="text-muted">Total Events</small>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="text-center p-3 bg-light rounded">
                                        <h4 class="text-success mb-1">89</h4>
                                        <small class="text-muted">Completed</small>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="text-center p-3 bg-light rounded">
                                        <h4 class="text-warning mb-1">42</h4>
                                        <small class="text-muted">Upcoming</small>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="text-center p-3 bg-light rounded">
                                        <h4 class="text-danger mb-1">16</h4>
                                        <small class="text-muted">Cancelled</small>
                                    </div>
                                </div>
                            </div>

                            <canvas id="eventsChart" height="200"></canvas>
                        </div>

                        <!-- Users Report -->
                        <div class="tab-pane fade" id="users-report" role="tabpanel">
                            <div class="row g-4 mb-4">
                                <div class="col-md-3">
                                    <div class="text-center p-3 bg-light rounded">
                                        <h4 class="text-primary mb-1">12,456</h4>
                                        <small class="text-muted">Total Users</small>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="text-center p-3 bg-light rounded">
                                        <h4 class="text-success mb-1">2,891</h4>
                                        <small class="text-muted">New This Month</small>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="text-center p-3 bg-light rounded">
                                        <h4 class="text-info mb-1">8,734</h4>
                                        <small class="text-muted">Active Users</small>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="text-center p-3 bg-light rounded">
                                        <h4 class="text-warning mb-1">234</h4>
                                        <small class="text-muted">Event Organizers</small>
                                    </div>
                                </div>
                            </div>

                            <canvas id="usersChart" height="200"></canvas>
                        </div>

                        <!-- Attendance Report -->
                        <div class="tab-pane fade" id="attendance-report" role="tabpanel">
                            <div class="row g-4 mb-4">
                                <div class="col-md-3">
                                    <div class="text-center p-3 bg-light rounded">
                                        <h4 class="text-primary mb-1">87.3%</h4>
                                        <small class="text-muted">Average Attendance</small>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="text-center p-3 bg-light rounded">
                                        <h4 class="text-success mb-1">23,456</h4>
                                        <small class="text-muted">Total Attendees</small>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="text-center p-3 bg-light rounded">
                                        <h4 class="text-info mb-1">3,234</h4>
                                        <small class="text-muted">No-Shows</small>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="text-center p-3 bg-light rounded">
                                        <h4 class="text-warning mb-1">4.7</h4>
                                        <small class="text-muted">Avg Rating</small>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Event</th>
                                            <th>Expected</th>
                                            <th>Attended</th>
                                            <th>Attendance Rate</th>
                                            <th>Rating</th>
                                            <th>Feedback</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Tech Conference 2024</td>
                                            <td>245</td>
                                            <td>221</td>
                                            <td>90.2%</td>
                                            <td>4.8/5</td>
                                            <td><a href="#" class="btn btn-sm btn-outline-primary">View</a></td>
                                        </tr>
                                        <tr>
                                            <td>Startup Networking</td>
                                            <td>156</td>
                                            <td>134</td>
                                            <td>85.9%</td>
                                            <td>4.6/5</td>
                                            <td><a href="#" class="btn btn-sm btn-outline-primary">View</a></td>
                                        </tr>
                                        <tr>
                                            <td>Web Dev Bootcamp</td>
                                            <td>89</td>
                                            <td>76</td>
                                            <td>85.4%</td>
                                            <td>4.7/5</td>
                                            <td><a href="#" class="btn btn-sm btn-outline-primary">View</a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
>>>>>>> 8a996aa7d56b8b38ce7291c226b99d292509af77
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<<<<<<< HEAD
</x-admin-layout>
@endsection

@push('styles')
<style>
    .stat-icon {
        width: 56px;
        height: 56px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .bg-primary-light { background-color: rgba(59, 130, 246, 0.1); }
    .bg-success-light { background-color: rgba(16, 185, 129, 0.1); }
    .bg-warning-light { background-color: rgba(245, 158, 11, 0.1); }
    .bg-info-light { background-color: rgba(6, 182, 212, 0.1); }

    .event-img {
        width: 40px;
        height: 40px;
        background-size: cover;
        background-position: center;
        border-radius: 6px;
    }

    .legend-color {
        width: 16px;
        height: 16px;
        border-radius: 4px;
    }

    .geo-map-placeholder {
        background-color: #f8fafc;
        border-radius: 8px;
    }

    .nav-tabs .nav-link {
        color: #64748b;
        font-weight: 500;
    }

    .nav-tabs .nav-link.active {
        color: #3b82f6;
        font-weight: 600;
    }
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Revenue Chart
    const revenueCtx = document.getElementById('revenueChart').getContext('2d');

    // Create gradient for the area under the line
    const revenueGradient = revenueCtx.createLinearGradient(0, 0, 0, 350);
    revenueGradient.addColorStop(0, 'rgba(59, 130, 246, 0.5)');
    revenueGradient.addColorStop(1, 'rgba(59, 130, 246, 0)');

    const revenueChart = new Chart(revenueCtx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            datasets: [{
                label: 'Revenue',
                data: [25000, 28000, 32000, null, null, null, null, null, null, null, null, null],
                borderColor: '#3b82f6',
                backgroundColor: revenueGradient,
                borderWidth: 2,
                pointBackgroundColor: '#ffffff',
                pointBorderColor: '#3b82f6',
                pointBorderWidth: 2,
                pointRadius: 4,
                pointHoverRadius: 6,
                fill: true,
                tension: 0.4
=======
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    initializeCharts();
});

function initializeCharts() {
    // Revenue Chart
    const revenueCtx = document.getElementById('revenueChart').getContext('2d');
    new Chart(revenueCtx, {
        type: 'line',
        data: {
            labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
            datasets: [{
                label: 'Revenue',
                data: [15000, 22000, 18000, 28000],
                borderColor: 'rgb(99, 102, 241)',
                backgroundColor: 'rgba(99, 102, 241, 0.1)',
                tension: 0.4,
                fill: true
>>>>>>> 8a996aa7d56b8b38ce7291c226b99d292509af77
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
<<<<<<< HEAD
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        color: 'rgba(0, 0, 0, 0.05)'
                    },
=======
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
>>>>>>> 8a996aa7d56b8b38ce7291c226b99d292509af77
                    ticks: {
                        callback: function(value) {
                            return '$' + value.toLocaleString();
                        }
                    }
<<<<<<< HEAD
                },
                x: {
                    grid: {
                        display: false
                    }
                }
            },
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    backgroundColor: 'rgba(255, 255, 255, 0.9)',
                    titleColor: '#1f2937',
                    bodyColor: '#4b5563',
                    bodySpacing: 6,
                    padding: 12,
                    borderColor: 'rgba(0, 0, 0, 0.1)',
                    borderWidth: 1,
                    callbacks: {
                        label: function(context) {
                            let label = context.dataset.label || '';
                            if (label) {
                                label += ': ';
                            }
                            if (context.parsed.y !== null) {
                                label += '$' + context.parsed.y.toLocaleString();
                            }
                            return label;
                        }
                    }
=======
>>>>>>> 8a996aa7d56b8b38ce7291c226b99d292509af77
                }
            }
        }
    });

<<<<<<< HEAD
    // Category Sales Chart
    const categoryCtx = document.getElementById('categorySalesChart').getContext('2d');
    const categorySalesChart = new Chart(categoryCtx, {
        type: 'pie',
        data: {
            labels: ['Music', 'Business', 'Technology', 'Arts', 'Sports'],
            datasets: [{
                data: [41, 24, 20, 10, 5],
                backgroundColor: ['#3b82f6', '#10b981', '#f59e0b', '#ef4444', '#8b5cf6'],
                borderWidth: 0,
                hoverOffset: 5
=======
    // Category Chart
    const categoryCtx = document.getElementById('categoryChart').getContext('2d');
    new Chart(categoryCtx, {
        type: 'doughnut',
        data: {
            labels: ['Technology', 'Business', 'Education', 'Other'],
            datasets: [{
                data: [35, 25, 20, 20],
                backgroundColor: [
                    'rgb(99, 102, 241)',
                    'rgb(34, 197, 94)',
                    'rgb(251, 191, 36)',
                    'rgb(156, 163, 175)'
                ]
>>>>>>> 8a996aa7d56b8b38ce7291c226b99d292509af77
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
<<<<<<< HEAD
                },
                tooltip: {
                    backgroundColor: 'rgba(255, 255, 255, 0.9)',
                    titleColor: '#1f2937',
                    bodyColor: '#4b5563',
                    bodySpacing: 6,
                    padding: 12,
                    borderColor: 'rgba(0, 0, 0, 0.1)',
                    borderWidth: 1,
                    callbacks: {
                        label: function(context) {
                            return context.label + ': ' + context.parsed + '%';
                        }
                    }
=======
>>>>>>> 8a996aa7d56b8b38ce7291c226b99d292509af77
                }
            }
        }
    });
<<<<<<< HEAD
});
</script>
@endpush
=======

    // Events Chart
    const eventsCtx = document.getElementById('eventsChart').getContext('2d');
    new Chart(eventsCtx, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            datasets: [{
                label: 'Events Created',
                data: [12, 19, 15, 25, 22, 30],
                backgroundColor: 'rgba(99, 102, 241, 0.8)'
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Users Chart
    const usersCtx = document.getElementById('usersChart').getContext('2d');
    new Chart(usersCtx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            datasets: [{
                label: 'New Users',
                data: [450, 890, 650, 1200, 980, 1450],
                borderColor: 'rgb(34, 197, 94)',
                backgroundColor: 'rgba(34, 197, 94, 0.1)',
                tension: 0.4,
                fill: true
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
}

function exportReport() {
    // Simulate report export
    const activeTab = document.querySelector('.nav-link.active').textContent.trim();
    showNotification(`${activeTab} exported successfully! Download will begin shortly.`, 'success');

    // Simulate file download
    setTimeout(() => {
        const link = document.createElement('a');
        link.href = '#';
        link.download = `${activeTab.toLowerCase().replace(' ', '_')}_report.pdf`;
        link.click();
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
@endsection
>>>>>>> 8a996aa7d56b8b38ce7291c226b99d292509af77
