<?php

use App\Http\Controllers\ProductController;

Route::group(['prefix' => 'products', 'middleware' => 'roles:admin'], function () {
    Route::get('/', [ProductController::class, 'index'])->name('dashboard.products.index');
});
