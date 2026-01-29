<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OppasRequestController;
use App\Http\Controllers\ResponseController;
use App\Http\Controllers\AdminController;

//start routes
Route::get('/', function () {
    return view('welcome');
});

// Admin routes
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::post('/block/{user}', [AdminController::class, 'blockUser'])->name('admin.block');
    Route::delete('/request/{oppasRequest}', [AdminController::class, 'deleteRequest'])->name('admin.delete-request');
});


// Routes for authenticated and non-blocked users
Route::middleware(['auth', 'check.blocked'])->group(function () {
    //reviews
    Route::get('/reviews/create/{oppasRequest}', [ReviewController::class, 'create'])->name('reviews.create');
    Route::post('/reviews/{oppasRequest}', [ReviewController::class, 'store'])->name('reviews.store');
    
    // Oppas Requests and Responses
    Route::get('/oppas-vragen', [OppasRequestController::class, 'index'])->name('requests.index');
    Route::get('/oppas-vragen/{oppasRequest}', [OppasRequestController::class, 'show'])->name('requests.show');
    Route::post('/oppas-vragen/{oppasRequest}/reageer', [ResponseController::class, 'store'])->name('responses.store');
    Route::post('/responses/{oppasRequest}', [ResponseController::class, 'store'])->name('responses.store');

    // Accepting and Rejecting Responses
    Route::patch('/responses/{response}/accept', [ResponseController::class, 'accept'])->name('responses.accept');
    Route::patch('/responses/{response}/reject', [ResponseController::class, 'reject'])->name('responses.reject');
}); 