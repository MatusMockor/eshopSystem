<?php

namespace App\Providers;

use App\Models\Setting;
use App\View\Composers\Dashboard\CategoryComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register() : void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot() : void
    {
        View::composer([
            'dashboard.product.create',
            'dashboard.product.edit',
            'dashboard.product.index',
        ], CategoryComposer::class);

        View::composer('*', fn(\Illuminate\View\View $view) => $view->with([
            'pageSettingId' => Setting::first()->id ?? 1,
        ]));
    }
}
