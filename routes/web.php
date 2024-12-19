<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TasksController; 
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
Route::get('/dashboard', [TasksController::class, 'dashboard'])->name('dashboard');

Route::get('/user-dashboard/{userId}', [UserDashboardController::class, 'show'])
    ->middleware(['auth'])
    ->name('user-dashboard');

// Tasks Routes
Route::middleware('auth')->group(function () {
    Route::get('/tasks', [TasksController::class, 'index'])->name('tasks.index');
    Route::get('/tasks/create', [TasksController::class, 'create'])->name('tasks.create');
    Route::post('/tasks/store', [TasksController::class, 'store'])->name('tasks.store');
    Route::get('/tasks/edit/{id}', [TasksController::class, 'edit'])->name('tasks.edit');
    Route::get('/tasks/delete/{id}', [TasksController::class, 'destroy'])->name('tasks.delete');
    Route::get('/tasks/complete/{id}', [TasksController::class, 'complete'])->name('tasks.complete');
});

Route::put('/tasks/{id}', [TasksController::class, 'update'])->name('tasks.update');
Route::patch('/tasks/complete/{id}', [TasksController::class, 'complete'])->name('tasks.complete');
Route::resource('tasks', TasksController::class);


require __DIR__.'/auth.php';
