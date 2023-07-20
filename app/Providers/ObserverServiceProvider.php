<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Product;
use App\Models\SubPage;
use App\Observers\Dashboard\CategoryObserver;
use App\Observers\Dashboard\ProductObserver;
use App\Observers\Dashboard\SubPageObserver;
use Illuminate\Support\ServiceProvider;

class ObserverServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Category::observe(CategoryObserver::class);
        Product::observe(ProductObserver::class);
        SubPage::observe(SubPageObserver::class);
    }
}
