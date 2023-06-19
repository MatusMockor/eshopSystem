<?php

namespace App\Providers;

use App\Repositories\Implementation\CategoryRepository;
use App\Repositories\Implementation\ProductRepository;
use App\Repositories\Interface\CategoryRepositoryContract;
use App\Repositories\Interface\ProductRepositoryContract;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register() : void
    {
        $contracts = [
            CategoryRepositoryContract::class => CategoryRepository::class,
            ProductRepositoryContract::class  => ProductRepository::class,
        ];

        foreach ($contracts as $contract => $implementation) {
            $this->app->bind($contract, $implementation);
        }
    }

    /**
     * Bootstrap services.
     */
    public function boot() : void
    {
        //
    }
}
