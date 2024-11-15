<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Homepage Route
Route::get('/', [HomeController::class, 'index']);

// Dashboard Route
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// User Dashboard Route
Route::get('/user-dashboard/{userId}', [UserDashboardController::class, 'show'])
    ->middleware(['auth'])
    ->name('user-dashboard');

require __DIR__.'/auth.php';




