<?php

use App\Http\Controllers\Dashboard\SubPageController;

Route::group(['prefix' => 'sub-page', 'middleware' => 'roles:admin'], function () {
    Route::get('/', [SubPageController::class, 'index'])->name('dashboard.subPages.index');
    Route::get('/create', [SubPageController::class, 'create'])->name('dashboard.subPages.create');
    Route::post('/', [SubPageController::class, 'store'])->name('dashboard.subPages.store');
});
