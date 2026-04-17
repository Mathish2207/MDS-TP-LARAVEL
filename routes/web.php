<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\LocationController;

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
     
     Route::get('/films', [FilmController::class, 'index'])->name('films.index');
     Route::middleware('admin')->group(function () {
        Route::get('/films/create', [FilmController::class, 'create'])->name('films.create');
        Route::post('/films', [FilmController::class, 'store'])->name('films.store');
     });
        Route::get('/films/{id}', [FilmController::class, 'show'])->name('films.show');
    Route::middleware('admin')->group(function () {
        Route::get('/films/{id}/edit', [FilmController::class, 'edit'])->name('films.edit');
        Route::patch('/films/{id}', [FilmController::class, 'update'])->name('films.update');
        Route::delete('/films/{id}', [FilmController::class, 'destroy'])->name('films.destroy');
    });    

     Route::get('/locations', [LocationController::class, 'index'])->name('locations.index');
     Route::get('/locations/create', [LocationController::class, 'create'])->name('locations.create');
     Route::post('/locations', [LocationController::class, 'store'])->name('locations.store');
     Route::get('/locations/{id}', [LocationController::class, 'show'])->name('locations.show');
     Route::post('/locations/{id}/upvote', [LocationController::class, 'upvote'])->name('locations.upvote');
     Route::middleware('admin')->group(function () {
        Route::get('/locations/{id}/edit', [LocationController::class, 'edit'])->name('locations.edit');
        Route::patch('/locations/{id}', [LocationController::class, 'update'])->name('locations.update');
        Route::delete('/locations/{id}', [LocationController::class, 'destroy'])->name('locations.destroy');
     });
    });

require __DIR__.'/auth.php';
