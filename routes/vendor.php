<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\VendorController;


/** vendor routes */
Route::get('dashboard', [VendorController::class, 'dashboard'])->name('dashboard');
