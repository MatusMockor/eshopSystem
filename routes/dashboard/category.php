<?php

use App\Http\Controllers\Dashboard\CategoryController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'categories', 'middleware' => 'roles:admin'], function () {
    Route::get('/', [CategoryController::class, 'index'])->name('dashboard.categories.index');
});
