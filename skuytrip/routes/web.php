<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CheckoutController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/destinations', [DestinationController::class, 'index'])->name('destinations');

Route::get('/about', function () {
    return view('about');
});

// Authentication Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    // Password Reset Routes
    Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])
        ->name('password.request');
    Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])
        ->name('password.email');
    Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])
        ->name('password.reset');
    Route::post('/reset-password', [ResetPasswordController::class, 'reset'])
        ->name('password.update');
});

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

Route::get('/search', [DestinationController::class, 'search'])->name('search');
Route::get('/seed-destinations', [DestinationController::class, 'seedDummyData']);

// Add destination detail route
Route::get('/destination/{id}', [DestinationController::class, 'show'])->name('destination.show');

// Add checkout route
Route::match(['get', 'post'], '/checkout', [DestinationController::class, 'checkout'])->name('checkout');

// Add payment routes
Route::match(['get', 'post'], '/payment/process', [PaymentController::class, 'process'])->name('payment.process');
Route::get('/payment/success', [PaymentController::class, 'success'])->name('payment.success');

// Add user transaction routes
Route::get('/user/transactions', [PaymentController::class, 'transactions'])->name('user.transactions')->middleware('auth');

// Add user profile routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    Route::put('/profile', [UserController::class, 'update'])->name('profile.update');
    Route::put('/profile/password', [UserController::class, 'updatePassword'])->name('profile.password.update');
});

// Add checkout routes
Route::middleware('auth')->group(function () {
    Route::post('/checkout/process', [CheckoutController::class, 'process'])->name('checkout.process');
    Route::get('/checkout/{booking}', [CheckoutController::class, 'show'])->name('checkout.show');
});
