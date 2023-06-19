<?php

use App\Http\Controllers\Dashboard\CategoryController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'categories', 'middleware' => 'roles:admin'], function () {
    Route::get('/', [CategoryController::class, 'index'])->name('dashboard.categories.index');
    Route::post('/', [CategoryController::class, 'store'])->name('dashboard.categories.store');
    Route::get('/create', [CategoryController::class, 'create'])->name('dashboard.categories.create');
    Route::get('/{category}/edit', [CategoryController::class, 'edit'])->name('dashboard.categories.edit');
    Route::patch('/{category}', [CategoryController::class, 'update'])->name('dashboard.categories.update');
});
