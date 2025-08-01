<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\CompanyController;

// Public Routes
Route::get('/', function () {
    return view('welcome');
})->name('home');

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
