<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\AdminController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\ChildCategoryController;
use App\Http\Controllers\backend\ProfileController;
use App\Http\Controllers\backend\SliderController;
use App\Http\Controllers\backend\SubCategoryController;

/** Admin routes */

Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

Route::get('profile', [ProfileController::class, 'index'])->name('profile');

Route::post('profile/update', [ProfileController::class, 'updateProfile'])->name('profile.update');

Route::post('profile/update/password', [ProfileController::class, 'updatePassword'])->name('password.update');

// Slider routes
Route::resource('slider', SliderController::class);
//---------------

// Category routes
Route::patch('category/update-status', [CategoryController::class, 'updateStatus'])->name('category.updateStatus');
Route::resource('category', CategoryController::class);
//---------------

// sub Category routes
Route::post('getSubCategories', [SubCategoryController::class, 'getSubCategories'])->name('getSubCategories');
Route::patch('sub-category/update-status', [SubCategoryController::class, 'updateStatus'])->name('sub-category.updateStatus');
Route::resource('sub-category', SubCategoryController::class);
//---------------

// child Category routes
Route::patch('child-category/update-status', [ChildCategoryController::class, 'updateStatus'])->name('child-category.updateStatus');
Route::resource('child-category', ChildCategoryController::class);
//---------------