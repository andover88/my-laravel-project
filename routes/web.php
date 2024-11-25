<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\ImageUploadController;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::get('/profile', function () {
        return Inertia::render('UserProfilePage'); // Ensure the name matches the component
    })->name('profile');

    Route::get('/create/image', function () {
        return Inertia::render('CreateImagePage'); // Ensure this page exists
    })->name('create.image');

    Route::get('/create/video', function () {
        return Inertia::render('CreateVideoPage'); // Ensure this page exists
    })->name('create.video');
    Route::post('/analyze-car-image', [ImageUploadController::class, 'analyzeCarImage']);

});
