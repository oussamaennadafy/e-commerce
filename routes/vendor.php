<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\VendorController;
use App\Http\Controllers\backend\VendorProfileController;

/** vendor routes */
Route::get('dashboard', [VendorController::class, 'dashboard'])->name('dashboard');

Route::get('profile', [VendorProfileController::class, 'index'])->name('profile');
Route::patch('profile', [VendorProfileController::class, 'updateProfile'])->name('profile.update');
Route::patch('profile/password/update', [VendorProfileController::class, 'updatePassword'])->name('profile.update.password');
