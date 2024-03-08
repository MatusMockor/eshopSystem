<?php

use App\Http\Controllers\Dashboard\SettingController;

Route::group(['prefix' => 'settings', 'middleware' => 'roles:admin'], function () {
    Route::get('/{setting}/edit', [SettingController::class, 'edit'])->name('dashboard.settings.edit');
    Route::patch('/{setting}', [SettingController::class, 'update'])->name('dashboard.settings.update');
});
