<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UserController;

// Landing Page
Route::get('/', [PageController::class, 'index'])->name('home');

// About Page
Route::get('/about', [PageController::class, 'about'])->name('about');

// Customer Accounts Page
Route::get('/customers', [CustomerController::class, 'index'])->name('customers');

// Create Customer Form
Route::get('/customers/create', [CustomerController::class, 'create'])
    ->name('customers.create');

// Save New Customer
Route::post('/customers', [CustomerController::class, 'store'])
    ->name('customers.store');

// User Accounts Page
Route::get('/users', [UserController::class, 'index'])->name('users');

// Show Edit Customer Form
Route::get('/customers/{customer}/edit', [CustomerController::class, 'edit'])
    ->name('customers.edit');

// Update Customer
Route::put('/customers/{customer}', [CustomerController::class, 'update'])
    ->name('customers.update');

// Create User Form
Route::get('/users/create', [UserController::class, 'create'])
    ->name('users.create');

// Save New User
Route::post('/users', [UserController::class, 'store'])
    ->name('users.store');

// Edit User Form
Route::get('/users/{user}/edit', [UserController::class, 'edit'])
    ->name('users.edit');

// Update User
Route::put('/users/{user}', [UserController::class, 'update'])
    ->name('users.update');
