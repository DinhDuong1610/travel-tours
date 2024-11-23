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
    Route::get('/destinations', [DestinationsController::class, 'index'])->name('admin.destinations.index');
    Route::get('/tag', [TagController::class, 'index'])->name('admin.tag.index');
    Route::get('/blog', [BlogController::class, 'index'])->name('admin.blog.index');
    Route::get('/blog/create', [BlogController::class, 'create'])->name('admin.blog.create');

});

