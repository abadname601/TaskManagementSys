<?php



use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('homepage');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Optional: Add this only if you need /user-dashboard route
Route::get('/user-dashboard/{userId}', function ($userId) {
    return view('user-dashboard', ['userId' => $userId]);
})->middleware(['auth'])->name('user-dashboard');

require __DIR__.'/auth.php';
