<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\AdminController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\ProfileController;
use App\Http\Controllers\backend\SliderController;
use App\Http\Controllers\backend\SubCategoryController;

/** Admin routes */
Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

Route::get('profile', [ProfileController::class, 'index'])->name('profile');

Route::post('profile/update', [ProfileController::class, 'updateProfile'])->name('profile.update');

Route::post('profile/update/password', [ProfileController::class, 'updatePassword'])->name('password.update');

//---------------

// Slider route
Route::resource('slider', SliderController::class);

//---------------

// update category status
Route::patch('category/{id}/update-status', [CategoryController::class, 'updateStatus'])->name('category.updateStatus');

// Category route
Route::resource('category', CategoryController::class);

//---------------

// update sub category status
Route::patch('sub-category/{id}/update-status', [SubCategoryController::class, 'updateStatus'])->name('sub-category.updateStatus');

// sub Category route
Route::resource('sub-category', SubCategoryController::class);

//---------------