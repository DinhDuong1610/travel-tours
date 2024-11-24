<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DestinationsController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/category', [CategoryController::class, 'index'])->name('admin.category.index');
    Route::get('/category/create', [CategoryController::class, 'create'])->name('admin.category.create');
    Route::post('/category/store', [CategoryController::class, 'store'])->name('admin.category.store');

    Route::get('/destinations', [DestinationsController::class, 'index'])->name('admin.destinations.index');
    Route::get('/destinations/create', [DestinationsController::class, 'create'])->name('admin.destinations.create');
    Route::post('/desitinations/store', [DestinationsController::class, 'store'])->name('admin.destinations.store');

    Route::get('/tag', [TagController::class, 'index'])->name('admin.tag.index');
    Route::get('/tag/create', [TagController::class, 'create'])->name('admin.tag.create');
    Route::post('/tag/store', [TagController::class, 'store'])->name('admin.tag.store');
    
    Route::get('/blog', [BlogController::class, 'index'])->name('admin.blog.index');
    Route::get('/blog/create', [BlogController::class, 'create'])->name('admin.blog.create');
});

