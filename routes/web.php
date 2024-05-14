<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/**
 * new route
 */
Route::get('dashboard', [DashboardController::class, 'graph'])->middleware(['auth', 'verified'])->name('dashboard');
Route::resource('anggota-perkhidmatan', AppController::class);
Route::get('app/eksport', [AppController::class, 'eksport'])->name('anggota-perkhidmatan.eskport');

require __DIR__.'/auth.php';
