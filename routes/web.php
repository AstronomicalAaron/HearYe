<?php

use App\Http\Controllers\ProfileController;
use App\Models\Announcement;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// This route is for the main SPA page
Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
        'announcements' => Announcement::with('user:id,name')->latest()->paginate(5)
    ]);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Allows users (or an admin user) to create and manage their announcements
Route::middleware('auth')->group(function () {
    Route::post('/announcement', [Announcement::class, 'create'])->name('profile.create');
    Route::patch('/announcement', [Announcement::class, 'update'])->name('profile.update');
    Route::delete('/announcement', [Announcement::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
