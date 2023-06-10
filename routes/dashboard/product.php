<?php

use App\Http\Controllers\Dashboard\ProductController;

Route::group(['prefix' => 'products', 'middleware' => 'roles:admin'], function () {
    Route::get('/', [ProductController::class, 'index'])->name('dashboard.products.index');
    Route::get('/create', [ProductController::class, 'create'])->name('dashboard.products.create');
    Route::post('/', [ProductController::class, 'store'])->name('dashboard.products.store');
    Route::get('/{product}/edit', [ProductController::class, 'edit'])->name('dashboard.products.edit');
});
