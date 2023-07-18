<?php

use App\Http\Controllers\Dashboard\PageController;

Route::group(['prefix' => 'pages', 'middleware' => 'roles:admin'], function () {
    Route::get('/', [PageController::class, 'index'])->name('dashboard.pages.index');
    Route::get('/create', [PageController::class, 'create'])->name('dashboard.pages.create');
});
