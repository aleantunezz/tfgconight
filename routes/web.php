<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ProfileController;

Route::get('/', [EventController::class, 'index'])->name('index');

// Rutas de autenticación
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// Rutas protegidas por autenticación
Route::middleware('auth')->group(function () {
    Route::get('dashboard', [EventController::class, 'dashboard'])->name('dashboard');
    Route::get('profile', [ProfileController::class, 'edit'])->name('profile');
    Route::post('profile', [ProfileController::class, 'update']);

    // Rutas para gestionar eventos
    Route::get('events/create', [EventController::class, 'create'])->name('events.create');
    Route::post('events', [EventController::class, 'store'])->name('events.store');
    Route::get('events/{event}/edit', [EventController::class, 'edit'])->name('events.edit');
    Route::put('events/{event}', [EventController::class, 'update'])->name('events.update');
    Route::delete('events/{event}', [EventController::class, 'destroy'])->name('events.destroy');

    // Rutas para gestionar tickets
    Route::get('events/{event}/tickets', [TicketController::class, 'create'])->name('tickets.create');
    Route::post('events/{event}/tickets', [TicketController::class, 'store'])->name('tickets.store');
    Route::get('tickets/{ticket}', [TicketController::class, 'show'])->name('tickets.show');
});
