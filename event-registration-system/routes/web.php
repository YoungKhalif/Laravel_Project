<?php

use Illuminate\Support\Facades\Route;
<<<<<<< HEAD
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\CompanyController;

// Public Routes
=======
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\Admin\AdminController;

// Public routes
>>>>>>> 8a996aa7d56b8b38ce7291c226b99d292509af77
Route::get('/', function () {
    return view('welcome');
})->name('home');

<<<<<<< HEAD
// Authentication Routes
Auth::routes();

// Protected Routes (require authentication)
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Events Routes
    Route::resource('events', EventController::class);

    // Companies Routes
    Route::resource('companies', CompanyController::class);

    // Tickets Routes
    Route::get('/tickets', [App\Http\Controllers\TicketController::class, 'index'])->name('tickets.index');
    Route::get('/events/{event}/tickets/purchase', [App\Http\Controllers\TicketController::class, 'purchase'])->name('tickets.purchase');
    Route::post('/events/{event}/tickets/purchase', [App\Http\Controllers\TicketController::class, 'processPurchase'])->name('tickets.process');
    Route::get('/tickets/confirmation/{registration}', [App\Http\Controllers\TicketController::class, 'confirmation'])->name('tickets.confirmation');
    Route::get('/tickets/{registration}', [App\Http\Controllers\TicketController::class, 'show'])->name('tickets.show');
    Route::get('/tickets/{registration}/qr', [App\Http\Controllers\TicketController::class, 'generateQR'])->name('tickets.qr');

    // Payment Routes
    Route::get('/payments/{registration}', [App\Http\Controllers\PaymentController::class, 'show'])->name('payments.show');
    Route::post('/payments/{registration}', [App\Http\Controllers\PaymentController::class, 'process'])->name('payments.process');
    Route::post('/payments/webhook', [App\Http\Controllers\PaymentController::class, 'webhook'])->name('payments.webhook');

    // Profile Routes
    Route::get('/profile', function () {
        return view('profile.index');
    })->name('profile');

    // Settings Routes
    Route::get('/settings', function () {
        return view('settings');
    })->name('settings');
});

// Public Event Routes
Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::get('/events/{event}', [EventController::class, 'show'])->name('events.show');
Route::get('/events/past', [App\Http\Controllers\EventController::class, 'past'])->name('events.past');

// Public Company Routes
Route::get('/companies', [CompanyController::class, 'index'])->name('companies.index');
Route::get('/companies/{company}', [CompanyController::class, 'show'])->name('companies.show');

// Rewards Route
Route::get('/rewards', function () {
    return view('rewards');
})->name('rewards');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
=======
// Authentication routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Public event routes
Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::get('/events/{event}', [EventController::class, 'show'])->name('events.show');

// Public company routes
Route::get('/companies', [CompanyController::class, 'index'])->name('companies.index');
Route::get('/companies/{company}', [CompanyController::class, 'show'])->name('companies.show');
Route::get('/companies/register', [CompanyController::class, 'create'])->name('companies.create');
Route::post('/companies', [CompanyController::class, 'store'])->name('companies.store');

// Protected routes
Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Event management
    Route::get('/events/create', [EventController::class, 'create'])->name('events.create');
    Route::post('/events', [EventController::class, 'store'])->name('events.store');
    Route::get('/events/{event}/edit', [EventController::class, 'edit'])->name('events.edit');
    Route::put('/events/{event}', [EventController::class, 'update'])->name('events.update');
    Route::delete('/events/{event}', [EventController::class, 'destroy'])->name('events.destroy');
    Route::get('/my-events', [EventController::class, 'myEvents'])->name('events.my');
    
    // Company management
    Route::get('/companies/{company}/edit', [CompanyController::class, 'edit'])->name('companies.edit');
    Route::put('/companies/{company}', [CompanyController::class, 'update'])->name('companies.update');
    
    // Ticket routes
    Route::post('/events/{event}/register', [TicketController::class, 'register'])->name('tickets.register');
    Route::get('/events/{event}/purchase', [TicketController::class, 'purchase'])->name('tickets.purchase');
    Route::post('/events/{event}/purchase', [TicketController::class, 'processPurchase'])->name('tickets.process');
    Route::get('/tickets/{ticket}/confirmation', [TicketController::class, 'confirmation'])->name('tickets.confirmation');
    Route::get('/tickets/{ticket}', [TicketController::class, 'show'])->name('tickets.show');
    Route::get('/tickets/{ticket}/download', [TicketController::class, 'downloadPdf'])->name('tickets.download');
    Route::get('/my-tickets', [TicketController::class, 'myTickets'])->name('tickets.my');
    Route::post('/check-in', [TicketController::class, 'checkIn'])->name('tickets.checkin');
});

// Admin routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/users', [AdminController::class, 'users'])->name('users');
    Route::get('/events', [AdminController::class, 'events'])->name('events');
    Route::get('/companies', [AdminController::class, 'companies'])->name('companies');
    Route::get('/reports', [AdminController::class, 'reports'])->name('reports');
    Route::post('/reports/event', [AdminController::class, 'eventReport'])->name('reports.event');
    Route::post('/reports/company', [AdminController::class, 'companyReport'])->name('reports.company');
    Route::post('/reports/attendance', [AdminController::class, 'attendanceReport'])->name('reports.attendance');
    Route::get('/events/{event}/export', [AdminController::class, 'exportEventReport'])->name('events.export');
    
    // Company verification
    Route::patch('/companies/{company}/verify', [CompanyController::class, 'verify'])->name('companies.verify');
    Route::patch('/companies/{company}/unverify', [CompanyController::class, 'unverify'])->name('companies.unverify');
});
>>>>>>> 8a996aa7d56b8b38ce7291c226b99d292509af77
