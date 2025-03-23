<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProductsController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// Protected Routes
Route::middleware(['auth'])->group(function () {
    // Categories Resource Route
    Route::resource('categories', CategoriesController::class);
    
    // Products Resource Route
    Route::resource('products', ProductsController::class);
});

require __DIR__.'/auth.php';
